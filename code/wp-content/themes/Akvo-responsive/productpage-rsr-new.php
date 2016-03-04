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
			foreach($boxes as $box):?>
				<div class="sub-section">
					<i class="fa fa-2x <?php _e($box['icon']);?>"></i>
					<h4><?php _e($box['title']);?></h4>
					<p><?php _e($box['description']);?></p>
				</div>	
			<?php endforeach;
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
	
	function rsr_tour(){
		_e("<h3>Akvo RSR Tour</h3>");
		while(have_rows('tour')): the_row();?>
			<div class="screenshot">
				<h4><?php the_sub_field('title');?></h4>
				<p><?php the_sub_field('description');?></p>
				<img src="<?php the_sub_field('image');?>" />
			</div>
		<?php endwhile;
	}
	
	function rsr_carousel($images){
		_e("<ul class='bxslider'>");
		foreach($images as $image):?>
			 <li>
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
    	<?php endforeach; 
		_e("</ul>");
	}
	
	function rsr_banner($image){
	?>
		<div class="banner" style="background-image:url('<?php _e($image['image']);?>');"></div>
	<?php	
	}
	
	$data = array(
		'overview_columns' => 'rsr_overview_columns',
		'feature_columns' => 'rsr_feature_columns',
		'testimonials' => 'rsr_testimonials',
		'tour' => 'rsr_tour'
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
    <h2 id="tagline"></h2>
  </hgroup>
  	<?php if(have_rows('rsr_main_sections')): ?>
  	<section>
  		
  		<ul class="tabs" data-behaviour="tabs">	
      		<?php while( have_rows('rsr_main_sections') ): the_row(); ?>
        	<li class="tab" data-tagline="<?php the_sub_field('tagline');?>">
        		<a href="#<?php _e(slugify(get_sub_field('title'))); ?>"><?php the_sub_field('title');?></a>
        	</li>	
    		<?php endwhile; ?>
		</ul>
	</section>
  	<?php endif;?>
  
  	<?php while(have_rows('rsr_main_sections')): the_row();?>
  	<section class="wrapper tab-content" id="<?php _e(slugify(get_sub_field('title'))); ?>">
  		
  		<?php
  			/* Display a carousel or banner image */
  			$images = get_sub_field('images');
  			if($images){
  				if(get_sub_field('carousel') == 'Yes'){ rsr_carousel($images);} 
  				else{ rsr_banner($images[0]);}
  			}	
  		
  			/* Displaying the inline elements within the tab */ 
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
    	$('body').find('[data-behaviour~=tabs]').tabs();
	}(jQuery));  	
	
</script>
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/jquery.bxslider.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<!--script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.bxslider.min.js"></script-->

<?php get_footer(); ?>

