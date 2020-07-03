<?php
/* Block Name: Hero */

// create id attribute for specific styling
$id = 'hero-' . $block['id'];

?>

<?php $imageposition = get_field('image_position'); ?>

<?php if ($imageposition === 'left') { ?>

    <article id="<?php echo $id; ?>" class="hero">
        
        <div class="image_wrap">

            <?php 
            $images = get_field('image');
            if( $images ): 
                if( count($images) === 1 ) { ?>

                    <?php include('parts/hero/hero-single-image.php'); ?>

                <?php } else { ?>

                    <?php include('parts/hero/hero-slider.php'); ?>

                <?php } ?>        
                
            <?php endif; ?>

        </div>
        
        <?php

        $HeroType = get_field('hero_type');

        switch ($HeroType) {
        case 'normal':
            include('parts/hero/hero-text-normal.php');
            break;
        case 'collection_item':
            include('parts/hero/hero-text-collection.php');
            break;
        case 'exhibition':
            include('parts/hero/hero-text-exhibition.php');
            break;
        default:
            include('parts/hero/hero-text-normal.php');
        }

        ?>

    </article>

<?php } else { ?> 

    <article id="<?php echo $id; ?>" class="hero">

        <?php include('parts/hero/hero-text-normal.php'); ?>    

        <div class="image_wrap">

            <?php 
            $images = get_field('image'); 
            
            if( $images ): 
                if( count($images) === 1 ) { ?>

                    <?php include('parts/hero/hero-single-image.php'); ?>

                <?php } else { ?>

                    <?php include('parts/hero/hero-slider.php'); ?>

                <?php } ?>        
                
            <?php endif; ?>

            </div>             
                
    </article>

<?php } ?>