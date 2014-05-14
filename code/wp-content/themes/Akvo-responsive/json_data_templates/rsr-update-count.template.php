<?php
/*
* Template for the "RSR update count" plugin used on networkPage.php
* Feed name: RSR update count
* Slug: rsr-update-count
* JSON feed URL: http://rsr.akvo.org/api/v1/project_update/?limit=1
* Resulting shortcode: [jsondata_feed slug="rsr-update-count" limit="1"]
* NOTE: this feed is used in the template for the Right now in Akvo feed
*/

  echo $aData['meta']['total_count'];
?>