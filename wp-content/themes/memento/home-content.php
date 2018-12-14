        <div id="primary" class="layout-<?php echo $layout_page_type = yiw_layout_page() ?> home-section">    
		    <div class="inner group">
                                                          
                <!-- START CONTENT -->
                <div id="content" class="group">
                    <?php 
                        if ( is_home() )
                            get_template_part( 'loop', 'index' ); 
                        else
                            get_template_part( 'loop', 'page' ); 
                    ?>
    
                </div>         
                <!-- END CONTENT -->  
                
                <!-- START LATEST NEWS -->
                <?php get_sidebar() ?>
                <!-- END LATEST NEWS -->   
            </div>
        </div>    