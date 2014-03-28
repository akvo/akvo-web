<?php
namespace JsonData\Admin\Form;

use KwgPress as KwgP;
use JsonData\Common\Model\Dao as JDDao;

/**
 * Description of FeedWidget
 *
 * @author uthpala
 */
class FeedWidget extends KwgP\Form {

	const CONTEXT_SELECT_FEED = 'select_feed';
	const CONTEXT_SELECT_FEED_WIDGET = "select_feed_in_widget";

	public function init() {

		$this->setAttrib('id', 'feedWidget');

		$oSelectFeedName = new \Zend_Form_Element_Select('selectFeedName');
		$aKeys = array();
		$aValues = array();
		$aFeedNames = $this->_getFeedNames();

		$aFeedNameOptions = array('0' => 'Select data feed');

		foreach($aFeedNames as $aFeedName) {
			$aFeedNameOptions[$aFeedName['feed_slug']] = $aFeedName['feed_name'];

		}

		$oSelectFeedName->addMultiOptions($aFeedNameOptions);
//		$oSelectFeedName->addMultiOptions($aFeedNameSlug);
		$oSelectFeedName->setLabel('');
		$oSelectFeedName->setAttrib('class', 'cSelectFeedName');
		$oSelectFeedName->setValue('0');

		switch ($this->_sContext) {
			case self::CONTEXT_SELECT_FEED :
				$aFeedParameters = $this->_aParameters['feed_parameters'];

				$aElements[] = $oSelectFeedName;

				foreach ($aFeedParameters as $sFieldName => $sDefaultValue) {

					$oParameterField = new \Zend_Form_Element_Text($sFieldName);
					$oParameterField->setValue($sDefaultValue);
//					$oParameterField->setLabel(ucfirst($sFieldName));
					$aElements[] = $oParameterField;

				}

				$this->addElements($aElements);

				break;

			case self::CONTEXT_SELECT_FEED_WIDGET:
				$aElements[] = $oSelectFeedName;
				$this->addElements($aElements);

				$this->_sViewScript = '/forms/generic_two_column_widget.phtml';

				break;

			default:
				$sAdminUrl = admin_url('admin-ajax.php');
				$this->setAction($sAdminUrl);

				$aElements = array($oSelectFeedName);

				$this->addElements($aElements);
				break;
		}

		if ($this->_sViewScript == '') {
			$this->_sViewScript = '/forms/generic_two_column_custom.phtml';
		}

		$this->setDecorators(array(array('ViewScript', array('viewScript' => $this->_sViewScript))));

	}

	private function _getFeedNames (){
		$oDaoParticipantRegistry = new JDDao\JsonData();
		$aFeedNames = $oDaoParticipantRegistry->getAllFeedNames();
		return $aFeedNames;
	}

}