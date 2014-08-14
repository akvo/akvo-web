<?php
namespace JsonData\Admin\Form;

use KwgPress as KwgP;
/**
 * Description of Definition
 *
 * @author Jayawi Perera
 */
class Feed extends KwgP\Form {

	protected $_sPluginSlug = JsonData_Plugin_Slug;

	public function init() {

		$oId = new \Zend_Form_Element_Hidden('hiddenId');

		$oName = new \Zend_Form_Element_Text('textName');
		$oName->setLabel('Feed name');

		$oHiddenSlug = new \Zend_Form_Element_Hidden('hiddenSlug');
		$oSlug = new \Zend_Form_Element_Text('textSlug');
        $oSlug->setAttrib('disabled', 'true');
		$oSlug->setLabel('Feed slug');

		$oURL = new \Zend_Form_Element_Text('textUrl');
		$oURL->setLabel('JSON feed URL');

		$oUpdateInterval = new \Zend_Form_Element_Select('selectUpdateInterval');
        $oUpdateInterval->addMultiOptions(array(
            '1h'=>'Every hour',
            '4h'=>'Every 4 hours',
            '8h'=>'Every 8 hours',
            '12h'=>'Every 12 hours',
            '1d'=>'Every day',
            '1w'=>'Every week',
            '1m'=>'Every month'
        ));
		$oUpdateInterval->setLabel('Update interval');

		$oMarkup = new \Zend_Form_Element_Textarea('textTemplateMarkup');
		$oMarkup->setLabel('Template Markup');
		
        $oStylesheet = new \Zend_Form_Element_Textarea('textTemplateStylesheet');
		$oStylesheet->setLabel('Template Stylesheet');

		

		$oSubmit = new \Zend_Form_Element_Button('submitSubmit');
		$oSubmit->setLabel('Submit')
				->setAttrib('type', 'submit')
				->setAttrib('class', 'btn')
				->setDecorators(array('ViewHelper'));
		$oPreview = new \Zend_Form_Element_Button('previewData');
		$oPreview->setLabel('Preview')
				->setAttrib('type', 'button')
				->setAttrib('class', 'btn btnPreview')
				->setDecorators(array('ViewHelper'));

		switch ($this->_sContext) {

			case self::CONTEXT_UPDATE:
			case self::CONTEXT_CREATE:

				$oName->setAttrib('class', 'input-xxlarge');
				$oSlug->setAttrib('class', 'input-xxlarge uneditable-input');
				$oURL->setAttrib('class', 'input-xxlarge');
				$oUpdateInterval->setAttrib('class', 'input-xxlarge');
				$oMarkup->setAttrib('class', 'input-xxlarge');
				$oStylesheet->setAttrib('class', 'input-xxlarge');
				$oName->setRequired(true);
				$oURL->setRequired(true);
				$oMarkup->setRequired(true);

				

				$oSubmit->setLabel('Submit');

				$aCreateElements = array(
					$oName,
                    $oHiddenSlug,
					$oSlug,
					$oURL,
					$oUpdateInterval,
					$oMarkup,
					$oStylesheet,
					

					$oSubmit,
				);
                if($this->_sContext==self::CONTEXT_UPDATE){
                    //$aCreateElements[]=$oPreview;
                }
				$this->addElements($aCreateElements);

				$this->_sViewScript = '/forms/feed_manage.phtml';

				break;

//			case self::CONTEXT_UPDATE:
//
//				$oName->setAttrib('class', 'input-xxlarge');
//				$oName->setRequired(true);
//				$oAddress->setAttrib('class', 'input-xxlarge');
//				$oAddress->setRequired(true);
//				$oCity->setAttrib('class', 'input-xlarge');
//				$oCity->setRequired(true);
//				$oPostalCode->setAttrib('class', 'input-xlarge');
//				$oPostalCode->setRequired(true);
//
//
//				$oContactName->setAttrib('class', 'input-xxlarge');
//				$oContactName->setRequired(true);
//				$oEmail->setAttrib('class', 'input-xlarge');
//				$oEmail->setRequired(true);
//				$oEmail->addValidator('EmailAddress');
//				$oPhone->setAttrib('class', 'input-xlarge');
//
//				$oParticipatedBefore->setSeparator(' ');
//
//				$oGrade7Groups->setAttrib('class', 'input-medium');
//				$oGrade7Groups->addValidator('Int');
//				$oGrade8Groups->setAttrib('class', 'input-medium');
//				$oGrade8Groups->addValidator('Int');
//				$oGrade67Groups->setAttrib('class', 'input-medium');
//				$oGrade67Groups->addValidator('Int');
//				$oGrade678Groups->setAttrib('class', 'input-medium');
//				$oGrade678Groups->addValidator('Int');
//				$oGrade78Groups->setAttrib('class', 'input-medium');
//				$oGrade78Groups->addValidator('Int');
//
//				$oTotalStudents->setAttrib('class', 'input-medium');
//				$oTotalStudents->setRequired(true);
//				$oTotalStudents->addValidator('Int');
//
//				$oSupportPoint->setAttrib('class', 'input-xxlarge');
//				$oSupportPoint->setRequired(true);
//
//				$oWalkDate->setAttrib('class', 'input-xlarge cDatePicker');
//				$oWalkDate->setAttrib('data-date-format', 'dd-mm-yyyy');
//				$oWalkDate->setAttrib('data-date-autoclose', 'true');
//
//				$oWalkDate->addValidator(
//						'Date',
//						true,
//						array(
//							'format' => 'dd-MM-YYYY',
//							'messages' => array(
//								\Zend_Validate_Date::INVALID => "'%value%' lijkt geen geldige datum te zijn",
//								\Zend_Validate_Date::INVALID_DATE => "'%value%' lijkt geen geldige datum te zijn",
//								\Zend_Validate_Date::FALSEFORMAT => "'%value%' lijkt geen geldige datum te zijn",
//							),
//
//						)
//					);
//
//				$oWalkCity->setAttrib('class', 'input-xlarge');
//
//				$oComments->setAttrib('rows', 10);
//				$oComments->setAttrib('class', 'input-xxlarge');
//
//				$oBatch->setAttrib('class', 'input-medium');
//				$oBatch->setRequired(true);
//				$oBatch->addValidator('Int');
//				$oBatch->addValidator('Between', true, array('min' => 2000, 'max' => ((int)date("Y") + 1)));
//
//				$oLatitude->setAttrib('class', 'input-xlarge');
////				$oLatitude->setRequired(true);
////				$oLatitude->addValidator('Float', true);
////				$oLatitude->addValidator('Between', true, array('min' => -90, 'max' => 90));
//
//				$oLongitude->setAttrib('class', 'input-xlarge');
////				$oLongitude->setRequired(true);
////				$oLongitude->addValidator('Float', true);
////				$oLongitude->addValidator('Between', true, array('min' => -180, 'max' => 180));
//
//				$oSubmit->setLabel('<i class="icon icon-save"></i>&nbsp; Save')
//						->setAttrib('escape', false)
//						->setAttrib('class', 'btn btn-success');
//
//				$aUpdateElements = array(
//					$oName,
//					$oAddress,
//					$oCity,
//					$oPostalCode,
//					$oContactName,
//					$oEmail,
//					$oPhone,
//
//					$oParticipatedBefore,
//					$oParticipatedLastYear,
//					$oParticipatedYearBeforeLast,
//					$oParticipatedBeforeTheLast2Years,
//
//					$oGrade7Groups,
//					$oGrade8Groups,
//					$oGrade67Groups,
//					$oGrade678Groups,
//					$oGrade78Groups,
//					$oTotalStudents,
//
//					$oSupportPoint,
//					$oWalkDate,
//					$oWalkCity,
//
//					$oComments,
//
//					$oBatch,
//					$oLatitude,
//					$oLongitude,
//
//					$oSubmit,
//				);
//				$this->addElements($aUpdateElements);
//
//				$this->_sViewScript = '/forms/registrant_manage.phtml';
//
//				break;
//
//			case self::CONTEXT_DELETE:
//
//				$oName->setAttrib('class', 'input-xxlarge');
//				$oName->setAttrib('readonly', true);
//
//				$oAddress->setAttrib('class', 'input-xxlarge');
//				$oAddress->setAttrib('readonly', true);
//
//				$oCity->setAttrib('class', 'input-xlarge');
//				$oCity->setAttrib('readonly', true);
//
//				$oPostalCode->setAttrib('class', 'input-xlarge');
//				$oPostalCode->setAttrib('readonly', true);
//
//				$oContactName->setAttrib('class', 'input-xxlarge');
//				$oContactName->setAttrib('readonly', true);
//				$oEmail->setAttrib('class', 'input-xlarge');
//				$oEmail->setAttrib('readonly', true);
//				$oPhone->setAttrib('class', 'input-xlarge');
//				$oPhone->setAttrib('readonly', true);
//
//				$oParticipatedBefore->setSeparator(' ');
//				$oParticipatedBefore->setAttrib('readonly', true);
//				$oParticipatedLastYear->setAttrib('readonly', true);
//				$oParticipatedYearBeforeLast->setAttrib('readonly', true);
//				$oParticipatedBeforeTheLast2Years->setAttrib('readonly', true);
//
//				$oGrade7Groups->setAttrib('class', 'input-medium');
//				$oGrade7Groups->setAttrib('readonly', true);
//				$oGrade8Groups->setAttrib('class', 'input-medium');
//				$oGrade8Groups->setAttrib('readonly', true);
//				$oGrade67Groups->setAttrib('class', 'input-medium');
//				$oGrade67Groups->setAttrib('readonly', true);
//				$oGrade678Groups->setAttrib('class', 'input-medium');
//				$oGrade678Groups->setAttrib('readonly', true);
//				$oGrade78Groups->setAttrib('class', 'input-medium');
//				$oGrade78Groups->setAttrib('readonly', true);
//
//				$oTotalStudents->setAttrib('class', 'input-medium');
//				$oTotalStudents->setAttrib('readonly', true);
//
//				$oSupportPoint->setAttrib('class', 'input-xxlarge');
//				$oSupportPoint->setAttrib('readonly', true);
//
//				$oWalkDate->setAttrib('class', 'input-xlarge');
//				$oWalkDate->setAttrib('readonly', true);
//				$oWalkCity->setAttrib('class', 'input-xlarge');
//				$oWalkCity->setAttrib('readonly', true);
//
//				$oComments->setAttrib('rows', 10);
//				$oComments->setAttrib('class', 'input-xxlarge');
//				$oComments->setAttrib('readonly', true);
//
//				$oBatch->setAttrib('class', 'input-medium');
//				$oBatch->setAttrib('readonly', true);
//				$oLatitude->setAttrib('class', 'input-xlarge');
//				$oLatitude->setAttrib('readonly', true);
//				$oLongitude->setAttrib('class', 'input-xlarge');
//				$oLongitude->setAttrib('readonly', true);
//
//				$oSubmit->setLabel('<i class="icon icon-trash"></i>&nbsp; Remove')
//						->setAttrib('escape', false)
//						->setAttrib('class', 'btn btn-danger')
//						->setAttrib('data-toggle', 'modal')
//						->setAttrib('data-target', '#iDivModalRemoveRegistrant');
//
//				$aDeleteElements = array(
//					$oName,
//					$oAddress,
//					$oPostalCode,
//					$oCity,
//					$oContactName,
//					$oEmail,
//					$oPhone,
//
//					$oParticipatedBefore,
//					$oParticipatedLastYear,
//					$oParticipatedYearBeforeLast,
//					$oParticipatedBeforeTheLast2Years,
//
//					$oGrade7Groups,
//					$oGrade8Groups,
//					$oGrade67Groups,
//					$oGrade678Groups,
//					$oGrade78Groups,
//					$oTotalStudents,
//
//					$oSupportPoint,
//					$oWalkDate,
//					$oWalkCity,
//
//					$oComments,
//
//					$oBatch,
//					$oLatitude,
//					$oLongitude,
//
//					$oSubmit,
//				);
//				$this->addElements($aDeleteElements);
//
//				$this->_sViewScript = '/forms/registrant_manage.phtml';
//
//				break;

		}

		if ($this->_sViewScript == '') {
			$this->_sViewScript = '/forms/generic_two_column.phtml';
		}

		$this->setDecorators(array(array('ViewScript', array('viewScript' => $this->_sViewScript))));

	}

	

}