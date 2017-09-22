<?php
/**
 * eventr functions and definitions
 *
 * @package eventr
 */
 

if ( ! function_exists( 'eventr_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function eventr_setup() {

	// THEME OPTIONS
	require get_template_directory() . '/admin/admin-init.php';
	global $tc_options;
	
	
	// METABOXES
	include dirname( __FILE__ ) . '/admin/metaboxes/metabox-functions.php';

	
	// Register Custom Navigation Walker
	require_once dirname( __FILE__ ) . '/admin/wp_bootstrap_navwalker.php';
	

	
	
	


	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on eventr, use a find and replace
	 * to change 'eventr' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'eventr', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );
	

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'Primary' => esc_html__( 'Top Menu', 'eventr' ),
		'Footer' => esc_html__( 'Footer Menu', 'eventr' ),
	) );
	
	

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'image',
		'audio',
		'video',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'eventr_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // eventr_setup



add_action( 'after_setup_theme', 'eventr_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */

 
function eventr_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'eventr_content_width', 640 );
}
add_action( 'after_setup_theme', 'eventr_content_width', 0 );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function eventr_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'eventr' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	
	  // First footer widget area, located in the footer. Empty by default.
    register_sidebar( array(
        'name' => __( 'Footer Widget Area 1', 'TEXT_DOMAIN' ),
        'id' => 'first-footer-widget-area',
        'description' => __( 'The first footer widget area', 'TEXT_DOMAIN' ),
        'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title uppercase">',
        'after_title' => '</h4>',
    ) );
 
    // Second Footer Widget Area, located in the footer. Empty by default.
    register_sidebar( array(
        'name' => __( 'Footer Widget Area 2', 'TEXT_DOMAIN' ),
        'id' => 'second-footer-widget-area',
        'description' => __( 'The second footer widget area', 'TEXT_DOMAIN' ),
        'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title uppercase">',
        'after_title' => '</h4>',
    ) );
 
    // Third Footer Widget Area, located in the footer. Empty by default.
    register_sidebar( array(
        'name' => __( 'Footer Widget Area 3', 'TEXT_DOMAIN' ),
        'id' => 'third-footer-widget-area',
        'description' => __( 'The third footer widget area', 'TEXT_DOMAIN' ),
        'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title uppercase">',
        'after_title' => '</h4>',
    ) );
	
}
add_action( 'widgets_init', 'eventr_widgets_init' );

add_filter('widget_text', 'do_shortcode');

if ( ! isset( $content_width ) ) $content_width = 900;





/**
 * Enqueue scripts and styles.
 */
