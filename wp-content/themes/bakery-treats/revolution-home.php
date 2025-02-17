<?php
/**
 * Template Name: Home Page
 */

get_header();
?>

<main id="primary">

    <?php 
    $bakery_treats_main_slider_wrap = absint(get_theme_mod('bakery_treats_enable_slider', 0));
    if ($bakery_treats_main_slider_wrap == 1): 
    ?>
    <section id="main-slider-wrap">
        <div class="owl-carousel">
            <?php for ($bakery_treats_main_i = 1; $bakery_treats_main_i <= 3; $bakery_treats_main_i++): ?>
                <?php if ($bakery_treats_slider_image = get_theme_mod('bakery_treats_slider_image' . $bakery_treats_main_i)): ?>
                    <div class="main-slider-inner-box">
                        <img src="<?php echo esc_url($bakery_treats_slider_image); ?>" alt="<?php echo esc_attr(get_theme_mod('bakery_treats_slider_heading' . $bakery_treats_main_i)); ?>">
                        <div class="main-slider-content-box">
                            <?php if ($bakery_treats_top_text = get_theme_mod('bakery_treats_slider_top_text' . $bakery_treats_main_i)): ?>
                                <p class="slider-top"><?php echo esc_html($bakery_treats_top_text); ?></p>
                            <?php endif; ?>
                            <?php if ($bakery_treats_heading = get_theme_mod('bakery_treats_slider_heading' . $bakery_treats_main_i)): ?>
                                <h1><?php echo esc_html($bakery_treats_heading); ?></h1>
                            <?php endif; ?>
                            <?php if ($bakery_treats_add_phone_number = get_theme_mod('bakery_treats_add_phone_number')): ?>
                                <p><?php echo esc_html__('Book a table directly', 'bakery-treats'); ?></p>
                                <div class="book-table"><?php echo esc_html($bakery_treats_add_phone_number); ?></div>
                            <?php endif; ?>
                            <?php if ($bakery_treats_bakery_opening_time = get_theme_mod('bakery_treats_bakery_opening_time')): ?>
                                <div class="time-text"><span class="open-text"><?php echo esc_html__('OPENING HOUR - ', 'bakery-treats'); ?></span>
                                <span class="open-time"><?php echo esc_html($bakery_treats_bakery_opening_time); ?></span></div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endfor; ?>
        </div>
    </section>
    <?php endif; ?>

    <?php 
    $bakery_treats_main_expert_wrap = absint(get_theme_mod('bakery_treats_enable_new_arrivals', 1));
    if ($bakery_treats_main_expert_wrap == 1): 
    ?>
    <section id="main-expert-wrap">
        <div class="container">
            <div class="heading-expert-wrap">
                <?php if ($bakery_treats_new_arrivals_top_heading = get_theme_mod('bakery_treats_new_arrivals_top_heading')): ?>
                    <p class="small-title"><?php echo esc_html($bakery_treats_new_arrivals_top_heading); ?></p>
                <?php endif; ?>
                <?php if ($bakery_treats_new_arrivals_heading = get_theme_mod('bakery_treats_new_arrivals_heading')): ?>
                    <h2><?php echo esc_html($bakery_treats_new_arrivals_heading); ?></h2>
                <?php endif; ?>
            </div>
            <div class="flex-row">
                <?php if (class_exists('WooCommerce')): ?>
                    <?php
                    $bakery_treats_args = array( 
                        'post_type' => 'product',
                        'product_cat' => get_theme_mod('bakery_treats_product_category'),
                        'order' => 'ASC',
                        'posts_per_page' => 50
                    );
                    $bakery_treats_loop = new WP_Query($bakery_treats_args);
                    if ($bakery_treats_loop->have_posts()):
                        while ($bakery_treats_loop->have_posts()): $bakery_treats_loop->the_post();
                            global $product;
                    ?>
                            <div class="product-box">  
                                <div class="product-box-content">
                                    <div class="product-image">
                                        <?php
                                        if (has_post_thumbnail()) {
                                            echo get_the_post_thumbnail(get_the_ID(), 'shop_catalog');
                                        } else {
                                            echo '<img src="' . esc_url(wc_placeholder_img_src()) . '" alt="' . esc_attr__('Placeholder', 'bakery-treats') . '" />';
                                        }
                                        ?>
                                        <div class="cart-button">
                                            <?php woocommerce_template_loop_add_to_cart(); ?>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h3 class="product-heading-text"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                        <div class="product-description">
                                            <?php echo wp_kses_post(wp_trim_words(get_the_content(), 13)); ?>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                    <?php endwhile; wp_reset_postdata(); endif; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

</main>

<?php
get_footer();
?>