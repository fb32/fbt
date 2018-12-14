<?php while (have_posts()) : the_post(); ?>      
    <div class="post-entry clearfix">
        <?php if ( has_post_thumbnail() ) {  
         $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(), 'post-image') ;
          $W = $thumbnail[1];
          $H = $thumbnail[2];
         
      
      $iMarg = (150 - $H)/2;
      $iHeight = 150 - $iMarg;
      if ($H<150) $margImg = $iMarg."px 0 0 0; height:".$iHeight."px";   else  $margImg = "0";    
        
         
        ?>
        
        <div class="post-entry-featured-image"  style="text-align:center;padding : <?php echo $margImg; ?>" >
			<a href="<?php the_permalink(' ') ?>" title="<?php the_title(); ?>" class="opacity"><?php the_post_thumbnail('post-image'); ?></a>
        </div>
        <!-- END post-entry-featured-image -->
        
    <div class="post-entry-content">
        	<h2><a href="<?php the_permalink(' ') ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
               			<div class="post-entry-meta"><span><?php// the_author_link(); ?></span>Dans <?php the_category(' '); ?>  le <?php the_time('j F Y') ?>
 
                
                     </div>
					<?php the_news_excerpt('40','','all','plain','no'); ?>
					
 <div style="float:right;width:470px; display: none">              			
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
 				
        </div><!-- END post-entry-content -->
   
   <?php } else{ ?>
	<h2><a href="<?php the_permalink(' ') ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
   		<div class="post-entry-meta">Posted by <span><?php the_author_link(); ?></span> on <?php the_time('j') ?> <?php the_time('M') ?> in <?php the_category(' '); ?></div>
		<?php the_news_excerpt('40','','','plain','no'); ?>
	<?php } ?>
		</div>
		<!-- END post-entry -->
<?php endwhile; ?>
