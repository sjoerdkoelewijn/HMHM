<?php get_header(); ?>

<?php
	
	$current_language = pll_current_language();

	switch ($current_language) {
	case 'en':	
		$new_url = str_replace('/collectionpage/', '/collection/', $current_url);
		redirect($new_url, 302);
		break;
	case 'ca':
		$collection_custom_page   = get_page_by_path('colleccio', OBJECT, 'collection_pages');
		
		break;
	case 'es':
		$collection_custom_page   = get_page_by_path('collection', OBJECT, 'collection_pages');
		
		break;
	case 'fr':
		$collection_custom_page   = get_page_by_path('collection', OBJECT, 'collection_pages');
		
		break;
	case 'nl':
		$collection_custom_page   = get_page_by_path('collectie', OBJECT, 'collection_pages');
		
		break;			
	case 'de':
		$collection_custom_page   = get_page_by_path('sammlung', OBJECT, 'collection_pages');
		
		break;			
	default:
		$collection_custom_page   = get_page_by_path('collection', OBJECT, 'collection_pages');
		
	}
	
	$collection_output =  apply_filters( 'the_content', $collection_custom_page->post_content );

	if ( empty($collection_output) ) :
		echo '<div class="frontpage warning"><h2>Please add content to the <a href="/wp-admin/edit.php?post_type=collection_pages">frontpage</a> of this theme.</h2></div>';
	else : ?>
		<div class="collection frontpage"><?php echo $collection_output; ?></div>
	<?php endif; 

?>

<?php get_footer();
