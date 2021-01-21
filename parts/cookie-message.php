<?php 

$current_page_id = get_the_ID();

$have_a_cookie = get_field('have_a_cookie', $current_page_id);
$we_use_cookies_to_store_data = get_field('we_use_cookies_to_store_data', $current_page_id);
$accept = get_field('accept', $current_page_id);
$settings = get_field('settings', $current_page_id);
$cookie_settings = get_field('cookie_settings', $current_page_id);
$functional = get_field('functional', $current_page_id);
$these_cookies_are_required_for_the_website_to_work = get_field('these_cookies_are_required_for_the_website_to_work', $current_page_id);
$analytics = get_field('analytics', $current_page_id);
$we_anonymize_our_statistics = get_field('we_anonymize_our_statistics', $current_page_id);
$save = get_field('save', $current_page_id);

?>

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
                <?php if( $have_a_cookie ) {
                    echo $have_a_cookie;
                } else { 
                    pll_e( 'Have a cookie', 'hashmuseum' );
                } ?>
            </h2>
            
            <p>
                <?php if( $we_use_cookies_to_store_data ) {
                    echo $we_use_cookies_to_store_data;
                } else { 
                    pll_e( 'We use cookies to store data and enable important site functionality including analytics and language settings. See our <a href="/en/privacy-policy">privacy policy</a> for more information.', 'hashmuseum' );
                } ?>
            </p>

            <button class="btn secondary_btn black" data-cookie-accept-btn>
                <?php if( $accept ) {
                    echo $accept;
                } else { 
                    pll_e( 'Accept', 'hashmuseum' );
                } ?>
            </button>

            <button class="btn" data-cookie-settings-btn>
                <?php if( $settings ) {
                    echo $settings;
                } else { 
                    pll_e( 'Settings', 'hashmuseum' );
                } ?>
            </button>

        </div>

    </div>    

</article>

<article class="cookie_message settings" data-cookie-settings-message>

    <div class="box">
            
        <form class="text" data-cookie-settings-form>

            <h2>
                <?php if( $cookie_settings ) {
                    echo $cookie_settings;
                } else { 
                    pll_e( 'Cookie settings', 'hashmuseum' );
                } ?>
            </h2>

            <div class="checkbox_wrap">
                <input class="checkbox" type="checkbox" id="functional" name="functional_cookies" value="functional" data-cookie-checkbox checked disabled="disabled">
                <label class="checkbox_label functional" for="functional">
                    <?php if( $functional ) {
                        echo $functional;
                    } else { 
                        pll_e( 'Functional', 'hashmuseum' );
                    } ?>
                </label>
                <p>
                    <?php if( $these_cookies_are_required_for_the_website_to_work ) {
                        echo $these_cookies_are_required_for_the_website_to_work;
                    } else { 
                        pll_e( 'These cookies are required for the website to work so you can’t disable them.', 'hashmuseum' );
                    } ?>
                </p>
            </div>
            
            <div class="checkbox_wrap">
                <input class="checkbox" type="checkbox" id="analytics" name="analytics_cookies" value="analytics" data-cookie-checkbox >
                <label class="checkbox_label" for="analytics">
                    <?php if( $analytics ) {
                        echo $analytics;
                    } else { 
                        pll_e( 'Analytics', 'hashmuseum' );
                    } ?>
                </label>
                <p>
                    <?php if( $we_anonymize_our_statistics ) {
                        echo $we_anonymize_our_statistics;
                    } else { 
                        pll_e( 'We anonymize our statistics and we only use this data to make our website better.', 'hashmuseum' );
                    } ?>
                </p>
            </div>         
          

            <button type="submit" class="btn secondary_btn black" data-cookie-settings-accept-btn>
                <?php if( $save ) {
                    echo $save;
                } else { 
                    pll_e( 'Save', 'hashmuseum' );
                } ?>
            </button>
            
        </form>

        

    </div>    

</article>
