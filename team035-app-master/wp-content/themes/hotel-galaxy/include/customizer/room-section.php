<?php 
/*****Services section******/

$wp_customize->add_section('room_sec',array(
	'title' => __( 'Room Section','hotel-galaxy' ),
	'description'=>__('<a href="https://webdzier.com/demo/free-themes/hotel-galaxy/use-rooms-section/" target="_blank" >Room Add Documentation  </a>','hotel-galaxy'),
	'panel'=>'hotel_galaxy_theme_option',
	'capability'=>'edit_theme_options',
	'priority' => 37,			
	));

//section show or hide
$wp_customize->add_setting(	'hotel_galaxy_option[room_sec_show]',array(
	'type'    => 'option',
	'default'=>$hotel_galaxy_option['room_sec_show'],	
	'capability'        => 'edit_theme_options',
	'sanitize_callback'=>'sanitize_text_field',	
	)
);
$wp_customize->add_control( 'room_sec_show', array(
	'label'        => __( 'Show This Section', 'hotel-galaxy' ),
	'type'=>'checkbox',
	'section'    => 'room_sec',	
	'settings'   => 'hotel_galaxy_option[room_sec_show]',
	) );


/**Room sec title color**/

$wp_customize->add_setting(
	'hotel_galaxy_option[room_sec_titleColor]', array(
		'capability'     => 'edit_theme_options',
		'default' => esc_attr($hotel_galaxy_option['room_sec_titleColor']),
		'type' => 'option',	
		'sanitize_callback'=>'sanitize_text_field',	
		)
	);

$wp_customize->add_control(	new WP_Customize_Color_Control(	$wp_customize,'hotel_galaxy_option[room_sec_titleColor]', 
	array(
		'label'      => __( 'Title color', 'hotel-galaxy' ),
		'section'    => 'room_sec',			
		'settings'   => 'hotel_galaxy_option[room_sec_titleColor]',
		) ) 
);



/******end*******/

/**Room sec bg color**/

$wp_customize->add_setting(
	'hotel_galaxy_option[room_sec_bgColor]', array(
		'capability'     => 'edit_theme_options',
		'default' => esc_attr($hotel_galaxy_option['room_sec_bgColor']),
		'type' => 'option',
		'sanitize_callback'=>'sanitize_text_field',
		)
	);

$wp_customize->add_control(	new WP_Customize_Color_Control( 
	$wp_customize, 
	'hotel_galaxy_option[room_sec_bgColor]', 
	array(
		'label'      => __( 'Room Section Bg color', 'hotel-galaxy' ),
		'section'    => 'room_sec',
		'settings'   => 'hotel_galaxy_option[room_sec_bgColor]',
		) ) 
);



/******end*******/

//Room title
$wp_customize->add_setting('hotel_galaxy_option[room_sec_title]',array(
	'type'=>'option',
	'default'=>$hotel_galaxy_option['room_sec_title'],
	'sanitize_callback'=>'hotel_galaxy_sanitize_text',	
	'capability'        => 'edit_theme_options',
	));
$wp_customize->add_control( 'room_sec_title', array(
	'label'        => __( 'Room Section Title', 'hotel-galaxy' ),
	'type'=>'text',
	'section'    => 'room_sec',	
	'settings'   => 'hotel_galaxy_option[room_sec_title]',
	));

/******end*******/

//Room btn text
$wp_customize->add_setting('hotel_galaxy_option[room_sec_btn]',array(
	'type'=>'option',
	'default'=>$hotel_galaxy_option['room_sec_btn'],
	'sanitize_callback'=>'sanitize_text_field',	
	'capability'        => 'edit_theme_options',
	));
$wp_customize->add_control( 'room_sec_btn', array(
	'label'        => __( 'Button Text', 'hotel-galaxy' ),
	'type'=>'text',
	'section'    => 'room_sec',	
	'settings'   => 'hotel_galaxy_option[room_sec_btn]',
	));

/******end*******/


// room cat
$wp_customize->add_setting('hotel_galaxy_option[entertainment_type]',array(
	'default' =>$hotel_galaxy_option['room_cat'],
	'capability'     => 'edit_theme_options',
	'sanitize_callback' => 'hotel_galaxy_room_sanitize',
	'type'=>'option',
	) );

$wp_customize->add_control( new hotel_galaxy_category_dropdown_custom_control( $wp_customize, 'hotel_galaxy_option[entertainment_type]', array(
	'label'   => __('Select category to show rooms','hotel-galaxy'),
	'section' => 'room_sec',
	'settings'   =>  'hotel_galaxy_option[room_cat]',
	) ) );

/**top bottom show**/

$wp_customize->add_setting( 'hotel_galaxy_option[room_sec_position]' , array(
	'default'    => $hotel_galaxy_option['room_sec_position'],
	'sanitize_callback' => 'sanitize_text_field',
	'type'=>'option'
	));

$wp_customize->add_control( 'hotel_galaxy_option[room_sec_position]' , array(
	'label' => __('Section Position','hotel-galaxy'),
	'section' => 'room_sec',
	'type'=>'select',
	'choices'=> array(
		'R_top' => __( 'Room Sec Top / Services Sec Bottom', 'hotel-galaxy'),
		'S_top' => __( 'Services Sec Top / Room Sec Bottom','hotel-galaxy' ),
		),
	) );

	?>
