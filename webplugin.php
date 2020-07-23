<?php
/**
*@package WooCustom
*/
 /*
 Plugin Name: Test Plugin
 Description: All of Webwizards customized short codes
 Version: 1.2
 Author: GG 
 */
 if ( ! defined( 'ABSPATH' ) ) {
	die();
}

if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
	require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}

/**
 * The code that runs during plugin activation
 */
function test_activate_plugin() {
	Inc\Base\Activate::activate();
}

register_activation_hook( __FILE__, 'test_activate_plugin' );

/**
 * The code that runs during plugin deactivation
 */
function test_deactivate_plugin() {
	inc\Base\Deactivate::deactivate();
}
register_deactivation_hook( __FILE__, 'test_deactivate_plugin' );

/**
 * Initialize all the core classes of the plugin
 */
if ( class_exists( 'Inc\\Init' ) ) {
	Inc\Init::register_services();
}


