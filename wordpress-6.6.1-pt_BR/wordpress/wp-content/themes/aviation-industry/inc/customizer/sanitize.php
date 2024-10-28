<?php
/**
* Custom Functions.
*
* @package Aviation Industry
*/

if( !function_exists( 'aviation_industry_sanitize_sidebar_option' ) ) :

    // Sidebar Option Sanitize.
    function aviation_industry_sanitize_sidebar_option( $aviation_industry_input ){

        $aviation_industry_metabox_options = array( 'global-sidebar','left-sidebar','right-sidebar','no-sidebar' );
        if( in_array( $aviation_industry_input,$aviation_industry_metabox_options ) ){

            return $aviation_industry_input;

        }

        return;

    }

endif;

if ( ! function_exists( 'aviation_industry_sanitize_checkbox' ) ) :

	/**
	 * Sanitize checkbox.
	 */
	function aviation_industry_sanitize_checkbox( $aviation_industry_checked ) {

		return ( ( isset( $aviation_industry_checked ) && true === $aviation_industry_checked ) ? true : false );

	}

endif;


if ( ! function_exists( 'aviation_industry_sanitize_select' ) ) :

    /**
     * Sanitize select.
     */
    function aviation_industry_sanitize_select( $aviation_industry_input, $aviation_industry_setting ) {
        $aviation_industry_input = sanitize_text_field( $aviation_industry_input );
        $choices = $aviation_industry_setting->manager->get_control( $aviation_industry_setting->id )->choices;
        return ( array_key_exists( $aviation_industry_input, $choices ) ? $aviation_industry_input : $aviation_industry_setting->default );
    }

endif;
