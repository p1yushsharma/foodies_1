<?php
/**
 * The template for displaying single posts and pages.
 * @package Restaurant Culinary
 * @since 1.0.0
 */
get_header();

    $restaurant_culinary_default = restaurant_culinary_get_default_theme_options();
    $restaurant_culinary_global_sidebar_layout = esc_html( get_theme_mod( 'restaurant_culinary_global_sidebar_layout',$restaurant_culinary_default['restaurant_culinary_global_sidebar_layout'] ) );
    $restaurant_culinary_post_sidebar = esc_html( get_post_meta( $post->ID, 'restaurant_culinary_post_sidebar_option', true ) );
    $restaurant_culinary_sidebar_column_class = 'column-order-1';

    if (!empty($restaurant_culinary_post_sidebar)) {
        $restaurant_culinary_global_sidebar_layout = $restaurant_culinary_post_sidebar;
    }

    if ($restaurant_culinary_global_sidebar_layout == 'left-sidebar') {
        $restaurant_culinary_sidebar_column_class = 'column-order-2';
    } ?>

<div id="single-page" class="singular-main-block">
    <div class="wrapper">
        <div class="column-row <?php echo esc_attr( $restaurant_culinary_global_sidebar_layout === 'no-sidebar' ? 'no-sidebar-layout' : '' ); ?>">
            
            <?php if ( $restaurant_culinary_global_sidebar_layout !== 'no-sidebar' && $restaurant_culinary_global_sidebar_layout === 'left-sidebar' ) : ?>
                <?php get_sidebar(); ?>
            <?php endif; ?>
            
            <div id="primary" class="content-area <?php echo esc_attr( $restaurant_culinary_global_sidebar_layout === 'no-sidebar' ? 'full-width-content' : $restaurant_culinary_sidebar_column_class ); ?>">
                <main id="site-content" role="main">

                    <?php
                        restaurant_culinary_breadcrumb();

                    if ( have_posts() ): ?>

                        <div class="article-wraper">

                            <?php while ( have_posts() ) :
                                the_post();

                                get_template_part( 'template-parts/content', 'single' );

                                if ( ( is_single() || is_page() ) && ( comments_open() || get_comments_number() ) && !post_password_required() ) { ?>
                                    <div class="comments-wrapper">
                                        <?php comments_template(); ?>
                                    </div>
                                <?php } ?>

                            <?php endwhile; ?>

                        </div>

                    <?php
                    else :

                        get_template_part( 'template-parts/content', 'none' );

                    endif;

                    do_action( 'restaurant_culinary_navigation_action' ); ?>

                </main>
            </div>
            
            <?php if ( $restaurant_culinary_global_sidebar_layout === 'right-sidebar' ) : ?>
                <?php get_sidebar(); ?>
            <?php endif; ?>
            
        </div>
    </div>
</div>


<?php
get_footer();