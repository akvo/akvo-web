// Interaction for akvo.org website.
// Author: loic@akvo.org - 2013

$("document").ready(function() {
	
	
    // Fixes the Zooming while scrolling on google map iframe.
    $(document).bind('em_maps_location_hook', function(e, map, infowindow, marker) {
        // Disable scroll zoom on Google Maps
        map.set('scrollwheel', false);
        map.setOptions({
            'scrollwheel': false
        });
    });

    function openDialog(selector) {
        $(selector).clone().show().appendTo('#overlay').parent().fadeIn('fast');
    }

    function closeDialog(selector) {
        $(selector).parents('#overlay').fadeOut('fast', function() {
            $(this).find('.dialog').remove();
        });
    }

    $("div.breadcrumbs").append($("div.projectGateWay"));

    $('.blog #content, .blog .widget-area').wrapAll($('<div>').addClass('blogWrap'));

    // hide #back-top first
    $("#back-top").hide();

    // fade in #back-top
    $(function() {
        $(window).scroll(function() {
            if ($(this).scrollTop() > 100) {
                $('#back-top').fadeIn();
            } else {
                $('#back-top').fadeOut();
            }
        });

        // scroll body to 0px on click
        $('#back-top a').click(function() {
            $('body,html').animate({
                scrollTop: 0
            }, 600);
            return false;
        });

        $(".anchorNav li a").click(function(event) {
            event.preventDefault();
			
			var offset = $( this.hash ).offset();
			
			if( offset === undefined ){
				
			}
			else{
				$('html,body').animate({
					scrollTop: offset.top
				}, 500);
				
			}
			
		});
    });

    //  Team Page click effects NEW VERSION

    $('li.new_staffs, li.new_partners, li.foundation_member').click(function() {
        var biog = $(this).find('.staffBiog').html();
        var staffPic = $(this).find('.imgWrapper').html();
        var staffName = $(this).find('.staffName').html();
        var staffTitle = $(this).find('.staffTitle').html();
        openDialog('#descrDialog');
        $('#staffDescr h1.staffName').html(staffName);
        $('#staffDescr p.staffTitle').html(staffTitle);
        $('#staffDescr p.staffBio').html(biog);
        $('#staffDescr .imgWrapper').html(staffPic);
        $('#descrDialog .cancel').click(function(e) {
            e.stopPropagation();
            closeDialog('#descrDialog');
        });
        return false;
    });
    $('#blanket').click(function() {
        closeDialog('#descrDialog');
    });


    $('.tooltipContainer > .tooltips').css('display','none');
    $('.tooltipContainer > .tooltipTrigger').hover(function(){
      $(this).next('.tooltips').css('display','block');
    });

    $('#partnershipGroup ul').append($('li.partnerships'));
    $('#communicationGroup ul').append($('li.communication-pr'));
    $('#contractorsGroup ul').append($('li.contractors'));
    $('#engineeringGroup ul').append($('li.design-engineering'));

    $("#partnershipGroup ul.staff").find('li.newStaff').appendTo("#partnershipGroup ul.staff");
    $("#communicationGroup ul.staff").find('li.newStaff').appendTo("#communicationGroup ul.staff");
    $("#engineeringGroup .staff").find('li.newStaff').appendTo("#engineeringGroup ul.staff");

    $('#govGroup ul').append($('li.governments'));
    $('#compsGroup ul').append($('li.companies'));
    $('#founGroup ul').append($('li.foundations'));
    $('#intGovGroup ul').append($('li.inter-governmental'));
    $('#ngoGroup ul').append($('li.ngos'));
    $('#knowledgeGroup ul').append($('li.knowledge-institutes'));

    $('.tooltipContainer > div.tooltips').css('display', 'none');
    $('.tooltipContainer > a.tooltipTrigger').hover(function() {
        $(this).next('div.tooltips').css('display', 'block');
    }, function() {
            $( this ).next('div.tooltips').css('display', 'none');
          });


});


//  close on esc press.

var KEYCODE_ESC = 27;
$(document).keyup(function(e) {
    if (e.keyCode === KEYCODE_ESC) {
        $('.cancel').click();
    }
});


