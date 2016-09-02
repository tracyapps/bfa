<?php
/**
 * @package WordPress
 * @subpackage bfa
 * @Best Friends Approach
 */
get_header(); ?>
		<div class="content">

			<h2 class="page-title"><?php
				if ( is_day() ) :
					printf( __( 'Daily Archives: %s', 'bfa' ), get_the_date() );
				elseif ( is_month() ) :
					printf( __( 'Monthly Archives: %s', 'bfa' ), get_the_date('F Y') );
				elseif ( is_year() ) :
					printf( __( 'Yearly Archives: %s', 'bfa' ), get_the_date('Y') );
				else :
					_e( 'Blog Archives', 'bfa' );
				endif;
				?></h2>
			<?php get_template_part( 'loop', 'category' ); ?>
		</div><!--/content-->
	</div><!--/left-zone-->
	<div id="right-zone">
		<?php get_sidebar(); ?>
	</div><!--/rightZone-->
<?php get_footer(); ?>