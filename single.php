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

					<div class="entry-meta">
						<?php bfa_posted_on(); ?>
					</div><!-- .entry-meta -->

					<div class="entry-content">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'twentyten' ), 'after' => '</div>' ) ); ?>
					</div><!-- .entry-content -->

					<div class="entry-utility">
						<?php bfa_posted_in(); ?>
					</div><!-- .entry-utility -->
				</article><!-- #post-## -->

				<div id="nav-below" class="navigation">
					<div class="nav-previous alignleft"><?php next_posts_link( __( '<span class="meta-nav">&laquo;</span> Older posts', 'twentyten' ) ); ?></div>
					<div class="nav-next alignright"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&raquo;</span>', 'twentyten' ) ); ?></div>
				</div><!-- #nav-below -->

			<?php endwhile; // end of the loop. ?>
		</div><!--/content-->
	</div><!--/left-zone-->
	<div id="right-zone">
		<?php get_sidebar(); ?>
	</div><!--/rightZone-->


<?php get_footer(); ?>