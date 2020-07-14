<?php /* Part of the hero & promo */ ?>

<div data-siema-hero-slider>
                    
    <?php foreach( $images as $image ): ?>
        
        <div class="image_slide">
            
            <img loading="lazy" class="image" src="<?php echo esc_url($image['sizes']['large']); ?>" alt="<?php echo $image['alt']; ?>" />
            
            <?php if($image['caption']) { ?>

                <p class="caption">
                    <?php echo esc_html($image['caption']); ?></?php>
                </p>

            <?php } ?> 
        
        </div>

    <?php endforeach; ?>

</div>

<button class="slider_button left" data-siema-hero-slider-prev>
    <div class="background_wrap">
        <?php echo file_get_contents(get_template_directory_uri() . "/images/svg/arrowLeftIcon.svg"); ?>
    </div>    
</button>
<button class="slider_button right" data-siema-hero-slider-next>
    <div class="background_wrap">
        <?php echo file_get_contents(get_template_directory_uri() . "/images/svg/arrowRightIcon.svg"); ?>
    </div>
</button>