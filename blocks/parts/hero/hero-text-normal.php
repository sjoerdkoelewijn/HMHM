<?php /* Part of the hero */ ?>

<div class="text_wrap">

    <?php 
        if(function_exists('sk_breadcrumbs')): 
            echo sk_breadcrumbs();
        endif;
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
            <img loading="lazy" class="icon" alt="icon" src="<?php echo get_theme_file_uri() ?>/images/svg/arrowRightIcon.svg" alt="Icon">
            <?php pll_e( 'Read more', 'hashmuseum' ) ?>
        </button>

    </div>

</div>