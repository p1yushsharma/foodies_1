<?php
require get_template_directory() . '/demo-import/tgm/class-tgm-plugin-activation.php';
/**
 * Recommended plugins.
 */
function bakery_treats_register_recommended_plugins_set() {
	$plugins = array(
		array(
			'name'             => __( 'Woocommerce', 'bakery-treats' ),
			'slug'             => 'woocommerce',
			'source'           => '',
			'required'         => true,
			'force_activation' => false,
		),
	);
	$bakery_treats_config = array();
	tgmpa( $plugins, $bakery_treats_config );
}
add_action( 'tgmpa_register', 'bakery_treats_register_recommended_plugins_set' );
