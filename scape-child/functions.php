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


	/***=custom***/
	add_action('widgets_init', 'custom');
	function custom()
	{
	/**/
		$BulkApparel = array(
		'name' => __( 'BulkApparel Blog Sidebar ', 'scape_child' ),
		'id' => 'bulkApparel__sidebar-blog',
		'description' => '',
		'class' => '',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '' );
		register_sidebar( $BulkApparel );
	}

	add_action('widgets_init', 'footer_widget');
	function footer_widget()
	{
	/**/
		$BulkApparelFooter = array(
		'name' => __( 'BulkApparel Footer ', 'scape_child' ),
		'id' => 'bulkApparel__footer',
		'description' => '',
		'class' => '',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => 'bulkApparel__footer--title' );
		register_sidebar( $BulkApparelFooter );
	}


?>
