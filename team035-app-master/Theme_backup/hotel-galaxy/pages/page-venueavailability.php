 	
<?php 
if(have_posts()):
	while(have_posts()):the_post();
?>

<?php
    $user_ID=get_current_user_id();
    $args=array(
        'post_type' => 'venue',
        'post_author'=> $user_ID
    );
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
	<div class="page-content" style="text-align:center">					 	

         
         <?php 
		if ('POST' == $_SERVER['REQUEST_METHOD'] && $_POST['action'] == "date_update") {
	global $wpdb;
	$date_string='{"status":"'.$_POST['update_action'].'","available":"1","info_users":"","info_admin":"","price":"","marked_price":""}';

	$table='wp_wpdevart_dates';
	$start_date=$_POST['start_day'];
	$end_date=$_POST['end_day'];



		while(strtotime($start_date) <= strtotime($end_date)){
			$data = array(
				"unique_id" => $_POST['venueID'].'_'.$start_date,
				"calendar_id" => $_POST['venueID'],
				"day" => $start_date,
				"data" =>$date_string
			);
			$test=$wpdb->insert($table, $data, array(
				'%s',
				'%d',
				'%s',
				'%s',
			));
			if($test>0){
				//update successful
			}
			else{
				$where=array(
					"calendar_id" => $_POST['venueID'],
					"day" => $start_date);
				$wpdb->update($table, $data, $where, array(
					'%s',
					'%d',
					'%s',
					'%s',
				));
			}
			$start_date= date ("Y-m-d", strtotime("+1 days", strtotime($start_date)));
		}
}

