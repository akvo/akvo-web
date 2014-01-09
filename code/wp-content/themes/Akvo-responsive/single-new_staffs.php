<?php
	/*
		Template Name: New Staff
	*/
get_header(); ?>

<div id="content" role="main" class="floats-in singleStaffPage withSubMenu">
  <section class="wrapper">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" class="post" role="article">
      <header class="posthead">
        <h2 class="bigger staffName">
      <?php the_title(); ?>
        </h2>
         <p class="staffTitle"><?php echo esc_html( get_post_meta( get_the_ID(), 'staff_title', true ) ); ?></p>
         <span class="akvoTeam"><?php the_terms( $post->ID, 'new_staffs_team' ,  ' ' ); ?></span>
      </header>
        <div class="imgWrapper">
          <?php the_post_thumbnail('thumbnail'); ?>
        </div>

      <section class="post-content clearfix entry">
        <?php the_content(); ?>
      </section>
    </article>
    <!-- /.post -->
    <?php endwhile; ?>
    <?php else : ?>
    <article id="post-not-found" class="post">
      <header class="posthead">
        <h2>Whoops! Looks like we can't find this post.</h2>
      </header>
      <section class="post-content">
        <p>It seems like this post is missing somewhere. Double-check the URL or try navigating back via the website menu links.</p>
      </section>
    </article>
    <?php endif; ?>
    </ul> 
    
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
<?php wp_reset_query(); ?>
<?php get_footer(); ?>
