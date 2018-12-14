<?php        
/**
 * @package WordPress
 * @subpackage YIW Themes
 * @since 1.0
 */
 
if ( ! is_page() )
    return;
 
global $wp_query;

$page_id = $wp_query->is_posts_page ? get_option('page_for_posts') : get_the_ID();
$_active_title = get_post_meta( $page_id, '_show_title_page', true );
$_active_breadcrumb = get_post_meta( $page_id, '_show_breadcrumbs_page', true ); ?>
        
        <?php if( $_active_title != 'no' OR $_active_breadcrumb != 'no' ) : ?>                 
        <div id="page_meta" class="home-section">
            <div class="inner group">
                <div class="meta-left">
                    <?php
                    if( $_active_title != 'no' ) the_title( '<h2 class="page-title">', '</h2>' );
                    ?>
                </div>
                <div class="meta-right">
                    <?php
                    if( $_active_breadcrumb != 'no' ) yiw_breadcrumb( ' // ' );
                    ?>
                </div>
            </div>
        </div>
        <?php endif; ?>