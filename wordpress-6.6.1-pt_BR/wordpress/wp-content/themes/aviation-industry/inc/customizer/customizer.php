<?php
/**
 * Aviation Industry Theme Customizer
 * @package Aviation Industry
 */

/** Sanitize Functions. **/
	require get_template_directory() . '/inc/customizer/default.php';

if (!function_exists('aviation_industry_customize_register')) :

function aviation_industry_customize_register( $wp_customize ) {

	require get_template_directory() . '/inc/customizer/custom-classes.php';
	require get_template_directory() . '/inc/customizer/sanitize.php';
	require get_template_directory() . '/inc/customizer/header-button.php';
	require get_template_directory() . '/inc/customizer/colors.php';
	require get_template_directory() . '/inc/customizer/post.php';
	require get_template_directory() . '/inc/customizer/footer.php';
	require get_template_directory() . '/inc/customizer/layout-setting.php';
	require get_template_directory() . '/inc/customizer/homepage-content.php';
	require get_template_directory() . '/inc/customizer/custom-addon.php';
	require get_template_directory() . '/inc/customizer/additional-woocommerce.php';

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	$wp_customize->get_section( 'colors' )->panel = 'aviation_industry_theme_colors_panel';
	$wp_customize->get_section( 'colors' )->title = esc_html__('Color Options','aviation-industry');
	$wp_customize->get_section( 'title_tagline' )->panel = 'aviation_industry_theme_general_settings';
	$wp_customize->get_section( 'header_image' )->panel = 'aviation_industry_theme_general_settings';
	$wp_customize->get_section( 'background_image' )->panel = 'aviation_industry_theme_general_settings';

	if ( isset( $wp_customize->selective_refresh ) ) {
		
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.header-titles .custom-logo-name',
			'render_callback' => 'aviation_industry_customize_partial_blogname',
		) );

		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'aviation_industry_customize_partial_blogdescription',
		) );

	}

	$wp_customize->add_panel( 'aviation_industry_theme_general_settings',
		array(
			'title'      => esc_html__( 'General Settings', 'aviation-industry' ),
			'priority'   => 10,
			'capability' => 'edit_theme_options',
		)
	);

	$wp_customize->add_panel( 'aviation_industry_theme_colors_panel',
		array(
			'title'      => esc_html__( 'Color Settings', 'aviation-industry' ),
			'priority'   => 15,
			'capability' => 'edit_theme_options',
		)
	);

	// Theme Options Panel.
	$wp_customize->add_panel( 'aviation_industry_theme_footer_option_panel',
		array(
			'title'      => esc_html__( 'Footer Setting', 'aviation-industry' ),
			'priority'   => 150,
			'capability' => 'edit_theme_options',
		)
	);

	// Template Options
	$wp_customize->add_panel( 'aviation_industry_theme_home_pannel',
		array(
			'title'      => esc_html__( 'Frontpage Settings', 'aviation-industry' ),
			'priority'   => 150,
			'capability' => 'edit_theme_options',
		)
	);

	// Addon Panel.
	$wp_customize->add_panel( 'aviation_industry_theme_addons_panel',
		array(
			'title'      => esc_html__( 'Theme Addons', 'aviation-industry' ),
			'priority'   => 5,
			'capability' => 'edit_theme_options',
		)
	);
	
	// Theme Options Panel.
	$wp_customize->add_panel( 'aviation_industry_theme_option_panel',
		array(
			'title'      => esc_html__( 'Theme Options', 'aviation-industry' ),
			'priority'   => 5,
			'capability' => 'edit_theme_options',
		)
	);
	$wp_customize->add_setting('aviation_industry_logo_width_range',
	    array(
	        'default'           => $aviation_industry_default['aviation_industry_logo_width_range'],
	        'capability'        => 'edit_theme_options',
	        'sanitize_callback' => 'aviation_industry_sanitize_number_range',
	    )
	);
	$wp_customize->add_control('aviation_industry_logo_width_range',
	    array(
	        'label'       => esc_html__('Logo width', 'aviation-industry'),
	        'description'       => esc_html__( 'Specify the range for logo size with a minimum of 200px and a maximum of 700px, in increments of 20px.', 'aviation-industry' ),
	        'section'     => 'title_tagline',
	        'type'        => 'range',
	        'input_attrs' => array(
	           'min'   => 200,
	           'max'   => 700,
	           'step'   => 20,
        	),
	    )
	);

	// Register custom section types.
	$wp_customize->register_section_type( 'Aviation_Industry_Customize_Section_Upsell' );

	// Register sections.
	$wp_customize->add_section(
		new Aviation_Industry_Customize_Section_Upsell(
			$wp_customize,
			'theme_upsell',
			array(
				'title'    => esc_html__( 'Aviation Industry Pro', 'aviation-industry' ),
				'pro_text' => esc_html__( 'Upgrade To Pro', 'aviation-industry' ),
				'pro_url'  => esc_url('https://www.omegathemes.com/products/aviation-industry-wordpress-theme'),
				'priority'  => 1,
			)
		)
	);
}

endif;
add_action( 'customize_register', 'aviation_industry_customize_register' );

/**
 * Customizer Enqueue scripts and styles.
 */

if (!function_exists('aviation_industry_customizer_scripts')) :

    function aviation_industry_customizer_scripts(){
    	
    	wp_enqueue_script('jquery-ui-button');
    	wp_enqueue_style('aviation-industry-customizer', get_template_directory_uri() . '/lib/custom/css/customizer.css');
        wp_enqueue_script('aviation-industry-customizer', get_template_directory_uri() . '/lib/custom/js/customizer.js', array('jquery','customize-controls'), '', 1);

        $ajax_nonce = wp_create_nonce('aviation_industry_ajax_nonce');
        wp_localize_script( 
		    'aviation-industry-customizer',
		    'aviation_industry_customizer',
		    array(
		        'ajax_url'   => esc_url( admin_url( 'admin-ajax.php' ) ),
		        'ajax_nonce' => $ajax_nonce,
		     )
		);
    }

endif;

add_action('customize_controls_enqueue_scripts', 'aviation_industry_customizer_scripts');
add_action('customize_controls_init', 'aviation_industry_customizer_scripts');

function aviation_industry_customize_preview_js() {
	wp_enqueue_script( 'aviation-industry-customizer-preview', get_template_directory_uri() . '/lib/custom/js/customizer-preview.js', array( 'customize-preview' ), '', true );
}
add_action( 'customize_preview_init', 'aviation_industry_customize_preview_js' );

if (!function_exists('aviation_industry_customize_partial_blogname')) :
	function aviation_industry_customize_partial_blogname() {
		bloginfo( 'name' );
	}
endif;

if (!function_exists('aviation_industry_customize_partial_blogdescription')) :
	function aviation_industry_customize_partial_blogdescription() {
		bloginfo( 'description' );
	}
endif;