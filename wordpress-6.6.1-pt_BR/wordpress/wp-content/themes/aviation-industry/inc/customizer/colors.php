<?php
/**
* Color Settings.
* @package Aviation Industry
*/

$aviation_industry_default = aviation_industry_get_default_theme_options();

$wp_customize->add_setting( 'aviation_industry_default_text_color',
    array(
    'default'           => '',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control( 
    new WP_Customize_Color_Control( 
    $wp_customize, 
    'aviation_industry_default_text_color',
    array(
        'label'      => esc_html__( 'Text Color', 'aviation-industry' ),
        'section'    => 'colors',
        'settings'   => 'aviation_industry_default_text_color',
    ) ) 
);

$wp_customize->add_setting( 'aviation_industry_border_color',
    array(
    'default'           => '',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control( 
    new WP_Customize_Color_Control( 
    $wp_customize, 
    'aviation_industry_border_color',
    array(
        'label'      => esc_html__( 'Border Color', 'aviation-industry' ),
        'section'    => 'colors',
        'settings'   => 'aviation_industry_border_color',
    ) ) 
);