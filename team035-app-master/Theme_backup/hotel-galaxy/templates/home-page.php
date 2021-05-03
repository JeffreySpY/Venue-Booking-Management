<?php 

/*
Template Name: Home Page
*/

 ?>

 <?php get_header(); ?>

<?php 

$hotel_galaxy_default_setting=hotel_galaxy_default_setting(); 
$option = wp_parse_args(get_option( 'hotel_galaxy_option', array() ), $hotel_galaxy_default_setting ); 
?>
<?php 
get_template_part('templates/slider'); 



if($option['room_sec_position']=='S_top'){
	if($option['service_show']==1){
		get_template_part('templates/home-widget');
	}	

	if($option['room_sec_show']==1){
		get_template_part('templates/home-room');
	}	
}else{
	if($option['room_sec_show']==1){
		get_template_part('templates/home-room');
	}	
	if($option['service_show']==1){
		get_template_part('templates/home-widget');
	}	
}



if($option['blog_show']==1){
	get_template_part('templates/home-blogs');
}
if($option['shortcode_show']==1){
	get_template_part('templates/home-shortcode');
}
?>

<?php get_footer(); ?>