<?php
/* Block Name: Info Block */

// create id attribute for specific styling
$id = 'info-' . $block['id'];

?>

<?php $imageposition = get_field('image_position'); ?>

<?php if ($imageposition === 'left') { ?>

    <article id="<?php echo $id; ?>" class="info">
        
        <div class="image_wrap">

            <?php 
            $images = get_field('image');
            if( $images ): 
                if( count($images) === 1 ) { ?>

                    <?php include('parts/global/single-image.php'); ?>

                <?php } else { ?>

                    <?php include('parts/global/slider.php'); ?>

                <?php } ?>        
                
            <?php endif; ?>

        </div>
        
        <?php include('parts/info/info-text-normal.php'); ?>  

    </article>

<?php } else { ?> 

    <article id="<?php echo $id; ?>" class="info">

        <?php include('parts/info/info-text-normal.php'); ?>  

        <div class="image_wrap">

            <?php 
            $images = get_field('image'); 
            
            if( $images ): 
                if( count($images) === 1 ) { ?>

                    <?php include('parts/global/single-image.php'); ?>

                <?php } else { ?>

                    <?php include('parts/global/slider.php'); ?>

                <?php } ?>        
                
            <?php endif; ?>

            </div>             
                
    </article>

<?php } ?>