define(['jquery','bxSlider','elevateZoom'], function($)
{
	return new function()
	{
		var self = this;
		self.run = function()
		{
			//caption product
            $('.caption-thumbnail').bxSlider({
                pager:false,
                minSlides: 3,
                maxSlides: 3
            });

			$('.qtyplus').click(function(e){
                // Stop acting like a button
                e.preventDefault();
                // Get the field name
                fieldName = $(this).attr('field');
                // Get its current value
                var currentVal = parseInt($('input[name='+fieldName+']').val());
                // If is not undefined
                if (!isNaN(currentVal)) {
                    // Increment
                    $('input[name='+fieldName+']').val(currentVal + 1);
                } else {
                    // Otherwise put a 0 there
                    $('input[name='+fieldName+']').val(0);
                }
            });

            // This button will decrement the value till 0
            $(".qtyminus").click(function(e) {
                // Stop acting like a button
                e.preventDefault();
                // Get the field name
                fieldName = $(this).attr('field');
                // Get its current value
                var currentVal = parseInt($('input[name='+fieldName+']').val());
                // If it isn't undefined or its greater than 0
                if (!isNaN(currentVal) && currentVal > 0) {
                    // Decrement one
                    $('input[name='+fieldName+']').val(currentVal - 1);
                } else {
                    // Otherwise put a 0 there
                    $('input[name='+fieldName+']').val(0);
                }
            });

            $("#imgZoom").elevateZoom({
                gallery:'product_detail', 
                zoomType: "inner",
                cursor: "crosshair",
                zoomWindowFadeIn: 500,
                zoomWindowFadeOut: 750,
                galleryActiveClass: 'active', 
                imageCrossfade: true, 
                loadingIcon: 'http://www.elevateweb.co.uk/spinner.gif'
            });
            $("#imgZoom").bind("click", function(e) { 
                var ez =  $('#imgZoom').data('elevateZoom'); 
                          $.fancybox(ez.getGalleryList()); 
                          return false; 
            });

            $('ul.tabs li').click(function(){
                var tab_id = $(this).attr('data-tab');

                $('ul.tabs li').removeClass('current');
                $('.tab-content').removeClass('current');

                $(this).addClass('current');
                $("#"+tab_id).addClass('current');
            });
		};
	};
});