<?php
/* Block Name: Collection Slider */

// create id attribute for specific styling
$id = 'collection-slider' . $block['id'];

?>

    <article id="<?php echo $id; ?>" class="collection_slider">

        <div class="header_wrap">

            <div class="sepa">
                <?php echo file_get_contents(get_template_directory_uri() . "/images/svg/weedleaf-large.svg"); ?>
            </div>

            <h2>
                <?php the_field('subheader'); ?>
            </h2>

            <h1>
                <?php the_field('header'); ?>
            </h1>

            <a class="btn secondary_btn black" href="<?php the_field('url'); ?>">
                <?php the_field('call_to_action'); ?>
            </a>

        </div>

        <?php $themes = get_field('themes');
        
        if( $themes ): 
            
            if( count($themes) < 4 ) { ?>

                <div class="collection_slider_inner"> 

                    <?php foreach( $themes as $theme ): ?>

                        <?php include('parts/themes/theme-slide.php'); ?>

                    <?php endforeach; ?>

                </div>
                
            <?php } else { ?>

                <div data-siema-related-post-slider>
               
                    <div class="collection_slider_inner">
                    
                        <?php foreach( $themes as $theme ): ?>

                            <?php include('parts/themes/theme-slide.php'); ?>

                        <?php endforeach; ?>

                    </div>

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

            <?php } ?>        
            
        <?php endif; ?>
    
                
    </article>