<?php $options = get_option( 'portafolio_theme_settings' ); ?>
<?php
/*
Template Name: Portfolio
*/
?>
<?php get_header(' '); ?>

<div id="portfolio-wrap" class="clearfix">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<h1 class="page-title"><?php the_title(); ?></h1>			
<?php the_content(); ?>
<?php endwhile; ?>
<?php endif; ?>
    <ul id="portfolio-group" class="clearfix">
	<?php 
            $taxonomy     = 'portfolio_cats';
            $orderby      = 'name'; 
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
	<?php if($options['portfolio_url'] !='') { ?><li><a href="<?php echo $options['portfolio_url']; ?>" title="Portfolio">All</a></li><?php } ?>
		<?php wp_list_categories( $args ); ?>
	</ul>
 	<?php query_posts(array(
		'post_type'=>'portfolio',
		'posts_per_page' => 8,
		'paged'=>$paged,
		'order' => 'ASC'
	)); ?>
	<?php
	$i=0; //start post count at "0"
    while (have_posts()) : the_post();
	$i++; //add 1 to the total count
	//get images
	$full_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');
	$thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(), 'portfolio');
    ?>
    <div class="portfolio-box <?php if($i===4){ echo 'remove-margin'; } ?>">
        <img src="<?php echo $thumbnail[0]; ?>" alt="<?php the_title();?>" width="150" height="120" /></a>
		<div class="overlay">
			<p class="align-center">                        
				<a href="<?php echo $full_image[0]; ?>" title="<?php the_title(); ?>" rel="prettyPhoto[gallery]" class="overlay-image">View Full Image</a><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"class="overlay-link">View Post</a>
			</p>                        
		</div><!--END item-links-->  
	</div>
    <!-- END home-portfolio-box -->
	<?php
    //reset the count to "0" and clear the divs
    if($i===4){ echo '<div class="clear"></div>'; $i=0; } ?>
    <?php endwhile; ?>
</div>
<!-- END portfolio-wrap -->       
<?php get_footer(' '); ?>