function eventr_scripts() {
	
	global $tc_options;
	
	wp_enqueue_script("jquery");
	wp_enqueue_script("bootstrap-min", get_template_directory_uri()."/js/bootstrap.min.js",array(),false,true);
	wp_enqueue_script("magnific-popup", get_template_directory_uri()."/js/jquery.magnific-popup.min.js",array(),false,true);
	wp_enqueue_script("countdown", get_template_directory_uri()."/js/jquery.countdown.js",array(),false,true);
	wp_enqueue_script("counterup", get_template_directory_uri()."/js/jquery.counterup.min.js",array(),false,true);
	wp_enqueue_script("owl-carousel", get_template_directory_uri()."/js/owl.carousel.min.js",array(),false,true);
	wp_enqueue_script("mcustomscrollbar", get_template_directory_uri()."/js/jquery.mCustomScrollbar.concat.min.js",array(),false,true);
	wp_enqueue_script("sticky", get_template_directory_uri()."/js/jquery.sticky.js",array(),false,true);
	wp_enqueue_script("stellar", get_template_directory_uri()."/js/jquery.stellar.js",array(),false,true);
	wp_enqueue_script("retina", get_template_directory_uri()."/js/retina.min.js",array(),false,true);
	wp_enqueue_script("salvattore", get_template_directory_uri()."/js/salvattore.js",array(),false,true);
	wp_enqueue_script("waypoints", get_template_directory_uri()."/js/waypoints.min.js",array(),false,true);
	
	
	
	wp_enqueue_script("main", get_template_directory_uri()."/js/main.js",array(),false,true);
//    wp_enqueue_script("init_main", get_template_directory_uri()."/js/init_theme.js",array(),false,true);
	
	
	/* styles */
	wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/css/bootstrap.css');
	wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/css/font-awesome.css');
	wp_enqueue_style( 'pixeden-icon', get_template_directory_uri().'/css/pe-icon-7-stroke.css');
	wp_enqueue_style( 'helper', get_template_directory_uri().'/css/helper.css');
	wp_enqueue_style( 'animate', get_template_directory_uri().'/css/animate.min.css');
	wp_enqueue_style( 'font', get_template_directory_uri().'/css/font.css');
	wp_enqueue_style( 'countdown', get_template_directory_uri().'/css/jquery.countdown.css');
	wp_enqueue_style( 'mCustomScrollbar', get_template_directory_uri().'/css/jquery.mCustomScrollbar.css');
	wp_enqueue_style( 'magnific-popup', get_template_directory_uri().'/css/magnific-popup.css');
	wp_enqueue_style( 'owl-carousel', get_template_directory_uri().'/css/owl.carousel.css');
	wp_enqueue_style( 'owl-theme', get_template_directory_uri().'/css/owl.theme.css');
	wp_enqueue_style( 'owl-transition', get_template_directory_uri().'/css/owl.transitions.css');
	wp_enqueue_style( 'salvattore', get_template_directory_uri().'/css/salvattore.css');
	
	wp_enqueue_style( 'startup-style', get_stylesheet_uri() );
	wp_enqueue_style( 'style-css', get_template_directory_uri().'/style.php');



	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'eventr_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


/* RETINA IMAGE SUPPORT */

add_filter( 'wp_generate_attachment_metadata', 'retina_support_attachment_meta', 10, 2 );
/**
 * Retina images
 *
 * This function is attached to the 'wp_generate_attachment_metadata' filter hook.
 */
function retina_support_attachment_meta( $metadata, $attachment_id ) {
    foreach ( $metadata as $key => $value ) {
        if ( is_array( $value ) ) {
            foreach ( $value as $image => $attr ) {
                if ( is_array( $attr ) )
                    retina_support_create_images( get_attached_file( $attachment_id ), $attr['width'], $attr['height'], true );
            }
        }
    }
 
    return $metadata;
}

/**
 * Create retina-ready images
 *
 * Referenced via retina_support_attachment_meta().
 */
function retina_support_create_images( $file, $width, $height, $crop = false ) {
    if ( $width || $height ) {
        $resized_file = wp_get_image_editor( $file );
        if ( ! is_wp_error( $resized_file ) ) {
            $filename = $resized_file->generate_filename( $width . 'x' . $height . '@2x' );
 
            $resized_file->resize( $width * 2, $height * 2, $crop );
            $resized_file->save( $filename );
 
            $info = $resized_file->get_size();
 
            return array(
                'file' => wp_basename( $filename ),
                'width' => $info['width'],
                'height' => $info['height'],
            );
        }
    }
    return false;
}

add_filter( 'delete_attachment', 'delete_retina_support_images' );
/**
 * Delete retina-ready images
 *
 * This function is attached to the 'delete_attachment' filter hook.
 */
function delete_retina_support_images( $attachment_id ) {
    $meta = wp_get_attachment_metadata( $attachment_id );
    $upload_dir = wp_upload_dir();
    $path = pathinfo( $meta['file'] );
    foreach ( $meta as $key => $value ) {
        if ( 'sizes' === $key ) {
            foreach ( $value as $sizes => $size ) {
                $original_filename = $upload_dir['basedir'] . '/' . $path['dirname'] . '/' . $size['file'];
                $retina_filename = substr_replace( $original_filename, '@2x.', strrpos( $original_filename, '.' ), strlen( '.' ) );
                if ( file_exists( $retina_filename ) )
                    unlink( $retina_filename );
            }
        }
    }
}


function tc_do_shortcode($content) {
    global $shortcode_tags;
    if (empty($shortcode_tags) || !is_array($shortcode_tags))
        return $content;
    $pattern = get_shortcode_regex();
    return preg_replace_callback( "/$pattern/s", 'do_shortcode_tag', $content );
}


/* Visual Composer */
if(function_exists('vc_add_param')){

  vc_add_param('vc_row',array(
          "type" => "textfield",
          "heading" => __('Section ID', 'TEXT_DOMAIN'),
          "param_name" => "el_id",
          "value" => "",
          "description" => __("Set ID section", 'TEXT_DOMAIN'),   
    ));  
  vc_add_param('vc_row',array(
        "type" => "dropdown",
        "heading" => __('Fullwidth', 'TEXT_DOMAIN'),
        "param_name" => "fullwidth",
        "value" => array(   
                __('No', 'TEXT_DOMAIN') => 'no',  
                __('Yes', 'TEXT_DOMAIN') => 'yes',                                                                                
                ),
        "description" => __("Select Fullwidth or not", 'TEXT_DOMAIN'),      
      ) 
    ); 

}
