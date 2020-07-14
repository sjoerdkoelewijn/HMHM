<?php
/* Block Name: Hero */

// create id attribute for specific styling
$id = 'hero-' . $block['id'];

?>

<?php $imageposition = get_field('image_position'); ?>

<?php if ($imageposition === 'left') { ?>

    <?php $HeroType = get_field('hero_type'); ?>

    <article id="<?php echo $id; ?>" class="hero <?php echo $HeroType; ?>">
        
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
        
        <?php

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
        case 'large_text':
            include('parts/hero/hero-text-largetext.php');
            break;    
        default:
            include('parts/hero/hero-text-normal.php');
        }

        ?>

    </article>

<?php } else { ?> 

    <?php $HeroType = get_field('hero_type'); ?>

    <article id="<?php echo $id; ?>" class="hero <?php echo $HeroType; ?>">

    <?php        

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
        case 'large_text':
            include('parts/hero/hero-text-largetext.php');
            break;     
        default:
            include('parts/hero/hero-text-normal.php');
        }

        ?>  

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