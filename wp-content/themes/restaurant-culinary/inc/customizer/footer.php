<?php
/**
* Footer Settings.
*
* @package Restaurant Culinary
*/

$restaurant_culinary_default = restaurant_culinary_get_default_theme_options();

$wp_customize->add_section( 'restaurant_culinary_footer_widget_area',
	array(
	'title'      => esc_html__( 'Footer Settings', 'restaurant-culinary' ),
	'priority'   => 200,
	'capability' => 'edit_theme_options',
	'panel'      => 'restaurant_culinary_theme_option_panel',
	)
);

$wp_customize->add_setting('restaurant_culinary_display_footer',
    array(
	    'default' => $restaurant_culinary_default['restaurant_culinary_display_footer'],
	    'capability' => 'edit_theme_options',
	    'sanitize_callback' => 'restaurant_culinary_sanitize_checkbox',
	)
);
$wp_customize->add_control('restaurant_culinary_display_footer',
    array(
        'label' => esc_html__('Enable Footer', 'restaurant-culinary'),
        'section' => 'restaurant_culinary_footer_widget_area',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting( 'restaurant_culinary_footer_column_layout',
	array(
	'default'           => $restaurant_culinary_default['restaurant_culinary_footer_column_layout'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'restaurant_culinary_sanitize_select',
	)
);
$wp_customize->add_control( 'restaurant_culinary_footer_column_layout',
	array(
	'label'       => esc_html__( 'Footer Column Layout', 'restaurant-culinary' ),
	'section'     => 'restaurant_culinary_footer_widget_area',
	'type'        => 'select',
	'choices'               => array(
		'1' => esc_html__( 'One Column', 'restaurant-culinary' ),
		'2' => esc_html__( 'Two Column', 'restaurant-culinary' ),
		'3' => esc_html__( 'Three Column', 'restaurant-culinary' ),
	    ),
	)
);

$wp_customize->add_setting( 'restaurant_culinary_footer_widget_title_alignment',
        array(
    'default'           => $restaurant_culinary_default['restaurant_culinary_footer_widget_title_alignment'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'restaurant_culinary_sanitize_footer_widget_title_alignment',
    )
);
$wp_customize->add_control( 'restaurant_culinary_footer_widget_title_alignment',
    array(
    'label'       => esc_html__( 'Footer Widget Title Alignment', 'restaurant-culinary' ),
    'section'     => 'restaurant_culinary_footer_widget_area',
    'type'        => 'select',
    'choices'     => array(
        'left' => esc_html__( 'Left', 'restaurant-culinary' ),
        'center'  => esc_html__( 'Center', 'restaurant-culinary' ),
        'right'    => esc_html__( 'Right', 'restaurant-culinary' ),
        ),
    )
);

$wp_customize->add_setting( 'restaurant_culinary_footer_copyright_text',
	array(
	'default'           => $restaurant_culinary_default['restaurant_culinary_footer_copyright_text'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'restaurant_culinary_footer_copyright_text',
	array(
	'label'    => esc_html__( 'Footer Copyright Text', 'restaurant-culinary' ),
	'section'  => 'restaurant_culinary_footer_widget_area',
	'type'     => 'text',
	)
);

$wp_customize->add_setting('restaurant_culinary_copyright_font_size',
    array(
        'default'           => $restaurant_culinary_default['restaurant_culinary_copyright_font_size'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'restaurant_culinary_sanitize_number_range',
    )
);
$wp_customize->add_control('restaurant_culinary_copyright_font_size',
    array(
        'label'       => esc_html__('Copyright Font Size', 'restaurant-culinary'),
        'section'     => 'restaurant_culinary_footer_widget_area',
        'type'        => 'number',
        'input_attrs' => array(
           'min'   => 5,
           'max'   => 30,
           'step'   => 1,
    	),
    )
);

$wp_customize->add_setting('restaurant_culinary_copyright_font_size',
    array(
        'default'           => $restaurant_culinary_default['restaurant_culinary_copyright_font_size'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'restaurant_culinary_sanitize_number_range',
    )
);
$wp_customize->add_control('restaurant_culinary_copyright_font_size',
    array(
        'label'       => esc_html__('Copyright Font Size', 'restaurant-culinary'),
        'section'     => 'restaurant_culinary_footer_widget_area',
        'type'        => 'number',
        'input_attrs' => array(
           'min'   => 5,
           'max'   => 30,
           'step'   => 1,
    	),
    )
);

$wp_customize->add_setting( 'footer_widget_background_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
));
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_widget_background_color', array(
    'label'     => __('Footer Widget Background Color', 'restaurant-culinary'),
    'description' => __('It will change the complete footer widget background color.', 'restaurant-culinary'),
    'section' => 'restaurant_culinary_footer_widget_area',
    'settings' => 'footer_widget_background_color',
)));

$wp_customize->add_setting('footer_widget_background_image',array(
    'default'   => '',
    'sanitize_callback' => 'esc_url_raw',
));
$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'footer_widget_background_image',array(
    'label' => __('Footer Widget Background Image','restaurant-culinary'),
    'section' => 'restaurant_culinary_footer_widget_area'
)));

$wp_customize->add_setting('restaurant_culinary_enable_to_the_top',
    array(
        'default' => $restaurant_culinary_default['restaurant_culinary_enable_to_the_top'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'restaurant_culinary_sanitize_checkbox',
    )
);
$wp_customize->add_control('restaurant_culinary_enable_to_the_top',
    array(
        'label' => esc_html__('Enable To The Top', 'restaurant-culinary'),
        'section' => 'restaurant_culinary_footer_widget_area',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting( 'restaurant_culinary_to_the_top_text',
    array(
    'default'           => $restaurant_culinary_default['restaurant_culinary_to_the_top_text'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'restaurant_culinary_to_the_top_text',
    array(
    'label'    => esc_html__( 'To The Top Text', 'restaurant-culinary' ),
    'section'  => 'restaurant_culinary_footer_widget_area',
    'type'     => 'text',
    )
);