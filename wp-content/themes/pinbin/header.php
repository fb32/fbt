<!DOCTYPE html>
<html <?php language_attributes();?>>
<head>  
  	<meta charset="<?php bloginfo('charset'); ?>" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title><?php
  /*
   * Print the <title> tag based on what is being viewed.
   */
  global $page, $paged;

  wp_title( '|', true, 'right' );

  // Add the blog name.
  bloginfo( 'name' );

  // Add the blog description for the home/front page.
  $site_description = get_bloginfo( 'description', 'display' );
  if ( $site_description && ( is_home() || is_front_page() ) )
    echo " | $site_description";

  // Add a page number if necessary:
  if ( $paged >= 2 || $page >= 2 )
    echo ' | ' . sprintf( __( 'Page %s', 'pinbin' ), max( $paged, $page ) );

  ?></title>

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    
    <?php wp_head(); ?>
</head>

  <body <?php body_class(); ?>>

 	<!-- logo and navigation -->

  <nav>
    <div id="main-nav-wrapper"> 
        <div id="main-nav">
                <div id="logo">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>"  title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
              
                    <?php $pinbin_options = get_option('theme_pinbin_options'); ?>

                <?php if ( $pinbin_options['logo'] != '' ): ?>
                  <div id="logo">
                    <img src="<?php echo $pinbin_options['logo']; ?>" />
                  </div>
                <?php  endif; ?>
              </a>
              
         </div>  
          <?php if ( has_nav_menu( 'main_nav' ) ) { ?>
          <?php wp_nav_menu( array( 'theme_location' => 'main_nav' ) ); ?>
          <?php } else { ?>
          <ul><?php wp_list_pages("depth=3&title_li=");  ?></ul>
          <?php } ?> 

        </div>
    </div>
  </nav>  
<div class="clear"></div>
<div id="wrap">
  <div id="header"></div>