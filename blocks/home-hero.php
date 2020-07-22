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

	<div class="background">
		<div class="background__image active" id="image_1"></div>
    
		<div class="background__image" id="image_2"></div>

		<div class="background__image" id="image_3"></div>

	</div>

	<div class="foreground">

		<div class="foreground__text active" id="item_1">
			<h5 class="foreground__text_subtitle foreground__text_title">Smoking Farmers</h5>
            <h5 class="foreground__text_title subtitleslider">by Hendrick Sorgh, ca. 1650</h5>
			<p class="foreground__text_excerpt LM">Learn more about </p>
			<p class="foreground__text_excerpt LMS">Cannabis history in Europe</p>
		</div>
		
		<div class="foreground__text" id="item_2">
			<p class="foreground__text_excerpt LMR"> Temporary Exhibition </p>
			<p class="foreground__text_excerpt LMS"> Puff Puff Pass! </p>
			<h5 class="foreground__text_subtitle foreground__text_title">Browse through the ‘smoky’ adventures of various cannabis stars.</h5>
		</div>
		
		<div class="foreground__text" id="item_3">
			<h5 class="foreground__text_subtitle foreground__text_title">Medicinal Cannabis </h5>
            <h5 class="foreground__text_title subtitleslider">in the 19th century </h5>
			<p class="foreground__text_excerpt LM"> Learn more about</p>
			<p class="foreground__text_excerpt LMS"> Medicinal cannabis in the past and present </p>
		</div>

	</div>
</div>



                
</article>