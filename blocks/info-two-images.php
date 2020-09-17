<?php
/* Block Name: Info Block */

// create id attribute for specific styling
$id = 'info-two-image' . $block['id'];

?>

    <article id="<?php echo $id; ?>" class="info_two_image gb_block">      
        

        <?php 
        $imageleft = get_field('image_left');
        $imageright = get_field('image_right');
        $mobileimage = get_field('mobile_image');
        $quotetoggle = get_field('quote_toggle');
        $quote = get_field('quote');
        $quoteauthor = get_field('quote_author');
                    
        if ($quotetoggle === 'left_quote'): ?>                

            <div class="quote_wrap">

                <?php include('parts/global/quote.php'); ?>

            </div> 

        <?php else : 

            if( $imageleft ): ?>

            <div class="image_wrap">

                <img loading="lazy" class="image" src="<?php echo esc_url($imageleft['sizes']['large']); ?>" alt="<?php echo $image['alt']; ?>" />

                <?php if($imageleft['caption']) { ?>

                    <p class="caption">
                        <?php echo esc_html($imageleft['caption']); ?></?php>
                    </p>

                <?php } ?>  
            
            </div>    

            <?php endif;

        endif; ?>

        <div class="image_wrap mobile">
        
            <div class="mobile_text">

                <div class="mobile_logo">

                    <?php echo file_get_contents(get_template_directory() . "/images/svg/LogoLarge.svg"); ?>

                </div>

                <h1 class="header">
                    <?php the_field('header'); ?>
                </h1>   

            </div>

            <img loading="lazy" class="image" src="<?php echo esc_url($mobileimage['sizes']['large']); ?>" alt="<?php echo $mobileimage['alt']; ?>" />

            <?php if($mobileimage['caption']) { ?>

                <p class="caption">
                    <?php echo esc_html($mobileimage['caption']); ?></?php>
                </p>

            <?php } ?>  
        
        </div> 
        

        <?php include('parts/info/info-text.php'); ?>


        <?php if ($quotetoggle === 'right_quote'): ?>

            <div class="quote_wrap">

                <?php include('parts/global/quote.php'); ?>

            </div>

        <?php else : 

            if( $imageright ): ?>

            <div class="image_wrap">

                <img loading="lazy" class="image" src="<?php echo esc_url($imageright['sizes']['large']); ?>" alt="<?php echo $image['alt']; ?>" />

                <?php if($imageright['caption']) { ?>

                    <p class="caption">
                        <?php echo esc_html($imageright['caption']); ?></?php>
                    </p>

                <?php } ?>  
            
            </div> 

            <?php endif;

        endif; ?>
        

    </article>