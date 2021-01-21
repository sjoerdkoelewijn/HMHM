<?php 
	$language_name = get_field( "language_name" ); 
	$language_code = get_field( "language_code" ); 
	$more_information = get_field( "more_information" ); 	
	$menu = get_field( "menu" ); 
	$buy_tickets = get_field( "buy_tickets" ); 
	$plan_your_visit = get_field( "plan_your_visit" ); 
	$explore_the_world_of_cannabis = get_field( "explore_the_world_of_cannabis" ); 
	$get_your_ticket = get_field( "get_your_ticket" ); 
	$sister_companies = get_field( "sister_companies" );
	$barcelona = get_field( "barcelona" );
	$amsterdam = get_field( "amsterdam" );
	$barcelona_address = get_field( "barcelona_address" );
	$amsterdam_address = get_field( "amsterdam_address" );  
	$barcelona_opening_hours = get_field( "barcelona_opening_hours" );
	$amsterdam_opening_hours = get_field( "amsterdam_opening_hours" ); 
	$all_rights_reserved = get_field( "all_rights_reserved" );

	
?>

<!DOCTYPE html>

<html <?php if( $language_code ) { ?> lang="<?php echo $language_code; ?>" <?php } ?> >

    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0" />
        <link rel="profile" href="https://gmpg.org/xfn/11" />

        <link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url' ) ); ?>">
        <link rel="preconnect" href="http://fonts.googleapis.com" />
        <link rel="dns-prefetch" href="//fonts.googleapis.com" />

        <meta name="google-site-verification" content="aoPLH9IdkVAX4MMq_Vm5VeQs17z4-3vJXizCQbmRo2s" />

        <?php wp_head(); ?>
    </head>

	<body <?php body_class(); ?> data-mobile-menu-hide>
	
	

    <header>

        <a data-logo title="<?php bloginfo( 'name' ); ?>" aria-label="Visit the Homepage" class="header_logo_link large logo" href="/">
            <img loading="lazy" src="<?php echo get_theme_file_uri() ?>/images/svg/logo.svg" alt="Logo">
        </a>

        <div class="mobile_top_menu">

            <a data-logo title="<?php bloginfo( 'name' ); ?>" aria-label="Visit the Homepage" class="header_logo_link small logo" href="/">
                <img loading="lazy" src="<?php echo get_theme_file_uri() ?>/images/svg/logo-small.svg" alt="Logo">
            </a>

            <div class="menu_buttons_wrap">

                <!-- Edit button for logged in users -->
                <?php include('parts/edit-button.php'); ?>

                <button aria-label="edit" class="language_menu_toggle" data-language-menu-toggle>
                    <img loading="lazy" class="icon" src="<?php echo get_theme_file_uri() ?>/images/svg/weedleaf-small.svg" alt="Language Menu Icon">
					<?php if( $language_name ) { echo $language_name; } ?>					
                </button>
                
				
			   <button aria-label="Open main menu" class="main_menu_toggle" data-main-menu-toggle>
                    <?php pll_e( 'menu', 'hashmuseum' ) ?>
                    <img loading="lazy" class="icon" src="<?php echo get_theme_file_uri() ?>/images/svg/hamburgerIcon.svg" alt="Menu Icon">
				</button>				
				

            </div>

        </div>

        <div class="mobile_buttons">

            <a href="#tickets" class="buy_tickets mobile_btn">
				<?php if( $buy_tickets ) { echo $buy_tickets; } ?>
            </a>

            <a href="/en/plan-your-visit/" class="plan_visit mobile_btn">
				<?php if( $plan_your_visit ) { echo $plan_your_visit; } ?>	
            </a>            

        </div>

		<?php include('parts/main-menu.php'); ?>


        <div class="language_menu hidden" data-language-menu>

			<div class="menu_background" data-language-close></div> 

			<div class="language_menu_wrap">				  
				
				<button class="language_close" data-language-close aria-label="<?php pll_e( 'Close Menu', 'hashmuseum' ) ?>">
					<img loading="lazy" class="icon" src="<?php echo get_theme_file_uri() ?>/images/svg/closeIcon.svg" alt="Icon">
				</button>

				<nav id="language-navigation" class="language_navigation">
					<?php
					
					wp_nav_menu(array(
						'theme_location'  => 'language-menu',
						'fallback_cb'     => false,
						'container'       => false,
						'items_wrap'      => '<ul id="%1$s">%3$s</ul>',
					));
					?>
				</nav>

			</div> 

		</div>

    </header>





	<?php while ( have_posts() ) : ?>
		
		<?php the_post(); ?>

		<?php the_content(); ?>

	<?php endwhile; ?>











	<article class="footer">

	<div class="columns">

		<div class="column first">
			
			<div class="footer_logo">
				<img loading="lazy" src="<?php echo get_theme_file_uri() ?>/images/svg/LogoLarge.svg" alt="Logo">
			</div>


			<h2 class="header">
				<?php if( $explore_the_world_of_cannabis ) { echo $explore_the_world_of_cannabis; } ?>
			</h2>

			<div class="ticket_buttons">

				<a class="ghost_btn black btn" href="#tickets">
					<?php if( $get_your_ticket ) { echo $get_your_ticket; } ?>
				</a>
				
			</div>
			
			<div class="sister_companies">
				
				<p>
					<?php if( $sister_companies ) { echo $sister_companies; } ?>
				</p>

				<div class="logos">
					<a title="sensiseeds" href="https://sensiseeds.com">
						<img loading="lazy" class="sensiseeds" src="<?php echo get_theme_file_uri() ?>/images/svg/SensiSeedsLogo.svg" alt="Logo">
					</a>
					<a title="hempflax" href="https://www.hempflax.com">
						<img loading="lazy" class="hempflax" src="<?php echo get_theme_file_uri() ?>/images/svg/HempFlaxLogo.svg" alt="hempflax Logo">
					</a>
					<a title="cannabiscollege" href="https://cannabiscollege.com/">	
						<img loading="lazy" class="cannabiscollege" src="<?php echo get_theme_file_uri() ?>/images/svg/CannabisCollegeLogo.svg" alt="cannabiscollege Logo">
					</a>
					<a title="hempstory" href="https://www.hempstory.nl">	
						<img loading="lazy" class="hempstory" src="<?php echo get_theme_file_uri() ?>/images/svg/HempstoryLogo.svg" alt="hempstory Logo">
					</a>
				</div>
			
			</div>

		</div>

		<div class="column second">

			<h2 class="header">
				<a class="location_link" href="/en/amsterdam/">
					<?php if( $amsterdam ) {
                        echo $amsterdam;
                    } else { 
                        pll_e( 'Amsterdam', 'hashmuseum' );
                    } ?>
				</a>
			</h2>
			
			<div class="address">
				<img loading="lazy" src="<?php echo get_theme_file_uri() ?>/images/svg/locationIcon.svg" alt="locationIcon"> 
				<p>
					<?php if( $amsterdam_address ) {
                        echo $amsterdam_address;
					} ?>
				</p>
			</div>
			
			<div class="phonenumber">
				<img loading="lazy" src="<?php echo get_theme_file_uri() ?>/images/svg/phoneIcon.svg" alt="phoneIcon"> 
				<p>
					<?php the_field('amsterdam_phone_number', 'option'); ?>
				</p>
			</div>

			<a href="mailto:amsterdam@hashmuseum.com" class="email">
				<img loading="lazy" src="<?php echo get_theme_file_uri() ?>/images/svg/emailIcon.svg" alt="emailIcon">
				<p>
					amsterdam@hashmuseum.com
				</p>
			</a>

			<div class="openinghours">
				<img loading="lazy" src="<?php echo get_theme_file_uri() ?>/images/svg/clockIcon.svg" alt="clockIcon">
				<p>
					<?php if( $amsterdam_opening_hours ) { echo $amsterdam_opening_hours; } ?>
				</p>
			</div>
			
			<a href="/en/amsterdam/" class="moreinfo">
				<img loading="lazy" src="<?php echo get_theme_file_uri() ?>/images/svg/arrowRightIcon.svg" alt="arrowRightIcon">
				<p>
					<?php if( $more_information ) { echo $more_information; } ?>
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
			
		</div>

		<div class="column third">

			<h2 class="header">
				<a class="location_link" href="/en/barcelona/">
					<?php if( $barcelona ) {
                        echo $barcelona;
                    } else { 
                        pll_e( 'Barcelona', 'hashmuseum' );
                    } ?>
				</a>
			</h2>

			<div class="address">
				<img loading="lazy" src="<?php echo get_theme_file_uri() ?>/images/svg/locationIcon.svg" alt="locationIcon">
				<p>
					<?php if( $barcelona_address ) {
                        echo $barcelona_address;
                    } ?>
				</p>
			</div>
			
			<div class="phonenumber">
				<img loading="lazy" src="<?php echo get_theme_file_uri() ?>/images/svg/phoneIcon.svg" alt="phoneIcon">
				<p>
					<?php the_field('barcelona_phone_number', 'option'); ?>
				</p>
			</div>

			<a href="mailto:barcelona@hashmuseum.com" class="email">
				<img loading="lazy" src="<?php echo get_theme_file_uri() ?>/images/svg/emailIcon.svg" alt="emailIcon">
				<p>
					barcelona@hashmuseum.com
				</p>
			</a>
			
			<div class="openinghours">
				<img loading="lazy" src="<?php echo get_theme_file_uri() ?>/images/svg/clockIcon.svg" alt="clockIcon">
				<p>
					<?php if( $barcelona_opening_hours ) { echo $barcelona_opening_hours; } ?>
				</p>
			</div>

			<a href="/en/barcelona/" class="moreinfo">
				<img loading="lazy" src="<?php echo get_theme_file_uri() ?>/images/svg/arrowRightIcon.svg" alt="arrowRightIcon">
				<p>
					<?php if( $more_information ) { echo $more_information; } ?>
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

	</div>

	<div class="sister_companies mobile">
				
		<p>
			<?php if( $sister_companies ) { echo $sister_companies; } ?>
		</p>

		<div class="logos">
			<a title="sensiseeds" href="https://sensiseeds.com">
				<img loading="lazy" class="sensiseeds" src="<?php echo get_theme_file_uri() ?>/images/svg/SensiSeedsLogo.svg" alt="Logo">
			</a>
			<a title="hempflax" href="https://www.hempflax.com">
				<img loading="lazy" class="hempflax" src="<?php echo get_theme_file_uri() ?>/images/svg/HempFlaxLogo.svg" alt="hempflax Logo">
			</a>
			<a title="cannabiscollege" href="https://cannabiscollege.com/">	
				<img loading="lazy" class="cannabiscollege" src="<?php echo get_theme_file_uri() ?>/images/svg/CannabisCollegeLogo.svg" alt="cannabiscollege Logo">
			</a>
			<a title="hempstory" href="https://www.hempstory.nl">	
				<img loading="lazy" class="hempstory" src="<?php echo get_theme_file_uri() ?>/images/svg/HempstoryLogo.svg" alt="hempstory Logo">
			</a>
		</div>

	</div>

	<p class="copyright_notice">
		© 1987 - <?php echo date("Y"); ?> <?php pll_e( 'the Hash, Marihuana & Hemp Museum.', 'hashmuseum' ) ?> <?php if( $all_rights_reserved ) { echo $all_rights_reserved; } ?>
	</p>

	</article>

	<?php include('parts/ticket-modal.php'); ?>

	<?php include('parts/cookie-message.php'); ?>

	<?php wp_footer(); ?>

	</body>	


</html>