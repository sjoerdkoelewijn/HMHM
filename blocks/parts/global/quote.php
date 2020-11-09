<?php /* Quote */ ?>

<div class="quote">

    <?php echo file_get_contents(get_theme_file_path() . "/images/svg/weedleaf-large.svg"); ?>
                
    <p class="quote_text <?php if(mb_strlen($quote) < '35'): echo 'large'; endif; ?> <?php if(mb_strlen($quote) < '70'): echo 'medium'; endif; ?>">
        <?php echo $quote; ?> 
    </p>

    <?php if( $quoteauthor ): ?>

        <p class="quote_author">
            <?php echo $quoteauthor; ?>
        </p>

    <?php endif; ?>

</div>