<?php get_header(); ?>

	<?php if ( have_posts() ) : ?>	
					
		<?php while ( have_posts() ) : the_post(); ?>


		<p>
			<?php the_field('amsterdam_opening_hours_en', 'general-settings'); ?>
		</p>


			<?php the_content(); ?>												
			
		<?php endwhile; ?>

	<?php else : ?>

		'No content'

	<?php endif; ?>   

<?php get_footer(); ?>