/* Lazy Loading of the List */
$.fn.ajax_loading = function(){
	return this.each(function(){
		var btn = $(this);
            
		var ul = $(btn.data('list'));
			
		ul.sanitize_url = function(){
			var url = ul.attr('data-url') ? ul.attr('data-url') : location.href;
			var hash_index = url.indexOf('#');
			if (hash_index > 0) { url = url.substring(0, hash_index);}
			url += (url.split('?')[1] ? '&':'?') + 'sjax=1';
			url = encodeURI(url);
			/* add page parameter to the request */
			var page = ul.page_inc();

			var paged_attr = btn.attr('data-paged-attr') ? btn.attr('data-paged-attr') : 'paged';

			url += (url.split('?')[1] ? '&':'?') + paged_attr + '=' + page;
			return url;
		};
			
		ul.page_inc = function(){
			var page = ul.attr('data-page') ? parseInt(ul.attr('data-page')) : 1;
			page += 1;
			ul.attr('data-page', page);
			return page;
		};
			
		ul.append_children = function(result){
			if($(result).find(ul.attr('data-target')).length){
				ul.attr('data-load-flag', '');
				//btn.find('i').removeClass('fa-spin');
			}
			else{
				btn.hide();
			}
				
			$(result).find(ul.attr('data-target')).each(function(){
				var list = $(this);
				list.hide();
				list.appendTo(ul);
				list.show('slow');
			});	
		};
			
		ul.ajax_load = function(){
			ul.attr('data-load-flag', 'ajax');
			var url = ul.sanitize_url();
			console.log(url);
			console.log('lazy load initiated');
			
			$.ajax({
				'url': url, 
				'success': function(result){
					//alert(result);
					console.log('lazy loading from sjax');
					ul.append_children(result);
				},
				'error': function(){
					console.log('lazy loading from cache');
				}
			});
				
		};
			
		btn.click(function(ev){
			ev.preventDefault();
			ev.stopPropagation();
			
			//btn.find('i').addClass('fa-spin');
			ul.ajax_load();
		});
	});
};

$.fn.fullBlackMenu = function(){
	return this.each(function(){
		
		if ($(window).width() > 960) {
			
			$(window).scroll(function() {
				if ($(".topbar").offset().top > 200) {
					$(".topbar").css("background", "transparent");
					$(".navbar-fixed-top").addClass("top-nav-collapse");
				} else {
					$(".navbar-fixed-top").removeClass("top-nav-collapse");
					$(".topbar").css("background", "rgba(32, 32, 36, 0.3)");
				}
			});
		}
		
	});
}

$.fn.next = function(){
	return this.each(function(){
		
		var el = $(this);
		
		el.click( function( e ){
			e.preventDefault();
			
			var position = $(el.attr("href")).offset().top;

			$("body, html").animate({
				scrollTop: position
			}  );
		});
		
	});
}

$.fn.funnel_next = function(){
	return this.each(function(){
		
		var btn = $(this);
	
		btn.click( function(ev){
			ev.preventDefault();
			
			var next_section = $(btn.attr('href'));
			
			// HIDE ALL FUNNEL SECTIONS
			$('section.funelContainer').addClass('hidden');
			
			// SHOW THE NEXT SECTION ONLY
			next_section.removeClass('hidden');
			
			var question = btn.attr('data-q');
			if( question ){
				
				var ans = btn.html();
				
				var field = $('#funnel-form').attr('data-field');
				
				//console.log( field );
				
				var textarea = $( '#funnel-form' ).find( field );    //$('#funnel-form .funnel-msg textarea');
				
				var text = textarea.val() + question + " " + ans + "\r\n";
				
				textarea.val( text );
				
			}
			
		});
		
	});
}

