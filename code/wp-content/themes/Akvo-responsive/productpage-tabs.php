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
			'tagline' => 'over_tag',  			// tagline for the particular tab
			'elements' => array(
				'over_images' 	=> 'carousel',
				'over_cols' 	=> 'overview_columns',
				'over_btns' 	=> 'buttons',
				'over_test' 	=> 'testimonials',
				'over_count'	=> 'time_ticker'
			)
		),
		'services' => array(
			'title' => 'services',
			'tagline' => 'serv_tag',
			'elements' => array(
				'serv_img' 			=> 'cover',
				'serv_intro' 		=> 'inner_section',
				'serv_list' 		=> 'services_list',
				'serv_btns' 		=> 'buttons',
				'serv_test' 		=> 'testimonials'
			)
		),
		'features' => array(
			'title' => 'features',
			'tagline' => 'feat_tag',
			'elements' => array(
				'feat_img' 		=> 'cover',
				'feat_intro' 	=> 'inner_section',
				'feat_rows' 	=> 'services_list'
			)
		),
		'pricing' => array(
			'title' => 'pricing',
			'tagline' => 'pric_tag',
			'elements' => array(
				'pric_img' 		=> 'cover',
				'pric_intro' 	=> 'inner_section',
				'pric_btns' 	=> 'buttons',
				'pric_ending' 	=> 'inner_section'
				
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
	.tabsProduct .akvo-tabs .akvo-tab.active a[href]{
		color: #FFF !important;
	}
	
	.tabsProduct .shallow-banner{
		background-size: cover;
		min-height: 200;
		background-position: center;
	}
	
	.tabsProduct h3.icon{
		text-align: left;
	}
	
	.tabsProduct .narrow-col{
		max-width: 300px;
		margin-left: auto;
		margin-right: auto;
		min-height: 180px;
	}
	
	/* BLUE COLOR SCHEMES */
	.rsrProduct.tabsProduct [data-behaviour~=akvo-tabs] li{
		border: #72CDFF solid 1px;
	}
	.rsrProduct.tabsProduct [data-behaviour~=akvo-tabs] li:last-child{
		border-color: #72CDFF;
	}
	.rsrProduct.tabsProduct [data-behaviour~=akvo-tabs] li:last-child a{
		color: #72CDFF;
	}
	.rsrProduct.tabsProduct [data-behaviour~=akvo-tabs] li.active, .rsrProduct.tabsProduct a[href].button{
		background: #72CDFF;
	}
	/* BLUE COLOR SCHEMES */
	
	/* ORANGE COLOR SCHEMES */
	.caddisflyProduct.tabsProduct [data-behaviour~=akvo-tabs] li:last-child{
		border-color: rgba(222, 137, 41, 0.8);
	}
	.caddisflyProduct.tabsProduct [data-behaviour~=akvo-tabs] li:last-child a{
		color: rgba(222, 137, 41, 0.8);
	}
	/* ORANGE COLOR SCHEMES */
	
	/* OVERVIEW TAB */
	.tabsProduct #over_cols{
		margin-top: 3em;
	}
	.tabsProduct #over_cols h3{
		margin: 1.25em auto 1em;
	}
	
	/* IMAGES WITHIN THE OVERVIEW COLUMNS */
	@media( max-width: 768px ){
		.tabsProduct #over_cols img.aligncenter{
			max-width: 300px;
		}
	}
	.tabsProduct .colored-box{
		border-radius: 15px;
		background: rgba(0, 0, 0, 0.2);
	}
	.caddisflyProduct .colored-box, .flowProduct .colored-box{
		background: rgba(222, 137, 41, 0.2);
	}
	.lumenProduct .colored-box{
		background: rgba(116, 182, 49, 0.5);
	}
	.rsrProduct .colored-box{
		background: rgba(114, 205, 255, 0.2);
	}
	
	.tabsProduct #over_test{
		margin-top: 8em;
	}
	.tabsProduct #over_btns{
		margin-top: 3em;
	}
	.tabsProduct #over_count{
		margin-top: 6em;
	}
	.tabsProduct #over_count h4 a[href]{
		color: inherit;
	}
	/* OVERVIEW TAB */
	
	/* SERVICES TAB */
	.tabsProduct #serv_list, .tabsProduct #serv_btns{
		margin-top: 4em;
	}
	.tabsProduct #serv_test{
		margin-top: 6em;
	}
	#serv_list strong{
		color: #2c2a74;
		font-size: 1.2em;
		font-weight: normal;
		font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
		line-height: 1.25em;
	}
	
	/* SERVICES TAB */
</style>
<?php get_footer(); ?>