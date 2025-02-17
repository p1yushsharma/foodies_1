<?php
/**
* Header Banner Options.
*
* @package Restaurant Culinary
*/

$restaurant_culinary_default = restaurant_culinary_get_default_theme_options();
$restaurant_culinary_post_category_list = restaurant_culinary_post_category_list();

$wp_customize->add_section( 'restaurant_culinary_header_slider_setting',
    array(
    'title'      => esc_html__( 'Slider Settings', 'restaurant-culinary' ),
    'priority'   => 10,
    'capability' => 'edit_theme_options',
    'panel'      => 'restaurant_culinary_theme_home_pannel',
    )
);

$wp_customize->add_setting('restaurant_culinary_display_header_text',
    array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'restaurant_culinary_sanitize_checkbox',
    )
);
$wp_customize->add_control('restaurant_culinary_display_header_text',
    array(
        'label' => esc_html__('Enable / Disable Tagline', 'restaurant-culinary'),
        'section' => 'title_tagline',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('restaurant_culinary_header_slider',
    array(
        'default' => $restaurant_culinary_default['restaurant_culinary_header_slider'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'restaurant_culinary_sanitize_checkbox',
    )
);
$wp_customize->add_control('restaurant_culinary_header_slider',
    array(
        'label' => esc_html__('Enable Slider', 'restaurant-culinary'),
        'section' => 'restaurant_culinary_header_slider_setting',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting( 'restaurant_culinary_slider_section_small_title',
    array(
    'default'           => $restaurant_culinary_default['restaurant_culinary_slider_section_small_title'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'restaurant_culinary_slider_section_small_title',
    array(
    'label'    => esc_html__( 'Slider Sub Title', 'restaurant-culinary' ),
    'section'  => 'restaurant_culinary_header_slider_setting',
    'type'     => 'text',
    )
);

$wp_customize->add_setting( 'restaurant_culinary_slider_section_sub_title',
    array(
    'default'           => $restaurant_culinary_default['restaurant_culinary_slider_section_sub_title'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'restaurant_culinary_slider_section_sub_title',
    array(
    'label'    => esc_html__( 'Slider Title', 'restaurant-culinary' ),
    'section'  => 'restaurant_culinary_header_slider_setting',
    'type'     => 'text',
    )
);

$wp_customize->add_setting( 'restaurant_culinary_slider_section_content',
    array(
    'default'           => $restaurant_culinary_default['restaurant_culinary_slider_section_content'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'restaurant_culinary_slider_section_content',
    array(
    'label'    => esc_html__( 'Slider Content', 'restaurant-culinary' ),
    'section'  => 'restaurant_culinary_header_slider_setting',
    'type'     => 'text',
    )
);

$wp_customize->add_setting( 'restaurant_culinary_slider_section_button',
    array(
    'default'           => $restaurant_culinary_default['restaurant_culinary_slider_section_button'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'restaurant_culinary_slider_section_button',
    array(
    'label'    => esc_html__( 'Slider Button Url', 'restaurant-culinary' ),
    'section'  => 'restaurant_culinary_header_slider_setting',
    'type'     => 'text',
    )
);

$wp_customize->add_setting( 'restaurant_culinary_slider_section_button_url',
    array(
    'default'           => $restaurant_culinary_default['restaurant_culinary_slider_section_button_url'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'restaurant_culinary_slider_section_button_url',
    array(
    'label'    => esc_html__( 'Slider Button Url', 'restaurant-culinary' ),
    'section'  => 'restaurant_culinary_header_slider_setting',
    'type'     => 'url',
    )
);

$wp_customize->add_setting('restaurant_culinary_banner_right_image_1',
    array(
        'default'           => $restaurant_culinary_default['restaurant_culinary_banner_right_image_1'],
        'sanitize_callback' => 'esc_url_raw',
    )
);
$wp_customize->add_control(
    new WP_Customize_Image_Control( $wp_customize,'restaurant_culinary_banner_right_image_1',
        array(
            'label' => __('Slider Right Image 1','restaurant-culinary'),
            'section' => 'restaurant_culinary_header_slider_setting',
            'settings' => 'restaurant_culinary_banner_right_image_1',
        )
    )
);

$wp_customize->add_setting('restaurant_culinary_banner_right_image_2',
    array(
        'default'           => $restaurant_culinary_default['restaurant_culinary_banner_right_image_2'],
        'sanitize_callback' => 'esc_url_raw',
    )
);
$wp_customize->add_control(
    new WP_Customize_Image_Control( $wp_customize,'restaurant_culinary_banner_right_image_2',
        array(
            'label' => __('Slider Right Image 2','restaurant-culinary'),
            'section' => 'restaurant_culinary_header_slider_setting',
            'settings' => 'restaurant_culinary_banner_right_image_2',
        )
    )
);

$wp_customize->add_setting('restaurant_culinary_banner_right_image_3',
    array(
        'default'           => $restaurant_culinary_default['restaurant_culinary_banner_right_image_3'],
        'sanitize_callback' => 'esc_url_raw',
    )
);
$wp_customize->add_control(
    new WP_Customize_Image_Control( $wp_customize,'restaurant_culinary_banner_right_image_3',
        array(
            'label' => __('Slider Right Image 3','restaurant-culinary'),
            'section' => 'restaurant_culinary_header_slider_setting',
            'settings' => 'restaurant_culinary_banner_right_image_3',
        )
    )
);


// About Us Settings

$wp_customize->add_section( 'restaurant_culinary_about_us_setting',
    array(
    'title'      => esc_html__( 'About Us Settings', 'restaurant-culinary' ),
    'priority'   => 10,
    'capability' => 'edit_theme_options',
    'panel'      => 'restaurant_culinary_theme_home_pannel',
    )
);

$wp_customize->add_setting('restaurant_culinary_header_about_us',
    array(
        'default' => $restaurant_culinary_default['restaurant_culinary_header_about_us'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'restaurant_culinary_sanitize_checkbox',
    )
);
$wp_customize->add_control('restaurant_culinary_header_about_us',
    array(
        'label' => esc_html__('Enable About Us', 'restaurant-culinary'),
        'section' => 'restaurant_culinary_about_us_setting',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting( 'restaurant_culinary_about_us_section_title',
    array(
    'default'           => $restaurant_culinary_default['restaurant_culinary_about_us_section_title'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'restaurant_culinary_about_us_section_title',
    array(
    'label'    => esc_html__( 'About Us Short Title', 'restaurant-culinary' ),
    'section'  => 'restaurant_culinary_about_us_setting',
    'type'     => 'text',
    )
);

$wp_customize->add_setting( 'restaurant_culinary_about_us_section_sub_title',
    array(
    'default'           => $restaurant_culinary_default['restaurant_culinary_about_us_section_sub_title'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'restaurant_culinary_about_us_section_sub_title',
    array(
    'label'    => esc_html__( 'About Us Heading', 'restaurant-culinary' ),
    'section'  => 'restaurant_culinary_about_us_setting',
    'type'     => 'text',
    )
);

$wp_customize->add_setting( 'restaurant_culinary_about_us_section_content',
    array(
    'default'           => $restaurant_culinary_default['restaurant_culinary_about_us_section_content'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'restaurant_culinary_about_us_section_content',
    array(
    'label'    => esc_html__( 'About Us Content 1', 'restaurant-culinary' ),
    'section'  => 'restaurant_culinary_about_us_setting',
    'type'     => 'text',
    )
);

$wp_customize->add_setting( 'restaurant_culinary_about_section_button',
    array(
    'default'           => $restaurant_culinary_default['restaurant_culinary_about_section_button'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'restaurant_culinary_about_section_button',
    array(
    'label'    => esc_html__( 'About Us Button Text', 'restaurant-culinary' ),
    'section'  => 'restaurant_culinary_about_us_setting',
    'type'     => 'text',
    )
);

$wp_customize->add_setting( 'restaurant_culinary_about_section_button_url',
    array(
    'default'           => $restaurant_culinary_default['restaurant_culinary_about_section_button_url'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'restaurant_culinary_about_section_button_url',
    array(
    'label'    => esc_html__( 'About Us Button Url', 'restaurant-culinary' ),
    'section'  => 'restaurant_culinary_about_us_setting',
    'type'     => 'text',
    )
);

$wp_customize->add_setting('restaurant_culinary_about_us_right_image_1',
    array(
        'default'           => $restaurant_culinary_default['restaurant_culinary_about_us_right_image_1'],
        'sanitize_callback' => 'esc_url_raw',
    )
);
$wp_customize->add_control(
    new WP_Customize_Image_Control( $wp_customize,'restaurant_culinary_about_us_right_image_1',
        array(
            'label' => __('About Us Right Image 1','restaurant-culinary'),
            'section' => 'restaurant_culinary_about_us_setting',
            'settings' => 'restaurant_culinary_about_us_right_image_1',
        )
    )
);

$wp_customize->add_setting('restaurant_culinary_about_us_right_image_2',
    array(
        'default'           => $restaurant_culinary_default['restaurant_culinary_about_us_right_image_2'],
        'sanitize_callback' => 'esc_url_raw',
    )
);
$wp_customize->add_control(
    new WP_Customize_Image_Control( $wp_customize,'restaurant_culinary_about_us_right_image_2',
        array(
            'label' => __('About Us Right Image 2','restaurant-culinary'),
            'section' => 'restaurant_culinary_about_us_setting',
            'settings' => 'restaurant_culinary_about_us_right_image_2',
        )
    )
);

$wp_customize->add_setting('restaurant_culinary_about_us_right_image_3',
    array(
        'default'           => $restaurant_culinary_default['restaurant_culinary_about_us_right_image_3'],
        'sanitize_callback' => 'esc_url_raw',
    )
);
$wp_customize->add_control(
    new WP_Customize_Image_Control( $wp_customize,'restaurant_culinary_about_us_right_image_3',
        array(
            'label' => __('About Us Right Image 2','restaurant-culinary'),
            'section' => 'restaurant_culinary_about_us_setting',
            'settings' => 'restaurant_culinary_about_us_right_image_3',
        )
    )
);