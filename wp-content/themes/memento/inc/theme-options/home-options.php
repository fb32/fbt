<?php           
$yiw_options['home'] = array (
	 
	/* =================== SECTION 1 =================== */
    'title' => array(    
        array( 'name' => __('Home Sections', 'yiw'),
        	   'type' => 'title'),
    ),
    
    'homerow' => array(
        array( 'name' => __('Home Row', 'yiw'),
        	   'type' => 'section'),
        array( 'type' => 'open'),
        
        array( 'name' => __('Show in home', 'yiw'),
               'desc' => __('Show this section in home page.', 'yiw'),
               'id' => 'show_home_row',
               'type' => 'on-off',
               'std' => 1 ),
               
        array( 'type' => 'close')   
    ), 
                                                      
    /* =================== TESTIMONIAL =================== */
    'testimonials' => array(
        array( 'name' => __('Testimonials Slider', 'yiw'),
        	   'type' => 'section'),
        array( 'type' => 'open'),
        
        array( 'name' => __('Show in home', 'yiw'),
               'desc' => __('Show this section in home page.', 'yiw'),
               'id' => 'show_home_testimonials',
               'type' => 'on-off',
               'std' => 1 ),

        array( 'name' => __('Title Testimonials section', 'yiw'),
               'desc' => __('Define the title for the testimonials section.', 'yiw'),
               'id' => 'home_testimonials_title',
               'type' => 'text',
               'std' => __( 'People [love Memènto]', 'yiw' ) ), 

        array( 'name' => __('Title icon', 'yiw'),
               'desc' => __('Define the icon for the title in the testimonials section.', 'yiw'),
               'id' => 'home_testimonials_title_icon',
               'type' => 'select-icon',
               'data' => 'array',
               'upload' => true,
               'options' => empty( $yiw_awesome_icons ) ? array() : $yiw_awesome_icons,
               'std' => '' ),               

        array( 'name' => __('Description Testimonials section', 'yiw'),
               'desc' => __('Define the description for the testimonials section, shown below the title.', 'yiw'),
               'id' => 'home_testimonials_description',
               'type' => 'text',
               'std' => __( 'feedback from our customers', 'yiw' ) ), 

        array( 'name' => __('Speed testimonials slider (s)', 'yiw'),
               'desc' => __('Define the speed for the transation of testimonials.', 'yiw'),
               'id' => 'home_testimonials_speed',
               'type' => 'slider_control',
               'max' => 3,
               'min' => 0.1,
               'step' => 0.1,
               'std' => 0.5 ), 

        array( 'name' => __('Timeout testimonials slider (s)', 'yiw'),
               'desc' => __('Define the intervall between the slides.', 'yiw'),
               'id' => 'home_testimonials_timeout',
               'type' => 'slider_control',
               'max' => 20,
               'min' => 1,
               'step' => 1,
               'std' => 8 ),
         
        array( 'type' => 'close')   
    ),          
    /* =================== END TESTIMONIALS =================== */  
    
                                                      
    /* =================== BLOG =================== */
    'blog' => array(
        array( 'name' => __('Blog', 'yiw'),
        	   'type' => 'section'),
        array( 'type' => 'open'),  
        
        array( 'name' => __('Show in home', 'yiw'),
               'desc' => __('Show this section in home page.', 'yiw'),
               'id' => 'show_home_blog',
               'type' => 'on-off',
               'std' => 1 ),
        
        array( 'name' => __('Section title', 'yiw'),
               'desc' => __('Define the title showed.', 'yiw'),
               'id' => 'blog_title',
               'type' => 'text',
               'std' => __( 'Latest Articles', 'yiw' ) ),
        
        array( 'name' => __('Items (home page)', 'yiw'),
               'desc' => __('Select how many items you want to show in home page template.', 'yiw'),
               'id' => 'blog_items_home_page',
               'min' => 2,
               'max' => 32,
               'type' => 'slider_control',
               'std' => 4),
        
        array( 'name' => __('Show thumbnail in home page', 'yiw'),
               'desc' => __('Select if you want to show the thumbnail in  the section of home page template.', 'yiw'),
               'id' => 'blog_show_thumbnail_homepage',
               'type' => 'on-off',
               'std' => __( 0, 'yiw' ) ),
        
        array( 'name' => __('Thumbnail link', 'yiw'),
               'desc' => __('Select if you want the thumbnail to link to the post.', 'yiw'),
               'id' => 'link_thumbnail_homepage',
               'type' => 'on-off',
               'deps' => array(
                    'id' => 'blog_show_thumbnail_homepage',
                    'value' => 1
               ),
               'std' => __( 0, 'yiw' ) ),
               
        array( 'name' => __('Show post date', 'yiw'),
               'desc' => __('Select if you want to show the date for each post.', 'yiw'),
               'id' => 'home_blog_show_date',
               'type' => 'on-off',
               'std' => 1 ),
        
        array( 'name' => __('Post date icon', 'yiw'),
               'desc' => __('Select which icon use for post date.', 'yiw'),
               'id' => 'home_blog_date_icon',
               'type' => 'select-icon',
               'upload' => true,
               'data' => 'array',
               'deps' => array(
                    'id' => 'home_blog_show_date',
                    'value' => 1
               ),
               'std' => 'icon-calendar' ),
        
        array( 'name' => __('Show read more button', 'yiw'),
               'desc' => __('Select if you want to show the read more button below the post.', 'yiw'),
               'id' => 'home_blog_show_read_more',
               'type' => 'on-off',
               'std' => __( 1, 'yiw' ) ),

        array( 'name' => __('Read more text', 'yiw'),
               'desc' => __('Write what you want to show on more link. You can use the shortcode [button]. <strong>Do not use</strong> double quotes for attributes. <strong>Do not use</strong> class and href attributes.', 'yiw'),
               'id' => 'home_blog_read_more_text',
               'deps' => array(
                   'id' => 'home_blog_show_read_more',
                   'value' => true
               ),
               'type' => 'text',
               'std' => '// read more >' ),
         
        array( 'type' => 'close')   
    ),          
    /* =================== END BLOG =================== */  
    
                                                      
    /* =================== SERVICES =================== */
    'services' => array(
        array( 'name' => __('Services', 'yiw'),
        	   'type' => 'section'),
        array( 'type' => 'open'),
        
        array( 'name' => __('Show in home', 'yiw'),
               'desc' => __('Show this section in home page.', 'yiw'),
               'id' => 'show_home_services',
               'type' => 'on-off',
               'std' => 1 ),
        
        array( 'name' => __('Section title', 'yiw'),
               'desc' => __('Define the title showed.', 'yiw'),
               'id' => 'services_title',
               'type' => 'text',
               'std' => __( 'Our [services]', 'yiw' ) ),
        
        array( 'name' => __('Items (home page)', 'yiw'),
               'desc' => __('Select how many items you want to show in home page template.', 'yiw'),
               'id' => 'services_items_home_page',
               'min' => 2,
               'max' => 32,
               'type' => 'slider_control',
               'std' => 12),
        
        array( 'name' => __('Show thumbnail in home page', 'yiw'),
               'desc' => __('Select if you want to show the thumbnail in  the section of home page template.', 'yiw'),
               'id' => 'services_show_thumbnail_homepage',
               'type' => 'on-off',
               'std' => __( 1, 'yiw' ) ),
        
        array( 'name' => __('Show read more button', 'yiw'),
               'desc' => __('Select if you want to show the read more button below the post.', 'yiw'),
               'id' => 'home_services_show_read_more',
               'type' => 'on-off',
               'std' => __( 1, 'yiw' ) ),

        array( 'name' => __('Read more text', 'yiw'),
               'desc' => __('Write what you want to show on more link', 'yiw'),
               'id' => 'home_services_read_more_text',
               'deps' => array(
                   'id' => 'home_services_show_read_more',
                   'value' => true
               ),
               'type' => 'text',
               'std' => '// read more >' ),
         
        array( 'type' => 'close')   
    ),          
    /* =================== END SERVICES =================== */  
);   
?>