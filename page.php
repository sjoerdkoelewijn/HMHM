<?php get_header(); ?>

	<?php while ( have_posts() ) : ?>
		
		<?php the_post(); ?>


		<?php echo the_title( '<h1>', '</h1>' ); ?>

		<?php the_content(); ?>

	<?php endwhile; ?>

<?php get_footer();
