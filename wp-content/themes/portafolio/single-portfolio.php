<?php
// load the theme options
$options = get_option('portafolio_theme_settings');
?>
<?php get_header();
?>
<div id="portfolio-wrap" class="clearfix">
    <?php
    if (have_posts()) : while (have_posts()) : the_post();

            $category = wp_get_object_terms($post->ID, 'portfolio_cats');
            ?> 

            <div id="portfolio-left" style="float:left;width:600px">   
                <h1 class="page-title"><?php the_title(); ?></h1>
        <?php the_content(); ?>    
            </div>
            <div id="portfolio-left2" style="text-align:right;float:right;width:400px">   
                <h6><?php echo "<a class='buttonLink' href='../../portfolio-category/" . $category[0]->slug . "'><em>dans</em> " . $category[0]->name . " &raquo;</a>"; ?></h6> 
            </div><!-- END portfolio-left -->


            <!-- END portfolio-left -->

            <div style="clear:both">&nbsp;</div>

            <div class="singleFolio">



        <?php the_post_thumbnail(''); ?>  



            </div><!-- END portfolio-right --> 

            <div id="single-portfolio-nav-box">
                <div id="single-portfolio-nav"> 

        <?php
        //global $post;

        $args = array(
            'post_type' => 'portfolio',
            'tax_query' => array(
                array(
                    'taxonomy' => 'portfolio_cats',
                    'field' => 'id',
                    'terms' => $category[0]->term_id
                )
            )
        );
        $portfolio_posts_count = new WP_Query($args);
        if ($portfolio_posts_count->post_count > 2)
            $loopp = true;
        else
            $loopp = false;

        $tpldir = get_bloginfo('template_directory');
        ?>
                    <div style="float:left;margin : 10px">
                    <?php
                    next_post_link_plus(array(
                        'loop' => $loopp,
                        'format' => '%link',
                        'thumb' => 'thumbnail',
                        /* 'link' => '&lt;&nbsp;Précédente', */
                        'link' => '<img id="f_left" src="' . $tpldir . '/images/f_left.png" alt="" />',
                        'order_by' => 'post_date',
                        'max_length' => 30,
                        'tooltip' => '%title',
                        'in_same_tax' => 'portfolio_cats'
                    ));
                    ?>

                    </div>

                    <div style="float:right;margin : 10px">
                        <?php
                        previous_post_link_plus(array(
                            'loop' => $loopp,
                            'format' => '%link',
                            'thumb' => 'thumbnail',
                            /* 'link' => 'Suivante&nbsp;&gt;', */
                            'link' => '<img id="f_right" src="' . $tpldir . '/images/f_right.png" alt="" />',
                            'order_by' => 'post_date',
                            'max_length' => 30,
                            'tooltip' => '%title',
                            'in_same_tax' => 'portfolio_cats'
                        ));
                        ?>	
                    </div>

                    <div style="clear:both;padding : 0;margin : 0">&nbsp;</div>
                </div><!-- single-portfolio-nav -->	
            </div>

            <div style="width:470px;margin-top : 30px">              			
                <!-- Placez cette balise là où vous souhaitez positionner le bouton +1. -->
                <g:plusone size="medium" href="<?php the_permalink(' ') ?>"></g:plusone>

                <!-- Placez cet appel d'affichage à l'endroit approprié. -->
                <script type="text/javascript">
                    window.___gcfg = {lang: 'fr'};

                    (function() {
                        var po = document.createElement('script');
                        po.type = 'text/javascript';
                        po.async = true;
                        po.src = 'https://apis.google.com/js/plusone.js';
                        var s = document.getElementsByTagName('script')[0];
                        s.parentNode.insertBefore(po, s);
                    })();
                </script>                    
                <div class="fb-like" data-href="<?php the_permalink(' ') ?>" data-send="true" data-layout="button_count" data-width="250" data-show-faces="false" data-colorscheme="dark" data-font="arial"></div>  


                <a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php the_permalink(' ') ?>" data-lang="fr">Tweeter</a>
                <script>!function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (!d.getElementById(id)) {
                    js = d.createElement(s);
                    js.id = id;
                    js.src = "//platform.twitter.com/widgets.js";
                    fjs.parentNode.insertBefore(js, fjs);
                }
            }(document, "script", "twitter-wjs");</script>
            </div>  	 
            <div class="clearfix" style="clear:both;padding : 30px; background: #EEE ">


            <div id="post-content">

            <?php comments_template(); ?> 

            </div>
        <?php get_sidebar(); ?>
            </div>

            <div id="portfolio-cats"  style="float:right;width:300px;margin-top:-80px;border : none; display : none">
                <h4>Portfolio</h4>
                <?php
                $taxonomy = 'portfolio_cats';
                $orderby = 'slug';
                $show_count = 1;      // 1 for yes, 0 for no
                $pad_counts = 0;      // 1 for yes, 0 for no
                $hierarchical = 1;      // 1 for yes, 0 for no
                $title = '';
                $args = array(
                    'taxonomy' => $taxonomy,
                    'orderby' => $orderby,
                    'show_count' => $show_count,
                    'pad_counts' => $pad_counts,
                    'hierarchical' => $hierarchical,
                    'title_li' => $title
                );
                ?>

                    <?php /* if($options['portfolio_url'] !='') { ?><a href="<?php echo $options['portfolio_url']; ?>" title="Portfolio"></a><?php } */ ?>
                <ul>
        <?php //wp_list_categories( $args );  ?>
                </ul>

            </div><!-- END portfolio-cats -->	       




    <?php endwhile; ?>
<?php endif; ?>

</div><!-- END portfolio-wrap -->
<?php get_footer(); ?>