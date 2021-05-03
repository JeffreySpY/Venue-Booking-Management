<?php 

/**
* 
*/
if ( ! defined( 'ABSPATH' ) ) exit;
class hotel_galaxy_notice_bord
{
	
	function __construct()
	{
		
		add_action( 'admin_notices', array(&$this,'hotel_galaxy_review_notice') );
		add_action( 'wp_ajax_hotel_galaxy_dismiss_review', array(&$this,'hotel_galaxy_dismiss_review') );
	}

	
	function hotel_galaxy_review_notice(){
		$review = get_option( 'hotel_galaxy_review_data' );
		//print_r($review);
		$time	= time();
		$load	= false;
		if ( ! $review ) {
			$review = array(
				'time' 		=> $time,
				'dismissed' => false
				);
			add_option('hotel_galaxy_review_data', $review);
		//$load = true;
		} else {
		// Check if it has been dismissed or not.
			if ( (isset( $review['dismissed'] ) && ! $review['dismissed']) && (isset( $review['time'] ) && (($review['time'] + (DAY_IN_SECONDS * 4)) <= $time)) ) {
				$load = true;
			}
		}
	// If we cannot load, return early.
		if ( ! $load ) {
			return;
		}

	// We have a candidate! Output a review message.
		?>	
		<div class="notice notice-success is-dismissible notice-box">

			<p style="font-size:16px;">'<?php _e( 'Hi! We saw you have been using', 'hotel-galaxy' ); ?> <strong><?php _e( 'Hotel Galaxy Theme', 'hotel-galaxy' ); ?></strong> <?php _e( 'for a few days and wanted to ask for your help to', 'hotel-galaxy' ); ?> <strong><?php _e( 'make the theme better', 'hotel-galaxy' ); ?></strong><?php _e( '.We just need a minute of your time to rate the theme. Thank you!', 'hotel-galaxy' ); ?></p>
			<p style="font-size:16px;"><strong><?php _e( '~ Webdzier', 'hotel-galaxy' ); ?></strong></p>
			<p style="font-size:17px;"> 
				<a style="color: #fff;background: #ef4238;padding: 5px 7px 4px 6px;border-radius: 4px;" href="<?php echo esc_url('https://wordpress.org/support/theme/hotel-galaxy/reviews/?filter=5');  ?>" class="hotelgalaxy-dismiss-review-notice review-out" target="_blank" rel="noopener"><?php _e('Rate the theme','hotel-galaxy') ?></a>&nbsp; &nbsp;
				<a style="color: #fff;background: #27d63c;padding: 5px 7px 4px 6px;border-radius: 4px;" href="#"  class="hotelgalaxy-dismiss-review-notice rate-later" target="_self" rel="noopener"><?php _e( 'Nope, maybe later', 'hotel-galaxy' ); ?></a>&nbsp; &nbsp;
				<a style="color: #fff;background: #31a3dd;padding: 5px 7px 4px 6px;border-radius: 4px;" href="#" class="hotelgalaxy-dismiss-review-notice already-rated" target="_self" rel="noopener"><?php _e( 'I already did', 'hotel-galaxy' ); ?></a>
			</p>
		</div>
		<script type="text/javascript">
		jQuery(function($){
			jQuery(document).on("click",'.hotelgalaxy-dismiss-review-notice',function(){
				if ( $(this).hasClass('review-out') ) {
					var hotelgalaxy_rate_data_val = "1";
				}
				if ( $(this).hasClass('rate-later') ) {
					var hotelgalaxy_rate_data_val =  "2";
					event.preventDefault();
				}
				if ( $(this).hasClass('already-rated') ) {
					var hotelgalaxy_rate_data_val =  "3";
					event.preventDefault();
				}

				$.post( ajaxurl, {
					action: 'hotel_galaxy_dismiss_review',
					hotelgalaxy_rate : hotelgalaxy_rate_data_val
				});
				
				$('.notice-box').hide();
			});
		});
		</script>
		<?php
	}

	function hotel_galaxy_dismiss_review(){
		if ( ! $review ) {
			$review = array();
		}

		if($_POST['hotelgalaxy_rate']=="1"){
			$review['time'] 	 = time();
			$review['dismissed'] = true;

		}
		if($_POST['hotelgalaxy_rate']=="2"){
			$review['time'] 	 = time();
			$review['dismissed'] = false;

		}
		if($_POST['hotelgalaxy_rate']=="3"){
			$review['time'] 	 = time();
			$review['dismissed'] = true;

		}
		
		update_option( 'hotel_galaxy_review_data', $review );
		die;
	}
}
?>