if(isset($_POST['venueID'])){
?>
		<h2>
			Manage Availabilities
		</h2>
<form method="post">
    <table>
        <tr>
    <th> <label  style = "color:#000000;font-size:20px;margin-right:20px">Start Day</label></th>
   <th>  <input style = "height:40px" type="date" name="start_day" required><p /> </th>
      </tr>
    <br />
  
    <tr>
     <th><label style = "color:#000000;font-size:20px;margin-right:20px">End Day</label></th>
     <th><input style = "height:40px" type="date" name="end_day" required><p />  </th>
     </tr>
    <br />
    
</table>
    <input type="hidden" name="venueID" value="<?php echo $_POST['venueID'] ?>" /><p />
    <button class="custom-btn book-lg animate fadeInUp" type="submit" name="update_action" value="available">Set Available</button>
    <button class="custom-btn book-lg animate fadeInUp" type="submit" name="update_action" value="booked">Set Booked</button>
    <button class="custom-btn book-lg animate fadeInUp" type="submit" name="update_action" value="unavailable">Set Unavailable</button>
    <input type="hidden" name="action" value="date_update">
    <button href="#" class="custom-btn book-lg animate fadeInUp" type="reset">Reset</button>
    
   
</form>
<?php
	    $venue_id=$_POST['venueID'];
    $shortcode = '[wpdevart_booking_calendar id="'.$venue_id.'"]';
    echo do_shortcode($shortcode);
}
elseif(isset($_POST['venueEditID'])){
    ?>
		<h2>
			Edit Venue
		</h2>
    <div class="page-content" >
	    <h3>Edit your venue Information</h3> <br />
	    <div> 
	    <form method="POST" action="https://dev.u20s1035.monash-ie.me/confirmation-page/" enctype="multipart/form-data"> <p />
	         
	        <label>Venue Name (Required)</label><br />
	        <input type="text" name="venueName" value="<?php echo get_the_title($_POST['venueEditID'])?>" style="width:90%;padding-left:5px" required> <p /> <br /> 

	         <label>Venue Description (Required)</label> <br/>
	        <textarea name="venueDesc" rows="10" class="input-xlarge" style="width:90%;max-width:90%;padding-left:5px" required><?php $post_content=get_post($_POST['venueEditID']); echo do_shortcode($post_content->post_content);?></textarea>
	       <br /> <br />
	       
	        
	        <label>Venue Type</label> <br /> 
                    <?php foreach (getCategoryListForSearch() as $values) { if($values=="Recommended Venue"){continue;}?>
                        <label for="<?php echo esc_attr($values); ?>"><?php echo esc_attr($values); ?></label>
                        <input name="venueType[]" type="checkbox" value="<?php echo esc_attr($values); ?>" 
                        <?php $category=get_the_terms($_POST['venueEditID'],'category'); foreach($category as $object){$terms=get_term($object,'category') ; if(esc_attr($values)==$terms->name){echo "checked";}}?>> <br/>
                        <?php
                    } ?> 
            
            <label>Support Service (Required)</label><br />
            *These are ??? used for the ???.<p />
                    <?php foreach (getServiceListForSearch() as $values) { ?>
                        <label for="<?php echo esc_attr($values); ?>">
                            <?php if($values==smoking){?><i class="fas fa-smoking"></i><?php echo esc_attr("Smoking Area");} 
                            elseif($values==wifi){?><i class="fas fa-wifi"></i><?php echo esc_attr("Wifi");}
                            elseif($values==food){?><i class="fas fa-utensils"></i><?php echo esc_attr("External Catering");}
                            elseif($values==parking){?><i class="fas fa-parking"></i><?php echo esc_attr("Parking");}
                            elseif($values==microphone){?><i class="fas fa-microphone"></i><?php echo esc_attr("Microphone");}
                            elseif($values==bar){?><i class="fas fa-glass-martini-alt"></i><?php echo esc_attr("Bar Tab");}?></label>
                        <input name="venueService[]" type="checkbox" value="<?php echo esc_attr($values); ?>"
                        <?php $service=get_the_terms($_POST['venueEditID'],'service'); foreach($service as $object){$terms=get_term($object,'service'); if(esc_attr($values)==$terms->name){echo "checked";}}?>> <br/> <p/>
                        <?php
                    } ?>
            <p/>
        <!-- video-->	
        <div>
            <?php
             $videos = get_posts(array(
		        'post_type' => 'attachment',
		        'post_parent' => $_POST['venueEditID'],
		        ));
		    if($videos){
		        foreach($videos as $video){
		            if($video->post_name=='video'){
		                $url=$video->post_title;
		                break;
		            }
		        }
            }
		        ?>
		    <label for="videos">Videos</label><br />
            <input type="url" name="video" value="<?php echo $url;?>"><br />
            <?php 
                $embed_code = wp_oembed_get($url);
		        echo $embed_code;
		        ?>
        </div>    
            <!-- list all image attachment-->		
		<div>
		    <h3>tick the box if any images you want to delete</h3>
		    <?php
            $jpegImage = get_posts( array(
                'post_type'   => 'attachment',
                'post_parent' => $_POST['venueEditID'],
                'post_mime_type' => 'image/jpeg',
            ) );
            $array=array("");
            if ( $jpegImage ) {
                foreach ( $jpegImage as $attachment ) {
                    if(!in_array(get_the_title($attachment->ID),$array)){
                        $array[]=get_the_title($attachment->ID); ?>
                    <?php echo wp_get_attachment_image( $attachment->ID, 'half' ); ?>
                    <input name=images[] type="checkbox" value="<?php echo $attachment->ID;?>" ><br />
                    <?php
                    }
                }
            }
            $pngImage = get_posts( array(
                'post_type'   => 'attachment',
                'post_parent' => $_POST['venueEditID'],
                'post_mime_type' => 'image/png',
            ) );
            if ( $pngImage ) {
                foreach ( $pngImage as $attachment ) {
                    if(!in_array(get_the_title($attachment->ID),$array)){
                        $array[]=get_the_title($attachment->ID);?>
                    <?php echo wp_get_attachment_image( $attachment->ID, 'half' ); ?>
                    <input name=images[] type="checkbox" value="<?php echo $attachment->ID;?>" ><br />
                    <?php
                    }
                }
            }
            ?>
            
            <label for="multipleImages">Images Upload</label><br />
            <input type="file" name="filesToUpload[]" multiple><br />
            
		</div>
            <input type="hidden" name="venueEditID" value="<?php echo $_POST['venueEditID'] ?>" />
            <input type="hidden" name="action" value="venue_update"> <br />
	        <button style="margin-bottom:10px" href="#" class="custom-btn book-lg animate fadeInUp" type="submit" ><?php _e('Confirm ','hotel-galaxy'); ?></button>
	     </div> 
	    </form>
	</div>
	<?php
}     
elseif(isset($_POST['createPackage'])) {
    
	$parent_venue = get_post($_POST['createPackage']);
	
		?>
		<h2>
			Create Package
		</h2>
    <form method="POST" action="https://dev.u20s1035.monash-ie.me/confirmation-page/" enctype="multipart/form-data"> <p />
            <label>Package Name (Required)</label> <br />
            <input type="text" value="" name='title' style="padding-left:5px;width:90%;" Required> <p />
            <label>Package Description (Required)</label> <br />
            <textarea value="" rows="10" name='short_description' style="max-width:90%;width:90%;padding-left:5px" Required></textarea> <p />

            <h3>Prices</h3> <p />
             <table style="width:90%">
                   <tr>

                   <th><label>Monday</label> </th>
                   <th>  $<input type="number" value="" name="monday" style="width:30%;margin-left:10px;text-align: right;padding-right:5px" Required><p /></th>
                   </tr>

                     <tr>
                  <th><label >Tuesday</label> </th>
                  <th>$<input type="number" value="" name="tuesday" style="width:30%;margin-left:10px;text-align: right;padding-right:5px" Required><p /></th>
                   </tr>

                     <tr>
                   <th><label>Wednesday</label> </th>
                   <th>   $<input type="number" value="" name="wednesday" style="width:30%;margin-left:10px;text-align: right;padding-right:5px" Required><p /></th>
                   </tr>
                    <tr>

                   <th><label>Thursday</label> </th>
                   <th>   $<input type="number" value="" name="thursday" style="width:30%;margin-left:10px;text-align: right;padding-right:5px" Required><p /></th>
                   </tr>
                    <tr>
                   <th><label>Friday</label> </th>
                   <th>   $<input type="number" value="" name="friday" style="width:30%;margin-left:10px;text-align: right;padding-right:5px" Required><p /></th>
                   </tr>
                    <tr>
                   <th><label>Saturday</label> </th>
                   <th>   $<input type="number" value="" name="saturday" style="width:30%;margin-left:10px;text-align: right;padding-right:5px" Required><p /></th>
                   </tr>
                    <tr>
                   <th><label>Sunday</label> </th>
                   <th>   $<input type="number" value="" name="sunday" style="width:30%;margin-left:10px;text-align: right;padding-right:5px" Required><p /></th>
                   </tr>

                    </table>
                    
                    <h3>Images</h3><p />
                    <label for="multipleImages">Multiple Images Upload(JPG,PNG)</label><br />
                    <input type="file" name="filesToUpload[]" multiple><br />

            <input type="hidden" name="action" value="Package" /><p />
            <input type="hidden" name="venue_id" value="<?php echo $_POST['createPackage'] ?>" /> <br />
            <button type="submit" href="#" class="custom-btn book-lg animate fadeInUp"><?php _e('Create Package ','hotel-galaxy'); ?></button>
        </form>
<?php
}
elseif(isset($_POST['editPackage'])){
    ?>
		<h2>
			Edit Package
		</h2>
    <div class="page-content" >
	    <h3>Edit your venue Package</h3> <br />

       <div class="single-post-content">
            <?php
			 if(!is_single() ){
				the_excerpt(__('more','hotel-galaxy'));
			}else{ 
				the_content();
            }
            ?>

            <h2>Packages For This Venue</h2>
            <?php
			global $post;
			$post_ID = $_POST['editPackage'];
            $args = array('post_type' => 'package',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'parent_venue',
                        'field' => 'slug',
                        'terms' => $post_ID,
                    )
                ),
            );
            ?>
            <form method="POST" action="https://dev.u20s1035.monash-ie.me/package-edit/">
            <?php    
            $loop = new WP_query($args);
            if( $loop->have_posts() ){
                while( $loop->have_posts() ) : $loop->the_post();
                    ?>
                    <button name="packageID" type="submit" value="<?php echo get_the_ID(); ?>"><?php the_title()?></button>
                    <?php

                endwhile;
            }
            ?>
            </form>
		</div>
