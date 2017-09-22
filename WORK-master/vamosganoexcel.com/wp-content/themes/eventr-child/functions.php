<?php
/**
 * Setup Eventr Child Theme's textdomain.
 *
 * Declare textdomain for this child theme.
 * Translations can be filed in the /languages/ directory.
 */
function eventr_child_theme_setup() {
	load_child_theme_textdomain( 'eventr-child', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'eventr_child_theme_setup' );




// Add Code is here.