<?php /* Part of the hero */ ?>

<div class="text_wrap">

    <div class="text_wrap_inner">

        <a href="/en/collection/" class="back_link">
            <img loading="lazy" class="icon" alt="icon" src="<?php echo get_theme_file_uri() ?>/images/svg/arrowLeftIcon.svg" alt="Icon">
            <?php pll_e( 'Back to the collection', 'hashmuseum' ) ?>
        </a>

        <h1 class="header">
            <?php echo the_title(); ?>
        </h1>    

        <h2 class="subheader">
            <?php the_field('subheader'); ?>
        </h2>

        <div class="description">
            <?php the_field('description'); ?> 
        </div>

        <?php echo sk_taxonomy_terms(); ?>

    </div>
        
    <p class="license_message">
        <?php pll_e( 'Hash Marihuana & Hemp Museum. Please <a href="mailto:info@hashmuseum.com">contact us</a> for licensing options.', 'hashmuseum' ) ?>
    </p>

</div>