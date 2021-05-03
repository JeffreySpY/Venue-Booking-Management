<?php 

add_action( 'widgets_init', 'hotel_galaxy_widgets_init');
function hotel_galaxy_widgets_init() {
	/*sidebar*/
	register_sidebar( array(
		'name' => __( 'Sidebar', 'hotel-galaxy' ),
		'id' => 'sidebar-primary',
		'description' => __( 'The primary widget area', 'hotel-galaxy' ),
		'before_widget' => '<div class="sidebar-widget animate" data-anim-type="fadeInUp" data-anim-delay="200">',
		'after_widget' => '</div>',
		'before_title' => '<div class="widget-title"><h2>',
		'after_title' => '</h2></div>'
		) );	

	register_sidebar( array(
		'name' => __( 'Home Services', 'hotel-galaxy' ),
		'id' => 'home-services',
		'description' => __( 'Hotel galaxy Service area', 'hotel-galaxy' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => ''
		) );	

	register_sidebar( array(
		'name' => __( 'Footer Widget Area', 'hotel-galaxy' ),
		'id' => 'footer-widget-area',
		'description' => __( 'footer widget area', 'hotel-galaxy' ),
		'before_widget' => '<div class="col-md-3 clearfix"><div class="footer-widget">',
		'after_widget' => '</div></div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
		) ); 	         
}
?>