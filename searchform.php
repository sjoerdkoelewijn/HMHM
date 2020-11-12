<form role="search" method="get" class="search_form" action="<?php echo esc_url(home_url('/')); ?>">    
    <input type="search" name="s" id="search" class="search_field" placeholder="<?php _e( 'Type to search &hellip;', 'hashmuseum' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>">
    <button type="submit" class="search_submit">
        <img loading="lazy" class="icon" src="<?php echo get_theme_file_uri() ?>/images/svg/searchIcon.svg" alt="Search Icon">
    </button>
</form>