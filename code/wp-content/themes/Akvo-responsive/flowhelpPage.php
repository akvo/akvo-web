<?php
/*
	Template Name: flowHelpPage
*/
?>
<?php get_header();?>
<!--Start of Akvo.org helpPage-->

<div id="content" class="floats-in flowHelpSupport">
  <h1 class="backLined flowHelp">Flow Help</h1>
  <?php if ( have_posts() ) while ( have_posts() ) : the_post();?>
  <section class="wrapper">
    <?php the_content();?>
  </section>
  <?php endwhile; // end of the loop.?>
  <hr class="delicate" />
  <section class="wrapper flow-help-mailchimp-signup">
  <h2><?php the_field('bulletin_signup_title'); ?></h2>

  <?php the_field('bulletin_intro_text'); ?>

  <!-- Begin MailChimp Signup Form -->
  <div id="mc_embed_signup" class=>
  <form action="//akvo.us2.list-manage.com/subscribe/post?u=a70e9bedf0f2a0a5db70eb18b&amp;id=3209664b56" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
      <div id="mc_embed_signup_scroll">
	  <label for="mce-EMAIL"><?php the_field('bulletin_call_to_action'); ?></label>
	  <input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="email address" required>
      <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
      <div style="position: absolute; left: -5000px;"><input type="text" name="b_a70e9bedf0f2a0a5db70eb18b_3209664b56" tabindex="-1" value=""></div>
      <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
      </div>
  </form>
  </div>
  <!--End mc_embed_signup-->

  <a href="http://us2.campaign-archive2.com/home/?u=a70e9bedf0f2a0a5db70eb18b&id=3209664b56" title="Akvo FLOW bulletin archive" target="_blank"><?php the_field('bulletin_archive_link'); ?></a>

  </section>

  <hr class="delicate" />
  <section class="wrapper">
    <h2><?php the_field('manuals_title'); ?></h2>
    <?php the_field('manuals_text'); ?>

    <?php if( have_rows('flow_manuals') ): ?>
    <ul class="threeColumns vertMargin floats-in" id="manuals">
 
    <?php while( have_rows('flow_manuals') ): the_row(); ?>
 
        <li><a href="<?php the_sub_field('url'); ?>" style="background-image: url(<?php the_sub_field('icon'); ?>)"></a></li>
        
    <?php endwhile; ?>
 
    </ul>
    <?php endif; ?>
    <hr class="delicate" />
    <p>If you need further help contact us at support[at]akvoflow.org.</p>
  </section>
</div>

<!-- end content --> 
<script type="text/javascript">
$("document").ready(function () {

        $('ul.faqMenuList').hide();
        $('.faqMenu .faqMenuHead').toggle(function(){
                if($(this).next().is("ul")) {
                    $('.faqMenuHead').removeClass("openED");
                    $('.faqMenuList').hide('fast');
                $(this).toggleClass("openED").next().slideToggle();}
                
        } , function() {
                $(this).removeClass("openED").next().slideToggle();});
});
</script>
<?php get_footer();?>
