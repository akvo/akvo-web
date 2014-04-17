<?php
namespace JsonData\Admin\Controller\Feed;

use JsonData\Admin\Controller\Base as JDAdminControllerBase;
/**
 * Description of Registrant
 *
 * @author Jayawi Perera
 */
class Remove extends JDAdminControllerBase {

	const MENU_SLUG = 'JD_feed_remove';

	public function initialise () {

		$sHookName = add_submenu_page(
				null,
				'Json Data',
				'Settings',
				\JsonData\Config::CAPABILITY_GENERAL_NAME,
				self::MENU_SLUG,
				array($this, 'page')
			);

		//		add_action('admin_print_styles', array($this, 'enqueueAdminIconCss'));

		add_action('admin_print_scripts-' . $sHookName, array($this, 'enqueueBootstrapJs'));
		add_action('admin_print_scripts-' . $sHookName, array($this, 'enqueueKwgTimer'));
		add_action('admin_print_scripts-' . $sHookName, array($this, 'enqueueAdminJs'));

		add_action('admin_print_styles-' . $sHookName, array($this, 'enqueueBootstrapCss'));
		add_action('admin_print_styles-' . $sHookName, array($this, 'enqueueFontAwesomeCss'));
		add_action('admin_print_styles-' . $sHookName, array($this, 'enqueueAdminCss'));

	}

	public function page () {

		$oFormHandler = new \JsonData\Admin\Model\FormHandler();
		$aContent = $oFormHandler->remove();

		include_once JsonData_Plugin_Dir . '/src/Admin/View/scripts/feed/remove.phtml';

	}

}