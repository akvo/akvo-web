<?php
/*
 * Template for the "RSR many updates" plugin currently used on networkPage.php
 * Feed name: RSR many updates
 * Slug: rsr-many-updates
 * JSON feed URL: http://rsr.akvo.org/api/v1/project_update_extra/?format=json&limit=60
 * Resulting shortcode: [jsondata_feed slug="rsr-many-updates" limit="60"]
 * json_data_render_update() is defined in Akvo-responsive/functions.php
 * NOTE: since we fetch 60 updates, but only show the ones with images, there won't be the same number of updates every
 * time, but the flow of the page handles that well.
 * TODO: fix country, add city and add filtering of updates with images. This needs an update of the RSR API resource
 */

$updates = $aData['objects'];
$renderCount = 0;
$rsr_domain = "http://rsr.akvo.org";
foreach($updates AS $count => $u) {
  if ($u['photo'] != '') {
    json_data_render_update(
      $rsr_domain , $u['absolute_url'], $u['title'], $u['photo'], $u['last_time_updated'], $u['user']['full_name'],
      $u['user']['organisation']['name'], $u['user']['organisation']['absolute_url'], /*$u['country']*/"Sardonia", $u['text']
    );
    // this check isn't strictly needed, but I'm leaving it in so it's easy to change the number of updates shown
    $renderCount++;
    if ($renderCount >= 60) break;
  }
}
?>