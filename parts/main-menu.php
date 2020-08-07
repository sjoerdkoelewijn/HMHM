<div class="main_menu hidden" data-main-menu>

            <div class="menu_background"></div> 

            <div class="main_menu_wrap">

                <div class="menu_top">

                    <?php get_search_form(); ?>    

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

                <div class="meta">

                    <h2 class="city_header">
                        <?php echo __( 'Amsterdam', 'hashmuseum' ) ?>
                    </h2>

                    <div class="openinghours">
                        <?php echo file_get_contents(get_template_directory_uri() . "/images/svg/clockIcon.svg"); ?> 
                        <p>
                            <?php sk_lang_specific_option('amsterdam_opening_hours'); ?>
                        </p>
                    </div>

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

                    <h2 class="city_header">
                        <?php echo __( 'Barcelona', 'hashmuseum' ) ?>
                    </h2>

                    <div class="openinghours">
                        <?php echo file_get_contents(get_template_directory_uri() . "/images/svg/clockIcon.svg"); ?> 
                        <p>
                            <?php sk_lang_specific_option('barcelona_opening_hours'); ?>
                        </p>
                    </div>

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
            
                </div>

                <div class="ticket_buttons">
                    <a class="action_btn btn" href="#tickets">
                        <?php _e( 'Get your ticket', 'hashmuseum' ) ?>
                    </a>

                    <a class="ghost_btn white btn" href="<?php echo __( '/en/plan-your-visit/', 'hashmuseum' ) ?>">
                        <?php _e( 'Plan your visit', 'hashmuseum' ) ?>
                    </a>
                </div>
                
                <nav id="boring-links" class="boring_links" role="navigation">
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