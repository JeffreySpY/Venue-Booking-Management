<?php 
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
	<div class="page-content">							
        <h2>Booking Details</h2></hs>
        <form method="POST" style="width:70%">
				<p />
				<label>Attendees:</label>
            	<input type="text" value="<?php echo $_POST['attendees']; ?>" name="attendees" style="width:70%;float:right" disabled> <p />

				<label>Package:</label>
				<input type="text" value="<?php echo get_the_title($_POST['package_id']); ?>" style="width:70%;float:right" disabled> <p />

				<label>Date:</label>
            	<input type="text" value="<?php echo $_POST['event_date']; ?>" name='event_date' class="input-xlarge" style="width:70%;float:right" disabled> <p />

                <?php
                $php_date = date("l", strtotime($_POST['event_date']));
                ?>
				<label>Start Time:</label>
            	<input type="time" value="<?php echo $_POST['start_time']; ?>" class="input-xlarge" name='start_time' style="width:70%;float:right" disabled> <p />

            	<label>Duration:</label>
            	<input type="number" value="<?php echo $_POST['event_duration']; ?>" name='event_duration' style="width:70%;float:right" disabled> <p />

				<label>Name:</label>
            	<input type="text" value="<?php echo $_POST['customer']; ?>" name='customer' style="width:70%;float:right" disabled> <p />

				<label>Company Name:</label>
            	<input type="text" value="<?php echo $_POST["company_name"]; ?>" name="company_name" style="width:70%;float:right" disabled> <p />

				<label>Email:</label>
            	<input type="email" value="<?php echo $_POST["email_address"]; ?>" name="email_address" style="width:70%;float:right" disabled> <p />

				<label>Phone Number: </label>
            	<input type="tel" value="<?php echo $_POST["phone_number"]; ?>" name="phone_number" style="width:70%;float:right" disabled> <p />

				<label>Work Number:</label>
            	<input type="tel" value="<?php echo $_POST["work_number"]; ?>" name="work_number" style="width:70%;float:right" disabled> <p />
                <input type="hidden" value="<?php echo $_POST['package_id'] ?>" name="package_id" >
            	<button type="submit" formaction="<?php echo get_permalink($_POST['package_id']);?>" style="width:30%;height:50px">Cancel Request</button>
			</form>
	</div>	
</div>
<?php
endwhile;
endif;
?>