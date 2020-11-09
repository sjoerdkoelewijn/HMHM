<!DOCTYPE html>

<html <?php language_attributes(); ?>>

    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0" />
        <title><?php wp_title( '|', true, 'right' ); ?></title>
        <link rel="profile" href="https://gmpg.org/xfn/11" />

        <link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url' ) ); ?>">
        <link rel="preconnect" href="http://fonts.googleapis.com" />
        <link rel="dns-prefetch" href="//fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="anonymous" >
        <link rel="dns-prefetch" href="//fonts.gstatic.com" />
        <link rel="preconnect" href="https://www.google-analytics.com" />
        <link rel="dns-prefetch" href="//www.google-analytics.com" />

        <meta name="google-site-verification" content="aoPLH9IdkVAX4MMq_Vm5VeQs17z4-3vJXizCQbmRo2s" />

        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?> data-mobile-menu-hide>

    <header>

        <a data-logo title="<?php bloginfo( 'name' ); ?>" aria-label="Visit the Homepage" class="header_logo_link large logo" href="/">
            <img loading="lazy" src="<?php echo get_theme_file_uri() ?>/images/svg/logo.svg" alt="Logo">
        </a>

        <div class="mobile_top_menu">

            <a data-logo title="<?php bloginfo( 'name' ); ?>" aria-label="Visit the Homepage" class="header_logo_link small logo" href="/">
                <img loading="lazy" src="<?php echo get_theme_file_uri() ?>/images/svg/logo-small.svg" alt="Logo">
            </a>

            <div class="menu_buttons_wrap">

                <!-- Edit button for logged in users -->
                <?php include('parts/edit-button.php'); ?>

                <button class="language_menu_toggle" data-language-menu-toggle>
                    <img loading="lazy" class="icon" src="<?php echo get_theme_file_uri() ?>/images/svg/weedleaf-small.svg" alt="Language Menu Icon">
                    <?php echo pll_current_language('name'); //  ?>
                </button>

                <button class="main_menu_toggle" data-main-menu-toggle>
                    <?php pll_e( 'menu', 'hashmuseum' ) ?>
                    <img loading="lazy" class="icon" src="<?php echo get_theme_file_uri() ?>/images/svg/hamburgerIcon.svg" alt="Menu Icon">
                </button>            

            </div>

        </div>

        <div class="mobile_buttons">

            <a href="#tickets" class="buy_tickets mobile_btn">
                <?php pll_e( 'Buy tickets', 'hashmuseum' ) ?>
            </a>

            <a href="<?php pll_e( '/en/plan-your-visit/', 'hashmuseum' ) ?>" class="plan_visit mobile_btn">
                <?php pll_e( 'Plan your visit', 'hashmuseum' ) ?>
            </a>            

        </div>

        <?php include('parts/main-menu.php'); ?>

        <?php include('parts/language-menu.php'); ?>

    </header>