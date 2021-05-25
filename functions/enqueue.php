<?php

/*************************** Dequeue Default Block Styles **********************************/

function sk_dequeue_block_styles(){
	wp_dequeue_style( 'wp-block-library' );
	wp_dequeue_style( 'wp-block-library-theme' );
   }

   if (!is_admin()) {
   	add_action( 'wp_enqueue_scripts', 'sk_dequeue_block_styles', 99 );
   }

/*************************** Dequeue WP Embed **********************************/

function sk_deregister_embed(){
		wp_dequeue_script( 'wp-embed' );
	}

add_action( 'wp_footer', 'sk_deregister_embed' );   

/*************************** Enqueue Styles **********************************/

function hashmuseum_styles() {

	$filename = get_stylesheet_directory() . '/src/css/style.min.css';
	$timestamp = filemtime($filename);
	
	if ( get_the_ID() == 28 ) {
		wp_enqueue_style('google-fonts-jp', 'https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300&display=swap', NULL, NULL, 'all' );
	}
	
	wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Prata&display=swap', NULL, NULL, 'all' );

	wp_enqueue_style('hashmuseum-styles', get_template_directory_uri() . '/src/css/style.min.css', NULL, $timestamp, 'all' );

}
add_action( 'wp_enqueue_scripts', 'hashmuseum_styles', 99 );


function admin_styles() {

	$filename = get_stylesheet_directory() . '/src/css/admin.min.css';
	$timestamp = filemtime($filename);
	wp_enqueue_style('admin-styles', get_template_directory_uri() . '/src/css/admin.min.css', NULL, $timestamp, 'all' );

}
add_action('admin_enqueue_scripts', 'admin_styles');


/*************************** Enqueue Scripts **********************************/

function hashmuseum_scripts() {

	$filename = get_stylesheet_directory() . '/src/js/app.min.js';
	$timestamp = filemtime($filename);

	if (!is_admin()) {
		wp_deregister_script('jquery');
	}

	wp_enqueue_script('gdpr-cookies', get_template_directory_uri() . '/src/js/gdpr-cookies.js', NULL, $timestamp, FALSE);

	wp_enqueue_script('logo-color-switch', get_template_directory_uri() . '/src/js/libs/background-check.min.js', NULL, $timestamp, FALSE);
	wp_enqueue_script('slider', get_template_directory_uri() . '/src/js/libs/siema.min.js', NULL, $timestamp, FALSE);
	
	wp_enqueue_script('hashmuseum-app', get_template_directory_uri() . '/src/js/app.min.js', NULL, $timestamp, TRUE);

	wp_enqueue_script('hashmuseum-app-defer', get_template_directory_uri() . '/src/js/app-defer.min.js', NULL, $timestamp, TRUE);
	wp_enqueue_script('mailchimp', get_template_directory_uri() . '/src/js/mailchimp-defer.min.js', NULL, $timestamp, TRUE);

}
add_action( 'wp_enqueue_scripts', 'hashmuseum_scripts', 99 );

// Defer js - Adapted from https://gist.github.com/toscho/1584783
add_filter( 'clean_url', function( $url )

{
    if ( FALSE === strpos( $url, '-defer.min.js' ) )
    { 
        return $url;
    }
    
    return "$url' defer='defer";
}, 11, 1 );