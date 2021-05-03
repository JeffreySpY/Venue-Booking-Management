<?php 
add_action( 'after_setup_theme', 'hotel_galaxy_setup' ); 	
function hotel_galaxy_setup()
{
	load_theme_textdomain( 'hotel-galaxy', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links');	
	add_theme_support( 'custom-header', array( 'header-text' => false ) );
	add_theme_support( 'title-tag' );
	add_theme_support('post-thumbnails');
	add_theme_support( 'html5', array(
		'gallery',
		'caption',
		) );

	$args_bg = array(
		'default-color' => '#ffffff',
		);
	add_theme_support( 'custom-background', $args_bg );
	
	/*
	 * Custom logo
	 */
	$args = array(

		'flex-height' => true,
        'flex-width'  => true,
		
		);
	add_theme_support( 'custom-logo', $args );

	

	register_nav_menu( 'primary', __( 'Primary Menu', 'hotel-galaxy' ) );
	if ( ! isset( $content_width ) ) $content_width = 900;
	
	get_template_part('include/default','settings');
	$hotel_galaxy_option=hotel_galaxy_default_setting();	
}

function hotel_galaxy_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'hotel_galaxy_custom_header_args', array(
		'default-text-color'     => '#fff',
		'width'                  => 1600,
		'height'                 => 200,
		'wp-head-callback'       => 'hotel_galaxy_header_style',
		
		) ) );
}
add_action( 'after_setup_theme', 'hotel_galaxy_custom_header_setup' );


if ( ! function_exists( 'hotel_galaxy_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see hotel_galaxy_custom_header_setup().
 */
function hotel_galaxy_header_style() {
	
	?>
	<style type="text/css">
	<?php
		//Check if user has defined any header image.
	if ( get_header_image() !== '') :
		?>
	.header_bg {
		background: url(<?php echo esc_url( get_header_image() ); ?>) no-repeat;
		background-position: center top;
		background-size: cover;
	}
	<?php endif; ?>	
	</style>
	<?php
}
endif;


?>