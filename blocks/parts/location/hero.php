<?php

$amstext = get_field('amsterdam_text');
$bcntext = get_field('barcelona_text'); 
$genericimage = get_field('generic_image');

?>

<div class="image_wrap">

<h1 class="header">
    <?php the_field('header') ?>
</h1>

<?php if( !empty( $genericimage ) ): ?>
    <img loading="lazy" class="image" src="<?php echo esc_url($genericimage['sizes']['large_image']); ?>" alt="<?php echo $genericimage['alt']; ?>" />
<?php endif; ?>

</div>

<div class="text_wrap amsterdam hero_block">

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
    
    <div class="meta">

        <div class="address">
            <?php echo file_get_contents(get_template_directory_uri() . "/images/svg/locationIcon.svg"); ?> 
            <p>
                <?php the_field('amsterdam_address', 'option'); ?>
            </p>
        </div>
        
        <div class="phonenumber">
            <?php echo file_get_contents(get_template_directory_uri() . "/images/svg/phoneIcon.svg"); ?> 
            <p>
                <?php the_field('amsterdam_phone_number', 'option'); ?>
            </p>
        </div>

        <div class="openinghours">
            <?php echo file_get_contents(get_template_directory_uri() . "/images/svg/clockIcon.svg"); ?> 
            <p>
                <?php sk_lang_specific_option('amsterdam_opening_hours'); ?>
            </p>
        </div>

    </div>

    <div class="buttons">

        <a href="<?php sk_get_ticket_url('amsterdam') ?>" class="btn action_btn black" >
            <?php pll_e( 'Get your ticket', 'hashmuseum' ) ?>
        </a>

        <a href="<?php pll_e( '/en/amsterdam/#map', 'hashmuseum' ) ?>" class="btn ghost_btn black" >
            <?php pll_e( 'How to get there', 'hashmuseum' ) ?>
        </a>

    </div>

    <p class="text">
        <?php echo $amstext; ?>
    </p>

</div>

</div>    

<div class="text_wrap barcelona hero_block">

<div class="text_wrap_inner">

    <nav class="social amsterdam">
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
        <?php pll_e( 'Barcelona', 'hashmuseum' ) ?>
    </h2>

    <div class="meta">

        <div class="address">
            <?php echo file_get_contents(get_template_directory_uri() . "/images/svg/locationIcon.svg"); ?> 
            <p>
                <?php the_field('barcelona_address', 'option'); ?>
            </p>
        </div>
        
        <div class="phonenumber">
            <?php echo file_get_contents(get_template_directory_uri() . "/images/svg/phoneIcon.svg"); ?> 
            <p>
                <?php the_field('barcelona_phone_number', 'option'); ?>
            </p>
        </div>
        
        <div class="openinghours">
            <?php echo file_get_contents(get_template_directory_uri() . "/images/svg/clockIcon.svg"); ?> 
            <p>
                <?php sk_lang_specific_option('barcelona_opening_hours'); ?>
            </p>
        </div>

    </div>          
    
    <div class="buttons">

        <a href="<?php sk_get_ticket_url('barcelona') ?>" class="btn action_btn black" >
            <?php pll_e( 'Get your ticket', 'hashmuseum' ) ?>
        </a>

        <a href="<?php pll_e( '/en/barcelona/#map', 'hashmuseum' ) ?>" class="btn ghost_btn black" >
            <?php pll_e( 'How to get there', 'hashmuseum' ) ?>
        </a>

    </div>

    <p class="text">
        <?php echo $bcntext; ?>
    </p>

</div>    

</div>