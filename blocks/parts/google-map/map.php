<div class="map_wrap">

    <div id="map" class="map_style"></div>

    <script>
        function initMap() {

        <?php $locations = get_field('locations'); ?>
        <?php $counter = 1; ?>

        <?php if( have_rows('locations') ):?>
            <?php while ( have_rows('locations') ) : the_row(); ?>
                <?php $maplocation = get_sub_field('map'); ?>
                var location_<?php echo $counter; ?> = {lat: <?php echo esc_attr($maplocation['lat']); ?>, lng: <?php echo esc_attr($maplocation['lng']); ?>};
                <?php $counter++; ?>
            <?php endwhile; ?>
        <?php endif; ?>

        <?php $mapcenter = get_field('map_center'); ?>
        var mapCenterLocation = {lat: <?php echo esc_attr($mapcenter['lat']); ?>, lng: <?php echo esc_attr($mapcenter['lng']); ?>};
        
        var map = new google.maps.Map(
            document.getElementById('map'), 
            {zoom: <?php the_field('map_zoom'); ?>, center: mapCenterLocation, mapTypeId: 'satellite'});               
        
        <?php $counter = 1; ?>
        <?php if( have_rows('locations') ):?>
            <?php while ( have_rows('locations') ) : the_row(); ?>
                var marker = new google.maps.Marker({position: location_<?php echo $counter; ?>, map: map, icon: '<?php echo get_template_directory() ?>/images/svg/google-map-pin-<?php echo $counter; ?>.svg'});
                <?php $counter++; ?>
            <?php endwhile; ?>
        <?php endif; ?>        
        }
    </script>
    
    <script defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBsrZ7LxIPSOSmJNzUO8IGV_L5OyZNBxOU&callback=initMap">
    </script>


</div>