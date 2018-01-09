<?php
	/*
		Template Name: product-tabs
	*/
?>
<?php get_header(); ?>
<!--Start of Akvo.org TABS Product Page-->
<?php
	
	$tabs = array(
		'overview' => array(
			'title' => 'overview',   			// tab title, 2nd field is the acf id
			'tagline' => 'overview_tagline',  	// tagline for the particular tab
			'elements' => array(
				'overview_carousel' 	=> 'carousel',
				'overview_columns' 		=> 'overview_columns_new',
				'overview_buttons' 		=> 'buttons',
				'overview_testimonials' => 'testimonials',
				'overview_counter' 		=> 'time_ticker'
			)
		),
		'services' => array(
			'title' => 'services',
			'tagline' => 'services_tagline',
			'elements' => array(
				'services_cover' 		=> 'page_section',
				'services_intro' 		=> 'inner_section',
				'services_list' 		=> 'services_list',
				'services_buttons' 		=> 'buttons',
				'services_testimonials' => 'testimonials'
			)
		),
		'features' => array(
			'title' => 'features',
			'tagline' => 'features_tagline',
			'elements' => array(
				'features_cover' 	=> 'page_section',
				'features_rows' 	=> 'services_list'
			)
		),
		'pricing' => array(
			'title' => 'pricing',
			'tagline' => 'pricing_tagline',
			'elements' => array(
				'pricing_cover' 	=> 'page_section',
				'pricing_image' 	=> 'image',
				'pricing_intro' 	=> 'inner_section',
				'pricing_buttons' 	=> 'buttons',
				'pricing_ending' 	=> 'inner_section'
				
			)
		)
	);
?>

<div id="content" class="floats-in productPage tabsProduct <?php the_field('product');?>" data-behaviour="tabs-page">
	<?php
		$akvo_tab = new akvoTab;
		$akvo_tab->display_tabs($tabs);
	?>
</div>
<style>
	.overview-columns h3{
		margin: 1.25em auto 1em;
	}
	.overview-columns .colored-box{
		border-radius: 15px;
		background: rgba(0, 0, 0, 0.2);
	}
	.caddisflyProduct .overview-columns .colored-box, .flowProduct .overview-columns .colored-box{
		background: rgba(222, 137, 41, 0.2);
	}
	.lumenProduct .overview-columns .colored-box{
		background: rgba(116, 182, 49, 0.5);
	}
	.rsrProduct .overview-columns .colored-box{
		background: rgba(114, 205, 255, 0.2);
	}
</style>
<?php get_footer(); ?>