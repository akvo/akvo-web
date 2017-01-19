<div class='col-4'>
	<div class='card'>
		<a href="<?php the_permalink();?>" style="color: inherit;">
			<small><?php echo akvo_card_taxonomy($the_query->post->ID, 'region')." - ".akvo_card_taxonomy($the_query->post->ID, 'sector');?></small>
			<div class="card-image">
				<?php the_post_thumbnail('medium_large');?>
				<div class='card-band <?php echo akvo_slugify(akvo_card_taxonomy($the_query->post->ID, 'product'));?>'></div>
			</div>
			<h4 class='card-title'><?php the_title();?></h4>
			<p class="text-muted"><?php _e(get_post_meta( $the_query->post->ID, 'partner-name', true ));?></p>
		</a>	
	</div>	
</div>