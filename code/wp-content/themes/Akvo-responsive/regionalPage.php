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
					<div class="map-icon" style="background-image:url('<?php the_sub_field('contact_image');?>');"></div>
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
<?php get_footer();?>
<style>
	.fullBlack .topMsg .swooch.hubEA{
		background-size: cover;
	}
	.fullBlack .hubMarketing, .fullBlack .hubTrustBlock, .fullBlack .hubContact, .fullBlack .allHubBlock{
		padding: 75px 20px;
	}
	.fullBlack .hubAdress h1{
		padding: 0 20px;
		margin-bottom: 45px;
	}
	.fullBlack .hubFeature{
		padding: 50px 20px;
		background-size: contain;
	}
	.list-scroll{
		padding-left:0;
		text-align: center;
		white-space: nowrap;
		overflow: auto;
		overflow-y: hidden;
		-webkit-overflow-scrolling: touch;
	}
	.list-scroll li{
		display: inline-block;
		position: relative;
	}
	.list-scroll li.logo{
		width: 220px;
	}
	.hubFeature li{
		margin-bottom: 20px;
	}
	
	.fullBlack .hubAdress > ul > li{
		min-height: 220px;	
	}
	
	.hubContact h1{
		color: #000;
	}
	
	.hubContact label{
		display: none !important;
	}
	.hubContact input, .hubContact textarea{
		background: #fff;
		padding: 10px !important;
	}
	
	.hubContact input:hover, .hubContact textarea:hover{
		border: 1px solid #AAA;
	}
	.hubContact .gform_footer{
		text-align: center;
	}
	.hubContact input[type=submit]{
		background: transparent;
		color: #202024;
		border: 3px solid #202024;
		font-weight: bold;
		padding: 10px;
		border-radius: 0px;
	}
	.hubContact input[type=submit]:hover{
		background: #202024;
		color: white;
		-webkit-transition: background-color 0.3s ease-in-out;
		-moz-transition: background-color 0.3s ease-in-out;
		transition: background-color 0.3s ease-in-out;
	}
	
	.map-icon{
		background-image: url('http://localhost/akvo-web/code/wp-content/uploads/2017/11/hubBKO.png');
		background-size: contain;
		background-position: center;
		background-repeat: no-repeat;
		width: 120px;
		height: 180px;
		float: left;
		margin-right: 20px;
	}
	
	.map-addr p{
		margin-top: 0;
		font-size: 1.2em;
		line-height: 1.2em;
	}
	
	@media(max-width:768px){
		.fullBlack h1{
			font-size: 2.2em;
		}
		.fullBlack .topMsg .hubIntro p{
			font-size: 2.2em;
		}
		.fullBlack .topMsg .hubIntro{
			width: 90%;
		}
		.fullBlack .hubMarketing p{
			font-size: 1.7em;
		}
		.fullBlack .allHubBlock ul{
			padding: 0 10px 0;
		}
		.fullBlack .allHubBlock ul li a:hover{
			transform: scale(1);
		}
		.fullBlack .allHubBlock ul li a{
			width: 100px;
			height: 120px;
		}
	}
	@media(max-width:500px){
		.fullBlack .map-icon{
			width: 90px;
			height: 135px;
		}
	}
	@media(min-width:769px){
		.fullBlack .allHubBlock ul li{
			width: 195px;
		}
		.fullBlack .allHubBlock ul{
			padding-bottom: 30px;
		}	
		.hubFeature li img{
			max-width: 350px;
		}
	}
</style>