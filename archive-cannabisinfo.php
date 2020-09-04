<?php get_header(); ?>

	<?php

	if ( is_post_type_archive( $post_types = 'cannabisinfo' ) ) {		

		$cpt_custom_page   = get_page_by_path('cannabis-knowledge', OBJECT, 'cannabisinfo_pages');
		$output =  apply_filters( 'the_content', $cpt_custom_page->post_content );

		if ( empty($output) ) :
			echo '<div class="frontpage warning"><h2>Please add content to the <a href="/wp-admin/edit.php?post_type=cannabisinfo_pages">frontpage</a> of this category.</h2></div>';
		else : ?>
			<div class="knowledge frontpage"><?php echo $output; ?></div>
		<?php endif; 		

	} ?>

<?php get_footer();
