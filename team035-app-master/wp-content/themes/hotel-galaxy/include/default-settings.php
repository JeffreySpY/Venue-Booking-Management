<?php 
function hotel_galaxy_default_setting()
{
	return $hotel_galaxy_option=array(
		'header_hide' =>true,
		'address'=>'',
		'reservation_line'=>'',

		'google_font'=>'',
		'font_family'=>'',
		'room_sec_show'=>__('1', 'hotel-galaxy' ),
		'room_sec_title'=>'',
		'room_sec_titleColor'=>'#242424',
		'room_sec_bgColor'=>'#f6f6f6',
		'room_cat'=>'',
		'room_sec_btn'=>'Book Now',
		'room_sec_position'=>'S_top',

		'blog_show'=>__('1', 'hotel-galaxy' ),
		'blog_latest'=>__('3', 'hotel-galaxy' ),
		'service_show'=>__('1', 'hotel-galaxy' ),
		'shortcode_show'=>__('1', 'hotel-galaxy' ),
		'social_open_new_tab'=>__('1', 'hotel-galaxy' ),
		
		'facebook_link'=>'',		
		'twitter_link'=>'',
		'skyup_link'=>'',
		'googleplus_link'=>'',

		'service_title'=>'',
		'blog_title'=>'',
		'shortcode_title'=>'',
		'shortcode_echo'=>'',

		'page_title_bg'=>Hotel_galaxy_Template_Dir_Uri.'/images/page-title.jpg',

		'blog_section_bg'=>Hotel_galaxy_Template_Dir_Uri.'/images/page-title.jpg',

		'slider_sec_btn'=>'Book Now',
		'slider_smartphone_res'=>true,

		'footer_collout_title_1'=>'',
		'footer_collout_icon_1'=>'',
		'footer_collout_link_1'=>'',

		'footer_collout_title_2'=>'',
		'footer_collout_icon_2'=>'',
		'footer_collout_link_2'=>'',

		'footer_collout_title_3'=>'',
		'footer_collout_icon_3'=>'',
		'footer_collout_link_3'=>'',

		'footer_collout_title_4'=>'',
		'footer_collout_icon_4'=>'',
		'footer_collout_link_4'=>'',

		'hotel_galaxy_copyright'=>'',
		'hotel_galaxy_developed_by_text' =>'',
		'developed_by' => '',
		'developed_by_link' => '#',
		);
}

if ( ! function_exists( 'hotel_galaxy_get_option' ) ) :

	/**
	 * Get theme option.
	 *
	 * @since 1.0.0
	 *
	 * @param string $key Option key.
	 * @return mixed Option value.
	 */
function hotel_galaxy_get_option( $key ) {

	if ( empty( $key ) ) {
		return;
	}

	$value = '';

	$default = hotel_galaxy_default_setting();
	$default_value = null;
	
	if ( is_array( $default ) && isset( $default[ $key ] ) ) {
		$default_value = $default[ $key ];
	}

	if ( null !== $default_value ) {
		$value = get_theme_mod( $key, $default_value );
	}
	else {
		$value = get_theme_mod( $key );
	}

	return $value;

}
endif;

if ( ! function_exists( 'hotel_galaxy_get_slider_details' ) ) :

	/**
	 * Slider details.
	 *
	 * @since 1.0.0
	 *
	 * @return array Slider details.
	 */
function hotel_galaxy_get_slider_details() {

	$output = array();

	$slider_number = 5;

	$page_ids = array();

	for ( $i = 1; $i <= $slider_number ; $i++ ) {

		$page_id = hotel_galaxy_get_option( "Page_slider_$i" );

		if ( absint( $page_id ) > 0 ) {

			$page_ids[] = absint( $page_id );
		}
	}

	if ( empty( $page_ids ) ) {
		return $output;
	}

/*
	$query_args = array(
		'posts_per_page' => count( $page_ids ),
		'orderby'        => 'post__in',
		'post_type'      => 'page',
		'post__in'       => $page_ids,
		'meta_query'     => array(
			array( 'key' => '_thumbnail_id' ),
			),
		);
*/

    $args = array(
    'post_type' => 'venue',
    'posts_per_page' => 4,
	'orderby' => 'date',
	'category_name'=>'featured-venue'
	);

	$posts = get_posts(  $args );	

	if ( ! empty( $posts ) ) {
		$p_count = 0;
		foreach ( $posts as $post ) {
			if ( has_post_thumbnail( $post->ID ) ) {
				$image_array = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'home_slider_img' );
				$output[ $p_count ]['image_url'] = $image_array[0];
				$output[ $p_count ]['title']     = $post->post_title;
				$output[ $p_count ]['url']       = get_permalink( $post->ID );
				$output[ $p_count ]['excerpt']   = hotel_galaxy_get_the_excerpt( 32, $post );
				$p_count++;
			}
		}
	}

	return $output;
}

endif;

if ( ! function_exists( 'hotel_galaxy_get_the_excerpt' ) ) :

	/**
	 * Returns post excerpt.
	 *
	 * @since 1.0.0
	 *
	 * @param int     $length      Excerpt length in words.
	 * @param WP_Post $post_object The post object.
	 * @return string Post excerpt.
	 */
function hotel_galaxy_get_the_excerpt( $length = 0, $post_object = null ) {
	global $post;

	if ( is_null( $post_object ) ) {
		$post_object = $post;
	}

	$length = absint( $length );
	if ( 0 === $length ) {
		return;
	}



	$source_content = $post_object->post_content;

	if ( ! empty( $post_object->post_excerpt ) ) {
		$source_content = $post_object->post_excerpt;
	}

	$source_content = strip_shortcodes( $source_content );
	$trimmed_content = wp_trim_words( $source_content, $length, '...' );
	return $trimmed_content;
}

endif;
?>