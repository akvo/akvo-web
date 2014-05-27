<?php
/*
	Template Name: akvopediaHelpPage
*/
?>
<?php get_header(); ?>
<!--Start of Akvo.org helpPage-->

<div id="content" class="floats-in akvopediaHelpSupport">
<h1 class="backLined akvopediaHelp">Akvopedia Help</h1>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<div class="fullWidthParag centerED wrapper">
  <?php the_content(); ?>
</div>
<?php endwhile; // end of the loop. ?>
<section class="wrapper">
<h2>Most commonly asked questions</h2>
<p>For more help: <a href="http://akvopedia.org/wiki/Help:Contents">Akvopedia Help Page</a>.</p>
<ul class="vertMargin">
<li class="faqMenu"><a href="#" class="faqMenuHead">Is Akvopedia a social forum or place to chat?</a>
  <ul class="faqMenuList">
    <li>No, Akvopedia hosts water and sanitation (WASH) information and related field experience, but we are not set up to be a forum where questions and answers are discussed within threads or a place where users have profiles. Although for the future, we would like to create user profiles for editors that can share information about their expertise or experience in the water and sanitation sector. To learn more about what Akvopedia is, read our <a title="About Akvopedia" href="http://akvopedia.org/wiki/About_Akvopedia" style="display:inline;">About</a> page.</li>
  </ul>
</li>
<li class="faqMenu"><a href="#" class="faqMenuHead">What type of content do you provide or encourage on Akvopedia?</a>
  <ul class="faqMenuList">
    <li><p>We center our focus around sustainable, affordable, and low-tech technologies that enable our users to learn about, build, finance or implement water and sanitation projects around the world. We do not show technologies for urban areas (e.g. centralized high-tech water systems), but rather help rural or urban fringe “slum” areas (e.g. rainwater harvesting tank system for a village) in the developing world. The process our users face of undertaking a WASH project takes a lot of planning and follow up, so we try to provide organizational methods or approaches, as well as more simple construction i.e. how-to pages for things like household pumps and simple water quality methods. We are not a knowledge institute or directly connected with academia… therefore we seek information that we can repackage in a generally easy to read, user-friendly way.
</p><p>
However, links to more academic articles are okay, if they are not too jargon heavy. We would love for the water-scarce community members themselves (who are often infrequently educated) to be able to read documents on Akvopedia and not feel that the information is inaccessible or difficult to apply to their situation. In this manner, we try to keep our pages as simplified introductions to the technologies or methods we support, not a full-length database of information. This is best achieved by keeping articles relatively short, then providing links if users want to know more. Although academics may find Akvopedia useful as well!
</p>
</li>
  </ul>
</li>
<li class="faqMenu"><a href="#" class="faqMenuHead">How much editorial support do you offer?</a>
  <ul class="faqMenuList">
    <li>We are continually uploading new material to Akvopedia each week, and we extend a warm welcome to adding content for free that you may have that takes less than a half day to upload. For larger projects or merging of WASH information between partners, we would need to secure funding and arrange a plan to proceed. Our project manager Hans Merton, hansAt symbol.jpgakvo.org, could help you set up a partner exchange. We have had the good fortune to work with many WASH partners like UNICEF, Care, IRC, WASTE, SuSanA and Practica. We also welcome appropriate commercial water and sanitation product promotions from sellers, if their product is a good fit for Akvopedia. For more questions about the free editorial services contact Winona Azure, winonaAt symbol.jpgakvo.org. </li>
  </ul>
</li>
<li class="faqMenu"><a href="#" class="faqMenuHead">What if I disagree with the content on Akvopedia?</a>
  <ul class="faqMenuList">
    <li>If you feel the material posted on Akvopedia is outdated or conflicting with information you have, you can always post your views in the “Discussion” tab of each Akvopedia page. Although our discussion tabs are not used often, that is a good place to start as it will make your information seen by the public without you having to know anything about editing an Akvopedia page. You may also contact Winona Azure, the editor at winonaAt symbol.jpgakvo.org, to offer new content or updated materials to any page, if it takes less than a half day to post. We get this request sometimes, and appreciate the efforts people take to keep information accurate and current! We find that costs for WASH projects or services, especially, change over time and we welcome new updates for this. </li>
  </ul>
</li>

</ul>
</section>
<hr class="delicate" />
<!--<section class="wrapper">
  <h2>Manuals</h2>
  <p>For a list of manuals and other documents in several languages:</p>
  <a href="#">Akvopedia support documentation</a>
  <hr class="delicate" />
</section>
--></div>

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
<?php get_footer(); ?>
