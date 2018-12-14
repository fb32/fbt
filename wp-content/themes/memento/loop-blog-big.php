       				<?php $has_thumbnail = ( ! has_post_thumbnail() || ( ! is_single() && ! yiw_get_option( 'show_featured_blog', 1 ) ) || ( is_single() && ! yiw_get_option( 'show_featured_single', 1 ) ) ) ? false : true; ?>
                       
                    <div id="post-<?php the_ID(); ?>" <?php post_class('hentry-post group blog-' . $GLOBALS['blog_type'] ); ?>>                
                        
                        <?php if ( get_post_type() == 'post' ) : ?>
                        <div class="meta group">
                            <?php if( yiw_get_option( 'blog_show_date' ) ) : ?><p class="date"><?php echo yiw_get_icon( 'blog_date_icon', 'icon-calendar', true ) . get_the_date() ?></p><?php endif; ?>
                            <?php if( yiw_get_option( 'blog_show_author' ) ) : ?><p class="author"><?php echo yiw_get_icon( 'blog_author_icon', 'icon-user', true ); ?> <span><?php _e( 'by', 'yiw' ) ?> <?php the_author_posts_link() ?></span></p><?php endif; ?>
                            <?php if( yiw_get_option( 'blog_show_categories' ) ) : ?><p class="categories"><?php echo yiw_get_icon( 'blog_categories_icon', 'icon-tags', true ); ?> <span>In: <?php the_category( ', ' ) ?></span></p><?php endif; ?>
                            <?php if( yiw_get_option( 'blog_show_comments' ) ) : ?><p class="comments"><?php echo yiw_get_icon( 'blog_comments_icon', 'icon-comment', true ); ?> <span><?php comments_popup_link(__('No comments', 'yiw'), __('1 comment', 'yiw'), __('% comments', 'yiw')); ?></span></p><?php endif; ?>
                            <?php edit_post_link( __( 'Edit', 'yiw' ), '<p class="edit-link"><i class="icon-pencil"></i>', '</p>' ); ?>
                        </div>   
                        <?php endif ?>
                        
                        <div class="<?php if ( ! $has_thumbnail ) echo 'without ' ?>thumbnail">
                            <?php 
                                $link = get_permalink();
                                if ( is_single() )  the_title( "<h1 class=\"post-title\"><a href=\"$link\">", "</a></h1>" ); 
                                else                the_title( "<h2 class=\"post-title\"><a href=\"$link\">", "</a></h2>" ); 
                            ?>
                            
                            <div class="image-wrap">
                                <?php if ( $has_thumbnail ) the_post_thumbnail( 'blog_big' ); ?>
                            </div>
                        </div>
                        
                        <?php if( is_single() ) echo '<div class="clearer"></div>'; ?>
                        <div class="the-content<?php if( is_single() ) echo '-single'; ?>"><?php 
                            add_filter( 'excerpt_more', create_function( '$more', 'return "<br /><br /><a class=\"more-link\" href=\"'. get_permalink( get_the_ID() ) . '\">' . yiw_get_option('blog_read_more_text') . '</a>";' ) );
                            the_content( yiw_get_option('blog_read_more_text') );
                        ?></div>
                        
                        
                        <?php if( is_single() && get_post_type() != 'bl_testimonials') get_template_part( 'about-the-author' ) ?>
                        
                        <?php wp_link_pages(); ?>
					
						<?php if( is_single() ) the_tags( '<p class="list-tags">Tags: ', ', ', '</p>' ) ?>    
                    
                    </div>         