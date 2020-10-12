<?php

/*************************** Load different assets on dev *********************************/

if(strpos($_SERVER['HTTP_HOST'], 'hashmuseum.local') !== false){
	
	function favicon() {
		echo '<link rel="Shortcut Icon" type="image/x-icon" href="'.get_template_directory_uri().'/images/localfavicon.ico" />';
	}
	add_action('wp_head', 'favicon');

} else {

	/* ACF php file is not imported on local env */
	include 'functions/advanced-custom-fields.php';	

	function favicon() {
		echo '<link rel="Shortcut Icon" type="image/x-icon" href="'. get_template_directory() . '/images/favicon.ico" />';
	}
	add_action('wp_head', 'favicon');

};