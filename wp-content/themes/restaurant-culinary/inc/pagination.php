<?php
/**
 *
 * Pagination Functions
 *
 * @package Restaurant Culinary
 */

/**
 * Pagination for archive.
 */
function restaurant_culinary_render_posts_pagination() {
    // Get the setting to check if pagination is enabled
    $restaurant_culinary_is_pagination_enabled = get_theme_mod( 'restaurant_culinary_enable_pagination', true );

    // Check if pagination is enabled
    if ( $restaurant_culinary_is_pagination_enabled ) {
        // Get the selected pagination type from the Customizer
        $restaurant_culinary_pagination_type = get_theme_mod( 'restaurant_culinary_theme_pagination_type', 'numeric' );

        // Check if the pagination type is "newer_older" (Previous/Next) or "numeric"
        if ( 'newer_older' === $restaurant_culinary_pagination_type ) :
            // Display "Newer/Older" pagination (Previous/Next navigation)
            the_posts_navigation(
                array(
                    'prev_text' => __( '&laquo; Newer', 'restaurant-culinary' ),  // Change the label for "previous"
                    'next_text' => __( 'Older &raquo;', 'restaurant-culinary' ),  // Change the label for "next"
                    'screen_reader_text' => __( 'Posts navigation', 'restaurant-culinary' ),
                )
            );
        else :
            // Display numeric pagination (Page numbers)
            the_posts_pagination(
                array(
                    'prev_text' => __( '&laquo; Previous', 'restaurant-culinary' ),
                    'next_text' => __( 'Next &raquo;', 'restaurant-culinary' ),
                    'type'      => 'list', // Display as <ul> <li> tags
                    'screen_reader_text' => __( 'Posts navigation', 'restaurant-culinary' ),
                )
            );
        endif;
    }
}
add_action( 'restaurant_culinary_posts_pagination', 'restaurant_culinary_render_posts_pagination', 10 );