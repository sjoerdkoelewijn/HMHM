<?php
/* Block Name: Related Posts */

// create id attribute for specific styling
$id = 'related-posts' . $block['id'];

?>

    <article id="<?php echo $id; ?>" class="related_posts gb_block">
                

        <?php 

        $posts = get_field('posts');
        
        if( $posts ): ?>

            <div class="header_wrap">
                
                <div class="leaf_wrap"> 
                    <img loading="lazy" class="icon" alt="icon" src="<?php echo get_theme_file_uri() ?>/images/svg/weedleaf-large.svg" alt="Icon">
                </div>            

                <h2 class="header">
                    <?php the_field('header'); ?>
                </h2>

                <p class="description">
                    <?php the_field('description'); ?>
                </p>
        
            </div>
            
            <?php if( count($posts) < 4 ) { ?>

                <div class="related_posts_inner">
                
                    <?php global $post;

                    foreach( $posts as $post ): ?>

                    <?php setup_postdata($post); ?>

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

                    <?php endforeach; ?>

                    <?php wp_reset_postdata(); ?>

                </div>

            <?php } else { ?>

                <div data-siema-related-post-slider>

                    <?php global $post; ?>
                
                    <?php foreach( $posts as $post ): ?>

                    <?php setup_postdata($post); ?>

                        <div class="post">

                            <a class="image_wrap" href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail( 'large_image',  ); ?>
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
                     
                    <?php endforeach; ?>

                    <?php wp_reset_postdata(); ?>

                </div>

                <button aria-label="previous" class="slider_button left" data-siema-related-post-slider-prev>
                    <div class="background_wrap">
                        <img loading="lazy" class="icon" alt="icon" src="<?php echo get_theme_file_uri() ?>/images/svg/arrowRightIcon.svg" alt="Icon">

                    </div>    
                </button>
                <button aria-label="next" class="slider_button right" data-siema-related-post-slider-next>
                    <div class="background_wrap">
                        <img loading="lazy" class="icon" alt="icon" src="<?php echo get_theme_file_uri() ?>/images/svg/arrowRightIcon.svg" alt="Icon">

                    </div>
                </button>

            <?php } ?>        
            
        <?php endif; ?>
    
                
    </article>