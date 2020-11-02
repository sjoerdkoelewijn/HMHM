<?php /* Ticket modal included in the footer on all pages */ ?>

<div class="ticket_modal" tabindex="-1" role="dialog" aria-hidden="true" data-ticket-modal>

    <div class="modal_inner">

        <div class="weedleaf">
            <?php echo file_get_contents(get_template_directory() . "/images/svg/weedleaf.svg"); ?>
        </div>

        <button class="close" aria-label="<?php echo __( 'Close modal', 'hashmuseum' ) ?>" data-ticket-modal-close>
            <?php echo file_get_contents(get_template_directory() . "/images/svg/closeIcon.svg"); ?>
        </button>		

        <div class="location_info amsterdam">
            <h2 class="location_header">
                <?php pll_e( 'Amsterdam', 'hashmuseum' ) ?>
            </h2>

            <p class="intro_text">
                <?php sk_lang_specific_option('amsterdam_info'); ?>
            </p>

            <a href="<?php pll_e( 'https://tickets.hashmuseum.com/en/tickets', 'hashmuseum' ) ?>" class="btn action_btn black" >
                <?php pll_e( 'Amsterdam tickets', 'hashmuseum' ) ?>
            </a>

            <div class="meta">

                <div class="address">
                    <?php echo file_get_contents(get_template_directory() . "/images/svg/locationIcon.svg"); ?> 
                    <p>
                        <?php the_field('amsterdam_address', 'option'); ?>
                    </p>
                </div>
                
                <div class="phonenumber">
                    <?php echo file_get_contents(get_template_directory() . "/images/svg/phoneIcon.svg"); ?> 
                    <p>
                        <?php the_field('amsterdam_phone_number', 'option'); ?>
                    </p>
                </div>
                
                <div class="openinghours">
                    <?php echo file_get_contents(get_template_directory() . "/images/svg/clockIcon.svg"); ?> 
                    <p>
                        <?php sk_lang_specific_option('amsterdam_opening_hours'); ?>
                    </p>
                </div>

            </div>

        </div>

        <div class="location_info barcelona">
            <h2 class="location_header">
                <?php pll_e( 'Barcelona', 'hashmuseum' ) ?>
            </h2>

            <p class="intro_text">
                <?php sk_lang_specific_option('barcelona_info'); ?>
            </p>

            <a href="<?php pll_e( 'https://tickets.hashmuseum.com/en/barcelona', 'hashmuseum' ) ?>" class="btn action_btn black" >
                <?php pll_e( 'Barcelona tickets', 'hashmuseum' ) ?>
            </a>

            <div class="meta">

                <div class="address">
                    <?php echo file_get_contents(get_template_directory() . "/images/svg/locationIcon.svg"); ?> 
                    <p>
                        <?php the_field('barcelona_address', 'option'); ?>
                    </p>
                </div>
                
                <div class="phonenumber">
                    <?php echo file_get_contents(get_template_directory() . "/images/svg/phoneIcon.svg"); ?> 
                    <p>
                        <?php the_field('barcelona_phone_number', 'option'); ?>
                    </p>
                </div>
                
                <div class="openinghours">
                    <?php echo file_get_contents(get_template_directory() . "/images/svg/clockIcon.svg"); ?> 
                    <p>
                        <?php sk_lang_specific_option('barcelona_opening_hours'); ?>
                    </p>
                </div>

            </div>

        </div>

    </div>			

</div>