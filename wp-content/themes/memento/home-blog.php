<?php
$show_thumb = yiw_get_option( 'blog_show_thumbnail_homepage' );
$number_items = yiw_get_option( 'blog_items_home_page' );
$show_date = yiw_get_option( 'home_blog_show_date' );
$show_readmore = yiw_get_option( 'home_blog_show_read_more' );
$readmore_text = yiw_get_option( 'home_blog_read_more_text' ); 

$count = 0;
$items_for_row = 4;

?>
<div class="inner home-blog home-section group">
<?php
    if( yiw_get_option( 'blog_title' ) != '' ) {
        $blog_title = str_replace( array( '[', ']' ), array( '<span>', '</span>' ), yiw_get_option( 'blog_title' ) );
        echo '<h2>' . $blog_title . '</h2>';
    }
    
    $args = array(
       'posts_per_page' => $number_items,
       'orderby' => 'date',
       'order' => 'DESC'
    );
    
    $myposts = new WP_Query( $args );      
    
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
            
            if( yiw_get_option( 'link_thumbnail_homepage' ) ) {
                $img = '<a href="' . get_permalink() . '">' . $img . '</a>';
            }
        } else {
            $img = '';
        }
              
        ?>      
        <div class="hentry-post group<?php echo $classes ?>">
            <?php if( $show_date ) : ?><p class="post-date"><?php echo yiw_get_icon( 'home_blog_date_icon', 'icon-calendar', true ) ?> <?php echo get_the_date() ?></p><?php endif; ?>
            <?php if( $show_thumb ) : ?><div class="thumb-img"><?php echo $img ?></div><?php endif; ?> 
            <?php the_title( '<h3><a href="'.get_permalink().'" title="'.get_the_title().'" class="title">', '</a></h3>' ); ?>
            <?php ( $show_readmore ) ? the_content( $readmore_text ) : the_excerpt(); ?>
        </div>
    <?php $count++; endwhile; wp_reset_query(); ?>
</div>