jQuery(document).ready(function($){ 

    $('body').removeClass('no_js').addClass('yes_js');
    
    //STANDARD WP MENU NAV
    $("#nav > .menu > ul").superfish({ 
		autoArrows: true,
		animation: {opacity:'show', height:'show'},
        speed: 'fast'
	});
    
    //MAIN NAV MENU
    $("#nav > ul").superfish({ 
		autoArrows: true,
		animation: {opacity:'show', height:'show'},
        speed: 'fast'
	});
	
	//remove current menu class from drop-downs
	$("#nav > ul ul li").removeClass("current-menu-item");
    
	if ( $('body').hasClass('isMobile') && ! $('body').hasClass('iphone') && ! $('body').hasClass('ipad') ) {
        $('.sf-sub-indicator').parent().click(function(){   
            $(this).paretn().toggle( show_dropdown, function(){ document.location = $(this).children('a').attr('href') } )
        });
    }
    
    //STYLE STRETCHED WHEN WIDTH < 960
    var isBoxed = $('body').hasClass('boxed-layout') ? true : false;
    var w = $(window).width();
    if(w < 960){
        $('body').removeClass('boxed-layout');
        $('body').addClass('stretched-layout');
    }
    
    $(window).bind('resize', function(){
        w = $(window).width();
        
        if(w < 960 && isBoxed){
            $('body').removeClass('boxed-layout');
            $('body').addClass('stretched-layout');
        } else if(isBoxed) {
            $('body').removeClass('stretched-layout');
            $('body').addClass('boxed-layout');
        }
    });
    
    // searchform on header    // autoclean labels
    $elements = $('#header #s, .autoclear');
    
    $elements.each(function(){
        if( $(this).val() != '' )   
            $(this).prev().css('display', 'none');
    }); 
    $elements.focus(function(){
        if( $(this).val() == '' )   
            $(this).prev().css('display', 'none');
    }); 
    $elements.blur(function(){ 
        if( $(this).val() == '' )   
            $(this).prev().css('display', 'block');
    }); 
          
    $('a img').hover(function(){ 
        if ( $(this).parent().parent().attr('id') == 'logo' || $(this).parent().parent().parent().parent().parent().attr('id') == 'slider' || $(this).parent().parent().parent().parent().attr('id') == 'slider' )
            return;
        //$('.home_item_portfolio img').hover(function(){
        $(this).stop().animate({opacity: 0.65}, 700);
    }, function(){
        $(this).stop().animate({opacity: 1});
    });
});