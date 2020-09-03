<?php
/* Block Name: Info Block */

// create id attribute for specific styling
$id = 'home-about' . $block['id'];

?>

<?php $image = get_field('image'); ?>
<?php $mobileimage = get_field('mobile_image'); ?>  

<article id="<?php echo $id; ?>" class="home_about gb_block">      
    
    <div class="section text_wrap">

        <div class="visitor_number" data-visitor-count data-visitor-per-day="<?php the_field('visitors_per_day', 'option'); ?>" data-visitor-start-count="<?php the_field('amount_of_visitors', 'option'); ?>" data-visitor-count-date="<?php the_field('visitor_count_date', 'option'); ?>">
            <?php the_field('amount_of_visitors', 'option'); ?>  
        </div>
    
        <h2 class="header">
            <?php the_field('header'); ?>
        </h2>    

        <p class="description">
            <?php the_field('description'); ?>
        </p>

        <?php include('parts/global/button-repeater.php'); ?>

        <div class="weedleaf">
            <?php echo file_get_contents(get_template_directory_uri() . "/images/svg/weedleaf-large.svg"); ?>
        </div>
        
    </div>
    
    <div class="image_wrap" >

        <img loading="lazy" class="image" src="<?php echo esc_url($image['sizes']['medium']); ?>" alt="<?php echo $image['alt']; ?>" />

        <?php if($image['caption']) { ?>

            <p class="caption">
                <?php echo esc_html($image['caption']); ?></?php>
            </p>

        <?php } ?>  
    
    </div>

    <div class="image_wrap tablet" >

        <img loading="lazy" class="image" src="<?php echo esc_url($mobileimage['sizes']['medium']); ?>" alt="<?php echo $mobileimage['alt']; ?>" />

        <?php if($mobileimage['caption']) { ?>

            <p class="caption">
                <?php echo esc_html($mobileimage['caption']); ?></?php>
            </p>

        <?php } ?>  
    
    </div>

    <div class="section locations">

            <div class="header_wrap">

                <div class="ampersand">
                    <?php echo file_get_contents(get_template_directory_uri() . "/images/svg/ampersand.svg"); ?> 
                </div>

                <div class="text">
                    <?php pll_e( 'Amsterdam', 'hashmuseum' ) ?>
                    <?php pll_e( 'Barcelona', 'hashmuseum' ) ?>
                </div>

            </div>

            <div class="meta" data-location-tabs>

                <div class="tabs_header">

                    <button class="tab_title">
                        <?php echo __( 'Amsterdam', 'hashmuseum' ) ?>
                    </button>

                    <button class="tab_title">
                        <?php echo __( 'Barcelona', 'hashmuseum' ) ?>
                    </button>

                </div>

                <div class="address_wrap amsterdam tab_content">                                        

                    <div class="header">
                        <?php pll_e( 'Amsterdam', 'hashmuseum' ) ?>
                    </div>
                    
                    <div class="address">
                        <?php echo file_get_contents(get_template_directory_uri() . "/images/svg/locationIcon.svg"); ?> 
                        <p>
                            <?php the_field('amsterdam_address', 'option'); ?>
                        </p>
                    </div>
                    
                    <div class="phonenumber">
                        <?php echo file_get_contents(get_template_directory_uri() . "/images/svg/phoneIcon.svg"); ?> 
                        <p>
                            <?php the_field('amsterdam_phone_number', 'option'); ?>
                        </p>
                    </div>

                    <div class="openinghours">
                        <?php echo file_get_contents(get_template_directory_uri() . "/images/svg/clockIcon.svg"); ?> 
                        <p>
                            <?php sk_lang_specific_option('amsterdam_opening_hours'); ?>
                        </p>
                    </div>
                    
                    <a href="<?php pll_e( '/en/amsterdam/', 'hashmuseum' ) ?>" class="moreinfo">
                        <?php echo file_get_contents(get_template_directory_uri() . "/images/svg/arrowRightIcon.svg"); ?> 
                        <p>
                            <?php pll_e( 'More information', 'hashmuseum' ) ?>
                        </p>
                    </a>

                    <nav class="social amsterdam">
                        <?php
                        wp_nav_menu(array(
                            'theme_location'  => 'social-menu-ams',
                            'fallback_cb'     => false,
                            'container'       => false,
                            'items_wrap'      => '%3$s',
                            'walker'          => new Social_Menu_Walker()
                        ));
                        ?>
                    </nav>

                </div>

                <div class="address_wrap barcelona tab_content">

                    <div class="header">
                        <?php pll_e( 'Barcelona', 'hashmuseum' ) ?>
                    </div>

                    <div class="address">
                        <?php echo file_get_contents(get_template_directory_uri() . "/images/svg/locationIcon.svg"); ?> 
                        <p>
                            <?php the_field('barcelona_address', 'option'); ?>
                        </p>
                    </div>
                    
                    <div class="phonenumber">
                        <?php echo file_get_contents(get_template_directory_uri() . "/images/svg/phoneIcon.svg"); ?> 
                        <p>
                            <?php the_field('barcelona_phone_number', 'option'); ?>
                        </p>
                    </div>
                    
                    <div class="openinghours">
                        <?php echo file_get_contents(get_template_directory_uri() . "/images/svg/clockIcon.svg"); ?> 
                        <p>
                            <?php sk_lang_specific_option('barcelona_opening_hours'); ?>
                        </p>
                    </div>

                    <a href="<?php pll_e( '/en/barcelona/', 'hashmuseum' ) ?>" class="moreinfo">
                        <?php echo file_get_contents(get_template_directory_uri() . "/images/svg/arrowRightIcon.svg"); ?> 
                        <p>
                            <?php pll_e( 'More information', 'hashmuseum' ) ?>
                        </p>
                    </a>

                    <nav class="social barcelona">
                        <?php
                        wp_nav_menu(array(
                            'theme_location'  => 'social-menu-bcn',
                            'fallback_cb'     => false,
                            'container'       => false,
                            'items_wrap'      => '%3$s',
                            'walker'          => new Social_Menu_Walker()
                        ));
                        ?>
                    </nav>

                </div>

            </div>
                
        </div>

    </div>

</article>