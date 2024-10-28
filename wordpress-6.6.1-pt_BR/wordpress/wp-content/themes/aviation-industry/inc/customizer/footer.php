<?php
/**
* Footer Settings.
*
* @package Aviation Industry
*/

$aviation_industry_default = aviation_industry_get_default_theme_options();

$wp_customize->add_section( 'aviation_industry_footer_widget_area',
	array(
	'title'      => esc_html__( 'Footer Settings', 'aviation-industry' ),
	'priority'   => 200,
	'capability' => 'edit_theme_options',
	'panel'      => 'aviation_industry_theme_option_panel',
	)
);

$wp_customize->add_setting('aviation_industry_display_footer',
    array(
        'default' => $aviation_industry_default['aviation_industry_display_footer'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'aviation_industry_sanitize_checkbox',
    )
);
$wp_customize->add_control('aviation_industry_display_footer',
    array(
        'label' => esc_html__('Enable Footer', 'aviation-industry'),
        'section' => 'aviation_industry_footer_widget_area',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting( 'aviation_industry_footer_column_layout',
	array(
	'default'           => $aviation_industry_default['aviation_industry_footer_column_layout'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'aviation_industry_sanitize_select',
	)
);
$wp_customize->add_control( 'aviation_industry_footer_column_layout',
	array(
	'label'       => esc_html__( 'Footer Column Layout', 'aviation-industry' ),
	'section'     => 'aviation_industry_footer_widget_area',
	'type'        => 'select',
	'choices'               => array(
		'1' => esc_html__( 'One Column', 'aviation-industry' ),
		'2' => esc_html__( 'Two Column', 'aviation-industry' ),
		'3' => esc_html__( 'Three Column', 'aviation-industry' ),
	    ),
	)
);

$wp_customize->add_setting( 'aviation_industry_footer_widget_title_alignment',
        array(
        'default'           => $aviation_industry_default['aviation_industry_footer_widget_title_alignment'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'aviation_industry_sanitize_footer_widget_title_alignment',
        )
);
$wp_customize->add_control( 'aviation_industry_footer_widget_title_alignment',
    array(
    'label'       => esc_html__( 'Footer Widget Title Alignment', 'aviation-industry' ),
    'section'     => 'aviation_industry_footer_widget_area',
    'type'        => 'select',
    'choices'     => array(
        'left' => esc_html__( 'Left', 'aviation-industry' ),
        'center'  => esc_html__( 'Center', 'aviation-industry' ),
        'right'    => esc_html__( 'Right', 'aviation-industry' ),
        ),
    )
);

$wp_customize->add_setting( 'aviation_industry_footer_copyright_text',
	array(
	'default'           => $aviation_industry_default['aviation_industry_footer_copyright_text'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'aviation_industry_footer_copyright_text',
	array(
	'label'    => esc_html__( 'Footer Copyright Text', 'aviation-industry' ),
	'section'  => 'aviation_industry_footer_widget_area',
	'type'     => 'text',
	)
);

$wp_customize->add_setting('aviation_industry_copyright_font_size',
    array(
        'default'           => $aviation_industry_default['aviation_industry_copyright_font_size'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'aviation_industry_sanitize_number_range',
    )
);
$wp_customize->add_control('aviation_industry_copyright_font_size',
    array(
        'label'       => esc_html__('Copyright Font Size', 'aviation-industry'),
        'section'     => 'aviation_industry_footer_widget_area',
        'type'        => 'number',
        'input_attrs' => array(
           'min'   => 5,
           'max'   => 30,
           'step'   => 1,
    	),
    )
);

$wp_customize->add_setting( 'aviation_industry_footer_widget_background_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
));
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'aviation_industry_footer_widget_background_color', array(
    'label'     => __('Footer Widget Background Color', 'aviation-industry'),
    'description' => __('It will change the complete footer widget background color.', 'aviation-industry'),
    'section' => 'aviation_industry_footer_widget_area',
    'settings' => 'aviation_industry_footer_widget_background_color',
)));

$wp_customize->add_setting('footer_widget_background_image',array(
    'default'   => '',
    'sanitize_callback' => 'esc_url_raw',
));
$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'footer_widget_background_image',array(
    'label' => __('Footer Widget Background Image','aviation-industry'),
    'section' => 'aviation_industry_footer_widget_area'
)));
