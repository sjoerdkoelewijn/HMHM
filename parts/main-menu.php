<div class="main_menu hidden" data-main-menu>

        <div class="menu_background"></div> 

            <div class="main_menu_wrap">

                <div class="menu_top">

                    <?php get_search_form(); ?>    

                    <button class="main_close" data-main-close aria-label="<?php pll_e( 'Close', 'hashmuseum' ) ?>">
                        <?php echo file_get_contents(get_template_directory() . "/images/svg/closeIcon.svg"); ?>
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

                <div class="meta" data-mobile-menu-tabs>

                    <div class="tabs_header">

                        <button class="tab_title">
                            <?php echo __( 'Amsterdam', 'hashmuseum' ) ?>
                        </button>

                        <button class="tab_title">
                            <?php echo __( 'Barcelona', 'hashmuseum' ) ?>
                        </button>

                    </div>

                    <div class="tab_content">

                        <h2 class="city_header">
                            <a class="location_link" href="/<?php echo pll_current_language(); ?>/amsterdam/">
                                <?php pll_e( 'Amsterdam', 'hashmuseum' ) ?>
                            </a>
                        </h2>

                        <div class="openinghours">
                            <?php echo file_get_contents(get_template_directory() . "/images/svg/clockIcon.svg"); ?> 
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

                        <a class="mobile_more_info_link" href="<?php pll_e( '/en/amsterdam/', 'hashmuseum' ) ?>">
                            <?php echo file_get_contents(get_template_directory() . "/images/svg/arrowRightIcon.svg"); ?>
                            <?php pll_e( 'More information', 'hashmuseum' ) ?>
                        </a>

                    </div>
                    
                    <div class="tab_content">

                        <h2 class="city_header">
                            <a class="location_link" href="/<?php echo pll_current_language(); ?>/barcelona/">
                                <?php pll_e( 'Barcelona', 'hashmuseum' ) ?>
                            </a>
                        </h2>

                        <div class="openinghours">
                            <?php echo file_get_contents(get_template_directory() . "/images/svg/clockIcon.svg"); ?> 
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

                        <a class="mobile_more_info_link" href="<?php pll_e( '/en/barcelona/', 'hashmuseum' ) ?>">
                            <?php echo file_get_contents(get_template_directory() . "/images/svg/arrowRightIcon.svg"); ?>
                            <?php pll_e( 'More information', 'hashmuseum' ) ?>
                        </a>

                    </div>
            
                </div>

                <div class="ticket_buttons">
                    <a class="action_btn btn" href="#tickets">
                        <?php pll_e( 'Get your ticket', 'hashmuseum' ) ?>
                    </a>

                    <a class="ghost_btn white btn" href="<?php echo __( '/en/plan-your-visit/', 'hashmuseum' ) ?>">
                        <?php pll_e( 'Plan your visit', 'hashmuseum' ) ?>
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

                <div class="mobile_bottom_buttons">

                    <button class="mobile_close" data-main-close aria-label="<?php pll_e( 'Close', 'hashmuseum' ) ?>">
                        <?php echo file_get_contents(get_template_directory() . "/images/svg/closeIcon.svg"); ?>
                        <?php pll_e( 'Close', 'hashmuseum' ) ?>
                    </button>
                    
                    <button class="mobile_language_menu_toggle" data-language-menu-toggle>
                        <?php pll_e( 'Select Language', 'hashmuseum' ) ?>
                        <?php echo file_get_contents(get_template_directory() . "/images/svg/arrowRightIcon.svg"); ?>
                    </button>

                </div>

            </div>

        </div>