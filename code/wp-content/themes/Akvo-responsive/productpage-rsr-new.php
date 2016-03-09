<?php
  /*
    Template Name: product-rsr-v3.1
  */
?>
<?php get_header(); ?>
<!--Start of Akvo.org RSR Product Page-->

<?php
	$tabs = array(
		'overview' => array(
			'title' => 'Overview',
			'tagline' => 'overview_tagline',
			'elements' => array(
				'overview_carousel' => 'rsr_carousel',
				'overview_columns' => 'rsr_overview_columns',
				'overview_call_to_action' => 'rsr_overview_buttons',
				'testimonials' => 'rsr_testimonials',
				'counters'=> 'rsr_overview_counters',
				'overview_buttons' => 'rsr_buttons'
			)
		),
		'features' => array(
			'title' => 'Features',
			'tagline' => 'feature_tagline',
			'elements' => array(
				'feature_banner' => 'rsr_banner',
				'feature_columns' => 'rsr_feature_columns',
				'tour' => 'rsr_tour'
				
			)
		),
		'pricing' => array(
			'title' => 'Pricing',
			'tagline' => 'pricing_tagline',
			'elements' => array(
				'pricing_banner' => 'rsr_banner',
				'pricing_buttons' => 'rsr_buttons'
			)
		),
		'support' => array(
			'title' => 'Support',
			'tagline' => 'support_tagline',
			'elements' => array(
				'support_banner' => 'rsr_banner',
				'support_content' => 'rsr_content',
				'support_section' => 'rsr_support_section',
				'support_buttons' => 'rsr_buttons'
				
			)
		)
	);
	
	function slugify($text){ 
  		$slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $text);
   		return strtolower($slug);
	}
	
	function rsr_content($el){
	?>
		<div class="sub-section">
			<div class="wrapper">
				<div class="text-center"><?php the_field($el);?></div>
			</div>
		</div>
		
	<?php
	}
	
	function rsr_overview_columns($el){
		_e("<div class='sub-section'>");
		_e("<div class='threeColumns wrapper'>");
		while(have_rows($el)): the_row();
			_e("<div>");
			_e("<h3>".get_sub_field('title')."</h3>");
			_e("<p>".get_sub_field('description')."</p>");
			_e("</div>");
		endwhile;
		_e("</div><div class='clearfix'></div>");
		_e("</div>");
	}
	
	function rsr_overview_buttons($el){
	?>
		<div class='sub-section'>
			<ul class='list-box'>
				<li class="box">
      				<a data-behaviour="show-video" href="#video" title="<?php the_field('video_link_text'); ?>" class="button"><?php the_field('video_link_text'); ?></a>
      			</li>
      			<li class="box">
      				<a href="<?php the_field('tour_link'); ?>" data-behaviour="anchor-reload" title="<?php the_field('tour_link_text'); ?>" class="button"><?php the_field('tour_link_text'); ?></a>
      			</li>
  			</ul>
  		</div>	
  		<div id="video" class="videoContainer wrapper">
			<div class="vimeoBlockedMessage">
        		<?php the_field('rsr_video_backup_message'); ?>
      		</div>
      		<iframe width="800" height="450" frameborder="0" allowfullscreen="" mozallowfullscreen="" webkitallowfullscreen="" src="<?php the_field('video_link'); ?>"></iframe>
    	</div>
  	<?php	
  	}
	
	
	
	function rsr_overview_counters($el){
		?>
		
		<?php 
			$url = 'http://rsr.akvo.org/api/v1/right_now_in_akvo/?format=json';
			$str = file_get_contents($url);
			
			$json = json_decode($str, true); 
		?>	
		<div class='sub-section'>
			<ul class='list-box'>
				<?php while(have_rows($el)): the_row();?>
				<li class="box">
      				<h4><a href="<?php the_sub_field('link');?>"><?php the_sub_field('text');?></a></h4>
      				<div class="timeTicker">            
    					<p class="timeSegment clear" data-behaviour="time-ticker" data-value="<?php _e($json[get_sub_field('json_slug')]);?>">
       						
   						</p>
            		</div>
      			</li>
      			<?php endwhile;?>
      		</ul>
  		</div>
  		<?php	
	}
	
	function rsr_feature_columns($el){
	?>
		<div class='sub-section'>
		<div class='threeColumns wrapper'>
		<?php while(have_rows($el)): the_row();?>
			<div>
			<h3><?php _e(get_sub_field('heading'));?></h3>
			<?php
				$boxes = get_sub_field('box');
				foreach($boxes as $box):
			?>
				<div class="box-col">
					<i class="fa fa-2x <?php _e($box['icon']);?>"></i>
					<h4><?php _e($box['title']);?></h4>
					<p><?php _e($box['description']);?></p>
				</div>	
			<?php endforeach;?>
			<p><?php _e(get_sub_field('description'));?></p>
			</div>
		<?php endwhile;?>
		</div>
		<div class='clearfix'></div>
		</div>
	<?php }
	
	function rsr_testimonials($el){
	?>
		<div class="sub-section">	
			<div class="threeColumns wrapper">
				<?php while(have_rows($el)): the_row();?>
				<div class="text-center">
					<img src="<?php the_sub_field('profile_picture');?>" />
					<h4><?php the_sub_field('title');?></h4>
					<p><?php the_sub_field('description');?></p>
					<hr>
					<p><small><?php the_sub_field('name');?><br><?php the_sub_field('job_title');?></small></p>
				</div>
				<?php endwhile;?>
			</div>
		</div>	
		<div class='clearfix'></div>
		
	<?php	
	}
	
	function rsr_tour(){
		_e("<div class='sub-section'>");
		_e("<h3>Akvo RSR Tour</h3>");
		while(have_rows('tour')): the_row();?>
			<div class="screenshot">
				<h4><?php the_sub_field('title');?></h4>
				<p><?php the_sub_field('description');?></p>
				<img src="<?php the_sub_field('image');?>" />
			</div>
		<?php endwhile;
		_e("</div>");
	}
	
	function rsr_carousel($el){
		_e("<ul class='bxslider'>");
		while(have_rows($el)): the_row();?>
			<li>
            	<div class="borderTop"></div>
           		<div class="image" style="background-image:url(<?php _e(get_sub_field('image'));?>);">
           			<?php if(get_sub_field('image_text')):?>
           			<a href="<?php _e(get_sub_field('image_link'));?>">
           				<?php _e(get_sub_field('image_text'));?>
           			</a>
           			<?php endif;?>
           		</div>
            	<div class="borderBottom"></div>
            </li>
    	<?php endwhile;
		_e("</ul>");
		
	}
	
	function rsr_banner($el){
	?>
		<div class="banner" style="background-image:url('<?php the_field($el);?>');"></div>
	<?php	
	}
	
	function rsr_buttons($el){
		
	?>
		<div class='sub-section'>
			<ul class='list-box'>
				<?php while(have_rows($el)): the_row();?>
				<li class="box">
					<h4><?php the_sub_field('description');?></h4><br>
      				<a href="<?php the_sub_field('link');?>" title="<?php the_sub_field('text'); ?>" class="button"><?php the_sub_field('text'); ?></a>
      			</li>
      			<?php endwhile;?>
  			</ul>
  		</div>	
		
		
	<?php
		
	}
	
	function rsr_support_section($el){
	
	?>
		<div class="sub-section">
			<div class="wrapper">
				
				<?php
				
					$sections = get_field($el);
					//print_r();
				
				?>
				<ul>
					<?php foreach($sections as $section):?>
					<li class="media-box">
						<div class="media-big <?php if($section['image_text']):?>media-left<?php else:?>media-right<?php endif;?>">
							<h3><?php _e($section['title']);?></h3>
							<p><?php _e($section['description']); ?></p>
						</div>
						<div class="media-small text-center <?php if($section['image_text']):?>media-right<?php else:?>media-left<?php endif;?>">
							<img src="<?php _e($section['image']); ?>" />
							<?php _e($section['image_text']);?>
						</div>
						<div class="clear"></div>
					</li>
					<?php endforeach;?>
				</ul>
				
				
				
			</div>
		</div>
		
  <?php
  	
	}

