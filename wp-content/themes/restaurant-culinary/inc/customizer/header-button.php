<?php
/**
* Header Options.
*
* @package Restaurant Culinary
*/

$restaurant_culinary_default = restaurant_culinary_get_default_theme_options();

// Header Section.
$wp_customize->add_section( 'restaurant_culinary_button_header_setting',
	array(
	'title'      => esc_html__( 'Header Settings', 'restaurant-culinary' ),
	'priority'   => 10,
	'capability' => 'edit_theme_options',
	'panel'      => 'restaurant_culinary_theme_option_panel',
	)
);

$wp_customize->add_setting('restaurant_culinary_sticky',
    array(
        'default' => $restaurant_culinary_default['restaurant_culinary_sticky'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'restaurant_culinary_sanitize_checkbox',
    )
);
$wp_customize->add_control('restaurant_culinary_sticky',
    array(
        'label' => esc_html__('Enable Sticky Header', 'restaurant-culinary'),
        'section' => 'restaurant_culinary_button_header_setting',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('restaurant_culinary_menu_font_size',
    array(
        'default'           => $restaurant_culinary_default['restaurant_culinary_menu_font_size'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'restaurant_culinary_sanitize_number_range',
    )
);
$wp_customize->add_control('restaurant_culinary_menu_font_size',
    array(
        'label'       => esc_html__('Menu Font Size', 'restaurant-culinary'),
        'section'     => 'restaurant_culinary_button_header_setting',
        'type'        => 'number',
        'input_attrs' => array(
           'min'   => 1,
           'max'   => 30,
           'step'   => 1,
        ),
    )
);

$wp_customize->add_setting( 'restaurant_culinary_menu_text_transform',
    array(
    'default'           => $restaurant_culinary_default['restaurant_culinary_menu_text_transform'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'restaurant_culinary_sanitize_menu_transform',
    )
);
$wp_customize->add_control( 'restaurant_culinary_menu_text_transform',
    array(
    'label'       => esc_html__( 'Menu Text Transform', 'restaurant-culinary' ),
    'section'     => 'restaurant_culinary_button_header_setting',
    'type'        => 'select',
    'choices'     => array(
        'capitalize' => esc_html__( 'Capitalize', 'restaurant-culinary' ),
        'uppercase'  => esc_html__( 'Uppercase', 'restaurant-culinary' ),
        'lowercase'    => esc_html__( 'Lowercase', 'restaurant-culinary' ),
        ),
    )
);

$wp_customize->add_setting('restaurant_culinary_header_search',
    array(
        'default' => $restaurant_culinary_default['restaurant_culinary_header_search'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'restaurant_culinary_sanitize_checkbox',
    )
);
$wp_customize->add_control('restaurant_culinary_header_search',
    array(
        'label' => esc_html__('Enable Search', 'restaurant-culinary'),
        'section' => 'restaurant_culinary_button_header_setting',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting( 'restaurant_culinary_header_layout_button',
    array(
    'default'           => $restaurant_culinary_default['restaurant_culinary_header_layout_button'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'restaurant_culinary_header_layout_button',
    array(
    'label'    => esc_html__( 'Header Button Text', 'restaurant-culinary' ),
    'section'  => 'restaurant_culinary_button_header_setting',
    'type'     => 'text',
    )
);

$wp_customize->add_setting( 'restaurant_culinary_header_layout_button_url',
    array(
    'default'           => $restaurant_culinary_default['restaurant_culinary_header_layout_button_url'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'restaurant_culinary_header_layout_button_url',
    array(
    'label'    => esc_html__( 'Header Button Url', 'restaurant-culinary' ),
    'section'  => 'restaurant_culinary_button_header_setting',
    'type'     => 'url',
    )
);