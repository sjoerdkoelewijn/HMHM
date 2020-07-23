<?php
/* Block Name: Home Hero */

// create id attribute for specific styling
$id = 'home-hero-' . $block['id']; ?>

<article id="<?php echo $id; ?>" class="home_hero">

    <div class="sidebar">

        <h1 class="header">
            <?php the_field('header'); ?>
        </h1>    

        <h2 class="subheader">
            <?php the_field('subheader'); ?>
        </h2>

        <nav id="home-navigation" class="home_navigation" role="navigation">
            <?php
            wp_nav_menu(array(
                'theme_location'  => 'home-navigation',
                'fallback_cb'     => false,
                'container'       => false,
                'items_wrap'      => '<ul id="%1$s">%3$s</ul>',
            ));
            ?>
        </nav>

        <?php if( have_rows('buttons') ): 

            while( have_rows('buttons') ): the_row(); 

                $anchor = get_sub_field('anchor');
                $url = get_sub_field('url');
                
                $ButtonType = get_sub_field('button_style');

                switch ($ButtonType) {
                case 'action': ?>
                    
                    <a href="<?php echo $url; ?>" class="btn action_btn white" >
                        <?php echo $anchor; ?>
                    </a>

                    <?php break;
                case 'secondary': ?>
                    
                    <a href="<?php echo $url; ?>" class="btn secondary_btn white" >
                        <?php echo $anchor; ?>
                    </a>

                    <?php break;
                case 'ghost': ?>

                    <a href="<?php echo $url; ?>" class="btn ghost_btn white" >
                        <?php echo $anchor; ?>
                    </a>

                    <?php break;
                default: ?>
                    
                    <a href="<?php echo $url; ?>" class="read_more_link" >
                        <?php echo file_get_contents(get_template_directory_uri() . "/images/svg/arrowRightIcon.svg"); ?>
                        <?php echo $anchor; ?>
                    </a>

                <?php }  

            endwhile;    

        endif; ?>     

    </div>

    <div class="slider_wrap">

        <?php $slides = get_field('slides'); ?>

        <?php if( have_rows('slides') ): ?>

            <?php $i = 1; ?> 

            <div class="background">

                <?php while( have_rows('slides') ): the_row(); ?>

                    <?php if( get_row_layout() == 'theme' ): ?>

                        <?php $image = get_sub_field('image'); ?>

                        <div id="image_<?php echo $i ?>" class="bg_image <?php if($i === 1) {echo 'active';} ?>">

                            <img loading="lazy" class="image" src="<?php echo esc_url($image['sizes']['large']); ?>" alt="<?php echo $image['alt']; ?>" />

                        </div>

                    <?php elseif( get_row_layout() == 'exhibition' ): ?>

                        <?php $image = get_sub_field('image'); ?>

                        <div id="image_<?php echo $i ?>" class="bg_image <?php if($i === 1) {echo 'active';} ?>">

                            <img loading="lazy" class="image" src="<?php echo esc_url($image['sizes']['large']); ?>" alt="<?php echo $image['alt']; ?>" />

                        </div>

                    <?php elseif( get_row_layout() == 'knowledge' ): ?>

                        <?php $image = get_sub_field('image'); ?>

                        <div id="image_<?php echo $i ?>" class="bg_image <?php if($i === 1) {echo 'active';} ?>">

                            <img loading="lazy" class="image" src="<?php echo esc_url($image['sizes']['large']); ?>" alt="<?php echo $image['alt']; ?>" />

                        </div>
                    
                    <?php endif; ?>

            <?php $i++; ?>

                <?php endwhile; ?>                

            </div>

            <?php $i = 1; ?> 

            <div class="foreground">

                <?php while( have_rows('slides') ): the_row(); ?>

                <?php if( get_row_layout() == 'theme' ): ?>

                    <div class="text_wrap <?php if($i === 1) {echo 'active';} ?>" id="item_<?php echo $i ?>">
                        
                        <div class="item_meta">

                            <h3>
                                <?php the_sub_field('collection_item_header'); ?>
                            </h3>

                            <p>
                                <?php the_sub_field('collection_item_subheader'); ?>
                            </p>        

                        </div>

                        <div class="text">

                            <p class="subheader">
                                <?php pll_e( 'Read more about', 'hashmuseum' ) ?>
                            </p>
                        
                            <h2 class="header">
                                <?php the_sub_field('header'); ?>
                            </h2>

                        </div>
                        
                        <a href="<?php the_sub_field('url'); ?>" class="read_more_link">
                            <?php echo file_get_contents(get_template_directory_uri() . "/images/svg/arrowRightIcon.svg"); ?>
                            <?php _e( 'The Collection', 'hashmuseum' ) ?>
                        </a>
                    </div>

                <?php elseif( get_row_layout() == 'exhibition' ): ?>

                    <div class="text_wrap expo <?php if($i === 1) {echo 'active';} ?>" id="item_<?php echo $i ?>">
                    
                        <p class="subheader action">
                            <?php the_sub_field('subheader'); ?>
                        </p>
                    
                        <h2 class="header">
                            <?php the_sub_field('header'); ?>
                        </h2>
                        
                        <p class="tagline">
                            <?php the_sub_field('tagline'); ?>
                        </p>

                        <a href="<?php the_sub_field('url'); ?>" class="read_more_link">
                            <?php echo file_get_contents(get_template_directory_uri() . "/images/svg/arrowRightIcon.svg"); ?>
                            <?php the_sub_field('cta'); ?>
                        </a>
                    
                    </div>

                <?php elseif( get_row_layout() == 'knowledge' ): ?>

                    <div class="text_wrap <?php if($i === 1) {echo 'active';} ?>" id="item_<?php echo $i ?>">

                        <div class="item_meta">

                            <h3>
                                <?php the_sub_field('knowledge_header'); ?>
                            </h3>

                            <p>
                                <?php the_sub_field('knowledge_subheader'); ?>
                            </p>        

                        </div>

                        <div class="text">
                        
                            <p class="subheader">
                                <?php pll_e( 'Read more about', 'hashmuseum' ) ?>
                            </p>
                        
                            <h2 class="header">
                                <?php the_sub_field('header'); ?>
                            </h2>   

                        </div>
                        
                        <a href="<?php the_sub_field('url'); ?>" class="read_more_link">
                            <?php echo file_get_contents(get_template_directory_uri() . "/images/svg/arrowRightIcon.svg"); ?>
                            <?php _e( 'Cannabis Knowledge', 'hashmuseum' ) ?>
                        </a>   
                    </div>

                <?php endif; ?>

            <?php $i++; ?>

                <?php endwhile; ?>  
                
            </div>    

        <?php endif; ?>

    </div>
                
</article>