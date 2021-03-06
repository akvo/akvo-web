<!-- FUNNEL INTRO -->
<section id="assess01" class="funelContainer">
	<div class="funnelContent"><?php the_field('intro_content');?></div>
	<div class="funnelStart" style="background-image:url('<?php the_field('intro_bg');?>');">
		<a href="#funnel-1" data-behaviour="fnl-nxt-btn" style="background-image:url('<?php the_field('intro_icon');?>');">Start</a>
	</div>
</section>
<!-- FUNNEL INTRO -->
<?php 
	$i = 1;
	
	$section_count = count( get_field('section') );
	
	while( have_rows('section') ): the_row();
		
		$question = get_sub_field('question');
		
		$next_link = '#funnel-'.($i+1);
	
		if( $i >= $section_count ){ $next_link = '#funnel-form';}
		
		$styles = "";
		
		$bg_image = get_sub_field( 'bg_image' );
		if( $bg_image ){
			$styles = "background-image: url('".$bg_image."')";
		}
		
		$field_name = get_sub_field( 'field_name' );
		$field_value = get_sub_field( 'field_value' );
		
?>
<section id="funnel-<?php _e( $i );?>" class="funelContainer hidden" style="<?php _e( $styles );?>">
	<div class="funnelContent">
		<h2 class="subFunHeader"><?php the_sub_field('header');?></h2>
		<h1><?php _e( $question );?></h1>
		
		<?php $more_info = get_sub_field('more_info'); if( $more_info ):?>
		<span class="infoHover">More info</span>				
		<p class="moreInfo"><?php _e( $more_info );?></p>
		<?php endif; ?>
		
		<?php $buttons_count = count( get_sub_field('buttons') );?>
		
		<ul class="<?php if( $buttons_count <=2 ){_e('inlined');}?>">
			<?php while( have_rows('buttons') ) : the_row();?>
			<li><a href="<?php _e( $next_link );?>" data-field-name="<?php _e( $field_name );?>" data-field-value="<?php _e( $field_value );?>" data-behaviour="fnl-nxt-btn" data-q="<?php _e( $question );?>" class="bouton"><?php the_sub_field('title')?></a></li>
			<?php endwhile;?>
		</ul>
	</div>
</section>		
<?php $i++; endwhile;?>	
<section id="funnel-form" data-field="<?php the_sub_field('form_field');?>" class="funelContainer hidden" style="background-image:url('<?php the_field('form_bg');?>');">
	<div class="funnelContent">
		<?php the_field('form_content');?>
	</div>
</section>