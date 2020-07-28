<?php

use function PHPSTORM_META\map;

get_header(); ?>

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
									<?php echo $start_date->format('j F Y'); ?>
									-
									<?php echo $end_date->format('j F Y'); ?>
								</p>   

								<?php echo file_get_contents(get_template_directory_uri() . "/images/svg/calendarIcon.svg"); ?> 
							
							</div>
						
					<?php } else { ?>

						<div class="date">

							<p>
								<?php echo get_the_date('j F Y'); ?>
							</p>   

							<?php echo file_get_contents(get_template_directory_uri() . "/images/svg/calendarIcon.svg"); ?> 

						</div>

					<?php } ?>
					
					<?php if( $location ) { ?>

						<div class="location">
							<p>
								<?php echo $location; ?>
							</p>
							<?php echo file_get_contents(get_template_directory_uri() . "/images/svg/pinIcon.svg"); ?>  
						</div>

					<?php } ?>

					<?php if( $end_date_string > $today ) { ?> 

						<?php if($free === 'paid') { ?>

							<a class="action_btn black btn" href="<?php sk_get_ticket_url($location) ?>">
								<?php _e( 'Get your ticket', 'hashmuseum' ) ?>
							</a>

						<?php } else if($free === 'free') { ?>

							<div class="free_entry">
								<p>
									<?php _e( 'Free entry', 'hashmuseum' ) ?>
								</p>
								<?php echo file_get_contents(get_template_directory_uri() . "/images/svg/euroIcon.svg"); ?>  
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

							<h1>
								<?php echo $sub_header; ?>
							</h1>
						</a>

					<?php } ?>							

					<p>
						<?php the_excerpt(); ?>
					</p>

					<a class="ghost_btn black btn" href="<?php the_permalink(); ?>">
						<?php _e( 'More about', 'hashmuseum' ) ?>
						<?php the_title(); ?>
					</a>
				
				</div>

			</div>

			<div class="image">

				<?php if ( has_post_thumbnail( $post->ID ) ) { ?>

					<a href="<?php the_permalink(); ?>">
						<?php echo get_the_post_thumbnail( ); ?>
					</a>

				<?php } ?>
			
			</div>
		
			

		</article>													
			
		<?php endwhile; ?>

	<?php else : ?>

		'No content'

	<?php endif; ?>   

<?php get_footer();
