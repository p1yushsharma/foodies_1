<?php
/**
 * Custom Functions
 * @package Restaurant Culinary
 * @since 1.0.0
 */

if( !function_exists('restaurant_culinary_site_logo') ):

    /**
     * Logo & Description
     */
    /**
     * Displays the site logo, either text or image.
     *
     * @param array $restaurant_culinary_args Arguments for displaying the site logo either as an image or text.
     * @param boolean $restaurant_culinary_echo Echo or return the HTML.
     *
     * @return string $restaurant_culinary_html Compiled HTML based on our arguments.
     */
    function restaurant_culinary_site_logo( $restaurant_culinary_args = array(), $restaurant_culinary_echo = true ){
        $restaurant_culinary_logo = get_custom_logo();
        $restaurant_culinary_site_title = get_bloginfo('name');
        $restaurant_culinary_contents = '';
        $restaurant_culinary_classname = '';
        $restaurant_culinary_defaults = array(
            'logo' => '%1$s<span class="screen-reader-text">%2$s</span>',
            'logo_class' => 'site-logo site-branding',
            'title' => '<a href="%1$s" class="custom-logo-name">%2$s</a>',
            'title_class' => 'site-title',
            'home_wrap' => '<h1 class="%1$s">%2$s</h1>',
            'single_wrap' => '<div class="%1$s">%2$s</div>',
            'condition' => (is_front_page() || is_home()) && !is_page(),
        );
        $restaurant_culinary_args = wp_parse_args($restaurant_culinary_args, $restaurant_culinary_defaults);
        /**
         * Filters the arguments for `restaurant_culinary_site_logo()`.
         *
         * @param array $restaurant_culinary_args Parsed arguments.
         * @param array $restaurant_culinary_defaults Function's default arguments.
         */
        $restaurant_culinary_args = apply_filters('restaurant_culinary_site_logo_args', $restaurant_culinary_args, $restaurant_culinary_defaults);
        if ( has_custom_logo() ) {
            $restaurant_culinary_contents = sprintf($restaurant_culinary_args['logo'], $restaurant_culinary_logo, esc_html($restaurant_culinary_site_title));
            $restaurant_culinary_contents .= sprintf($restaurant_culinary_args['title'], esc_url( get_home_url(null, '/') ), esc_html($restaurant_culinary_site_title));
            $restaurant_culinary_classname = $restaurant_culinary_args['logo_class'];
        } else {
            $restaurant_culinary_contents = sprintf($restaurant_culinary_args['title'], esc_url( get_home_url(null, '/') ), esc_html($restaurant_culinary_site_title));
            $restaurant_culinary_classname = $restaurant_culinary_args['title_class'];
        }
        $restaurant_culinary_wrap = $restaurant_culinary_args['condition'] ? 'home_wrap' : 'single_wrap';
        // $restaurant_culinary_wrap = 'home_wrap';
        $restaurant_culinary_html = sprintf($restaurant_culinary_args[$restaurant_culinary_wrap], $restaurant_culinary_classname, $restaurant_culinary_contents);
        /**
         * Filters the arguments for `restaurant_culinary_site_logo()`.
         *
         * @param string $restaurant_culinary_html Compiled html based on our arguments.
         * @param array $restaurant_culinary_args Parsed arguments.
         * @param string $restaurant_culinary_classname Class name based on current view, home or single.
         * @param string $restaurant_culinary_contents HTML for site title or logo.
         */
        $restaurant_culinary_html = apply_filters('restaurant_culinary_site_logo', $restaurant_culinary_html, $restaurant_culinary_args, $restaurant_culinary_classname, $restaurant_culinary_contents);
        if (!$restaurant_culinary_echo) {
            return $restaurant_culinary_html;
        }
        echo $restaurant_culinary_html; //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

    }

endif;

