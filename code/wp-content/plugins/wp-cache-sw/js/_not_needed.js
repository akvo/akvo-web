//html = $.parseHTML(html, document, true);
				
				//var scripts = findAll( html, 'script');
				
				//console.log(html);
				
				
				// console.log($(html).filter('script').length);
				
				//document.write( html );
				
				$(document).find('script[src]').remove();
				
				console.log('All Script Tags removed');
				
				$(html).filter("script").each(function(){
					
					
					if( $(this).attr('type') == 'text/javascript' ){
						
						var text = $(this).text();
						
						var src = $(this).attr('src');
						
						if( text ){
							console.log( text );
							eval(text);
						}
						
						if( src ){
							
							console.log( 'Added ' + src );
							
							var s = document.createElement( 'script' );
							s.setAttribute( 'src', src );
							//s.onload=callback;
							document.body.appendChild( s );
							
						}
						
					}
					
					// console.log($(this).text());
					
					//eval($(this).text());
				});
				
				console.log(wpApiSettings['nonce']);
				
				// console.log( html );
				
				// console.log('Using document write');
				
				
				
				
				//
				
				//console.log(scripts);
				