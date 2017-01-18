<div class='col-4'>
	<div class='card text-center'>
		<a href="<?php the_permalink();?>">
			<?php the_post_thumbnail();?>
			<h4 class='card-title'><?php the_title();?></h4>
			<p><?php _e(substr(get_the_excerpt(), 0, 120).'...');?></p>
		</a>	
	</div>	
</div>