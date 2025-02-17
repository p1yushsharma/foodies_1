<?php
/**
* Body Classes.
* @package Restaurant Culinary
*/
 
 if (!function_exists('restaurant_culinary_body_classes')) :

    function restaurant_culinary_body_classes($restaurant_culinary_classes) {
        $restaurant_culinary_default = restaurant_culinary_get_default_theme_options();
        global $post;
    
        // Adds a class of hfeed to non-singular pages.
        if (!is_singular()) {
            $restaurant_culinary_classes[] = 'hfeed';
        }
    
        // Adds a class of no-sidebar when there is no sidebar present.
        if (!is_active_sidebar('sidebar-1')) {
            $restaurant_culinary_classes[] = 'no-sidebar';
        }
    
        $restaurant_culinary_global_sidebar_layout = esc_html(get_theme_mod('restaurant_culinary_global_sidebar_layout', $restaurant_culinary_default['restaurant_culinary_global_sidebar_layout']));
        $restaurant_culinary_page_sidebar_layout = esc_html(get_theme_mod('restaurant_culinary_page_sidebar_layout', $restaurant_culinary_global_sidebar_layout));
        $restaurant_culinary_post_sidebar_layout = esc_html(get_theme_mod('restaurant_culinary_post_sidebar_layout', $restaurant_culinary_global_sidebar_layout));
    
        if (is_page() || (function_exists('is_shop') && is_shop())) {
            $restaurant_culinary_classes[] = $restaurant_culinary_page_sidebar_layout;
        } elseif (is_single()) {
            $restaurant_culinary_classes[] = $restaurant_culinary_post_sidebar_layout;
        } else {
            $restaurant_culinary_classes[] = $restaurant_culinary_global_sidebar_layout;
        }
    
        return $restaurant_culinary_classes;
    }
    
endif;

add_filter('body_class', 'restaurant_culinary_body_classes');