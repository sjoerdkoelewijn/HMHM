<?php
/* Block Name: Collection Overview Hero */

// create id attribute for specific styling
$id = 'plan-visit-' . $block['id'];

?>

<?php 
    $styleswitch = get_field('style_switch'); 
?>

<article id="<?php echo $id; ?>" class="location_info">

    <?php

        switch ($styleswitch) {
        case 'normal':
            include('parts/location/normal.php');
            break;
        case 'hero':
            include('parts/location/hero.php');
            break;
        case 'amsterdam':
            include('parts/location/amsterdam.php');
            break;
        case 'barcelona':
            include('parts/location/barcelona.php');
            break;    
        default:
            include('parts/location/normal.php');
        }

    ?>    

</article>