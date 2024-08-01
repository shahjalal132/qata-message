<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://github.com/shahjalal132
 * @since             1.0.0
 * @package           Qata_Message
 *
 * @wordpress-plugin
 * Plugin Name:       Qata Message
 * Plugin URI:        https://github.com/shahjalal132/qata-message
 * Description:       Send message to customer service
 * Version:           1.0.0
 * Author:            Shah jalal
 * Author URI:        https://github.com/shahjalal132/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       qata-message
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( !defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'QATA_MESSAGE_VERSION', '1.0.0' );

// Define plugin path
if ( !defined( 'QATA_MESSAGE_PLUGIN_PATH' ) ) {
	define( 'QATA_MESSAGE_PLUGIN_PATH', untrailingslashit( plugin_dir_path( __FILE__ ) ) );
}

// Define plugin url
if ( !defined( 'QATA_MESSAGE_PLUGIN_URI' ) ) {
	define( 'QATA_MESSAGE_PLUGIN_URI', untrailingslashit( plugin_dir_url( __FILE__ ) ) );
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-qata-message-activator.php
 */
function activate_qata_message() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-qata-message-activator.php';
	Qata_Message_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-qata-message-deactivator.php
 */
function deactivate_qata_message() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-qata-message-deactivator.php';
	Qata_Message_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_qata_message' );
register_deactivation_hook( __FILE__, 'deactivate_qata_message' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-qata-message.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_qata_message() {

	$plugin = new Qata_Message();
	$plugin->run();

}
run_qata_message();
