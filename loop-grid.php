<?php
/**
 * @package WordPress
 * @subpackage bfa
 * @Best Friends Approach
 */
?>

<?php /* If there are no posts to display, such as an empty archive page */ ?>
<?php if ( ! have_posts() ) : ?>
	<article id="post-0" class="post error404 not-found">
		<h4 class="entry-title"><?php _e( 'Not Found', 'twentyten' ); ?></h4>
		<div class="entry-content">
			<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'twentyten' ); ?></p>
			<?php get_search_form(); ?>
		</div><!-- .entry-content -->
	</article><!-- #post-0 -->
<?php endif; ?>

<?php while ( have_posts() ) : the_post(); ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php bfa_post_meta_bar(); ?>
		<?php if ( has_post_thumbnail() ) :

			printf(
					'<div class="post-thumbnail-container">
								<a href="%s">%s</a>
								<h4 class="entry-title-block"><a href="%s" title="%s" rel="bookmark">%s</a></h4>
							</div>',
					esc_url( get_the_permalink() ),
					get_the_post_thumbnail(),
					esc_url( get_the_permalink() ),
					esc_html( get_the_title() ),
					esc_html( get_the_title() )
			);
		else : ?>
			<h4 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'bfa' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h4>
		<?php endif; ?>

		<header class="entry-meta">
			<?php bfa_posted_on(); ?>
		</header><!-- .entry-meta -->

		<?php if ( is_search() ) : // Only display excerpts for archives and search. ?>
			<div class="entry-summary">
				<?php the_excerpt( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'bfa' ) ); ?>
			</div><!-- .entry-summary -->
		<?php else : ?>
			<div class="entry-content">
				<?php the_excerpt(); ?>
			</div><!-- .entry-content -->
		<?php endif; ?>

		<footer class="entry-utility">
			<a href="<?php the_permalink(); ?>" class="button">Continue Reading</a>
		</footer><!-- .entry-utility -->

	</article><!-- #post-## -->



<?php endwhile; // End the loop. Whew. ?>

<?php /* Display navigation to next/previous pages when applicable */ ?>
<?php if (  $wp_query->max_num_pages > 1 ) : ?>
	<div id="nav-below" class="navigation">
		<div class="nav-previous alignleft"><?php next_posts_link( __( '<span class="meta-nav">&laquo;</span> Older posts', 'bfa' ) ); ?></div>
		<div class="nav-next alignright"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&raquo;</span>', 'bfa' ) ); ?></div>
	</div><!-- #nav-below -->
<?php endif; ?>
