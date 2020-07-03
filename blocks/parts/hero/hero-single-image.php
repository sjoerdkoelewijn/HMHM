<?php /* Part of the hero slider */ ?>

<?php foreach( $images as $image ): ?>
                        
    <img loading="lazy" class="image" src="<?php echo esc_url($image['sizes']['large']); ?>" alt="<?php echo $image['alt']; ?>" />

    <?php if($image['caption']) { ?>

        <p class="caption">
            <?php echo esc_html($image['caption']); ?></?php>
        </p>

    <?php } ?>    

<?php endforeach; ?>