<?php
global $wp_query;
if( is_home() || is_front_page() || is_page_template('home.php') )
    get_template_part( 'slider', 'fixed-image' );          