?>

<div id="content" class="floats-in productPage withSubMenu rsrProdPag">
	
	<!--div class="projectGateWay">
    	<p>Already an RSR user?</p>
    	<a href="http://rsr.akvo.org/sign_in" class="">Log in to Akvo RSR &rsaquo;</a>
  	</div-->

  	<hgroup>
    	<h1><?php the_field('rsr_name'); ?></h1>
    	<h2 id="tagline"></h2>
  	</hgroup>
	
	
	
	<section>
  		<ul class="rsr-tabs" data-behaviour="rsr-tabs">	
  			<?php foreach($tabs as $tab):?>
      		<li class="rsr-tab" data-tagline="<?php the_field($tab['tagline']);?>">
        		<a href="#<?php _e(slugify($tab['title'])); ?>"><?php _e($tab['title']);?></a>
        	</li>
        	<?php endforeach;?>	
    	</ul>
	</section>
  	
  	<?php foreach($tabs as $tab):?>
  	<section class="tab-content" id="<?php _e(slugify($tab['title'])); ?>">
  		<?php	
  			/* Displaying the inline elements within the tab */ 
  			$elements = $tab['elements'];
  			if($elements){ 
  				if(is_array($elements)){
  					foreach($elements as $key=>$el){
  						call_user_func($el, $key);
  					}
  				}
  			}
  			
  		?>
  		
	</section>
  	<?php endforeach;?>	
  	
  	<?php if(get_field('___get_in_touch_form')):?>
  	<section id="modal-form" class="modal" data-behaviour="modal">
  		<div class="backdrop"></div>
  		<div class="modal-content">
  			<a class="close-btn" href="#">&times;</a>
  			<?php gravity_form(get_field('get_in_touch_form'), false, true, false, '', true); ?>
  		</div>
  		
  	</section>
  	<?php endif;?>
</div>  

<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/jquery.bxslider.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">


