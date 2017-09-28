<?php
/*
Template Name: akvoNetwork
*/
?>
<?php get_header(); ?>
<!--Start of Akvo.org Network page-->
<div id="content" class="floats-in networkPage">
	<h1 class="backLined">See it happen</h1>
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	<div class="fullWidthParag wrapper"><?php the_content(); ?></div>
	<?php endwhile; // end of the loop. ?>
  
	<section id="akvoDashboard">
		<h2>Data collected with Akvo tools</h2>
		
		<ul class="wrapper">
		  
			<li class="dashSingle" id="rsrDash">
				<h2>Akvo RSR</h2>
				<?php $json = akvo_json('https://rsr.akvo.org/api/v1/right_now_in_akvo/?format=json');?>
				
				<ul class="rsrData dashData">
					<li>
						<h4>Projects:</h4>
						<span ><?php echo $json->number_of_projects; ?></span> 
					</li>
					<li>
						<h4>Number of updates:</h4>
						<span><?php echo $json->number_of_project_updates;?></span> 
					</li>
					<li>
						<h4>Organisations Using RSR:</h4>
						<span id=""><?php echo $json->number_of_organisations;?></span> 
					</li>
					<li>
						<h4>Project Budgets:</h4>
						<span id="">€ <?= round($json->projects_budget_millions)/1000 ?><span class="unit">billion</span></span>
					</li>
				</ul>
				<div class="tooltipContainer">
					<a href="#" class="tooltipTrigger">info</a>
					<div class="tooltips">
						<p><em style='display:block;color:rgb(114, 205, 255);'>How is this data collected?</em> Automatically from the Akvo RSR database via the <a href='https://github.com/akvo/akvo-rsr/wili/Akvo-RSR-API'>RSR API</a></p>
						<p><em style='display:block;color:rgb(114, 205, 255);'>How often is this data refreshed?</em> Every four hours.</p>
					</div>
				</div>
			</li>
		  
			<li class="dashSingle" id="flowDash">
				<h2>Akvo Flow</h2>
				<ul class="flowData dashData">
					<li>
						<h4>Surveys Created:</h4>
						<span><?php the_field('flow_surveys'); ?></span>
					</li>
					<li>
						<h4>Data Points:</h4>
						<span><?php the_field('flow_data_points'); ?></span>
					</li>
					<li>
						<h4>Devices:</h4>
						<span><?php the_field('flow_devices'); ?></span>
					</li>
					<li>
						<h4>Organisations using FLOW:</h4>
						<span><?php the_field('organisations_using_flow'); ?></span>
					</li>
				</ul>
				<div class="tooltipContainer">
					<a href="#" class="tooltipTrigger">info</a>
					<div class="tooltips">
						<p><em style='display:block;color:rgb(114, 205, 255);'>How is this data collected?</em> Manually, via a script run on the Google App Enging FLOW instances.</p>
						<p><em style='display:block;color:rgb(114, 205, 255);'>How often is this data refreshed?</em> Monthly.</p>
					</div>
				</div>
			</li>
			  
		</ul>
	</section>
	<section id="rsrProjectUpdates">
		<h2>RSR: Latest project updates</h2>
		<nav class="anchorNav2 wrapper">
			<ul class>
				<li><a href="/seeithappen/all-rsr-project-updates/">Browse all latest project updates</a> </li>
				<li  class="rss"><a href="https://rsr.akvo.org/rss/all-updates" rel="alternate" type="application/rss+xml">RSS link for all RSR updates</a></li>
			</ul>
		</nav>
				  
		<?php
			$json = akvo_json('https://rsr.akvo.org/rest/v1/project_update_extra/?limit=3&photo__gte=a&format=json');
	
			$updates = $json->results;
			$rsr_domain = "https://rsr.akvo.org";
		?>
				  
		<ul id="updatesWrapperJS" class="floats-in wrapper">
		<?php 
			foreach($updates AS $count => $u) {
				if ($u->photo != '') {
					$date = explode('T', $u->time_last_updated);
					$date = $date[0];
					$full_name = $u->user->first_name . " " . $u->user->last_name;
					$country_and_city = $u->project->primary_location->country->name;
					$city = $u->project->primary_location->city;
					if ($city){
						$country_and_city = $city .", ". $country_and_city;
					}
					json_data_render_update(
						$rsr_domain , $u->absolute_url, $u->title, $u->photo, $date, $full_name,
						$u->user->organisation->name, $u->user->organisation->absolute_url,
						$country_and_city, $u->text
					);
				}
			}
		?>
		</ul>
	</section>
</div>
<!-- end content -->
<?php get_footer(); ?>