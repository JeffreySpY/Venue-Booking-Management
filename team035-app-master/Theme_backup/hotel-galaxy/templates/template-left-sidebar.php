<?php 
/*
	Template Name:Page Left-Sidebar
*/
	get_header();
	if(!is_front_page()){
		get_template_part('breadcrums');
	}
	hotel_galaxy_template_left_full_width('left-sidebar');
	?>	
	<?php get_footer(); ?>