<?php
}
		elseif(isset($_POST['manageBookings'])) {
    $venue_id = $_POST['manageBookings'];
    ?> <h2> Current Bookings for <?php echo get_the_title($venue_id); ?> </h2>
    <?php

    if ('POST' == $_SERVER["REQUEST_METHOD"] && $_POST['response'] == 'true') {
		$table = 'wp_wpdevart_reservations';
        $data = [status => $_POST['action']];
        $where = [id => $_POST['booking_number']];
        $updated = $wpdb->update( $table, $data, $where, $format = null, $where_format = null );
        if ($updated === false) {
            echo "error with insertion";
        }
		$table = 'wp_wpdevart_dates';
		$calendar_id = $_POST['calendar_number'];
		$event_date = $_POST['event_day'];
		
		$unique_id = $calendar_id.'_'.$event_date;
		if ($_POST['action'] == "approved") {
			$date_data = '{"status":"booked","available":"1","info_users":"","info_admin":"","price":"","marked_price":""}';
		}
		elseif ($_POST['action'] == "rejected") {
					$date_data = '{"status":"available","available":"1","info_users":"","info_admin":"","price":"","marked_price":""}';
		}
		$data = [data => $date_data];
		$where = [unique_id => $unique_id];
		        $updated = $wpdb->update( $table, $data, $where, $format = null, $where_format = null );
        if ($updated === false) {
            echo "error with insertion";
			echo $wpdb->last_query;
        }
		
		
    }
    $table = 'wp_wpdevart_reservations';
    $reservations = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table WHERE calendar_id=$venue_id"));
    ?>

    <table style="width:100%">
        <tr>
            <th><h3>Event Date</h3></th>
            <th><h3>Attendees</h3></th>
			<th><h3>Start Time</h3></th>
			<th><h3>Event Duration</h3></th>
            <th><h3>Package Selected</h3></th>
            <th><h3>Client Name</h3></th>
            <th><h3>Current Status</h3></th>
            <th><h3>Response</h3></th>
        </tr>
        <?php
        foreach ($reservations as $booking) {
			$form_words = explode('","',$booking->form);
		?>
		<tr>
				<!-- event date -->
                <td>
                <?php echo $booking->single_day; ?>
                </td>
			<!-- attendees -->
				<td>
			<?php $attendees = explode('":"',$form_words[1]);
			echo $attendees[1]; ?>
				</td>
			<!-- start time -->
							<td>
					<?php $start_time = explode('":"',$form_words[2]);
			echo $start_time[1]; ?>
				</td>
			<!--event duration -->
							<td>
					<?php $event = explode('":"',$form_words[3]);
			echo $event[1]; ?>
				</td>
                <?php
                $package_field = explode('":"',$form_words[0]);
                ?>
				<!-- package selected -->
                <td>
                <?php echo $package_field[1]; ?>
                </td>
			<!--client name-->
                <td>
                <?php
                $client_name = explode('":"',$form_words[4]);
                echo $client_name[1];
                ?>
                </td>
			<!-- current status-->
                <td>
                <?php echo $booking->status; ?>
                </td>
			<!--response-->
                <td>
                <form method="post">
					<?php                $client_email = explode('":"',$form_words[5]); ?>
                    <input type="hidden" name="booking_number" value="<?php echo $booking->id;?>">
					<input type="hidden" name="calendar_number" value="<?php echo $booking->calendar_id;?>">
					<input type="hidden" name="client_email" value="<?php echo $client_email;?>">
                    <input type="hidden" name="response" value="true">
					<input type="hidden" name="event_day" value="<?php echo $booking->single_day; ?>">
					<input type="hidden" name="manageBookings" value="<?php echo $venue_id; ?>">
                    <button type="submit" name="action" value="approved">Approve</button>
                    <button type="submit" name="action" value="rejected">Reject</button>
                </form>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
    <?php
}
?>
    
</div>
</div>
<?php
endwhile;
endif;
?>
    

