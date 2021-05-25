<?php


get_header(); ?>

	<div class="events">

	<?php if ( have_posts() ) :	
					
		while ( have_posts() ) : the_post(); 

			$today = date('Ymd');
		
			if ( function_exists( 'get_field' ) ) {

				if ( has_blocks( $pid_content ) ) {
					$blocks = parse_blocks( $post->post_content );
					foreach ( $blocks as $block ) {
						if ( $block['blockName'] === 'acf/hero' ) {		
						
							$sub_header = $block['attrs']['data']['subheader'];
							$start_date_string = $block['attrs']['data']['start_date']; 
							
							$end_date_string = $block['attrs']['data']['end_date'];
							$start_date = DateTime::createFromFormat('Ymd', $start_date_string);
							$end_date = DateTime::createFromFormat('Ymd', $end_date_string);
							$location = $block['attrs']['data']['location'];
							$free = $block['attrs']['data']['free_entry'];
							
						}
					}
				}

			}
		
		?>

		<article class="event">	 

			<div class="info_wrap">

				<div class="meta_info">

					<a class="title" href="<?php the_permalink(); ?>">
						<h2>
							<?php the_title(); ?>
						</h2>
					</a>

					<?php if( $end_date_string ) { ?>

						<div class="date">

							<p>
								
								<?php echo $start_date->format('j/m/Y'); ?>
								-
								<?php echo $end_date->format('j/m/Y'); ?>
							</p>   

							<img loading="lazy" class="icon" alt="icon" src="<?php echo get_theme_file_uri() ?>/images/svg/calendarIcon.svg" alt="Icon">

						
						</div>
						
					<?php } else { ?>

						<div class="date">

							<p>
								<?php echo get_the_date(); ?>
							</p>   

							<img loading="lazy" class="icon" alt="icon" src="<?php echo get_theme_file_uri() ?>/images/svg/calendarIcon.svg" alt="Icon">


						</div>

					<?php } ?>
					
					<?php if( $location ) { ?>

						<div class="location">
							<p>
								<?php echo $location; ?>
							</p>
							<img loading="lazy" class="icon" alt="icon" src="<?php echo get_theme_file_uri() ?>/images/svg/pinIcon.svg" alt="Icon">
  
						</div>

					<?php } ?>

					<?php if( $end_date_string > $today ) { ?> 

						<?php if($free === 'paid') { ?>

							<a class="action_btn black btn" href="<?php sk_get_ticket_url($location) ?>">
								<?php pll_e( 'Get your ticket', 'hashmuseum' ) ?>
							</a>

						<?php } else if($free === 'free') { ?>

							<div class="free_entry">
								<p>
									<?php pll_e( 'Free entry', 'hashmuseum' ) ?>
								</p>
								<img loading="lazy" class="icon" alt="icon" src="<?php echo get_theme_file_uri() ?>/images/svg/euroIcon.svg" alt="Icon">
 
							</div>

						<?php } ?>
					
					<?php } ?>
								
				</div>
				
				<div class="description">

					<?php if( $sub_header ) { ?>

						<a class="title" href="<?php the_permalink(); ?>">

							<h2>
								<?php the_title(); ?>
							</h2>

						</a>	

						<div class="mobile_meta_info">

							<?php if( $end_date_string ) { ?>

								<div class="date">

								<img loading="lazy" class="icon" alt="icon" src="<?php echo get_theme_file_uri() ?>/images/svg/calendarIcon.svg" alt="Icon">

									<p>
										<?php echo $start_date->format('j/m/Y'); ?>
										-
										<?php echo $end_date->format('j/m/Y'); ?>
									</p>   
								
								</div>
								
							<?php } else { ?>

								<div class="date">

								<img loading="lazy" class="icon" alt="icon" src="<?php echo get_theme_file_uri() ?>/images/svg/calendarIcon.svg" alt="Icon">

									<p>
										<?php echo get_the_date(); ?>
									</p>   

								</div>

							<?php } ?>

							<?php if( $location ) { ?>

								<div class="location">
								<img loading="lazy" class="icon" alt="icon" src="<?php echo get_theme_file_uri() ?>/images/svg/pinIcon.svg" alt="Icon">
									<p>
										<?php echo $location; ?>
									</p>
								</div>

							<?php } ?>

							<?php if( $end_date_string > $today ) { ?> 

								<?php if($free === 'paid') { ?>

									<a class="action_btn black btn" href="<?php sk_get_ticket_url($location) ?>">
										<?php pll_e( 'Get your ticket', 'hashmuseum' ) ?>
									</a>

								<?php } else if($free === 'free') { ?>

									<div class="free_entry">
										<img loading="lazy" class="icon" alt="icon" src="<?php echo get_theme_file_uri() ?>/images/svg/euroIcon.svg" alt="Icon">

										<p>
											<?php pll_e( 'Free entry', 'hashmuseum' ) ?>
										</p>
									</div>

								<?php } ?>

							<?php } ?>
										
						</div>

						<div class="mobile_image">

							<?php if ( has_post_thumbnail( $post->ID ) ) { ?>

								<a href="<?php the_permalink(); ?>">
									<?php echo get_the_post_thumbnail(); ?>
								</a>

							<?php } ?>
						
						</div>

						<h1>
							<?php echo $sub_header; ?>
						</h1>

					<?php } ?>
					
					<p>
						<?php the_excerpt(); ?>
					</p>

					<a class="ghost_btn black btn" aria-label="<?php pll_e( 'More about', 'hashmuseum' ) ?> <?php the_title(); ?>" href="<?php the_permalink(); ?>">
						<span class="short_text">
							<?php pll_e( 'More information', 'hashmuseum' ) ?>
						</span>
						<span class="long_text">
							<?php pll_e( 'More about', 'hashmuseum' ) ?>
							<?php the_title(); ?>
						</span>
					</a>
				
				</div>

			</div>

			<div class="image">

				<?php if ( has_post_thumbnail( $post->ID ) ) { ?>

					<a href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail('large_image'); ?>
					</a>

				<?php } ?>
			
			</div>
		
			

		</article>													
			
		<?php endwhile; ?>


		<?php // the_posts_pagination(); ?>

		<div class="next_posts_btn_wrap">
			<?php next_posts_link('Load more'); ?>
		</div>

	<?php else : ?>

		'No content'

	<?php endif; ?> 
	
	</div>

	

<?php get_footer();
