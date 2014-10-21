<?php
	/*
		Template Name: All Staff
	*/
get_header(); ?>

<div id="content" role="main" class="floats-in teamPage withSubMenu">
  <h1 class="backLined">Meet our team</h1>
     <div class="wrapper">
 <p class="centerED fullWidthParag">Akvo is helping today's brightest international development talent guide their organisations into a new era of openness in which co-operation happens much more easily and effectively and information is understood, used and shared.</p>
    <p class="centerED fullWidthParag">To do this we employ smart people in numerous countries who understand both technology and development. Most of our team works directly on software development and partner support and training. <br />
    <p class="centerED fullWidthParag">Follow our team <a href="https://twitter.com/akvo/lists/staff">twitter list</a>. </p>
    </p>
  </div>
  <nav class="anchorNav wrapper">
    <h5>menu</h5>
    <div class="mShownCollapse"><a></a></div>
    <ul>
      <li><a href="#partnershipGroup" class="pStaff">Partnerships</a></li>
      <li><a href="#communicationGroup" class="cStaff">Communication &amp; PR</a></li>
      <li><a href="#engineeringGroup" class="eStaff">Engineering &amp; design</a></li>
      <li><a href="#contractorsGroup" class="oStaff">Extended Team</a></li>
    </ul>
  </nav>
  <p>Are you looking for our <a href="../foundations/" class="board">Board Members</a>?</p>

  <section class="wrapper">
    <?php query_posts(array('post_type'=>'new_staffs')); ?>
    <?php $mypost = array( 'post_type' => 'new_staffs' );
	$loop = new WP_Query( $mypost ); ?>
    <!-- Cycle through all posts -->
    <ul class="staff floats-in">
      <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
      <li id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <!-- Display featured image in right-aligned floating div -->
        <div class="imgWrapper">
          <?php the_post_thumbnail('thumbnail'); ?>
        </div>
        <!-- Display Title and Name -->
        <div class="staffName"> <a href="#"><?php echo esc_html( get_post_meta( get_the_ID(), 'staff_name', true ) ); ?></a> </div>
        <p class="staffTitle"><?php echo esc_html( get_post_meta( get_the_ID(), 'staff_title', true ) ); ?></p>
<!--          <p class="staffTitle"><?php $hubs = get_the_terms($post->ID, 'staff_hub'); foreach ($hubs as $hub) { echo $hub->name; } ?> hub</p>-->
        <span class="akvoTeam"><?php the_terms( $post->ID, 'new_staffs_team' ,  ' ' ); ?></span>
        <div class="staffBiog"><?php the_content(); ?></div>
        <small>Click for more details.</small>
      </li>
      <?php endwhile; ?>
    </ul>
    <div id="partnershipGroup">
      <h2 class="pStaffHead">Partnerships</h2>
    <ul class="staff floats-in"><li class="newStaff">
          <a href="/about-us/working-at-akvo/">
            <div class="imgWrapper"><img src="<?php bloginfo('template_directory'); ?>/images/staff/you.png" title="Tell us more about you" alt="Tell us more about you" /></div>
            <div class="staffName"><a href="/about-us/working-at-akvo/">You?</a></div>
            <p class="staffTitle">Check Out The Available Jobs.</p>
            <a href="/about-us/working-at-akvo/"><small>Click for more details.</small></a>
           </a>
           </li></ul>
    </div>    <hr class="delicate" />

    <div id="communicationGroup">
      <h2 class="cStaffHead">Communication and PR</h2>
    <ul class="staff floats-in"><li class="newStaff">
          <a href="/about-us/working-at-akvo/">
            <div class="imgWrapper"><img src="<?php bloginfo('template_directory'); ?>/images/staff/you.png" title="Tell us more about you" alt="Tell us more about you" /></div>
            <div class="staffName"><a href="/about-us/working-at-akvo/">You?</a></div>
            <p class="staffTitle">Check Out The Available Jobs.</p>
            <a href="/about-us/working-at-akvo/"><small>Click for more details.</small></a>
           </a>
           </li></ul>
    </div>    <hr class="delicate" />

    <div id="engineeringGroup">
      <h2 class="eStaffHead">Engineering &amp; design</h2>
    <ul class="staff floats-in"><li class="newStaff">
          <a href="/about-us/working-at-akvo/">
            <div class="imgWrapper"><img src="<?php bloginfo('template_directory'); ?>/images/staff/you.png" title="Tell us more about you" alt="Tell us more about you" /></div>
            <div class="staffName"><a href="/about-us/working-at-akvo/">You?</a></div>
            <p class="staffTitle">Check Out The Available Jobs.</p>
            <a href="/about-us/working-at-akvo/"><small>Click for more details.</small></a>
           </a>
           </li></ul>
    </div>
    <div id="contractorsGroup">
      <h2 class="eStaffHead">Extended team</h2>
    <ul class="staff floats-in"></ul>
    </div>

  <div id="overlay">
    <div id="blanket"></div>
  </div>
  <!-- the dialog contents -->
  <div id="descrDialog" class="dialog">
    <div id="staffDescr">
    <div class="extLoad" id="">
      <div class="imgWrapper"></div>
      <h1 class="staffName"></h1>
      <p class="staffTitle"></p>
      <p class="staffBio"><br/><br/> </p></div>
        </div>
        <div class="buttons"><a class="cancel">close</a></div>
      </div>
  </section>
</div>
<script>
$("document").ready(function () {

$("#partnershipGroup ul.staff").find('li.newStaff').appendTo("#partnershipGroup .staff");
$("#communicationGroup ul.staff").find('li.newStaff').appendTo("#communicationGroup .staff");
$("#engineeringGroup .staff").find('li.newStaff').appendTo("#engineeringGroup .staff");
})
</script>
<?php wp_reset_query(); ?>
<?php get_footer(); ?>
