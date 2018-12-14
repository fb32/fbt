<?php
/**
 * The functions of theme 
 * 
 * @package WordPress
 * @subpackage YIW Themes
 * @since 1.0 
 */
 
// default theme setup
function yiw_theme_setup() {   
    global $wp_version;

    // This theme styles the visual editor with editor-style.css to match the theme style.
    add_editor_style( 'css/editor-style.css' );

    // This theme uses post thumbnails
    add_theme_support( 'post-thumbnails' );  

    // This theme uses the menues
    add_theme_support( 'menus' );          

    // Add default posts and comments RSS feed links to head
    add_theme_support( 'automatic-feed-links' );
    
    // Post Format support.                      
    //add_theme_support( 'post-formats', array( 'aside', 'gallery' ) ); 
    
    // Post Format support.                      
    //add_theme_support( 'post-formats', array( 'aside', 'gallery' ) ); // Your changeable header business starts here
    if ( ! defined( 'HEADER_TEXTCOLOR' ) )
        define( 'HEADER_TEXTCOLOR', '' );

    // No CSS, just IMG call. The %s is a placeholder for the theme template directory URI.
    if ( ! defined( 'HEADER_IMAGE' ) )
        define( 'HEADER_IMAGE', '%s/images/fixed-images/001.jpg' );

    // The height and width of your custom header. You can hook into the theme's own filters to change these values.
    // Add a filter to twentyten_header_image_width and twentyten_header_image_height to change these values.
    define( 'HEADER_IMAGE_WIDTH', apply_filters( 'yiw_header_image_width', 1000 ) );
    define( 'HEADER_IMAGE_HEIGHT', apply_filters( 'yiw_header_image_height', 338 ) );

    // We'll be using post thumbnails for custom header images on posts and pages.
    // We want them to be 940 pixels wide by 198 pixels tall.
    // Larger images will be auto-cropped to fit, smaller ones will be ignored. See header.php.
    //set_post_thumbnail_size( HEADER_IMAGE_WIDTH, HEADER_IMAGE_HEIGHT, true );    
    $image_sizes = array(
        'thumb_home_page'       => array( 220, 120, true ),
        'thumb_testimonial'     => array( 94,  94,  true ),
        'thumb-home-section'    => array( 217, 100, true ),   
        'blog_big'              => array( 500, 0,   true ),
    );
    
    yiw_set_sizes_theme_option( $image_sizes );   
    
    foreach ( $image_sizes as $id_size => $size )               
        add_image_size( $id_size, apply_filters( 'yiw_' . $id_size . '_width', $size[0] ), apply_filters( 'yiw_' . $id_size . '_height', $size[1] ), $size[2] ); 
    
//     global $_wp_additional_image_sizes;
//     yiw_debug($_wp_additional_image_sizes);
    
    // Don't support text inside the header image.
    if ( ! defined( 'NO_HEADER_TEXT' ) )
        define( 'NO_HEADER_TEXT', true );

    // Add a way for the custom header to be styled in the admin panel that controls
    // custom headers. See twentyten_admin_header_style(), below.
    if( version_compare( $wp_version, '3.4', ">=" ) )
        add_theme_support( 'custom-header', array( 'admin-head-callback' => 'yiw_admin_header_style' ) );
    else
        add_custom_image_header( '', 'yiw_admin_header_style' );

    // ... and thus ends the changeable header business.

    // Default custom headers packaged with the theme. %s is a placeholder for the theme template directory URI.
    register_default_headers( array(
        'design1' => array(
            'url' => '%s/images/fixed-images/001.jpg',
            'thumbnail_url' => '%s/images/fixed-images/thumb/001.jpg',
            /* translators: header image description */
            'description' => __( 'Design', 'yiw' ) . ' 1'
        ),
        'design2' => array(
            'url' => '%s/images/fixed-images/002.jpg',
            'thumbnail_url' => '%s/images/fixed-images/thumb/002.jpg',
            /* translators: header image description */
            'description' => __( 'Design', 'yiw' ) . ' 2'
        ),
        'design3' => array(
            'url' => '%s/images/fixed-images/003.jpg',
            'thumbnail_url' => '%s/images/fixed-images/thumb/003.jpg',
            /* translators: header image description */
            'description' => __( 'Design', 'yiw' ) . ' 3'
        ),
        'design4' => array(
            'url' => '%s/images/fixed-images/004.jpg',
            'thumbnail_url' => '%s/images/fixed-images/thumb/004.jpg',
            /* translators: header image description */
            'description' => __( 'Design', 'yiw' ) . ' 4'
        ),
        'design5' => array(
            'url' => '%s/images/fixed-images/005.jpg',
            'thumbnail_url' => '%s/images/fixed-images/thumb/005.jpg',
            /* translators: header image description */
            'description' => __( 'Design', 'yiw' ) . ' 5'
        ),
    ) );

    $locale = get_locale();      
    $locale_file = TEMPLATEPATH . "/languages/$locale.php";
    if ( is_readable( $locale_file ) )
        require_once( $locale_file ); 
    
    // This theme uses wp_nav_menu() in more locations.
    register_nav_menus(
        array(
            'nav'           => __( 'Navigation' ),
        )
    );
    
    // home row                      
    $sidebars = wp_get_sidebars_widgets();
    $cols = 0;  
    if ( ! empty( $sidebars['home-row'] ) )           
        foreach ( $sidebars['home-row'] as $widget )
            $cols++; 
        
    switch ( $cols ) {
        case 1  : $homerow_class = 'only-one';   break;
        case 2  : $homerow_class = 'two-fourth'; break;
        case 3  : $homerow_class = 'one-third';  break;
        case 4  : $homerow_class = 'one-fourth';  break;
        default : $homerow_class = 'one-fifth'; break;
    }      
    
    // sidebars registers            
    register_sidebar( yiw_sidebar_args( 'Default Sidebar', __( 'This sidebar will be shown in all pages with empty sidebar or without any sidebat set.', 'yiw' ) ) );      
	
    register_sidebar( yiw_sidebar_args( 'Blog Sidebar', __( 'The sidebar showed on page with Blog template', 'yiw' ) ) ); 
    
    register_sidebar( yiw_sidebar_args( 'Home Row', __( 'The row used in the home page so have three or more columns', 'yiw'), "widget $homerow_class", 'h2' ) );             
    register_sidebar( yiw_sidebar_args( 'Services Sidebar', __( 'The sidebar used in Services Single Template.', 'yiw'), 'widget', 'h3' ) );            
    register_sidebar( yiw_sidebar_args( 'Testimonials Sidebar', __( 'The sidebar used in Testimonials Single Template.', 'yiw'), 'widget', 'h3' ) );             
    
    do_action( 'yiw_register_sidebars' );   
    
    // footer sidebars
    for( $i = 1; $i <= yiw_get_option( 'footer_rows', 0 ); $i++ )
        register_sidebar( yiw_sidebar_args( "Footer Row $i", __( "The widget area nr. {$i} used in Footer section", 'yiw'), 'widget', 'h3' ) );                                                      
}                                            
 
