<!--<hr class="delicate">
-->

<footer class="floats-in bottomPage" role="contentinfo">
  <div>
    <section id="siteMap" class="floats-in">
      <div class="wrapperHead">
        <?php wp_nav_menu( array( 'sort_column' => 'menu_order', 'theme_location' => 'footer-menu' ) ); ?>

        <div class="socialAkvo">
          <h1 class="backLinedGrey">Let's be friends</h1>
          <nav class="socialLinks">
            <ul class="floats-in">
              <li class="twitter"><a href="https://twitter.com/akvo/staff" title="Akvo staff Twitter feed">akvo on twitter</a></li>
              <li class="github"><a href="https://github.com/akvo" title="Access Akvo apps code">akvo on github</a></li>
              <li class="youtube"><a href="http://www.youtube.com/user/Akvofoundation" title="Akvo.tv">akvo on youtube</a></li>
              <li class="flickr"><a href="http://www.flickr.com/groups/akvo/" title="Akvo is on flickr">akvo on flickr</a></li>
              <li class="facebook"><a href="https://www.facebook.com/1Akvo" title="Akvo is also on Facebook">akvo on facebook</a></li>
              <li class="rss"><a href="/blog/rss" title="Get our latest blogs RSS">get latest akvo feed</a></li>
              <li class="email"><a href="mailto:partners@akvo.org" title="Email us at partners@akvo.org">email akvo</a></li>
              <li class="contactInfo"><a href="/contact-info/" title="Contact Akvo" >Contact Akvo</a></li>
            </ul>
          </nav>
          <div class="newsLetter">
            <p class="subscribe">Subscribe to our monthly newsletter</p>
            <?php gravity_form(1, false, true, false, '', true); ?>
          </div>
        </div>
      </div>
    </section>
    <section id="aboutAkvo">
      <div class="wrapper">
        <h1 class="backLinedGrey">A little more about Akvo.org</h1>
        <p>Akvo creates and runs open source internet and mobile services that make it easy to bring international development work online. We focus on project and programme dashboards, reporting, monitoring, evaluation and making data easier to share. Headquartered in Amsterdam, Akvo is a non-profit foundation that works with more than a thousand organisations around the world.</p>
      </div>
      <!--  <small>Copyright &copy; <?php echo date("Y"); echo " "; bloginfo('name'); ?></small>-->
    </section>
    <p id="back-top"> <a href="#header"><span></span>Back to Top</a> </p>
  </div>
  <?php wp_footer(); ?>
</footer>
<!-- End /footer -->
</div>
<!-- end mainbody -->
<!-- Piwik -->


<script type="text/javascript">
  var _paq = _paq || [];
  _paq.push(["setDocumentTitle", document.domain + "/" + document.title]);
  _paq.push(["setCookieDomain", "*.<?=PIWIK_DOMAIN?>"]);
  _paq.push(["setDomains", ["*.<?=PIWIK_DOMAIN?>"]]);
  _paq.push(["setDocumentTitle",  '404/URL = ' +  encodeURIComponent(document.location.pathname+document.location.search) + '/From = ' + encodeURIComponent(document.referrer)]);
  _paq.push(["trackPageView"]);
  _paq.push(["enableLinkTracking"]);

  (function() {
    var u=(("https:" == document.location.protocol) ? "https" : "http") + "://analytics.akvo.org/";
    _paq.push(["setTrackerUrl", u+"piwik.php"]);
    _paq.push(["setSiteId", "<?=PIWIK_ID?>"]);
    var d=document, g=d.createElement("script"), s=d.getElementsByTagName("script")[0]; g.type="text/javascript";
    g.defer=true; g.async=true; g.src=u+"piwik.js"; s.parentNode.insertBefore(g,s);
  })();
</script>


<!-- End Piwik Code -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/common-js.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/akvo-jquery.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.fitvids.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/script.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.bxslider.min.js"></script>
<script type="text/javascript">
  $( document ).ready(function() {
    // footer menu headings
  
    $('footer .menu > li > a').contents().unwrap().wrap('<h3></h3>');
  
    $("#content").fitVids();
      function adjustImage() {
        $(".hero-image").css('margin-top', ($("#actionHeroBox").height() - $(".hero-image").height()) / 2);
    // Target your .container, .wrapper, .post, etc.
    $(".post-content").fitVids();
  }
$(window).load(function() {
    adjustImage();

    $(window).resize(function() {
        adjustImage();
    });
});

});
</script>
</body></html>