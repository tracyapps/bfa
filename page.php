<?php
/**
 * @package WordPress
 * @subpackage bfa
 * @Best Friends Approach
 */
get_header(); ?>
	<?php wp_nav_menu( array( 'sort_column' => 'menu_order', 'container_class' => 'pageSubNavContainer', 'theme_location' => 'primary', 'depth' => 1, 'start_depth' => 1 ) ); ?>

		<div class="content">
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				<h2 class="page-title"><?php the_title(); ?></h2>
				<?php the_content(); ?>
				<br clear="all"/>
				<?php edit_post_link( __( 'Edit', 'twentyten' ), '<span class="edit-link">', '</span>' ); ?>
			<?php endwhile; ?>

			<section class="resources-container">
				<?php if( have_rows( 'resource_row' ) ) :
					while ( have_rows( 'resource_row' ) ) : the_row();

						if( get_row_layout() == 'book' ) :

							printf(
								'<div class="book-row"> 
								<h3 class="book-title">%s</h3>
								<h5 class="book-sub-title">%s</h5>
								<div class="author">%s</div>
								<div class="banner important">%s</div>
								<div class="description">
								<a href="%s"><img src="%s" class="alignright book-thumbnail"></a>
								%s
								</div>
								<footer class="book-footer">
								<div class="order">
								<span class="price">$%s</span>
								<a href="%s" class="button">Order now &raquo;</a>
								</div>
								<blockquote>%s</blockquote>
								</footer>
							</div>',
								esc_html( get_sub_field( 'book_title' ) ),
								esc_html( get_sub_field( 'book_subtitle' ) ),
								wp_kses_post( get_sub_field( 'book_author' ) ),
								esc_html( get_sub_field( 'book_callout' ) ),
								esc_url( get_sub_field( 'book_order_link' ) ),
								esc_url( get_sub_field( 'book_image' ) ),
								wp_kses_post( get_sub_field( 'book_description' ) ),
								esc_html( get_sub_field( 'book_price' ) ),
								esc_url( get_sub_field( 'book_order_link' ) ),
								wp_kses_post( get_sub_field( 'book_testimonial' ) )
							);

						elseif( get_row_layout() == 'resource' ) :

							printf(
								'<div class="resource-row"> 
								<h3>%s</h3>
								%s
								</div>',
								esc_html( get_sub_field( 'resource_title' ) ),
								wp_kses_post( get_sub_field( 'resource_body' ) )
							);

						endif;
					endwhile;
				endif;
				?>
			</section>

		</div><!--/content-->



	</div><!--/leftZone-->
	<div id="right-zone">
		<?php get_sidebar(); ?>
	</div><!--/rightZone-->

<?php get_footer(); ?>