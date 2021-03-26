<?php
/*
 * Skin Theme Customizer Settings Page 
 *
 * @package WordPress
 * @subpackage Skin
 * @since Skin 1.0
 */

/**
* Configure Theme Customizer Panel with Kirki 
*/
if ( class_exists( 'Kirki' ) ) {
    /**
    * Add a Customizer Panel and Sections
    */
    function skin_demo_panels_sections( $wp_customize ) {

    // Adding sections in theme customizer for Skin theme
        // Header Style.
        $wp_customize->add_section( 'header_style', array(
            'title'       => __( 'Header', 'skin' ),
            'priority'    => 22,
            'description' => __( 'Ability to change the header style.', 'skin' ),
        ) );

        // Featured Area Style
        $wp_customize->add_section( 'featured_style', array(
            'title'       => __( 'Featured Area', 'skin' ),
            'priority'    => 26,
            'description' => __( 'Ability to change the Featured Area style.', 'skin' ),
        ) );

        // Post area Style
        $wp_customize->add_section( 'post_area_style', array(
            'title'       => __( 'Post Area', 'skin' ),
            'priority'    => 28,
            'description' => __( 'Ability to change the Post Area style.', 'skin' ),
        ) );

        // Footer Style
        $wp_customize->add_section( 'footer_style', array(
            'title'       => __( 'Footer', 'skin' ),
            'priority'    => 30,
            'description' => __( 'Ability to change the Footer style.', 'skin' ),
        ) );

        // Single Style
        $wp_customize->add_section( 'skin_singlepost', array(
            'title'       => __( 'Single', 'skin' ),
            'priority'    => 32,
            'description' => __( 'From this panel you control the Single Post Options.', 'skin' ),
        ) );

        // Social Media Style
        $wp_customize->add_section( 'skin_social_icons', array(
            'title'       => __( 'Social Media', 'skin' ),
            'priority'    => 35,
            'description' => __( 'From this panel you control the Social Media Options.', 'skin' ),
        ) );

        // Extra Style
        $wp_customize->add_section( 'skin_extra_settings', array(
            'title'       => __( 'Extra Settings', 'skin' ),
            'priority'    => 115,
            'description' => __( 'From this panel you control the Footer Options.', 'skin' ),
        ) );

        // Typography Style
        $wp_customize->add_section( 'skin_typography_settings', array(
            'title'       => __( 'Typography', 'skin' ),
            'priority'    => 119,
            'description' => __( 'From this panel you control Typography.', 'skin' ),
        ) );
    }

    add_action( 'customize_register', 'skin_demo_panels_sections' );

    /*
     * Adding Settings into the above created Sections
    */
    function skin_demo_fields( $fields ) {

        // 1. Site Identity
        
        // 1.1 Logo Uploader Field
          // Logo area is added through WP's default logo uploader
        // 1.2, 1.3 and 1.4 settings are added by default by WordPress

        // 2. Header
        
        // 2.1 Header Style to select the header
        $fields[] =  array(
            'type'        => 'radio-image',
            'settings'    => 'header_style_selector',
            'label'       => __( 'Header Style Selector.', 'skin' ),
            'description' => __( 'Click one of the below images to change the style of the Header area.', 'skin' ),
            'section'     => 'header_style',
            'default'     => 'skin_1',
            'priority'    => 10,
            'choices'     => array(
                'skin_1'   => get_template_directory_uri() . '/images/header-one.png',
                'skin_2' =>   get_template_directory_uri() . '/images/header-two.png',
                'skin_3'  =>  get_template_directory_uri() . '/images/header-three.png',
                'skin_4'  =>  get_template_directory_uri() . '/images/header-four.png'
            ),
        );
        
        // 3. Featured Area

        // 3.1 Featured Area On Off    
        $fields[] =  array(
            'type'        => 'toggle',
            'settings'    => 'home_switch_new',
            'label'       => __( 'Featured Area On-Off', 'skin' ),
            'description' => __( 'To turn on-off featured area site wide.', 'skin' ),
            'section'     => 'featured_style',
            'default'     => '0', 
        ); 

        // 3.2 Featured Area Category Selector
        $fields[] = array(
          'settings' => 'skin_featured_categories',
          'description' => __( 'Select Category(ies) for the top panel of Home page. ( Make sure the category contains at least 3 posts )', 'skin' ),
          'label'    => __( 'Home Top Category', 'skin' ),
          'section'  => 'featured_style',
          'type'     => 'select',
          'choices'  => skin_get_all_categories_list(),
        );

        // 3.3 Change Text written to top of Featured Area.
        $fields[] = array(
            'type'        => 'text',
            'label'       => __( '"Featured" Text', 'skin' ),
            'default'     =>  'Featured',
            'section'     => 'featured_style',
            'settings'    => 'skin_featured_text',    
            'transport'   => 'postMessage',
            'js_vars'     => array(
                array(
                    'element'  => '.featured_area .featured_label',
                    'function' => 'html',
                    'property' => 'text',
                ),
            )
        ); 
        
        // 3.4 Change the style of Featured Area.
        $fields[] =  array(
            'type'        => 'radio-image',
            'settings'    => 'featured_style_selector',
            'label'       => __( 'Featured Style Selector.', 'skin' ),
            'description' => __( 'Click one of the below images to change the style of the Featured area.', 'skin' ),
            'section'     => 'featured_style',
            'default'     => 'skin_1',
            'priority'    => 10,
            'choices'     => array(
                'skin_1'   => get_template_directory_uri() . '/images/featured-one.png',
                'skin_2' =>   get_template_directory_uri() . '/images/featured-two.png' 
            ),
    );
        
    
        // 4. Post Area

        // 4.1 Change the style of Post Area.
        $fields[] =  array(
            'type'        => 'radio-image',
            'settings'    => 'post_area_style_selector',
            'label'       => __( 'Post Area on Homepage Style Selector.', 'skin' ),
            'description' => __( 'Click one of the below images to change the style of the Post Area on Homepage area.', 'skin' ),
            'section'     => 'post_area_style',
            'default'     => 'skin_1',
            'priority'    => 10,
            'choices'     => array(
                'skin_1'   => get_template_directory_uri() . '/images/content-one.png',
                'skin_2' =>   get_template_directory_uri() . '/images/content-two.png',
                'skin_3'  =>  get_template_directory_uri() . '/images/content-three.png'
            ),
        );
        
            // 5. Footer

            // 5.1 Change the style of Footer.
            $fields[] =  array(
                'type'        => 'radio-image',
                'settings'    => 'footer_style_selector',
                'label'       => __( 'Footer on Homepage Style Selector.', 'skin' ),
                'description' => __( 'Click one of the below images to change the style of the Footer on Homepage area.', 'skin' ),
                'section'     => 'footer_style',
                'default'     => 'skin_1',
                'priority'    => 10,
                'choices'     => array(
                    'skin_1'   => get_template_directory_uri() . '/images/footer-one.png' 
                ),
            );
        
        // 5.2 Setting to change Copyright text in the footer.
        $fields[] = array(
            'type'        => 'text',
            'settings'    => 'footer_copyright',
            'label'       => __( 'Copyright text', 'skin' ),
            'default'     => '',
            'section'     => 'footer_style',
            'priority'    => 12,    
            'transport'   => 'postMessage',
            'js_vars'     => array(
                array(
                    'element'  => '.sub-footer .col-md-8 p',
                    'function' => 'html',
                    'property' => 'text',
                ),
            )
        );
        
        // 6. Single 
        
        // 6.1 Featured Area ON/OFF
        $fields[] = array(
            'type'        => 'switch',
            'settings'    => 'skin_single_featured',
            'label'       => __( 'Featured Image ON/OFF', 'skin' ),
            'section'     => 'skin_singlepost',
            'default'     => '1',
            'priority'    => 10,
            'choices'     => array(
                'on'  => __( 'On', 'skin' ),
                'off' => __( 'Off', 'skin' ),
            ),
        );
         
        // 6.2 Social Sharing ON/OFF
        $fields[] = array(
            'type'        => 'switch',
            'settings'    => 'skin_single_social',
            'label'       => __( 'Social Sharing ON/OFF', 'skin' ),
            'section'     => 'skin_singlepost',
            'default'     => '1',
            'priority'    => 15,
            'choices'     => array(
                'on'  => __( 'On', 'skin' ),
                'off' => __( 'Off', 'skin' ),
            ),
        );
         
        // 6.3 Author Area ON/OFF
        $fields[] = array(
            'type'        => 'switch',
            'settings'    => 'skin_single_author',
            'label'       => __( 'Author Area ON/OFF', 'skin' ),
            'section'     => 'skin_singlepost',
            'default'     => '1',
            'priority'    => 16,
            'choices'     => array(
                'on'  => __( 'On', 'skin' ),
                'off' => __( 'Off', 'skin' ),
            ),
        );
        
        // 6.4 Related Posts ON/OFF
        $fields[] = array(
            'type'        => 'switch',
            'settings'    => 'skin_single_related',
            'label'       => __( 'Related Posts ON/OFF', 'skin' ),
            'section'     => 'skin_singlepost',
            'default'     => '1',
            'priority'    => 20,
            'choices'     => array(
                'on'  => __( 'On', 'skin' ),
                'off' => __( 'Off', 'skin' ),
            ),
        );
        
        // 6.5 Show number of posts in Related Post Section
        $fields[] = array(
            'type'     => 'slider',
            'settings' => 'skin_single_related_count',
            'label'    => __( 'Number of Related Posts', 'skin' ),
            'section'  => 'skin_singlepost',
            'default'  => 4,
            'priority' => 25,
            'choices'  => array(
                'min'  => 4,
                'max'  => 20,
                'step' => 2,
            ),
        );
        
        // 6.6 Latest Posts ON/OFF
//        $fields[] = array(
//            'type'        => 'switch',
//            'settings'    => 'skin_single_latest',
//            'label'       => __( 'Latest Posts ON/OFF', 'skin' ),
//            'section'     => 'skin_singlepost',
//            'default'     => '1',
//            'priority'    => 30,
//            'choices'     => array(
//                'on'  => __( 'On', 'skin' ),
//                'off' => __( 'Off', 'skin' ),
//            ),
//        );
        
        // 6.7 Show number of posts in Latest Post Section
//        $fields[] = array(
//            'type'     => 'slider',
//            'settings' => 'skin_single_latest_count',
//            'label'    => __( 'Number of Latest Posts', 'skin' ),
//            'section'  => 'skin_singlepost',
//            'default'  => 4,
//            'priority' => 35,
//            'choices'  => array(
//                'min'  => 4,
//                'max'  => 20,
//                'step' => 2,
//            ),
//        );
        
        
        // 7. Social Icons
        
        //  Make Icon Square ON/OFF
        $fields[] = array(
            'type'        => 'select',
            'settings'    => 'skin_icon_style',
            'label'       => __( 'Make Icons Style', 'skin' ),
            'section'     => 'skin_social_icons',
            'default'     => 'icon_type_round',
            'priority'    => 0,
            'choices'     => array(
                'icon_type_round'  => __( 'Round', 'skin' ),
                'icon_type_square' => __( 'Square', 'skin' ),
                'icon_type_light'  => __( 'Light', 'skin' ),
                'icon_type_dark'  => __( 'Dark', 'skin' ),
            ),
        );
        
        //  Twitter ON/OFF
        $fields[] = array(
            'type'        => 'switch',
            'settings'    => 'skin_twitter_on_off',
            'label'       => __( 'Twitter ON/OFF', 'skin' ),
            'section'     => 'skin_social_icons',
            'default'     => '0',
            'priority'    => 1,
            'choices'     => array(
                'on'  => __( 'On', 'skin' ),
                'off' => __( 'Off', 'skin' ),
            ),
        );
        //  Twitter Link
        $fields[] = array(
            'type'        => 'text',
            'label'       => __( 'Twitter Link', 'skin' ),
            'default'     =>  '#',
            'priority'    => 2,
            'section'     => 'skin_social_icons',
            'settings'    => 'skin_twitter_link', 
        );
        
        //  Facebook ON/OFF
        $fields[] = array(
            'type'        => 'switch',
            'settings'    => 'skin_facebook_on_off',
            'label'       => __( 'Facebook ON/OFF', 'skin' ),
            'section'     => 'skin_social_icons',
            'default'     => '0',
            'priority'    => 3,
            'choices'     => array(
                'on'  => __( 'On', 'skin' ),
                'off' => __( 'Off', 'skin' ),
            ),
        );
        //  Facebook Link
        $fields[] = array(
            'type'        => 'text',
            'label'       => __( 'Facebook Link', 'skin' ),
            'default'     =>  '#',
            'priority'    => 4,
            'section'     => 'skin_social_icons',
            'settings'    => 'skin_facebook_link', 
        );
        
        //  Instagram ON/OFF
        $fields[] = array(
            'type'        => 'switch',
            'settings'    => 'skin_instagram_on_off',
            'label'       => __( 'Instagram ON/OFF', 'skin' ),
            'section'     => 'skin_social_icons',
            'default'     => '0',
            'priority'    => 5,
            'choices'     => array(
                'on'  => __( 'On', 'skin' ),
                'off' => __( 'Off', 'skin' ),
            ),
        );
        //  Instagram Link
        $fields[] = array(
            'type'        => 'text',
            'label'       => __( 'Instagram Link', 'skin' ),
            'default'     =>  '#',
            'priority'    => 6,
            'section'     => 'skin_social_icons',
            'settings'    => 'skin_instagram_link', 
        );
        
        //  YouTube ON/OFF
        $fields[] = array(
            'type'        => 'switch',
            'settings'    => 'skin_youtube_on_off',
            'label'       => __( 'YouTube ON/OFF', 'skin' ),
            'section'     => 'skin_social_icons',
            'default'     => '0',
            'priority'    => 7,
            'choices'     => array(
                'on'  => __( 'On', 'skin' ),
                'off' => __( 'Off', 'skin' ),
            ),
        );
        //  YouTube Link
        $fields[] = array(
            'type'        => 'text',
            'label'       => __( 'YouTube Link', 'skin' ),
            'default'     =>  '#',
            'priority'    => 8,
            'section'     => 'skin_social_icons',
            'settings'    => 'skin_youtube_link', 
        );
        
        //  LinkedIn ON/OFF
        $fields[] = array(
            'type'        => 'switch',
            'settings'    => 'skin_linkedin_on_off',
            'label'       => __( 'LinkedIn ON/OFF', 'skin' ),
            'section'     => 'skin_social_icons',
            'default'     => '0',
            'priority'    => 9,
            'choices'     => array(
                'on'  => __( 'On', 'skin' ),
                'off' => __( 'Off', 'skin' ),
            ),
        );
        //  LinkedIn Link
        $fields[] = array(
            'type'        => 'text',
            'label'       => __( 'LinkedIn Link', 'skin' ),
            'default'     =>  '#',
            'priority'    => 10,
            'section'     => 'skin_social_icons',
            'settings'    => 'skin_linkedin_link', 
        );
        
        //  Pinterest ON/OFF
        $fields[] = array(
            'type'        => 'switch',
            'settings'    => 'skin_pinterest_on_off',
            'label'       => __( 'Pinterest ON/OFF', 'skin' ),
            'section'     => 'skin_social_icons',
            'default'     => '0',
            'priority'    => 11,
            'choices'     => array(
                'on'  => __( 'On', 'skin' ),
                'off' => __( 'Off', 'skin' ),
            ),
        );
        //  Pinterest Link
        $fields[] = array(
            'type'        => 'text',
            'label'       => __( 'Pinterest Link', 'skin' ),
            'default'     =>  '#',
            'priority'    => 12,
            'section'     => 'skin_social_icons',
            'settings'    => 'skin_pinterest_link', 
        );
        
        //  GooglePlus ON/OFF
        $fields[] = array(
            'type'        => 'switch',
            'settings'    => 'skin_google_plus_on_off',
            'label'       => __( 'GooglePlus ON/OFF', 'skin' ),
            'section'     => 'skin_social_icons',
            'default'     => '0',
            'priority'    => 13,
            'choices'     => array(
                'on'  => __( 'On', 'skin' ),
                'off' => __( 'Off', 'skin' ),
            ),
        );
        //  GooglePlus Link
        $fields[] = array(
            'type'        => 'text',
            'label'       => __( 'GooglePlus Link', 'skin' ),
            'default'     =>  '#',
            'priority'    => 14,
            'section'     => 'skin_social_icons',
            'settings'    => 'skin_google_plus_link', 
        );
        
        //  Tumblr ON/OFF
        $fields[] = array(
            'type'        => 'switch',
            'settings'    => 'skin_tumblr_on_off',
            'label'       => __( 'Tumblr ON/OFF', 'skin' ),
            'section'     => 'skin_social_icons',
            'default'     => '0',
            'priority'    => 15,
            'choices'     => array(
                'on'  => __( 'On', 'skin' ),
                'off' => __( 'Off', 'skin' ),
            ),
        );
        //  Tumblr Link
        $fields[] = array(
            'type'        => 'text',
            'label'       => __( 'Tumblr Link', 'skin' ),
            'default'     =>  '#',
            'priority'    => 16,
            'section'     => 'skin_social_icons',
            'settings'    => 'skin_tumblr_link', 
        );
 
        
        //  Reddit ON/OFF
        $fields[] = array(
            'type'        => 'switch',
            'settings'    => 'skin_reddit_on_off',
            'label'       => __( 'Reddit ON/OFF', 'skin' ),
            'section'     => 'skin_social_icons',
            'default'     => '0',
            'priority'    => 19,
            'choices'     => array(
                'on'  => __( 'On', 'skin' ),
                'off' => __( 'Off', 'skin' ),
            ),
        );
        //  Reddit Link
        $fields[] = array(
            'type'        => 'text',
            'label'       => __( 'Reddit Link', 'skin' ),
            'default'     =>  '#',
            'priority'    => 20,
            'section'     => 'skin_social_icons',
            'settings'    => 'skin_reddit_link', 
        );
        
        // 7. Color Settings
        
        // 7.1 Background Color has been added by default by WordPress
        
//        // 7.2 Homepage Top Category Post Title Color
//        $fields[] = array(
//            'type'        => 'color',
//            'setting'     => 'skin_top_category_posttitle_color',
//            'label'       => __( 'Global Color', 'skin' ),
//        //  'description' => __( 'Global Color is ', 'skin' ),
//            'section'     => 'colors',
//            'priority'    => 10,
//            'default'     => '#e53b2c',   
//            'output'      => array(  
//                array(
//                    'element'  => '.featured_label, .search-submit, .nav-links .current, .cat-wrapper li a, .single-content-holder .cat-no-featured a, .nav-links .page-numbers:hover, #submit, .reply a:hover',
//                    'function' => 'style',
//                    'property' => 'background'
//                ),
//                array(
//                    'element'  => 'a, .byline a, .edit-link a, .comments-holder:hover, .comments-holder:hover a, .sidebar-wrapper .widget li a:hover, .widget li a:hover, .comment-author .fn',
//                    'function' => 'style',
//                    'property' => 'color'
//                ),
//            ),
//            'transport'   => 'postMessage',
//            'js_vars'     => array(
//                array(
//                    'element'  => '.featured_label, .search-submit, .nav-links .current, .cat-wrapper li a, .single-content-holder .cat-no-featured a, .nav-links .page-numbers:hover, #submit, .reply a:hover',
//                    'function' => 'style',
//                    'property' => 'background'
//                ),
//                array(
//                    'element'  => 'a, .byline a, .edit-link a, .comments-holder:hover, .comments-holder:hover a, .sidebar-wrapper .widget li a:hover, .widget li a:hover, .comment-author .fn',
//                    'function' => 'style',
//                    'property' => 'color'
//                ),
//            )
//        );
        
        // 8. Background Image added by WordPress by Default 
        
        // 9. Menus added by WordPress by Default
        
        // 10. Widgets added by WordPress by Default
        
        // 11. Extra Settings
        
        // 11.1 Google Analytics area.
        // $fields[] = array(
        //     'type'        => 'code',
        //     'settings'    => 'google_analytics',
        //     'label'       => __( 'Enter the Google Analytics Code here.', 'skin' ),
        //     'description' => __( 'Here you can enter the Google Analytics code that you get from the analytics website..', 'skin' ),
        //     'section'     => 'skin_extra_settings',
        //     'default'     => '',
        //     'priority'    => 2,
        //     'choices'     => array(
        //         'language' => 'js',
        //         'theme'    => 'monokai',
        //         'height'   => 250,
        //     ),
        // ); 
        
        // 11.2 Setting to add Custom CSS. This CSS will be pasted in Footer.
        $fields[] = array(
            'type'        => 'code',
            'settings'    => 'custom_css',
            'label'       => __( 'Custom CSS', 'skin' ),
            'description' => __( 'Enter your custom CSS to edit live.', 'skin' ),
            'section'     => 'skin_extra_settings',
            'default'     => '',
            'priority'    => 3,
            'choices'     => array(
                'language' => 'css',
                'theme'    => 'monokai',
                'height'   => 250,
            ),
        ); 
 
        // 3. Typography 
        $fields[] = array(
            'type'        => 'select',
            'setting'     => 'skin_typography_heading_font_family',
            'label'       => __( 'Main Heading Fonts', 'skin' ),
            'description' => __( 'Please choose a typeface for headings.', 'skin' ),
            'section'     => 'skin_typography_settings',
            'default'     => 'Roboto',
             
            'choices'     => Kirki_Fonts::get_font_choices(),
            'output'      => array(
                array(
                    'element'  => '.blog_post h2',
                    'property' => 'font-family',
                ),
            ),
            'js_vars'     => array(
                array(
                    'element'  => '.blog_post h2',
                    'function' => 'css',
                    'property' => 'font-family',
                ),
            ),
        ); 
        
        $fields[] = array(
            'type'      => 'slider',
            'settings'  => 'base_typography_font_size',
            'label'     => __( 'Font Size', 'skin' ),
            'section'   => 'skin_typography_settings',
            'default'   => 22,
            'priority'  => 25,
            'choices'   => array(
                'min'   => 7,
                'max'   => 60,
                'step'  => 1,
            ),
            'output'      => array(
                array(
                    'element'  => '.blog_post h2',
                    'property' => 'font-size',
                    'units'    => 'px',
                ),
            ), 
            'transport' => 'postMessage', 
            'js_vars'   => array(
                array(
                    'element'  => '.blog_post h2',
                    'function' => 'css',
                    'property' => 'font-size',
                    'units'    => 'px'
                ),
            ),
        ) ;

        return $fields;

    }

    add_filter( 'kirki/fields', 'skin_demo_fields' );
}
