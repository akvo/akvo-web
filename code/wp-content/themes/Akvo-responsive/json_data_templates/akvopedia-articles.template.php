<?php
/*
* Template for the "Akvopedia articles" plugin used on networkPage.php
* Feed name: Akvopedia articles
* Slug: akvopedia-articles
* JSON feed URL: http://akvopedia.org/wiki/api.php?action=query&meta=siteinfo&siprop=statistics&format=json
* Resulting shortcode: [jsondata_feed slug="akvopedia-articles" action="query" meta="siteinfo" siprop="statistics" format="json"]
* NOTE: this feed is used in the template for the Akvopedia analytics feed
*/

  echo $aData['query']['statistics']['articles'];
?>