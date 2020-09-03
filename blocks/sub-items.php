<?php
/* Block Name: Category Sub-items */

// create id attribute for specific styling
$id = 'sub-items' . $block['id'];

?>

    <article id="<?php echo $id; ?>" class="sub_items gb_block">
        
        <div class="header_wrap">         

            <h2 class="header">
                <?php the_field('header'); ?>
            </h2>

            <p class="description">
                <?php the_field('description'); ?>
            </p>
    
        </div>



        
		
					
		


        <?php 
        
        $posts = get_field('posts');
        
        if ( have_posts() ) : ?>
            
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
                            <?php echo file_get_contents(get_template_directory_uri() . "/images/svg/arrowRightIcon.svg"); ?>
                            <?php pll_e( 'Read more', 'hashmuseum' ) ?>
                        </a>

                    </div>
                            
                    </div>        
                        
                    <?php endwhile; ?>

                <?php global $post; ?>
            
                <?php foreach((array) $posts as $post ): ?>

                <?php setup_postdata($post); ?>

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
                                <?php echo file_get_contents(get_template_directory_uri() . "/images/svg/arrowRightIcon.svg"); ?>
                                <?php pll_e( 'Read more', 'hashmuseum' ) ?>
                            </a>

                        </div>
                        
                    </div> 
                    
                <?php endforeach; ?>

                <?php wp_reset_postdata(); ?>

            </div>

            <button class="slider_button left" data-siema-related-post-slider-prev>
                <div class="background_wrap">
                    <?php echo file_get_contents(get_template_directory_uri() . "/images/svg/arrowLeftIcon.svg"); ?>
                </div>    
            </button>
            <button class="slider_button right" data-siema-related-post-slider-next>
                <div class="background_wrap">
                    <?php echo file_get_contents(get_template_directory_uri() . "/images/svg/arrowRightIcon.svg"); ?>
                </div>
            </button>
            
        <?php endif; ?>
    
                
    </article>