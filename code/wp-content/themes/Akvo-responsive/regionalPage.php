<?php
/*
	Template Name: Regional-Page-2017
*/
?>
<?php get_header();?>
<?php
	$sections = array(
		'cover_content'		=> array(
			'class'		=> 'topMsg hubEA',
			'fn'		=> 'intro_section',
			'next_link'	=> '#hub-marketing-intro',
			'bg_image'	=> 'cover_image'
		),
		'intro_content'	=> array(
			'id'		=> 'hub-marketing-intro',
			'class'		=> 'hubMarketing',
			'fn'		=> 'content_section',
			'wrapper'	=> true,
		),
		'projects'	=> array(
			'class'		=> 'hubFeature',
			'fn'		=> 'projects',
			'wrapper'	=> true,
			'bg_image'	=> 'feature_image'
		),
		'clients'	=> array(
			'id'		=> 'hubTrustBlock',
			'class'		=> 'hubTrustBlock floats-in',
			'fn'		=> 'logos',
			'wrapper'	=> true
		),
		'form_content' => array(
			'fn'	=> 'content_section',
			'class'	=> 'hubContact',
			'wrapper'	=> true
		),
		'contact' => array(
			'fn'	=> 'contacts_section',
			'class'	=> 'hubAdress',
			'wrapper'	=> true
		),
		'hubs_section_break' => array(
			'fn'	=> 'section_break'
		),
		'hubs_list'	=> array(
			'class'	=> 'allHubBlock floats-in',
			'fn'	=> 'hubs_list'
		)
	);
?>
<div id="content" class="floats-in hubPage">
	<?php
		$akvo_page = new akvoBlackBody;
		$akvo_page->display_sections( $sections );
	?>
</div>
<style>
	.fullBlack .hubMarketing, .fullBlack .hubFeature{
		height: auto;
	}
	.fullBlack .hubTrustBlock .list-scroll li.logo{
		width: 185px;
		margin: 0 25px;
	}
	<?php $i = 0;while(have_rows('contacts')): the_row(); $i++;?>
	.hubAdress .col-6:nth-child(<?php _e($i);?>) .map-icon{
		background-image:url('<?php the_sub_field('contact_image');?>');
	}
	.hubAdress .col-6:nth-child(<?php _e($i);?>) .map-icon:hover{
		background-image:url('<?php the_sub_field('contact_image_hover');?>');
	}
	<?php endwhile;?>
	.fullBlack .allHubBlock ul li.IN:hover > .helloMsg{
		left: -40px;
	}
</style>
<?php get_footer();?>