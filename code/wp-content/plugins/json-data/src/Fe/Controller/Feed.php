<?php
namespace JsonData\Fe\Controller;

use KwgPress as KwgP;
use JsonData\Common\Model\Dao\JsonData as JsonDataDao;
use JsonData\Common\Model\Feed as JsonDataFeed;
/**
 * Description of Form
 *
 * @author Jayawi Perera
 */
class Feed {

	public function initialise () {

		

	}

	public function display ($aAttributes) {
        $oDaoJsonData = new JsonDataDao();
        $sFeedSlug = $aAttributes['slug'];
        unset($aAttributes['slug']);
        $aFeed = $oDaoJsonData->fetchFeedBySlug($sFeedSlug);
        $iFeedId = $aFeed['id'];
        ksort($aAttributes);
        $sSerializedParameters= serialize($aAttributes);
        
		$aFeedDetail = $oDaoJsonData->fetchSingleFeedQueueByParams($iFeedId,$sSerializedParameters);
        if(!$aFeedDetail){
            $aInsertData = array();
			$aInsertData['json_data_id'] = $iFeedId;
			$aInsertData['parameters'] = $sSerializedParameters;
			$aInsertData['last_update_time'] = date('Y-m-d H:i:s');
			$aInsertData['last_display_time'] = date('Y-m-d H:i:s');

			$mStatus = $oDaoJsonData->insertJsonDataQueue($aInsertData);
            if (is_int($mStatus)) {
                $oFeed = new JsonDataFeed();
                $oFeed->updateQueue($iFeedId, $mStatus);
                $aFeedDetail = $oDaoJsonData->fetchSingleFeedQueueByParams($iFeedId,$sSerializedParameters);
        
            }

        }
        if($aFeedDetail){
            $iFeedId = $aFeedDetail['json_data_id'];
            $iFeedQueueId = $aFeedDetail['id'];
            $oDaoJsonData->updateDisplayTime($iFeedQueueId);
            $this->enqueueFrontEndCss($iFeedId);
            $sData = file_get_contents(JsonData_Plugin_Dir . '/cache/'.$iFeedId.'/data-'.$iFeedQueueId.'.json');
            $aData = json_decode($sData, true);
            require JsonData_Plugin_Dir . '/cache/'.$iFeedId.'/template.phtml';
        }
	}

	

	public function enqueueFrontEndCss ($iFeedId) {

		$sHandle = AkvoWvwParticipantRegistry_Plugin_Slug . '-feed-'.$iFeedId.'-css';
		if (!wp_style_is($sHandle, 'registered')) {
			wp_register_style($sHandle, JsonData_Plugin_Url . '/cache/'.$iFeedId.'/style.css');
		}
		if (!wp_style_is($sHandle, 'enqueued')) {
			wp_enqueue_style($sHandle);
		}

	}

}