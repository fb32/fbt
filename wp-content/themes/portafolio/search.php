<?php get_header(' '); ?>
    	<div id="post-content"> 
		<?php if (have_posts()) : ?>
        	<div id="post-header">
				<h1 id="archive-title">Résultat de votre recherche pour : "<?php the_search_query(); ?>"</h1>
                <p></p>
            </div>
            <!-- END post-header -->

		<?php get_template_part( 'post' , 'entry') ?>
        
        <?php if (function_exists("pagination")) { pagination($additional_loop->max_num_pages); } ?>
        
		<?php else : ?>
        <div id="post-header">
			<h1 id="archive-title">Résultat de votre recherche pour : "<?php the_search_query(); ?>"</h1>
			<p>Ooopss...rien ;)</p>
        </div>
        <!-- END post-header -->
		<?php endif; ?>
        </div>
		<!-- END post-content -->

<?php get_sidebar(' '); ?>		
<div class="clear"></div>    
 <?php get_footer(' '); ?>