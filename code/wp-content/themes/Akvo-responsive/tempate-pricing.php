<?php
/*
	Template Name: Pricing
*/
?>

<?php get_header(); ?>
<!-- #content --> 

<!-- #main --> 
<div id="content" class="floats-in">
  <div class="">
    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
    <header>
      <h1 class="backLined">
        <?php the_title(); ?>
      </h1>
    </header>

	<div class="wrapper">

		<?php the_content(); ?>

		<?php $cnt=0; if( have_rows('pricing') ): ?>
		
		<div class="pricingtable2">
		<?php while ( have_rows('pricing') ) : the_row(); $cnt++; ?>
		 		            			    
	      <div class="pricecat price-<?php echo $cnt; ?>">
	        <h4><?php the_sub_field('price_title'); ?></h4>
	        <img src="<?php the_sub_field('price_image'); ?>" alt="<?php the_sub_field('price_title'); ?>" />
	        <p><?php the_sub_field('price_description'); ?></p>
	      </div>	    	       
		 
		<?php endwhile; ?>
		</div>	

		<?php else :
		 
		    // no rows found
		 
		endif;
		?>
		
	</div><!--wrapper-->

  </div>
	<?php endwhile; // end of the loop. ?>
<!-- /#main --> 
  
</div>
<!-- /#content --> 

<br style="clear:both;">


<?php get_footer(); ?>