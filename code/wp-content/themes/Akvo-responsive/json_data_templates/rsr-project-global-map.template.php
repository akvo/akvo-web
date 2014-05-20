<?php
/*
 * Template for the "RSR projects global map" plugin used on networkPage.php
 * Feed name: RSR projects map
 * Slug: rsr-projects-global-map
 * JSON feed URL: http://rsr.akvo.org/api/v1/map_for_project/?format=json&limit=1000
 * Resulting shortcode: [jsondata_feed slug="rsr-projects-global-map" offset="0" limit="1000" format="json"] and
 * [jsondata_feed slug="rsr-projects-global-map" offset="1000" limit="1000" format="json"]
 * The two shortcodes are needed to pull all the data from RSR.
 * TODO: In the long run the need to pull twice is a problem since when RSR gets more than 2000 projects all data won't
 * be pulled
 */

$objects = $aData['objects'];

$map_data = [];
$akvo_domain = 'http://rsr.akvo.org';

foreach ($objects as $project) {
  $data_from_project = [];
  $data_from_project['latitude'] = $project['primary_location']['latitude'];
  $data_from_project['longitude'] = $project['primary_location']['longitude'];
  $map_thumb = $project['current_image']['thumbnails']['map_thumb'];
  if ($map_thumb)
    $data_from_project['map_thumb'] = $akvo_domain . $map_thumb;
  else
    $data_from_project['map_thumb'] = '';
  $data_from_project['absolute_url'] = $akvo_domain . $project['absolute_url'];
  $data_from_project['title'] = $project['title'];
  $map_data[] = $data_from_project;
}
echo json_encode($map_data);
?>
