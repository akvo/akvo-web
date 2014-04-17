<?php
namespace JsonData;

use KwgPress as KwgP;
//use KwgPressFormSetUp\Version\Manager as KwgPFSVersioNManager;
/**
 * Primary Controller for the entire Plugin
 *
 * @author Jayawi Perera
 */
class Controller {

	const KWGPRESS_CORE_FUNCTION = 'is_kwgpress_core_active';

	public static $oInstance = null;

	public static function getInstance () {

			
		if (is_null(self::$oInstance)) {
            self::$oInstance = new self;
		}

		return self::$oInstance;

	}

	private function _isCoreActive () {

		return function_exists(self::KWGPRESS_CORE_FUNCTION);

	}

	public function initialise () {

		register_activation_hook(JsonData_Plugin_File, array('JsonData\Controller', 'doActivation'));
		register_deactivation_hook(JsonData_Plugin_File, array('JsonData\Controller', 'doDeactivation'));
		register_uninstall_hook(JsonData_Plugin_File, array('JsonData\Controller', 'doUninstall'));
		add_action('activated_plugin', array('JsonData\Controller', 'setToLoadLast'));
        $this->_syncTable();
		if ($this->_isCoreActive()) {

			$this->_initForms();

			if (is_admin()) {
				// Dashboard

				$oAdminController = new Admin\Controller();
				$oAdminController->initialise();

			} else {
				// Front-end
				$oFrontEndController = new Fe\Controller();
				$oFrontEndController->initialise();

			}

		} else {

			if (is_admin()) {
				// Dashboard

				$oAdminController = new Admin\Controller();
				$oAdminController->initialiseLimited();

			} else {
				// Front-end


			}

		}

	}

	private function _initForms () {

		// Set View Script Base Paths
		KwgP\Form::setViewScriptBasePaths(Config::getFormViewScriptBasePaths());

		// Set Translation Language
		$aTranslations = require_once JsonData_Plugin_Dir . '/resources/Zend/languages/nl/Zend_Validate.php';
		$oTranslator = new \Zend_Translate(
			array(
				'adapter' => 'array',
				'content' => $aTranslations,
				'locale' => 'nl',
			)
		);
		\Zend_Validate::setDefaultTranslator($oTranslator);

	}

    private function _syncTable(){
        $oDaoRegister = new Common\Model\Dao\JsonData();
		$oDaoRegister->synctable();
    }
	public static function doActivation () {
        add_option(\JsonData\Config::OPTION_NAME_CRON_SETTINGS, 'true');
        $oFeed = new Common\Model\Feed();
        $oFeed->scheduleCron();
        
		$oDaoRegister = new Common\Model\Dao\JsonData();
		$oDaoRegister->createTable();

		

		get_role("administrator")->add_cap(\JsonData\Config::CAPABILITY_GENERAL_NAME);
		get_role("editor")->add_cap(\JsonData\Config::CAPABILITY_RESTRICTED_NAME);

	}

	public static function doDeactivation () {

		get_role("administrator")->remove_cap(\JsonData\Config::CAPABILITY_GENERAL_NAME);
		get_role("editor")->remove_cap(\JsonData\Config::CAPABILITY_RESTRICTED_NAME);

	}

	public static function doUninstall () {

		$oDaoRegister = new Common\Model\Dao\JsonData();
		$oDaoRegister->deleteTable();

//		delete_option(Config::OPTION_NAME_GOOGLE_MAPS_API_KEY);
//		delete_option(Config::OPTION_NAME_GOOGLE_MAPS_DEFAULT_ZOOM_FACTOR);
//		delete_option(Config::OPTION_NAME_GOOGLE_MAPS_DEFAULT_CENTER_POINT);

	}

	public static function setToLoadLast () {

		$sThisPluginFile = JsonData_Plugin_DirFile;

		$aActivePlugins = get_option('active_plugins');
		$iPluginCount = count($aActivePlugins);

		$iThisPluginKey = array_search($sThisPluginFile, $aActivePlugins);

		if ($iThisPluginKey != ($iPluginCount - 1)) {

			array_splice($aActivePlugins, $iThisPluginKey, 1);
			$aActivePlugins[] = $sThisPluginFile;
			update_option('active_plugins', $aActivePlugins);

		}

	}

}