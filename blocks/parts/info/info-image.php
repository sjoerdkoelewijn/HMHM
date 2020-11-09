<?php /* Part of the info block */ ?>

<div class="image_wrap">

    <?php 
    $images = get_field('image'); 
    
    if( $images ): 
        if( count($images) === 1 ) { ?>

            <?php include(get_theme_file_path() . '/blocks/parts/global/single-image.php'); ?>

        <?php } else { ?>

            <?php include(get_theme_file_path() . '/blocks/parts/global/slider.php'); ?>

        <?php } ?>        
        
    <?php endif; ?>

</div> 