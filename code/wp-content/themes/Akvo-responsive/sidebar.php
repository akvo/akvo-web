
<aside id="sidebar" role="complementary"  class="">
  <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>
  
<div class="widget">
  
    <h3 class="title">Categories</h3>
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
<?php if ( ! dynamic_sidebar( 'main' ) ) : ?>
    <h3 class="title"><?php _e( 'main' ); ?></h3>
    			<?php dynamic_sidebar( 'main' ); ?>
</div>
<?php endif; // end sidebar widget area ?>
  <div class="widget faceBook">
    <div class="fb-like-box" data-href="https://www.facebook.com/1Akvo" data-width="292" data-show-faces="true" data-header="true" data-stream="false" data-show-border="false"></div>
  </div>
    <div class="widget twitBuck" style="margin-top: 20px;"> 
    
    <a class="twitter-timeline" data-height="500" href="https://twitter.com/akvo?ref_src=twsrc%5Etfw">Tweets by akvo</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
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

  <?php endif; // end sidebar widget area ?>
</aside>
