<?php
namespace JsonData\Common\Model;

use JsonData\Common\Model\Dao as JDDao;
use JsonData\Fe\Controller\Feed as JDFeed;

/**
 * Description of Widget
 *
 * @author Uthpala Sandirigama
 */

//use JsonData\Common\Model\Dao\JsonData as JsonData;

class JsonWidget extends \WP_Widget {

//	private $oInstance = '';

	function __construct() {

        parent::__construct(
				'JsonWidget',
				'External Data Widget',
				'External Data Widget Desc'
		);

		add_action('sidebar_admin_setup', array($this,'enqueueFeedWidgetJs')); //sidebarwidget.js only

	}


	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );

		echo $args['before_widget'];
		if ( ! empty( $title ) )
			echo $args['before_title'] . $title . $args['after_title'];
		$oFeed = new JDFeed();
        $oFeed->display(array('id'=>$instance['queue_id']));
		echo $args['after_widget'];
	}



	public function update($new_instance, $old_instance) {
		$aContent = array();
        
		$instance = $old_instance;
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$oFeedWidgetHandler = new \JsonData\Admin\Model\FeedWidgetHandler();
		$aContent = $oFeedWidgetHandler->sidebarWidget($new_instance);

		if ($aContent['status'] === 'success') {
			$instance['queue_id'] = $aContent['queue_id'];
		}

		return $instance;
	}

	public function form($instance) {
		$aQueueData = array();

		if (!empty($instance)) {
			$iQueueId = $instance['queue_id'];

			$oDaoJsonData = new \JsonData\Common\Model\Dao\JsonData();
			$aQueueData = $oDaoJsonData->fetchSingleFeedQueue($iQueueId);

			$iFeedDataId = $aQueueData['json_data_id'];
			$aSingleFeed = $oDaoJsonData->fetchFeed($iFeedDataId);

		}

		$oDaoParticipantRegistry = new JDDao\JsonData();
		$aFeedNames = $oDaoParticipantRegistry->getAllFeedNames();
		include JsonData_Plugin_Dir . '/src/Admin/View/scripts/widget/sidebar.phtml';

	}

	public function enqueueFeedWidgetJs () {

		wp_enqueue_script(JsonData_Plugin_Slug . '-admin-sidebarwidget.js', JsonData_Plugin_Url . '/assets/js/admin/sidebarwidget.js', array('jquery'));

	}


}