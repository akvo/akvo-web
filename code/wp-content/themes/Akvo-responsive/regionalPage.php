<?php
/*
	Template Name: Regional-Page-2017
*/
?>
<?php get_header();?>
<div id="content" class="floats-in hubPage">
	<section class="topMsg hubEA" style="background-image:url('<?php the_field('cover_image');?>');">
		<div class="swooch hubEA" style="background-image:url('<?php bloginfo('template_url');?>/images/Squiggle-Yellow.png');"></div>
		<div class="hubIntro"><?php the_field('cover_content');?></div>
		<a href="#hub-marketing-intro" class="nxtSection"></a>
	</section>
	<section id="hub-marketing-intro" class="hubMarketing wrapper">
		<div class=""><?php the_field('intro_content');?></div>
	</section>
	<section class="hubFeature">
		<ul class="threeColumns wrapper">
			<?php while(have_rows('projects')): the_row();?>
			<li>
				<figure>
					<img src="<?php the_sub_field('image');?>">
					<figcaption><?php the_sub_field('title');?></figcaption>
					<p><?php the_sub_field('description');?></p>
				</figure>
			</li>
			<?php endwhile;?>
		</ul>
	</section>
	<section class="hubTrustBlock floats-in">
		<?php the_field('clients_content');?>
		<ul class="wrapper fiveColumns">
			<?php while(have_rows('clients')): the_row();?>
			<li><img src="<?php the_sub_field('logo');?>"></li>
			<?php endwhile; ?>
		</ul>
	</section>
	<section class="hubContact">
		<div class="wrapper"><?php the_field('form_content');?></div>
	</section>
	<section class="hubAdress">
		<h1><?php the_field('contact_heading');?></h1>
		<ul class="wrapper twoColumns floats-in">
			<?php while(have_rows('contacts')): the_row();?>
			<li class="bko" style="background-image:url('<?php the_sub_field('contact_image');?>');">
				<?php the_sub_field('contact_address');?>
			</li>
			<?php endwhile; ?>
		</ul>
	</section>
	<hr class="delicate">
	<section class="allHubBlock">
		<h1>Looking for one of our other offices?</h1>
		<ul class="wrapper sixColumns">
			<li class="EU">
				<a href="#" style="background-image:url('<?php bloginfo('template_url');?>/images/location-hexagons_Europe.png');">Netherlands, Amsterdam</a>
				<div class="helloMsg"><h2>Welkom</h2></div>
			</li>
			<li class="WA">						
				<a href="#" style="background-image:url('<?php bloginfo('template_url');?>/images/location-hexagons_WestAfrica.png');">Mali, Bamako</a>
				<div class="helloMsg"><h2>Bienvenue</h2></div>
			</li>
			<li class="EA">						
				<a href="#" style="background-image:url('<?php bloginfo('template_url');?>/images/location-hexagons_EastAfrica.png');">Kenya, Nairobi</a>
				<div class="helloMsg"><h2>Karibu</h2></div>
			</li>
			<li class="IN">							
				<a href="#" style="background-image:url('<?php bloginfo('template_url');?>/images/location-hexagons_SEAsia_SEAP.png');">Indonesia, Bali</a>
				<div class="helloMsg"><h2>SELAMAT DATANG</h2></div>
			</li>
			<li class="SA">							
				<a href="#" style="background-image:url('<?php bloginfo('template_url');?>/images/location-hexagons_SouthAsia.png');">India, Delhi</a>
				<div class="helloMsg"><h2>Welcome</h2></div>
			</li>
			<li class="US">							
				<a href="#" style="background-image:url('<?php bloginfo('template_url');?>/images/location-hexagons_Americas.png');">USA, Washington</a>
				<div class="helloMsg"><h2>Welcome</h2></div>
			</li>
		</ul>
	</section>
</div>
<?php get_footer();?>
<!--style>
	.list-inline .logo img{
		height: 100px;
	}
</style-->