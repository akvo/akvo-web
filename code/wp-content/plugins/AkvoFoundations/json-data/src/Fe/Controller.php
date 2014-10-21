<?php
namespace JsonData\Fe;
use JsonData\Fe\Controller\Feed as JDfeed;
use JsonData\Common\Model\Feed as JDfeedModel;
use JsonData as JD;
/**
 * Description of Controller
 *
 * @author Jayawi Perera
 */
class Controller {

	public function initialise () {
        
		$this->registerShortCodes();
        $this->doCronjob();
//        add_filter( 'the_title', array($this,'doPreviewTitle') );
//        add_filter( 'the_content', array($this,'doPreviewContent') );
        $this->_initialiseJsonDataWidget();
        if(isset($_GET['preview_json'])){
            $this->doPreview($_GET['preview_json']);
        }
	}

	public function registerShortCodes () {

		add_shortcode(JD\Config::SHORTCODE_JSON_DATA, array($this, 'displayFeed'));
		

	}

	public function displayFeed ($aAttributes) {
        $oFeedController = new JDfeed();
        $oFeedController->display($aAttributes);
		

	}
    
    public function doCronjob(){
        if(isset($_GET['update_jsondata']) && $_GET['update_jsondata']==1){
            $oFeed = new JDfeedModel();
            $oFeed->cronUpdate();
            $oFeed->cronRemove();
        }
    }
    public function doPreview($slug){
        global $wpdb;
        $sQuery = "SELECT * FROM `" . $wpdb->prefix. "posts` WHERE `post_type`='jdata' AND `post_status`='draft' AND `post_name` = %s";
		$sQuery = $wpdb->prepare($sQuery , 'jsondata-'.$slug);

		$aResults = $wpdb->get_row($sQuery, ARRAY_A);
        
        

        if($aResults){
            $id = $aResults['ID'];

            
            $url = get_permalink($id);
//            var_dump($aResults);
        ?>

        <?php
          header('Location: '.  get_permalink($id));
          die();
        }
    }
    public function doPreviewContent($content){
        
        if(isset($_GET['preview_json'])){ 
            $slug = $_GET['preview_json'];
            $oDaoJsonData = new \JsonData\Common\Model\Dao\JsonData();
            $aDetail = $oDaoJsonData->fetchFeedBySlug($slug);
            $aParams = unserialize($aDetail['feed_parameters']);
            $sParams= '';
            foreach($aParams AS $k=>$v)$sParams.= ' '.$k.'="'.$v.'"';
            do_shortcode('[jsondata_feed slug="'.$slug.'"'.$sParams.']');
            return;
        }
        return $content;
    }
    public function doPreviewTitle($title){
        
        if(isset($_GET['preview_json'])){ 
            return 'JSON data preview';
        }
        return $title;
    }

    private function _initialiseJsonDataWidget () {

		add_action( 'widgets_init', function(){
			register_widget( 'JsonData\Common\Model\JsonWidget' );
		});
	}

}