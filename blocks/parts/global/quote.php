<?php /* Quote */ ?>

<div class="quote">

    <img loading="lazy" class="icon" alt="icon" src="<?php echo get_theme_file_uri() ?>/images/svg/weedleaf-large.svg" alt="Icon">

                
    <p class="quote_text <?php if(mb_strlen($quote) < '35'): echo 'large'; endif; ?> <?php if(mb_strlen($quote) < '70'): echo 'medium'; endif; ?>">
        <?php echo $quote; ?> 
    </p>

    <?php if( $quoteauthor ): ?>

        <p class="quote_author">
            <?php echo $quoteauthor; ?> 
        </p>

    <?php endif; ?>

</div>