<?php $options = get_option( 'portafolio_theme_settings' ); ?>
<?php get_header(' '); ?>

<div id="portfolio-wrap" class="clearfix">
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
        
           <div class="clear"></div>
    </div><!-- END portfolio-cats -->   

<div id="portfolio-left">


    <div class="page-title-port">
    	<?php
    		$term =	$wp_query->queried_object;
    		echo '<h1 class="page-title">'.$term->name.'</h1>';
    	?>   	
        <?php echo category_description(); ?>
        <div class="sep">Portfolio</div>
    </div>
    
</div><!-- END portfolio-left -->

<div class="clear"></div>
<div class="gallery container clearfix grid transitions-enabled infinite-scroll" id="portfolio-right" data-source-open="">
    
 
<script>

jQuery(function($){ 
 /*  
    // Initialize Masonry
    $('#portfolio-right').masonry({
        columnWidth: 340,
        itemSelector: '.item',
        isFitWidth: true
       // isAnimated: !Modernizr.csstransitions
    }).imagesLoaded(function() {
        $(this).masonry('reload');
    });*/
        
    $(document).on("click", ".fancybox", function(){  $(".gallery").attr('data-source-open',  $(this).attr('data-source'));  });
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
        
    $(".navigation").hide();//.css({marginTop : '20px'}).clone().appendTo("#portfolio-left");
 });
</script>
<?php
    query_posts($query_string . '&posts_per_page=15'); 
    $i=0; //start post count at "0"
    while (have_posts()) : the_post();
    $i++; //add 1 to the total count
    ?>
    <div class="item">
        <?php if ( has_post_thumbnail() ) {  ?>
        <a  data-source= "<?php the_permalink(' ');  ?>" class="fancybox"  data-fancybox-group="button"  href="<?php echo wp_get_attachment_url( get_post_thumbnail_id()); ?>" title="<?php the_title(); ?>" class="opacity"><?php echo get_the_post_thumbnail($post_id, 'mid-portfolio') ?></a>
        <!--<p><?php the_title(); ?></p>-->
        <?php } ?>
        <div class="thumb-title" style="color : #CCC; position:relative; margin : - 20px; background: #333; padding : 3px"><?php the_title(); ?></div>
    </div>
    <!-- END home-portfolio-box -->
    <?php
    //reset the count to "0" and clear the divs
    //if($i===3){ echo '<div class="clear"></div>'; $i=0; } ?>
    <?php endwhile; ?> 
    
</div><!-- END portfolio-right -->   
          <?php 
             // posts_nav_link(' &#8734; ','&laquo; Previous','Next &raquo;'); 
            ?>
             <?php if(function_exists('wp_paginate')) {
                 wp_paginate();
                } 
             ?>                 
</div>
<!-- END portfolio-wrap -->       
<?php get_footer(' '); ?>