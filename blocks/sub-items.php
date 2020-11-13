<?php
/* Block Name: Category Sub-items */

// create id attribute for specific styling
$id = 'sub-items' . $block['id'];

?>

    <article id="<?php echo $id; ?>" class="sub_items gb_block">
        

    <?php 

    $count = 0;
    $posts = get_field('posts');
    if (is_array($posts)) {
        $count = count($posts);
        echo $count;
    }


    if ( have_posts() ) : ?>

        <div class="header_wrap">

            <h2 class="header">
                <?php the_field('header'); ?>
            </h2>

            <p class="description">
                <?php the_field('description'); ?>
            </p>

        </div>
        
        <?php if( $count < 4 ) { ?>

            <div class="related_posts_inner">
            
                <?php while ( have_posts() ) : the_post(); ?>
                    
                    <div class="post">

                        <a class="image_wrap" href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail( 'large_image' ); ?>
                        </a> 

                        <div class="text_wrap">
                
                            <a class="title" href="<?php the_permalink(); ?>">
                                <h2>
                                    <?php the_title(); ?>
                                </h2>
                            </a>
                            
                            <p class="excerpt">
                                <?php the_excerpt(); ?>
                            </p>

                            <a class="read_more" href="<?php the_permalink(); ?>">
                                <img loading="lazy" class="icon" alt="icon" src="<?php echo get_theme_file_uri() ?>/images/svg/arrowRightIcon.svg" alt="Icon">

                                <?php pll_e( 'Read more', 'hashmuseum' ) ?>
                            </a>

                        </div>
                            
                    </div>        
                        
                <?php endwhile; ?>

            </div>

        <?php } else { ?>

            <div data-siema-related-post-slider>

                <?php while ( have_posts() ) : the_post(); ?>
                    
                    <div class="post">

                        <a class="image_wrap" href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail( 'large_image' ); ?>
                        </a> 

                        <div class="text_wrap">
                
                            <a class="title" href="<?php the_permalink(); ?>"> 
                                <h2>
                                    <?php the_title(); ?>
                                </h2>
                            </a>
                            
                            <p class="excerpt">
                                <?php the_excerpt(); ?>
                            </p>

                            <a class="read_more" href="<?php the_permalink(); ?>">
                                <img loading="lazy" class="icon" alt="icon" src="<?php echo get_theme_file_uri() ?>/images/svg/arrowRightIcon.svg" alt="Icon">
                                <?php pll_e( 'Read more', 'hashmuseum' ) ?>
                            </a>

                        </div>
                            
                    </div>        
                        
                <?php endwhile; ?>

            </div>

            <button aria-label="previous image" class="slider_button left" data-siema-related-post-slider-prev>
                <div class="background_wrap">
                    <img loading="lazy" class="icon" alt="icon" src="<?php echo get_theme_file_uri() ?>/images/svg/arrowLeftIcon.svg" alt="Icon">
                </div>    
            </button>
            <button aria-label="next image" class="slider_button right" data-siema-related-post-slider-next>
                <div class="background_wrap">
                    <img loading="lazy" class="icon" alt="icon" src="<?php echo get_theme_file_uri() ?>/images/svg/arrowRightIcon.svg" alt="Icon">
                </div>
            </button>

        <?php } ?>        
        
    <?php endif; ?>










   





























        
                
    </article>