<?php
/**
 * Pinbin functions
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 */	
    
if ( ! isset( $content_width ) )
	$content_width = 620; /* pixels */

if ( ! function_exists( 'pinbin_setup' ) ):
	
/**
 * Sets up theme defaults and registers support for various WordPress features.
 */

function pinbin_setup() {
	
	/**
	 * Custom Theme Options
	 */
	require( get_template_directory() . '/options/theme-options.php' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

		// post thumbnails
	add_theme_support( 'post-thumbnails' );
		add_image_size('summary-image', 300, 9999);
		add_image_size('detail-image', 750, 9999);

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on Buttercream, use a find and replace
	 * to change 'buttercream' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'pinbin', get_template_directory() . '/languages' );

	$locale = get_locale();
	$locale_file = get_template_directory() . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'main_nav' => __( 'Main Menu', 'pinbin' ),
	) );

	/**
	* Add support for editor style
	*/
	add_editor_style();

	/**
	 * Add support for custom backgrounds
	 */
	$args = array(
		'default-color' => '#ececec',
		'default-image' => get_template_directory_uri() . '/images/wood.png',
	);

	$args = apply_filters( 'pinbin_custom_background_args', $args );

	if ( function_exists( 'wp_get_theme' ) ) {
		add_theme_support( 'custom-background', $args );
	}
	else {
		define( 'BACKGROUND_COLOR', $args['default-color'] );
		define( 'BACKGROUND_IMAGE', $args['default-image'] );
		add_theme_support( 'custom-background', $args );
	}
}	
endif;
add_action( 'after_setup_theme', 'pinbin_setup' );

function pinbin_widgets_init() {
     //setup footer widget area
	register_sidebar(array(
    		'name' => 'Footer',
    		'id'   => 'pinbin_footer',
    		'description'   => 'Footer Widget Area',
    		'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-copy">',
    		'after_widget'  => '</div></div>',
    		'before_title'  => '<h3>',
    		'after_title'   => '</h3>'
    	)
	);
}
add_action( 'widgets_init', 'pinbin_widgets_init' );

function pinbin_scripts() { 
	global $post;

	$pinbin_options = get_option('pinbin_theme_options');

	wp_enqueue_style( 'style', get_stylesheet_uri() );

	wp_enqueue_script( 'jquery' );

	wp_enqueue_script( 'pinbin.functions', get_template_directory_uri() . '/js/functions.js', array( 'jquery-masonry' ), '20130605', true );

	wp_enqueue_script( 'jquery-masonry' );

	wp_enqueue_script( 'mobile-nav', get_template_directory_uri() . '/js/mobile-nav.min.js', array( 'jquery' ), '20130605', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}

add_action( 'wp_enqueue_scripts', 'pinbin_scripts' ); 
