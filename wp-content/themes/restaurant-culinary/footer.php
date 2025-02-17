<?php
/**
 * The template for displaying the footer
 * @package Restaurant Culinary
 * @since 1.0.0
 */

/**
 * Toogle Contents
 * @hooked restaurant_culinary_content_offcanvas - 30
*/

do_action('restaurant_culinary_before_footer_content_action'); ?>

</div>

<footer id="site-footer" role="contentinfo">

    <?php
    /**
     * Footer Content
     * @hooked restaurant_culinary_footer_content_widget - 10
     * @hooked restaurant_culinary_footer_content_info - 20
    */

    do_action('restaurant_culinary_footer_content_action'); ?>

</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>