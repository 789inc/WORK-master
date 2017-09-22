<?php

if ( ! function_exists('speaker') ) {

// Speaker
function speaker() {

	$labels = array(
		'name'                => _x( 'Speakers', 'Post Type General Name', 'TEXT_DOMAIN' ),
		'singular_name'       => _x( 'Speaker', 'Post Type Singular Name', 'TEXT_DOMAIN' ),
		'menu_name'           => __( 'Speakers', 'TEXT_DOMAIN' ),
		'parent_item_colon'   => __( 'Parent Speaker:', 'TEXT_DOMAIN' ),
		'all_items'           => __( 'All Speakers', 'TEXT_DOMAIN' ),
		'view_item'           => __( 'View Speaker', 'TEXT_DOMAIN' ),
		'add_new_item'        => __( 'Add New Speaker', 'TEXT_DOMAIN' ),
		'add_new'             => __( 'Add New Speaker', 'TEXT_DOMAIN' ),
		'edit_item'           => __( 'Edit Speaker', 'TEXT_DOMAIN' ),
		'update_item'         => __( 'Update Speaker', 'TEXT_DOMAIN' ),
		'search_items'        => __( 'Search Speaker', 'TEXT_DOMAIN' ),
		'not_found'           => __( 'Not speakers found', 'TEXT_DOMAIN' ),
		'not_found_in_trash'  => __( 'Not speakers found in Trash', 'TEXT_DOMAIN' ),
	);
	$args = array(
		'label'               => __( 'speaker', 'TEXT_DOMAIN' ),
		'description'         => __( 'Post Type Description', 'TEXT_DOMAIN' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail', ),
		'taxonomies'          => array( 'post_tag' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => false,
		'menu_position'       => 20,
		'menu_icon'           => 'dashicons-microphone',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);
	register_post_type( 'speaker', $args );

}

add_action( 'init', 'speaker', 0 );

}


if ( ! function_exists('schedule') ) {

// Program
function schedule() {

	$labels = array(
		'name'                => _x( 'Schedule', 'Post Type General Name', 'TEXT_DOMAIN' ),
		'singular_name'       => _x( 'Program', 'Post Type Singular Name', 'TEXT_DOMAIN' ),
		'menu_name'           => __( 'Schedule', 'TEXT_DOMAIN' ),
		'parent_item_colon'   => __( 'Parent program:', 'TEXT_DOMAIN' ),
		'all_items'           => __( 'All Programs', 'TEXT_DOMAIN' ),
		'view_item'           => __( 'View Program', 'TEXT_DOMAIN' ),
		'add_new_item'        => __( 'Add New Program', 'TEXT_DOMAIN' ),
		'add_new'             => __( 'Add New Program', 'TEXT_DOMAIN' ),
		'edit_item'           => __( 'Edit Program', 'TEXT_DOMAIN' ),
		'update_item'         => __( 'Update Program', 'TEXT_DOMAIN' ),
		'search_items'        => __( 'Search Program', 'TEXT_DOMAIN' ),
		'not_found'           => __( 'Not Program found', 'TEXT_DOMAIN' ),
		'not_found_in_trash'  => __( 'Not Program found in Trash', 'TEXT_DOMAIN' ),
	);
	$args = array(
		'label'               => __( 'program', 'TEXT_DOMAIN' ),
		'description'         => __( 'Post Type Description', 'TEXT_DOMAIN' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail', ),
		'taxonomies'          => array( 'post_tag' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => false,
		'menu_position'       => 21,
		'menu_icon'           => 'dashicons-schedule',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);
	register_post_type( 'schedule', $args );

}

add_action( 'init', 'schedule', 0 );

}

add_action( 'init', 'create_schedule_taxonomies', 0 );
// create skin taxonomy
function create_schedule_taxonomies() {
    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
        'name'              => __( 'Date', 'taxonomy general name' , 'TEXT_DOMAIN'),
        'singular_name'     => __( 'Date', 'taxonomy singular name' , 'TEXT_DOMAIN'),
        'search_items'      => __( 'Search Dates', 'TEXT_DOMAIN'),
        'all_items'         => __( 'All Dates', 'TEXT_DOMAIN' ),
        'parent_item'       => __( 'Parent Date', 'TEXT_DOMAIN' ),
        'parent_item_colon' => __( 'Parent Date:' , 'TEXT_DOMAIN'),
        'edit_item'         => __( 'Edit Date' , 'TEXT_DOMAIN'),
        'update_item'       => __( 'Update Date' , 'TEXT_DOMAIN'),
        'add_new_item'      => __( 'Add New Date' , 'TEXT_DOMAIN'),
        'new_item_name'     => __( 'New Date Name' , 'TEXT_DOMAIN'),
        'menu_name'         => __( 'Date' , 'TEXT_DOMAIN'),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'schedule' ),
    );

    register_taxonomy( 'date', array('schedule'), $args );
}


// Testimonial 
add_action( 'init', 'testimonials_init' );
function testimonials_init() { 
    
    $labels = array(
        'name'               => __( 'Testimonials', 'post type general name', 'TEXT_DOMAIN' ),
        'singular_name'      => __( 'Testimonial', 'post type singular name', 'TEXT_DOMAIN' ),
        'menu_name'          => __( 'Testimonials', 'admin menu', 'TEXT_DOMAIN' ),
        'name_admin_bar'     => __( 'Testimonial', 'add new on admin bar', 'TEXT_DOMAIN' ),
        'add_new'            => __( 'Add New Testimonial', 'Testimonial', 'TEXT_DOMAIN' ),
        'add_new_item'       => __( 'Add New Testimonial', 'TEXT_DOMAIN' ),
        'new_item'           => __( 'New Testimonial', 'TEXT_DOMAIN' ),
        'edit_item'          => __( 'Edit Testimonial', 'TEXT_DOMAIN' ),
        'view_item'          => __( 'View Testimonial', 'TEXT_DOMAIN' ),
        'all_items'          => __( 'All Testimonials', 'TEXT_DOMAIN' ),
        'search_items'       => __( 'Search Testimonials', 'TEXT_DOMAIN' ),
        'parent_item_colon'  => __( 'Parent Testimonials:', 'TEXT_DOMAIN' ),
        'not_found'          => __( 'No Testimonials found.', 'TEXT_DOMAIN' ),
        'not_found_in_trash' => __( 'No Testimonials found in Trash.', 'TEXT_DOMAIN' ),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'menu_icon'          => 'dashicons-format-quote',
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'testimonial' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 22,
        'supports'           => array( 'title', 'editor','thumbnail',)
    );

    register_post_type( 'testimonial', $args );
}

// FAQ 
add_action( 'init', 'faq_init' );
function faq_init() { 
    
    $labels = array(
        'name'               => __( 'FAQs', 'post type general name', 'TEXT_DOMAIN' ),
        'singular_name'      => __( 'FAQ', 'post type singular name', 'TEXT_DOMAIN' ),
        'menu_name'          => __( 'FAQs', 'admin menu', 'TEXT_DOMAIN' ),
        'name_admin_bar'     => __( 'FAQ', 'add new on admin bar', 'TEXT_DOMAIN' ),
        'add_new'            => __( 'Add New Question', 'Testimonial', 'TEXT_DOMAIN' ),
        'add_new_item'       => __( 'Add New Question', 'TEXT_DOMAIN' ),
        'new_item'           => __( 'New Question', 'TEXT_DOMAIN' ),
        'edit_item'          => __( 'Edit Question', 'TEXT_DOMAIN' ),
        'view_item'          => __( 'View Question', 'TEXT_DOMAIN' ),
        'all_items'          => __( 'All Questions', 'TEXT_DOMAIN' ),
        'search_items'       => __( 'Search Questions', 'TEXT_DOMAIN' ),
        'parent_item_colon'  => __( 'Parent Questions:', 'TEXT_DOMAIN' ),
        'not_found'          => __( 'No Question found.', 'TEXT_DOMAIN' ),
        'not_found_in_trash' => __( 'No Questions found in Trash.', 'TEXT_DOMAIN' ),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'menu_icon'          => 'dashicons-info',
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'faq' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 22,
        'supports'           => array( 'title', 'editor', 'thumbnail',)
    );

    register_post_type( 'faq', $args );
}


?>