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

                <?php } ?>        
                
            <?php endif; ?>

            </div> 

            <div class="text_wrap">

                <?php
                    if ( function_exists('yoast_breadcrumb') ) {
                        yoast_breadcrumb( '<p class="breadcrumbs">','</p>' );
                    }
                ?>

                <h1 class="header">
                    <?php echo the_title(); ?>
                </h1>    

                <h2 class="subheader">
                    <?php the_field('subheader'); ?>
                </h2>

                <p class="description">
                    <?php the_field('description'); ?>
                </p>

                <button class="read_more_link" data-read-more-btn>
                    <?php echo file_get_contents(get_template_directory_uri() . "/images/svg/arrowRightIcon.svg"); ?>
                    <?php _e( 'Read More', 'hashmuseum' ) ?>
                </button>

            </div>

    </article>

<?php } else { ?> 

    <article id="<?php echo $id; ?>" class="hero">

        <div class="text_wrap">

            <?php
                if ( function_exists('yoast_breadcrumb') ) {
                    yoast_breadcrumb( '<p class="breadcrumbs">','</p>' );
                }
            ?>

            <h1 class="header">
                <?php echo the_title(); ?>
            </h1>    

            <h2 class="subheader">
                <?php the_field('subheader'); ?>
            </h2>

            <p class="description">
                <?php the_field('description'); ?>
            </p>

            <button class="read_more_link" data-read-more-btn>
                <?php echo file_get_contents(get_template_directory_uri() . "/images/svg/arrowRightIcon.svg"); ?>
                <?php _e( 'Read More', 'hashmuseum' ) ?>
            </button>

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

                <?php } ?>        
                
            <?php endif; ?>

            </div>             
                
    </article>

<?php } ?>