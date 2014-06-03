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
    <h2>Common questions</h2>
    <ul class="vertMargin">
      <li class="faqMenu"><a href="#" class="faqMenuHead">I’m having login problems. How can I register? I’ve forgotten my username and/or password.</a>
        <ul class="faqMenuList">
          <li>
            <ul style="list-style-type:disc; margin-left:10px;">
              <li>Have you registered for a user account? If you haven't, you can <a href="http://rsr.akvo.org/accounts/register1/" style="display:inline;">register here</a></li>
              <li>If you forgot your username/password, you can <a href="http://rsr.akvo.org/accounts/password/reset/" style="display:inline;">reset your username and password</a>. Tip: your username is not your email address.</li>
              <li>If you don't remember which email address you registered with, please contact support@akvo.org. Please don't register for a new user account.</li>
            </ul>
          </li>
        </ul>
      </li>
      <li class="faqMenu"><a href="#" class="faqMenuHead">How do I edit an update?</a>
        <ul class="faqMenuList">
          <li>
            <p> You have limited time to edit your update (around 15 minutes from the moment you submitted your update).</p>
            <p> If you discover you made a typo, or want to make changes in your update, click Edit Update at the top of your screen to fix your mistake. The available time for editing your update is visible in yellow. </p>
            <p> If your editing time has expired and you notice a mistake, you can no longer edit the update yourself. Please send an email to  <a href="mailto://support@akvo.org" style="display:inline;">support@akvo.org</a></p>
          </li>
        </ul>
      </li>
      <li class="faqMenu"><a href="#" class="faqMenuHead">How do I edit a project?</a>
        <ul class="faqMenuList">
          <li>
            <p> You can edit project information if you are the Field partner or Support partner of a project and have editor rights. </p>
            <p> Go to <a href="http://www.akvo.org" style="display:inline;">www.akvo.org</a>, click <strong>login</strong> in the upper right corner. In the Akvo RSR box click <strong>RSR administrator login page</strong>. Login with your username and password. </p>
            <p> After you've been logged in, click <strong>Projects</strong> and your organisation's project listing will appear. Then click on the project number to go to the project you wish to edit. </p>
            <p> Edit the fields you wish to edit and save your changes by clicking <strong>Save</strong> at the bottom of the page.</p>
          </li>
        </ul>
      </li>
      <li class="faqMenu"><a href="#" class="faqMenuHead">How can I put my project online?</a>
        <ul class="faqMenuList">
          <li>
            <p>The organisation administrator is the person within your
              organisation who can create a new project online. There are two
              ways for the administrator to do this:<br>
              1. Log into <a href="http://www.akvo.org/rsr/admin/" style="display:inline;">Akvo RSR
              login</a> to complete an online project form or;<br>
              2. Complete a project form in pdf. Email <a href="mailto:support@akvo.org" style="display:inline;">support@akvo.org</a> for a project form
              in pdf.</p>
            <p>To add a project via Akvo RSR Admin:</p>
            <p>Go to <a href="http://www.akvo.org" style="display:inline;">www.akvo.org</a>, click <strong>login</strong> in the upper right corner. In the Akvo RSR
              box click <strong>RSR administrator login page</strong>. Login with
              your username and password.</p>
            <p>After you've been logged in, click <strong>Projects</strong> and
              your organisation's project listing will appear. Then click <strong>Add project</strong> to add a new project via the online
              project form. Make sure to click <strong>Save and continue
              editing</strong> at the bottom of the page every now and then.</p>
            <h3>General Information</h3>
            <p>Give your project a short title (max. 45 characters) and
              subtitle (max. 75 characters). These fields are the newspaper
              headline for your project: use them to attract attention to what
              you are doing. Enter the status of your project.</p>
              <a href="http://rsrhelp.akvo.org/kb/projects/add-a-project-online-via-rsr-admin">Read more ></a>
            <h3>Description</h3>
            <p>This section should contain in-depth information about your
              project that tell people more about the project. Enter a brief <em>project summary</em> (max. 400 characters). The summary should
              explain why the project is being carried out, where it is taking
              place, who will benefit and/or participate, what it specifically
              hopes to accomplish and how those specific goals will be
              accomplished. The <em>Background</em> section should include
              relevant background information, including geographic, political,
              environmental, social and/or cultural issues (max. 1000
              characters). The <em>Project plan</em> should contain detailed
              information about the project and plans for implementing: the what,
              how, who and when (no character limitation). The <em>Current
              status</em> section should describe the current phase of the
              project (max. 600 characters). <em>Sustainability</em> should
              describe plans for sustaining/maintaining results after
              implementation is complete (no character limitation).</p>
            <h3>Goals</h3>
            <p>Describe what the project aims to accomplish. The <em>Overview
              of goals</em> should describe the broader project goal. The
              numbered fields can be used to list specific goals whose
              accomplishment will be used to measure overall project success.
              Keep in mind the SMART criteria: Specific, Measurable, Attainable,
              Realistic and Time-specific.</p>
            <h3>Photo</h3>
            <p>Make sure to upload a project photo as this will make your
              project page more attractive. This photo will be used as the main
              project photo. Enter a photo caption to briefly describe what is
              happening in the photo. The project image looks best in landscape
              format (4:3 width:height ratio), and should be less than 3.5 mb in
              size. Do you have more photo&#8217;s? Please add them as project
              updates once the project is online.</p>
            <h3>Project locations</h3>
            <p>Add the project's location(s) and mark one location as primary
              location.</p>
            <h3>Budget</h3>
            <p>Enter the currency. Select (a) budget item(s) from the drop-down
              box and/or add a new budget item.</p>
            <h3>Project focus</h3>
            <p>Select the focus area(s) of your project. To select more than
              one categories hold down 'control' (or 'command' on a Mac).</p>
            <h3>Partners</h3>
            <p>Enter the partners that are involved in the project, and select
              the type of partner they are. If they do not appear in the
              drop-down box you can add a new project partner. Read more about <a href=
