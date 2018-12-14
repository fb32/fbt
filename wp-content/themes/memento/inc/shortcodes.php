<?php
/**
 * Additional shortcodes for the theme.
 *
 * To create new shortcode, get for example the shortcode [sample] already written.
 * Replace it with your code for shortcode and for other shortcodes, duplicate the first
 * and continue following.
 *
 * CONVENTIONS:
 * - The name of function MUST be: yiw_sc_SHORTCODENAME_func.
 * - All html output of shortcode, must be passed by an hook: apply_filters( 'yiw_sc_SHORTCODENAME_html', $html ).
 * NB: SHORTCODENAME is the name of shortcode and must be written in lowercase.
 *
 * For example, we'll add new shortcode [sample], so:
 * - the function must be: yiw_sc_sample_func().
 * - the hooks to use will be: apply_filters( 'yiw_sc_sample_html', $html ).
 *
 * @package WordPress
 * @subpackage YIW Themes
 * @since 1.0
 */

/**
 * testimonials
 *
 * @description
 *    Show all post on testimonials post types
 *
 * @example
 *   [testimonials items=""]
 *
 * @params
 *      items - number of item to show
 *
**/
function yiw_sc_testimonials_func($atts, $content = null) {
    extract(shortcode_atts(array(
        "items" => null
    ), $atts));

    wp_reset_query();

    $args = array(
        'post_type' => 'bl_testimonials'
    );

    $args['posts_per_page'] = ( !is_null( $items ) ) ? $items : -1;

    $tests = new WP_Query( $args );

    $html = '';
    if( !$tests->have_posts() ) return $html;

    //loop
    $html = '';
    $c = 0;
    while( $tests->have_posts() ) : $tests->the_post();
        $website = get_post_meta( get_the_ID(), '_testimonial_website', true );
        $label = get_post_meta( get_the_ID(), '_testimonial_label', true ) ? get_post_meta( get_the_ID(), '_testimonial_label', true ) : str_replace('http://', '', $website);
        $link = yiw_get_option( 'testimonial_single_link' );
        if ( ! empty( $website ) )
            $website = "<a class=\"website\" href=\"" . esc_url( $website ) . "\">". $label  ."</a>";
            $thumbnail = '';
            if( has_post_thumbnail() ) $thumbnail = get_the_post_thumbnail( get_the_ID(), 'thumb_testimonial' ); ?>
    
        <div class="testimonial two-fourth<?php if ( $c % 2 != 0 ) echo ' last' ?>">
            <?php if( has_post_thumbnail() ) : ?>
            <div class="thumbnail">
                <?php echo $thumbnail ?>
            </div>
            <?php endif; ?>
            
            <div class="testimonial-text<?php if( !has_post_thumbnail() ) echo ' testimonial-noimage'; ?>">
                <?php 
                switch ( yiw_get_option( 'testimonial_content_type', 'limit-words' ) ) {
                    case 'content' :
                        the_content( );
                        break;
                    case 'excerpt' :
                        the_excerpt();
                        break;
                    case 'limit-words' :
                        echo yiw_content( yiw_get_option( 'testimonial_limit_words', 38 ) );
                        break;
                }
                ?>
            </div>
            
            <div class="testimonial-name">
                <?php if ( $link ) : ?><a class="name" href="<?php the_permalink() ?>"><?php else: ?><p class="name"><?php endif; ?><?php the_title() ?><?php if ( $link ) : ?></a><?php else: ?></p><?php endif ?>
                <?php echo $website ?>
            </div>
            
        </div>

    <?php $c++; endwhile;

    return apply_filters( 'yiw_sc_testimonials_html', $html );
}
add_shortcode("testimonials", "yiw_sc_testimonials_func");