<?php
/* Block Name: Image slider */

// create id attribute for specific styling
$id = 'image-slider-' . $block['id'];

?>

    <div id="<?php echo $id; ?>" class="horizontal_slider" data-horizontal-slider-container>
        
        <?php 
        $images = get_field('images');
        if( $images ): ?>
               
            <?php foreach( $images as $image ): ?>

                                
                    <img loading="lazy" src="<?php echo esc_url($image['sizes']['large']); ?>" alt="<?php echo $image['alt']; ?>" />
                                        

            <?php endforeach; ?>            
                                
        <?php endif; ?>                
                
    </div>

    <div class="horizontal_slider_btn_wrap">
        <button class="slider_button left hidden" data-slide-left-btn>
            <div class="background_wrap">
                <?php echo file_get_contents(get_template_directory_uri() . "/images/svg/arrowLeftIcon.svg"); ?>
            </div>
        </button>

        <button class="slider_button right" data-slide-right-btn>
            <div class="background_wrap">
                <?php echo file_get_contents(get_template_directory_uri() . "/images/svg/arrowRightIcon.svg"); ?>
            </div>
        </button>
    </div>