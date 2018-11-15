<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://github.com/rob/royalslider-schedule
 * @since      1.0.0
 *
 * @package    Royalslider_Schedule
 * @subpackage Royalslider_Schedule/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Royalslider_Schedule
 * @subpackage Royalslider_Schedule/includes
 * @author     Rob Gabaree <rob@rawb.net>
 */
class Royalslider_Schedule_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'royalslider-schedule',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
