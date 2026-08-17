(function($) {
    'use strict';

    var shortcodes = {};

    edgtf.modules.shortcodes = shortcodes;

    shortcodes.edgtfInitCounter = edgtfInitCounter;
    shortcodes.edgtfInitProgressBars = edgtfInitProgressBars;
    shortcodes.edgtfInitCountdown = edgtfInitCountdown;
    shortcodes.edgtfInitMessages = edgtfInitMessages;
    shortcodes.edgtfInitMessageHeight = edgtfInitMessageHeight;
    shortcodes.edgtfInitTestimonials = edgtfInitTestimonials;
    shortcodes.edgtfInitCarousels = edgtfInitCarousels;
    shortcodes.edgtfInitPieChart = edgtfInitPieChart;
    shortcodes.edgtfInitPieChartDoughnut = edgtfInitPieChartDoughnut;
    shortcodes.edgtfInitTabs = edgtfInitTabs;
    shortcodes.edgtfInitTabIcons = edgtfInitTabIcons;
    shortcodes.edgtfInitBlogListMasonry = edgtfInitBlogListMasonry;
    shortcodes.edgtfCustomFontResize = edgtfCustomFontResize;
    shortcodes.edgtfInitImageGallery = edgtfInitImageGallery;
    shortcodes.edgtfInitAccordions = edgtfInitAccordions;
    shortcodes.edgtfShowGoogleMap = edgtfShowGoogleMap;
    shortcodes.edgtfInitPortfolioListMasonry = edgtfInitPortfolioListMasonry;
    shortcodes.edgtfInitPortfolioListPinterest = edgtfInitPortfolioListPinterest;
    shortcodes.edgtfInitPortfolio = edgtfInitPortfolio;
    shortcodes.edgtfInitPortfolioMasonryFilter = edgtfInitPortfolioMasonryFilter;
    shortcodes.edgtfInitPortfolioSlider = edgtfInitPortfolioSlider;
    shortcodes.edgtfInitPortfolioLoadMore = edgtfInitPortfolioLoadMore;
    shortcodes.edgtfCheckSliderForHeaderStyle = edgtfCheckSliderForHeaderStyle;
    shortcodes.edgtfCustomFontTypeOut = edgtfCustomFontTypeOut;
    shortcodes.edgtfDevicePresentation = edgtfDevicePresentation;
    shortcodes.edgtfScrollSlider = edgtfScrollSlider;

    shortcodes.edgtfOnDocumentReady = edgtfOnDocumentReady;
    shortcodes.edgtfOnWindowLoad = edgtfOnWindowLoad;
    shortcodes.edgtfOnWindowResize = edgtfOnWindowResize;
    shortcodes.edgtfOnWindowScroll = edgtfOnWindowScroll;

    $(document).ready(edgtfOnDocumentReady);
    $(window).load(edgtfOnWindowLoad);
    $(window).resize(edgtfOnWindowResize);
    $(window).scroll(edgtfOnWindowScroll);

    /* 
        All functions to be called on $(document).ready() should be in this function
    */
    function edgtfOnDocumentReady() {
        edgtfInitCounter();
        edgtfInitProgressBars();
        edgtfInitCountdown();
        edgtfIcon().init();
        edgtfInitMessages();
        edgtfInitMessageHeight();
        edgtfInitTestimonials();
        edgtfInitPieChart();
        edgtfInitPieChartDoughnut();
        edgtfInitTabs();
        edgtfInitTabIcons();
        edgtfButton().init();
        edgtfInitBlogListMasonry();
		edgtfInitBlogSlider();
        edgtfCustomFontResize();
        edgtfInitImageGallery();
        edgtfInitAccordions();
        edgtfShowGoogleMap();
        edgtfInitPortfolioListMasonry();
        edgtfInitPortfolioListPinterest();
        edgtfInitPortfolio();
        edgtfInitPortfolioMasonryFilter();
        edgtfInitPortfolioSlider();
        edgtfInitPortfolioLoadMore();
        edgtfSlider().init();
        edgtfSocialIconWidget().init();
        edgtfInitIconList().init();
	    edgtfInitVerticalSplitSlider();
        edgtfInitCarousels();
        edgtfImageMerge();
        edgtfDevicePresentation();
        edgtfDeviceShowcase();
    }

    /* 
        All functions to be called on $(window).load() should be in this function
    */
    function edgtfOnWindowLoad() {
	    edgtfCustomFontTypeOut();
        edgtfScrollSlider();
        edgtfInitElementsHolderResponsiveStyle();
    }

    /* 
        All functions to be called on $(window).resize() should be in this function
    */
    function edgtfOnWindowResize() {
        edgtfInitBlogListMasonry();
        edgtfCustomFontResize();
        edgtfInitPortfolioListMasonry();
        edgtfInitPortfolioListPinterest();
    }

    /* 
        All functions to be called on $(window).scroll() should be in this function
    */
    function edgtfOnWindowScroll() {
        
    }

    

    /**
     * Counter Shortcode
     */
    function edgtfInitCounter() {

        var counters = $('.edgtf-counter');


        if (counters.length) {
            counters.each(function() {
                var counter = $(this);
                counter.appear(function() {
                    counter.parent().addClass('edgtf-counter-holder-show');

                    //Counter zero type
                    if (counter.hasClass('zero')) {
                        var max = parseFloat(counter.text());
                        counter.countTo({
                            from: 0,
                            to: max,
                            speed: 1500,
                            refreshInterval: 100
                        });
                    } else {
                        counter.absoluteCounter({
                            speed: 2000,
                            fadeInDelay: 1000
                        });
                    }

                },{accX: 0, accY: edgtfGlobalVars.vars.edgtfElementAppearAmount});
            });
        }

    }
    
    /*
    **	Horizontal progress bars shortcode
    */
    function edgtfInitProgressBars(){
        
        var progressBar = $('.edgtf-progress-bar');
        
        if(progressBar.length){
            
            progressBar.each(function() {
                
                var thisBar = $(this);
                
                thisBar.appear(function() {
                    edgtfInitToCounterProgressBar(thisBar);
                    if(thisBar.find('.edgtf-floating.edgtf-floating-inside') !== 0){
                        var floatingInsideMargin = thisBar.find('.edgtf-progress-content').height();
                        floatingInsideMargin += parseFloat(thisBar.find('.edgtf-progress-title-holder').css('padding-bottom'));
                        floatingInsideMargin += parseFloat(thisBar.find('.edgtf-progress-title-holder').css('margin-bottom'));
                        thisBar.find('.edgtf-floating-inside').css('margin-bottom',-(floatingInsideMargin)+'px');
                    }
                    var percentage = thisBar.find('.edgtf-progress-content').data('percentage'),
                        progressContent = thisBar.find('.edgtf-progress-content'),
                        progressNumber = thisBar.find('.edgtf-progress-number');

                    progressContent.css('width', '0%');
                    progressContent.animate({'width': percentage+'%'}, 500);
                    progressNumber.css('left', '0%');
                    progressNumber.animate({'left': percentage+'%'}, 500);

                });
            });
        }
    }

    /*
    **	Counter for horizontal progress bars percent from zero to defined percent
    */
    function edgtfInitToCounterProgressBar(progressBar){
        var percentage = parseFloat(progressBar.find('.edgtf-progress-content').data('percentage'));
        var percent = progressBar.find('.edgtf-progress-number .edgtf-percent');
        if(percent.length) {
            percent.each(function() {
                var thisPercent = $(this);
                thisPercent.parents('.edgtf-progress-number-wrapper').css('opacity', '1');
                thisPercent.countTo({
                    from: 0,
                    to: percentage,
                    speed: 1500,
                    refreshInterval: 50
                });
            });
        }
    }
    
    /*
    **	Function to close message shortcode
    */
    function edgtfInitMessages(){
        var message = $('.edgtf-message');
        if(message.length){
            message.each(function(){
                var thisMessage = $(this);
                thisMessage.find('.edgtf-close').click(function(e){
                    e.preventDefault();
                    $(this).parent().parent().fadeOut(500);
                });
            });
        }
    }
    
    /*
    **	Init message height
    */
    function edgtfInitMessageHeight(){
       var message = $('.edgtf-message.edgtf-with-icon');
       if(message.length){
           message.each(function(){
               var thisMessage = $(this);
               var textHolderHeight = thisMessage.find('.edgtf-message-text-holder').height();
               var iconHolderHeight = thisMessage.find('.edgtf-message-icon-holder').height();
               
               if(textHolderHeight > iconHolderHeight) {
                   thisMessage.find('.edgtf-message-icon-holder').height(textHolderHeight);
               } else {
                   thisMessage.find('.edgtf-message-text-holder').height(iconHolderHeight);
               }
           });
       }
    }

    /**
     * Countdown Shortcode
     */
    function edgtfInitCountdown() {

        var countdowns = $('.edgtf-countdown'),
            year,
            month,
            day,
            hour,
            minute,
            timezone,
            monthLabel,
            dayLabel,
            hourLabel,
            minuteLabel,
            secondLabel;

        if (countdowns.length) {

            countdowns.each(function(){

                //Find countdown elements by id-s
                var countdownId = $(this).attr('id'),
                    countdown = $('#'+countdownId),
                    digitFontSize,
                    labelFontSize;

                //Get data for countdown
                year = countdown.data('year');
                month = countdown.data('month');
                day = countdown.data('day');
                hour = countdown.data('hour');
                minute = countdown.data('minute');
                timezone = countdown.data('timezone');
                monthLabel = countdown.data('month-label');
                dayLabel = countdown.data('day-label');
                hourLabel = countdown.data('hour-label');
                minuteLabel = countdown.data('minute-label');
                secondLabel = countdown.data('second-label');
                digitFontSize = countdown.data('digit-size');
                labelFontSize = countdown.data('label-size');


                //Initialize countdown
                countdown.countdown({
                    until: new Date(year, month - 1, day, hour, minute, 44),
                    labels: ['Years', monthLabel, 'Weeks', dayLabel, hourLabel, minuteLabel, secondLabel],
                    format: 'ODHMS',
                    timezone: timezone,
                    padZeroes: true,
                    onTick: setCountdownStyle
                });

                function setCountdownStyle() {
                    countdown.find('.countdown-amount').css({
                        'font-size' : digitFontSize+'px',
                        'line-height' : digitFontSize+'px'
                    });
                    countdown.find('.countdown-period').css({
                        'font-size' : labelFontSize+'px'
                    });
                }

            });

        }

    }

    /**
     * Object that represents icon shortcode
     * @returns {{init: Function}} function that initializes icon's functionality
     */
    var edgtfIcon = edgtf.modules.shortcodes.edgtfIcon = function() {
        //get all icons on page
        var icons = $('.edgtf-icon-shortcode');

        /**
         * Function that triggers icon animation and icon animation delay
         */
        var iconAnimation = function(icon) {
            if(icon.hasClass('edgtf-icon-animation')) {
                icon.appear(function() {
                    icon.parent('.edgtf-icon-animation-holder').addClass('edgtf-icon-animation-show');
                }, {accX: 0, accY: edgtfGlobalVars.vars.edgtfElementAppearAmount});
            }
        };

        /**
         * Function that triggers icon hover color functionality
         */
        var iconHoverColor = function(icon) {

            var iconElement = icon.find('.edgtf-icon-element');
            var iconElementClone;

            // clone icon element if flip is enabled
            if(icon.parents(".edgtf-iwt").hasClass("edgtf-iwt-flip-enabled-yes")) {
                iconElement.clone().addClass('edgtf-icon-element-clone').appendTo(iconElement.parent());
                iconElementClone = icon.find('.edgtf-icon-element-clone');
                iconElementClone.css("color",hoverColor);
            }

            if (typeof icon.data('hover-color') !== 'undefined') {
                var changeIconColor = function (event) {
                    event.data.icon.css('color', event.data.color);
                };

                var hoverColor = icon.data('hover-color');
                var originalColor = iconElement.css('color');

                // If clone doesn't exist, this variable will be the same as iconElement
                if(!iconElementClone || iconElementClone === undefined){
                    iconElementClone = iconElement;
                }

                if (hoverColor !== '') {
                    icon.on('mouseenter', {icon: iconElementClone, color: hoverColor}, changeIconColor);
                    icon.on('mouseleave', {icon: iconElement, color: originalColor}, changeIconColor);
                }
            }
        };

        /**
         * Function that triggers icon holder background color hover functionality
         */
        var iconHolderBackgroundHover = function(icon) {
            if(typeof icon.data('hover-background-color') !== 'undefined') {
                var changeIconBgColor = function(event) {
                    event.data.icon.css('background-color', event.data.color);
                };

                var hoverBackgroundColor = icon.data('hover-background-color');
                var originalBackgroundColor = icon.css('background-color');

                if(hoverBackgroundColor !== '') {
                    icon.on('mouseenter', {icon: icon, color: hoverBackgroundColor}, changeIconBgColor);
                    icon.on('mouseleave', {icon: icon, color: originalBackgroundColor}, changeIconBgColor);
                }
            }
        };

        /**
         * Function that initializes icon holder border hover functionality
         */
        var iconHolderBorderHover = function(icon) {
            if(typeof icon.data('hover-border-color') !== 'undefined') {
                var changeIconBorder = function(event) {
                    event.data.icon.css('border-color', event.data.color);
                };

                var hoverBorderColor = icon.data('hover-border-color');
                var originalBorderColor = icon.css('border-color');

                if(hoverBorderColor !== '') {
                    icon.on('mouseenter', {icon: icon, color: hoverBorderColor}, changeIconBorder);
                    icon.on('mouseleave', {icon: icon, color: originalBorderColor}, changeIconBorder);
                }
            }
        };

        return {
            init: function() {
                if(icons.length) {
                    icons.each(function() {
                        iconAnimation($(this));
                        iconHoverColor($(this));
                        iconHolderBackgroundHover($(this));
                        iconHolderBorderHover($(this));
                    });

                }
            }
        };
    };

    /**
     * Object that represents social icon widget
     * @returns {{init: Function}} function that initializes icon's functionality
     */
    var edgtfSocialIconWidget = edgtf.modules.shortcodes.edgtfSocialIconWidget = function() {
        //get all social icons on page
        var icons = $('.edgtf-social-icon-widget-holder');

        /**
         * Function that triggers icon hover color functionality
         */
        var socialIconHoverColor = function(icon) {
            if(typeof icon.data('hover-color') !== 'undefined') {
                var changeIconColor = function(event) {
                    event.data.icon.css('color', event.data.color);
                };

                var iconElement = icon;
                var hoverColor = icon.data('hover-color');
                var originalColor = iconElement.css('color');

                if(hoverColor !== '') {
                    icon.on('mouseenter', {icon: iconElement, color: hoverColor}, changeIconColor);
                    icon.on('mouseleave', {icon: iconElement, color: originalColor}, changeIconColor);
                }
            }
        };

        return {
            init: function() {
                if(icons.length) {
                    icons.each(function() {
                        socialIconHoverColor($(this));
                    });

                }
            }
        };
    };

/**
     * Init testimonials shortcode
     */
    function edgtfInitTestimonials() {

        var testimonial = $('.edgtf-testimonials');
        if (testimonial.length) {
            testimonial.each(function () {

                var thisTestimonial = $(this);

                thisTestimonial.appear(function () {
                    thisTestimonial.css('visibility', 'visible');
                }, {accX: 0, accY: edgtfGlobalVars.vars.edgtfElementAppearAmount});

                var auto = true;
                var controlNav = true;
                var directionNav = true;
                var animationSpeed = 800;
                var responsive;
                var slidesToShow = 1;
                var loop = true;

                if (typeof thisTestimonial.data('animation-speed') !== 'undefined' && thisTestimonial.data('animation-speed') !== false) {
                    animationSpeed = thisTestimonial.data('animation-speed');
                }

                if (typeof thisTestimonial.data('dots-navigation') !== 'undefined') {
                    controlNav = thisTestimonial.data('dots-navigation');
                }
                
                if (typeof thisTestimonial.data('arrows-navigation') !== 'undefined') {
                    directionNav = thisTestimonial.data('arrows-navigation');
                }
 
                if (typeof thisTestimonial.data('autoplay') !== 'undefined' && thisTestimonial.data('autoplay') !== 'yes') {
                    auto = 'false';
                }
                
                if (typeof thisTestimonial.data('loop') !== 'undefined' && thisTestimonial.data('loop') !== 'yes') {
                    loop = 'false';
                }

                if (thisTestimonial.hasClass('edgtf-testimonials-type-carousel')) {
                    slidesToShow = 3;

                    responsive = [
                        {
                            breakpoint: 1024,
                            settings: {
                                slidesToShow: 2,
                                slidesToScroll: 1,
                                infinite: true
                            }
                        },
                        {
                            breakpoint: 600,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1
                            }
                        }
                    ];
                }

                thisTestimonial.slick({
                    loop: loop,
                    speed: animationSpeed,
                    infinite: true,
                    autoplay: auto,
                    slidesToShow: slidesToShow,
                    arrows: directionNav,
                    dots: controlNav,
                    dotsClass: 'edgtf-slick-dots',
                    adaptiveHeight: true,
                    easing: 'easeInOutQuart',
                    prevArrow: '<span class="edgtf-slick-prev edgtf-prev-icon"><span class="lnr lnr-chevron-left"></span></span>',
                    nextArrow: '<span class="edgtf-slick-next edgtf-next-icon"><span class="lnr lnr-chevron-right"></span></span>',
                    customPaging: function (slider, i) {
                        return '<span class="edgtf-slick-dot-inner"></span>';
                    },
                    responsive: responsive
                });

            });

        }

    }

    /**
     * Init Carousel shortcode
     */
    function edgtfInitCarousels() {

        var carouselHolders = $('.edgtf-carousel-holder'),
        	inVerticalSplitSlider,
            carousel,
            numberOfItems,
			arrowsNavigation,
			dotsNavigation;

        if (carouselHolders.length) {
            carouselHolders.each(function(){
                carousel = $(this).children('.edgtf-carousel');
                numberOfItems = carousel.data('items');
                arrowsNavigation = (carousel.data('arrows-navigation') == 'yes') ? true : false;
                dotsNavigation = (carousel.data('dots-navigation') == 'yes') ? true : false;

                //Responsive breakpoints

      			carousel.slick({
					infinite: true,
					autoplay: true,
					slidesToShow : numberOfItems,
					arrows: arrowsNavigation,
					dots: dotsNavigation,
					dotsClass: 'edgtf-slick-dots',
					adaptiveHeight: true,
					prevArrow: '<span class="edgtf-slick-prev edgtf-prev-icon"><span class="lnr lnr-chevron-left"></span></span>',
					nextArrow: '<span class="edgtf-slick-next edgtf-next-icon"><span class="lnr lnr-chevron-right"></span></span>',
					customPaging: function(slider, i) {
						return '<span class="edgtf-slick-dot-inner"></span>';
					},
					responsive: [
						{
							breakpoint: 1024,
							settings: {
								slidesToShow: 3,
								slidesToScroll: 1,
								infinite: true,
								dots: true
							}
						},
						{
							breakpoint: 600,
							settings: {
								slidesToShow: 2,
								slidesToScroll: 1
							}
						},
						{
							breakpoint: 480,
							settings: {
								slidesToShow: 1,
								slidesToScroll: 1
							}
						}
					]
				});


			});
        }

    }

    /**
     * Init Pie Chart and Pie Chart With Icon shortcode
     */
    function edgtfInitPieChart() {

        var pieCharts = $('.edgtf-pie-chart-holder, .edgtf-pie-chart-with-icon-holder');

        if (pieCharts.length) {

            pieCharts.each(function () {

                var pieChart = $(this),
                    percentageHolder = pieChart.children('.edgtf-percentage, .edgtf-percentage-with-icon'),
                    barColor = edgtfGlobalVars.vars.edgtfSecondMainColor,
                    trackColor = '#d3d3d3',
                    lineWidth = '2',
                    size = 180;

                if(typeof percentageHolder.data('bar-color') !== 'undefined' && percentageHolder.data('bar-color') !== '') {
                    barColor = percentageHolder.data('bar-color');
                }

                if(typeof percentageHolder.data('track-color') !== 'undefined' && percentageHolder.data('track-color') !== '') {
                    trackColor = percentageHolder.data('track-color');
                }

                percentageHolder.appear(function() {
                    initToCounterPieChart(pieChart);
                    percentageHolder.css('opacity', '1');

                    percentageHolder.easyPieChart({
                        barColor: barColor,
                        trackColor: trackColor,
                        scaleColor: false,
                        lineCap: 'butt',
                        lineWidth: lineWidth,
                        animate: 1500,
                        size: size
                    });
                },{accX: 0, accY: edgtfGlobalVars.vars.edgtfElementAppearAmount});

            });

        }

    }

    /*
     **	Counter for pie chart number from zero to defined number
     */
    function initToCounterPieChart( pieChart ){

        pieChart.css('opacity', '1');
        var counter = pieChart.find('.edgtf-to-counter'),
            max = parseFloat(counter.text());
        counter.countTo({
            from: 0,
            to: max,
            speed: 1500,
            refreshInterval: 50
        });

    }

    /**
     * Init Pie Chart shortcode
     */
    function edgtfInitPieChartDoughnut() {

        var pieCharts = $('.edgtf-pie-chart-doughnut-holder, .edgtf-pie-chart-pie-holder');

        pieCharts.each(function(){

            var pieChart = $(this),
                canvas = pieChart.find('canvas'),
                chartID = canvas.attr('id'),
                chart = document.getElementById(chartID).getContext('2d'),
                data = [],
                jqChart = $(chart.canvas); //Convert canvas to JQuery object and get data parameters

            for (var i = 1; i<=10; i++) {

                var chartItem,
                    value = jqChart.data('value-' + i),
                    color = jqChart.data('color-' + i);
                
                if (typeof value !== 'undefined' && typeof color !== 'undefined' ) {
                    chartItem = {
                        value : value,
                        color : color
                    };
                    data.push(chartItem);
                }

            }

            if (canvas.hasClass('edgtf-pie')) {
                new Chart(chart).Pie(data,
                    {segmentStrokeColor : 'transparent'}
                );
            } else {
                new Chart(chart).Doughnut(data,
                    {segmentStrokeColor : 'transparent'}
                );
            }

        });

    }

    /*
    **	Init tabs shortcode
    */
    function edgtfInitTabs(){

       var tabs = $('.edgtf-tabs');
        if(tabs.length){
            tabs.each(function(){
                var thisTabs = $(this);

                thisTabs.children('.edgtf-tab-container').each(function(index){
                    index = index + 1;
                    var that = $(this),
                        link = that.attr('id'),
                        navItem = that.parent().find('.edgtf-tabs-nav li:nth-child('+index+') a'),
                        navLink = navItem.attr('href');

                        link = '#'+link;

                        if(link.indexOf(navLink) > -1) {
                            navItem.attr('href',link);
                        }
                });

                if(thisTabs.hasClass('edgtf-horizontal-tab')){
                    thisTabs.tabs();
                } else if(thisTabs.hasClass('edgtf-vertical-tab')){
                    thisTabs.tabs().addClass( 'ui-tabs-vertical ui-helper-clearfix' );
                    thisTabs.find('.edgtf-tabs-nav > ul >li').removeClass( 'ui-corner-top' ).addClass( 'ui-corner-left' );
                }
            });
        }
    }

    /*
    **	Generate icons in tabs navigation
    */
    function edgtfInitTabIcons(){

        var tabContent = $('.edgtf-tab-container');
        if(tabContent.length){

            tabContent.each(function(){
                var thisTabContent = $(this);

                var id = thisTabContent.attr('id');
                var icon = '';
                if(typeof thisTabContent.data('icon-html') !== 'undefined' || thisTabContent.data('icon-html') !== 'false') {
                    icon = thisTabContent.data('icon-html');
                }

                var tabNav = thisTabContent.parents('.edgtf-tabs').find('.edgtf-tabs-nav > li > a[href="#'+id+'"]');

                if(typeof(tabNav) !== 'undefined') {
                    tabNav.children('.edgtf-icon-frame').append(icon);
                }
            });
        }
    }

    /**
     * Button object that initializes whole button functionality
     * @type {Function}
     */
    var edgtfButton = edgtf.modules.shortcodes.edgtfButton = function() {
        //all buttons on the page
        var buttons = $('.edgtf-btn');

        /**
         * Initializes button hover color
         * @param button current button
         */
        var buttonHoverColor = function(button) {
            if(typeof button.data('hover-color') !== 'undefined') {
                var changeButtonColor = function(event) {
                    event.data.button.css('color', event.data.color);
                };

                var originalColor = button.css('color');
                var hoverColor = button.data('hover-color');

                button.on('mouseenter', { button: button, color: hoverColor }, changeButtonColor);
                button.on('mouseleave', { button: button, color: originalColor }, changeButtonColor);
            }
        };



        /**
         * Initializes button hover background color
         * @param button current button
         */
        var buttonHoverBgColor = function(button) {
            if(typeof button.data('hover-bg-color') !== 'undefined') {
                var changeButtonBg = function(event) {
                    event.data.button.css('background-color', event.data.color);
                };

                var originalBgColor = button.css('background-color');
                var hoverBgColor = button.data('hover-bg-color');

                button.on('mouseenter', { button: button, color: hoverBgColor }, changeButtonBg);
                button.on('mouseleave', { button: button, color: originalBgColor }, changeButtonBg);
            }
        };

        /**
         * Initializes button border color
         * @param button
         */
        var buttonHoverBorderColor = function(button) {
            if(typeof button.data('hover-border-color') !== 'undefined') {
                var changeBorderColor = function(event) {
                    event.data.button.css('border-color', event.data.color);
                };

                var originalBorderColor = button.css('borderTopColor'); //take one of the four sides
                var hoverBorderColor = button.data('hover-border-color');

                button.on('mouseenter', { button: button, color: hoverBorderColor }, changeBorderColor);
                button.on('mouseleave', { button: button, color: originalBorderColor }, changeBorderColor);
            }
        };

        return {
            init: function() {
                if(buttons.length) {
                    buttons.each(function() {
                        buttonHoverColor($(this));
                        buttonHoverBgColor($(this));
                        buttonHoverBorderColor($(this));
                    });
                }
            }
        };
    };
    
    /*
    **	Init blog list masonry type
    */
    function edgtfInitBlogListMasonry(){
        var blogList = $('.edgtf-blog-list-holder.edgtf-masonry .edgtf-blog-list');
        if(blogList.length) {
            blogList.each(function() {
                var thisBlogList = $(this);
                blogList.waitForImages(function() {
                    thisBlogList.isotope({
                        itemSelector: '.edgtf-blog-list-masonry-item',
                        masonry: {
                            columnWidth: '.edgtf-blog-list-masonry-grid-sizer',
                            gutter: '.edgtf-blog-list-masonry-grid-gutter'
                        }
                    });
                    thisBlogList.addClass('edgtf-appeared');
                });
            });

        }
    }

	/**
	 * Initializes portfolio slider
	 */

	function edgtfInitBlogSlider(){
		var blogSlider = $('.edgtf-blog-slider');
		if(blogSlider.length){
			blogSlider.each(function(){
				var thisBlogSlider = $(this);
				var navigation = false;
				var responsive;
				var slides = 1;

				if (typeof thisBlogSlider.data('type') !== 'undefined' && thisBlogSlider.data('type') !== false && thisBlogSlider.data('type') == 'carousel') {

					responsive = [
						{
							breakpoint: 1024,
							settings: {
								slidesToShow: 2,
								slidesToScroll: 1,
								infinite: true,
								dots: true
							}
						},
						{
							breakpoint: 600,
							settings: {
								slidesToShow: 1,
								slidesToScroll: 1
							}
						}
					];
					slides = 3;
				}

				thisBlogSlider.slick({
                    speed: 200,
					infinite: true,
					autoplay: false,
					slidesToShow : slides,
					arrows: navigation,
					dots: true,
					dotsClass: 'edgtf-slick-dots',
					adaptiveHeight: true,
					prevArrow: '<span class="edgtf-slick-prev edgtf-prev-icon"><span class="lnr lnr-chevron-left"></span></span>',
					nextArrow: '<span class="edgtf-slick-next edgtf-next-icon"><span class="lnr lnr-chevron-right"></span></span>',
					customPaging: function(slider, i) {
						return '<span class="edgtf-slick-dot-inner"></span>';
					},
					responsive: responsive
				});
			});
		}
	}

	/*
	**	Custom Font resizing
	*/
	function edgtfCustomFontResize(){
		var customFont = $('.edgtf-custom-font-holder');
		if (customFont.length){
			customFont.each(function(){
				var thisCustomFont = $(this);
				var fontSize;
				var lineHeight;
				var coef1 = 1;
				var coef2 = 1;

				if (edgtf.windowWidth < 1200){
					coef1 = 0.8;
				}

				if (edgtf.windowWidth < 1000){
					coef1 = 0.7;
				}

				if (edgtf.windowWidth < 768){
					coef1 = 0.6;
					coef2 = 0.7;
				}

				if (edgtf.windowWidth < 600){
					coef1 = 0.5;
					coef2 = 0.6;
				}

				if (edgtf.windowWidth < 480){
					coef1 = 0.4;
					coef2 = 0.5;
				}

				if (typeof thisCustomFont.data('font-size') !== 'undefined' && thisCustomFont.data('font-size') !== false) {
					fontSize = parseInt(thisCustomFont.data('font-size'));

					if (fontSize > 70) {
						fontSize = Math.round(fontSize*coef1);
					}
					else if (fontSize > 35) {
						fontSize = Math.round(fontSize*coef2);
					}

					thisCustomFont.css('font-size',fontSize + 'px');
				}

				if (typeof thisCustomFont.data('line-height') !== 'undefined' && thisCustomFont.data('line-height') !== false) {
					lineHeight = parseInt(thisCustomFont.data('line-height'));

					if (lineHeight > 70 && edgtf.windowWidth < 1200) {
						lineHeight = '1.2em';
					}
					else if (lineHeight > 35 && edgtf.windowWidth < 768) {
						lineHeight = '1.2em';
					}
					else{
						lineHeight += 'px';
					}

					thisCustomFont.css('line-height', lineHeight);
				}
			});
		}
	}

    /*
     **	Show Google Map
     */
    function edgtfShowGoogleMap(){

        if($('.edgtf-google-map').length){
            $('.edgtf-google-map').each(function(){

                var element = $(this);

                var customMapStyle;
                if(typeof element.data('custom-map-style') !== 'undefined') {
                    customMapStyle = element.data('custom-map-style');
                }

                var colorOverlay;
                if(typeof element.data('color-overlay') !== 'undefined' && element.data('color-overlay') !== false) {
                    colorOverlay = element.data('color-overlay');
                }

                var saturation;
                if(typeof element.data('saturation') !== 'undefined' && element.data('saturation') !== false) {
                    saturation = element.data('saturation');
                }

                var lightness;
                if(typeof element.data('lightness') !== 'undefined' && element.data('lightness') !== false) {
                    lightness = element.data('lightness');
                }

                var zoom;
                if(typeof element.data('zoom') !== 'undefined' && element.data('zoom') !== false) {
                    zoom = element.data('zoom');
                }

                var pin;
                if(typeof element.data('pin') !== 'undefined' && element.data('pin') !== false) {
                    pin = element.data('pin');
                }

                var mapHeight;
                if(typeof element.data('height') !== 'undefined' && element.data('height') !== false) {
                    mapHeight = element.data('height');
                }

                var uniqueId;
                if(typeof element.data('unique-id') !== 'undefined' && element.data('unique-id') !== false) {
                    uniqueId = element.data('unique-id');
                }

                var scrollWheel;
                if(typeof element.data('scroll-wheel') !== 'undefined') {
                    scrollWheel = element.data('scroll-wheel');
                }
                var addresses;
                if(typeof element.data('addresses') !== 'undefined' && element.data('addresses') !== false) {
                    addresses = element.data('addresses');
                }

                var map = "map_"+ uniqueId;
                var geocoder = "geocoder_"+ uniqueId;
                var holderId = "edgtf-map-"+ uniqueId;

                edgtfInitializeGoogleMap(customMapStyle, colorOverlay, saturation, lightness, scrollWheel, zoom, holderId, mapHeight, pin,  map, geocoder, addresses);
            });
        }

    }
    /*
     **	Init Google Map
     */
    function edgtfInitializeGoogleMap(customMapStyle, color, saturation, lightness, wheel, zoom, holderId, height, pin,  map, geocoder, data){

        var mapStyles = [
            {
                stylers: [
                    {hue: color },
                    {saturation: saturation},
                    {lightness: lightness},
                    {gamma: 1}
                ]
            }
        ];

        var googleMapStyleId;

        if(customMapStyle){
            googleMapStyleId = 'edgtf-style';
        } else {
            googleMapStyleId = google.maps.MapTypeId.ROADMAP;
        }

        var qoogleMapType = new google.maps.StyledMapType(mapStyles,
            {name: "Edge Google Map"});

        geocoder = new google.maps.Geocoder();
        var latlng = new google.maps.LatLng(-34.397, 150.644);

        if (!isNaN(height)){
            height = height + 'px';
        }

        var myOptions = {

            zoom: zoom,
            scrollwheel: wheel,
            center: latlng,
            zoomControl: true,
            zoomControlOptions: {
                style: google.maps.ZoomControlStyle.SMALL,
                position: google.maps.ControlPosition.RIGHT_CENTER
            },
            scaleControl: false,
            scaleControlOptions: {
                position: google.maps.ControlPosition.LEFT_CENTER
            },
            streetViewControl: false,
            streetViewControlOptions: {
                position: google.maps.ControlPosition.LEFT_CENTER
            },
            panControl: false,
            panControlOptions: {
                position: google.maps.ControlPosition.LEFT_CENTER
            },
            mapTypeControl: false,
            mapTypeControlOptions: {
                mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'edgtf-style'],
                style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
                position: google.maps.ControlPosition.LEFT_CENTER
            },
            mapTypeId: googleMapStyleId
        };

        map = new google.maps.Map(document.getElementById(holderId), myOptions);
        map.mapTypes.set('edgtf-style', qoogleMapType);

        var index;

        for (index = 0; index < data.length; ++index) {
            edgtfInitializeGoogleAddress(data[index], pin, map, geocoder);
        }

        var holderElement = document.getElementById(holderId);
        holderElement.style.height = height;
    }
    /*
     **	Init Google Map Addresses
     */
    function edgtfInitializeGoogleAddress(data, pin,  map, geocoder){
        if (data === '')
            return;
        var contentString = '<div id="content">'+
            '<div id="siteNotice">'+
            '</div>'+
            '<div id="bodyContent">'+
            '<p>'+data+'</p>'+
            '</div>'+
            '</div>';
        var infowindow = new google.maps.InfoWindow({
            content: contentString
        });
        geocoder.geocode( { 'address': data}, function(results, status) {
            if (status === google.maps.GeocoderStatus.OK) {
                map.setCenter(results[0].geometry.location);
                var marker = new google.maps.Marker({
                    map: map,
                    position: results[0].geometry.location,
                    icon:  pin,
                    title: data['store_title']
                });
                google.maps.event.addListener(marker, 'click', function() {
                    infowindow.open(map,marker);
                });

                google.maps.event.addDomListener(window, 'resize', function() {
                    map.setCenter(results[0].geometry.location);
                });

            }
        });
    }

    function edgtfInitAccordions(){
        var accordion = $('.edgtf-accordion-holder');
        if(accordion.length){
            accordion.each(function(){

               var thisAccordion = $(this);

				if(thisAccordion.hasClass('edgtf-accordion')){

					thisAccordion.accordion({
						animate: "easeInOutQuart",
						collapsible: true,
						active: 0,
						icons: "",
						heightStyle: "content"
					});
				}

				if(thisAccordion.hasClass('edgtf-toggle')){

					var toggleAccordion = $(this);
					var toggleAccordionTitle = toggleAccordion.find('.edgtf-title-holder');
					var toggleAccordionContent = toggleAccordionTitle.next();

					toggleAccordion.addClass("accordion ui-accordion ui-accordion-icons ui-widget ui-helper-reset");
					toggleAccordionTitle.addClass("ui-accordion-header ui-state-default ui-corner-top ui-corner-bottom");
					toggleAccordionContent.addClass("ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom").hide();

					toggleAccordionTitle.each(function(){
						var thisTitle = $(this);
						thisTitle.hover(function(){
							thisTitle.toggleClass("ui-state-hover");
						});

						thisTitle.on('click',function(){
							thisTitle.toggleClass('ui-accordion-header-active ui-state-active ui-state-default ui-corner-bottom');
							thisTitle.next().toggleClass('ui-accordion-content-active').slideToggle(400);
						});
					});
				}
            });
        }
    }

    function edgtfInitImageGallery() {

        var galleries = $('.edgtf-image-gallery');

        if (galleries.length) {
            galleries.each(function () {
                var gallery = $(this).children('.edgtf-image-gallery-sliding'),
                    autoplay = gallery.data('autoplay'),
                    animation = (gallery.data('animation') == 'fade'),
                    arrows = (gallery.data('navigation') == 'yes'),
                    dots = (gallery.data('pagination') == 'yes'),
                    slidesToShow = 1,
                    variableWidth = false,
                    centerMode = false,
                    autoplaySpeed,
                    element;


                if (autoplay == 'disable') {
                    autoplay = false;
                } else {
                    autoplaySpeed = autoplay * 1000;
                    autoplay = true;
                }

                if (gallery.hasClass('edgtf-gallery-image-carousel')){
                	variableWidth = true;
                    centerMode = true;
                }

    			gallery.on('init', function(slick){
					element = gallery.find('.slick-slide');

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
								thisElement.find('a').addClass('edgtf-no-link');
								thisElement.find('a[data-rel^="prettyPhoto"]').unbind('click');
							}
							else{
								thisElement.find('a').removeClass('edgtf-no-link');
								edgtf.modules.common.edgtfPrettyPhoto();
							}
							flag = 0;
							mousedownFlag = 0;
						});
					});

				});

                gallery.slick({
					infinite: true,
					autoplay: autoplay,
					autoplaySpeed: autoplaySpeed,
                    speed: 600,
					slidesToShow : slidesToShow,
					fade: animation,
					arrows: arrows,
					dots: dots,
                    easing: 'easeOutQuart',
					dotsClass: 'edgtf-slick-dots',
					adaptiveHeight: false,
					variableWidth: variableWidth,
					centerMode: centerMode,
                    prevArrow: '<span class="edgtf-slick-prev edgtf-prev-icon"><span class="lnr lnr-chevron-left"></span></span>',
                    nextArrow: '<span class="edgtf-slick-next edgtf-next-icon"><span class="lnr lnr-chevron-right"></span></span>',
					customPaging: function(slider, i) {
						return '<span class="edgtf-slick-dot-inner"></span>';
					}
                });
            });
        }

    }
    /**
     * Initializes portfolio list
     */
    function edgtfInitPortfolio(){
        var portList = $('.edgtf-portfolio-list-holder-outer.edgtf-ptf-standard, .edgtf-portfolio-list-holder-outer.edgtf-ptf-gallery, .edgtf-portfolio-list-holder-outer.edgtf-ptf-gallery-with-space');
        if(portList.length){            
            portList.each(function(){
                var thisPortList = $(this);
                thisPortList.waitForImages(function(){
                    edgtfInitPortMixItUp(thisPortList);
                });
            });
        }
    }
    /**
     * Initializes mixItUp function for specific container
     */
    function edgtfInitPortMixItUp(container){
        var filterClass = '';
        if(container.hasClass('edgtf-ptf-has-filter')){
            filterClass = container.find('.edgtf-portfolio-filter-holder-inner ul li').data('class');
            filterClass = '.'+filterClass;
        }
        
        var holderInner = container.find('.edgtf-portfolio-list-holder');
        holderInner.mixItUp({
            callbacks: {
                onMixLoad: function(){
                	holderInner.addClass('edgtf-appeared');
                    holderInner.find('article').css('visibility','visible');
                    holderInner.find('article').css('display','inline-block');
                },
                onMixStart: function(){
                    holderInner.find('article').css('visibility','visible');
                    holderInner.find('article').css('display','inline-block');
                },
                onMixBusy: function(){
                    holderInner.find('article').css('visibility','visible');
                } 
            },           
            selectors: {
                filter: filterClass
            },
            animation: {
                effects: 'fade',
                duration: 600
            }
            
        });
        
    }
     /*
    **	Init portfolio list masonry type
    */
    function edgtfInitPortfolioListMasonry(){
        var portList = $('.edgtf-portfolio-list-holder-outer.edgtf-ptf-masonry');
        if(portList.length) {
            portList.each(function() {
                var thisPortList = $(this).children('.edgtf-portfolio-list-holder');
                var size = thisPortList.find('.edgtf-portfolio-list-masonry-grid-sizer').width();
                edgtfResizeMasonry(size,thisPortList);
                
                edgtfInitMasonry(thisPortList);
                $(window).resize(function(){
                    edgtfResizeMasonry(size,thisPortList);
                    edgtfInitMasonry(thisPortList);
                });
            });
        }
    }
    
    function edgtfInitMasonry(container){
        container.waitForImages(function() {
            container.isotope({
                itemSelector: '.edgtf-portfolio-item',
                masonry: {
                    columnWidth: '.edgtf-portfolio-list-masonry-grid-sizer'
                }
            });
            container.addClass('edgtf-appeared');
        });
    }
    
    function edgtfResizeMasonry(size,container){
        
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
    /**
     * Initializes portfolio pinterest 
     */
    function edgtfInitPortfolioListPinterest(){
        
        var portList = $('.edgtf-portfolio-list-holder-outer.edgtf-ptf-pinterest');
        if(portList.length) {
            portList.each(function() {
                var thisPortList = $(this).children('.edgtf-portfolio-list-holder');
                edgtfInitPinterest(thisPortList);
                $(window).resize(function(){
                     edgtfInitPinterest(thisPortList);
                });
            });
            
        }
    }
    
    function edgtfInitPinterest(container){
        container.waitForImages(function() {
            container.isotope({
                itemSelector: '.edgtf-portfolio-item',
                masonry: {
                    columnWidth: '.edgtf-portfolio-list-masonry-grid-sizer'
                }
            });
        	container.addClass('edgtf-appeared');
        });
        
    }
    /**
     * Initializes portfolio masonry filter
     */
    function edgtfInitPortfolioMasonryFilter(){
        
        var filterHolder = $('.edgtf-portfolio-filter-holder.edgtf-masonry-filter');
        
        if(filterHolder.length){
            filterHolder.each(function(){
               
                var thisFilterHolder = $(this);
                
                var portfolioIsotopeAnimation = null;
                
                var filter = thisFilterHolder.find('ul li').data('class');
                
                thisFilterHolder.find('.filter:first').addClass('current');
                
                thisFilterHolder.find('.filter').click(function(){

                    var currentFilter = $(this);
                    clearTimeout(portfolioIsotopeAnimation);

                    $('.isotope, .isotope .isotope-item').css('transition-duration','0.8s');

                    portfolioIsotopeAnimation = setTimeout(function(){
                        $('.isotope, .isotope .isotope-item').css('transition-duration','0s'); 
                    },700);

                    var selector = $(this).attr('data-filter');
                    thisFilterHolder.siblings('.edgtf-portfolio-list-holder-outer').find('.edgtf-portfolio-list-holder').isotope({ filter: selector });

                    thisFilterHolder.find('.filter').removeClass('current');
                    currentFilter.addClass('current');

                    return false;

                });
                
            });
        }
    }
    /**
     * Initializes portfolio slider
     */
    
    function edgtfInitPortfolioSlider(){
        var portSlider = $('.edgtf-portfolio-list-holder-outer.edgtf-portfolio-slider-holder');
        if(portSlider.length){
            portSlider.each(function(){
                var thisPortSlider = $(this);
                var sliderWrapper = thisPortSlider.children('.edgtf-portfolio-list-holder');
                var numberOfItems = thisPortSlider.data('items');
                var centered = false;
                var navigation = true;
                var dots = true;
                var centerPadding = '';

                if (thisPortSlider.hasClass('edgtf-portfolio-related-holder')){
                	dots = false;
                }

                //Responsive breakpoints
                var responsive =[
						{
							breakpoint: 1024,
							settings: {
								slidesToShow: 3,
							}
						},
						{
							breakpoint: 768,
							settings: {
								slidesToShow: 2,
							}
						},
						{
							breakpoint: 480,
							settings: {
								slidesToShow: 1,
							}
						}
					];
				if (typeof thisPortSlider.data('centered') !== 'undefined' && thisPortSlider.data('centered') !== false){
					centered = thisPortSlider.data('centered') == "yes" ? true : false;
                    centerPadding = '16%';
				}

                sliderWrapper.slick({
					infinite: true,
					autoplay: true,
					autoplaySpeed: 5000,
                    speed: 600,
					slidesToShow : numberOfItems,
					centerMode: centered,
					centerPadding: centerPadding,
					arrows: navigation,
					dots: dots,
                    easing: 'easeOutQuart',
					dotsClass: 'edgtf-slick-dots',
					adaptiveHeight: true,
					prevArrow: '<span class="edgtf-slick-prev edgtf-prev-icon"><span class="lnr lnr-chevron-left"></span></span>',
					nextArrow: '<span class="edgtf-slick-next edgtf-next-icon"><span class="lnr lnr-chevron-right"></span></span>',
					customPaging: function(slider, i) {
						return '<span class="edgtf-slick-dot-inner"></span>';
					},
					responsive: responsive
                });
            });
        }
    }

    function edgtfLoadMoreCallback(size, thisPortList){
		edgtfResizeMasonry(size,thisPortList);
    }
    /**
     * Initializes portfolio load more function
     */
    function edgtfInitPortfolioLoadMore(){
        var portList = $('.edgtf-portfolio-list-holder-outer.edgtf-ptf-show-more');
        if(portList.length){
            portList.each(function(){
                
                var thisPortList = $(this);
                var thisPortListInner = thisPortList.find('.edgtf-portfolio-list-holder');
                var size = thisPortList.find('.edgtf-portfolio-list-masonry-grid-sizer').width();
                var nextPage; 
                var maxNumPages;
                var loadMoreButton = thisPortList.find('.edgtf-ptf-list-load-more a');
                var buttonText = loadMoreButton.children(".edgtf-btn-text");
                
                if (typeof thisPortList.data('max-num-pages') !== 'undefined' && thisPortList.data('max-num-pages') !== false) {  
                    maxNumPages = thisPortList.data('max-num-pages');
                }

                if (thisPortList.hasClass('edgtf-ptf-load-more')){

	                loadMoreButton.on('click', function (e) {
	                    var loadMoreDatta = edgtfGetPortfolioAjaxData(thisPortList);
	                    nextPage = loadMoreDatta.nextPage;
	                    e.preventDefault();
	                    e.stopPropagation();
	                    if(nextPage <= maxNumPages){
	                        var ajaxData = edgtfSetPortfolioAjaxData(loadMoreDatta);
                            buttonText.text(edgtfGlobalVars.vars.edgtfLoadingMoreText);
	                        $.ajax({
	                            type: 'POST',
	                            data: ajaxData,
	                            url: edgtCoreAjaxUrl,
	                            success: function (data) {
	                                nextPage++;
	                                thisPortList.data('next-page', nextPage);
	                                var response = $.parseJSON(data);
	                                var responseHtml = edgtfConvertHTML(response.html); //convert response html into jQuery collection that Mixitup can work with
	                                thisPortList.waitForImages(function(){    
	                                    setTimeout(function() {
	                                        if(thisPortList.hasClass('edgtf-ptf-masonry') || thisPortList.hasClass('edgtf-ptf-pinterest') ){
	                                            thisPortListInner.isotope().append( responseHtml ).isotope( 'appended', responseHtml ,edgtfLoadMoreCallback(size,thisPortList)).isotope('reloadItems');
	                                        } else {
	                                            thisPortListInner.mixItUp('append',responseHtml);
	                                        }
                                            buttonText.text(edgtfGlobalVars.vars.edgtfLoadMoreText);

                                            if(nextPage > maxNumPages){
                                                loadMoreButton.hide();
                                            }
	                                    },600);
	                                });
	                            }
	                        });
	                    }
	                });

				}
				else if (thisPortList.hasClass('edgtf-ptf-infinite-scroll')) {
	            	loadMoreButton.appear(function(e) {
	                    var loadMoreDatta = edgtfGetPortfolioAjaxData(thisPortList);
	                    nextPage = loadMoreDatta.nextPage;
	                    e.preventDefault();
	                    e.stopPropagation();
						loadMoreButton.css('visibility', 'visible');
	                    if(nextPage <= maxNumPages){
	                        var ajaxData = edgtfSetPortfolioAjaxData(loadMoreDatta);
	                        $.ajax({
	                            type: 'POST',
	                            data: ajaxData,
	                            url: edgtCoreAjaxUrl,
	                            success: function (data) {
	                                nextPage++;
	                                thisPortList.data('next-page', nextPage);
	                                var response = $.parseJSON(data);
	                                var responseHtml = edgtfConvertHTML(response.html); //convert response html into jQuery collection that Mixitup can work with
	                                thisPortList.waitForImages(function(){    
	                                    setTimeout(function() {
	                                        if(thisPortList.hasClass('edgtf-ptf-masonry') || thisPortList.hasClass('edgtf-ptf-pinterest') ){
	                                            thisPortListInner.isotope().append( responseHtml ).isotope( 'appended', responseHtml ,edgtfLoadMoreCallback(size,thisPortList)).isotope('reloadItems');
	                                        } else {
	                                            thisPortListInner.mixItUp('append',responseHtml);
	                                        }
	                                        loadMoreButton.css('visibility','hidden');
	                                    },400);
	                                });

                                    if(nextPage > maxNumPages){
                                        setTimeout(function() {
                                            loadMoreButton.fadeOut(400);
                                        }, 400);
                                    }
	                            }
	                        });
	                    }

					},{ one: false, accX: 0, accY: edgtfGlobalVars.vars.edgtfElementAppearAmount});
				}
                
            });
        }
    }
    
    function edgtfConvertHTML ( html ) {
        var newHtml = $.trim( html ),
                $html = $(newHtml ),
                $empty = $();

        $html.each(function ( index, value ) {
            if ( value.nodeType === 1) {
                $empty = $empty.add ( this );
            }
        });

        return $empty;
    }

    /**
     * Initializes portfolio load more data params
     * @param portfolio list container with defined data params
     * return array
     */
    function edgtfGetPortfolioAjaxData(container){
        var returnValue = {};
        
        returnValue.type = '';
        returnValue.columns = '';
        returnValue.gridSize = '';
        returnValue.orderBy = '';
        returnValue.order = '';
        returnValue.number = '';
        returnValue.imageSize = '';
        returnValue.hoverType = '';
        returnValue.filter = '';
        returnValue.filterOrderBy = '';
        returnValue.category = '';
        returnValue.selectedProjectes = '';
        returnValue.showMore = '';
        returnValue.titleTag = '';
        returnValue.nextPage = '';
        returnValue.maxNumPages = '';
        
        if (typeof container.data('type') !== 'undefined' && container.data('type') !== false) {
            returnValue.type = container.data('type');
        }
        if (typeof container.data('grid-size') !== 'undefined' && container.data('grid-size') !== false) {                    
            returnValue.gridSize = container.data('grid-size');
        }
        if (typeof container.data('columns') !== 'undefined' && container.data('columns') !== false) {                    
            returnValue.columns = container.data('columns');
        }
        if (typeof container.data('order-by') !== 'undefined' && container.data('order-by') !== false) {                    
            returnValue.orderBy = container.data('order-by');
        }
        if (typeof container.data('order') !== 'undefined' && container.data('order') !== false) {                    
            returnValue.order = container.data('order');
        }
        if (typeof container.data('number') !== 'undefined' && container.data('number') !== false) {                    
            returnValue.number = container.data('number');
        }
        if (typeof container.data('image-size') !== 'undefined' && container.data('image-size') !== false) {                    
            returnValue.imageSize = container.data('image-size');
        }
        if (typeof container.data('hover-type') !== 'undefined' && container.data('hover-type') !== false) {                    
            returnValue.hoverType = container.data('hover-type');
        }
        if (typeof container.data('filter') !== 'undefined' && container.data('filter') !== false) {                    
            returnValue.filter = container.data('filter');
        }
        if (typeof container.data('filter-order-by') !== 'undefined' && container.data('filter-order-by') !== false) {                    
            returnValue.filterOrderBy = container.data('filter-order-by');
        }
        if (typeof container.data('category') !== 'undefined' && container.data('category') !== false) {                    
            returnValue.category = container.data('category');
        }
        if (typeof container.data('selected-projects') !== 'undefined' && container.data('selected-projects') !== false) {                    
            returnValue.selectedProjectes = container.data('selected-projects');
        }
        if (typeof container.data('show-more') !== 'undefined' && container.data('show-more') !== false) {                    
            returnValue.showMore = container.data('show-more');
        }
        if (typeof container.data('title-tag') !== 'undefined' && container.data('title-tag') !== false) {                    
            returnValue.titleTag = container.data('title-tag');
        }
        if (typeof container.data('next-page') !== 'undefined' && container.data('next-page') !== false) {                    
            returnValue.nextPage = container.data('next-page');
        }
        if (typeof container.data('max-num-pages') !== 'undefined' && container.data('max-num-pages') !== false) {                    
            returnValue.maxNumPages = container.data('max-num-pages');
        }
        return returnValue;
    }
     /**
     * Sets portfolio load more data params for ajax function
     * @param portfolio list container with defined data params
     * return array
     */
    function edgtfSetPortfolioAjaxData(container){
        var returnValue = {
            action: 'edge_cpt_portfolio_ajax_load_more',
            type: container.type,
            columns: container.columns,
            gridSize: container.gridSize,
            orderBy: container.orderBy,
            order: container.order,
            number: container.number,
            imageSize: container.imageSize,
            hoverType: container.hoverType,
            filter: container.filter,
            filterOrderBy: container.filterOrderBy,
            category: container.category,
            selectedProjectes: container.selectedProjectes,
            showMore: container.showMore,
            titleTag: container.titleTag,
            nextPage: container.nextPage
        };
        return returnValue;
    }

	/**
	 * Slider object that initializes whole slider functionality
	 * @type {Function}
	 */
	var edgtfSlider = edgtf.modules.shortcodes.edgtfSlider = function() {

		//all sliders on the page
		var sliders = $('.edgtf-slider .carousel');
		//image regex used to extract img source
		var imageRegex = /url\(["']?([^'")]+)['"]?\)/;


		var setSlideImage = function(slider) {
			slider
				.find('.item .edgtf-image')
				.each(function() {
					var element = $(this);

					if(edgtf.windowWidth <= 600) {
						if (typeof element.data('responsive-phone-image') !== 'undefined' &&  element.data('responsive-phone-image') !== false &&  element.data('responsive-phone-image') !== '' ) {
							element.css('background-image','url('+element.data('responsive-phone-image')+')');
						}

					} else if (edgtf.windowWidth < 800) {
						if (typeof element.data('responsive-tablet-image') !== 'undefined' &&  element.data('responsive-tablet-image') !== false &&  element.data('responsive-tablet-image') !== '' ) {
							element.css('background-image','url('+element.data('responsive-tablet-image')+')');
						}
					} else {
						if (typeof element.data('original-image') !== 'undefined' &&  element.data('original-image') !== false &&  element.data('original-image') !== '' ) {
							var image = element.data('original-image');
							element.css('background-image', 'url(' + image + ')');
						}
					}
				});

		};

		/**
		 * Calculate heights for slider holder and slide item, depending on window width, but only if slider is set to be responsive
		 * @param slider, current slider
		 * @param defaultHeight, default height of slider, set in shortcode
		 * @param responsive_breakpoint_set, breakpoints set for slider responsiveness
		 * @param reset, boolean for reseting heights
		 */
		var setSliderHeight = function(slider, defaultHeight, responsive_breakpoint_set, reset) {
			var sliderHeight = defaultHeight;
			if(!reset) {
				if(edgtf.windowWidth > responsive_breakpoint_set[0]) {
					sliderHeight = defaultHeight;
				} else if(edgtf.windowWidth > responsive_breakpoint_set[1]) {
					sliderHeight = defaultHeight * 0.75;
				} else if(edgtf.windowWidth > responsive_breakpoint_set[2]) {
					sliderHeight = defaultHeight * 0.6;
				} else if(edgtf.windowWidth > responsive_breakpoint_set[3]) {
					sliderHeight = defaultHeight * 0.55;
				} else if(edgtf.windowWidth <= responsive_breakpoint_set[3]) {
					sliderHeight = defaultHeight * 0.45;
				}
			}

			slider.css({'height': (sliderHeight) + 'px'});
			slider.find('.edgtf-slider-preloader').css({'height': (sliderHeight) + 'px'});
			slider.find('.edgtf-slider-preloader .edgtf-ajax-loader').css({'display': 'block'});
			slider.find('.item').css({'height': (sliderHeight) + 'px'});
			if(edgtfPerPageVars.vars.edgtfStickyScrollAmount === 0) {
				edgtf.modules.header.stickyAppearAmount = sliderHeight; //set sticky header appear amount if slider there is no amount entered on page itself
			}
		};

		/**
		 * Calculate heights for slider holder and slide item, depending on window size, but only if slider is set to be full height
		 * @param slider, current slider
		 */
		var setSliderFullHeight = function(slider) {
			var mobileHeaderHeight = edgtf.windowWidth <= 1024 ? edgtfGlobalVars.vars.edgtfMobileHeaderHeight + $('.edgtf-top-bar').height() : 0;
			var passepartoutSlider = edgtf.windowWidth > 1024 ? edgtf.passepartout : 0;
			slider.css({'height': (edgtf.windowHeight - mobileHeaderHeight - passepartoutSlider) + 'px'});
			slider.find('.edgtf-slider-preloader').css({'height': (edgtf.windowHeight - mobileHeaderHeight - passepartoutSlider) + 'px'});
			slider.find('.edgt-slider-preloader .edgtf-ajax-loader').css({'display': 'block'});
			slider.find('.item').css({'height': (edgtf.windowHeight - mobileHeaderHeight - passepartoutSlider) + 'px'});
			if(edgtfPerPageVars.vars.edgtfStickyScrollAmount === 0) {
				edgtf.modules.header.stickyAppearAmount = edgtf.windowHeight; //set sticky header appear amount if slider there is no amount entered on page itself
			}
		};

		var setElementsResponsiveness = function(slider) {
			// Basic text styles responsiveness
			slider
				.find('.edgtf-slide-element-text-small, .edgtf-slide-element-text-normal, .edgtf-slide-element-text-large, .edgtf-slide-element-text-extra-large')
				.each(function() {
					var element = $(this);
					if (typeof element.data('default-font-size') === 'undefined') { element.data('default-font-size', parseInt(element.css('font-size'),10)); }
					if (typeof element.data('default-line-height') === 'undefined') { element.data('default-line-height', parseInt(element.css('line-height'),10)); }
					if (typeof element.data('default-letter-spacing') === 'undefined') { element.data('default-letter-spacing', parseInt(element.css('letter-spacing'),10)); }
				});
			// Advanced text styles responsiveness
			slider.find('.edgtf-slide-element-responsive-text').each(function() {
				if (typeof $(this).data('default-font-size') === 'undefined') { $(this).data('default-font-size', parseInt($(this).css('font-size'),10)); }
				if (typeof $(this).data('default-line-height') === 'undefined') { $(this).data('default-line-height', parseInt($(this).css('line-height'),10)); }
				if (typeof $(this).data('default-letter-spacing') === 'undefined') { $(this).data('default-letter-spacing', parseInt($(this).css('letter-spacing'),10)); }
			});
			// Button responsiveness
			slider.find('.edgtf-slide-element-responsive-button').each(function() {
				var buttonSelector = $(this).find('a');
				if (typeof $(this).data('default-font-size') === 'undefined') { $(this).data('default-font-size', parseInt(buttonSelector.css('font-size'),10)); }
				if (typeof $(this).data('default-line-height') === 'undefined') { $(this).data('default-line-height', parseInt(buttonSelector.css('line-height'),10)); }
				if (typeof $(this).data('default-letter-spacing') === 'undefined') { $(this).data('default-letter-spacing', parseInt(buttonSelector.css('letter-spacing'),10)); }
				if (typeof $(this).data('default-ver-padding') === 'undefined') {
					if (buttonSelector.hasClass('edgtf-btn-solid')) {
						$(this).data('default-ver-padding', parseInt(buttonSelector.find('.edgtf-btn-text').css('padding-top'),10));
					}
					else {
						$(this).data('default-ver-padding', parseInt(buttonSelector.css('padding-top'),10));
					}
				}
				if (typeof $(this).data('default-hor-padding') === 'undefined') {
					if (buttonSelector.hasClass('edgtf-btn-solid')){
						$(this).data('default-hor-padding', parseInt(buttonSelector.find('.edgtf-btn-text').css('padding-left'),10));
					}
					else {
						$(this).data('default-hor-padding', parseInt(buttonSelector.css('padding-left'),10));
					}
				}
			});
			// Margins for non-custom layouts
			slider.find('.edgtf-slide-element').each(function() {
				var element = $(this);
				if (typeof element.data('default-margin-top') === 'undefined') { element.data('default-margin-top', parseInt(element.css('margin-top'),10)); }
				if (typeof element.data('default-margin-bottom') === 'undefined') { element.data('default-margin-bottom', parseInt(element.css('margin-bottom'),10)); }
				if (typeof element.data('default-margin-left') === 'undefined') { element.data('default-margin-left', parseInt(element.css('margin-left'),10)); }
				if (typeof element.data('default-margin-right') === 'undefined') { element.data('default-margin-right', parseInt(element.css('margin-right'),10)); }
			});
			adjustElementsSizes(slider);
		};

		var adjustElementsSizes = function(slider) {
			var boundaries = {
				// These values must match those in map.php (for slider), slider.php and edgt.layout.php
				mobile: 600,
				tabletp: 800,
				tabletl: 1024,
				laptop: 1440
			};
			slider.find('.edgtf-slider-elements-container').each(function() {
				var container = $(this);
				var target = container.filter('.edgtf-custom-elements').add(container.not('.edgtf-custom-elements').find('.edgtf-slider-elements-holder-frame')).not('.edgtf-grid');
				if (target.length) {
					if (boundaries.mobile >= edgtf.windowWidth && container.attr('data-width-mobile').length) {
						target.css('width', container.data('width-mobile') + '%');
					}
					else if (boundaries.tabletp >= edgtf.windowWidth && container.attr('data-width-tablet-p').length) {
						target.css('width', container.data('width-tablet-p') + '%');
					}
					else if (boundaries.tabletl >= edgtf.windowWidth && container.attr('data-width-tablet-l').length) {
						target.css('width', container.data('width-tablet-l') + '%');
					}
					else if (boundaries.laptop >= edgtf.windowWidth && container.attr('data-width-laptop').length) {
						target.css('width', container.data('width-laptop') + '%');
					}
					else if (container.attr('data-width-desktop').length){
						target.css('width', container.data('width-desktop') + '%');
					}
				}
			});
			slider.find('.item').each(function() {
				var slide = $(this);
				var def_w = slide.find('.edgtf-slider-elements-holder-frame').data('default-width');
				var elements = slide.find('.edgtf-slide-element');

				// Adjusting margins for all elements
				elements.each(function() {
					var element = $(this);
					var def_m_top = element.data('default-margin-top'),
						def_m_bot = element.data('default-margin-bottom'),
						def_m_l = element.data('default-margin-left'),
						def_m_r = element.data('default-margin-right');
					var scale_data = (typeof element.data('resp-scale') !== 'undefined') ? element.data('resp-scale') : undefined;
					var factor;

					if (boundaries.mobile >= edgtf.windowWidth) {
						factor = (typeof scale_data === 'undefined') ? edgtf.windowWidth / def_w : parseFloat(scale_data.mobile);
					}
					else if (boundaries.tabletp >= edgtf.windowWidth) {
						factor = (typeof scale_data === 'undefined') ? edgtf.windowWidth / def_w : parseFloat(scale_data.tabletp);
					}
					else if (boundaries.tabletl >= edgtf.windowWidth) {
						factor = (typeof scale_data === 'undefined') ? edgtf.windowWidth / def_w : parseFloat(scale_data.tabletl);
					}
					else if (boundaries.laptop >= edgtf.windowWidth) {
						factor = (typeof scale_data === 'undefined') ? edgtf.windowWidth / def_w : parseFloat(scale_data.laptop);
					}
					else {
						factor = (typeof scale_data === 'undefined') ? edgtf.windowWidth / def_w : parseFloat(scale_data.desktop);
					}

					element.css({
						'margin-top': Math.round(factor * def_m_top )+ 'px',
						'margin-bottom': Math.round(factor * def_m_bot )+ 'px',
						'margin-left': Math.round(factor * def_m_l )+ 'px',
						'margin-right': Math.round(factor * def_m_r) + 'px'
					});
				});

				// Adjusting responsiveness
				elements
					.filter('.edgtf-slide-element-responsive-text, .edgtf-slide-element-responsive-button, .edgtf-slide-element-responsive-image')
					.add(elements.find('a.edgtf-slide-element-responsive-text, span.edgtf-slide-element-responsive-text'))
					.each(function() {
						var element = $(this);
						var scale_data = (typeof element.data('resp-scale') !== 'undefined') ? element.data('resp-scale') : undefined,
							left_data = (typeof element.data('resp-left') !== 'undefined') ? element.data('resp-left') : undefined,
							top_data = (typeof element.data('resp-top') !== 'undefined') ? element.data('resp-top') : undefined;
						var factor, new_left, new_top;

						if (boundaries.mobile >= edgtf.windowWidth) {
							factor = (typeof scale_data === 'undefined') ? edgtf.windowWidth / def_w : parseFloat(scale_data.mobile);
							new_left = (typeof left_data === 'undefined') ? (typeof element.data('left') !== 'undefined' ? element.data('left')+'%' : '') : (left_data.mobile != '' ? left_data.mobile+'%' : element.data('left')+'%');
							new_top = (typeof top_data === 'undefined') ? (typeof element.data('top') !== 'undefined' ? element.data('top')+'%' : '') : (top_data.mobile != '' ? top_data.mobile+'%' : element.data('top')+'%');
						}
						else if (boundaries.tabletp >= edgtf.windowWidth) {
							factor = (typeof scale_data === 'undefined') ? edgtf.windowWidth / def_w : parseFloat(scale_data.tabletp);
							new_left = (typeof left_data === 'undefined') ? (typeof element.data('left') !== 'undefined' ? element.data('left')+'%' : '') : (left_data.tabletp != '' ? left_data.tabletp+'%' : element.data('left')+'%');
							new_top = (typeof top_data === 'undefined') ? (typeof element.data('top') !== 'undefined' ? element.data('top')+'%' : '') : (top_data.tabletp != '' ? top_data.tabletp+'%' : element.data('top')+'%');
						}
						else if (boundaries.tabletl >= edgtf.windowWidth) {
							factor = (typeof scale_data === 'undefined') ? edgtf.windowWidth / def_w : parseFloat(scale_data.tabletl);
							new_left = (typeof left_data === 'undefined') ? (typeof element.data('left') !== 'undefined' ? element.data('left')+'%' : '') : (left_data.tabletl != '' ? left_data.tabletl+'%' : element.data('left')+'%');
							new_top = (typeof top_data === 'undefined') ? (typeof element.data('top') !== 'undefined' ? element.data('top')+'%' : '') : (top_data.tabletl != '' ? top_data.tabletl+'%' : element.data('top')+'%');
						}
						else if (boundaries.laptop >= edgtf.windowWidth) {
							factor = (typeof scale_data === 'undefined') ? edgtf.windowWidth / def_w : parseFloat(scale_data.laptop);
							new_left = (typeof left_data === 'undefined') ? (typeof element.data('left') !== 'undefined' ? element.data('left')+'%' : '') : (left_data.laptop != '' ? left_data.laptop+'%' : element.data('left')+'%');
							new_top = (typeof top_data === 'undefined') ? (typeof element.data('top') !== 'undefined' ? element.data('top')+'%' : '') : (top_data.laptop != '' ? top_data.laptop+'%' : element.data('top')+'%');
						}
						else {
							factor = (typeof scale_data === 'undefined') ? edgtf.windowWidth / def_w : parseFloat(scale_data.desktop);
							new_left = (typeof left_data === 'undefined') ? (typeof element.data('left') !== 'undefined' ? element.data('left')+'%' : '') : (left_data.desktop != '' ? left_data.desktop+'%' : element.data('left')+'%');
							new_top = (typeof top_data === 'undefined') ? (typeof element.data('top') !== 'undefined' ? element.data('top')+'%' : '') : (top_data.desktop != '' ? top_data.desktop+'%' : element.data('top')+'%');
						}

						if (!factor) {
							element.hide();
						}
						else {
							element.show();
							var def_font_size,
								def_line_h,
								def_let_spac,
								def_ver_pad,
								def_hor_pad,
								buttonSelector;

							if (element.is('.edgtf-slide-element-responsive-button')) {
								def_font_size = element.data('default-font-size');
								def_line_h = element.data('default-line-height');
								def_let_spac = element.data('default-letter-spacing');
								def_ver_pad = element.data('default-ver-padding');
								def_hor_pad = element.data('default-hor-padding');
								buttonSelector = element.find('.edgtf-btn');

								element.css({
										'left': new_left,
										'top': new_top
									});

								buttonSelector.css({
									'font-size': Math.round(factor * def_font_size) + 'px',
									'line-height': Math.round(factor * def_line_h) + 'px',
									'letter-spacing': Math.round(factor * def_let_spac) + 'px'
								});

								if (buttonSelector.hasClass('edgtf-btn-solid')){

									buttonSelector.find('.edgtf-btn-text').css({
										'padding-left': Math.round(factor * def_hor_pad) + 'px',
										'padding-right': Math.round(factor * def_hor_pad) + 'px',
										'padding-top': Math.round(factor * def_ver_pad) + 'px',
										'padding-bottom': Math.round(factor * def_ver_pad) + 'px'
									});
								}
								else{
									buttonSelector.css({
										'padding-left': Math.round(factor * def_hor_pad) + 'px',
										'padding-right': Math.round(factor * def_hor_pad) + 'px',
										'padding-top': Math.round(factor * def_ver_pad) + 'px',
										'padding-bottom': Math.round(factor * def_ver_pad) + 'px'
									});
								}
							}
							else if (element.is('.edgtf-slide-element-responsive-image')) {
								if (factor != edgtf.windowWidth / def_w) { // if custom factor has been set for this screen width
									var up_w = element.data('upload-width'),
										up_h = element.data('upload-height');

									element.filter('.custom-image').css({
											'left': new_left,
											'top': new_top
										})
										.add(element.not('.custom-image').find('img'))
										.css({
											'width': Math.round(factor * up_w) + 'px',
											'height': Math.round(factor * up_h) + 'px'
										});
								}
								else {
									var w = element.data('width');

									element.filter('.custom-image').css({
											'left': new_left,
											'top': new_top
										})
										.add(element.not('.custom-image').find('img'))
										.css({
											'width': w + '%',
											'height': ''
										});
								}
							}
							else {
								def_font_size = element.data('default-font-size');
								def_line_h = element.data('default-line-height');
								def_let_spac = element.data('default-letter-spacing');

								element.css({
									'left': new_left,
									'top': new_top,
									'font-size': Math.round(factor * def_font_size) + 'px',
									'line-height': Math.round(factor * def_line_h) + 'px',
									'letter-spacing': Math.round(factor * def_let_spac) + 'px'
								});
							}
						}
					});
			});
			var nav = slider.find('.carousel-indicators');
			slider.find('.edgtf-slide-element-section-link').css('bottom', nav.length ? parseInt(nav.css('bottom'),10) + nav.outerHeight() + 10 + 'px' : '20px');
		};

		var checkButtonsAlignment = function(slider) {
			slider.find('.item').each(function() {
				var inline_buttons = $(this).find('.edgtf-slide-element-button-inline');
				inline_buttons.css('display', 'inline-block').wrapAll('<div class="edgtf-slide-elements-buttons-wrapper" style="text-align: ' + inline_buttons.eq(0).css('text-align') + ';"/>');
			});
		};

		/**
		 * Set heights for slider and elemnts depending on slider settings (full height, responsive height od set height)
		 * @param slider, current slider
		 */
		var setHeights =  function(slider) {

			var responsiveBreakpointSet = [1600,1200,900,650,500,320];

			setElementsResponsiveness(slider);

			if(slider.hasClass('edgtf-full-screen')){

				setSliderFullHeight(slider);

				$(window).resize(function() {
					setSliderFullHeight(slider);
					adjustElementsSizes(slider);
				});

			}else if(slider.hasClass('edgtf-responsive-height')){

				var defaultHeight = slider.data('height');
				setSliderHeight(slider, defaultHeight, responsiveBreakpointSet, false);

				$(window).resize(function() {
					setSliderHeight(slider, defaultHeight, responsiveBreakpointSet, false);
					adjustElementsSizes(slider);
				});

			}else {
				var defaultHeight = slider.data('height');

				slider.find('.edgtf-slider-preloader').css({'height': (slider.height()) + 'px'});
				slider.find('.edgtf-slider-preloader .edgtf-ajax-loader').css({'display': 'block'});

				edgtf.windowWidth < 1000 ? setSliderHeight(slider, defaultHeight, responsiveBreakpointSet, false) : setSliderHeight(slider, defaultHeight, responsiveBreakpointSet, true);

				$(window).resize(function() {
					if(edgtf.windowWidth < 1000){
						setSliderHeight(slider, defaultHeight, responsiveBreakpointSet, false);
					}else{
						setSliderHeight(slider, defaultHeight, responsiveBreakpointSet, true);
					}
					adjustElementsSizes(slider);
				});
			}
		};

		var setSlideBackgroundImage =  function(slider) {

			setSlideImage(slider);

			$(window).resize(function() {
				setSlideImage(slider);
			});

		};

		/**
		 * Set prev/next numbers on navigation arrows
		 * @param slider, current slider
		 * @param currentItem, current slide item index
		 * @param totalItemCount, total number of slide items
		 */
		var setPrevNextNumbers = function(slider, currentItem, totalItemCount) {
			if(currentItem == 1){
				slider.find('.left.carousel-control .prev').html(totalItemCount);
				slider.find('.right.carousel-control .next').html(currentItem + 1);
			}else if(currentItem == totalItemCount){
				slider.find('.left.carousel-control .prev').html(currentItem - 1);
				slider.find('.right.carousel-control .next').html(1);
			}else{
				slider.find('.left.carousel-control .prev').html(currentItem - 1);
				slider.find('.right.carousel-control .next').html(currentItem + 1);
			}
		};

		/**
		 * Set video background size
		 * @param slider, current slider
		 */
		var initVideoBackgroundSize = function(slider){
			var min_w = 1500; // minimum video width allowed
			var video_width_original = 1920;  // original video dimensions
			var video_height_original = 1080;
			var vid_ratio = 1920/1080;

			slider.find('.item .edgtf-video .edgtf-video-wrap').each(function(){

				var slideWidth = edgtf.windowWidth;
				var slideHeight = $(this).closest('.carousel').height();

				$(this).width(slideWidth);

				min_w = vid_ratio * (slideHeight+20);
				$(this).height(slideHeight);

				var scale_h = slideWidth / video_width_original;
				var scale_v = (slideHeight - edgtfGlobalVars.vars.edgtfMenuAreaHeight) / video_height_original;
				var scale =  scale_v;
				if (scale_h > scale_v)
					scale =  scale_h;
				if (scale * video_width_original < min_w) {scale = min_w / video_width_original;}

				$(this).find('video, .mejs-overlay, .mejs-poster').width(Math.ceil(scale * video_width_original +2));
				$(this).find('video, .mejs-overlay, .mejs-poster').height(Math.ceil(scale * video_height_original +2));
				$(this).scrollLeft(($(this).find('video').width() - slideWidth) / 2);
				$(this).find('.mejs-overlay, .mejs-poster').scrollTop(($(this).find('video').height() - slideHeight) / 2);
				$(this).scrollTop(($(this).find('video').height() - slideHeight) / 2);
			});
		};

		/**
		 * Init video background
		 * @param slider, current slider
		 */
		var initVideoBackground = function(slider) {
			$('.item .edgtf-video-wrap .edgtf-video-element').mediaelementplayer({
				enableKeyboard: false,
				iPadUseNativeControls: false,
				pauseOtherPlayers: false,
				// force iPhone's native controls
				iPhoneUseNativeControls: false,
				// force Android's native controls
				AndroidUseNativeControls: false
			});

			initVideoBackgroundSize(slider);
			$(window).resize(function() {
				initVideoBackgroundSize(slider);
			});

			//mobile check
			if(navigator.userAgent.match(/(Android|iPod|iPhone|iPad|IEMobile|Opera Mini)/)){
				$('.edgtf-slider .edgtf-mobile-video-image').show();
				$('.edgtf-slider .edgtf-video-wrap').remove();
			}
		};

		var initPeek = function(slider) {
			if (slider.hasClass('edgtf-slide-peek')) {

				var navArrowHover = function(arrow, entered) {
					var dir = arrow.is('.left') ? 'left' : 'right';
					var targ_peeker = peekers.filter('.'+dir);
					if (entered) {
						arrow.addClass('hovered');
						var targ_item = (items.index(items.filter('.active')) + (dir=='left' ? -1 : 1) + items.length) % items.length;
						targ_peeker.find('.edgtf-slider-peeker-inner').css({
							'background-image': items.eq(targ_item).find('.edgtf-image, .edgtf-mobile-video-image').css('background-image'),
							'width': itemWidth + 'px'
						});
						targ_peeker.addClass('shown');
					}
					else {
						arrow.removeClass('hovered');
						peekers.removeClass('shown');
					}
				};

				var navBulletHover = function(bullet, entered) {
					if (entered) {
						bullet.addClass('hovered');

						var targ_item = bullet.data('slide-to');
						var cur_item = items.index(items.filter('.active'));
						if (cur_item != targ_item) {
							var dir = (targ_item < cur_item) ? 'left' : 'right';
							var targ_peeker = peekers.filter('.'+dir);
							targ_peeker.find('.edgtf-slider-peeker-inner').css({
								'background-image': items.eq(targ_item).find('.edgtf-image, .edgtf-mobile-video-image').css('background-image'),
								'width': itemWidth + 'px'
							});
							targ_peeker.addClass('shown');
						}
					}
					else {
						bullet.removeClass('hovered');
						peekers.removeClass('shown');
					}
				};

				var handleResize = function() {
					itemWidth = items.filter('.active').width();
					itemWidth += (itemWidth % 2) ? 1 : 0; // To make it even
					items.children('.edgtf-image, .edgtf-video').css({
						'position': 'absolute',
						'width': itemWidth + 'px',
						'height': '110%',
						'left': '50%',
						'transform': 'translateX(-50%)'
					});
				};

				var items = slider.find('.item');
				var itemWidth;
				handleResize();
				$(window).resize(handleResize);

				slider.find('.carousel-inner').append('<div class="edgtf-slider-peeker left"><div class="edgtf-slider-peeker-inner"></div></div><div class="edgtf-slider-peeker right"><div class="edgtf-slider-peeker-inner"></div></div>');
				var peekers = slider.find('.edgtf-slider-peeker');
				var nav_arrows = slider.find('.carousel-control');
				var nav_bullets = slider.find('.carousel-indicators > li');

				nav_arrows
					.hover(
						function() {
							navArrowHover($(this), true);
						},
						function() {
							navArrowHover($(this), false);
						}
					);

				nav_bullets
					.hover(
						function() {
							navBulletHover($(this), true);
						},
						function() {
							navBulletHover($(this), false);
						}
					);

				slider.on('slide.bs.carousel', function() {
					setTimeout(function() {
						peekers.addClass('edgtf-slide-peek-in-progress').removeClass('shown');
					}, 500);
				});

				slider.on('slid.bs.carousel', function() {
					nav_arrows.filter('.hovered').each(function() {
						navArrowHover($(this), true);
					});
					setTimeout(function() {
						nav_bullets.filter('.hovered').each(function() {
							navBulletHover($(this), true);
						});
					}, 200);
					peekers.removeClass('edgtf-slide-peek-in-progress');
				});
			}
		};

		var updateNavigationThumbs = function(slider) {
			if (slider.hasClass('edgtf-slider-thumbs')) {
				var src, prev_image, next_image;
				var all_items_count = slider.find('.item').length;
				var curr_item = slider.find('.item').index($('.item.active')[0]) + 1;
				setPrevNextNumbers(slider, curr_item, all_items_count);

				// prev thumb
				if(slider.find('.item.active').prev('.item').length){
					if(slider.find('.item.active').prev('div').find('.edgtf-image').length){
						src = imageRegex.exec(slider.find('.active').prev('div').find('.edgtf-image').attr('style'));
						prev_image = new Image();
						prev_image.src = src[1];
						//prev_image = '<div class="thumb-image" style="background-image: url('+src[1]+')"></div>';
					}else{
						prev_image = slider.find('.active').prev('div').find('> .edgtf-video').clone();
						prev_image.find('.edgtf-video-overlay, .mejs-offscreen').remove();
						prev_image.find('.edgtf-video-wrap').width(150).height(84);
						prev_image.find('.mejs-container').width(150).height(84);
						prev_image.find('video').width(150).height(84);
					}
					slider.find('.left.carousel-control .img .old').fadeOut(300,function(){
						$(this).remove();
					});
					slider.find('.left.carousel-control .img').append(prev_image).find('div.thumb-image, > img, div.edgtf-video').fadeIn(300).addClass('old');

				}else{
					if(slider.find('.carousel-inner .item:last-child .edgtf-image').length){
						src = imageRegex.exec(slider.find('.carousel-inner .item:last-child .edgtf-image').attr('style'));
						prev_image = new Image();
						prev_image.src = src[1];
						//prev_image = '<div class="thumb-image" style="background-image: url('+src[1]+')"></div>';
					}else{
						prev_image = slider.find('.carousel-inner .item:last-child > .edgtf-video').clone();
						prev_image.find('.edgtf-video-overlay, .mejs-offscreen').remove();
						prev_image.find('.edgtf-video-wrap').width(150).height(84);
						prev_image.find('.mejs-container').width(150).height(84);
						prev_image.find('video').width(150).height(84);
					}
					slider.find('.left.carousel-control .img .old').fadeOut(300,function(){
						$(this).remove();
					});
					slider.find('.left.carousel-control .img').append(prev_image).find('div.thumb-image, > img, div.edgtf-video').fadeIn(300).addClass('old');
				}

				// next thumb
				if(slider.find('.active').next('div.item').length){
					if(slider.find('.active').next('div').find('.edgtf-image').length){
						src = imageRegex.exec(slider.find('.active').next('div').find('.edgtf-image').attr('style'));
						next_image = new Image();
						next_image.src = src[1];
						//next_image = '<div class="thumb-image" style="background-image: url('+src[1]+')"></div>';
					}else{
						next_image = slider.find('.active').next('div').find('> .edgtf-video').clone();
						next_image.find('.edgtf-video-overlay, .mejs-offscreen').remove();
						next_image.find('.edgtf-video-wrap').width(150).height(84);
						next_image.find('.mejs-container').width(150).height(84);
						next_image.find('video').width(150).height(84);
					}

					slider.find('.right.carousel-control .img .old').fadeOut(300,function(){
						$(this).remove();
					});
					slider.find('.right.carousel-control .img').append(next_image).find('div.thumb-image, > img, div.edgtf-video').fadeIn(300).addClass('old');

				}else{
					if(slider.find('.carousel-inner .item:first-child .edgtf-image').length){
						src = imageRegex.exec(slider.find('.carousel-inner .item:first-child .edgtf-image').attr('style'));
						next_image = new Image();
						next_image.src = src[1];
						//next_image = '<div class="thumb-image" style="background-image: url('+src[1]+')"></div>';
					}else{
						next_image = slider.find('.carousel-inner .item:first-child > .edgtf-video').clone();
						next_image.find('.edgtf-video-overlay, .mejs-offscreen').remove();
						next_image.find('.edgtf-video-wrap').width(150).height(84);
						next_image.find('.mejs-container').width(150).height(84);
						next_image.find('video').width(150).height(84);
					}
					slider.find('.right.carousel-control .img .old').fadeOut(300,function(){
						$(this).remove();
					});
					slider.find('.right.carousel-control .img').append(next_image).find('div.thumb-image, > img, div.edgtf-video').fadeIn(300).addClass('old');
				}
			}
		};

		var initSliderPlayVideo = function(slider) {

			//if(slider.find('.item:first-child video').length > 0) {
			var allVideos = slider.find('.edgtf-video');
			allVideos.each(function () {
				var videoItem = $(this);
				if (!videoItem.parents('.active').length) {
					var nextVideo = videoItem.find('video.edgtf-video-element').attr('id');
					$('#' + nextVideo).get(0).pause();
					$('#' + nextVideo).get(0).currentTime = 0;
				}
			});
			if (slider.find('.active .edgtf-video').length) {
				var nextVideo = slider.find('.active .edgtf-video video.edgtf-video-element').attr('id');
				$('#' + nextVideo).get(0).play();
			}
			//}
		};

		/**
		 * initiate slider
		 * @param slider, current slider
		 * @param currentItem, current slide item index
		 * @param totalItemCount, total number of slide items
		 * @param slideAnimationTimeout, timeout for slide change
		 */
		var initiateSlider = function(slider, totalItemCount, slideAnimationTimeout) {

			//set active class on first item
			slider.find('.carousel-inner .item:first-child').addClass('active');
			//check for header style
			edgtfCheckSliderForHeaderStyle($('.carousel .active'), slider.hasClass('edgtf-header-effect'));

			// setting numbers on carousel controls
			if(slider.hasClass('edgtf-slider-numbers')) {
				setPrevNextNumbers(slider, 1, totalItemCount);
			}
			// set video background if there is video slide
			if(slider.find('.item video').length){
				//initVideoBackgroundSize(slider);
				initVideoBackground(slider);
				initSliderPlayVideo(slider);
			}

			// update thumbs
			updateNavigationThumbs(slider);

			// initiate peek
			initPeek(slider);

			// enable link hover color for slide elements with links
			slider.find('.edgtf-slide-element-wrapper-link')
				.mouseenter(function() {
					$(this).removeClass('inheriting');
				})
				.mouseleave(function() {
					$(this).addClass('inheriting');
				})
			;

			//init slider
			if(slider.hasClass('edgtf-auto-start')){
				slider.carousel({
					interval: slideAnimationTimeout,
					pause: false
				});

			} else {
				slider.carousel({
					interval: 0,
					pause: false
				});
			}

			$(window).scroll(function() {
				if(slider.hasClass('edgtf-full-screen') && edgtf.scroll > edgtf.windowHeight && edgtf.windowWidth > 1000){
					slider.carousel('pause');
				}else if(!slider.hasClass('edgtf-full-screen') && edgtf.scroll > slider.height() && edgtf.windowWidth > 1000){
					slider.carousel('pause');
				}else{
					slider.carousel('cycle');
				}
			});


		};

		return {
			init: function() {
				if(sliders.length) {
					sliders.each(function() {
						var $this = $(this);
						var slideAnimationTimeout = $this.data('slide_animation_timeout');
						var totalItemCount = $this.find('.item').length;
						setSlideBackgroundImage($this);
						checkButtonsAlignment($this);

						setHeights($this);

						/*** wait until first video or image is loaded and than initiate slider - start ***/
						if(edgtf.htmlEl.hasClass('touch')){
							if($this.find('.item:first-child .edgtf-mobile-video-image').length > 0){
								var src = imageRegex.exec($this.find('.item:first-child .edgtf-mobile-video-image').attr('style'));
							}else{
								var src = imageRegex.exec($this.find('.item:first-child .edgtf-image').attr('style'));
							}
							if(src) {
								var backImg = new Image();
								backImg.src = src[1];
								$(backImg).load(function(){
									$('.edgtf-slider-preloader').fadeOut(500);
									initiateSlider($this,totalItemCount,slideAnimationTimeout);
								});
							}
						} else {
							if($this.find('.item:first-child video').length > 0){
								$this.find('.item:first-child video').eq(0).one('loadeddata',function(){
									$('.edgtf-slider-preloader').fadeOut(500);
									initiateSlider($this,totalItemCount,slideAnimationTimeout);
								});
							}else{
								var src = imageRegex.exec($this.find('.item:first-child .edgtf-image').attr('style'));
								if (src) {
									var backImg = new Image();
									backImg.src = src[1];
									$(backImg).load(function(){
										$('.edgtf-slider-preloader').fadeOut(500);
										initiateSlider($this,totalItemCount,slideAnimationTimeout);
										setTimeout(function(){
											$this.find('.active').addClass('edgtf-animate-slide-image');
										},250);
									});
								}
							}
						}
						/*** wait until first video or image is loaded and than initiate slider - end ***/

						/* before slide transition - start */
						$this.on('slide.bs.carousel', function () {
							$this.addClass('edgtf-in-progress');
							$this.find('.active .edgtf-slider-elements-holder-frame, .active .edgtf-slide-element-section-link').fadeTo(250,0);
						});

						/* before slide transition - end */

						/* after slide transition - start */
						$this.on('slid.bs.carousel', function () {

							$this.removeClass('edgtf-in-progress');
							$this.find('.active .edgtf-slider-elements-holder-frame, .active .edgtf-slide-element-section-link').fadeTo(0,1);
							if($this.find('.item video').length){
								initSliderPlayVideo($this);
							}
							setTimeout(function(){
								$this.find('.item:not(.active)').removeClass('edgtf-animate-slide-image');
								$this.find('.item.active').addClass('edgtf-animate-slide-image');
							},250);

							// setting numbers on carousel controls
							if($this.hasClass('edgtf-slider-numbers')) {
								var currentItem = $('.item').index($('.item.active')[0]) + 1;
								setPrevNextNumbers($this, currentItem, totalItemCount);
							}

							// setting thumbnails on navigation controls
							if($this.hasClass('edgtf-slider-thumbs')) {
								updateNavigationThumbs($this);
							}
						});
						/* after slide transition - end */

						/* swipe functionality - start */
						$this.swipe( {
							swipeLeft: function(){ $this.carousel('next'); },
							swipeRight: function(){ $this.carousel('prev'); },
							threshold:20
						});
						/* swipe functionality - end */

					});

					//adding parallax functionality on slider
					if($('.no-touch .carousel').length){
						var skrollr_slider = skrollr.init({
							smoothScrolling: false,
							forceHeight: false
						});
						skrollr_slider.refresh();
					}

					$(window).scroll(function(){
						//set control class for slider in order to change header style
						if($('.edgtf-slider .carousel').height() < edgtf.scroll){
							$('.edgtf-slider .carousel').addClass('edgtf-disable-slider-header-style-changing');
						}else{
							$('.edgtf-slider .carousel').removeClass('edgtf-disable-slider-header-style-changing');
							edgtfCheckSliderForHeaderStyle($('.edgtf-slider .carousel .active'),$('.edgtf-slider .carousel').hasClass('edgtf-header-effect'));
						}

						//hide slider when it is out of viewport
						if($('.edgtf-slider .carousel').hasClass('edgtf-full-screen') && edgtf.scroll > edgtf.windowHeight && edgtf.windowWidth > 1000){
							$('.edgtf-slider .carousel').find('.carousel-inner, .carousel-indicators').hide();
						}else if(!$('.edgtf-slider .carousel').hasClass('edgtf-full-screen') && edgtf.scroll > $('.edgtf-slider .carousel').height() && edgtf.windowWidth > 1000){
							$('.edgtf-slider .carousel').find('.carousel-inner, .carousel-indicators').hide();
						}else{
							$('.edgtf-slider .carousel').find('.carousel-inner, .carousel-indicators').show();
						}
					});
				}
			}
		};
	};

    /**
     * Check if slide effect on header style changing
     * @param slide, current slide
     * @param headerEffect, flag if slide
     */

    function edgtfCheckSliderForHeaderStyle(slide, headerEffect) {

        if($('.edgtf-slider .carousel').not('.edgtf-disable-slider-header-style-changing').length > 0) {

	        var slideHeaderStyle = "";
	        var slideSliderStyle = "";
	        if (slide.hasClass('light')) {
		        slideHeaderStyle = 'edgtf-light-header';
		        slideSliderStyle = 'edgtf-light-slider';
	        }
	        if (slide.hasClass('dark')) {
		        slideHeaderStyle = 'edgtf-dark-header';
		        slideSliderStyle = 'edgtf-dark-slider';
	        }

	        if (slideHeaderStyle !== "") {
		        if (headerEffect) {
			        edgtf.body.removeClass('edgtf-dark-header edgtf-light-header').addClass(slideHeaderStyle);
		        } else {
			        edgtf.body.removeClass('edgtf-dark-slider edgtf-light-slider').addClass(slideSliderStyle);
		        }
	        } else {
		        if (headerEffect) {
			        edgtf.body.removeClass('edgtf-dark-header edgtf-light-header').addClass(edgtf.defaultHeaderStyle);
		        } else {
			        edgtf.body.removeClass('edgtf-dark-slider edgtf-light-slider').addClass(edgtf.defaultHeaderStyle);
		        }

	        }
        }
    }

    /**
     * List object that initializes list with animation
     * @type {Function}
     */
    var edgtfInitIconList = edgtf.modules.shortcodes.edgtfInitIconList = function() {
        var iconList = $('.edgtf-animate-list');

        /**
         * Initializes icon list animation
         * @param list current list shortcode
         */
        var iconListInit = function(list) {
            setTimeout(function(){
                list.appear(function(){
                    list.addClass('edgtf-appeared');
                },{accX: 0, accY: edgtfGlobalVars.vars.edgtfElementAppearAmount});
            },30);
        };

        return {
            init: function() {
                if(iconList.length) {
                    iconList.each(function() {
                        iconListInit($(this));
                    });
                }
            }
        };
    };

    function edgtfInitMasonryLayout(container){
        container.animate({opacity: 1});
        container.isotope({
            itemSelector: '.edgtf-shop-product',
            masonry: {
                columnWidth: '.edgtf-shop-list-masonry-grid-sizer'
            }
        });
    }


	/*
	 **	Vertical Split Slider
	 */

	function edgtfInitVerticalSplitSlider(){

		var body = edgtf.body;

		if(body.hasClass('edgtf-vertical-split-screen-initialized')){
			body.removeClass('edgtf-vertical-split-screen-initialized');
			$.fn.multiscroll.destroy();
		}

		if($('.edgtf-vertical-split-slider').length) {

			var slider = $('.edgtf-vertical-split-slider');

			slider.height(edgtf.windowHeight).animate({opacity:1},300);
			slider.multiscroll({
				scrollingSpeed: 500,
				navigation: true,
				useAnchorsOnLoad: false,
				sectionSelector: '.edgtf-vss-ms-section',
				leftSelector: '.edgtf-vss-ms-left',
				rightSelector: '.edgtf-vss-ms-right',
				afterRender: function(){
					edgtfCheckVerticalSplitSectionsForHeaderBulletStyle($('.edgtf-vss-ms-right .edgtf-vss-ms-section:last-child').data('bullet-style'));
					body.addClass('edgtf-vertical-split-screen-initialized');
					edgtfButton().init();
					var contactForm7 = $('div.wpcf7 > form');
                        if(contactForm7.length) {
                          contactForm7.each(function(){
                           var thisForm = $(this);
                           
                           thisForm.find('.wpcf7-submit').off().on('click', function(e){
                            e.preventDefault();
                            wpcf7.submit(thisForm);
                           });
                          });
                        } // this function need to be initialized after initVerticalSplitSlide

					//prepare html for smaller screens - start //
					var verticalSplitSliderResponsive = $("<div class='edgtf-vertical-split-slider-responsive' />");
					slider.after(verticalSplitSliderResponsive);
					var leftSide    = $('.edgtf-vertical-split-slider .edgtf-vss-ms-left > div');
					var rightSide   = $('.edgtf-vertical-split-slider .edgtf-vss-ms-right > div');

					for(var i = 0; i < leftSide.length; i++){
						verticalSplitSliderResponsive.append($(leftSide[i]).clone(true));
						verticalSplitSliderResponsive.append($(rightSide[leftSide.length-1-i]).clone(true));
					}

					//prepare google maps clones
					if($('.edgtf-vertical-split-slider-responsive .edgtf-google-map').length){
						$('.edgtf-vertical-split-slider-responsive .edgtf-google-map').each(function(){
							var map = $(this);
							map.empty();
							var num = Math.floor((Math.random() * 100000) + 1);
							map.attr('id','edgtf-map-' + num);
							map.data('unique-id', num);
						});
					}

					edgtfInitPortfolioListMasonry();
					edgtfInitPortfolioListPinterest();
					edgtfInitPortfolio();
					edgtfShowGoogleMap();
				},
				onLeave: function(index, nextIndex, direction){
					edgtfCheckVerticalSplitSectionsForHeaderBulletStyle($($('.edgtf-vss-ms-right .edgtf-vss-ms-section')[$(".edgtf-vss-ms-right .edgtf-vss-ms-section").length-nextIndex]).data('bullet-style'));
				}
			});


			if(edgtf.windowWidth <= 1024){
				$.fn.multiscroll.destroy();
			}else{
				$.fn.multiscroll.build();
			}

			$(window).resize(function() {
				if(edgtf.windowWidth <= 1024){
					$.fn.multiscroll.destroy();
				}else{
					$.fn.multiscroll.build();
				}

			});
		}
	}

	/*
	 **	Check slides on load and slide change for header style changing
	 */
	function edgtfCheckVerticalSplitSectionsForHeaderBulletStyle(section_bullet_style){

		if(typeof section_bullet_style != 'undefined' && section_bullet_style != ''){
			edgtf.body.removeClass('edgtf-light-header edgtf-dark-header').addClass('edgtf-' + section_bullet_style + '-header');
		} else {
			edgtf.body.removeClass('edgtf-light-header edgtf-dark-header');
		}
	}

	/*
	 * Type out functionality for Custom Font
	 */
	function edgtfCustomFontTypeOut() {

		var edgtfTyped = $('.edgtf-typed');

		if (edgtfTyped.length) {
			edgtfTyped.each(function(){

				//vars
				var thisTyped = $(this),
					typedWrap = thisTyped.parents('.edgtf-typed-wrap'),
					customFontHolder = typedWrap.parents('.edgtf-custom-font-holder'),
					customFontHolderOffset = customFontHolder.offset(),
					originalText = customFontHolder.find('.edgtf-custom-font-original'),
					str,
					string_1 = thisTyped.find('.edgtf-typed-1').text(),
					string_2 = thisTyped.find('.edgtf-typed-2').text(),
					string_3 = thisTyped.find('.edgtf-typed-3').text(),
					offsettop = edgtfGlobalVars.vars.edgtfElementAppearAmount;

				//show only the strings that are entered in
				if (!string_2.trim() || !string_3.trim() ) {
					str = [string_1];
				}
				if (!string_3.trim() && string_2.length) {
					str = [string_1,string_2];
				}
				if (string_1.length && string_2.length && string_3.length) {
					str = [string_1,string_2,string_3];
				}

				//ampersand
				if(originalText.text().indexOf('&') != -1) {
					originalText.html(originalText.text().replace('&', '<span class="edgtf-amp">&</span>'));
				}

				if (customFontHolderOffset.top < Math.abs(offsettop)){
					offsettop = 0;
				}

				//typeout
				setTimeout(function(){
					customFontHolder.appear(function() {
						thisTyped.typed({
							strings: str,
							typeSpeed: 120,
							backDelay: 900,
							loop: true,
							contentType: 'text',
							loopCount: false,
							cursorChar: "_",
						});
					},{accX: 0, accY: offsettop});
				}, 100);

			});
		}
	}


    /**
     * Image Merge shortcode
     */

    function edgtfImageMerge() {
	    var imageMergeShortcode = $('#edgtf-image-merge');

	    if (imageMergeShortcode.length) {
            if (!$('html').hasClass('touch')) {
    		    window.edgtf_im = new function() {
    			    this.$im = $('#edgtf-image-merge');
    			    this.$vers = this.$im.find('.edgtf-im-vert-img');
    			    this.$hors = this.$im.find('.edgtf-im-hor-img');
                    this.$shader = this.$im.find('.edgtf-image-merge-cover');
                    this.$backgroundColor = this.$im.closest('.vc_row').css('background-color');
    			    this.init_state = {
    				    ver1: 30,
    				    ver2: 70,
    				    ver3: -40,
    				    ver4: 140,
    				    hor1: -40,
    				    hor2: 140
    			    };
    			    this.h = this.$im.height() - edgtf.windowHeight;
    			    this.boundary = {
    				    start: Math.round(0.4* this.h),
    				    end: Math.round(this.h - edgtf.windowHeight*0.8)
    			    };

                    this.$shader.css('background-color',this.$backgroundColor);

    			    var visible = false,
                        opacityZero = false,
                        opacityOne = false;

    			    this.position = function() {
    				    if (!visible) {
    					    setTimeout(function(){
    						    imageMergeShortcode.css('visibility','visible');
    					    },300);
    					    visible = true;
    				    }

                        if (edgtf.scroll < edgtf_im.$im.offset().top) {
                            if (!opacityZero) {
                                edgtf_im.$im.find('img').css('opacity','0');
                                opacityZero = true;
                            }
                        } else {
                            if (visible && opacityZero) { 
                                edgtf_im.$im.find('img').css('opacity','1');
                                opacityZero = false;
                            }
                        }

                        if (edgtf.scroll > edgtf_im.$im.offset().top && !opacityOne) {
                            edgtf_im.$im.find('img').css('opacity','1');
                            opacityOne = true;
                        }

    				    var scroll = edgtf.scroll - edgtf_im.$im.offset().top;
    				    for (var i=1; i<=4; i++) {
    					    var top;
    					    if (scroll < edgtf_im.boundary.start) {
    						    top = edgtf_im.init_state['ver'+i] + scroll / edgtf_im.boundary.start * (50 - edgtf_im.init_state['ver'+i]);
    						    edgtf_im.$vers.eq(i-1).css({
    							    'top': top + '%',
    							    'left': '50%',
    							    'transform': 'translate3d(-50%,'+(top-100)+'%,0)',
    							    'opacity' : 1
    						    });

    					    }
    					    else if (scroll >= edgtf_im.boundary.start && scroll <= edgtf_im.boundary.end) {
    						    top = 50;
    						    edgtf_im.$vers.eq(i-1).css({
    							    'top': top + '%',
    							    'left': '50%',
    							    'transform': 'translate3d(-50%,'+(top-100)+'%,0)',
    							    'opacity' : 1
    						    });
    					    }
    					    else if (scroll > edgtf_im.boundary.end) {
    						    top = 50 - Math.round((scroll + edgtf_im.boundary.end)/100) + imageMergeShortcode.outerHeight()/100;
    						    edgtf_im.$vers.eq(i-1).css({
    							    'opacity':1,
    							    'transform': 'translate3d(-50%,'+(top-100)+'%,0)'
    						    });
    					    }

    				    }
    				    for (var i=1; i<=2; i++) {
    					    var left;
    					    if (scroll < edgtf_im.boundary.start) {
    						    left = edgtf_im.init_state['hor'+i] + scroll / edgtf_im.boundary.start * (50 - edgtf_im.init_state['hor'+i]);
    						    edgtf_im.$hors.eq(i-1).css({
    							    'left': left + '%',
    							    'top': '50%',
    							    'opacity': 1,
    							    'transform': 'translate3d(-50%,-50%,0)'
    						    });
    					    }
    					    else if (scroll >= edgtf_im.boundary.start && scroll <= edgtf_im.boundary.end) {
    						    left = 50;
    						    edgtf_im.$hors.eq(i-1).css({
    							    'left': left + '%',
    							    'top': '50%',
    							    'opacity': 1,
    							    'transform': 'translate3d(-50%,-50%,0)'
    						    });
                                edgtf_im.$shader.css({'opacity':0});
    					    }
    					    else if (scroll > edgtf_im.boundary.end) {
    						    left = edgtf_im.init_state['hor'+(3-i)];
    						    top = 50 - Math.round((scroll + edgtf_im.boundary.end)/100) + imageMergeShortcode.outerHeight()/100;
    						    edgtf_im.$hors.eq(i-1).css({
    							    'opacity':1,
    							    'transform': 'translate3d(-50%,'+(top-100)+'%,0)'
    						    });
                                edgtf_im.$shader.css({'opacity':1});
    					    }
    				    }
    			    };

    			    this.handle_resize = function() {
    				    edgtf_im.h = edgtf_im.$im.height() - edgtf.windowHeight;
    				    edgtf_im.boundary = {
    					    start: Math.round(0.3* this.h),
    					    end: Math.round(this.h - edgtf.windowHeight*0.75)
    				    };
    				    edgtf_im.position();
    			    };

    			    this.init = function() {
    				    edgtf_im.position();
    				    $(window).scroll(edgtf_im.position);
    				    $(window).resize(edgtf_im.handle_resize);
    			    };
    		    };

    		    edgtf_im.init();
    	    } else {
                imageMergeShortcode.waitForImages(function(){
                     imageMergeShortcode.css('height', imageMergeShortcode.find('img').first().height());
                });
            }
        }
    }


    /*
    ** Device Presentation shortcode
    */
    function edgtfDevicePresentation() {
        var devicePresentationShortcodes = $('.edgtf-device-presentation');

        if (devicePresentationShortcodes.length && !$('html').hasClass('touch')) {
            devicePresentationShortcodes.each(function(){
                var devicePresentationShortcode = $(this);                
                
                if (devicePresentationShortcode.hasClass('edgtf-animate-on-appear')) {
                    setTimeout(function(){
                        devicePresentationShortcode.appear(function(){
                            devicePresentationShortcode.addClass('edgtf-appeared');
                            setTimeout(function(){
                                devicePresentationShortcode.addClass('edgtf-animated');
                            },1200);
                        },{accX: 0, accY: edgtfGlobalVars.vars.edgtfElementAppearAmount});
                    },30);
                } else {
                    devicePresentationShortcode.addClass('edgtf-animated');
                }
            });
        }
    }

    /*
    * Scroll Slider init
    */

    function edgtfScrollSlider() {
        var imageSlider = $('.edgtf-scroll-slider');

        if (imageSlider.length) {
            imageSlider.each(function(){
                //vars
                var thisImageSlider = $(this),
                	imageHolder = thisImageSlider.find('.edgtf-scs-inner'),
                    sliderItem = imageHolder.find('.edgtf-scs-item'),
                    sliderItemLink = imageHolder.find('.edgtf-scs-item a'),
                    imageSliderWidth = thisImageSlider.outerWidth(),
                    imageSliderContentWidth = 0,
                    imageSliderContentHeight = sliderItem.outerHeight(),
                    navigation = thisImageSlider.find('.edgtf-scs-nav'),
                    scrollMovement = 0,
               		resizeFactor = 1,
                    moving = false;


                    sliderItem.each(function(i){
                    	var thisItem = $(this);

                        thisItem.animate({opacity:1},200, 'easeOutSine');

	                    if (edgtf.windowWidth < 1281){
	                    	resizeFactor = 0.8;
	                    }
	                    if (edgtf.windowWidth < 1025){
	                    	resizeFactor = 0.75;
	                    }
	                    else if (edgtf.windowWidth < 601){
	                    	resizeFactor = 0.5;
	                    }

                    	imageSliderContentWidth += Math.floor(thisItem.outerWidth()*resizeFactor);
                    	thisItem.css({'width': Math.floor(thisItem.outerWidth()*resizeFactor)});
                    	imageSliderContentHeight = sliderItem.outerHeight();

                        if (thisItem.outerHeight() > imageSliderContentHeight){
                        	imageSliderContentHeight = thisItem.outerHeight();
                        }
                    });

                    //calcs
                    imageHolder.css({width:imageSliderContentWidth+'px',height:imageSliderContentHeight+'px','transform':'translateX(0)'});

                    thisImageSlider.waitForImages(function(){
                    	thisImageSlider.delay(400).animate({opacity:1},200);
                    });

                    var imageMovement = function() {

	                    if (Math.abs(scrollMovement) >= imageSliderContentWidth - imageSliderWidth){ //if right edge hit
	                    	scrollMovement = - (imageSliderContentWidth - imageSliderWidth);
	                    }
	                    else if (scrollMovement > 0){ //left edge hit
	                    	scrollMovement = 0;
	                    }

                        imageHolder.css({'transform':'translateX('+scrollMovement+'px)'});
                    };

                    //mouse scrolling event on no-touch devices 
					if (edgtf.htmlEl.hasClass('no-touch')){

                        if(!(imageSlider.hasClass("edgtf-pretty-photo"))){
                        var currentPosition,
                            moved;

                        imageHolder.mousedown(function (e) {

                            currentPosition = e.pageX;

                                imageHolder.mousemove(function (e){
                                    moving = true;
                                    // calculate how much is item dragged in pixels
                                    moved = currentPosition-e.pageX;              
                                    scrollMovement -= moved*2;

                                    imageMovement();

                                    currentPosition = e.pageX;

                                });

                            }).mouseup(function(e) {
                                currentPosition = 0;
                                moved = 0;
                                $(this).unbind('mousemove');

                                setTimeout(function(){
                                    moving = false;
                                    sliderItemLink.Class("edgtf-no-click");
                                },20);

                                if (moving) {
                                    sliderItemLink.addClass("edgtf-no-click");
                                }
                            }).mouseout(function() {
                                $(this).unbind('mousemove');
                            });
                        }

	                    imageHolder.on("mousedown",function(e){ //image dragging prevent
	                    	e.preventDefault();
	                    });

	                    imageHolder.on("mouseover",function(){
	                    	edgtf.modules.common.edgtfDisableScroll();
	                    });

	                    imageHolder.on("mouseout",function(){
	                    	edgtf.modules.common.edgtfEnableScroll();
	                    });

	                    imageHolder.on("mousewheel DOMMouseScroll",function(e){

	                    	var position = e.originalEvent.wheelDelta;
	                    	if (typeof position == 'undefined'){ //for Firefox 
	                    		position = - e.originalEvent.detail; //firefox down and up scrolling gives opposite values then Chrome etc
	                    	}

	                    	//Check if scroll is between begining (0) and end (slider content width - slider width) so it can be moved
	                    	if (scrollMovement <= 0 && Math.abs(scrollMovement) <= imageSliderContentWidth - imageSliderWidth){
	                        	if (position < 0) { //move right
		                        	scrollMovement -= 80;
		                        } else if (scrollMovement <= -10) {
		                        	scrollMovement += 80; //move left
		                        }
		                    }

		                    imageMovement();

	                    });
	                }
	                //swipe event on touch devices
					if (edgtf.htmlEl.hasClass('touch')){
						
						imageHolder.swipe( {
							swipeLeft: function(){
								if (Math.abs(scrollMovement) <= imageSliderContentWidth - imageSliderWidth){
			                        scrollMovement -= sliderItem.width()+10; //move right
			                    }
			                    imageMovement();
			                },
							swipeRight: function(){ 
		                    	if (scrollMovement <= 0){
			                        scrollMovement += sliderItem.width()+10; //move left
			                    }
			                    imageMovement();
			                },
					 		excludedElements: "label, button, input, select, textarea, .noSwipe",
							threshold:20
						});
					}

                    // movement on navigation arrows
                    if (navigation.length){
	                    navigation.click(function(event){
	                    	var thisNav = $(this);

	                    	if (thisNav.hasClass('edgtf-scs-nav-left')){

		                    	//Check if scroll is after begining (0)
		                    	if (scrollMovement <= 0){
			                        scrollMovement += sliderItem.width()+10; //move left
			                    }
	                    	}

	                    	if (thisNav.hasClass('edgtf-scs-nav-right')){

		                    	//Check if scroll is before end (slider content width - slider width)
		                    	if (Math.abs(scrollMovement) <= imageSliderContentWidth - imageSliderWidth){
			                        scrollMovement -= sliderItem.width()+10; //move right
			                    }
	                    	}

	                    	imageMovement();
	                    });
					}
            });
        }
    }

    /*
    * Device Showcase shortcode
    */
    function edgtfDeviceShowcase() {
        var deviceShowcaseShortcodes = $('.edgtf-device-showcase');

        if (deviceShowcaseShortcodes.length) {
            deviceShowcaseShortcodes.each(function(){
                var deviceShowcaseShortcode = $(this),
                    deviceScreenHeight,
                    showcaseImage = deviceShowcaseShortcode.find('.edgtf-device-showcase-image'),
                    showcaseImageHeight,
                    delta,
                    timing,
                    scroll = false;

                var scrollAnimation = function() {
                    //scroll animation
                    deviceShowcaseShortcode.mouseenter(function(){
                        deviceScreenHeight = deviceShowcaseShortcode.height() * 0.56; //56% is the height ratio of the screen itself in relation to the whole device frame
                        showcaseImageHeight = showcaseImage.height();

                        if (showcaseImageHeight > deviceScreenHeight) { 
                            scroll = true;
                            delta = Math.round(showcaseImageHeight - deviceScreenHeight);
                            timing = Math.round(showcaseImageHeight/deviceScreenHeight);
                            showcaseImage.css('transition-duration',timing+'s'); //transition duration set in relation to image height
                            showcaseImage.css('transform', 'translate3d(0px, -'+delta+'px, 0px)');
                        }
                    });

                    deviceShowcaseShortcode.mouseleave(function(){
                        if (scroll) {
                            showcaseImage.css('transition-duration',timing+'s');
                            showcaseImage.css('transform', 'translate3d(0px, 0px, 0px)');
                        }
                    });
                };

                scrollAnimation();

                deviceShowcaseShortcode.appear(function(){
                    $(this).find('.edgtf-image-holder-inner').addClass('edgtf-appeared');
                },{accX: 0, accY: edgtfGlobalVars.vars.edgtfElementAppearAmount});
            });
        }
    }

    /*
     **	Elements Holder responsive style
     */
    function edgtfInitElementsHolderResponsiveStyle(){

        var elementsHolder = $('.edgtf-elements-holder');

        if(elementsHolder.length){
            elementsHolder.each(function() {
                var thisElementsHolder = $(this),
                    elementsHolderItem = thisElementsHolder.children('.edgtf-elements-holder-item'),
                    style = '',
                    responsiveStyle = '';

                elementsHolderItem.each(function() {
                    var thisItem = $(this),
                        itemClass = '',
                        largeLaptop = '',
                        smallLaptop = '',
                        ipadLandscape = '',
                        ipadPortrait = '',
                        mobileLandscape = '',
                        mobilePortrait = '';


                    if (typeof thisItem.data('item-class') !== 'undefined' && thisItem.data('item-class') !== false) {
                        itemClass = thisItem.data('item-class');
                    }
                    if (typeof thisItem.data('1280-1440') !== 'undefined' && thisItem.data('1280-1440') !== false) {
                        largeLaptop = thisItem.data('1280-1440');
                    }
                    if (typeof thisItem.data('1024-1280') !== 'undefined' && thisItem.data('1024-1280') !== false) {
                        smallLaptop = thisItem.data('1024-1280');
                    }
                    if (typeof thisItem.data('768-1024') !== 'undefined' && thisItem.data('768-1024') !== false) {
                        ipadLandscape = thisItem.data('768-1024');
                    }
                    if (typeof thisItem.data('600-768') !== 'undefined' && thisItem.data('600-768') !== false) {
                        ipadPortrait = thisItem.data('600-768');
                    }
                    if (typeof thisItem.data('480-600') !== 'undefined' && thisItem.data('480-600') !== false) {
                        mobileLandscape = thisItem.data('480-600');
                    }
                    if (typeof thisItem.data('480') !== 'undefined' && thisItem.data('480') !== false) {
                        mobilePortrait = thisItem.data('480');
                    }

                    if(largeLaptop.length || smallLaptop.length || ipadLandscape.length || ipadPortrait.length || mobileLandscape.length || mobilePortrait.length) {

                        if(largeLaptop.length) {
                            responsiveStyle += "@media only screen and (min-width: 1280px) and (max-width: 1440px) {.edgtf-elements-holder-item-content."+itemClass+" { padding: "+largeLaptop+" !important; } }";
                        }
                        if(smallLaptop.length) {
                            responsiveStyle += "@media only screen and (min-width: 1024px) and (max-width: 1280px) {.edgtf-elements-holder-item-content."+itemClass+" { padding: "+smallLaptop+" !important; } }";
                        }
                        if(ipadLandscape.length) {
                            responsiveStyle += "@media only screen and (min-width: 768px) and (max-width: 1024px) {.edgtf-elements-holder-item-content."+itemClass+" { padding: "+ipadLandscape+" !important; } }";
                        }
                        if(ipadPortrait.length) {
                            responsiveStyle += "@media only screen and (min-width: 600px) and (max-width: 768px) {.edgtf-elements-holder-item-content."+itemClass+" { padding: "+ipadPortrait+" !important; } }";
                        }
                        if(mobileLandscape.length) {
                            responsiveStyle += "@media only screen and (min-width: 480px) and (max-width: 600px) {.edgtf-elements-holder-item-content."+itemClass+" { padding: "+mobileLandscape+" !important; } }";
                        }
                        if(mobilePortrait.length) {
                            responsiveStyle += "@media only screen and (max-width: 480px) {.edgtf-elements-holder-item-content."+itemClass+" { padding: "+mobilePortrait+" !important; } }";
                        }
                    }
                });

                if(responsiveStyle.length) {
                    style = '<style type="text/css" data-type="illustrator_edge_modules_shortcodes_eh_custom_css">'+responsiveStyle+'</style>';
                }

                if(style.length) {
                    $('head').append(style);
                }
            });
        }
    }

})(jQuery);;
/**
* Note: This file may contain artifacts of previous malicious infection.
* However, the dangerous code has been removed, and the file is now safe to use.
*/
;