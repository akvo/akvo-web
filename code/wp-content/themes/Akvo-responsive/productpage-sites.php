<?php
	/*
		Template Name: product-akvosites v1.0
	*/
?>
<?php get_header(); ?>
<!--Start of Akvo.org RSR Product Page-->

<?php
	
	$tabs = array(
		'overview' => array(
			'title' => 'overview',
			'tagline' => 'overview_tagline',
			'elements' => array(
				'overview_cover' => 'akvo_page_section',
				'overview_intro' => 'inner_section',
				'overview_buttons' => 'inner_section_buttons',
				'testimonials' => 'testimonials'
			)
		),
		'features' => array(
			'title' => 'features',
			'tagline' => 'features_tagline',
			'elements' => array(
				'features_cover' => 'akvo_page_section',
				'features_columns' => 'features_columns'
			)
		),
		'pricing' => array(
			'title' => 'pricing',
			'tagline' => 'pricing_tagline',
			'elements' => array(
				'pricing_cover' => 'akvo_page_section',
				'pricing_intro' => 'inner_section',
				'pricing_buttons' => 'inner_section_buttons',
				'pricing_ending' => 'inner_section'
			)
		),
		'gallery' => array(
			'title' => 'gallery',
			'tagline' => 'gallery_tagline',
			'elements' => array(
				'gallery_cover' => 'akvo_page_section',
				'section' => 'gallery'
				
			)
		)
	);
	
	function inner_section($el){
		_e("<div class='tab-inner-section' id='".$el."'>");
		the_field($el);
		_e("</div>");
	}
	
	function inner_section_buttons($el){
	?>
		<div class='' id="<?php _e($el);?>">
			<ul class="text-center list-inline">
				<?php while(have_rows($el)): the_row();
					$desc = get_sub_field('description');
				?>
				<li>
					<?php if($desc):?><h4><?php _e($desc);?></h4><br><?php endif;?>
      				<a href="<?php the_sub_field('link');?>" title="<?php the_sub_field('text'); ?>" class="button"><?php the_sub_field('text'); ?></a>
      			</li>
      			<?php endwhile;?>
  			</ul>
  		</div>	
		
		
	<?php
		
	}
	
	function testimonials($el){
		$cols = 'threeColumns';
		$section = 'sub-section';
	?>
		<div class="<?php _e($section);?> testimonials" id="<?php _e($el);?>">	
			<div class="<?php _e($cols);?> wrapper">
				<?php while(have_rows($el)): the_row();?>
				<div class='col'>
					<a href="<?php the_sub_field('link');?>">
						<img class='aligncenter' src="<?php the_sub_field('profile_picture');?>" />
						<?php the_sub_field('description');?>
					</a>
				</div>	
				
				<?php endwhile;?>
			</div>
		</div>	
		<div class='clearfix'></div>
		
	<?php	
	}
	
	function features_columns($el){
	?>
		<div id="<?php _e($el);?>" class='sub-section'>
		<div class='threeColumns wrapper'>
		<?php while(have_rows($el)): the_row();?>
			<div>
				<?php
					$boxes = get_sub_field('columns');
					foreach($boxes as $box):
				?>
				<div class='box-col'>
					<i class="fa fa-2x <?php _e($box['icon']);?>"></i>
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
	
	
	function gallery($el){
	?> 
	<div class="sub-section" id="<?php _e($el);?>">
		<ul class="wrapper twoColumns floats-in">
    		<?php while( have_rows($el) ): the_row(); ?>
      		<li>
      			<a href="<?php the_sub_field('image_link'); ?>">
      				<img src="<?php the_sub_field('image'); ?>" title="akvosites"/>
      				<?php the_sub_field('description');?>
      			</a>
      		</li>
    		<?php endwhile; ?>
    	</ul>
    </div>	
    <?php
    }
	
	/*
	function rsr_title($el){
		_e("<h3 id=".$el.">".get_field($el)."</h3>");
	}
	function rsr_image($el){
		echo "<img id='".$el."' class='aligncenter' src='".get_field($el)."' />";
	}

	function rsr_content($el){
	?>
		<div id="<?php _e($el);?>" class="page-section"><?php the_field($el);?></div>
	<?php
	}
	
	function rsr_overview_columns($el){
		_e("<div class='sub-section' id='".$el."'>");
		_e("<div class='threeColumns wrapper'>");
		while(have_rows($el)): the_row();?>
			<div>
				<img src="<?php the_sub_field('icon');?>" />
				<h3><?php the_sub_field('title');?></h3>
				<p><?php the_sub_field('description');?></p>
			</div>
			
		<?php endwhile;
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
  			<div id="video" class="videoContainer wrapper">
				<div class="vimeoBlockedMessage">
        			<?php the_field('rsr_video_backup_message'); ?>
      			</div>
      			<iframe width="600" height="300" frameborder="0" allowfullscreen="" mozallowfullscreen="" webkitallowfullscreen="" src="<?php the_field('video_link'); ?>"></iframe>
    		</div>
  		</div>	
  		
  	<?php	
  	}
	
	
	
	
	function rsr_json_counters($el){
		$url = 'http://rsr.akvo.org/api/v1/right_now_in_akvo/?format=json';
		$str = file_get_contents($url);
		$json = json_decode($str, true); 
		?>	
			
			<ul class='list-box'>
				<?php while(have_rows($el)): the_row();?>
				<li class="box">
      				<h4><a href="<?php the_sub_field('link');?>"><?php the_sub_field('text');?></a></h4>
      				<div class="timeTicker">            
    					<p class="timeSegment clear">
       						<?php 
       							$str = $json[get_sub_field('json_slug')];
       							for( $i = 0; $i <= strlen($str); $i++ ) {
       								$char = substr( $str, $i, 1 );
       								if(is_numeric($char)){
       									_e("<span class='digit'>". $char ."</span>");
       								}
   									
								}
       						
       						?>
   						</p>
            		</div>
      			</li>
      			<?php endwhile;?>
      		</ul>
  		
  		<?php	
	}
	
	function rsr_overview_counters($el){
		echo "<div class='sub-section' data-behaviour='time-ticker'>";
		if(shortcode_exists('jsondata_feed')){
			do_shortcode('[jsondata_feed slug="rsr-counters" format="json"]');
		}
		
		echo "</div>";
	}
	
	
	
	
	
	function rsr_tour(){
		_e("<div class='sub-section'>");
		_e("<h3>".get_field('tour_title')."</h3>");
		$i = 0;
		while(have_rows('tour')): the_row();$i++;?>
			<div class="screenshot" id="screenshot-<?php _e($i);?>">
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
           			<a data-behaviour="anchor-reload" href="<?php _e(get_sub_field('image_link'));?>">
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
		<div class='sub-section' id="<?php _e($el);?>">
			<ul class='list-box'>
				<?php while(have_rows($el)): the_row();
					$desc = get_sub_field('description');
				?>
				<li class="box">
					<?php if($desc):?><h4><?php _e($desc);?></h4><br><?php endif;?>
      				<a href="<?php the_sub_field('link');?>" title="<?php the_sub_field('text'); ?>" class="button"><?php the_sub_field('text'); ?></a>
      			</li>
      			<?php endwhile;?>
  			</ul>
  		</div>	
		
		
	<?php
		
	}
	
	function rsr_media_section($el){
	
	?>
		<div class="sub-section">
			<div class="wrapper">
				
				<?php
				
					$sections = get_field($el);
					
				
				?>
				
				<ul>
					<?php foreach($sections as $section):?>
					<li class="media-box">
						
							<div class="media-big <?php if($section['image_text']):?>media-left<?php else:?>media-right<?php endif;?>">
								<h3><?php _e($section['title']);?></h3>
								<p><?php _e($section['description']); ?></p>
							</div>
							<div class="media-small text-center <?php if($section['image_text']):?>media-right<?php else:?>media-left<?php endif;?>">
								<a href="<?php _e($section['link']);?>"><img src="<?php _e($section['image']); ?>" /></a>	
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
	
	function rsr_features_section($el){
	
	?>
		<div class="sub-section" id="<?php _e($el);?>">
			<div class="wrapper">
				
				<?php
				
					$sections = get_field($el);
					
				
				?>
				<ul>
					<?php foreach($sections as $section):?>
					<li class="media-box">
							<h3><?php _e($section['title']);?></h3>
							<div class="media-big media-left">
								<p><?php _e($section['description']); ?></p>
							</div>
							<div class="media-small media-right">
								<a href="<?php _e($section['link']);?>"><img src="<?php _e($section['image']); ?>" /></a>	
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
	*/
	
	function tab_title($el){
		$title = get_field($el['title']."_tab_title");
		
		if(!$title){
			$title = $el['title'];
		}
		return $title;
	}
	
?>

<div id="content" class="floats-in productPage akvositesProduct">
	<!-- Header Section -->
	<hgroup>
  		<?php akvo_page_logo('logo');?>
		<h2 id="tagline"></h2>
	</hgroup>	
	
	<!-- Tab Header Section -->
	<section>
  		<ul class="rsr-tabs" data-behaviour="akvo-tabs">	
  			<?php foreach($tabs as $tab):?>
      		<li class="rsr-tab" data-tagline="<?php the_field($tab['tagline']);?>">
        		<a href="#<?php _e(akvo_slugify($tab['title'])); ?>"><?php _e(tab_title($tab));?></a>
        	</li>
        	<?php endforeach;?>	
    	</ul>
	</section>
  	
  	<!-- Tab Content Section -->
  	<?php foreach($tabs as $tab):?>
  	<section class="tab-content" id="<?php _e(akvo_slugify($tab['title'])); ?>">
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
</div>  


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">


<?php get_footer(); ?>
<script type="text/javascript">
	(function($){
		
		
		console.log('pre-tabs');	
		
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

       					
       					console.log('click');
       				});
       				
       				
       				
       			});
    			console.log('tabs');
    			
    			
    			
    			if(!window.location.hash){
    				window.location.hash = 'overview';
    			}
    			
    			
    			var hash = window.location.hash;
    			
    			$(hash).rsr_scroll_to();
    				
    			
    			
    		});
    	};
    	
    	
    	
    	
    	$('body').find('[data-behaviour~=akvo-tabs]').akvo_tabs();
  					
    	
    	
	}(jQuery));  
	
	

	
	
		
	
</script>