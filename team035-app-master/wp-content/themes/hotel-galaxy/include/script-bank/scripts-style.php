<?php 
function hotel_galaxy_cssfile(){

	$hotel_galaxy_default_setting = hotel_galaxy_default_setting(); 
	$hotel_galaxy_settings = wp_parse_args(get_option( 'hotel_galaxy_option', array() ), $hotel_galaxy_default_setting ); 

	if ( is_singular() ) wp_enqueue_script( "comment-reply" );
	wp_enqueue_style('hotel-galaxy-style', get_stylesheet_uri());	
	wp_enqueue_style('hotel-galaxy-bootstrap-css', Hotel_galaxy_Template_Dir_Uri.'/css/bootstrap.css');	
	wp_enqueue_style('hotel-galaxy-media-responsive-css', Hotel_galaxy_Template_Dir_Uri.'/css/media-responsive.css');
	wp_enqueue_style('hotel-galaxy-animations-min-css', Hotel_galaxy_Template_Dir_Uri.'/css/animations.css');
	wp_enqueue_style('hotel-galaxy-fonts-css', Hotel_galaxy_Template_Dir_Uri.'/css/fonts/fonts.css');  
	wp_enqueue_style('hotel-galaxy-font-awesome-min-css', Hotel_galaxy_Template_Dir_Uri.'/css/fontawesome-free-5.2.0-web/css/all.css');
	wp_enqueue_style('hotel-galaxy-fonts', hotel_galaxy_fonts_url(), array(), null );
	
	wp_enqueue_style('hotel-google-font','https://fonts.googleapis.com/css?family=' . ( esc_attr(($hotel_galaxy_settings['google_font']!='') ? $hotel_galaxy_settings['google_font'].':100,200,300,400,500,600,700,800,900,italic' : 'Montserrat:100,200,300,400,500,600,700,800,900,italic') ));
}

function hotel_galaxy_jsfile()
{
	wp_enqueue_script('jquery');
	wp_enqueue_script('Hotel_galaxy-bootstrap-js',Hotel_galaxy_Template_Dir_Uri .'/js/bootstrap.js');
	wp_enqueue_script('Hotel_galaxy-custom.js',Hotel_galaxy_Template_Dir_Uri .'/js/custom.js');
	wp_enqueue_script('Hotel_galaxy-animations.min.js',Hotel_galaxy_Template_Dir_Uri .'/js/animations.min.js');
	
}
add_action('wp_enqueue_scripts', 'hotel_galaxy_cssfile'); 
add_action('wp_enqueue_scripts', 'hotel_galaxy_jsfile');
?>