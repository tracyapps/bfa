<?php
if( !defined('ABSPATH') ) { die('Direct access not allowed'); }

/**
 * multiple sidebars
 */
function bfa_widgets_init() {
	register_sidebar(
		array(
			'name' 			=> 'Sidebar - all pages - top',
			'before_widget' => '<div class="widget-box block">',
			'after_widget' 	=> '</div>',
			'before_title' 	=> '<h6 class="widget-title">',
			'after_title' 	=> '</h6>'
		)
	);

	register_sidebar(
		array(
			'name' 			=> 'Sidebar - all pages - bottom',
			'before_widget' => '<div class="widget-box block">',
			'after_widget' 	=> '</div>',
			'before_title' 	=> '<h6 class="widget-title">',
			'after_title' 	=> '</h6>'
		)
	);



	register_sidebar(
		array(
			'name' 			=> 'Footer',
			'before_widget' => '<p>',
			'after_widget' 	=> '</p>',
			'before_title' 	=> '<h6 class="widget-title">',
			'after_title' 	=> '</h6>'
		)
	);
}
add_action( 'widgets_init', 'bfa_widgets_init' );

/**
 * function for conditional tag: is_tree()
 */


function is_tree($pid) {      // $pid = The ID of the page we're looking for pages underneath
	global $post;         // load details about this page
	$anc = get_post_ancestors( $post->ID );
	foreach($anc as $ancestor) {
		if(is_page() && $ancestor == $pid) {
			return true;
		}
	}
	if(is_page()&&(is_page($pid)))
		return true;   // we're at the page or at a sub page
	else
		return false;  // we're elsewhere
};
