<?php
/**
* Layouts Settings.
*
* @package Aviation Industry
*/

$aviation_industry_default = aviation_industry_get_default_theme_options();

// Layout Section.
$wp_customize->add_section( 'aviation_industry_layout_setting',
	array(
	'title'      => esc_html__( 'Global Layout Settings', 'aviation-industry' ),
	'priority'   => 20,
	'capability' => 'edit_theme_options',
	'panel'      => 'aviation_industry_theme_option_panel',
	)
);

$wp_customize->add_setting( 'aviation_industry_global_sidebar_layout',
    array(
    'default'           => $aviation_industry_default['aviation_industry_global_sidebar_layout'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'aviation_industry_sanitize_sidebar_option',
    )
);
$wp_customize->add_control( 'aviation_industry_global_sidebar_layout',
    array(
    'label'       => esc_html__( 'Global Sidebar Layout', 'aviation-industry' ),
    'section'     => 'aviation_industry_layout_setting',
    'type'        => 'select',
    'choices'     => array(
        'right-sidebar' => esc_html__( 'Right Sidebar', 'aviation-industry' ),
        'left-sidebar'  => esc_html__( 'Left Sidebar', 'aviation-industry' ),
        'no-sidebar'    => esc_html__( 'No Sidebar', 'aviation-industry' ),
        ),
    )
);
