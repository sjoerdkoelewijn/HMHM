<?php
/* Block Name: Visitor information */

// create id attribute for specific styling
$id = 'visitor-information-' . $block['id'];

?>

<article id="<?php echo $id; ?>" class="visitor_information gb_block">

    <div class="image_wrap">

        <?php $image = get_field('image'); ?>

        <?php if( !empty( $image ) ): ?>
            <img loading="lazy" class="image" src="<?php echo esc_url($image['sizes']['large']); ?>" alt="<?php echo $image['alt']; ?>" />
        <?php endif; ?>

    </div>

    <div class="text_wrap">

        <h2 class="header">

            <?php the_field('header'); ?>

        </h2>
      
        <?php $information = get_field('information'); ?>

        <?php if( have_rows('information') ):?>

            <ul class="information">

            <?php while ( have_rows('information') ) : the_row(); ?>
                
                <li class="info_item">

                    <div class="sub_header" data-dropdown-header>
                       
                        <div class="icon">

                            <?php        
                                $icon = get_sub_field('icon'); 
                                switch ($icon) {
                                case 'clock':
                                    echo file_get_contents(get_template_directory_uri() . "/images/svg/visitor-info-icon-clock.svg");
                                    break;
                                case 'kids':
                                    echo file_get_contents(get_template_directory_uri() . "/images/svg/visitor-info-icon-kids.svg");
                                    break;
                                case 'camera':
                                    echo file_get_contents(get_template_directory_uri() . "/images/svg/visitor-info-icon-camera.svg");
                                    break;
                                case 'smilies':
                                    echo file_get_contents(get_template_directory_uri() . "/images/svg/visitor-info-icon-smilies.svg");
                                    break; 
                                case 'wheelchair':
                                    echo file_get_contents(get_template_directory_uri() . "/images/svg/visitor-info-icon-wheelchair.svg");
                                    break;                          
                                case 'house':
                                    echo file_get_contents(get_template_directory_uri() . "/images/svg/visitor-info-icon-house.svg");
                                    break;                                        
                                case 'pets':
                                    echo file_get_contents(get_template_directory_uri() . "/images/svg/visitor-info-icon-pets.svg");
                                    break;
                                case 'cocktail':
                                    echo file_get_contents(get_template_directory_uri() . "/images/svg/visitor-info-icon-cocktail.svg");
                                    break;
                                case 'hearth':
                                    echo file_get_contents(get_template_directory_uri() . "/images/svg/visitor-info-icon-hearth.svg");
                                    break;                                        
                                case 'paw':
                                    echo file_get_contents(get_template_directory_uri() . "/images/svg/visitor-info-icon-paw.svg");
                                    break;
                                case 'party':
                                    echo file_get_contents(get_template_directory_uri() . "/images/svg/visitor-info-icon-party.svg");
                                    break;
                                case 'generic':
                                    echo file_get_contents(get_template_directory_uri() . "/images/svg/visitor-info-icon-generic.svg");
                                    break;
                                default:
                                    echo file_get_contents(get_template_directory_uri() . "/images/svg/visitor-info-icon-generic.svg");
                                }

                            ?> 

                        </div>

                        <h3>
                            <?php the_sub_field('sub_header'); ?>
                        </h3>

                        <span class="mobile_icon">
                            <?php echo file_get_contents(get_template_directory_uri() . "/images/svg/CaretDownIcon.svg"); ?>
                        </span>

                    </div>  
                    
                    <div class="content">
                        <?php the_sub_field('text'); ?>       
                    </div>
                    

                </li>

            <?php endwhile; ?>

        </ul>

        <?php endif; ?>        

    </div>

</article>