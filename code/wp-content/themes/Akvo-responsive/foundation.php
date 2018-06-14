<?php
	/*
		Template Name: foundationPage
	*/
	
	global $akvo;
	
?>
<?php get_header(); ?>

<!--Start of Akvo.org Contact Info page-->

<p>&nbsp;</p>
<div id="content" class="floats-in foundation">
	<?php while( have_posts() ): the_post();?>
	<h1 class="backLined"><?php the_title(); ?></h1>
	<div class="wrapper textColumn centerED">
		<?php the_content();?>
	
	</div>
	<?php endwhile;?>
	
	<?php while( have_rows('section') ): the_row(); ?>
    <hr class="delicate" />
    <section class="wrapper uncenterED floats-in directorContainer">
		<div class="textColumn">
			<h2><?php the_sub_field('name'); ?></h2>
			<?php the_sub_field('description'); ?>
		</div>
		<div class="directors">
			<?php while( has_sub_field('group') ): ?>
			<div class="subDirectors">
				<h4><?php the_sub_field('title'); ?></h4>
				<?php $akvo->foundation_list( get_sub_field('class') );?>
			</div>
			<?php endwhile; ?>
		</div>
    </section>
	<?php endwhile; ?>
    
	<div id="overlay"><div id="blanket"></div></div>

	<!-- the dialog contents -->
	<div id="descrDialog" class="dialog">
		<div id="staffDescr">
			<div class="extLoad" id="">
				<div class="imgWrapper"></div>
				<h1 class="staffName"></h1>
				<p class="staffTitle"></p>
				<p class="staffBio"><br/><br/> </p>
			</div>
		</div>
		<div class="buttons">
			<a class="cancel">close</a>
		</div>
	</div>
</div>
<!-- end content -->
<?php get_footer(); ?>