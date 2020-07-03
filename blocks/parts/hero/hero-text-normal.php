<?php /* Part of the hero */ ?>

<div class="text_wrap">

    <?php
        if ( function_exists('yoast_breadcrumb') ) {
            yoast_breadcrumb( '<p class="breadcrumbs">','</p>' );
        }
    ?>

    <h1 class="header">
        <?php echo the_title(); ?>
    </h1>    

    <h2 class="subheader">
        <?php the_field('subheader'); ?>
    </h2>

    <p class="description">
        <?php the_field('description'); ?>
    </p>

    <button class="read_more_link" data-read-more-btn>
        <?php echo file_get_contents(get_template_directory_uri() . "/images/svg/arrowRightIcon.svg"); ?>
        <?php _e( 'Read More', 'hashmuseum' ) ?>
    </button>

</div>