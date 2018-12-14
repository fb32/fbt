<?php $options = get_option( 'portafolio_theme_settings' );  ?>
<div class="clear"></div>

</div>
<!-- END wrap -->
<div id="footer-wrap">

<div id="footer" style=" margin : 0 auto">

<div id="copyright" style="float:left;padding : 10px 30px 0 10px">
&copy; <?php echo date('Y'); ?>  <?php bloginfo( 'name' ) ?> |<?php bloginfo( 'description' ) ?>
</div> 


 
<div id="socials-links" style="float:left;width:250px;">
Suivez-moi :

<?php if($options['twitter']) : ?>
<a title="Twitter" href="<?php echo $options['twitter']; ?>"><p class="lkSocials" style="background:url(<?php bloginfo('template_directory') ?>/images/social/twitter.png) top no-repeat;"></p></a> 
<?php endif; ?>
<?php if($options['flickr']) : ?>
<a title="Flickr" href="<?php echo $options['flickr']; ?>"><p class="lkSocials" style="background:url(<?php bloginfo('template_directory') ?>/images/social/flickr.png) top no-repeat;"></p></a> 
<?php endif; ?>
<?php if($options['google']) : ?>
<a title="Google+" href="<?php echo $options['google']; ?>"><p class="lkSocials" style="background:url(<?php bloginfo('template_directory') ?>/images/social/google.png) top no-repeat;"></p></a>
<?php endif; ?>
<?php if($options['500px']) : ?>
<a title="500px" href="<?php echo $options['500px']; ?>"><p class="lkSocials" style="background:url(<?php bloginfo('template_directory') ?>/images/social/500px.png) top no-repeat;"></p></a>
<?php endif; ?>
<?php if($options['1x']) : ?>
<a title="1x - OneExposure" href="<?php echo $options['1x']; ?>"><p class="lkSocials" style="background:url(<?php bloginfo('template_directory') ?>/images/social/1x.png) top no-repeat;"></p></a>
<?php endif; ?>
<?php if($options['facebook']) : ?>
<a title="Facebook" href="<?php echo $options['facebook']; ?>"><p class="lkSocials" style="background:url(<?php bloginfo('template_directory') ?>/images/social/facebook.png) top no-repeat;"></p></a>
<?php endif; ?>
</div>
 <?php	if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Footer') ) : ?> 
 <?php endif; ?>
 
 <div class="clear"></div>


</div><!-- END Footer -->
</div><!-- END footer-wrap -->
<!-- WP Footer -->
<?php wp_footer(); ?>
</body>
</html>