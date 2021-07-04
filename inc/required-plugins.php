<?php

require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'factory_founder_register_required_plugins' );

function factory_founder_register_required_plugins() {
	
	$plugins = array(

		array(
			'name'               => 'Factory Founder',
			'slug'               => 'factory-toolkit',
			'source'             => get_template_directory() . '/inc/plugins/factory-toolkit.zip',
			'required'           => true,
			'version'            => '1.0',
			'force_activation'   => true, 
			'force_deactivation' => true, 
		),
		array(
			'name'               => 'Codestar Framework', 
			'slug'               => 'codestar-framework',
			'source'             => get_template_directory() . '/inc/plugins/codestar-framework.zip',
			'required'           => true, 
			'version'            => '1.0.2', // 27.11.2018 - ver 5.6
										  // - Update: Compatibility with Wordpress 5.0
			'force_activation'   => true, 
			'force_deactivation' => false,
		),
		array(
			'name'               => 'WPBakery Page Builder', 
			'slug'               => 'js_composer',
			'source'             => get_template_directory() . '/inc/plugins/js_composer.zip',
			'required'           => true, 
			'version'            => '5.6', // 27.11.2018 - ver 5.6
										  // - Update: Compatibility with Wordpress 5.0
			'force_activation'   => false, 
			'force_deactivation' => false,
		),
		array(
			'name'               => 'WooCommerce', 
			'slug'               => 'woocommerce',
	   // 	'source'             => get_template_directory() . '/inc/plugins/woocommerce.zip',
			'required'           => false, 
	   // 	'version'            => '4.2.2',
	   ),
		array(
			'name'      => 'One click demo import',
			'slug'      => 'one-click-demo-import',
			'required'  => false,
		),
		array(
			'name'      => 'Contact Form 7',
			'slug'      => 'contact-form-7',
			'version'   => '5.2',
			'required'  => false,
		),

	);

	/*
	
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'factory-founder',
		'default_path' => '', 
		'menu'         => 'factory-install-plugins', // Menu slug.
		'has_notices'  => true,
		'dismissable'  => true,
		'dismiss_msg'  => '',
		'is_automatic' => false,
		'message'      => '',

	);

	tgmpa( $plugins, $config );
}
