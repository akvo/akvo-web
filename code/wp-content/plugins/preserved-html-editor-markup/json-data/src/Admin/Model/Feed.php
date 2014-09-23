<?php
namespace JsonData\Admin\Model;

use JsonData\Common\Model\Dao as JDDao;
use JsonData\Common\Form\Register as RegistryForm;
/**
 * Description of Registry
 *
 * @author Jayawi Perera
 */
class Feed {

	public function getList () {

		
		$oDaoParticipantRegistry = new JDDao\JsonData();
		$aBatch = $oDaoParticipantRegistry->fetchAllFeeds();
        
        return $aBatch;

	}

	public function getBatches () {

		$oDaoParticipantRegistry = new JDDao\JsonData();
		return $oDaoParticipantRegistry->fetchBatches();

	}

	public function getFeed () {

		$aContent = array(
			'redirect' => false,
		);

		$sRedirectUrl = menu_page_url(\JsonData\Admin\Controller\Home::MENU_SLUG, false);

		if (!isset($_GET['id'])) {
			$aContent['redirect'] = $sRedirectUrl;
			return $aContent;
		}

		$iId = (int)$_GET['id'];
		$oDaoFeed = new JDDao\JsonData();
		$aDetail = $oDaoFeed->fetchFeed($iId);
		if (is_null($aDetail)) {
			$aContent['redirect'] = $sRedirectUrl;
			return $aContent;
		}

		$aContent['detail'] = $aDetail;

		return $aContent;

	}

	

}