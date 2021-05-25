<?php /* Part of the hero */ ?>

<div class="text_wrap expo">

    <?php 
        if(function_exists('sk_breadcrumbs')): 
            echo sk_breadcrumbs();
        endif;
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
        $ticket_url = get_field('ticket_url'); 
        

    ?>

    <?php if( $end_date_string ) { ?>

        <?php if( $end_date_string > $today ) { ?>

            <?php if($free === 'paid') { ?>

                <a class="action_btn black btn" href="<?php echo $ticket_url; ?>">
                    <?php pll_e( 'Get your ticket', 'hashmuseum' ) ?>
                </a>

            <?php } ?>
            
            <div class="date">

                <img loading="lazy" class="icon" alt="icon" src="<?php echo get_theme_file_uri() ?>/images/svg/calendarIcon.svg" alt="Icon"> 
                <p>
                    <?php pll_e( 'Ends on', 'hashmuseum' ) ?>
                    <?php echo $end_date->format('j F Y'); ?>
                </p>   
            
            </div>
                
            <div class="opening_hours">
            
                <img loading="lazy" class="icon" alt="icon" src="<?php echo get_theme_file_uri() ?>/images/svg/clockIcon.svg" alt="Icon"> 

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

                <img loading="lazy" class="icon" alt="icon" src="<?php echo get_theme_file_uri() ?>/images/svg/calendarIcon.svg" alt="Icon">
 
                <p>
                    <?php pll_e( 'Ended on', 'hashmuseum' ) ?>
                    <?php echo $end_date->format('j F Y'); ?> 
                </p>  

            </div>

        <?php } ?>

    <?php } ?> 
    
    <?php if( $location ): ?>

        <div class="location">
            <img loading="lazy" class="icon" alt="icon" src="<?php echo get_theme_file_uri() ?>/images/svg/pinIcon.svg" alt="Icon">  
            <p>
                <?php echo $location; ?>
            </p>
        </div>
        
    <?php endif; ?>

    <?php if($free === 'free' && $end_date_string > $today ) { ?>

        <div class="free_entry">
            <img loading="lazy" class="icon" alt="icon" src="<?php echo get_theme_file_uri() ?>/images/svg/euroIcon.svg" alt="Icon">  
            <p>
                <?php pll_e( 'Free entry', 'hashmuseum' ) ?>
            </p>
        </div>

    <?php } ?>

    <div class="buttons">

        <button class="read_more_link" data-read-more-btn>
            <img loading="lazy" class="icon" alt="icon" src="<?php echo get_theme_file_uri() ?>/images/svg/arrowRightIcon.svg" alt="Icon">
            <?php pll_e( 'More information', 'hashmuseum' ) ?>
        </button>
        
    </div>    

</div>