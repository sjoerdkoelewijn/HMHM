<?php  if( have_rows('buttons') ): ?> 

    <div class="button_repeater">

        <?php while( have_rows('buttons') ): the_row(); 

            $anchor = get_sub_field('anchor');
            $url = get_sub_field('url');
            
            $ButtonType = get_sub_field('button_style');

            switch ($ButtonType) {
            case 'action': ?>
                
                <a href="<?php echo $url; ?>" class="btn action_btn black" >
                    <?php echo $anchor; ?>
                </a>

                <?php break;
            case 'secondary': ?>
                
                <a href="<?php echo $url; ?>" class="btn secondary_btn black" >
                    <?php echo $anchor; ?>
                </a>

                <?php break;
            case 'ghost': ?>

                <a href="<?php echo $url; ?>" class="btn ghost_btn black" >
                    <?php echo $anchor; ?>
                </a>

                <?php break;

            case 'textlink': ?> 

                <a href="<?php echo $url; ?>" class="read_more_link" >
                    <img loading="lazy" class="icon" alt="icon" src="<?php echo get_theme_file_uri() ?>/images/svg/arrowLeftIcon.svg" alt="Icon">

                    <?php echo $anchor; ?>
                </a>

                <?php break;    
            default: ?>
                
                <a href="<?php echo $url; ?>" class="read_more_link" >
                    <img loading="lazy" class="icon" alt="icon" src="<?php echo get_theme_file_uri() ?>/images/svg/arrowRightIcon.svg" alt="Icon">

                    <?php echo $anchor; ?>
                </a>

            <?php }  

        endwhile; ?>   

    </div>

<?php endif; ?>  