<?php

include 'translations/polylang_translations.php';
include 'functions/custom-post-types.php';
include 'functions/advanced-custom-fields.php';

add_theme_support( 'title-tag' );
add_theme_support( 'menus' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'responsive-embeds' );

add_post_type_support('page', 'excerpt');



/** Register menus **/
register_nav_menus( array(
	'main-navigation' => __( 'Main Navigation', 'hashmuseum' ),
	'language-menu' => __( 'Language Menu', 'hashmuseum' ),
	'explore-menu' => __( 'Explore Menu (Footer)', 'hashmuseum' ),
	'boring-links' => __( 'Boring Links', 'hashmuseum' ),
	'social-menu-ams' => __( 'Social Menu Amsterdam', 'hashmuseum' ),
	'social-menu-bcn' => __( 'Social Menu Amsterdam', 'hashmuseum' ),
) );



/*************************** Enqueue Styles **********************************/

function hashmuseum_styles() {

	$filename = get_stylesheet_directory() . '/dist/css/style.min.css';
	$timestamp = filemtime($filename);

	wp_enqueue_style('hashmuseum-styles', get_template_directory_uri() . '/dist/css/style.min.css', NULL, $timestamp, 'all' );

	if ( is_home() ) {
		// Add styles for homepage
	}

	wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Prata&display=swap', NULL, NULL, 'all' );


}
add_action( 'wp_enqueue_scripts', 'hashmuseum_styles', 99 );


function admin_styles() {

	$filename = get_stylesheet_directory() . '/dist/css/admin.min.css';
	$timestamp = filemtime($filename);
	wp_enqueue_style('admin-styles', get_template_directory_uri() . '/dist/css/admin.min.css', NULL, $timestamp, 'all' );

}

add_action('admin_enqueue_scripts', 'admin_styles');



/*************************** Enqueue Scripts **********************************/

function hashmuseum_scripts() {

	$filename = get_stylesheet_directory() . '/dist/js/app.min.js';
	$timestamp = filemtime($filename);

	if (!is_admin()) {
		wp_deregister_script('jquery');
	}

	wp_enqueue_script('logo-color-switch', get_template_directory_uri() . '/dist/js/background-check.min.js', NULL, $timestamp, FALSE);
	wp_enqueue_script('slider', get_template_directory_uri() . '/libs/siema.min.js', NULL, $timestamp, FALSE);

	wp_enqueue_script('hashmuseum-app', get_template_directory_uri() . '/dist/js/app.min.js', NULL, $timestamp, TRUE);


	if ( is_home() ) {
/*		wp_enqueue_script('fullpage-js', get_template_directory_uri() . '/js/jquery.fullpage.min.js', NULL, NULL, FALSE);*/
	}

}
add_action( 'wp_enqueue_scripts', 'hashmuseum_scripts', 99 );



/*************************** Remove wordpress functionality **********************************/

remove_action( 'admin_print_styles', 'print_emoji_styles' );
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );

// remove_filter ('the_excerpt', 'wpautop'); // Changes double line-breaks in the excerpt into HTML paragraphs 
// remove_filter ('the_content', 'wpautop'); //Changes double line-breaks in the content into HTML paragraphs
// remove_filter('term_description','wpautop'); // Changes double line-breaks in the taxonomy description into HTML paragraphs 

/*************************** REMOVE ITEMS FROM ADMIN **********************************/

function remove_admin_menus() {

	remove_menu_page( 'edit.php' ); // Standard post

}
add_action( 'admin_menu', 'remove_admin_menus' );


function remove_default_post_type_menu_bar( $wp_admin_bar ) {
	$wp_admin_bar->remove_node( 'new-post' ); // Default post from admin bar 
}
add_action( 'admin_bar_menu', 'remove_default_post_type_menu_bar', 999 );


function remove_draft_widget(){
    remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
}
add_action( 'wp_dashboard_setup', 'remove_draft_widget', 999 );



/*************************** REMOVE COMMENTS EVERYWHERE **********************************/

