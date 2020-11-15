<?php /* Part of the hero slider */ ?>

<?php

$HeroType = get_field('hero_type');

if ($HeroType === 'large_text') {?> 

     <div class="content">

        <div class="mobile_logo">

            <img loading="lazy" class="icon" alt="icon" src="<?php echo get_theme_file_uri() ?>/images/svg/LogoLarge.svg" alt="Icon">

        </div>

        <h1 class="header">
            <?php the_field('header') ?>
        </h1>

    </div>

<?php } ?>

<?php foreach( $images as $image ): ?>
                        
    <img loading="lazy" class="image" src="<?php echo esc_url($image['sizes']['larger_image']); ?>" alt="<?php echo $image['alt']; ?>" />

    <?php if($image['caption']) { ?>

        <p class="caption">
            <?php echo esc_html($image['caption']); ?></?php>
        </p>

    <?php } ?>    

<?php endforeach; ?>