<?php
/*
	Template Name: Homepage-2018
*/
?>
<?php get_header();?>
<?php
	$sections = array(
		'intro'		=> array(
			'class'				=> 'topMsg',
			'fn'				=> 'intro_section',
			'next_link'			=> '#assessFunel',
		),
		'funnel'	=> array(
			'id'				=> 'assessFunel',
			'class'				=> 'assessFunel',
			'fn'				=> 'content_section',
			'next_link'			=> '#vidBlock',
			'next_link_class'	=> 'nxtSection'
		),
		'video'		=> array(
			'id'				=> 'vidBlock',
			'class'				=> 'vidBlock',
			'fn'				=> 'video',
			'next_link'			=> '#hubTrustBlock',
			'next_link_class'	=> 'nxtSection'
		),
		'clients'	=> array(
			'id'	=> 'hubTrustBlock',
			'class'	=> 'hubTrustBlock floats-in',
			'fn'	=> 'logos'
		),
		'hubs_list'	=> array(
			'class'	=> 'allHubBlock floats-in',
			'fn'	=> 'hubs_list'
		)
	);
?>
<div id="content" class="floats-in homePage">
	<?php
		$akvo_page = new akvoBlackBody;
		$akvo_page->display_sections( $sections );
	?>
</div>
<?php get_footer();?>
<style>
	.fullBlack .homePage .vidBlock{
		height: auto;
		padding-bottom: 70px;
	}
	.fullBlack .homePage .topMsg .hubIntro p .btnOutline{
		font-size: 0.7em;
		padding: 0 25px;
	}
</style>
<script>
$("a.nxtSection[href^='#']").click(function(e) {
	e.preventDefault();
	
	var position = $($(this).attr("href")).offset().top;

	$("body, html").animate({
		scrollTop: position
	} /* speed */ );
});
//# sourceURL=pen.js


$('[data-behaviour~=fnl-nxt-btn]').each( function(){
	var btn = $(this);
	
	btn.click( function(ev){
		ev.preventDefault();
		
		var next_section = $(btn.attr('href'));
		//var prev_section = btn.closest('section.funelContainer');
		
		$('section.funelContainer').addClass('hidden');
		
		// HIDE THE CURRENT SECTION
		//prev_section.addClass('hidden');
		
		// SHOW THE NEXT SECTION
		next_section.removeClass('hidden');
		
	});
	
});
</script>