<?php get_header(); ?>

	<div class="fourofour">
	

		<h1 class="header">
			<?php pll_e( "404 - Page not found", 'hashmuseum' ); ?>
		</h1>

		<h2 class="subheader">
			<?php pll_e( "Sorry, we couldn't find the page you requested.", 'hashmuseum' ); ?>
		</h2>

		<p>
			<?php pll_e( "Don't worry though, it's probably just a typo. Please use the search function instead.", 'hashmuseum' ); ?>
		</p>

		<?php get_search_form(); ?>

	</div>
	
	

<?php get_footer();