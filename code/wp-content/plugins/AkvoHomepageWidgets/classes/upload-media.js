var uploadID = '';
jQuery(document).ready(function($) {
    $(document).on("click", ".upload_image_button", function() {
        
        var instance = $(this).data('input');
        
        uploadID = $('input#'+instance);
        console.log(instance);
        console.log(uploadID);
        
        window.send_to_editor = function(html) {
            var imgurl = jQuery('img',html).attr('src');
            console.log(imgurl);
            var inputText = uploadID;
            console.log(inputText);
            if(inputText != undefined && inputText != '')
            {
                
                inputText.val(imgurl);
                if($('img#image_upload_example_'+instance).length>0){
                    $('img#image_upload_example_'+instance).attr('src',imgurl);
                }
            }

            tb_remove();
        };

        tb_show('', 'media-upload.php?type=image&TB_iframe=true');
        return false;
    });
});