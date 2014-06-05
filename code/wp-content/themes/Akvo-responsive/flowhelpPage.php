<?php
/*
	Template Name: flowHelpPage
*/
?>
<?php get_header();?>
<!--Start of Akvo.org helpPage-->

<div id="content" class="floats-in flowHelpSupport">
  <p></p>
  <h1 class="backLined flowHelp">Flow Help</h1>
  <?php if ( have_posts() ) while ( have_posts() ) : the_post();?>
  <div class="fullWidthParag centerED wrapper">
    <?php the_content();?>
  </div>
  <?php endwhile; // end of the loop.?>
  <section class="wrapper">
    <h2>Common questions</h2>
    <ul class="vertMargin">
      <li class="faqMenu"><a href="#" class="faqMenuHead">How do I open the Field Survey app?</a>
        <ul class="faqMenuList">
          <li>
 <ol style="list-style-type:decimal; margin-left:20px;">
              <li>Click on Application. This will show all the apps installed on the phone in alphabetical order.</li><li>Click on the Field Survey app to open it.</li></ol><img src="<?php bloginfo('template_directory');?>/images/flowFAQ.png" style='margin:1em auto; display:block;'/>
          
          </li>
        </ul>
      </li>
      <li class="faqMenu"><a href="#" class="faqMenuHead">How do I set the  device identifier?</a>
        <ul class="faqMenuList">
          <li>
            <ol style="list-style-type:decimal; margin-left:20px;">
              <li>Open the Field Survey app.</li>
              <li>Tap on Settings → Preferences → Device Identifier.</li>
              <li>Fill in the Authorization passcode (provided by your Administrator) and then set the Device Identifier as directed.</li>
            </ol>
          </li>
        </ul>
      </li>
      <li class="faqMenu"><a href="#" class="faqMenuHead">How do I add a user?</a>
        <ul class="faqMenuList">
          <li>
            <ol style="list-style-type:decimal; margin-left:20px;">
              <li>Open Field Survey app.</li>
              <li>Tap on Manage Users.</li>
              <li>Now press the Menu button and then tap on Add User in the bottom panel.</li>
              <li>Fill in the user details and then tap Save.</li>
            </ol>
          </li>
        </ul>
      </li>
      <li class="faqMenu"><a href="#" class="faqMenuHead">How do I download a Survey?</a>
        <ul class="faqMenuList">
          <li>
 <ol style="list-style-type:decimal; margin-left:20px;">
              <li>Open the Field Survey app.</li><li>Tap on Settings → Download Survey.</li><li>Enter the Authorization passcode and then enter the Survey ID of the survey that you want to download.</li><li>Depending on the data/wifi network, the survey will be downloaded immediately or after some delay.</li></ol>
          
          </li>
        </ul>
      </li>
      <li class="faqMenu"><a href="#" class="faqMenuHead">What do I do if the survey is not downloaded?</a>
        <ul class="faqMenuList">
          <li>
            <ul style="list-style-type:disc; margin-left:10px;">
              <li>Check that you are connected to an internet network</li>
              <li>Check that you are entering the correct Survey ID</li>
              <li>Check for a notification that the survey is unpublished</li>
            </ul>
          </li>
        </ul>
      </li>
      <li class="faqMenu"><a href="#" class="faqMenuHead">I’m not getting a GPS fix. What should I do?</a>
        <ul class="faqMenuList">
          <li>
            <ul style="list-style-type:disc; margin-left:10px;">
              <li>Ensure that the GPS is turned on</li>
              <li>Ensure that you are in an open area and NOT inside a building</li>
              <li>Open the GPS Status app</li>
              <li>Keep the device static and DO NOT move around with it. If possible keep it away from any reflecting surfaces such as walls.</li>
              <li>Monitor the status of the GPS data being received by the device in the GPS status app.</li>
              <li>If you still do not get a fix after 15-20 mins, relocate to a different spot a few meters away and try again</li>
            </ul>
          </li>
        </ul>
      </li>
      <li class="faqMenu"><a href="#" class="faqMenuHead">How do I turn on translations for the survey (when available)?</a>
        <ul class="faqMenuList">
          <li>
  <ol style="list-style-type:decimal; margin-left:20px;">
              <li>Tap on the survey and then tap on the Menu button.</li><li>Tap on Languages in the bottom panel, which will open up the Survey Languages popup.</li><li>Select the checkbox next to the required survey language you want the survey to be displayed in. Tap OK.</li></ol></li>
        
        
        </ul>
      </li>
      <li class="faqMenu"><a href="#" class="faqMenuHead">How do I ensure that my surveys have been properly submitted to the dashboard?</a>
        <ul class="faqMenuList">
          <li>
          <ol style="list-style-type:decimal; margin-left:20px;">
              <li>Open the Field Survey app and tap on Survey Status</li><li>Review Submitted Surveys.</li></ol>
            <ul style="list-style-type:disc; margin-left:25px;">
              <li>see a green tick - your survey was successfully transmitted to the dashboard at the displayed date and time.</li>
              <li>see a red cross - your survey has not been transmitted.</li>
              <li>see a yellow dot - there is currently no internet connectivity, your survey has not been transmitted to the dashboard but will auto-transmit upon reconnection if the app is running.</li>
            </ul>
          </li>
        </ul>
      </li>
      <li class="faqMenu"><a href="#" class="faqMenuHead">How do I resend a survey?</a>
        <ul class="faqMenuList">
          <li>
            <ol style="list-style-type:decimal; margin-left:20px;">
              <li>Open the Field Survey app and tap on Survey Status</li>
              <li>Review Submitted Surveys. </li>
              <li>Press the survey that that you want to resend for 2-3 secs. </li>
              <li>A popup will be displayed. Tap Resend Survey. </li>
              <li>If you want to resend surveys in bulk then press the Menu button and tap Resend all Surveys.</li>
            </ol>
          </li>
        </ul>
      </li>
      <li class="faqMenu"><a href="#" class="faqMenuHead">How do I check that enough memory is available on my phone to do surveys?</a>
        <ul class="faqMenuList">
        
        
          <li>            
          <ol style="list-style-type:decimal; margin-left:20px;">
              <li>Open the Field Survey app and tap on Settings-→Check SD Card State.</li><li>This will show the amount of free space available on your phone to conduct surveys (in MB).</li><li>If the value displayed is less than 100 MB, then please contact your manager to clean up your phones.</li></ol><p>Do remember that conducting surveys without sufficient memory will lead to loss of survey data which is NOT recoverable.</p></li>
        
        
        </ul>
      </li>
    </ul>
    <p><a href="http://flowhelp.akvo.org/discussions/">Search for more FLOW support solutions</a></p>
  </section>
  <hr class="delicate" />
  <section class="wrapper">
    <h2>Manuals</h2>
    <p style="margin-top:2em;">The Akvo FLOW documentation - <a href="http://flow.readthedocs.org/en/latest/index.html#">Akvo FLOW doc</a> gives you online access to information on how product features work. You can read about the FLOW phone field app - <a href="http://flow.readthedocs.org/en/latest/docs/topic/field_survey_app.html">Akvo FLOW android app (Read the docs)</a> or learn how to work with the Dashboard - <a href="http://flow.readthedocs.org/en/latest/docs/topic/dashboard.html">Akvo FLOW dashboard (Read the docs)</a>.</p>
    <ul class="threeColumns vertMargin floats-in">
      <li class="englishEnumManual"><a href="https://www.dropbox.com/s/4ha28qwn79aw08z/Quick%20start%20guide%20-%20Enumerators-Aug2013.pdf"></a></li>
      <li class="frenchEnumManual"><a href="https://www.dropbox.com/s/4djs7m2t8kqbev5/Quick%20start%20guide%20-%20Enumerators-kvdb_FR.pdf"></a></li>
      <li class="spanishEnumManual"><a href="https://www.dropbox.com/s/kcn1e00gzpsbxab/Quick%20start%20guide%20-%20Enumerators-kvdb-spanish.pdf"></a></li>
      <li class="englishStartManual"><a href="https://www.dropbox.com/s/48cuyjw8o5vc9gk/Quick%20start%20guide%20Setup%20Akvo%20FLOW-Aug2013.pdf"></a></li>
      <li class="frenchStartManual"><a href="https://www.dropbox.com/s/xd1tlczu4e0g5t2/Quick%20start%20guide%20Setup%20Akvo%20FLOWkvdb_FR.pdf"></a></li>
      <li class="spanishStartManual"><a href="https://www.dropbox.com/s/5tq2eu3okmxou9x/Quick%20start%20guide%20Setup%20Akvo%20FLOWkvdb-spanish.pdf"></a></li>
    </ul>
    <hr class="delicate" />
    <p>If you need further help contact us at <a href="mailto:support@akvoflow.org">support@akvoflow.org</a></p>
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
