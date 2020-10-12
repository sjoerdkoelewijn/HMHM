
		<article class="newsletter">

			<h2 class="subheader">
				<?php pll_e( 'Stay in touch', 'hashmuseum' ) ?>
			</h2>

			<h1 class="header">
				<?php pll_e( 'The Museum Newsletter', 'hashmuseum' ) ?>
			</h1>

			<p class="text">
				<?php pll_e( 'Sign up to get the latest news about the museum, upcoming exhibitions and events.', 'hashmuseum' ) ?>
			</p>
			
			<?php include('parts/newsletter-form.php'); ?>

		</article>
		
		<article class="footer">

			<div class="columns">

				<div class="column first">
					
					<div class="footer_logo">
						<?php echo file_get_contents(get_template_directory() . "/images/svg/LogoLarge.svg"); ?>
					</div>


					<h2 class="header">
						<?php pll_e( 'Explore the World of Cannabis. The Past, the Present & the Future.', 'hashmuseum' ) ?>					
					</h2>

					<div class="ticket_buttons">

						<a class="ghost_btn black btn" href="#">
							<?php pll_e( 'Get your ticket', 'hashmuseum' ) ?>
						</a>

						<a class="ghost_btn black btn" href="#">
							<?php pll_e( 'Plan your visit', 'hashmuseum' ) ?>
						</a>
						
					</div>
					
					<div class="sister_companies">
						
						<p>
							<?php pll_e( 'Our sister companies', 'hashmuseum' ) ?>
						</p>

						<div class="logos">
							<a href="https://sensiseeds.com">
								<?php echo file_get_contents(get_template_directory() . "/images/svg/SensiSeedsLogo.svg"); ?>
							</a>
							<a href="https://www.hempflax.com">	
								<?php echo file_get_contents(get_template_directory() . "/images/svg/HempFlaxLogo.svg"); ?>
							</a>
							<a href="https://cannabiscollege.com/">	
								<?php echo file_get_contents(get_template_directory() . "/images/svg/CannabisCollegeLogo.svg"); ?>
							</a>
							<a href="https://www.hempstory.nl">	
								<?php echo file_get_contents(get_template_directory() . "/images/svg/HempstoryLogo.svg"); ?>
							</a>
						</div>
					
					</div>

				</div>

				<div class="column second">

				<h2 class="header">
						<a class="location_link" href="/<?php echo pll_current_language(); ?>/amsterdam/">
                    		<?php pll_e( 'Amsterdam', 'hashmuseum' ) ?>
                		</a>
					</h2>
					
					<div class="address">
                        <?php echo file_get_contents(get_template_directory() . "/images/svg/locationIcon.svg"); ?> 
                        <p>
                            <?php the_field('amsterdam_address', 'option'); ?>
                        </p>
					</div>
					
					<div class="phonenumber">
                        <?php echo file_get_contents(get_template_directory() . "/images/svg/phoneIcon.svg"); ?> 
                        <p>
							<?php the_field('amsterdam_phone_number', 'option'); ?>
						</p>
					</div>

                    <div class="openinghours">
                        <?php echo file_get_contents(get_template_directory() . "/images/svg/clockIcon.svg"); ?> 
                        <p>
                            <?php sk_lang_specific_option('amsterdam_opening_hours'); ?>
                        </p>
					</div>
					
					<a href="#" class="moreinfo">
                        <?php echo file_get_contents(get_template_directory() . "/images/svg/arrowRightIcon.svg"); ?> 
                        <p>
							<?php echo __( 'More information', 'hashmuseum' ) ?>
                        </p>
                    </a>

                    <nav class="social amsterdam">
                        <?php
                        wp_nav_menu(array(
                            'theme_location'  => 'social-menu-ams',
                            'fallback_cb'     => false,
                            'container'       => false,
                            'items_wrap'      => '%3$s',
                            'walker'          => new Social_Menu_Walker()
                        ));
                        ?>
                    </nav>

                    <h2 class="header">
						<a class="location_link" href="/<?php echo pll_current_language(); ?>/barcelona/">
							<?php pll_e( 'Barcelona', 'hashmuseum' ) ?>
						</a>
                    </h2>

					<div class="address">
                        <?php echo file_get_contents(get_template_directory() . "/images/svg/locationIcon.svg"); ?> 
						<p>
							<?php the_field('barcelona_address', 'option'); ?>
                        </p>
					</div>
					
					<div class="phonenumber">
                        <?php echo file_get_contents(get_template_directory() . "/images/svg/phoneIcon.svg"); ?> 
                        <p>
							<?php the_field('barcelona_phone_number', 'option'); ?>
                        </p>
					</div>
					
                    <div class="openinghours">
                        <?php echo file_get_contents(get_template_directory() . "/images/svg/clockIcon.svg"); ?> 
                        <p>
                            <?php sk_lang_specific_option('barcelona_opening_hours'); ?>
                        </p>
                    </div>

					<a href="#" class="moreinfo">
                        <?php echo file_get_contents(get_template_directory() . "/images/svg/arrowRightIcon.svg"); ?> 
                        <p>
							<?php pll_e( 'More information', 'hashmuseum' ) ?>
                        </p>
                    </a>

                    <nav class="social barcelona">
                        <?php
                        wp_nav_menu(array(
                            'theme_location'  => 'social-menu-bcn',
                            'fallback_cb'     => false,
                            'container'       => false,
                            'items_wrap'      => '%3$s',
                            'walker'          => new Social_Menu_Walker()
                        ));
                        ?>
                    </nav>
					
				</div>

				<div class="column third">

					<h2 class="header">
                        <?php pll_e( 'Explore', 'hashmuseum' ) ?>
					</h2>

					<nav id="explore-links" class="explore_links" role="navigation">
						<?php
						wp_nav_menu(array(
							'theme_location'  => 'explore-menu',
							'fallback_cb'     => false,
							'container'       => false,
							'items_wrap'      => '<ul id="%1$s">%3$s</ul>',
						));
						?>
               		</nav>
					
					<h2 class="header">
                        <?php pll_e( 'Legalize', 'hashmuseum' ) ?>
                    </h2>

					<nav id="legal-links" class="legal_links" role="navigation">
						<?php
						wp_nav_menu(array(
							'theme_location'  => 'legal-links',
							'fallback_cb'     => false,
							'container'       => false,
							'items_wrap'      => '<ul id="%1$s">%3$s</ul>',
						));
						?>
               		</nav>
					
				</div>

			</div>

			<div class="sister_companies mobile">
						
				<p>
					<?php pll_e( 'Our sister companies', 'hashmuseum' ) ?>
				</p>

				<div class="logos">
					<a href="https://sensiseeds.com">
						<?php echo file_get_contents(get_template_directory() . "/images/svg/SensiSeedsLogo.svg"); ?>
					</a>
					<a href="https://www.hempflax.com">	
						<?php echo file_get_contents(get_template_directory() . "/images/svg/HempFlaxLogo.svg"); ?>
					</a>
					<a href="https://cannabiscollege.com/">	
						<?php echo file_get_contents(get_template_directory() . "/images/svg/CannabisCollegeLogo.svg"); ?>
					</a>
					<a href="https://www.hempstory.nl">	
						<?php echo file_get_contents(get_template_directory() . "/images/svg/HempstoryLogo.svg"); ?>
					</a>
				</div>
			
			</div>

			<p class="copyright_notice">
				© 1987 - <?php echo date("Y"); ?> <?php pll_e( 'the Hash, Marihuana & Hemp Museum.', 'hashmuseum' ) ?> <?php _e( 'All Rights Reserved.', 'hashmuseum' ) ?>
			</p>

		</article>

		<?php include('parts/ticket-modal.php'); ?>
		<?php include('parts/cookie-message.php'); ?>
		
		<?php wp_footer(); ?>

	</body>

	<?php if(strpos($_SERVER['HTTP_HOST'], 'hashmuseum.local') !== false){ ?>
		<script>
		document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')
		</script>
		
	<?php } ?>

	


</html>