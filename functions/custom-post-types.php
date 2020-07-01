<?php

function cpt_collection() {

	$labels = array(
			'name'                  => _x( 'The Collection', 'Post Type General Name', 'hashmuseum' ),
			'singular_name'         => _x( 'The Collection', 'Post Type Singular Name', 'hashmuseum' ),
			'menu_name'             => __( 'The Collection', 'hashmuseum' ),
			'name_admin_bar'        => __( 'Collection Item', 'hashmuseum' ),
			'archives'              => __( 'Item Archives', 'hashmuseum' ),
			'attributes'            => __( 'Item Attributes', 'hashmuseum' ),
			'parent_item_colon'     => __( 'Parent Item:', 'hashmuseum' ),
			'all_items'             => __( 'Collection Items', 'hashmuseum' ),
			'add_new_item'          => __( 'Add New Collection Item', 'hashmuseum' ),
			'add_new'               => __( 'Add New', 'hashmuseum' ),
			'new_item'              => __( 'New Item', 'hashmuseum' ),
			'edit_item'             => __( 'Edit Item', 'hashmuseum' ),
			'update_item'           => __( 'Update Item', 'hashmuseum' ),
			'view_item'             => __( 'View Item', 'hashmuseum' ),
			'view_items'            => __( 'View Items', 'hashmuseum' ),
			'search_items'          => __( 'Search Item', 'hashmuseum' ),
			'not_found'             => __( 'Not found', 'hashmuseum' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'hashmuseum' ),
			'featured_image'        => __( 'Featured Image', 'hashmuseum' ),
			'set_featured_image'    => __( 'Set featured image', 'hashmuseum' ),
			'remove_featured_image' => __( 'Remove featured image', 'hashmuseum' ),
			'use_featured_image'    => __( 'Use as featured image', 'hashmuseum' ),
			'insert_into_item'      => __( 'Insert into item', 'hashmuseum' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'hashmuseum' ),
			'items_list'            => __( 'Items list', 'hashmuseum' ),
			'items_list_navigation' => __( 'Items list navigation', 'hashmuseum' ),
			'filter_items_list'     => __( 'Filter items list', 'hashmuseum' ),
	);
	$rewrite = array(
			'slug'                  => __( 'collection', 'hashmuseum' ) . '/%collection_themes%',
			'with_front'            => true,
			'pages'                 => true,
			'feeds'                 => true,
	);
	$args = array(
			'label'                 => __( 'Collection', 'hashmuseum' ),
			'description'           => __( 'The Hashmuseum Collection', 'hashmuseum' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'custom-fields', ),
			//'taxonomies'            => array( 'collection' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 3,
			'menu_icon'             => 'dashicons-images-alt',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => 'collection',
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'rewrite'               => $rewrite,
			'capability_type'       => 'post',
			'show_in_rest'          => true,
			"query_var"           	=> true,
	);
	register_post_type( 'collection', $args );

}
add_action( 'init', 'cpt_collection', 0 );


function cpt_collection_taxonomy() { 
 
	  $labels = array(
		'name' => _x( 'Collection Themes', 'taxonomy general name', 'hashmuseum' ),
		'singular_name' => _x( 'Collection Theme', 'taxonomy singular name', 'hashmuseum' ),
		'search_items' =>  __( 'Search Themes', 'hashmuseum' ),
		'all_items' => __( 'All Themes', 'hashmuseum' ),
		'parent_item' => __( 'Parent Theme', 'hashmuseum' ),
		'parent_item_colon' => __( 'Parent Theme:', 'hashmuseum' ),
		'edit_item' => __( 'Edit Theme', 'hashmuseum' ), 
		'update_item' => __( 'Update Theme', 'hashmuseum' ),
		'add_new_item' => __( 'Add New Theme', 'hashmuseum' ),
		'new_item_name' => __( 'New Theme Name', 'hashmuseum' ),
		'menu_name' => __( 'Themes', 'hashmuseum' ),
	  );    
	  
	  register_taxonomy('collection_themes', array('collection'), array(
		'hierarchical' 		=> true,
		"public"        	=> true,
		'labels' 			=> $labels,
		'show_ui' 			=> true,
		'show_admin_column' => true,
		'query_var' 		=> true,
		'rewrite' 			=> array( 'slug' => 'collection' ),
	  ));
	 
}
add_action( 'init', 'cpt_collection_taxonomy', 0 );



