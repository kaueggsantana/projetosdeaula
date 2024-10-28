<?php
/**
* Additional Woocommerce Settings.
*
* @package Aviation Industry
*/

$aviation_industry_default = aviation_industry_get_default_theme_options();

// Additional Woocommerce Section.
$wp_customize->add_section( 'aviation_industry_additional_woocommerce_options',
	array(
	'title'      => esc_html__( 'Additional Woocommerce Options', 'aviation-industry' ),
	'priority'   => 210,
	'capability' => 'edit_theme_options',
	'panel'      => 'aviation_industry_theme_option_panel',
	)
);

	$wp_customize->add_setting('aviation_industry_per_columns',
		array(
		'default'           => $aviation_industry_default['aviation_industry_per_columns'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'aviation_industry_sanitize_number_range',
		)
	);
	$wp_customize->add_control('aviation_industry_per_columns',
		array(
		'label'       => esc_html__('Product Per Column', 'aviation-industry'),
		'section'     => 'aviation_industry_additional_woocommerce_options',
		'type'        => 'number',
		'input_attrs' => array(
		'min'   => 1,
		'max'   => 10,
		'step'   => 1,
		),
		)
	);

	$wp_customize->add_setting('aviation_industry_product_per_page',
		array(
		'default'           => $aviation_industry_default['aviation_industry_product_per_page'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'aviation_industry_sanitize_number_range',
		)
	);
	$wp_customize->add_control('aviation_industry_product_per_page',
		array(
		'label'       => esc_html__('Product Per Page', 'aviation-industry'),
		'section'     => 'aviation_industry_additional_woocommerce_options',
		'type'        => 'number',
		'input_attrs' => array(
		'min'   => 1,
		'max'   => 15,
		'step'   => 1,
		),
		)
	);

	$wp_customize->add_setting('aviation_industry_show_hide_related_product',
    array(
        'default' => $aviation_industry_default['aviation_industry_show_hide_related_product'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'aviation_industry_sanitize_checkbox',
    )
	);
	$wp_customize->add_control('aviation_industry_show_hide_related_product',
	    array(
	        'label' => esc_html__('Enable Related Products', 'aviation-industry'),
	        'section' => 'aviation_industry_additional_woocommerce_options',
	        'type' => 'checkbox',
	    )
	);
