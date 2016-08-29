<?php
/**
 * @package WordPress
 * @subpackage bfa
 * @Best Friends Approach
 */
get_header(); ?>
			<div id="content">	
					<h2 class="page-title"><?php _e( 'Not Found', 'twentyten' ); ?></h2>
						<p><?php _e( 'Apologies, but the page you requested could not be found. Perhaps searching will help.', 'twentyten' ); ?></p>
						<?php get_search_form(); ?>
			</div><!--/content-->
		</div><!--/leftZone-->
		<div id="rightZone">
			<?php get_sidebar(); ?>
		</div><!--/rightZone-->

<?php get_footer(); ?>