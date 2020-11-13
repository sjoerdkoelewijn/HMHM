<?php

    /* Block Name: Horizontal Image slider */

    $id = 'image-slider-' . $block['id'];
    $images = get_field('images');

    ?>

    <div id="<?php echo $id; ?>" class="gb_block horizontal_slider" <?php if( count($images) > 2 ) { echo 'data-horizontal-slider-container'; } ?> >
        
        <?php 
        $images = get_field('images');
        if( $images ): ?>
               
            <?php foreach( $images as $image ): ?>

                <div class="image_wrap">
                                
                    <img class="image" loading="lazy" src="<?php echo esc_url($image['sizes']['large_image']); ?>" alt="<?php echo $image['alt']; ?>" />
                                       
                </div>

            <?php endforeach; ?>            
                                
        <?php endif; ?>                
                
    </div>

    <?php if( count($images) > 2 ) { ?>

        <div class="horizontal_slider_btn_wrap"> 
            <button aria-label="previous image" class="slider_button left hidden" data-slide-left-btn>
                <div class="background_wrap">
                    <img loading="lazy" class="icon" alt="icon" src="<?php echo get_theme_file_uri() ?>/images/svg/arrowLeftIcon.svg" alt="Icon">
                </div>
            </button>

            <button aria-label="next image" class="slider_button right" data-slide-right-btn>
                <div class="background_wrap">
                    <img loading="lazy" class="icon" alt="icon" src="<?php echo get_theme_file_uri() ?>/images/svg/arrowRightIcon.svg" alt="Icon">
                </div>
            </button>
        </div>

    <?php } ?>