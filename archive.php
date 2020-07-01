<?php get_header(); ?>

<h1>This is archive.php</h1>

<?php echo get_the_category_list(); ?>

	<?php if ( have_posts() ) : ?>

		<?php the_archive_title( ); ?>	

	<?php endif; ?>

	<?php if ( have_posts() ) : ?>	
					
		<?php while ( have_posts() ) : the_post(); ?>		
		
			<a href="<?php the_permalink(); ?>">
				<?php the_title(); ?>
			</a>												
			
		<?php endwhile; ?>

	<?php else : ?>

		'No content'

	<?php endif; ?>   

<?php get_footer();
