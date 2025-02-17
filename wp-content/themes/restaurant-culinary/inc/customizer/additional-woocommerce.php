<?php
/**
* Additional Woocommerce Settings.
*
* @package Restaurant Culinary
*/

$restaurant_culinary_default = restaurant_culinary_get_default_theme_options();

// Additional Woocommerce Section.
$wp_customize->add_section( 'restaurant_culinary_additional_woocommerce_options',
	array(
	'title'      => esc_html__( 'Additional Woocommerce Options', 'restaurant-culinary' ),
	'priority'   => 210,
	'capability' => 'edit_theme_options',
	'panel'      => 'restaurant_culinary_theme_option_panel',
	)
);

	$wp_customize->add_setting('restaurant_culinary_per_columns',
		array(
		'default'           => $restaurant_culinary_default['restaurant_culinary_per_columns'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'restaurant_culinary_sanitize_number_range',
		)
	);
	$wp_customize->add_control('restaurant_culinary_per_columns',
		array(
		'label'       => esc_html__('Product Per Column', 'restaurant-culinary'),
		'section'     => 'restaurant_culinary_additional_woocommerce_options',
		'type'        => 'number',
		'input_attrs' => array(
		'min'   => 1,
		'max'   => 10,
		'step'   => 1,
		),
		)
	);

	$wp_customize->add_setting('restaurant_culinary_product_per_page',
		array(
		'default'           => $restaurant_culinary_default['restaurant_culinary_product_per_page'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'restaurant_culinary_sanitize_number_range',
		)
	);
	$wp_customize->add_control('restaurant_culinary_product_per_page',
		array(
		'label'       => esc_html__('Product Per Page', 'restaurant-culinary'),
		'section'     => 'restaurant_culinary_additional_woocommerce_options',
		'type'        => 'number',
		'input_attrs' => array(
		'min'   => 1,
		'max'   => 15,
		'step'   => 1,
		),
		)
	);

	$wp_customize->add_setting('restaurant_culinary_show_hide_related_product',
    array(
        'default' => $restaurant_culinary_default['restaurant_culinary_show_hide_related_product'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'restaurant_culinary_sanitize_checkbox',
    )
	);
	$wp_customize->add_control('restaurant_culinary_show_hide_related_product',
	    array(
	        'label' => esc_html__('Enable Related Products', 'restaurant-culinary'),
	        'section' => 'restaurant_culinary_additional_woocommerce_options',
	        'type' => 'checkbox',
	    )
	);
