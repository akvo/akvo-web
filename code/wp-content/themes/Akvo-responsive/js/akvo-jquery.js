// Interaction for akvo.org website.
// Author: loic@akvo.org - 2013

$("document").ready(function () {

// Fixes the Zooming while scrolling on google map iframe.
$(document).bind('em_maps_location_hook', function( e, map, infowindow, marker ){
// Disable scroll zoom on Google Maps
map.set('scrollwheel', false);
map.setOptions({'scrollwheel': false});
});


$("#partnershipGroup ul.staff").find('li.newStaff').appendTo("#partnershipGroup .staff");
$("#communicationGroup ul.staff").find('li.newStaff').appendTo("#communicationGroup .staff");
$("#engineeringGroup .staff").find('li.newStaff').appendTo("#engineeringGroup .staff");


$("div.breadcrumbs").append($("div.projectGateWay"));


// Anchored Fixed Menu on product pages.

//	$originalWidth = $("nav.anchorNav").width();
//	$originalheight = $("nav.anchorNav").height();
//	$("nav.anchorNav").animate({"width":"28px", "height":"30px" }, 800, 
//		function() {
//			$("nav.anchorNav h5, nav.anchorNav ul, nav.anchorNav h5:after" ).hide("fast");
//			$(".mShownCollapse a").css("background-position","bottom");
//			$("nav.anchorNav").append('<p class="mLabel">menu</p>');
//			$("nav.anchorNav > p.mLabel").css({"position":"absolute","bottom":"-18px"})	
//			});
//	$(".mShownCollapse a").toggle(
//		function(){			
//			$("nav.anchorNav").animate({"width":((parseInt($originalWidth) + 20 )+ 'px') , "height":((parseInt($originalheight) + 20 ) + 'px') }, 200);
//				$("nav.anchorNav h5, nav.anchorNav ul, nav.anchorNav h5:after" ).show();
//				$(".mShownCollapse a").css("background-position","top");
//				$("nav.anchorNav > p.mLabel").css("display","none")	
////				$("nav.anchorNav ul a").click(function(){
////					$("nav.anchorNav").animate({"width":"28px", "height":"22px" }, 200);
////					$("nav.anchorNav h5, nav.anchorNav ul, nav.anchorNav h5:after" ).hide();
////					$(".mShownCollapse a").css("background-position","bottom");
////				});
//		}, 
//		function(){
//				$("nav.anchorNav").animate({"width":"28px", "height":"30px" }, 200);
//				$("nav.anchorNav h5, nav.anchorNav ul, nav.anchorNav h5:after" ).hide();
//				$(".mShownCollapse a").css("background-position","bottom");
//				$("nav.anchorNav").append('<p class="mLabel">menu</p>');
//				$("nav.anchorNav > p.mLabel").css({"position":"absolute","bottom":"-18px"})	
//		})

// $(".backLinedPurple, .backLined, .backLinedGrey").wrapInner('<span></span>');
    $('.blog #content, .blog .widget-area').wrapAll($('<div>').addClass('blogWrap'));

    // hide #back-top first
    $("#back-top").hide();

    // fade in #back-top
    $(function () {
        $(window).scroll(function () {
            if ($(this).scrollTop() > 100) {
                $('#back-top').fadeIn();
            } else {
                $('#back-top').fadeOut();
            }
        });

        // scroll body to 0px on click
        $('#back-top a').click(function () {
            $('body,html').animate({
                scrollTop: 0
            }, 600);
            return false;
        });

        $(".anchorNav li a").click(function (event) {
            event.preventDefault();
            $('html,body').animate({
                scrollTop: $(this.hash).offset().top
            }, 500);
        });
    });

//    Team Page Hover & click effects.

//    $("ul.staff li div.imgWrapper img").css("opacity", "0.8");
//    $("ul.staff li").hover(function () {
//        $("div.imgWrapper img", this).css("opacity", "1");
//    }, function () {
//        $("div.imgWrapper img", this).css("opacity", "0.8");
//    });
//    $("a.mStaff").hover(function () {
//        $("li.staffAsset.management img").fadeTo("fast", 1);
//        $("li.staffAsset.management div.imgWrapper").css("background", "rgb(227, 27, 35)");
//        $("li.staffAsset.management div.staffName a").css("color", "rgb(227, 27, 35)");
//     // $(this).css("color", "rgb(227, 27, 35)");
//    }, function () {
//        $("li.staffAsset.management img").fadeTo("fast", 0.8);
//        $("li.staffAsset.management div.imgWrapper").css("background", "rgb(224,224,224)");
//        $("ul.staff li div.imgWrapper img").css("opacity", "0.8");
//        $("li.staffAsset.management div.staffName a").css("color", "rgb(0, 103, 167)");
//         // $(this).css("color", "rgb(0, 103, 167)");
//    });
//    $("a.pStaff").hover(function () {
//        $("li.staffAsset.partnership img").fadeTo("fast", 1);
//        $("li.staffAsset.partnership div.imgWrapper").css("background", "rgb(250, 162, 27)");
//        $("li.staffAsset.partnership div.staffName a").css("color", "rgb(250, 162, 27)");
//         // $(this).css("color", "rgb(250, 162, 27)");
//    }, function () {
//        $("li.staffAsset.partnership img").fadeTo("fast", 0.8);
//        $("li.staffAsset.partnership div.imgWrapper").css("background", "rgb(224,224,224)");
//        $("ul.staff li div.imgWrapper img").css("opacity", "0.8");
//        $("li.staffAsset.partnership div.staffName a").css("color", "rgb(0, 103, 167)");
//         // $(this).css("color", "rgb(0, 103, 167)");
//    });
//    $("a.cStaff").hover(function () {
//        $("li.staffAsset.communication img").fadeTo("fast", 1);
//        $("li.staffAsset.communication div.imgWrapper").css("background", "rgb(219, 135, 201)");
//        $("li.staffAsset.communication div.staffName a").css("color", "rgb(219, 135, 201)");
//         // $(this).css("color", "rgb(219, 135, 201)");
//    }, function () {
//        $("li.staffAsset.communication img").fadeTo("fast", 0.8);
//        $("li.staffAsset.communication div.imgWrapper").css("background", "rgb(224,224,224)");
//        $("ul.staff li div.imgWrapper img").css("opacity", "0.8");
//        $("li.staffAsset.communication div.staffName a").css("color", "rgb(0, 103, 167)");
//         // $(this).css("color", "rgb(0, 103, 167)");
//    });
//    $("a.eStaff").hover(function () {
//        $("li.staffAsset.engineering img").fadeTo("fast", 1);
//        $("li.staffAsset.engineering div.imgWrapper").css("background", "rgb(133, 171, 143)");
//        $("li.staffAsset.engineering div.staffName a").css("color", "rgb(133, 171, 143)");
//        //  $(this).css("color", "rgb(133, 171, 143)");
//    }, function () {
//        $("li.staffAsset.engineering img").fadeTo("fast", 0.8);
//        $("li.staffAsset.engineering div.imgWrapper").css("background", "rgb(224,224,224)");
//        $("ul.staff li div.imgWrapper img").css("opacity", "0.8");
//        $("li.staffAsset.engineering div.staffName a").css("color", "rgb(0, 103, 167)");
//        //  $(this).css("color", "rgb(0, 103, 167)");
//    });
	
//  Create a div to load star icon for key management.
	
	var newDiv = $("<div></div>");
	$("li.staffAsset.management div.imgWrapper").append(newDiv);

//  Team Page click effects.

    $('li.staffAsset').click(function () {
        var staffID = $(this).attr("id");
        openDialog('#descrDialog');
        $('#staffDescr p').load('/wp-content/themes/Akvo-responsive/staffDescr.php #' + staffID);
    });
    $('#descrDialog').find('.ok, .cancel').live('click', function (e) {
		e.stopPropagation(e);
        closeDialog(this);
    }).end().find('.ok').live('click', function () {
        // Clicked Agree!
        console.log('clicked close!');
    }).end().find('.cancel').live('click', function () {
        // Clicked close!
        console.log('clicked close!');
    });
	
//  Team Page click effects NEW VERSION

 /*   $('li.new_staffs, li.new_partners').click(function () {
        var staffID = $(this).attr("id");
		var biog = $(this).find('.staffBiog').html();
		var staffPic = $(this).find('.imgWrapper').html();
		var staffName = $(this).find('.staffName').html();
		var staffTitle = $(this).find('.staffTitle').html();
        openDialog('#descrDialog');
        $('#staffDescr h1.staffName').html( staffName );
        $('#staffDescr p.staffTitle').html( staffTitle );
        $('#staffDescr p.staffBio').html( biog );
        $('#staffDescr .imgWrapper').html( staffPic );
    });
	$('#descrDialog').find('.ok, .cancel').live('click', function (e) {
		e.stopPropagation();
        closeDialog(this);
    }).end().find('.ok').live('click', function () {
        // Clicked Agree!
        console.log('clicked close!');
    }).end().find('.cancel').live('click', function () {
        // Clicked close!
        console.log('clicked close!');
    });
	$('#blanket').click(function() {
			closeDialog('#descrDialog');                        
	});
	$('#partnershipGroup ul').append($('li.partnerships'));
	$('#communicationGroup ul').append($('li.communication-pr'));
	$('#contractorsGroup ul').append($('li.contractors'));
	$('#engineeringGroup ul').append($('li.design-engineering'));
	$('#govGroup ul').append($('li.governments'));
	$('#compsGroup ul').append($('li.companies'));
	$('#founGroup ul').append($('li.foundations'));
	$('#intGovGroup ul').append($('li.inter-governmental'));
	$('#ngoGroup ul').append($('li.ngos'));
	$('#knowledgeGroup ul').append($('li.knowledge-institutes'));
*/

//  Pricing Page click effects.

    $('.priceTab').click(function () {
        openDialog('#priceDialog');
    });
    $('#descrDialog').find('.ok, .cancel').live('click', function () {
        closeDialog(this);
    }).end().find('.ok').live('click', function () {
        // Clicked Agree!
        console.log('clicked close!');
    }).end().find('.cancel').live('click', function () {
        // Clicked close!
        console.log('clicked close!');
    });


//  Partner Page click effects.

    $('li.partnerAsset').click(function () {
        var partnerID = $(this).attr("id");
        openDialog('#descrDialog');
        $('#partnerDescr p').load('/wp-content/themes/Akvo-responsive/partnerDescr.php #' + partnerID);
    });
    $('#descrDialog').find('.ok, .cancel').live('click', function () {
        closeDialog(this);
    }).end().find('.ok').live('click', function () {
        // Clicked Agree!
        console.log('clicked close!');
    }).end().find('.cancel').live('click', function () {
        // Clicked close!
        console.log('clicked close!');
    });
});
	




// 	close on esc press.
	
	var KEYCODE_ESC = 27;
	$(document).keyup(function (e) {
		if (e.keyCode == KEYCODE_ESC) {
			$('.cancel').click();
		}
	});
	
	function openDialog(selector) {
		$(selector).clone().show().appendTo('#overlay').parent().fadeIn('fast');
	}
	
	function closeDialog(selector) {
		$(selector).parents('#overlay').fadeOut('fast', function () {
			$(this).find('.dialog').remove();
		});



}