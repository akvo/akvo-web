<?php
/*
	Template Name: PricingAkvo
*/
?>
<?php get_header(); ?>
<!-- #content -->
<!--Start of Akvo.org Pricing-->
<div id="content" class="floats-in productPage withSubMenu pricingPage">
	<div class="engageBtn"><a href="<?php the_field('talk_to_us_link');?>">Get in touch</a></div>
	<hgroup>
		<h1 class="akvoPricingLogo"> Akvo.org Pricing</h1>
		<h2><?php the_field('pricing_tagline'); ?></h2>
	</hgroup>
	<section class="figure pricingHero"> <img src="<?php the_field('hero_image'); ?>" title="pricing Hero img"/> </section>

	<section class="introText">
		<div class="wrapper">
			<div class="fullWidthParag centerED">
				<?php the_field('intro_text'); ?>
			</div>
		</div>
	</section>

	<section class="flowPricing">
		<div class="wrapper">
			<h2 class="flowLogo"></h2>
			<div class="twoColumns">
				<div><?php the_field('flow_price_txt'); ?></div>
				<div><img src="<?php the_field('flow_price_img'); ?>" class=""/></div>
			</div>
		</div>
	</section>

	<section class="othersPricing">
		<div class="twoColumns wrapper">
			<div><h2 class="rsrLogo"></h2></div>
			<div><h2 class="sitesLogo"></h2></div>
		</div>
		<div class="wrapper"><div class="fullWidthParag centerED"><?php the_field('others_price_text'); ?></div></div>
	</section>

	<section class="pricingHelp">
		<h2><?php the_field('price_help_title'); ?></h2>
		<div class="wrapper"><div class="fullWidthParag centerED"><?php the_field('price_help_text'); ?></div></div>
		<div class="threeColumns wrapper">
			<div><img src="<?php the_field('price_img_1'); ?>" class=""/></div>
			<div><img src="<?php the_field('price_img_2'); ?>" class=""/></div>
			<div><img src="<?php the_field('price_img_3'); ?>" class=""/></div>
		</div>
	</section>
</div>
<!-- end content -->
<?php get_footer(); ?>