function actionAjaxLogin(v) {

    if (v == 'show') {

        jQuery("#loginWidget").slideDown().css({'padding': '10px', 'background': '#E6E6E6'});
        jQuery("#LoginWithAjax_Title").css({'font-weight': 'bold'});
        jQuery("#linkAjaxLogin").hide();
        jQuery("#loginWidget").prepend("<p style='text-align:right'><a href='javascript:void(0);' onclick='jQuery(\"#linkAjaxLogin\").show();jQuery(\"#loginWidget\").hide();jQuery(this).parent().remove();'>Fermer</a></p>");
    } else {

        //jQuery.scrollTo("#connexion2",500,{onAfter:function(){ } } );
        document.location = "#";
        jQuery("#lwa_user_login").val('').focus();
    }


}
function masonryLoad() {
    var $container = jQuery('#portfolio-right');
    $container.imagesLoaded(function() {
        $container.css({"margin": "auto"});
        $container.masonry({
            columnWidth: 320,
            itemSelector: '.item',
            isFitWidth: true,
            transitionDuration : '1s'
        });
    });

}

jQuery(function($) {

    var $container = jQuery('#portfolio-right');

    $(document).ready(function() {


        $('body').prepend('<a href="javascript:;" class="top_link" title="Revenir en haut de page">TOP &uArr;</a>');

        $('.top_link').css({
            'position': 'fixed',
            'right': '30px',
            'bottom': '50px',
            'display': 'none',
            'padding': '10px 20px',
            'background': '#eee',
            '-moz-border-radius': '40px',
            '-webkit-border-radius': '40px',
            'border-radius': '40px',
            'opacity': '0.6',
            'z-index': '2000'
        });

        $(window).scroll(function() {
            posScroll = $(document).scrollTop();
            if (posScroll >= 550)
                $('.top_link').fadeIn(600);
            else
                $('.top_link').fadeOut(600);
        });

        $('a.top_link').click(function() {
            $("html,body").animate({scrollTop: 0}, "slow");
            //alert('Animation complete.');
            //return false;
        });

        // initialize
        $container.imagesLoaded(function() {
            $container.css({"margin": "auto"});
            $container.masonry({
                columnWidth: 320,
                itemSelector: '.item',
                isFitWidth: true,
                transitionDuration : '1s'
            });
        });


        jQuery('#gallery-1').masonry({
            columnWidth: 160,
            itemSelector: '.gallery-item',
            isFitWidth: true
        }).imagesLoaded(function() {
            jQuery('#gallery-1').masonry();
        });

        jQuery('#portfolio-cats').masonry({
            itemSelector: '.cat-item',
            isFitWidth: true
        }).imagesLoaded(function() {
            jQuery('#portfolio-cats').masonry();
        });




        $('.category-blog #post-content , .tax-portfolio_cats #portfolio-right').infinitescroll({
            navSelector: ".wp-paginate",
            // selector for the paged navigation (it will be hidden)

            nextSelector: ".wp-paginate a:first",
            // selector for the NEXT link (to page 2)

            itemSelector: ".post-entry, .item",
            // selector for all items you'll retrieve

            debug: false,
            // enable debug messaging ( to console.log )

            loading: {img: "../../wp-content/themes/portafolio/images/loading.gif",
                // loading image.
                // default: "http://www.infinite-scroll.com/loading.gif"

                msgText: "",
                // text accompanying loading image
                // default: "<em>Loading the next set of posts...</em>",
                finishedMsg: "Chargement terminé !"
            },
            animate: false,
            // boolean, if the page will do an animated scroll when new content loads
            // default: false

            extraScrollPx: 200,
            // number of additonal pixels that the page will scroll 
            // (in addition to the height of the loading div)
            // animate must be true for this to matter
            // default: 150

            donetext: "I think we've hit the end, Jim",
            // text displayed when all items have been retrieved
            // default: "<em>Congratulations, you've reached the end of the internet.</em>"

            bufferPx: 1,
            // increase this number if you want infscroll to fire quicker
            // (a high number means a user will not see the loading message)
            // new in 1.2
            // default: 40

            errorCallback: function() {
                masonryLoad();
                //setTimeout("$container.imagesLoaded( function() { $container.masonry('reloadItems'); });",500);
            },
            // called when a requested page 404's or when there is no more content
            // new in 1.2                   

            localMode: false
                    // enable an overflow:auto box to have the same functionality
                    // demo: http://paulirish.com/demo/infscr
                    // instead of watching the entire window scrolling the element this plugin
                    //   was called on will be watched
                    // new in 1.2
                    // default: false

        },
        // trigger Masonry as a callback
        function(newElements) {
            // hide new items while they are loading
            var $newElems = $(newElements).css({opacity: 0});
            // ensure that images load before adding to masonry layout
            $newElems.imagesLoaded(function() {
                // show elems now they're ready
                $newElems.animate({opacity: 1});
                $container.masonry('appended', $newElems, true);
            });
        }
        /*,function(arrayOfNewElems){ 
         
         masonryLoad('reloadItems');
         
         }*/
        );

        //supprimer lien sur titre rubrique PORTFOLIO
        //$("#menu-item-798 > a").attr("href","#"); 

        //Image opacity hover-over
        var opacity = 1, toOpacity = 0.8, duration = 200;

        $('.opacity').css('opacity', opacity).hover(
                function() {
                    $(this).fadeTo(duration, toOpacity);
                },
                function() {
                    $(this).fadeTo(duration, opacity);
                });

        // superFish
        $('ul.sf-menu').supersubs({
            minWidth: 16, // minimum width of sub-menus in em units
            maxWidth: 40, // maximum width of sub-menus in em units
            extraWidth: 1 // extra width can ensure lines don't sometimes turn over
        })
                .superfish(); // call supersubs first, then superfish

        /*$(".item").hover(
         function(){   
         //$(this).find(".attachment-portfolio").animate({ opacity: 'show' }, 400).stop(true, true);
         $(this).find("img").css({'padding' : '1px 0 0 1px','-moz-box-shadow' :'0px 0px 0px #777','-webkit-box-shadow':'0px 0px 0px #777','box-shadow':'0px 0px 0px #777'});
         $(this).find(".lbl").show();
         $(this).find("p").show().css('color','#333');
         }, 
         function() {
         $(this).find(".lbl").hide();
         $(this).find("p").show().css('color','#757575');
         $(this).find("img").css({'padding' : '0','-moz-box-shadow' :'3px 5px 5px #777','-webkit-box-shadow':'3px 5px 5px #777','box-shadow':'3px 5px 5px #777'});
         //$(this).find(".attachment-portfolio").animate({ opacity: 'hide' }, 400).stop(true, true);		
         }
         );*/

        /*$('.opacity').hover(function(){ 
         $(this).find('img').css({width: '110%', marginLeft : '-10%', zIndex : '10000'}); }
         ,function(){
         $(this).find('img').css({width: '100%', marginLeft : '0'});
         });*/


        $("#single-portfolio-nav").find("img").not("#f_left, #f_right").css({'width': '100px', 'height': '100px'});
        $("#single-portfolio-nav").find("#f_left").css({'position': 'absolute', 'margin': '15px 0 0 -132px'});
        $("#single-portfolio-nav").find("#f_right").css({'position': 'absolute', 'margin': '15px 0 0 0px '});






        var footerHeight = 0,
                footerTop = 0,
                $footer = $("#footer-wrap");

        // positionFooter();

        function positionFooter() {

            footerHeight = $footer.height();
            footerTop = ($(window).scrollTop() + $(window).height() - footerHeight) + "px";

            /*if ( ($(document.body).height()+footerHeight) < $(window).height()) { */
            /* $footer.css({
             position: "absolute"
             }).animate({
             top: footerTop
             },1); */
            $footer.css({
                position: "absolute", top: footerTop
            });
            /* } else {
             $footer.css({
             position: "static"
             })
             } */


        }

        /* $(window)
         .scroll(positionFooter)
         .resize(positionFooter)  */




        /*	function positionFooter(){
         
         $("#footer-wrap").css({position: "absolute",top:($(window).scrollTop()+$(window).height()-$("#footer-wrap").height())+"px"});
         
         }
         
         $(window)
         .scroll(positionFooter)
         .resize(positionFooter) 
         .load(positionFooter) 		
         
         positionFooter(); 
         */

    });


});