add_action('admin_init', function () {
    // Redirect any user trying to access comments page
    global $pagenow;
    
    if ($pagenow === 'edit-comments.php') {
        wp_redirect(admin_url());
        exit;
    }

    // Remove comments metabox from dashboard
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');

    // Disable support for comments and trackbacks in post types
    foreach (get_post_types() as $post_type) {
        if (post_type_supports($post_type, 'comments')) {
            remove_post_type_support($post_type, 'comments');
            remove_post_type_support($post_type, 'trackbacks');
        }
    }
});

// Close comments on the front-end
add_filter('comments_open', '__return_false', 20, 2);
add_filter('pings_open', '__return_false', 20, 2);

// Hide existing comments
add_filter('comments_array', '__return_empty_array', 10, 2);

// Remove comments page in menu
add_action('admin_menu', function () {
    remove_menu_page('edit-comments.php');
});

// Remove comments links from admin bar
add_action('init', function () {
    if (is_admin_bar_showing()) {
        remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
    }
});



/*************************** Custom Menu Walker **********************************/

class Social_Menu_Walker extends Walker_Nav_Menu {

	function start_el(&$output, $item, $depth=0, $args=array(), $id = 0) {

		$title = $item->title;
		$permalink = $item->url;

		$output .= "<div class='" .  implode(" ", $item->classes) . "'>";
		$output .= '<a title="' . $title . '" href="' . $permalink . '">';
		$output .= '</a>';
		$output .= '</div>';

	}

}


/***************************  Backend Notices **********************************/

global $pagenow;

// This is the notice on the Themes pages
if (( $pagenow == 'edit-tags.php' ) && ($_GET['post_type'] == 'collection')) {
	add_action( 'admin_notices', 'sk_category_notice' );
}

function sk_category_notice() { ?>
    <div class="notice notice-warning">
        <p><?php _e( 'This is only to create the category. You can add the actual content on the <a href="/wp-admin/edit.php?post_type=collection_pages">frontpages</a>.', 'hashmuseum' ); ?></p>
    </div>
<?php }


// This is the notice on the frontpages page
if (( $pagenow == 'edit.php' ) && ($_GET['post_type'] == 'collection_pages')) {
	add_action( 'admin_notices', 'sk_frontpages_notice' );
}

function sk_frontpages_notice() { ?>
    <div class="notice notice-warning">
        <p><?php _e( 'Keep in mind that the frontpage needs to have the same slug as the <a href="/wp-admin/edit-tags.php?taxonomy=collection_themes&post_type=collection">theme</a>. Otherwise it doesn\'t work', 'hashmuseum' ); ?></p>
    </div>
<?php }


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
			'title'				=> __('Sidebar Images'),
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
				'core/embedyoutube',
				'acf/hero',
				'acf/textimage',
				'acf/kaart',
				'acf/googlemap',
				'acf/nieuwsbrief',
				'acf/latestpost',
				'acf/fullimage',
				'acf/vrijecontent',
				'acf/blockslider',
				'acf/form',
				'acf/footer',
				'acf/button'

			);
			return $allowed_blocks;
		}

	}	
	
	// add_filter( 'allowed_block_types', 'restrict_blocks', 10, 2); 





/*************************** Add ACF Option page *********************************/

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'General Settings (non-language specific)',
		'menu_title'	=> 'General Settings',
		'menu_slug' 	=> 'general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'English',
		'menu_title'	=> 'English',
		'parent_slug'	=> 'general-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Catalan',
		'menu_title'	=> 'Catalan',
		'parent_slug'	=> 'general-settings',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Spanish',
		'menu_title'	=> 'Spanish',
		'parent_slug'	=> 'general-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'French',
		'menu_title'	=> 'French',
		'parent_slug'	=> 'general-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Dutch',
		'menu_title'	=> 'Dutch',
		'parent_slug'	=> 'general-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'German',
		'menu_title'	=> 'German',
		'parent_slug'	=> 'general-settings',
	));
	
}