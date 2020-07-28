<?php
/* Block Name: Info Block */

// create id attribute for specific styling
$id = 'info-two-image' . $block['id'];

?>

    <article id="<?php echo $id; ?>" class="info_two_image">
        
        

            <?php 
            $imageleft = get_field('image_left');
            $imageright = get_field('image_right');
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

        <?php include('parts/info/info-text-normal.php'); ?>

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