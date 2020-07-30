<?php
/* Block Name: Collection Overview Hero */

// create id attribute for specific styling
$id = 'collection-overview-hero-' . $block['id'];

?>

<article id="<?php echo $id; ?>" class="collection-overview-hero">

    <div class="image_wrap">

        <h1 class="header">
            <?php the_field('header') ?>
        </h1>

        <span class="slider_gradient"></span>

        <?php $single_image = get_field('single_image'); ?>

        <?php if( !empty( $single_image ) ): ?>
            <img loading="lazy" class="single_image image" src="<?php echo esc_url($single_image['sizes']['large']); ?>" alt="<?php echo $image['alt']; ?>" />
        <?php endif; ?>


    </div>

    <div class="text_wrap">

        <h2 class="item_number">
            <?php the_field('item_number'); ?>
        </h2>

        <h2 class="item_text">
            <?php the_field('item_text'); ?>
        </h2>

        <h2 class="location_text">
            <?php the_field('location_text'); ?>
        </h2>

        <p class="description">
            <?php the_field('description'); ?>
        </p>

        <a class="action_btn btn black" href="#tickets" >
            <?php _e( 'get your ticket now', 'hashmuseum' ) ?>
        </a>

        <button class="read_more_link" data-read-more-btn>
            <?php echo file_get_contents(get_template_directory_uri() . "/images/svg/arrowRightIcon.svg"); ?>
            <?php _e( 'More about the collection', 'hashmuseum' ) ?>
        </button>

    </div>

    <div class="image_wrap">

        <?php 
        $posts = get_field('single_item_slider');
        if( $posts ): 
            if( count($posts) === 1 ) { ?>

                <?php global $post;

                foreach( $posts as $post ): ?>

                <?php setup_postdata($post); ?>

                    <article class="image_slide">

                        <a href="<?php the_permalink(); ?>">
                            <?php echo get_the_post_thumbnail( $post_id, 'large', array( 'class' => 'single_item_image', 'loading' => 'lazy' ) ); ?>
                        
                            <div class="caption">
                                <h2><?php the_title(); ?></h2>
                                <?php the_excerpt(); ?>
                            </div>
                        </a>                     

                    </article>                     

                <?php endforeach; ?>

                <?php wp_reset_postdata(); ?>

            <?php } else { ?>

                <div data-siema-hero-slider>

                    <?php global $post;

                    foreach( $posts as $post ): ?>

                    <?php setup_postdata($post); ?>

                        <article class="image_slide">

                            <a href="<?php the_permalink(); ?>">
                                <?php echo get_the_post_thumbnail( $post_id, 'large', array( 'class' => 'single_item_image', 'loading' => 'lazy' ) ); ?>
                            
                                <div class="caption">
                                    <h2><?php the_title(); ?></h2>
                                    <?php the_excerpt(); ?>
                                </div>

                                <span class="slider_gradient"></span>

                            </a>                     

                        </article>                     

                    <?php endforeach; ?>

                    <?php wp_reset_postdata(); ?>

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