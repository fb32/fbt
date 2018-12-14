<?php
$show_thumb = yiw_get_option( 'services_show_thumbnail_homepage' );
$number_items = yiw_get_option( 'services_items_home_page' );
$show_readmore = yiw_get_option( 'home_services_show_read_more' );
$readmore_text = yiw_get_option( 'home_services_read_more_text' ); 
    
$args = array(
    'post_type' => 'bl_services',
    'posts_per_page' => $number_items,
    'orderby' => 'date',
    'order' => 'DESC'
);

$count = 0;              
$items_for_row = 4;

$myposts = new WP_Query( $args ); 
    
if ( ! $myposts->have_posts() ) 
    return; 
?>
<div class="inner home-services home-section group">
<?php
    if( yiw_get_option( 'services_title' ) != '' ) {
        $services_title = str_replace( array( '[', ']' ), array( '<span>', '</span>' ), yiw_get_option( 'services_title' ) );
        echo '<h2>' . $services_title . '</h2>';
    }
    
    while( $myposts->have_posts() ) : $myposts->the_post(); global $more; $more = 0; //WP mistery...
        
        $classes = array();
        if ( $count == 0 )
            $classes[] = 'first';
        if ( ! ( ($count+1) % $items_for_row ) )
            $classes[] = 'last';
        if ( ! empty( $classes ) )
            $classes = ' ' . implode( ' ', $classes ); 
        else
            $classes = '';
                            
        $img = '';
        if(has_post_thumbnail()) {
            $img = get_the_post_thumbnail( get_the_ID(), 'thumb-home-section' );
        } else {
            $img = '';
        }
        ?>      
        <div class="hentry-post group<?php echo $classes ?>">
            <?php if( $show_thumb ) : ?><div class="thumb-img"><a href="<?php the_permalink() ?>"><?php echo $img ?></a></div><?php endif; ?> 
            <?php the_title( '<h3><a href="'.get_permalink().'" title="'.get_the_title().'" class="title">', '</a></h3>' ); ?>
            <?php ( $show_readmore ) ? the_content( $readmore_text ) : the_excerpt(); ?>
        </div>
    <?php $count++; endwhile; wp_reset_query(); ?>
</div>