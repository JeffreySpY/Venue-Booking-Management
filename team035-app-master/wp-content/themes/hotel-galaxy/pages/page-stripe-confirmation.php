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
			if(is_single()){
				the_title();
			}else{
				?>
				<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				<?php
			} 
			?>

		</h2>
		<br/>
		<div class="blog-inner-left">
		<div class="single-post-content">
            <?php
			 if(!is_single() ){
				the_excerpt(__('more','hotel-galaxy'));
			}else{ 
				the_content();
            }
			?>
			
			
				</div>
		<br/>
<?php
global $wpdb;

	 $customer_id = get_current_user_id();
    $food_package = $_SESSION['food'];
    $drink_package = $_SESSION['drink'];
    $drink_package_duration = $_SESSION['drink_duration'];
    $venue_id = $_SESSION['venue_id'];
    $room_id = $_SESSION["room_id"];
    $customer_name = $_SESSION["customer"];
	$layout_selected = $_SESSION['layout_selected'];
	$date_of_event = $_SESSION["event_date"];
	$attendees = $_SESSION["attendees"];
	$start_time = $_SESSION["start_time"];
	$event_duration = $_SESSION["event_duration"];
    $customer_email = $_SESSION["email_address"];
    $mobile_phone = $_SESSION["phone_number"];
    $work_phone = $_SESSION["work_number"];
    $company_name = $_SESSION["company_name"];
	$paid = $_GET['paid'] == 1;
	
// 	insert

		
	$table = "venue_bookings";
	$wpdb -> insert($table, array (
	"customer_id" => $customer_id,
	"food_package_id" => $food_package,
	"drink_package_id" => $drink_package,
	"drink_duration" => $drink_package_duration,
	"venue_id" => $venue_id,
	"room_id" => $room_id,
	"customer_name" => $customer_name,
		"layout_selected" => $layout_selected,
	"date_of_event" => $date_of_event,
	"attendees" => $attendees,
	"start_time" => $start_time,
	"event_duration" => $event_duration,
	"customer_email" => $customer_email,
	"mobile_phone" => $mobile_phone,
	"work_phone" => $work_phone,
	"company_name" => $company_name,
	'status' => "pending",
		'paid' => $paid,
		)
				   );

	$date_data = '{"status":"booked","available":"1","info_users":"","info_admin":"","price":"","marked_price":""}';
	$unique_id = $room_id.'_'.$event_date;
	
// 	update
	$update = $wpdb -> update("wp_wpdevart_dates", [ 'data' => $date_data ], [ 'unique_id' => $unique_id ]);
// 			session_unset();
// 			session_destroy();
?>
		        <div class ="clearfix"></div>
    </div>
</div>




<?php
	
	
	        // to get payment received value
			$food_package_prices = get_the_terms($food_package, "price_rate");
			foreach ($food_package_prices as $food) {
				$food_price = $food->name;
			}			
			$drink_package_pair = explode('_',$drink_package_duration);
			$drink_price = $drink_package_pair[1];
			$price_rate = $food_price + $drink_price;

			if (!$paid) {
				$price_rate = $price_rate / 2;
			}
			$price_paid = $price_rate * $attendees;
	
// booking confirmation emails for Admin, Customer & Venue 
require_once($_SERVER['DOCUMENT_ROOT'].'/wp-load.php');


    $adminEmail = get_bloginfo('admin_email');
    $toAdmin = $adminEmail .","."test@gmail.com";

    $cust = wp_get_current_user();
    $custName = $cust->user_firstname.$cust->user_lastname;

    $vendor_id = get_post_field( 'post_author', $post_id );
    $vendorName = get_the_author_meta( 'display_name', $vendor_id );
    $vendorEmail = get_the_author_meta( 'user_email', $vendor_id );
    
    $subject = "Booking Request Confirmation";
    $headers = array('Content-Type: text/html; charset=UTF-8');
