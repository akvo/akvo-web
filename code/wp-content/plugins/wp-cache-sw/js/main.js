

if ('serviceWorker' in navigator) {
	
	window.addEventListener('load', function() {
	
		if( wp_sw_cache_settings['sw_enable'] == '1' ){
			
			navigator.serviceWorker.register(wp_sw_cache_settings['sw_js_url']).then(function(registration) {
      			
				// Registration was successful
      			console.log('ServiceWorker registration successful with scope: ', registration.scope);
    		
			}, function(err) {
      			
				// registration failed :(
      			console.log('ServiceWorker registration failed: ', err);
    		
			});
			
			// LISTENING FOR MESSAGES FROM THE SERVICE WORKER 
			navigator.serviceWorker.onmessage = function( evt ){
				
				var message = JSON.parse(evt.data);
				
				if( message.length && message.type == 'refresh' ){
					
					var html = message.html;
				
					// CURRENT BROWSER URL
					var href = location.href;
					
					// RESPONSE URL
					var url = message.url;
					
					// IF THE BOTH URL(S) ARE THE SAME, THEN UPDATE THE DOM
					if( href == url ){
						
						// EXTRACT BODY FROM THE HTML CONTENT
						var $body = jQuery(jQuery.parseHTML(html.match(/<body[^>]*>([\s\S.]*)<\/body>/i)[0], document, true));
						jQuery('body').html($body);
						
						// UPDATE THE BODY CLASS
						var body_class = /body([^>]*)class=(["']+)([^"']*)(["']+)/gi.exec(html.substring(html.indexOf("<body"), html.indexOf("</body>") + 7));
						if(body_class){body_class = body_class[3];}
						jQuery('body').attr('class',body_class);
						
						// TRIGGER AN EVENT INDICATING THAT THE BODY HAS BEEN UPDATED
						jQuery('body').trigger('body:refresh', [jQuery('body')]);
						
					}	
					
				}
				
				
			}
    		
    	}
    	else{
    		
    		console.log('Uninstalling the Service Workers');
    			
    		navigator.serviceWorker.getRegistrations().then(function(registrations) {
 				for(let registration of registrations) {
  					registration.unregister()
				} 
			});
    		
    	}
  	});
}
