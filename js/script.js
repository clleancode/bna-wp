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
        let submenuIndex = 0;
        $(".menu-item-has-children > a").each(function() {
            const $link = $(this);
            const $submenu = $link.siblings(".sub-menu").first();

            if (!$submenu.length) {
                return;
            }

            const submenuId = `bna-submenu-${submenuIndex++}`;
            const parentLabel = $.trim($link.text());
            $submenu.attr("id", submenuId);

            const $toggle = $("<button>", {
                type: "button",
                class: "submenu-toggle",
                "aria-expanded": "false",
                "aria-controls": submenuId,
                "aria-label": "Toggle submenu for " + parentLabel
            }).append(
                $("<span>", {
                    class: "icon-cheveron-down",
                    "aria-hidden": "true"
                })
            );

            $link.after($toggle);
        });

        $(document).on("click", ".submenu-toggle", function(event) {
            event.preventDefault();

            const submenu = document.getElementById(this.getAttribute("aria-controls"));
            if (!submenu) {
                return;
            }

            const expanded = this.getAttribute("aria-expanded") === "true";
            this.setAttribute("aria-expanded", expanded ? "false" : "true");
            $(this).find(".icon-cheveron-down").toggleClass("arrow-rotate", !expanded);
            $(submenu).stop(true, true)[expanded ? "slideUp" : "slideDown"]("medium");
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
        const $searchTrigger = $(".search-box--inner");
        const $searchOverlay = $("#searchOverlay");
        const $searchInput = $searchOverlay.find('input[type="search"]').first();

        function closeSearch() {
            if (!$searchOverlay.is(":visible")) {
                return;
            }

            $searchTrigger.attr("aria-expanded", "false").trigger("focus");
            $searchOverlay.stop(true, true).fadeOut(100, function() {
                $(this).attr("aria-hidden", "true");
            });
        }

        $searchTrigger.on("click", function() {
            $searchOverlay.attr("aria-hidden", "false").stop(true, true).fadeIn(200, function() {
                $searchInput.trigger("focus");
            });
            $searchTrigger.attr("aria-expanded", "true");
        });

        $(".close-btn").on("click", closeSearch);

        $(document).on("keydown", function(event) {
            if (event.key === "Escape") {
                closeSearch();
            }
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
