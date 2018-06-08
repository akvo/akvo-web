<?php
	/*
		Template Name: All Partners
	*/
	
	global $akvo;
	
	get_header(); 
?>
<div id="content" role="main" class="floats-in partnerPage withSubMenu">
	<h1 class="backLined">Our partners</h1>
	<div class="fullWidthParag wrapper centerED">
		<p>Akvo works with hundreds of organisations around the world to help them report,<br /> monitor, evaluate and share their work online.</p>

		<p>Following are our core partners with whom we work closely and some of the main programmes we support.</p>

		<p>For a full list of the programmes we’re involved in, <a href="https://programmes.akvoapp.org/en/">click here</a>.</p>
		<iframe src="https://programmes.akvoapp.org/widgets/projects/map/?organisation_id=42&width=900&height=400&style=light&state=dynamic" width="900px" height="400px" frameborder="0" allowTransparency="true" scrolling="no" style="overflow: hidden"> </iframe>
	</div>
	
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
			<?php echo do_shortcode("[akvo_partner category='governments']");?>
		</div>
		<hr class="delicate" />
		<div id="compsGroup">
			<h2 class="cStaffHead">Companies</h2>
			<?php echo do_shortcode("[akvo_partner category='companies']");?>
			
		</div>
		<hr class="delicate" />
		<div id="founGroup">
			<h2 class="eStaffHead">Foundations</h2>
			<?php echo do_shortcode("[akvo_partner category='foundations']");?>
			
		</div>
		<hr class="delicate" />
		<div id="intGovGroup">
			<h2 class="eStaffHead">Inter-governmental</h2>
			<?php echo do_shortcode("[akvo_partner category='inter-governmental']");?>
			
		</div>
		<hr class="delicate" />
		<div id="ngoGroup">
			<h2 class="eStaffHead">NGOs</h2>
			<?php echo do_shortcode("[akvo_partner category='ngos']");?>
			
		</div>
		<hr class="delicate" />
		<div id="knowledgeGroup">
			<h2 class="eStaffHead">Knowledge institutes</h2>
			<?php echo do_shortcode("[akvo_partner category='knowledge-institutes']");?>
			
		</div>
		<hr class="delicate" />
	</section>
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
			<p class="staffBio"><br/><br/></p>
		</div>
	</div>
	<div class="buttons"><a class="cancel">close</a></div>
</div>
<?php wp_reset_query(); ?>
<?php get_footer(); ?>