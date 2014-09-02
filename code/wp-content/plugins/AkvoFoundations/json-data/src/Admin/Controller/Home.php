<?php
namespace JsonData\Admin\Controller;

/**
 * Description of Home
 *
 * @author Jayawi Perera
 */
class Home extends Base {

	const MENU_SLUG = 'JD_home';

	public function initialise () {

		$sHookName = add_menu_page(
				'Json Data',
				'Json Data',
				'manage_options',
				self::MENU_SLUG,
				array($this, 'page'),
				JsonData_Plugin_Url . '/assets/img/akvo_wvw_pr_icon.png',
				null
			);

		//		add_action('admin_print_styles', array($this, 'enqueueAdminIconCss'));

		add_action('admin_print_scripts-' . $sHookName, array($this, 'enqueueBootstrapJs'));
		add_action('admin_print_scripts-' . $sHookName, array($this, 'enqueueKwgTbsJs'));
		add_action('admin_print_scripts-' . $sHookName, array($this, 'enqueueHomeJs'));

		add_action('admin_print_styles-' . $sHookName, array($this, 'enqueueBootstrapCss'));
		add_action('admin_print_styles-' . $sHookName, array($this, 'enqueueFontAwesomeCss'));
		add_action('admin_print_styles-' . $sHookName, array($this, 'enqueueAdminCss'));

	}

	public function page () {

		
		// Fetch Schools that have Registered
		$oFeed = new \JsonData\Admin\Model\Feed();
		$aContent['list'] = $oFeed->getList();
		$aContent['page-config'] = array(
			'page' => self::MENU_SLUG,
		);

		include_once JsonData_Plugin_Dir . '/src/Admin/View/scripts/home/home.phtml';

	}

	public function enqueueHomeJs () {

		wp_register_script(JsonData_Plugin_Slug . '-admin-home', JsonData_Plugin_Url . '/assets/js/admin/home.js');
		wp_enqueue_script(JsonData_Plugin_Slug . '-admin-home');

	}

}