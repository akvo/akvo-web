<?php
namespace JsonData\Common\Model;
use JsonData\Common\Model\Dao\JsonData as JsonDataDao;
use JsonData as JD;
/**
 * Description of Register
 *
 * @author Eveline Sparreboom
 */
class Feed {

    public function __construct() {
        if(!is_dir(JsonData_Cache_Dir)){
            mkdir(JsonData_Cache_Dir,0775);
        }
        @chmod(JsonData_Cache_Dir, 0775);
    }

    /**
     * Write template files
     * @param int $iFeedId
     */
	public function updateCreateCache($sFeedSlug,$sMarkup,$sStyle){
        $sDirName = JsonData_Cache_Dir . $sFeedSlug . DIRECTORY_SEPARATOR ;
        $sFeedMarkupFilename = $sDirName . 'template.phtml';
        $sFeedStylesheetFilename = $sDirName . 'style.css';

        if(!is_dir($sDirName)){
            $foo = mkdir($sDirName,0775, true);
        }
        chmod($sDirName, 0775);

        $fTemplate=fopen($sFeedMarkupFilename,'w+');
        fwrite($fTemplate, stripslashes($sMarkup));
        fclose($fTemplate);

        $fStylesheet=fopen($sFeedStylesheetFilename,'w+');
        fwrite($fStylesheet, stripslashes($sStyle));
        fclose($fStylesheet);

        chmod($sFeedMarkupFilename, 0664);
        chmod($sFeedStylesheetFilename, 0664);

    }
    /**
     * Get first JSON data cache file on insert
     * @param int $iFeedId
     * @param int $iQueueId
     */
    public function updateQueue($iFeedId, $iQueueId){
        $this->_updateSingleQueue($iFeedId, $iQueueId);
    }
    /**
     * get feeds to update
     */
    public function cronUpdate(){
        $oDaoJsonData = new JsonDataDao();
        $aFeeds = $oDaoJsonData->fetchAllFeeds();
        $aTimeTranslate = array(
            '1h'=>'-1 hour',
            '4h'=>'-4 hours',
            '8h'=>'-8 hours',
            '12h'=>'-12 hours',
            '1d'=>'-1 day',
            '1w'=>'-1 week',
            '1m'=>'-1 month'
        );
        ///push feeds that need updating to queue
        foreach($aFeeds AS $aFeed){
            if(strtotime($aFeed['date_updated']) <= strtotime($aTimeTranslate[$aFeed['feed_update_interval']])){
                $this->_updateFeedQueueData($aFeed);
                $oDaoJsonData->updateFeed(array('date_updated'=>date('Y-m-d H:i:s')), $aFeed['id']);
            }
        }
        $sEmail = get_option(JD\Config::OPTION_NAME_DEBUG_EMAIL);
        if($sEmail && $sEmail!==''){
            mail( $sEmail, 'update json data feeds', 'running');
        }

    }

    /**
     * remove unused shortcode feed queues
     */
    public function cronRemove(){
        $oDaoJsonData = new JsonDataDao();
        $aFeeds = $oDaoJsonData->fetchAllFeedQueues();
        $aIdsToBeDeleted = array();
        $aSlugsToBeDeleted = array();
        foreach($aFeeds AS $aFeedQueue){
            if(strtotime($aFeedQueue['last_display_time']) <= strtotime('-1 month')){
                $aIdsToBeDeleted[]=$aFeedQueue['id'];
                $aSlugsToBeDeleted[]=$aFeedQueue['feed_slug'];
            }
        }
        
        array_map(array(&$this,'_removeQueueFiles'),$aIdsToBeDeleted,$aSlugsToBeDeleted);
    }

    public function scheduleCron(){
        $sWPcron = get_option(\JsonData\Config::OPTION_NAME_CRON_SETTINGS);
        if($sWPcron=='false'){
            ///not server cron, schedule wp cron
            if ( ! wp_next_scheduled( 'run_wp_cron' ) ) {
                wp_schedule_event( time(), 'hourly', 'run_wp_cron' );
              }

              add_action( 'run_wp_cron', array($this,'cronUpdate') );

        }else{
            wp_clear_scheduled_hook( 'run_wp_cron' );
        }
    }
    /**
     * get cached feed data for feed
     * @param array $aFeed
     */
    private function _updateFeedQueueData($aFeed){
        $oDaoJsonData = new JsonDataDao();
        $iFeedId = $aFeed['feed_slug'];
        $aFeedQueues = $oDaoJsonData->fetchFeedQueue($iFeedId);

        //build url for queue
        $aUrl = explode('?',$aFeed['feed_url']);
        $sRootUrl = $aUrl[0];

        foreach($aFeedQueues AS $aFeedQueue){
            $iQueueId = $aFeedQueue['id'];
            $this->_updateSingleQueue($iFeedId, $iQueueId);
        }

    }

