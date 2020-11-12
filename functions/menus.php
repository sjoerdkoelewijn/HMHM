<?php 
/*************************** Register menus **********************************/

register_nav_menus( array(
	'main-navigation' => __( 'Main Navigation', 'hashmuseum' ),
	'home-navigation' => __( 'Home Navigation', 'hashmuseum' ),
	'language-menu' => __( 'Language Menu', 'hashmuseum' ),
	'explore-menu' => __( 'Explore Menu (Footer)', 'hashmuseum' ),
	'legal-links' => __( 'Legal Links', 'hashmuseum' ),
	'social-menu-ams' => __( 'Social Menu Amsterdam', 'hashmuseum' ),
	'social-menu-bcn' => __( 'Social Menu Barcelona', 'hashmuseum' ),
) );


/*************************** Custom Menu Walker **********************************/

class Social_Menu_Walker extends Walker_Nav_Menu {

	function start_el(&$output, $item, $depth=0, $args=array(), $id = 0) {

		$title = $item->title;
		$permalink = $item->url;
		$svg_url = get_theme_file_uri() . "/images/svg/" . $title . ".svg";
		$socialIcon = "<img loading='lazy' class='icon' src='" . $svg_url . "' alt='Icon'>";
		$output .= "<div class='" . $title . implode(" ", $item->classes) . "'>"; 
		$output .= '<a title="' . $title . '" href="' . $permalink . '">';
		$output .= '<span class="icon">' . $socialIcon . '</span>';  
		$output .= '</a>';
		$output .= '</div>';

	}

}