<?php

namespace JsonData\Admin\Model;

use JsonData\Admin\Form\FeedWidget as FeedWidget;
use JsonData\Common\Model\Dao\JsonData as JsonDataDao;
use JsonData\Common\Model\Feed as JsonDataFeed;


/**
 * Description of FeedWidgetHandler
 *
 * @author uthpala
 */
class FeedWidgetHandler {


	public function sidebarWidget($aFormValues) {
		$aContent = array();
		$aContent['status'] = 'failed';

		$oDaoJsonData = new JsonDataDao();

		if (!empty($aFormValues)) {
			$aInsertData = array();

			$aFeedParameters = array();
			foreach($aFormValues as $sKey => $sFormValue) {
				if ($sKey != 'hiddenFeedId' 
                        && $sKey != 'hiddenQueueId' 
                        && $sKey != 'selectFeedName' 
                        && $sKey != 'title') {
					$aFeedParameters[$sKey] = $sFormValue;
				}
			}
            
			$aInsertData['json_data_id'] = $aFormValues['hiddenFeedId'];
			$aInsertData['parameters'] = serialize($aFeedParameters);
			$aInsertData['last_update_time'] = date('Y-m-d H:i:s');
			$aInsertData['last_display_time'] = date('Y-m-d H:i:s');
            
			$oDaoJsonData = new \JsonData\Common\Model\Dao\JsonData();
            if(isset($aFormValues['hiddenQueueId']) && $aFormValues['hiddenQueueId']!=''){
                $bStatus = $oDaoJsonData->updateFeedQueue($aInsertData,$aFormValues['hiddenQueueId']);
                $mStatus = $aFormValues['hiddenQueueId'];
            }else{
                $mStatus = $oDaoJsonData->insertJsonDataQueue($aInsertData);
            }
			

			if (is_int($mStatus)) {
                $oFeed = new JsonDataFeed();
                $oFeed->updateQueue($aInsertData['json_data_id'], $mStatus);
				$aContent['queue_id'] = $mStatus;
				$aContent['hiddenFeedId'] = $aInsertData['json_data_id'];
				$aContent['status'] = 'success';
				$aContent['message'] = 'Data successfully saved to database';

			} else {
				$aContent['message'] = 'Failed to save data';
			}

		}

		return $aContent;

	}

	public function editorWidget ($aFormValues) {
		$aContent = array();
		$aContent['status'] = 'failed';
		$aContent['message'] = '';
		$aContent['isFormValid'] = false;


		$aFeedParameters = $aFormValues['textParam'];

		$oForm = new \JsonData\Admin\Form\FeedWidget(\JsonData\Admin\Form\FeedWidget::CONTEXT_SELECT_FEED, array(), array('feed_parameters' => $aFeedParameters));

		if ($oForm->isValid($aFormValues)) {
			$aContent['isFormValid'] = true;
            ksort($aFeedParameters);
			$aInsertData = array();
			$aInsertData['json_data_id'] = $aFormValues['hiddenFeedId'];
			$aInsertData['parameters'] = serialize($aFeedParameters);
			$aInsertData['last_update_time'] = date('Y-m-d H:i:s');
			$aInsertData['last_display_time'] = date('Y-m-d H:i:s');

			$oDaoJsonData = new \JsonData\Common\Model\Dao\JsonData();
			$mStatus = $oDaoJsonData->insertJsonDataQueue($aInsertData);

			if (is_int($mStatus)) {
                $aFeed = $oDaoJsonData->fetchFeed($aInsertData['json_data_id']);
                $oFeed = new JsonDataFeed();
                $oFeed->updateQueue($aInsertData['json_data_id'], $mStatus);
				$aContent['queue_id'] = $mStatus;
				$aContent['slug'] = $aFeed['feed_slug'];
				$aContent['status'] = 'success';
				$aContent['message'] = 'Data successfully saved to database';

			} else {
				$aContent['message'] = 'Failed to save data';
			}
		}

		return $aContent;
	}

}

?>
