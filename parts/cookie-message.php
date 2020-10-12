<?php ?>

<article class="cookie_message" data-cookie-message>

    <div class="box">
       
        <?php 
            $image = get_field('gdpr_image', 'option');
            $size = 'small_image';
            $thumb = $image['sizes'][ $size ];

            if( !empty( $image ) ): ?>
            <img class="gdpr_image" src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
        <?php endif; ?>

        <div class="text">

            <h2>
                Have a cookie
            </h2>
            <p>
                <?php pll_e( 'We use cookies to improve your experience and deliver personalized content. By using this website you agree to our <a href="/en/cookie-policy">Cookie Policy.</a>', 'hashmuseum' ) ?>
            </p>

            <button class="btn secondary_btn black" data-cookie-accept>
                Accept cookies
            </button>

        </div>

    </div>    

</article>