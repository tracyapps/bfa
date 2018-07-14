<?php

if ( ! function_exists( 'bfa_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post—date/time and author.
	 */
	function bfa_posted_on() {
		printf( __( 'By  %s - <span class="entry-date">%2$s %3$s %4$s</span>', 'bfa' ),

			sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
				get_author_posts_url( get_the_author_meta( 'ID' ) ),
				sprintf( esc_attr__( 'View all posts by %s', 'bfa' ), get_the_author() ),
				get_the_author()
			),
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
			)

		);
	}
endif;


/**
 * Prints HTML with meta information for the current post (category, tags and permalink).
 *
 * @since Twenty Ten 1.0
 */
function bfa_post_meta() {
	?>
	<div class="post-author post-meta">
		<svg viewBox="0 0 32 32" class="icon-person-dims icon">
			<use xlink:href="#person"></use>
		</svg>
		<?php
		printf( '<a class="url fn n" href="%1$s" title="%2$s">%3$s</a>',
			get_author_posts_url( get_the_author_meta( 'ID' ) ),
			sprintf( esc_attr__( 'View all posts by %s', 'bfa' ), get_the_author() ),
			get_the_author()
		);?>

	</div>

	<div class="post-date post-meta">
		<svg viewBox="0 0 32 32" class="icon-calendar-dims icon">
			<use xlink:href="#calendar"></use>
		</svg>
		<?php
			printf( '<a href="%1$s" title="%2$s" rel="bookmark">%3$s</a> ',
				home_url() . '/' . get_the_date( 'Y' ) . '/' . get_the_date( 'm' ) . '/',
				esc_attr( 'View Archives for ' . get_the_date( 'F' ) . ' ' . get_the_date( 'Y' ) ),
				get_the_date( 'F' )
			);
			// %3$s = day: /yyyy/mm/dd/
			printf( '<a href="%1$s" title="%2$s" rel="bookmark">%3$s</a>, ',
				home_url() . '/' . get_the_date( 'Y' ) . '/' . get_the_date( 'm' ) . '/' . get_the_date( 'd' ) . '/',
				esc_attr( 'View Archives for ' . get_the_date( 'F' ) . ' ' . get_the_date( 'j' ) . ' ' . get_the_date( 'Y' ) ),
				get_the_date( 'j' )
			);
			// %4$s = year: /yyyy/
			printf( '<a href="%1$s" title="%2$s" rel="bookmark">%3$s</a>',
				home_url() . '/' . get_the_date( 'Y' ) . '/',
				esc_attr( 'View Archives for ' . get_the_date( 'Y' ) ),
				get_the_date( 'Y' )
			);
		?>
	</div>

	<?php
	$tag_list = get_the_tag_list( '', ', ' );
	$cat_list = get_the_category_list( ', ' );

	if ( $tag_list ) : ?>
		<div class="post-tags post-meta">
			<svg viewBox="0 0 32 32" class="icon-tags-dims icon">
				<use xlink:href="#tags"></use>
			</svg>
			<?php echo $tag_list; ?>
		</div>


	<?php endif;

	if( $cat_list ) : ?>
		<div class="post-categories post-meta">
			<svg viewBox="0 0 32 32" class="icon-folder-dims icon">
				<use xlink:href="#folder"></use>
			</svg>
			<?php echo $cat_list; ?>
		</div>
	<?php endif;

}

function bfa_post_meta_bar() {
	echo '<section class="post-meta-bar">';

	$tag_list = get_the_tag_list( '', ', ' );
	$cat_list = get_the_category_list( ', ' );

	if( $cat_list ) : ?>
		<div class="post-categories post-meta">
			<svg viewBox="0 0 32 32" class="icon-folder-dims icon">
				<use xlink:href="#folder"></use>
			</svg>
			<?php echo $cat_list; ?>
		</div>
	<?php endif;



	echo '</section>';

}



function bfa_display_author_box() {
	$output = '';

	if( get_the_author_meta( 'description' ) != '' ) :
		$output .= '<hr /><section class="author-bio-box"><h6>About the author</h6><div class="container">';

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

/**
 * Better archive title display
 *
 * @param string $before
 * @param string $after
 * @param string $span_class
 */

function bfa_the_archive_title( $before = '', $after = '', $span_class = '' ) {
	$title = bfa_get_the_archive_title( $span_class );

	if ( ! empty( $title ) ) {
		echo $before . $title . $after;
	}
}


/**
 * Retrieve the archive title based on the queried object.
 *
 * @since 4.1.0
 *
 * @return string Archive title.
 */
function bfa_get_the_archive_title( $span_class = '' ) {

	if ( is_category() || is_tag() || is_author() || is_year() || is_month() || is_day() || is_post_type_archive() || ( is_tax() && ! is_tax( 'post_format') ) ) {
		if ( ! '' == $span_class ) {
			$span_class = sprintf( 'class="%s"', $span_class );
		}
		if ( is_category() ) {
			$type = __( 'Category: ' );
			$name = single_cat_title( '', false );
		} elseif ( is_tag() ) {
			$type = __( 'Tag: ' );
			$name = single_tag_title( '', false );
		} elseif ( is_author() ) {
			$type = __( 'Author: ' );
			$name = sprintf( '<span class="vcard">%s</span>', get_the_author() );
		} elseif ( is_year() ) {
			$type = __( 'Year: ' );
			$name = get_the_date( _x( 'Y', 'yearly archives date format' ) );
		} elseif ( is_month() ) {
			$type = __( 'Month: ' );
			$name = get_the_date( _x( 'F Y', 'monthly archives date format' ) );
		} elseif ( is_day() ) {
			$type =__( 'Day: ' );
			$name = get_the_date( _x( 'F j, Y', 'daily archives date format' ) );
		} elseif ( is_post_type_archive() ) {
			$type = __( 'Archives: ' );
			$name = post_type_archive_title( '', false );
		} elseif ( is_tax() ) {
			$tax = get_taxonomy( get_queried_object()->taxonomy );

			$type = sprintf( __( '%s: ' ), $tax->labels->singular_name );
			$name =  single_term_title( '', false );
		}
		$format ='<span %s>%s</span>%s';
		$title = sprintf( $format, $span_class, $type, $name );
	}

	elseif ( is_tax( 'post_format' ) ) {
		if ( is_tax( 'post_format', 'post-format-aside' ) ) {
			$title = _x( 'Asides', 'post format archive title' );
		} elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
			$title = _x( 'Galleries', 'post format archive title' );
		} elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
			$title = _x( 'Images', 'post format archive title' );
		} elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
			$title = _x( 'Videos', 'post format archive title' );
		} elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
			$title = _x( 'Quotes', 'post format archive title' );
		} elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
			$title = _x( 'Links', 'post format archive title' );
		} elseif ( is_tax( 'post_format', 'post-format-status' ) ) {
			$title = _x( 'Statuses', 'post format archive title' );
		} elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
			$title = _x( 'Audio', 'post format archive title' );
		} elseif ( is_tax( 'post_format', 'post-format-chat' ) ) {
			$title = _x( 'Chats', 'post format archive title' );
		}
	} else {
		$title = __( 'Archives' );
	}

	/**
	 * Filters the archive title.
	 *
	 * @since 4.1.0
	 *
	 * @param string $title Archive title to be displayed.
	 */
	return apply_filters( 'bfa_get_the_archive_title', $title );
}