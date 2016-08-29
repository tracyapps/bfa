<?php



// Register Custom Post Type
function bfa_post_types() {

	$labels = array(
		'name'                => _x( 'Testimonial', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Testimonial', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Testimonials', 'text_domain' ),
		'parent_item_colon'   => __( '', 'text_domain' ),
		'all_items'           => __( 'All Testimonials', 'text_domain' ),
		'view_item'           => __( '', 'text_domain' ),
		'add_new_item'        => __( 'Add New Testimonial', 'text_domain' ),
		'add_new'             => __( 'Add New Testimonial', 'text_domain' ),
		'edit_item'           => __( 'Edit Testimonial', 'text_domain' ),
		'update_item'         => __( 'Update Testimonial', 'text_domain' ),
		'search_items'        => __( 'Search the Testimonials', 'text_domain' ),
		'not_found'           => __( 'No Testimonials found', 'text_domain' ),
		'not_found_in_trash'  => __( 'No Testimonials found in trash', 'text_domain' ),
	);
	$args = array(
		'label'               => __( 'testimonial', 'text_domain' ),
		'description'         => __( 'Testimonial', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-thumbs-up',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);

	// NEVER USE 'action' HERE, IT'S A RESERVED WORD
	register_post_type( 'testimonial', $args );


	$labels = array(
		'name'                => _x( 'Feature', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Feature', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Featured Resource', 'text_domain' ),
		'parent_item_colon'   => __( '', 'text_domain' ),
		'all_items'           => __( 'All Featured', 'text_domain' ),
		'view_item'           => __( '', 'text_domain' ),
		'add_new_item'        => __( 'Add New Featured Resource', 'text_domain' ),
		'add_new'             => __( 'Add New Featured Resource', 'text_domain' ),
		'edit_item'           => __( 'Edit Featured Resource', 'text_domain' ),
		'update_item'         => __( 'Update Featured Resource', 'text_domain' ),
		'search_items'        => __( 'Search the Featured Resources', 'text_domain' ),
		'not_found'           => __( 'No Featured Resources found', 'text_domain' ),
		'not_found_in_trash'  => __( 'No Featured Resources found in trash', 'text_domain' ),
	);
	$args = array(
		'label'               => __( 'feature', 'text_domain' ),
		'description'         => __( 'Feature', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-flag',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);

	// NEVER USE 'action' HERE, IT'S A RESERVED WORD
	register_post_type( 'feature', $args );
}
add_action( 'init', 'bfa_post_types', 0 );


function crate_taxonomies() {
	register_taxonomy(
		'classification',	// taxonomy machine name
		'post',				// post types supported, can be array('post', 'page' ... )
		array(					// labels. See http://codex.wordpress.org/Function_Reference/register_taxonomy for full details
								  'label' => __( 'Classification', 'crate' ),
								  'rewrite' => array( 'slug' => 'classification' ),
								  'hierarchical' => true,
		)
	);

	// for pre-existing cpts and taxonomies that just need to be linked, use register_taxonomy_for_object_type( $taxonomy, $object_type );
}
//add_action( 'init', 'crate_taxonomies' );
