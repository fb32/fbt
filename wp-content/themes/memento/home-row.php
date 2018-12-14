    <?php 
    $sidebars = wp_get_sidebars_widgets();   
    if ( ! empty( $sidebars['home-row'] ) ) : ?>
    <div class="inner home-row group">  
        <?php dynamic_sidebar( 'Home Row' ) ?>    
    </div>
    <?php endif; ?>