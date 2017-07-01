<?php
/**
 * @package WordPress
 * @subpackage bfa
 * @Best Friends Approach
 */
get_header(); ?>
		<div class="content">

			<?php bfa_the_archive_title( '<h2 class="page-title">', '</h2>', 'smaller'); ?>

			<?php get_template_part( 'loop', 'list' ); ?>
		</div><!--/content-->
	</div><!--/left-zone-->
	<div id="right-zone">
		<?php get_sidebar(); ?>
	</div><!--/rightZone-->
<?php get_footer(); ?>