jQuery(document).ready(function() {

    "use strict";

    /* ==================================================
    Custom data attribute
    ================================================== */
    $('*').each(function() {
        var widthAttr = $(this).data('width'),
            heightAttr = $(this).data('height');

        $(this).css({
            "width": widthAttr,
            "height": heightAttr
        });
    });

    $('.bg-image').each(function() {
        var bgSrc = ('url(' + $(this).data("img-src") + ')');
    
        $(this).css("background-image", bgSrc);
    });

    /* ==================================================
    Touch hover fix in iOS
    ================================================== */
    (function(l){var i,s={touchend:function(){}};for(i in s)l.addEventListener(i,s)})(document);

    /* ==================================================
    Bootstrap: Input group custom file customization
    ================================================== */
    $(".input-group").each(function(){
        var $this = $(this),
            inputGroupFileInput = $this.find(".custom-file-input"),
            inputGroupFocusBg = $this.find(".input-focus-bg");

        inputGroupFileInput.blur(function() {
            inputGroupFocusBg.toggleClass("custom-file-focus-bg");
        });
    });

    $(".custom-file-input:disabled").parent(".custom-file").addClass("input-group-file-disabled");

    /* ==================================================
    Bootstrap: Remove text "x" from close utility
    ================================================== */
    $('.close > span').empty();

    /* ==================================================
    Info box hover settings
    ================================================== */
    setTimeout(function(){
        $('.info-box-1').each(function(){
            var infoBoxOneBtn = $(this).find('.info-box-btn'),
                infoBoxOneBtnHeight = infoBoxOneBtn.height();

            infoBoxOneBtn.css("margin-bottom", -infoBoxOneBtnHeight);
        });
        $('.info-box-2').each(function(){
            var infoBoxTwoBtn = $(this).find('.info-box-btn'),
                infoBoxTwoBtnHeight = infoBoxTwoBtn.outerHeight();

            infoBoxTwoBtn.css("margin-bottom", -infoBoxTwoBtnHeight);
        });
        $('.info-box-3').each(function(){
            var infoBoxFourDesc = $(this).find('.info-box-desc'),
                infoBoxFourDescHeight = infoBoxFourDesc.height();

            infoBoxFourDesc.css("margin-bottom", -infoBoxFourDescHeight);
        });
    }, 400);

    /* ==================================================
    In viewport settings
    ================================================== */
    function isScrolledIntoView(element) {
        var docViewTop = $(window).scrollTop(),
            docViewBottom = docViewTop + $(window).height(),
            elementTop = $(element).offset().top,
            elementBottom = elementTop + $(element).height();

        return ((elementBottom > docViewTop) && (elementTop < docViewBottom));
    }

    function animateViewport() {
        $('.add-animate').each(function() {
            var animateType = $(this).attr('data-animated');

            if (isScrolledIntoView(this) === true) {
                $(this).addClass('animated ' + animateType).removeClass('add-animate');
            }
        });
    }
    animateViewport();

    function progressBarViewport() {
        $('.progress-bar').each(function() {
        var progressCount1 = $(this).parent('.progress').prev('.progress-label').find('.progress-count'),
            progressCount2 = $(this).find('.progress-count'),
            progressTitle = $(this).find('.progress-title');

            if (isScrolledIntoView(this) === true) {

                $(this).css('width', function() {
                    return ($(this).attr('aria-valuenow')+'%');
                });

                progressCount1.add(progressCount2).prop('Counter', 0).animate({
                    Counter: progressCount1.add(progressCount2).text()
                }, {
                    duration: 2000,
                    easing: 'swing',
                    step: function (now) {
                        progressCount1.add(progressCount2).text(Math.ceil(now) + '%');
                    }
                }).removeClass("progress-count");

                setTimeout(function(){
                    progressTitle.fadeIn("slow");
                    progressCount2.css('opacity', '1');
                }, 200);
            }
        });
    }
    progressBarViewport();

    function circleProgressViewport() {
        $('.circle-progress').each(function() {
            var circleProgressInnerWidth = $(this).find('.circle-progress-inner').width();

            if (isScrolledIntoView(this) === true) {

                $(this).find('.progress-default.trigger-progress').circleProgress({
                    size: circleProgressInnerWidth,
                    startAngle: -Math.PI / 4 * 3,
                    thickness: 13,
                    lineCap: 'round',
                    emptyFill: "rgba(0, 0, 0, .07)",
                }).on('circle-animation-progress', function(e, p, v) {
                    $(this).find('span').text((v * 100).toFixed());
                });
                
                $(this).find('.progress-light-1.trigger-progress').circleProgress({
                    size: circleProgressInnerWidth,
                    startAngle: -Math.PI / 4 * 3,
                    thickness: 13,
                    lineCap: 'round',
                    emptyFill: "rgba(255, 255, 255, .1)",
                }).on('circle-animation-progress', function(e, p, v) {
                    $(this).find('span').text((v * 100).toFixed());
                });

                $(this).find('.progress-light-2.trigger-progress').circleProgress({
                    size: circleProgressInnerWidth,
                    startAngle: -Math.PI / 4 * 3,
                    thickness: 13,
                    lineCap: 'round',
                    emptyFill: "rgba(255, 255, 255, .15)",
                }).on('circle-animation-progress', function(e, p, v) {
                    $(this).find('span').text((v * 100).toFixed());
                });
                
                $(this).find('.circle-progress-inner').removeClass('trigger-progress');

            }
        });
    }
    circleProgressViewport();

    function counterViewport() {
        $('.num-counter').each(function() {
            if (isScrolledIntoView(this) === true) {

                var countRun = $(this).find('.count-run');

                countRun.prop('Counter', 0).animate({
                    Counter: countRun.text()
                }, {
                    duration: 2000,
                    easing: 'swing',
                    step: function (now) {
                        countRun.text(Math.ceil(now));
                    }
                });
                countRun.removeClass('count-run');

            }
        });
    }
    counterViewport();

    $(window).on("resize scroll", function() {
        animateViewport();
        progressBarViewport();
        circleProgressViewport();
        counterViewport();
    });

    /* ==================================================
    Grid item layout settings
    ================================================== */
    $('.grid-item-layout').each(function() {
        var $grid = $(this),
            gridGutter = $grid.attr('data-gutter'),
            gridLayoutMode = $grid.data('layout-mode');

        $grid.css({
            "margin-left": -gridGutter / 2,
            "margin-right": -gridGutter / 2
        });

        $grid.find('.grid-item').css({
            "margin-bottom": gridGutter / 1,
            "padding-left": gridGutter / 2,
            "padding-right": gridGutter / 2
        });

        var gridItemLayout = $grid.imagesLoaded( function() {
                gridItemLayout.isotope({
                itemSelector: '.grid-item',
                transitionDuration: '0.6s',
                layoutMode: gridLayoutMode
            });
        });
    });

    $('.grid-item-filter').each(function() {
        var $gridFilter = $(this),
            filterBtn = $gridFilter.find('.nav-link'),
            filterTarget = $gridFilter.attr('data-target'),
            gridItemTarget = $(filterTarget);

        filterBtn.on("click", function(e) {
            e.preventDefault();

            filterBtn.removeClass('active');
            $(this).addClass('active');

            var filterValue = $(this).attr('data-filter');
            gridItemTarget.isotope({ filter: filterValue });
        });
    });

    /* ==================================================
    Fancybox settings
    ================================================== */
    $('[data-fancybox]').fancybox({
        loop: true,
        protect: true,
        transitionEffect: "circular",
        transitionDuration: 500
    });

    /* ==================================================
    Carousel component settings
    ================================================== */
    $('.carousel-component').each(function() {
        var carouselComponent = $(this).find('.carousel-component-inner'),
            carouselComponentItem = $(this).find('.carousel-component-item'),
            carouselCustomNav = $(this).next('.carousel-custom-nav'),
            customNavPrev = carouselCustomNav.find('.carousel-control-prev'),
            customNavNext = carouselCustomNav.find('.carousel-control-next'),
            carouselGutter = $(this).data('carousel-gutter'),
            carouselGutterHalf = carouselGutter / 2,
            carouselAutoPlay = $(this).data('autoplay'),
            carouselDots = $(this).data('dots'),
            carouselNav = $(this).data('nav'),
            carouselCol = $(this).data('carousel-col'),
            carouselColSm = $(this).data('carousel-col-sm'),
            carouselColMd = $(this).data('carousel-col-md'),
            carouselColLg = $(this).data('carousel-col-lg'),
            carouselColXl = $(this).data('carousel-col-xl');

        $(this).css({
			"margin-right": -carouselGutterHalf,
			"margin-left": -carouselGutterHalf
        });

        carouselComponentItem.css({
			"padding-right": carouselGutterHalf,
			"padding-left": carouselGutterHalf
        });

        carouselComponent.owlCarousel({
            autoplay: carouselAutoPlay,
            autoplayHoverPause: true,
            smartSpeed: 500,
            loop: true,
            dots: carouselDots,
            nav: carouselNav,
            responsive:{
                0:{
					items:carouselCol
                },
                576:{
					items:carouselColSm
                },
				768:{
					items:carouselColMd
				},
				992:{
					items:carouselColLg
                },
                1280:{
					items:carouselColXl
				}
            }
        });

        customNavPrev.on("click", function(e) {
            e.preventDefault();
            carouselComponent.trigger('prev.owl.carousel', [500]);
        });

        customNavNext.on("click", function(e) {
            e.preventDefault();
            carouselComponent.trigger('next.owl.carousel', [500]);
        });
    });

    /* ==================================================
    Synced gallery settings
    ================================================== */
    $('.gallery-sync').each(function() {
        var gallerySync1 = $(this).find('.gallery-sync-main .owl-carousel'),
            gallerySync2 = $(this).find('.gallery-sync-thumb .owl-carousel'),
            gallerySyncMain = $(this).find('.gallery-sync-main'),
            gallerySyncGutter = $(this).data('gutter'),
            galleryDotsNav = $(this).data('dots'),
            galleryThumb = $(this).attr('data-thumb'),
            galleryThumbSm = $(this).attr('data-thumb-sm'),
            galleryThumbMd = $(this).attr('data-thumb-md'),
            galleryThumbLg = $(this).attr('data-thumb-lg'),
            galleryThumbXl = $(this).attr('data-thumb-xl'),
            flag = false,
            duration = 300;

        gallerySyncMain.css({
			"margin-bottom": gallerySyncGutter
        });

        gallerySync1.owlCarousel({
            items: 1,
            dots: false
        })
        .on('changed.owl.carousel', function(e) {
            var current = e.item.index;
            gallerySync2.find('.owl-item').removeClass('current').eq(current).addClass('current');
            if (!flag) {
                flag = true;
                gallerySync2.trigger('to.owl.carousel', [e.item.index, duration, true]);
                flag = false;
            }
        });

        gallerySync2.owlCarousel({
            margin: gallerySyncGutter,
            dots: galleryDotsNav,
            responsive:{
                0:{
                    items:galleryThumb
                },
                576:{
                    items:galleryThumbSm
                },
                768:{
                    items:galleryThumbMd
                },
                992:{
                    items:galleryThumbLg
                },
                1280:{
                    items:galleryThumbXl
                }
            }
        })
        .on('click', '.owl-item', function() {
            gallerySync1.trigger('to.owl.carousel', [$(this).index(), duration, true]);
        })
        .on('changed.owl.carousel', function(e) {
            if (!flag) {
                flag = true;		
                gallerySync1.trigger('to.owl.carousel', [e.item.index, duration, true]);
                flag = false;
            }
        });

        gallerySync2.find('.owl-item').eq(0).addClass('current');

        var gallerySyncNext = $(this).find('.carousel-control-next'),
            gallerySyncPrev = $(this).find('.carousel-control-prev');

        gallerySyncNext.on("click", function(e) {
            e.preventDefault();
            gallerySync1.trigger('next.owl.carousel', [500]);
        });

        gallerySyncPrev.on("click", function(e){
			e.preventDefault();
			gallerySync1.trigger('prev.owl.carousel', [500]);
        });

        gallerySyncPrev.addClass('nav-hide');

        gallerySync1.on('initialized.owl.carousel changed.owl.carousel refreshed.owl.carousel', function (e) {
            if (!e.namespace) return;

            var carousel = e.relatedTarget,
                current = carousel.current();

            if (current === carousel.maximum()) {
                gallerySyncNext.addClass('nav-hide');
            } else if (current === carousel.minimum()) {
                gallerySyncPrev.addClass('nav-hide');
            } else {
                gallerySyncNext.add(gallerySyncPrev).removeClass('nav-hide');
            }
        });
    });

    /* ==================================================
    Banner slides settings
    ================================================== */
    $('.banner-slides-wrapper').each(function() {
        var bannerSlides = $(this),
            slidesContainer = bannerSlides.find('.banner-slides-container'),
            slideDots = bannerSlides.data('dots'),
            slideNav = bannerSlides.data('nav'),
            slideCustomNav = bannerSlides.find('.carousel-custom-nav'),
            slideNavPrev = slideCustomNav.find('.carousel-control-prev'),
            slideNavNext = slideCustomNav.find('.carousel-control-next');

        slidesContainer.owlCarousel({
            items: 1,
            loop: true,
            dots: slideDots,
            nav: slideNav,
            autoplay: true,
            autoplayTimeout: 7000,
            autoplayHoverPause: false,
            smartSpeed: 500,
            animateOut: 'fadeOut faster',
            mouseDrag: false,
            autoHeight: true
        });

        var slideNavContainer = bannerSlides.find('.owl-nav'),
            slideCustomNavDetach = slideCustomNav.detach();

        slideNavContainer.prepend(slideCustomNavDetach);

        slideNavPrev.on("click", function(e) {
            e.preventDefault();
            slidesContainer.trigger('prev.owl.carousel', [500]);
        });

        slideNavNext.on("click", function(e) {
            e.preventDefault();
            slidesContainer.trigger('next.owl.carousel', [500]);
        });
    });

    /* ==================================================
    Go to top
    ================================================== */
    var goToTop = $('.go-to-top'),
        goToTopLink = goToTop.find('a');

    $(window).on("scroll", function() {
        if ($(this).scrollTop() > 500) {
            goToTop.addClass('go-top-fadeInRight');
        } else {
            goToTop.removeClass('go-top-fadeInRight');
        }
    }).scroll();

    goToTopLink.on("click", function(e) {
        e.preventDefault();
        $('html, body').animate({scrollTop: 0}, 500);
        return false;
    });

});

/* =============================================
Preloader
================================================ */
$(window).on("load", function(){
  $('.preloader-container').fadeOut('slow');
});
