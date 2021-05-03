<div class="blog-area animate" data-anim-type="fadeInUp" data-anim-delay="400">
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="<?php echo esc_attr((is_single())?'':'home-room-col') ?>">
	
			<div class="home-room-img">
			    <center>
			        	<div>
				    <?php if(has_post_thumbnail()){
					$arg =array('class' =>"img-responsive"); 
					the_post_thumbnail('large',$arg); 
				
			       	} ?>
				</div>
				</center>
				<div class="showcase-inner">
					<div class="showcase-icons">
						<a href="<?php the_permalink(); ?>" class="gallery-icon"><i class="fa fa-plus"></i></a>
					</div>
				</div>
			</div>
			
		</div>
	</div>
			<h2>
			<?php 		
			if(is_single()){
				the_title();
			}else{
				?>
				<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				<?php
			} 
			global $post;
			$post_ID = $post -> ID;
			?>

		</h2>
		<br/>
		<div class="blog-inner-left">
		    <ul>
				<li> <i class="fa fa-user"></i> Venue Provider: <?php the_author(); ?></li>
				<li> <i class="fa fa-clock-o"></i> Last Updated: <?php echo esc_attr(get_the_date('Y-m-d')); ?></li>
				<!--<?php //if(get_the_tag_list() != '') { ?>-->
				<!--<li> <i class="fa fa-tags"></i><?php //the_tags('', ', ', '<br />'); ?></li>-->
				<?php //} ?>				
			</ul>
		</div>
<?php
			    $table = 'venue_bookings';
    $due_date = date("Y-m-d", mktime(0, 0, 0, date("m") , date("d")+14,date("Y")));
	$reminder_date = date("Y-m-d", mktime(0,0,0, date("m"), date('d')+21, date('Y')));
	$query = $wpdb->prepare("SELECT * FROM $table");
    $booking_list = $wpdb->get_results($query);
	$reminder_time = strtotime($reminder_date);
    foreach ($booking_list as $booking) {
		$booking_day = strtotime($booking->date_of_event);
		$payment = $booking->paid;
        if ($booking_day == $reminder_time && !$payment) {
			var_dump($booking);
			$booking_date = $booking->date_of_event;
			
			$venue_id = $booking->venue_id;
			$venue_name = get_the_title($venue_id);
			
			$food_package_id = $booking->food_package_id;
			$drink_package_id = $booking->drink_package_id;
			$food_package_name = get_the_title($food_package_id);
			$drink_package_name = get_the_title($drink_package_id);
			
			
			$customer_name = $booking->customer_name;
			$customer_email = $booking->customer_email;
			
			
            $food_package = get_the_terms($food_package_id, "price_rate");
            foreach ($food_package as $food) {
             	$food_price = $food->name;
            }
			
			$drinks_duration_pair = $booking->drink_duration;
			$drink_price = explode('_', $drinks_duration_pair)[1];
			$price_rate = $food_price + $drink_price;
			$attendees = $booking->attendees;
			$price_total = ($price_rate * $attendees)/2;
				
			$subject = "Secondary Payment Reminder (room)";
			$headers = array('Content-Type: text/html; charset=UTF-8');
			
			ob_start(); ?>

			<div>
			Dear <?php echo $customer_name; ?>, <br /> <br />
			Your secondary payment for your booking request with <?php echo $venue_name; ?> is due <?php echo $due_date; ?>. Below we have included some more information on this request: <br /> <br />
			<table>
				<tr>
				<th>Venue Name:</th>
					<td><?php echo $venue_name; ?></td>
				</tr>
				<tr>
				<th>Event Date:</th>
				<td><?php echo $booking_date; ?></td>
				</tr>
				<tr>
					<th>Food Package Booked:</th>
					<td><?php echo $food_package_name; ?></td>
				</tr>
				<tr>
					<th>Drink Package Booked:</th>
					<td><?php echo $drink_package_name; ?></td>
				</tr>
				<tr>
					<th>Amount Due:</th>
					<td>$<?php echo $price_total; ?></td>
				</tr>
</table> <br /> <br />
		A payment link can be found on the dashboard once you have logged into the system. <br /> <br />
                            If you require any assistance, please contact paul@paullaver.com <br /> <br />

                            Regards, <br />
                            Laver Promotions & Events <br /> <br />
                        </div>
<?php 
			$custMessage = ob_get_clean();
			                        
			wp_mail($customer_email, $subject, $custMessage, $headers);
			     
		}
    }
	?>
</div>