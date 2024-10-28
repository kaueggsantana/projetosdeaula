<?php
/**
* Custom Addons.
*
* @package Aviation Industry
*/

$wp_customize->add_section( 'aviation_industry_theme_pagination_options',
    array(
    'title'      => esc_html__( 'Customizer Custom Settings', 'aviation-industry' ),
    'priority'   => 10,
    'capability' => 'edit_theme_options',
    'panel'      => 'aviation_industry_theme_addons_panel',
    )
);

$wp_customize->add_setting( 'aviation_industry_theme_pagination_options_alignment',
    array(
    'default'           => $aviation_industry_default['aviation_industry_theme_pagination_options_alignment'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'aviation_industry_sanitize_pagination_meta',
    )
);
$wp_customize->add_control( 'aviation_industry_theme_pagination_options_alignment',
    array(
    'label'       => esc_html__( 'Pagination Alignment', 'aviation-industry' ),
    'section'     => 'aviation_industry_theme_pagination_options',
    'type'        => 'select',
    'choices'     => array(
        'Center'    => esc_html__( 'Center', 'aviation-industry' ),
        'Right' => esc_html__( 'Right', 'aviation-industry' ),
        'Left'  => esc_html__( 'Left', 'aviation-industry' ),
        ),
    )
);

$wp_customize->add_setting( 'aviation_industry_theme_breadcrumb_options_alignment',
    array(
    'default'           => $aviation_industry_default['aviation_industry_theme_breadcrumb_options_alignment'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'aviation_industry_sanitize_pagination_meta',
    )
);
$wp_customize->add_control( 'aviation_industry_theme_breadcrumb_options_alignment',
    array(
    'label'       => esc_html__( 'Breadcrumb Alignment', 'aviation-industry' ),
    'section'     => 'aviation_industry_theme_pagination_options',
    'type'        => 'select',
    'choices'     => array(
        'Center'    => esc_html__( 'Center', 'aviation-industry' ),
        'Right' => esc_html__( 'Right', 'aviation-industry' ),
        'Left'  => esc_html__( 'Left', 'aviation-industry' ),
        ),
    )
);

$wp_customize->add_setting('aviation_industry_breadcrumb_font_size',
    array(
        'default'           => $aviation_industry_default['aviation_industry_breadcrumb_font_size'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'aviation_industry_sanitize_number_range',
    )
);
$wp_customize->add_control('aviation_industry_breadcrumb_font_size',
    array(
        'label'       => esc_html__('Breadcrumb Font Size', 'aviation-industry'),
        'section'     => 'aviation_industry_theme_pagination_options',
        'type'        => 'number',
        'input_attrs' => array(
           'min'   => 1,
           'max'   => 45,
           'step'   => 1,
        ),
    )
);

$wp_customize->add_setting( 'aviation_industry_single_page_content_alignment',
    array(
    'default'           => $aviation_industry_default['aviation_industry_single_page_content_alignment'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'aviation_industry_sanitize_page_content_alignment',
    )
);
$wp_customize->add_control( 'aviation_industry_single_page_content_alignment',
    array(
    'label'       => esc_html__( 'Single Page Content Alignment', 'aviation-industry' ),
    'section'     => 'aviation_industry_theme_pagination_options',
    'type'        => 'select',
    'choices'     => array(
        'left' => esc_html__( 'Left', 'aviation-industry' ),
        'center'  => esc_html__( 'Center', 'aviation-industry' ),
        'right'    => esc_html__( 'Right', 'aviation-industry' ),
        ),
    )
);