function custom_collection_pages() {

	$labels = array(
			'name'                  => _x( 'Frontpages', 'Post Type General Name', 'hashmuseum' ),
			'singular_name'         => _x( 'Frontpage', 'Post Type Singular Name', 'hashmuseum' ),
			'menu_name'             => __( 'Frontpages', 'hashmuseum' ),
			'name_admin_bar'        => __( 'Collection Frontpage', 'hashmuseum' ),
			'archives'              => __( 'Page Archives', 'hashmuseum' ),
			'attributes'            => __( 'Page Attributes', 'hashmuseum' ),
			'parent_item_colon'     => __( 'Parent Page:', 'hashmuseum' ),
			'all_items'             => __( 'Frontpages', 'hashmuseum' ),
			'add_new_item'          => __( 'Add New Page', 'hashmuseum' ),
			'add_new'               => __( 'Add New', 'hashmuseum' ),
			'new_item'              => __( 'New Page', 'hashmuseum' ),
			'edit_item'             => __( 'Edit Page', 'hashmuseum' ),
			'update_item'           => __( 'Update Page', 'hashmuseum' ),
			'view_item'             => __( 'View Page', 'hashmuseum' ),
			'view_items'            => __( 'View Pages', 'hashmuseum' ),
			'search_items'          => __( 'Search Page', 'hashmuseum' ),
			'not_found'             => __( 'Not found', 'hashmuseum' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'hashmuseum' ),
			'featured_image'        => __( 'Featured Image', 'hashmuseum' ),
			'set_featured_image'    => __( 'Set featured image', 'hashmuseum' ),
			'remove_featured_image' => __( 'Remove featured image', 'hashmuseum' ),
			'use_featured_image'    => __( 'Use as featured image', 'hashmuseum' ),
			'insert_into_item'      => __( 'Insert into item', 'hashmuseum' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'hashmuseum' ),
			'items_list'            => __( 'Items list', 'hashmuseum' ),
			'items_list_navigation' => __( 'Items list navigation', 'hashmuseum' ),
			'filter_items_list'     => __( 'Filter items list', 'hashmuseum' ),
	);
	$rewrite = array(
			'slug'                  => 'collectionpage', 
			'with_front'            => false,

	);
	$args = array(
			'label'                 => __( 'Collection Front Pages', 'hashmuseum' ),
			'description'           => __( 'Custom front pages for the collection post type.', 'hashmuseum' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'custom-fields',),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => 'edit.php?post_type=collection',
			'menu_position'         => 3,
			'menu_icon'             => 'dashicons-images-alt',
			'show_in_admin_bar'     => false,
			'show_in_nav_menus'     => false,
			'can_export'            => true,
			'has_archive'           => false,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'rewrite'               => $rewrite,
			'capability_type'       => 'page',
			'show_in_rest'          => true, // false will enable classic editor.
			"query_var"           	=> true,
	);
	register_post_type( 'collection_pages', $args );

}
add_action( 'init', 'custom_collection_pages', 1 );





/* ----------  Cannabis Info ------------------- */

