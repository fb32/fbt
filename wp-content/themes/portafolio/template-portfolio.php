<?php $options = get_option( 'portafolio_theme_settings' ); ?>
<?php
/*
Template Name: Portfolio
*/
?>
<?php get_header(' '); ?>

<div id="portfolio-wrap" class="clearfix">

<div id="portfolio-left">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<h1 class="page-title"><?php the_title(); ?></h1>			
<?php the_content(); ?>
<?php endwhile; ?>
<?php endif; ?>
<div id="portfolio-cats">
    <h4>Categories</h4>
        <?php 
            $taxonomy     = 'portfolio_cats';
            $orderby      = 'slug'; 
            $show_count   = 0;      // 1 for yes, 0 for no
            $pad_counts   = 0;      // 1 for yes, 0 for no
            $hierarchical = 1;      // 1 for yes, 0 for no
            $title        = '';
            $args = array(
            'taxonomy'     => $taxonomy,
            'orderby'      => $orderby,
            'show_count'   => $show_count,
            'pad_counts'   => $pad_counts,
            'hierarchical' => $hierarchical,
            'title_li'     => $title
    );
    ?>
    <ul>
    	<?php if($options['portfolio_url'] !='') { ?><li><a href="<?php echo $options['portfolio_url']; ?>" title="Portfolio">All</a></li><?php } ?>
		<?php wp_list_categories( $args ); ?> 
	</ul>
    </div><!-- END portfolio-cats -->	
</div><!-- END portfolio-left -->

<div id="portfolio-right">
 	<?php query_posts(array(
		'post_type'=>'portfolio',
		'posts_per_page' => 1,
		'paged'=>$paged,
		'order' => 'DESC'
	)); ?>
<?php
    $i=0; //start post count at "0"
    while (have_posts()) : the_post();
    $i++; //add 1 to the total count
    ?>
    <div class="portfolio-box  <?php if($i===3){ echo 'remove-margin'; } ?>">
        <?php if ( has_post_thumbnail() ) {  ?>
        <a href="<?php the_permalink(' ') ?>" title="<?php the_title(); ?>" class="opacity"><?php the_post_thumbnail('portfolio'); ?></a>
        <?php } ?>
    </div>
    <!-- END home-portfolio-box -->
    <?php
    //reset the count to "0" and clear the divs
    if($i===3){ echo '<div class="clear"></div>'; $i=0; } ?>
    <?php endwhile; ?>
	<div class="navigation"><p><?php posts_nav_link(' &#8734; ','&laquo; Previous','Next &raquo;'); ?></p></div>
</div><!-- END portfolio-right -->    
  
 
</div>
<!-- END portfolio-wrap -->       
<?php get_footer(' '); ?>