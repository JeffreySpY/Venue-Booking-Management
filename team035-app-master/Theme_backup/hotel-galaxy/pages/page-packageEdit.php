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
    <?php
    $packageID=$_POST['packageID'];
    $venues = wp_get_post_terms($packageID, 'parent_venue');
    foreach($venues as $things) {
            $venueID = $things->name;
        }
    ?>
    
    <h2>Edit your Package Inforamtion</h2>
    
    <div class="page-content" >
	    <h3>Edit your venue Information</h3> <br />
	    <div> 
	    <form method="POST" action="https://dev.u20s1035.monash-ie.me/confirmation-page/" enctype="multipart/form-data"> <p />
	         
	        <label>Package Name (Required)</label><br />
	        <input type="text" name="packageName" value="<?php echo get_the_title($packageID)?>" style="width:90%;padding-left:5px" required> <p /> <br /> 
	        
	        <label>Package Description (Required)</label> <br/>
	        <textarea name="packageDesc" rows="10" class="input-xlarge" style="width:90%;max-width:90%;padding-left:5px" required><?php $post_content=get_post($packageID); echo do_shortcode($post_content->post_content);?></textarea>
	       <br /> <br />
	       
	       <label>Package Price (Required)</label> <br/>
	       <?php
	       $monday = wp_get_post_terms($packageID, 'monday_price');
            $tuesday = wp_get_post_terms($packageID, 'tuesday_price');
            $wednesday = wp_get_post_terms($packageID, 'wednesday_price');
            $thursday = wp_get_post_terms($packageID, 'thursday_price');
            $friday = wp_get_post_terms($packageID, 'friday_price');
            $saturday = wp_get_post_terms($packageID, 'saturday_price');
            $sunday = wp_get_post_terms($packageID, 'sunday_price');

            $price_days = array(
                "Monday" => $monday,
                "Tuesday" => $tuesday,
                "Wednesday" => $wednesday,
                "Thursday" => $thursday,
                "Friday" => $friday,
                "Saturday" => $saturday,
                "Sunday" => $sunday
            );
            ?>
            <table style="width:90%">
                   
            <?php
                foreach ($price_days as $day => $price) {
                    
                    ?>
                    <tr>
                   <th><label><?php echo $day?></label> </th>
                   <th>  $<input type="number" value="<?php echo $price[0]->name?>" name="<?php echo $day?>" style="width:30%;margin-left:10px;text-align: right;padding-right:5px" Required><p /></th>
                   </tr>
            <?php
                }
                ?>
                    </table>
        
        <div>
		    <label>tick the box if any images you want to delete</label><br/>
		    <?php
            $jpegImage = get_posts( array(
                'post_type'   => 'attachment',
                'post_parent' => $packageID,
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
                'post_parent' => $packageID,
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
		    <input type="hidden" name="packageEditID" value="<?php echo $packageID ?>" />
		    <input type="hidden" name="venueID" value="<?php echo $venueID ?>" />
            <input type="hidden" name="action" value="package_update"> <br />
	        <button style="margin-bottom:10px" href="#" class="custom-btn book-lg animate fadeInUp" type="submit" ><?php _e('Confirm ','hotel-galaxy'); ?></button>
		
	     </form>  
	    </div>
	</div>
</div>
<?php
endwhile;
endif;
?>