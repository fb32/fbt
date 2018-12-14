<?php
	// load the theme options
	$options = get_option( 'portafolio_theme_settings' ); 
?>
<?php get_header(' '); ?>



 <?php	if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Slider Home') ) : ?>
  
 <?php endif; ?>
 


<?php if ($options['home_text'] !='') { ?>
<div id="home-quote">
	<?php echo stripslashes($options['home_text']);  ?>
</div>
<!-- END homepage-quote -->
<?php } ?>

<?php
 /*
$recentPosts = new WP_Query();
$sticky = get_option('sticky_posts');
$args = array(
 'showposts' => 1,
 'post__in' => $sticky,
 'ignore_sticky_posts' => 1,
 'orderby' => 'date',
 );
$recentPosts->query($args);
while ($recentPosts->have_posts()) : $recentPosts->the_post(); ?>
<?php if ( has_post_thumbnail()) : ?>
<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
<?php the_post_thumbnail('large'); ?></a>
<h3><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
<?php the_excerpt(); ?>
<?php endif; ?>
<?php endwhile; */
?>

<h2></h2>
<div id="portfolio-wrap" class="clearfix">

<div class="clear"></div>
<div class="gallery container clearfix" id="portfolio-right"  data-source-open="">
    
 
<script>
jQuery(function($){ 
    /*
    // Initialize Masonry
    $('#portfolio-right').masonry({
        columnWidth: 340,
        itemSelector: '.item',
        isFitWidth: true,
       // isAnimated: !Modernizr.csstransitions
    }).imagesLoaded(function() {
        $(this).masonry('reload');
    });
     */
    $(".fancybox").on("click", function(){  $(".gallery").attr('data-source-open',  $(this).attr('data-source'));  });
    $(".fancybox").fancybox({
                openEffect  : 'elastic',
                closeEffect : 'elastic',
                prevEffect : 'elastic',
                nextEffect : 'fade', 
                openSpeed : 400,
                closeSpeed : 400,               
                padding : 10,
                closeClick : true,
                preload : 5,
                closeBtn  : true,
                overlayOpacity : 0.1,
                helpers : {
                    title : {
                        type : 'float'
                    },
                    overlay : {
                        opacity : 0.1
                    },
                    buttons : {}
                },

                afterLoad : function() {                  
                    var linkp = $(".gallery").attr('data-source-open');
                    this.title =  (this.title ? this.title : '') + '<br /><a href="' + linkp + '">Lien permanent</a> '  + ' - <span>' + (this.index + 1) + ' / ' + this.group.length + '</span>' ;
                }
            });

    
    $(".thumb-title").css({opacity : '0.7'});
    $(".navigation").css({marginTop : '20px'}).clone().appendTo("#portfolio-left");
 });
</script>
<?php
    global $post;
    
    $args = array(
        'post_type' =>'portfolio',
        'posts_per_page' => 30,
        'order' => 'DESC',
        'offset' => 0,
        'tax_query' => array(
    array(
      'taxonomy' => 'portfolio_cats',
      'field' => 'id',
      'terms' => 18 // Where term_id of Term 1 is "1".
    )
  )  
  );
    $portfolio_posts = new WP_Query($args);

    while ( $portfolio_posts->have_posts() ) : 
    
      $portfolio_posts->the_post(); 
?>
   
    <?php if (has_post_thumbnail() ) {  ?>
    <div class="item">
        <?php if ( has_post_thumbnail() ) {  ?>
        <a href="<?php echo wp_get_attachment_url( get_post_thumbnail_id()); ?>"  data-source= "<?php the_permalink(' ');  ?>" class="fancybox"  data-fancybox-group="button" title="<?php the_title(); ?>" class="opacity"><?php the_post_thumbnail('mid-portfolio'); ?></a>
        <!--<p><?php the_title(); ?></p>-->
        <?php } ?>
        <div class="thumb-title" style="color : #CCC; position:relative; margin : - 20px; background: #333; padding : 3px"><?php the_title(); ?></div>
    </div>
    <!-- END home-portfolio-box -->
    <?php } ?>
    <?php endwhile; ?> 
    
</div>      
</div>

    <div id="portfolio-cats">
      <!--<h4 style="float : left">Catégories</h4>-->
        <?php 
            $taxonomy     = 'portfolio_cats';
            $orderby      = 'slug'; 
            $show_count   = 1;      // 1 for yes, 0 for no
            $pad_counts   = 0;      // 1 for yes, 0 for no
            $hierarchical = 1;      // 1 for yes, 0 for no
            $title        = '';
            $args = array(
            'exclude'      => 18,
            'taxonomy'     => $taxonomy,
            'orderby'      => $orderby,
            'show_count'   => $show_count,
            'pad_counts'   => $pad_counts,
            'hierarchical' => $hierarchical,
            'title_li'     => $title
    );
    ?>
    
        <?php if($options['portfolio_url'] !='') { ?><a href="<?php echo $options['portfolio_url']; ?>" title="Portfolio"></a><?php } ?>
        <ul style="float : right">
        <?php wp_list_categories( $args ); ?>
          </ul>

    </div><!-- END portfolio-cats -->   



<?php
/*
	global $post;
	$args = array(
		'post_type' =>'highlights',
		'numberposts' => -1,
		'orderby' => 'ASC'
	);
	$highlights_posts = get_posts($args);

 if($highlights_posts) { ?>
     
<div id="home-highlights" class="clearfix">
	<?php
    $i=0; //start post count at "0"
    foreach($highlights_posts as $post) : setup_postdata($post);
    $i++; //add 1 to the total count
    ?>
    <div class="home-highlight-box  <?php if($i===3){ echo 'remove-margin'; } ?>">
        <h2><span><?php the_title(' '); ?></span></h2>
        <?php if ( has_post_thumbnail() ) {  ?>
        <?php the_post_thumbnail('home-highlights'); ?>
        <?php } ?>
        <?php the_content(' '); ?>
    </div>
    <!-- END home-highlight-box -->
    <?php
    //reset the count to "0" and clear the divs
    if($i===3){ echo '<div class="clear"></div>'; $i=0; } ?>
    <?php endforeach; ?>
</div>
<!--END home-highlights -->
<?php } wp_reset_postdata(); */ ?>




<?php get_footer(' '); ?>