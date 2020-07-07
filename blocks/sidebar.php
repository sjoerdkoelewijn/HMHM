<?php
/* Block Name: Image Sidebar */

// create id attribute for specific styling
$id = 'image-sidebar-' . $block['id'];

?>

    <article id="<?php echo $id; ?>" class="image_sidebar">
    
        <?php 
        
            $quotetoggle = get_field('quote_toggle');            
            $quote = get_field('quote');
            $quoteauthor = get_field('quote_author');
        ?>
        
        <?php if ($quotetoggle === 'top_quote'): ?>

            <div class="quote">
            
                <p class="quote_text <?php if(mb_strlen($quote) < '35'): echo 'large'; endif; ?> <?php if(mb_strlen($quote) < '70'): echo 'medium'; endif; ?>">
                    “<?php echo $quote; ?>” 
                </p>

                <?php if( $quoteauthor ): ?>

                    <p class="quote_author">
                        <?php echo $quoteauthor; ?>
                    </p>

                <?php endif; ?>
        
            </div>

        <?php endif; ?>   

        <?php 
        $images = get_field('images');
        
        if( $images ): 

                foreach( $images as $image ): ?>

                    <div class="image_wrap">
                    
                        <img loading="lazy" class="image" src="<?php echo esc_url($image['sizes']['large']); ?>" alt="<?php echo $image['alt']; ?>" />
                        
                        <?php if($image['caption']) { ?>

                            <p class="caption">
                                <?php echo esc_html($image['caption']); ?>
                            </p>

                        <?php } ?>
                    
                    </div>    
                    
                <?php endforeach; ?>
            
        <?php endif; ?> 
        
        <?php if ($quotetoggle === 'bottom_quote'): ?>

            <div class="quote">
            
                <p class="quote_text">
                    “<?php echo $quote; ?>” 
                </p>

                <p class="quote_author">
                    - <?php echo $quoteauthor; ?>
                </p>
        
            </div>

        <?php endif; ?>
                
    </article>