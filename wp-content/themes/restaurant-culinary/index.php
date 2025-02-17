<?php
/**
 * The main template file
 * @package Restaurant Culinary
 * @since 1.0.0
 */

get_header();
$restaurant_culinary_default = restaurant_culinary_get_default_theme_options();
$restaurant_culinary_global_sidebar_layout = esc_html( get_theme_mod( 'restaurant_culinary_global_sidebar_layout',$restaurant_culinary_default['restaurant_culinary_global_sidebar_layout'] ) );
$restaurant_culinary_sidebar_column_class = 'column-order-2';
if ($restaurant_culinary_global_sidebar_layout == 'right-sidebar') {
    $restaurant_culinary_sidebar_column_class = 'column-order-1';
}

global $restaurant_culinary_archive_first_class; ?>
    <div class="archive-main-block">
        <div class="wrapper">
            <div class="column-row">

                <div id="primary" class="content-area <?php echo esc_attr($restaurant_culinary_sidebar_column_class) ; ?>">
                    <main id="site-content" role="main">

                        <?php

                        if( !is_front_page() ) {
                            restaurant_culinary_breadcrumb();
                        }

                        if( have_posts() ): ?>

                            <div class="article-wraper article-wraper-archive">
                                <?php
                                while( have_posts() ):
                                    the_post();

                                    get_template_part( 'template-parts/content', get_post_format() );

                                endwhile; ?>
                            </div>

                            <?php
                            if( is_search() ){
                                the_posts_pagination();
                            }else{
                                do_action('restaurant_culinary_posts_pagination');
                            }

                        else :

                            get_template_part('template-parts/content', 'none');

                        endif; ?>
                    </main>
                </div>
                <?php get_sidebar();?>
            </div>
        </div>
    </div>
<?php
get_footer();