<?php
/**
 * The header for our theme
 *
 * @package Bakery Treats
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'bakery-treats' ); ?></a>

    <?php
    $bakery_treats_preloader_wrap = absint(get_theme_mod('bakery_treats_enable_preloader', 0));
    if ($bakery_treats_preloader_wrap === 1): ?>
        <div id="loader">
            <div class="loader-container">
                <div id="preloader" class="loader-2">
                    <div class="dot"></div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <header id="masthead" class="site-header">
        <?php if (has_header_image()): ?>
            <div class="mainhead" style="background-image: url('<?php echo esc_url(get_header_image()); ?>');">
        <?php else: ?>
            <div class="mainhead">
        <?php endif; ?>
            <div class="header-info-box">
                <div class="container">
                    <div class="flex-row">
                        <div class="header-info-left">
                            <?php if (get_theme_mod('bakery_treats_header_info_phone')): ?>
                                <div class="contact-info phone">
                                    <p class="main-box">
                                        <span class="contact-text"><?php echo esc_html(get_theme_mod('bakery_treats_header_info_phone_text')); ?></span>
                                        <span class="main-phone-text"><a href="tel:<?php echo esc_attr(get_theme_mod('bakery_treats_header_info_phone')); ?>"><?php echo esc_html(get_theme_mod('bakery_treats_header_info_phone')); ?></a></span>
                                    </p>
                                    <i class="fas fa-phone-volume"></i>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="header-info-center">
                            <div class="site-branding">
                                <?php the_custom_logo(); ?>
                                <?php if (is_front_page() && is_home()): ?>
                                    <?php if (get_theme_mod('bakery_treats_site_title_text', true)): ?>
                                        <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <?php if (get_theme_mod('bakery_treats_site_title_text', true)): ?>
                                        <p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
                                    <?php endif; ?>
                                <?php endif; ?>

                                <?php $bakery_treats_description = get_bloginfo('description', 'display'); ?>
                                <?php if ($bakery_treats_description || is_customize_preview()): ?>
                                    <?php if (get_theme_mod('bakery_treats_site_tagline_text', false)): ?>
                                        <p class="site-description"><?php echo esc_html($bakery_treats_description); ?></p>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="header-info-right">
                            <?php if (get_theme_mod('bakery_treats_header_info_email')): ?>
                                <div class="contact-info email">
                                    <i class="fas fa-envelope-open-text"></i>
                                    <p class="main-box">
                                        <span class="contact-text"><?php echo esc_html(get_theme_mod('bakery_treats_header_info_email_text')); ?></span>
                                        <span class="main-email-text"><a href="mailto:<?php echo esc_attr(get_theme_mod('bakery_treats_header_info_email')); ?>"><?php echo esc_html(get_theme_mod('bakery_treats_header_info_email')); ?></a></span>
                                    </p>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="header-menu-box">
                <div class="container">
                    <div class="flex-row <?php echo esc_attr( get_theme_mod( 'bakery_treats_enable_sticky_header', false ) ? 'sticky-header' : '' ); ?>">
                        <div class="nav-menu-header-left">
                            <nav id="site-navigation" class="main-navigation">
                                <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                                    <span class="screen-reader-text"><?php esc_html_e('Primary Menu', 'bakery-treats'); ?></span>
                                    <i class="fas fa-bars"></i>
                                </button>
                                <?php
                                wp_nav_menu(array(
                                    'theme_location' => 'menu-1',
                                    'menu_id'        => 'primary-menu',
                                    // 'fallback_cb'    => false,
                                ));
                                ?>
                            </nav>
                        </div>
                        <div class="nav-menu-header-right">
                            <div class="header-search">
                                <?php if (get_theme_mod('bakery_treats_header_search', false) == 1): ?>
                                    <div class="search-box text-center">
                                      <?php if(get_theme_mod('bakery_treats_search_option',true) != ''){ ?>
                                        <button type="button" class="search-open"><i class="fas fa-search"></i></button>
                                      <?php }?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="main-woo-box">
                                <?php if (class_exists('woocommerce')): ?>
                                    <div class="cart-no-box">
                                        <a href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php esc_attr_e('Shopping Cart', 'bakery-treats'); ?>">
                                            <i class="fas fa-shopping-bag"></i>
                                            <span class="screen-reader-text"><?php esc_html_e('Shopping Cart', 'bakery-treats'); ?></span>
                                        </a>
                                        <span class="cart-value"><?php echo esc_html(WC()->cart->get_cart_contents_count()); ?></span>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="search-outer">
                            <div class="serach_inner">
                                <?php get_search_form(); ?>
                            </div>
                            <button type="button" class="search-close">
                                <?php echo esc_html__('X', 'bakery-treats'); ?>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
</div>