<?php
/**
* Global Color Settings.
*
* @package Restaurant Culinary
*/

$restaurant_culinary_default = restaurant_culinary_get_default_theme_options();

// Layout Section.
$wp_customize->add_section( 'restaurant_culinary_global_color_setting',
	array(
	'title'      => esc_html__( 'Global Color Settings', 'restaurant-culinary' ),
	'priority'   => 21,
	'capability' => 'edit_theme_options',
	'panel'      => 'restaurant_culinary_theme_option_panel',
	)
);

$wp_customize->add_setting( 'restaurant_culinary_global_color',
    array(
    'default'           => '#50A96E',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control( 
    new WP_Customize_Color_Control( 
    $wp_customize, 
    'restaurant_culinary_global_color',
    array(
        'label'      => esc_html__( 'Global Color', 'restaurant-culinary' ),
        'section'    => 'restaurant_culinary_global_color_setting',
        'settings'   => 'restaurant_culinary_global_color',
    ) ) 
);