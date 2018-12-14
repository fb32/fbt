<?php         

global $yiw_skins;       

$yiw_options['general'] = array (      
	 
    /* =================== SKIN =================== */
    'responsive' => array(    
        array( 'name' => __('General Settings', 'yiw'),
        	   'type' => 'title'),
    
        array( 'name' => __('Activate responsive', 'yiw'),
        	   'type' => 'section',
               'effect' => 0),
        array( 'type' => 'open'),       
         
        array( 'name' => __('Activate responsive', 'yiw'),
        	   'desc' => __('Select if you want to active or not the responsive', 'yiw'),
        	   'id' => 'responsive',
        	   'type' => 'on-off',
        	   'button' => __( 'Save', 'yiw' ),
               'std' => 1 ),     
        	
        array( 'type' => 'close')
    ),        
    /* =================== END SKIN =================== */
     
    /* =================== GENERAL =================== */
    'general' => array(    
        array( 'name' => __('General', 'yiw'),
               'type' => 'section'),
        array( 'type' => 'open'),
        
        array( 'name' => __('Layout theme', 'yiw'),
        	   'desc' => __('Select the general layout of the theme.', 'yiw'),
        	   'id' => 'theme_layout',
        	   'type' => 'select',
        	   'options' => array(
			   		'stretched' => __( 'Stretched', 'yiw' ),
			   		'boxed' => __( 'Boxed', 'yiw' ),
			   ),
        	   'std' => 'boxed' ),            
            
        array( 'name' => __('Custom Favicon', 'yiw'),
               'desc' => __("A favicon is a 16x16 pixel icon that represents your site; paste the URL to a icon image that you want to use as the image. NOTE: it's not allowed the .ico extension", 'yiw'),
               'id' => 'favicon',
               'type' => 'upload',
               'std' => get_template_directory_uri() .'/favicon.ico'),        
            
        array( 'name' => __('Custom Style', 'yiw'),
               'desc' => __('You can write here your custom css, that will replace the default css.', 'yiw'),
               'id' => 'custom_style',
               'type' => 'textarea',
               'std' => ''),
               
//         array( 'id' => 'author_links',
//                'type' => 'user_links',
//                'data' => 'array',
//                'options' => empty( $yiw_user_link ) ? array() : $yiw_user_link
//         ),     
            
        array( 'type' => 'close')
    ),        
    /* =================== END GENERAL =================== */
    
                                                 
    /* =================== HEADER =================== */
    'header' => array(
        array( 'name' => __('Header', 'yiw'),
               'type' => 'section'),
        array( 'type' => 'open'),        
                                    
        array( 'name' => __('Custom Logo', 'yiw'),
               'desc' => __('Want to use a custom image as logo?', 'yiw'),
               'id' => 'use_logo',     
               'type' => 'on-off',
               'std' => 0),
            
        array( 'name' => __('Logo URL', 'yiw'),
               'desc' => __('Enter the URL to your logo image', 'yiw'),
               'id' => 'logo',     
               'type' => 'upload',  
               'deps' => array(
                    'id' => 'use_logo',
                    'value' => 1
               ),
               'std' => ''),
            
        array( 'name' => __('Logo Description', 'yiw'),
               'desc' => __('Specify if you want the description below the logo', 'yiw'),
               'id' => 'logo_use_description',     
               'type' => 'on-off',
               'std' => 1),
            
        array( 'desc' => '<b>' . __('Topbar', 'yiw') . '</b>',   
               'type' => 'simple-text'),  
        
        array( 'type' => 'close')
    ),   
    /* =================== END portfolio =================== */
                                                      
    /* =================== FOOTER =================== */
    'footer' => array(
        array( 'name' => __('Footer', 'yiw'),
               'type' => 'section'),
        array( 'type' => 'open'),   
         
        array( 'name' => __('Footer Type', 'yiw'),
               'desc' => __('Select the footer type for the theme', 'yiw'),
               'id' => 'footer_type',
               'type' => 'select',
               'options' => array(
                    'normal' => __( 'Two Columns Footer', 'yiw' ), 
                    'centered' => __( 'Centered Footer', 'yiw' ),
                    'big-normal' => __('Big Footer + Two Columns', 'yiw' ),
                    'big-centered' => __('Big Footer + Centered', 'yiw' )
                ),
               'std' => 'normal'),  
            
        array( 'name' => __('Big Footer Widget Areas', 'yiw'),
               'desc' => __('Select the number of widget area you\'d like to use.<br /><strong>Note: It will work only if you\'ve chosen one of Big Footer types above</strong>', 'yiw'),
               'id' => 'footer_rows',
               'type' => 'slider',
               'min' => 1,
               'max' => 4,
               'type' => 'slider_control',
               'std' => 1),  

        array( 'name' => __('Number of widgets in each footer Widget Area', 'yiw'),
               'desc' => __('Select the number of widget you\'d like to use in each footer widget area<br /><strong>Note: It will work only if you\'ve chosen one of Big Footer types above</strong>', 'yiw'),
               'id' => 'footer_columns',
               'type' => 'slider',
               'min' => 1,
               'max' => 4,
               'type' => 'slider_control',
               'std' => 4),  

        array( 'name' => __('Footer centered text', 'yiw'),
               'desc' => __('Enter text used in <strong>centered footer</strong>. It can be HTML.', 'yiw'),
               'id' => 'footer_text_centered',
               'type' => 'textarea',
               'std' => '' ),
            
        array( 'name' => __('Footer copyright text Left', 'yiw'),
               'desc' => __('Enter text used in the left side of the footer. It can be HTML. <strong>NB: not figured on "centered footer"</strong>', 'yiw'),
               'id' => 'copyright_text_left',
               'type' => 'textarea',
               'std' => 'Copyright <a href="%site_url%"><strong>%name_site%</strong></a> 2012' ),
            
        array( 'name' => __('Footer copyright text Right', 'yiw'),
               'desc' => __('Enter text used in the right side of the footer. It can be HTML. <strong>NB: not figured on "centered footer"</strong>', 'yiw'),
               'id' => 'copyright_text_right',
               'type' => 'textarea',
               'std' => 'Powered by <a href="http://yithemes.com/" title="free themes wordpress"><strong>Your Inspiration Themes</strong></a>'),
            
        array( 'name' => __('Google Analytics Code', 'yiw'),
               'desc' => __('You can paste your Google Analytics or other tracking code in this box. This will be automatically added to the footer.', 'yiw'),
               'id' => 'ga_code',
               'type' => 'textarea',
               'std' => ''),
         
        array( 'type' => 'close')   
    ),           
    /* =================== END FOOTER =================== */    
);   
?>