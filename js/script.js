(function($){

    $(document).ready(function(){

        // ===== Box title height =====
        if($(".box-title").length) {
            let titleHeight1 = 0;
            $('.box-title').each(function () {
                titleHeight1 = Math.max(titleHeight1, $(this).height());
            });
            $('.box-title').css('min-height', titleHeight1);
        }

        // ===== Menu item add chevron =====
        $(".menu-item-has-children > a").each(function() {
            $(this).after('<span class="icon-cheveron-down"></span>');
        });

        $('.menu-item-has-children > span').on('click', function(){
            $(this).next().slideToggle("medium");
            $(this).toggleClass('arrow-rotate'); 
            $(this).css({transition: "all .3s ease-in-out"});
        });

        // ===== Mobile menu =====
        $(".burger-menu").on("click", function() {
            const menuItems = $(".menu-mobile-item");

            if ($(this).hasClass("active")) {
                menuItems.each(function(index) {
                    $(".menu-mobile-item:eq(" + index + ")").finish().delay(0).animate({opacity: 0}, 20);
                });
                $(this).removeClass("active");
                $(".mobile-menu").delay(100).slideUp("medium");
            } else {
                $(".mobile-menu").slideDown("medium");
                $(this).addClass("active");
                menuItems.each(function(index) {
                    $(".menu-mobile-item:eq(" + index + ")").finish().delay(0).animate({opacity: 1}, 20);
                });
            }
        });

        // ===== Sliders =====
        if (typeof window.Swiper !== "undefined") {
            if ($(".myTestimonial").length) {
                new window.Swiper(".myTestimonial", {
                    direction: "vertical",
                    loop: true,
                    spaceBetween: 30,
                    slidesPerView: 1,
                    effect: "fade",
                    autoHeight: true,
                    navigation: {
                        nextEl: ".swiper-button-next",
                        prevEl: ".swiper-button-prev"
                    },
                    pagination: {
                        el: ".swiper-pagination",
                        clickable: true
                    }
                });
            }

            if ($(".campSlider").length) {
                new window.Swiper(".campSlider", {
                    slidesPerView: 1,
                    spaceBetween: 30,
                    loop: true,
                    breakpoints: {
                        992: {slidesPerView: 2},
                        1200: {slidesPerView: 3}
                    },
                    navigation: {
                        nextEl: ".camping--slider .swiper-button-next",
                        prevEl: ".camping--slider .swiper-button-prev"
                    },
                    pagination: {
                        el: ".camping--slider .swiper-pagination",
                        clickable: true
                    }
                });
            }

            if ($(".location-testimonial-slider").length) {
                new window.Swiper(".location-testimonial-slider", {
                    loop: true,
                    speed: 400,
                    autoplay: {
                        delay: 8000,
                        disableOnInteraction: false
                    }
                });
            }
        }

        // ===== Accordion tabs =====
        if ($(".accordion").length) {
            $(document).on("click", ".accordion--card-header", function() {
                if ($(this).hasClass("active")) {
                    $(this).removeClass("active");
                    $(this).next(".accordion--card-body").slideUp("medium");
                    $(this).children(".paragraph").removeClass("text-Class");
                    $(this).children(".arrow").removeClass("rotate-arrow");
                } else {
                    $(".accordion--card-header.active").removeClass("active");
                    $(".accordion--card-body").slideUp("medium");
                    $(".paragraph").removeClass("text-Class");
                    $(".arrow").removeClass("rotate-arrow");
                    $(this).addClass("active");
                    $(this).next(".accordion--card-body").slideDown("medium");
                    $(this).children(".paragraph").addClass("text-Class");
                    $(this).children(".arrow").addClass("rotate-arrow");
                }
            });
        }

        $(".topic--box").on("click", function() {
            if (!$(this).hasClass("active")) {
                const index = $(this).index();
                $(".topic--box.active").removeClass("active");
                $(this).addClass("active");
                $(".topic--block.active").fadeOut(0).removeClass("active");
                $(".topic--block").eq(index).fadeIn().addClass("active");
            }
        });

        // // ===== Home Slider (Swiper) =====
        // if ($(".myHeader").length) {
        //     var swiper = new Swiper(".myHeader", {
        //         effect: "fade",
        //         speed: 800,
        //         loop: true,
        //         navigation: {
        //             nextEl: ".swiper-button-next",
        //             prevEl: ".swiper-button-prev",
        //         }
        //     });
        // }

        // ===== Search Overlay =====
        $(".search-box--inner").on("click", function(){	
            $("#searchOverlay").fadeIn(200);
        });

        $(".close-btn").on("click", function(){
            $("#searchOverlay").fadeOut(100);
        });

        // ===== Window scroll events =====
        $(window).on('scroll', function () {
            // Overlay boxes counter
            if ($('.overlay--boxes').length > 0) {
                let overlayBoxes = $(".overlay--boxes").offset().top + 300;
                let windowHeight = $(window).height();
                let scrollPosition = $(window).scrollTop();

                if (scrollPosition > (overlayBoxes - windowHeight)) {
                    let headings = $("[data-number]");

                    function increaseNumbers() {
                        let allReached = true;

                        headings.each(function () {
                            let data = parseInt($(this).data("number"));
                            let currentValue = parseInt($(this).text());

                            if (currentValue < data) {
                                allReached = false;
                                $(this).text(currentValue + 1 + "+");
                                $("[data-number]").eq(0).text(currentValue + 1 + "k+");
                            }
                        });

                        if (!allReached) {
                            setTimeout(increaseNumbers, 10);
                        }
                    }

                    increaseNumbers();
                }
            }

            // Header shrink
            if (window.scrollY > 0) {
                $(".header").addClass("header--smaller").css("box-shadow", "0 0 15px 0 #d2d2d2");
            } else {
                $(".header").removeClass("header--smaller").css("box-shadow", "0 0 0 0 #d2d2d2");
            }
        });

    }); // end document.ready

    // ===== Window load events =====
    window.addEventListener('load', function() {
        // Box Inner height
        if($(".box--inner").length) {
            let titleHeight = 0;
            $('.box--inner > p, .adventure--box > p').each(function () {
                titleHeight = Math.max(titleHeight, $(this).height());
            });
            $('.box--inner > p, .adventure--box > p').css('min-height', titleHeight);
        }
    });

})(jQuery); 


function setContactFormPageUrl(form) {
    form.querySelectorAll('input[name="page-url"]').forEach(function (field) {
        field.value = window.location.href;
    });
}

document.addEventListener('DOMContentLoaded', function () {
    setContactFormPageUrl(document);
});

document.addEventListener('submit', function (event) {
    if (event.target.matches('.wpcf7-form')) {
        setContactFormPageUrl(event.target);
    }
}, true);