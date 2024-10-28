<?php
/**
* Header Options.
*
* @package Aviation Industry
*/

$aviation_industry_default = aviation_industry_get_default_theme_options();

// Header Section.
$wp_customize->add_section( 'aviation_industry_button_header_setting',
	array(
	'title'      => esc_html__( 'Header Settings', 'aviation-industry' ),
	'priority'   => 10,
	'capability' => 'edit_theme_options',
	'panel'      => 'aviation_industry_theme_option_panel',
	)
);

$wp_customize->add_setting( 'aviation_industry_header_layout_address',
    array(
    'default'           => $aviation_industry_default['aviation_industry_header_layout_address'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'aviation_industry_header_layout_address',
    array(
    'label'    => esc_html__( 'Location', 'aviation-industry' ),
    'section'  => 'aviation_industry_button_header_setting',
    'type'     => 'text',
    )
);

$wp_customize->add_setting( 'aviation_industry_header_layout_email_address',
    array(
    'default'           => $aviation_industry_default['aviation_industry_header_layout_email_address'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'aviation_industry_header_layout_email_address',
    array(
    'label'    => esc_html__( 'Email', 'aviation-industry' ),
    'section'  => 'aviation_industry_button_header_setting',
    'type'     => 'text',
    )
);

$wp_customize->add_setting( 'aviation_industry_header_layout_phone_number',
    array(
    'default'           => $aviation_industry_default['aviation_industry_header_layout_phone_number'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'aviation_industry_header_layout_phone_number',
    array(
    'label'    => esc_html__( 'Phone Number', 'aviation-industry' ),
    'section'  => 'aviation_industry_button_header_setting',
    'type'     => 'text',
    )
);

$wp_customize->add_setting( 'aviation_industry_header_layout_timing',
    array(
    'default'           => $aviation_industry_default['aviation_industry_header_layout_timing'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'aviation_industry_header_layout_timing',
    array(
    'label'    => esc_html__( 'Timing Text', 'aviation-industry' ),
    'section'  => 'aviation_industry_button_header_setting',
    'type'     => 'text',
    )
);

$wp_customize->add_setting( 'aviation_industry_header_layout_button',
    array(
    'default'           => $aviation_industry_default['aviation_industry_header_layout_button'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'aviation_industry_header_layout_button',
    array(
    'label'    => esc_html__( 'Header Button Text', 'aviation-industry' ),
    'section'  => 'aviation_industry_button_header_setting',
    'type'     => 'text',
    )
);

$wp_customize->add_setting( 'aviation_industry_header_layout_button_url',
    array(
    'default'           => $aviation_industry_default['aviation_industry_header_layout_button_url'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'aviation_industry_header_layout_button_url',
    array(
    'label'    => esc_html__( 'Header Button Url', 'aviation-industry' ),
    'section'  => 'aviation_industry_button_header_setting',
    'type'     => 'url',
    )
);

$wp_customize->add_setting('aviation_industry_menu_font_size',
    array(
        'default'           => $aviation_industry_default['aviation_industry_menu_font_size'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'aviation_industry_sanitize_number_range',
    )
);
$wp_customize->add_control('aviation_industry_menu_font_size',
    array(
        'label'       => esc_html__('Menu Font Size', 'aviation-industry'),
        'section'     => 'aviation_industry_button_header_setting',
        'type'        => 'number',
        'input_attrs' => array(
           'min'   => 1,
           'max'   => 30,
           'step'   => 1,
        ),
    )
);

$wp_customize->add_setting( 'aviation_industry_menu_text_transform',
    array(
    'default'           => $aviation_industry_default['aviation_industry_menu_text_transform'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'aviation_industry_sanitize_menu_transform',
    )
);
$wp_customize->add_control( 'aviation_industry_menu_text_transform',
    array(
    'label'       => esc_html__( 'Menu Text Transform', 'aviation-industry' ),
    'section'     => 'aviation_industry_button_header_setting',
    'type'        => 'select',
    'choices'     => array(
        'capitalize' => esc_html__( 'Capitalize', 'aviation-industry' ),
        'uppercase'  => esc_html__( 'Uppercase', 'aviation-industry' ),
        'lowercase'    => esc_html__( 'Lowercase', 'aviation-industry' ),
        ),
    )
);

$wp_customize->add_setting('aviation_industry_theme_loader',
    array(
        'default' => $aviation_industry_default['aviation_industry_theme_loader'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'aviation_industry_sanitize_checkbox',
    )
);
$wp_customize->add_control('aviation_industry_theme_loader',
    array(
        'label' => esc_html__('Enable Preloader', 'aviation-industry'),
        'section' => 'aviation_industry_button_header_setting',
        'type' => 'checkbox',
    )
);
