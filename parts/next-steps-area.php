<?php
/**
 * for displaying all the 'next steps' at the footer of each blog post.
 */

if( get_field( 'nsa_title' ) != '' ) : ?>
	<section class="next-steps-area">
		<div class="content">
			<h3><?php the_field( 'nsa_title' ) ?></h3>
			<?php if( have_rows('nsa_items') ) :

				echo '<div class="nsa-items-container">';

				// loop through the rows of data
				while ( have_rows('nsa_items') ) : the_row();

					if( get_row_layout() == 'nsa_item_post' ) :
						global $post;

						$post_id = get_sub_field( 'nsa_item_post_id' );
						$the_post = get_post( $post_id );
						$post = $the_post;

						setup_postdata( $post );

						echo '<div class="nsa-item post-or-page">';
						if ( get_sub_field( 'nsa_item_post_image' ) ) {
							echo '<div class="featured-image"><a href="' . get_the_permalink() . '"><img src="' . get_sub_field( 'nsa_item_post_image' ) . '"></a></div>';
						} elseif ( has_post_thumbnail() ) {
							echo '<div class="featured-image"><a href="' . get_the_permalink() . '">';
							the_post_thumbnail();
							echo '</a></div>';
						} else {

						}
						echo '<a href="' . get_the_permalink() . '">';
						the_title( '<h5>', '</h5>' );
						echo '</a>';
						echo '</div>';

						wp_reset_postdata();

					elseif( get_row_layout() == 'nsa_item_link' ) :

						echo '<div class="nsa-item external-link">';
						if( get_sub_field( 'nsa_item_link_intro' ) ) :
							echo '<div class="intro-paragraph">' . wp_kses_post( get_sub_field( 'nsa_item_link_intro' ) ) . '</div>';
						endif;

						echo '<div class="action-button"><a class="button" href="' . esc_url( get_sub_field( 'nsa_item_link_url' ) ) . '">' . esc_html( get_sub_field( 'nsa_item_link_button_text' ) ) . '</a></div>';
						echo '</div>';

					elseif( get_row_layout() == 'nsa_item_cpt' ) :
						global $post;

						$post_id = get_sub_field( 'nsa_item_cpt_id' );
						$the_post = get_post( $post_id );
						$post = $the_post;

						setup_postdata( $post );

						echo '<div class="nsa-item feature-or-testimonial">';

						if( $post->post_type == 'feature' ) :

							if( get_field( 'featured_resource_url' ) ) {
								echo '<a href="' . esc_url( get_field( 'featured_resource_url' ) ) . '">';
								the_title( '<h6>', ' &raquo;</h6>' );
								echo ' </a>';
							} else {
								the_title( '<h6>', '</h6>' );
							}

							if ( has_post_thumbnail() ) {
								echo '<div class="featured-image">';
								the_post_thumbnail();
								echo '</div>';
							} else {}

							the_content();

						elseif( $post->post_type == 'testimonial' ) :
							if ( has_post_thumbnail() ) {
								echo '<div class="featured-image">';
								the_post_thumbnail();
								echo '</div>';
							} else {}

							the_content();
						endif;

						echo '</div>';

						wp_reset_postdata();

					elseif( get_row_layout() == 'nsa_item_freeform' ) :

						echo '<div class="nsa-item freeform">' . wp_kses_post( get_sub_field( 'nsa_item_freeform_content' ) ) . '</div>';

					endif;

				endwhile;

			endif; ?>
		</div>
	</section>
<?php endif;