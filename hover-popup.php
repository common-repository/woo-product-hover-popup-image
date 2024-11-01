<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              dangngocbinh.com
 * @since             1.0.0
 * @package           Hover_Popup
 *
 * @wordpress-plugin
 * Plugin Name:       Woocommerce Product Hover Popup Image
 * Plugin URI:        http://thikshare.com
 * Description:       Show big image of product when hover product item
 * Version:           1.0.0
 * Author:            Dang Ngoc Binh
 * Author URI:        http://dangngocbinh.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       hover-popup
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-hover-popup-activator.php
 */
function activate_hover_popup() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-hover-popup-activator.php';
	Hover_Popup_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-hover-popup-deactivator.php
 */
function deactivate_hover_popup() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-hover-popup-deactivator.php';
	Hover_Popup_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_hover_popup' );
register_deactivation_hook( __FILE__, 'deactivate_hover_popup' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-hover-popup.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_hover_popup() {

	$plugin = new Hover_Popup();
	$plugin->run();

}
run_hover_popup();
