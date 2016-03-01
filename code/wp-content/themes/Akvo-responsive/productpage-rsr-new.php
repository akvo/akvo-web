<?php
  /*
    Template Name: product-rsr-v3.1
  */
?>
<?php get_header(); ?>
<!--Start of Akvo.org RSR Product Page-->

<?php
	function slugify($text){ 
  		$slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $text);
   		return strtolower($slug);
	}
	function rsr_overview_columns(){
		_e("<div class='threeColumns wrapper'>");
		while(have_rows('overview_columns')): the_row();
			_e("<div>");
			_e("<h3>".get_sub_field('title')."</h3>");
			_e("<p>".get_sub_field('description')."</p>");
			_e("</div>");
		endwhile;
		_e("</div><div class='clearfix'></div>");
	}
	
	function rsr_feature_columns(){
		_e("<div class='threeColumns wrapper'>");
		while(have_rows('feature_columns')): the_row();
			_e("<div>");
			_e("<h3>".get_sub_field('heading')."</h3>");
			
			$boxes = get_sub_field('box');
			foreach($boxes as $box){
				_e("<h4>".$box['title']."</h4>");
				_e("<p>".$box['description']."</p>");
			}
			//print_r($boxes);
			
			//while(have_rows('feature_columns')): the_row();
			//endwhile;
			_e("<p>".get_sub_field('description')."</p>");
			_e("</div>");
		endwhile;
		_e("</div><div class='clearfix'></div>");
	}
	
	function rsr_testimonials(){
		_e("<div class='wrapper'>");
		_e("<h3 class='text-center'>What our users say</h3>");
		_e("<ul class='list-box'>");
		while(have_rows('testimonials')): the_row();?>
			<li class='box'>
				<div class='image' style="background-image:url('<?php the_sub_field('profile_picture');?>');"></div>
				<h4><?php the_sub_field('title');?></h4>
				<p><?php the_sub_field('description');?></p>
				<hr>
				<p><small><?php the_sub_field('name');?><br><?php the_sub_field('job_title');?></small></p>
			</li>
				
		<?php endwhile;
		_e("</ul>");
		_e("</div>");
	}
	
	$data = array(
		'overview_columns' => 'rsr_overview_columns',
		'feature_columns' => 'rsr_feature_columns',
		'testimonials' => 'rsr_testimonials'
	);

?>

<div id="content" class="floats-in productPage withSubMenu rsrProdPag">

  <!--div class="projectGateWay">
    <p>Already an RSR user?</p>
    <a href="http://rsr.akvo.org/sign_in" class="">Log in to Akvo RSR &rsaquo;</a>
  </div-->

  <hgroup>
    <h1>
      <?php the_field('rsr_name'); ?>
    </h1>
    <h2>
    	<?php the_field('rsr_overview_tagline'); ?>
    </h2>
  </hgroup>
  	<?php if(have_rows('rsr_main_sections')): ?>
  	<section>
  		
  		<ul class="tabs" data-behaviour="tabs">	
      		<?php while( have_rows('rsr_main_sections') ): the_row(); ?>
        	<li class="tab">
        		<a href="#<?php _e(slugify(get_sub_field('title'))); ?>"><?php the_sub_field('title');?></a>
        	</li>	
    		<?php endwhile; ?>
		</ul>
	</section>
  	<?php endif;?>
  
  	<?php while(have_rows('rsr_main_sections')): the_row();?>
  	<section class="wrapper tab-content" id="<?php _e(slugify(get_sub_field('title'))); ?>">
  		
  		<?php
  			$images = get_sub_field('images');
  			
  		?>
  		<?php if($images):?>
  		<ul class="bxslider">
  			<?php foreach($images as $image):?>
  			 <li class="">
            	<div class="borderTop"></div>
           		<div class="image" style="background-image:url(<?php _e($image['image']);?>);">
           			<?php if($image['image_text']):?>
           			<a href="<?php _e($image['image_link']);?>">
           				<?php _e($image['image_text']);?>
           			</a>
           			<?php endif;?>
           		</div>
            	<div class="borderBottom"></div>
            </li>
          	<?php endforeach;?>
  		</ul>
  		<?php endif;?>
  		
  		<?php 
  			$elements = get_sub_field('elements');
  			if($elements){ 
  				$elements = explode(',', $elements);
  				if(is_array($elements)){
  					foreach($elements as $el){
  						_e("<div class='sub-section'>");
  						call_user_func($data[$el]);
  						_e("</div>");
  					}
  				}
  			}
  			
  		?>
  		
  	</section>
  	<?php endwhile;?>
</div>  
<script type="text/javascript">
	$(document).ready(function() {
		console.log('init');
		$('.bxslider').bxSlider();
		
	});
	
	(function($){
    	$.fn.tabs = function(){
       		return this.each(function(){
       			var ul = $(this);
       			
       			
       			
       			ul.find('li').each(function(){
       				
       				var li = $(this);
       				var ahref = li.find('a[href]');
       				
       				var tab = $(ahref.attr('href'));
       				tab.hide();
       				
       				ahref.click(function(ev){
       					ev.preventDefault();
       					ev.stopPropagation();
       					
       					
       					
       					
       					var active_li = ul.find('li.active');
       					var active_tab = $(active_li.find('a[href]').attr('href'));
       					
       					if(active_tab.attr('id') != tab.attr('id')){
       						tab.show();	
       						active_tab.hide();
       						/*
       						active_tab.hide('slow', function(){
       							tab.show('slow');	
       						});
       						*/
       						active_li.removeClass('active');
       						li.addClass('active');
       					}
       					
       					
       					
       					console.log('click');
       				});
       			});
    			console.log('tabs');
    			
    			ul.find('li:first').addClass('active');
    			$(ul.find('li:first a[href]').attr('href')).show();
    		});
    	};
    	$('body').find('[data-behaviour~=tabs]').tabs();
	}(jQuery));  	
	
</script>
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/jquery.bxslider.css">
<!--script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.bxslider.min.js"></script-->

<?php get_footer(); ?>