?>
    <?php ob_start(); // customer Email ?>
    <div>
    Dear customer, <br> <br>
    You have submitted a booking request with the following details: <br> <br>
    <table>
        <tr>
            <th>Venue Name</th>
            <td><?php echo get_the_title($venue_id); ?></td>
        </tr>
        <tr>
            <th>Event Date</th>
            <td><?php echo $date_of_event;?></td>
        </tr>
        <tr>
            <th>Attendees</th>
            <td><?php echo $attendees?></td>
        </tr>
        <tr>
            <th>Start Time</th>
            <td><?php echo $start_time?></td>
        </tr>
        <tr>
            <th>Duration</th>
            <td><?php echo $event_duration;?></td>
        </tr>
        <tr>
            <th>Food Package</th>
            <td><?php echo get_the_title($food_package);?></td>
        </tr>
        <tr>
            <th>Drink Package</th>
            <td><?php echo get_the_title($drink_package);?></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><?php echo $customer_email;?></td>
        </tr>
        <tr>
            <th>Mobile Phone</th>
            <td><?php echo $mobile_phone;?></td>
        </tr>
        <tr>
            <th>Work Phone</th>
            <td><?php echo $work_phone;?></td>
        </tr>
        <tr>
            <th>Company Name</th>
            <td><?php echo $company_name;?></td>
        </tr>
        <tr>
            <th>Payment Received</th>
            <td><?php echo $price_paid;?></td>
        </tr>
    </table> <br>
    If you require any assistance, please contact paul@paullaver.com <br> <br>

    Regards, <br>
    Laver Promotions & Events <br>

    </div>
    
    <?php $custMessage = ob_get_clean(); ?>

    <?php ob_start(); ?>
    
    <div>
    Dear <?php echo $vendorName ?>, <br> <br>
    A booking request has been made with the following details: <br> <br>
    <table>
       
       <tr>
           <th>Event Date</th>
           <td><?php echo $date_of_event;?></td>
       </tr>
       <tr>
           <th>Attendees</th>
           <td><?php echo $attendees;?></td>
       </tr>
       <tr>
           <th>Start Time</th>
           <td><?php echo $start_time;?></td>
       </tr>
       <tr>
           <th>Duration</th>
           <td><?php echo $event_duration;?></td>
       </tr>
       <tr>
           <th>Food Package</th>
           <td><?php echo get_the_title($food_package);?></td>
       </tr>
       <tr>
           <th>Drink Package</th>
           <td><?php echo get_the_title($drink_package);?></td>
       </tr>
       <tr>
           <th>Payment Received</th> 
           <td><?php echo $price_paid;?></td>
       </tr>

    </table> <br>

    Please login to your account Dashboard > Bookings to accept or decline the booking request. <br>

    Thank you. <br> <br>

    If you require any assistance, please contact paul@paullaver.com <br> <br>

    Regards, <br>
    Laver Promotions & Events <br>
    </div>
    
    <?php $vendorMessage = ob_get_clean(); ?>

    <?php ob_start(); ?>
    <div>
    Hi Admin <br> <br>
    A booking request has been made with the following details: <br> <br>
    <table>
    
        <tr>
            <th>Venue Name</th>
            <td><?php echo get_the_title($venue_id); ?></td>
        </tr>
        <tr>
            <th>Booking Request Date</th>
            <td><?php echo $date_placed; ?>
        </tr>
        <tr>
            <th>Event Date</th>
            <td><?php echo $date_of_event;?></td>
        </tr>
        <tr>
            <th>Attendees</th>
            <td><?php echo $attendees;?></td>
        </tr>
        <tr>
            <th>Start Time</th>
            <td><?php echo $start_time;?></td>
        </tr>
        <tr>
            <th>Duration</th>
            <td><?php echo $event_duration;?></td>
        </tr>
       <tr>
           <th>Food Package</th>
           <td><?php echo get_the_title($food_package);?></td>
       </tr>
       <tr>
           <th>Drink Package</th>
           <td><?php echo get_the_title($drink_package);?></td>
       </tr>
        <tr>
            <th>Payment Received</th>
            <td><?php echo $price_paid;?></td> 
        </tr>
        <br>
        <tr>
            <th>Customer Name</th>
            <td><?php echo $custName;?></td>
        </tr>
        <tr>
            <th>Customer Email</th>
            <td><?php echo $customer_email;?></td>
        </tr>
        <tr>
            <th>Customer Mobile Phone</th>
            <td><?php echo $mobile_phone; ?></td>
        </tr>
        <tr>
            <th>Customer Work Phone</th>
            <td><?php echo $work_phone; ?></td>
        </tr>    
        <tr>
            <th>Customer Company Name</th>
            <td><?php echo $company_name;?></td>
        </tr>
 
    </table> <br>
    
    <?php $adminMessage = ob_get_clean(); ?>
    
    <?php
    wp_mail($toAdmin, $subject, $adminMessage, $headers);
    wp_mail($customer_email, $subject, $custMessage, $headers);
    wp_mail($vendorEmail, $subject, $vendorMessage, $headers); 
		?>
