<?php

if( !defined('ABSPATH') ) { die('Direct access not allowed'); }

/**
 * Define menus
 */
function bfa_menus() {
	register_nav_menus( array(
		'primary' 	=> __( 'Primary Navigation', 'bfa' ),
//		'utility' 	=> __( 'Utility Navigation', 'bfa' ),
//		'footer' 	=> __( 'Footer Navigation', 'bfa' ),
		'social'	=> __( 'Social Links', 'bfa' ),
	) );
}
add_action( 'after_setup_theme', 'bfa_menus' );
