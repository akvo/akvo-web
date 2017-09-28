<?php
/*
Template Name: rsrKpis
*/
?>
<?php get_header(); ?>
	<!--Start of Akvo.org Network page-->
	<div id="content" class="floats-in networkPage">
		<h1 class="backLined">Akvo RSR KPIs</h1>
		<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		<div class="fullWidthParag wrapper"><?php the_content(); ?></div>
		<?php endwhile; // end of the loop. ?>


		<section id="akvoDashboard">
			<h2>The KPI charts</h2>

			<ul class="wrapper">

				<li class="dashSingle KPI" id="rsrDash" style="display: none;">
					<div id="chart1"></div>
				</li>

				<li class="dashSingle KPI" id="flowDash" style="display: none;">
					<div id="chart2"></div>
				</li>

				<li class="dashSingle KPI" id="opendaidDash" style="display: none;">
					<div id="chart3"></div>
				</li>

				<li class="dashSingle KPI" id="akvopediaDash" style="display: none;"></li>

				<li class="dashSingle KPI" id="akvopediaDash" style="display: none;">
					<div id="chart5"></div>
				</li>

				<li class="dashSingle KPI" id="akvopediaDash" style="display: none;">
					<div id="chart6"></div>
				</li>
			</ul>
		</section>

		<script src="//reporting.test.akvo-ops.org/reportserver/reportserver/fileServerAccess?id=221679" type="application/javascript"></script>

		<script type="text/javascript">
			var akvoChartConfig = {
				base: {
					server: "https://reporting.test.akvo-ops.org/reportserver/reportserver/",
					user: "user1",
					password: "unicorns"
				},
				charts:[
					{
						ID: "chart1",
						type: "line",
						reportKey: "projects_and_partners_cumulative"
					},
					{
						ID: "chart2",
						type: "stackedBar",
						reportKey: "projects_and_partners_new",
						colors: ["#aaff00", "#0000ff"]
					}
				]
			};
			for (var i=0; i< akvoChartConfig.charts.length; i++) {
				$("#" + akvoChartConfig.charts[i].ID).parent().css("display",  "block")
			}
		</script>
	</div>
	<!-- end content -->
<?php get_footer(); ?>