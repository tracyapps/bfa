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
						<?php echo bfa_display_author_box(); ?>
					</footer><!-- .entry-utility -->
				</article><!-- #post-## -->

			<?php endwhile; // end of the loop. ?>
		</div><!--/content-->
		<?php get_template_part( 'parts/next-steps-area' ); ?>

		<nav id="bottom-posts-nav" class="posts-nav">
			<div class="half left"><?php previous_post_link(); ?></div>
			<div class="half right"><?php next_post_link(); ?></div>
		</nav><!-- #nav-below -->
	</div><!--/left-zone-->
	<div id="right-zone">
		<?php get_sidebar(); ?>
	</div><!--/rightZone-->


<?php get_footer(); ?>