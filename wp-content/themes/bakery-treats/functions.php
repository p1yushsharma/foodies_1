<?php
/**
 * Bakery Treats functions and definitions
 *
 * @package Bakery Treats
 */

if ( ! defined( 'BAKERY_TREATS_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'BAKERY_TREATS_VERSION', '1.0.0' );
}

function bakery_treats_setup() {

	load_theme_textdomain( 'bakery-treats', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'woocommerce' );
	add_theme_support( "align-wide" );
	add_theme_support( "responsive-embeds" );

	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'bakery-treats' ),
			'social-menu' => esc_html__('Social Menu', 'bakery-treats'),
		)
	);

	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	add_theme_support(
		'custom-background',
		apply_filters(
			'bakery_treats_custom_background_args',
			array(
				'default-color' => '#fafafa',
				'default-image' => '',
			)
		)
	);

	add_theme_support( 'customize-selective-refresh-widgets' );

	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);

    add_theme_support( 'post-formats', array(
        'image',
        'video',
        'gallery',
        'audio', 
    ));
	
}
add_action( 'after_setup_theme', 'bakery_treats_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $bakery_treats_content_width
 */
function bakery_treats_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'bakery_treats_content_width', 640 );
}
add_action( 'after_setup_theme', 'bakery_treats_content_width', 0 );

