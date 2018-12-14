<?php get_header(); ?>
    
    	<div id="post-wrap" class="full-width-wrap">
        		<h1 class="page-title">Erreur 404 - Page non trouvée</h1>			
				<p>Ooops, la page que vous cherchez n'existe pas ou a été déplacée...</p>
        </div><!-- END post-wrap -->
 
<?php
	global $post;
	
	$args = array(
		'post_type' =>'portfolio',
		'posts_per_page' => 8,
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
	
?>
<?php if($portfolio_posts) { ?>


<div id="home-portfolio" class="clearfix">
<h2>Travaux récents</h2>
	<?php
    $i=0; //start post count at "0" 
    $lastP = -1;
    while ( $portfolio_posts->have_posts() ) : 
    
      $portfolio_posts->the_post(); 
      //setup_postdata($portfolio_posts);
       //add 1 to the total count
     $i++; 
     // ne pas afficher la dernière photo
     $lastP++;
    //if ($lastP==1) continue;
    ?>
   
    <?php if (has_post_thumbnail() ) {  ?>
    <div class="portfolio-box  <?php if($i===4){ echo 'remove-margin'; } ?>" style="margin-right: 55px;"> 
        <a href="<?php the_permalink(' ') ?>" title="<?php the_title(); ?>" class="opacity"><?php the_post_thumbnail('portfolio'); ?></a>
        <p class="clbl">
        <span class='lbl'><?php the_title(); ?></span>
        </p>
    </div>
    <!-- END home-portfolio-box -->
    <?php } ?> 
    <?php
    //reset the count to "0" and clear the divs
   if($i===4){ echo '<div class="clear"></div>'; $i=0; } ?>
    <?php endwhile; ?>
    <div class="clear"></div>
<?php if($options['portfolio_url'] !='') { ?><div id="view-portfolio"><a class="buttonLink" href="<?php echo $options['portfolio_url']; ?>">Toutes les nouveautés du Portfolio ici &raquo;</a></div><?php } ?>
</div>
<!--END home-portfolio -->


<?php } wp_reset_postdata(); ?> 
 
     
<?php get_footer(); ?>