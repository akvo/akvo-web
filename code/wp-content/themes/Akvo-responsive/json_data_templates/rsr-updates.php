<?php
  /*
   * Template for the "RSR updates" plugin currently used on networkPage.php
   * Feed name: RSR updates
   * Slug: rsr-updates
   * JSON feed URL: http://rsr.akvo.org/api/v1/project_update_extra/?format=json
   * Resulting shortcode: [jsondata_feed slug="rsr-updates" format="json"]
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
      $renderCount++;
      if ($renderCount > 2) break;
    }
  }
?>
