<?php /* Ticket modal included in the footer on all pages */ 

$current_page_id = get_the_ID();

$amsterdam_text = get_field('amsterdam_text', $current_page_id);
$barcelona_text = get_field('barcelona_text', $current_page_id);
$amsterdam = get_field('amsterdam', $current_page_id);
$barcelona = get_field('barcelona', $current_page_id);  
$genericimage = get_field('generic_image', $current_page_id);

$buy_tickets = get_field('buy_tickets', $current_page_id); 

$barcelona_opening_hours = get_field('barcelona_opening_hours', $current_page_id);
$amsterdam_opening_hours = get_field('amsterdam_opening_hours', $current_page_id); 

?>

<div class="ticket_modal" tabindex="-1" role="dialog" aria-hidden="true" data-ticket-modal>

    <div class="modal_inner">

        <div class="weedleaf">
            <img loading="lazy" class="icon" src="<?php echo get_theme_file_uri() ?>/images/svg/weedleaf.svg" alt="Icon">

        </div>

        <button class="close" aria-label="<?php pll_e( 'Close modal', 'hashmuseum' ) ?>" data-ticket-modal-close>
            <img loading="lazy" class="icon" src="<?php echo get_theme_file_uri() ?>/images/svg/closeIcon.svg" alt="Icon">
        </button>		

        <div class="location_info amsterdam">
            <h2 class="location_header">
                <?php if( $amsterdam ) {
                    echo $amsterdam;
                } else { 
                    pll_e( 'Amsterdam', 'hashmuseum' );
                } ?>
            </h2>

            <p class="intro_text">
                <?php if( $amsterdam_text ) {
                    echo $amsterdam_text;
                } else { 
                    sk_lang_specific_option('amsterdam_info');
                } ?> 
            </p>

            <a href="<?php pll_e( 'https://tickets.hashmuseum.com/en/tickets', 'hashmuseum' ) ?>" class="btn action_btn black" >
                <?php if( $buy_tickets ) {
                    echo $buy_tickets;
                } else { 
                    pll_e( 'Amsterdam tickets', 'hashmuseum' );
                } ?> 
            </a>

            <div class="meta">

                <div class="address">
                    <img loading="lazy" class="icon" src="<?php echo get_theme_file_uri() ?>/images/svg/locationIcon.svg" alt="Icon">

                    <p>
                        <?php the_field('amsterdam_address', 'option'); ?>
                    </p>
                </div>
                
                <div class="phonenumber">
                    <img loading="lazy" class="icon" src="<?php echo get_theme_file_uri() ?>/images/svg/phoneIcon.svg" alt="Icon">

                    <p>
                        <?php the_field('amsterdam_phone_number', 'option'); ?>
                    </p>
                </div>
                
                <div class="openinghours"> 
                    <img loading="lazy" class="icon" src="<?php echo get_theme_file_uri() ?>/images/svg/clockIcon.svg" alt="Icon">

                    <p>
                        <?php if( $amsterdam_opening_hours ) {
                            echo $amsterdam_opening_hours;
                        } else { 
                            sk_lang_specific_option('amsterdam_opening_hours');
                        } ?>
                    </p>
                </div>

            </div>

        </div>

        <div class="location_info barcelona">
            <h2 class="location_header">
                <?php if( $barcelona ) {
                    echo $barcelona;
                } else { 
                    pll_e( 'Barcelona', 'hashmuseum' );
                } ?>
            </h2>

            <p class="intro_text">
                <?php if( $barcelona_text ) {
                    echo $barcelona_text;
                } else { 
                    sk_lang_specific_option('barcelona_info');
                } ?> 
            </p>

            <a href="<?php pll_e( 'https://tickets.hashmuseum.com/en/barcelona', 'hashmuseum' ) ?>" class="btn action_btn black" >
                <?php if( $buy_tickets ) {
                    echo $buy_tickets;
                } else { 
                    pll_e( 'Barcelona tickets', 'hashmuseum' );
                } ?> 
            </a>

            <div class="meta">

                <div class="address">
                    <img loading="lazy" class="icon" src="<?php echo get_theme_file_uri() ?>/images/svg/locationIcon.svg" alt="Icon">

                    <p>
                        <?php the_field('barcelona_address', 'option'); ?>
                    </p>

                </div>
                
                <div class="phonenumber">
                    <img loading="lazy" class="icon" src="<?php echo get_theme_file_uri() ?>/images/svg/phoneIcon.svg" alt="Icon">

                    <p>
                        <?php the_field('barcelona_phone_number', 'option'); ?>
                    </p>

                </div>
                
                <div class="openinghours">
                    <img loading="lazy" class="icon" src="<?php echo get_theme_file_uri() ?>/images/svg/clockIcon.svg" alt="Icon">

                    <p>
                        <?php if( $barcelona_opening_hours ) {
                            echo $barcelona_opening_hours;
                        } else { 
                            sk_lang_specific_option('barcelona_opening_hours');
                        } ?>
                    </p>

                </div>

            </div>

        </div>

    </div>			

</div>