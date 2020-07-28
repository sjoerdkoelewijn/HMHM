<?php
/* Block Name: Collection Overview Hero */

// create id attribute for specific styling
$id = 'plan-visit-' . $block['id'];

?>

<article id="<?php echo $id; ?>" class="plan_visit_hero">
    
    <div class="image_wrap">

        <h1 class="header">
            <?php the_field('header') ?>
        </h1>

        <?php $image = get_field('image'); ?> 

        <?php if( !empty( $single_image ) ): ?>
            <img loading="lazy" class="image" src="<?php echo esc_url($image['sizes']['medium']); ?>" alt="<?php echo $image['alt']; ?>" />
        <?php endif; ?>

    </div>

    <div class="text_wrap amsterdam">

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

            <a href="#" class="btn action_btn black" >
                <?php pll_e( 'Get your ticket', 'hashmuseum' ) ?>
            </a>

            <a href="#" class="btn ghost_btn black" >
                <?php pll_e( 'How to get there', 'hashmuseum' ) ?>
            </a>

        </div>

    </div>

    <div class="text_wrap barcelona">

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

            <a href="#" class="btn action_btn black" >
                <?php pll_e( 'Get your ticket', 'hashmuseum' ) ?>
            </a>

            <a href="#" class="btn ghost_btn black" >
                <?php pll_e( 'How to get there', 'hashmuseum' ) ?>
            </a>

        </div>

        

    </div>

   

</article>