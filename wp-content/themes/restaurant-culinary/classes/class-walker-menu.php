<?php
/**
 * Custom page walker for this theme.
 *
 * @package Restaurant Culinary
 */

if (!class_exists('Restaurant_Culinary_Walker_Page')) {
    /**
     * CUSTOM PAGE WALKER
     * A custom walker for pages.
     */
    class Restaurant_Culinary_Walker_Page extends Walker_Page
    {

        /**
         * Outputs the beginning of the current element in the tree.
         *
         * @param string $restaurant_culinary_output Used to append additional content. Passed by reference.
         * @param WP_Post $page Page data object.
         * @param int $restaurant_culinary_depth Optional. Depth of page. Used for padding. Default 0.
         * @param array $restaurant_culinary_args Optional. Array of arguments. Default empty array.
         * @param int $current_page Optional. Page ID. Default 0.
         * @since 2.1.0
         *
         * @see Walker::start_el()
         */

        public function start_lvl( &$restaurant_culinary_output, $restaurant_culinary_depth = 0, $restaurant_culinary_args = array() ) {
            $restaurant_culinary_indent  = str_repeat( "\t", $restaurant_culinary_depth );
            $restaurant_culinary_output .= "$restaurant_culinary_indent<ul class='sub-menu'>\n";
        }

        public function start_el(&$restaurant_culinary_output, $page, $restaurant_culinary_depth = 0, $restaurant_culinary_args = array(), $current_page = 0)
        {

            if (isset($restaurant_culinary_args['item_spacing']) && 'preserve' === $restaurant_culinary_args['item_spacing']) {
                $t = "\t";
                $n = "\n";
            } else {
                $t = '';
                $n = '';
            }
            if ($restaurant_culinary_depth) {
                $restaurant_culinary_indent = str_repeat($t, $restaurant_culinary_depth);
            } else {
                $restaurant_culinary_indent = '';
            }

            $restaurant_culinary_css_class = array('page_item', 'page-item-' . $page->ID);

            if (isset($restaurant_culinary_args['pages_with_children'][$page->ID])) {
                $restaurant_culinary_css_class[] = 'page_item_has_children';
            }

            if (!empty($current_page)) {
                $_current_page = get_post($current_page);
                if ($_current_page && in_array($page->ID, $_current_page->ancestors, true)) {
                    $restaurant_culinary_css_class[] = 'current_page_ancestor';
                }
                if ($page->ID === $current_page) {
                    $restaurant_culinary_css_class[] = 'current_page_item';
                } elseif ($_current_page && $page->ID === $_current_page->post_parent) {
                    $restaurant_culinary_css_class[] = 'current_page_parent';
                }
            } elseif (get_option('page_for_posts') === $page->ID) {
                $restaurant_culinary_css_class[] = 'current_page_parent';
            }

            /** This filter is documented in wp-includes/class-walker-page.php */
            $restaurant_culinary_css_classes = implode(' ', apply_filters('page_css_class', $restaurant_culinary_css_class, $page, $restaurant_culinary_depth, $restaurant_culinary_args, $current_page));
            $restaurant_culinary_css_classes = $restaurant_culinary_css_classes ? ' class="' . esc_attr($restaurant_culinary_css_classes) . '"' : '';

            if ('' === $page->post_title) {
                /* translators: %d: ID of a post. */
                $page->post_title = sprintf(__('#%d (no title)', 'restaurant-culinary'), $page->ID);
            }

            $restaurant_culinary_args['link_before'] = empty($restaurant_culinary_args['link_before']) ? '' : $restaurant_culinary_args['link_before'];
            $restaurant_culinary_args['link_after'] = empty($restaurant_culinary_args['link_after']) ? '' : $restaurant_culinary_args['link_after'];

            $restaurant_culinary_atts = array();
            $restaurant_culinary_atts['href'] = get_permalink($page->ID);
            $restaurant_culinary_atts['aria-current'] = ($page->ID === $current_page) ? 'page' : '';

            /** This filter is documented in wp-includes/class-walker-page.php */
            $restaurant_culinary_atts = apply_filters('page_menu_link_attributes', $restaurant_culinary_atts, $page, $restaurant_culinary_depth, $restaurant_culinary_args, $current_page);

            $restaurant_culinary_attributes = '';
            foreach ($restaurant_culinary_atts as $attr => $restaurant_culinary_value) {
                if (!empty($restaurant_culinary_value)) {
                    $restaurant_culinary_value = ('href' === $attr) ? esc_url($restaurant_culinary_value) : esc_attr($restaurant_culinary_value);
                    $restaurant_culinary_attributes .= ' ' . $attr . '="' . $restaurant_culinary_value . '"';
                }
            }

            $restaurant_culinary_args['list_item_before'] = '';
            $restaurant_culinary_args['list_item_after'] = '';
            $restaurant_culinary_args['icon_rennder'] = '';
            // Wrap the link in a div and append a sub menu toggle.
            if (isset($restaurant_culinary_args['show_toggles']) && true === $restaurant_culinary_args['show_toggles']) {
                // Wrap the menu item link contents in a div, used for positioning.
                $restaurant_culinary_args['list_item_after'] = '';
            }


            // Add icons to menu items with children.
            if (isset($restaurant_culinary_args['show_sub_menu_icons']) && true === $restaurant_culinary_args['show_sub_menu_icons']) {
                if (isset($restaurant_culinary_args['pages_with_children'][$page->ID])) {
                    $restaurant_culinary_args['icon_rennder'] = '';
                }
            }

            // Add icons to menu items with children.
            if (isset($restaurant_culinary_args['show_toggles']) && true === $restaurant_culinary_args['show_toggles']) {
                if (isset($restaurant_culinary_args['pages_with_children'][$page->ID])) {

                    $toggle_target_string = '.page_item.page-item-' . $page->ID . ' > .sub-menu';

                    $restaurant_culinary_args['list_item_after'] = '<button type="button" class="theme-aria-button submenu-toggle" data-toggle-target="' . $toggle_target_string . '" data-toggle-type="slidetoggle" data-toggle-duration="250"><span class="btn__content" tabindex="-1"><span class="screen-reader-text">' . __( 'Show sub menu', 'restaurant-culinary' ) . '</span>' . restaurant_culinary_get_theme_svg( 'chevron-down' ) . '</span></button>';
                }
            }

            if (isset($restaurant_culinary_args['show_toggles']) && true === $restaurant_culinary_args['show_toggles']) {

                $restaurant_culinary_output .= $restaurant_culinary_indent . sprintf(
                        '<li%s>%s%s<a%s>%s%s%s</a>%s%s',
                        $restaurant_culinary_css_classes,
                        '<div class="submenu-wrapper">',
                        $restaurant_culinary_args['list_item_before'],
                        $restaurant_culinary_attributes,
                        $restaurant_culinary_args['link_before'],
                        /** This filter is documented in wp-includes/post-template.php */
                        apply_filters('the_title', $page->post_title, $page->ID),
                        $restaurant_culinary_args['link_after'],
                        $restaurant_culinary_args['list_item_after'],
                        '</div>'
                    );

            }else{

                $restaurant_culinary_output .= $restaurant_culinary_indent . sprintf(
                        '<li%s>%s<a%s>%s%s%s%s</a>%s',
                        $restaurant_culinary_css_classes,
                        $restaurant_culinary_args['list_item_before'],
                        $restaurant_culinary_attributes,
                        $restaurant_culinary_args['link_before'],
                        /** This filter is documented in wp-includes/post-template.php */
                        apply_filters('the_title', $page->post_title, $page->ID),
                        $restaurant_culinary_args['icon_rennder'],
                        $restaurant_culinary_args['link_after'],
                        $restaurant_culinary_args['list_item_after']
                    );

            }

            if (!empty($restaurant_culinary_args['show_date'])) {
                if ('modified' === $restaurant_culinary_args['show_date']) {
                    $restaurant_culinary_time = $page->post_modified;
                } else {
                    $restaurant_culinary_time = $page->post_date;
                }

                $restaurant_culinary_date_format = empty($restaurant_culinary_args['date_format']) ? '' : $restaurant_culinary_args['date_format'];
                $restaurant_culinary_output .= ' ' . mysql2date($restaurant_culinary_date_format, $restaurant_culinary_time);
            }
        }
    }
}