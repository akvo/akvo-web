<?php
/*
* Template for the "Right now in Akvo" plugin currently used on networkPage.php
* Feed name: Right now in Akvo
* Slug: right-now-in-akvo
* JSON feed URL: http://rsr.akvo.org/api/v1/right_now_in_akvo/
* Resulting shortcode: [jsondata_feed slug="right-now-in-akvo"]
* NOTE: this template includes a call to the "RSR update count" feed which must also be set up.
*/
?>
<ul class="rsrData dashData">
  <li>
    <h4>Projects:</h4>
    <span ><?= $aData['number_of_projects']?></span> </li>
  <li>
    <h4>Number of updates:</h4>
    <span ><?php do_shortcode('[jsondata_feed slug="rsr-update-count"]'); ?></span> </li>
  <li>
    <h4>Organisations Using RSR:</h4>
    <span id=""><?= $aData['number_of_organisations']?></span> </li>
  <li>
    <h4>Project Budgets:</h4>
    <span id="">€ <?= round($aData['projects_budget_millions'])/1000 ?><span class="unit">billion</span></span></li>
</ul>