<?php get_footer(); ?>
<script type="text/javascript">
	
	
	$(document).ready(function() {
		/*
    	var expectedVideoId = '<?php the_field('video_id'); ?>';
    	var videoBlockMessageTimeout = 10000;

    	// Check that vimeo isn't blocked
    	$.ajax({
      		url: 'https://vimeo.com/api/v2/video/' + expectedVideoId + '.json',
      		context: document.body,
      		timeout: videoBlockMessageTimeout
    	}).done( function(response) {
      		var urlFromAPI= response[0].url;
			// Does the id returned by the api match the real id?
      		if (urlFromAPI.indexOf(expectedVideoId) < 0) {
        		vimeoIsBlocked();
     		 }
    	}).fail( function() {
      		vimeoIsBlocked();
    	});

    	function vimeoIsBlocked() {
      		$('.vimeoBlockedMessage').show();
    	}
		*/
    	
  	});


	(function($){
		
		$.fn.rsr_modal = function(){
			return this.each(function(){
				var modal = $(this);
				var backdrop = modal.find('.backdrop');
				var close_btn = modal.find('.close-btn')
				
				modal.hide_now = function(){
					modal.hide();
				};
				
				close_btn.click(function(ev){
					ev.preventDefault();
					ev.stopPropagation();
					modal.hide();
				});
				
				backdrop.click(function(){
					modal.hide();
				});
				
			});
		};
		$.fn.rsr_modal_show = function(){
			return this.each(function(){
				var ahref = $(this);
				
				var modal = $(ahref.attr('href'));
				
				ahref.click(function(ev){
					ev.preventDefault();
					ev.stopPropagation();
					modal.show();
				});
				
				
			});
		};
		
		$.fn.rsr_anchor_reload = function(){
			return this.each(function(){
				var ahref = $(this);
				
				ahref.click(function(ev){
					ev.preventDefault();
					ev.stopPropagation();
					
					
					var href = ahref.attr('href');
					
					$('.rsr-tabs a[href=' + href + ']').click();
					
					
					
					console.log('reload');
				});
			});
		};
		
		$.fn.rsr_time_ticker = function(){
			return this.each(function(){
				var el = $(this);
				
				el.html('');
				
				console.log('time ticker');
				
				var str = "" + el.data('value') + "";
				
				
				for(var i=0; i<str.length; i++){
					var digit_val = str[i];
					
					var digit = $(document.createElement('span'));
					digit.addClass('digit');
					digit.html(digit_val);
					
					digit.appendTo(el);					
					
				}
				
       		});
		};
		
		console.log('pre-tabs');	
			
    	$.fn.rsr_tabs = function(){
       		return this.each(function(){
       			console.log('tabs init');
       			var ul = $(this);
       			
       			ul.activate = function(list){
       				list.addClass('active');
       				$('#tagline').html(list.data('tagline'));
       				
       				var section_id = list.find('a[href]').attr('href');
       				
       				window.location.hash = section_id;
       				
       				$(section_id).show();	
       				
       				
       			};
       			
       			ul.find('li').each(function(){
       				
       				var li = $(this);
       				
       				var tab = $(li.find('a[href]').attr('href'));
       				
       				var ahref = li.find('a[href]');
       				
       				/* hide all the tabs */
       				tab.hide();
       				
       				ahref.click(function(ev){
       					ev.preventDefault();
       					ev.stopPropagation();
       					
       					
       					var old_li = ul.find('li.active');
       					var old_tab = $(old_li.find('a[href]').attr('href'));
       					
       					if(tab.attr('id') != old_tab.attr('id')){
       						old_tab.hide();
       						old_li.removeClass('active');
       						ul.activate(li);
       						
       					}
       					console.log('click');
       				});
       				
       			});
    			console.log('tabs');
    			
    			if(window.location.hash) {
    				var section_id = window.location.hash;
    				ul.activate(ul.find('[href~=' + section_id + ']').closest('li'));
  					console.log(section_id);
  					
  					
  					
				} else {
  					ul.activate(ul.find('li:first'));
  					
				}
    			
    			
    		});
    	};
    	
    	console.log('init');
		$('.bxslider').bxSlider({
  			onSliderLoad: function(){
  				console.log('slider:after-load');
    			
    			$('body').find('[data-behaviour~=rsr-tabs]').rsr_tabs();
    			
    			$('[data-behaviour~=show-video]').click( function(event) {
      				event.preventDefault();
      				$('.videoContainer').fadeIn(200);
    			});
    			
    			
    			$('[data-behaviour~=time-ticker]').rsr_time_ticker();
    			$('[data-behaviour~=anchor-reload]').rsr_anchor_reload();
    			
    			$('[data-behaviour~=modal]').rsr_modal();
    			
    			$('[data-behaviour~=modal-show]').rsr_modal_show();
  			}
		});
    	
    	
    	$('html, body').animate({
        	scrollTop: $("#mainbody").offset().top
    	}, 500);
  					
    	
    	
	}(jQuery));  
	
	

	
	
		
	
</script>
