<?php
/*
	Template Name: HelpPage
*/
?>
<?php get_header(); ?>
<!--Start of Akvo.org helpPage-->
<div id="content" class="floats-in helpSupport">
	<h1 class="backLined"><?php the_title();?></h1>
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	<div class="centerED wrapper">
		<?php the_content(); ?>
	</div>
	<?php endwhile; // end of the loop. ?>
	<hr class="delicate" /> 
	<?php if( have_rows('products') ):?>
	<section><nav><ul class="wrapper threeColumns floats-in">
		<?php while( have_rows('products') ): the_row();?>
		<li class="bgDeco text-center" style="min-height: 120px;margin-bottom: 5px;padding-top: 40px;">
			<a href="<?php the_sub_field( 'link' );?>">
				<img style="max-height: 40px;" src="<?php the_sub_field('logo');?>" />
			</a>
		</li>
		<?php endwhile;?>
	</ul></nav></section>
	<?php else: ?>
	<section><nav><ul class="wrapper threeColumns floats-in">
		<li class="bgDeco">
			<a href="http://rsrsupport.akvo.org/" class="rsrHelp">RSR Help</a>
			<p class="centerED fullWidthParag">Do you need some help with Akvo RSR? We can throw you a life line.</p>
			<a href="http://rsrsupport.akvo.org/" class="moreHelp rsrH">Get Help</a>
		</li>
		<li class="bgDeco">
			<a href="http://flowsupport.akvo.org/" class="flowHelp">Flow Help</a>
			<p class="centerED fullWidthParag">Are you feeling a bit lost in Akvo FLOW? We can show you the way.</p>
			<a href="http://flowsupport.akvo.org/" class="moreHelp flowH">Get Help</a>
		</li>
		<li class="bgDeco">
			<a href="akvopedia-help" class="akvopediaHelp">Akvopedia Help</a>
			<p class="centerED fullWidthParag">Do you need help with Akvopedia? Have a look in our first aid kit.</p>
			<a href="akvopedia-help" class="moreHelp pediaH">Get Help</a>
		</li>
	</ul></nav></section>
	<?php endif;?>
</div>

<!-- end content -->
<?php get_footer(); ?>
