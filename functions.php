<?php

include 'translations/polylang_translations.php';
include 'functions/custom-post-types.php';
include 'functions/gutenberg-blocks.php';
include 'functions/enqueue.php';

/* ACF should be set to disabled on dev env */
//include 'functions/advanced-custom-fields.php';


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




/*************************** Add ACF Option page *********************************/

function sk_taxonomy_terms() {

	// Get post by post ID.
    if ( ! $post = get_post() ) {
        return '';
    }
 
    // Get post type by post.
    $post_type = $post->post_type;
 
    // Get post type taxonomies.
	$taxonomies = get_object_taxonomies( $post_type, 'objects' );
	$exclude = array( 'language' );
 
    $out = array();
 
    foreach ( $taxonomies as $taxonomy_slug => $taxonomy ){

		if( in_array( $taxonomy->name, $exclude ) ) {
            continue;
        }
 
        // Get the terms related to post.
        $terms = get_the_terms( $post->ID, $taxonomy_slug );
 
        if ( ! empty( $terms ) ) {
            foreach ( $terms as $term ) {
                $out[] = sprintf( '<a class="taxonomy_link" href="%1$s">'. file_get_contents(get_template_directory_uri() . "/images/svg/arrowRightIcon.svg"). '%2$s</a>',
                    esc_url( get_term_link( $term->slug, $taxonomy_slug ) ),
                    esc_html( $term->name )
                );
            }
        }
    }
    return implode( '', $out );
}


/*************************** Ticket URL *********************************/

function sk_get_ticket_url($location) {

	if($location = 'Barcelona') {
		echo 'https://tickets.hashmuseum.com/' . pll_current_language() . '/barcelona';
	} else if ($location = 'Amsterdam'){
		echo 'https://tickets.hashmuseum.com/' . pll_current_language() . '/tickets';
	}

}

/*************************** Get language specific option *********************************/

function sk_lang_specific_option($key) {

	$current_language = pll_current_language();

	switch ($current_language) {
	case 'en':
		get_field($key, 'acf-options-english');
		break;
	case 'ca':
		get_field($key, 'acf-options-catalan');
		break;
	case 'es':
		get_field($key, 'acf-options-spanish');
		break;
	case 'fr':
		get_field($key, 'acf-options-french');
		break;
	case 'nl':
		get_field($key, 'acf-options-dutch');
		break;			
	case 'de':
		get_field($key, 'acf-options-german');
		break;			
	default:
		get_field($key, 'acf-options-english');
	}

}