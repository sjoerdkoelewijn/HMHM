<?php get_header(); ?>

<?php
	
	$collection_custom_page   = get_page_by_path('collection', OBJECT, 'collection_pages');
	$collection_output =  apply_filters( 'the_content', $collection_custom_page->post_content );

	if ( empty($collection_output) ) :
		echo '<h2>Please create a frontpage for this post type</h2>';
	else : ?>
		<div class="custom_page_content"><?php echo $collection_output; ?></div>
	<?php endif; 

?>

<?php get_footer();
