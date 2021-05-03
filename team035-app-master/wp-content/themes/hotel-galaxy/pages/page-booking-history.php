<div class="blog-area animate" data-anim-type="fadeInUp" data-anim-delay="900">
    <?php
	global $wpdb;
		
    ?>
<div class="page-content">
    <table style="width:100%">
        <tr>
            <th><h3>Event Date</h3></th>
			<th><h3>Start Time</h3></th>
            <th><h3>Venue Booked</h3></th>
            <th><h3>Food Package Selected</h3></th>
            <th><h3>Drinks Package Selected</h3></th>
            <th><h3>Booking Price</h3></th>
			<th><h3>Current Status</h3></th>
        </tr>
    
    <?php
		$user_id = get_current_user_id();
   	 	$table = 'venue_bookings';
    	$reservations = $wpdb->get_results($wpdb->prepare("SELECT * FROM `venue_bookings` WHERE customer_id = ".$user_id ));
    	foreach($reservations as $booking){
        ?>
		<tr>
        	<!-- event date -->
            <td>
                <?php echo $booking->date_of_event; ?>
            </td>
            <!-- start time -->
            <td>
			    <?php echo $booking->start_time; ?>
            </td>
            <!-- venue booked-->
            <td>
                <?php echo get_the_title($booking->venue_id); ?>
            </td>
            <!-- food package booked-->
            <td>
                <?php echo get_the_title($booking->food_package_id); ?>
            </td>
            <!-- drink package selected -->
            <td>
                <?php echo get_the_title($booking->drink_package_id); ?>
            </td>
			<?php
			//get price for booking
			$food_package = get_the_terms($booking->food_package_id, "price_rate");
			foreach ($food_package as $food) {
				$food_price = $food->name;
			}			
			$drink_package = explode('_',$booking->drink_duration);
			$drink_price = $drink_package[1];
			$price_rate = $food_price + $drink_price;
			$attendees = $booking->attendees;
			$price_paid = $price_rate * $attendees;
			?>
			<td>
				<?php echo $price_paid; ?>
			</td>
			<!-- current status-->
            <td>
                <?php
			if ($booking->paid == 0){
				?>
				<form method="POST" action="<?php echo get_site_url(null,"/thank-you","https");?>">
					<button type='submit' class="custom-btn book-sml animate fadeInUp" name='selected_booking' value='<?php echo $booking->booking_id;?>'>Payment Required </button>
				</form>
				<?php
			}else{
				echo $booking->status; 
			}?>
            </td>
		</tr>
		    <?php } ?>	
    </table>

    </div>
</div>