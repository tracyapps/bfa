<?php
/**
 * @package WordPress
 * @subpackage bfa
 * @Best Friends Approach
 */
get_header(); ?>

			<div class="content">
				<h2 class="page-title"><?php single_post_title(); ?></h2>
				<section class="archive-list">
					<?php  get_template_part( 'loop', 'list' ); ?>
				</section>
			</div><!--/content-->
	</div><!--/left-zone-->
	<div id="right-zone">
		<?php get_sidebar(); ?>
	</div><!--/rightZone-->
<?php get_footer(); ?>