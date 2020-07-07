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
        $today = new DateTime();
        
        $end_date_string = get_field('end_date');
        $end_date = DateTime::createFromFormat('Ymd', $end_date_string);

        $location = get_field('location');
        $opening_hours_toggle = get_field('opening_hours_toggle'); 
        $exhibition_specific_opening_hours = get_field('exhibition_specific_opening_hours'); 

        

    ?>

    <?php if( $end_date_string < $today ) { ?>

        <a class="action_btn black btn" href="<?php sk_get_ticket_url($location) ?>">
            <?php _e( 'Get your ticket', 'hashmuseum' ) ?>
        </a>

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
                        Default Amsterdam Opening hours
                    </p>

                <?php } else { ?>
                    
                    <p>
                        Default Barcelona Opening hours
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
                <?php echo $end_date; ?>
            </p>  

        </div>

    <?php } ?>
    
    <?php if( $location ): ?>

        <div class="location">
            <?php echo file_get_contents(get_template_directory_uri() . "/images/svg/pinIcon.svg"); ?>  
            <p class="quote_author">
                <?php echo $location; ?>
            </p>
        </div>
        
    <?php endif; ?>

    <button class="read_more_link" data-read-more-btn>
        <?php echo file_get_contents(get_template_directory_uri() . "/images/svg/arrowRightIcon.svg"); ?>
        <?php _e( 'More information', 'hashmuseum' ) ?>
    </button>

</div>