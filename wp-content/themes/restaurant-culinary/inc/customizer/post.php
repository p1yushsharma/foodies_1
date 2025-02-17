<?php
/**
* Posts Settings.
*
* @package Restaurant Culinary
*/

$restaurant_culinary_default = restaurant_culinary_get_default_theme_options();

// Single Post Section.
$wp_customize->add_section( 'restaurant_culinary_single_posts_settings',
    array(
    'title'      => esc_html__( 'Single Meta Information Settings', 'restaurant-culinary' ),
    'priority'   => 35,
    'capability' => 'edit_theme_options',
    'panel'      => 'restaurant_culinary_theme_option_panel',
    )
);

$wp_customize->add_setting('restaurant_culinary_display_single_post_image',
    array(
        'default' => $restaurant_culinary_default['restaurant_culinary_display_single_post_image'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'restaurant_culinary_sanitize_checkbox',
    )
);
$wp_customize->add_control('restaurant_culinary_display_single_post_image',
    array(
        'label' => esc_html__('Enable Single Posts Image', 'restaurant-culinary'),
        'section' => 'restaurant_culinary_single_posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('restaurant_culinary_post_author',
    array(
        'default' => $restaurant_culinary_default['restaurant_culinary_post_author'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'restaurant_culinary_sanitize_checkbox',
    )
);
$wp_customize->add_control('restaurant_culinary_post_author',
    array(
        'label' => esc_html__('Enable Posts Author', 'restaurant-culinary'),
        'section' => 'restaurant_culinary_single_posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('restaurant_culinary_post_date',
    array(
        'default' => $restaurant_culinary_default['restaurant_culinary_post_date'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'restaurant_culinary_sanitize_checkbox',
    )
);
$wp_customize->add_control('restaurant_culinary_post_date',
    array(
        'label' => esc_html__('Enable Posts Date', 'restaurant-culinary'),
        'section' => 'restaurant_culinary_single_posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('restaurant_culinary_post_category',
    array(
        'default' => $restaurant_culinary_default['restaurant_culinary_post_category'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'restaurant_culinary_sanitize_checkbox',
    )
);
$wp_customize->add_control('restaurant_culinary_post_category',
    array(
        'label' => esc_html__('Enable Posts Category', 'restaurant-culinary'),
        'section' => 'restaurant_culinary_single_posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('restaurant_culinary_post_tags',
    array(
        'default' => $restaurant_culinary_default['restaurant_culinary_post_tags'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'restaurant_culinary_sanitize_checkbox',
    )
);
$wp_customize->add_control('restaurant_culinary_post_tags',
    array(
        'label' => esc_html__('Enable Posts Tags', 'restaurant-culinary'),
        'section' => 'restaurant_culinary_single_posts_settings',
        'type' => 'checkbox',
    )
);

// Archive Post Section.
$wp_customize->add_section( 'restaurant_culinary_posts_settings',
    array(
    'title'      => esc_html__( 'Archive Meta Information Settings', 'restaurant-culinary' ),
    'priority'   => 36,
    'capability' => 'edit_theme_options',
    'panel'      => 'restaurant_culinary_theme_option_panel',
    )
);

$wp_customize->add_setting('restaurant_culinary_display_archive_post_format_icon',
    array(
        'default' => $restaurant_culinary_default['restaurant_culinary_display_archive_post_format_icon'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'restaurant_culinary_sanitize_checkbox',
    )
);
$wp_customize->add_control('restaurant_culinary_display_archive_post_format_icon',
    array(
        'label' => esc_html__('Enable Post Format Icon', 'restaurant-culinary'),
        'section' => 'restaurant_culinary_posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('restaurant_culinary_display_archive_post_image',
    array(
        'default' => $restaurant_culinary_default['restaurant_culinary_display_archive_post_image'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'restaurant_culinary_sanitize_checkbox',
    )
);
$wp_customize->add_control('restaurant_culinary_display_archive_post_image',
    array(
        'label' => esc_html__('Enable Posts Image', 'restaurant-culinary'),
        'section' => 'restaurant_culinary_posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('restaurant_culinary_display_archive_post_category',
    array(
        'default' => $restaurant_culinary_default['restaurant_culinary_display_archive_post_category'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'restaurant_culinary_sanitize_checkbox',
    )
);
$wp_customize->add_control('restaurant_culinary_display_archive_post_category',
    array(
        'label' => esc_html__('Enable Posts Category', 'restaurant-culinary'),
        'section' => 'restaurant_culinary_posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('restaurant_culinary_display_archive_post_title',
    array(
        'default' => $restaurant_culinary_default['restaurant_culinary_display_archive_post_title'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'restaurant_culinary_sanitize_checkbox',
    )
);
$wp_customize->add_control('restaurant_culinary_display_archive_post_title',
    array(
        'label' => esc_html__('Enable Posts Title', 'restaurant-culinary'),
        'section' => 'restaurant_culinary_posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('restaurant_culinary_display_archive_post_content',
    array(
        'default' => $restaurant_culinary_default['restaurant_culinary_display_archive_post_content'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'restaurant_culinary_sanitize_checkbox',
    )
);
$wp_customize->add_control('restaurant_culinary_display_archive_post_content',
    array(
        'label' => esc_html__('Enable Posts Content', 'restaurant-culinary'),
        'section' => 'restaurant_culinary_posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('restaurant_culinary_display_archive_post_button',
    array(
        'default' => $restaurant_culinary_default['restaurant_culinary_display_archive_post_button'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'restaurant_culinary_sanitize_checkbox',
    )
);
$wp_customize->add_control('restaurant_culinary_display_archive_post_button',
    array(
        'label' => esc_html__('Enable Posts Button', 'restaurant-culinary'),
        'section' => 'restaurant_culinary_posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('restaurant_culinary_excerpt_limit',
    array(
        'default'           => $restaurant_culinary_default['restaurant_culinary_excerpt_limit'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'restaurant_culinary_sanitize_number_range',
    )
);
$wp_customize->add_control('restaurant_culinary_excerpt_limit',
    array(
        'label'       => esc_html__('Blog Post Excerpt limit', 'restaurant-culinary'),
        'section'     => 'restaurant_culinary_posts_settings',
        'type'        => 'number',
        'input_attrs' => array(
           'min'   => 1,
           'max'   => 45,
           'step'   => 1,
        ),
    )
);