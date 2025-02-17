<?php
/**
* Custom Functions.
*
* @package Restaurant Culinary
*/

if( !function_exists( 'restaurant_culinary_sanitize_sidebar_option' ) ) :

    // Sidebar Option Sanitize.
    function restaurant_culinary_sanitize_sidebar_option( $restaurant_culinary_input ){

        $restaurant_culinary_metabox_options = array( 'global-sidebar','left-sidebar','right-sidebar','no-sidebar' );
        if( in_array( $restaurant_culinary_input,$restaurant_culinary_metabox_options ) ){

            return $restaurant_culinary_input;

        }

        return;

    }

endif;

if ( ! function_exists( 'restaurant_culinary_sanitize_checkbox' ) ) :

	/**
	 * Sanitize checkbox.
	 */
	function restaurant_culinary_sanitize_checkbox( $restaurant_culinary_checked ) {

		return ( ( isset( $restaurant_culinary_checked ) && true === $restaurant_culinary_checked ) ? true : false );

	}

endif;


if ( ! function_exists( 'restaurant_culinary_sanitize_select' ) ) :

    /**
     * Sanitize select.
     */
    function restaurant_culinary_sanitize_select( $restaurant_culinary_input, $restaurant_culinary_setting ) {
        $restaurant_culinary_input = sanitize_text_field( $restaurant_culinary_input );
        $restaurant_culinary_choices = $restaurant_culinary_setting->manager->get_control( $restaurant_culinary_setting->id )->choices;
        return ( array_key_exists( $restaurant_culinary_input, $restaurant_culinary_choices ) ? $restaurant_culinary_input : $restaurant_culinary_setting->default );
    }

endif;

/*Radio Button sanitization*/
function restaurant_culinary_sanitize_choices( $restaurant_culinary_input, $restaurant_culinary_setting ) {
    global $wp_customize;
    $restaurant_culinary_control = $wp_customize->get_control( $restaurant_culinary_setting->id );
    if ( array_key_exists( $restaurant_culinary_input, $restaurant_culinary_control->choices ) ) {
        return $restaurant_culinary_input;
    } else {
        return $restaurant_culinary_setting->default;
    }
}