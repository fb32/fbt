<?php
/**
 * COnfiguration of the theme 
 * 
 * @package WordPress
 * @subpackage YIW Themes
 * @since 1.0 
 */ 
 
/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * Used to set the width of images and content. Should be equal to the width the theme
 * is designed for, generally via the style.css stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 640;   

define( 'YIW_THEME_NAME', 'Memento Free' ); // The theme name
define( 'YIW_THEME_FOLDER_NAME', 'Memento Free' ); // The theme folder name
define( 'NOTIFIER_XML_FILE', 'http://update.yithemes.com/memento-free.xml' ); // The remote notifier XML file containing the latest version of the theme and changelog

// minimum version compatible with the theme
define( 'YIW_MINIMUM_WP_VERSION', '3.0' );

// default layout page
define( 'YIW_DEFAULT_LAYOUT_PAGE', 'sidebar-right' );   


/**
 * The items of Theme Options. The ID of each item, must be the same with the name of own file options (except -options.php), 
 * into the "inc/options" folder.
 */ 
$yiw_theme_options_items = array( 
    'general' => __( 'General', 'yiw' ), 
    'home' => __( 'Home page', 'yiw' ),
    'sections' => __( 'Sections', 'yiw' ),
    'premium' => __( 'Premium', 'yiw' ),
);         

$yiw_sliders = array(
    'none'        => __( 'None', 'yiw' ),
    'fixed-image' => __( 'Fixed Image', 'yiw' ),
);           

$yiw_awesome_icons = array(
    "icon-glass"=> "Glass",
    "icon-music"=> "Music",
    "icon-search"=> "Search",
    "icon-envelope"=> "Envelope",
    "icon-heart"=> "Heart",
    "icon-heart-empty"=> "Heart Empty",
    "icon-star"=> "Star",
    "icon-star-empty"=> "Star empty",
    "icon-user"=> "User",
    "icon-film"=> "Film",
    "icon-th-large"=> "Th large",
    "icon-th"=> "Th",
    "icon-th-list"=> "Th list",
    "icon-ok"=> "Ok",
    "icon-remove"=> "Remove",
    "icon-zoom-in"=> "Zoom in",
    "icon-zoom-out"=> "Zoom out",
    "icon-off"=> "Off",
    "icon-signal"=> "Signal",
    "icon-cog"=> "Cog",
    "icon-trash"=> "Trash",
    "icon-home"=> "Home",
    "icon-file"=> "File",
    "icon-time"=> "Time",
    "icon-road"=> "Road",
    "icon-download-alt"=> "Download alt",
    "icon-download"=> "Download",
    "icon-upload"=> "Upload",
    "icon-inbox"=> "Inbox",
    "icon-play-circle"=> "Play circle",
    "icon-repeat"=> "Repeat",
    "icon-refresh"=> "Refresh",
    "icon-list-alt"=> "List alt",
    "icon-lock"=> "Lock",
    "icon-flag"=> "Flag",
    "icon-headphones"=> "Headphones",
    "icon-volume-off"=> "Volume off",
    "icon-volume-down"=> "Volume down",
    "icon-volume-up"=> "Volume up",
    "icon-qrcode"=> "QR code",
    "icon-barcode"=> "Bar code",
    "icon-tag"=> "Tag",
    "icon-tags"=> "Tags",
    "icon-book"=> "Book",
    "icon-bookmark"=> "Bookmark",
    "icon-print"=> "Print",
    "icon-camera"=> "Camera",
    "icon-font"=> "Font",
    "icon-bold"=> "Bold",
    "icon-italic"=> "Italic",
    "icon-text-height"=> "Text height",
    "icon-text-width"=> "Text width",
    "icon-align-left"=> "Align left",
    "icon-align-center"=> "Align center",
    "icon-align-right"=> "Align right",
    "icon-align-justify"=> "Align justify",
    "icon-list"=> "List",
    "icon-indent-left"=> "Indent left",
    "icon-indent-right"=> "Indent right",
    "icon-facetime-video"=> "Facetime video",
    "icon-picture"=> "Picture",
    "icon-pencil"=> "Pencil",
    "icon-map-marker"=> "Map marker",
    "icon-adjust"=> "Adjust",
    "icon-tint"=> "Tint",
    "icon-edit"=> "Edit",
    "icon-share"=> "Share",
    "icon-check"=> "Check",
    "icon-move"=> "Move",
    "icon-step-backward"=> "Step backward",
    "icon-fast-backward"=> "Fast backward",
    "icon-backward"=> "Backward",
    "icon-play"=> "Play",
    "icon-pause"=> "Pause",
    "icon-stop"=> "Stop",
    "icon-forward"=> "Forward",
    "icon-fast-forward"=> "Fast forward",
    "icon-step-forward"=> "Step forward",
    "icon-eject"=> "Eject",
    "icon-chevron-left"=> "Chevron left",
    "icon-chevron-right"=> "Chevron right",
    "icon-plus-sign"=> "Plus sign",
    "icon-minus-sign"=> "Minus sign",
    "icon-remove-sign"=> "Remove sign",
    "icon-ok-sign"=> "Ok sign",
    "icon-question-sign"=> "Question sign",
    "icon-info-sign"=> "Info sign",
    "icon-screenshot"=> "Screenshot",
    "icon-remove-circle"=> "Remove circle",
    "icon-ok-circle"=> "Ok circle",
    "icon-ban-circle"=> "Ban circle",
    "icon-arrow-left"=> "Arrow left",
    "icon-arrow-right"=> "Arrow right",
    "icon-arrow-up"=> "Arrow up",
    "icon-arrow-down"=> "Arrow down",
    "icon-share-alt"=> "Share alt",
    "icon-resize-full"=> "Resize full",
    "icon-resize-small"=> "Resize small",
    "icon-plus"=> "Plus",
    "icon-minus"=> "Minus",
    "icon-asterisk"=> "Asterisk",
    "icon-exclamation-sign"=> "Exclamation sign",
    "icon-gift"=> "Gif",
    "icon-leaf"=> "Leaf",
    "icon-fire"=> "Fire",
    "icon-eye-open"=> "Eye open",
    "icon-eye-close"=> "Eye close",
    "icon-warning-sign"=> "Warning sign",
    "icon-plane"=> "Plane",
    "icon-calendar"=> "Calendar",
    "icon-random"=> "Random",
    "icon-comment"=> "Comment",
    "icon-magnet"=> "Magnet",
    "icon-chevron-up"=> "Chevron up",
    "icon-chevron-down"=> "Chevron down",
    "icon-retweet"=> "Retweet",
    "icon-shopping-cart"=> "Shopping cart",
    "icon-folder-close"=> "Folder close",
    "icon-folder-open"=> "Folder open",
    "icon-resize-vertical"=> "Resize vertical",
    "icon-resize-horizontal"=> "Resize horizontal",
    'icon-key' => "Key"
);
ksort( $yiw_awesome_icons );

// define the links to rss url for dashboard
define( 'YIW_RSS_FORUM_URL', 'http://www.yourinspirationweb.com/tf/support/forum/feed.php?fid=3' );
define( 'YIW_RSS_URL', 'http://feeds.feedburner.com/yourinspirationweb/HuJt' );
?>