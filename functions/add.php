<?php 


add_theme_support( 'title-tag' );
add_theme_support( 'menus' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'responsive-embeds' );
add_post_type_support('page', 'excerpt');
add_theme_support( 'html5', [ 'script', 'style' ] );


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
                $out[] = sprintf( '<a class="taxonomy_link" href="%1$s">'. file_get_contents(get_theme_file_path() . "/images/svg/arrowRightIcon.svg"). '%2$s</a>',
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

/***************************  Add Breadcrumbs **********************************/

function sk_breadcrumbs() { 
	global $wp_query;
	$post		= sanitize_post($wp_query->get_queried_object());
    $delimiter	= ' &rsaquo; ';
    $current_language = pll_current_language();
    
	?>

	<p class="breadcrumbs">
		<a title="<?php pll_e( 'Home', 'hashmuseum' ) ?>" href="/<?php echo $current_language; ?>/">
			<?php pll_e( 'Home', 'hashmuseum' ) ?>
		</a>

		<?php echo $delimiter ?>

		<?php if ( is_single() ) { 
            
            $post_type = $post->post_type;
            $post_type_obj = get_post_type_object($post_type);
            $taxonomies = get_object_taxonomies($post_type);
        
            foreach ($taxonomies as $taxonomy) {        
                $terms = get_the_terms( $post->ID, $taxonomy );
                if ( !empty( $terms ) ) {
                    foreach ( $terms as $term )
                        $custom_taxonomy_name = $term->name;
                        $custom_taxonomy_name_uri = get_term_link($term->slug, $taxonomy);
                }
            }
          
			?>
		
			<a title="Post type" href="/<?php echo $current_language . '/' . esc_html($post_type_obj->has_archive) . '/'; ?>">
				<?php echo esc_html($post_type_obj->label); ?>
			</a>

			<?php echo $delimiter ?>

			<a title="category" href="<?php echo $custom_taxonomy_name_uri ?>">
                <?php echo $custom_taxonomy_name ?>		
			</a>

			<?php echo $delimiter ?>

			<span class="breadcrumb_last" aria-current="page">
				<?php echo the_title(); ?>                
			</span>

        <?php } elseif(is_page())  { 
            
            $parentID = wp_get_post_parent_id( $post->ID );
            $page = get_post($parentID); 

            ?>

            <?php if ($parentID > 0 ) { ?>

                <a title="parent page" href="/<?php echo $current_language . '/' . $page->post_name . '/'; ?>">
				    <?php echo $page->post_title ?>
			    </a>

                <?php echo $delimiter ?>

            <?php } ?>

            <span class="breadcrumb_last" aria-current="page">
				<?php echo the_title(); ?>
			</span>

		<?php } else { 
            
            $post_type = get_post_type();
            if ( $post_type )
            {
                $post_type_data = get_post_type_object( $post_type );
                $post_type_slug = $post_type_data->has_archive;
                $post_type_name = $post_type_data->labels->name;
                
            }
            
            ?>

			<a title="Post type" href="/<?php echo $current_language . '/' . esc_html($post_type_slug) . '/'; ?>">
				<?php echo $post_type_name; ?>
				
			</a>

			<?php echo $delimiter ?>

			<span class="breadcrumb_last" aria-current="page">
				<?php echo single_cat_title(); ?>
			</span>
			
		<?php } ?>
				
	</p>

<?php }

function backup_breadcrumbs()
{
    // Set variables for later use
    $home_link        = home_url('/');
    $home_text        = pll__( 'Home', 'hashmuseum' );
    $link_before      = '<span typeof="v:Breadcrumb">';
    $link_after       = '</span>';
    $link_attr        = ' rel="v:url" property="v:title"';
    $link             = $link_before . '<a' . $link_attr . ' href="%1$s">%2$s</a>' . $link_after;
    $delimiter        = ' &rsaquo; ';              // Delimiter between crumbs
    $before           = '<span class="current">'; // Tag before the current crumb
    $after            = '</span>';                // Tag after the current crumb
    $page_addon       = '';                       // Adds the page number if the query is paged
    $breadcrumb_trail = '';
    $category_links   = '';

    /** 
     * Set our own $wp_the_query variable. Do not use the global variable version due to 
     * reliability
     */
    $wp_the_query   = $GLOBALS['wp_the_query'];
    $queried_object = $wp_the_query->get_queried_object();

    // Handle single post requests which includes single pages, posts and attatchments
    if ( is_singular() ) 
    {
        /** 
         * Set our own $post variable. Do not use the global variable version due to 
         * reliability. We will set $post_object variable to $GLOBALS['wp_the_query']
         */
        $post_object = sanitize_post( $queried_object );

        // Set variables 
        $title          = apply_filters( 'the_title', $post_object->post_title );
        $parent         = $post_object->post_parent;
        $post_type      = $post_object->post_type;
        $post_id        = $post_object->ID;
        $post_link      = $before . $title . $after;
        $parent_string  = '';
        $post_type_link = '';


        if ( !in_array( $post_type, ['post', 'page', 'attachment'] ) )
        {
            $post_type_object = get_post_type_object( $post_type );
            $archive_link     = esc_url( get_post_type_archive_link( $post_type ) );

            $post_type_link   = sprintf( $link, $archive_link, $post_type_object->labels->singular_name );
        }

        // Get post parents if $parent !== 0
        if ( 0 !== $parent ) 
        {
            $parent_links = [];
            while ( $parent ) {
                $post_parent = get_post( $parent );

                $parent_links[] = sprintf( $link, esc_url( get_permalink( $post_parent->ID ) ), get_the_title( $post_parent->ID ) );

                $parent = $post_parent->post_parent;
            }

            $parent_links = array_reverse( $parent_links );

            $parent_string = implode( $delimiter, $parent_links );
        }

        // Lets build the breadcrumb trail
        if ( $parent_string ) {
            $breadcrumb_trail = $parent_string . $delimiter . $post_link;
        } else {
            $breadcrumb_trail = $post_link;
        }

        if ( $post_type_link )
            $breadcrumb_trail = $post_type_link . $delimiter . $breadcrumb_trail;

        if ( $category_links )
            $breadcrumb_trail = $category_links . $breadcrumb_trail;
    }

    // Handle archives which includes category-, tag-, taxonomy-, date-, custom post type archives and author archives
    if( is_archive() )
    {
        if (    is_category()
             || is_tag()
             || is_tax()
        ) {
            // Set the variables for this section
            $term_object        = get_term( $queried_object );
            $taxonomy           = $term_object->taxonomy;
            $term_id            = $term_object->term_id;
            $term_name          = $term_object->name;
            $term_parent        = $term_object->parent;
            $taxonomy_object    = get_taxonomy( $taxonomy );
            $current_term_link  = $before . $taxonomy_object->labels->singular_name . $delimiter . $term_name . $after;
            $parent_term_string = '';

            if ( 0 !== $term_parent )
            {
                // Get all the current term ancestors
                $parent_term_links = [];
                while ( $term_parent ) {
                    $term = get_term( $term_parent, $taxonomy );

                    $parent_term_links[] = sprintf( $link, esc_url( get_term_link( $term ) ), $term->name );

                    $term_parent = $term->parent;
                }

                $parent_term_links  = array_reverse( $parent_term_links );
                $parent_term_string = implode( $delimiter, $parent_term_links );
            }

            if ( $parent_term_string ) {
                $breadcrumb_trail = $parent_term_string . $delimiter . $current_term_link;
            } else {
                $breadcrumb_trail = $current_term_link;
            }

        } elseif ( is_author() ) {

            $breadcrumb_trail = __( 'Author archive for ') .  $before . $queried_object->data->display_name . $after;

        } elseif ( is_date() ) {
            // Set default variables
            $year     = $wp_the_query->query_vars['year'];
            $monthnum = $wp_the_query->query_vars['monthnum'];
            $day      = $wp_the_query->query_vars['day'];

            // Get the month name if $monthnum has a value
            if ( $monthnum ) {
                $date_time  = DateTime::createFromFormat( '!m', $monthnum );
                $month_name = $date_time->format( 'F' );
            }

            if ( is_year() ) {

                $breadcrumb_trail = $before . $year . $after;

            } elseif( is_month() ) {

                $year_link        = sprintf( $link, esc_url( get_year_link( $year ) ), $year );

                $breadcrumb_trail = $year_link . $delimiter . $before . $month_name . $after;

            } elseif( is_day() ) {

                $year_link        = sprintf( $link, esc_url( get_year_link( $year ) ),             $year       );
                $month_link       = sprintf( $link, esc_url( get_month_link( $year, $monthnum ) ), $month_name );

                $breadcrumb_trail = $year_link . $delimiter . $month_link . $delimiter . $before . $day . $after;
            }

        } elseif ( is_post_type_archive() ) {

            $post_type        = $wp_the_query->query_vars['post_type'];
            $post_type_object = get_post_type_object( $post_type );

            $breadcrumb_trail = $before . $post_type_object->labels->singular_name . $after;

        }
    }   

    // Handle the search page
    if ( is_search() ) {
        $breadcrumb_trail = __( 'Search query for: ' ) . $before . get_search_query() . $after;
    }

    // Handle 404's
    if ( is_404() ) {
        $breadcrumb_trail = $before . __( 'Error 404' ) . $after;
    }

    // Handle paged pages
    if ( is_paged() ) {
        $current_page = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : get_query_var( 'page' );
        $page_addon   = $before . sprintf( __( ' ( Page %s )' ), number_format_i18n( $current_page ) ) . $after;
    }

    $breadcrumb_output_link  = '';
    $breadcrumb_output_link .= '<div class="breadcrumbs">';
    if (    is_home()
         || is_front_page()
    ) {
        // Do not show breadcrumbs on page one of home and frontpage
        if ( is_paged() ) {
            $breadcrumb_output_link .= '<a href="' . $home_link . '">' . $home_text . '</a>';
            $breadcrumb_output_link .= $page_addon;
        }
    } else {
        $breadcrumb_output_link .= '<a href="' . $home_link . '" rel="v:url" property="v:title">' . $home_text . '</a>';
        $breadcrumb_output_link .= $delimiter;
        $breadcrumb_output_link .= $breadcrumb_trail;
        $breadcrumb_output_link .= $page_addon;
    }
    $breadcrumb_output_link .= '</div><!-- .breadcrumbs -->';

    return $breadcrumb_output_link;
}


/***************************  Add Backend Notices **********************************/

global $pagenow;

// This is the notice on the Themes pages
if (( $pagenow == 'edit-tags.php' ) && ($_GET['post_type'] == 'collection')) {
	add_action( 'admin_notices', 'sk_category_notice' );
}

function sk_category_notice() { ?>
    <div class="notice notice-warning">
        <p><?php pll_e( 'This is only to create the category. You can add the actual content on the <a href="/wp-admin/edit.php?post_type=collection_pages">frontpages</a>.', 'hashmuseum' ); ?></p>
    </div>
<?php }


// This is the notice on the frontpages page
if (( $pagenow == 'edit.php' ) && ($_GET['post_type'] == 'collection_pages')) {
	add_action( 'admin_notices', 'sk_frontpages_notice' );
}

function sk_frontpages_notice() { ?>
    <div class="notice notice-warning">
        <p><?php pll_e( 'Keep in mind that the frontpage needs to have the same slug as the <a href="/wp-admin/edit-tags.php?taxonomy=collection_themes&post_type=collection">theme</a>. Otherwise it doesn\'t work', 'hashmuseum' ); ?></p>
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

// add_action( 'created_collection_themes', 'sk_created_collection_theme', 10, 3 );


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

// add_action( 'created_info_categories', 'sk_created_info_category', 10, 3 );



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


