<?php
namespace JsonData;
/**
 * Description of Config
 *
 * @author Jayawi Perera
 */
class Config {

	const SHORTCODE_JSON_DATA = 'jsondata_feed';


	const CAPABILITY_GENERAL_NAME = 'jsondata_cap_general';
	const CAPABILITY_RESTRICTED_NAME = 'jsondata_cap_restricted';
    const OPTION_NAME_CRON_SETTINGS = 'jsondata_cron_setting';

	public static function getFormViewScriptBasePaths () {
		return array(
			JsonData_Plugin_Dir . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'Fe' .DIRECTORY_SEPARATOR . 'View' . DIRECTORY_SEPARATOR,
			JsonData_Plugin_Dir . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'Admin' .DIRECTORY_SEPARATOR . 'View' . DIRECTORY_SEPARATOR,
		);
	}

	public static function getHomeRedirectUrl () {

		return menu_page_url(\JsonData\Admin\Controller\Home::MENU_SLUG, false);

	}

}