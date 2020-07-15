<form role="search" method="get" class="search_form" action="<?php echo esc_url( home_url( '/' ) ); ?>">    
    <input type="search" class="search_field" placeholder="<?php _e( 'Search &hellip;', 'hashmuseum' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s">
    <button type="submit" class="search_submit">
        <?php echo file_get_contents(get_template_directory_uri() . "/images/svg/searchIcon.svg"); ?>
    </button>
</form>