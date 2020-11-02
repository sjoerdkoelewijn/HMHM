<?php 
/* Block Name: Visitor information */
$id = 'google-map-' . $block['id'];
$MapLocationSwitch = get_field('map_location_switch'); 
?>

<article id="<?php echo $id; ?> map" class="google_map gb_block <?php echo $MapLocationSwitch ?>">
    
    <?php

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