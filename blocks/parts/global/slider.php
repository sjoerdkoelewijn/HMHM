<?php /* Part of the hero & promo */ ?>

<div class="slider" data-siema-hero-slider>
                    
    <?php foreach( $images as $image ): ?>
        
        <div class="image_slide">
            
            <img loading="lazy" class="image" src="<?php echo esc_url($image['sizes']['larger_image']); ?>" alt="<?php echo $image['alt']; ?>" />
            
            <?php if($image['caption']) { ?>

                <p class="caption">
                    <?php echo esc_html($image['caption']); ?></?php>
                </p>

                <span class="slider_gradient"></span>

            <?php } ?> 
        
        </div>

    <?php endforeach; ?>

</div>

<button class="slider_button left" data-siema-hero-slider-prev>
    <div class="background_wrap">
        <?php echo file_get_contents(get_theme_file_path() . "/images/svg/arrowLeftIcon.svg"); ?>
    </div>    
</button>
<button class="slider_button right" data-siema-hero-slider-next>
    <div class="background_wrap">
        <?php echo file_get_contents(get_theme_file_path() . "/images/svg/arrowRightIcon.svg"); ?>
    </div>
</button>