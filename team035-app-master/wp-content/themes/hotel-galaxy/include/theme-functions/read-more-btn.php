<?php 
/****read more text empty*****/


/****read more text set*****/
function hotel_galaxy_excerpt_morebtn( $more ) {
	$morebtn='';
	if(!is_single()){
		$morebtn= '<div class="" ><a class="custom-btn book-sm" href="' . esc_url(get_permalink( get_the_ID() )) . '"><i class="fa fa-chevron-circle-right"></i>' . __( 'Read More', 'hotel-galaxy' ) . '</a></div>';
	}
	return $morebtn; 
}	
add_filter( 'excerpt_more', 'hotel_galaxy_excerpt_morebtn' );
?>