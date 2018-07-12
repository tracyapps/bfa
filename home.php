<?php
/**
 * @package WordPress
 * @subpackage bfa
 * @Best Friends Approach
 */
get_header(); ?>

		<div class="content">
			<h2 class="page-title"><?php single_post_title(); ?></h2>
			<?php
			$args = array(

			);
			$latest_post_query = new WP_Query( $args );
			?>
			<?php  get_template_part( 'loop', 'list' ); ?>
		</div><!--/content-->
	</div><!--/left-zone-->
	<div id="right-zone">
		<?php get_sidebar(); ?>
	</div><!--/rightZone-->
<?php get_footer(); ?>