<?php
function wilvyrux_child_enqueue_scripts()
{
    /***
	 * Wilvyrux customized SCSS Sheet
	 *========================================================================*/
	wp_enqueue_style('wilvyrux-injection',get_theme_file_uri() . '/css/main-custom-injection.css',array(),'all');

}
add_action( 'wp_enqueue_scripts', 'wilvyrux_child_enqueue_scripts', 5000 );
?>