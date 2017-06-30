<?php

if ( ! function_exists( 'bfa_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post—date/time and author.
	 */
	function bfa_posted_on() {
		printf( __( '<span class="%1$s">Posted on</span> <span class="entry-date">%2$s %3$s %4$s</span> <span class="meta-sep">by</span> %5$s', 'bfa' ),
			// %1$s = container class
			'meta-prep meta-prep-author',
			// %2$s = month: /yyyy/mm/
			sprintf( '<a href="%1$s" title="%2$s" rel="bookmark">%3$s</a>',
				home_url() . '/' . get_the_date( 'Y' ) . '/' . get_the_date( 'm' ) . '/',
				esc_attr( 'View Archives for ' . get_the_date( 'F' ) . ' ' . get_the_date( 'Y' ) ),
				get_the_date( 'F' )
			),
			// %3$s = day: /yyyy/mm/dd/
			sprintf( '<a href="%1$s" title="%2$s" rel="bookmark">%3$s</a>',
				home_url() . '/' . get_the_date( 'Y' ) . '/' . get_the_date( 'm' ) . '/' . get_the_date( 'd' ) . '/',
				esc_attr( 'View Archives for ' . get_the_date( 'F' ) . ' ' . get_the_date( 'j' ) . ' ' . get_the_date( 'Y' ) ),
				get_the_date( 'j' )
			),
			// %4$s = year: /yyyy/
			sprintf( '<a href="%1$s" title="%2$s" rel="bookmark">%3$s</a>',
				home_url() . '/' . get_the_date( 'Y' ) . '/',
				esc_attr( 'View Archives for ' . get_the_date( 'Y' ) ),
				get_the_date( 'Y' )
			),
			// %5$s = author vcard
			sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
				get_author_posts_url( get_the_author_meta( 'ID' ) ),
				sprintf( esc_attr__( 'View all posts by %s', 'bfa' ), get_the_author() ),
				get_the_author()
			)
		);
	}
endif;

if ( ! function_exists( 'bfa_posted_in' ) ) :
	/**
	 * Prints HTML with meta information for the current post (category, tags and permalink).
	 *
	 * @since Twenty Ten 1.0
	 */
	function bfa_posted_in() {
		// Retrieves tag list of current post, separated by commas.
		$tag_list = get_the_tag_list( '', ', ' );
		if ( $tag_list ) {
			$posted_in = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'bfa' );
		} elseif ( is_object_in_taxonomy( get_post_type(), 'category' ) ) {
			$posted_in = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'bfa' );
		} else {
			$posted_in = __( 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'bfa' );
		}
		// Prints the string, replacing the placeholders.
		printf(
			$posted_in,
			get_the_category_list( ', ' ),
			$tag_list,
			get_permalink(),
			the_title_attribute( 'echo=0' )
		);
	}
endif;

function bfa_display_author_box() {
	$output = '';

	if( get_the_author_meta( 'description' ) != '' ) :
		$output .= '<section class="author-bio-box"><div class="container">';

		$output .= sprintf(
			'<div class="author-photo">%s</div>
			<div class="author-bio">%s</div>',
			get_avatar( get_the_author_meta( 'email' ) , 210 ),
			nl2br( get_the_author_meta( 'description' ) )
		);

		$output .= '</div></section>';
	endif;

	return $output;
}