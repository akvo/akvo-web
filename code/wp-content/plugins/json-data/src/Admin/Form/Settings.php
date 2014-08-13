<?php
namespace JsonData\Admin\Form;

use KwgPress as KwgP;
/**
 * Description of Settings
 *
 * @author Jayawi Perera
 */
class Settings extends KwgP\Form {

	protected $_sPluginSlug = JsonData_Plugin_Slug;

	public function init() {

		$oServerCron = new \Zend_Form_Element_Radio('radioServerCron');
		$oServerCron->setLabel('Select cronjob handler');
        $oServerCron->setMultiOptions(array('true'=>'Server','false'=>'WP cron'));

		
		$oSubmit = new \Zend_Form_Element_Button('submitSubmit');
		$oSubmit->setLabel('Submit')
				->setAttrib('type', 'submit')
				->setDecorators(array('ViewHelper'));

		switch ($this->_sContext) {

			case self::CONTEXT_CREATE:

				
				$oSubmit->setLabel('<i class="icon icon-save"></i>&nbsp; Save')
						->setAttrib('escape', false)
						->setAttrib('class', 'btn btn-success');

				$aCreateElements = array(
					$oServerCron,
					$oSubmit,
				);
				$this->addElements($aCreateElements);

				break;

		}

		$this->_sViewScript = '/forms/settings.phtml';
//		$this->_sViewScript = '/forms/generic_two_column.phtml';

		$this->setDecorators(array(array('ViewScript', array('viewScript' => $this->_sViewScript))));

	}

}