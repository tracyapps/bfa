<?php
/**
 * @package WordPress
 * @subpackage bfa
 * @Best Friends Approach
 */ ?>


<aside class="widget-container top">
	<?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar( 'Sidebar - all pages - top' ) ) : ?><?php endif; ?>
</aside>

<aside class="page-boxes">

	<?php if( have_rows( 'sidebar_blocks' ) ) :
		while ( have_rows( 'sidebar_blocks' ) ) : the_row();

			if( get_row_layout() == 'block_testimonial' ) :

				$testimonial_ID = get_sub_field( 'testimonial_post' );


				printf(
					'<section class="block testimonial">
				<h6>Testimonial:</h6>
				<blockquote> 
				<img src="%s" class="testimonial-thumbnail alignright"> %s
				</blockquote>
				<div class="author">%s</div>
				</section>',
					esc_url( wp_get_attachment_url( get_post_thumbnail_id( $testimonial_ID ), 'thumbnail' ) ),
					wp_kses_post( get_post_field( 'post_content', $testimonial_ID ) ),
					wp_kses_post( get_post_field( 'post_excerpt', $testimonial_ID ) )
				);

			elseif( get_row_layout() == 'block_featured_resource' ) :

				$resource_ID = get_sub_field( 'resource_post' ) ;
				printf(
					'<section class="block resource">
				<h6>Featured:</h6>
				<a href="%s"><img src="%s" class="resource-thumbnail alignleft"></a><h5><a href="%s">%s</a></h5>
				 %s
				<p class="learn-more-button"><a href="%s" class="button full">%s</a></p>
				</section>',
					esc_url( get_post_meta( $resource_ID, 'featured_resource_url', true ) ),
					esc_url( wp_get_attachment_url( get_post_thumbnail_id( $resource_ID ), 'medium' ) ),
					esc_url( get_post_meta( $resource_ID, 'featured_resource_url', true ) ),
					esc_html( get_the_title( $resource_ID ) ),
					wp_kses_post( get_post_field( 'post_content', $resource_ID ) ),
					esc_url( get_post_meta( $resource_ID, 'featured_resource_url', true ) ),
					esc_html( get_post_meta( $resource_ID, 'featured_resource_text', true ) )
				);

			elseif( get_row_layout() == 'block_free_form' ) :

				printf(
					'<section class="block free-form">
				<h6>%s</h6>
				%s
				</section>',
					( ( get_sub_field( 'display_title_select' ) == 1 ) ? esc_html( get_sub_field( 'free_form_title' ) ) : '' ),
					wp_kses_post( get_sub_field( 'body_text' ) )
				);

			elseif( get_row_layout() == 'block_widget_area' ) :
				$widget_area = get_sub_field( 'widget_area' );
				echo $widget_area;
			endif;
		endwhile;
	endif; ?>

	<?php if( is_archive() || is_single() ) :
		dynamic_sidebar( 'news-archive-area' );
	endif; ?>
</aside>

<aside class="widget-container bottom">
	<?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar( 'Sidebar - all pages - bottom' ) ) : ?><?php endif; ?>
</aside>

<div id="fbbox">
	<script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script>
	<fb:like-box href="http://www.facebook.com/pages/Best-Friends-Approach/104667769575927" width="189" bgcolor="#fff" show_faces="true" stream="false" header="true"></fb:like-box>
</div>