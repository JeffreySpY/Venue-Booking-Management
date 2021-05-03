<?php 
$wp_customize->add_section('footer_collout_sec',array(
	'title' => __( 'Footer Callout','hotel-galaxy' ),
	'panel'=>'hotel_galaxy_theme_option',
	'capability'=>'edit_theme_options',
	'priority' => 41,			
	));


/*****footer collout start*******/


/*****icon 1 start*******/

/******hr start*******/
$wp_customize->add_setting( 'footercollout1', array(
	'default'        => '',
	'sanitize_callback'=>'sanitize_text_field',	
	) );

$wp_customize->add_control( new hotel_galaxy_setting_separate( $wp_customize, 'footercollout1', array(	
	'section' => 'footer_collout_sec',
	'type'     => 'hr_tag',
	'label'=>__( 'Icon 1', 'hotel-galaxy' ),
	) ) );

/******hr end*******/

/*****collout title  start*******/
$wp_customize->add_setting('hotel_galaxy_option[footer_collout_title_1]',array(
	'type'=>'option',
	'default'=>esc_attr($hotel_galaxy_option['footer_collout_title_1']),
	'sanitize_callback'=>'sanitize_text_field',		
	'capability'        => 'edit_theme_options',
	));
$wp_customize->add_control( 'hotel_galaxy_footer_collout_title_1', array(
	'label'        => __( 'Footer Callout Title 1', 'hotel-galaxy' ),
	'type'=>'text',
	'section'    => 'footer_collout_sec',
	'settings'   => 'hotel_galaxy_option[footer_collout_title_1]',
	) );

/*****collout title end*******/

/*****icon start*******/
$wp_customize->add_setting('hotel_galaxy_option[footer_collout_icon_1]',array(
	'type'=>'option',
	'default'=>esc_attr($hotel_galaxy_option['footer_collout_icon_1']),
	'sanitize_callback'=>'sanitize_text_field',		
	'capability'        => 'edit_theme_options',
	));
$wp_customize->add_control( 'hotel_galaxy_footer_collout_icon_1', array(
	'label'        => __( 'Footer Collout Icon 1', 'hotel-galaxy' ),
	'description'=>__('<a href="http://fontawesome.bootstrapcheatsheets.com">FontAwesome Icons</a>','hotel-galaxy'),
	'type'=>'text',
	'section'    => 'footer_collout_sec',
	'settings'   => 'hotel_galaxy_option[footer_collout_icon_1]',
	) );

/*****icon end*******/

/*****link start*******/
$wp_customize->add_setting('hotel_galaxy_option[footer_collout_link_1]',array(
	'type'=>'option',
	'default'=>esc_attr($hotel_galaxy_option['footer_collout_link_1']),
	'sanitize_callback'=>'esc_url_raw',		
	'capability'        => 'edit_theme_options',
	));
$wp_customize->add_control( 'hotel_galaxy_footer_collout_link_1', array(
	'label'        => __( 'Footer Collout Link 1', 'hotel-galaxy' ),
	'type'=>'text',
	'section'    => 'footer_collout_sec',
	'settings'   => 'hotel_galaxy_option[footer_collout_link_1]',
	) );

/*****link end*******/

/*****icon 1 end*******/

/*****icon 2 start*******/

/******hr start*******/
$wp_customize->add_setting( 'footercollout2', array(
	'default'        => '',
	'sanitize_callback'=>'sanitize_text_field',	
	) );

$wp_customize->add_control( new hotel_galaxy_setting_separate( $wp_customize, 'footercollout2', array(	
	'section' => 'footer_collout_sec',
	'type'     => 'hr_tag',
	'label'=>__( 'Icon 2', 'hotel-galaxy' ),
	) ) );

/******hr end*******/

/*****collout title  start*******/
$wp_customize->add_setting('hotel_galaxy_option[footer_collout_title_2]',array(
	'type'=>'option',
	'default'=>esc_attr($hotel_galaxy_option['footer_collout_title_2']),
	'sanitize_callback'=>'sanitize_text_field',		
	'capability'        => 'edit_theme_options',
	));
