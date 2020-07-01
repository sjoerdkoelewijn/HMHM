<?php get_header(); ?>

<?php
	
    $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
    $custom_page   = get_page_by_path($term->slug, OBJECT, 'cannabisinfo_pages'); // https://developer.wordpress.org/reference/functions/get_page_by_path/
    $output =  apply_filters( 'the_content', $custom_page->post_content );

    echo $term->slug;

    if ( empty($output) ) :
        echo '<h2>Please create a frontpage for this category</h2>';
    else : ?>
        <div class="custom_page_content"><?php echo $output; ?></div>
    <?php endif; ?>

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
