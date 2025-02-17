<?php
/**
* Color Settings.
* @package Restaurant Culinary
*/

$restaurant_culinary_default = restaurant_culinary_get_default_theme_options();

$wp_customize->add_setting( 'restaurant_culinary_default_text_color',
    array(
    'default'           => '',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control( 
    new WP_Customize_Color_Control( 
    $wp_customize, 
    'restaurant_culinary_default_text_color',
    array(
        'label'      => esc_html__( 'Text Color', 'restaurant-culinary' ),
        'section'    => 'colors',
        'settings'   => 'restaurant_culinary_default_text_color',
    ) ) 
);

$wp_customize->add_setting( 'restaurant_culinary_border_color',
    array(
    'default'           => '',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control( 
    new WP_Customize_Color_Control( 
    $wp_customize, 
    'restaurant_culinary_border_color',
    array(
        'label'      => esc_html__( 'Border Color', 'restaurant-culinary' ),
        'section'    => 'colors',
        'settings'   => 'restaurant_culinary_border_color',
    ) ) 
);