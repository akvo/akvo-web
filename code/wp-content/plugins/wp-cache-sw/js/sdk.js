
// DELAY FUNCTION FOR ANY PROMISES
function wait(ms) {
	
	return new Promise(resolve => {
    	
    	setTimeout(resolve, ms);
  	
  	});

}

// PROMISES RACE: EXECUTES THE ONE THAT RETURNS THE RESULT FIRST
function promiseAny(promises) {
  
  	return new Promise((resolve, reject) => {
    	
    	promises = promises.map(p => Promise.resolve(p));
    	
    	promises.forEach(p => p.then(resolve));
    	
    	promises.reduce((a, b) => a.catch(() => b)).catch(() => reject(Error("All failed")));
  	
  	});

};

// SENDS UPDATED HTML AS MESSAGE TO THE MAIN.JS FOR UPDATING THE CONTENT
function refresh(response, html) {
	
	return self.clients.matchAll().then(function (clients) {
		
		clients.forEach(function (client) {
			
			var message = {
				
				type: 'refresh',
				
				url: response.url,
				
				html: html
			
			};
			
			client.postMessage(JSON.stringify(message));
		
		});
	
	});

}

// CHECKS IF THE CONTENT NEEDS TO BE UPDATED IN THE DOM
function updateDOM( request, response ){
	
	// READING FROM THE CACHE FOR THE SAME REQUEST
	caches.match( request ).then( cacheResponse => {
		
		// CHECK IF IT EXISTS IN CACHE
		if( cacheResponse ){
		
			var cacheResponseClone = cacheResponse.clone();
			
			// READ THE CONTENT OF NETWORK RESPONSE
			response.text().then( html => {
				
				// READ THE CACHE RESPONSE
				cacheResponseClone.text().then( cachehtml => {
					
					if( html != cachehtml ){
						
						console.log('DOM HAS TO BE REFRESHED');	
						
						refresh(response, html);
						
					}
					
				});
			
			});
		
		}
		
	} );
	
}

self.addEventListener('install', event => {
	
	console.log('Worker: has been successfully installed v1.6 ');
	
	event.waitUntil( self.skipWaiting() );
  	
});

self.addEventListener('fetch', event => {
	
	// IGNORE REQUESTS OTHER THAN GET
	if( event.request.method !== 'GET' ){
		
		return;
		
	}
	
	// IGNORE THESE URL(S)
	if ( event.request.url.indexOf('/wp-json') !== -1 || event.request.url.indexOf('/wp-admin') !== -1 || event.request.url.indexOf('/wp-includes') !== -1 || event.request.url.indexOf('preview=true') !== -1 ) {
    	
    	return;
    	
    }
    
    const fetchPromise = fetch(event.request);
	
	const cachePromise = caches.match(event.request);

	event.respondWith(
		
		promiseAny([
      		fetchPromise
      			.then( networkResponse => {
      				
      				
			
					var responseClone = networkResponse.clone();
					
					if( responseClone.ok ){
						
						// console.log('Worker: Server ' + event.request.referrer + ' - ' + responseClone.url + ' - ' + self.location.href);
						
						// ONLY IF THE RESPONSE URL IS EQUAL TO THE REFERRER THAT MADE THE REQUEST
						if( (responseClone.url == event.request.referrer) || (event.request.mode == 'navigate') ){
							
							// console.log('before update');
							
							updateDOM( event.request.clone(), responseClone.clone() );
							
						}
					
						// UPDATE THE CACHE WITH THE LATEST NETWORK RESPONSE
						caches.open('mycache').then( cache => cache.put( event.request, responseClone ) );
					
					}
					
					return networkResponse;
      				
      				
      			})
      			.catch(() => cachePromise),
      		wait(0).then(() => cachePromise).then(r => r || fetchPromise)
    	])
		
	);
	
});