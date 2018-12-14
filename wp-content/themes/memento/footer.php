            <div class="clear"></div>     
        </div>     
        <!-- END WRAPPER -->
        
        <?php 
            wp_reset_query();
            
            $type = yiw_get_option( 'footer_type', 'normal' );    
            if( strpos($type, "big") !== false )
                get_template_part('footer','big');
        ?>
        
        <!-- START FOOTER -->
        <div id="copyright" class="group">
            <div class="inner group">
                <?php if( $type == 'normal' || $type == 'big-normal' ) : ?>
                <div class="left">
                    <?php yiw_convertTags( yiw_addp( stripslashes( yiw_get_option( 'copyright_text_left', 'Copyright <a href="%site_url%"><strong>%name_site%</strong></a> 2010' ) ) ) ) ?>
                </div>
                <div class="right">
                    <?php yiw_convertTags( yiw_addp( stripslashes( yiw_get_option( 'copyright_text_right', 'Powered by <a href="http://www.yourinspirationweb.com/en"><strong>Your Inspiration Web</strong></a>' ) ) ) ) ?>  
                </div>
                <?php elseif( $type == 'centered' || $type == 'big-centered' ) : ?> 
                <div class="center">
                    <?php yiw_convertTags( yiw_addp( stripslashes( yiw_get_option( 'footer_text_centered' ) ) ) ) ?>  
                </div>
            <?php endif ?>
            </div>
        </div>
        <!-- END FOOTER -->
    
    <?php wp_footer() ?>   
    </body>
</html>