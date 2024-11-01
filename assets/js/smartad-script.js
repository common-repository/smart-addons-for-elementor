(function ($) {
    "use strict";
    console.log('js laoded');
        

    /* ==================================================================
        Custom Counter
    ================================================================== */
    $('.smart-count').counterUp({
        delay: 10,
        time: 1000
    });

 
    /* ==================================================================
        Custom Counter
    ================================================================== */
     

    var editMode = false;

    var TestimonialCarousel = function ($scope, $) {  
        $('.owl-carousel').owlCarousel({
            loop:true,
            margin:10,
            nav:true,
            navText : ['<i class="icon-back"></i>','<i class="icon-next"></i>'],
            smartSpeed: 500,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:1
                },
                1000:{
                    items:1
                }
            }
        })
    };

    var BeforeAfter = function ($scope, $) {    
        var $BeforeAfterWrapper = $scope.find('.uniq').eq(0);
        var $b4 = $BeforeAfterWrapper.find('.twentytwenty-container');

        $b4.twentytwenty(
            { 
                orientation: $BeforeAfterWrapper.data('direction')
            }
        );
    };

    var PortfolioFilter = function ($scope, $) {   
        var $PortfolioFilterWrapper = $scope.find('.smart-portfolio-filter').eq(0);
        var $ActivateFlter = $PortfolioFilterWrapper.data('type'); 
        if($ActivateFlter=='filter'){
            var filterList = {

                init: function () {

                    $('#portfoliolist').mixItUp({
                        selectors: {
                            target: '.portfolio',
                            filter: '.filter'   
                        },
                        load: {
                            filter: '*'  
                        }     
                    });                             

                }

            }; 
            // Run the show!
            filterList.init();
        }
    };

    $(window).on('elementor/frontend/init', function () {
        if(elementorFrontend.isEditMode()) {
            editMode = true;
        }
        
        elementorFrontend.hooks.addAction('frontend/element_ready/smart-testimonial.default', TestimonialCarousel);
        elementorFrontend.hooks.addAction('frontend/element_ready/smart-before-after.default', BeforeAfter);
        elementorFrontend.hooks.addAction('frontend/element_ready/smart-portfolio.default', PortfolioFilter);
        
    });


}(jQuery));
