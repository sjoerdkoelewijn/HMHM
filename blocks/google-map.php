<?php 
/* Block Name: Visitor information */
$id = 'google-map-' . $block['id'];
?>

<article id="<?php echo $id; ?>" class="google_map">

    <?php

        $MapLocationSwitch = get_field('map_location_switch'); 

        switch ($MapLocationSwitch) {
        case 'left':
            include('parts/google-map/map.php');
            include('parts/google-map/text.php');
            break;
        case 'right':
            include('parts/google-map/text.php');
            include('parts/google-map/map.php');
            break;    
        default:
            include('parts/google-map/map.php');
            include('parts/google-map/text.php');
        }

    ?>        

</article>