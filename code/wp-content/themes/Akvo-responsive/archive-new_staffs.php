<?php
  /*
    Template Name: All Staff
  */
	get_header(); 
?>
<div id="content" role="main" class="floats-in teamPage withSubMenu">
	<h1 class="backLined">Meet our team</h1>
  	<div class="wrapper">
    	<p class="centerED fullWidthParag">Akvo is helping today's brightest international development talent guide their organisations into a new era of openness in which co-operation happens much more easily and effectively and information is understood, used and shared.</p>
    	<p class="centerED fullWidthParag">To do this we employ smart people in numerous countries who understand both technology and development. Most of our team works directly on software development and partner support and training. <br /></p>
    	<p class="centerED fullWidthParag">Follow our team <a href="https://twitter.com/akvo/lists/staff">twitter list</a>. </p>
    </div>
  	<nav class="anchorNav wrapper">
    	<h5>menu</h5>
    	<div class="mShownCollapse"><a></a></div>
    	<ul>
      		<li><a href="#partnershipGroup" class="pStaff">Partnerships</a></li>
      		<li><a href="#communicationGroup" class="cStaff">Marketing and Communications</a></li>
      		<li><a href="#engineeringGroup" class="eStaff">Engineering &amp; design</a></li>
      		<li><a href="#contractorsGroup" class="oStaff">Extended team</a></li>
    	</ul>
  	</nav>
  	<p>Are you looking for our <a href="../organisations/" class="board">Board Members</a>?</p>
  	
  	<section class="wrapper">
  		<div id="partnershipGroup">
      		<h2 class="pStaffHead">Partnerships</h2>
      		<?php akvo_staff_list('partnerships');?>
      	</div>
    	<hr class="delicate" />
    	<div id="communicationGroup">
      		<h2 class="cStaffHead">Marketing and Communications</h2>
      		<?php akvo_staff_list('communication-pr');?>
      	</div>
    	<hr class="delicate" />
      	<div id="engineeringGroup">
        	<h2 class="eStaffHead">Engineering &amp; design</h2>
        	<?php akvo_staff_list('design-engineering');?>
      	</div>
      	<div id="contractorsGroup">
        	<h2 class="eStaffHead">Extended team</h2>
      		<?php akvo_staff_list('contractors', false);?>
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
			        <p class="staffBio"><br/><br/> </p>
			    </div>
      		</div>
      		<div class="buttons"><a class="cancel">close</a></div>
    	</div>
  	</section>
</div>
<?php wp_reset_query(); ?>
<?php get_footer(); ?>