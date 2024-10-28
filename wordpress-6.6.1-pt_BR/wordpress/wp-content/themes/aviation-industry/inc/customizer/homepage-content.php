<?php
/**
* Header Banner Options.
*
* @package Aviation Industry
*/

$aviation_industry_default = aviation_industry_get_default_theme_options();
$aviation_industry_post_category_list = aviation_industry_post_category_list();

$wp_customize->add_section( 'aviation_industry_header_slider_setting',
    array(
    'title'      => esc_html__( 'Banner Settings', 'aviation-industry' ),
    'priority'   => 10,
    'capability' => 'edit_theme_options',
    'panel'      => 'aviation_industry_theme_home_pannel',
    )
);

$wp_customize->add_setting('aviation_industry_display_header_text',
    array(
        'default' => $aviation_industry_default['aviation_industry_header_slider'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'aviation_industry_sanitize_checkbox',
    )
);
$wp_customize->add_control('aviation_industry_display_header_text',
    array(
        'label' => esc_html__('Enable / Disable Tagline', 'aviation-industry'),
        'section' => 'title_tagline',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('aviation_industry_header_slider',
    array(
        'default' => $aviation_industry_default['aviation_industry_header_slider'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'aviation_industry_sanitize_checkbox',
    )
);
$wp_customize->add_control('aviation_industry_header_slider',
    array(
        'label' => esc_html__('Enable Banner', 'aviation-industry'),
        'section' => 'aviation_industry_header_slider_setting',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('aviation_industry_banner_background_image',
    array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    )
);
$wp_customize->add_control(
    new WP_Customize_Image_Control( $wp_customize,'aviation_industry_banner_background_image',
        array(
            'label' => __('Slider Background Image','aviation-industry'),
            'section' => 'aviation_industry_header_slider_setting',
            'settings' => 'aviation_industry_banner_background_image',
        )
    )
);

$wp_customize->add_setting( 'aviation_industry_header_banner_cat',
    array(
    'default'           => '',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'aviation_industry_sanitize_select',
    )
);
$wp_customize->add_control( 'aviation_industry_header_banner_cat',
    array(
    'label'       => esc_html__( 'Slider Post Left Category', 'aviation-industry' ),
    'section'     => 'aviation_industry_header_slider_setting',
    'type'        => 'select',
    'choices'     => $aviation_industry_post_category_list,
    )
);

// About Us Settings

$wp_customize->add_section( 'aviation_industry_about_us_setting',
    array(
    'title'      => esc_html__( 'About Us Settings', 'aviation-industry' ),
    'priority'   => 10,
    'capability' => 'edit_theme_options',
    'panel'      => 'aviation_industry_theme_home_pannel',
    )
);

$wp_customize->add_setting('aviation_industry_services',
    array(
        'default' => $aviation_industry_default['aviation_industry_services'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'aviation_industry_sanitize_checkbox',
    )
);
$wp_customize->add_control('aviation_industry_services',
    array(
        'label' => esc_html__('Enable About Us', 'aviation-industry'),
        'section' => 'aviation_industry_about_us_setting',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting( 'aviation_industry_services_sec_cat',
    array(
    'default'           => '',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'aviation_industry_sanitize_select',
    )
);
$wp_customize->add_control( 'aviation_industry_services_sec_cat',
    array(
    'label'       => esc_html__( 'Services Category', 'aviation-industry' ),
    'section'     => 'aviation_industry_about_us_setting',
    'type'        => 'select',
    'choices'     => $aviation_industry_post_category_list,
    )
);

for ($s=1; $s <=8 ; $s++) {
    $wp_customize->add_setting('aviation_industry_services_icon' .$s,
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control( $wp_customize,'aviation_industry_services_icon' .$s,
            array(
                'label' => __('Service Icon Image ','aviation-industry') .$s,
                'section' => 'aviation_industry_about_us_setting',
                'settings' => 'aviation_industry_services_icon' .$s,
            )
        )
    );
}