document.addEventListener("DOMContentLoaded", function() {

	$(".wrap_mnu").click(function () {
		$('.toggle_mnu').toggleClass("on");
		$(".header__wrapper").stop().slideToggle();
		return false;
	})

	$(".fancybox").fancybox({

	});

	$('.work').on('click', function() {
      	$(this).find('.work_arrow').toggleClass('active');
      	$(this).find('.toggle-text').slideToggle('');
    })

    $('.toggle').on('click', function() {
      	$(this).find('.work_arrow').toggleClass('active');
      	$(this).find('.toggle__wrapper').slideToggle('');
    })

    $(".tab_item").not(":first").hide();
	$(".wrapper .tab").click(function() {
	$(".wrapper .tab").removeClass("active").eq($(this).index()).addClass("active");
	$(".tab_item").hide().eq($(this).index()).fadeIn()
	}).eq(0).addClass("active");

  	jQuery(".offer__slider").owlCarousel({
 		loop: false,
 		autoplay: false,
 		autoplayTimeout: 3000,
 		autoplaySpeed: 3000,
 		autoWidth: false,
 		items: 1,
 		nav: true,
 		margin: 3,
 		navText: ['<svg width="42" height="42" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg"><rect x="0.5" y="0.5" width="41" height="41" stroke="white"/><path d="M23 27L17 21L23 15" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>', '<svg width="42" height="42" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg"><rect x="0.5" y="0.5" width="41" height="41" stroke="white"/><path d="M19 15L25 21L19 27" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>'],

  	})

  	jQuery(".sale__slider").owlCarousel({
 		loop: false,
 		autoplay: false,
 		autoplayTimeout: 3000,
 		autoplaySpeed: 3000,
 		autoWidth: false,
 		items: 4.2,
 		nav: true,
 		margin: 12,
 		navText: ['<svg width="42" height="42" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg"><rect x="42" y="42" width="42" height="42" transform="rotate(-180 42 42)" fill="white"/><path d="M19 15L25 21L19 27" stroke="#2F5846" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>','<svg width="42" height="42" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg"><rect x="42" y="42" width="42" height="42" transform="rotate(-180 42 42)" fill="white"/><path d="M19 15L25 21L19 27" stroke="#2F5846" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>'],
  		responsive : {
	    // breakpoint from 0 up
	    0 : {
	       items: 2,
	    },
	    // breakpoint from 480 up
	    480 : {
	       items: 2,
	    },
	    // breakpoint from 768 up
	    768 : {
	       items: 3,
	    },
	    // breakpoint from 768 up
	    1200 : {
	       items: 4.2,
	    }
	}
  	})

	jQuery(".instagram__slider").owlCarousel({
 		loop: true,
 		autoplay: false,
 		center: true,
 		autoplayTimeout: 3000,
 		autoplaySpeed: 3000,
 		autoWidth: false,
 		items: 3.4,
 		nav: true,
 		margin: 12,
 		navText: ['<svg width="42" height="42" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg"><rect x="42" y="42" width="42" height="42" transform="rotate(-180 42 42)" fill="white"/><path d="M19 15L25 21L19 27" stroke="#2F5846" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>','<svg width="42" height="42" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg"><rect x="42" y="42" width="42" height="42" transform="rotate(-180 42 42)" fill="white"/><path d="M19 15L25 21L19 27" stroke="#2F5846" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>'],
  		responsive : {
	    // breakpoint from 0 up
	    0 : {
	       items: 1.4,
	    },
	    // breakpoint from 480 up
	    480 : {
	       items: 1.4,
	    },
	    // breakpoint from 768 up
	    768 : {
	       items: 2.4,
	    },
	    // breakpoint from 768 up
	    1200 : {
	       items: 3.4,
	    }
	}
  	})

	jQuery(".inspiration__slider").owlCarousel({
 		loop: false,
 		autoplay: false,
 		autoplayTimeout: 3000,
 		autoplaySpeed: 3000,
 		autoWidth: false,
 		items: 3,
 		nav: true,
 		dots: false,
 		margin: 0,
 		navText: ['<svg width="42" height="42" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg"><rect x="42" y="42" width="42" height="42" transform="rotate(-180 42 42)" fill="white"/><path d="M19 15L25 21L19 27" stroke="#2F5846" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>','<svg width="42" height="42" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg"><rect x="42" y="42" width="42" height="42" transform="rotate(-180 42 42)" fill="white"/><path d="M19 15L25 21L19 27" stroke="#2F5846" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>'],
  		responsive : {
	    // breakpoint from 0 up
	    0 : {
	       items: 1,
	    },
	    // breakpoint from 480 up
	    480 : {
	       items: 1,
	    },
	    // breakpoint from 768 up
	    768 : {
	       items: 1,
	    },
	    // breakpoint from 768 up
	    1200 : {
	       items: 3,
	    }
	}
  	})

  	jQuery(".product__carousel").owlCarousel({
 		loop: false,
 		autoplay: false,
 		autoplayTimeout: 3000,
 		autoplaySpeed: 3000,
 		autoWidth: false,
 		items: 3,
 		nav: true,
 		dots: false,
 		margin: 20,
 		navText: ['<svg width="42" height="42" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg"><rect x="42" y="42" width="42" height="42" transform="rotate(-180 42 42)" fill="white"/><path d="M19 15L25 21L19 27" stroke="#2F5846" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>','<svg width="42" height="42" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg"><rect x="42" y="42" width="42" height="42" transform="rotate(-180 42 42)" fill="white"/><path d="M19 15L25 21L19 27" stroke="#2F5846" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>'],
  	})
});
