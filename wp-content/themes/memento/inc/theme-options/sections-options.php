<?php                

$yiw_options['sections'] = array (

    'title' => array(    
        array( 'name' => __('Sections', 'yiw'),
               'type' => 'title'),   
    ), 
    
     
    /* =================== testimonials =================== */
    'testimonials' => array(

            
        array( 'name' => __('Testimonials page', 'yiw'),
               'type' => 'section'),
        array( 'type' => 'open'),


        array( 'name' => __('Link to testimonial detail page', 'yiw'),
               'desc' => __('Say if you want that the testimonial links, link to the testimonial detail page.', 'yiw'),
               'id' => 'testimonial_single_link',
               'type' => 'on-off',
               'std' => 1),       
               
        array( 'name' => __('Testimonial text type', 'yiw'),
               'desc' => __('Select what kind of content you want to show.', 'yiw'),
               'id' => 'testimonial_content_type',
               'type' => 'select',
               'options' => array(
                    'content' => __( 'Complete content', 'yiw' ),
                    'excerpt' => __( 'Excerpt', 'yiw' ),
                    'limit-words' => __( "Limit of...", 'yiw' ),
               ),
               'std' => 'lightbox'),  
               
        array( 'name' => __('Limit words', 'yiw'),
               'desc' => __('Select how many words to show.', 'yiw'),
               'id' => 'testimonial_limit_words',
               'type' => 'slider_control',
               'min' => 5,
               'max' => 255,
               'step' => 1,
               'deps' => array(
                   'id' => 'testimonial_content_type',
                   'value' => 'limit-words'
               ),
               'std' => 38 ),  
        
        array( 'type' => 'close')
    ),   
    /* =================== END portfolio =================== */

                                                 
    /* =================== BLOG =================== */
    'blog' => array(
        array( 'name' => __('Blog Settings', 'yiw'),
               'type' => 'section'),
        array( 'type' => 'open'),     

        array( 'name' => __('Exclude categories', 'yiw'),
               'desc' => __('Select witch categories you want exlude from blog.', 'yiw'),
               'id' => 'blog_cats_exclude',
               'type' => 'cat',
               'cols' => 2,          // number of columns for multickecks
               'heads' => array(__('Blog Page', 'yiw'), __('List cat. sidebar', 'yiw')),  // in case of multi columns, specific the head for each column
               'std' => ''),
        
        array( 'name' => __('Show post date', 'yiw'),
               'desc' => __('Select if you want to show the date for each post.', 'yiw'),
               'id' => 'blog_show_date',
               'type' => 'on-off',
               'std' => 1 ),
        
        array( 'name' => __('Post date icon', 'yiw'),
               'desc' => __('Select which icon use for post date.', 'yiw'),
               'id' => 'blog_date_icon',
               'type' => 'select-icon',
               'data' => 'array',
               'deps' => array(
                    'id' => 'blog_show_date',
                    'value' => 1
               ),
               'std' => 'icon-calendar' ),
        
        array( 'name' => __('Show post categories', 'yiw'),
               'desc' => __('Select if you want to show the categories for each post.', 'yiw'),
               'id' => 'blog_show_categories',
               'type' => 'on-off',
               'std' => 1 ),
        
        array( 'name' => __('Post categories icon', 'yiw'),
               'desc' => __('Select which icon use for post categories.', 'yiw'),
               'id' => 'blog_categories_icon',
               'type' => 'select-icon',   
               'data' => 'array',
               'deps' => array(
                    'id' => 'blog_show_categories',
                    'value' => 1
               ),
               'std' => 'icon-tags' ),
               
        array( 'name' => __('Show post author', 'yiw'),
               'desc' => __('Select if you want to show the author for each post.', 'yiw'),
               'id' => 'blog_show_author',
               'type' => 'on-off',
               'std' => 1 ),
        
        array( 'name' => __('Post author icon', 'yiw'),
               'desc' => __('Select which icon use for post author.', 'yiw'),
               'id' => 'blog_author_icon',
               'type' => 'select-icon',   
               'data' => 'array',
               'deps' => array(
                    'id' => 'blog_show_author',
                    'value' => 1
               ),
               'std' => 'icon-user' ),
    
        array( 'name' => __('Show post number of comments', 'yiw'),
               'desc' => __('Select if you want to show the number of comments for each post.', 'yiw'),
               'id' => 'blog_show_comments',
               'type' => 'on-off',
               'std' => 1 ),
        
        array( 'name' => __('Post comments icon', 'yiw'),
               'desc' => __('Select which icon use for post comments.', 'yiw'),
               'id' => 'blog_comments_icon',
               'type' => 'select-icon',   
               'data' => 'array',
               'deps' => array(
                    'id' => 'blog_show_comments',
                    'value' => 1
               ),
               'std' => 'icon-comment' ),
        
        array( 'name' => __('Show read more button', 'yiw'),
               'desc' => __('Select if you want to show the read more button below the post.', 'yiw'),
               'id' => 'blog_show_read_more',
               'type' => 'on-off',
               'std' => __( 1, 'yiw' ) ),

        array( 'name' => __('Read more text', 'yiw'),
               'desc' => __('Write what you want to show on more link.', 'yiw'),
               'id' => 'blog_read_more_text',
               'type' => 'text',
               'std' => '// read more >' ),
               
        array( 'type' => 'close')   
    ),
    /* =================== END BLOG =================== */
);