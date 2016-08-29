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
					<h2 class="page-title"><?php printf( __( '%s', 'twentyten' ), '<span>' . single_cat_title( '', false ) . '</span>' ); ?></h2>
						<?php get_template_part( 'loop','category' ); ?>
				</div><!--/leftZone-->		
			<?php get_sidebar(); ?>
		</div><!--/content-->
	</div><!--/contentContainer-->
</div><!--/contentBackground-->
<?php get_footer(); ?>