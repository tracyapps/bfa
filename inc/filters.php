<?php
if( !defined('ABSPATH') ) { die('Direct access not allowed'); }

function crate_filter_wp_title( $title, $separator ) {
	// Don't affect wp_title() calls in feeds.
	if ( is_feed() )
		return $title;

	// The $paged global variable contains the page number of a listing of posts.
	// The $page global variable contains the page number of a single post that is paged.
	// We'll display whichever one applies, if we're not looking at the first page.
	global $paged, $page;

	if ( is_search() ) {
		// If we're a search, let's start over:
		$title = sprintf( __( 'Search results for %s', 'crate' ), '"' . get_search_query() . '"' );
		// Add a page number if we're on page 2 or more:
		if ( $paged >= 2 )
			$title .= " $separator " . sprintf( __( 'Page %s', 'crate' ), $paged );
		// Add the site name to the end:
		$title .= " $separator " . get_bloginfo( 'name', 'display' );
		// We're done. Let's send the new title back to wp_title():
		return $title;
	}

	// Otherwise, let's start by adding the site name to the end:
	$title .= get_bloginfo( 'name', 'display' );

	// If we have a site description and we're on the home/front page, add the description:
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title .= " $separator " . $site_description;

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		$title .= " $separator " . sprintf( __( 'Page %s', 'crate' ), max( $paged, $page ) );

	// Return the new title to wp_title():
	return $title;
}
add_filter( 'wp_title', 'crate_filter_wp_title', 10, 2 );


if ( ! function_exists( 'bfa_the_page_number' ) ) :
	/**
	 * Prints the page number currently being browsed, with a vertical bar before it.
	 *
	 * Used in Twenty Ten's header.php to add the page number to the <title> HTML tag.
	 *
	 * @since Twenty Ten 1.0
	 */
	function bfa_the_page_number() {
		global $paged; // Contains page number.
		if ( $paged >= 2 )
			echo ' | ' . sprintf( __( 'Page %s', 'twentyten' ), $paged );
	}
endif;

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * To override this in a child theme, remove the filter and optionally add
 * your own function tied to the wp_page_menu_args filter hook.
 *
 * @since Twenty Ten 1.0
 */
function bfa_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'bfa_page_menu_args' );

/**
 * Sets the post excerpt length to 20 characters.
 *
 * To override this length in a child theme, remove the filter and add your own
 * function tied to the excerpt_length filter hook.
 *
 * @since Twenty Ten 1.0
 * @return int
 */
function bfa_excerpt_length( $length ) {
	return 70;
}
add_filter( 'excerpt_length', 'bfa_excerpt_length' );


/**
 * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis.
 *
 * To override this in a child theme, remove the filter and add your own
 * function tied to the excerpt_more filter hook.
 *
 * @since Twenty Ten 1.0
 * @return string An ellipsis
 */
function bfa_auto_excerpt_more( $more ) {
	return sprintf( '&hellip; <a class="read-more" href="%1$s">%2$s &raquo;</a>',
		get_permalink( get_the_ID() ),
		__( 'Read More', 'textdomain' )
	);
}
add_filter( 'excerpt_more', 'bfa_auto_excerpt_more' );

/**
 * Adds a pretty "Continue Reading" link to post excerpts.
 *
 * To override this link in a child theme, remove the filter and add your own
 * function tied to the get_the_excerpt filter hook.
 *
 * @since Twenty Ten 1.0
 * @return string Excerpt with a pretty "Continue Reading" link
 */
function bfa_custom_excerpt_more( $output ) {
	return $output . '';
}
add_filter( 'get_the_excerpt', 'bfa_custom_excerpt_more' );


/**
 * Remove inline styles printed when the gallery shortcode is used.
 *
 * Galleries are styled by the theme in Twenty Ten's style.css.
 *
 * @since Twenty Ten 1.0
 * @return string The gallery style filter, with the styles themselves removed.
 */
function bfa_remove_gallery_css( $css ) {
	return preg_replace( "#<style type='text/css'>(.*?)</style>#s", '', $css );
}
add_filter( 'gallery_style', 'bfa_remove_gallery_css' );


