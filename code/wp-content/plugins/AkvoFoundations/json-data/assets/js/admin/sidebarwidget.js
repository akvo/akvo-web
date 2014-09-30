jQuery(document).ready(function ($) {

	$(document).on('change','.cSelectFeedName', function () {
		var oSelect = $(this);
		var oCurrentWidgetForm = oSelect.closest('form');
		var oHiddenWidgetId = oCurrentWidgetForm.find('.widget-id');
		var iWidgetId = oHiddenWidgetId.val();

		$('.cImageAjaxLoader').show();

		var sFeedSlug = $(this).find(":selected").val(); //get feedslug

		if (sFeedSlug != 0) {
			$.ajax({
				cache : false,
				data : {
					action : 'JsonData_getFeedParametersWidget',
					feedSlug : sFeedSlug,
					widgetId : iWidgetId
				},
				dataType: 'json',
				type: 'POST',
				url: ajaxurl
			}).done(function (oResponse, sTextStatus, oJqXhr) {

				if (oResponse.status != 'failed') {//
					var sHtml = oResponse.html;

					oCurrentWidgetForm.find('.cDivAjaxReturnJDWidget').html(sHtml);
//					$('.cDivAjaxReturnJDWidget').html(sHtml);
//					$('.cButtonSave').show();

					$('.cImageAjaxLoader').hide();

				} else {
					console.log('failed');
				}
			});
		} else {
			//if 0 get selected
			var sHtml = '';
			sHtml += '<div class="cMessage">';
			sHtml +=	'Select a feed name from list';
			sHtml += '</div>';

			oCurrentWidgetForm.find('.cDivAjaxReturnJDWidget').html(sHtml);

			$('.cImageAjaxLoader').hide();
		}

	});

//	});
});