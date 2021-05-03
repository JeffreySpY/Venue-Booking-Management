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
	<div class="page-content" >							
		<?php the_content();?>

      <script src='https://kit.fontawesome.com/a076d05399.js'></script>
        <form method="POST" action="https://dev.u20s1035.monash-ie.me/confirmation-page/" enctype="multipart/form-data" style="text-align:center"> <p />
            <label>Venue Name (Required)</label> <br />
            <input type="text" value="" class="input-xlarge" name='title' style="width:90%;padding-left:5px" required> <p />
            <label>Venue Description (Required)</label> <br/>
            <textarea rows="10" class="input-xlarge" name='short_description' style="width:90%;max-width:90%;padding-left:5px" required="required"></textarea>  <br /> <br />
            
            <label>Venue Address Keywords (Required)</label><br />
            *The applicable venue location, must separated by commas, e.g. St.Kilda, Melbourne.<p/>
            <input type="text" value="" name="venue_address" style="width:90%;padding-left:5px" required><br /> <br />
            
            <label>Venue Type (Required)</label><br />
            *The type of the venue<p />
                     <table>
                    <?php foreach (getCategoryListForSearch() as $values) { if($values=="Recommended Venue"){continue;} ?>
                         <tr>
                        <th> 
                        <p for="<?php echo esc_attr($values); ?>"><?php echo esc_attr($values); ?>
                        </th> 
                         <th> 
                        <input name="venueType[]" type="checkbox" style="margin-left:20px" value="<?php echo esc_attr($values); ?>" style="margin-left:5px"> 
                        </th>
                         </tr>

                        <?php
                    } ?>
                     </table>
                    <p/>
            <p/>

            <label>Support Service/Facility (Required)</label><br />
            *Please select the service or facility supported by the venue<p />
            <table>
                    <?php foreach (getServiceListForSearch() as $values)  { ?> 
                     <tr>
                     <th>     <p  for="<?php echo esc_attr($values); ?>"> 
                         <?php if($values==smoking){?><i class="fas fa-smoking" style="padding-right:10px"></i><?php echo esc_attr("Smoking Area");} 
                            elseif($values==wifi){?><i class="fas fa-wifi" style="padding-right:10px" ></i><?php echo esc_attr("Wifi");}
                            elseif($values==food){?><i class="fas fa-utensils" style="padding-right:16px" ></i><?php echo esc_attr("External Catering");}
                            elseif($values==parking){?><i class="fas fa-parking" style="padding-right:15px"></i><?php echo esc_attr("Parking");}
                            elseif($values==microphone){?><i class="fas fa-microphone" style="padding-right:17px"></i><?php echo esc_attr("Microphone");}
                            elseif($values==bar){?><i class="fas fa-glass-martini-alt" style="padding-right:13px"></i><?php echo esc_attr("Bar Tab");}?> </th>
                       <th>   <input name="venueService[]" type="checkbox" style="margin-left:20px" value="<?php echo esc_attr($values); ?>"> </th> </tr>
                        <?php
                    } ?>
                   
         </table>
     
       <p />
            <br />
            <label>Venue Size (Required)</label><br />
            *The capacity of the venue <p />
            <input type="number" step="10" min="10" style="padding-left:5px" name="venue_capacity"><br /> <br />
                    
            <label for="videos">Youtube Video link</label><br />
            *For displaying Youtube video on venue page<p />
            <input type="url" name="video" style="width:90%;padding-left:5px"><br />  <br />      
                
            <label for="images">Featured Image/Title Image (Required)</label><br />
                    *Only one image can be used as Featured Image<p />
            <input type="file" name="fileToUpload" required><br />
            <?php wp_nonce_field( 'fileToUpload', 'my_image_upload_nonce' ); ?>
            
            <label for="multipleImages">Images in Body Text (JPG/PNG)</label><br />
                      *Please select multiple images at one time<p />
            <input type="file" name="filesToUpload[]" multiple><br />

            
            <input type="hidden" name="action" value="Venue" /><p />
           *Please wait for a few seconds if the page is not loading, thank you. <br />
            <button type="submit" href="#" class="custom-btn book-lg animate fadeInUp"><?php _e('Create Venue ','hotel-galaxy'); ?></button> 
        </form>
</div>
</div>
<?php
endwhile;
endif;
?>