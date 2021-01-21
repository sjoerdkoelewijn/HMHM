<div class="language_menu hidden" data-language-menu>

    <div class="menu_background" data-language-close></div> 

    <div class="language_menu_wrap">

        <h2>
            <?php pll_e( 'Select Language', 'hashmuseum' ) ?>
        </h2>   
        
        <button class="language_close" data-language-close aria-label="<?php pll_e( 'Close Menu', 'hashmuseum' ) ?>">
            <img loading="lazy" class="icon" src="<?php echo get_theme_file_uri() ?>/images/svg/closeIcon.svg" alt="Icon">
        </button>

        <nav id="language-navigation" class="language_navigation">
            <?php
            
            wp_nav_menu(array(
                'theme_location'  => 'language-menu',
                'fallback_cb'     => false,
                'container'       => false,
                'items_wrap'      => '<ul id="%1$s">%3$s</ul>',
            ));
            ?>
        </nav>

    </div> 

</div>