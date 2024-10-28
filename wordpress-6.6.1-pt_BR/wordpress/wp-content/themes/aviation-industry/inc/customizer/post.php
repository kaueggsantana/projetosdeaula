<?php
/**
* Posts Settings.
*
* @package Aviation Industry
*/

$aviation_industry_default = aviation_industry_get_default_theme_options();

// Single Post Section.
$wp_customize->add_section( 'aviation_industry_posts_settings',
	array(
	'title'      => esc_html__( 'Meta Information Settings', 'aviation-industry' ),
	'priority'   => 35,
	'capability' => 'edit_theme_options',
	'panel'      => 'aviation_industry_theme_option_panel',
	)
);

$wp_customize->add_setting('aviation_industry_display_archive_post_image',
    array(
        'default' => $aviation_industry_default['aviation_industry_display_archive_post_image'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'aviation_industry_sanitize_checkbox',
    )
);
$wp_customize->add_control('aviation_industry_display_archive_post_image',
    array(
        'label' => esc_html__('Enable Posts Image', 'aviation-industry'),
        'section' => 'aviation_industry_posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('aviation_industry_post_author',
    array(
        'default' => $aviation_industry_default['aviation_industry_post_author'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'aviation_industry_sanitize_checkbox',
    )
);
$wp_customize->add_control('aviation_industry_post_author',
    array(
        'label' => esc_html__('Enable Posts Author', 'aviation-industry'),
        'section' => 'aviation_industry_posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('aviation_industry_post_date',
    array(
        'default' => $aviation_industry_default['aviation_industry_post_date'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'aviation_industry_sanitize_checkbox',
    )
);
$wp_customize->add_control('aviation_industry_post_date',
    array(
        'label' => esc_html__('Enable Posts Date', 'aviation-industry'),
        'section' => 'aviation_industry_posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('aviation_industry_post_category',
    array(
        'default' => $aviation_industry_default['aviation_industry_post_category'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'aviation_industry_sanitize_checkbox',
    )
);
$wp_customize->add_control('aviation_industry_post_category',
    array(
        'label' => esc_html__('Enable Posts Category', 'aviation-industry'),
        'section' => 'aviation_industry_posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('aviation_industry_post_tags',
    array(
        'default' => $aviation_industry_default['aviation_industry_post_tags'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'aviation_industry_sanitize_checkbox',
    )
);
$wp_customize->add_control('aviation_industry_post_tags',
    array(
        'label' => esc_html__('Enable Posts Tags', 'aviation-industry'),
        'section' => 'aviation_industry_posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('aviation_industry_excerpt_limit',
    array(
        'default'           => $aviation_industry_default['aviation_industry_excerpt_limit'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'aviation_industry_sanitize_number_range',
    )
);
$wp_customize->add_control('aviation_industry_excerpt_limit',
    array(
        'label'       => esc_html__('Blog Post Excerpt limit', 'aviation-industry'),
        'section'     => 'aviation_industry_posts_settings',
        'type'        => 'number',
        'input_attrs' => array(
           'min'   => 1,
           'max'   => 45,
           'step'   => 1,
        ),
    )
);