if( !function_exists('restaurant_culinary_site_description') ):

    /**
     * Displays the site description.
     *
     * @param boolean $restaurant_culinary_echo Echo or return the html.
     *
     * @return string $restaurant_culinary_html The HTML to display.
     */
    function restaurant_culinary_site_description($restaurant_culinary_echo = true){

        if ( get_theme_mod('restaurant_culinary_display_header_text', false) == true ) :
        $restaurant_culinary_description = get_bloginfo('description');
        if (!$restaurant_culinary_description) {
            return;
        }
        $restaurant_culinary_wrapper = '<div class="site-description"><span>%s</span></div><!-- .site-description -->';
        $restaurant_culinary_html = sprintf($restaurant_culinary_wrapper, esc_html($restaurant_culinary_description));
        /**
         * Filters the html for the site description.
         *
         * @param string $restaurant_culinary_html The HTML to display.
         * @param string $restaurant_culinary_description Site description via `bloginfo()`.
         * @param string $restaurant_culinary_wrapper The format used in case you want to reuse it in a `sprintf()`.
         * @since 1.0.0
         *
         */
        $restaurant_culinary_html = apply_filters('restaurant_culinary_site_description', $restaurant_culinary_html, $restaurant_culinary_description, $restaurant_culinary_wrapper);
        if (!$restaurant_culinary_echo) {
            return $restaurant_culinary_html;
        }
        echo $restaurant_culinary_html; //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
        endif;
    }

endif;

if( !function_exists('restaurant_culinary_posted_on') ):

    /**
     * Prints HTML with meta information for the current post-date/time.
     */
    function restaurant_culinary_posted_on( $restaurant_culinary_icon = true, $restaurant_culinary_animation_class = '' ){

        $restaurant_culinary_default = restaurant_culinary_get_default_theme_options();
        $restaurant_culinary_post_date = absint( get_theme_mod( 'restaurant_culinary_post_date',$restaurant_culinary_default['restaurant_culinary_post_date'] ) );

        if( $restaurant_culinary_post_date ){

            $restaurant_culinary_time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
            if (get_the_time('U') !== get_the_modified_time('U')) {
                $restaurant_culinary_time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
            }

            $restaurant_culinary_time_string = sprintf($restaurant_culinary_time_string,
                esc_attr(get_the_date(DATE_W3C)),
                esc_html(get_the_date()),
                esc_attr(get_the_modified_date(DATE_W3C)),
                esc_html(get_the_modified_date())
            );

            $restaurant_culinary_year = get_the_date('Y');
            $restaurant_culinary_month = get_the_date('m');
            $restaurant_culinary_day = get_the_date('d');
            $restaurant_culinary_link = get_day_link($restaurant_culinary_year, $restaurant_culinary_month, $restaurant_culinary_day);

            $restaurant_culinary_posted_on = '<a href="' . esc_url($restaurant_culinary_link) . '" rel="bookmark">' . $restaurant_culinary_time_string . '</a>';

            echo '<div class="entry-meta-item entry-meta-date">';
            echo '<div class="entry-meta-wrapper '.esc_attr( $restaurant_culinary_animation_class ).'">';

            if( $restaurant_culinary_icon ){

                echo '<span class="entry-meta-icon calendar-icon"> ';
                restaurant_culinary_the_theme_svg('calendar');
                echo '</span>';

            }

            echo '<span class="posted-on">' . $restaurant_culinary_posted_on . '</span>'; // WPCS: XSS OK.
            echo '</div>';
            echo '</div>';

        }

    }

endif;

