<?php
/**
 * Restaurant Culinary Dynamic Styles
 *
 * @package Restaurant Culinary
 */

function restaurant_culinary_dynamic_css(){

    $restaurant_culinary_default = restaurant_culinary_get_default_theme_options();
    $restaurant_culinary_default_text_color = get_theme_mod('restaurant_culinary_default_text_color');
    $restaurant_culinary_logo_width_range = get_theme_mod('restaurant_culinary_logo_width_range', $restaurant_culinary_default['restaurant_culinary_logo_width_range']);
    $restaurant_culinary_breadcrumb_font_size = get_theme_mod('restaurant_culinary_breadcrumb_font_size', $restaurant_culinary_default['restaurant_culinary_breadcrumb_font_size']);
    $restaurant_culinary_menu_font_size = get_theme_mod('restaurant_culinary_menu_font_size', $restaurant_culinary_default['restaurant_culinary_menu_font_size']);
    $restaurant_culinary_border_color = get_theme_mod('restaurant_culinary_border_color');
    $background_color = get_theme_mod('background_color', $restaurant_culinary_default['restaurant_culinary_background_color']);
    $background_color = '#' . str_replace("#", "", $background_color);


    echo "<style type='text/css' media='all'>"; ?>

    body,
    .offcanvas-wraper,
    .header-searchbar-inner{
    background-color: <?php echo esc_attr($background_color); ?>;
    }

    a:not(:hover):not(:focus):not(.btn-fancy),
    body, button, input, select, optgroup, textarea{
    color: <?php echo esc_attr($restaurant_culinary_default_text_color); ?>;
    }

    .site-topbar,.site-navigation,
    .offcanvas-main-navigation li,
    .offcanvas-main-navigation .sub-menu,
    .offcanvas-main-navigation .submenu-wrapper .submenu-toggle,
    .post-navigation,
    .widget .tab-head .twp-nav-tabs,
    .widget-area-wrapper .widget,
    .footer-widgetarea,
    .site-info,
    .right-sidebar .widget-area-wrapper,
    .left-sidebar .widget-area-wrapper,
    .widget-title,
    .widget_block .wp-block-group > .wp-block-group__inner-container > h2,
    input[type="text"],
    input[type="password"],
    input[type="email"],
    input[type="url"],
    input[type="date"],
    input[type="month"],
    input[type="time"],
    input[type="datetime"],
    input[type="datetime-local"],
    input[type="week"],
    input[type="number"],
    input[type="search"],
    input[type="tel"],
    input[type="color"],
    textarea{
    border-color: <?php echo esc_attr($restaurant_culinary_border_color); ?>;
    }

    .site-logo .custom-logo-link{
    max-width:  <?php echo esc_attr($restaurant_culinary_logo_width_range); ?>px;
    }

    .site-navigation .primary-menu > li a{
    font-size:  <?php echo esc_attr($restaurant_culinary_menu_font_size); ?>px;
    }

    .breadcrumbs{
    font-size:  <?php echo esc_attr($restaurant_culinary_breadcrumb_font_size); ?>px;
    }

    <?php echo "</style>";
}

add_action('wp_head', 'restaurant_culinary_dynamic_css', 100);