add_filter( 'yiw_tabs_panel', create_function( '$tabs', 'return array();' ) );

if ( ! function_exists( 'yiw_admin_header_style' ) ) :
/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * Referenced via add_custom_image_header() in twentyten_setup().
 *
 * @since Twenty Ten 1.0
 */
function yiw_admin_header_style() {
?>
<style type="text/css">
/* Shows the same border as on front end */
#headimg {
    border-bottom: 1px solid #000;
    border-top: 4px solid #000;
}
/* If NO_HEADER_TEXT is false, you would style the text with these selectors:
    #headimg #name { }
    #headimg #desc { }
*/
</style>
<?php
}
endif; 

function yiw_excerpt_text( $text, $excerpt_length = 50, $excerpt_more = '' ) {
    $words = preg_split("/[\n\r\t ]+/", $text, $excerpt_length + 1, PREG_SPLIT_NO_EMPTY);
	if ( count($words) > $excerpt_length ) {
		array_pop($words);
		$text = implode(' ', $words);
		$text = $text . $excerpt_more;
	} else {
		$text = implode(' ', $words);
	}
	
	echo $text;
}

function yiw_set_sizes_theme_option( &$image_sizes ) {
    foreach ( $image_sizes as $id => $size ) {
        $s = maybe_unserialize( yiw_get_option( $id ) );       
        if ( isset( $s['width'] ) && ( ! empty( $s['width'] ) || $s['width'] == 0 ) && $s['width'] != $size[0] )
            $image_sizes[$id][0] = $s['width'];       
        if ( isset( $s['height'] ) && ( ! empty( $s['height'] ) || $s['height'] == 0 ) && $s['height'] != $size[1] )
            $image_sizes[$id][1] = $s['height'];
        
        if ( isset( $size[3] ) && ! empty( $size[3] ) )
            add_action( 'yiw_custom_styles', create_function( '', "echo '$size[3] { width:".$image_sizes[$id][0]."px;height:".$image_sizes[$id][1]."px; }';" ) );
    }      
}


