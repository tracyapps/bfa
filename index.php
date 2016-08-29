<?php
/**
 * @package WordPress
 * @subpackage bfa
 * @Best Friends Approach
 */
get_header(); ?>

			<div class="content">
				<?php query_posts('category_name=homepage-boxes&showposts=2'); ?>
  					<?php while (have_posts()) : the_post(); ?>
  						<div class="homepageIntroBox">
  							<h5><?php the_title(); ?></h5>
							<?php the_content(''); ?>
						</div><!--/homepageIntroBox-->
					<?php endwhile; ?>
				
			</div><!--/content-->
		</div><!--/leftZone-->
		<div id="right-zone">
				<?php rewind_posts(); ?>
					<?php query_posts('category_name=homepage-news&showposts=1'); ?>
  					<?php while (have_posts()) : the_post(); ?>
  						<div class="homepageNews box">
  							<h5><?php the_title(); ?></h5>
							<?php the_content(''); ?>
						</div><!--/homepageNews-->
					<?php endwhile; ?>
<?php rewind_posts(); ?>
				
				
					<?php query_posts('category_name=homepage-featured&showposts=2'); ?>
  					<?php while (have_posts()) : the_post(); ?>
  						<div class="homepageFeatured box">
  							<h5><?php the_title(); ?></h5>
							<?php the_content(''); ?>
								<?php $key = '_mcf_learnMoreLink'; $themeta = get_post_meta($post->ID, $key, TRUE); if($themeta != '') {
										echo '<a href="';
										echo get_post_meta($post->ID, '_mcf_learnMoreLink', true);
										echo '" class="button">Click to learn more &raquo;</a>';
									} ?>
						</div><!--/homepageFeatured-->
					<?php endwhile; ?>
					
					<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('8 - All - sidebar bottom')) : ?><?php endif; ?>

		</div><!--/rightZone-->

<?php get_footer(); ?>