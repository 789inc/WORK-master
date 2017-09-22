<?php

    /**
     * ReduxFramework Barebones Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     *
     * For a more extensive sample-config file, you may look at:
     * https://github.com/reduxframework/redux-framework/blob/master/sample/sample-config.php
     *
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }

    // This is your option name where all the Redux data is stored.
    $opt_name = "tc_options";

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        'opt_name' => 'tc_options',
        'display_name' => 'Eventr',
        'display_version' => FALSE,
        'page_slug' => '_options',
        'page_title' => 'Eventr Options',
        'update_notice' => TRUE,
        //'intro_text' => '<p>Intro This text is displayed above the options panel. It isn\’t required, but more info is always better! The intro_text field accepts all HTML.</p>’',
//        'footer_text' => '<p>Footer This text is displayed below the options panel. It isn\’t required, but more info is always better! The footer_text field accepts all HTML.</p>',
        'admin_bar' => TRUE,
		'dev_mode' => FALSE,
		'customizer' => FALSE,
        'menu_type' => 'menu',
        'menu_title' => 'Eventr Options',
        'allow_sub_menu' => TRUE,
        'page_parent_post_type' => 'your_post_type',
        'default_mark' => '',
        'google_api_key' => 'AIzaSyBA1fx_A-KsIkpb6FB2jvtCK2Ni_uVnQkc',
        'hints' => array(
            'icon' => 'el el-cog',
            'icon_position' => 'right',
            'icon_size' => 'normal',
            'tip_style' => array(
                'color' => 'light',
            ),
            'tip_position' => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect' => array(
                'show' => array(
                    'duration' => '500',
                    'event' => 'mouseover',
                ),
                'hide' => array(
                    'duration' => '500',
                    'event' => 'mouseleave unfocus',
                ),
            ),
        ),
        'output' => TRUE,
        'output_tag' => TRUE,
        'compiler' => TRUE,
        'page_permissions' => 'manage_options',
        'save_defaults' => TRUE,
        'show_import_export' => TRUE,
        'transient_time' => '3600',
        'network_sites' => TRUE,
    );

    // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
    $args['share_icons'][] = array(
        'url'   => 'https://github.com/ReduxFramework/ReduxFramework',
        'title' => 'Visit us on GitHub',
        'icon'  => 'el el-github'
        //'img'   => '', // You can use icon OR img. IMG needs to be a full URL.
    );
    $args['share_icons'][] = array(
        'url'   => 'https://www.facebook.com/pages/Redux-Framework/243141545850368',
        'title' => 'Like us on Facebook',
        'icon'  => 'el el-facebook'
    );
    $args['share_icons'][] = array(
        'url'   => 'http://twitter.com/reduxframework',
        'title' => 'Follow us on Twitter',
        'icon'  => 'el el-twitter'
    );
    $args['share_icons'][] = array(
        'url'   => 'http://www.linkedin.com/company/redux-framework',
        'title' => 'Find us on LinkedIn',
        'icon'  => 'el el-linkedin'
    );

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */
	 

    /*
     * ---> START HELP TABS
     */

    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => __( 'Theme Information 1', 'eventr' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'eventr' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => __( 'Theme Information 2', 'eventr' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'eventr' )
        )
    );
    Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content = __( '<p>This is the sidebar content, HTML is allowed.</p>', 'eventr' );
    Redux::setHelpSidebar( $opt_name, $content );


    /*
     * <--- END HELP TABS
     */


    /*
     *
     * ---> START SECTIONS
     *
     */

    Redux::setSection( $opt_name, array(
        'title'     => __( 'Basic Field', 'TEXT_DOMAIN' ),
        'id'        => 'basic',
        'desc'      => __( 'Basic field with no subsections.', 'TEXT_DOMAIN' ),
        'icon'      => 'el el-home',
        'fields'    => array(
            'id'       => 'opt-text',
            'type'     => 'text',
            'title'    => __( 'Example Text', 'TEXT_DOMAIN' ),
            'desc'     => __( 'Example description.', 'TEXT_DOMAIN' ),
            'subtitle' => __( 'Example subtitle.', 'TEXT_DOMAIN' ),
        )
    ) );

 
	//GENERAL SETTINGS
    Redux::setSection( $opt_name, array(
        'title' => __( 'General Settings', 'TEXT_DOMAIN' ),
        'id'    => 'basic',
        //'desc'  => __( 'Basic fields as subsections.', 'TEXT_DOMAIN' ),
        'icon'  => 'el el-home',
        'fields'     => array(
			
			
			 array(
                'id'        => 'preload',
				'type'      => 'switch',
				'title'     => __('Display Preload', 'TEXT_DOMAIN'),
				'subtitle'  => __('Display preload', 'TEXT_DOMAIN'),
				'default'  => true,
               
            ),
			
			array(
				'id'        => 'seo_desc',
				'type'      => 'textarea',                        
				'title'     => __('SEO Description', 'TEXT_DOMAIN'),
				'subtitle'  => __('Enter SEO Description. This will be added into the meta tag description in header', 'TEXT_DOMAIN'),
				'default'   => __('SEO description', 'TEXT_DOMAIN')
			),
			
			array(
				'id'        => 'seo_keywords',
				'type'      => 'textarea',                        
				'title'     => __('SEO Keywords', 'TEXT_DOMAIN'),
				'subtitle'  => __('Enter SEO Keywords. This will be added into the meta tag keywords in header', 'TEXT_DOMAIN'),
				'default'   => __('SEO Keywords', 'TEXT_DOMAIN')
			),
			
			array(
				'id'       => 'css_editor',
				'type'     => 'ace_editor',
				'title'    => __('Custom CSS Code', 'TEXT_DOMAIN'),
				'subtitle' => __('Paste your CSS code here.', 'TEXT_DOMAIN'),
				'mode'     => 'css',
				'theme'    => 'monokai',
				'desc'     => 'Possible modes can be found at http://ace.c9.io',
				//'default'  => "#header{\nmargin: 0 auto;\n}"
			),
			
			array(
				'id'       => 'js_editor',
				'type'     => 'ace_editor',
				'title'    => __('Custom JS Code', 'TEXT_DOMAIN'),
				'subtitle' => __('Paste your JS code here.', 'TEXT_DOMAIN'),
				//'mode'     => 'javascript',
				'theme'    => 'chrome',
				'desc'     => 'Possible modes can be found at http://ace.c9.io',
			),
        )
    ) );
	
	//LOGO AND FAVICON SETTINGS
    Redux::setSection( $opt_name, array(
        'title' => __( 'Logo and Favicon Settings', 'TEXT_DOMAIN' ),
        'id'    => 'logofavicon',
       // 'desc'  => __( 'Basic fields as subsections.', 'TEXT_DOMAIN' ),
        'icon'  => 'el el-picture',
        'fields'     => array(
		
			
			array(
                'id'        => 'logo_image',
				'type'      => 'media',
				'url'       => true,
				'title'     => __('Logo Image', 'TEXT_DOMAIN'),
				'subtitle'  => __('Upload a logo image. The best size is 120x53px', 'TEXT_DOMAIN'),
				'default'   => array('url' => get_template_directory_uri().'/img/logo.png')
               
            ),
			
			array(
                'id'        => 'favicon',
				'type'      => 'media',
				'url'       => true,
				'title'     => __('Favicon', 'TEXT_DOMAIN'),
				'subtitle'  => __('Upload a favicon.', 'TEXT_DOMAIN'),
				'default'   => array('url' => get_template_directory_uri().'/img/favicon.ico')
            ),
			
			array(
                'id'        => 'ipad_icon',
				'type'      => 'media',
				'url'       => true,
				'title'     => __('IPad Icon', 'TEXT_DOMAIN'),
				'subtitle'  => __('Upload IPad icon. 76x76px.', 'TEXT_DOMAIN'),
				'default'   => array('url' => get_template_directory_uri().'/img/ipad-icon.png')
            ),
			
			array(
                'id'        => 'iphone_retina_icon',
				'type'      => 'media',
				'url'       => true,
				'title'     => __('IPhone Retina Icon', 'TEXT_DOMAIN'),
				'subtitle'  => __('Upload IPhone retina icon. 120x120px', 'TEXT_DOMAIN'),
				'default'   => array('url' => get_template_directory_uri().'/img/iphone-retina-icon.png')
            ),
			
			array(
                'id'        => 'ipad_retina_icon',
				'type'      => 'media',
				'url'       => true,
				'title'     => __('IPad Retina Icon', 'TEXT_DOMAIN'),
				'subtitle'  => __('Upload IPad retina icon. 152x152px', 'TEXT_DOMAIN'),
				'default'   => array('url' => get_template_directory_uri().'/img/ipad-retina-icon.png')
            ),
			
			
			 
        )
    ) );
	
	
	
	//STYLING OPTIONS
	Redux::setSection( $opt_name, array(
        'title' => __( 'Styling Options', 'TEXT_DOMAIN' ),
        'id'    => 'styling',
        'icon'  => 'el el-brush',
        'fields'     => array(
		
            array(
				'id'        => 'theme_color',
				'type'      => 'color',
				'transparent' => false,                  
				'title'     => __('Select theme color', 'TEXT_DOMAIN'),
				'subtitle'  => __('Pick the main color for the theme', 'TEXT_DOMAIN'),
				'description' => __('', 'TEXT_DOMAIN'),
				'default'   => '#fac42b',
			),
			
			array(
				'id'        => 'menu_color',
				'type'      => 'color',
				'transparent' => false,                  
				'title'     => __('Select menu background color', 'TEXT_DOMAIN'),
				'subtitle'  => __('Pick the menu background color', 'TEXT_DOMAIN'),
				'default'   => '#262626',
			),
			
			array(
				'id'        => 'menu_item_color',
				'type'      => 'color',
				'transparent' => false,                  
				'title'     => __('Select menu item color', 'TEXT_DOMAIN'),
				'subtitle'  => __('Pick the menu item color', 'TEXT_DOMAIN'),
				'default'   => '#ffffff',
			),
			
			array(
				'id'        => 'menu_item_hover_color',
				'type'      => 'color',
				'transparent' => false,                  
				'title'     => __('Select menu item hover color', 'TEXT_DOMAIN'),
				'subtitle'  => __('Pick the menu item hover color', 'TEXT_DOMAIN'),
				'default'   => '#fac42b',
			),
			
			array(
				'id'          => 'typo_nav',
				'type'        => 'typography', 
				'title'       => __('Navigation font', 'TEXT_DOMAIN'),
				'google'      => true, 
				'font-backup' => true,
				'color'		  => false,
				'font-size'  => true,
				'text-align'  => false,
				'font-weight'  => true,
				'font-style'  => true,
				'line-height'  => true,
				'all_styles' => true,
				'output'      => array('.navbar-custom, .navbar-custom-blog, .subfooter'),
				'units'       =>'px',
				'subtitle'    => __('Choose font for navigation.', 'TEXT_DOMAIN'),
				'default'     => array(
					'font-family' => '', 
					'google'      => true,
				),
			),
			
			array(
				'id'          => 'typo_body',
				'type'        => 'typography', 
				'title'       => __('Body font', 'TEXT_DOMAIN'),
				'google'      => true, 
				'font-backup' => false,
				'color'		  => false,
				'font-size'  => true,
				'text-align'  => false,
				'font-weight'  => true,
				'font-style'  => true,
				'line-height'  => true,
				'all_styles' => true,
				'output'      => array('h1, p, p.company, #program .nav-tabs > li > a, .price-table h3, #footer dd, .widget li, .entry-content, .tagcloud'),
				'units'       =>'px',
				'subtitle'    => __('Choose font for body.', 'TEXT_DOMAIN'),
				'default'     => array(
					'font-family' => 'Open Sans', 
					'google'      => true,
				),
			),
			
			array(
				'id'          => 'typo_header',
				'type'        => 'typography', 
				'title'       => __('Header font', 'TEXT_DOMAIN'),
				'google'      => true, 
				'font-backup' => false,
				'color'		  => false,
				'font-size'  => true,
				'text-align'  => false,
				'font-weight'  => true,
				'font-style'  => true,
				'line-height'  => true,
				'output'      => array('h2,h3,h4,h5, #footer h4, a.button, #program .date, .speaker-thumb h4, .time_circles > div > h4, .hotel .caption h5, #funfacts p.number, .price-table .desc li, .price-table .price, #testimonial .name, #footer dt, .button, #speaker-detail h2, .time_circles > div > span, .widget-title, .entry-footer, .entry-footer a, .entry-meta, .entry-meta a, .posted-on, .byline, .cat-links, .tags-links'),
				'units'       =>'px',
				'subtitle'    => __('Choose font for headers.', 'TEXT_DOMAIN'),
			),
			
	
		
        )
    ) );
	

	
	//SPEAKER SETTINGS
	Redux::setSection( $opt_name, array(
        'title' => __( 'Speaker Settings', 'TEXT_DOMAIN' ),
        'id'    => 'speaker',
        'icon'  => 'el el-mic',
        'fields'     => array(
		
            array(
				'id'        => 'speakers_layout',
				'type'      => 'select',
				'title'     => __('How many items in a row?', 'TEXT_DOMAIN'),
				'options'   => array(
					'col-md-12 col-sm-12'=>'1 item',
					'col-md-6 col-sm-6'=>'2 items',
					'col-md-4 col-sm-4'=>'3 items',
					'col-md-3 col-sm-6'=>'4 items',
					'col-md-2 col-sm-6 col-5'=>'5 items',
					'col-md-2 col-sm-6'=>'6 items',
				),
				'default'   => 'col-md-3 col-sm-6'
			),
			
			 array(
				'id'        => 'speakers_item_count',
				'type'      => 'text',                        
				'title'     => __('Item Count display', 'TEXT_DOMAIN'),
				'default'   => '14',
				'validate' => 'numeric'
			),
			
			
        )
    ) );
	

	
	//SOCIAL MEDIA  SETTINGS
	Redux::setSection( $opt_name, array(
        'title' => __( 'Social Accounts', 'TEXT_DOMAIN' ),
        'id'    => 'social-accounts',
        'icon'  => 'el el-facebook',
        'fields'     => array(
			
			array(
                'id'       => 'facebook',
                'type'     => 'text',
                'title'    => __( 'Facebook', 'TEXT_DOMAIN' ),
                'subtitle' => __( 'Add facebook link', 'TEXT_DOMAIN' ),
				'placeholder' => __('http://','TEXT_DOMAIN'),
                'validate'  => 'url',
            ),
            array(
                'id'       => 'twitter',
                'type'     => 'text',
                'title'    => __( 'Twitter', 'TEXT_DOMAIN' ),
                'subtitle' => __( 'Add Twitter link', 'TEXT_DOMAIN' ),
				'placeholder' => __('http://','TEXT_DOMAIN'),
                'validate'  => 'url',
            ),
			array(
                'id'       => 'instagram',
                'type'     => 'text',
                'title'    => __( 'Instagram', 'TEXT_DOMAIN' ),
                'subtitle' => __( 'Add Instagram link', 'TEXT_DOMAIN' ),
				'placeholder' => __('http://','TEXT_DOMAIN'),
                'validate'  => 'url',
            ),
			array(
                'id'       => 'google-plus',
                'type'     => 'text',
                'title'    => __( 'Google Plus', 'TEXT_DOMAIN' ),
                'subtitle' => __( 'Add Google+ link', 'TEXT_DOMAIN' ),
				'placeholder' => __('http://','TEXT_DOMAIN'),
                'validate'  => 'url',
            ),
			array(
                'id'       => 'youtube',
                'type'     => 'text',
                'title'    => __( 'Youtube', 'TEXT_DOMAIN' ),
                'subtitle' => __( 'Youtube link', 'TEXT_DOMAIN' ),
				'placeholder' => __('http://','TEXT_DOMAIN'),
                'validate'  => 'url',
            ),
			array(
                'id'       => 'linkedin',
                'type'     => 'text',
                'title'    => __( 'Linkedin', 'TEXT_DOMAIN' ),
                'subtitle' => __( 'Linkedin link', 'TEXT_DOMAIN' ),
				'placeholder' => __('http://','TEXT_DOMAIN'),
                'validate'  => 'url',
            ),
			array(
                'id'       => 'flickr',
                'type'     => 'text',
                'title'    => __( 'Flickr', 'TEXT_DOMAIN' ),
                'subtitle' => __( 'Flickr link', 'TEXT_DOMAIN' ),
				'placeholder' => __('http://','TEXT_DOMAIN'),
                'validate'  => 'url',
            ),
			array(
                'id'       => 'github',
                'type'     => 'text',
                'title'    => __( 'Github', 'TEXT_DOMAIN' ),
                'subtitle' => __( 'Github link', 'TEXT_DOMAIN' ),
				'placeholder' => __('http://','TEXT_DOMAIN'),
                'validate'  => 'url',
            ),
						
			
        )
    ) );
	
	
	//GOOGLE MAP SETTINGS
    Redux::setSection( $opt_name, array(
        'title' => esc_html__( 'Map Settings', 'escape' ),
        'id'    => 'map',
        'icon'  => 'el el-map-marker',
        'fields'     => array(
			 
			 array(
                'id'       => 'map-latitude',
                'type'     => 'text',
                'title'    => esc_html__( 'Map Latitude', 'escape' ),
                'desc'     => esc_html__( 'Find your coordinates at <strong>mapcoordinates.net/en</strong>', 'escape' ),
                'default'  => '40.801485408197856',
            ),
			
			array(
                'id'       => 'map-longtitude',
                'type'     => 'text',
                'title'    => esc_html__( 'Map Longtitude', 'escape' ),
                'desc'     => esc_html__( 'Find your coordinates at <strong>mapcoordinates.net/en</strong>', 'escape' ),
                'default'  => '-73.96745953467104',
            ),
			
			 array(
				'id'        => 'map_zoom',
				'type'     => 'spinner', 
				'title'    => esc_html__('Zoom Level', 'escape'),
				'subtitle' => esc_html__('Map zoom level','escape'),
				'desc'     => esc_html__('Min:0, max: 40', 'escape'),
				'default'  => '14',
				'min'      => '0',
				'step'     => '1',
				'max'      => '40',
			 ),
		
			 array(
                'id'       => 'scrollwheel',
				'type'     => 'radio',
				'title'    => esc_html__('Scroll-whell', 'escape'), 
				//Must provide key => value pairs for radio options
				'options'  => array(
					'true' => 'On', 
					'false' => 'Off', 
				),
				'default' => 'false'
            ),
		
            array(
                'id'       => 'map_style',
                'type'     => 'textarea',
                'title'    => esc_html__( 'Map Style', 'escape' ),
                'subtitle' => esc_html__( 'Please visit <strong>snazzymaps.com</strong> for more styles', 'escape' ),
				'default' => '[{"featureType":"water","elementType":"geometry","stylers":[{"color":"#e9e9e9"},{"lightness":17}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#ffffff"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":16}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":21}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#dedede"},{"lightness":21}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"lightness":16}]},{"elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#333333"},{"lightness":40}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#f2f2f2"},{"lightness":19}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#fefefe"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#fefefe"},{"lightness":17},{"weight":1.2}]}]',
            ),
			
			array(
				'id'       => 'map_type',
				'type'     => 'select',
				'title'    => esc_html__('Select Map Type', 'escape'), 
				// Must provide key => value pairs for select options
				'options'  => array(
					'ROADMAP' => 'Roadmap',
					'HYBRID' => 'Hybrid',
					'SATELLITE' => 'Satellite',
					'TERRAIN' => 'Terrain'
				),
				'default'  => 'ROADMAP',
			),

			array(
                'id'       => 'map-api',
                'type'     => 'text',
                'title'    => __( 'Map API', 'TEXT_DOMAIN' ),
                'desc'     => __( 'Get an API Key from Google  <strong>https://developers.google.com/maps/documentation/javascript/get-api-key#get-an-api-key</strong>', 'TEXT_DOMAIN' ),
                'default'  => '',
            ),
			
			 array(
                'id'        => 'marker_image',
				'type'      => 'media',
				'url'       => true,
				'title'     => esc_html__('Marker Image', 'escape'),
				'subtitle'  => esc_html__('Upload a marker image. The best size is 112x112px', 'escape'),
				'default'   => array('url' => get_template_directory_uri().'/img/map-logo.png')
               
            ),
			
			
        )
    ) );
	
	

    /*
     * <--- END SECTIONS
     */
