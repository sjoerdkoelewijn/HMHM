<?php

/***************************  Custom Gutenberg Blocks **********************************/

function sk_acf_block_render_callback( $block ) {
	
	// convert name ("acf/testimonial") into path friendly slug ("testimonial")
	$slug = str_replace('acf/', '', $block['name']);
	
	// include a template part from within the "blocks" folder
	if( file_exists( get_theme_file_path("/blocks/{$slug}.php") ) ) {
		include( get_theme_file_path("/blocks/{$slug}.php") );
	}
}

/*** Hero Block ***/

add_action('acf/init', 'my_acf_init');
function my_acf_init() {
	
	// check acf function exists
	if( function_exists('acf_register_block') ) {
		
		acf_register_block(array(
			'name'				=> 'hero',
			'title'				=> __('Hero Block'),
			'description'		=> __('The hero block for the top of the page'),
			'render_callback'	=> 'sk_acf_block_render_callback',
			'category'			=> 'common',
			'icon'				=> 'laptop',
			'mode'				=> 'edit', // start in edit mode
			'keywords'			=> array( 'hero', 'image' ),
		));

		acf_register_block(array(
			'name'				=> 'image_slider',
			'title'				=> __('Image Slider'),
			'description'		=> __('A horizontal image slider that spans the whole width of page.'),
			'render_callback'	=> 'sk_acf_block_render_callback',
			'category'			=> 'common',
			'icon'				=> 'images-alt2',
			'mode'				=> 'edit', // start in edit mode
			'keywords'			=> array( 'slider', 'image' ),
		));

		acf_register_block(array(
			'name'				=> 'sidebar',
			'title'				=> __('Sidebar Images & Quote'),
			'description'		=> __('A sidebar for images and an optional quote'),
			'render_callback'	=> 'sk_acf_block_render_callback',
			'category'			=> 'common',
			'icon'				=> 'index-card',
			'mode'				=> 'edit', // start in edit mode
			'keywords'			=> array( 'sidebar', 'image', 'quote' ),
		));

		acf_register_block(array(
			'name'				=> 'related-posts',
			'title'				=> __('Related Posts'),
			'description'		=> __('A slider with related posts.'),
			'render_callback'	=> 'sk_acf_block_render_callback',
			'category'			=> 'common',
			'icon'				=> 'slides',
			'mode'				=> 'edit', // start in edit mode
			'keywords'			=> array( 'slider', 'related' ),
		));

		acf_register_block(array(
			'name'				=> 'sub-items',
			'title'				=> __('Category Sub-items'),
			'description'		=> __('A slider with the posts of a category'),
			'render_callback'	=> 'sk_acf_block_render_callback',
			'category'			=> 'common',
			'icon'				=> 'slides',
			'mode'				=> 'edit', // start in edit mode
			'keywords'			=> array( 'slider', 'category', 'posts' ),
		));

		acf_register_block(array(
			'name'				=> 'promo',
			'title'				=> __('Promo Block'),
			'description'		=> __('A section to promote the museum'),
			'render_callback'	=> 'sk_acf_block_render_callback',
			'category'			=> 'common',
			'icon'				=> 'visibility',
			'mode'				=> 'edit', // start in edit mode
			'keywords'			=> array( 'promo', 'image' ),
		));

		acf_register_block(array(
			'name'				=> 'info',
			'title'				=> __('Info Block'),
			'description'		=> __('A simple information block with slider'),
			'render_callback'	=> 'sk_acf_block_render_callback',
			'category'			=> 'common',
			'icon'				=> 'laptop',
			'mode'				=> 'edit', // start in edit mode
			'keywords'			=> array( 'info', 'image' ),
		));

		acf_register_block(array(
			'name'				=> 'categories',
			'title'				=> __('Category Overview'),
			'description'		=> __('An overview of the sub catgories'),
			'render_callback'	=> 'sk_acf_block_render_callback',
			'category'			=> 'common',
			'icon'				=> 'editor-table',
			'mode'				=> 'edit', // start in edit mode
			'keywords'			=> array( 'categories', 'sub' ),
		));

		
		acf_register_block(array(
			'name'				=> 'collection-items',
			'title'				=> __('Collection Items'),
			'description'		=> __('An overview of all the collection items'),
			'render_callback'	=> 'sk_acf_block_render_callback',
			'category'			=> 'common',
			'icon'				=> 'slides',
			'mode'				=> 'edit', // start in edit mode
			'keywords'			=> array( 'collection', 'items', 'slider' ),
		));

		acf_register_block(array(
			'name'				=> 'collection-overview-hero',
			'title'				=> __('Collection Overview Hero'),
			'description'		=> __('Used at top of collection page'),
			'render_callback'	=> 'sk_acf_block_render_callback',
			'category'			=> 'common',
			'icon'				=> 'laptop',
			'mode'				=> 'edit', // start in edit mode
			'keywords'			=> array( 'collection', 'hero' ),
		));

	}
}



/*************************** Restrict gutenberg blocks *********************************/


function restrict_blocks( $allowed_blocks, $post ) {
	
	if( is_user_logged_in() ) {
		
		$user = wp_get_current_user();
		$roles = ( array ) $user->roles;
	
		if( in_array( strtolower('Editor'), $roles ) )
			$allowed_blocks = array(
				'core/heading',
				'core/image',
				'core/paragraph',
				'core/quote',
				'core/block',
				'core/list',
				'core/group',
				'core/embedyoutube',
				'core/embedvimeo',
				'core/embedtwitter',
				'acf/hero',
				'acf/image_slider',
				'acf/sidebar',
				'acf/related-posts',
				'acf/promo',
				'acf/sub-items',
				'acf/info',
				'acf/categories',
				'acf/collection-items',
				'acf/collection-overview-hero',

			);
			return $allowed_blocks;
		}

	}	
	
	add_filter( 'allowed_block_types', 'restrict_blocks', 10, 2); 