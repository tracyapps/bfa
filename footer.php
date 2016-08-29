<?php
/**
 * @package WordPress
 * @subpackage bfa
 * @Best Friends Approach
 */ ?>
</main>
	<footer class="site-footer">
		<div class="container">
			<div class="alignright">
				<img src="<?php echo get_template_directory_uri(); ?>/images/bfa-footer-logo.png" alt="Best Friends Approach">
			</div>
			&copy;<?php echo date('Y'); ?> David Troxel and Virginia Bell. All rights reserved. Best Friends&trade; Health Professions Press.
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer')) : ?><?php endif; ?>
		</div>
	</footer>

<?php wp_footer(); ?>
</body>
</html>