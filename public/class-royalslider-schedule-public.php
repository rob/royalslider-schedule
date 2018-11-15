<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://github.com/rob/royalslider-schedule
 * @since      1.0.0
 *
 * @package    Royalslider_Schedule
 * @subpackage Royalslider_Schedule/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Royalslider_Schedule
 * @subpackage Royalslider_Schedule/public
 * @author     Rob Gabaree <rob@rawb.net>
 */
class Royalslider_Schedule_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/royalslider-schedule-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/royalslider-schedule-public.js', array( 'jquery' ), $this->version, false );

	}

	/**
     * Filter the slides to follow their schedules (if set)
	 * 
	 * @param	array	$slides
	 * @param	array	$options
	 * @param	string	$type
	 * @return	array	$filtered_slides
     */
    public function filter_scheduled_slides( $slides, $options, $type ) {

        $timezone = get_option( 'timezone_string' ) ?? 'America/New_York';
        $current_datetime = new DateTime( 'now', new DateTimeZone( $timezone ) );

        $filtered_slides = array_filter( $slides, function( $slide ) use ( $timezone, $current_datetime ) {

			$start_datetime = isset( $slide['royalslider_schedule_start_date'] ) ? $slide['royalslider_schedule_start_date'] : null;
            $end_datetime   = isset( $slide['royalslider_schedule_end_date'] )   ? $slide['royalslider_schedule_end_date']   : null;

            // Always show the slide if no schedule is set
            if ( empty( $start_datetime ) && empty( $end_datetime ) ) {
                return true;
            }

            $should_display = true;

            // If a start datetime if set, check it
            if ( $start_datetime ) {

                $start_datetime = new DateTime( $start_datetime, new DateTimeZone( $timezone ) );

                if ( $start_datetime >= $current_datetime ) {
                    $should_display = false;
				}
				
            }

            // If an end datetime if set, check it
            if ( $end_datetime ) {

                $end_datetime = new DateTime( $end_datetime, new DateTimeZone( $timezone ) );

                if ( $end_datetime <= $current_datetime ) {
                    $should_display = false;
				}
				
            }

            return $should_display;

        } );

        return $filtered_slides;
		
	}

}
