<?php
/**
 * Sample implementation of the Custom Header feature
 * @package Restaurant Culinary
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses restaurant_culinary_header_style()
 */
function restaurant_culinary_custom_header_setup()
{
    add_theme_support('custom-header',
        apply_filters('restaurant_culinary_custom_header_args', array(
            'default-image' => '',
            'default-text-color' => '000000',
            'width' => 1920,
            'height' => 400,
            'flex-height' => true,
            'flex-width' => true,
            'wp-head-callback' => 'restaurant_culinary_header_style',
        )));
}

add_action('after_setup_theme', 'restaurant_culinary_custom_header_setup');

if (!function_exists('restaurant_culinary_header_style')) :
    /**
     * Styles the header image and text displayed on the blog
     *
     * @see restaurant_culinary_custom_header_setup().
     */
    function restaurant_culinary_header_style()
    {
        $restaurant_culinary_header_text_color = get_header_textcolor();

        if (get_theme_support('custom-header', 'default-text-color') === $restaurant_culinary_header_text_color) {
            return;
        }

        ?>
        <style type="text/css">
            <?php
                if ( 'blank' == $restaurant_culinary_header_text_color ) :
            ?>
            .header-titles .custom-logo-name,
            .site-description {
                display: none;
                position: absolute;
                clip: rect(1px, 1px, 1px, 1px);
            }

            <?php
                else :
            ?>
            .header-titles .custom-logo-name:not(:hover):not(:focus),
            .site-description {
                color: #<?php echo esc_attr( $restaurant_culinary_header_text_color ); ?>;
            }

            <?php endif; ?>
        </style>
        <?php
    }
endif;