<?php get_header(); ?>
<div id="post-content">
<div id="post-header">
	<?php if (have_posts()) : ?>
	<?php $post = $posts[0]; ?>
	<?php if (is_category()) { ?>
	<h1 id="archive-title"><?php single_cat_title(); ?></h1>
	<?php } elseif( is_tag() ) { ?>
	<h1 id="archive-title">Posts Tagged &quot;<?php single_tag_title(); ?>&quot;</h1>
	<?php  } elseif (is_day()) { ?>
	<h1 id="archive-title">Archive for <?php the_time('F jS, Y'); ?></h1>
	<?php  } elseif (is_month()) { ?>
	<h1 id="archive-title">Archive for <?php the_time('F, Y'); ?></h1>
	<?php  } elseif (is_year()) { ?>
	<h1 id="archive-title">Archive for <?php the_time('Y'); ?></h1>
	<?php  } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
	<h1 id="archive-title">Blog Archives</h1>
	<?php } ?>
<div id="sub-description">	<?php echo category_description( $category ); ?></div><!-- END sub-description -->
</div>
<!-- END blog-header -->           
		<?php get_template_part( 'post' , 'entry') ?>                	
		<?php endif; ?>  
       
       <!--<div id="single-nav" class="clearfix">
			   <div id="single-nav-left"><?php previous_posts_link('&laquo;  Articles précédents'); ?></div>
			   <div id="single-nav-right"><?php next_posts_link('Articles suivants &raquo;'); ?></div>
        </div><div class="navigation"><p><?php posts_nav_link('&#8734;','Articles suivants &raquo;','&laquo; Articles précédents'); ?></p></div>-->
        
        <!-- END single-nav -->  
 <?php if(function_exists('wp_paginate')) {
    wp_paginate();
} ?>     

</div>
<!-- END post-content -->
            
<?php get_sidebar(' '); ?>	
<div class="clear"></div>    
 <?php get_footer(' '); ?>