if( !function_exists('restaurant_culinary_posted_by') ) :

    /**
     * Prints HTML with meta information for the current author.
     */
    function restaurant_culinary_posted_by( $restaurant_culinary_icon = true, $restaurant_culinary_animation_class = '' ){   

        $restaurant_culinary_default = restaurant_culinary_get_default_theme_options();
        $restaurant_culinary_post_author = absint( get_theme_mod( 'restaurant_culinary_post_author',$restaurant_culinary_default['restaurant_culinary_post_author'] ) );

        if( $restaurant_culinary_post_author ){

            echo '<div class="entry-meta-item entry-meta-author">';
            echo '<div class="entry-meta-wrapper '.esc_attr( $restaurant_culinary_animation_class ).'">';

            if( $restaurant_culinary_icon ){
            
                echo '<span class="entry-meta-icon author-icon"> ';
                restaurant_culinary_the_theme_svg('user');
                echo '</span>';
                
            }

            $restaurant_culinary_byline = '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta('ID') ) ) . '">' . esc_html(get_the_author()) . '</a></span>';
            echo '<span class="byline"> ' . $restaurant_culinary_byline . '</span>'; // WPCS: XSS OK.
            echo '</div>';
            echo '</div>';

        }

    }

endif;


if( !function_exists('restaurant_culinary_posted_by_avatar') ) :

    /**
     * Prints HTML with meta information for the current author.
     */
    function restaurant_culinary_posted_by_avatar( $restaurant_culinary_date = false ){

        $restaurant_culinary_default = restaurant_culinary_get_default_theme_options();
        $restaurant_culinary_post_author = absint( get_theme_mod( 'restaurant_culinary_post_author',$restaurant_culinary_default['restaurant_culinary_post_author'] ) );

        if( $restaurant_culinary_post_author ){



            echo '<div class="entry-meta-left">';
            echo '<div class="entry-meta-item entry-meta-avatar">';
            echo wp_kses_post( get_avatar( get_the_author_meta( 'ID' ) ) );
            echo '</div>';
            echo '</div>';

            echo '<div class="entry-meta-right">';

            $restaurant_culinary_byline = '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta('ID') ) ) . '">' . esc_html(get_the_author()) . '</a></span>';

            echo '<div class="entry-meta-item entry-meta-byline"> ' . $restaurant_culinary_byline . '</div>';

            if( $restaurant_culinary_date ){
                restaurant_culinary_posted_on($restaurant_culinary_icon = false);
            }
            echo '</div>';

        }

    }

endif;

if( !function_exists('restaurant_culinary_entry_footer') ):

    /**
     * Prints HTML with meta information for the categories, tags and comments.
     */
    function restaurant_culinary_entry_footer( $restaurant_culinary_cats = true, $restaurant_culinary_tags = true, $restaurant_culinary_edits = true){   

        $restaurant_culinary_default = restaurant_culinary_get_default_theme_options();
        $restaurant_culinary_post_category = absint( get_theme_mod( 'restaurant_culinary_post_category',$restaurant_culinary_default['restaurant_culinary_post_category'] ) );
        $restaurant_culinary_post_tags = absint( get_theme_mod( 'restaurant_culinary_post_tags',$restaurant_culinary_default['restaurant_culinary_post_tags'] ) );

        // Hide category and tag text for pages.
        if ('post' === get_post_type()) {

            if( $restaurant_culinary_cats && $restaurant_culinary_post_category ){

                /* translators: used between list items, there is a space after the comma */
                $restaurant_culinary_categories = get_the_category();
                if ($restaurant_culinary_categories) {
                    echo '<div class="entry-meta-item entry-meta-categories">';
                    echo '<div class="entry-meta-wrapper">';
                
                    /* translators: 1: list of categories. */
                    echo '<span class="cat-links">';
                    foreach( $restaurant_culinary_categories as $restaurant_culinary_category ){

                        $restaurant_culinary_cat_name = $restaurant_culinary_category->name;
                        $restaurant_culinary_cat_slug = $restaurant_culinary_category->slug;
                        $restaurant_culinary_cat_url = get_category_link( $restaurant_culinary_category->term_id );
                        ?>

                        <a class="twp_cat_<?php echo esc_attr( $restaurant_culinary_cat_slug ); ?>" href="<?php echo esc_url( $restaurant_culinary_cat_url ); ?>" rel="category tag"><?php echo esc_html( $restaurant_culinary_cat_name ); ?></a>

                    <?php }
                    echo '</span>'; // WPCS: XSS OK.
                    echo '</div>';
                    echo '</div>';
                }

            }

            if( $restaurant_culinary_tags && $restaurant_culinary_post_tags ){
                /* translators: used between list items, there is a space after the comma */
                $restaurant_culinary_tags_list = get_the_tag_list('', esc_html_x(', ', 'list item separator', 'restaurant-culinary'));
                if( $restaurant_culinary_tags_list ){

                    echo '<div class="entry-meta-item entry-meta-tags">';
                    echo '<div class="entry-meta-wrapper">';

                    /* translators: 1: list of tags. */
                    echo '<span class="tags-links">';
                    echo wp_kses_post($restaurant_culinary_tags_list) . '</span>'; // WPCS: XSS OK.
                    echo '</div>';
                    echo '</div>';

                }

            }

            if( $restaurant_culinary_edits ){

                edit_post_link(
                    sprintf(
                        wp_kses(
                        /* translators: %s: Name of current post. Only visible to screen readers */
                            __('Edit <span class="screen-reader-text">%s</span>', 'restaurant-culinary'),
                            array(
                                'span' => array(
                                    'class' => array(),
                                ),
                            )
                        ),
                        get_the_title()
                    ),
                    '<span class="edit-link">',
                    '</span>'
                );
            }

        }
    }