/**
 * Different excerpt size
 * 
 * @return int
 */
function yiw_excerpt_length() {
    return 10;
}
function yiw_news_excerpt_length() {
    return 15;
}


/**
 * Different excerpt more text 
 * 
 * @return string
 */
function yiw_excerpt_more() {
    return '...';
}                

/**
 * Echo the excerpt with specific number of words
 * 
 * @param int|string $limit
 * @param string $more_text
 * 
 * @return string
 */
function yiw_excerpt( $limit = 25, $more_text = '', $echo = true ) {
    $limit_cb = create_function( '', "return $limit;" );
    $moret_cb = create_function( '', "return '$more_text';" );
    
    add_filter( 'excerpt_length', $limit_cb );   
    add_filter( 'excerpt_more', $moret_cb ); 
    
    if ( $echo )
        the_excerpt();
    else
        return get_the_excerpt();
    
    remove_filter( 'excerpt_length', $limit_cb );   
    remove_filter( 'excerpt_more', $moret_cb ); 
}                

function yiw_prettyphoto_style() {
    ?>
    <script type="text/javascript">
        var yiw_prettyphoto_style = '<?php echo yiw_get_option('portfolio_skin_lightbox') ?>';
    </script>
    <?php
}
add_action( 'wp_print_scripts', 'yiw_prettyphoto_style' );


/**
 * Get Page ID by page name
 * 
 * @param string $page_name
 * 
 * @return string|int
 */
function yiw_get_pageID_by_pagename( $page_name ) {
    global $wpdb;
    return $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = '$page_name'");
}        


/**
 * Return icon path by filename
 * 
 * @param string $icon
 * @param string $size
 * 
 * @return string
 */
function yiw_get_url_icon($icon, $size = 32)
{
    global $icons_name;
    
    $path = "/images/icons/{$icon}{$size}.png";
    
    if( file_exists( STYLESHEETPATH . $path ) )
        return get_template_directory_uri() . "/images/icons/{$icon}{$size}.png";
    else
        return get_template_directory_uri() . "/images/icons/{$icon}.png";
}  


/**
 * Return post content with read more link (if needed)
 * 
 * @param int|string $limit
 * @param string $more_text
 * 
 * @return string
 */
function yiw_content( $limit = 25, $more_text = '' ) {
    $content = get_the_content();     
    $content = explode( ' ', $content );  
/*
    if ( count( $content ) >= $limit ) {
        array_pop( $content );
        if( $more_text != "" )
            $readmore = implode( " ", $content ) . '<a class="read-more" href="' . get_permalink() . '">' . $more_text . '</a>';
        else
            $content = implode( " ", $content ) . ' &#91;...&#93;';
    } else
        $content = implode( " ", $content );    
*/
    if ( ! empty( $more_text ) ) {
        array_pop( $content );
        $more_text = '<a class="read-more" href="' . get_permalink() . '">' . $more_text . '</a>';
    }
    
    // split
    if ( count( $content ) >= $limit ) {
        $split_content = '';
        for ( $i = 0; $i < $limit; $i++ )
            $split_content .= $content[$i] . ' ';
        
        $content = $split_content . '...';
    } else {
        $content = implode( " ", $content );
    }    

    // TAGS UNCLOSED
    $tags = array();
    // get all tags opened
    preg_match_all("/(<([\w]+)[^>]*>)/", $content, $tags_opened, PREG_SET_ORDER);    
    foreach ( $tags_opened as $tag )
        $tags[] = $tag[2];
        
    // get all tags closed and remove it from the tags opened.. the rest will be closed at the end of the content
    preg_match_all("/(<\/([\w]+)[^>]*>)/", $content, $tags_closed, PREG_SET_ORDER);
    foreach ( $tags_closed as $tag )
        unset( $tags[ array_search( $tag[2], $tags ) ] );
    
    // close the tags
    if ( ! empty( $tags ) )
        foreach ( $tags as $tag )
            $content .= "</$tag>";     

    $content = preg_replace( '/\[.+\]/', '', $content );
    $content = preg_replace( '/<img[^>]+./', '', $content ); //remove images
    $content = apply_filters( 'the_content', $content ); 
    $content = str_replace( ']]>', ']]&gt;', $content );  
    
    return $content.$more_text;
}


