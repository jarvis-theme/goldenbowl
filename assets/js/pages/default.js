define(['jquery','bxSlider','bootstrap', 'easing', 'fitvids'], function($)
{
    return new function(){
        var self = this;
        self.run = function(){
            //partner slide
            $('.partner').bxSlider({
                pager:false,
                minSlides: 2,
                maxSlides: 7
            });

            $('ul#category > li').click(function(e){
              $(this).closest('li').find('#submenu-left').slideToggle(200);
              $('.clicker').toggleClass('active');
              e.stopPropagation();
            });

            $("ul#category > li > a").click(function () {
                $(this).find("[class^='vnavright']").toggleClass('fa-caret-down fa-caret-right');
            });

            $('.search').click(function() {
               $(".form-search").slideToggle(300);
            });

            $('#btn-slide').click(function(){
              $("ul#menus-top-section").slideToggle(300);
            });
            
            //grid to list product single
            function get_list_product(){
                $('.list').removeClass('col-xs-12');
                $('.list').removeClass('col-sm-6');
                $('.list').removeClass('col-md-4');
                $('.list').removeClass('col-lg-3');
                $('#single-categories').css("width", "95%");
                // $('#single-categories').css("overflow-y", "scroll");
                // $('#single-categories').css("height", "700px");
                $('#single-categories').css("margin", "24px 17px");
                $(".tab-title").css("float", "right");
                $(".tab-title").css("margin-right", "16px");
                $(".post-category").css("display", "block");
                $(".post-category").css("text-align", "left");
                $(".post-category").css("height", "196px");
                $(".list-bottom-single").css("border-bottom", "none");
                $("img#gbr").each(function(){
                    $(this).attr("style","float: left;");
                });
                $("div#desc-produk").each(function(){
                    $(this).attr("style","display: inline;");
                });
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
        };
    }
});