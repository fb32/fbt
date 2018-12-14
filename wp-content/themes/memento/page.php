<?php        
/**
 * @package WordPress
 * @subpackage YIW Themes
 * @since 1.0
 */

get_header() ?>
        
		<div id="primary" class="layout-<?php echo yiw_layout_page() ?> home-section">    
		    <div class="inner group">
    			
                <!-- START CONTENT -->
                <div id="content" class="group">
                    <?php get_template_part( 'loop', 'page' ) ?> 
                    
                    <?php comments_template() ?>
                </div>
                <!-- END CONTENT -->
                
                <!-- START SIDEBAR -->
                <?php get_sidebar() ?>
                <!-- END SIDEBAR -->    
                                  
                <!-- START EXTRA CONTENT -->
        		<?php get_template_part( 'extra-content' ) ?>      
                <!-- END EXTRA CONTENT -->
            </div>
        </div>       
        
<?php get_footer() ?>