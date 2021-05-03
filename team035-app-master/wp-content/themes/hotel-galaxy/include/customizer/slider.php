<?php 

/**slider setting start***/ 
$wp_customize->add_section('slider_sec',array(
	'title' => __( 'Slider Options','hotel-galaxy' ),
	'panel'=>'hotel_galaxy_theme_option',
	'capability'=>'edit_theme_options',
	'priority' => 35,			
	));

//slider btn text
$wp_customize->add_setting('hotel_galaxy_option[slider_sec_btn]',array(
	'type'=>'option',
	'default'=>$hotel_galaxy_option['slider_sec_btn'],
	'sanitize_callback'=>'sanitize_text_field',	
	'capability'        => 'edit_theme_options',
	));
$wp_customize->add_control( 'slider_sec_btn', array(
	'label'        => __( 'Button Text', 'hotel-galaxy' ),
	'type'=>'text',
	'section'    => 'slider_sec',	
	'settings'   => 'hotel_galaxy_option[slider_sec_btn]',
	));

/******end*******/

//responsive in smartphone

$wp_customize->add_setting(	'hotel_galaxy_option[slider_smartphone_res]',array(
	'type'    => 'option',
	'default'=>$hotel_galaxy_option['slider_smartphone_res'],	
	'capability'        => 'edit_theme_options',
	'sanitize_callback'=>'sanitize_text_field',	
	)
);
$wp_customize->add_control( 'slider_smartphone_res', array(
	'label'        => __( 'Enable For Slider Responsive in Smartphone.', 'hotel-galaxy' ),
	'type'=>'checkbox',
	'section'    => 'slider_sec',	
	'settings'   => 'hotel_galaxy_option[slider_smartphone_res]',
	) );


for($i=1; $i<=5; $i++){

	$wp_customize->add_setting( "Page_slider_$i",array(
		'sanitize_callback' => 'hotel_galaxy_sanitize_dropdown_pages',
		));

	$wp_customize->add_control( "Page_slider_$i",array(
		'label'           => __( 'Page', 'hotel-galaxy' ) . ' - ' . $i,
		'section'         => 'slider_sec',
		'type'            => 'dropdown-pages',
		'priority'        => 100,			
		));
}

?>