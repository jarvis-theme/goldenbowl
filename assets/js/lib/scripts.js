// Document ready
$(document).ready(function(){
	//top slide
  	$('.bxslider').bxSlider({
  		pager:false
  	});

  	//partner slide
  	$('.partner').bxSlider({
  		pager:false,
	    minSlides: 2,
	    maxSlides: 7
  	});

  	//caption product
  	$('.caption-thumbnail').bxSlider({
  		pager:false,
	    minSlides: 3,
	    maxSlides: 3
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

	   // This button will increment the value
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

	$('ul#category > li').click(function(e){
      $(this).closest('li').find('#submenu-left').slideToggle(200);
      $('.clicker').toggleClass('active');
      e.stopPropagation();
    });

    $("ul#category > li > a").click(function () {
        $(this).find("[class^='vnavright']").toggleClass('fa-caret-down fa-caret-right');
    });

    $('#btn-slide').click(function(){
      $("ul#menus-top-section").slideToggle(300);
    });  

    $('ul.tabs li').click(function(){
		var tab_id = $(this).attr('data-tab');

		$('ul.tabs li').removeClass('current');
		$('.tab-content').removeClass('current');

		$(this).addClass('current');
		$("#"+tab_id).addClass('current');
	})

    $('.search').click(function() {
       $(".form-search").slideToggle(300);
    });

    //grid to list homepage
    function get_list(){
        $(".tab-post").css("overflow-x", "hidden");
        $(".tab-post").css("overflow-y", "scroll");
        $(".tab-post").css("height", "500px");
        $(".post").css("text-align", "left");
        $(".post").css("display", "block");
        $(".tab-title").css("float", "right");
    }

    function get_grid(){
        location.reload();
    }

    $('.list').click(function() {
        get_list();
    });

    $('.grid').click(function() {
        get_grid();
    });

    //grid to list product single
    function get_list_product(){
        $('.list').removeClass('col-md-3');
        $('.list').removeClass('col-sm-6');
        $('.list').removeClass('col-xs-12');
        $('#single-categories').css("width", "95%");
        $('#single-categories').css("overflow-y", "scroll");
        $('#single-categories').css("height", "700px");
        $('#single-categories').css("margin", "24px 17px");
        $(".tab-title").css("float", "right");
        $(".tab-title").css("margin-right", "16px");
        $(".post-category").css("display", "block");
        $(".post-category").css("text-align", "left");
        $(".list-bottom-single").css("border-bottom", "none");
        // $("#desc-produk").attr("style","word-wrap: break-word; display: inline;");
        // $("#gbr").attr("style","float: left;");
    }

    function get_grid_product(){
        location.reload();
    }

    $('.list_product').click(function() {
        get_list_product();
    });

    $('.grid_product').click(function() {
        get_grid_product();
    });
});