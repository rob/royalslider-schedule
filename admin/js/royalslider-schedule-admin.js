/**
 * royalslider-schedule-admin.js
 */

(function( $ ) {

	'use strict';

	if ( 'undefined' != typeof window.daterangepicker ) {

		$( "input[class*='slides-royalslider_schedule_']" ).daterangepicker( {
			timePicker:       true,
			showDropdowns:    true,
			singleDatePicker: true,
			autoUpdateInput:  false,
			drops:            'up',
			locale: {
				cancelLabel:  'Clear',
				format:       'YYYY-MM-DD HH:mm:ss'
			}
		} );

		// Clear datetime when "Clear" is pressed
		$( "input[class*='slides-royalslider_schedule_']" ).on( 'cancel.daterangepicker', function( ev, picker ) {
			$( this ).val( '' );
		} );

		// Update input when datetime is selected
		$( "input[class*='slides-royalslider_schedule_']" ).on( 'apply.daterangepicker', function( ev, picker ) {
			$( this ).val( picker.startDate.format( 'YYYY-MM-DD HH:mm:ss' ) );
		} );

	}

} )( jQuery );
