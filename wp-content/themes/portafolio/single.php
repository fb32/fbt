<?php
	// load the theme options
	$options = get_option( 'portafolio_theme_settings' ); 
	

?>
<?php get_header(); ?>
	<div id="post-content">  
    <div class="single-entry clearfix">
		<?php 
		
		$category = get_the_category();
		 query_posts($query_string . '&cat='.$category[0]->cat_ID); 
    if (have_posts()) : while (have_posts()) : the_post(); 
    
    ?>    
        <div id="single-nav" class="clearfix">
			<div id="single-nav-left"><?php previous_post_link('%link', '&laquo;  Article précédent', TRUE); ?></div>
			<div id="single-nav-right"><?php next_post_link('%link', 'Article suivant &raquo;', TRUE); ?></div>
        </div>
        <!-- END single-nav -->  
        <h1><?php the_title(); ?></h1>
		<div class="post-entry-meta-single">Publié le <?php the_time('j F Y') ?> dans <?php the_category(' '); ?></div>
        <?php if ( has_post_thumbnail() && get_post_meta($post->ID, 'show_thumb', true ) ) { ?>
        	<div id="single-featured-image">
        		<?php the_post_thumbnail('post-image'); ?>
            </div><!-- END single-featured-image -->
        <?php } ?>
        

		<?php the_content(); ?>
		
 <div style="float:right;width:470px;margin-top : 20px">              			
 <!-- Placez cette balise là où vous souhaitez positionner le bouton +1. -->
<g:plusone size="medium" href="<?php the_permalink(' ') ?>"></g:plusone>

<!-- Placez cet appel d'affichage à l'endroit approprié. -->
<script type="text/javascript">
  window.___gcfg = {lang: 'fr'};

  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>                    
 <div class="fb-like" data-href="<?php the_permalink(' ') ?>" data-send="true" data-layout="button_count" data-width="250" data-show-faces="false" data-colorscheme="dark" data-font="arial"></div>  
 
 
<a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php the_permalink(' ') ?>" data-lang="fr">Tweeter</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
 </div>  	       
    <div class="clear"></div>    
    
		<?php endwhile; ?>
		<?php endif; ?>	
        
        <?php wp_link_pages('before=<div id="post-page-navigation">&after=</div>'); ?>
         
        <div class="post-entry-bottom">
        <?php the_tags('<div class="post-tags">',' ','</div>'); ?>
        <!-- END post-category -->
        </div>
        <!-- END post-entry-bottom -->
        
        
        </div>
        <!-- END post-entry -->
         
     <div class="clear"></div>
                
	<?php comments_template(); ?>  
                
	</div>
	<!-- END post-content -->
            
<?php get_sidebar(); ?>
<div class="clear"></div>
<?php get_footer(); ?>