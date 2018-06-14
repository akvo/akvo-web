<!doctype html>
<!--[if lt IE 7 ]> <html class="ie ie6 no-js" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie ie7 no-js" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie ie8 no-js" lang="en"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie ie9 no-js" lang="en"> <![endif]-->
<!--[if gt IE 9]><!-->
<html <?php language_attributes(); ?>  class="no-js" >
<!--<![endif]-->
<!-- the "no-js" class is for Modernizr. -->
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta name="HandheldFriendly" content="True">
		<meta name="google-site-verification" content="h6M7-buFJgu3jUVcALgFkBDxi0UtePXQhVUcZBYO5Lk" />
		<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/apple-touch-icon-180x180.png">
		<link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_template_directory_uri(); ?>/apple-touch-icon-120x120.png">
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
		<?php wp_head(); ?>
		<!--[if lt IE 9]>
		  <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	</head>
	<body <?php akvo_bodyclass(); ?>>
		<div id="fb-root"></div>
		<script>
			(function(d, s, id) {
				var js, fjs = d.getElementsByTagName(s)[0];
				if (d.getElementById(id)) return;
				js = d.createElement(s); js.id = id;
				js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1";
				fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));
		</script>
		<div id="mainbody">
			<header id="top" role="banner" class="topbar">
				<nav class="navbar-fixed-top">
					<div class="wrapperHead">
						<h1><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
						<div id="navbar"><a href="#">Nav Menu</a></div>
						<nav id="n"><?php wp_nav_menu( array( 'sort_column' => 'menu_order', 'container' => false, 'theme_location' => 'header-menu' ) ); ?></nav>
						<?php get_search_form(); ?>
					</div>
				</nav>
				<div id="openSource"> 
					<a href="/blog/open-data-content-and-software-at-akvo/"><h2>We love Open Source!</h2></a> 
				</div>
			</header>
			<?php if( !is_akvo_full_black_body() ):?><div class="breadCrumb"><?php the_breadcrumb() ?></div><?php endif;?>