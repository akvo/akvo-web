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
<title>
<?php
	global $page, $paged;
	wp_title( '|', true, 'right' );
	bloginfo( 'name' );
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s' ), max( $paged, $page ) );
?>
</title>
<meta charset="<?php bloginfo('charset');?>">
<meta name="description" content="Akvo.org: See it Happen" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="author" content="Loic Sans">
<meta name="HandheldFriendly" content="True">
<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/style.css">
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Quando">
<!-- Grab Google CDN's jQuery. fall back to local if necessary -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script>window.jQuery || document.write("<script src='/js/jquery-1.8.3.min.js'>\x3C/script>")</script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.8/jquery-ui.min.js"></script>
<script>window.jQuery || document.write("<script src='/js/jquery-ui-1.8.24.custom.min'>\x3C/script>")</script>
<script src="<?php bloginfo('template_directory'); ?>/js/modernizr.custom.32662.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/common-js.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/akvo-jquery.js"></script>
<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script('comment-reply'); ?>
<?php wp_head(); ?>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/script.js"></script>
<!--[if lt IE 9]>
  <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' );?>
<?php wp_head(); ?>
<link href='http://fonts.googleapis.com/css?family=Source+Code+Pro:400,900,700,600,300,200,500|Questrial|Inconsolata|Muli:400,300italic,400italic,300|Raleway:400,900,800,700,600,500,100,200,300|Lobster|Lobster+Two:400,400italic,700,700italic|Lato:400,100,300,700,900,100italic,300italic,400italic,900italic,700italic' rel='stylesheet' type='text/css'>
</head>

<body <?php my_bodyclass(); ?>>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div id="mainbody">
<header id="top" role="banner">
  <div class="wrapperHead">
    <h1><a href="<?php echo home_url(); ?>">
      <?php bloginfo('name'); ?>
      </a></h1>
    <div id="navbar"><a href="#">Nav Menu</a></div>
    <nav id="n">
      <?php wp_nav_menu( array( 'sort_column' => 'menu_order', 'container' => false, 'theme_location' => 'header-menu' ) ); ?>
    </nav>
    <?php get_search_form(); ?>
    <div id="logIn" class="logInHeader"> <a href="http://akvo.org/akvo-services-login/">login</a> </div>
  </div>
  <div id="openSource"> <a href="http://akvo.org/blog/open-data-content-and-software-at-akvo/" target="_blank">
    <h2>We love Open Source!</h2>
    </a> </div>
</header>
<div class="breadCrumb">
  <?php the_breadcrumb() ?>
</div>
