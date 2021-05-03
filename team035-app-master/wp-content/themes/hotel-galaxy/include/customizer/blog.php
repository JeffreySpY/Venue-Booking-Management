<?php 
/*****Blog section******/

$wp_customize->add_section('blog_sec',array(
	'title' => __( 'Blog Section','hotel-galaxy' ),
	'description' => '',
	'panel'=>'hotel_galaxy_theme_option',
	'capability'=>'edit_theme_options',
	'priority' => 37,			
	));

//section show or hide
$wp_customize->add_setting(	'hotel_galaxy_option[blog_show]',array(
	'type'    => 'option',
	'default'=>$hotel_galaxy_option['blog_show'],
	'sanitize_callback'=>'sanitize_text_field',	
	'capability'        => 'edit_theme_options',
	)
);
$wp_customize->add_control( 'blog_show', array(
	'label'        => __( 'Show Blog Section', 'hotel-galaxy' ),
	'type'=>'checkbox',
	'section'    => 'blog_sec',
	'settings'   => 'hotel_galaxy_option[blog_show]',
	) );

//Blog title
$wp_customize->add_setting('hotel_galaxy_option[blog_title]',array(
	'type'=>'option',
	'default'=>$hotel_galaxy_option['blog_title'],	
	'sanitize_callback'=>'hotel_galaxy_sanitize_text',
	'capability'        => 'edit_theme_options',
	));
$wp_customize->add_control( 'blog_title', array(
	'label'        => __( 'Blog Section Title', 'hotel-galaxy' ),
	'type'=>'text',
	'section'    => 'blog_sec',
	'settings'   => 'hotel_galaxy_option[blog_title]',
	));

//how many latest blog show
$wp_customize->add_setting('hotel_galaxy_option[blog_latest]',array(
	'type'=>'option',
	'default'=>$hotel_galaxy_option['blog_latest'],	
	'sanitize_callback'=>'sanitize_text_field',
	'capability'        => 'edit_theme_options',
	));
$wp_customize->add_control( 'blog_latest', array(
	'label'        => __( 'Latest Blog Show', 'hotel-galaxy' ),
	'type'=>'number',
	'section'    => 'blog_sec',
	'settings'   => 'hotel_galaxy_option[blog_latest]',
	));

/**blog bg section**/

$wp_customize->add_setting('hotel_galaxy_option[blog_section_bg]',array(
	'type'=>'option',
	'default'=>$hotel_galaxy_option['blog_section_bg'],	
	'sanitize_callback'=>'esc_url_raw',	
	'capability'        => 'edit_theme_options'
	));

$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'blog_section_bg',array(
	'label'=>__('BG Image.','hotel-galaxy'),
	'section'=>'blog_sec',
	'settings'=>'hotel_galaxy_option[blog_section_bg]'
	)));

/******image 1 end*******/
?>