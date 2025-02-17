<?php
/**
* Layouts Settings.
*
* @package Restaurant Culinary
*/

$restaurant_culinary_default = restaurant_culinary_get_default_theme_options();

// Layout Section.
$wp_customize->add_section( 'restaurant_culinary_layout_setting',
	array(
	'title'      => esc_html__( 'Sidebar Settings', 'restaurant-culinary' ),
	'priority'   => 20,
	'capability' => 'edit_theme_options',
	'panel'      => 'restaurant_culinary_theme_option_panel',
	)
);

$wp_customize->add_setting( 'restaurant_culinary_global_sidebar_layout',
    array(
    'default'           => $restaurant_culinary_default['restaurant_culinary_global_sidebar_layout'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'restaurant_culinary_sanitize_sidebar_option',
    )
);
$wp_customize->add_control( 'restaurant_culinary_global_sidebar_layout',
    array(
    'label'       => esc_html__( 'Global Sidebar Layout', 'restaurant-culinary' ),
    'section'     => 'restaurant_culinary_layout_setting',
    'type'        => 'select',
    'choices'     => array(
        'right-sidebar' => esc_html__( 'Right Sidebar', 'restaurant-culinary' ),
        'left-sidebar'  => esc_html__( 'Left Sidebar', 'restaurant-culinary' ),
        'no-sidebar'    => esc_html__( 'No Sidebar', 'restaurant-culinary' ),
        ),
    )
);

$wp_customize->add_setting('restaurant_culinary_page_sidebar_layout', array(
    'default'           => $restaurant_culinary_default['restaurant_culinary_global_sidebar_layout'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'restaurant_culinary_sanitize_sidebar_option',
));

$wp_customize->add_control('restaurant_culinary_page_sidebar_layout', array(
    'label'       => esc_html__('Single Page Sidebar Layout', 'restaurant-culinary'),
    'section'     => 'restaurant_culinary_layout_setting',
    'type'        => 'select',
    'choices'     => array(
        'right-sidebar' => esc_html__('Right Sidebar', 'restaurant-culinary'),
        'left-sidebar'  => esc_html__('Left Sidebar', 'restaurant-culinary'),
        'no-sidebar'    => esc_html__('No Sidebar', 'restaurant-culinary'),
    ),
));

$wp_customize->add_setting('restaurant_culinary_post_sidebar_layout', array(
    'default'           => $restaurant_culinary_default['restaurant_culinary_global_sidebar_layout'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'restaurant_culinary_sanitize_sidebar_option',
));

$wp_customize->add_control('restaurant_culinary_post_sidebar_layout', array(
    'label'       => esc_html__('Single Post Sidebar Layout', 'restaurant-culinary'),
    'section'     => 'restaurant_culinary_layout_setting',
    'type'        => 'select',
    'choices'     => array(
        'right-sidebar' => esc_html__('Right Sidebar', 'restaurant-culinary'),
        'left-sidebar'  => esc_html__('Left Sidebar', 'restaurant-culinary'),
        'no-sidebar'    => esc_html__('No Sidebar', 'restaurant-culinary'),
    ),
));