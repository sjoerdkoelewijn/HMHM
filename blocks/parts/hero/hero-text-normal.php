<?php /* Part of the hero */ ?>

<div class="text_wrap">

    <?php
        if ( function_exists('yoast_breadcrumb') ) {
            yoast_breadcrumb( '<p class="breadcrumbs">','</p>' );
        }
    ?>

    <h1 class="header">
        <?php if ( is_single() || is_page() ) {
            echo the_title();
        }  elseif (is_tax() ) { 
            $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
            echo $term->name;
        } ?>
    </h1>    

    <h2 class="subheader">
        <?php the_field('subheader'); ?>
    </h2>

    <div class="description">
        <?php the_field('description'); ?>
    </div>

    <div class="button">

        <button class="read_more_link" data-read-more-btn>
            <?php echo file_get_contents(get_template_directory() . "/images/svg/arrowRightIcon.svg"); ?>
            <?php _e( 'Read More', 'hashmuseum' ) ?>
        </button>

    </div>

</div>