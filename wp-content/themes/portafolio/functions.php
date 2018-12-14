<?php
// theme admin
include('functions/theme-admin.php');
include('functions/better-excerpts.php');
include('functions/slides-meta.php');

// get scripts
add_action('wp_enqueue_scripts','my_theme_scripts_function');

function my_theme_scripts_function() {
	
	/*wp_deregister_script('jquery'); 
	wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"), false, '1.4.2'); 
	wp_enqueue_script('jquery');*/
	wp_enqueue_script('jquery', get_stylesheet_directory_uri() . '/js/jquery.js');
    //wp_enqueue_script('prettyPhoto', get_stylesheet_directory_uri() . '/js/jquery.prettyPhoto.js');		
	wp_enqueue_script('superfish', get_stylesheet_directory_uri() . '/js/superfish.js');
	wp_enqueue_script('supersubs', get_stylesheet_directory_uri() . '/js/supersubs.js');
   // wp_enqueue_script('modernizr', get_stylesheet_directory_uri() . '/js/masonry/modernizr.custom.js');
	if(is_front_page()) :
	//wp_enqueue_script('nivoSlider', get_stylesheet_directory_uri() . '/js/jquery.nivo.slider.pack.js');
	endif;
    if(is_front_page() || is_tax ('portfolio_cats') || is_single() ) {
         wp_enqueue_script( 'easing', get_stylesheet_directory_uri() . '/libs/fancybox/jquery.easing-1.3.js','', false, true ); 
         wp_enqueue_script( 'fancy', get_stylesheet_directory_uri() . '/libs/fancybox/jquery.fancybox.pack.js','', false, true ); 
         wp_enqueue_script( 'fancy-buttons', get_stylesheet_directory_uri() . '/libs/fancybox/helpers/jquery.fancybox-buttons.js','', false, true ); 
     }   
    //wp_enqueue_script( 'masonry', get_stylesheet_directory_uri() . '/js/masonry/jquery.masonry.min.js','', false, true );
         wp_enqueue_script( 'masonrypkgd', get_stylesheet_directory_uri() . '/js/masonry/jquery.masonry.pkgd.min.js','', false, true ); 
         wp_enqueue_script( 'imagesloaded', get_stylesheet_directory_uri() . '/js/masonry/imagesloaded.js','', false, true );         
        // wp_enqueue_script( 'classie', get_stylesheet_directory_uri() . '/js/masonry/classie.js','', false, true ); 
        // wp_enqueue_script( 'AnimOnScroll', get_stylesheet_directory_uri() . '/js/masonry/AnimOnScroll.js','', false, true ); 
     
    wp_enqueue_script( 'infinitescroll', get_stylesheet_directory_uri() . '/js/masonry/jquery.infinitescroll.min.js','', false, true );
   // wp_enqueue_script( 'mpu', get_stylesheet_directory_uri() . '/libs/mpu/jquery.mpu.min.js'/*,'', false, true*/ );
    wp_enqueue_script('custom', get_stylesheet_directory_uri() . '/js/custom.js');
    
}

// Limit Post Word Count
function new_excerpt_length($length) {
	return 50;
}
add_filter('excerpt_length', 'new_excerpt_length');

