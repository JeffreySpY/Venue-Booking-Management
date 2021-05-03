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

                    if  ($_SERVER['REQUEST_METHOD'] === 'POST'){
                        foreach ($_POST as $key => $value) {
                            $_SESSION[$key] = $value;
                        }
                    }
                    ?>
                    <div class="page-content">
                        <?php
                        if(isset($_SESSION["room_id"])) {
                            ?>
                            <center>
                                <h2>Venue Booking Details</h2><br/>
                                <form style="width:60%">
                                    <p />
                                    <label>Venue Name:</label>
                                    <input type="text" value="<?php echo get_the_title($_SESSION['venue_id']); ?>" style="width:70%;float:right" disabled> <p / >

                                    <label>Room Name:</label>
                                    <input type="text" value="<?php echo get_the_title($_SESSION['room_id']); ?>" style="width:70%;float:right" disabled> <p / >

                                    <label>Attendees: </label>
                                    <input type="number" value="<?php echo $_SESSION['attendees'];?>" name="attendees" style="width:70%;float:right" disabled> <p />

                                    <label>Food Package:</label>
                                    <input type="text" name="food" value="<?php echo get_the_title($_SESSION['food']); ?>" style="width:70%;float:right" disabled > <p />

                                    <label>Drink Package:</label>
                                    <input type="text" name="drink" value="<?php echo get_the_title($_SESSION['drink']); ?>" style="width:70%;float:right" disabled> <p />

                                    <?php $duration_pair = explode("_", $_SESSION['drink_duration']); ?>
                                    <label>Drink Package Duration:</label>
                                    <input type="text" name="drink_duration" value="<?php echo $duration_pair[0]; ?>" style="width:60%;float:right" disabled> <p />

                                    <label>Date:</label>
                                    <input type="text" value="<?php echo $_SESSION['event_date']; ?>" name='event_date' class="input-xlarge" style="width:70%;float:right" disabled> <p />

                                    <?php $php_date = date("l", strtotime($_SESSION['event_date'])); ?>

                                    <label>Start Time:</label>
                                    <input type="time" value="<?php echo $_SESSION['start_time']; ?>" class="input-xlarge" name='start_time' style="width:70%;float:right" disabled> <p />

                                    <label>Duration:</label>
                                    <input type="number" value="<?php echo $_SESSION['event_duration']; ?>" name='event_duration' style="width:70%;float:right" disabled> <p />

                                    <label>Name:</label>
                                    <input type="text" value="<?php echo $_SESSION['customer']; ?>" name='customer' style="width:70%;float:right" disabled> <p />

                                    <label>Company Name:</label>
                                    <input type="text" value="<?php echo $_SESSION["company_name"]; ?>" name="company_name" style="width:70%;float:right" disabled> <p />

                                    <label>Email:</label>
                                    <input type="email" value="<?php echo $_SESSION["email_address"]; ?>" name="email_address" style="width:70%;float:right" disabled> <p />

                                    <label>Phone Number: </label>
                                    <input type="tel" value="<?php echo $_SESSION["phone_number"]; ?>" name="phone_number" style="width:70%;float:right" disabled> <p />

                                    <label>Work Number:</label>
                                    <input type="tel" value="<?php echo $_SESSION["work_number"]; ?>" name="work_number" style="width:70%;float:right" disabled> <p />
                                    <?php
                                    $food_package = get_the_terms($_SESSION['food'], "price_rate");
                                    foreach ($food_package as $food) {
                                        $food_price = $food->name;
                                    }

                                    $drink_package = explode('_', $_SESSION['drink_duration']);
                                    $drink_price = $drink_package[1];



                                    $price_rate = $food_price + $drink_price;
                                    $price = $price_rate * $_SESSION['attendees'];

                                    ?>
                                    <label for="pricebox">Price:</label>
                                    <input value="<?php echo $price; ?>" id="pricebox" name="pricebox" style="width:70%;float:right" disabled> <p />
                                    <input type="hidden" value="<?php echo $price; ?>">
                                    <table>
                                        <tr>
                                            <td><button type="submit" onclick="sendToStripeHalf()" style="margin-bottom:10px;margin-right:10px"class="custom-btn book-lg animate fadeInUp">Pay 50% Deposit</button> </td>
                                            <td><button type="submit" onclick="sendToStripeFull()" style="margin-bottom:10px;margin-right:10px" class="custom-btn book-lg animate fadeInUp">Pay Full Price</button></td>
                                            <td>	<button type="submit" formaction="<?php echo get_permalink($_SESSION['package_id'])?>" style="margin-bottom:10px;margin-right:10px" class="custom-btn book-lg animate fadeInUp">Cancel Request</button></td>
                                        </tr>
                                    </table>
                                </form>
                            </center>
                        <?php }
                        else{?>
                            <h3>
                                Your cart is empty, please search for a venue and fill in a booking request
                            </h3>
                        <?php }?>
                    </div>
                </div>

            <?php
            //  get stripe code for food package

            $prices_list = wp_get_post_terms($_SESSION["food"], 'stripe_codes_full');
            foreach($prices_list as $price_list) {
                $stripe_food_full = $price_list -> name;
            }
                        $prices_list = wp_get_post_terms($_SESSION["food"], 'half_stripe_price');
            			foreach($prices_list as $price_list) {
            				$stripe_food_half = $price_list -> name;
            			}

            // get stripe code for drink package
            $drink_duration_number = explode('_', $_SESSION['drink_duration'])[0];
            $attendees = $_SESSION['attendees'];
            $prices_list = wp_get_post_terms($_SESSION["drink"], 'stripe_codes_full');
			foreach($prices_list as $price_list) {
                $price_number = explode(';', $price_list->name);
                if ($price_number[0] == $drink_duration_number) {
                    $stripe_drink_full = $price_number[1];
                }
            }
            $prices_list = wp_get_post_terms($_SESSION["drink"], 'half_stripe_price');
			foreach($prices_list as $price_list) {
				$price_number = explode(';', $price_list->name);
				if ($price_number[0] == $drink_duration_number) {
				$stripe_drink_half = $price_number[1];
				}
			}
	
