<li id="post-<?php the_ID(); ?>">
	<!-- Display featured image in right-aligned floating div -->
	<div class="imgWrapper"><?php the_post_thumbnail('thumbnail'); ?></div>
	<!-- Display Title and Name -->
	<div class="staffName"> <a href="#"><?php echo esc_html( get_post_meta( get_the_ID(), 'partner_name', true ) ); ?></a> </div>
	<p class="staffTitle"><?php echo esc_html( get_post_meta( get_the_ID(), 'partner_tagline', true ) ); ?></p>
	<span class="akvoTeam"><?php the_terms( $post->ID, 'new_partners_team' ,  ' ' ); ?></span>
	<div class="staffBiog"><?php the_content(); ?></div>
	<small>Click for more details.</small> 
</li>