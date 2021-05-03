<?php 
$wp_customize->add_section('footer_sec',array(
	'title' => __( 'Footer Options','hotel-galaxy' ),
	'panel'=>'hotel_galaxy_theme_option',
	'capability'=>'edit_theme_options',
	'priority' => 42,			
	));





/*****footer developed by start******/


$wp_customize->add_setting('hotel_galaxy_option[hotel_galaxy_copyright]',array(
	'type'=>'option',
	'default'=>esc_attr($hotel_galaxy_option['hotel_galaxy_copyright']),
	'sanitize_callback'=>'sanitize_text_field',		
	'capability'        => 'edit_theme_options',
	));
$wp_customize->add_control( 'hotel_galaxy_hotel_galaxy_copyright', array(
	'label'        => __( 'Copyright Text', 'hotel-galaxy' ),
	'type'=>'text',
	'section'    => 'footer_sec',
	'settings'   => 'hotel_galaxy_option[hotel_galaxy_copyright]',
	) );

$wp_customize->add_setting('hotel_galaxy_option[developed_by]',array(
	'type'=>'option',
	'default'=>esc_attr($hotel_galaxy_option['developed_by']),	
	'sanitize_callback'=>'sanitize_text_field',	
	'capability'        => 'edit_theme_options',
	));
$wp_customize->add_control( 'hotel_galaxy_developed_by', array(
	'label'        => __( 'Developed By', 'hotel-galaxy' ),
	'type'=>'text',
	'section'    => 'footer_sec',
	'settings'   => 'hotel_galaxy_option[developed_by]',
	) );

$wp_customize->add_setting('hotel_galaxy_option[hotel_galaxy_developed_by_text]',array(
	'type'=>'option',
	'default'=>esc_attr($hotel_galaxy_option['hotel_galaxy_developed_by_text']),
	'sanitize_callback'=>'sanitize_text_field',		
	'capability'        => 'edit_theme_options',
	));
$wp_customize->add_control( 'hotel_galaxy_hotel_galaxy_developed_by_text', array(
	'label'        => __( 'Developed By Text', 'hotel-galaxy' ),
	'type'=>'text',
	'section'    => 'footer_sec',
	'settings'   => 'hotel_galaxy_option[hotel_galaxy_developed_by_text]',
	) );



$wp_customize->add_setting('hotel_galaxy_option[developed_by_link]',array(
	'type'=>'option',
	'default'=>esc_attr($hotel_galaxy_option['developed_by_link']),
	'sanitize_callback'=>'sanitize_text_field',		
	'capability'        => 'edit_theme_options',
	));
$wp_customize->add_control( 'hotel_galaxy_developed_by_link', array(
	'label'        => __( 'Developed By Link', 'hotel-galaxy' ),
	'type'=>'text',
	'section'    => 'footer_sec',
	'settings'   => 'hotel_galaxy_option[developed_by_link]',
	) );

/*****footer developed by end******/

/*****footer developed by end******/
 ?>