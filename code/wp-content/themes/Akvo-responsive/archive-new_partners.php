<?php
	/*
		Template Name: All Partners
	*/
	
	global $akvo;
	
	get_header(); 
?>
<div id="content" role="main" class="floats-in partnerPage withSubMenu">
	<h1 class="backLined">Our partners</h1>
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	<div class="fullWidthParag wrapper centerED">
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
		<div id="govGroup">
			<h2 class="pStaffHead">Governments</h2>
			<?php $akvo->partner_list('governments');?>
		</div>
		<hr class="delicate" />
		<div id="compsGroup">
			<h2 class="cStaffHead">Companies</h2>
			<?php $akvo->partner_list('companies');?>
		</div>
		<hr class="delicate" />
		<div id="founGroup">
			<h2 class="eStaffHead">Foundations</h2>
			<?php $akvo->partner_list('foundations');?>
		</div>
		<hr class="delicate" />
		<div id="intGovGroup">
			<h2 class="eStaffHead">Inter-governmental</h2>
			<?php $akvo->partner_list('inter-governmental');?>
		</div>
		<hr class="delicate" />
		<div id="ngoGroup">
			<h2 class="eStaffHead">NGOs</h2>
			<?php $akvo->partner_list('ngos');?>
		</div>
		<hr class="delicate" />
		<div id="knowledgeGroup">
			<h2 class="eStaffHead">Knowledge institutes</h2>
			<?php $akvo->partner_list('knowledge-institutes');?>
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
					<p class="staffBio"><br/><br/></p>
				</div>
			</div>
			<div class="buttons"><a class="cancel">close</a></div>
		</div>
	</section>
</div>
<?php wp_reset_query(); ?>
<?php get_footer(); ?>