$.fn.double_filters = function(){
	return this.each(function(){
		
		var $el 			= $( this ),
			$target 		= $( $el.data('target') ),
			secondary_tax 	= $el.find('[data-filter~=secondary]').first().data('tax'),
			html 			= $target.html();
		
		
		
		/* ACTIVE MENU ITEM */
		$el.active_menu_item = function( ev ){
			ev.preventDefault();																			/* PREVENT DEFAULT EVENT */
			var $menu_target = $( ev.target );																/* GET MENU ITEM */
			$el.find('[data-filter~=' + $menu_target.data('filter') + '].active').removeClass('active');	/* REMOVE PREVIOUS ACTIVE MENU ITEMS */
			$menu_target.addClass('active');																/* ACTIVATE MENU ITEM */			
			$el.filter_items();																				/* FILTER ITEMS */
			
		};
		/* ACTIVE MENU ITEM */
		
		/* FILTER SELECTOR TEXT */
		$el.filter_selector = function( filter_type ){
			$active_filter = $el.find('[data-filter~=' + filter_type + '].active');
			
			var tax 		= $active_filter.data('tax'),
				id 			= $active_filter.data('id'),
				selector 	= '';
			
			
			if( tax != undefined && id != undefined ){
				selector = "[data-" + tax + "~=" + id + "]";
			}
			
			return selector;
		}
		/* FILTER SELECTOR TEXT */
		
		/* FILTER ITEMS */
		$el.filter_items = function(){
			
			var $primary_filter 	= '',
				$secondary_filter 	= '';
			
			/* BUILD PRIMARY FILTER */
			if( $el.find('[data-filter~=primary].active').length ){ $primary_filter = $el.filter_selector('primary'); }
			
			/* BUILD SECONDARY FILTER */
			if( $el.find('[data-filter~=secondary].active').length ){ $secondary_filter = $el.filter_selector('secondary'); }
			
			$target.html( html );						/* reset html elements */
			
			
			/* unveil the images instantly */
			$target.find('[data-behaviour~=unveil]').unveil( 0 );
			$target.find('[data-behaviour~=unveil]').trigger("unveil");
			/* unveil the images instantly */
			
			/* console.log( $primary_filter ); console.log( $secondary_filter ); */
			
			
			if( $primary_filter || $secondary_filter ){
				
				/* REMOVE THE IRRELEVANT POSTS - ONLY WHEN EITHER THE FILTERS WERE NOT SELECTED */
				$target.find('[data-item]:not(' + $primary_filter + $secondary_filter + ")" ).remove();
			}
			
			/* 
			*	HIDE ALL THE SECONDARY FILTERS THAT ARE NOT AVAILABLE IN THE 
			* 	PRIMARY FILTERS SELECTION - ONLY TO BE ACTIVE WHEN THE PRIMARY FILTER
			*	IS SELECTED AND THE SECONDARY FILTER HAS NOT BEEN ENABLED.  
			*/
			
			if( ! $secondary_filter ){
			
				var secondary_tax_in_posts = [];
				
				$el.find('[data-filter~=secondary]').show();			/* SHOW THE ENTIRE SECONDARY FILTERS LIST */
				
				$target.find('[data-item]').each( function(){			/* ITERATE THROUGH POSTS THAT ARE SHOWN */
					
					var $item = $( this );
					
					var item_tax_str = $item.data( secondary_tax ).toString(); 
					
					if( item_tax_str ){
						
						//console.log( item_tax_str );
						
						var item_tax_arr = item_tax_str.split(' ');
						
						$.each( item_tax_arr, function( i, item_tax ){
							if( $.inArray( parseInt( item_tax ), secondary_tax_in_posts ) === -1 ){
								secondary_tax_in_posts.push( parseInt( item_tax )  );		/* STORE UNIQUE SECONDARY FILTERS THAT ARE AVAILABLE IN THE POSTS */
							}
						});
					}
					
				});
				
				//console.log( secondary_tax_in_posts );
				
				$el.find('[data-filter~=secondary]').each( function(){	/* ITERATE THROUGH EACH SECONDARY FILTERS AND HIDE THE IRRELEVANT ONES */
					
					var $secondary_el 	= $( this );
					
					//console.log( $secondary_el.data( 'id' ) );
					
					if( $.inArray( $secondary_el.data( 'id' ), secondary_tax_in_posts ) === -1 ){
						$secondary_el.hide();
					}
					
					
					
				});
				
				
				//console.log( secondary_tax_in_posts );
			
			}
			
		};
		/* FILTER ITEMS */
		
		/* HANDLE CLICK EVENTS */
		$el.find('[data-filter~=primary]').click( function( ev ){
			$el.find('[data-filter~=secondary].active').removeClass('active');	/* RESET SECONDARY FILTER */
			$el.active_menu_item( ev );											/* ACTIVE MENU ITEM - PRIMARY */
		});
		$el.find('[data-filter~=secondary]').click( function( ev ){
			$el.active_menu_item( ev );											/* ACTIVE MENU ITEM - SECONDARY */
		});
		/* HANDLE CLICK EVENTS */
		
		
		
	});
}

$.fn.dropdown_downloads = function(){
	return this.each(function(){
		
		var $el 			= $( this ),
			$dropdown		= $el.find('select'),
			$download_btn	= $el.find('a[href]');
		
		$dropdown.change( function(){
			
			var download_link = $(this).val();
			
			$download_btn.attr( 'href', download_link );
			
		});
		
		$download_btn.click( function( ev ){ /* IF THE DOWNLOAD IS CLICKED, CHECK IF THE DOWNLOAD LINK HAS BEEN ADDED */
			
			var download_link = $download_btn.attr( 'href' );
			
			if( download_link == '#' ){
				ev.preventDefault();
			}
			
		});
		
	});
}

$("document").ready(function() {
	
	/* NEW TRANSPARENT MENU */
	$('body.fullBlack').fullBlackMenu();
    
	$("[data-behaviour~=ajax-loading]").ajax_loading();
	
	$("[data-behaviour~=next]").next();
        
	$('[data-behaviour~=fnl-nxt-btn]').funnel_next();
	
	/* TEAM AND PARTNERS PAGE */
	$('[data-behaviour~=double-filters]').double_filters();
	
	$('[data-behaviour~=unveil]').unveil( 0, function(){
		/*
		var el = $(this);
		
		console.log( el.attr('src') );
		*/
	});

	$('[data-behaviour~=downloads-dropdown]').dropdown_downloads();
	
});