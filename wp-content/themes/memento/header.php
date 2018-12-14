<?php
/**
 * The Header for our theme.
 *
 * @package WordPress
 * @subpackage YIW Themes
 * @since 1.0
 */             
 global $yiw_mobile;
?><!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<?php if ( ! $yiw_mobile->isIpad() ) : ?>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<?php endif ?>
<title><?php
    /*
     * Print the <title> tag based on what is being viewed.
     */
    global $page, $paged;

    wp_title( '|', true, 'right' );
    
    $website_name = get_bloginfo('name');
    $website_title = str_replace( array( '[', ']'), '', $website_name );
    
    echo $website_title;
    
    // Add description, if is home
    if ( is_home() || is_front_page() )
        echo ' | ' . get_bloginfo( 'description' );

    // Add a page number if necessary:
    if ( $paged >= 2 || $page >= 2 )
        echo ' | ' . sprintf( __( 'Page %s', 'yiw' ), max( $paged, $page ) );

    ?></title>          

    <link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri()."/css/reset.css"; ?>" />
    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />                              
	
    <?php if ( yiw_get_option( 'responsive', 1 ) ) : ?>
    <link rel="stylesheet" type="text/css" media="screen and (max-width: 1024px)" href="<?php echo get_template_directory_uri(); ?>/css/lessthen1024.css" />
	<link rel="stylesheet" type="text/css" media="screen and (max-width: 960px)" href="<?php echo get_template_directory_uri(); ?>/css/lessthen960.css" />
	<link rel="stylesheet" type="text/css" media="screen and (max-width: 600px)" href="<?php echo get_template_directory_uri(); ?>/css/lessthen600.css" />
	<link rel="stylesheet" type="text/css" media="screen and (max-width: 480px)" href="<?php echo get_template_directory_uri(); ?>/css/lessthen480.css" />
    <?php endif; ?>
    
    <?php
        // styles 
        wp_enqueue_style( 'memento',                 get_template_directory_uri().'/memento.css' );
        wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/css/font-awesome.css' );
        wp_enqueue_style( 'droid-sans-font', 'http://fonts.googleapis.com/css?family=Droid+Sans&#038;subset=latin%2Ccyrillic%2Cgreek' );
        wp_enqueue_style( 'shadows-into-light-font', 'http://fonts.googleapis.com/css?family=Shadows+Into+Light&#038;subset=latin%2Ccyrillic%2Cgreek' );                                 

        // scripts    
        wp_enqueue_script( 'jquery-cycle' );    
        wp_enqueue_script( 'jquery-easing',                 get_template_directory_uri()."/js/jquery.easing.1.3.js", array('jquery'), "1.3");
        wp_enqueue_script( 'jquery-tweetable',              get_template_directory_uri()."/js/jquery.tweetable.js", array('jquery'));                 


        // custom
        wp_enqueue_script( 'jquery-custom',      get_template_directory_uri()."/js/jquery.custom.js", array('jquery'), '1.0', true);  
                           
        /* We add some JavaScript to pages with the comment form
         * to support sites with threaded comments (when in use).
         */
        if ( is_singular() && get_option( 'thread_comments' ) )
            wp_enqueue_script( 'comment-reply' );        
                                                                
        $body_class = '';
        if ( ( yiw_get_option( 'responsive', 1 ) && ! $GLOBALS['is_IE'] ) || ( yiw_get_option( 'responsive', 1 ) && yiw_ieversion() >= 9 ) )   
            $body_class .= ' responsive'; 
             
    ?>


    <!-- [favicon] begin -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php yiw_favicon(); ?>" />
    <link rel="icon" type="image/x-icon" href="<?php yiw_favicon(); ?>" />
    <!-- [favicon] end --> 

    <?php wp_head() ?>
</head>

<body <?php body_class( "no_js" . $body_class ) ?>>
        
    <!-- START WRAPPER -->
    <div class="wrapper group">        
        <!-- START HEADER -->
        <div id="header" class="group">                
            <div class="group inner">
                <!-- START LOGO -->
                <div id="logo" class="group">
                    <?php if( yiw_get_option( 'use_logo' ) ): ?>
                        <a href="<?php echo home_url() ?>" title="<?php bloginfo('name') ?>"> 
                            <?php $logo = yiw_get_option( 'logo' ) ? yiw_get_option( 'logo' ) : get_template_directory_uri() . '/images/logo.png'; ?>
                            <img src="<?php echo $logo  ?>" alt="Logo <?php bloginfo('name') ?>" <?php if(yiw_get_option('logo_width')): ?>width="<?php echo yiw_get_option('logo_width') ?>"<?php endif ?> <?php if(yiw_get_option('logo_height')): ?>height="<?php echo yiw_get_option('logo_height') ?>"<?php endif ?> />
                        </a>
                    <?php else: ?>
                        <h1>
                            <?php
                            $website_text = str_replace( array( '[', ']'), array( '<span>', '</span>'), $website_name );
                            
                            echo '<a class="logo-text" href="', home_url(), '" title="', $website_title, '">', $website_text, '</a>';
                            ?>
                        </h1>
                    <?php endif ?>
                    <?php if ( yiw_get_option('logo_use_description') ) : ?><p><?php bloginfo('description') ?></p><?php endif ?>
                </div>
                <!-- END LOGO -->  
            
                <!-- START NAV -->
                <div id="nav" class="group">
                    <?php  
                        $nav_args = array(
                            'theme_location' => 'nav',
                            'container' => 'none',
                            'menu_class' => 'level-1',
                            'depth' => 3,   
                            'fallback_fb' => false
                        );
                        
                        wp_nav_menu( $nav_args ); 
                    ?>
                </div>
                
                <!-- END NAV -->     
            </div>
        </div>   
        <!-- END HEADER -->
        
        <!-- SLIDER -->
        <?php get_template_part( 'slider' ); ?>
        <!-- /SLIDER -->
        
        <!-- PAGE META -->
        <?php get_template_part( 'page-meta' ); ?> 
        <!-- /PAGE META -->