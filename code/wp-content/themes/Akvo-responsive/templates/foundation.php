<li id="post-<?php the_ID(); ?>" <?php post_class(); ?>> 
	<div class="imgWrapper">
		<?php the_post_thumbnail('thumbnail'); ?>
	</div>
		
	<div class="staffName"> <a href="#"><?php the_title(); ?></a> </div>
	<p class="staffTitle"><?php echo esc_html( get_post_meta( get_the_ID(), 'member_title', true ) ); ?></p>
	<span class="akvoTeam"><?php the_terms( $post->ID, 'new_member_team' ,  ' ' ); ?></span>
	<div class="staffBiog"><?php the_content(); ?></div>
	<small>Click for more details.</small>
</li>