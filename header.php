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

    <body <?php body_class(); ?> data-mobile-menu-hide>

    <article>

        <a data-logo title="<?php bloginfo( 'name' ); ?>" aria-label="Visit the Homepage" class="header_logo_link large logo" href="/">
            <?php echo file_get_contents(get_template_directory() . "/images/svg/logo.svg"); ?>
        </a>

        <div class="mobile_top_menu">

            <a data-logo title="<?php bloginfo( 'name' ); ?>" aria-label="Visit the Homepage" class="header_logo_link small logo" href="/">
                <?php echo file_get_contents(get_template_directory() . "/images/svg/logo-small.svg"); ?>
            </a>

            <div class="menu_buttons_wrap">

                <!-- Edit button for logged in users -->
                <?php include('parts/edit-button.php'); ?>

                <button class="language_menu_toggle" data-language-menu-toggle>
                    <?php echo file_get_contents(get_template_directory() . "/images/svg/weedleaf-small.svg"); ?>
                    <?php pll_e( 'Select Language', 'hashmuseum' ) ?>
                </button>

                <button class="main_menu_toggle" data-main-menu-toggle>
                    <?php pll_e( 'menu', 'hashmuseum' ) ?>
                    <?php echo file_get_contents(get_template_directory() . "/images/svg/hamburgerIcon.svg"); ?>
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

    </article>


