<?php get_header(); 

$current_language = pll_current_language();
$home_page   = get_page_by_path('homepage-' . $current_language, $output = OBJECT, $post_type = 'page');
$output =  apply_filters( 'the_content', $home_page->post_content );

	if ( empty($output) ) :
		echo 'Please create a custom homepage first.';
	else : ?>
		<div class="custom_homepage"><?php echo $output; ?></div>	
	<?php endif; 


$loop = new WP_Query(
    array(
        'post_type' => 'collection', 
        'posts_per_page' => 10
    ) 
); 
while ( $loop->have_posts() ) : $loop->the_post(); ?>
     
	 <a href="<?php the_permalink(); ?>">
				<?php the_title(); ?>
			</a> 

     
<?php endwhile;
wp_reset_postdata();
?>



<?php get_footer(); ?>