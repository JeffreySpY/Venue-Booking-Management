<?php 

if (!function_exists('hotel_galaxy_info_page')) {
	function hotel_galaxy_info_page() {
		$page=add_theme_page(__('Hotel-Galaxy', 'hotel-galaxy'), __('About Theme', 'hotel-galaxy'), 'edit_theme_options', 'hotel-galaxy', 'hotel_galaxy_theme_info_page');
		add_action('admin_print_styles-'.$page, 'hotel_galaxy_admin_info');
	
	}
}
add_action('admin_menu', 'hotel_galaxy_info_page');




function hotel_galaxy_admin_info(){
	wp_enqueue_style('bootstrap_admin',get_template_directory_uri() . '/css/bootstrap.css');
	wp_enqueue_style('font-awesome_admin',get_template_directory_uri() . '/css/font-awesome-4.5.0/css/font-awesome.min.css');
	
}

function hotel_galaxy_theme_info_page(){

	require_once( get_template_directory() . '/include/admin/about_theme.php' );
}
?>