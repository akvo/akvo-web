<?php
/*
	Template Name: Regional-Page-2017
*/
?>
<?php get_header();?>
<div id="content" class="floats-in hubPage">
	<section class="topMsg hubEA" style="background-image:url('<?php the_field('cover_image');?>');">
		<div class="swooch hubEA" style="background-image:url('<?php the_field('overlay_image');?>"></div>
		<div class="hubIntro"><?php the_field('cover_content');?></div>
		<a href="#hub-marketing-intro" class="nxtSection"></a>
	</section>
	<section id="hub-marketing-intro" class="hubMarketing wrapper">
		<div class=""><?php the_field('intro_content');?></div>
	</section>
	<section class="hubFeature" style="background-image:url('<?php the_field('feature_image');?>');">
		<div class="wrapper">
			<ul class="list-inline text-center">
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
		</div>
	</section>
	<section class="hubTrustBlock floats-in">
		<div class="wrapper">
			<?php the_field('clients_content');?>
			<ul class="list-scroll">
				<?php while(have_rows('clients')): the_row();?>
				<li class='logo'><img src="<?php the_sub_field('logo');?>"></li>
				<?php endwhile; ?>
			</ul>
		</div>
	</section>
	<section class="hubContact">
		<div class="wrapper"><?php the_field('form_content');?></div>
	</section>
	<section class="hubAdress">
		<div class="wrapper">
			<h1><?php the_field('contact_heading');?></h1>
			<div class="row">
				<?php while(have_rows('contacts')): the_row();?>
				<div class="col-6">
					<div class="map-icon"></div>
					<div class="map-addr"><?php the_sub_field('contact_address');?></div>
					<div style="clear:both"></div>
				</div>
				<?php endwhile; ?>
			</div>
		</div>	
	</section>
	<hr class="delicate">
	<section class="allHubBlock">
		<div class="wrapper">
			<h1>Looking for one of our other offices?</h1>
			<ul class="list-scroll">
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
		</div>
	</section>
</div>
<style>
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
</style>
<?php get_footer();?>