<!--Right Sidebar-->
<div class="col-md-4"> 
	<?php if ( is_active_sidebar( 'sidebar-primary' ) ){ dynamic_sidebar( 'sidebar-primary' );      
	
} else  { 
	$args = array(
		'before_widget' => '<div class="sidebar-widget animate" data-anim-type="fadeInUp" data-anim-delay="200">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-title"><h2>',
		'after_title'   => '</h2></div>' );
	the_widget('WP_Widget_Search', null, $args);
	the_widget('WP_Widget_Tag_Cloud', null, $args);
	the_widget('WP_Widget_Recent_Posts', null, $args);
	the_widget('WP_Widget_Categories', null, $args);
	the_widget('WP_Widget_Archives', null, $args);
} ?>
</div>