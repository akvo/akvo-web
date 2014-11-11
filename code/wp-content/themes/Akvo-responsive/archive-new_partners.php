<?php
  /*
    Template Name: All Partners
  */
get_header(); ?>
<div id="content" role="main" class="floats-in partnerPage withSubMenu">
  <h1 class="backLined">Our partners</h1>
  <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
  <div class="fullWidthParag wrapper">
    <?php the_content(); ?>
  </div>
  <?php endwhile; // end of the loop. ?>
  <nav class="anchorNav wrapper">
    <h5>menu</h5>
    <div class="mShownCollapse"><a></a></div>
    <ul>
      <li><a href="#govGroup" class="pStaff">Governments</a></li>
      <li><a href="#compsGroup" class="cStaff">Companies</a></li>
      <li><a href="#founGroup" class="eStaff">Foundations</a></li>
      <li><a href="#intGovGroup" class="eStaff">Inter-governmental</a></li>
      <li><a href="#ngoGroup" class="eStaff">NGOs</a></li>
      <li><a href="#knowledgeGroup" class="eStaff">Knowledge institutes</a></li>
    </ul>
  </nav>
  <section class="wrapper">
    <?php query_posts(array('post_type'=>'new_partners')); ?>
    <?php $mypost = array( 'post_type' => 'new_partners' );
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
        <div class="staffName"> <a href="#"><?php echo esc_html( get_post_meta( get_the_ID(), 'partner_name', true ) ); ?></a> </div>
        <p class="staffTitle"><?php echo esc_html( get_post_meta( get_the_ID(), 'partner_tagline', true ) ); ?></p>
        <span class="akvoTeam">
        <?php the_terms( $post->ID, 'new_partners_team' ,  ' ' ); ?>
        </span>
        <div class="staffBiog">
          <?php the_content(); ?>
        </div>
      <small>Click for more details.</small> </li>
      <?php endwhile; ?>
    </ul>
    <div id="govGroup">
      <h2 class="pStaffHead">Governments</h2>
      <ul class="staff floats-in">
      </ul>
    </div>
    <hr class="delicate" />
    <div id="compsGroup">
      <h2 class="cStaffHead">Companies</h2>
      <ul class="staff floats-in">
      </ul>
    </div>
    <hr class="delicate" />
    <div id="founGroup">
      <h2 class="eStaffHead">Foundations</h2>
      <ul class="staff floats-in">
      </ul>
    </div>
    <hr class="delicate" />
    <div id="intGovGroup">
      <h2 class="eStaffHead">Inter-governmental</h2>
      <ul class="staff floats-in">
      </ul>
    </div>
    <hr class="delicate" />
    <div id="ngoGroup">
      <h2 class="eStaffHead">NGOs</h2>
      <ul class="staff floats-in">
      </ul>
    </div>
    <hr class="delicate" />
    <div id="knowledgeGroup">
      <h2 class="eStaffHead">Knowledge institutes</h2>
      <ul class="staff floats-in">
      </ul>
    </div>
    <hr class="delicate" />
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
          <p class="staffBio"><br/>
          <br/>
          </p>
        </div>
      </div>
      <div class="buttons"><a class="cancel">close</a></div>
    </div>
  </section>
</div>
<?php wp_reset_query(); ?>
<?php get_footer(); ?>