<?php
namespace JsonData\Admin;
/**
 * Description of Controller
 *
 * @author Eveline Sparreboom
 */

use JsonData\Controller\JsonWidget as JsonWidget;

class Controller {

	public function initialise () {
        
		$oHomeController = new Controller\Home();
		add_action('admin_menu', array($oHomeController, 'initialise'));

		$oSettingsController = new Controller\Settings();
		add_action('admin_menu', array($oSettingsController, 'initialise'));
//
		$oRegistrantDetailController = new Controller\Feed\Detail();
		add_action('admin_menu', array($oRegistrantDetailController, 'initialise'));

		$oRegistrantAddController = new Controller\Feed\Add();
		add_action('admin_menu', array($oRegistrantAddController, 'initialise'));

        $oRegistrantEditController = new Controller\Feed\Edit();
		add_action('admin_menu', array($oRegistrantEditController, 'initialise'));

		$oRegistrantRemoveController = new Controller\Feed\Remove();
		add_action('admin_menu', array($oRegistrantRemoveController, 'initialise'));

		$oFeedInsertController = new Controller\EditorWidget();
		add_action('admin_init', array($oFeedInsertController, 'initialise'));

		$this->_initialiseAjax();

		$this->_initialiseJsonDataWidget();

	}

	public function initialiseLimited () {

		$oLimitedHomeController = new Controller\LimitedHome();
		add_action('admin_menu', array($oLimitedHomeController, 'initialise'));

	}

	private function _initialiseAjax () {

		$oAjaxController = new Controller\Ajax();
		add_action('wp_ajax_' . JsonData_Plugin_Slug . '_parse_feed_url', array($oAjaxController, 'parse_feed_url'));
		add_action('wp_ajax_' . JsonData_Plugin_Slug . '_parse_feed_slug', array($oAjaxController, 'parse_feed_slug'));
		add_action('wp_ajax_' . JsonData_Plugin_Slug . '_get_feed_example', array($oAjaxController, 'get_feed_example'));

		add_action('wp_ajax_' . JsonData_Plugin_Slug . '_initWidgetForm', array($oAjaxController, 'initWidgetForm'));

		add_action('wp_ajax_' . JsonData_Plugin_Slug . '_getFeedParameters', array($oAjaxController, 'getFeedParameters'));
		add_action('wp_ajax_' . JsonData_Plugin_Slug . '_getFeedParametersWidget', array($oAjaxController, 'getFeedParametersWidget'));

		add_action('wp_ajax_' . JsonData_Plugin_Slug . '_insertFeedParameters', array($oAjaxController, 'insertParameters'));


	}

	private function _initialiseJsonDataWidget () {

		add_action( 'widgets_init', function(){
			register_widget( 'JsonData\Common\Model\JsonWidget' );
		});
	}

}