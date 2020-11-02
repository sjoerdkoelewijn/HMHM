<?php /* Part of the collection theme slider */ ?>

<a class="theme" href="<?php echo esc_url( get_term_link( $theme ) ); ?>">

    <?php   
        $image_id = get_field('featured_image', $theme, false); // 3rd arg set to false to ensure we get unformatted value (ID)
        $image = wp_get_attachment_image_src($image_id, 'large'); 
    ?>

    <img loading="lazy" class="image" src="<?php echo $image[0]; ?>" />

    <div class="text_wrap">

        <h2>
            <?php echo $theme->name; ?>
        </h2>

        <p class="excerpt">
            
            <?php echo $theme->description; ?>
            
        </p>  

    </div>   

</a>