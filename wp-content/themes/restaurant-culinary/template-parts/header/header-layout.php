<?php
/**
 * Header Layout
 * @package Restaurant Culinary
 */

$restaurant_culinary_default = restaurant_culinary_get_default_theme_options();

$restaurant_culinary_header_search = get_theme_mod( 'restaurant_culinary_header_search', 
$restaurant_culinary_default['restaurant_culinary_header_search'] );

$restaurant_culinary_header_layout_button = esc_html( get_theme_mod( 'restaurant_culinary_header_layout_button',
$restaurant_culinary_default['restaurant_culinary_header_layout_button'] ) );

$restaurant_culinary_header_layout_button_url = esc_url( get_theme_mod( 'restaurant_culinary_header_layout_button_url',
$restaurant_culinary_default['restaurant_culinary_header_layout_button_url'] ) );

$restaurant_culinary_sticky = get_theme_mod('restaurant_culinary_sticky');
$restaurant_culinary_data_sticky = "false";
if ($restaurant_culinary_sticky) {
$restaurant_culinary_data_sticky = "true";
}
?>

<section id="center-header" class="Stickyy <?php if( is_user_logged_in() && !isset( $wp_customize ) ){ echo "login-user";} ?>" data-sticky="<?php echo esc_attr($restaurant_culinary_data_sticky); ?>">
    <div class=" header-main wrapper">
        <div class="header-right-box theme-header-areas">
            <header id="site-header" class="site-header-layout header-layout" role="banner">
                <div class="header-center">
                    <div class="theme-header-areas header-areas-right header-logo">
                        <div class="header-titles">
                            <?php
                                restaurant_culinary_site_logo();
                                restaurant_culinary_site_description();
                            ?>
                        </div>
                    </div>
                    <div class="theme-header-areas header-areas-right header-menu">
                        <div class="site-navigation">
                            <nav class="primary-menu-wrapper" aria-label="<?php esc_attr_e('Horizontal', 'restaurant-culinary'); ?>" role="navigation">
                                <ul class="primary-menu theme-menu">
                                    <?php
                                    if (has_nav_menu('restaurant-culinary-primary-menu')) {
                                        wp_nav_menu(
                                            array(
                                                'container' => '',
                                                'items_wrap' => '%3$s',
                                                'theme_location' => 'restaurant-culinary-primary-menu',
                                            )
                                        );
                                    } else {
                                        wp_list_pages(
                                            array(
                                                'match_menu_classes' => true,
                                                'show_sub_menu_icons' => true,
                                                'title_li' => false,
                                                'walker' => new Restaurant_Culinary_Walker_Page(),
                                            )
                                        );
                                    } ?>
                                </ul>
                            </nav>
                        </div>
                        <div class="navbar-controls twp-hide-js">
                            <button type="button" class="navbar-control navbar-control-offcanvas">
                                <span class="navbar-control-trigger" tabindex="-1">
                                    <?php restaurant_culinary_the_theme_svg('menu'); ?>
                                </span>
                            </button>
                        </div>
                    </div>
                    <?php if( $restaurant_culinary_header_search ){ ?>
                        <div class="theme-header-areas header-areas-right header-search">
                            <a href="#search">
                              <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6 .1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"/></svg>
                            </a>
                            <!-- Search Form -->
                            <div id="search">
                                <span class="close">X</span>
                                <?php get_search_form(); ?>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="theme-header-areas header-areas-right header-button">
                        <?php if( $restaurant_culinary_header_layout_button || $restaurant_culinary_header_layout_button_url ){ ?>
                            <span>
                                <a href="<?php echo esc_attr( $restaurant_culinary_header_layout_button_url ); ?>"><?php echo esc_html( $restaurant_culinary_header_layout_button ); ?></a>
                            </span>
                        <?php } ?>
                    </div>
                </div>
            </header>
        </div>
    </div>
</section>