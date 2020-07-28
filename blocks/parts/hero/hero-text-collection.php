<?php /* Part of the hero */ ?>

<div class="text_wrap">

    <a href="/en/collection/" class="back_link">
        <?php echo file_get_contents(get_template_directory_uri() . "/images/svg/arrowLeftIcon.svg"); ?>
        <?php _e( 'Back to the collection', 'hashmuseum' ) ?>
    </a>

    <h1 class="header">
        <?php echo the_title(); ?>
    </h1>    

    <h2 class="subheader">
        <?php the_field('subheader'); ?>
    </h2>

    <p class="description">
        <?php the_field('description'); ?>
    </p>

    <?php echo sk_taxonomy_terms(); ?>
    
    <p class="license_message">
    © <?php echo date("Y");?>
    <?php _e( 'Hash Marihuana & Hemp Museum. Please <a href="mailto:info@hashmuseum.com">contact us</a> for licensing options.', 'hashmuseum' ) ?>
    
    </p>

</div>