add_filter( 'woocommerce_enable_setup_wizard', '__return_false' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function bakery_treats_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'bakery-treats' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'bakery-treats' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 1', 'bakery-treats' ),
			'id'            => 'footer-1',
			'description'   => esc_html__( 'Add widgets here.', 'bakery-treats' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 2', 'bakery-treats' ),
			'id'            => 'footer-2',
			'description'   => esc_html__( 'Add widgets here.', 'bakery-treats' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 3', 'bakery-treats' ),
			'id'            => 'footer-3',
			'description'   => esc_html__( 'Add widgets here.', 'bakery-treats' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'bakery_treats_widgets_init' );


function bakery_treats_social_menu()
    {
        if (has_nav_menu('social-menu')) :
            wp_nav_menu(array(
                'theme_location' => 'social-menu',
                'container' => 'ul',
                'menu_class' => 'social-menu menu',
                'menu_id'  => 'menu-social',
            ));
        endif;
    }

// script
function bakery_treats_scripts() {
    // Google Fonts
    $query_args = array(
        'family' => 'Inter:wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900|Inria Serif:wght@0,300;0,400;0,700;1,300;1,400;1,700|Cookie',
        'display' => 'swap',
    );
    wp_enqueue_style('bakery-treats-google-fonts', add_query_arg($query_args, 'https://fonts.googleapis.com/css'), array(), null);

    // Font Awesome CSS
    wp_enqueue_style('font-awesome-5', get_template_directory_uri() . '/revolution/assets/vendors/font-awesome-5/css/all.min.css', array(), '5.15.3');

    // Owl Carousel CSS
    wp_enqueue_style('owl.carousel.style', get_template_directory_uri() . '/revolution/assets/css/owl.carousel.css', array(), '2.3.4');
    
    // Main stylesheet
    wp_enqueue_style('bakery-treats-style', get_stylesheet_uri(), array(), wp_get_theme()->get('Version'));

    // Add custom inline styles
   require get_parent_theme_file_path('/custom-style.php');
    wp_add_inline_style('bakery-treats-style', $bakery_treats_custom_css);

    // RTL styles if needed
    wp_style_add_data('bakery-treats-style', 'rtl', 'replace');

    // Navigation script
    wp_enqueue_script('bakery-treats-navigation', get_template_directory_uri() . '/js/navigation.js', array(), wp_get_theme()->get('Version'), true);

    // Owl Carousel script
    wp_enqueue_script('owl.carousel.jquery', get_template_directory_uri() . '/revolution/assets/js/owl.carousel.js', array('jquery'), '2.3.4', true);

    // Custom script
    wp_enqueue_script('bakery-treats-custom-js', get_template_directory_uri() . '/revolution/assets/js/custom.js', array('jquery'), wp_get_theme()->get('Version'), true);

    // Comments reply script
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'bakery_treats_scripts');

if (!function_exists('bakery_treats_related_post')) :
    /**
     * Display related posts from same category
     *
     */

    function bakery_treats_related_post($post_id){        
        $bakery_treats_categories = get_the_category($post_id);
        if ($bakery_treats_categories) {
            $bakery_treats_category_ids = array();
            $bakery_treats_category = get_category($bakery_treats_category_ids);
            $bakery_treats_categories = get_the_category($post_id);
            foreach ($bakery_treats_categories as $bakery_treats_category) {
                $bakery_treats_category_ids[] = $bakery_treats_category->term_id;
            }
            $bakery_treats_count = $bakery_treats_category->category_count;
            if ($bakery_treats_count > 1) { ?>

         	<?php
		$bakery_treats_related_post_wrap = absint(get_theme_mod('bakery_treats_enable_related_post', 1));
		if($bakery_treats_related_post_wrap == 1){ ?>
                <div class="related-post">
                    
                    <h2 class="post-title"><?php esc_html_e(get_theme_mod('bakery_treats_related_post_text', __('Related Post', 'bakery-treats'))); ?></h2>
                    <?php
                    $bakery_treats_cat_post_args = array(
                        'category__in' => $bakery_treats_category_ids,
                        'post__not_in' => array($post_id),
                        'post_type' => 'post',
                        'posts_per_page' =>  get_theme_mod( 'bakery_treats_related_post_count', '3' ),
                        'post_status' => 'publish',
                        'ignore_sticky_posts' => true
                    );
                    $bakery_treats_featured_query = new WP_Query($bakery_treats_cat_post_args);
                    ?>
                    <div class="rel-post-wrap">
                        <?php
                        if ($bakery_treats_featured_query->have_posts()) :

                        while ($bakery_treats_featured_query->have_posts()) : $bakery_treats_featured_query->the_post();
                            ?>

							<div class="card-item rel-card-item">
								<div class="card-content">
									<div class="entry-title">
										<h3>
											<a href="<?php the_permalink() ?>">
												<?php the_title(); ?>
											</a>
										</h3>
									</div>
									<div class="entry-meta">
										<?php bakery_treats_posted_on(); ?>
									</div>
								</div>
							</div>
                        <?php
                        endwhile;
                        ?>
                <?php
                endif;
                wp_reset_postdata();
                ?>
                </div>
                <?php } ?>
                <?php
            }
        }
    }
endif;
add_action('bakery_treats_related_posts', 'bakery_treats_related_post', 10, 1);

function bakery_treats_sanitize_choices( $bakery_treats_input, $bakery_treats_setting ) {
    global $wp_customize; 
    $bakery_treats_control = $wp_customize->get_control( $bakery_treats_setting->id ); 
    if ( array_key_exists( $bakery_treats_input, $bakery_treats_control->choices ) ) {
        return $bakery_treats_input;
    } else {
        return $bakery_treats_setting->default;
    }
}

//Excerpt 
function bakery_treats_excerpt_function($bakery_treats_excerpt_count = 35) {
    $bakery_treats_excerpt = get_the_excerpt();
    $bakery_treats_text_excerpt = wp_strip_all_tags($bakery_treats_excerpt);
    $bakery_treats_excerpt_limit = (int) get_theme_mod('bakery_treats_excerpt_limit', $bakery_treats_excerpt_count);
    $bakery_treats_words = preg_split('/\s+/', $bakery_treats_text_excerpt); 
    $bakery_treats_trimmed_words = array_slice($bakery_treats_words, 0, $bakery_treats_excerpt_limit);
    $bakery_treats_theme_excerpt = implode(' ', $bakery_treats_trimmed_words);

    return $bakery_treats_theme_excerpt;
}

// Add admin notice
function bakery_treats_admin_notice() { 
    global $pagenow;
    $bakery_treats_theme_args      = wp_get_theme();
    $bakery_treats_meta            = get_option( 'bakery_treats_admin_notice' );
    $name            = $bakery_treats_theme_args->__get( 'Name' );
    $bakery_treats_current_screen  = get_current_screen();

    if( !$bakery_treats_meta ){
	    if( is_network_admin() ){
	        return;
	    }

	    if( ! current_user_can( 'manage_options' ) ){
	        return;
	    } 
		
		if($bakery_treats_current_screen->base != 'appearance_page_bakery_treats_guide' ) { ?>
			<div class="notice notice-success">
				<h2><?php esc_html_e('Hey, Thank you for installing Bakery Treats Theme!', 'bakery-treats'); ?><span><a class="info-link" href="<?php echo esc_url( admin_url( 'themes.php?page=bakery-treats-getstart-page' ) ); ?>"><?php esc_html_e('Click Here for more Details', 'bakery-treats'); ?></a></span></h2>
				<p class="dismiss-link"><strong><a href="?bakery_treats_admin_notice=1"><?php esc_html_e( 'Dismiss', 'bakery-treats' ); ?></a></strong></p>
			</div>
			<?php
		}
	}
}

add_action( 'admin_notices', 'bakery_treats_admin_notice' );

if( ! function_exists( 'bakery_treats_update_admin_notice' ) ) :
/**
 * Updating admin notice on dismiss
*/
function bakery_treats_update_admin_notice(){
    if ( isset( $_GET['bakery_treats_admin_notice'] ) && $_GET['bakery_treats_admin_notice'] = '1' ) {
        update_option( 'bakery_treats_admin_notice', true );
    }
}
endif;
add_action( 'admin_init', 'bakery_treats_update_admin_notice' );


add_action('after_switch_theme', 'bakery_treats_setup_options');
function bakery_treats_setup_options () {
    update_option('bakery_treats_admin_notice', FALSE );
}

/**
 * Checkbox sanitization callback example.
 *
 * Sanitization callback for 'checkbox' type controls. This callback sanitizes `$checked`
 * as a boolean value, either TRUE or FALSE.
 */
function bakery_treats_sanitize_checkbox($checked)
{
    // Boolean check.
    return ((isset($checked) && true == $checked) ? true : false);
}

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/revolution/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/revolution/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/revolution/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/revolution/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/revolution/inc/jetpack.php';
}

/**
* GET START.
*/
require get_template_directory() . '/getstarted/bakery_treats_about_page.php';

/**
* DEMO IMPORT.
*/
require get_template_directory() . '/demo-import/bakery_treats_config_file.php';


function bakery_treats_remove_customize_register() {
    global $wp_customize;

    $wp_customize->remove_setting( 'display_header_text' );
    $wp_customize->remove_control( 'display_header_text' );

}

add_action( 'customize_register', 'bakery_treats_remove_customize_register', 11 );

/************************************************************************************/
// //////////////////////////////////////////////

/**
 * WooCommerce custom filters
 */
add_filter('loop_shop_columns', 'bakery_treats_loop_columns');

if (!function_exists('bakery_treats_loop_columns')) {

	function bakery_treats_loop_columns() {

		$bakery_treats_columns = get_theme_mod( 'bakery_treats_per_columns', 3 );

		return $bakery_treats_columns;
	}
}

/************************************************************************************/

add_filter( 'loop_shop_per_page', 'bakery_treats_per_page', 20 );

function bakery_treats_per_page( $bakery_treats_cols ) {

  	$bakery_treats_cols = get_theme_mod( 'bakery_treats_product_per_page', 9 );

	return $bakery_treats_cols;
}

/************************************************************************************/

add_filter( 'woocommerce_output_related_products_args', 'bakery_treats_products_args' );

function bakery_treats_products_args( $bakery_treats_args ) {

    $bakery_treats_args['posts_per_page'] = get_theme_mod( 'custom_related_products_number', 6 );

    $bakery_treats_args['columns'] = get_theme_mod( 'custom_related_products_number_per_row', 3 );

    return $bakery_treats_args;
}

/************************************************************************************/


/**
 * Custom logo
 */

function bakery_treats_custom_css() {
?>
	<style type="text/css" id="custom-theme-colors" >
        :root {
           
            --bakery_treats_logo_width: <?php echo absint(get_theme_mod('bakery_treats_logo_width')); ?> ;   
        }
        .site-branding img {
            max-width:<?php echo esc_html(get_theme_mod('bakery_treats_logo_width')); ?>px ;    
        }         
	</style>
<?php
}
add_action( 'wp_head', 'bakery_treats_custom_css' );

// Change number of products per row to 3
add_filter('loop_shop_columns', 'custom_loop_columns', 999);
function custom_loop_columns() {
    return 3; // Change this number to adjust the number of products per row
}

define('BAKERY_TREATS_FREE_SUPPORT',__('https://www.revolutionwp.com/wp-themes/free-bakery-wordpress-theme/','bakery-treats'));
define('BAKERY_TREATS_PRO_SUPPORT',__('https://www.revolutionwp.com/support/revolution-wp/','bakery-treats'));
define('BAKERY_TREATS_REVIEW',__('https://wordpress.org/support/theme/bakery-treats/reviews/#new-post','bakery-treats'));
define('BAKERY_TREATS_BUY_NOW',__('https://www.revolutionwp.com/wp-themes/bakery-wordpress-theme/','bakery-treats'));
define('BAKERY_TREATS_LIVE_DEMO',__('https://www.revolutionwp.com/wpdemo/bakery-treats-pro/','bakery-treats'));
define('BAKERY_TREATS_PRO_DOC',__('https://www.revolutionwp.com/wpdocs/bakery-treats-pro/','bakery-treats'));
define('BAKERY_TREATS_LITE_DOC',__('https://www.revolutionwp.com/wpdocs/bakery-treats-free/','bakery-treats'));

function get_changelog_from_readme() {
    $bakery_treats_file_path = get_template_directory() . '/readme.txt'; // Adjust path if necessary

    if (file_exists($bakery_treats_file_path)) {
        $bakery_treats_content = file_get_contents($bakery_treats_file_path);

        // Extract changelog section
        $bakery_treats_changelog_start = strpos($bakery_treats_content, "== Changelog ==");
        $bakery_treats_changelog = substr($bakery_treats_content, $bakery_treats_changelog_start);

        // Split changelog into versions
        preg_match_all('/\*\s([\d\.]+)\s-\s(.+?)\n((?:\t-\s.+?\n)+)/', $bakery_treats_changelog, $bakery_treats_matches, PREG_SET_ORDER);
        
        return $bakery_treats_matches;
    }
    return [];
}

function bakery_treats_custom_css_for_slider() {
    $bakery_treats_slider_enabled = get_theme_mod('bakery_treats_enable_slider', false);
    if ($bakery_treats_slider_enabled) {
        echo '<style type="text/css">
            .page-template-revolution-home-php .mainhead {
                position: absolute;
                width: 100%;
                left: 0;
                right: 0;
                top: 0;
                background: transparent;
                background-size: cover;
            }
            .page-template-revolution-home .menucontent {
                background: rgba(5, 83, 70, 0.5) !important;
            }
        </style>';
    }
}
add_action('wp_head', 'bakery_treats_custom_css_for_slider');