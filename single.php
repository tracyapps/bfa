<?php
/**
 * @package WordPress
 * @subpackage bfa
 * @Best Friends Approach
 */
get_header(); ?>
<div id="contentBackground">
	<div id="contentContainer">
		<div id="content">
			<div id="headerImage">
				<?php
				if ( is_singular() &&
						has_post_thumbnail( $post->ID ) &&
						( /* $src,  $width = 924px, $height = 187px, */ $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'post-thumbnail' ) )  ) :
				  ?>
					<img src="<?php bloginfo('template_url'); ?>/scripts/timthumb.php?src=<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), full  ); echo $src[0]; ?>&h=187&w=924&zc=1" class="pageHeaderImage" />
				<?php  else : ?>
					<img src="<?php bloginfo('template_url'); ?>/images/defaultPageHeader.jpg" width="924" height="187" alt="" class="pageHeaderImage" />
				<?php endif ?>
			</div><!--/headerImage-->
				<div id="leftZone">
					<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>		
					<h2 class="page-title"><?php the_title(); ?></h2>

						<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

							<div class="entry-meta">
								<?php twentyten_posted_on(); ?>
							</div><!-- .entry-meta -->

							<div class="entry-content">
								<?php the_content(); ?>
								<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'twentyten' ), 'after' => '</div>' ) ); ?>
							</div><!-- .entry-content -->

							<div class="entry-utility">
								<?php twentyten_posted_in(); ?>
								<?php edit_post_link( __( 'Edit', 'twentyten' ), '<span class="edit-link">', '</span>' ); ?>
							</div><!-- .entry-utility -->
						</div><!-- #post-## -->

						<div id="nav-below" class="navigation">
							<div class="nav-previous alignleft"><?php next_posts_link( __( '<span class="meta-nav">&laquo;</span> Older posts', 'twentyten' ) ); ?></div>
							<div class="nav-next alignright"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&raquo;</span>', 'twentyten' ) ); ?></div>
						</div><!-- #nav-below -->

						<?php comments_template( '', true ); ?>

<?php endwhile; // end of the loop. ?>

				</div><!--/leftZone-->
				<div id="centerZone">
				<?php $key = 'pull-quote'; $themeta = get_post_meta($post->ID, $key, TRUE); if($themeta != '') {
					echo '<span class="pull-quote">';
					echo get_post_meta($post->ID, 'pull-quote', true);
					echo '</span>';
				} ?>
			</div><!--/centerZone-->
			<?php get_sidebar(); ?>
		</div><!--/content-->
	</div><!--/contentContainer-->
</div><!--/contentBackground-->
<?php get_footer(); ?>