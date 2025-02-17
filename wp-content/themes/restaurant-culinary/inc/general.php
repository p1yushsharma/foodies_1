<?php

function restaurant_culinary_enqueue_fonts() {
    $restaurant_culinary_default_font_content = 'Lato';
    $restaurant_culinary_default_font_heading = 'Lato';

    $restaurant_culinary_font_content = esc_attr(get_theme_mod('restaurant_culinary_content_typography_font', $restaurant_culinary_default_font_content));
    $restaurant_culinary_font_heading = esc_attr(get_theme_mod('restaurant_culinary_heading_typography_font', $restaurant_culinary_default_font_heading));

    $restaurant_culinary_css = '';

    // Always enqueue main font
    $restaurant_culinary_css .= '
    :root {
        --font-main: ' . $restaurant_culinary_font_content . ', ' . (in_array($restaurant_culinary_font_content, ['bitter', 'charis-sil']) ? 'serif' : 'sans-serif') . '!important;
    }';
    wp_enqueue_style('restaurant-culinary-style-font-general', get_template_directory_uri() . '/fonts/' . $restaurant_culinary_font_content . '/font.css');

    // Always enqueue header font
    $restaurant_culinary_css .= '
    :root {
        --font-head: ' . $restaurant_culinary_font_heading . ', ' . (in_array($restaurant_culinary_font_heading, ['bitter', 'charis-sil']) ? 'serif' : 'sans-serif') . '!important;
    }';
    wp_enqueue_style('restaurant-culinary-style-font-h', get_template_directory_uri() . '/fonts/' . $restaurant_culinary_font_heading . '/font.css');

    // Add inline style
    wp_add_inline_style('restaurant-culinary-style-font-general', $restaurant_culinary_css);
}
add_action('wp_enqueue_scripts', 'restaurant_culinary_enqueue_fonts', 50);