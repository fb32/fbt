<?php        
/**
 * @package WordPress
 * @subpackage Sheeva
 * @since 1.0
 */
 
/*
Template Name: Home
*/

global $wp_query;

if ( ( is_home() || is_front_page() ) && get_option( 'show_on_front' ) == 'posts' || $wp_query->is_posts_page ) {
    global $yiw_is_posts_page;
    $yiw_is_posts_page = true;
    get_template_part( 'blog' ); 
    die;
}       

if( ( is_home() || is_front_page() ) && get_option( 'show_on_front' ) == 'posts' || is_home() && get_option( 'page_for_posts' ) != '0' ) {
    $blog_type = yiw_get_option('blog_type');
    get_template_part( 'blog' ); 
    die;
}

get_header();      
                    
$show_row = yiw_get_option( 'show_home_row' );
$show_blog = yiw_get_option( 'show_home_blog' );
$show_testimonials = yiw_get_option( 'show_home_testimonials' );
$show_services = yiw_get_option( 'show_home_services' );

if( $show_row ) {
    get_template_part( 'home', 'row' );
}

if( $show_blog ) {
    get_template_part( 'home', 'blog' );
}

if( $show_testimonials ) {
    get_template_part( 'home', 'testimonials' );
}

if( $show_services ) {
    get_template_part( 'home', 'services' );
}

get_template_part( 'home', 'content' );

get_footer(); ?>