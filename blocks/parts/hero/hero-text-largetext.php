<?php /* Part of the hero */ ?>

<div class="text_wrap">

    <h1 class="header">
        <?php the_field('subheader'); ?>
    </h1>    

    <div class="description">
        <?php the_field('description'); ?>
    </div>

    <button class="read_more_link" data-read-more-btn>
        <?php echo file_get_contents(get_template_directory_uri() . "/images/svg/arrowRightIcon.svg"); ?>
        <?php _e( 'Read More', 'hashmuseum' ) ?>
    </button>

</div>