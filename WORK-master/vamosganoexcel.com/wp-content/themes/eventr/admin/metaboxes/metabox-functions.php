<?php
/**
 * Include and setup custom metaboxes and fields.
 *
 * @category YourThemeOrPlugin
 * @package  Metaboxes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/webdevstudios/Custom-Metaboxes-and-Fields-for-WordPress
 */

add_filter( 'cmb_meta_boxes', 'cmb_sample_metaboxes' );
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function cmb_sample_metaboxes( array $meta_boxes ) {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_cmb_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	 
	 
	 //SPEAKER METABOXES
	 $meta_boxes[] = array(
		'id'         => 'speaker_fields',
		'title'      => __('Speaker Field', 'TEXT_DOMAIN'),
		'pages'      => array( 'speaker'), // Post type
		'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
		//'show_on'    => array( 'key' => 'id', 'value' => array( 2, ), ), // Specific post IDs to display this metabox
		'fields' => array(
			array(
                'name' => __('Job', 'TEXT_DOMAIN'),
				'desc' => __('Speaker job', 'TEXT_DOMAIN'),
				'id'   => $prefix . 'speaker_job',
				'type' => 'text',
            ),
		
			array(
                'name' => __('Company', 'TEXT_DOMAIN'),
				'desc' => __('Speaker company', 'TEXT_DOMAIN'),
				'id'   => $prefix . 'speaker_company',
				'type' => 'text',
            ),
			
			array(
                'name' => __('Facebook Address', 'TEXT_DOMAIN'),
				'desc' => __('Facebook Address', 'TEXT_DOMAIN'),
				'id'   => $prefix . 'speaker_fb_address',
				'type' => 'text',
				'default'=> ''
            ),
			
			array(
                'name' => __('Twitter Address', 'TEXT_DOMAIN'),
				'desc' => __('Twitter Address', 'TEXT_DOMAIN'),
				'id'   => $prefix . 'speaker_tw_address',
				'type' => 'text',
				'default'=> ''
            ),
            
            array(
                'name' => __('Google Plus Address', 'TEXT_DOMAIN'),
				'desc' => __('Google Plus Address', 'TEXT_DOMAIN'),
				'id'   => $prefix . 'speaker_gplus_address',
				'type' => 'text',
				'default'=> ''
            ),
			
			array(
                'name' => __('Linkedin Address', 'TEXT_DOMAIN'),
				'desc' => __('Linkedin Address', 'TEXT_DOMAIN'),
				'id'   => $prefix . 'speaker_in_address',
				'type' => 'text',
				'default'=> ''
            ),
			
			array(
                'name' => __('Instagram Address', 'TEXT_DOMAIN'),
				'desc' => __('Instagram Address', 'TEXT_DOMAIN'),
				'id'   => $prefix . 'speaker_instagram_address',
				'type' => 'text',
				'default'=> ''
            ),
            
			array(
                'name' => __('Website', 'TEXT_DOMAIN'),
				'desc' => __('Website', 'TEXT_DOMAIN'),
				'id'   => $prefix . 'speaker_website',
				'type' => 'text_url',
				'protocols' => array( 'http', 'https' ), // Array of allowed protocols
				'default'=> ''
            ),

		)
	);
	
	//SCHEDULE METABOXES
	$meta_boxes[] = array(
		'id'         => 'program_fields',
		'title'      => __('Program Fields', 'TEXT_DOMAIN'),
		'pages'      => array( 'schedule'), // Post type
		'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
		//'show_on'    => array( 'key' => 'id', 'value' => array( 2, ), ), // Specific post IDs to display this metabox
		'fields' => array(		
			array(
                'name' => __('Time', 'TEXT_DOMAIN'),
				'desc' => __('Program start', 'TEXT_DOMAIN'),
				'id'   => $prefix . 'program_time',
				'type' => 'text_small',
				'default'	=> '09:30'
            ),
			
			array(
                'name' => __('Duration', 'TEXT_DOMAIN'),
				'desc' => __('Program duration', 'TEXT_DOMAIN'),
				'id'   => $prefix . 'program_duration',
				'type' => 'text_small',
				'default'	=> '45mins'
            ),
			
			array(
                'name' => __('Location', 'TEXT_DOMAIN'),
				'desc' => __('Program location', 'TEXT_DOMAIN'),
				'id'   => $prefix . 'program_location',
				'type' => 'text_medium',
				'default'	=> ''
            ),
			
			array(
                'name' => __('Level', 'TEXT_DOMAIN'),
				'desc' => __('Select level (beginner, intermediate, expert etc.)', 'TEXT_DOMAIN'),
				'id'   => $prefix . 'program_level',
				'type' => 'text_medium',
				'default'	=> ''
            ),
		)
	);
	
	$meta_boxes[] = array(
		'id'         => 'program_speaker_fields',
		'title'      => __('Speaker Fields', 'TEXT_DOMAIN'),
		'pages'      => array( 'schedule'), // Post type
		'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
		//'show_on'    => array( 'key' => 'id', 'value' => array( 2, ), ), // Specific post IDs to display this metabox
		'fields' => array(		
			array(
                'name' => __('Speaker', 'TEXT_DOMAIN'),
				'desc' => __('Speaker name', 'TEXT_DOMAIN'),
				'id'   => $prefix . 'speaker_name',
				'type' => 'text_medium',
            ),
			
			array(
                'name' => __('Speaker Short Bio', 'TEXT_DOMAIN'),
				'desc' => __('Speaker short biography ', 'TEXT_DOMAIN'),
				'id'   => $prefix . 'speaker_short_bio',
				'type' => 'textarea_small',
            ),
            
			array(
                'name' => __('Speaker URL', 'TEXT_DOMAIN'),
				'desc' => __('Speaker website', 'TEXT_DOMAIN'),
				'id'   => $prefix . 'speaker_url',
				'type' => 'text_url',
            ),
			
		)
	);
	
	
	
	
	 
	$meta_boxes[] = array(
		'id'         => 'embed_media',
		'title'      => __( 'Post Options', 'cmb' ),
		'pages'      => array('post'), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		// 'cmb_styles' => true, // Enqueue the CMB stylesheet on the frontend
		'fields'     => array(
			array(
				'name' => __( 'oEmbed', 'cmb' ),
				'desc' => __( 'Enter a youtube, twitter, or instagram URL. Supports services listed at <a href="http://codex.wordpress.org/Embeds">http://codex.wordpress.org/Embeds</a>.', 'cmb' ),
				'id'   => $prefix . 'embed_media',
				'type' => 'oembed',
			),
		),
	);

	

	
	

	

	// Add other metaboxes as needed

	return $meta_boxes;
}

add_action( 'init', 'cmb_initialize_cmb_meta_boxes', 9999 );
/**
 * Initialize the metabox class.
 */
function cmb_initialize_cmb_meta_boxes() {

	if ( ! class_exists( 'cmb_Meta_Box' ) )
		require_once 'init.php';

}