/**
 * Return the page breadcrumbs
 * 
 */
function the_breadcrumb() {
    //if ( is_page_with_breadcrumb() ) :
    
        $delimiter = ' > ';
        $home = 'Home Page'; // text for the 'Home' link
        $before = '<a class="no-link current" href="#">'; // tag before the current crumb
        $after = '</a>'; // tag after the current crumb
     
        if ( !is_home() && !is_front_page() || is_paged() ) {
     
            echo '<div id="crumbs" class="theme_breadcumb">';
         
            global $post;
            $homeLink = site_url();
            echo '<a class="home" href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';
         
            if ( is_category() ) {
                global $wp_query;
                $cat_obj = $wp_query->get_queried_object();
                $thisCat = $cat_obj->term_id;
                $thisCat = get_category($thisCat);
                $parentCat = get_category($thisCat->parent);
                if ( $thisCat->parent != 0 ) 
    echo get_category_parents( $parentCat, TRUE, ' ' . $delimiter . ' ' );
                echo $before . 'Archive by category "' . single_cat_title('', false) . '"' . $after;
         
            } elseif ( is_day() ) {
                echo '<a class="no-link" href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
                echo '<a class="no-link" href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
                echo $before . get_the_time('d') . $after;
         
            } elseif ( is_month() ) {
                echo '<a class="no-link" href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
                echo $before . get_the_time('F') . $after;
         
            } elseif ( is_year() ) {
                echo $before . get_the_time('Y') . $after;
         
            } elseif ( is_single() && !is_attachment() ) {
                if ( get_post_type() != 'post' ) {
    $post_type = get_post_type_object(get_post_type());
    $slug = $post_type->rewrite;
    echo '<a class="no-link" href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a> ' . $delimiter . ' ';
    echo $before . get_the_title() . $after;
                } else {
    $cat = get_the_category(); $cat = $cat[0];
    echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
    echo $before . get_the_title() . $after;
                }
    
            } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
                $post_type = get_post_type_object(get_post_type());
                echo $before . $post_type->labels->singular_name . $after;
         
            } elseif ( is_attachment() ) {
                $parent = get_post($post->post_parent);
                $cat = get_the_category($parent->ID); $cat = $cat[0];
                echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
                echo '<a class="no-link" href="' . get_permalink($parent) . '">' . $parent->post_title . '</a> ' . $delimiter . ' ';
                echo $before . get_the_title() . $after;
         
            } elseif ( is_page() && !$post->post_parent ) {
                echo $before . get_the_title() . $after;
         
            } elseif ( is_page() && $post->post_parent ) {
                $parent_id  = $post->post_parent;
                $breadcrumbs = array();
                while ( $parent_id ) {
    $page = get_page($parent_id);
    $breadcrumbs[] = '<a class="no-link" href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
    $parent_id  = $page->post_parent;
                }
                $breadcrumbs = array_reverse($breadcrumbs);
                foreach ( $breadcrumbs as $crumb ) 
    echo $crumb . ' ' . $delimiter . ' ';
                echo $before . get_the_title() . $after;
         
            } elseif ( is_search() ) {
                echo $before . 'Search results for "' . get_search_query() . '"' . $after;
         
            } elseif ( is_tag() ) {
                echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;
         
            } elseif ( is_author() ) {
                global $author;
                $userdata = get_userdata($author);
                echo $before . 'Articles posted by ' . $userdata->display_name . $after;
         
            } elseif ( is_404() ) {
                echo $before . 'Error 404' . $after;
            }
         
            if ( get_query_var('paged') ) {
                if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) 
    echo ' (';
                echo $before . __('Page', 'yiw') . ' ' . get_query_var('paged') . $after;
                if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) 
    echo ')';
            }
         
            echo '<div class="breadcrumb-end"></div>';
            echo '</div>';
         
        }
        
    //endif;
}    

