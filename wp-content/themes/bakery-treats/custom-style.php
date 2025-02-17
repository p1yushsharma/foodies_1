<?php 
	$bakery_treats_custom_css ='';


    /*----------------Related Product show/hide -------------------*/

    $bakery_treats_enable_related_product = get_theme_mod('bakery_treats_enable_related_product',1);

    if($bakery_treats_enable_related_product == 0){
        $bakery_treats_custom_css .='.related.products{';
            $bakery_treats_custom_css .='display: none;';
        $bakery_treats_custom_css .='}';
    }

    /*----------------blog post content alignment -------------------*/

    $bakery_treats_blog_Post_content_layout = get_theme_mod( 'bakery_treats_blog_Post_content_layout','Left');
    if($bakery_treats_blog_Post_content_layout == 'Left'){
        $bakery_treats_custom_css .='.ct-post-wrapper .card-item {';
            $bakery_treats_custom_css .='text-align:start;';
        $bakery_treats_custom_css .='}';
    }else if($bakery_treats_blog_Post_content_layout == 'Center'){
        $bakery_treats_custom_css .='.ct-post-wrapper .card-item {';
            $bakery_treats_custom_css .='text-align:center;';
        $bakery_treats_custom_css .='}';
    }else if($bakery_treats_blog_Post_content_layout == 'Right'){
        $bakery_treats_custom_css .='.ct-post-wrapper .card-item {';
            $bakery_treats_custom_css .='text-align:end;';
        $bakery_treats_custom_css .='}';
    }

    /*--------------------------- Footer background image -------------------*/

    $bakery_treats_footer_bg_image = get_theme_mod('bakery_treats_footer_bg_image');
    if($bakery_treats_footer_bg_image != false){
        $bakery_treats_custom_css .='.footer-top{';
            $bakery_treats_custom_css .='background: url('.esc_attr($bakery_treats_footer_bg_image).');';
        $bakery_treats_custom_css .='}';
    }

    /*--------------------------- Go to top positions -------------------*/

    $bakery_treats_go_to_top_position = get_theme_mod( 'bakery_treats_go_to_top_position','Right');
    if($bakery_treats_go_to_top_position == 'Right'){
        $bakery_treats_custom_css .='.footer-go-to-top{';
            $bakery_treats_custom_css .='right: 20px;';
        $bakery_treats_custom_css .='}';
    }else if($bakery_treats_go_to_top_position == 'Left'){
        $bakery_treats_custom_css .='.footer-go-to-top{';
            $bakery_treats_custom_css .='left: 20px;';
        $bakery_treats_custom_css .='}';
    }else if($bakery_treats_go_to_top_position == 'Center'){
        $bakery_treats_custom_css .='.footer-go-to-top{';
            $bakery_treats_custom_css .='right: 50%;left: 50%;';
        $bakery_treats_custom_css .='}';
    }

    /*--------------------------- Woocommerce Product Sale Positions -------------------*/

    $bakery_treats_product_sale = get_theme_mod( 'bakery_treats_woocommerce_product_sale','Right');
    if($bakery_treats_product_sale == 'Right'){
        $bakery_treats_custom_css .='.woocommerce ul.products li.product .onsale{';
            $bakery_treats_custom_css .='left: auto; ';
        $bakery_treats_custom_css .='}';
    }else if($bakery_treats_product_sale == 'Left'){
        $bakery_treats_custom_css .='.woocommerce ul.products li.product .onsale{';
            $bakery_treats_custom_css .='right: auto;';
        $bakery_treats_custom_css .='}';
    }else if($bakery_treats_product_sale == 'Center'){
        $bakery_treats_custom_css .='.woocommerce ul.products li.product .onsale{';
            $bakery_treats_custom_css .='right: 50%; left: 50%; ';
        $bakery_treats_custom_css .='}';
    }

    /*-------------------- Primary Color -------------------*/

	$bakery_treats_primary_color = get_theme_mod('bakery_treats_primary_color', '#F636AC'); // Add a fallback if the color isn't set

	if ($bakery_treats_primary_color) {
		$bakery_treats_custom_css .= ':root {';
		$bakery_treats_custom_css .= '--primary-color: ' . esc_attr($bakery_treats_primary_color) . ';';
		$bakery_treats_custom_css .= '}';
	}	

    /*-------------------- Secondary Color -------------------*/

	$bakery_treats_secondary_color = get_theme_mod('bakery_treats_secondary_color', '#000'); // Add a fallback if the color isn't set

	if ($bakery_treats_secondary_color) {
		$bakery_treats_custom_css .= ':root {';
		$bakery_treats_custom_css .= '--secondary-color: ' . esc_attr($bakery_treats_secondary_color) . ';';
		$bakery_treats_custom_css .= '}';
	}	

	/*--------------------------- slider-------------------*/

    $bakery_treats_enable_slider = get_theme_mod('bakery_treats_enable_slider', 1);
    if($bakery_treats_enable_slider != true){
        $bakery_treats_custom_css .='.page-template-revolution-home-php .mainhead{';
            $bakery_treats_custom_css .='position:static; background-color: #F636AC;';
        $bakery_treats_custom_css .='}';
         $bakery_treats_custom_css .='.page-template-revolution-home-php .contact-info i, .page-template-revolution-home-php .main-navigation ul#primary-menu li.current-menu-item a, .page-template-revolution-home-php .main-navigation ul#primary-menu>li>a:hover, .page-template-revolution-home-php .site-branding .site-title a:hover, .page-template-revolution-home-php .contact-info a:hover{';
            $bakery_treats_custom_css .='color:#fff;';
        $bakery_treats_custom_css .='}';
        $bakery_treats_custom_css .='.page-template-revolution-home-php span.cart-value{';
            $bakery_treats_custom_css .='background-color:#fff;';
        $bakery_treats_custom_css .='}';
        $bakery_treats_custom_css .='.page-template-revolution-home-php span.cart-value{';
            $bakery_treats_custom_css .='color:#F636AC;';
        $bakery_treats_custom_css .='}';
        $bakery_treats_custom_css .='.page-template-revolution-home-php .main-navigation ul#primary-menu li.current-menu-item a{';
            $bakery_treats_custom_css .='border-bottom-color:#fff;';
        $bakery_treats_custom_css .='}';
    }