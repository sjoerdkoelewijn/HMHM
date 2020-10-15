<?php 


add_theme_support( 'title-tag' );
add_theme_support( 'menus' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'responsive-embeds' );
add_post_type_support('page', 'excerpt');


/*************************** Add Reusable blocks to menu *********************************/

function wpdocs_register_my_custom_menu_page() {
		add_menu_page(
			__( 'Reusable Blocks', 'hashmuseum' ),
			'Reusable Blocks',
			'manage_options',
			'/edit.php?post_type=wp_block',
			'',
			'dashicons-text',
			20
		);
	}
add_action( 'admin_menu', 'wpdocs_register_my_custom_menu_page' );	


/*************************** Add taxonomy terms list *********************************/

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
                $out[] = sprintf( '<a class="taxonomy_link" href="%1$s">'. file_get_contents(get_template_directory() . "/images/svg/arrowRightIcon.svg"). '%2$s</a>',
                    esc_url( get_term_link( $term->slug, $taxonomy_slug ) ),
                    esc_html( $term->name )
                );
            }
        }
    }
    return implode( '', $out );
}




/*************************** Add ACF Option page *********************************/

add_action('acf/init', 'sk_acf_options_init', 95);

function sk_acf_options_init() {

	if( function_exists('acf_add_options_page') ) {
	
		acf_add_options_page(array(
			'page_title' 	=> 'Theme Settings (non-language specific)',
			'menu_title'	=> 'Theme Settings',
			'menu_slug' 	=> 'general-settings',
			'capability'	=> 'edit_posts',
			'redirect'		=> false
		));
		
		acf_add_options_sub_page(array(
			'page_title' 	=> 'English',
			'menu_title'	=> 'English',
			'menu_slug' 	=> 'english-settings',
			'parent_slug'	=> 'general-settings',
		));
	
		acf_add_options_sub_page(array(
			'page_title' 	=> 'Catalan',
			'menu_title'	=> 'Catalan',
			'menu_slug' 	=> 'catalan-settings',
			'parent_slug'	=> 'general-settings',
		));
		
		acf_add_options_sub_page(array(
			'page_title' 	=> 'Spanish',
			'menu_title'	=> 'Spanish',
			'menu_slug' 	=> 'spanish-settings',
			'parent_slug'	=> 'general-settings',
		));
	
		acf_add_options_sub_page(array(
			'page_title' 	=> 'French',
			'menu_title'	=> 'French',
			'menu_slug' 	=> 'french-settings',
			'parent_slug'	=> 'general-settings',
		));
	
		acf_add_options_sub_page(array(
			'page_title' 	=> 'Dutch',
			'menu_title'	=> 'Dutch',
			'menu_slug' 	=> 'dutch-settings',
			'parent_slug'	=> 'general-settings',
		));
	
		acf_add_options_sub_page(array(
			'page_title' 	=> 'German',
			'menu_title'	=> 'German',
			'menu_slug' 	=> 'german-settings',
			'parent_slug'	=> 'general-settings',
		));
		
	}

}




/***************************  Add Backend Notices **********************************/

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



/*************************** Add Ticket URL *********************************/

function sk_get_ticket_url($location) {

	if($location == 'barcelona') {
		pll_e( 'https://tickets.hashmuseum.com/en/barcelona', 'hashmuseum' );
	} else if ($location == 'amsterdam'){
		pll_e( 'https://tickets.hashmuseum.com/en/tickets', 'hashmuseum' );
	}

}

/*************************** Add language specific option *********************************/

function sk_lang_specific_option($key) {

	$current_language = pll_current_language();

	switch ($current_language) {
	case 'en':
		the_field($key . '_' . $current_language, 'option');
		break;
	case 'ca':
		the_field($key . '_' . $current_language, 'option');
		break;
	case 'es':
		the_field($key . '_' . $current_language, 'option');
		break;
	case 'fr':
		the_field($key . '_' . $current_language, 'option');
		break;
	case 'nl':
		the_field($key . '_' . $current_language, 'option');
		break;			
	case 'de':
		the_field($key . '_' . $current_language, 'option');
		break;			
	default:
		the_field($key . '_' . $current_language, 'option');
	}

}


/*************************** Create frontpage when taxonomy term is created *********************************/


function sk_created_collection_theme($taxonomy) {

	$user_id = get_current_user_id();
	$term = get_term( $taxonomy );
	$term_slug = $term->slug;

	$frontpage_details 	= array(
	'post_title'    	=> $term_slug,
	'post_type'			=> 'collection_pages',
	'post_status'   	=> 'publish',
	'post_author'   	=> $user_id,
	'post_type' 		=> 'collection_pages'
	);

	wp_insert_post( $frontpage_details );

}

add_action( 'created_collection_themes', 'sk_created_collection_theme', 10, 3 );


function sk_created_info_category($taxonomy) {

	$user_id = get_current_user_id();
	$term = get_term( $taxonomy );
	$term_slug = $term->slug;

	$frontpage_details 	= array(
	'post_title'    	=> $term_slug,
	'post_type'			=> 'cannabisinfo_pages',
	'post_status'   	=> 'publish',
	'post_author'   	=> $user_id
	);

	wp_insert_post( $frontpage_details );

}

add_action( 'created_info_categories', 'sk_created_info_category', 10, 3 );



	/*************************** Add Google Map API for use in the backend *********************************/

	function sk_acf_init() {
		acf_update_setting('google_api_key', 'AIzaSyBsrZ7LxIPSOSmJNzUO8IGV_L5OyZNBxOU');
	}
	add_action('acf/init', 'sk_acf_init');


	/*************************** Redirect Function*********************************/

	function redirect($url, $statusCode)
	{
	header('Location: ' . $url, true, $statusCode);
	}


