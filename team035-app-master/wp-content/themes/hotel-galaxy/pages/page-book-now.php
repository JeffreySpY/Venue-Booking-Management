
<?php session_start();
if(have_posts()):
    while(have_posts()):the_post();
        ?>
        <div class="blog-area animate" data-anim-type="fadeInUp" data-anim-delay="900">
            <div>
                <?php if(has_post_thumbnail()):
                    ?>
                    <div class="home-room-img">
                        <?php $img_class= array('class' =>'img-responsive hotel-featured-img');
                        the_post_thumbnail('', $img_class); ?>
                    </div>
                <?php
                endif;
                ?>
            </div>
            <?php
            // 	convert POST data to SESSION data:

            $current_user_data = wp_get_current_user();

            if  ($_SERVER['REQUEST_METHOD'] === 'POST'){
                foreach ($_POST as $key => $value) {
                    $_SESSION[$key] = $value;
                }
            }

            ?>
            <div class="page-content">
                <center>
                    <h2>
                        Room Availabilities
                    </h2>
                        <?php
                        $shortcode = '[wpdevart_booking_calendar id="'.$_SESSION["room_id"].'"]';
                        echo do_shortcode($shortcode);
                        ?>

                    <h2>Venue Booking Details</h2><br/>
                    <form action="<?php echo get_site_url(null,"/booking-confirmation","https");?>" method="POST" style="width:80%" > 
                        <p />

                        <label>Venue Name:</label>
                        <input type="text" value="<?php echo get_the_title($_SESSION['venue_id']); ?>" style="width:70%;float:right" disabled> <p / >

                        <label>Room Name:</label>
                        <input type="text" value="<?php echo get_the_title($_SESSION['room_id']); ?>" style="width:70%;float:right" disabled> <p / >


                        <?php
                        $layout_data = get_the_terms($_SESSION["room_id"], "layout_list");
                        foreach($layout_data as $layout) {
                            $layout_slug = $layout->name;
                        }
                        $layout_array = explode(";", $layout_slug);
                        $max_attendees = $layout_array[$_SESSION["layout_selected"]];
                        ?>
                        <label>Attendees: <i>*required</i></label>
                        <input type="number" value="" name="attendees" style="width:70%;float:right" min="1" max="<?php echo $max_attendees;?>" required> <p />

                        <?php $food_string = "food".$_SESSION['room_id']; ?>
                        <label>Food Package:</label>
                        <input type="text" name="food" value="<?php echo get_the_title($_SESSION[$food_string]); ?>" style="width:70%;float:right" disabled > <p />

                        <?php $drink_string = "drink".$_SESSION['room_id']; ?>
                        <label>Drink Package:</label>
                        <input type="text" name="drink" value="<?php echo get_the_title($_SESSION[$drink_string]); ?>" style="width:70%;float:right" disabled> <p />

                        <?php
                        $available_durations = get_the_terms($_SESSION[$drink_string], "price_rate");
                        ?>

                        <label for="drink_duration">Drink Package Duration:</label>
                        <select id="drink_duration" name="drink_duration" class="input-xlarge" style="width:70%;float:right">
                            <?php
                            foreach ($available_durations as $available_duration) {
                                $duration_pair = explode("_", $available_duration->name);
                                ?>
                                <option value="<?php echo $available_duration->name; ?>"> <?php echo $duration_pair[0]; ?> </option>
                            <?php } ?>
                        </select> <p />

                        <label for="date_box">Date: <i>*required</i></label>
                        <input type="date" id="date_box" onchange="setDay()" name='event_date' class="input-xlarge" style="width:70%;float:right;" required> <p />
                        

                        <label for="time_box">Start Time: <i>*required</i></label>
                        <input type="time" id="time_box" class="input-xlarge"  name='start_time' style="width:70%;float:right" required> <p />

                        <label for="duration_box">Duration: <i>*required</i></label>
                        <input type="number" for="duration_box" name='event_duration' style="width:70%;float:right" required > <p />

                        <label for="name_box">Name: <i>*required</i></label>
                        <input type="text" id="name_box" name='customer' value="<?php echo $current_user_data->user_firstname . " " . $current_user_data->user_lastname; ?>" style="width:70%;float:right" required> <p />

                        <label>Company Name:</label>
                        <input type="text" name="company_name" style="width:70%;float:right" > <p />

                        <label>Email: <i>*required</i></label>
                        <input type="email" value="<?php echo $current_user_data->user_email;?>" name="email_address" style="width:70%;float:right" required > <p />

                        <label>Phone Number: <i>*required</i></label>
                        <input type="tel" name="phone_number" style="width:70%;float:right" required> <p />

                        <label>Work Number:</label>
                        <input type="tel" name="work_number" style="width:70%;float:right" > <p />

                        <input type="hidden" name="customer_id" value="<?php echo $current_user_data->ID; ?>" >
                        <input type="hidden" name="food" value="<?php echo $_SESSION[$food_string]; ?>" >
                        <input type="hidden" name="drink" value="<?php echo $_SESSION[$drink_string]; ?>" >
                        <table>
                            <tr>
                                <td><button type="submit" style="margin-bottom:10px;margin-right:10px"class="custom-btn book-lg animate fadeInUp">Book Venue</button> </td>
                            </tr>
                        </table>
                    </form>
                </center>
            </div>
        </div>

    <?php
    endwhile;
endif;
?>

            	      <?php
//          get dates from database
			$table="wp_wpdevart_dates";
			$room_id = $_SESSION["room_id"];
			$valid_date = array();
			$dates=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table WHERE calendar_id=$room_id"));
			foreach($dates as $date) {
			    if($date->data == '{"status":"available","available":"1","info_users":"","info_admin":"","price":"","marked_price":""}') {
			        $valid_date[] = $date->day;
            }
            }
			?>

<script>
function setDay() {
    var passedArray = <?php echo json_encode($valid_date); ?>;
	var datebox = document.getElementById("date_box");
	var d =new Date(datebox.value);
	var fdate = formatDate(d);
	var n = d.getDay();
    //validate date
    if (!passedArray.includes(fdate)) {
        window.alert("Please enter an available date, see the calendar above the form to find available dates");
		datebox.value = "";
    }
	}
	function formatDate(date) {
    var d = new Date(date),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();

    if (month.length < 2) 
        month = '0' + month;
    if (day.length < 2) 
        day = '0' + day;

    return [year, month, day].join('-');
}
</script>