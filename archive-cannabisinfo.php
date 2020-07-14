<?php get_header(); ?>

<?php

	if ( is_post_type_archive( $post_types = 'cannabisinfo' ) ) {		

		$cpt_custom_page   = get_page_by_path('cannabis-knowledge', OBJECT, 'cannabisinfo_pages');
		$output =  apply_filters( 'the_content', $cpt_custom_page->post_content );

		if ( empty($output) ) :
			echo '<h2>Please create a frontpage for this category</h2>';
		else : ?>
			<div class="custom_page_content"><?php echo $output; ?></div>
		<?php endif; 		

	} ?>

<?php get_footer();
