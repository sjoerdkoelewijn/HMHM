<div class="language_menu hidden" data-language-menu>

    <div class="menu_background" data-language-close></div> 

    <div class="language_menu_wrap">

        <h2>
            <?php pll_e( 'Select Language', 'hashmuseum' ) ?>
        </h2>   
        
        <button class="language_close" data-language-close aria-label="<?php echo __( 'Close Menu', 'hashmuseum' ) ?>">
            <?php echo file_get_contents(get_template_directory() . "/images/svg/closeIcon.svg"); ?>
        </button>

        <nav id="language-navigation" class="language_navigation" role="navigation">
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