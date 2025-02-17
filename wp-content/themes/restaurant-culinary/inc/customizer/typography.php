<?php
/**
* Typography Settings.
*
* @package Restaurant Culinary
*/

$restaurant_culinary_default = restaurant_culinary_get_default_theme_options();

// Layout Section.
$wp_customize->add_section( 'restaurant_culinary_typography_setting',
	array(
	'title'      => esc_html__( 'Typography Settings', 'restaurant-culinary' ),
	'priority'   => 21,
	'capability' => 'edit_theme_options',
	'panel'      => 'restaurant_culinary_theme_option_panel',
	)
);

// -----------------  Font array
$restaurant_culinary_fonts = array(
    'bad-script' => 'Bad Script',
    'bitter'     => 'Bitter',
    'charis-sil' => 'Charis SIL',
    'cuprum'     => 'Cuprum',
    'exo-2'      => 'Exo 2',
    'jost'       => 'Jost',
    'open-sans'  => 'Open Sans',
    'oswald'     => 'Oswald',
    'play'       => 'Play',
    'roboto'     => 'Roboto',
    'outfit'     => 'Outfit',
    'ubuntu'     => 'Ubuntu',
    'Lato'     => 'Lato',
);

 // -----------------  General text font
 $wp_customize->add_setting( 'restaurant_culinary_content_typography_font', array(
    'default'           => 'roboto',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'restaurant_culinary_radio_sanitize',
) );
$wp_customize->add_control( 'restaurant_culinary_content_typography_font', array(
    'type'     => 'select',
    'label'    => esc_html__( 'General Content font', 'restaurant-culinary' ),
    'section'  => 'restaurant_culinary_typography_setting',
    'settings' => 'restaurant_culinary_content_typography_font',
    'choices'  => $restaurant_culinary_fonts,
) );

 // -----------------  General Heading font
$wp_customize->add_setting( 'restaurant_culinary_heading_typography_font', array(
    'default'           => 'outfit',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'restaurant_culinary_radio_sanitize',
) );
$wp_customize->add_control( 'restaurant_culinary_heading_typography_font', array(
    'type'     => 'select',
    'label'    => esc_html__( 'General heading font', 'restaurant-culinary' ),
    'section'  => 'restaurant_culinary_typography_setting',
    'settings' => 'restaurant_culinary_heading_typography_font',
    'choices'  => $restaurant_culinary_fonts,
) );