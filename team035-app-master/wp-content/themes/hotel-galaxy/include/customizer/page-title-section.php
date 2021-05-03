<?php 
/*****page title******/

$wp_customize->add_section('pagetitle_sec',array(
	'title' => __( 'Page Title Section','hotel-galaxy' ),
	'description' => '',
	'panel'=>'hotel_galaxy_theme_option',
	'capability'=>'edit_theme_options',
	'priority' => 37,			
	));

$wp_customize->add_setting('hotel_galaxy_option[page_title_bg]',array(
	'type'=>'option',
	'default'=>$hotel_galaxy_option['page_title_bg'],	
	'sanitize_callback'=>'esc_url_raw',	
	'capability'        => 'edit_theme_options'
	));

$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'page_title_bg',array(
	'label'=>__('Page Title Bg.','hotel-galaxy'),
	'section'=>'pagetitle_sec',
	'settings'=>'hotel_galaxy_option[page_title_bg]'
	)));

/******image 1 end*******/
?>