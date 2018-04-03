<?php
/*
	Template Name: Regional-Page-2017
*/
?>
<?php get_header();?>
<?php
	$sections = array(
		'cover_content'		=> array(
			'class'				=> 'topMsg hubEA',
			'fn'				=> 'intro_section',
			'next_link'			=> '#hub-marketing-intro',
			'bg_image'			=> 'cover_image'
		),
		'intro_content'	=> array(
			'id'				=> 'hub-marketing-intro',
			'class'				=> 'hubMarketing',
			'fn'				=> 'content_section',
			'wrapper'			=> true,
		),
		'projects'	=> array(
			'class'				=> 'hubFeature',
			'fn'				=> 'projects',
			'wrapper'			=> true,
			'bg_image'			=> 'feature_image',
			'next_link'			=> '#hubTrustBlock',
			'next_link_class'	=> 'nxtSection blueFill'
		),
		'clients'	=> array(
			'id'				=> 'hubTrustBlock',
			'class'				=> 'hubTrustBlock floats-in',
			'fn'				=> 'logos',
			'wrapper'			=> true
		),
		'form_content' => array(
			'fn'				=> 'content_section',
			'class'				=> 'hubContact '.get_field('form_bg'),
			'wrapper'			=> true
		),
		'contact' => array(
			'fn'				=> 'contacts_section',
			'class'				=> 'hubAdress',
			'wrapper'			=> true
		),
	);
?>
<div id="content" class="floats-in hubPage">
	<?php
		$akvo_page = new akvoBlackBody;
		$akvo_page->display_sections( $sections );
		
		the_hubs_list();
	?>
</div>
<style>
	.hubContact .wrapper{ max-width: 800px; }
	<?php $i = 0;while(have_rows('contacts')): the_row(); $i++;?>
	.fullBlack .hubAdress .col-contact:nth-child(<?php _e($i);?>) .map-icon{
		background-image:url('<?php the_sub_field('contact_image');?>');
	}
	.fullBlack .hubAdress .col-contact:nth-child(<?php _e($i);?>) .map-icon:hover{
		background-image:url('<?php the_sub_field('contact_image_hover');?>');
	}
	<?php endwhile;?>
	
	.fullBlack .hubPage .hubFeature{
		padding: 75px 20px;
	}
	
	.fullBlack .hubPage .hubFeature a[href].nxtSection{
		top: auto;
		width: 50px;
		height: 50px;
		left: calc(50% - 25px);
		bottom: -50px;
	}	
	.fullBlack .hubPage .hubFeature	.projects-title-wrapper{
		margin-bottom: 30px;
	}
	.fullBlack .hubPage .hubFeature	.projects-title-wrapper h2{
		color: inherit;	
	}
	
</style>
<?php get_footer();?>