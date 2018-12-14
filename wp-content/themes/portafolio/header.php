<?php $options = get_option( 'portafolio_theme_settings' ); ?>
<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">

<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?> | <?php bloginfo( 'description' ) ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
<meta name="robots" content="follow, all" /> 
<?php if(is_tax ('portfolio_cats')) {?>
 <meta name="description" content="<?php echo strip_tags(category_description()); ?>" />
<?php  } ?>    
<!-- Stylesheet & Favicon -->
<link rel="icon" type="image/png" href="<?php bloginfo('template_directory') ?>/<?php echo $options['favicon']; ?>" />

<?php if(is_page_template( 'template-portfolio.php') || is_tax ('portfolio_cats')) { ?>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory') ?>/style.css" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory') ?>/css/prettyphoto.css" />
<?php } else { ?>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" /> <?php } ?>
<!-- Google Fonts -->
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory') ?>/style-responsive.css" />
<!-- WP Head -->
<?php if ( is_single() || is_page() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>


<?php if(is_front_page() || is_tax ('portfolio_cats') ) { ?>
 <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory') ?>/js/masonry/style.css" />
 <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory') ?>/libs/fancybox/jquery.fancybox.css" />
 <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory') ?>/libs/fancybox/helpers/jquery.fancybox-buttons.css" />
<?php } ?>

<?php 
// Get And Show Analytics Code 
//echo stripslashes($options['analytics']); 
?>

</head>
<body <?php body_class($class); ?>>
<!--<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/fr_FR/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>-->
<div id="header-wrap">
    <div id="header" class="clearfix">
        <div id="logo">
        	<?php if($options['logo'] !='') { ?>
            <a  style="float : left" href="<?php bloginfo( 'url' ) ?>/" title="<?php bloginfo( 'name' ) ?>" rel="home"><img src="<?php bloginfo('template_directory') ?>/<?php echo $options['logo']; ?>" alt="<?php bloginfo( 'name' ) ?>" /></a>
            <?php } else { ?>
            <?php if (is_front_page()) { ?>
            <h1><a href="<?php bloginfo( 'url' ) ?>/" title="<?php bloginfo( 'name' ) ?>" rel="home"><?php bloginfo( 'name' ) ?></a></h1>
            <?php } else { ?>
            <h2><a href="<?php bloginfo( 'url' ) ?>/" title="<?php bloginfo( 'name' ) ?>" rel="home"><?php bloginfo( 'name' ) ?></a></h2>
            <?php } } ?>
            <h1><a href="<?php bloginfo( 'url' ) ?>/"><?php bloginfo( 'name' ) ?><br /><span><?php bloginfo( 'description' ) ?></span></a></h1>
        </div>
        <!-- END logo -->
        
        <div id="navigation" class="clearfix">
            <?php
            //define main navigation
            wp_nav_menu( array(
                'theme_location' => 'main nav',
                'sort_column' => 'menu_order',
                'menu_class' => 'sf-menu',
                'fallback_cb' => 'default_menu'
            )); ?>

        </div>
        <!-- END navigation -->   
    </div><!-- END header -->
</div><!-- END header-wrap -->
<div id="wrap">