$wp_customize->add_control( 'hotel_galaxy_footer_collout_title_2', array(
	'label'        => __( 'Footer Callout Title 2', 'hotel-galaxy' ),
	'type'=>'text',
	'section'    => 'footer_collout_sec',
	'settings'   => 'hotel_galaxy_option[footer_collout_title_2]',
	) );

/*****collout title end*******/

/*****icon start*******/
$wp_customize->add_setting('hotel_galaxy_option[footer_collout_icon_2]',array(
	'type'=>'option',
	'default'=>esc_attr($hotel_galaxy_option['footer_collout_icon_2']),
	'sanitize_callback'=>'sanitize_text_field',		
	'capability'        => 'edit_theme_options',
	));
$wp_customize->add_control( 'hotel_galaxy_footer_collout_icon_2', array(
	'label'        => __( 'Footer Collout Icon 2', 'hotel-galaxy' ),
	'description'=>__('<a href="http://fontawesome.bootstrapcheatsheets.com">FontAwesome Icons</a>','hotel-galaxy'),
	'type'=>'text',
	'section'    => 'footer_collout_sec',
	'settings'   => 'hotel_galaxy_option[footer_collout_icon_2]',
	) );

/*****icon end*******/

/*****link start*******/
$wp_customize->add_setting('hotel_galaxy_option[footer_collout_link_2]',array(
	'type'=>'option',
	'default'=>esc_attr($hotel_galaxy_option['footer_collout_link_2']),
	'sanitize_callback'=>'esc_url_raw',		
	'capability'        => 'edit_theme_options',
	));
$wp_customize->add_control( 'hotel_galaxy_footer_collout_link_2', array(
	'label'        => __( 'Footer Collout Link 2', 'hotel-galaxy' ),
	'type'=>'text',
	'section'    => 'footer_collout_sec',
	'settings'   => 'hotel_galaxy_option[footer_collout_link_2]',
	) );

/*****link end*******/

/*****icon 2 end*******/

/*****icon 3 start*******/

/******hr start*******/
$wp_customize->add_setting( 'footercollout3', array(
	'default'        => '',
	'sanitize_callback'=>'sanitize_text_field',	
	) );

$wp_customize->add_control( new hotel_galaxy_setting_separate( $wp_customize, 'footercollout3', array(	
	'section' => 'footer_collout_sec',
	'type'     => 'hr_tag',
	'label'=>__( 'Icon 3', 'hotel-galaxy' ),
	) ) );

/******hr end*******/

/*****collout title  start*******/
$wp_customize->add_setting('hotel_galaxy_option[footer_collout_title_3]',array(
	'type'=>'option',
	'default'=>esc_attr($hotel_galaxy_option['footer_collout_title_3']),
	'sanitize_callback'=>'sanitize_text_field',		
	'capability'        => 'edit_theme_options',
	));
$wp_customize->add_control( 'hotel_galaxy_footer_collout_title_3', array(
	'label'        => __( 'Footer Callout Title 3', 'hotel-galaxy' ),
	'type'=>'text',
	'section'    => 'footer_collout_sec',
	'settings'   => 'hotel_galaxy_option[footer_collout_title_3]',
	) );

/*****collout title end*******/

/*****icon start*******/
$wp_customize->add_setting('hotel_galaxy_option[footer_collout_icon_3]',array(
	'type'=>'option',
	'default'=>esc_attr($hotel_galaxy_option['footer_collout_icon_3']),
	'sanitize_callback'=>'sanitize_text_field',		
	'capability'        => 'edit_theme_options',
	));
