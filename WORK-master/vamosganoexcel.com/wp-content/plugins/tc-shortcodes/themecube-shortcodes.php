<?php

/**
 * Plugin Name: ThemeCube Shortcodes
 * Plugin URI: http://themecube.net
 * Description: Eventr Wordpress Theme shortcodes
 * Version: 1.1.4
 * Author: themecube
 * Author URI: http://themeforest.net/user/themecube
 * Text Domain: TEXT_DOMAIN
 * Domain Path: /languages/
 * License: GPL2
 */

$current_dir = plugin_dir_path(dirname(__FILE__));
$plugin_name = current(explode("/", plugin_basename( __FILE__ )));



/** Enqueue custom posttypes. */
require $current_dir . $plugin_name . "/admin/post_type.php";


/** Enqueue custom shortcodes. */
require $current_dir . $plugin_name . "/admin/tc_shortcode.php";

