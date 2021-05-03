	
<?php 
if(have_posts()):
	while(have_posts()):the_post();
?>

<?php

    $user_ID=get_current_user_id();
    $args=array(
        'post_type' => 'venue',
        'author'=> $user_ID
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
	<div class="page-content" style="margin:auto;overflow-x:auto">							

          <table>
                <tr>
            <th><h3 >Title</h3></th>
            <th><h3 >Address</h3></th>
           <th><h3 >Type</h3></th>
             <th><h3></h3></th>
          </tr>
       
       <form method="post" action="https://dev.u20s1035.monash-ie.me/venue-update/">
             
<?php

    $loop = new WP_Query($args);
    if($loop->have_posts()){
        while($loop->have_posts()) : $loop->the_post();
        $venue_id=$post->ID;
        ?>
        <div >
      
         <tr >
            <th ><h4 style="margin-right:30px"><a href="<?php echo get_permalink($venue_id);?>"> <?php the_title($post->name)?> </a></h4></th>
            <th ><h4 style="margin-right:30px"><?php $address=get_the_terms($post->ID,'address'); print_r($address[0]->name) ;?></h4> </th>
            <th ><h4 style="margin-right:30px"><?php $category=get_the_terms($post->ID,'category'); print_r($category[0]->name) ;?></h4> </th>
            <th ><button style="margin-bottom:10px;margin-right:10px" href="#" class="custom-btn book-lg animate fadeInUp" type="submit" name="venueID" value="<?php echo $venue_id; ?>"><?php _e('Update Calendar ','hotel-galaxy'); ?></button> </th>
            <th ><button style="margin-bottom:10px;margin-right:10px" href="#" class="custom-btn book-lg animate fadeInUp" type="submit" name="venueEditID" value="<?php echo $venue_id; ?>"><?php _e('Edit Venue','hotel-galaxy'); ?></button> </th>
            <th ><button style="margin-bottom:10px;margin-right:10px" href="#" class="custom-btn book-lg animate fadeInUp" type="submit" name="createPackage" value="<?php echo $venue_id; ?>"><?php _e('Add Package','hotel-galaxy'); ?></button> </th>
            <th ><button style="margin-bottom:10px;margin-right:10px" href="#" class="custom-btn book-lg animate fadeInUp" type="submit" name="editPackage" value="<?php echo $venue_id; ?>"><?php _e('Edit Package','hotel-galaxy'); ?></button> </th>
            <th ><button style="margin-bottom:10px" href="#" class="custom-btn book-lg animate fadeInUp" type="submit" name="manageBookings" value="<?php echo $venue_id; ?>"><?php _e('Manage Bookings','hotel-galaxy'); ?></button> </th>
            
          </tr>
        </div>
            <?php
        
        endwhile;
        wp_reset_postdata();
    }
 
?>
    </form>
        </table>
        
    

 
</div>
</div>
<?php
endwhile;
endif;
?>