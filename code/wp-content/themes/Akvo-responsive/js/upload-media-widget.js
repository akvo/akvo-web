jQuery(document).ready(function($) {
	
	$(document).on("click", ".upload_image_button", function( ev ) {
		
		var btn = jQuery( ev.target );
		
		var inputText = jQuery( btn.attr( 'data-img' ) );
		
		var custom_uploader = wp.media.frames.file_frame = wp.media({
			title: 'Choose Image',
			button: {
				text: 'Choose Image'
			},
			multiple: false
		});
		
		custom_uploader.on('select', function() {
				
			attachment = custom_uploader.state().get('selection').first().toJSON();
			
			if(inputText != undefined && inputText != ''){
                inputText.val( attachment.url );
            }
			
		});
		
		
			
		custom_uploader.open();
			
			
		
		
    });
	
	
	$(document).ajaxStop( function(){
		
		$('[data-behaviour~=tinymce]').each( function(){
			
			var el = $(this);
			
			var id = el.attr('id');
			
			wp.editor.remove( id )
			
			wp.editor.initialize( id, { tinymce: true, quicktags: true} );
			
		});
		
		
	});
	
});