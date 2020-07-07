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
	
	// check function exists
	if( function_exists('acf_register_block') ) {
		
		// register the hero block
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

		// register the hero block
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

		// register the hero block
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

		// register the hero block
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

		// register the hero block
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

	}
}








/*************************** Restrict gutenberg blocks *********************************/


function restrict_blocks( $allowed_blocks, $post ) {
	
	if( is_user_logged_in() ) {
		
		$user = wp_get_current_user();
		$roles = ( array ) $user->roles;
	
		if( in_array( strtolower('Administrator'), $roles ) )
		// if( in_array( strtolower('Editor'), $roles ) )
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


			);
			return $allowed_blocks;
		}

	}	
	
	add_filter( 'allowed_block_types', 'restrict_blocks', 10, 2); 