<?php
/**
 * Bakery Treats Theme Customizer
 *
 * @package Bakery Treats
 */

function Bakery_Treats_Customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'Bakery_Treats_Customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'Bakery_Treats_Customize_partial_blogdescription',
			)
		);
	}

	/*
    * Theme Options Panel
    */
	$wp_customize->add_panel('bakery_treats_panel', array(
		'priority' => 25,
		'capability' => 'edit_theme_options',
		'title' => __('Bakery Treats Theme Options', 'bakery-treats'),
	));

	/*
	* Customizer main header section
	*/

	$wp_customize->add_setting(
		'bakery_treats_site_title_text',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => 1,
			'sanitize_callback' => 'bakery_treats_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'bakery_treats_site_title_text',
		array(
			'label'       => __('Enable Title', 'bakery-treats'),
			'description' => __('Enable or Disable Title from the site', 'bakery-treats'),
			'section'     => 'title_tagline',
			'type'        => 'checkbox',
		)
	);

	$wp_customize->add_setting(
		'bakery_treats_site_tagline_text',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => 0,
			'sanitize_callback' => 'bakery_treats_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'bakery_treats_site_tagline_text',
		array(
			'label'       => __('Enable Tagline', 'bakery-treats'),
			'description' => __('Enable or Disable Tagline from the site', 'bakery-treats'),
			'section'     => 'title_tagline',
			'type'        => 'checkbox',
		)
	);

		$wp_customize->add_setting(
		'bakery_treats_logo_width',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => '150',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'bakery_treats_logo_width',
		array(
			'label'       => __('Logo Width in PX', 'bakery-treats'),
			'section'     => 'title_tagline',
			'type'        => 'number',
			'input_attrs' => array(
	            'min' => 100,
	             'max' => 300,
	             'step' => 1,
	         ),
		)
	);

	/* WooCommerce custom settings */

	$wp_customize->add_section('woocommerce_custom_settings', array(
		'priority'       => 5,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => __('WooCommerce Custom Settings', 'bakery-treats'),
		'panel'       => 'woocommerce',
	));

	$wp_customize->add_setting(
		'bakery_treats_per_columns',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => '3',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'bakery_treats_per_columns',
		array(
			'label'       => __('Product Per Single Row', 'bakery-treats'),
			'section'     => 'woocommerce_custom_settings',
			'type'        => 'number',
			'input_attrs' => array(
	            'min' => 1,
	             'max' => 4,
	             'step' => 1,
	         ),
		)
	);

	$wp_customize->add_setting(
		'bakery_treats_product_per_page',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => '6',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'bakery_treats_product_per_page',
		array(
			'label'       => __('Product Per One Page', 'bakery-treats'),
			'section'     => 'woocommerce_custom_settings',
			'type'        => 'number',
			'input_attrs' => array(
	            'min' => 1,
	             'max' => 12,
	             'step' => 1,
	         ),
		)
	);

	/*Related Products Enable Option*/
	$wp_customize->add_setting(
		'bakery_treats_enable_related_product',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => 1,
			'sanitize_callback' => 'bakery_treats_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'bakery_treats_enable_related_product',
		array(
			'label'       => __('Enable Related Product', 'bakery-treats'),
			'description' => __('Checked to show Related Product', 'bakery-treats'),
			'section'     => 'woocommerce_custom_settings',
			'type'        => 'checkbox',
		)
	);

	$wp_customize->add_setting(
		'custom_related_products_number',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => '3',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'custom_related_products_number',
		array(
			'label'       => __('Related Product Count', 'bakery-treats'),
			'section'     => 'woocommerce_custom_settings',
			'type'        => 'number',
			'input_attrs' => array(
	            'min' => 1,
	             'max' => 20,
	             'step' => 1,
	         ),
		)
	);

	$wp_customize->add_setting(
		'custom_related_products_number_per_row',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => '3',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'custom_related_products_number_per_row',
		array(
			'label'       => __('Related Product Per Row', 'bakery-treats'),
			'section'     => 'woocommerce_custom_settings',
			'type'        => 'number',
			'input_attrs' => array(
	            'min' => 1,
	             'max' => 4,
	             'step' => 1,
	         ),
		)
	);

	/*Archive Product layout*/
	$wp_customize->add_setting('bakery_treats_archive_product_layout',array(
        'default' => 'layout-1',
        'sanitize_callback' => 'bakery_treats_sanitize_choices'
	));
	$wp_customize->add_control('bakery_treats_archive_product_layout',array(
        'type' => 'select',
        'label' => esc_html__('Archive Product Layout','bakery-treats'),
        'section' => 'woocommerce_custom_settings',
        'choices' => array(
            'layout-1' => esc_html__('Sidebar On Right','bakery-treats'),
            'layout-2' => esc_html__('Sidebar On Left','bakery-treats')
        ),
	) );

	/*Single Product layout*/
	$wp_customize->add_setting('bakery_treats_single_product_layout',array(
        'default' => 'layout-1',
        'sanitize_callback' => 'bakery_treats_sanitize_choices'
	));
	$wp_customize->add_control('bakery_treats_single_product_layout',array(
        'type' => 'select',
        'label' => esc_html__('Single Product Layout','bakery-treats'),
        'section' => 'woocommerce_custom_settings',
        'choices' => array(
            'layout-1' => esc_html__('Sidebar On Right','bakery-treats'),
            'layout-2' => esc_html__('Sidebar On Left','bakery-treats')
        ),
	) );

	$wp_customize->add_setting('bakery_treats_woocommerce_product_sale',array(
		'capability'        => 'edit_theme_options',
		'transport'         => 'refresh',
        'default'           => 'Right',
        'sanitize_callback' => 'bakery_treats_sanitize_choices'
    ));
    $wp_customize->add_control('bakery_treats_woocommerce_product_sale',array(
        'label'       => esc_html__( 'Woocommerce Product Sale Positions','bakery-treats' ),
        'type' => 'select',
        'section' => 'woocommerce_custom_settings',
        'choices' => array(
            'Right' => __('Right','bakery-treats'),
            'Left' => __('Left','bakery-treats'),
            'Center' => __('Center','bakery-treats')
        ),
    ) );

	/*Additional Options*/
	$wp_customize->add_section('bakery_treats_additional_section', array(
		'priority'       => 5,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => __('Additional Options', 'bakery-treats'),
		'panel'       => 'bakery_treats_panel',
	));

	/*Main Slider Enable Option*/
	$wp_customize->add_setting(
		'bakery_treats_enable_sticky_header',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => false,
			'sanitize_callback' => 'bakery_treats_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'bakery_treats_enable_sticky_header',
		array(
			'label'       => __('Enable Sticky Header', 'bakery-treats'),
			'description' => __('Checked to enable sticky header', 'bakery-treats'),
			'section'     => 'bakery_treats_additional_section',
			'type'        => 'checkbox',
		)
	);

	/*Main Slider Enable Option*/
	$wp_customize->add_setting(
		'bakery_treats_enable_preloader',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => 0,
			'sanitize_callback' => 'bakery_treats_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'bakery_treats_enable_preloader',
		array(
			'label'       => __('Enable Preloader', 'bakery-treats'),
			'description' => __('Checked to show preloader', 'bakery-treats'),
			'section'     => 'bakery_treats_additional_section',
			'type'        => 'checkbox',
		)
	);

	/*Post layout*/
	$wp_customize->add_setting('bakery_treats_archive_layout',array(
        'default' => 'layout-1',
        'sanitize_callback' => 'bakery_treats_sanitize_choices'
	));
	$wp_customize->add_control('bakery_treats_archive_layout',array(
        'type' => 'select',
        'label' => esc_html__('Posts Layout','bakery-treats'),
        'section' => 'bakery_treats_additional_section',
        'choices' => array(
            'layout-1' => esc_html__('Sidebar On Right','bakery-treats'),
            'layout-2' => esc_html__('Sidebar On Left','bakery-treats')
        ),
	) );

	/*single post layout*/
	$wp_customize->add_setting('bakery_treats_post_layout',array(
        'default' => 'layout-1',
        'sanitize_callback' => 'bakery_treats_sanitize_choices'
	));
	$wp_customize->add_control('bakery_treats_post_layout',array(
        'type' => 'select',
        'label' => esc_html__('Single Post Layout','bakery-treats'),
        'section' => 'bakery_treats_additional_section',
        'choices' => array(
            'layout-1' => esc_html__('Sidebar On Right','bakery-treats'),
            'layout-2' => esc_html__('Sidebar On Left','bakery-treats')
        ),
	) );

	/*single page layout*/
	$wp_customize->add_setting('bakery_treats_Page_layout',array(
        'default' => 'layout-1',
        'sanitize_callback' => 'bakery_treats_sanitize_choices'
	));
	$wp_customize->add_control('bakery_treats_Page_layout',array(
        'type' => 'select',
        'label' => esc_html__('Single Page Layout','bakery-treats'),
        'section' => 'bakery_treats_additional_section',
        'choices' => array(
            'layout-1' => esc_html__('Sidebar On Right','bakery-treats'),
            'layout-2' => esc_html__('Sidebar On Left','bakery-treats')
        ),
	) );

	/*Archive Post Options*/
	$wp_customize->add_section('bakery_treats_blog_post_section', array(
		'priority'       => 5,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => __('Blog Page Options', 'bakery-treats'),
		'panel'       => 'bakery_treats_panel',
	));

	$wp_customize->add_setting('bakery_treats_enable_blog_post_title',array(
		'capability'        => 'edit_theme_options',
		'transport'         => 'refresh',
		'default'           => 1,
		'sanitize_callback' => 'bakery_treats_sanitize_checkbox',
	));
	$wp_customize->add_control('bakery_treats_enable_blog_post_title',array(
		'label'       => __('Enable Blog Post Title', 'bakery-treats'),
		'description' => __('Checked To Show Blog Post Title', 'bakery-treats'),
		'section'     => 'bakery_treats_blog_post_section',
		'type'        => 'checkbox',
	));

	$wp_customize->add_setting('bakery_treats_enable_blog_post_meta',array(
		'capability'        => 'edit_theme_options',
		'transport'         => 'refresh',
		'default'           => 1,
		'sanitize_callback' => 'bakery_treats_sanitize_checkbox',
	));
	$wp_customize->add_control('bakery_treats_enable_blog_post_meta',array(
		'label'       => __('Enable Blog Post Meta', 'bakery-treats'),
		'description' => __('Checked To Show Blog Post Meta Feilds', 'bakery-treats'),
		'section'     => 'bakery_treats_blog_post_section',
		'type'        => 'checkbox',
	));

	$wp_customize->add_setting('bakery_treats_enable_blog_post_image',array(
		'capability'        => 'edit_theme_options',
		'transport'         => 'refresh',
		'default'           => 1,
		'sanitize_callback' => 'bakery_treats_sanitize_checkbox',
	));
	$wp_customize->add_control('bakery_treats_enable_blog_post_image',array(
		'label'       => __('Enable Blog Post Image', 'bakery-treats'),
		'description' => __('Checked To Show Blog Post Image', 'bakery-treats'),
		'section'     => 'bakery_treats_blog_post_section',
		'type'        => 'checkbox',
	));

	$wp_customize->add_setting('bakery_treats_enable_blog_post_content',array(
		'capability'        => 'edit_theme_options',
		'transport'         => 'refresh',
		'default'           => 1,
		'sanitize_callback' => 'bakery_treats_sanitize_checkbox',
	));
	$wp_customize->add_control('bakery_treats_enable_blog_post_content',array(
		'label'       => __('Enable Blog Post Content', 'bakery-treats'),
		'description' => __('Checked To Show Blog Post Content', 'bakery-treats'),
		'section'     => 'bakery_treats_blog_post_section',
		'type'        => 'checkbox',
	));

	$wp_customize->add_setting('bakery_treats_enable_blog_post_button',array(
		'capability'        => 'edit_theme_options',
		'transport'         => 'refresh',
		'default'           => 1,
		'sanitize_callback' => 'bakery_treats_sanitize_checkbox',
	));
	$wp_customize->add_control('bakery_treats_enable_blog_post_button',array(
		'label'       => __('Enable Blog Post Read More Button', 'bakery-treats'),
		'description' => __('Checked To Show Blog Post Read More Button', 'bakery-treats'),
		'section'     => 'bakery_treats_blog_post_section',
		'type'        => 'checkbox',
	));

	/*Blog post Content layout*/
	$wp_customize->add_setting('bakery_treats_blog_Post_content_layout',array(
        'default' => 'Left',
        'sanitize_callback' => 'bakery_treats_sanitize_choices'
	));
	$wp_customize->add_control('bakery_treats_blog_Post_content_layout',array(
        'type' => 'select',
        'label' => esc_html__('Blog Post Content Layout','bakery-treats'),
        'section' => 'bakery_treats_blog_post_section',
        'choices' => array(
            'Left' => esc_html__('Left','bakery-treats'),
            'Center' => esc_html__('Center','bakery-treats'),
            'Right' => esc_html__('Right','bakery-treats')
        ),
	) );

	/*Excerpt*/
    $wp_customize->add_setting(
		'bakery_treats_excerpt_limit',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => '25',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'bakery_treats_excerpt_limit',
		array(
			'label'       => __('Excerpt Limit', 'bakery-treats'),
			'section'     => 'bakery_treats_blog_post_section',
			'type'        => 'number',
			'input_attrs' => array(
	            'min' => 2,
	             'max' => 50,
	             'step' => 2,
	         ),
		)
	);

	/*Archive Button Text*/
	$wp_customize->add_setting(
		'bakery_treats_read_more_text',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => 'Continue Reading....',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'bakery_treats_read_more_text',
		array(
			'label'       => __('Edit Button Text ', 'bakery-treats'),
			'section'     => 'bakery_treats_blog_post_section',
			'type'        => 'text',
		)
	);

	/*Single Post Options*/
	$wp_customize->add_section('bakery_treats_single_post_section', array(
		'priority'       => 5,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => __('Single Post Options', 'bakery-treats'),
		'panel'       => 'bakery_treats_panel',
	));

	$wp_customize->add_setting('bakery_treats_enable_single_post_image',array(
		'capability'        => 'edit_theme_options',
		'transport'         => 'refresh',
		'default'           => 1,
		'sanitize_callback' => 'bakery_treats_sanitize_checkbox',
	));
	$wp_customize->add_control('bakery_treats_enable_single_post_image',array(
		'label'       => __('Enable Blog Post Image', 'bakery-treats'),
		'description' => __('Checked To Show Single Post Image', 'bakery-treats'),
		'section'     => 'bakery_treats_single_post_section',
		'type'        => 'checkbox',
	));

	/*Related Post Enable Option*/
	$wp_customize->add_setting(
		'bakery_treats_enable_related_post',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => 1,
			'sanitize_callback' => 'bakery_treats_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'bakery_treats_enable_related_post',
		array(
			'label'       => __('Enable Related Post', 'bakery-treats'),
			'description' => __('Checked to show Related Post', 'bakery-treats'),
			'section'     => 'bakery_treats_single_post_section',
			'type'        => 'checkbox',
		)
	);

	/*Related post Edit Text*/
	$wp_customize->add_setting(
		'bakery_treats_related_post_text',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => 'Related Post',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'bakery_treats_related_post_text',
		array(
			'label'       => __('Edit Related Post Text ', 'bakery-treats'),
			'section'     => 'bakery_treats_single_post_section',
			'type'        => 'text',
		)
	);	

	/*Related Post Per Page*/
	$wp_customize->add_setting(
		'bakery_treats_related_post_count',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => '3',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'bakery_treats_related_post_count',
		array(
			'label'       => __('Related Post Count', 'bakery-treats'),
			'section'     => 'bakery_treats_single_post_section',
			'type'        => 'number',
			'input_attrs' => array(
	            'min' => 1,
	             'max' => 9,
	             'step' => 1,
	         ),
		)
	);

		/*
	* Customizer Global COlor
	*/

	/*Global Color Options*/
	$wp_customize->add_section('bakery_treats_global_color_section', array(
		'priority'       => 5,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => __('Global Color Options', 'bakery-treats'),
		'panel'       => 'bakery_treats_panel',
	));

	$wp_customize->add_setting( 'bakery_treats_primary_color',
		array(
		'default'           => '#F636AC',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control( 
		new WP_Customize_Color_Control( 
		$wp_customize, 
		'bakery_treats_primary_color',
		array(
			'label'      => esc_html__( 'Primary Color', 'bakery-treats' ),
			'section'    => 'bakery_treats_global_color_section',
			'settings'   => 'bakery_treats_primary_color',
		) ) 
	);

	$wp_customize->add_setting( 'bakery_treats_secondary_color',
		array(
		'default'           => '#000',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control( 
		new WP_Customize_Color_Control( 
		$wp_customize, 
		'bakery_treats_secondary_color',
		array(
			'label'      => esc_html__( 'Secondary Color', 'bakery-treats' ),
			'section'    => 'bakery_treats_global_color_section',
			'settings'   => 'bakery_treats_secondary_color',
		) ) 
	);



	/*** Customizer main header section ***/

	/*Main Header Options*/
	$wp_customize->add_section('bakery_treats_header_section', array(
		'priority'       => 5,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => __('Main Header Options', 'bakery-treats'),
		'panel'       => 'bakery_treats_panel',
	));

	$wp_customize->add_setting(
		'bakery_treats_header_info_phone_text',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'bakery_treats_header_info_phone_text',
		array(
			'label'       => __('Edit Phone Text ', 'bakery-treats'),
			'section'     => 'bakery_treats_header_section',
			'type'        => 'text',
		)
	);

	/*Main Header Phone Text*/
	$wp_customize->add_setting(
		'bakery_treats_header_info_phone',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'bakery_treats_header_info_phone',
		array(
			'label'       => __('Edit Phone Number ', 'bakery-treats'),
			'section'     => 'bakery_treats_header_section',
			'type'        => 'text',
		)
	);

	$wp_customize->add_setting(
		'bakery_treats_header_info_email_text',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'bakery_treats_header_info_email_text',
		array(
			'label'       => __('Edit Email Text ', 'bakery-treats'),
			'section'     => 'bakery_treats_header_section',
			'type'        => 'text',
		)
	);

	/*Main Header Phone Text*/
	$wp_customize->add_setting(
		'bakery_treats_header_info_email',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'bakery_treats_header_info_email',
		array(
			'label'       => __('Edit Email Address ', 'bakery-treats'),
			'section'     => 'bakery_treats_header_section',
			'type'        => 'text',
		)
	);

	
	$wp_customize->add_setting(
		'bakery_treats_header_search',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => false,
			'sanitize_callback' => 'bakery_treats_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'bakery_treats_header_search',
		array(
			'label'       => __('Enable Disable Search', 'bakery-treats'),
			'description' => __('Enable or Disable header Search', 'bakery-treats'),
			'section'     => 'bakery_treats_header_section',
			'type'        => 'checkbox',
		)
	);

	/*
	* Customizer main slider section
	*/
	/*Main Slider Options*/
	$wp_customize->add_section('bakery_treats_slider_section', array(
		'priority'       => 5,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => __('Main Slider Options', 'bakery-treats'),
		'panel'       => 'bakery_treats_panel',
	));

	/*Main Slider Enable Option*/
	$wp_customize->add_setting(
		'bakery_treats_enable_slider',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => 0,
			'sanitize_callback' => 'bakery_treats_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'bakery_treats_enable_slider',
		array(
			'label'       => __('Enable Main Slider', 'bakery-treats'),
			'description' => __('Checked to show the main slider', 'bakery-treats'),
			'section'     => 'bakery_treats_slider_section',
			'type'        => 'checkbox',
		)
	);

	for ($i=1; $i <= 3; $i++) { 

		/*Main Slider Image*/
		$wp_customize->add_setting(
			'bakery_treats_slider_image'.$i,
			array(
				'capability'    => 'edit_theme_options',
		        'default'       => '',
		        'transport'     => 'postMessage',
		        'sanitize_callback' => 'esc_url_raw',
	    	)
	    );

		$wp_customize->add_control( 
			new WP_Customize_Image_Control( $wp_customize, 
				'bakery_treats_slider_image'.$i, 
				array(
			        'label' => __('Edit Slider Image ', 'bakery-treats') .$i,
			        'description' => __('Edit the slider image.', 'bakery-treats'),
			        'section' => 'bakery_treats_slider_section',
				)
			)
		);

		/*Main Slider Heading*/
		$wp_customize->add_setting(
			'bakery_treats_slider_top_text'.$i,
			array(
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'default'           => '',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control(
			'bakery_treats_slider_top_text'.$i,
			array(
				'label'       => __('Edit Slider Top Text ', 'bakery-treats') .$i,
				'description' => __('Edit the slider Top text.', 'bakery-treats'),
				'section'     => 'bakery_treats_slider_section',
				'type'        => 'text',
			)
		);

		/*Main Slider Heading*/
		$wp_customize->add_setting(
			'bakery_treats_slider_heading'.$i,
			array(
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'default'           => '',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control(
			'bakery_treats_slider_heading'.$i,
			array(
				'label'       => __('Edit Heading Text ', 'bakery-treats') .$i,
				'description' => __('Edit the slider heading text.', 'bakery-treats'),
				'section'     => 'bakery_treats_slider_section',
				'type'        => 'text',
			)
		);
	}
		/*Main Slider Content*/
		$wp_customize->add_setting(
			'bakery_treats_add_phone_number',
			array(
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'default'           => '',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control(
			'bakery_treats_add_phone_number',
			array(
				'label'       => __('Add Phone Number to Book a Table ', 'bakery-treats'),
				'description' => __('Edit the slider content text.', 'bakery-treats'),
				'section'     => 'bakery_treats_slider_section',
				'type'        => 'text',
			)
		);

		/*Main Slider Content*/
		$wp_customize->add_setting(
			'bakery_treats_bakery_opening_time',
			array(
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'default'           => '',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control(
			'bakery_treats_bakery_opening_time',
			array(
				'label'       => __('Add Opening Hour', 'bakery-treats'),
				'description' => __('Edit the slider content text.', 'bakery-treats'),
				'section'     => 'bakery_treats_slider_section',
				'type'        => 'text',
			)
		);


	/*
	* Customizer Our Special Products section
	*/
	/*New Arrivals Options*/
	$wp_customize->add_section('bakery_treats_arrivals_section', array(
		'priority'       => 5,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => __('Our Special Products Option', 'bakery-treats'),
		'panel'       => 'bakery_treats_panel',
	));

	/*New Arrivals Enable Option*/
	$wp_customize->add_setting(
		'bakery_treats_enable_new_arrivals',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => 1,
			'sanitize_callback' => 'bakery_treats_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'bakery_treats_enable_new_arrivals',
		array(
			'label'       => __('Enable Our Special Products Section', 'bakery-treats'),
			'description' => __('Checked to show the category', 'bakery-treats'),
			'section'     => 'bakery_treats_arrivals_section',
			'type'        => 'checkbox',
		)
	);

	/*Our Special Products Heading 2*/
	$wp_customize->add_setting(
		'bakery_treats_new_arrivals_top_heading',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'bakery_treats_new_arrivals_top_heading',
		array(
			'label'       => __('Edit Section Top Heading', 'bakery-treats'),
			'description' => __('Edit section top heading', 'bakery-treats'),
			'section'     => 'bakery_treats_arrivals_section',
			'type'        => 'text',
		)
	);

	/*Our Special Products Heading*/
	$wp_customize->add_setting(
		'bakery_treats_new_arrivals_heading',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'bakery_treats_new_arrivals_heading',
		array(
			'label'       => __('Edit Section Heading', 'bakery-treats'),
			'description' => __('Edit section main heading', 'bakery-treats'),
			'section'     => 'bakery_treats_arrivals_section',
			'type'        => 'text',
		)
	);

	/*Our Special Products Products*/
	$args = array(
       'type'      => 'product',
        'taxonomy' => 'product_cat'
    );
	$categories = get_categories($args);
		$cat_posts = array();
			$i = 0;
			$cat_posts[]='Select';
		foreach($categories as $category){
			if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_posts[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('bakery_treats_product_category',array(
		'sanitize_callback' => 'bakery_treats_sanitize_choices',
	));
	$wp_customize->add_control('bakery_treats_product_category',array(
		'type'    => 'select',
		'choices' => $cat_posts,
		'label' => __('Select Product Category','bakery-treats'),
		'section' => 'bakery_treats_arrivals_section',
	));

	/*
	* Customizer Footer Section
	*/
	/*Footer Options*/
	$wp_customize->add_section('bakery_treats_footer_section', array(
		'priority'       => 5,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => __('Footer Options', 'bakery-treats'),
		'panel'       => 'bakery_treats_panel',
	));

	/*Footer Enable Option*/
	$wp_customize->add_setting(
		'bakery_treats_enable_footer',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => 1,
			'sanitize_callback' => 'bakery_treats_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'bakery_treats_enable_footer',
		array(
			'label'       => __('Enable Footer', 'bakery-treats'),
			'description' => __('Checked to show Footer', 'bakery-treats'),
			'section'     => 'bakery_treats_footer_section',
			'type'        => 'checkbox',
		)
	);

	/*Footer bg image Option*/
	$wp_customize->add_setting('bakery_treats_footer_bg_image',array(
		'capability'        => 'edit_theme_options',
		'transport'         => 'refresh',
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'bakery_treats_footer_bg_image',array(
        'label' => __('Footer Background Image','bakery-treats'),
        'section' => 'bakery_treats_footer_section',
        'priority' => 1,
    )));

	/*Footer Social Menu Option*/
	$wp_customize->add_setting(
		'bakery_treats_footer_social_menu',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => 1,
			'sanitize_callback' => 'bakery_treats_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'bakery_treats_footer_social_menu',
		array(
			'label'       => __('Enable Footer Social Menu', 'bakery-treats'),
			'description' => __('Checked to show the footer social menu. Go to Dashboard >> Appearance >> Menus >> Create New Menu >> Add Custom Link >> Add Social Menu >> Checked Social Menu >> Save Menu.', 'bakery-treats'),
			'section'     => 'bakery_treats_footer_section',
			'type'        => 'checkbox',
		)
	);	

	/*Go To Top Option*/
	$wp_customize->add_setting(
		'bakery_treats_enable_go_to_top_option',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => 1,
			'sanitize_callback' => 'bakery_treats_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'bakery_treats_enable_go_to_top_option',
		array(
			'label'       => __('Enable Go To Top', 'bakery-treats'),
			'description' => __('Checked to enable Go To Top option.', 'bakery-treats'),
			'section'     => 'bakery_treats_footer_section',
			'type'        => 'checkbox',
		)
	);

	$wp_customize->add_setting('bakery_treats_go_to_top_position',array(
        'capability'        => 'edit_theme_options',
		'transport'         => 'refresh',
		'default'           => 'Right',
        'sanitize_callback' => 'bakery_treats_sanitize_choices'
    ));
    $wp_customize->add_control('bakery_treats_go_to_top_position',array(
        'type' => 'select',
        'section' => 'bakery_treats_footer_section',
        'label' => esc_html__('Go To Top Positions','bakery-treats'),
        'choices' => array(
            'Right' => __('Right','bakery-treats'),
            'Left' => __('Left','bakery-treats'),
            'Center' => __('Center','bakery-treats')
        ),
    ) );

	/*Footer Copyright Text Enable*/
	$wp_customize->add_setting(
		'bakery_treats_copyright_option',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'bakery_treats_copyright_option',
		array(
			'label'       => __('Edit Copyright Text', 'bakery-treats'),
			'description' => __('Edit the Footer Copyright Section.', 'bakery-treats'),
			'section'     => 'bakery_treats_footer_section',
			'type'        => 'text',
		)
	);
}
add_action( 'customize_register', 'Bakery_Treats_Customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function Bakery_Treats_Customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function Bakery_Treats_Customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function Bakery_Treats_Customize_preview_js() {
	wp_enqueue_script( 'bakery-treats-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), BAKERY_TREATS_VERSION, true );
}
add_action( 'customize_preview_init', 'Bakery_Treats_Customize_preview_js' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Bakery_Treats_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	*/
	public function sections( $manager ) {
		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/revolution/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'bakery_treats_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section( new Bakery_Treats_Customize_Section_Pro( $manager,'bakery_treats_go_pro', array(
			'priority'   => 1,
			'title'    => esc_html__( 'Bakery Treats Pro', 'bakery-treats' ),
			'pro_text' => esc_html__( 'Buy Pro', 'bakery-treats' ),
			'pro_url'    => esc_url( BAKERY_TREATS_BUY_NOW ),
		) )	);

		// Register sections.
		$manager->add_section( new Bakery_Treats_Customize_Section_Pro( $manager,'bakery_treats_lite_documentation', array(
			'priority'   => 1,
			'title'    => esc_html__( 'Lite Documentation', 'bakery-treats' ),
			'pro_text' => esc_html__( 'Instruction', 'bakery-treats' ),
			'pro_url'    => esc_url( BAKERY_TREATS_LITE_DOC ),
		) )	);

		$manager->add_section( new Bakery_Treats_Customize_Section_Pro( $manager, 'bakery_treats_live_demo', array(
		    'priority'   => 1,
		    'title'      => esc_html__( 'Pro Theme Demo', 'bakery-treats' ),
		    'pro_text'   => esc_html__( 'Live Preview', 'bakery-treats' ),
		    'pro_url'    => esc_url( BAKERY_TREATS_LIVE_DEMO ),
		) ) );	
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'bakery-treats-customize-controls', trailingslashit( get_template_directory_uri() ) . '/revolution/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'bakery-treats-customize-controls', trailingslashit( get_template_directory_uri() ) . '/revolution/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
Bakery_Treats_Customize::get_instance();