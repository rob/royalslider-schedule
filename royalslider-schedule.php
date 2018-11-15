<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://github.com/rob/royalslider-schedule
 * @since             1.0.0
 * @package           Royalslider_Schedule
 *
 * @wordpress-plugin
 * Plugin Name:       RoyalSlider Schedule Slides Add-On
 * Plugin URI:        https://github.com/rob/royalslider-schedule
 * Description:       Schedule slides with RoyalSlider.
 * Version:           1.0.0
 * Author:            Rob Gabaree
 * Author URI:        https://github.com/rob/royalslider-schedule
 * License:           GPLv3
 * License URI:       https://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain:       royalslider-schedule
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'ROYALSLIDER_SCHEDULE_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-royalslider-schedule-activator.php
 */
function activate_royalslider_schedule() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-royalslider-schedule-activator.php';
	Royalslider_Schedule_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-royalslider-schedule-deactivator.php
 */
function deactivate_royalslider_schedule() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-royalslider-schedule-deactivator.php';
	Royalslider_Schedule_Deactivator::deactivate();
}

//register_activation_hook( __FILE__, 'activate_royalslider_schedule' );
//register_deactivation_hook( __FILE__, 'deactivate_royalslider_schedule' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-royalslider-schedule.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_royalslider_schedule() {

	$plugin = new Royalslider_Schedule();
	$plugin->run();

}
run_royalslider_schedule();
