<?php session_start(); ?>
<div class="blog-area animate" data-anim-type="fadeInUp" data-anim-delay="400">
    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="<?php echo esc_attr((is_single())?'':'home-room-col') ?>">
            <div class="home-room-img">
                <?php if(has_post_thumbnail()){
                    $arg =array('class' =>"img-responsive");
                    the_post_thumbnail('',$arg);
                } ?>
                <div class="showcase-inner">
                    <div class="showcase-icons">
						                        <a href="<?php the_permalink(); ?>" class="gallery-icon">hello<i class="fa fa-plus"></i></a>
                    </div>
                </div>
            </div>
        </div>
		<h2>
			<?php 		
			if(!($_SERVER['REQUEST_METHOD'] === 'POST')){
				echo the_title();
			}
			else{
				echo "Redirecting to Stripe";			
			}
            global $wpdb;
			?>

		</h2>
		<br/>
		<div class="blog-inner-left">
		<div class="single-post-content">
            <?php
			 if($_SERVER['REQUEST_METHOD'] === 'POST'){
                 foreach ($_POST as $key => $value) {
                     $_SESSION[$key] = $value;
                 }
                 $booking_id = $_POST["selected_booking"];
                 $table = "venue_bookings";
                 $booking_data = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table WHERE booking_id = $booking_id"));

                 $food_package_id = $booking_data->food_package_id;
                 $drink_package_id = $booking_data->drink_package_id;

                 $prices_list = wp_get_post_terms($food_package_id, 'half_stripe_price');
                 foreach($prices_list as $price_list) {
                     $stripe_food = $price_list -> name;
                 }

                 $drink_duration_number = explode('_', $booking_data->drink_duration)[0];
                 $prices_list = wp_get_post_terms($drink_package_id, 'half_stripe_price');
                 foreach($prices_list as $price_list) {
                     $price_number = explode(';', $price_list->name);
                     if ($price_number[0] == $drink_duration_number) {
                         $stripe_drink = $price_number[1];
                     }
                 }
                 $attendees = $booking_data->attendees;

                 ?>
			<script src="https://js.stripe.com/v3/"> </script>
			<script>
                var stripe = Stripe('pk_test_51HI3I0AAQvB2LmvDUBAFu1xRO75FNOrT8SqK7LzIfQg6x3dzFiBVOBR5M5z6qjxZqa3CTt2Juilzgs12lGUlUYcx00ckFzpkBe');

                    stripe.redirectToCheckout({
                        lineItems: [{
                            price: '<?php echo $stripe_food; ?>', // Replace with the ID of your price
                            quantity: <?php echo $attendees;?>,
                        },{
                            price: '<?php  echo $stripe_drink; ?>', // Replace with the ID of your price
                            quantity: <?php  echo $attendees;?>,
                        }],
                        mode: 'payment',
                        successUrl: '<?php echo get_site_url(null,"/thank-you","https");?>',
                        cancelUrl: '<?php echo get_site_url(null,"","https");?>',
                    })
                
            </script>
            <?php



			}else {
                 the_content();

				 $booking_number = $_SESSION['selected_booking'];
				 $table = "venue_bookings";
				 $data = [paid => 1];
				 $where = [booking_id => $booking_number];
				 
				 $updated = $wpdb->update($table, $data, $where, $format = null, $where_format = null );
				 if ($updated === false) {
					 echo "error with insertion";
				 }
				 else{
                $reservation = $wpdb->get_row("SELECT * from $table WHERE booking_id = $booking_number");
                $room_id = $reservation->room_id;
                $layout_selected = $reservation->layout_selected;
                $food_package_booked = $reservation->food_package_id;
                $drinks_package_booked = $reservation->drink_package_id;
                $drinks_duration_pair = $reservation->drink_duration;
                $drinks_duration = explode('_', $drinks_duration_pair)[0];
                $date_placed = $reservation->date_placed;
                $date_of_event = $reservation->date_of_event;
                $attendees = $reservation->attendees;
                $start_time = $reservation->start_time;
                $event_duration = $reservation->event_duration;

                $layouts = Array("Banquet", "Boardroom", "Cabaret", "Classroom", "Cocktail", "Theatre", "U-Shape");
                ?>
                    <table style="width:100%;">
                        <tr>
                            <th>Room Name:</th>
                            <td><?php echo get_the_title($room_id); ?></td>
                        </tr>
                        <tr>
                            <th>Layout Selected:</th>
                            <td><?php echo $layouts[$layout_selected]; ?></td>
                        </tr>
                        <tr>
                            <th>Food Package Selected:</th>
                            <td><?php echo get_the_title($food_package_booked); ?></td>
                        </tr>
                        <tr>
                            <th>Drink Package Selected:</th>
                            <td><?php echo get_the_title($drinks_package_booked); ?></td>
                        </tr>
                        <tr>
                            <th>Drink Package Duration:</th>
                            <td><?php echo $drinks_duration; ?> hours</td>
                        </tr>
                        <tr>
                            <th>Event Date:</th>
                            <td><?php echo $date_of_event;?></td>
                        </tr>
                        <tr>
                            <th>Start Time:</th>
                            <td><?php echo $start_time;?></td>
                        </tr>
                        <tr>
                            <th>Duration:</th>
                            <td><?php echo $event_duration;?> hours</td>
                        </tr>
                        <tr>
                            <th>Attendees:</th>
                            <td><?php echo $attendees;?></td>
                        </tr>
                        <?php
                        // get price for booking
                        $food_package = get_the_terms($food_package_booked, "price_rate");
                        foreach ($food_package as $food) {
                            $food_price = $food->name;
                        }
                        $drink_price = explode('_', $drinks_duration_pair)[1];
                        $price_rate = $food_price + $drink_price;
						$price_total = $price_rate * $attendees;
                        ?>
                        <tr>
                            <th>Price:</th>
                            <td>$<?php echo $price_total; ?></td>
                        </tr>

			</table>
			<?php
				 }

                 session_unset();
                 session_destroy();
             }?>
				</div>
		<br/>

		        <div class ="clearfix"></div>
    </div>
</div>

    <?php
//    $booking_details = $wpdb->get_row($wpdb->query("SELECT * from `venue_bookings` WHERE customer_id = $customer_id and venue_id = $venue_id and date_of_event = $date_of_event and start_time = $start_time"));
?>

