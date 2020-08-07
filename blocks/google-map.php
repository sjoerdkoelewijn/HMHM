<?php 
/* Block Name: Visitor information */
$id = 'google-map-' . $block['id'];
?>

<article id="<?php echo $id; ?>" class="google_map">

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
                    var marker = new google.maps.Marker({position: location_<?php echo $counter; ?>, map: map, icon: '<?php echo get_template_directory_uri() ?>/images/svg/google-map-pin-<?php echo $counter; ?>.svg'});
                    <?php $counter++; ?>
                <?php endwhile; ?>
            <?php endif; ?>        
            }
        </script>
        
        <script defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBsrZ7LxIPSOSmJNzUO8IGV_L5OyZNBxOU&callback=initMap">
        </script>


    </div>

    <div class="text_wrap">

        <h3 class="subheader">

            <?php the_field('subheader'); ?>

        </h3>

        <h2 class="header">

            <?php the_field('header'); ?>

        </h2>        
      
        
        <?php $counter = 1; ?>

        <?php if( have_rows('locations') ):?>

            <ul class="locations">

            <?php while ( have_rows('locations') ) : the_row(); ?>
                
                <li class="location">

                    <div class="icon">

                        <?php echo file_get_contents(get_template_directory_uri() . "/images/svg/google-map-pin-$counter.svg"); ?>

                        <?php $counter++; ?>

                    </div>
                    
                    <div class="content">

                        <p class="label">
                            <?php the_sub_field('label'); ?>
                        </p>

                        <p class="text">
                            <?php the_sub_field('text'); ?>
                        </p>
                        
                        <?php $linktext = get_sub_field('link_text'); ?>
                        <?php $url = get_sub_field('url'); ?>

                        <?php if( $linktext ): ?>
                            <div class="link">
                                <?php echo file_get_contents(get_template_directory_uri() . "/images/svg/arrowRightIcon.svg"); ?>
                                <a class="directions_url" href="<?php echo $url ?>"><?php echo $linktext ?></a>
                            </div>
                        <?php endif; ?>

                    </div>    

                </li>

            <?php endwhile; ?>

        </ul>

        <?php endif; ?>        

    </div>

</article>