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
                            <?php the_post_thumbnail( 'large' ); ?>
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
                                <?php echo file_get_contents(get_theme_file_path() . "/images/svg/arrowRightIcon.svg"); ?>
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
                            <?php the_post_thumbnail( 'large' ); ?>
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
                                <?php echo file_get_contents(get_theme_file_path() . "/images/svg/arrowRightIcon.svg"); ?>
                                <?php pll_e( 'Read more', 'hashmuseum' ) ?>
                            </a>

                        </div>
                            
                    </div>        
                        
                <?php endwhile; ?>

            </div>

            <button class="slider_button left" data-siema-related-post-slider-prev>
                <div class="background_wrap">
                    <?php echo file_get_contents(get_theme_file_path() . "/images/svg/arrowLeftIcon.svg"); ?>
                </div>    
            </button>
            <button class="slider_button right" data-siema-related-post-slider-next>
                <div class="background_wrap">
                    <?php echo file_get_contents(get_theme_file_path() . "/images/svg/arrowRightIcon.svg"); ?>
                </div>
            </button>

        <?php } ?>        
        
    <?php endif; ?>










   





























        
                
    </article>