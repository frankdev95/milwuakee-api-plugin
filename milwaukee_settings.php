<?php 

/**
 * Plugin Name: Milwaukee Settings
 * 
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The root directly for the plugin.
 * Provides the plugin files access to the root directory so it can be used when requiring files from scripts
 */

define('__ROOT__', dirname(__FILE__));

register_activation_hook(__FILE__, 'milwaukee_settings_register_activation');
function milwaukee_settings_register_activation() {
    
}

require_once(__DIR__ . '/milwaukee_settings_woocommerce.php');
