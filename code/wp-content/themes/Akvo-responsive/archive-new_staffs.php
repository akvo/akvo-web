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
    <p class="centerED fullWidthParag">Follow our team <a href="https://twitter.com/akvo/staff">twitter list</a>. </p>
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
      <li><a href="#akvoJob" class="eStaff">Work for Akvo</a></li>
    </ul>
  </nav>

  <section class="wrapper"> 
    <div id="partnershipGroup">
      <h2 class="pStaffHead">Partnerships</h2>
      <ul class="staff floats-in">
        <?php query_posts('post_type=new_staffs&new_staffs_team=partnerships'); ?>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <li class="newStaff">
          <a href="#inline-<?php the_ID(); ?>" class="fancybox">
            <!-- Display featured image in right-aligned floating div -->
            <div class="imgWrapper">
              <?php the_post_thumbnail('thumbnail'); ?>
            </div>
            <!-- Display Title and Name -->
            <div class="staffName">
              <?php echo esc_html( get_post_meta( get_the_ID(), 'staff_name', true ) ); ?>
            </div>
            <p class="staffTitle"><?php echo esc_html( get_post_meta( get_the_ID(), 'staff_title', true ) ); ?></p>
            <small>Click for more details.</small>
          </a>

          <div id="inline-<?php the_ID(); ?>">
            <div id="staffDescr">
              <div class="extLoad" id="">
                <div class="imgWrapper"><?php the_post_thumbnail('thumbnail'); ?></div>
                <h1 class="staffName"><?php echo esc_html( get_post_meta( $post->ID, 'staff_name', true ) ); ?></h1>
                <p class="staffTitle"><?php echo esc_html( get_post_meta( $post->ID, 'staff_title', true ) ); ?></p>
                <p class="staffBio"><?php the_content(); ?></p>
              </div>
            </div>
          </div>          
        </li>
        <?php endwhile; ?>
        <li class="newStaff">
            <a href="http://akvo.org/about-us/working-at-akvo/">
              <div class="imgWrapper"><img src="<?php bloginfo('template_directory'); ?>/images/staff/you.png" title="Tell us more about you" alt="Tell us more about you" /></div>
              <div class="staffName"><a href="http://akvo.org/about-us/working-at-akvo/">You?</a></div>
              <p class="staffTitle">Check Out The Available Jobs.</p>
              <a href="http://akvo.org/about-us/working-at-akvo/"><small>Click for more details.</small></a>
             </a>
        </li>
        <?php endif; wp_reset_query(); ?>
      </ul>
    </div>
    <hr class="delicate" />

    <div id="communicationGroup">
      <h2 class="cStaffHead">Communication and PR</h2>
      <ul class="staff floats-in">
        <?php query_posts('post_type=new_staffs&new_staffs_team=communication-pr'); ?>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <li class="newStaff">
          <a href="#inline-<?php the_ID(); ?>" class="fancybox">
            <!-- Display featured image in right-aligned floating div -->
            <div class="imgWrapper">
              <?php the_post_thumbnail('thumbnail'); ?>
            </div>
            <!-- Display Title and Name -->
            <div class="staffName">
              <?php echo esc_html( get_post_meta( get_the_ID(), 'staff_name', true ) ); ?>
            </div>
            <p class="staffTitle"><?php echo esc_html( get_post_meta( get_the_ID(), 'staff_title', true ) ); ?></p>
            <small>Click for more details.</small>
          </a>

          <div id="inline-<?php the_ID(); ?>">
            <div id="staffDescr">
              <div class="extLoad" id="">
                <div class="imgWrapper"><?php the_post_thumbnail('thumbnail'); ?></div>
                <h1 class="staffName"><?php echo esc_html( get_post_meta( $post->ID, 'staff_name', true ) ); ?></h1>
                <p class="staffTitle"><?php echo esc_html( get_post_meta( $post->ID, 'staff_title', true ) ); ?></p>
                <p class="staffBio"><?php the_content(); ?></p>
              </div>
            </div>
          </div>          
        </li>
        <?php endwhile; ?>
        <li class="newStaff">
            <a href="http://akvo.org/about-us/working-at-akvo/">
              <div class="imgWrapper"><img src="<?php bloginfo('template_directory'); ?>/images/staff/you.png" title="Tell us more about you" alt="Tell us more about you" /></div>
              <div class="staffName"><a href="http://akvo.org/about-us/working-at-akvo/">You?</a></div>
              <p class="staffTitle">Check Out The Available Jobs.</p>
              <a href="http://akvo.org/about-us/working-at-akvo/"><small>Click for more details.</small></a>
             </a>
        </li>
        <?php endif; wp_reset_query(); ?>
      </ul>
    </div>
    <hr class="delicate" />

    <div id="engineeringGroup">
      <h2 class="eStaffHead">Engineering &amp; design</h2>
      <ul class="staff floats-in">
        <?php query_posts('post_type=new_staffs&new_staffs_team=design-engineering'); ?>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <li class="newStaff">
          <a href="#inline-<?php the_ID(); ?>" class="fancybox">
            <!-- Display featured image in right-aligned floating div -->
            <div class="imgWrapper">
              <?php the_post_thumbnail('thumbnail'); ?>
            </div>
            <!-- Display Title and Name -->
            <div class="staffName">
              <?php echo esc_html( get_post_meta( get_the_ID(), 'staff_name', true ) ); ?>
            </div>
            <p class="staffTitle"><?php echo esc_html( get_post_meta( get_the_ID(), 'staff_title', true ) ); ?></p>
            <small>Click for more details.</small>
          </a>

          <div id="inline-<?php the_ID(); ?>">
            <div id="staffDescr">
              <div class="extLoad" id="">
                <div class="imgWrapper"><?php the_post_thumbnail('thumbnail'); ?></div>
                <h1 class="staffName"><?php echo esc_html( get_post_meta( $post->ID, 'staff_name', true ) ); ?></h1>
                <p class="staffTitle"><?php echo esc_html( get_post_meta( $post->ID, 'staff_title', true ) ); ?></p>
                <p class="staffBio"><?php the_content(); ?></p>
              </div>
            </div>
          </div>          
        </li>
        <?php endwhile; ?>
        <li class="newStaff">
            <a href="http://akvo.org/about-us/working-at-akvo/">
              <div class="imgWrapper"><img src="<?php bloginfo('template_directory'); ?>/images/staff/you.png" title="Tell us more about you" alt="Tell us more about you" /></div>
              <div class="staffName"><a href="http://akvo.org/about-us/working-at-akvo/">You?</a></div>
              <p class="staffTitle">Check Out The Available Jobs.</p>
              <a href="http://akvo.org/about-us/working-at-akvo/"><small>Click for more details.</small></a>
             </a>
        </li>
        <?php endif; wp_reset_query(); ?>
      </ul>
    </div> 
    <div id="contractorsGroup">
      <h2 class="eStaffHead">Extended team</h2>
       <ul class="staff floats-in">
          <?php query_posts('post_type=new_staffs&new_staffs_team=contractors'); ?>
          <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
          <li class="newStaff">
            <a href="#inline-<?php the_ID(); ?>" class="fancybox">
              <!-- Display featured image in right-aligned floating div -->
              <div class="imgWrapper">
                <?php the_post_thumbnail('thumbnail'); ?>
              </div>
              <!-- Display Title and Name -->
              <div class="staffName">
                <?php echo esc_html( get_post_meta( get_the_ID(), 'staff_name', true ) ); ?>
              </div>
              <p class="staffTitle"><?php echo esc_html( get_post_meta( get_the_ID(), 'staff_title', true ) ); ?></p>
              <small>Click for more details.</small>
            </a>

            <div id="inline-<?php the_ID(); ?>">
              <div id="staffDescr">
                <div class="extLoad" id="">
                  <div class="imgWrapper"><?php the_post_thumbnail('thumbnail'); ?></div>
                  <h1 class="staffName"><?php echo esc_html( get_post_meta( $post->ID, 'staff_name', true ) ); ?></h1>
                  <p class="staffTitle"><?php echo esc_html( get_post_meta( $post->ID, 'staff_title', true ) ); ?></p>
                  <p class="staffBio"><?php the_content(); ?></p>
                </div>
              </div>
            </div>          
          </li>
          <?php endwhile; ?>
          <?php endif; wp_reset_query(); ?>
        </ul>
    </div> 

  </section>
</div>

<?php get_footer(); ?>