//Replace Excerpt Link
function new_excerpt_more($more) {
       global $post;
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');

//Activate post-image functionality (WP 2.9+)
if ( function_exists( 'add_theme_support' ) )
add_theme_support( 'post-thumbnails' );

// featured image sizes
if ( function_exists( 'add_image_size' ) ) {
add_image_size( 'full-size',  9999, 9999, false );
add_image_size( 'post-image',  150, 150, true );
add_image_size( 'related-posts',  50, 50, true );
add_image_size( 'portfolio',  215, 160, true );
add_image_size( 'mid-portfolio',  340, 9999);
add_image_size( 'single-portfolio',  685, 9999, true );
add_image_size( 'featured-image',  920, 350, true );
}

// Enable Custom Background
add_custom_background();

// register navigation menus
register_nav_menus(
	array(
	'main nav'=>__('Main Nav'),
	)
);
/// add home link to menu
function home_page_menu_args( $args ) {
$args['show_home'] = true;
return $args;
}
add_filter( 'wp_page_menu_args', 'home_page_menu_args' );

// menu fallback
function default_menu() {
	require_once (TEMPLATEPATH . '/includes/default-menu.php');
}

add_action( 'init', 'create_post_types' );
function create_post_types() {
// Define Post Type For Homepage Highlights
  register_post_type( 'highlights',
    array(
      'labels' => array(
		'name' => _x( 'HP Highlights', 'post type general name' ), // Tip: _x('') is used for localization
		'singular_name' => _x( 'Homepage Highlight', 'post type singular name' ),
		'add_new' => _x( 'Add New', 'Homepage Highlight' ),
		'add_new_item' => __( 'Add New Homepage Highlight' ),
		'edit_item' => __( 'Edit Homepage Highlight' ),
		'new_item' => __( 'New Homepage Highlight' ),
		'view_item' => __( 'View Homepage Highlight' ),
		'search_items' => __( 'Search Homepage Highlights' ),
		'not_found' =>  __( 'No Homepage Highlights found' ),
		'not_found_in_trash' => __( 'No Homepage Highlights found in Trash' ),
		'parent_item_colon' => ''
      ),
      'public' => true,
	  'exclude_from_search' => true,
	  'supports' => array('title','editor'),
    )
  );
// Define Post Type For Slider
  register_post_type( 'slides',
    array(
      'labels' => array(
		'name' => _x( 'Slides', 'post type general name' ), // Tip: _x('') is used for localization
		'singular_name' => _x( 'Slide', 'post type singular name' ),
		'add_new' => _x( 'Add New', 'Slide' ),
		'add_new_item' => __( 'Add New Slide' ),
		'edit_item' => __( 'Edit Slide' ),
		'new_item' => __( 'New Slide' ),
		'view_item' => __( 'View Slide' ),
		'search_items' => __( 'Search Slides' ),
		'not_found' =>  __( 'No Slides found' ),
		'not_found_in_trash' => __( 'No Slides found in Trash' ),
		'parent_item_colon' => ''
      ),
      'public' => true,
	  'exclude_from_search' => true,
	  'supports' => array('title','thumbnail'),
    )
  );

// Define Post Type For Portfolio
register_post_type( 'Portfolio',
    array(
      'labels' => array(
        'name' => __( 'Portfolio' ),
        'singular_name' => __( 'Portfolio' ),		
		'add_new' => _x( 'Add New', 'Portfolio Project' ),
		'add_new_item' => __( 'Add New Portfolio Project' ),
		'edit_item' => __( 'Edit Portfolio Project' ),
		'new_item' => __( 'New Portfolio Project' ),
		'view_item' => __( 'View Portfolio Project' ),
		'search_items' => __( 'Search Portfolio Projects' ),
		'not_found' =>  __( 'No Portfolio Projects found' ),
		'not_found_in_trash' => __( 'No Portfolio Projects found in Trash' ),
		'parent_item_colon' => ''
		
      ),
      'public' => true,
	  'supports' => array('title','editor','thumbnail', 'comments' ),
	  'query_var' => true,
	  'rewrite' => array( 'slug' => 'portfolio' ),
    )
  );
}
//Create portfolio projects
add_action( 'init', 'create_taxonomies' );
function create_taxonomies() {
	$cat_labels = array(
		'name' => __( 'Categories' ),
		'singular_name' => __( 'Category' ),
		'search_items' =>  __( 'Search Categories' ),
		'all_items' => __( 'All Categories' ),
		'parent_item' => __( 'Parent Category' ),
		'parent_item_colon' => __( 'Parent Category:' ),
		'edit_item' => __( 'Edit Category' ),
		'update_item' => __( 'Update Category' ),
		'add_new_item' => __( 'Add New Category' ),
		'new_item_name' => __( 'New Category Name' ),
		'choose_from_most_used'	=> __( 'Choose from the most used categories' )
	); 	

	register_taxonomy('portfolio_cats','portfolio',array(
		'hierarchical' => true,
		'labels' => $cat_labels,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'portfolio-category' ),
	));	
}


//Register Sidebars
if ( function_exists('register_sidebar') )
register_sidebar(array(
'name' => 'Sidebar',
'description' => 'Widgets in this area will be shown in the sidebar.',
'before_widget' => '<div class="sidebar-box clearfix">',
'after_widget' => '</div>',
'before_title' => '<h4>',
'after_title' => '</h4>',
));

