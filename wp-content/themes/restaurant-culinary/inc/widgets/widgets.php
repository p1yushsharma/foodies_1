<?php
/**
* Widget Functions.
*
* @package Restaurant Culinary
*/


function restaurant_culinary_widgets_init(){

	register_sidebar(array(
	    'name' => esc_html__('Main Sidebar', 'restaurant-culinary'),
	    'id' => 'sidebar-1',
	    'description' => esc_html__('Add widgets here.', 'restaurant-culinary'),
	    'before_widget' => '<div id="%1$s" class="widget %2$s">',
	    'after_widget' => '</div>',
	    'before_title' => '<h3 class="widget-title"><span>',
	    'after_title' => '</span></h3>',
	));


    $restaurant_culinary_default = restaurant_culinary_get_default_theme_options();
    $restaurant_culinary_restaurant_culinary_footer_column_layout = absint( get_theme_mod( 'restaurant_culinary_footer_column_layout',$restaurant_culinary_default['restaurant_culinary_footer_column_layout'] ) );

    for( $restaurant_culinary_i = 0; $restaurant_culinary_i < $restaurant_culinary_restaurant_culinary_footer_column_layout; $restaurant_culinary_i++ ){
    	
    	if( $restaurant_culinary_i == 0 ){ $restaurant_culinary_count = esc_html__('One','restaurant-culinary'); }
    	if( $restaurant_culinary_i == 1 ){ $restaurant_culinary_count = esc_html__('Two','restaurant-culinary'); }
    	if( $restaurant_culinary_i == 2 ){ $restaurant_culinary_count = esc_html__('Three','restaurant-culinary'); }

	    register_sidebar( array(
	        'name' => esc_html__('Footer Widget ', 'restaurant-culinary').$restaurant_culinary_count,
	        'id' => 'restaurant-culinary-footer-widget-'.$restaurant_culinary_i,
	        'description' => esc_html__('Add widgets here.', 'restaurant-culinary'),
	        'before_widget' => '<div id="%1$s" class="widget %2$s">',
	        'after_widget' => '</div>',
	        'before_title' => '<h2 class="widget-title">',
	        'after_title' => '</h2>',
	    ));
	}

}

add_action('widgets_init', 'restaurant_culinary_widgets_init');