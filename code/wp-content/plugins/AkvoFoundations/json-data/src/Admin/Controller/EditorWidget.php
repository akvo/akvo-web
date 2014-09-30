<?php
namespace JsonData\Admin\Controller;

use JsonData\Admin\Controller\Base as JDAdminControllerBase;

class EditorWidget extends JDAdminControllerBase {

	public function initialise () {

		add_action('admin_print_scripts-post-new.php', array($this, 'enqueueJqueryFormJs'));
		add_action('admin_print_scripts-post.php', array($this, 'enqueueJqueryFormJs'));

		add_action('admin_print_scripts-post-new.php', array($this, 'enqueueFeedWidgetJs'));
		add_action('admin_print_scripts-post.php', array($this, 'enqueueFeedWidgetJs'));

		add_action('admin_print_scripts-post-new.php', array($this, 'enqueueEditorCss'));
		add_action('admin_print_scripts-post.php', array($this, 'enqueueEditorCss'));

		add_action('media_buttons_context', array($this, 'addJdButton'));
		add_action('admin_footer', array($this, 'pagePopup'));
//		add_action('admin_enqueue_scripts', array($this, 'pagePopup'));

	}

	public function page () {
//		include_once JsonData_Plugin_Dir . '/src/Admin/View/scripts/feed/insert.phtml';
	}

	public function pagePopup () {

	}

	public function enqueueFeedWidgetJs () {

//		wp_register_script(JsonData_Plugin_Slug . '-admin-feedwidget.js', JsonData_Plugin_Url . '/assets/js/admin/feedwidget.js', array('jquery'));
		wp_enqueue_script(JsonData_Plugin_Slug . '-admin-tinymcewidget.js', JsonData_Plugin_Url . '/assets/js/admin/tinymcewidget.js', array('jquery'));

	}

	public function enqueueJqueryFormJs () {

		wp_enqueue_script(JsonData_Plugin_Slug . '-admin-jquery-form-js', JsonData_Plugin_Url . '/assets/js/library/jquery.form.min.js', array('jquery'));

	}

	public function enqueueEditorCss () {
		wp_enqueue_style(JsonData_Plugin_Slug . '-admin-widget-editor-css', JsonData_Plugin_Url . '/assets/css/widget/editor.css');
	}

	public function addJdButton ($context) {
	  $img = JsonData_Plugin_Url . '/assets/img/jd.png';

	  $container_id = 'popup_container';

	  $title = 'External Data Widget';

	  $ajax_url = add_query_arg(
		array(
			'action' => 'JsonData_initWidgetForm',
		),
		admin_url('admin-ajax.php')
		);
//
//	  $context .= "<a class='thickbox cAJdInsert' title='{$title}'
//		href='$ajax_url'?width=400&height=400&keepThis=true&inlineId={$container_id}'>
//		<img src='{$img}' height=\"20\" width=\"20\" /></a>";

	  $context .= "<a class='thickbox cAJdInsert' title='{$title}'
		href=\"{$ajax_url}&width=300&height=400&keepThis=true&inlineId={$container_id}\">
		<img src='{$img}' height=\"20\" width=\"20\" /></a>";

	  return $context;
	}
}

?>