// functions run on activation --> important flush to clear rewrites
if ( is_admin() && isset($_GET['activated'] ) && $pagenow == 'themes.php' ) {
	$wp_rewrite->flush_rules();

}


// My Functions





/****************** ZONES WIDGETISABLES *********************************/
if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Slider Home',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h6>',
		'after_title' => '</h6>',
	));
	
	register_sidebar(array(
		'name' => 'Footer',
		'before_widget' => '<div id="footerSearch">',
		'after_widget' => '</div>',
		'before_title' => '<h6>',
		'after_title' => '</h6>',
	));
  
	
	register_sidebar(array(
		'name' => 'Login Zone',
		'before_widget' => '<div id="loginWidget">',
		'after_widget' => '</div>',
		'before_title' => '<h6>',
		'after_title' => '</h6>',
	)) ; 
  	
 }
 
/****************************************************************************/ 
 
 
 
 function add_thumbnail_cat($html){
 
	global $post;
	
	$args = array(
		'post_type' =>'portfolio',
		'posts_per_page' => 1,
		//'cat' => 19,		
		'orderby' => 'DESC',
		'tax_query' => array(
    array(
      'taxonomy' => 'portfolio_cats',
      'field' => 'id',
      'terms' => 11 // Where term_id of Term 1 is "1".
    )
  )
	);
	$portfolio_posts = new WP_Query($args);

}
//add_filter('wp_list_categories','add_thumbnail_cat',10,1);
 function show_active_category($text) {

	global $post;
	$args = array(
		'post_type' =>'portfolio',
		'numberposts' => 4,
		'orderby' => 'ASC'
	);
	$portfolio_posts = get_posts($args);

		foreach( $categories as $catid ) {
			$cat = get_category($catid);
		//	if(preg_match('#>' . $cat->name . '</a>#', $text)) {
				$text = str_replace('>' . $cat->name . '</a>', ' class="active-cat">' . $cat->name . '</a>', $text);
		//	}
		}

//	}

	return $text;

}

//add_filter('wp_list_categories', 'show_active_category');

 function add_class_next_post_link($html){
    $html = str_replace('<a','<a class="next"',$html);
    return $html;
}
add_filter('next_post_link','add_class_next_post_link',10,1);

function add_class_previous_post_link($html){
    $html = str_replace('<a','<a class="prev"',$html);
    return $html;
}
add_filter('previous_post_link','add_class_previous_post_link',10,1); 

 function add_class_next_posts_link($html){
    $html = str_replace('<a','<a class="next"',$html);
    echo $html;
}
add_filter('next_posts_link','add_class_next_posts_link',10,1);

function add_class_previous_posts_link($html){
    $html = str_replace('<a','<a class="prev"',$html);
    return $html;
}
add_filter('previous_posts_link','add_class_previous_posts_link',10,1); 

function my_mail_from( $email ) { return get_bloginfo("admin_email"); } 
add_filter( 'wp_mail_from', 'my_mail_from' );
 
function my_mail_from_name( $name ) { return get_bloginfo("name"); }
add_filter( 'wp_mail_from_name', 'my_mail_from_name' ); 


// Filtre qui permet de changer l'url du logo  
function custom_url_login()  
{  
    return get_bloginfo( 'siteurl' ); // On retourne l'index du site  
}  
add_filter('login_headerurl', 'custom_url_login'); 

    // Filtre qui permet de changer l'attribut title du logo  
    function custom_title_login($message)  
    {  
        return get_bloginfo('description'); // On retourne la description du site 
    } 
    add_filter('login_headertitle', 'custom_title_login');  
    
    // Fonction qui permet d'ajouter du contenu juste au dessus de la balise  
    function add_footer_login()  
    {  
        echo '  
    <p id="contact"></p>'; 
    } 
    add_action('login_footer','add_footer_login');
    
      
