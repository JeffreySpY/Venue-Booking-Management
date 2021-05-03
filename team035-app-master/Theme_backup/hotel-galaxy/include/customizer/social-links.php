<?php 
/**social links start**/

$wp_customize->add_section('social_sec',array(
	'title' => __( 'Social Section','hotel-galaxy' ),
	'panel'=>'hotel_galaxy_theme_option',
	'capability'=>'edit_theme_options',
	'priority' => 36,			
	));

$wp_customize->add_setting(	'hotel_galaxy_option[social_open_new_tab]',array(
	'type'    => 'option',
	'default'=>$hotel_galaxy_option['social_open_new_tab'],
	'sanitize_callback'=>'sanitize_text_field',	
	'capability'        => 'edit_theme_options',
	)
);
$wp_customize->add_control( 'social_open_new_tab', array(
	'label'        => __( 'This Section Link Open New Tab', 'hotel-galaxy' ),
	'type'=>'checkbox',
	'section'    => 'social_sec',
	'settings'   => 'hotel_galaxy_option[social_open_new_tab]',
	) );

/**fb**/

$wp_customize->add_setting('hotel_galaxy_option[facebook_link]',array(
	'type'=>'option',
	'default'=>$hotel_galaxy_option['facebook_link'],	
	'sanitize_callback'=>'esc_url_raw',
	'capability'        => 'edit_theme_options',
	));
$wp_customize->add_control( 'hotel_galaxy_facebook_link', array(
	'label'        => __( 'Facebook', 'hotel-galaxy' ),
	'type'=>'text',
	'section'    => 'social_sec',
	'settings'   => 'hotel_galaxy_option[facebook_link]',
	) );


/**twitter**/
$wp_customize->add_setting('hotel_galaxy_option[twitter_link]',array(
	'type'=>'option',
	'default'=>$hotel_galaxy_option['twitter_link'],
	'sanitize_callback'=>'esc_url_raw',	
	'capability'        => 'edit_theme_options',
	));
$wp_customize->add_control( 'hotel_galaxy_twitter_link', array(
	'label'        => __( 'Twitter', 'hotel-galaxy' ),
	'type'=>'text',
	'section'    => 'social_sec',
	'settings'   => 'hotel_galaxy_option[twitter_link]',
	) );

/**linkedin**/
$wp_customize->add_setting('hotel_galaxy_option[skyup_link]',array(
	'type'=>'option',
	'default'=>$hotel_galaxy_option['skyup_link'],
	'sanitize_callback'=>'esc_url_raw',	
	'capability'        => 'edit_theme_options',
	));
$wp_customize->add_control( 'hotel_galaxy_skyup_link', array(
	'label'        => __( 'Skyup', 'hotel-galaxy' ),
	'type'=>'text',
	'section'    => 'social_sec',
	'settings'   => 'hotel_galaxy_option[skyup_link]',
	) );

/**googleplus**/
$wp_customize->add_setting('hotel_galaxy_option[googleplus_link]',array(
	'type'=>'option',
	'default'=>$hotel_galaxy_option['googleplus_link'],
	'sanitize_callback'=>'esc_url_raw',	
	'capability'        => 'edit_theme_options',
	));
$wp_customize->add_control( 'hotel_galaxy_googleplus_link', array(
	'label'        => __( 'Google-plus', 'hotel-galaxy' ),
	'type'=>'text',
	'section'    => 'social_sec',
	'settings'   => 'hotel_galaxy_option[googleplus_link]',
	) );

/**social links end**/
?>