<?php
	/*
		Template Name: All Staff
	*/
?>
<?php get_header(); ?>
<div id="content" role="main" class="floats-in teamPage withSubMenu">
	<?php if ( have_posts() ): while ( have_posts() ) : the_post(); the_content(); endwhile; endif; ?>
</div>
<div id="overlay">
	<div id="blanket"></div>
</div>
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
	<div class="buttons"><a class="cancel">close</a></div>
</div>
<?php get_footer(); ?>