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
			'id'	=> 'hubTrustBlock',
			'class'	=> 'hubTrustBlock floats-in',
			'fn'	=> 'logos'
		),
		'hubs_list'	=> array(
			'class'	=> 'allHubBlock floats-in',
			'fn'	=> 'hubs_list'
		)
	);
?>
<div id="content" class="floats-in homePage">
	<?php
		$akvo_page = new akvoBlackBody;
		$akvo_page->display_sections( $sections );
	?>
</div>
<?php get_footer();?>
<style>
	.fullBlack .homePage .vidBlock{
		height: auto;
		padding-bottom: 70px;
	}
	.fullBlack .homePage .topMsg .hubIntro p .btnOutline{
		font-size: 0.7em;
		padding: 0 25px;
	}
</style>