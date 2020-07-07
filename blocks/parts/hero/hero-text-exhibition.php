<?php /* Part of the hero */ ?>

<div class="text_wrap expo">

    <?php
        if ( function_exists('yoast_breadcrumb') ) {
            yoast_breadcrumb( '<p class="breadcrumbs">','</p>' );
        }
    ?>

    <h1 class="header">
        <?php echo the_title(); ?>
    </h1>    

    <h2 class="subheader">
        <?php the_field('subheader'); ?>
    </h2>

    <?php 
        $today = date('Ymd');
        
        $end_date_string = get_field('end_date');
        $end_date = DateTime::createFromFormat('Ymd', $end_date_string);

        $location = get_field('location');
        $free = get_field('free_entry');
        $opening_hours_toggle = get_field('opening_hours_toggle'); 
        $exhibition_specific_opening_hours = get_field('exhibition_specific_opening_hours'); 

        

    ?>

    <?php if( $end_date_string ) { ?>

        <?php if( $end_date_string > $today ) { ?>

            <?php if($free === 'paid') { ?>

                <a class="action_btn black btn" href="<?php sk_get_ticket_url($location) ?>">
                    <?php _e( 'Get your ticket', 'hashmuseum' ) ?>
                </a>

            <?php } ?>
            
            <div class="date">

                <?php echo file_get_contents(get_template_directory_uri() . "/images/svg/calendarIcon.svg"); ?> 
                <p>
                    <?php _e( 'Ends on', 'hashmuseum' ) ?>
                    <?php echo $end_date->format('j F Y'); ?>
                </p>   
            
            </div>
                
            <div class="opening_hours">
            
                <?php echo file_get_contents(get_template_directory_uri() . "/images/svg/clockIcon.svg"); ?> 

                <?php if( $opening_hours_toggle === 'same' ) { ?>

                    <?php if( $location === 'Amsterdam' ) { ?>

                        <p>
                            <?php sk_lang_specific_option('amsterdam_opening_hours'); ?>
                        </p>

                    <?php } else { ?>
                        
                        <p>
                            <?php sk_lang_specific_option('barcelona_opening_hours'); ?>
                        </p>
                            
                    <?php } ?>

                <?php } else { ?>

                    <p>
                        <?php echo $exhibition_specific_opening_hours; ?>
                    </p>

                <?php } ?>

            </div>                

        <?php } else { ?>
            <!-- No need to display the additional info for a finished expo -->

            <div class="date">

                <?php echo file_get_contents(get_template_directory_uri() . "/images/svg/calendarIcon.svg"); ?> 
                <p>
                    <?php _e( 'Ended on', 'hashmuseum' ) ?>
                    <?php echo $end_date->format('j F Y'); ?>
                </p>  

            </div>

        <?php } ?>

    <?php } ?> 
    
    <?php if( $location ): ?>

        <div class="location">
            <?php echo file_get_contents(get_template_directory_uri() . "/images/svg/pinIcon.svg"); ?>  
            <p>
                <?php echo $location; ?>
            </p>
        </div>
        
    <?php endif; ?>

    <?php if($free === 'free' && $end_date_string > $today ) { ?>

        <div class="free_entry">
            <?php echo file_get_contents(get_template_directory_uri() . "/images/svg/euroIcon.svg"); ?>  
            <p>
                <?php _e( 'Free entry', 'hashmuseum' ) ?>
            </p>
        </div>

    <?php } ?>

    <button class="read_more_link" data-read-more-btn>
        <?php echo file_get_contents(get_template_directory_uri() . "/images/svg/arrowRightIcon.svg"); ?>
        <?php _e( 'More information', 'hashmuseum' ) ?>
    </button>

</div>