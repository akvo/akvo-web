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
	<?php //echo do_shortcode('[gravityform id="1" title="true" description="true" ajax="true"]');?>
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
//$( "body" ).addClass( "fullBlack" );
//jQuery to collapse the navbar on scroll
$(window).scroll(function() {
    if ($(".topbar").offset().top > 200) {
    	$(".topbar").css("background", "transparent");
        $(".navbar-fixed-top").addClass("top-nav-collapse");
    } else {
        $(".navbar-fixed-top").removeClass("top-nav-collapse");
        $(".topbar").css("background", "rgba(32, 32, 36, 0.3)");
    }
});
$("a.nxtSection[href^='#']").click(function(e) {
	e.preventDefault();
	
	var position = $($(this).attr("href")).offset().top;

	$("body, html").animate({
		scrollTop: position
	}  );
});



$('[data-behaviour~=fnl-nxt-btn]').each( function(){
	var btn = $(this);
	
	btn.click( function(ev){
		ev.preventDefault();
		
		var next_section = $(btn.attr('href'));
		
		// HIDE ALL FUNNEL SECTIONS
		$('section.funelContainer').addClass('hidden');
		
		// SHOW THE NEXT SECTION ONLY
		next_section.removeClass('hidden');
		
		var question = btn.attr('data-q');
		if( question ){
			
			var ans = btn.html();
			
			var textarea = $('#funnel-form .funnel-msg textarea');
			
			var text = textarea.val() + question + " " + ans + "\r\n";
			
			textarea.val( text );
			
		}
		
	});
	
});

</script>