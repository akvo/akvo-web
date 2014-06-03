
<?php
/*
* Template for the "Akvopedia analytics" plugin used on networkPage.php
* Feed name: Akvopedia analytics
* Slug: akvopedia-analytics
* JSON feed URL: http://analytics.akvo.org/index.php?module=API&method=API.get&idSite=9&period=range&date=2013-04-01,today&format=json&token_auth=1d1b520b11bea9a3b525b99531ec171a
* Resulting shortcode: [jsondata_feed slug="akvopedia-analytics" module="API" method="API.get" idSite="9" period="range" date="2013-04-01,today" format="json" token_auth="1d1b520b11bea9a3b525b99531ec171a"]
* NOTE: this template includes a call to the "Akvopedia articles" feed which must also be set up.
*/
?>

<ul class="wikiData dashData">
  <li>
    <h4>Articles:</h4>
    <span id=""><?php do_shortcode(
        '[jsondata_feed slug="akvopedia-articles" action="query" meta="siteinfo" siprop="statistics" format="json"]'
      ); ?>
    </span>
  </li>
  <li>
    <h4>Page Views:</h4>
    <span id=""><?= round((2792519 + $aData['nb_pageviews'])/1000)/1000 ?><span class="unit">million</span></span> </li>
  <li>
    <h4>Visits:</h4>
    <span id="number_of_visits"><?= $aData['nb_visits'] + 737347 ?></span> </li>
  <li>
    <h4>More Stats soon</h4>
  </li>
</ul>
