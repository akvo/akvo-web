
<aside id="sidebar" role="complementary"  class="">
  <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>
  <div class="widget">
    <h3 class="wtitle">Categories</h3>
    <form action="<?php bloginfo('url'); ?>/" method="get">
      <?php
$select = wp_dropdown_categories('show_option_none=Select Category&show_count=1&orderby=name&echo=0');
$select = preg_replace("#<select([^>]*)>#", "<select$1 onchange='return this.form.submit()'>", $select);
echo $select;
?>
      <noscript>
      <input type="submit" value="View" />
      </noscript>
    </form>
  </div>
  <div class="widget">
    <h3 class="title">Archives</h3>
    <select name="archive-dropdown" onChange='document.location.href=this.options[this.selectedIndex].value;'>
      <option value=""><?php echo attribute_escape(__('Select Month')); ?></option>
      <?php wp_get_archives( array( 'type' => 'monthly', 'format' => 'option', 'show_post_count' => 1 ) ); ?>
    </select>
  </div>
  <div class="widget">
    <h3 class="title">Meta</h3>
    <ul>
      <?php wp_register(); ?>
      <li>
        <?php wp_loginout(); ?>
      </li>
      <?php wp_meta(); ?>
    </ul>
  </div>
    <div class="widget faceBook">
    <div class="fb-like-box" data-href="https://www.facebook.com/1Akvo" data-width="292" data-show-faces="true" data-header="true" data-stream="false" data-show-border="false"></div>
  </div>

  <div class="widget twitBuck"> <a class="twitter-timeline"  href="https://twitter.com/search?q=+%40akvo+OR+%23akvo+OR+%23akvoflow"  data-widget-id="373127164918378496">Tweets about " @akvo OR #akvo OR #akvoflow"</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
</div>
  <?php endif; // end sidebar widget area ?>
</aside>
