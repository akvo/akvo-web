<?php
/*
	Template Name: flowHelpPage
*/
?>
<?php get_header(); ?>
<!--Start of Akvo.org helpPage-->

<div id="content" class="floats-in flowHelpSupport">
<p></p>
<h1 class="backLined flowHelp">Flow Help</h1>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<div class="fullWidthParag centerED wrapper">
  <?php the_content(); ?>
</div>
<?php endwhile; // end of the loop. ?>
<section class="wrapper">
<h2>Most commonly asked questions</h2>
<p class="fullWidthParag centerED">Answers to questions other Akvo FLOW users have asked in the past, can be found on <a href="http://flow.readthedocs.org/en/latest/docs/topic/dashboard.html">Akvo FLOW dashboard (Read the docs)</a> and <a href="http://flow.readthedocs.org/en/latest/docs/topic/field_survey_app.html">Akvo FLOW android app (Read the docs)</a>.</p>
<ul class="vertMargin">
<li class="faqMenu"><a href="#" class="faqMenuHead">How do I open the Field Survey app ?</a>
  <ul class="faqMenuList">
    <li>Click on the Application. This will show all the apps installed on the phone in alphabetic order. Click on the Field Survey app to open it.<img src="<?php bloginfo('template_directory'); ?>/images/flowFAQ.png"/></li>
  </ul>
</li>
<li class="faqMenu"><a href="#" class="faqMenuHead">How do I set the  device identifier ?</a>
  <ul class="faqMenuList">
    <li>Open the Field Survey app. Tap on Settings → Preferences → Decive Identifier. Fill in the Authorization passcode (provided by your Administrator) and then set the Device Identifier as directed.</li>
  </ul>
</li>
<li class="faqMenu"><a href="#" class="faqMenuHead">How do I add a user ?</a>
  <ul class="faqMenuList">
    <li>Open Field Survey app. Tap on Manage Users. Now press the Menu button and then tap on Add User in the bottom panel. Fill in the user details and then tap Save.</li>
  </ul>
</li>
<li class="faqMenu"><a href="#" class="faqMenuHead">How do I download a Survey ?</a>
  <ul class="faqMenuList">
    <li>Open the Field Survey app. Tap on Settings → Download Survey. Enter the Authorization passcode and then enter the Survey ID of the survey that you want to download. Depending on the data/wifi network, the survey will get downloaded immediately of after some delay.</li>
  </ul>
</li>
<li class="faqMenu"><a href="#" class="faqMenuHead">What do i do if the survey does not get downloaded ?</a>
  <ul class="faqMenuList">
    <li>
      <ul style="list-style-type:disc;">
        <li>Check that you are connected to an internet network</li>
        <li>Check that you are entering the correct Survey ID</li>
        <li>Check that you are not getting any notification that the survey is unpublished</li>
      </ul>
    </li>
  </ul>
</li>
<li class="faqMenu"><a href="#" class="faqMenuHead">I’m not getting a GPS fix. What should i do ?</a>
  <ul class="faqMenuList">
    <li>
      <ul style="list-style-type:disc;">
        <li>Ensure that the GPS is turned on</li>
        <li>Ensure that you are in an open area and NOT inside a building</li>
        <li>Open the GPS Status app</li>
        <li>Keep the device static and DO NOT move around with it. If possible away from reflecting surfaces such as walls</li>
        <li>Monitor the status of the GPS data being received by the device in the GPS status app.</li>
        <li>If you still do not get a fix after 15-20 mins, re-locate to a different spot few meters away and try again</li>
      </ul>
    </li>
  </ul>
</li>
<li class="faqMenu"><a href="#" class="faqMenuHead">How do I turn on translations for the survey (is available) ?</a>
  <ul class="faqMenuList">
    <li>Tap on the concerned survey and then tap on the Menu button. Tap on Languages in the bottom panel, which will open up the Survey Languages popup. Select the checkbox next to the language that you want the survey to be displayed in. Tap OK.</li>
  </ul>
</li>
<li class="faqMenu"><a href="#" class="faqMenuHead">How do I ensure that my surveys have been properly submitted to the dashboard ?</a>
  <ul class="faqMenuList">
    Open the Field Survey app and tap on Survey Status-→Review Submitted Surveys. If you
    <li>
      <ul style="list-style-type:disc;">
        <li>see a green tick ( ) next to the survey with the expected date and time, then you survey has been successfully transmitted to the dashboard.</li>
        <li>see a red cross   , then the survey has not been transmitted to the dashboard</li>
        <li>see a yellow dot  , the you currently do not have internet connectivity to send the survey to the dashboard</li>
      </ul>
    </li>
  </ul>
</li>
<li class="faqMenu"><a href="#" class="faqMenuHead">How do I re-send a survey ?</a>
  <ul class="faqMenuList">
    <li>Open the Field Survey app and tap on Survey Status→Review Submitted Surveys. Press the survey that that you want to resend for 2-3 secs. A popup will be displayed. Tap Resend Survey.  If you want to resend surveys in bulk then press the Menu button and tap Resend all Surveys.</li>
  </ul>
</li>

<li class="faqMenu"><a href="#" class="faqMenuHead">How do i check that enough memory is available on my phone to do surveys ?</a>
  <ul class="faqMenuList">
    <li>Open the Field Survey app and tap on Settings-→Check SD Card State. This will show the amount of free space available on your phone to conduct surveys (in MB). If the value displayed is less than 100 MB, then please contact your manager to clean up your phones. Do remember that conducting surveys without sufficient memory will lead to loss of survey data which is NOT recoverable.</li>
  </ul>
</li>
</ul>
</section>
<hr class="delicate" />
<section class="wrapper">
  <h2>Manuals</h2>
  <p>For a list of manuals and other documents in several languages:</p>
  <a href="http://flowhelp.akvo.org/kb/flow-support-documentation">FLOW support documentation</a>
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
