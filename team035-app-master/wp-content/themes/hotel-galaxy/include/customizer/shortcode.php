<?php 
/*****Blog section******/

$wp_customize->add_section('shortcode_sec',array(
	'title' => __( 'Shortcode Section','hotel-galaxy' ),
	'description' => '',
	'panel'=>'hotel_galaxy_theme_option',
	'capability'=>'edit_theme_options',
	'priority' => 37,			
	));

//section show or hide
$wp_customize->add_setting(	'hotel_galaxy_option[shortcode_show]',array(
	'type'    => 'option',
	'default'=>$hotel_galaxy_option['shortcode_show'],
	'sanitize_callback'=>'sanitize_text_field',	
	'capability'        => 'edit_theme_options',
	)
);
$wp_customize->add_control( 'shortcode_show', array(
	'label'        => __( 'Show Shortcode Section', 'hotel-galaxy' ),
	'type'=>'checkbox',
	'section'    => 'shortcode_sec',
	'settings'   => 'hotel_galaxy_option[shortcode_show]',
	) );

//Blog title
$wp_customize->add_setting('hotel_galaxy_option[shortcode_title]',array(
	'type'=>'option',
	'default'=>$hotel_galaxy_option['shortcode_title'],	
	'sanitize_callback'=>'hotel_galaxy_sanitize_text',
	'capability'        => 'edit_theme_options',
	));
$wp_customize->add_control( 'shortcode_title', array(
	'label'        => __( 'Shortcode Section Title', 'hotel-galaxy' ),
	'type'=>'text',
	'section'    => 'shortcode_sec',
	'settings'   => 'hotel_galaxy_option[shortcode_title]',
	));

//contact form 7 shortcode
$wp_customize->add_setting('hotel_galaxy_option[shortcode_echo]',array(
	'type'=>'option',
	'default'=>$hotel_galaxy_option['shortcode_echo'],	
	'sanitize_callback'=>'sanitize_text_field',
	'capability'        => 'edit_theme_options',
	));
$wp_customize->add_control( 'shortcode_echo', array(
	'label'        => __( 'Contact Form 7 Shortcode', 'hotel-galaxy' ),
	'type'=>'text',
	'section'    => 'shortcode_sec',
	'settings'   => 'hotel_galaxy_option[shortcode_echo]',
	));


?>