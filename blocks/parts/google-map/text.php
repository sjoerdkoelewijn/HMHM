<div class="text_wrap">

    <h3 class="subheader">

        <?php the_field('subheader'); ?>

    </h3>

    <h2 class="header">

        <?php the_field('header'); ?>

    </h2>        
    
    
    <?php $counter = 1; ?>

    <?php if( have_rows('locations') ):?>

        <ul class="locations">

        <?php while ( have_rows('locations') ) : the_row(); ?>
            
            <li class="location">

                <div class="icon">

                    <?php echo file_get_contents(get_theme_file_path() . "/images/svg/google-map-pin-$counter.svg"); ?>

                    <?php $counter++; ?>

                </div>
                
                <div class="content">

                    <p class="label">
                        <?php the_sub_field('label'); ?>
                    </p>

                    <p class="text">
                        <?php the_sub_field('text'); ?>
                    </p>
                    
                    <?php $linktext = get_sub_field('link_text'); ?>
                    <?php $url = get_sub_field('url'); ?>

                    <?php if( $linktext ): ?>
                        <div class="link">
                            <?php echo file_get_contents(get_theme_file_path() . "/images/svg/arrowRightIcon.svg"); ?>
                            <a class="directions_url" href="<?php echo $url ?>"><?php echo $linktext ?></a>
                        </div>
                    <?php endif; ?>

                </div>    

            </li>

        <?php endwhile; ?>

    </ul>

    <?php endif; ?>        

</div>