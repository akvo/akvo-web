jQuery(document).ready(function ($) {

	//focus tinymce editor
	$(document).on('click', '.cAJdInsert', function () {
		var oEditor = tinymce.get('content');
		oEditor.focus();
	});


	//center overlay
	$('.thickbox').on('click', function(){
		var iWindowWidth = $(window).width();
		var iOverlayWidth = 300;
		var iLeftMargin = Math.round( (iWindowWidth - iOverlayWidth) / 2 );

		setTimeout(function () {
			$('#TB_window').css('margin-left', iLeftMargin + 'px');
		}, 2000);



	});

	//get feed parameters and display
	$(document).on('change','.cSelectFeedName', function () {
		$('.cImageAjaxLoader').show();

		var sFeedSlug = $(this).find(":selected").val(); //get feedslug

		if (sFeedSlug != 0 ) {
			$.ajax({
				cache : false,
				data : {
					action : 'JsonData_getFeedParameters',
					feedSlug : sFeedSlug
				},
				dataType: 'json',
				type: 'POST',
				url: ajaxurl
			}).done(function (oResponse, sTextStatus, oJqXhr) {

				if (oResponse.status != 'failed') {//
					var aFeedParameters = oResponse.feedParameters;

					var sHTML = '';
					for (var key in aFeedParameters) {
						if (aFeedParameters.hasOwnProperty(key)) {

						sHTML += '<div class="control-group ">';
						sHTML += '<label class="control-label" for="textParam-'+key+'">'+key+'</label>';
						sHTML += '<div class="controls">';
						sHTML += '<input type="text" name="textParam['+key+']" id="textParam-'+key+'" value="'+aFeedParameters[key]+'" class="">';
						sHTML += '</div>';
						sHTML += '</div>';

						}
					}

					sHTML += '<input type="hidden" value="'+oResponse.feedId+'" name="hiddenFeedId">';

//					$('#iDivAjaxReturnJDWidget').html(sHTML);
					$('.cDivAjaxReturnJDWidget').html(sHTML);
					$('.cButtonSave').show();

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

			$('.cDivAjaxReturnJDWidget').html(sHtml);

			$('.cButtonSave').hide();
			$('.cImageAjaxLoader').hide();
		}

	});

	// This is to save the parameters and insert shortcode in tinymce Editor. //Commented by Asfer
	$(document).on('click','.cButtonSave', function (e) {
        e.preventDefault();

		$('.cImageAjaxLoader').show();

		$('#feedWidget').ajaxForm({
			target : '#testTarget',
			dataType : 'json',
			data : {
				'action' : 'JsonData_insertFeedParameters'
			},
			success : function (data) {
				var sStatus = data.success;

				if (sStatus != 'failed') {
					tinymce.activeEditor.execCommand('mceInsertContent', false, data.shortcode);

					//close overlay
					$('#TB_closeWindowButton').click();

					$('.cImageAjaxLoader').hide();

				}
			}
		}).submit();

	});


//	});
});