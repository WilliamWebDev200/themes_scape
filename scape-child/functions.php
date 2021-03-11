<?php

add_action( 'wp_enqueue_scripts', 'enqueue_parent_style' );
function enqueue_parent_style() {
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/library/css/app.css' );
    wp_enqueue_style('webdev200-injection',get_theme_file_uri() . '/css/main-custom-injection.css',array(),'all');
}

	require_once get_theme_file_path() . '/wx_custom-login_admin.php';
	//wx style and jquery scripts
	require_once get_theme_file_path() . '/wx_custom-style_scripts.php';
	// require_once get_theme_file_path() . '/shortcode-accordion-faq.php';


	function enqueue_custom_script() {
		wp_enqueue_script( '', get_stylesheet_directory_uri() . '/js/custom-scripts.js' );
	}
	add_action('wp_enqueue_scripts', 'enqueue_custom_script', 100);


?>
