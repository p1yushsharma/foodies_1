<?php

$restaurant_culinary_custom_css = "";

	$restaurant_culinary_theme_pagination_options_alignment = get_theme_mod('restaurant_culinary_theme_pagination_options_alignment', 'Center');
	if ($restaurant_culinary_theme_pagination_options_alignment == 'Center') {
		$restaurant_culinary_custom_css .= '.navigation.pagination,.navigation.posts-navigation .nav-links{';
		$restaurant_culinary_custom_css .= 'justify-content: center;margin: 0 auto;';
		$restaurant_culinary_custom_css .= '}';
	} else if ($restaurant_culinary_theme_pagination_options_alignment == 'Right') {
		$restaurant_culinary_custom_css .= '.navigation.pagination,.navigation.posts-navigation .nav-links{';
		$restaurant_culinary_custom_css .= 'justify-content: right;margin: 0 0 0 auto;';
		$restaurant_culinary_custom_css .= '}';
	} else if ($restaurant_culinary_theme_pagination_options_alignment == 'Left') {
		$restaurant_culinary_custom_css .= '.navigation.pagination,.navigation.posts-navigation .nav-links{';
		$restaurant_culinary_custom_css .= 'justify-content: left;margin: 0 auto 0 0;';
		$restaurant_culinary_custom_css .= '}';
	}

	$restaurant_culinary_theme_breadcrumb_enable = get_theme_mod('restaurant_culinary_theme_breadcrumb_enable',true);
    if($restaurant_culinary_theme_breadcrumb_enable != true){
        $restaurant_culinary_custom_css .='nav.breadcrumb-trail.breadcrumbs,nav.woocommerce-breadcrumb{';
            $restaurant_culinary_custom_css .='display: none;';
        $restaurant_culinary_custom_css .='}';
    }

	$restaurant_culinary_theme_breadcrumb_options_alignment = get_theme_mod('restaurant_culinary_theme_breadcrumb_options_alignment', 'Left');
	if ($restaurant_culinary_theme_breadcrumb_options_alignment == 'Center') {
	    $restaurant_culinary_custom_css .= '.breadcrumbs ul,nav.woocommerce-breadcrumb{';
	    $restaurant_culinary_custom_css .= 'text-align: center !important;';
	    $restaurant_culinary_custom_css .= '}';
	} else if ($restaurant_culinary_theme_breadcrumb_options_alignment == 'Right') {
	    $restaurant_culinary_custom_css .= '.breadcrumbs ul,nav.woocommerce-breadcrumb{';
	    $restaurant_culinary_custom_css .= 'text-align: Right !important;';
	    $restaurant_culinary_custom_css .= '}';
	} else if ($restaurant_culinary_theme_breadcrumb_options_alignment == 'Left') {
	    $restaurant_culinary_custom_css .= '.breadcrumbs ul,nav.woocommerce-breadcrumb{';
	    $restaurant_culinary_custom_css .= 'text-align: Left !important;';
	    $restaurant_culinary_custom_css .= '}';
	}

	$restaurant_culinary_single_page_content_alignment = get_theme_mod('restaurant_culinary_single_page_content_alignment', 'left');
	if ($restaurant_culinary_single_page_content_alignment == 'left') {
	    $restaurant_culinary_custom_css .= '#single-page .type-page,section.theme-custom-block.theme-error-sectiontheme-error-section.error-block-middle,section.theme-custom-block.theme-error-section.error-block-heading .theme-area-header{';
	    $restaurant_culinary_custom_css .= 'text-align: left !important;';
	    $restaurant_culinary_custom_css .= '}';
	} else if ($restaurant_culinary_single_page_content_alignment == 'center') {
	    $restaurant_culinary_custom_css .= '#single-page .type-page,section.theme-custom-block.theme-error-sectiontheme-error-section.error-block-middle,section.theme-custom-block.theme-error-section.error-block-heading .theme-area-header{';
	    $restaurant_culinary_custom_css .= 'text-align: center !important;';
	    $restaurant_culinary_custom_css .= '}';
	} else if ($restaurant_culinary_single_page_content_alignment == 'right') {
	    $restaurant_culinary_custom_css .= '#single-page .type-page,section.theme-custom-block.theme-error-sectiontheme-error-section.error-block-middle,section.theme-custom-block.theme-error-section.error-block-heading .theme-area-header{';
	    $restaurant_culinary_custom_css .= 'text-align: right !important;';
	    $restaurant_culinary_custom_css .= '}';
	}

	$restaurant_culinary_single_post_content_alignment = get_theme_mod('restaurant_culinary_single_post_content_alignment', 'left');
	if ($restaurant_culinary_single_post_content_alignment == 'left') {
	    $restaurant_culinary_custom_css .= '#single-page .type-post,#single-page .type-post .entry-meta,#single-page .type-post .is-layout-flex{';
	    $restaurant_culinary_custom_css .= 'text-align: left !important;justify-content: left;';
	    $restaurant_culinary_custom_css .= '}';
	} else if ($restaurant_culinary_single_post_content_alignment == 'center') {
	    $restaurant_culinary_custom_css .= '#single-page .type-post,#single-page .type-post .entry-meta,#single-page .type-post .is-layout-flex{';
	    $restaurant_culinary_custom_css .= 'text-align: center !important;justify-content: center;';
	    $restaurant_culinary_custom_css .= '}';
	} else if ($restaurant_culinary_single_post_content_alignment == 'right') {
	    $restaurant_culinary_custom_css .= '#single-page .type-post,#single-page .type-post .entry-meta,#single-page .type-post .is-layout-flex{';
	    $restaurant_culinary_custom_css .= 'text-align: right !important;justify-content: right;';
	    $restaurant_culinary_custom_css .= '}';
	}

	$restaurant_culinary_menu_text_transform = get_theme_mod('restaurant_culinary_menu_text_transform', 'Capitalize');
	if ($restaurant_culinary_menu_text_transform == 'Capitalize') {
	    $restaurant_culinary_custom_css .= '.site-navigation .primary-menu > li a{';
	    $restaurant_culinary_custom_css .= 'text-transform: Capitalize !important;';
	    $restaurant_culinary_custom_css .= '}';
	} else if ($restaurant_culinary_menu_text_transform == 'uppercase') {
	    $restaurant_culinary_custom_css .= '.site-navigation .primary-menu > li a{';
	    $restaurant_culinary_custom_css .= 'text-transform: uppercase !important;';
	    $restaurant_culinary_custom_css .= '}';
	} else if ($restaurant_culinary_menu_text_transform == 'lowercase') {
	    $restaurant_culinary_custom_css .= '.site-navigation .primary-menu > li a{';
	    $restaurant_culinary_custom_css .= 'text-transform: lowercase !important;';
	    $restaurant_culinary_custom_css .= '}';
	}

	$restaurant_culinary_footer_widget_title_alignment = get_theme_mod('restaurant_culinary_footer_widget_title_alignment', 'left');
	if ($restaurant_culinary_footer_widget_title_alignment == 'left') {
	    $restaurant_culinary_custom_css .= 'h2.widget-title{';
	    $restaurant_culinary_custom_css .= 'text-align: left !important;';
	    $restaurant_culinary_custom_css .= '}';
	} else if ($restaurant_culinary_footer_widget_title_alignment == 'center') {
	    $restaurant_culinary_custom_css .= 'h2.widget-title{';
	    $restaurant_culinary_custom_css .= 'text-align: center !important;';
	    $restaurant_culinary_custom_css .= '}';
	} else if ($restaurant_culinary_footer_widget_title_alignment == 'right') {
	    $restaurant_culinary_custom_css .= 'h2.widget-title{';
	    $restaurant_culinary_custom_css .= 'text-align: right !important;';
	    $restaurant_culinary_custom_css .= '}';
	}

    $restaurant_culinary_show_hide_related_product = get_theme_mod('restaurant_culinary_show_hide_related_product',true);
    if($restaurant_culinary_show_hide_related_product != true){
        $restaurant_culinary_custom_css .='.related.products{';
            $restaurant_culinary_custom_css .='display: none;';
        $restaurant_culinary_custom_css .='}';
    }

	/*-------------------- Global First Color -------------------*/

	$restaurant_culinary_global_color = get_theme_mod('restaurant_culinary_global_color', '#50A96E');

	if ($restaurant_culinary_global_color) {
		$restaurant_culinary_custom_css .= ':root {';
		$restaurant_culinary_custom_css .= '--global-color: ' . esc_attr($restaurant_culinary_global_color) . ';';
		$restaurant_culinary_custom_css .= '}';
	}	

	/*-------------------- Content Font -------------------*/

	$restaurant_culinary_content_typography_font = get_theme_mod('restaurant_culinary_content_typography_font', 'Lato'); // Add a fallback if the color isn't set

	if ($restaurant_culinary_content_typography_font) {
		$restaurant_culinary_custom_css .= ':root {';
		$restaurant_culinary_custom_css .= '--font-main: ' . esc_attr($restaurant_culinary_content_typography_font) . ';';
		$restaurant_culinary_custom_css .= '}';
	}

	/*-------------------- Heading Font -------------------*/

	$restaurant_culinary_heading_typography_font = get_theme_mod('restaurant_culinary_heading_typography_font', 'Lato'); // Add a fallback if the color isn't set

	if ($restaurant_culinary_heading_typography_font) {
		$restaurant_culinary_custom_css .= ':root {';
		$restaurant_culinary_custom_css .= '--font-head: ' . esc_attr($restaurant_culinary_heading_typography_font) . ';';
		$restaurant_culinary_custom_css .= '}';
	}