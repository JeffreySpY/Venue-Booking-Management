<?php 
/*
	Template Name:Page Full-width
*/
	get_header();
	if(!is_front_page()){
		get_template_part('breadcrums');
	}

	hotel_galaxy_template_left_full_width('full-width');
	?>	
	<?php get_footer(); ?>