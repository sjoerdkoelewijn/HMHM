<?php
/* Block Name: promo */

// create id attribute for specific styling
$id = 'promo-' . $block['id'];

$buy_tickets = get_field('buy_tickets', get_the_ID()); 

?>

<?php $imageposition = get_field('image_position'); ?>

<?php if ($imageposition === 'left') { ?>

    <article id="<?php echo $id; ?>" class="promo gb_block">
        
        <div class="image_wrap">

        <?php 
        $images = get_field('image');
        if( $images ): 
            if( count($images) === 1 ) { ?>

                <?php include('parts/global/single-image.php'); ?>

            <?php } else { ?>

                <?php include('parts/global/slider.php'); ?>

            <?php } ?>        
            
        <?php endif; ?>

        </div>

        <div class="text_wrap">

            <img loading="lazy" class="icon" alt="icon" src="<?php echo get_theme_file_uri() ?>/images/svg/weedleaf-large.svg" alt="Icon">

            <h2 class="header">
                <?php the_field('header'); ?>
            </h2>    

            <h3 class="subheader">
                <?php the_field('subheader'); ?>
            </h3>
            
            <?php the_field('description'); ?>
            
            <a class="action_btn btn" href="#tickets">
                <?php if( $buy_tickets ) {
                    echo $buy_tickets;
                } else { 
                    pll_e( 'Get your ticket', 'hashmuseum' );
                } ?> 
            </a>

            <?php if ( !is_singular( 'visitorinfo' ) ) { ?>

                <a class="ghost_btn white btn" href="<?php pll_e('/en/plan-your-visit/') ?>">
                    <?php pll_e( 'Plan your visit', 'hashmuseum' ) ?>
                </a>

            <?php } ?>

        </div>


    </article>

<?php } else { ?> 

    <article id="<?php echo $id; ?>" class="promo">

        <div class="text_wrap">

            <img loading="lazy" class="icon" alt="icon" src="<?php echo get_theme_file_uri() ?>/images/svg/weedleaf-large.svg" alt="Icon">

            <h2 class="header">
                <?php the_field('header'); ?>
            </h2>    

            <h3 class="subheader">
                <?php the_field('subheader'); ?>
            </h3>

            <p class="description">
                <?php the_field('description'); ?>
            </p>

            <a class="action_btn btn" href="#tickets">
                <?php if( $buy_tickets ) {
                    echo $buy_tickets;
                } else { 
                    pll_e( 'Get your ticket', 'hashmuseum' );
                } ?> 
            </a>

            <?php if ( !is_singular( 'visitorinfo' ) ) { ?>

                <a class="ghost_btn white btn" href="<?php pll_e('/en/plan-your-visit/') ?>">
                    <?php pll_e( 'Plan your visit', 'hashmuseum' ) ?>
                </a>

            <?php } ?>

        </div>

        <div class="image_wrap">

            <?php 
            $images = get_field('image');
            if( $images ): 
                if( count($images) === 1 ) { ?>

                    <?php include('parts/global/single-image.php'); ?>

                <?php } else { ?>

                    <?php include('parts/global/slider.php'); ?>

                <?php } ?>        
                
            <?php endif; ?>

        </div>            
                
    </article>

<?php } ?>