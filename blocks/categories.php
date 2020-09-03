<?php
/* Block Name: Category Overview */

// create id attribute for specific styling
$id = 'category-overview' . $block['id'];

?>

    <article id="<?php echo $id; ?>" class="category_overview gb_block">
        
        <?php 

            $tax_select = get_field('taxonomy_select');

            if ($tax_select === 'collection_themes') {
                $terms = get_field('themes');
            } elseif ($tax_select === 'collection_themes') {
                $terms = get_field('categories');
            }
        
        
        if( $terms ): ?>
                            
            <?php foreach( $terms as $term ): ?>

                <div class="category">

                    <a href="<?php echo esc_url( get_term_link( $term ) ); ?>">

                        <?php   
                            $image_id = get_field('featured_image', $term, false); // 3rd arg set to false to ensure we get unformatted value (ID)
                            $image = wp_get_attachment_image_src($image_id, 'large'); 
                        ?>

                        <img loading="lazy" class="image" src="<?php echo $image[0]; ?>" />

                    </a>
                
                    <div class="text_wrap">

                        <a class="link" href="<?php echo esc_url( get_term_link( $term ) ); ?>">

                            <h2>
                                <?php echo $term->name; ?>
                            </h2>

                        </a>    

                        <p class="excerpt">
                            
                            <?php echo $term->description; ?>
                            
                        </p>

                        <a class="read_more_link" href="<?php echo esc_url( get_term_link( $term ) ); ?>">
                            <?php echo file_get_contents(get_template_directory_uri() . "/images/svg/arrowRightIcon.svg"); ?>
                            <?php pll_e( 'Read More', 'hashmuseum' ) ?>
                        </a>    

                    </div>

                </div>                     

            <?php endforeach; ?>
            
        <?php endif; ?>    
                
    </article>