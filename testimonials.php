    		<div class="testimonial">
    			
    			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    				<h6>Testimonial:</h6>
    				<blockquote>
    					<?php echo get_the_post_thumbnail($post->ID, array(95,95)); ?>
    					<?php the_content(''); ?>
    				</blockquote>
    				<div class="author">
    					<?php the_excerpt(''); ?>
    				</div>
    			<?php endwhile; endif; ?>
    		</div><!--/testimonial-->
    		<?php wp_reset_query(); ?>