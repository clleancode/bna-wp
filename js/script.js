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

    var checkfrontFallbacks = new WeakMap();
    var checkfrontFallbackShown = false;

    function labelCheckfrontWidgets(root) {
        var widgets = [];

        if (root.matches && root.matches('[id^="CHECKFRONT_WIDGET_"]')) {
            widgets.push(root);
        }
        if (root.querySelectorAll) {
            widgets = widgets.concat(Array.prototype.slice.call(root.querySelectorAll('[id^="CHECKFRONT_WIDGET_"]')));
        }

        widgets.forEach(function (widget) {
            var allWidgets = document.querySelectorAll('[id^="CHECKFRONT_WIDGET_"]');
            var optionNumber = Array.prototype.indexOf.call(allWidgets, widget) + 1;
            var pageHeading = document.querySelector('main h1, h1');
            var context = pageHeading ? pageHeading.textContent.trim() : document.title.trim();
            var optionLabel = allWidgets.length > 1 ? ' - booking option ' + optionNumber : '';
            var loader = widget.querySelector('#CHECKFRONT_LOADER');

            if (loader) {
                loader.setAttribute('role', 'status');
                loader.setAttribute('aria-live', 'polite');
                loader.setAttribute('aria-atomic', 'true');

                if (!checkfrontFallbacks.has(widget) && widget.parentNode) {
                    var fallback = document.createElement('span');
                    fallback.className = 'bna-checkfront-fallback';
                    fallback.setAttribute('role', 'alert');
                    fallback.hidden = true;
                    var bookingFallbackMessage = window.bnaThemeData && window.bnaThemeData.bookingFallbackMessage
                        ? window.bnaThemeData.bookingFallbackMessage
                        : 'Booking is taking longer than expected.';
                    var bookingContactMessage = window.bnaThemeData && window.bnaThemeData.bookingContactMessage
                        ? window.bnaThemeData.bookingContactMessage
                        : 'Contact us for help.';
                    fallback.appendChild(document.createTextNode(bookingFallbackMessage + ' '));

                    var contactLink = document.createElement('a');
                    contactLink.href = window.bnaThemeData && window.bnaThemeData.contactUrl
                        ? window.bnaThemeData.contactUrl
                        : window.location.origin + '/contact/';
                    contactLink.textContent = bookingContactMessage;
                    fallback.appendChild(contactLink);
                    widget.parentNode.insertBefore(fallback, widget.nextSibling);
                    checkfrontFallbacks.set(widget, fallback);
                    var initialLoaderText = loader.textContent.trim();

                    window.setTimeout(function () {
                        if (
                            !checkfrontFallbackShown &&
                            widget.contains(loader) &&
                            loader.textContent.trim() === initialLoaderText
                        ) {
                            checkfrontFallbackShown = true;
                            fallback.hidden = false;
                        }
                    }, 30000);
                }
            }

            widget.querySelectorAll('iframe').forEach(function (frame, frameIndex) {
                if (!frame.hasAttribute('title') || !frame.getAttribute('title').trim()) {
                    var frameLabel = frameIndex ? ' - frame ' + (frameIndex + 1) : '';
                    frame.setAttribute(
                        'title',
                        'Checkfront booking availability for ' + (context || 'this page') + optionLabel + frameLabel
                    );
                }
            });
        });
    }

    labelCheckfrontWidgets(document);

    if (document.body && window.MutationObserver) {
        var checkfrontObserver = new MutationObserver(function (mutations) {
            mutations.forEach(function (mutation) {
                mutation.addedNodes.forEach(function (node) {
                    if (node.nodeType === 1) {
                        labelCheckfrontWidgets(node);
                        var parentWidget = node.closest('[id^="CHECKFRONT_WIDGET_"]');
                        if (parentWidget) {
                            labelCheckfrontWidgets(parentWidget);
                        }
                    }
                });
            });
        });
        checkfrontObserver.observe(document.body, { childList: true, subtree: true });
    }
});

document.addEventListener('submit', function (event) {
    if (event.target.matches('.wpcf7-form')) {
        setContactFormPageUrl(event.target);
    }
}, true);
