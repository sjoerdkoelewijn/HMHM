<?php ?>

<article class="cookie_message" data-cookie-message>

    <div class="box">
       
        <?php 
            $image = get_field('gdpr_image', 'option');
            $size = 'medium_image';
            $thumb = $image['sizes'][ $size ];

            if( !empty( $image ) ): ?>
            <img loading="lazy" class="gdpr_image" src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
        <?php endif; ?>

        <div class="text">

            <h2>
                <?php pll_e('Have a cookie'); ?>
            </h2>
            <p>
                <?php pll_e( 'We use cookies to store data and enable important site functionality including analytics and language settings. See our <a href="/en/privacy-policy">privacy policy</a> for more information.', 'hashmuseum' ) ?>
            </p>

            <button class="btn secondary_btn black" data-cookie-accept-btn>
                <?php pll_e('Accept'); ?>
            </button>

            <button class="btn" data-cookie-settings-btn>
                <?php pll_e('Settings'); ?>
            </button>

        </div>

    </div>    

</article>

<article class="cookie_message settings" data-cookie-settings-message>

    <div class="box">
            
        <form class="text" data-cookie-settings-form>

            <h2>
                <?php pll_e('Cookie settings'); ?>
            </h2>

            <div class="checkbox_wrap">
                <input class="checkbox" type="checkbox" id="functional" name="functional_cookies" value="functional" data-cookie-checkbox checked disabled="disabled">
                <label class="checkbox_label functional" for="functional">
                    <?php pll_e('Functional'); ?>
                </label>
                <p>
                    <?php pll_e('These cookies are required for the website to work so you can’t disable them.'); ?>
                </p>
            </div>
            
            <div class="checkbox_wrap">
                <input class="checkbox" type="checkbox" id="analytics" name="analytics_cookies" value="analytics" data-cookie-checkbox >
                <label class="checkbox_label" for="analytics">
                    <?php pll_e('Analytics'); ?>
                </label>
                <p>
                    <?php pll_e('We anonymize our statistics and we only use this data to make our website better.'); ?>
                </p>
            </div>         
          

            <button type="submit" class="btn secondary_btn black" data-cookie-settings-accept-btn>
                <?php pll_e('Save'); ?>
            </button>
            
        </form>

        

    </div>    

</article>
