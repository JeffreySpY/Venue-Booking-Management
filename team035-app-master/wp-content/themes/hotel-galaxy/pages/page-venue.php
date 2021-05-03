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
		<?php the_content();
		$user_ID=get_current_user_id();
    	$user_meta=get_userdata($user_ID);
        $user_roles=$user_meta->roles;
        if($user_roles[0]=="venue_vendor"){
        $args=array(
            'post_type' => 'venue',
            'author'=> $user_ID
        );
         $loop = new WP_Query($args);
        if($loop->have_posts()){
            ?>
            <script>
            alert("Sorry, one account can only list one venue! ")
            window.location.href='<?php echo get_site_url(null,"/dashboard","https");?>'; 
            </script>
            <?php              }  }?>

      <script src='https://kit.fontawesome.com/a076d05399.js'></script>
        <form method="POST" action="<?php echo get_site_url(null,"/confirmation-page","https");?>" enctype="multipart/form-data" style="text-align:center" onsubmit="javascript:return check()"> <p />
                
            <label>Venue Name (Required)</label> <br />
            <input type="text" value="" class="input-xlarge" name='title' style="width:90%;padding-left:5px" required> <p />
            <label>Venue Description (Required)</label> <br/>
            <textarea rows="10" class="input-xlarge" name='short_description' style="width:90%;max-width:90%;padding-left:5px" required="required"></textarea>  <br /> <br />
            
            <label>Venue Address Keywords (Required)</label><br />
            *The applicable venue location, must separated by commas, e.g. St.Kilda, Melbourne.<p/>
            <input type="text" value="" name="venue_address" style="width:90%;padding-left:5px" required><br /> <br />
            
            <style>
            td{
            
  text-align: center; 
  vertical-align: middle; 
  padding-right:10px;
    padding-left:10px;
  
            }
           
              </style>
        
            <label>Venue Type (Required)</label><br />
            *Tick the type of the venue<p />
                     <table>
                          <?php 
                          $count=0;
                            ?>
                             <tr>
                      
                    <?php 
                    foreach (getCategoryListForSearch() as $values) {
                        if($values=="Featured Venue" || $values=="Popular Event" || $values=="Popular Venue Type")
                    {continue;} 
                    
                   if ($count<5){
                     ?>
                         
                     <td> 
                        <p  for="<?php echo esc_attr($values); ?>"><?php echo esc_attr($values); ?>
                        </td> 
                         <td    style=" padding-bottom:15px;"> 
                        <input name="venueType[]" type="checkbox"  value="<?php echo esc_attr($values); ?>" > 
                        </td>
                         
                         <?php
                          $count =$count+1;
                   }else{
                        ?>
                        </tr>
                         <tr>
                        <td> 
                        <p for="<?php echo esc_attr($values); ?>"><?php echo esc_attr($values); ?>
                        </td> 
                         <td  style=" padding-bottom:15px;"> 
                        <input name="venueType[]" type="checkbox"  value="<?php echo esc_attr($values); ?>"> 
                        </td>
                          <?php
                          $count=1;
                   }
                       
                  
               
                   ?>
                   
                         
                            <?php
                          
                    } ?>
                     </table>
                    </br>
            <p/>

            <label>Support Service/Facility (Required)</label><br />
            *Please select the service or facility supported by the venue<p />
        <div id="service">   
            <table>
                    <?php foreach (getServiceListForSearch() as $values)  { ?> 
                     <tr>
                     <td>     
                     <p  for="<?php echo esc_attr($values); ?>"> 
                         <?php 
         
               if($values==Bar){?> <i class="fas fa-glass-martini-alt" style="padding-right:13px"></i><?php echo esc_attr("Bar Tab");}
				elseif($values==BYO){?> <i class="fas fa-wine-bottle" style="padding-right:10px"></i><?php echo esc_attr("BYO");}  
				elseif($values==Dance){?> <img src="https://img.icons8.com/material/15/000000/dancing.png" style="padding-right:10px"/><?php echo esc_attr("Dance Floor");} 
				elseif($values==Disability){?> <i class="fas fa-blind" style="padding-right:10px"></i><?php echo esc_attr("Disability Access");} 
			    elseif($values==Music){?> <i class="fas fa-music" style="padding-right:10px"></i><?php echo esc_attr("External Music");} 
				elseif($values==Projector){?> <img src="https://img.icons8.com/material-rounded/15/000000/video-projector.png"/ style="padding-right:10px"><?php echo esc_attr("Projector");} 
				elseif($values==Smoking){?> <i class="fas fa-smoking" style="padding-right:10px"></i><?php echo esc_attr("Smoking Area");} 
                elseif($values==Wifi){?> <i class="fas fa-wifi" style="padding-right:10px"></i><?php echo esc_attr("Wifi");}
                elseif($values==Parking){?> <i class="fas fa-parking" style="padding-right:15px"></i><?php echo esc_attr("Parking");}
                elseif($values==Microphone){?> <i class="fas fa-microphone" style="padding-right:17px"></i><?php echo esc_attr("Microphone		");}
                elseif($values==Stage){?> <img src="https://img.icons8.com/android/15/000000/park-concert-shell.png" style="padding-right:13px" /> <?php echo esc_attr("Stage");}  ?>
                            
                            </td>
                       <td>   <input name="venueService[]" type="checkbox" style="margin-left:30px" value="<?php echo esc_attr($values); ?>"> </td> </tr>
                        <?php
                    } ?>
                   
         </table>
        </div> 
       <p />
            <br />
                    
            <label for="videos">Youtube Video link</label><br />
            *For displaying Youtube video on venue page<p />
            <input type="url" name="video" style="width:90%;padding-left:5px"><br />  <br />      
                
            <label for="images">Featured Image/Title Image (5MB, Required)</label><br />
                    *Only one image can be used as Featured Image<p />
            <input type="file" name="fileToUpload" id="featuredImage" required onchange="Filevalidation()"><br />
            <?php wp_nonce_field( 'fileToUpload', 'my_image_upload_nonce' ); ?>

            <label for="multipleImages">Images in Body Text (5MB, JPG/PNG)</label><br />
                      *Please select multiple images at one time<p />
            <input type="file" name="filesToUpload[]" id="images" multiple><br />
            
            <!--<label for="pdf">PDF (5MB)</label><br />-->
            <!--        *Make sure the filename is the same as package name<p />-->
            <!--<input type="file" name="pdfToUpload[]" id="pdfImage" multiple><br />-->
            
            <script>
	            function check(){
	                var form_data = new FormData(document.querySelector("form"));
	                if(form_data.getAll("venueType[]").length == 0)
                    {
                        //show error
                        alert("please select at least one type");
                        return false;
                    }
                    else if(form_data.getAll("venueService[]").length == 0)
                    {
                        alert("please select at least one service");
                        return false;
                    }
                    return Filevalidation();

                    // if(!form_data.has("venueService[]"))
                    // {
                    //     document.getElementById("service").style.visibility = "visible";
                    //   return false;      
                    // }
                    // else
                    // {
                    //     document.getElementById("service").style.visibility = "hidden";
                    //   return true;
                    // }

	               // var checkBox = document.getElementById("venueService");
	               // var file = document.getElementById("featureImageUpload");
                //       if (checkBox.checked == false){
                //         alert("please select at least one service");
                //         return false;
                //       }
                    //   else if(checkBox.checked != true && file.files.length != 0){
                    //     alert("You have already one feature image, if you want to update new one, please delete old one");
                    //     return false;
                    //   }
	            
	                
	            }
	            function Filevalidation(){
	            const fi = document.getElementById('featuredImage');
	                if(fi.files.length > 0){
	                    for (const i = 0; i<= fi.files.length -1; i++){
	                        const fsize = fi.files.item(i).size;
	                        const file = Math.round((fsize/1024));
	                        if(file >= 5120){
	                            alert("The size of image is over 5MB, Please reupload a new one");
	                            return false;
	                        }
	                    }
	                }
	            }
	        </script>
	        
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