<?php      
/**
 * @package WordPress
 * @subpackage Beauty & Clean
 * @since 1.0
 */

get_header() ?>           
         
    <div id="primary" class="layout-<?php echo yiw_get_option( '404_sidebar_position' ) ?> home-section">    
	    <div class="inner group">
            
            <!-- START CONTENT -->
            <div id="content" class="group">
                <img class="error-404-image group" src="<?php echo get_template_directory_uri() ?>/images/404.png" title="<?php _e( 'Error 404', 'yiw' ); ?>" alt="404" />
                <div class="error-404-text group">
                    <h2>Something bad happened<h2>
                    <h3>but don't worry, you can <a href="<?php echo home_url(); ?>">turn to the home page</a>.</h3>
                </div>                    
            </div>
            <!-- END CONTENT -->    
        </div>
    </div>
    
<?php get_footer() ?>
