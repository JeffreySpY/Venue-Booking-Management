<?php
if(have_posts()):
while(have_posts()):the_post();
?>

<?php

$user_ID=get_current_user_id();
$user_meta=get_userdata($user_ID);
$user_roles=$user_meta->roles;

if(($user_roles[0]=="administrator" || $user_roles[0]=="business_admin") && !empty($_POST['editVenue'])){
    $venueArgs=array(
        'p' => $_POST['editVenue'],
        'post_type' => 'venue',
    );
}
elseif($user_roles[0]=="venue_vendor"){
    $venueArgs=array(
        'post_type' => 'venue',
        'author'=> $user_ID
    );
}
elseif(($user_roles[0]=="administrator" || $user_roles[0]=="business_admin") && empty($_POST['editVenue'])){
    $venueArgs=array(
        'post_type' => 'venue',
    );
}

?>


<div class="blog-area animate" data-anim-type="fadeInUp" data-anim-delay="900">
    <div class="page-content">
        <div style="overflow-x:auto;">

            <?php

            if(isset($_POST['manage_bookings'])) {
                $room_id = $_POST['manage_bookings'];
                ?> 
                <h2> Current Bookings for <?php echo get_the_title($room_id); ?> </h2>
                <?php
                if (isset($_POST['response'])) {
                    $table = 'venue_bookings';
                    $data = [status => $_POST['response']];
                    $where = [booking_id => $_POST['booking_number']];
                    $updated = $wpdb->update( $table, $data, $where, $format = null, $where_format = null );
                    if ($updated === false) {
                        echo "error with insertion";
                    }
                    $event_date = $_POST['event_day'];

                    $unique_id = $room_id.'_'.$event_date;
                    if ($_POST['response'] == "approved") {
                        $date_data = '{"status":"booked","available":"1","info_users":"","info_admin":"","price":"","marked_price":""}';

                        // add booking information fetch code for email
                        $booking_number = $_POST['booking_number'];
                        $reservation = $wpdb->get_row("SELECT * from $table WHERE booking_id = $booking_number");
                        $customer_email = $reservation->customer_email;
                        $customer_name = $reservation->customer_name;

                        $venue_id = $reservation->venue_id;
                        $room_id = $reservation->room_id;
                        $layout_selected = $reservation->layout_selected;
                        $food_package_booked = $reservation->food_package_id;
                        $drinks_package_booked = $reservation->drink_package_id;
                        $drinks_duration_pair = $reservation->drink_duration;
                        $drinks_duration = explode('_', $drinks_duration_pair)[0];
                        $date_of_event = $reservation->date_of_event;
                        $attendees = $reservation->attendees;
                        $start_time = $reservation->start_time;
                        $event_duration = $reservation->event_duration;
                        $mobile_phone = $reservation->mobile_phone;
                        $work_phone = $reservation->work_phone;
                        $company_name = $reservation->company_name;

                        // Email customer of booking approval

                        $subject = "Booking Request Confirmation";
                        $headers = array('Content-Type: text/html; charset=UTF-8');
                        ?>
                        <?php ob_start(); // customer Email ?>

                        <div>
                            Dear <?php echo $customer_name?>, <br> <br>
                            Your booking request has been approved. Below are the details we have received: <br> <br>

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
                                    <td><?php echo get_the_title($food_package_booked);?></td>
                                </tr>
                                <tr>
                                    <th>Drink Package</th>
                                    <td><?php echo get_the_title($drinks_package_booked);?></td>
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
                            </table> <br>
                            If you require any assistance, please contact paul@paullaver.com <br> <br>

                            Regards, <br>
                            Laver Promotions & Events <br>
                        </div>

                        <?php $custMessage = ob_get_clean(); ?>

                        <?php wp_mail($customer_email, $subject, $custMessage, $headers);?>

                        <?php
                    }
                    elseif ($_POST['response'] == "rejected") {
                        $date_data = '{"status":"available","available":"1","info_users":"","info_admin":"","price":"","marked_price":""}';
                    }
                    $table = 'wp_wpdevart_dates';
                    $data = [data => $date_data];
                    $where = [unique_id => $unique_id];
                    $updated = $wpdb->update( $table, $data, $where, $format = null, $where_format = null );
                    if ($updated === false) {
                        // echo "error with insertion";
                        echo $wpdb->last_query;
                        echo $wpdb->last_error;
                    }
                }
				$room_id = $_POST['manage_bookings'];
                $table = 'venue_bookings';
                $reservations = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table WHERE room_id = $room_id"));?>
				
                <table style="width:100%">
                    <tr>
                        <th><h3>Event Date</h3></th>
                        <th><h3>Food Package</h3></th>
                        <th><h3>Drink Package</h3></th>
                        <th><h3>Client Name</h3></th>
                        <th><h3>Current Status</h3></th>
                        <th><h3></h3></th>
                    </tr>
                    <?php
                    foreach ($reservations as $booking) {
                        ?>
                        <tr>
                            <!-- event date -->
                            <td>
                                <?php echo $booking->date_of_event; ?>
                            </td>

                            <!-- food package booked-->
                            <td>
                                <?php echo get_the_title($booking->food_package_id); ?>
                            </td>
                            <!-- drink package selected -->
                            <td>
                                <?php echo get_the_title($booking->drink_package_id); ?>
                            </td>

                            <!--client name-->
                            <td>
                                <?php echo $booking->customer_name?>
                            </td>
                            <!-- current status-->
                            <td>
                                <?php echo $booking->status; ?>
                            </td>
                            <!--response-->
                            <td>
                                <form method="post">
                                    <input type="hidden" name="booking_number" value="<?php echo $booking->booking_id;?>">
                                    <button type="submit" name="view_details" class="custom-btn book-lg animate fadeInUp" value="<?php $venue_id; ?>" >View Details</button>
                                </form>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
                <?php
            }

            elseif (isset($_POST['view_details'])) {


                $table = 'venue_bookings';
                $booking_number = $_POST['booking_number'];
                $reservation = $wpdb->get_row("SELECT * from $table WHERE booking_id = $booking_number");
                $customer_name = $reservation->customer_name;
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
                <form method='POST'>
                    <table style="width:100%;">

                        <input type="hidden" name="manage_bookings"  value="<?php echo $reservation->room_id; ?>">
                        <button type="submit" class="custom-btn book-lg animate fadeInUp" >Return to Booking List</button>

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
                            <td><?php echo $drinks_duration; ?></td>
                        </tr>
                        <tr>
                            <th>Customer Name:</th>
                            <td><?php echo $customer_name;?></td>
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
                            <td><?php echo $event_duration;?></td>
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
                            <td><?php echo $price_total; ?></td>
                        </tr>


<!-- 						 Hide response options for past events-->
						<?php if ($reservation->status != "done") {?>
                        <tr>
                            <th>Response:</th>
                            <input type='hidden' name='booking_number' value='<?php echo $booking_number;?>'>
                            <input type='hidden' name='event_day' value='<?php echo $date_of_event;?>'>
                            <td><button type="submit" class="custom-btn book-lg animate fadeInUp" name="response" value="approved">Accept</button>
                                <button type="submit" class="custom-btn book-lg animate fadeInUp" name="response" value="rejected">Reject</button></td>
                        </tr>
						<?php } ?>
                    </table>
                </form>

                <?php
            }
            else{
            if(isset($_POST['deleteRoom'])){
                //delete room
                if(!empty($_POST['deleteRoom'])){
                    wp_delete_post($_POST['deleteRoom']);
                }
            }


            if(!empty($_POST['deletePackage'])){
                wp_delete_post($_POST['deletePackage']);
            }

            $venueLoop = new WP_Query($venueArgs);
            if($venueLoop->have_posts()){
            $venueLoop->the_post();
            $venue_id=$post->ID;
            $venue_name=$post->name;

            // Remove links from the_category() and output it
            $i = 0;
            $sep = ', ';
            $cats = '';
            foreach ( ( get_the_category() ) as $category ) {
                if (0 < $i)
                    $cats .= $sep;
                $cats .= $category->cat_name;
                $i++;
            }


            //Fetch venue address
            $i = 0;
            $adds = '';
            foreach ( get_the_terms($venue_id,"address")  as $value ) {
                if (0 < $i)
                    $adds .= $sep;
                $adds .= $value->name;
                $i++;
            }




            //Fetch venue service
            $i = 0;
            $sers = '';
            foreach ( get_the_terms($venue_id,"service")  as $value ) {
                if (0 < $i)
                    $sers .= $sep;
                $sers .= $value->name;
                $i++;
            }

            ?>
            <div>
                <table style="display:inline">
                    <tr>
                        <th ><h3 style="margin-right:30px">Venue Title&nbsp;</h3></th>
                        <th><h3 style="margin-right:30px">Address&nbsp;</h3></th>
                        <th><h3 style="margin-right:30px">Type&nbsp;</h3></th>
                        <th><h3 style="margin-right:30px">Service&nbsp;</h3></th>
                    </tr>
                    <tr>
                        <td ><h4 style="margin-right:30px"><a href="<?php echo get_permalink($venue_id);?>"> <?php the_title($post->name)?> </a></h4></td>
                        <td ><h5 style="margin-right:30px"><?php echo $adds ;?></h5> </td>
                        <td ><h5 style="margin-right:30px" ><?php echo $cats; ?></h5> </td>
                        <td ><h5 style="margin-right:30px" ><?php echo $sers; ?></h5> </td>
                    </tr>
                </table>

                <form  method="post" action="<?php echo get_site_url(null,"/venue-update","https");?>">
                    <button style="margin-right:20px" href="#" class="custom-btn book-lg animate fadeInUp" type="submit" name="venueEditID" value="<?php echo $venue_id; ?>"><?php _e('Edit Venue','hotel-galaxy'); ?></button>
                    </br>
                    </br>
                    <button style="margin-right:20px" href="#" class="custom-btn book-lg animate fadeInUp" type="submit" name="pdfEditID" value="<?php echo $venue_id; ?>" formaction="<?php echo get_site_url(null,"/venue-update","https");?>"><?php _e('Delete PDF','hotel-galaxy'); ?></button>
                </form>
                </br>
                <hr style="border: 1px solid grey;opacity:0.8;">
                </br>


                <style>
                    .packageButton{
                        border: none;
                        background: rgba(255, 250, 205, 0.5);
                        font-family: inherit;
                        border-radius: 8px;
                        box-shadow: 0 3px 5px rgba(0, 0, 0, 0.18);
                        min-width: 10ch;
                        min-height: 44px;
                        padding-right:15px;
                    }
                    .packageButton:hover {background-color: #FFDEAD}
                    }
                </style>
                <form method="POST" action="<?php echo get_site_url(null,"/room-management","https");?>">

                    <?php

                    $post_ID = $venue_id;
                    $args = array('post_type' => 'room',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'parent_venue',
                                'field' => 'slug',
                                'terms' => $post_ID,
                            )
                        ),
                    );
                    ?>


                    <h3 style="display:inline;margin-right:30px">
                        Room for <?php the_title($venue_name); ?>
                    </h3>

                    <!--<input type="hidden" name="venueID" value="<?php echo $post_ID ?>">-->
                    <button style="display: inline;margin-bottom:20px" type="submit" name="createRoom" class="custom-btn book-lg animate fadeInUp" value="<?php echo $post_ID ?>" formaction="<?php echo get_site_url(null,"/room-management","https");?>">Create new room</button> 

                    <?php
                    $loop = new WP_query($args);
                    if( $loop->have_posts() ){
                        ?>

                        <?php
                        while( $loop->have_posts() ) : $loop->the_post();
                            ?>
                            <table>

                                <tr>
                                    <td style="padding-right:20px" ><h4><a href="<?php the_permalink();?>"><?php echo get_the_title(); ?> </a> </h4></td>
                                    <td style="padding-right:20px"><button name="updateRoomAva" href="#" class="custom-btn book-lg animate fadeInUp" type="submit" value="<?php echo get_the_ID(); ?>" formaction="<?php echo get_site_url(null,"/venue-update","https");?>"><?php _e('Update Calendar ','hotel-galaxy'); ?></button> </td> 
                                    <td style="padding-right:20px"><button name="editRoom" type="submit" class="custom-btn book-lg animate fadeInUp" value="<?php echo get_the_ID(); ?>">Edit this room</button></td>
                                    <td style="padding-right:20px"><button name="deleteRoom" type="submit" class="custom-btn book-lg animate fadeInUp" id="deleteRoom" formaction="<?php echo get_site_url(null,"/dashboard","https");?>" value="<?php echo get_the_ID(); ?>" onclick="confirmDelete()">Delete this room</button></td> 
                                    <td style="padding-right:20px"><button type="submit" name="createPackage" class="custom-btn book-lg animate fadeInUp" value="<?php echo get_the_ID(); ?>" formaction="<?php echo get_site_url(null,"/venue-update","https");?>">Create new package</button></td> 
                                </tr>
                            </table>
                            </br>
                            <h4>Package for <?php echo get_the_title(); ?></h4>
                            <table>
                                <?php
                                $package = wp_get_post_terms(get_the_ID(),'child_package');
                                // if(empty($package)){?>
                                <!--<td> <p>* No package found for this room, click above to create a new one.</p></td>-->
                                <tr></tr>
                                <?php //}
                                // else{
                                $count=0;
                                foreach($package as $value){


                                    if($count < 5){
                                        if(!empty(get_the_title($value->name))){?>
                                            <td><button class="packageButton" style = "margin-right:20px" name="packageID" value="<?php echo $value->name?>" formaction="<?php echo get_site_url(null,"/package-edit","https");?>"><?php echo get_the_title($value->name);?></button></td> 
                                        <?php }
                                    }

                                    else{?>
                                        <tr>
                                        </tr>
                                        <?php
                                    }
                                }
                                //}
                                ?>

                            </table>
                            <?php
                            if(empty($package)){
                                ?>
                                <p>* No package found for this room, click above to create a new one.</p>
                                <?php
                            }
                            ?>
                            <p/><hr style="border: 1px solid grey;opacity:0.5;">
                        <?php
                        endwhile;

                    }else{
                        ?>
                        <p>* No room found for this venue, click below to create a new one.</p>

                        <?php
                    }

                    ?>

                </form>
                </br>
                <?php
                $venueLoop = new WP_Query($venueArgs);
                $venueLoop->the_post();
                $venue_id=$post->ID;


                $post_ID = $venue_id;
                $args = array('post_type' => 'room',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'parent_venue',
                            'field' => 'slug',
                            'terms' => $post_ID,
                        )
                    ),
                );

                ?>

                <h3>
                    Booking for <?php the_title($venue_name); ?>
                </h3>

                <?php
                $loop = new WP_query($args);
                if( $loop->have_posts() ){
                    ?>
                    <table style="width:60%">
                        <tr>
                            <th><h4>Room Name</h4></th>
                            <th><h4>Manage Bookings</h4></th>
                        </tr>
                        <?php
                        while( $loop->have_posts() ) : $loop->the_post();
                            ?>
                            <tr>
                                <form method="POST">
                                    <input type="hidden" name="manage_bookings" value="<?php echo $post->ID;?>">
                                    <td><h5><?php echo get_the_title($post->ID);?></h5></td>
                                    <td><button type="submit"class="custom-btn book-lg animate fadeInUp">Manage Bookings</button></td>
                                </form>
                            </tr>

                        <?php
                        endwhile;
                        ?>

                    </table>

                <?php }
                ?>


                </br>

                <?php
                }
                else{

                ?>
            </div>
            <div>
                <?php

                ?>
                <!--<p>*Sorry, no venue found on your account, please list the venue by accessing the website menu: Dashboard - List Your Venue.</p>-->
                <h4><a href="https://dev.u20s1035.monash-ie.me/venue-creation-form/">Please click here to create your first venue</a></h4>
                <?php
                }
                }
                endwhile;
                endif;

                ?>
            </div>
        </div>
        <script>

            function confirmDelete() {
                var result = confirm("Are you sure to delete this room?");
                if(!result){
                    document.getElementById("deleteRoom").name = "newName";
                }
            }
        </script>
