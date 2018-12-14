<?php
    $title = yiw_get_option('home_testimonials_title');
		
	$title = str_replace( '[', '<span>', $title );
	$title = str_replace( ']', '</span>', $title );
		
	if ( preg_match( '/<span>/', $title ) )
	    $reverse_icon = true;
	else
	    $reverse_icon = false;   
	
	$args = array(
        'post_type' => 'bl_testimonials',
        'posts_per_page' => -1
    );
    $testimonials_posts = new WP_Query( $args );  
    
    if ( ! $testimonials_posts->have_posts() ) 
        return; 

    if ( wp_count_posts('bl_testimonials')->publish <= 1 )
        $is_slider = false;
    else
        $is_slider = true;
?>
<div class="inner home-testimonials home-section group">
    <div class="title">
        <h2><?php echo yiw_get_icon( 'home_testimonials_title_icon', 'icon-comment', true ) ?> <?php echo $title ?></h2>
        <p><?php echo yiw_get_option('home_testimonials_description') ?></p>
    </div>
    
    <ul class="list-testimonials" style="float: left;">
        <?php while ( $testimonials_posts->have_posts() ) : $testimonials_posts->the_post(); ?>
        <li>
            <p><?php echo get_the_excerpt() ?> - <strong><?php the_title() ?></strong> -</p>
        </li>       
        <?php endwhile; ?>
    </ul>    
    
    <?php if ( $is_slider ) : ?>                    
    <script type="text/javascript">
        jQuery(function($){
            $('.home-testimonials ul').width( 920 - $('.home-testimonials .title').outerWidth() - 20 );
            $('.home-testimonials ul').cycle({
                fx: 'scrollHorz',
                speed: <?php echo yiw_get_option( 'home_testimonials_speed' ) * 1000 ?>,
                timeout: <?php echo yiw_get_option( 'home_testimonials_timeout' ) * 1000 ?>
            });
        });
    </script>	      
    <?php endif; ?>
</div>  