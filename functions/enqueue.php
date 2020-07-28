<?php

/*************************** Dequeue Default Block Styles **********************************/

function sk_dequeue_block_styles(){
	wp_dequeue_style( 'wp-block-library' );
	wp_dequeue_style( 'wp-block-library-theme' );
   }

   if (!is_admin()) {
   	add_action( 'wp_enqueue_scripts', 'sk_dequeue_block_styles', 99 );
   }

/*************************** Enqueue Styles **********************************/

function hashmuseum_styles() {

	$filename = get_stylesheet_directory() . '/dist/css/style.min.css';
	$timestamp = filemtime($filename);

	wp_enqueue_style('hashmuseum-styles', get_template_directory_uri() . '/dist/css/style.min.css', NULL, $timestamp, 'all' );

	wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Prata&display=swap', NULL, NULL, 'all' );


}
add_action( 'wp_enqueue_scripts', 'hashmuseum_styles', 99 );


function admin_styles() {

	$filename = get_stylesheet_directory() . '/dist/css/admin.min.css';
	$timestamp = filemtime($filename);
	wp_enqueue_style('admin-styles', get_template_directory_uri() . '/dist/css/admin.min.css', NULL, $timestamp, 'all' );

}
add_action('admin_enqueue_scripts', 'admin_styles');



/*************************** Enqueue Scripts **********************************/

function hashmuseum_scripts() {

	$filename = get_stylesheet_directory() . '/dist/js/app.min.js';
	$timestamp = filemtime($filename);

	if (!is_admin()) {
		wp_deregister_script('jquery');
	}

	wp_enqueue_script('logo-color-switch', get_template_directory_uri() . '/libs/background-check.min.js', NULL, $timestamp, FALSE);
    wp_enqueue_script('slider', get_template_directory_uri() . '/libs/siema.min.js', NULL, $timestamp, FALSE);
	wp_enqueue_script('hashmuseum-app', get_template_directory_uri() . '/dist/js/app.min.js', NULL, $timestamp, TRUE);
	wp_enqueue_script('mailchimp', get_template_directory_uri() . '/dist/js/mailchimp.js', NULL, $timestamp, TRUE);

}
add_action( 'wp_enqueue_scripts', 'hashmuseum_scripts', 99 );