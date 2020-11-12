<?php if ( current_user_can( 'edit_post', $post->ID ) ) { ?>

    <?php if ( is_single() | is_page() ) { // TODO - Add more conditionals and refactor to switch statement ?> 

        <a href="/wp-admin/post.php?post=<?php echo get_the_ID() ?>&action=edit" class="admin_edit_btn" >
            <img loading="lazy" class="icon" src="<?php echo get_theme_file_uri() ?>/images/svg/edit.svg" alt="Icon">            
        </a>

    <?php } elseif (is_tax() ) { 

            $posttype = get_post_type( $post->ID );
            $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
            
            if ($posttype === 'cannabisinfo') {
                $frontpage = get_page_by_path($term->slug, OBJECT, 'cannabisinfo_pages');
            } else if($posttype === 'collection') {
                $frontpage = get_page_by_path($term->slug, OBJECT, 'collection_pages');
            }

        ?>

        <a href="/wp-admin/post.php?post=<?php echo $frontpage->ID ?>&action=edit" class="admin_edit_btn" >
            <img loading="lazy" class="icon" src="<?php echo get_theme_file_uri() ?>/images/svg/edit.svg" alt="Icon">
        </a>

    <?php } ?> 

<?php } ?>