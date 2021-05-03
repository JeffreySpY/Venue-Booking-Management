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
                        <a href="<?php the_permalink(); ?>" class="gallery-icon">where is this<i class="fa fa-plus"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <h2>
            <?php
            if(is_single()){
                the_title();
            }else {
                ?>
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                <?php
            }

            ?>
        </h2>
        <?php
        $current_id = get_the_id();
        $venues =  wp_get_post_terms(get_the_ID(), 'parent_venue');
        foreach($venues as $things) {
            $venue = $things->name;
        }

        $venue_post = get_post($venue);

        $args = array('post_type' => 'package',
            'tax_query' => array(
                array(
                    'taxonomy' => 'parent_venue',
                    'field' => 'slug',
                    'terms' => $venue,
                )
            ),
        );
        ?>
        <div style="width:100%;height:auto;margin-bottom:50px;float:left">
            <a href="<?php the_permalink($venue_post); ?>" style="float:left;margin:10px;display:block;background:#dfdfdf;width:30%;text-align:center;border-top-left-radius:5px;border-top-right-radius:5px;padding:5px">
                <h3>Return To Venue</h3>
            </a>
            <?php
        $loop = new WP_query($args);
        if( $loop->have_posts() ){
            while( $loop->have_posts() ) : $loop->the_post();

                if (get_the_id() != $current_id) { ?>
                    <a href="<?php the_permalink(); ?>"
                       style="float:left;margin:10px;display:block;background:#dfdfdf;width:30%;text-align:center;border-top-left-radius:5px;border-top-right-radius:5px;padding:5px">
                        <h3> <?php the_title(); ?> </h3>
                    </a>

                    <?php
                } elseif (get_the_id() == $current_id) { ?>
            <a href="<?php the_permalink(); ?>"
               style="float:left;margin:10px;display:block;background:#aaaaaa;width:30%;text-align:center;border-top-left-radius:5px;border-top-right-radius:5px;padding:5px">
                <h3> <?php the_title(); ?> </h3>
            </a>
<?php }
            endwhile;
        }
			        wp_reset_postdata();
        ?>
        </div>
        <div class="single-post-content">
            <?php
            $jpegImage = get_posts( array(
                'post_type'   => 'attachment',
                'post_parent' => $post->ID,
                'post_mime_type' => 'image',
				'exclude' => get_post_thumbnail_id(),
            ) );
            $array=array("");
            if ( $jpegImage ) {
                foreach ( $jpegImage as $attachment ) {
                    if(!in_array(get_the_title($attachment->ID),$array)){
						$array[]=get_the_title($attachment->ID);
						echo wp_get_attachment_image( $attachment->ID, 'full' );
                    }
                }
            }
            
            if(!is_single() ){
                the_excerpt(__('more','hotel-galaxy'));
            }else{
                the_content();
            }

            echo "The minimum spend for this package is as follows:";
            $monday = wp_get_post_terms(get_the_ID(), 'monday_price');
            $tuesday = wp_get_post_terms(get_the_ID(), 'tuesday_price');
            $wednesday = wp_get_post_terms(get_the_ID(), 'wednesday_price');
            $thursday = wp_get_post_terms(get_the_ID(), 'thursday_price');
            $friday = wp_get_post_terms(get_the_ID(), 'friday_price');
            $saturday = wp_get_post_terms(get_the_ID(), 'saturday_price');
            $sunday = wp_get_post_terms(get_the_ID(), 'sunday_price');

            $price_days = array(
                "Monday" => $monday,
                "Tuesday" => $tuesday,
                "Wednesday" => $wednesday,
                "Thursday" => $thursday,
                "Friday" => $friday,
                "Saturday" => $saturday,
                "Sunday" => $sunday
            );

            foreach ($price_days as $day => $price) {
                echo "<br />";
                echo $day . ": $" . $price[0]->name;
            }

            $shortcode = '[wpdevart_booking_calendar id="'.$venue.'"]';
            echo do_shortcode($shortcode);
            
						$table="wp_wpdevart_dates";
			$dates=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table WHERE calendar_id=$venue"));
			?>
			
			
			<form method="POST" id="booking_form" action="https://dev.u20s1035.monash-ie.me/booking-confirmation/" style="width:70%">
				<p />           		
				<label for="atendees">Attendees: <i>*required</i></label>
            	<input type="number" value="" id="atendees" style="width:70%;float:right" name="attendees" required> <p />
				
				<label for="package_name">Package: <i>*required</i></label>
				<input type="text" id="package_name" value="<?php the_title(); ?>" name="package" style="width:70%;float:right" disabled> <p />
				
				<label for="select_date">Date: <i>*required</i></label>
            	<select  id="select_date" onchange="setDay()" name='event_date' class="input-xlarge" style="width:70%;float:right" required>
					<?php 
					foreach($dates as $date) {
						if($date->data == '{"status":"available","available":"1","info_users":"","info_admin":"","price":"","marked_price":""}') {
							?><option value="<?php echo $date->day;?>"><?php echo $date->day; ?> </option> <?php
						}
					}
					?></select> <p />
				<label for="daybox">Day</label>
				<input type="text" id="daybox" name="event_day" style="width:70%;float:right" disabled> <p />
				
				<label for="start_time">Start Time: <i>*required</i></label>
            	<input type="time" id="start_time" value="" class="input-xlarge" name='start_time' style="width:70%;float:right" required> <p />
				
            	<label for="event_duration">Duration: <i>*required</i></label>
            	<input type="number" id="event_duration" value="" name='event_duration' style="width:70%;float:right" required> <p />
				
				<label for="customer">Name: <i>*required</i></label>
            	<input type="text" id="customer" value="" name='customer' style="width:70%;float:right" required> <p />
								
				<label for="company_name">Company Name:</label>
            	<input type="text" id="company_name" value="" name="company_name" style="width:70%;float:right"> <p />
            	
				<label for="email_address">Email: <i>*required</i></label>
            	<input type="email" value="" id="email_address" name="email_address" style="width:70%;float:right" required> <p />
				
				<label for="phone_number">Phone Number: <i>*required</i></label>
            	<input type="tel" value="" id="phone_number" name="phone_number" style="width:70%;float:right" required> <p />
				
				<label for="work_number">Work Number:</label>
            	<input type="tel" value="" id="work_number" name="work_number" style="width:70%;float:right"> <p />
				
				<input type="hidden" id="package_id" value="<?php echo $current_id ?>" name="package_id" >

            	<button onclick="storePackage()" type="submit" style="width:30%;height:50px">  Book Package</button>
			</form>
        </div>
        <?php
        $defaults = array(
            'before'           => '<p class="abc">' . __( 'Pages:','hotel-galaxy' ),
            'after'            => '</p>',
            'link_before'      => '',
            'link_after'       => '',
            'next_or_number'   => 'number',
            'separator'        => ' ',
            'nextpagelink'     => __( 'Next page','hotel-galaxy' ),
            'previouspagelink' => __( 'Previous page','hotel-galaxy' ),
            'pagelink'         => '%',
            'echo'             => 1
        );

        wp_link_pages( $defaults );

        ?>
        <div class ="clearfix"></div>
    </div>
</div>

<script>
function setDay() {
	var datebox = document.getElementById("select_date");
	var d=new Date(datebox.value);
	var n = d.getDay();
	let days = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
	document.getElementById("daybox").value = days[n];
	}

function storePackage() {
    var bookForm = document.getElementById("booking_form");
    for (var i=0; i < bookForm.elements.length; i++) {
        var item = bookForm.elements.item(i);
        if (item.value != "") {
            document.cookie = item.name + "=" + item.value + ";path=/";
        }
    }
}
</script>