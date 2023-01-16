<?php
/**
 * Plugin Name: Elementor Addon
 * Description: Simple hello world widgets for Elementor.
 * Version:     1.0.0
 * Author:      Elementor Developer
 * Author URI:  https://developers.elementor.com/
 * Text Domain: elementor-addon
 */

function register_addon_plugins( $widgets_manager ) {

	require_once( __DIR__ . '/widgets/blog_list.php' );

	$widgets_manager->register( new \Elementor_Blog_List() );

}
add_action( 'elementor/widgets/register', 'register_addon_plugins' );
