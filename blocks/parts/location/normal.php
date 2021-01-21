<?php

$amstext = get_field('amsterdam_text');
$bcntext = get_field('barcelona_text'); 
$genericimage = get_field('generic_image');
$amsimage = get_field('ams_image');
$bcnimage = get_field('bcn_image');

?>

<div class="tabs" data-location-tabs>

    <div class="tabs_header" >

        <button class="tab_title">
            <?php pll_e( 'Amsterdam', 'hashmuseum' ) ?>
        </button>

        <button class="tab_title">
            <?php pll_e( 'Barcelona', 'hashmuseum' ) ?>
        </button>

    </div>

    <div class="text_wrap amsterdam normal_block tab_content">

        <div class="text_wrap_inner">

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

            <h2>
                <?php pll_e( 'Amsterdam', 'hashmuseum' ) ?>
            </h2>

            <p class="text">
                <?php echo $amstext; ?>
            </p>

            <div class="buttons">

                <a href="<?php sk_get_ticket_url('amsterdam') ?>" class="btn action_btn black" >
                    <?php pll_e( 'Get your ticket', 'hashmuseum' ) ?>
                </a>

                <a href="<?php pll_e( '/en/amsterdam/#map', 'hashmuseum' ) ?>" class="btn ghost_btn black" >
                    <?php pll_e( 'How to get there', 'hashmuseum' ) ?>
                </a>

            </div>

            <div class="meta">

                <div class="address">
                    <img loading="lazy" class="icon" alt="icon" src="<?php echo get_theme_file_uri() ?>/images/svg/locationIcon.svg" alt="Icon">

                    <p>
                        <?php the_field('amsterdam_address', 'option'); ?>
                    </p>
                </div>

                <div class="phonenumber">
                    <img loading="lazy" class="icon" alt="icon" src="<?php echo get_theme_file_uri() ?>/images/svg/phoneIcon.svg" alt="Icon">

                    <p>
                        <?php the_field('amsterdam_phone_number', 'option'); ?>
                    </p>
                </div>

                <div class="openinghours">
                    <img loading="lazy" class="icon" alt="icon" src="<?php echo get_theme_file_uri() ?>/images/svg/clockIcon.svg" alt="Icon">

                     
                    <p>
                        <?php sk_lang_specific_option('amsterdam_opening_hours'); ?> 
                    </p>
                </div>

            </div>
            
        </div>

    </div>

    <div class="image_wrap normal_block">

        <?php if( !empty( $genericimage ) ): ?>
            
            <img loading="lazy" class="image" src="<?php echo esc_url($genericimage['sizes']['large_image']); ?>" alt="<?php echo $genericimage['alt']; ?>" />
        
            <?php if($genericimage['caption']) { ?>

                <p class="caption">
                    <?php echo esc_html($genericimage['caption']); ?></?php>
                </p>

            <?php } ?> 
            
        <?php endif; ?>

    </div>

    <div class="text_wrap barcelona normal_block tab_content">

        <div class="text_wrap_inner">

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

            <h2>
                <?php pll_e( 'Barcelona', 'hashmuseum' ) ?>
            </h2>

            <p class="text">
                <?php echo $bcntext; ?>
            </p>

            <div class="buttons">

                <a href="<?php sk_get_ticket_url('barcelona') ?>" class="btn action_btn black" >
                    <?php pll_e( 'Get your ticket', 'hashmuseum' ) ?>
                </a>

                <a href="<?php pll_e( '/en/barcelona/#map', 'hashmuseum' ) ?>" class="btn ghost_btn black" >
                    <?php pll_e( 'How to get there', 'hashmuseum' ) ?>
                </a>

            </div>  
            
            <div class="meta">

                <div class="address">
                    <img loading="lazy" class="icon" alt="icon" src="<?php echo get_theme_file_uri() ?>/images/svg/locationIcon.svg" alt="Icon">

                    <p>
                        <?php the_field('barcelona_address', 'option'); ?>
                    </p>
                </div>
                
                <div class="phonenumber">
                    <img loading="lazy" class="icon" alt="icon" src="<?php echo get_theme_file_uri() ?>/images/svg/phoneIcon.svg" alt="Icon">

                    <p>
                        <?php the_field('barcelona_phone_number', 'option'); ?>
                    </p>
                </div>
                
                <div class="openinghours">
                    <img loading="lazy" class="icon" alt="icon" src="<?php echo get_theme_file_uri() ?>/images/svg/clockIcon.svg" alt="Icon">

                    <p>
                        <?php sk_lang_specific_option('barcelona_opening_hours'); ?>
                    </p>
                </div>

            </div>

        </div>    

    </div>

</div>

<div class="image_wrap normal_block small-desktop">

    <?php if( !empty( $genericimage ) ): ?>
        
        <img loading="lazy" class="image" src="<?php echo esc_url($genericimage['sizes']['large_image']); ?>" alt="<?php echo $genericimage['alt']; ?>" />
    
        <?php if($genericimage['caption']) { ?>

            <p class="caption">
                <?php echo esc_html($genericimage['caption']); ?></?php>
            </p>

        <?php } ?> 
        
    <?php endif; ?>

</div>