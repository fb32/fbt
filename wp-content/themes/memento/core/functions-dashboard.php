<?php                   
/**
 * Define the widgets dashboard
 *
 * @package WordPress
 * @subpackage YIW Themes
 * @since 1.0
 */     
       
/**
 * Add the widgets on dashboard
 * 
 * @since 1.0  
 */            
function yiw_dashboard_widget_setup() {
    wp_add_dashboard_widget( 'yiw_news', __( 'News from the YIW Blog' , 'yiw' ), 'yiw_dashboard_news' );  	
	// Globalize the metaboxes array, this holds all the widgets for wp-admin

	global $wp_meta_boxes;
	
	$widgets_on_side = array(
        'yiw_news'
    );
	
    foreach( $widgets_on_side as $meta ) {
        $temp = $wp_meta_boxes['dashboard']['normal']['core'][$meta];
        unset($wp_meta_boxes['dashboard']['normal']['core'][$meta]);
        $wp_meta_boxes['dashboard']['side']['core'][$meta] = $temp;
    }
}             
       
/**
 * The widget for blog news
 * 
 * @since 1.0  
 */  
function yiw_dashboard_news() {
	$args = array( 'show_author' => 1, 'show_date' => 1, 'show_summary' => 1, 'items'=>3 );
	wp_widget_rss_output( YIW_RSS_URL, $args );
}