endif;

if ( !function_exists('restaurant_culinary_post_thumbnail') ) :

    /**
     * Displays an optional post thumbnail.
     *
     * Wraps the post thumbnail in an anchor element on index views, or a div
     * element when on single views. If no post thumbnail is available, a default image is used.
     */
    function restaurant_culinary_post_thumbnail($image_size = 'full'){

        if( post_password_required() || is_attachment() ){ return; }

        // Set the URL for your default image here (e.g. from your theme directory)
        $restaurant_culinary_default_image = get_template_directory_uri() . '/assets/images/slider1.png'; // Update this path accordingly

        if ( is_singular() ) : ?>
                <?php the_post_thumbnail(); ?>
        <?php else : ?>

            <a href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
                <?php

                $restaurant_culinary_featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(), $image_size);
                $restaurant_culinary_featured_image = isset($restaurant_culinary_featured_image[0]) ? $restaurant_culinary_featured_image[0] : '';

                // Check if there's a featured image
                if ($restaurant_culinary_featured_image != '' ) {
                    // Display the featured image
                    the_post_thumbnail($image_size, array(
                        'alt' => the_title_attribute(array(
                            'echo' => false,
                        )),
                    ));
                } else {
                    // No featured image, display the default image
                    echo '<img src="' . esc_url($restaurant_culinary_default_image) . '" alt="' . the_title_attribute(array('echo' => false)) . '" />';
                }
                ?>
            </a>

        <?php
        endif; // End is_singular().
    }

endif;

if( !function_exists('restaurant_culinary_is_comment_by_post_author') ):

    /**
     * Comments
     */
    /**
     * Check if the specified comment is written by the author of the post commented on.
     *
     * @param object $restaurant_culinary_comment Comment data.
     *
     * @return bool
     */
    function restaurant_culinary_is_comment_by_post_author($restaurant_culinary_comment = null){

        if (is_object($restaurant_culinary_comment) && $restaurant_culinary_comment->user_id > 0) {
            $restaurant_culinary_user = get_userdata($restaurant_culinary_comment->user_id);
            $post = get_post($restaurant_culinary_comment->comment_post_ID);
            if (!empty($restaurant_culinary_user) && !empty($post)) {
                return $restaurant_culinary_comment->user_id === $post->post_author;
            }
        }
        return false;
    }

endif;

if( !function_exists('restaurant_culinary_breadcrumb') ) :

    /**
     * Restaurant Culinary Breadcrumb
     */
    function restaurant_culinary_breadcrumb($restaurant_culinary_comment = null){

        echo '<div class="entry-breadcrumb">';
        breadcrumb_trail();
        echo '</div>';

    }

endif;