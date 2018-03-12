<?php
/*
	Template Name: Homepage-2018
*/
?>
<?php get_header();?>
<?php
	$sections = array(
		'intro'		=> array(
			'class'				=> 'topMsg',
			'fn'				=> 'intro_section',
			'next_link'			=> '#assessFunel',
		),
		'funnel'	=> array(
			'id'				=> 'assessFunel',	
			'class'				=> 'assessFunel',
			'fn'				=> 'content_section',
			'next_link'			=> '#vidBlock',
			'next_link_class'	=> 'nxtSection'
		),
		'video'		=> array(
			'id'				=> 'vidBlock',
			'class'				=> 'vidBlock',
			'fn'				=> 'video',
			'next_link'			=> '#hubTrustBlock',
			'next_link_class'	=> 'nxtSection'
		),
		'clients'	=> array(
			'id'		=> 'hubTrustBlock',
			'class'		=> 'hubTrustBlock floats-in',
			'fn'		=> 'logos',
			'wrapper'	=> true
		),
		
	);
?>
<div id="content" class="floats-in homePage">
	<?php
		$akvo_page = new akvoBlackBody;
		$akvo_page->display_sections( $sections );
		
		the_hubs_list();
	?>	
</div>
<?php get_footer();?>