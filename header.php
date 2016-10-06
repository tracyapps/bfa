<?php
/**
 * @package WordPress
 * @subpackage bfa
 * @Best Friends Approach
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<meta name="description" content="Virgina Bell and David Troxel's Best Friends Approach">
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link rel="shortcut icon" href="/favicon.ico">
	<link rel="apple-touch-icon" href="/apple-touch-icon.png">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php
	wp_head();
?>


</head>
<body <?php body_class(); ?>>
	<main class="container main-content">
		<div id="left-zone">
			<header>
				<?php
				if ( has_post_thumbnail() ) :
					$featured_image_url = get_the_post_thumbnail_url();
					$div_class = '';
				else :
					$featured_image_url = get_template_directory_uri() . '/images/defaultPageHeader.jpg';
					$div_class = 'no-featured-image';
				endif;

				echo '<div class="featured-image ' . esc_html( $div_class ) . '" style="background-image: url(' . esc_url( $featured_image_url ) . ')">'
				?>

					<div id="logo">
						<a href="<?php bloginfo( 'home' ); ?>">
						<h2>VIRGINIA BELL and DAVID TROXEL's</h2>
						<h1>Best Friends<span class="small">&trade; </span>approach</h1>
						<h3>to Alzheimer's and Dementia Care</h3>
						</a>
					</div><!--/logo-->

					<nav class="main-navigation">

						<?php wp_nav_menu( array( 'sort_column' => 'menu_order', 'container_class' => 'menu-header drawer', 'theme_location' => 'primary', 'depth' => 1 ) ); ?>
					</nav>
				</div><!--/featured-image-->
			</header>
