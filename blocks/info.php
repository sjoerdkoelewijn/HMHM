<?php
/* Block Name: Info Block */

// create id attribute for specific styling
$id = 'info-' . $block['id'];

?>

<?php $imageposition = get_field('image_position'); ?>

<?php if ($imageposition === 'left') { ?>

    <article id="<?php echo $id; ?>" class="info left gb_block">
        
        <?php include('parts/info/info-image.php'); ?> 
        
        <?php include('parts/info/info-text.php'); ?>  

    </article>

<?php } else { ?> 

    <article id="<?php echo $id; ?>" class="info right gb_block">

        <div class="mobile">    
            <?php include('parts/info/info-image.php'); ?>
        </div>

        <?php include('parts/info/info-text.php'); ?>  

        <?php include('parts/info/info-image.php'); ?>              
                
    </article>

<?php } ?>