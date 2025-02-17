<?php
/**
* Custom Addons.
*
* @package Restaurant Culinary
*/

$wp_customize->add_section( 'restaurant_culinary_theme_pagination_options',
    array(
    'title'      => esc_html__( 'Customizer Custom Settings', 'restaurant-culinary' ),
    'priority'   => 10,
    'capability' => 'edit_theme_options',
    'panel'      => 'restaurant_culinary_theme_addons_panel',
    )
);

$wp_customize->add_setting('restaurant_culinary_theme_loader',
    array(
        'default' => $restaurant_culinary_default['restaurant_culinary_theme_loader'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'restaurant_culinary_sanitize_checkbox',
    )
);
$wp_customize->add_control('restaurant_culinary_theme_loader',
    array(
        'label' => esc_html__('Enable Preloader', 'restaurant-culinary'),
        'section' => 'restaurant_culinary_theme_pagination_options',
        'type' => 'checkbox',
    )
);

// Add Pagination Enable/Disable option to Customizer
$wp_customize->add_setting( 'restaurant_culinary_enable_pagination', 
    array(
        'default'           => true, // Default is enabled
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'restaurant_culinary_sanitize_enable_pagination', // Sanitize the input
    )
);

// Add the control to the Customizer
$wp_customize->add_control( 'restaurant_culinary_enable_pagination', 
    array(
        'label'    => esc_html__( 'Enable Pagination', 'restaurant-culinary' ),
        'section'  => 'restaurant_culinary_theme_pagination_options', // Add to the correct section
        'type'     => 'checkbox',
    )
);

$wp_customize->add_setting( 'restaurant_culinary_theme_pagination_type', 
    array(
        'default'           => 'numeric', // Set "numeric" as the default
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'restaurant_culinary_sanitize_pagination_type', // Use our sanitize function
    )
);

$wp_customize->add_control( 'restaurant_culinary_theme_pagination_type',
    array(
        'label'       => esc_html__( 'Pagination Style', 'restaurant-culinary' ),
        'section'     => 'restaurant_culinary_theme_pagination_options',
        'type'        => 'select',
        'choices'     => array(
            'numeric'      => esc_html__( 'Numeric (Page Numbers)', 'restaurant-culinary' ),
            'newer_older'  => esc_html__( 'Newer/Older (Previous/Next)', 'restaurant-culinary' ), // Renamed to "Newer/Older"
        ),
    )
);

$wp_customize->add_setting( 'restaurant_culinary_theme_pagination_options_alignment',
    array(
    'default'           => $restaurant_culinary_default['restaurant_culinary_theme_pagination_options_alignment'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'restaurant_culinary_sanitize_pagination_meta',
    )
);
$wp_customize->add_control( 'restaurant_culinary_theme_pagination_options_alignment',
    array(
    'label'       => esc_html__( 'Pagination Alignment', 'restaurant-culinary' ),
    'section'     => 'restaurant_culinary_theme_pagination_options',
    'type'        => 'select',
    'choices'     => array(
        'Center'    => esc_html__( 'Center', 'restaurant-culinary' ),
        'Right' => esc_html__( 'Right', 'restaurant-culinary' ),
        'Left'  => esc_html__( 'Left', 'restaurant-culinary' ),
        ),
    )
);

$wp_customize->add_setting('restaurant_culinary_theme_breadcrumb_enable',
array(
    'default' => $restaurant_culinary_default['restaurant_culinary_theme_breadcrumb_enable'],
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'restaurant_culinary_sanitize_checkbox',
)
);
$wp_customize->add_control('restaurant_culinary_theme_breadcrumb_enable',
    array(
        'label' => esc_html__('Enable Breadcrumb', 'restaurant-culinary'),
        'section' => 'restaurant_culinary_theme_pagination_options',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting( 'restaurant_culinary_theme_breadcrumb_options_alignment',
    array(
    'default'           => $restaurant_culinary_default['restaurant_culinary_theme_breadcrumb_options_alignment'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'restaurant_culinary_sanitize_pagination_meta',
    )
);
$wp_customize->add_control( 'restaurant_culinary_theme_breadcrumb_options_alignment',
    array(
    'label'       => esc_html__( 'Breadcrumb Alignment', 'restaurant-culinary' ),
    'section'     => 'restaurant_culinary_theme_pagination_options',
    'type'        => 'select',
    'choices'     => array(
        'Center'    => esc_html__( 'Center', 'restaurant-culinary' ),
        'Right' => esc_html__( 'Right', 'restaurant-culinary' ),
        'Left'  => esc_html__( 'Left', 'restaurant-culinary' ),
        ),
    )
);

$wp_customize->add_setting('restaurant_culinary_breadcrumb_font_size',
    array(
        'default'           => $restaurant_culinary_default['restaurant_culinary_breadcrumb_font_size'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'restaurant_culinary_sanitize_number_range',
    )
);
$wp_customize->add_control('restaurant_culinary_breadcrumb_font_size',
    array(
        'label'       => esc_html__('Breadcrumb Font Size', 'restaurant-culinary'),
        'section'     => 'restaurant_culinary_theme_pagination_options',
        'type'        => 'number',
        'input_attrs' => array(
           'min'   => 1,
           'max'   => 45,
           'step'   => 1,
        ),
    )
);

$wp_customize->add_setting( 'restaurant_culinary_single_page_content_alignment',
    array(
    'default'           => $restaurant_culinary_default['restaurant_culinary_single_page_content_alignment'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'restaurant_culinary_sanitize_page_content_alignment',
    )
);
$wp_customize->add_control( 'restaurant_culinary_single_page_content_alignment',
    array(
    'label'       => esc_html__( 'Single Page Content Alignment', 'restaurant-culinary' ),
    'section'     => 'restaurant_culinary_theme_pagination_options',
    'type'        => 'select',
    'choices'     => array(
        'left' => esc_html__( 'Left', 'restaurant-culinary' ),
        'center'  => esc_html__( 'Center', 'restaurant-culinary' ),
        'right'    => esc_html__( 'Right', 'restaurant-culinary' ),
        ),
    )
);

$wp_customize->add_setting( 'restaurant_culinary_single_post_content_alignment',
    array(
    'default'           => $restaurant_culinary_default['restaurant_culinary_single_post_content_alignment'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'restaurant_culinary_sanitize_page_content_alignment',
    )
);
$wp_customize->add_control( 'restaurant_culinary_single_post_content_alignment',
    array(
    'label'       => esc_html__( 'Single Post Content Alignment', 'restaurant-culinary' ),
    'section'     => 'restaurant_culinary_theme_pagination_options',
    'type'        => 'select',
    'choices'     => array(
        'left' => esc_html__( 'Left', 'restaurant-culinary' ),
        'center'  => esc_html__( 'Center', 'restaurant-culinary' ),
        'right'    => esc_html__( 'Right', 'restaurant-culinary' ),
        ),
    )
);