<?php
/* Block Name: promo */

// create id attribute for specific styling
$id = 'promo-' . $block['id'];

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

            <?php echo file_get_contents(get_template_directory_uri() . "/images/svg/weedleaf-large.svg"); ?>

            <h2 class="header">
                <?php the_field('header'); ?>
            </h2>    

            <h3 class="subheader">
                <?php the_field('subheader'); ?>
            </h3>
            
            <?php the_field('description'); ?>
            
            <a class="action_btn btn" href="#tickets">
                <?php pll_e( 'Get your ticket', 'hashmuseum' ) ?>
            </a>

            <a class="ghost_btn white btn" href="<?php pll_e('/en/plan-your-visit/') ?>">
                <?php pll_e( 'Plan your visit', 'hashmuseum' ) ?>
            </a>

        </div>


    </article>

<?php } else { ?> 

    <article id="<?php echo $id; ?>" class="promo">

        <div class="text_wrap">

            <?php echo file_get_contents(get_template_directory_uri() . "/images/svg/weedleaf-large.svg"); ?>

            <h2 class="header">
                <?php the_field('header'); ?>
            </h2>    

            <h3 class="subheader">
                <?php the_field('subheader'); ?>
            </h3>

            <p class="description">
                <?php the_field('description'); ?>
            </p>

            <a class="action_btn btn" href="#">
                <?php _e( 'Get your ticket', 'hashmuseum' ) ?>
            </a>

            <a class="ghost_btn white btn" href="#">
                <?php _e( 'Plan your visit', 'hashmuseum' ) ?>
            </a>

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