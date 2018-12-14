<?php
/*
Template Name: Blog
*/
?>
<?php get_header(' '); ?>
<div id="post-content">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>      
        <h1><?php the_title(); ?></h1>
        <div id="sub-description">
        <?php the_content(); ?>
        </div><!-- END sub-description -->
        <?php endwhile; endif; ?>
        <?php query_posts( array( 'paged'=>$paged ) ); ?>
        <?php if (have_posts()) : ?>              
        	<?php get_template_part( 'post' , 'entry') ?>                	
    <?php endif; ?>       
    <div class="navigation"><p><?php posts_nav_link(' &#8734; ','&laquo; Previous','Next &raquo;'); ?></p></div>
</div>
<!-- END post-content -->
<?php get_sidebar(' '); ?>           
<?php get_footer(' '); ?>