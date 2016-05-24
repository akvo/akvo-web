<?php
  /*
    Template Name: product-caddisfly-v1.0
  */
?>
<?php get_header(); ?>
<!--Start of Akvo.org CADDISFLY Product Page-->


<?php
	
	
	
?>

<div id="content" class="floats-in productPage withSubMenu caddisflyProduct">
	<hgroup>
  		<?php akvo_page_logo('logo');?>
    	<h2 id="tagline"><?php the_field('tagline');?></h2>
    </hgroup>
	
	<?php akvo_page_section('section');?>
	
  	
  	<section>
  		<div class='page-section full-width' id="tests-section">
  			<?php the_field('tests_section');?>
  			<br>
  			<ul>
  				<?php while(have_rows('tests')): the_row();?>
  				<li class="box">
  					<img src="<?php the_sub_field('icon');?>" />
  					<p><?php the_sub_field('description');?></p>
  				</li>
  				<?php endwhile;?>
  				<li class="clearfix"></li>
  			</ul>
  		</div>
  		<div class='page-section'><?php the_field('tests_footer');?></div>
  	</section>
  	<?php akvo_page_section('section_end', true);?>
  	<section>
  		<div class='page-section' id='get-involved-section'>
  			<?php the_field('get_involved_section');?>
  			<br>
  			<ul class="text-center">
  				<?php while(have_rows('get_involved_buttons')): the_row();?>
  				<li class='box-btn'><a class="button orange-bg" href="<?php the_sub_field('link');?>"><?php the_sub_field('text');?></a></li>
  				<?php endwhile;?>
  				<li class="clearfix"></li>
  			</ul>
  		</div>	
  	</section>
  	
  	<section class="grey-bg">
  		<div class='page-section' id="about-section">
  			<?php the_field('about_section');?>
  		</div>
  	</section>
  	
</div>  
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<?php get_footer(); ?>