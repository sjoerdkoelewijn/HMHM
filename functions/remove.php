<?php

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

