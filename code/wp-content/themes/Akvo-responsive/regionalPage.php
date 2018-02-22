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
			'fn'	=> 'hubs_list',
			'wrapper'	=> true
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
	/* LANGUAGE TOGGLE */
	
	/* LANGUAGE TOGGLE */
	.fullBlack .hubMarketing, .fullBlack .hubFeature{
		height: auto;
	}
	
	
	.fullBlack .hubFeature figure{
		min-width: 350px;
		overflow: hidden;
	}
	@media( max-width: 768px){
		.fullBlack .hubFeature figure{
			min-width: auto;
			
		}
	}
	.fullBlack .hubFeature figure figcaption, .fullBlack .hubFeature figure p{
		padding: 10px;
		background: rgba(0, 0, 0, 0.7);
		width: 80%;
	}
	
	.fullBlack .hubTrustBlock .list-scroll li.logo{
		width: 185px;
		margin: 0 25px;
	}
	
	.fullBlack .hubAdress .col-contact .contact{
		max-width: 350px;
		margin-left: auto;
		margin-right: auto;
	}
	
	
	<?php $i = 0;while(have_rows('contacts')): the_row(); $i++;?>
	.fullBlack .hubAdress .col-contact:nth-child(<?php _e($i);?>) .map-icon{
		background-image:url('<?php the_sub_field('contact_image');?>');
	}
	.fullBlack .hubAdress .col-contact:nth-child(<?php _e($i);?>) .map-icon:hover{
		background-image:url('<?php the_sub_field('contact_image_hover');?>');
	}
	<?php endwhile;?>
	.fullBlack .hubAdress .map-icon{
		position: relative;
	}
	.fullBlack .hubAdress .map-icon a[href], .fullBlack .hubFeature a[href]{
		position: absolute;
		width: 100%;
		height: 100%;
		top: 0;
		left:0;
	}
	.fullBlack .allHubBlock ul li.IN:hover > .helloMsg{
		left: -40px;
	}
</style>
<?php get_footer();?>