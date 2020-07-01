<?php
/* Block Name: promo */

// create id attribute for specific styling
$id = 'promo-' . $block['id'];

?>

<?php $imageposition = get_field('image_position'); ?>

<?php if ($imageposition === 'left') { ?>

    <article id="<?php echo $id; ?>" class="promo">
        
        <div class="image_wrap">

            <?php 
            $images = get_field('image');
            if( $images ): 
                if( count($images) === 1 ) { 

                    foreach( $images as $image ): ?>
                        
                        <img loading="lazy" class="image" src="<?php echo esc_url($image['sizes']['large']); ?>" alt="<?php echo $image['alt']; ?>" />
                        
                        <?php if($image['caption']) { ?>

                            <p class="caption">
                                <?php echo esc_html($image['caption']); ?></?php>
                            </p>

                        <?php } ?>    

                    <?php endforeach; ?>

                <?php } else { ?>

                    <div data-siema-promo-slider>
                    
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

                    <button class="slider_button left" data-siema-promo-slider-prev>
                        <div class="background_wrap">
                            <?php echo file_get_contents(get_template_directory_uri() . "/images/svg/arrowLeftIcon.svg"); ?>
                        </div>    
                    </button>
                    <button class="slider_button right" data-siema-promo-slider-next>
                        <div class="background_wrap">
                            <?php echo file_get_contents(get_template_directory_uri() . "/images/svg/arrowRightIcon.svg"); ?>
                        </div>
                    </button>

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
                if( count($images) === 1 ) { 

                    foreach( $images as $image ): ?>
                        
                        <img loading="lazy" class="image" src="<?php echo esc_url($image['sizes']['large']); ?>" alt="<?php echo $image['alt']; ?>" />
                        
                        <?php if($image['caption']) { ?>

                            <p class="caption">
                                <?php echo esc_html($image['caption']); ?></?php>
                            </p>

                        <?php } ?>    

                    <?php endforeach; ?>

                <?php } else { ?>

                    <div data-siema-promo-slider>
                    
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

                    <button class="slider_button left" data-siema-promo-slider-prev>
                        <div class="background_wrap">
                            <?php echo file_get_contents(get_template_directory_uri() . "/images/svg/arrowLeftIcon.svg"); ?>
                        </div>    
                    </button>
                    <button class="slider_button right" data-siema-promo-slider-next>
                        <div class="background_wrap">
                            <?php echo file_get_contents(get_template_directory_uri() . "/images/svg/arrowRightIcon.svg"); ?>
                        </div>
                    </button>

                <?php } ?>        
                
            <?php endif; ?>

            </div>             
                
    </article>

<?php } ?>