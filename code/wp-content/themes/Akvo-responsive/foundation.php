<?php
/*
	Template Name: foundationPage
*/
?>
<?php get_header(); ?>

<!--Start of Akvo.org Contact Info page-->

<p>&nbsp;</p>

<div id="content" class="floats-in foundation">
  <h1 class="backLined"><?php the_title(); ?></h1>
  <div class="wrapper textColumn centerED">
    <?php 
    // force post id to get the_content to work
    $post = get_post(9479);
    setup_postdata($post);
    the_content();
    ?>
  </div>

  <?php while( have_rows('section') ): the_row(); ?>
    <hr class="delicate"/>
    <section class="wrapper uncenterED floats-in directorContainer">
      <div class="textColumn">
        <h2><?php the_sub_field('name'); ?></h2>
        <?php the_sub_field('description'); ?>
      </div>
      <div class="directors">
        <?php while( has_sub_field('group') ): ?>
          <div class="subDirectors">
            <h4><?php the_sub_field('title'); ?></h4>
            <ul class="<?php the_sub_field('class'); ?> staff floats-in"></ul>
          </div>
        <?php endwhile; ?>
      </div>
    </section>
  <?php endwhile; ?>
    
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
    <div class="buttons">
      <a class="cancel">close</a>
    </div>
  </div>
</div>

<script type="text/javascript">
$( document ).ready(function() {
  // move people into correct lists
  <?php while( have_rows('section') ): the_row(); ?>
      <?php while( has_sub_field('group') ): ?>
      $('ul.<?php the_sub_field('class'); ?>').append($('li.<?php the_sub_field('class'); ?>'));
      <?php endwhile; ?>
  <?php endwhile; ?>
});
</script>

<?php query_posts(array('post_type'=>'foundation_member')); ?>
<?php $mypost = array( 'post_type' => 'foundation_member' );
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
    <div class="staffName"> <a href="#"><?php the_title(); ?></a> </div>
    <p class="staffTitle"><?php echo esc_html( get_post_meta( get_the_ID(), 'member_title', true ) ); ?></p>
    <span class="akvoTeam"><?php the_terms( $post->ID, 'new_member_team' ,  ' ' ); ?></span>
    <div class="staffBiog"><?php the_content(); ?></div>
    <small>Click for more details.</small>
  </li>
  <?php endwhile; ?>
</ul> 

<!-- end content -->
<?php get_footer(); ?>
