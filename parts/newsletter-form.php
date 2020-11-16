<?php ?>

<form data-form-validate action="https://hashmuseum.us6.list-manage.com/subscribe/post?u=6c0dac20c9&amp;id=859b140093" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" target="_blank" novalidate>
   
    <div class="hide_success" data-hide-form>

        <div class="form_inner">

            <div class="mc-field-group input_wrap">
                <label for="mce-FNAME">
                    <?php pll_e( 'Your name', 'hashmuseum' ) ?>
                </label>
                <input type="text" value="" placeholder="<?php pll_e( 'Mary', 'hashmuseum' ) ?>" name="FNAME" class="required name" id="mce-FNAME" autocorrect="off" spellcheck="false" required>
            </div>

            <div class="mc-field-group input_wrap">
                <label for="mce-EMAIL">
                    <?php pll_e( 'Email address', 'hashmuseum' ) ?>
                </label>
                <input type="email" value="" placeholder="<?php pll_e( 'mary@jane.com', 'hashmuseum' ) ?>" name="EMAIL" class="required email" id="mce-EMAIL" autocorrect="off" spellcheck="false" required>
            </div>

        </div>

        <div class="mc-field-group input-group gdpr_check">
            <input type="checkbox" value="1" class="required gdpr" name="group[52897][1]" id="mce-gdpr" required>
            <label for="mce-gdpr">
                <?php pll_e( 'Yes, I have read and agree to the <a href="/en/privacy-policy">Privacy Policy</a>.', 'hashmuseum' ) ?>
            </label>

        </div>

        <div style="position: absolute; left: -99999px;" aria-hidden="true">
            <input type="text" name="b_6c0dac20c9_859b140093" tabindex="-1" value="">
        </div>


        <button type="submit" name="subscribe" id="mc-embedded-subscribe" class="btn action_btn black">
            <?php pll_e( 'Sign me up!', 'hashmuseum' ) ?>
        </button>
        
    </div>
    
    <div class="status_message" data-mc-status>
    </div>
        

</form>