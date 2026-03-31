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

        // ===== Home Slider (Swiper) =====
        if ($(".myHeader").length) {
            var swiper = new Swiper(".myHeader", {
                effect: "fade",
                speed: 800,
                loop: true,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                }
            });
        }

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