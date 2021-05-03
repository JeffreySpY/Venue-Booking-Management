<?php
/**Typography setting start***/ 
$wp_customize->add_section('typography_sec',array(
	'title' => __( 'Typography Options','hotel-galaxy' ),
	'panel'=>'hotel_galaxy_theme_option',
	'capability'=>'edit_theme_options',
	'priority' => 35,			
	));

/**google font paste start***/ 
$wp_customize->add_setting('hotel_galaxy_option[google_font]',array(
	'type'=>'option',
	'default'=>$hotel_galaxy_option['google_font'],	
	'sanitize_callback'=>'sanitize_text_field',
	'capability'        => 'edit_theme_options',
	));
$wp_customize->add_control( 'google_font', array(
	'label'        => __( 'Google Font', 'hotel-galaxy' ),
	'description'=>__('<a href="https://fonts.google.com/" target="_blank" >Get Fonts </a><br/> <a href="http://webdzier.com/demo/free-themes/hotel-galaxy/documentation/" target="_blank" >Documentation</a>','hotel-galaxy'),
	'type'=>'text',
	'section'    => 'typography_sec',
	'settings'   => 'hotel_galaxy_option[google_font]',
	'input_attrs' =>array(
		'placeholder' => __( 'Jura','hotel-galaxy' ),
		),
	));
/**address end***/ 

/**Font family start***/ 
$wp_customize->add_setting('hotel_galaxy_option[font_family]',array(
	'type'=>'option',
	'default'=>$hotel_galaxy_option['font_family'],	
	'sanitize_callback'=>'sanitize_text_field',
	'capability'        => 'edit_theme_options',
	));
$wp_customize->add_control( 'font_family', array(
	'label'        => __( 'Font Family', 'hotel-galaxy' ),
	'description'=>__('<a href="https://fonts.google.com/" target="_blank" >Get Fonts </a><br/> <a href="http://webdzier.com/demo/free-themes/hotel-galaxy/documentation/" target="_blank" >Documentation</a>','hotel-galaxy'),
	'type'=>'text',
	'section'    => 'typography_sec',
	'settings'   => 'hotel_galaxy_option[font_family]',
	'input_attrs' =>array(
		'placeholder' => __( 'Jura, sans-serif','hotel-galaxy' ),
		),
	));
/**Reservation Line end***/ 


/**genral setting end***/ 
?>