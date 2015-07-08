// Interaction for akvo.org website.
// Author: loic@akvo.org - 2013

$("document").ready(function() {

    // Fixes the Zooming while scrolling on google map iframe.
    $(document).bind('em_maps_location_hook', function(e, map, infowindow, marker) {
        // Disable scroll zoom on Google Maps
        map.set('scrollwheel', false);
        map.setOptions({
            'scrollwheel': false
        });
    });

    function openDialog(selector) {
        $(selector).clone().show().appendTo('#overlay').parent().fadeIn('fast');
    }

    function closeDialog(selector) {
        $(selector).parents('#overlay').fadeOut('fast', function() {
            $(this).find('.dialog').remove();
        });
    }

    $("div.breadcrumbs").append($("div.projectGateWay"));

    $('.blog #content, .blog .widget-area').wrapAll($('<div>').addClass('blogWrap'));

    // hide #back-top first
    $("#back-top").hide();

    // fade in #back-top
    $(function() {
        $(window).scroll(function() {
            if ($(this).scrollTop() > 100) {
                $('#back-top').fadeIn();
            } else {
                $('#back-top').fadeOut();
            }
        });

        // scroll body to 0px on click
        $('#back-top a').click(function() {
            $('body,html').animate({
                scrollTop: 0
            }, 600);
            return false;
        });

        $(".anchorNav li a").click(function(event) {
            event.preventDefault();
            $('html,body').animate({
                scrollTop: $(this.hash).offset().top
            }, 500);
        });
    });

    //  Team Page click effects NEW VERSION

    $('li.new_staffs, li.new_partners, li.foundation_member').click(function() {
        var biog = $(this).find('.staffBiog').html();
        var staffPic = $(this).find('.imgWrapper').html();
        var staffName = $(this).find('.staffName').html();
        var staffTitle = $(this).find('.staffTitle').html();
        openDialog('#descrDialog');
        $('#staffDescr h1.staffName').html(staffName);
        $('#staffDescr p.staffTitle').html(staffTitle);
        $('#staffDescr p.staffBio').html(biog);
        $('#staffDescr .imgWrapper').html(staffPic);
        return false;
    });
    $('#descrDialog').find('.ok, .cancel').on('click', function(e) {
        e.stopPropagation();
        closeDialog(this);
    });
    $('#blanket').click(function() {
        closeDialog('#descrDialog');
    });


    $('#partnershipGroup ul').append($('li.partnerships'));
    $('#communicationGroup ul').append($('li.communication-pr'));
    $('#contractorsGroup ul').append($('li.contractors'));
    $('#engineeringGroup ul').append($('li.design-engineering'));

    $("#partnershipGroup ul.staff").find('li.newStaff').appendTo("#partnershipGroup ul.staff");
    $("#communicationGroup ul.staff").find('li.newStaff').appendTo("#communicationGroup ul.staff");
    $("#engineeringGroup .staff").find('li.newStaff').appendTo("#engineeringGroup ul.staff");

    $('#govGroup ul').append($('li.governments'));
    $('#compsGroup ul').append($('li.companies'));
    $('#founGroup ul').append($('li.foundations'));
    $('#intGovGroup ul').append($('li.inter-governmental'));
    $('#ngoGroup ul').append($('li.ngos'));
    $('#knowledgeGroup ul').append($('li.knowledge-institutes'));

});


//  close on esc press.

var KEYCODE_ESC = 27;
$(document).keyup(function(e) {
    if (e.keyCode === KEYCODE_ESC) {
        $('.cancel').click();
    }
});