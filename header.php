<!DOCTYPE html>

<!--[if IE 9]>
<html class="ie ie9" <?php language_attributes(); ?>>
<![endif]-->

<html <?php language_attributes(); ?>>

    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>

    <article>

        <a title="<?php bloginfo( 'name' ); ?>" aria-label="Visit the Homepage" class="header_logo_link logo" href="/">
            <?php echo file_get_contents(get_template_directory_uri() . "/images/svg/logo.svg"); ?>
        </a>

        <div class="menu_buttons_wrap">

            <button class="language_menu_toggle" data-language-menu-toggle>
                <?php _e( 'Select Language', 'hashmuseum' ) ?>
            </button>

            <button class="main_menu_toggle" data-main-menu-toggle>
                <?php _e( 'menu', 'hashmuseum' ) ?>
            </button>

        </div>

        <div class="main_menu hidden" data-main-menu>

            <div class="menu_background"></div> 

            <div class="main_menu_wrap">

                <button class="main_close" data-main-close aria-label="<?php echo __( 'Close Menu', 'hashmuseum' ) ?>">
                    <?php echo file_get_contents(get_template_directory_uri() . "/images/svg/closeIcon.svg"); ?>
                </button>

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


        <div class="language_menu hidden" data-language-menu>

            <div class="menu_background"></div> 

            <div class="language_menu_wrap">

                <h2>
                <?php echo __( 'Select Language', 'hashmuseum' ) ?> 
                </h2>   
                
                <button class="language_close" data-language-close aria-label="<?php echo __( 'Close Menu', 'hashmuseum' ) ?>">
                    <?php echo file_get_contents(get_template_directory_uri() . "/images/svg/closeIcon.svg"); ?>
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

    </article>


