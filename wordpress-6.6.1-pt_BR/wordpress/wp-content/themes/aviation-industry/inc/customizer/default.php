<?php
/**
 * Default Values.
 *
 * @package Aviation Industry
 */

if ( ! function_exists( 'aviation_industry_get_default_theme_options' ) ) :
	function aviation_industry_get_default_theme_options() {

		$aviation_industry_defaults = array();

        // Header
        $aviation_industry_defaults['aviation_industry_header_layout_button']          =  esc_html__( 'e-registration', 'aviation-industry' );
        $aviation_industry_defaults['aviation_industry_header_layout_button_url']      =  esc_url( '#', 'aviation-industry' );
        $aviation_industry_defaults['aviation_industry_header_search']                 = 0;
        $aviation_industry_defaults['aviation_industry_theme_loader']                  = 0;
        $aviation_industry_defaults['aviation_industry_footer_column_layout']          = 3;
        $aviation_industry_defaults['aviation_industry_menu_font_size']                 = 14;
        $aviation_industry_defaults['aviation_industry_copyright_font_size']                 = 16;
        $aviation_industry_defaults['aviation_industry_breadcrumb_font_size']                 = 16;
        $aviation_industry_defaults['aviation_industry_excerpt_limit']                 = 10;
        $aviation_industry_defaults['aviation_industry_menu_text_transform']                 = 'capitalize';  
        $aviation_industry_defaults['aviation_industry_single_page_content_alignment']                 = 'left';
        $aviation_industry_defaults['aviation_industry_theme_pagination_options_alignment']                 = 'Center'; 
        $aviation_industry_defaults['aviation_industry_theme_breadcrumb_options_alignment']                 = 'Left'; 
        $aviation_industry_defaults['aviation_industry_per_columns']                 = 3;  
        $aviation_industry_defaults['aviation_industry_product_per_page']                 = 9;

        // Topbar
        $aviation_industry_defaults['aviation_industry_header_layout_phone_number']       =  esc_html__( '1234567890', 'aviation-industry' );
        $aviation_industry_defaults['aviation_industry_header_layout_timing']             =  esc_html__( 'Mon-Fri 08:00 AM - 05:00 PM', 'aviation-industry' );
        $aviation_industry_defaults['aviation_industry_header_layout_email_address']      =  esc_html__( 'aviacademy@example.com', 'aviation-industry' );
        $aviation_industry_defaults['aviation_industry_header_layout_address']            =  esc_html__( '512,Beand Square, California', 'aviation-industry' );

        //Slider 

        $aviation_industry_defaults['aviation_industry_slider_section_small_title']    =  esc_html__( 'Welcome to Fruits Store', 'aviation-industry' );
        $aviation_industry_defaults['aviation_industry_slider_section_sub_title']      =  esc_html__( 'Shop Fresh, Eat Well One Stop Online Fruits Destination', 'aviation-industry' );
        $aviation_industry_defaults['aviation_industry_slider_section_content']        =  esc_html__( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'aviation-industry' );
        $aviation_industry_defaults['aviation_industry_slider_section_button_url']     =  esc_url( '#', 'aviation-industry' );
        $aviation_industry_defaults['aviation_industry_slider_section_button']         =  esc_html__( 'get started', 'aviation-industry' );

	// Options.
        $aviation_industry_defaults['aviation_industry_logo_width_range']                 = 300;
        
        $aviation_industry_defaults['aviation_industry_global_sidebar_layout']	        = 'right-sidebar';
        
        $aviation_industry_defaults['aviation_industry_pagination_layout']                = 'numeric';
	$aviation_industry_defaults['aviation_industry_footer_column_layout'] 	        = 2;
	$aviation_industry_defaults['aviation_industry_footer_copyright_text'] 	        = esc_html__( 'All rights reserved.', 'aviation-industry' );
        $aviation_industry_defaults['aviation_industry_twp_navigation_type']              = 'theme-normal-navigation';
        $aviation_industry_defaults['aviation_industry_post_author']                      = 1;
        $aviation_industry_defaults['aviation_industry_post_date']                        = 1;
        $aviation_industry_defaults['aviation_industry_post_category']                	= 1;
        $aviation_industry_defaults['aviation_industry_post_tags']                        = 1;
        $aviation_industry_defaults['aviation_industry_floating_next_previous_nav']       = 1;
        $aviation_industry_defaults['aviation_industry_header_slider']                    = 0;
        $aviation_industry_defaults['aviation_industry_category_section']                 = 0;
        $aviation_industry_defaults['aviation_industry_courses_category_section']         = 0;
        $aviation_industry_defaults['aviation_industry_background_color']                 = '#fff';

        //About Us
        
        $aviation_industry_defaults['aviation_industry_services']                   = 0;
        $aviation_industry_defaults['aviation_industry_display_footer']            = 0;
        $aviation_industry_defaults['aviation_industry_footer_widget_title_alignment']                 = 'left'; 
        $aviation_industry_defaults['aviation_industry_show_hide_related_product']          = 1;
        $aviation_industry_defaults['aviation_industry_display_archive_post_image']            = 1;
        $aviation_industry_defaults['aviation_industry_about_us_section_title']            = esc_html__( 'About Us', 'aviation-industry' );
        $aviation_industry_defaults['aviation_industry_about_us_section_content']          = esc_html__( 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content.', 'aviation-industry' );
        $aviation_industry_defaults['aviation_industry_about_us_section_content_1']        = esc_html__( 'You through a personalized language journey, fostering a supportive learning environment.', 'aviation-industry' );
        $aviation_industry_defaults['aviation_industry_about_us_section_image_title']      = esc_html__( 'ABOUT US', 'aviation-industry' );
        $aviation_industry_defaults['aviation_industry_about_us_exprience_title']          = esc_html__( 'Our Mission', 'aviation-industry' );
        $aviation_industry_defaults['aviation_industry_about_us_work_title']               = esc_html__( 'We prioritize your satisfaction and strive to make your shopping experience enjoyable.', 'aviation-industry' );
        $aviation_industry_defaults['aviation_industry_about_us_button_text']              = esc_html__( 'Read More', 'aviation-industry' );
        $aviation_industry_defaults['aviation_industry_about_us_button_url']               =  esc_url( '#', 'aviation-industry' );

	// Pass through filter.
	$aviation_industry_defaults = apply_filters( 'aviation_industry_filter_default_theme_options', $aviation_industry_defaults );

		return $aviation_industry_defaults;
	}
endif;
