<?php /* Part of the hero */ ?>

<div class="text_wrap">

    <h1 class="header">
        <?php the_field('subheader'); ?>
    </h1>    

    <div class="description">
        <?php the_field('description'); ?>
    </div>

    <div class="buttons">
        
        <button class="read_more_link" data-read-more-btn>
            <img loading="lazy" class="icon" alt="icon" src="<?php echo get_theme_file_uri() ?>/images/svg/arrowRightIcon.svg" alt="Icon">
            <?php _e( 'Read More', 'hashmuseum' ) ?> 
        </button>

    </div>

</div>