<?php
/**
 * @package WordPress
 * @subpackage bfa
 * @Best Friends Approach
 */
get_header(); ?>

		<div class="content">
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				<h2 class="page-title"><?php the_title(); ?></h2>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<header class="entry-meta">
						<?php bfa_posted_on(); ?>
					</header><!-- .entry-meta -->

					<div class="entry-content">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'bfa' ), 'after' => '</div>' ) ); ?>
					</div><!-- .entry-content -->

					<footer class="entry-utility">
						<?php bfa_posted_in(); ?>
					</footer><!-- .entry-utility -->
				</article><!-- #post-## -->

			<?php endwhile; // end of the loop. ?>
		</div><!--/content-->
		<?php
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

									//print_r( $post );
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
		?>

		<div id="nav-below" class="navigation">
			<div class="nav-previous alignleft"><?php next_posts_link( __( '<span class="meta-nav">&laquo;</span> Older posts', 'bfa' ) ); ?></div>
			<div class="nav-next alignright"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&raquo;</span>', 'bfa' ) ); ?></div>
		</div><!-- #nav-below -->
	</div><!--/left-zone-->
	<div id="right-zone">
		<?php get_sidebar(); ?>
	</div><!--/rightZone-->


<?php get_footer(); ?>