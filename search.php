<?php get_header(); ?>       
                
<?php $query = new WP_Query( array( 's' => get_query_var('s')) );?>

<article class="result_page">

	<?php get_search_form(); ?>

	<h2 class="subheader"><?php pll_e( 'Search results for', 'hashmuseum' ) ?></h2>
	<h1 class="header"><?php echo esc_attr( get_search_query() ); ?></h1>

	<?php if ( $query->have_posts() ) { ?>
		
		<ul class="results">

			<?php while ( $query->have_posts() ) { ?>
				
				<?php $query->the_post(); ?>

				<li class="result">

					<a href="<?php the_permalink(); ?>" class="image">
						<?php the_post_thumbnail('medium'); ?>
					</a>
				
					<div class="text">
						
						<h2 class="header">
							<?php the_title(); ?>
						</h2>

						<?php the_excerpt(); ?>

						<a href="<?php the_permalink(); ?>" class="link">
							<?php pll_e( 'read more', 'hashmuseum' ) ?>
						</a>

					</div>					

				</li>

			<?php } ?>
		
		</ul>
		
	<?php } ?>

</article>	


<?php get_footer(); ?>