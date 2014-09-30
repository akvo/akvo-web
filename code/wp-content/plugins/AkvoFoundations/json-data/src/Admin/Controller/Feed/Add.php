<?php
namespace JsonData\Admin\Controller\Feed;

use JsonData\Admin\Controller\Base as JDAdminControllerBase;
use JsonData\Admin\Controller\Home as JDAdminControllerHome;
use JsonData\Admin\Controller\Ajax as JDAdminControllerAjax;
/**
 * Description of Registrant
 *
 * @author Jayawi Perera
 */
class Add extends JDAdminControllerBase {

	const MENU_SLUG = 'JD_feed_add';

	public function initialise () {

		$sHookName = add_submenu_page(
				JDAdminControllerHome::MENU_SLUG,
				'Json Data',
				'Add',
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

		$oFormHandler = new \JsonData\Admin\Model\FormHandler();
		$aContent = $oFormHandler->add();
        

		include_once JsonData_Plugin_Dir . '/src/Admin/View/scripts/feed/add.phtml';

	}

	
	


}