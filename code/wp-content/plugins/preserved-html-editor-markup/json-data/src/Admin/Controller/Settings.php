<?php
namespace JsonData\Admin\Controller;
/**
 * Description of Settings
 *
 * @author Jayawi Perera
 */
class Settings extends Base {

	const MENU_SLUG = 'JD_settings';

	public function initialise () {

		$sHookName = add_submenu_page(
				Home::MENU_SLUG,
				'Json Data',
				'Settings',
				'manage_options',
				self::MENU_SLUG,
				array($this, 'page')
			);

		//		add_action('admin_print_styles', array($this, 'enqueueAdminIconCss'));

		add_action('admin_print_scripts-' . $sHookName, array($this, 'enqueueBootstrapJs'));
		add_action('admin_print_scripts-' . $sHookName, array($this, 'enqueueAdminJs'));

		add_action('admin_print_styles-' . $sHookName, array($this, 'enqueueBootstrapCss'));
		add_action('admin_print_styles-' . $sHookName, array($this, 'enqueueFontAwesomeCss'));
		add_action('admin_print_styles-' . $sHookName, array($this, 'enqueueAdminCss'));

	}

	public function page () {
		$oSettings = new \JsonData\Admin\Model\Settings();
		$aContent = $oSettings->manage();

		include_once JsonData_Plugin_Dir . '/src/Admin/View/scripts/settings/settings.phtml';

	}

}