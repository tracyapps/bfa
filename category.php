<?php
/**
 * @package WordPress
 * @subpackage bfa
 * @Best Friends Approach
 */
get_header(); ?>
		<div class="content">

			<h2 class="page-title">Category archives: <?php printf( __( '%s', 'bfa' ), '<span>' . single_cat_title( '', false ) . '</span>' ); ?></h2>
			<?php get_template_part( 'loop', 'category' ); ?>
		</div><!--/content-->
	</div><!--/left-zone-->
	<div id="right-zone">
		<?php get_sidebar(); ?>
	</div><!--/rightZone-->
<?php get_footer(); ?>