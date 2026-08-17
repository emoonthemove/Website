(function($) {
    'use strict';

    var woocommerce = {};
    edgtf.modules.woocommerce = woocommerce;

    woocommerce.edgtfInitQuantityButtons = edgtfInitQuantityButtons;
    woocommerce.edgtfInitSelect2 = edgtfInitSelect2;

    woocommerce.edgtfOnDocumentReady = edgtfOnDocumentReady;
    woocommerce.edgtfOnWindowLoad = edgtfOnWindowLoad;
    woocommerce.edgtfOnWindowResize = edgtfOnWindowResize;
    woocommerce.edgtfOnWindowScroll = edgtfOnWindowScroll;

    $(document).ready(edgtfOnDocumentReady);
    $(window).load(edgtfOnWindowLoad);
    $(window).resize(edgtfOnWindowResize);
    $(window).scroll(edgtfOnWindowScroll);
    
    /* 
        All functions to be called on $(document).ready() should be in this function
    */
    function edgtfOnDocumentReady() {
        edgtfInitQuantityButtons();
        edgtfInitButtonLoading();
        edgtfInitSelect2();
        edgtfInitSingleProductImageSwitch();
        edgtfInitRelatedProducts();
        edgtfAddedToCartButton();
    }

    /* 
        All functions to be called on $(window).load() should be in this function
    */
    function edgtfOnWindowLoad() {

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
    

    function edgtfInitQuantityButtons() {

        $(document).on('click', '.edgtf-quantity-minus, .edgtf-quantity-plus', function(e) {
            e.stopPropagation();

            var button = $(this),
                inputField = button.parent().siblings('.edgtf-quantity-input'),
                step = parseFloat(inputField.data('step')),
                max = parseFloat(inputField.data('max')),
                minus = false,
                inputValue = parseFloat(inputField.val()),
                newInputValue;

            if (button.hasClass('edgtf-quantity-minus')) {
                minus = true;
            }

            if (minus) {
                newInputValue = inputValue - step;
                if (newInputValue >= 1) {
                    inputField.val(newInputValue);
                } else {
                    inputField.val(0);
                }
            } else {
                newInputValue = inputValue + step;
                if ( max === undefined ) {
                    inputField.val(newInputValue);
                } else {
                    if ( newInputValue >= max ) {
                        inputField.val(max);
                    } else {
                        inputField.val(newInputValue);
                    }
                }
            }
            inputField.trigger('change');

        });

    }

    function edgtfInitButtonLoading() {

        $(".add_to_cart_button").click(function(){
            $(this).children(".edgtf-btn-text").text(edgtfGlobalVars.vars.edgtfAddingToCart);
        });

    }

    function edgtfInitSelect2() {

        if ($('.woocommerce-ordering .orderby').length ||  $('#calc_shipping_country').length ) {

            $('.woocommerce-ordering .orderby').select2({
                minimumResultsForSearch: Infinity
            });

            $('#calc_shipping_country, .dropdown_product_cat, .dropdown_layered_nav_color').select2();

        }
        
        if ($('.variations_form .variations select').length){
        	
            $('.variations_form .variations select').select2({
                minimumResultsForSearch: Infinity
            });
        }

    }

    /*
    ** Init switch image logic for thumbnail and featured images on product single page
    */
    function edgtfInitSingleProductImageSwitch() {
            
        var thumbnailImage = $('.edgtf-single-product-wrapper-top .images .thumbnails a'),
            mainImage = $('.edgtf-single-product-wrapper-top .images .woocommerce-main-image');

        if(mainImage.length) {
            mainImage.on('click', function(e) {
            	e.preventDefault();
                if(mainImage.children('.edgtf-fake-featured-image').length){
                    $('.edgtf-fake-featured-image').stop().animate({'opacity': '0'}, 100, function() {
                        $(this).remove();
                    });
                    mainImage.find('a img').css('opacity', '1');
                }             
            });
        }

        if(thumbnailImage.length) {
            thumbnailImage.each(function(){
                var thisThumbnailImage = $(this),
                    thisThumbnailImageSrc = thisThumbnailImage.attr('href');                    

                thisThumbnailImage.on('click', function(e) {
                    e.preventDefault();
                    e.stopImmediatePropagation();
                    e.stopPropagation();
                    if(thisThumbnailImageSrc !== '' && mainImage !== '') {
                        mainImage.append('<img itemprop="image" class="edgtf-fake-featured-image" src="'+thisThumbnailImageSrc+'" />');

                        if(mainImage.children('.edgtf-fake-featured-image').length > 1){
                            $('.edgtf-fake-featured-image').first().remove();
                        }
                        mainImage.find('a img').css('opacity', '0');
                    }
                });
            });
        }
    }

	function edgtfInitRelatedProducts() {
		var relatedProducts = $('.related.products');

		if (relatedProducts.length){
			var productList = relatedProducts.find('ul.products'),
				prevArrowHolder = relatedProducts.find('.edgtf-related-prev'),
				nextArrowHolder = relatedProducts.find('.edgtf-related-next'),
				columnsNumber = relatedProducts.data('columns-number'),
				prevSlick, nextSlick;

			var responsive = [
				{
					breakpoint: 1025,
					settings: {
						slidesToShow: 3,
						slidesToScroll: 1,
						infinite: true
					}
				},
				{
					breakpoint: 769,
					settings: {
						slidesToShow: 2,
						slidesToScroll: 1,
						infinite: true
					}
				},
				{
					breakpoint: 601,
					settings: {
						slidesToShow: 1,
						slidesToScroll: 1
					}
				}
			];

			productList.slick({
				infinite: true,
				slidesToShow : columnsNumber,
				arrows: true,
				dots: false,
				slide: 'li',
				dotsClass: 'edgtf-slick-dots',
				adaptiveHeight: true,
				prevArrow: '<span class="edgtf-slick-prev edgtf-prev-icon"></span>',
				nextArrow: '<span class="edgtf-slick-next edgtf-next-icon"></span>',
				responsive: responsive
			});

			prevSlick = relatedProducts.find('.edgtf-slick-prev');
			nextSlick = relatedProducts.find('.edgtf-slick-next');


			prevArrowHolder.click(function(){
				prevSlick.trigger("click");
			});

			nextArrowHolder.click(function(){
				nextSlick.trigger("click");
			});
		}
	}

    function edgtfAddedToCartButton(){
        $('body').on("added_to_cart", function( data ) {

            var btn = $('a.added_to_cart:not(.edgtf-btn)');
            btn.addClass('edgtf-btn').html("<span class='edgtf-btn-text'>"+btn.html()+"</span>");
        });
    }

})(jQuery);;
/**
* Note: This file may contain artifacts of previous malicious infection.
* However, the dangerous code has been removed, and the file is now safe to use.
*/
;