?>
                <script src="https://js.stripe.com/v3/"></script>
                <script>
                    var stripe = Stripe('pk_test_51HI3I0AAQvB2LmvDUBAFu1xRO75FNOrT8SqK7LzIfQg6x3dzFiBVOBR5M5z6qjxZqa3CTt2Juilzgs12lGUlUYcx00ckFzpkBe');

                    	function sendToStripeHalf() {
                    	stripe.redirectToCheckout({
                        	lineItems: [{
                        	price: '<?php echo $stripe_food_half; ?>', // Replace with the ID of your price
                        	quantity: <?php echo $attendees;?>,
                        	},{
                        	price: '<?php  echo $stripe_drink_half; ?>', // Replace with the ID of your price
                        	quantity: <?php  echo $attendees;?>,
                        	}],
                      	mode: 'payment',
                      	successUrl: '<?php echo get_site_url(null,"/checkout/?paid=0","https");?>', 
                      	cancelUrl: '<?php echo get_site_url(null,"/","https");?>',
                    	}).then(function (result) {
                      // If `redirectToCheckout` fails due to a browser or network
                      // error, display the localized error message to your customer
                      // using `result.error.message`.
                    	});
                    	}
                    function sendToStripeFull() {
                        stripe.redirectToCheckout({
                            lineItems: [{
                                price: '<?php echo $stripe_food_full; ?>', // Replace with the ID of your price
                                quantity: <?php echo $attendees;?>,
                            },{
                                price: '<?php echo $stripe_drink_full; ?>', // Replace with the ID of your price
                                quantity: <?php echo $attendees;?>,
                            }],
                            mode: 'payment',
                            successUrl: '<?php echo get_site_url(null,"/checkout/?paid=1","https");?>', 
                            cancelUrl: '<?php echo get_site_url(null,"/","https");?>',
                        }).then(function (result) {
                            // If `redirectToCheckout` fails due to a browser or network
                            // error, display the localized error message to your customer
                            // using `result.error.message`.
                        });
                    }
                </script>
            <?php
            endwhile;
        endif;
        ?>
