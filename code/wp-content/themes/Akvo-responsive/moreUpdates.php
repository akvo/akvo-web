<?php
/*
 * Template Name: moreUpdates
 */
//phpinfo();
  $limit = $_REQUEST['limit'];
  $offset = $_REQUEST['offset'];
  $shortcode = '[jsondata_feed format="json" slug="rsr-many-updates-1" photo__gte="a" limit="'. $limit .'" offset="'. $offset .'"]';
  do_shortcode($shortcode);
?>