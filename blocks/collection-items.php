<?php
/* Block Name: Collection Items */

// create id attribute for specific styling
$id = 'collection-items-' . $block['id'];

?>

    <div id="<?php echo $id; ?>" class="collection_items gb_block" data-horizontal-slider-container>

        <div class="image_wrap">
            
            <?php $posts = get_field('items'); ?>
                    
            <?php global $post;

                foreach( $posts as $post ): ?>

                <?php setup_postdata($post); ?>

                    <a class="post" href="<?php the_permalink(); ?>">
                        <?php echo get_the_post_thumbnail( $post_id, 'large', array( 'class' => 'collection_image image', 'loading' => 'lazy' ) ); ?>
                    </a>                     

                <?php endforeach; ?>

                <?php wp_reset_postdata(); ?>

        </div>            

    </div>

    <div class="collection_items_btn_wrap">
        <button class="slider_button left hidden" data-slide-left-btn>
            <div class="background_wrap">
                <?php echo file_get_contents(get_template_directory_uri() . "/images/svg/arrowLeftIcon.svg"); ?>
            </div>
        </button>

        <button class="slider_button right" data-slide-right-btn>
            <div class="background_wrap">
                <?php echo file_get_contents(get_template_directory_uri() . "/images/svg/arrowRightIcon.svg"); ?>
            </div>
        </button>
    </div>