    private function _updateSingleQueue($mFeed, $mQueue){
        $oDaoJsonData = new JsonDataDao();
        if(!is_array($mFeed)){
            $aFeed = $oDaoJsonData->fetchFeed($mFeed);
        }else{
            $aFeed = $mFeed;
        }
        if(!is_array($mQueue)){
            $aFeedQueue = $oDaoJsonData->fetchSingleFeedQueue($mQueue);
        }else{
            $aFeedQueue = $mQueue;
        }
        $iFeedId = $aFeed['feed_slug'];
        $sDirName = JsonData_Cache_Dir . $iFeedId;

        //build url for queue
        $aUrl = explode('?',$aFeed['feed_url']);
        $sRootUrl = $aUrl[0];

        $iQueueId = $aFeedQueue['id'];
        $sQueueDataFilename = $sDirName . DIRECTORY_SEPARATOR . 'data-'.$iQueueId.'.json';

       
        $aQueueParams = unserialize($aFeedQueue['parameters']);
        $sUrlParams = ($aQueueParams) ? http_build_query($aQueueParams) : '';

        $sQueueUrl=$sRootUrl.'?'.$sUrlParams;

        //write json to cache file
        $sJsonData = file_get_contents($sQueueUrl);
        $fQueueData=fopen($sQueueDataFilename,'w+');
        fwrite($fQueueData, $sJsonData);
        fclose($fQueueData);
        chmod($sQueueDataFilename, 0755);
        $oDaoJsonData->updateFeedQueue(array('last_update_time'=>date('Y-m-d H:i:s')), $iQueueId);

    }

    /**
     * remove unused queue
     * @param int $iFeedQueueId
     * @param strin $sFeedSlug
     */
    private function _removeQueueFiles($iFeedQueueId,$sFeedSlug){
        $oDaoJsonData = new JsonDataDao();
        $aFeedQueue = $oDaoJsonData->fetchSingleFeedQueue($iFeedQueueId);
        $sDirName = JsonData_Cache_Dir . $sFeedSlug . DIRECTORY_SEPARATOR;
        unlink($sDirName . 'data-' . $iFeedQueueId . '.json');
        $oDaoJsonData->deleteFeedQueue($iFeedQueueId);
    }

	public function removeFeedDir ($iFeedId) {
		$bStatus = false;

		$sDirName = JsonData_Cache_Dir . DIRECTORY_SEPARATOR . $iFeedId . DIRECTORY_SEPARATOR;

		if (is_dir($sDirName)) {
			$oDirHandle = opendir($sDirName);

			if ($oDirHandle) {
				while ($oFile = readdir($oDirHandle)) {

					if ($oFile != "." && $oFile != "..") {

						if (!is_dir($sDirName . $oFile)) {
							unlink($sDirName . $oFile);
						} else {
							removeFeedDir($sDirName . $oFile);
						}
					}
				}

				closedir($oDirHandle);
				$bStatus = rmdir($sDirName);

			}
		}

		return $bStatus;

	}
    
    public function makePreview($slug){
        $oDaoJsonData = new \JsonData\Common\Model\Dao\JsonData();
        $aDetail = $oDaoJsonData->fetchFeedBySlug($slug);
        if($aDetail){
            $aParams = unserialize($aDetail['feed_parameters']);
            $sParams= '';
            if($aParams){
                foreach($aParams AS $k=>$v)$sParams.= ' '.$k.'="'.$v.'"';
            }
            $sShortcode = '[jsondata_feed slug="'.$slug.'"'.$sParams.']';
            $args=array(
                'post_type' => 'jdata',
                'post_status' => 'draft',
                'name'=>'jsondata-'.$slug
            );
            $the_query = new \WP_Query( $args );
            $aPosts = $the_query->get_posts();
            // Post object
            $my_post = array(
              'post_title'    => 'JSON data preview '.$slug,
              'post_name'    => 'jsondata-'.$slug,
              'post_content'  => $sShortcode,
              'post_status'   => 'draft',
              'post_type'   => 'jdata',
              'post_author'   => 1
            );
            if($the_query->post_count===0){
                // Insert the post into the database
                $id = wp_insert_post( $my_post );
            }else{
                $id = $aPosts[0]->ID;
                $my_post['ID'] = $id;
                wp_update_post( $my_post );
            }
            
            wp_reset_postdata();
            
            
            //header('Location: '.  get_permalink($id));
//            die();
        }
    }

}