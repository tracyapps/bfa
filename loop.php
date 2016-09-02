<?php
/**
 * @package WordPress
 * @subpackage bfa
 * @Best Friends Approach
 */
?>

<?php /* Display navigation to next/previous pages when applicable */ ?>
<?php if ( $wp_query->max_num_pages > 1 ) : ?>
	<div id="nav-above" class="navigation">
		<div class="nav-previous alignleft"><?php next_posts_link( __( '<span class="meta-nav">&laquo;</span> Older posts', 'twentyten' ) ); ?></div>
		<div class="nav-next alignright"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&raquo;</span>', 'twentyten' ) ); ?></div>
	</div><!-- #nav-above -->
<?php endif; ?>

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


<?php /* category page */ ?>

	<?php if ( is_category() || is_page('news-events') ) : ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<h4 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'twentyten' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h4>

		<?php if ( is_archive() || is_search() ) : // Display excerpts for archives and search. ?>
			<div class="entry-summary">
				<?php the_excerpt(); ?>
			</div><!-- .entry-summary -->
		<?php else : ?>
			<div class="entry-content">
				<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentyten' ) ); ?>
			</div><!-- .entry-content -->
		<?php endif; ?>

			<div class="entry-utility">
				<?php bfa_posted_in(); ?>
			</div><!-- .entry-utility -->
		</article><!-- #post-## -->


<?php /* How to display all other posts. */ ?>

	<?php else : ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<h4 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'twentyten' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h4>

			<div class="entry-meta">
				<?php bfa_posted_on(); ?>
			</div><!-- .entry-meta -->

	<?php if ( is_archive() || is_search() ) : // Only display excerpts for archives and search. ?>
			<div class="entry-summary">
				<?php the_excerpt( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentyten' ) ); ?>
			</div><!-- .entry-summary -->
	<?php else : ?>
			<div class="entry-content">
				<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentyten' ) ); ?>
				<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'twentyten' ), 'after' => '</div>' ) ); ?>
			</div><!-- .entry-content -->
	<?php endif; ?>

			<div class="entry-utility">
				<?php bfa_posted_in(); ?>
			</div><!-- .entry-utility -->
		</article><!-- #post-## -->

		<?php comments_template( '', true ); ?>

	<?php endif; // This was the if statement that broke the loop into three parts based on categories. ?>

<?php endwhile; // End the loop. Whew. ?>

<?php /* Display navigation to next/previous pages when applicable */ ?>
<?php if (  $wp_query->max_num_pages > 1 ) : ?>
				<div id="nav-below" class="navigation">
					<div class="nav-previous alignleft"><?php next_posts_link( __( '<span class="meta-nav">&laquo;</span> Older posts', 'twentyten' ) ); ?></div>
					<div class="nav-next alignright"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&raquo;</span>', 'twentyten' ) ); ?></div>
				</div><!-- #nav-below -->
<?php endif; ?>
