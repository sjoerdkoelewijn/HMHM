<?php
/* Block Name: promo */

// create id attribute for specific styling
$id = 'reviews-' . $block['id'];

?>


    <article id="<?php echo $id; ?>" class="reviews">

        <div class="text_wrap">

            <?php echo file_get_contents(get_template_directory_uri() . "/images/svg/weedleaf-large.svg"); ?>

            <h2 class="header">
                <?php the_field('header'); ?>
            </h2>   

            <div class="tripadvisor_ratings">

                <div class="rating amsterdam">

                    <?php echo file_get_contents(get_template_directory_uri() . "/images/svg/tripadvisor.svg"); ?>

                    Amsterdam

                    <div class="stars" style="--rating: <?php the_field('tripadvisor_rating_amsterdam', 'option'); ?>;" aria-label="<?php the_field('tripadvisor_rating_amsterdam', 'option'); ?> out of 5."></div>

                </div>

                <div class="rating barcelona">

                    <?php echo file_get_contents(get_template_directory_uri() . "/images/svg/tripadvisor.svg"); ?>

                    Barcelona

                    <div class="stars" style="--rating: <?php the_field('tripadvisor_rating_barcelona', 'option'); ?>;" aria-label="<?php the_field('tripadvisor_rating_barcelona', 'option'); ?> out of 5."></div>

                </div>

            </div>

        </div>

        <?php $reviews = get_field('reviews'); ?>

        <?php if( have_rows('reviews') ): ?>

            <div class="reviews_slider">

                <div data-siema-review-slider>

                    <?php while( have_rows('reviews') ): the_row(); 

                        $quote = get_sub_field('quote');
                        $name = get_sub_field('name');
                        $bio = get_sub_field('bio');
                        $image = get_sub_field('image');

                        ?>

                        <div class="review">
                            
                            <h2 class="quote">
                                “<?php echo $quote; ?>”
                            </h2>

                            <div class="meta">
                                <p class="name">
                                    <?php echo $name; ?>
                                </p>
                                <p class="bio">
                                    <?php echo $bio; ?>
                                </p>
                            </div>
                            
                            <img loading="lazy" class="image" src="<?php echo esc_url($image['sizes']['large']); ?>" alt="<?php echo $image['alt']; ?>" />
                        
                        </div>                        

                    <?php endwhile; ?>    
                
                </div>

                <div class="horizontal_slider_btn_wrap">
                    <button class="slider_button left" data-siema-review-slider-prev>
                        <div class="background_wrap">
                            <?php echo file_get_contents(get_template_directory_uri() . "/images/svg/arrowLeftIcon.svg"); ?>
                        </div>    
                    </button>
                    <button class="slider_button right" data-siema-review-slider-next>
                        <div class="background_wrap">
                            <?php echo file_get_contents(get_template_directory_uri() . "/images/svg/arrowRightIcon.svg"); ?>
                        </div>
                    </button>
                </div>
            
            </div>
                
        <?php endif; ?> 

    </article>

