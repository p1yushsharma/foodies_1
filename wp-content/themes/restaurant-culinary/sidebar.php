<?php
/**
 * The sidebar containing the main widget area
 * @package Restaurant Culinary
 */

$restaurant_culinary_default = restaurant_culinary_get_default_theme_options();
$post_id = get_the_ID(); // Get the post ID.

if ( is_page() || ( function_exists('is_shop') && is_shop() ) ) {
    $restaurant_culinary_global_sidebar_layout = esc_html( get_theme_mod( 'restaurant_culinary_page_sidebar_layout', $restaurant_culinary_default['restaurant_culinary_global_sidebar_layout'] ) );
} elseif ( is_single() ) {
    $restaurant_culinary_global_sidebar_layout = esc_html( get_theme_mod( 'restaurant_culinary_post_sidebar_layout', $restaurant_culinary_default['restaurant_culinary_global_sidebar_layout'] ) );
} else {
    $restaurant_culinary_global_sidebar_layout = esc_html( get_theme_mod( 'restaurant_culinary_global_sidebar_layout', $restaurant_culinary_default['restaurant_culinary_global_sidebar_layout'] ) );
}

// Hide the sidebar if 'no-sidebar' is selected.
if ( !is_active_sidebar('sidebar-1') || $restaurant_culinary_global_sidebar_layout === 'no-sidebar' ) {
    return;
}

$restaurant_culinary_sidebar_column_class = $restaurant_culinary_global_sidebar_layout === 'left-sidebar' ? 'column-order-1' : 'column-order-2';
?>

<aside id="secondary" class="widget-area <?php echo esc_attr( $restaurant_culinary_sidebar_column_class ); ?>">
    <div class="widget-area-wrapper">
        <?php dynamic_sidebar( 'sidebar-1' ); ?>
    </div>
</aside>