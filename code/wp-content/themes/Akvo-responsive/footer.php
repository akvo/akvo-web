	<footer class="floats-in bottomPage" role="contentinfo">
		<div>
			<section id="siteMap" class="floats-in">
				<div class="wrapperHead">
					<div class="socialAkvo">
						<h1 class="backLinedGrey">Let's be friends</h1>
						<nav class="socialLinks">
							<ul class="floats-in">
								<li class="twitter"><a href="https://twitter.com/akvo/staff" title="Akvo staff Twitter feed">akvo on twitter</a></li>
								<li class="github"><a href="https://github.com/akvo" title="Access Akvo apps code">akvo on github</a></li>
								<li class="youtube"><a href="http://www.youtube.com/user/Akvofoundation" title="Akvo.tv">akvo on youtube</a></li>
								<li class="facebook"><a href="https://www.facebook.com/1Akvo" title="Akvo is also on Facebook">akvo on facebook</a></li>
								<li class="rss"><a href="/blog/rss" title="Get our latest blogs RSS">get latest akvo feed</a></li>
								<li class="newsLetters"><a href="/newsletters/" title="newsletters & bulletins" >Newsletters</a></li>
								<li class="email"><a href="/get-in-touch/" title="Send us a message">email akvo</a></li>
								<li class="contactInfo"><a href="/contact-info/" title="Contact Akvo" >Contact Akvo</a></li>
							</ul>
						</nav>
					</div>
				</div>
				<?php wp_nav_menu( array( 'sort_column' => 'menu_order', 'theme_location' => 'footer-menu', 'container_class' => 'menu-footer-menu-container', 'menu_id' => 'menu-footer-menu' ) ); ?>
			</section>
			<section id="aboutAkvo hidden">
				<div class="wrapper  hidden">
					<h1 class="backLinedGrey">A little more about Akvo.org</h1>
					<p>Akvo creates and runs open source internet and mobile services that make it easy to bring international development work online. We focus on project and programme dashboards, reporting, monitoring, evaluation and making data easier to share. Headquartered in Amsterdam, Akvo is a non-profit foundation that works with more than a thousand organisations around the world.</p>
				</div>
			</section>
			<p id="back-top"> <a href="#header"><span></span>Back to Top</a> </p>
		</div>
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
    var u = 'https://analytics.akvo.org/';   //(("https:" == document.location.protocol) ? "https" : "http") + "://analytics.akvo.org/";
    _paq.push(["setTrackerUrl", u+"piwik.php"]);
    _paq.push(["setSiteId", "<?=PIWIK_ID?>"]);
    var d=document, g=d.createElement("script"), s=d.getElementsByTagName("script")[0]; g.type="text/javascript";
    g.defer=true; g.async=true; g.src=u+"piwik.js"; s.parentNode.insertBefore(g,s);
  })();
</script>
<!-- End Piwik Code -->
<?php wp_footer(); ?>
<script type="text/javascript">
	$( document ).ready(function() {
		// footer menu headings
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