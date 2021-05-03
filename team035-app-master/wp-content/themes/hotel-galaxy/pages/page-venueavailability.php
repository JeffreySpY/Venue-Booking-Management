 	
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
		<div class="home-room-img" style="display: block;
  max-width:400px;
  width: auto;
  height: auto;">
			<?php $img_class= array('class' =>'img-responsive hotel-featured-img'); 
			the_post_thumbnail('', $img_class); ?>
		</div>
		<?php
		endif;
		?>
	</div>	
	<div class="page-content" style="text-align:center">					 	

         
<?php 


if(isset($_POST['updateRoomAva'])){
?>

    <?php
    if ('POST' == $_SERVER['REQUEST_METHOD'] && $_POST['action'] == "date_update") {
	global $wpdb;
	$date_string='{"status":"'.$_POST['update_action'].'","available":"1","info_users":"","info_admin":"","price":"","marked_price":""}';
	$table='wp_wpdevart_dates';
	$start_date=$_POST['start_day'];
	$end_date=$_POST['end_day'];


		while(strtotime($start_date) <= strtotime($end_date)){
			$data = array(
				"unique_id" => $_POST['updateRoomAva'].'_'.$start_date,
				"calendar_id" => $_POST['updateRoomAva'],
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
					"calendar_id" => $_POST['updateRoomAva'],
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
?>

<?php
    ?>
		<h2>
			Manage Availabilities
		</h2>
<form method="POST" action="<?php echo get_site_url(null,"/venue-update","https");?>">  
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
    <input type="hidden" name="roomID" value="<?php echo $_POST['updateRoomAva'] ?>" /><p />
    <button class="custom-btn book-lg animate fadeInUp" type="submit" name="update_action" value="available">Set Available</button>
    <button class="custom-btn book-lg animate fadeInUp" type="submit" name="update_action" value="booked">Set Booked</button>
    <button class="custom-btn book-lg animate fadeInUp" type="submit" name="update_action" value="unavailable">Set Unavailable</button>
    <input type="hidden" name="action" value="date_update">
    <input type="hidden" name="updateRoomAva" value="<?php echo $_POST['updateRoomAva'] ?>">
    <button href="#" class="custom-btn book-lg animate fadeInUp" type="reset">Reset</button>
    
   
</form>
<?php
	    $room_id=$_POST['updateRoomAva'];
    $shortcode = '[wpdevart_booking_calendar id="'.$room_id.'"]';
    echo do_shortcode($shortcode);
}
elseif(isset($_POST['venueEditID'])){
    ?>
    <div class="page-content" >
	    <div> 
	    <form method="POST" action="<?php echo get_site_url(null,"/confirmation-page","https");?>" enctype="multipart/form-data" onsubmit="javascript:return check()"> <p />  
	         
	        <label>Venue Name (Required)</label><br />
	        <input type="text" name="venueName" value="<?php echo get_the_title($_POST['venueEditID'])?>" style="width:90%;padding-left:5px" required> <p /> 

	         <label>Venue Description (Required)</label> <br/>
	        <textarea name="venueDesc" rows="20" class="input-xlarge" style="width:90%;max-width:90%;padding-left:5px" required><?php $post_content=get_post($_POST['venueEditID']); echo do_shortcode($post_content->post_content);?></textarea>
	       <br /> <br />
	       
	       
	       <?php
            $address=get_the_terms($_POST['venueEditID'],"address");
            foreach($address as $value){
                $array[]=$value->name;
            }

            ?>
	       <label>Venue Address Keywords (Required)</label><br />
            *The applicable venue location, must separated by commas, e.g. St.Kilda, Melbourne.<p/>
            <input type="text" value="<?php foreach($array as $value){echo $value . ",";}?>" name="venueAddress" style="width:90%;padding-left:5px" required><br /> <br />
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
                        <input name="venueType[]" type="checkbox"  value="<?php echo esc_attr($values); ?>" <?php $category=get_the_terms($_POST['venueEditID'],'category'); foreach($category as $object){$terms=get_term($object,'category') ; if(esc_attr($values)==$terms->name){echo "checked";}}?>> 

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
                        <input name="venueType[]" type="checkbox"  value="<?php echo esc_attr($values); ?>"<?php $category=get_the_terms($_POST['venueEditID'],'category'); foreach($category as $object){$terms=get_term($object,'category') ; if(esc_attr($values)==$terms->name){echo "checked";}}?>> 
                        </td>
                          <?php
                          $count=1;
                   }
                   ?>
                   <?php
                          
                    } ?>
                     </table>
                     <p/>
            
             <br />
            <label>Support Service/Facility (Required)</label><br />
            *Please select the service or facility supported by the venue.<p />
              <table>
                    <?php foreach (getServiceListForSearch() as $values) { ?>
                         <tr>
                        <th> 
                         <p for="<?php echo esc_attr($values); ?>" style="padding-right:15px">
                             <?php 
                if($values==Bar){?> <i class="fas fa-glass-martini-alt" style="padding-right:13px"></i><?php echo esc_attr("Bar Tab");}
				elseif($values==BYO){?> <i class="fas fa-wine-bottle" style="padding-right:10px"></i><?php echo esc_attr("BYO");}  
				elseif($values==Dance){?> <img src="https://img.icons8.com/material/15/000000/dancing.png" style="padding-right:10px"/><?php echo esc_attr("Dance Floor");} 
				elseif($values==Disability){?> <i class="fas fa-blind" style="padding-right:10px"></i><?php echo esc_attr("Disability Access");} 
			    elseif($values==Music){?> <i class="fas fa-music" style="padding-right:10px"></i><?php echo esc_attr("External Music");} 
				elseif($values==Projector){?> <img src="https://img.icons8.com/material-rounded/15/000000/video-projector.png"/ style="padding-right:10px"><?php echo esc_attr("Projector");} 
				elseif($values==Smoking){?> <i class="fas fa-smoking" style="padding-right:10px"></i><?php echo esc_attr("Smoking Area");} 
                elseif($values==Wifi){?> <i class="fas fa-wifi" style="padding-right:10px"></i><?php echo esc_attr("Wifi");}
                elseif($values==Parking){?> <i class="fas fa-parking" style="padding-right:15px"></i><?php echo esc_attr("Parking		");}
                elseif($values==Microphone){?> <i class="fas fa-microphone" style="padding-right:17px"></i><?php echo esc_attr("Microphone		");}
                elseif($values==Stage){?> <img src="https://img.icons8.com/android/15/000000/park-concert-shell.png" style="padding-right:13px" /> <?php echo esc_attr("Stage");}  ?>
                            
                    

                            </p>
                        </th> 
                         <th> 
                        <input name="venueService[]" type="checkbox" value="<?php echo esc_attr($values); ?>"
                        <?php $service=get_the_terms($_POST['venueEditID'],'service'); foreach($service as $object){$terms=get_term($object,'service'); if(esc_attr($values)==$terms->name){echo "checked";}}?>> <br/> <p/>
                        </th>
                        </tr>

                        <?php
                    } ?>
                     </table>
      
                    
           <p/>
            <br />
            <!-- capacity-->
            <?php
            $capacity=get_the_terms($_POST['venueEditID'],"capacity");
            foreach($capacity as $value){
                $size=$value->name;
            }
            ?>
            
        <!-- video-->	
      
            <?php
             $videos = get_posts(array(
		        'post_type' => 'attachment',
		        'post_parent' => $_POST['venueEditID'],
		        ));
		    if($videos){
		        foreach($videos as $video){
		            if($video->post_content=='video'){
		                $url=$video->post_title;
		                break;
		            }
		        }
            }
		        ?>
		        
		    <!--<label for="videos">Videos</label><br />-->
		    
		         <label for="videos">Youtube Video link</label><br />
            *For displaying Youtube video on venue page<p />
            <input type="url" name="video" style="width:90%;padding-left:5px"  value="<?php echo $url;?>" ><br />  
            
       <br />  
        
        
            <!-- list all image attachment-->		

		    <Label>Uploaded Images</Label><br />
		     *To delete images, please tick the checkbox <br />
		     *The first is the feature image, which cannot be empty and can only be replaced by a new image<p />
		    
         
            
            <?php
            $thumbnailID=get_post_thumbnail_id($_POST['venueEditID']);
            ?>
           
            <?php
            print_r(get_the_post_thumbnail($_POST['venueEditID'],"medium"));
            ?>

            <!--<input name="featureImage" id="featureImage" type="checkbox" value="<?php echo $thumbnailID?>" onclick="myFunction()" ><br/>-->
            <input type="hidden" name="featureImage" value="<?php echo $thumbnailID ?>" />
            
              <table>
                  <div>
                      <?php
                        $jpegImage = get_posts( array(
                            'post_type'   => 'attachment',
                            'post_parent' => $_POST['venueEditID'],
                            'post_mime_type' => 'image',
            				'exclude' => $thumbnailID,
                        ) );
                        $array=array("");
                        if ( $jpegImage ) {
                            foreach ( $jpegImage as $attachment ) {
                                if(!in_array(get_the_title($attachment->ID),$array)){
            						$array[]=get_the_title($attachment->ID);?>
            						<td>
            						<?php echo wp_get_attachment_image( $attachment->ID, 'medium');?>
            						</td>
            						<td>
            						<input name=images[] type="checkbox" style="margin-left:30px" value="<?php echo $attachment->ID;?>" >
            						</td>
            						<?php
                                }
                            }
                        }
                        ?>
                  </div>
            
              </table>
             
              
              <?php  if (empty($jpegImage) ==true ) {  ?>
            
              <p> <?php echo "No images have been uploaded for this venue, please upload in the below section"; ?> </p>
            <?php   } ?>
           
               <p/>
             <br />
             
            <label for="images">Reupload Featured Image/Title Image (5MB) </label><br />
                    Only one image can be used as Featured Image<p />
            <input type="file" name="featureImageUpload" id="featureImageUpload"><br />
            <?php wp_nonce_field( 'featureImageUpload', 'my_image_upload_nonce' ); ?>
            
            <label for="multipleImages">New Images to Upload For Body Text (5MB)</label><br />
            *Please select multiple images at one time<p />
            <input type="file" name="filesToUpload[]" multiple><br />
            
            
	        <script>
	            function check(){
	                var checkBox = document.getElementById("featureImage");
	                var file = document.getElementById("featureImageUpload");

                    if(file.files.length != 0){
                        alert("Notice: the image you have submitted in feature image section will replace the original one")
                    }
	            }
	        </script>
	        
	         
           
            
            <input type="hidden" name="venueEditID" value="<?php echo $_POST['venueEditID'] ?>" />
            <input type="hidden" name="action" value="venue_update"> <br />
	        <button style="margin-bottom:10px" href="#" class="custom-btn book-lg animate fadeInUp" type="submit" ><?php _e('Update the Venue ','hotel-galaxy'); ?></button>
	     </div> 
	    </form>
	</div>
	<?php
}
elseif(isset($_POST['pdfEditID'])){
    ?>
    
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
            </style>
    <p>
    <label>Uploaded packages details</label><br />
            *To delete pdfs, please tick the checkbox
    </p>
    <form method="POST" action="<?php echo get_site_url(null,"/confirmation-page","https");?>" enctype="multipart/form-data"> 
    <table>
            <?php
            $pdfImage = get_posts(array(
                'post_type' => 'attachment',
                'post_parent'=> $_POST['pdfEditID'],
                'post_mime_type' => 'application/pdf'
            ));
            if(!empty($pdfImage)){
                foreach($pdfImage as $pdf){
            ?>
            <td><button  type="button" onClick="showPDF(this.value)" class="packageButton"  value="<?php echo $pdf->guid?>" ><?php echo $pdf->post_title;  ?></button></td>
            <td><input name="pdfs[]" type="checkbox" value="<?php echo $pdf->ID;  ?>"></td>
            <?php 
                }
            }?>
            </table>

            <div id="showPDF">
                
            </div>
            <script>
                function showPDF(value){
                    var guid = '<embed src="' + value + '" type="application/pdf" width="774" height="774"></embed>'
                    document.getElementById('showPDF').innerHTML=guid;
                    return false;
                }
            </script>
            
            <br /><p>
            <!--<label for="pdf">Upload new PDF (5MB)</label><br />-->
            <!--        *Make sure the filename is the same as package name<p />-->
            <!--<input type="file" name="pdfToUpload[]" id="pdfImage" multiple>-->
            
            <input type="hidden" name="pdfEditID" value="<?php echo $_POST['pdfEditID'] ?>" />
            <input type="hidden" name="action" value="pdf_update"> <br />
	        <button style="margin-bottom:10px" href="#" class="custom-btn book-lg animate fadeInUp" type="submit" ><?php _e('Confirm ','hotel-galaxy'); ?></button>
	     </div>
	</form>
	<?php
}
elseif(isset($_POST['createPackage'])) {
    
	$parent_venue = get_post($_POST['createPackage']);

	
		?>
		<h2>Create Package</h2>
		     </br>
		<form method="POST" action="<?php echo get_site_url(null,"/confirmation-page","https");?>" enctype="multipart/form-data" onsubmit="javascript:return checkForm()"> <p />  
	
        <label>Food Packages</label>    
        <input class="custom-btn book-lg animate fadeInUp" style="margin-left:250px;width:230px;height:50px" type="button" value="Add New Food Package" onclick="addPackageRow('packageTable')" />
        <input class="custom-btn book-lg animate fadeInUp" style="height:50px;width:230px;" type="button" value="Delete Last Food Package" onclick="deletePackageRow('packageTable')" /> 
            <table id="packageTable">
                <tr>
                    <th><h5>Title</h5></th>
                    <th><h5>Rate/pp.</h5></th>
                </tr>
                <tr>
                    <td><input type="text" name="foodName[]" style="width:200px"></td>
                    <td><input type="number" name="foodRate[]" min="1" style="width:200px"></td>
                </tr>
            </table>
            </br>
            <p/>
             </br>
            <label>Drink Packages</label>
            <input class="custom-btn book-lg animate fadeInUp" style="width:230px;margin-left:250px;height:50px" type="button" value="Add New Drink Package" onclick="addNewDrink('drinkTable')" />
            <input class="custom-btn book-lg animate fadeInUp" style="height:50px;width:220px" type="button" value="Add New Drink Duration" onclick="addDrinkRow('drinkTable')" />
            <input class="custom-btn book-lg animate fadeInUp" style="height:50px;width:250px" type="button" value="Delete Last Drink Duration" onclick="deleteDrinkRow('drinkTable')" />
              <table id="drinkTable"> 
               <tr>
                        <th><h5>Title</h5></th>
                         <th><h5>Duration(hours):</h5></th>
                    <th><h5>Rate/pp.</h5></th>
                </tr>
                <tr>
                    <td><input type="text" name="drinkName[]" style="width:200px"></td>
                    <td><input type="number" name="drinkDuration[]" min="0" style="width:200px"></td>
                    <td><input type="number" name="drinkRate[]" min="1" style="width:200px"></td>
                    <td><input type="hidden" id="drinkTypes" name="numOfTypes" value="1"></td>
                </tr>
            </table>
            
            <br />
            <p>
            <label for="pdf">PDF (5MB)</label><br />
                    *Make sure the filename is the same as package name<p />
            <input type="file" name="pdfToUpload[]" id="pdfImage" multiple><br />
            </p>
            
            <input type="hidden" name="parentRoom" value="<?php echo $parent_venue->ID;?>">
		<p />
                  <br/>
                  

        <?php 
        $venue=wp_get_post_terms($_POST['createPackage'], 'parent_venue'); 
        foreach($venue as $value){
            $venueID=$value->name; 
        }
        ?>            
		<input type="hidden" name="action" value="Package" /><p />
		<input type="hidden" name="venue_id" value="<?php echo $venueID ?>" /> <br />
		<button type="submit" href="#" class="custom-btn book-lg animate fadeInUp"><?php _e('Create Package ','hotel-galaxy'); ?></button>
		</form>
<style>
input{
    width:200px;
}
</style>
<script>
   //add last row to food package table
    function addPackageRow(tableID) {

			var table = document.getElementById(tableID);

			var rowCount = table.rows.length;
			var row = table.insertRow(rowCount);

			var cell1 = row.insertCell(0);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.name="foodName[]";
			cell1.appendChild(element1);


			var cell2 = row.insertCell(1);
			var element2 = document.createElement("input");
			element2.type = "number";
			element2.name = "foodRate[]";
			cell2.appendChild(element2);
	}
	//delete last row of food package table
	function deletePackageRow(tableID) {

			var table = document.getElementById(tableID);

			var rowCount = table.rows.length;
			if(rowCount > 1){
                table.deleteRow(rowCount -1);
			}
	}
		
    var i=1;
    var count=1;
    //add last row to drink package table
    function addDrinkRow(tableID) {

			var table = document.getElementById(tableID);

			var rowCount = table.rows.length;
			var row = table.insertRow(rowCount);

            var cell1 = row.insertCell(0);
			var element1 = document.createElement("input");
			element1.type = "text";
			cell1.appendChild(element1);
			element1.style.display = "none";


			var cell2 = row.insertCell(1);
			var element2 = document.createElement("input");
			element2.type = "number";
			element2.name = "drinkDuration[]";
			cell2.appendChild(element2);
			
			var cell3 = row.insertCell(2);
			var element3 = document.createElement("input");
			element3.type = "number";
			element3.name = "drinkRate[]";
			cell3.appendChild(element3);
			
            count++;
		}
	
	//delete last row of drink package table
	function deleteDrinkRow(tableID) {

			var table = document.getElementById(tableID);

			var rowCount = table.rows.length;
			if(rowCount > 1){
                table.deleteRow(rowCount -1);
			}
	}
		
	//add new drink type row with three columns	
	function addNewDrink(tableID) {

            i++;
            
			var table = document.getElementById(tableID);

			var rowCount = table.rows.length;
			var row = table.insertRow(rowCount);
            
			var cell1 = row.insertCell(0);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.name="drinkName[]";
			cell1.appendChild(element1);


			var cell2 = row.insertCell(1);
			var element2 = document.createElement("input");
			element2.type = "number";
			element2.name = "drinkDuration[]";
			cell2.appendChild(element2);
			
			var cell3 = row.insertCell(2);
			var element3 = document.createElement("input");
			element3.type = "number";
			element3.name = "drinkRate[]";
			cell3.appendChild(element3);
			
			var cell4 = row.insertCell(3);
			var element4 = document.createElement("input");
			element4.type = "hidden";
			element4.name = "drinkRate"+(i-2);
			element4.value = count;
			cell4.appendChild(element4);
			
			var num=document.getElementById("drinkTypes").value;
			document.getElementById("drinkTypes").value=i
			
			count=1;
		}
	
	//check form if one of input text empty while corresponding one not empty alert users and block submitting	
    function checkForm(){
        var i;
        
        var foodName=document.getElementsByName("foodName[]")[0].value;
        var foodRate=document.getElementsByName("foodRate[]")[0].value;
        var drinkName=document.getElementsByName("drinkName[]")[0].value;
        var drinkDuration=document.getElementsByName("drinkDuration[]")[0].value;
        var drinkRate=document.getElementsByName("drinkRate[]")[0].value;
        if(foodName==="" && foodRate==="" && drinkName==="" && drinkDuration==="" && drinkRate===""){
            alert("Please fill up at least one package details");
            return false;
        }

        var foodLength=document.getElementsByName("foodName[]").length;
        for(i = 0; i < foodLength; i++){
            var foodName=document.getElementsByName("foodName[]")[i].value;
            var foodRate=document.getElementsByName("foodRate[]")[i].value;
            if(foodName==="" && foodRate!==""){
                alert("Please fill the food package title");
                return false;
            }
            else if(foodName!=="" && foodRate===""){
                alert("Please fill the food package price rate");
                return false;
            }
        }

        var drinkLength=document.getElementsByName("drinkName[]").length;
        for(i = 0; i < drinkLength; i++){
            var drinkName=document.getElementsByName("drinkName[]")[i].value;
            var drinkDuration=document.getElementsByName("drinkDuration[]")[i].value;
            var drinkRate=document.getElementsByName("drinkRate[]")[i].value;
            if(drinkName==="" && drinkDuration==="" && drinkRate===""){
                return true;
            }
            else if(drinkName!=="" && drinkDuration!=="" && drinkRate!==""){
                return true;
            }
            else{
                alert("Please fill the empty text box for drink package");
                return false;
            }
        }


        return true;
        
    }
</script>
<?php
}



elseif(isset($_POST['manageBookings'])) {
    $venue_id = $_POST['manageBookings'];
    ?> <h2> Current Bookings for <?php echo get_the_title($venue_id); ?> </h2>
    <?php

  if ('POST' == $_SERVER["REQUEST_METHOD"] && $_POST['response'] == 'true') {
        $table = 'venue_bookings';
        $data = [status => $_POST['action']];
        $where = [booking_id => $_POST['booking_number']];
        $updated = $wpdb->update( $table, $data, $where, $format = null, $where_format = null );
        if ($updated === false) {
            echo "error with insertion";
        }
        $table = 'wp_wpdevart_dates';
        $calendar_id = $_POST['manageBookings'];
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

    $table = 'venue_bookings';
    $reservations = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table WHERE venue_id = $venue_id"));
    ?>

    <table style="width:100%">
        <tr>
            <th><h3>Event Date</h3></th>
			<th><h3>Room</h3></th>
			<th><h3>Food Package</h3></th>
			<th><h3>Drink Package</h3></th>
            <th><h3>Client</h3></th>
            <th><h3>Status</h3></th>
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
			<td>
                <?php echo get_the_title($booking->room_id); ?>
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
					<input type="hidden" name="client_email" value="<?php echo $client_email;?>">
                    <input type="hidden" name="response" value="true">
					<input type="hidden" name="event_day" value="<?php echo $booking->date_of_event; ?>">
					<input type="hidden" name="manageBookings" value="<?php echo $venue_id; ?>">
                    <button type="submit" name="action" value="approved">Approved</button>
                    <button type="submit" name="action" value="rejected">Rejected</button>
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

<?php 
if ('POST' == $_SERVER['REQUEST_METHOD'] && $_POST['action'] == "date_update") {
	global $wpdb;
	$date_string='{"status":"'.$_POST['update_action'].'","available":"1","info_users":"","info_admin":"","price":"","marked_price":""}';
	$table='wp_wpdevart_dates';
	$start_date=$_POST['start_day'];
	$end_date=$_POST['end_day'];


		while(strtotime($start_date) <= strtotime($end_date)){
			$data = array(
				"unique_id" => $_POST['updateRoomAva'].'_'.$start_date,
				"calendar_id" => $_POST['updateRoomAva'],
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
					"calendar_id" => $_POST['updateRoomAva'],
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
?>
<input type="hidden" name="updateRoomAva" value="<?php $_POST['updateRoomAva'] ?>">
<?php
?>
</div>

