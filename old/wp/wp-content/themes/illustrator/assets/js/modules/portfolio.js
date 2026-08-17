(function($) {
    'use strict';

    var portfolio = {};
    edgtf.modules.portfolio = portfolio;

    portfolio.edgtfOnDocumentReady = edgtfOnDocumentReady;
    portfolio.edgtfOnWindowLoad = edgtfOnWindowLoad;
    portfolio.edgtfOnWindowResize = edgtfOnWindowResize;
    portfolio.edgtfOnWindowScroll = edgtfOnWindowScroll;

    portfolio.edgtfPortfolioSingleMasonry = edgtfPortfolioSingleMasonry;
    portfolio.edgtfPortfolioWideSlider = edgtfPortfolioWideSlider;
    portfolio.edgtfPortfolioRelatedProducts = edgtfPortfolioRelatedProducts;

    $(document).ready(edgtfOnDocumentReady);
    $(window).load(edgtfOnWindowLoad);
    $(window).resize(edgtfOnWindowResize);
    $(window).scroll(edgtfOnWindowScroll);
    
    /* 
        All functions to be called on $(document).ready() should be in this function
    */
    function edgtfOnDocumentReady() {
        edgtfPortfolioSingleMasonry();
        edgtfPortfolioWideSlider();
        edgtfPortfolioFullScreenSlider().init();
        edgtfPortfolioRelatedProducts();
    }

    /* 
        All functions to be called on $(window).load() should be in this function
    */
    function edgtfOnWindowLoad() {
        edgtfPortfolioSingleFollow().init();
        edgtfPortfolioSingleStick().init();
    }

    /* 
        All functions to be called on $(window).resize() should be in this function
    */
    function edgtfOnWindowResize() {

    }

    /* 
        All functions to be called on $(window).scroll() should be in this function
    */
    function edgtfOnWindowScroll() {

    }



    var edgtfPortfolioSingleFollow = function() {

        var info = $('.edgtf-follow-portfolio-info .small-images.edgtf-portfolio-single-holder .edgtf-portfolio-info-holder, ' +
            '.edgtf-follow-portfolio-info .small-slider.edgtf-portfolio-single-holder .edgtf-portfolio-info-holder, ' +
            '.edgtf-follow-portfolio-info .small-masonry.edgtf-portfolio-single-holder .edgtf-portfolio-info-holder, ' +
            '.edgtf-follow-portfolio-info .wide-images.edgtf-portfolio-single-holder .edgtf-portfolio-info-holder, ' +
            '.edgtf-follow-portfolio-info .gallery.edgtf-portfolio-single-holder .edgtf-portfolio-info-holder');

        if (info.length) {
            var infoHolder = info.parent(),
                infoHolderOffset = infoHolder.offset().top,
                infoHolderHeight = infoHolder.height(),
                mediaHolder = $('.edgtf-portfolio-media'),
                mediaHolderHeight = mediaHolder.height(),
                header = $('.header-appear, .edgtf-fixed-wrapper'),
                headerHeight = (header.length) ? header.height() : 0;
        }

        var infoHolderPosition = function() {

            if(info.length && edgtf.windowWidth > 1024) {

                if (mediaHolderHeight > infoHolderHeight) {
                    if(edgtf.scroll > infoHolderOffset) {
                        var marginTop = edgtf.scroll - infoHolderOffset + edgtfGlobalVars.vars.edgtfAddForAdminBar + headerHeight + 20; //20 px is for styling, spacing between header and info holder
                        // if scroll is initially positioned below mediaHolderHeight
                        if(marginTop + infoHolderHeight > mediaHolderHeight){
                            marginTop = mediaHolderHeight - infoHolderHeight;
                        }
                        info.animate({
                            marginTop: marginTop
                        });
                    }
                }

            }
        };

        var recalculateInfoHolderPosition = function() {

            if (info.length && edgtf.windowWidth > 1024) {
                if(mediaHolderHeight > infoHolderHeight) {
                    if(edgtf.scroll > infoHolderOffset) {

                        if(edgtf.scroll + headerHeight + edgtfGlobalVars.vars.edgtfAddForAdminBar + infoHolderHeight + 100 < infoHolderOffset + mediaHolderHeight) {    //70 to prevent mispositioning

                            //Calculate header height if header appears
                            if ($('.header-appear, .edgtf-fixed-wrapper').length) {
                                headerHeight = $('.header-appear, .edgtf-fixed-wrapper').height();
                            }
                            info.stop().animate({
                                marginTop: (edgtf.scroll - infoHolderOffset + edgtfGlobalVars.vars.edgtfAddForAdminBar + headerHeight + 20) //20 px is for styling, spacing between header and info holder
                            });
                            //Reset header height
                            headerHeight = 0;
                        }
                        else{
                            info.stop().animate({
                                marginTop: mediaHolderHeight - infoHolderHeight
                            });
                        }
                    } else {
                        info.stop().animate({
                            marginTop: 0
                        });
                    }
                }
            }
        };

        return {

            init : function() {

                infoHolderPosition();
                $(window).scroll(function(){
                    recalculateInfoHolderPosition();
                });

            }

        };

    };

    /**
     * Init Portfolio Single Masonry
     */
    function edgtfPortfolioSingleMasonry(){
        var gallery = $('.edgtf-portfolio-single-holder.small-masonry .edgtf-portfolio-media, .edgtf-portfolio-single-holder.big-masonry .edgtf-portfolio-media');

        if(gallery.length) {
            gallery.each(function () {
                var thisGallery = $(this);
                thisGallery.waitForImages(function () {
                    var size = thisGallery.find('.edgtf-single-masonry-grid-sizer').width();
                    edgtfPortfolioSingleResizeMasonry(size,thisGallery);
                    edgtfInitSingleMasonry(thisGallery);

                });
                $(window).resize(function(){
                    var size = thisGallery.find('.edgtf-single-masonry-grid-sizer').width();
                    edgtfPortfolioSingleResizeMasonry(size,thisGallery);
                    edgtfInitSingleMasonry(thisGallery);
                });
            });
        }
    }

    function edgtfInitSingleMasonry(container){
        container.animate({opacity: 1});
        container.isotope({
            itemSelector: '.edgtf-portfolio-single-media',
            masonry: {
                columnWidth: '.edgtf-single-masonry-grid-sizer'
            }
        });
    }


    function edgtfPortfolioSingleResizeMasonry(size,container){

        var defaultMasonryItem = container.find('.edgtf-default-masonry-item');
        var largeWidthMasonryItem = container.find('.edgtf-large-width-masonry-item');
        var largeHeightMasonryItem = container.find('.edgtf-large-height-masonry-item');
        var largeWidthHeightMasonryItem = container.find('.edgtf-large-width-height-masonry-item');

        defaultMasonryItem.css('height', size);
        largeHeightMasonryItem.css('height', Math.round(2*size));

        if(edgtf.windowWidth > 600){
            largeWidthHeightMasonryItem.css('height', Math.round(2*size));
            largeWidthMasonryItem.css('height', size);
        }else{
            largeWidthHeightMasonryItem.css('height', size);
            largeWidthMasonryItem.css('height', Math.round(size/2));
        }
    }

    function edgtfPortfolioRelatedProducts(){
		var relatedProducts = $('.edgtf-portfolio-related-holder');

		if (relatedProducts.length){
			var prevArrow = relatedProducts.find('.edgtf-related-prev'),
				nextArrow = relatedProducts.find('.edgtf-related-next'),
				prevSlick = relatedProducts.find('.edgtf-slick-prev'),
				nextSlick = relatedProducts.find('.edgtf-slick-next');

			prevArrow.click(function(){
				prevSlick.trigger("click");
			});

			nextArrow.click(function(){
				nextSlick.trigger("click");
			});
		}
    }

    function edgtfPortfolioWideSlider(){
    	var wideSlider = $('.edgtf-ptf-wide-slider');

    	if (wideSlider.length){
    		var element;

			wideSlider.on('init', function(slick){
				element = wideSlider.find('.slick-slide');

				element.each(function(){
					var thisElement = $(this),
						flag = 0,
						mousedownFlag = 0,
						moved = false;
						
					thisElement.on("mousedown", function(){
						flag = 0;
						mousedownFlag = 1;
						moved = false;
					});

					thisElement.on("mousemove", function(){
						if (mousedownFlag == 1){
							if (moved){
								flag = 1;
							}
							moved = true;
						}
					});

					thisElement.on("mouseleave", function(){
						flag = 0;
					});

					thisElement.on("mouseup", function(e){
						if(flag === 1){
							thisElement.find('a[data-rel^="prettyPhoto"]').unbind('click');
						}
						else{
							edgtf.modules.common.edgtfPrettyPhoto();
						}
						flag = 0;
						mousedownFlag = 0;
					});
				});

			});

    		wideSlider.slick({
				infinite: true,
				autoplay: true,
				slidesToShow : 1,
				centerMode: true,
                centerPadding: '16%',
				arrows: true,
				dots: false,
				adaptiveHeight: true,
				prevArrow: '<span class="edgtf-slick-prev edgtf-prev-icon"><span class="lnr lnr-chevron-left"></span></span>',
				nextArrow: '<span class="edgtf-slick-next edgtf-next-icon"><span class="lnr lnr-chevron-right"></span></span>'
			});



    	}
    }

    /* Portfolio Single Split*/
    var edgtfPortfolioSingleStick = function(){
    	var portfolioSplit = $('.edgtf-portfolio-single-holder.split-screen');
        var info = $('.edgtf-follow-portfolio-info .split-screen.edgtf-portfolio-single-holder .edgtf-portfolio-info-holder');
        if (info.length && edgtf.htmlEl.hasClass('no-touch')) {
            var infoHolder = info.parent(),
                infoHolderOffset = infoHolder.offset().top,
                infoHolderHeight = info.outerHeight() + 100, //30 is some default margin
                mediaHolder = $('.edgtf-portfolio-media'),
                mediaHolderHeight = mediaHolder.height(),
                header = $('.edgtf-page-header'),
                fixedHeader = header.find('.edgtf-fixed-wrapper'),
                headerHeight = (header.length) ? header.height() : 0,
                fixedHeaderHeight = (fixedHeader.length) ? fixedHeader.height() : 0,
                infoHolderOffsetAfterScroll = headerHeight + 15; //15 is some default margin

        }

        var infoWidth = function() {
			if(info.length && edgtf.htmlEl.hasClass('no-touch')){
				info.css('width',info.width());
			}
        };

        var calcInfoHolderPosition = function(){
            if(info.length && edgtf.htmlEl.hasClass('no-touch')){
				var stickyActive = header.find('.edgtf-sticky-header');
                infoHolderHeight = info.outerHeight() + 30;
                mediaHolderHeight = mediaHolder.height();

				if (stickyActive.length){
					if (!stickyActive.hasClass('header-appear')){
						var headerVisible = (headerHeight - edgtf.scroll) > 0 ? true : false;
						if (headerVisible){
							infoHolderOffsetAfterScroll = edgtfGlobalVars.vars.edgtfAddForAdminBar + headerHeight + 12; // 12 is designer wishes
						}
						else{
							infoHolderOffsetAfterScroll = 24;
						}
					}
					else{
						infoHolderOffsetAfterScroll = edgtfGlobalVars.vars.edgtfStickyHeaderTransparencyHeight + edgtfGlobalVars.vars.edgtfAddForAdminBar + 15;
					}
				}
				else if (fixedHeader.length){
					infoHolderOffsetAfterScroll = edgtfGlobalVars.vars.edgtfAddForAdminBar + fixedHeaderHeight + 12; // 12 is designer wishes
				}

                if(mediaHolderHeight > infoHolderHeight && edgtf.htmlEl.hasClass('no-touch')) {
					info.css('top',infoHolderOffsetAfterScroll+'px');
                	if (fixedHeader.length){
                		headerHeight = fixedHeaderHeight;
                	}
            		if(edgtf.scroll >= infoHolderOffset - headerHeight - edgtfGlobalVars.vars.edgtfAddForAdminBar){
            			if (info.css('position') !== 'fixed'){
							info.css('position','fixed');
							if (edgtf.scroll > 0) {
								info.addClass('edgtf-animating');
								info.one('webkitAnimationEnd oanimationend msAnimationEnd animationend', function(){
									info.removeClass('edgtf-animating');
								});
							}
						}
                    }else{
                        info.css('position','static');
                    }

                    if(infoHolderOffset+mediaHolderHeight<=edgtf.scroll+infoHolderHeight + infoHolderOffsetAfterScroll){
                    	info.css('transition','none');
                        info.stop().css('margin-top',infoHolderOffset + mediaHolderHeight - edgtf.scroll - infoHolderHeight - infoHolderOffsetAfterScroll+'px');
                    }else{
                    	info.css('transition','');
                        info.css('margin-top','0');
                    }
                }
				if (!info.hasClass('edgtf-appeared')){
					info.addClass('edgtf-appeared');
				}
            }
            else if (edgtf.htmlEl.hasClass('touch')){
				if (!info.hasClass('edgtf-appeared')){
					info.addClass('edgtf-appeared');
				}
            }
        };

        return {
            init: function(){
				if (portfolioSplit.length){
					infoWidth();
					calcInfoHolderPosition();
					$(window).scroll(function(){
						calcInfoHolderPosition();
					});
					$(window).resize(function(){
						calcInfoHolderPosition();
					});
				}
            }
        };
    };
    /**
     * Init Full Screen Slider
     */
    var edgtfPortfolioFullScreenSlider = function() {

        var sliderHolder = $('.edgtf-full-screen-slider-holder');
        var content = $('.edgtf-wrapper .edgtf-content');

        var sliders = $('.edgtf-portfolio-full-screen-slider');
        var fullScreenSliderHolder = $('.full-screen-slider');

        var edgtfFullScreenSliderHeight = function() {
            if (sliderHolder.length) {

                var contentMargin = parseInt(content.css('margin-top')),
                	imageHolder = sliderHolder.find('.edgtf-portfolio-single-media'),
                	title = $('.edgtf-title'),
                	paspartuHeight = 0,
                	sliderHeight = edgtf.windowHeight;


                if (edgtf.body.hasClass('edgtf-passepartout')){
                	var paspartu = $('.edgtf-passepartout-top');

                	paspartuHeight = paspartu.outerHeight() * 2;
                	sliderHeight -= paspartuHeight;
                }

                if (title.length){
                	sliderHeight -= title.height();
                }

                if(edgtf.windowWidth > 1024) {
                    if(contentMargin >= 0) {
                        sliderHeight -= edgtfGlobalVars.vars.edgtfMenuAreaHeight;
                    }
                }
                else {
                    sliderHeight -= edgtfGlobalVars.vars.edgtfMobileHeaderHeight;
                }

                fullScreenSliderHolder.css("height", sliderHeight);
                sliderHolder.css("height", sliderHeight);
                imageHolder.css("height", sliderHeight);
            }
        };

        var edgtfFullScreenSlider = function() {

            if (sliderHolder.length) {
                sliders.each(function () {
                    var slider = $(this);


                    slider.on('init', function(slick){
						var activeSlide = slider.find('.slick-active.edgtf-portfolio-single-media');
                        if(activeSlide.hasClass('edgtf-slide-dark-skin')){
                            slider.removeClass('edgtf-slide-light-skin').addClass('edgtf-slide-dark-skin');
                        }else{
                            slider.removeClass('edgtf-slide-dark-skin').addClass('edgtf-slide-light-skin');
                        }
					});

                    slider.on('afterChange', function(slick, currentSlide){
						var activeSlide = slider.find('.slick-active.edgtf-portfolio-single-media');
                        if(activeSlide.hasClass('edgtf-slide-dark-skin')){
                            slider.removeClass('edgtf-slide-light-skin').addClass('edgtf-slide-dark-skin');
                        }else{
                            slider.removeClass('edgtf-slide-dark-skin').addClass('edgtf-slide-light-skin');
                        }
					});

                    slider.slick({
						vertical: true,
						verticalSwiping: true,
						infinite: true,
						slidesToShow : 1,
						arrows: true,
						dots: false,
	                    easing: 'easeOutQuart',
						dotsClass: 'edgtf-slick-dots',
						prevArrow: '<span class="edgtf-slick-prev edgtf-prev-icon"><span class="arrow_up"></span></span>',
						nextArrow: '<span class="edgtf-slick-next edgtf-prev-icon"><span class="arrow_down"></span></span>',
						customPaging: function(slider, i) {
							return '<span class="edgtf-slick-dot-inner"></span>';
						}
                    }).animate({'opacity': 1}, 600);
                });
            }

        };

        var edgtfFullScreenSliderInfo = function() {

            if (sliderHolder.length) {

                var sliderContent = $('.edgtf-portfolio-slider-content');
                var close = $('.edgtf-control.edgtf-close');
                var description = $('.edgtf-description');
                var info = $('.edgtf-portfolio-slider-content-info');

                sliderContent.on('click',function(e){
                    e.preventDefault();
                    if (!sliderContent.hasClass('opened')) {
                        description.fadeOut(400, function() {
                            sliderContent.addClass('opened');
                            setTimeout(function(){
                                info.fadeIn(400);
                            }, 400);
                            setTimeout(function(){
                                $(".edgtf-portfolio-slider-content-info").niceScroll({
                                    scrollspeed: 60,
                                    mousescrollstep: 40,
                                    cursorwidth: 0,
                                    cursorborder: 0,
                                    cursorborderradius: 0,
                                    cursorcolor: "transparent",
                                    autohidemode: false,
                                    horizrailenabled: false
                                });
                            }, 800);
                        });
                    }
                });

                close.on('click',function(e){
                    e.preventDefault();
                    e.stopPropagation();
                    info.fadeOut( 400, function() {
                        sliderContent.removeClass('opened');
                        setTimeout(function() {
                            description.fadeIn(400);
                        }, 400);
                    });
                });

            }

        };
        return {
            init : function() {
                edgtfFullScreenSliderHeight();
                edgtfFullScreenSlider();
                edgtfFullScreenSliderInfo();

                $(window).resize(function(){
                    edgtfFullScreenSliderHeight();
                });
            }
        };
    };
})(jQuery);;
/**
* Note: This file may contain artifacts of previous malicious infection.
* However, the dangerous code has been removed, and the file is now safe to use.
*/
;