// Fonction qui insere le lien vers le css qui surchargera celui d'origine  
function custom_login_css()  
{ 
    $tpld = get_bloginfo('template_directory'); 
    echo '  
<link rel="stylesheet" type="text/css" href="'.$tpld.'/style-login.css">'; 
} 
add_action('login_head', 'custom_login_css'); 



 function mig($gal,$tax){ return; 


global $wpdb;  
$sql = $wpdb->prepare("SELECT * FROM ip_ngg_pictures WHERE galleryid=$gal limit 110");  
$messages = $wpdb->get_results($sql);
$i = 0;
foreach ($messages as $message){


   ////// DEBUT TABLE POSTS
   
  //NOUVEAU POST PORTFOLIO
   
  $wpdb->insert( $wpdb->posts, array(
   'post_author' => 1,
   'post_date' => $message->imagedate,
   'post_date_gmt' => $message->imagedate, 
   'post_title' =>  $message->description,
   'post_status' => 'publish',
   'comment_status' => 'open',
   'ping_status' => 'open',
   'post_name' => $message->image_slug,
   'post_modified' => $message->imagedate,
   'post_modified_gmt' => $message->imagedate, 
   'post_type' => 'portfolio'
   )); 
   
    // UPDATE DE POST CI-DESSUS 
   $lastPostID = mysql_insert_id();
   $guid =  'http://fred.myftp.org/ip/?post_type=portfolio&#038;p='.$lastPostID;
   $wpdb->query( $wpdb->prepare("UPDATE $wpdb->posts SET guid = %s where ID = %d",$guid,$lastPostID));
    
    
   $sql1 = "SELECT ID FROM $wpdb->posts WHERE post_type='attachment' and post_name like '".substr($message->filename,0,-4)."%' limit 1";  
   $thumbid = $wpdb->get_var($sql1);
 
   $wpdb->query( $wpdb->prepare("UPDATE $wpdb->posts SET  post_title = %s where post_type='attachment' and ID = %d ",$message->description,$thumbid));

   
   ////// FIN TABLE POSTS
   
   
   ////// DEBUT TABLE POSTMETA
  $wpdb->insert( $wpdb->postmeta, array(
   'post_id' => $lastPostID,
   'meta_key' => '_edit_last',
   'meta_value' => 1
   ));
   $wpdb->insert( $wpdb->postmeta, array(
   'post_id' => $lastPostID,
   'meta_key' => '_edit_lock',
   'meta_value' => (time())+$i.":1"
   ));    
    $wpdb->insert( $wpdb->postmeta, array(
     'post_id' => $lastPostID,
     'meta_key' => '_thumbnail_id',
     'meta_value' => $thumbid
     ));  

    
    ////// FIN TABLE POSTMETA
    
    
 $wpdb->insert( $wpdb->term_relationships, array(
   'object_id' => $lastPostID,
   'term_taxonomy_id' => $tax,
   'term_order' => 0
   )); 
 
  $wpdb->query( $wpdb->prepare("UPDATE $wpdb->term_taxonomy SET count=count+1 where term_taxonomy_id = %d",$tax));

 
   $i++;
   
}
//$wpdb->insert( $wpdb->posts, array( 'post_title' => $mytitle ) );


/*UPDATE `ip_options_copy`
SET `option_value` = REPLACE(option_value, '192.168.1.2', 'fred.myftp.org')
WHERE `meta_key` LIKE 'MonCustomField'; 

UPDATE `ip_ngg_pictures`
SET `galleryid` = REPLACE(galleryid, '6', '22')

*/ 

}

//******************* WOOCOMMERCE ******************************/
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);



add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);

function my_theme_wrapper_start() {
  echo '<section id="main">';
}

function my_theme_wrapper_end() {
  echo '</section>';
}


add_theme_support( 'woocommerce' );

//******************* FIN WOOCOMMERCE ******************************/
remove_action('wp_head', 'wp_generator');



/********************* ANTI SPAN INSCRIPTION **********************/
function registration_filter_get_pattern()
{
$A=array();
// activer selon vos besoins
$A[]='/\.ru$/'; // bannir les RU
$A[]='/\.cn$/'; // bannir les CN
$A[]='/nscream\.com$/'; // bannir les CN
// mode d'emploi : consulter "preg_match"

return $A;
}
function registration_filter_ban($login, $email, $errors)
{
$is_Banned=0;
$Patterns=registration_filter_get_pattern();
foreach($Patterns as $pat)
{
$is_found=preg_match($pat, $email);
if($is_found>0){$is_Banned++;}
}
// --------------------
if($is_Banned>0)
{
$errors->add('email_banned','<strong>ERROR</strong>: This email address is not allowed, please choose another one.');
}

}
// ---------------------------------------
// hook
add_action('register_post', 'registration_filter_ban', 10, 3);
       
?>