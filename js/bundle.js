(function ($) {
$(document).ready(function () {
	$(".burger-menu").click(function () {
	  let getClassMenuMobile = $(".menu-mobile-item");
	  let timingStart = 100;
	  let timingEnd = 100;
	  if (!$(".burger-menu").hasClass("active")) {
		$(".mobile-menu").slideDown("medium");
		$(".burger-menu").addClass("active");
		for (let index = 0; index < getClassMenuMobile.length; index++) {
		  timingStart += timingEnd;
		  $(`.menu-mobile-item:eq(${index}) a`).finish().delay(timingStart).animate({ right: "0", opacity: 1 }, 400);
		//   $(`.menu-mobile--buttons:eq(${index}) a`).finish().delay(timingStart).animate({ right: "0", opacity: 1 }, 400);
		}
	  } else {
		for (let index = 0; index < getClassMenuMobile.length; index++) {
		  timingStart += timingEnd;
		  $(`.menu-mobile-item:eq(${index}) a`).finish().delay(timingStart).animate({ right: "-100%", opacity: 0 }, 400);
		//   $(`.menu-mobile--buttons:eq(${index}) a`).finish().delay(timingStart).animate({ right: "-100%", opacity: 0 }, 400);
		}
		$(".burger-menu").removeClass("active");
		$(".mobile-menu").delay(timingStart + 300).slideUp("medium");
	  }
	});
  });

$(document).ready(function(){
    $(".menu-mobile-item").click(function(){
		$(this).find(".sub-menu").slideToggle("medium");
		$(".sub-menu").css("transition", "0");
		$(this).find(".icon-cheveron-down").toggleClass("arrow-rotate");
		$(".icon-cheveron-down").css("transition", "all .3s ease-in-out");
    });

	$(".language").click(function(){
		$(this).find(".sub-menu").slideToggle("medium");
		$(".sub-menu").css("transition", "0");
		$(this).find(".icon-cheveron-down").toggleClass("arrow-rotate");
		$(".icon-cheveron-down").css("transition", "all .3s ease-in-out");
    });
});

function closeInput() {
	if (!$('.search-box--inner').hasClass("active")) {
		$(".close").css({ display: "none" });
	} else {
		$(".close").css({ display: "block" });
	}
}


$(".search").click(function () {
	$('.search-box--inner').addClass("active");
	closeInput();
})


$(".close").click(function () {
	$('.search-box--inner').removeClass("active");
	closeInput();
})

if($(".myTestimonial").length > 0){
	var swiper = new Swiper(".myTestimonial", {
		direction: "vertical",
		loop: true,
		// speed: 500,
		spaceBetween: 30,
		slidesPerView: 1,
		effect: "fade",
	    autoHeight: true,
		navigation: {
		  nextEl: ".swiper-button-next",
		  prevEl: ".swiper-button-prev",
		},
		pagination: {
		  el: ".swiper-pagination",
		  clickable: true,
		},

	});
}

/*Header Slider*/

if($(".myHeader").length > 0){
	var swiper = new Swiper(".myHeader", {
		navigation: {
		  nextEl: ".swiper-button-next",
		  prevEl: ".swiper-button-prev",
		},
	});
}

/*camping-slider*/

if($(".campSlider").length > 0){
  var campingSlider = new Swiper(".campSlider", {
    slidesPerView: 1,
    spaceBetween: 30,
    loop:true,
    breakpoints: {
        992: {
          slidesPerView: 2,
        },
        1200: {
          slidesPerView: 3,
        },
    },
    navigation: {
        nextEl: ".camping--slider .swiper-button-next",
        prevEl: ".camping--slider .swiper-button-prev",
      },
    pagination: {
      el: ".camping--slider .swiper-pagination",
      clickable: true,
    },
  });
}

/*testimonial-location*/

if($(".location-testimonial-slider").length > 0){
	var testimonialLocation = new Swiper(".location-testimonial-slider", {
	    loop:true,
	    speed:400,
	    autoplay: {
	        delay: 8000,
	        disableOnInteraction: false,
	      },
	});
}


if($(".accordion").length > 0){
	$(document).on("click", ".accordion--card-header", function () {
		if (!$(this).hasClass("active")) {
			$(".accordion--card-header.active").removeClass("active");
			$(".accordion--card-body").slideUp("medium");
			$(".paragraph").removeClass("text-Class")
			$(".arrow").removeClass("rotate-arrow")
			$(this).addClass("active");
			$(this).next(".accordion--card-body").slideDown("medium");
			$(this).children(`.paragraph`).addClass("text-Class");
			$(this).children(`.arrow`).addClass("rotate-arrow");
		} else {
			$(this).removeClass("active");
			$(this).next(".accordion--card-body").slideUp("medium");
			$(this).children(`.paragraph`).removeClass("text-Class");
			$(this).children(`.arrow`).removeClass("rotate-arrow");
		}
	});
}

// Tab
$(".topic--box").on("click", function () {
	if (!$(this).hasClass("active")) {
		 let clickedIndex = $(this).index();
		 $(".topic--box.active").removeClass("active");
		 $(this).addClass("active");
		 $(".topic--block.active").fadeOut(0).removeClass("active");
		 $(".topic--block").eq(clickedIndex).fadeIn().addClass("active");
	}
});
})(window.jQuery);
