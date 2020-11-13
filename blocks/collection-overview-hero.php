<?php
/* Block Name: Collection Overview Hero */

// create id attribute for specific styling
$id = 'collection-overview-hero-' . $block['id'];

?>

<article id="<?php echo $id; ?>" class="collection-overview-hero gb_block"> 

    <div class="image_wrap">

        <div class="content">

            <div class="mobile_logo">

                <img loading="lazy" class="icon" alt="icon" src="<?php echo get_theme_file_uri() ?>/images/svg/LogoLarge.svg" alt="Icon">

            </div>

            <h1 class="header">
                <?php the_field('header') ?>
            </h1>

        </div>

        <span class="slider_gradient"></span>

        <?php $single_image = get_field('single_image'); ?>

        <?php if( !empty( $single_image ) ): ?>
            <img loading="lazy" class="single_image image" src="<?php echo esc_url($single_image['sizes']['large_image']); ?>" alt="<?php echo $image['alt']; ?>" />
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

        <div class="description">
            <?php the_field('description'); ?>
        </div>

        <div class="buttons">
            <a class="action_btn btn black" href="#tickets" >
                <?php pll_e( 'Get your ticket', 'hashmuseum' ) ?>
            </a>

            <button class="read_more_link" data-read-more-btn>
                <img loading="lazy" class="icon" alt="icon" src="<?php echo get_theme_file_uri() ?>/images/svg/arrowRightIcon.svg" alt="Icon">
                <?php pll_e( 'More about the collection', 'hashmuseum' ) ?>
            </button>
        </div>

    </div>

    <div class="image_wrap slider">

        <?php 
        $posts = get_field('single_item_slider');
        if( $posts ): 
            if( count($posts) === 1 ) { ?>

                <?php global $post;

                foreach( $posts as $post ): ?>

                <?php setup_postdata($post); ?>

                    <article class="image_slide">

                        <a href="<?php the_permalink(); ?>">
                            <?php echo get_the_post_thumbnail( $post_id, 'large_image', array( 'class' => 'single_item_image', 'loading' => 'lazy' ) ); ?>
                        
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
                                <?php echo get_the_post_thumbnail( $post_id, 'large_image', array( 'class' => 'single_item_image', 'loading' => 'lazy' ) ); ?>
                            
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

                <button aria-label="previous" class="slider_button left" data-siema-hero-slider-prev>
                    <div class="background_wrap">
                        <img loading="lazy" class="icon" alt="icon" src="<?php echo get_theme_file_uri() ?>/images/svg/arrowLeftIcon.svg" alt="Icon">
                    </div>    
                </button>
                <button aria-label="next" class="slider_button right" data-siema-hero-slider-next>
                    <div class="background_wrap">
                        <img loading="lazy" class="icon" alt="icon" src="<?php echo get_theme_file_uri() ?>/images/svg/arrowRightIcon.svg" alt="Icon">
                    </div>
                </button>

            <?php } ?>        
            
        <?php endif; ?>

    </div>

</article>