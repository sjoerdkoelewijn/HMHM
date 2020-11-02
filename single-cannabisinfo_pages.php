<?php 

global $wp;
$current_url = home_url(add_query_arg(array(), $wp->request));
$current_language = pll_current_language();

switch ($current_language) {
case 'en':	
	$new_url = str_replace('/cannabisinfopage/', '/cannabis-knowledge/', $current_url);
	redirect($new_url, 302);
	break;
case 'ca':
	
	break;
case 'es':
	
	break;
case 'fr':
	
	break;
case 'nl':
	
	break;			
case 'de':
	
	break;			
default:
	
}




