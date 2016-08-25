(function($){

	//alert('hi');

	$.fn.rsr_anchor_reload = function(){
		return this.each(function(){
			var ahref = $(this);
			var href = ahref.attr('href');
				
			if(href.substr(0, 1) == '#'){
				ahref.click(function(ev){
					ev.preventDefault();
					ev.stopPropagation();
					
					var href = ahref.attr('href');
					$(href).rsr_scroll_to();
					console.log('reload');
				});
			}
		});
	};

	$.fn.rsr_time_ticker = function(){
		return this.each(function(){
			var el = $(this);
		
			el.animate_counter = function(){
				if(!el.attr('data-flag')){
					console.log('animate counter');
					el.find('.digit').each(function () {
  						$(this).prop('Counter',0).animate({
        					Counter: $(this).text()
    						}, {
      						duration: 2000,
	     					easing: 'swing',
							step: function (now) {
								$(this).text(Math.ceil(now));
							}
						});
					});
					el.attr('data-flag', 1);
				}
			};
				
			var element_position = el.offset().top - el.outerHeight();
				
			$(window).on('scroll', function() {
  				var y_scroll_pos = window.pageYOffset;
				var scroll_pos_test = element_position;
				//console.log(y_scroll_pos + " - " + scroll_pos_test);
				if(y_scroll_pos > scroll_pos_test) {
        			//console.log('scroll found');
  					el.animate_counter();	
				}
			});
		});
	};
		
		
	$.fn.rsr_scroll_to = function(){
		return this.each(function(){
			
			var el = $(this);
			var section = el.closest('.tab-content');
    			
    		section.rsr_tab_activate();
    			
    		var scroll_el = $(el).attr('id') == $(section).attr('id') ? $('#mainbody') : $(el);
  					
	  		$('html, body').animate({
    	    	scrollTop: scroll_el.offset().top
    		}, 500);
    			
	    	window.location.hash = el.attr('id');
			
		});
	};


		
	$.fn.rsr_tab_activate = function(){
		return this.each(function(){
			//console.log('tab activate');
			
			var section = $(this);
				
			var ul = $('[data-behaviour~=akvo-tabs]');
				
			var li = ul.find('a[href=#' + section.attr('id') + ']').closest('li');
				
				
			var old_li = ul.find('li.active');
	       	var old_tab = $(old_li.find('a[href]').attr('href'));
       			
    	   	if(section.attr('id') != old_tab.attr('id')){
       			old_tab.hide();
       			old_li.removeClass('active');
	       		li.addClass('active');
    	   		$('#tagline').html(li.data('tagline'));
       			section.show();	
	       	}
		});
	};




	$.fn.akvo_tabs = function(){
    	return this.each(function(){
    		console.log('tabs init');
	       	var ul = $(this);
       			
    	   	ul.activate = function(list){
       			list.addClass('active');
       			$('#tagline').html(list.data('tagline'));
       				
	       		var section_id = list.find('a[href]').attr('href');
    	   		$(section_id).show();	
       		};
       			
	       	ul.find('li').each(function(){
    	   		var li = $(this);
       				
       			var tab = $(li.find('a[href]').attr('href'));
       				
       			var ahref = li.find('a[href]');
       				
	       		/* hide all the tabs */
    	   		tab.hide();
       				
       			li.click(function(ev){
       				ev.preventDefault();
       				ev.stopPropagation();
       					
	       			var section = $(li.find('a[href]').attr('href'));
    	   			section.rsr_tab_activate();
       				$('html, body').animate({
        				scrollTop: $('#mainbody').offset().top
    				}, 500);
       					
	    			if(history.pushState) {
		 			 	history.pushState(null, null, '#' + section.attr('id'));
					}
					else {
    						window.location.hash = section.attr('id');
					}

       				//console.log('click');
       			});
       		});
    		//console.log('tabs');
    			
    		if(!window.location.hash){
    			window.location.hash = 'overview';
    		}
    			
    		var hash = window.location.hash;
    			
    		$(hash).rsr_scroll_to();
    	});
    };
}(jQuery));  