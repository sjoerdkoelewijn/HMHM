<?php

$current_page_id = get_the_ID();

$amstext = get_field('amsterdam_text');
$amsterdam_location_link = get_field('amsterdam_location_link');
$bcntext = get_field('barcelona_text'); 
$barcelona_location_link = get_field('barcelona_location_link'); 
$genericimage = get_field('generic_image');
$buy_tickets = get_field('buy_tickets', $current_page_id); 
$how_to_get_there = get_field('how_to_get_there', $current_page_id); 
$plan_your_visit = get_field('plan_your_visit', $current_page_id); 
$amsterdam = get_field('amsterdam', $current_page_id);
$barcelona = get_field('barcelona', $current_page_id); 
$barcelona_opening_hours = get_field('barcelona_opening_hours', $current_page_id);
$amsterdam_opening_hours = get_field('amsterdam_opening_hours', $current_page_id); 
$barcelona_address = get_field('barcelona_address', $current_page_id);
$amsterdam_address = get_field('amsterdam_address', $current_page_id); 

?>

<div class="image_wrap location_hero">

    <div class="content">

        <div class="mobile_logo">

            <img loading="lazy" class="icon" alt="icon" src="<?php echo get_theme_file_uri() ?>/images/svg/LogoLarge.svg" alt="Icon">
            
        </div>

        <h1 class="header">
        
            <?php the_title(); ?>
        
        </h1>
                
    </div>

    <?php if( !empty( $genericimage ) ): ?>

        <img loading="lazy" class="image" src="<?php echo esc_url($genericimage['sizes']['large_image']); ?>" alt="<?php echo $genericimage['alt']; ?>" />
        
        <?php if($genericimage['caption']) { ?>

            <p class="caption">
                <?php echo esc_html($genericimage['caption']); ?></?php>
            </p>

        <?php } ?> 

    <?php endif; ?>

</div>

<div class="tabs" data-location-tabs>

    <div class="tabs_header" >

        <button class="tab_title">
            <?php if( $amsterdam ) {
                echo $amsterdam;
            } else { 
                pll_e( 'Amsterdam', 'hashmuseum' );
            } ?>
        </button>

        <button class="tab_title">
            <?php if( $barcelona ) {
                echo $barcelona;
            } else { 
                pll_e( 'Barcelona', 'hashmuseum' );
            } ?>
        </button>

    </div>

    <div class="text_wrap amsterdam hero_block tab_content">

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
                <a title="<?php pll_e( 'More information', 'hashmuseum' ) ?> Amsterdam" class="location_link" href="/<?php echo pll_current_language(); ?>/amsterdam/">
                    <?php if( $amsterdam ) {
                        echo $amsterdam;
                    } else { 
                        pll_e( 'Amsterdam', 'hashmuseum' );
                    } ?>
                </a>
            </h2>
            
            <div class="meta">

                <div class="address">
                    <img loading="lazy" class="icon" alt="icon" src="<?php echo get_theme_file_uri() ?>/images/svg/locationIcon.svg" alt="Icon"> 
                    <p>
                        <?php if( $amsterdam_address ) {
                            echo $amsterdam_address;
                        } ?>
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

                        <?php if( $amsterdam_opening_hours ) {
                            echo $amsterdam_opening_hours;
                        } else { 
                            sk_lang_specific_option('amsterdam_opening_hours');
                        } ?>    

                    </p>
                </div>

            </div>

            <div class="buttons">

                <a title="<?php if( $buy_tickets ) { echo $buy_tickets;} else { pll_e( 'Get your ticket', 'hashmuseum' );} ?>" href="<?php sk_get_ticket_url('amsterdam') ?>" class="btn action_btn black" > 

                    <?php if( $buy_tickets ) {
                        echo $buy_tickets;
                    } else { 
                        pll_e( 'Get your ticket', 'hashmuseum' );
                    } ?>   

                </a>       

                <a title="<?php if( $how_to_get_there ) { echo $how_to_get_there;} else { pll_e( 'Get your ticket', 'hashmuseum' );} ?> Amsterdam" href="<?php if($amsterdam_location_link){ echo $amsterdam_location_link; } else { pll_e( '/en/amsterdam/#map', 'hashmuseum' ); } ?>" class="btn ghost_btn black" >
                    <?php if( $how_to_get_there ) {
                        echo $how_to_get_there;
                    } else { 
                        pll_e( 'How to get there', 'hashmuseum' );
                    } ?>                    
                </a>      

            </div>

            <div class="text">
                <?php echo $amstext; ?>
            </div>

        </div>

    </div>    

    <div class="text_wrap barcelona hero_block tab_content">

        <div class="text_wrap_inner">

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

            <h2>
                <a title="<?php if( $barcelona ) { echo $barcelona;} else { pll_e( 'Barcelona', 'hashmuseum' );} ?>" class="location_link" href="/<?php echo pll_current_language(); ?>/barcelona/">
                    <?php if( $barcelona ) {
                        echo $barcelona;
                    } else { 
                        pll_e( 'Barcelona', 'hashmuseum' );
                    } ?>
                </a>
            </h2>

            <div class="meta">

                <div class="address">
                    <img loading="lazy" class="icon" alt="icon" src="<?php echo get_theme_file_uri() ?>/images/svg/locationIcon.svg" alt="Icon"> 
                    <p>
                        <?php if( $barcelona_address ) {
                            echo $barcelona_address;
                        } ?>
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
                        <?php if( $barcelona_opening_hours ) {
                            echo $barcelona_opening_hours;
                        } else { 
                            sk_lang_specific_option('barcelona_opening_hours');
                        } ?>
                    </p>
                </div>

            </div>         
            
            <div class="buttons">

                <a title="<?php if( $buy_tickets ) { echo $buy_tickets;} else { pll_e( 'Get your ticket', 'hashmuseum' );} ?>" href="<?php sk_get_ticket_url('barcelona') ?>" class="btn action_btn black" >
                    <?php if( $buy_tickets ) {
                        echo $buy_tickets;
                    } else { 
                        pll_e( 'Get your ticket', 'hashmuseum' );
                    } ?> 
                </a>

                <a title="<?php if( $how_to_get_there ) { echo $how_to_get_there;} else { pll_e( 'How to get there', 'hashmuseum' );} ?> Barcelona" href="<?php if($barcelona_location_link){ echo $barcelona_location_link; } else { pll_e( '/en/barcelona/#map', 'hashmuseum' ); } ?>" class="btn ghost_btn black" >
                    <?php if( $how_to_get_there ) {
                        echo $how_to_get_there;
                    } else { 
                        pll_e( 'How to get there', 'hashmuseum' );
                    } ?>                    
                </a>

            </div>

            <div class="text">
                <?php echo $bcntext; ?>
            </div>

        </div>    

    </div>

</div>


