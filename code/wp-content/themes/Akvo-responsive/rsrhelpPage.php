<?php
/*
	Template Name: rsrHelpPage
*/
?>
<?php get_header(); ?>
<!--Start of Akvo.org helpPage-->

<div id="content" class="floats-in rsrHelpSupport">
<h1 class="backLined rsrHelp">RSR Help</h1>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<div class="fullWidthParag centerED wrapper">
  <?php the_content(); ?>
</div>
<?php endwhile; // end of the loop. ?>
<section class="wrapper">
<h2>Most commonly asked questions</h2>
<p>Answers to questions other Akvo RSR users have asked in the past, can be found on <a href="http://rsrhelp.akvo.org/discussions/">Akvo RSR support</a>.</p>
<ul class="vertMargin">
<li class="faqMenu"><a href="#" class="faqMenuHead">I’m having login problems. How can I register? I’ve forgotten my username and/or password.</a>
  <ul class="faqMenuList">
    <li><a href="http://rsrhelp.akvo.org/kb/problems/log-in-problems">http://rsrhelp.akvo.org/kb/problems/log-in-problems</a></li>
  </ul>
</li>
<li class="faqMenu"><a href="#" class="faqMenuHead">How do I edit an update?</a>
  <ul class="faqMenuList">
    <li><a href="http://rsrhelp.akvo.org/kb/problems/how-can-i-edit-an-update">http://rsrhelp.akvo.org/kb/problems/how-can-i-edit-an-update</a></li>
  </ul>
</li>
<li class="faqMenu"><a href="#" class="faqMenuHead">How do I edit a project?</a>
  <ul class="faqMenuList">
    <li><a href="http://rsrhelp.akvo.org/kb/problems/how-can-i-edit-a-project">http://rsrhelp.akvo.org/kb/problems/how-can-i-edit-a-project</a></li>
  </ul>
</li>
<li class="faqMenu"><a href="#" class="faqMenuHead">How can I put my project online?</a>
  <ul class="faqMenuList">
    <li><a href="https://akvorsr.tenderapp.com/kb/projects/add-a-project-online-via-rsr-admin">https://akvorsr.tenderapp.com/kb/projects/add-a-project-online-via-rsr-admin</a></li>
  </ul>
</li>
</section>

<hr class="delicate" />

<section class="wrapper">
<h2>Downloads</h2>
<h4>RSR desktop</h4>
<p>Our manuals contain all you need to know to create a project update:</p>
<ul class="threeColumns vertMargin floats-in">
	<li class="englishManual"><a href=""><span>RSR manual</span></a></li>
	<li class="frenchManual"><a href=""><span>Manuel de RSR</span></a></li>
	<li class="spanishManual"><a href=""><span>Manual de rsr</span></a></li>
</ul>
<h4>RSR Up Android app</h4>
<p>Akvo RSR Up Android app manual or video.</p>
<ul class="threeColumns vertMargin floats-in">
	<li class="androidManual"><a href=""><span>RSR Up manual</span></a></li>
	<li class="videoAndroid"><a href=""><span>Showcase Video</span></a></li>
	<li class=""><a href=""><span></span></a></li>
</ul>

<hr class="delicate" />
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
<?php get_footer(); ?>
