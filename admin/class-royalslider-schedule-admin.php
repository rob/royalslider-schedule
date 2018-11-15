<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://github.com/rob/royalslider-schedule
 * @since      1.0.0
 *
 * @package    Royalslider_Schedule
 * @subpackage Royalslider_Schedule/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Royalslider_Schedule
 * @subpackage Royalslider_Schedule/admin
 * @author     Rob Gabaree <rob@rawb.net>
 */
class Royalslider_Schedule_Admin {

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
     * @param      string    $plugin_name       The name of this plugin.
     * @param      string    $version    The version of this plugin.
     */
    public function __construct($plugin_name, $version) {
        $this->plugin_name = $plugin_name;
        $this->version = $version;
    }

    /**
     * Register the stylesheets for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_styles() {
        
        // DateRangePicker
        wp_enqueue_style( 'royalslider-schedule-daterangepicker', 'https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css', array(), null, 'all' );

    }

    /**
     * Register the JavaScript for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts() {

        // DateRangePicker
        wp_enqueue_script( 'royalslider-schedule-moment', 'https://cdn.jsdelivr.net/npm/moment/moment.min.js', array( 'jquery' ), null, true );
        wp_enqueue_script( 'royalslider-schedule-daterangepicker', 'https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js', array( 'royalslider-schedule-moment' ), null, true );

        // Administration
        wp_enqueue_script( $this->plugin_name, plugin_dir_url(__FILE__) . 'js/royalslider-schedule-admin.js', array( 'royalslider-schedule-daterangepicker' ), $this->version, true );

    }

    /**
     * Add custom fields to RoyalSlider popup modal
     */
    public function add_royalslider_schedule_fields( $slide_data ) {

        if ( class_exists( 'NewRoyalSliderOptions' ) ) {

            echo NewRoyalSliderOptions::get_field_html( array(
                'name'     => 'royalslider_schedule_start_date',
                'label'    => __( 'Start date <i class="help-ico"></i>', 'royalslider-schedule' ),
                'desc'     => __( 'Start date of this slide.', 'royalslider-schedule' ),
                'type'     => 'text',
                'default'  => isset( $slide_data['royalslider_schedule_start_date'] ) ? $slide_data['royalslider_schedule_start_date'] : ''
            ), 'slides' );
        
            echo NewRoyalSliderOptions::get_field_html( array(
                'name'     => 'royalslider_schedule_end_date',
                'label'    => __( 'End date <i class="help-ico"></i>', 'royalslider-schedule' ),
                'desc'     => __( 'End date of this slide.', 'royalslider-schedule' ),
                'type'     => 'text',
                'default'  => isset( $slide_data['royalslider_schedule_end_date'] ) ? $slide_data['royalslider_schedule_end_date'] : ''
            ), 'slides' );
            
        }

    }
	
}
