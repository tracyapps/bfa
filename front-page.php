<?php
/**
 * @package WordPress
 * @subpackage bfa
 * @Best Friends Approach
 */
get_header(); ?>
			<?php if($post->post_parent) 
					$children = wp_list_pages("title_li=&child_of=".$post->post_parent."&echo=0"); 
					else 
					$children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0"); 
					if ($children) { ?>
					<div class="pageSubNavContainer">
						<ul class="pageSubNav">
							<?php echo $children; ?>
						</ul>
					</div><!--/pageSubNavContainer-->
					<?php } ?>
					
			<div class="content">
				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>		
				<h2 class="page-title"><?php the_title(); ?></h2>
					<?php the_content(); ?>
					<br clear="all" />
					<?php edit_post_link( __( 'Edit', 'twentyten' ), '<span class="edit-link">', '</span>' ); ?>
				<?php endwhile; ?>
			</div><!--/content-->
		</div><!--/leftZone-->
		<div id="right-zone">
			<?php get_sidebar(); ?>
		</div><!--/rightZone-->

<?php get_footer(); ?>