"http://akvo.org/criteria-roles-and-procedures-for-akvo-partners/" style="display:inline;">partner
              types</a></p>
            <h3>Additional information</h3>
            <p>The notes box is not public. It allows you to make notes to
              other members of your organisation or partners with access to your
              projects on the RSR Admin pages.<br>
              In the additional information section, you can add one or several
              website links or Akvopedia articles that are related to the
              project.</p>
            <p>When the form is completed, the administrator can click <strong>Save</strong> at the bottom of the page. Then the Akvo
              administrator can publish the project.</p>
          </li>
        </ul>
      </li>
    </ul>
    <p><a href="http://rsrhelp.akvo.org/discussions/">Search for more RSR support solutions</a>.</p>
  </section>
  <hr class="delicate" />
  <section class="wrapper">
    <h2>Downloads</h2>
    <h4>RSR desktop</h4>
    <p>Our manuals contain all you need to know to create a project update:</p>
    <ul class="threeColumns vertMargin floats-in">
      <li class="englishManual"><a href="https://www.dropbox.com/s/ixu18npgqzyzo9f/RSR.PFM.EN.V04-13%20final.pdf"><span>RSR manual</span></a></li>
      <li class="frenchManual"><a href="https://www.dropbox.com/s/yuizhaebqgpeb6y/RSR.PFM.FR.V04-13%20final.pdf"><span>Manuel de RSR</span></a></li>
      <li class="spanishManual"><a href="https://www.dropbox.com/s/ki0s24rczhk2wuj/RSR.PFM.ES.V04-13%20final.pdf"><span>Manual de RSR</span></a></li>
    </ul>
    <h4>RSR Up Android app</h4>
    <ul class="threeColumns vertMargin floats-in">
      <li class="androidManual"><a href="https://github.com/akvo/akvo-rsr-up/wiki/User-guide"><span>RSR Up manual</span></a></li>
      <li class="videoAndroid"><a href="http://youtu.be/NMuE2OI_trE"><span>Showcase Video</span></a></li>
      <li class="playStore"><a href="https://play.google.com/store/apps/details?id=org.akvo.rsr.up"><span>Akvo RSR Up - Download</span></a></li>
    </ul>
    <hr class="delicate" />
    <p>If you need further help contact us at <a href="mailto:support@akvo.org" style="display:inline;">support@akvo.org</a></p>
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
