jQuery(document).ready(function($){



	$('.cFormErrorPopover').popover({
		html: true,
		placement: "bottom",
		trigger: "hover",
		title: '<span class="text-error"><i class="icon-warning-sign"></i>&nbsp;<strong>Error!</strong></span>'
	});
    $('#myModal').on('show', function () {
        var url = $('#textUrl').val();
        $.ajax({
                cache: false,
                data: {
                    action: 'JsonData_get_feed_example',
                    jsonurl: url
                },
                dataType: 'json',
                type: 'POST',
                url: ajaxurl
            }).done(function (oResponse, sTextStatus, oJqXhr) {
                var sReturn = oResponse.message;
                if(oResponse.status != 'failed'){
                    if(sReturn.length>0){

                        $('.jsonOutput').html(sReturn);
                        hljs.configure({tabReplace: '    '}); // 4 spaces
                        $('.jsonOutput').each(function(i, e) {hljs.highlightBlock(e)});
                    }
                }else{
                    alert(sReturn);
                }
            });
      });
    
    $(document).delegate('textarea', 'keydown', function(e) {
        var keyCode = e.keyCode || e.which;

        if (keyCode == 9) {
          e.preventDefault();
          var start = $(this).get(0).selectionStart;
          var end = $(this).get(0).selectionEnd;

          // set textarea value to: text before caret + tab + text after caret
          $(this).val($(this).val().substring(0, start)
                      + "\t"
                      + $(this).val().substring(end));

          // put caret at right position again
          $(this).get(0).selectionStart =
          $(this).get(0).selectionEnd = start + 1;
        }
      });
    if($('#textUrl').length>0){
        loadParameterFields();
    }
    $('#textUrl').on('keyup change',function(e){
        loadParameterFields();
    });
    $('.paramInput').on('keyup change',function(e){
        loadShortCodeExample();
    });
    $('#textName').change(function(e){
        var name = $(this).val();

            $.ajax({
                cache: false,
                data: {
                    action: 'JsonData_parse_feed_slug',
                    name: name
                },
                dataType: 'json',
                type: 'POST',
                url: ajaxurl
            }).done(function (oResponse, sTextStatus, oJqXhr) {
                var sReturn = oResponse.message;
                if(oResponse.status != 'failed'){
                    if(sReturn.length>0){

                        $('#textSlug,#hiddenSlug').val(sReturn);
                        loadShortCodeExample();
                    }
                }else{
                    alert(sReturn);
                }
            });


    });
    function loadShortCodeExample(){
        var sShortCode = '<b>Shortcode: </b><pre>[jsondata_feed slug="'+$('#textSlug').val()+'"';
        $('.paramInput').each(function(i){
            sShortCode += ' '+$(this).attr('id').replace('textParam-','')+'="'+$(this).val()+'"';
        });
        sShortCode +=']</pre>';
        $('#iDivShortcodeExample').html(sShortCode);
        //console.log(sShortCode);
    }
    function loadParameterFields(){
    var url = $('#textUrl').val();
        if(url !='' && !validateUrl(url)){
            $('#textUrl').popover({
                html: true,
                placement: "right",
                title: '<span class="text-error"><i class="icon-warning-sign"></i>&nbsp;<strong>This is not a valid url</strong></span>'
            });
            $('#textUrl').popover('show');
        }else if(url !=''){
            $('.btnPreview').show();
            $('#textUrl').popover('destroy');
            var params = getUrlParams(url);
            var paramArray = [];
            var existingParams = getExistingParams();
            var sHTML = '';
            
            var counter=0;
            for (var param in params) {
                if($('#textParam-'+param+'').length==0){
                       sHTML += '<div class="control-group" id="element-'+param+'">';
                       sHTML += '<label class="control-label" for="textParam-'+param+'">'+param+'</label>';
                       sHTML += '<div class="controls">';

                       sHTML += '<input type="text" name="textParam['+param+']" id="textParam-'+param+'" value="'+params[param]+'" class="input-xxlarge paramInput">';
                       sHTML += '</div>';
                       sHTML += '</div>';
                       counter++;
                   }
                   
                paramArray[param]=params[param];
            }
            for (var param in existingParams){
                //remove old parameters that are not set
                if(!paramArray[param]){
                    $('#iDivAjaxReturn #element-'+param).remove();
                }
            }
            if(counter>0)$('#iDivAjaxReturn').html(sHTML);
            loadShortCodeExample();


        }else{
            $('#textUrl').popover('destroy');
        }
}
function getExistingParams(){
    var params=[];
    $('#iDivAjaxReturn input').each(function(i){
        var idParts = $(this).attr('id').split('-');
        var param = idParts[1];
        params[param]=$(this).val();
    });
    return params;
}

	//redirect commented by asfer
	if (typeof(sJsonDataRedirectUrl) != 'undefined') {
		setTimeout(function () {
			window.location = sJsonDataRedirectUrl;
		}, 3000);
	}
});

function validateUrl(value){
      return /^(https?|ftp):\/\/(((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:)*@)?(((\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5]))|((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?)(:\d*)?)(\/((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)+(\/(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)*)*)?)?(\?((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|[\uE000-\uF8FF]|\/|\?)*)?(\#((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|\/|\?)*)?$/i.test(value);
    }

function getUrlParams(url){
    var qs = {};
    var querystring = url.split('?');
    if(querystring.length==2){
        qs = (function(a) {
            if (a == "") return {};
            var b = {};
            for (var i = 0; i < a.length; ++i)
            {
                var p=a[i].split('=');
                if (p.length != 2) continue;
                b[p[0]] = decodeURIComponent(p[1].replace(/\+/g, " "));
            }
            return b;
        })(querystring[1].split('&'));
    }
    return qs;

}

