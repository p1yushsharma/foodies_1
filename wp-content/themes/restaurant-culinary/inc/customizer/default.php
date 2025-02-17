<?php
/**
 * Default Values.
 *
 * @package Restaurant Culinary
 */

if ( ! function_exists( 'restaurant_culinary_get_default_theme_options' ) ) :
	function restaurant_culinary_get_default_theme_options() {

		$restaurant_culinary_defaults = array();

        // Header
        $restaurant_culinary_defaults['restaurant_culinary_header_layout_button']          =  esc_html__( 'Buy Now', 'restaurant-culinary' );
        $restaurant_culinary_defaults['restaurant_culinary_header_layout_button_url']      =  esc_url( '#', 'restaurant-culinary' );
        $restaurant_culinary_defaults['restaurant_culinary_header_search']                 = 1;
        $restaurant_culinary_defaults['restaurant_culinary_theme_loader']                  = 0;
        $restaurant_culinary_defaults['restaurant_culinary_footer_column_layout']          = 3;
        $restaurant_culinary_defaults['restaurant_culinary_menu_font_size']                 = 13;
        $restaurant_culinary_defaults['restaurant_culinary_copyright_font_size']                 = 16;
        $restaurant_culinary_defaults['restaurant_culinary_breadcrumb_font_size']                 = 16;
        $restaurant_culinary_defaults['restaurant_culinary_excerpt_limit']                 = 10;
        $restaurant_culinary_defaults['restaurant_culinary_menu_text_transform']                 = 'capitalize';  
        $restaurant_culinary_defaults['restaurant_culinary_single_page_content_alignment']                 = 'left';
        $restaurant_culinary_defaults['restaurant_culinary_theme_pagination_options_alignment']                 = 'Center'; 
        $restaurant_culinary_defaults['restaurant_culinary_theme_breadcrumb_options_alignment']                 = 'Center';   
        $restaurant_culinary_defaults['restaurant_culinary_per_columns']                 = 3;  
        $restaurant_culinary_defaults['restaurant_culinary_product_per_page']                 = 9;
        $restaurant_culinary_defaults['restaurant_culinary_sticky']                                         = 0;
        $restaurant_culinary_defaults['restaurant_culinary_theme_breadcrumb_enable']                 = 1;
        $restaurant_culinary_defaults['restaurant_culinary_single_post_content_alignment']                 = 'left';
        
        $restaurant_culinary_defaults['restaurant_culinary_display_single_post_image']            = 1;
        $restaurant_culinary_defaults['restaurant_culinary_display_archive_post_format_icon']       = 1;

        //Slider 

        $restaurant_culinary_defaults['restaurant_culinary_slider_section_small_title']    =  esc_html__( 'Taste Redefined', 'restaurant-culinary' );
        $restaurant_culinary_defaults['restaurant_culinary_slider_section_sub_title']      =  esc_html__( 'Where Every Flavor Tells A Story', 'restaurant-culinary' );
        $restaurant_culinary_defaults['restaurant_culinary_slider_section_content']        =  esc_html__( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, industry\'s standard dummy text ever since the 1500s,', 'restaurant-culinary' );
        $restaurant_culinary_defaults['restaurant_culinary_slider_section_button_url']     =  esc_url( '#', 'restaurant-culinary' );
        $restaurant_culinary_defaults['restaurant_culinary_slider_section_button']         =  esc_html__( 'Learn More', 'restaurant-culinary' );

	// Options.
        $restaurant_culinary_defaults['restaurant_culinary_logo_width_range']                 = 300;
        
        $restaurant_culinary_defaults['restaurant_culinary_global_sidebar_layout']	        = 'right-sidebar';
        
        $restaurant_culinary_defaults['restaurant_culinary_pagination_layout']                = 'numeric';
	$restaurant_culinary_defaults['restaurant_culinary_footer_column_layout'] 	        = 2;
	$restaurant_culinary_defaults['restaurant_culinary_footer_copyright_text'] 	        = esc_html__( 'All rights reserved.', 'restaurant-culinary' );
        $restaurant_culinary_defaults['restaurant_culinary_twp_navigation_type']              = 'theme-normal-navigation';
        $restaurant_culinary_defaults['restaurant_culinary_post_author']                      = 1;
        $restaurant_culinary_defaults['restaurant_culinary_post_date']                        = 1;
        $restaurant_culinary_defaults['restaurant_culinary_post_category']                	= 1;
        $restaurant_culinary_defaults['restaurant_culinary_post_tags']                        = 1;
        $restaurant_culinary_defaults['restaurant_culinary_floating_next_previous_nav']       = 1;
        $restaurant_culinary_defaults['restaurant_culinary_header_slider']                    = 1;
        $restaurant_culinary_defaults['restaurant_culinary_background_color']                 = '#fff';
        $restaurant_culinary_defaults['restaurant_culinary_global_color']                                   = '#50A96E';
        $restaurant_culinary_defaults['restaurant_culinary_display_archive_post_category']          = 1;
        $restaurant_culinary_defaults['restaurant_culinary_display_archive_post_title']             = 1;
        $restaurant_culinary_defaults['restaurant_culinary_display_archive_post_content']           = 1;
        $restaurant_culinary_defaults['restaurant_culinary_display_archive_post_button']            = 1;

        $restaurant_culinary_defaults['restaurant_culinary_enable_to_the_top']                      = 1;
        $restaurant_culinary_defaults['restaurant_culinary_to_the_top_text']                      = esc_html__( 'To The Top', 'restaurant-culinary' );

        $restaurant_culinary_defaults['restaurant_culinary_banner_right_image_1']                    = esc_url(get_template_directory_uri() . '/assets/images/slider1.png');
        $restaurant_culinary_defaults['restaurant_culinary_banner_right_image_2']                    = esc_url(get_template_directory_uri() . '/assets/images/slider2.png');
        $restaurant_culinary_defaults['restaurant_culinary_banner_right_image_3']                    = esc_url(get_template_directory_uri() . '/assets/images/slider3.png');

        $restaurant_culinary_defaults['restaurant_culinary_about_us_right_image_1']                    = esc_url(get_template_directory_uri() . '/assets/images/about1.png');
        $restaurant_culinary_defaults['restaurant_culinary_about_us_right_image_2']                    = esc_url(get_template_directory_uri() . '/assets/images/about2.png');
        $restaurant_culinary_defaults['restaurant_culinary_about_us_right_image_3']                    = esc_url(get_template_directory_uri() . '/assets/images/about3.png');
        

        //About Us
        
        $restaurant_culinary_defaults['restaurant_culinary_header_about_us']                   = 1;
        $restaurant_culinary_defaults['restaurant_culinary_display_footer']            = 0;
        $restaurant_culinary_defaults['restaurant_culinary_footer_widget_title_alignment']                 = 'left'; 
        $restaurant_culinary_defaults['restaurant_culinary_show_hide_related_product']          = 1;
        $restaurant_culinary_defaults['restaurant_culinary_display_archive_post_image']            = 1;
        $restaurant_culinary_defaults['restaurant_culinary_about_us_section_title']            = esc_html__( 'Highlight', 'restaurant-culinary' );
        $restaurant_culinary_defaults['restaurant_culinary_about_us_section_sub_title']        = esc_html__( 'The magic of the kitchen', 'restaurant-culinary' );
        $restaurant_culinary_defaults['restaurant_culinary_about_us_section_content']          = esc_html__( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, industry\'s standard dummy text ever since the.', 'restaurant-culinary' );
        $restaurant_culinary_defaults['restaurant_culinary_about_section_button']              = esc_html__( 'Learn More', 'restaurant-culinary' );
        $restaurant_culinary_defaults['restaurant_culinary_about_section_button_url']          = esc_url( '#', 'restaurant-culinary' );



	// Pass through filter.
	$restaurant_culinary_defaults = apply_filters( 'restaurant_culinary_filter_default_theme_options', $restaurant_culinary_defaults );

		return $restaurant_culinary_defaults;
	}
endif;