$wp_customize->add_control( 'hotel_galaxy_footer_collout_icon_3', array(
	'label'        => __( 'Footer Collout Icon 3', 'hotel-galaxy' ),
	'description'=>__('<a href="http://fontawesome.bootstrapcheatsheets.com">FontAwesome Icons</a>','hotel-galaxy'),
	'type'=>'text',
	'section'    => 'footer_collout_sec',
	'settings'   => 'hotel_galaxy_option[footer_collout_icon_3]',
	) );

/*****icon end*******/

/*****link start*******/
$wp_customize->add_setting('hotel_galaxy_option[footer_collout_link_3]',array(
	'type'=>'option',
	'default'=>esc_attr($hotel_galaxy_option['footer_collout_link_3']),
	'sanitize_callback'=>'esc_url_raw',		
	'capability'        => 'edit_theme_options',
	));
$wp_customize->add_control( 'hotel_galaxy_footer_collout_link_3', array(
	'label'        => __( 'Footer Collout Link 3', 'hotel-galaxy' ),
	'type'=>'text',
	'section'    => 'footer_collout_sec',
	'settings'   => 'hotel_galaxy_option[footer_collout_link_3]',
	) );

/*****link end*******/

/*****icon 3 end*******/

/*****icon 4 start*******/

/******hr start*******/
$wp_customize->add_setting( 'footercollout4', array(
	'default'        => '',
	'sanitize_callback'=>'sanitize_text_field',	
	) );

$wp_customize->add_control( new hotel_galaxy_setting_separate( $wp_customize, 'footercollout4', array(	
	'section' => 'footer_collout_sec',
	'type'     => 'hr_tag',
	'label'=>__( 'Icon 4', 'hotel-galaxy' ),
	) ) );

/******hr end*******/

/*****collout title  start*******/
$wp_customize->add_setting('hotel_galaxy_option[footer_collout_title_4]',array(
	'type'=>'option',
	'default'=>esc_attr($hotel_galaxy_option['footer_collout_title_4']),
	'sanitize_callback'=>'sanitize_text_field',		
	'capability'        => 'edit_theme_options',
	));
$wp_customize->add_control( 'hotel_galaxy_footer_collout_title_4', array(
	'label'        => __( 'Footer Callout Title 4', 'hotel-galaxy' ),
	'type'=>'text',
	'section'    => 'footer_collout_sec',
	'settings'   => 'hotel_galaxy_option[footer_collout_title_4]',
	) );

/*****collout title end*******/

/*****icon start*******/
$wp_customize->add_setting('hotel_galaxy_option[footer_collout_icon_4]',array(
	'type'=>'option',
	'default'=>esc_attr($hotel_galaxy_option['footer_collout_icon_4']),
	'sanitize_callback'=>'sanitize_text_field',		
	'capability'        => 'edit_theme_options',
	));
$wp_customize->add_control( 'hotel_galaxy_footer_collout_icon_4', array(
	'label'        => __( 'Footer Collout Icon 4', 'hotel-galaxy' ),
	'description'=>__('<a href="http://fontawesome.bootstrapcheatsheets.com">FontAwesome Icons</a>','hotel-galaxy'),
	'type'=>'text',
	'section'    => 'footer_collout_sec',
	'settings'   => 'hotel_galaxy_option[footer_collout_icon_4]',
	) );

/*****icon end*******/

/*****link start*******/
$wp_customize->add_setting('hotel_galaxy_option[footer_collout_link_4]',array(
	'type'=>'option',
	'default'=>esc_attr($hotel_galaxy_option['footer_collout_link_4']),
	'sanitize_callback'=>'esc_url_raw',		
	'capability'        => 'edit_theme_options',
	));
$wp_customize->add_control( 'hotel_galaxy_footer_collout_link_4', array(
	'label'        => __( 'Footer Collout Link 4', 'hotel-galaxy' ),
	'type'=>'text',
	'section'    => 'footer_collout_sec',
	'settings'   => 'hotel_galaxy_option[footer_collout_link_4]',
	) );

/*****link end*******/

/*****icon 4 end*******/

/*****footer collout end*******/

 ?>