function cpt_cannabisinfo() {

	$labels = array(
			'name'                  => _x( 'Cannabis Info', 'Post Type General Name', 'hashmuseum' ),
			'singular_name'         => _x( 'Cannabis Info', 'Post Type Singular Name', 'hashmuseum' ),
			'menu_name'             => __( 'Cannabis Info', 'hashmuseum' ),
			'name_admin_bar'        => __( 'Cannabis Info Item', 'hashmuseum' ),
			'archives'              => __( 'Item Archives', 'hashmuseum' ),
			'attributes'            => __( 'Item Attributes', 'hashmuseum' ),
			'parent_item_colon'     => __( 'Parent Item:', 'hashmuseum' ),
			'all_items'             => __( 'Info Items', 'hashmuseum' ),
			'add_new_item'          => __( 'Add New Info Item', 'hashmuseum' ),
			'add_new'               => __( 'Add New', 'hashmuseum' ),
			'new_item'              => __( 'New Item', 'hashmuseum' ),
			'edit_item'             => __( 'Edit Item', 'hashmuseum' ),
			'update_item'           => __( 'Update Item', 'hashmuseum' ),
			'view_item'             => __( 'View Item', 'hashmuseum' ),
			'view_items'            => __( 'View Items', 'hashmuseum' ),
			'search_items'          => __( 'Search Item', 'hashmuseum' ),
			'not_found'             => __( 'Not found', 'hashmuseum' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'hashmuseum' ),
			'featured_image'        => __( 'Featured Image', 'hashmuseum' ),
			'set_featured_image'    => __( 'Set featured image', 'hashmuseum' ),
			'remove_featured_image' => __( 'Remove featured image', 'hashmuseum' ),
			'use_featured_image'    => __( 'Use as featured image', 'hashmuseum' ),
			'insert_into_item'      => __( 'Insert into item', 'hashmuseum' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'hashmuseum' ),
			'items_list'            => __( 'Items list', 'hashmuseum' ),
			'items_list_navigation' => __( 'Items list navigation', 'hashmuseum' ),
			'filter_items_list'     => __( 'Filter items list', 'hashmuseum' ),
	);
	$rewrite = array(
			'slug'                  => __( 'cannabis-info', 'hashmuseum' ) . '/%info_categories%',
			'with_front'            => true,
			'pages'                 => true,
			'feeds'                 => true,
	);
	$args = array(
			'label'                 => __( 'Cannabis Info', 'hashmuseum' ),
			'description'           => __( 'Cannabis information', 'hashmuseum' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'custom-fields', ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 2,
			'menu_icon'             => 'dashicons-info',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => 'cannabis-info',
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'rewrite'               => $rewrite,
			'capability_type'       => 'post',
			'show_in_rest'          => true,
			"query_var"           	=> true,
	);
	register_post_type( 'cannabisinfo', $args );

}
add_action( 'init', 'cpt_cannabisinfo', 3 );


function cpt_cannabisinfo_taxonomy() { 
 
	  $labels = array(
		'name' => _x( 'Cannabis Info categories', 'taxonomy general name', 'hashmuseum' ),
		'singular_name' => _x( 'Cannabis Info Category', 'taxonomy singular name', 'hashmuseum' ),
		'search_items' =>  __( 'Search Categories', 'hashmuseum' ),
		'all_items' => __( 'All Categories', 'hashmuseum' ),
		'parent_item' => __( 'Parent Category', 'hashmuseum' ),
		'parent_item_colon' => __( 'Parent Category:', 'hashmuseum' ),
		'edit_item' => __( 'Edit Category', 'hashmuseum' ), 
		'update_item' => __( 'Update Category', 'hashmuseum' ),
		'add_new_item' => __( 'Add New Category', 'hashmuseum' ),
		'new_item_name' => __( 'New Category Name', 'hashmuseum' ),
		'menu_name' => __( 'Categories', 'hashmuseum' ),
	  );    
	  
	  register_taxonomy('info_categories', array('cannabisinfo'), array(
		'hierarchical' 		=> true,
		"public"        	=> true,
		'labels' 			=> $labels,
		'show_ui' 			=> true,
		'show_admin_column' => true,
		'query_var' 		=> true,
		'rewrite' 			=> array( 'slug' => 'cannabis-info' ),
	  ));
	 
}
add_action( 'init', 'cpt_cannabisinfo_taxonomy', 0 );

function custom_cannabisinfo_pages() {

	$labels = array(
			'name'                  => _x( 'Frontpages', 'Post Type General Name', 'hashmuseum' ),
			'singular_name'         => _x( 'Frontpage', 'Post Type Singular Name', 'hashmuseum' ),
			'menu_name'             => __( 'Frontpages', 'hashmuseum' ),
			'name_admin_bar'        => __( 'Cannabis Info Frontpage', 'hashmuseum' ),
			'archives'              => __( 'Page Archives', 'hashmuseum' ),
			'attributes'            => __( 'Page Attributes', 'hashmuseum' ),
			'parent_item_colon'     => __( 'Parent Page:', 'hashmuseum' ),
			'all_items'             => __( 'Frontpages', 'hashmuseum' ),
			'add_new_item'          => __( 'Add New Page', 'hashmuseum' ),
			'add_new'               => __( 'Add New', 'hashmuseum' ),
			'new_item'              => __( 'New Page', 'hashmuseum' ),
			'edit_item'             => __( 'Edit Page', 'hashmuseum' ),
			'update_item'           => __( 'Update Page', 'hashmuseum' ),
			'view_item'             => __( 'View Page', 'hashmuseum' ),
			'view_items'            => __( 'View Pages', 'hashmuseum' ),
			'search_items'          => __( 'Search Page', 'hashmuseum' ),
			'not_found'             => __( 'Not found', 'hashmuseum' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'hashmuseum' ),
			'featured_image'        => __( 'Featured Image', 'hashmuseum' ),
			'set_featured_image'    => __( 'Set featured image', 'hashmuseum' ),
			'remove_featured_image' => __( 'Remove featured image', 'hashmuseum' ),
			'use_featured_image'    => __( 'Use as featured image', 'hashmuseum' ),
			'insert_into_item'      => __( 'Insert into item', 'hashmuseum' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'hashmuseum' ),
			'items_list'            => __( 'Items list', 'hashmuseum' ),
			'items_list_navigation' => __( 'Items list navigation', 'hashmuseum' ),
			'filter_items_list'     => __( 'Filter items list', 'hashmuseum' ),
	);
	$rewrite = array(
			'slug'                  => 'cannabisinfopage', 
			'with_front'            => false,

	);
	$args = array(
			'label'                 => __( 'Cannabis Info Front Pages', 'hashmuseum' ),
			'description'           => __( 'Custom front pages for the cannabis info post type.', 'hashmuseum' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'custom-fields',),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => 'edit.php?post_type=cannabisinfo',
			'menu_position'         => 3,
			'menu_icon'             => 'dashicons-images-alt',
			'show_in_admin_bar'     => false,
			'show_in_nav_menus'     => false,
			'can_export'            => true,
			'has_archive'           => false,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'rewrite'               => $rewrite,
			'capability_type'       => 'page',
			'show_in_rest'          => true, // false will enable classic editor.
			"query_var"           	=> true,
	);
	register_post_type( 'cannabisinfo_pages', $args );

}
add_action( 'init', 'custom_cannabisinfo_pages', 1 );














/* ----------  News & Exhibitions ------------------- */

function cpt_newsexhibitions() {

	$labels = array(
			'name'                  => _x( 'News & Exhibitions', 'Post Type General Name', 'hashmuseum' ),
			'singular_name'         => _x( 'News & Exhibitions', 'Post Type Singular Name', 'hashmuseum' ),
			'menu_name'             => __( 'News & Exhibitions', 'hashmuseum' ),
			'name_admin_bar'        => __( 'News & Exhibitions Item', 'hashmuseum' ),
			'archives'              => __( 'Item Archives', 'hashmuseum' ),
			'attributes'            => __( 'Item Attributes', 'hashmuseum' ),
			'parent_item_colon'     => __( 'Parent Item:', 'hashmuseum' ),
			'all_items'             => __( 'Info Items', 'hashmuseum' ),
			'add_new_item'          => __( 'Add New Info Item', 'hashmuseum' ),
			'add_new'               => __( 'Add New', 'hashmuseum' ),
			'new_item'              => __( 'New Item', 'hashmuseum' ),
			'edit_item'             => __( 'Edit Item', 'hashmuseum' ),
			'update_item'           => __( 'Update Item', 'hashmuseum' ),
			'view_item'             => __( 'View Item', 'hashmuseum' ),
			'view_items'            => __( 'View Items', 'hashmuseum' ),
			'search_items'          => __( 'Search Item', 'hashmuseum' ),
			'not_found'             => __( 'Not found', 'hashmuseum' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'hashmuseum' ),
			'featured_image'        => __( 'Featured Image', 'hashmuseum' ),
			'set_featured_image'    => __( 'Set featured image', 'hashmuseum' ),
			'remove_featured_image' => __( 'Remove featured image', 'hashmuseum' ),
			'use_featured_image'    => __( 'Use as featured image', 'hashmuseum' ),
			'insert_into_item'      => __( 'Insert into item', 'hashmuseum' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'hashmuseum' ),
			'items_list'            => __( 'Items list', 'hashmuseum' ),
			'items_list_navigation' => __( 'Items list navigation', 'hashmuseum' ),
			'filter_items_list'     => __( 'Filter items list', 'hashmuseum' ),
	);

	$rewrite = array(
			'slug'                  => __( 'whats-on', 'hashmuseum' ) . '/%news_exhibitions%',
			'with_front'            => true,
			'pages'                 => true,
			'feeds'                 => true,
	);

	$args = array(
			'label'                 => __( 'News & Exhibitions', 'hashmuseum' ),
			'description'           => __( 'News & Exhibitions', 'hashmuseum' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'custom-fields', ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 2,
			'menu_icon'             => 'dashicons-megaphone',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => 'news',
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'rewrite'               => $rewrite,
			'capability_type'       => 'post',
			'show_in_rest'          => true,
			"query_var"           	=> true,
	);
	register_post_type( 'newsexhibitions', $args );

}
add_action( 'init', 'cpt_newsexhibitions', 3 );


function cpt_newsexhibitions_taxonomy() { 
 
	  $labels = array(
		'name' => _x( 'News & Exhibitions categories', 'taxonomy general name', 'hashmuseum' ),
		'singular_name' => _x( 'News & Exhibitions Category', 'taxonomy singular name', 'hashmuseum' ),
		'search_items' =>  __( 'Search Categories', 'hashmuseum' ),
		'all_items' => __( 'All Categories', 'hashmuseum' ),
		'parent_item' => __( 'Parent Category', 'hashmuseum' ),
		'parent_item_colon' => __( 'Parent Category:', 'hashmuseum' ),
		'edit_item' => __( 'Edit Category', 'hashmuseum' ), 
		'update_item' => __( 'Update Category', 'hashmuseum' ),
		'add_new_item' => __( 'Add New Category', 'hashmuseum' ),
		'new_item_name' => __( 'New Category Name', 'hashmuseum' ),
		'menu_name' => __( 'Categories', 'hashmuseum' ),
	  );    
	  
	  register_taxonomy('news_exhibitions', array('newsexhibitions'), array(
		'hierarchical' 		=> true,
		"public"        	=> true,
		'labels' 			=> $labels,
		'show_ui' 			=> true,
		'show_admin_column' => true,
		'query_var' 		=> true,
		'rewrite' 			=> array( 'slug' => 'whats-on' ),
	  ));
	 
}
add_action( 'init', 'cpt_newsexhibitions_taxonomy', 0 );








/* ----------  Visitor information (vreemde talen) ------------------- */

function cpt_visitorinfo() {

	$labels = array(
			'name'                  => _x( 'Visitor information', 'Post Type General Name', 'hashmuseum' ),
			'singular_name'         => _x( 'Visitor information', 'Post Type Singular Name', 'hashmuseum' ),
			'menu_name'             => __( 'Visitor information', 'hashmuseum' ),
			'name_admin_bar'        => __( 'Visitor information Item', 'hashmuseum' ),
			'archives'              => __( 'Item Archives', 'hashmuseum' ),
			'attributes'            => __( 'Item Attributes', 'hashmuseum' ),
			'parent_item_colon'     => __( 'Parent Item:', 'hashmuseum' ),
			'all_items'             => __( 'Info Items', 'hashmuseum' ),
			'add_new_item'          => __( 'Add New Item', 'hashmuseum' ),
			'add_new'               => __( 'Add New', 'hashmuseum' ),
			'new_item'              => __( 'New Item', 'hashmuseum' ),
			'edit_item'             => __( 'Edit Item', 'hashmuseum' ),
			'update_item'           => __( 'Update Item', 'hashmuseum' ),
			'view_item'             => __( 'View Item', 'hashmuseum' ),
			'view_items'            => __( 'View Items', 'hashmuseum' ),
			'search_items'          => __( 'Search Item', 'hashmuseum' ),
			'not_found'             => __( 'Not found', 'hashmuseum' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'hashmuseum' ),
			'featured_image'        => __( 'Featured Image', 'hashmuseum' ),
			'set_featured_image'    => __( 'Set featured image', 'hashmuseum' ),
			'remove_featured_image' => __( 'Remove featured image', 'hashmuseum' ),
			'use_featured_image'    => __( 'Use as featured image', 'hashmuseum' ),
			'insert_into_item'      => __( 'Insert into item', 'hashmuseum' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'hashmuseum' ),
			'items_list'            => __( 'Items list', 'hashmuseum' ),
			'items_list_navigation' => __( 'Items list navigation', 'hashmuseum' ),
			'filter_items_list'     => __( 'Filter items list', 'hashmuseum' ),
	);

	$args = array(
			'label'                 => __( 'Visitor Info', 'hashmuseum' ),
			'description'           => __( 'Visitor Info for exotic languages', 'hashmuseum' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'custom-fields', ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 4,
			'menu_icon'             => 'dashicons-admin-site-alt',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			//'has_archive'           => 'news',
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'rewrite'               => true,
			'capability_type'       => 'page',
			'show_in_rest'          => true,
			"query_var"           	=> true,
	);
	register_post_type( 'visitorinfo', $args );

}
add_action( 'init', 'cpt_visitorinfo', 3 );


function visitorinfo_remove_cpt_slug( $post_link, $post ) {
    if ( 'visitorinfo' === $post->post_type && 'publish' === $post->post_status ) {
        $post_link = str_replace( '/' . $post->post_type . '/', '/', $post_link );
    }
    return $post_link;
}
add_filter( 'post_type_link', 'visitorinfo_remove_cpt_slug', 10, 2 );



function visitorinfo_add_cpt_post_names_to_main_query( $query ) {
    // Return if this is not the main query.
    if ( ! $query->is_main_query() ) {
        return;
    }
    // Return if this query doesn't match our very specific rewrite rule.
    if ( ! isset( $query->query['page'] ) || 2 !== count( $query->query ) ) {
        return;
    }
    // Return if we're not querying based on the post name.
    if ( empty( $query->query['name'] ) ) {
        return;
    }
    // Add CPT to the list of post types WP will include when it queries based on the post name.
    $query->set( 'post_type', array( 'visitorinfo' ) );
}
add_action( 'pre_get_posts', 'visitorinfo_add_cpt_post_names_to_main_query' );





// Adds the current category in the URL.

add_filter('post_type_link', 'sk_update_permalink_structure', 10, 2);

function sk_update_permalink_structure( $post_link, $post )
{
    if ( false !== strpos( $post_link, '%collection_themes%' ) ) {

		$taxonomy_terms = get_the_terms( $post->ID, 'collection_themes' );
		
        foreach ((array) $taxonomy_terms as $term ) { 
            if ( ! $term->parent ) {
                $post_link = str_replace( '%collection_themes%', $term->slug, $post_link );
            }
        } 
	}

	if ( false !== strpos( $post_link, '%info_categories%' ) ) {

		$taxonomy_terms = get_the_terms( $post->ID, 'info_categories' );
		
        foreach ((array) $taxonomy_terms as $term ) { 
            if ( ! $term->parent ) {
                $post_link = str_replace( '%info_categories%', $term->slug, $post_link );
            }
        } 
	}

	if ( false !== strpos( $post_link, '%news_exhibitions%' ) ) {

		$taxonomy_terms = get_the_terms( $post->ID, 'news_exhibitions' );
		
        foreach ((array) $taxonomy_terms as $term ) { 
            if ( ! $term->parent ) {
                $post_link = str_replace( '%news_exhibitions%', $term->slug, $post_link );
            }
        } 
	}
	
    return $post_link;
}