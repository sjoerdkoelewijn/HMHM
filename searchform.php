<form role="search" method="get" class="search_form" action="<?php echo esc_url(home_url('/')); ?>">    
<label for="search">Search function</label>

    <input type="search" name="s" id="search" class="search_field" placeholder="<?php pll_e( 'Type to search &hellip;', 'hashmuseum' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>">
    <button aria-label="search" type="submit" class="search_submit">
        <img loading="lazy" class="icon" src="<?php echo get_theme_file_uri() ?>/images/svg/searchIcon.svg" alt="Search Icon">
    </button>
</form>