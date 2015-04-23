<?php
/*
	Template Name: annual-report-2014
*/
?>
<?php get_header();?>
<!--Start of Annual Report 2014-->
<div id="content" class="floats-in annual-report">
  <section class="wrapper heading">
      <h1><?php the_field('ar_title'); ?></h1>
      <?php the_field('ar_see_previous_reports'); ?>
  </section>

  <section class="wrapper introText">
      <h2><?php the_field('ar_intro_text_title'); ?></h2>
      <?php the_field('ar_intro_text_body'); ?>
  </section>

  <section class="videoStatement">
    <h2><?php the_field('ar_statement_title'); ?></h2>
    <div class="videoContainer">
      <iframe width="800" height="450" frameborder="0" allowfullscreen="" mozallowfullscreen="" webkitallowfullscreen="" src="<?php the_field('ar_statement_url'); ?>"></iframe>
    </div>
  </section>

  <section class="overview overview1">
    <div class="wrapper">
      <h2><?php the_field('ar_overview_title'); ?></h2>
      <p><?php the_field('ar_overview_subtitle'); ?></p>

      <div class="arNugget text">
        <h3><?php the_field('ar_nugget_1_title'); ?></h3>
        <?php the_field('ar_nugget_1_body'); ?>
      </div>

      <div class="arNugget hub">
        <img src="<?php the_field('ar_del_url'); ?>">
      </div>

      <div class="arNugget text">
        <h3><?php the_field('ar_nugget_2_title'); ?></h3>
        <?php the_field('ar_nugget_2_body'); ?>      
      </div>    

      <div class="arNugget text">
        <h3><?php the_field('ar_nugget_3_title'); ?></h3>
        <?php the_field('ar_nugget_3_body'); ?>      
      </div>  

      <div class="arNugget hub">
        <img src="<?php the_field('ar_nbo_url'); ?>">
      </div>  

      <div class="arNugget text">
        <h3><?php the_field('ar_nugget_4_title'); ?></h3>
        <?php the_field('ar_nugget_4_body'); ?>      
      </div>  

      <div class="arNugget text">
        <h3><?php the_field('ar_nugget_5_title'); ?></h3>
        <?php the_field('ar_nugget_5_body'); ?>      
      </div>  
    </div>
  </section>

  <section class="staffHero">
    <img src="<?php the_field('ar_staff_hero_url'); ?>">
  </section>

  <section class="overview overview2">
    <div class="wrapper">
      <div class="arNugget text">
        <h3><?php the_field('ar_nugget_6_title'); ?></h3>
        <?php the_field('ar_nugget_6_body'); ?>      
      </div>

      <div class="arNugget text">
        <h3><?php the_field('ar_nugget_7_title'); ?></h3>
        <?php the_field('ar_nugget_7_body'); ?>      
      </div> 

      <div class="arNugget hub">
        <img src="<?php the_field('ar_oua_url'); ?>">
      </div>      

      <div class="arNugget text">
        <h3><?php the_field('ar_nugget_8_title'); ?></h3>
        <?php the_field('ar_nugget_8_body'); ?>      
      </div> 

      <div class="arNugget text">
        <h3><?php the_field('ar_nugget_9_title'); ?></h3>
        <?php the_field('ar_nugget_9_body'); ?>      
      </div> 

      <div class="arNugget text">
        <h3><?php the_field('ar_nugget_10_title'); ?></h3>
        <?php the_field('ar_nugget_10_body'); ?>      
      </div> 

      <div class="arNugget text">
        <h3><?php the_field('ar_nugget_11_title'); ?></h3>
        <?php the_field('ar_nugget_11_body'); ?>      
      </div> 

      <div class="arNugget hub">
        <img src="<?php the_field('ar_dc_url'); ?>">
      </div>       

      <div class="arNugget text">
        <h3><?php the_field('ar_nugget_12_title'); ?></h3>
        <?php the_field('ar_nugget_12_body'); ?>      
      </div> 
    </div>     

  </section>

  <section class="stories">
    <h2><?php the_field('ar_stories_title'); ?></h2>
    <ul class="bxslider">
      <?php if( have_rows('ar_stories_items') ): ?>
        <?php while( have_rows('ar_stories_items') ): the_row(); ?>
          <li>
            <img src="<?php the_sub_field('ar_story_image_url'); ?>">
          </li>      
        <?php endwhile; ?>
      <?php endif; ?>
    </ul>
  </section>

  <section class="financials">
    <div class="wrapper">
      <h2><?php the_field('ar_finance_title'); ?></h2>
      <?php the_field('ar_finance_subtitle'); ?>

      <div class="income tableContainer">
        <table>
          <tr>
            <th class="header padBelow">Income in €000</th>
          </tr>
          <tr>
            <td>Income own fundraising</td>
          </tr>
          <tr>
            <td>-Fundraising activites</td>
            <td class="num">0</td>
          </tr>
          <tr class="padBelow">
            <td>-Project contributions</td>
            <td class="num">51</td>
          </tr>
          <tr class="padBelow">
            <td>Total income own fundraising</td>
            <td class="num">51</td>          
          </tr>  
          <tr class="padBelow">
            <td>Government subsidies</td>
            <td class="num">2,071</td>          
          </tr>    
          <tr class="padBelow">
            <td>Other income</td>
            <td class="num">1,788</td>          
          </tr> 
          <tr class="total">
            <td>Total income</td>
            <td class="num">3,910</td>          
          </tr> 
        </table>
      </div>
      <div class="costs tableContainer">
        <table>
          <tr>
            <th class="header padBelow">Costs in €000</th>
          </tr>
          <tr>
            <td>Expenditure on behalf on the objectives</td>
            <td class="num">2,824</td>
          </tr>
          <tr>
            <td>Expenditure on fundraising</td>
            <td class="num">90</td>
          </tr>
          <tr class="padBelow">
            <td>Management and administration</td>
            <td class="num">90</td>
          </tr>        
          <tr>
            <td>Charged staff costs</td>
            <td class="num">-3,191</td>          
          </tr>  
          <tr class="padBelow">
            <td>Charged material costs</td>
            <td class="num">-649</td>          
          </tr>
          <tr>
            <td>Direct staff costs</td>
            <td class="num">3,191</td>          
          </tr>  
          <tr class="padBelow">
            <td>Direct material costs</td>
            <td class="num">649</td>          
          </tr> 
          <tr class="total padBelow">
            <td>Total costs</td>
            <td class="num">3,910</td>          
          </tr>
          <tr class="balance">
            <td>Balance of income and costs</td>
            <td class="num">73</td>          
          </tr>        
        </table>
      </div>
    </div>
  </section>

  <section class="wrapper reflections">
    <h2><?php the_field('ar_reflections_title'); ?></h2>
    <?php the_field('ar_reflections_subtitle'); ?>

    <ul class="threeColumns floatsIn">
      <?php if( have_rows('ar_reflections_items') ): ?>
        <?php while( have_rows('ar_reflections_items') ): the_row(); ?>
          <li>
            <a href="<?php the_sub_field('ar_reflection_link'); ?>">
              <img src="<?php the_sub_field('ar_reflection_image_url'); ?>">
            </a>
          </li>      
        <?php endwhile; ?>
      <?php endif; ?>
    </ul>
  </section>

</div>

<div class="clearfix"></div>

<script type="text/javascript">
  $(document).ready(function() {
      $('.bxslider').bxSlider();
  });
</script>
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/jquery.bxslider.css">
<!-- end content --> 
<?php get_footer();?>