/**
 * Return the brigthness of a color
 * 
 * @return bool TRUE = is brigth; FALSE = is dark
 */
function yiw_is_bright( $hex ) {
    $hex = str_replace( '#', '', $hex );
    
    //break up the color in its RGB components
    $r = hexdec(substr($hex,0,2));
    $g = hexdec(substr($hex,2,2));
    $b = hexdec(substr($hex,4,2));
    
    //do simple weighted avarage
    //
    //(This might be overly simplistic as different colors are perceived
    // differently. That is a green of 128 might be brighter than a red of 128.
    // But as long as it's just about picking a white or black text color...)
    if($r + $g + $b > 382){
        return true; //bright color, use dark font
    }else{
        return false; //dark color, use bright font
    }
}                     
             
function yiw_nav_menu_awesome( $nav_menu ) {
    /* Welcome to the hell */
    $items = explode( '</li>', $nav_menu );
    
    //Unset the last item because is empty
    unset( $items[count( $items ) - 1] );
    
    $nav_menu = '';
    // Explode the menu because i need each single li separated
    foreach( $items as $item ) {
        $item .= '</li>';

        $reg_exp = '/\[([\w\-]*)?([\s]*?([\w\-]*)?)?\]/';
        preg_match_all( $reg_exp, $item, $matches, PREG_SET_ORDER );
        
        //If is empty means that there are no icons
        if( !empty( $matches ) ) {            
            $html = '';
            
            //Matches is a multidimensional array
            foreach( $matches as $sub ) {
                
                //first_match contains all the match, including braches
                $first_match = $sub[0];
                unset( $sub[0] );
                
                //Each $match contains the match, without braches
                foreach( $sub as $match ) {
                    $html .= $match . ' ';
                    
                    //Replace the match with braches, with the HTML code
                    $item = str_replace( $first_match, '<i class="' . trim( $html ) . '"></i>', $item );
                }
            }
            
        }
        
        //Append each menu item to the menu
        $nav_menu .= $item;
    }
    
    return $nav_menu;
}
add_filter( 'wp_nav_menu_items', 'yiw_nav_menu_awesome' );

function yiw_border_radius_header() {                   
    global $post; 
    
    $there_is_map = false;
    if ( isset( $post->ID ) && get_post_meta( $post->ID, '_show_map', true ) == 'yes' && get_post_meta( $post->ID, '_map_url', true ) != '' )  
        $there_is_map = true;
    
    if ( yiw_slider_type() == 'fixed-image' || yiw_slider_type() == 'layers' )
        $is_empty = false;
    else
        $is_empty = yiw_is_empty();
                                                                              
    if( ( yiw_slider_type() == 'none' || yiw_slider_type() == '' || $is_empty ) && ! $there_is_map ) :
    ?>
    #header .inner {
        -webkit-border-bottom-left-radius: 10px; -moz-border-radius-bottomleft: 10px; border-bottom-left-radius: 10px;
        -webkit-border-bottom-right-radius: 10px; -moz-border-radius-bottomright: 10px; border-bottom-right-radius: 10px;
        margin-bottom:15px;
    }
    <?php
    endif;
}
add_action( 'yiw_custom_styles', 'yiw_border_radius_header' );

// decide the layout of the theme, changing the class of body
function yiw_theme_layout_body_class( $classes ) {
        global $yiw_mobile;
        if($yiw_mobile->isMobile() && !$yiw_mobile->isIpad()){
            $classes[] = 'stretched-layout';
        } else {
            $classes[] = yiw_get_option( 'theme_layout', 'stretched' ) . '-layout';
        }
	return $classes;		
}
add_filter( 'body_class', 'yiw_theme_layout_body_class' );
?>