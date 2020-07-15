<div class="main_menu hidden" data-main-menu>

            <div class="menu_background"></div> 

            <div class="main_menu_wrap">

                <div class="menu_top">

                    <?php include('searchform.php'); ?>    

                    <button class="main_close" data-main-close aria-label="<?php echo __( 'Close Menu', 'hashmuseum' ) ?>">
                        <?php echo file_get_contents(get_template_directory_uri() . "/images/svg/closeIcon.svg"); ?>
                    </button>

                </div>

                <nav id="main-navigation" class="main_navigation" role="navigation">
                    <?php
                    wp_nav_menu(array(
                        'theme_location'  => 'main-navigation',
                        'fallback_cb'     => false,
                        'container'       => false,
                        'items_wrap'      => '<ul id="%1$s">%3$s</ul>',
                    ));
                    ?>
                </nav>

                <nav class="social amsterdam">
                    <?php
                    wp_nav_menu(array(
                        'theme_location'  => 'social-menu-ams',
                        'fallback_cb'     => false,
                        'container'       => false,
                        'items_wrap'      => '%3$s',
                        'walker'          => new Social_Menu_Walker()
                    ));
                    ?>
                </nav>

                <nav class="social barcelona">
                    <?php
                    wp_nav_menu(array(
                        'theme_location'  => 'social-menu-bcn',
                        'fallback_cb'     => false,
                        'container'       => false,
                        'items_wrap'      => '%3$s',
                        'walker'          => new Social_Menu_Walker()
                    ));
                    ?>
                </nav>

                <nav id="boring-links" class="Boring_links" role="navigation">
                    <?php
                    wp_nav_menu(array(
                        'theme_location'  => 'boring-links',
                        'fallback_cb'     => false,
                        'container'       => false,
                        'items_wrap'      => '<ul id="%1$s">%3$s</ul>',
                    ));
                    ?>
                </nav>

            </div>

        </div>