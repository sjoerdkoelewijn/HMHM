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

        <a data-logo title="<?php bloginfo( 'name' ); ?>" aria-label="Visit the Homepage" class="header_logo_link large logo" href="/">
            <?php echo file_get_contents(get_template_directory_uri() . "/images/svg/logo.svg"); ?>
        </a>

        <a data-logo title="<?php bloginfo( 'name' ); ?>" aria-label="Visit the Homepage" class="header_logo_link small logo" href="/">
            <?php echo file_get_contents(get_template_directory_uri() . "/images/svg/logo-small.svg"); ?>
        </a>

        <div class="menu_buttons_wrap">

            <!-- Edit button for logged in users -->
            <?php include('parts/edit-button.php'); ?>

            <button class="language_menu_toggle" data-language-menu-toggle>
                <?php echo file_get_contents(get_template_directory_uri() . "/images/svg/weedleaf-small.svg"); ?>
                <?php _e( 'Select Language', 'hashmuseum' ) ?>
            </button>

            <button class="main_menu_toggle" data-main-menu-toggle>
                <?php _e( 'menu', 'hashmuseum' ) ?>
                <?php echo file_get_contents(get_template_directory_uri() . "/images/svg/hamburgerIcon.svg"); ?>
            </button>            

        </div>

        <?php include('parts/main-menu.php'); ?>

        <?php include('parts/language-menu.php'); ?>

    </article>


