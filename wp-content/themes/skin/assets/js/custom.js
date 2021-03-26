jQuery(document).ready(function($) {

	// function for swiper slider (on homepage) to run
	// checks if Swiper function is available before executing
	if (typeof $.fn.Swiper == 'function') {  }
	    var swiper = new Swiper('.swiper-container', {
        pagination: '.swiper-pagination',
        paginationClickable: true,
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        spaceBetween: 0,
        loop: true
    	});
    

	// Back to top 
    var offset = 220,
				duration = 500;

    $(window).scroll(function() {
        if ($(this).scrollTop() > offset) {
            $('.back-to-top').fadeIn(duration);
        } else {
            $('.back-to-top').fadeOut(duration);
        }
    });
    
    $('.back-to-top').click(function(event) {
        event.preventDefault();
        $('html, body').animate({scrollTop: 0}, duration);
        return false;
    })

    // Off Canvas / Sliding Moblie Menu

 	// Calling the function
	$(function() {
	    $('.toggle-nav').click(function() {
	        toggleNavigation();
	    });
	});


	// The toggleNav function itself
	function toggleNavigation() {
	    if ($('#container').hasClass('display-nav')) {
	        // Close Nav
	        $('#container').removeClass('display-nav');
	    } else {
	        // Open Nav
	        $('#container').addClass('display-nav');
	    }
	}


	// SLiding codes
	$("#toggle > li > div").click(function () {
	    if (false == $(this).next().is(':visible')) {
	        $('#toggle ul').slideUp();
	    }

	    var $currIcon=$(this).find("span.the-btn");

	    $("span.the-btn").not($currIcon).addClass('fa-plus').removeClass('fa-minus');

	    $currIcon.toggleClass('fa-minus fa-plus');

	    $(this).next().slideToggle();

	    $("#toggle > li > div").removeClass("active");
	    $(this).addClass('active');
	});


});  
