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
    private $_sCacheDirName = null;

    public function __construct() {
        $this->_sCacheDirName = JsonData_Plugin_Dir . DIRECTORY_SEPARATOR . 'cache';
        if(!is_dir($this->_sCacheDirName)){
            mkdir($this->_sCacheDirName,0777);
        }
        chmod($this->_sCacheDirName, 0777);

    }

    /**
     * Write template files
     * @param int $iFeedId
     */
	public function updateCreateCache($sFeedSlug,$sMarkup,$sStyle){
        $sDirName = $this->_sCacheDirName. DIRECTORY_SEPARATOR .$sFeedSlug;
        $sFeedMarkupFilename = $sDirName . DIRECTORY_SEPARATOR . 'template.phtml';
        $sFeedStylesheetFilename = $sDirName . DIRECTORY_SEPARATOR . 'style.css';


        if(!is_dir($sDirName)){
            mkdir($sDirName,0777);
        }
        chmod($sDirName, 0777);

        $fTemplate=fopen($sFeedMarkupFilename,'w+');
        fwrite($fTemplate, stripslashes($sMarkup));
        fclose($fTemplate);

        $fStylesheet=fopen($sFeedStylesheetFilename,'w+');
        fwrite($fStylesheet, stripslashes($sStyle));
        fclose($fStylesheet);

        chmod($sFeedMarkupFilename, 0777);
        chmod($sFeedStylesheetFilename, 0777);

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
     * remove unused shortcode feeds
     */
    public function cronRemove(){
        $oDaoJsonData = new JsonDataDao();
        $aFeeds = $oDaoJsonData->fetchAllFeedQueueIDs();

        $query = new \WP_Query(array('post_status'=>'any','posts_per_page'=>-1));
        $aPosts = $query->get_posts();
        $pattern = get_shortcode_regex();
        ///get all used queues
        $aUsedQueues = array();
        foreach($aPosts AS $post){


            if (   preg_match_all( '/'. $pattern .'/s', $post->post_content, $matches )
                && array_key_exists( 2, $matches )
                && in_array( JD\Config::SHORTCODE_JSON_DATA, $matches[2] ) )
            {
                foreach($matches[0] AS $sShortcode){
                    $aParams = shortcode_parse_atts( $sShortcode );
                    if(array_key_exists('id', $aParams)){
                        $aUsedQueues[]=$aParams['id'];
                    }
                }
            }
        }
        $aToBeDeleted = array_diff($aFeeds, $aUsedQueues);
        array_map(array(&$this,'_removeQueueFiles'),$aToBeDeleted);
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
        $sDirName = $this->_sCacheDirName. DIRECTORY_SEPARATOR .$iFeedId;

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
        $sDirName = $this->_sCacheDirName. DIRECTORY_SEPARATOR .$iFeedId;

        //build url for queue
        $aUrl = explode('?',$aFeed['feed_url']);
        $sRootUrl = $aUrl[0];

        $iQueueId = $aFeedQueue['id'];
        $sQueueDataFilename = $sDirName . DIRECTORY_SEPARATOR . 'data-'.$iQueueId.'.json';

        //$iFeedId = $aFeedQueue['json_data_id'];
        $aQueueParams = unserialize($aFeedQueue['parameters']);
        $sUrlParams = http_build_query($aQueueParams);

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
     */
    private function _removeQueueFiles($iFeedQueueId){
        $oDaoJsonData = new JsonDataDao();
        $aFeedQueue = $oDaoJsonData->fetchSingleFeedQueue($iFeedQueueId);
        $sDirName = $this->_sCacheDirName. DIRECTORY_SEPARATOR .$aFeedQueue['json_data_id'];

        unlink($sDirName . DIRECTORY_SEPARATOR . 'data-' . $iFeedQueueId . '.json');
        $oDaoJsonData->deleteFeedQueue($iFeedQueueId);
    }

	public function removeFeedDir ($iFeedId) {
		$bStatus = false;

		$sDirName = $this->_sCacheDirName . DIRECTORY_SEPARATOR . $iFeedId;

		if (is_dir($sDirName)) {
			$oDirHandle = opendir($sDirName);

			if ($oDirHandle) {
				while ($oFile = readdir($oDirHandle)) {

					if ($oFile != "." && $oFile != "..") {

						if (!is_dir($sDirName . DIRECTORY_SEPARATOR . $oFile)) {
							unlink($sDirName . DIRECTORY_SEPARATOR . $oFile);
						} else {
							removeFeedDir($sDirName . DIRECTORY_SEPARATOR . $oFile);
						}
					}
				}

				closedir($oDirHandle);
				$bStatus = rmdir($sDirName);

			}
		}

		return $bStatus;

	}

}