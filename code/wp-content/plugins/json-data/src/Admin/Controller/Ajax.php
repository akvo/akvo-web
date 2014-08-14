<?php
namespace JsonData\Admin\Controller;

/**
 * Description of Ajax
 *
 * @author Jayawi Perera
 */
class Ajax {

	public static function export () {

		$aResponse = array();

		if (isset($_POST)) {

			if (isset($_POST['batch'])) {

				$sBatch = $_POST['batch'];

				$oRegistry = new \JsonData\Admin\Model\Registry();
				$sPathToFile = $oRegistry->export($sBatch);

				$aResponse['status'] = 'successful';
				$aResponse['message'] = 'Download List request successful. Click the button below to download.';
				$aResponse['link'] = $sPathToFile;


			} else {
				$aResponse['status'] = 'failed';
				$aResponse['message'] = 'Download List request failed. Required data has not been provided.';
			}

		} else {
			$aResponse['status'] = 'failed';
			$aResponse['message'] = 'Download List request failed. The request type is invalid.';
		}

		echo json_encode($aResponse);
		die();

	}

    public static function parse_feed_url(){
        $aResponse = array();

		if (isset($_POST)) {

			if (isset($_POST['url'])) {

				$sUrl = $_POST['url'];

				$aUrl = parse_url($sUrl);
                $aParams = array();
                parse_str($aUrl['query'],$aParams);
				$aResponse['status'] = 'successful';
				$aResponse['message'] = array_keys($aParams);


			} else {
				$aResponse['status'] = 'failed';
				$aResponse['message'] = 'URL has not been provided.';
			}

		} else {
			$aResponse['status'] = 'failed';
			$aResponse['message'] = 'Parse URL request failed. The request type is invalid.';
		}

		echo json_encode($aResponse);
		die();
    }
    public static function parse_feed_slug(){
        $aResponse = array();

		if (isset($_POST)) {

			if (isset($_POST['name'])) {

				$title = $_POST['name'];


				$aResponse['status'] = 'successful';
				$aResponse['message'] = sanitize_title_with_dashes( $title );


			} else {
				$aResponse['status'] = 'failed';
				$aResponse['message'] = 'URL has not been provided.';
			}

		} else {
			$aResponse['status'] = 'failed';
			$aResponse['message'] = 'Parse URL request failed. The request type is invalid.';
		}

		echo json_encode($aResponse);
		die();
    }
    public static function get_feed_example(){
        $aResponse = array();

		if (isset($_POST)) {

			if (isset($_POST['jsonurl'])) {

				$url = $_POST['jsonurl'];


				$aResponse['status'] = 'successful';
				$aResponse['message'] = file_get_contents($url);


			} else {
				$aResponse['status'] = 'failed';
				$aResponse['message'] = 'URL has not been provided.';
			}

		} else {
			$aResponse['status'] = 'failed';
			$aResponse['message'] = 'Parse URL request failed. The request type is invalid.';
		}

		echo json_encode($aResponse);
		die();
    }

	public function getFeedParameters () {
		$aResponse = array();
		$aResponse['status'] = 'failed';

		if ($_POST) {
			if ($_POST['feedSlug']) {
				$sFeedSlug = $_POST['feedSlug'];

				$oDaoJsonData = new \JsonData\Common\Model\Dao\JsonData();
				$aDetail = $oDaoJsonData->fetchFeedBySlug($sFeedSlug);

				if (!empty($aDetail)) {
					$aFeedParameters = unserialize($aDetail['feed_parameters']);
					$iFeedId = $aDetail['id'];

					$aResponse['feedParameters'] = $aFeedParameters;
					$aResponse['feedId'] = $iFeedId;
					$aResponse['status'] = 'successful';

				} else {

				}

			}
		}

		echo json_encode($aResponse);
		die();
	}

	public function getFeedParametersWidget () {
		$aResponse = array();
		$aResponse['status'] = 'failed';


		if ($_POST) {
			if ($_POST['feedSlug']) {

				$sFeedSlug = $_POST['feedSlug'];
				$aWidgetId = explode('-', $_POST['widgetId']);
				$iWidgetId = $aWidgetId[1];


				$oDaoJsonData = new \JsonData\Common\Model\Dao\JsonData();
				$aDetail = $oDaoJsonData->fetchFeedBySlug($sFeedSlug);

				if (!empty($aDetail)) {
					$aFeedParameters = unserialize($aDetail['feed_parameters']);

					$sHtml = '';
					foreach ($aFeedParameters as $sFeedName => $sDefaultValue) {
						$sHtml .= '<p>';
						$sHtml .= '<div class="cDivElementContainer">';

						$sHtml .= '<label>' . ucfirst($sFeedName) . '</label>';
						$sHtml .= '<input type="text" name="widget-jsonwidget['. $iWidgetId . ']['. $sFeedName . ']" value="'.$sDefaultValue. '" class="widefat">';

						$sHtml .= '</div>';
						$sHtml .= '</p>';
					}

					$iFeedId = $aDetail['id'];
					$sHtml .= '<input type="hidden" name="widget-jsonwidget[' .$iWidgetId . '][hiddenFeedId]]" value="' . $iFeedId . '">';

					$aResponse['html'] = $sHtml;
					$aResponse['feedId'] = $iFeedId;
					$aResponse['status'] = 'successful';

				} else {

				}

			}
		}

		echo json_encode($aResponse);
		die();
	}

	public function insertParameters () {
		$aResponse = array();
		$aResponse['status'] = 'failed';

		if ($_POST) {

			$aFormValues = $_POST;
//			$iFeedId = $aFormValues['hiddenFeedId'];
			$oFeedWidgetHandler = new \JsonData\Admin\Model\FeedWidgetHandler();
			$aContent = $oFeedWidgetHandler->editorWidget($aFormValues);

			if (!empty($aContent)) {
				if ($aContent['isFormValid'] == true) {

					if ($aContent['status'] == 'success') {
						$aFeedParameters = $aFormValues['textParam'];

						$sShortcode = 'jsondata_feed ';
						$sShortcode .= 'slug="'.$aContent['slug'].'" ';
						foreach ($aFeedParameters as $sParameterKey => $mParameterValue) {
							$sShortcode .= $sParameterKey . '="'.$mParameterValue.'" ';
						}

						$aResponse['shortcode'] = ' ['. $sShortcode . ']';
						$aResponse['status'] = 'success';
					} else {
						$aResponse['message'] = $aContent['message'];
					}
				} else {
					//form has errors
				}

			}



		} else {
			$aResponse['message'] = 'The request type is invalid.';
		}

		echo json_encode($aResponse);
		die();
	}

	public function initWidgetForm () {
		$oForm = new \JsonData\Admin\Form\FeedWidget();

		$sHtml = '';
		
		$sHtml .= "<div class=\"cDivFormContainer\">";
		$sHtml .= $oForm;
		$sHtml .= "</div>";

		$sHtml .= "<button class=\"cButtonSave\">Insert</button>";

		$sHtml .= "<div id=\"testTarget\"></div>";

		$sHtml .= "<div class=\"cDivAjaxLoader\">";
		$sHtml .= "<img class=\"cImageAjaxLoader\" src=\"". JsonData_Plugin_Url . "/assets/img/ajax-loader.gif\" style=\"display:none\"/>";
		$sHtml .= "</div>";

		echo $sHtml;
		die();
	}

}