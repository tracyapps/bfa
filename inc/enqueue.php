<?php
if( !defined('ABSPATH') ) { die('Direct access not allowed'); }

/**
 * loading scripts
 */
function bfa_load_scripts() {
	wp_enqueue_style( 'bfa-styles', get_stylesheet_directory_uri() . '/css/style.css' );
	wp_enqueue_script( 'bfa-scripts', get_template_directory_uri() . '/js/main.js', array(), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'bfa_load_scripts' );