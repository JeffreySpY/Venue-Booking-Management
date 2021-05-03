<div class="blog-area animate" data-anim-type="fadeInUp" data-anim-delay="900">
<?php 
if(isset($_POST['createRoom'])) {
    $parent_venue = get_post($_POST['createRoom']);
	$post_ID = $_POST['createRoom'];

		?>
		<h2>Create Room</h2>
		
		<form method="POST" action="<?php echo get_site_url(null,"/confirmation-page","https");?>" enctype="multipart/form-data" onsubmit="javascript:return checkLayout()"> <p /> 
			<label>Room Name (Required)</label> <br />
			<input type="text" value="" name='title' style="padding-left:5px;width:90%;" Required> <p />
           <p/>
           <br/>
         
		<label for="images">Featured Image/Title Image (5MB,over 360px*270px, Required)</label><br />
                    *Only one image can be used as Featured Image<p />
            <input type="file" name="fileToUpload" id="featuredImage" Required><br />
            <?php wp_nonce_field( 'fileToUpload', 'my_image_upload_nonce' ); ?>
        
        <label>Room Layout</label>
        <table>
            <tr>
                <th style="padding-right:10px"><h5>Layout Option</h5></th>
                <th ><h5>Availability</h5> </th>
                <th style="text-align:center"><h5>Size</h5> </th>
            </tr>
            <tr>
                <td><p>Banquet</p></td>
                <td><input name="layout[]" type="checkbox" value="Banquet" style="margin:20px;"></td>
                <td><input name="Banquet" id="Banquet" type="number"  min="1"></td>
            </tr>
            <tr>
                <td><p>Boardroom</p></td>
                <td><input name="layout[]" type="checkbox" value="Boardroom" style="margin:20px;x"></td>
                <td><input name="Boardroom" id="Boardroom" type="number"  min="1"></td>
            </tr>
            <tr>
                <td><p>Cabaret</p></td>
                <td><input name="layout[]" type="checkbox" value="Cabaret" style="margin:20px;"></td>
                <td><input name="Cabaret" id="Cabaret" type="number"  min="1"></td>
            </tr>
            <tr>
                <td><p>Conference</p></td>
                <td><input name="layout[]" type="checkbox" value="Classroom" style="margin:20px;"></td>
                <td><input name="Classroom" id="Classroom" type="number"  min="1"></td>
            </tr>
            <tr>
                <td><p>Cocktail</p></td>
                <td><input name="layout[]" type="checkbox" value="Cocktail" style="margin:20px;"></td>
                <td><input name="Cocktail" id="Cocktail" type="number"  min="1"></td>
            </tr>
            <tr>
                <td><p>Theatre</p></td>
                <td><input name="layout[]" type="checkbox" value="Theatre" style="margin:20px;"></td>
                <td><input name="Theatre" id="Theatre" type="number"  min="1"></td>
            </tr>
            <tr>
                <td><p>U-Shape</p></td>
                <td><input name="layout[]" type="checkbox" value="U-Shape" style="margin:20px;"></td>
                <td><input name="U-Shape" id="U-Shape" type="number"  min="1"></td>
            </tr>
        </table>
            <p/>
             <br/>
             
              
	
		<input type="hidden" name="venue_id" value="<?php echo $post_ID ?>" /> <br />
		 <input type="hidden" name="action" value="room_creation"> <br />
		<button type="submit" href="#" class="custom-btn book-lg animate fadeInUp"><?php _e('Create Room ','hotel-galaxy'); ?></button>
		</form>
</div>

<?php
}
elseif(isset($_POST['editRoom'])){
    $roomID=$_POST['editRoom'];
    $venueID=$_POST['venueID']
    ?>
    <div class="page-content" >
        <div> 
	    <form method="POST" action="<?php echo get_site_url(null,"/confirmation-page","https");?>" enctype="multipart/form-data" onsubmit="javascript:return checkLayout()"> <p /> 
	         
	        <label>Room Name (Required)</label><br />
	        <input type="text" name="roomName" value="<?php echo get_the_title($roomID)?>" style="width:90%;padding-left:5px" required> <p /> 

	        <!-- <label>Room Description (Required)</label> <br/>-->
	        <!--<textarea name="roomDesc" rows="20" class="input-xlarge" style="width:90%;max-width:90%;padding-left:5px" required><?php $post_content=get_post($roomID); echo do_shortcode($post_content->post_content);?></textarea>-->
	       <br /> <br />
	       
	       
       <!--     <Label>Uploaded Images</Label><br />-->
		     <!--*To delete images, please tick the checkbox <br />-->
		     <!--*The first is the feature image, which cannot be empty and can only be replaced by a new image<p />-->
            
            <?php
            $thumbnailID=get_post_thumbnail_id($roomID);
            ?>
           
            <?php
            print_r(get_the_post_thumbnail($roomID,"medium"));
            ?>
            
                   <br/>
            <input type="hidden" name="featureImage" value="<?php echo $thumbnailID ?>" /><br/>
            
            <label for="images">Reupload Featured Image/Title Image (5MB,over 360px*270px) </label><br />
                    *Only one image can be used as Featured Image, this wiill cover the original image<p />
            <input type="file" name="featureImageUpload" id="featureImageUpload"><br />
            <?php wp_nonce_field( 'featureImageUpload', 'my_image_upload_nonce' ); ?>
            
              <label>Room Layout</label>
        <?php 
        $layout_list = wp_get_post_terms($roomID, 'layout_list');
        foreach($layout_list as $value) {
        	$layout_String = $value -> name;
        }
        $layout = explode(';', $layout_String);
        ?>      
        <table>
             <tr>
                <th style="padding-right:10px"><h5>Layout Option</h5></th>
                <th ><h5>Availability</h5> </th>
                <th style="text-align:center"><h5>Size</h5> </th>
            </tr>
            <tr>
                <td><p>Banquet</p></td>
                <td><input name="layout[]" type="checkbox" value="Banquet" style="margin:20px;" <?php if(!empty($layout[0])){echo "checked";}?>></td>
                <td><input name="Banquet" type="number" id="Banquet" min="1" value="<?php if(!empty($layout[0])){echo $layout[0];}?>"></td>
                
            </tr>
            <tr>
                <td><p>Boardroom</p></td>
                <td><input name="layout[]" type="checkbox" value="Boardroom" style="margin:20px;x" <?php if(!empty($layout[1])){echo "checked";}?>></td>
                <td><input name="Boardroom" type="number" id="Boardroom" min="1" value="<?php if(!empty($layout[1])){echo $layout[1];}?>"></td>
            </tr>
            <tr>
                <td><p>Cabaret</p></td>
                <td><input name="layout[]" type="checkbox" value="Cabaret" style="margin:20px;" <?php if(!empty($layout[2])){echo "checked";}?>></td>
                <td><input name="Cabaret" type="number"  id="Cabaret" min="1" value="<?php if(!empty($layout[2])){echo $layout[2];}?>"></td>
            </tr>
            <tr>
                <td><p>Classroom</p></td>
                <td><input name="layout[]" type="checkbox" value="Classroom" style="margin:20px;" <?php if(!empty($layout[3])){echo "checked";}?>></td>
                <td><input name="Classroom" type="number"  id="Classroom"min="1" value="<?php if(!empty($layout[3])){echo $layout[3];}?>"></td>
            </tr>
            <tr>
                <td><p>Cocktail</p></td>
                <td><input name="layout[]" type="checkbox" value="Cocktail" style="margin:20px;" <?php if(!empty($layout[4])){echo "checked";}?>></td>
                <td><input name="Cocktail" type="number"  id="Cocktail" min="1" value="<?php if(!empty($layout[4])){echo $layout[4];}?>"></td>
            </tr>
            <tr>
                <td><p>Theatre</p></td>
                <td><input name="layout[]" type="checkbox" value="Theatre" style="margin:20px;" <?php if(!empty($layout[5])){echo "checked";}?>></td>
                <td><input name="Theatre" type="number"  id="Theatre" min="1" value="<?php if(!empty($layout[5])){echo $layout[5];}?>"></td>
            </tr>
            <tr>
                <td><p>U-Shape</p></td>
                <td><input name="layout[]" type="checkbox" value="U-Shape" style="margin:20px;" <?php if(!empty($layout[6])){echo "checked";}?>></td>
                <td><input name="U-Shape" type="number"  id="U-Shape" min="1" value="<?php if(!empty($layout[6])){echo $layout[6];}?>"></td>
            </tr>
        </table>
     
		
    
		<input type="hidden" name="roomID" value="<?php echo $roomID ?>" /> <br />
		 <input type="hidden" name="action" value="room_update"> <br />
		<button type="submit" href="#" class="custom-btn book-lg animate fadeInUp"><?php _e('Update the Room ','hotel-galaxy'); ?></button>
        </form>
        </div>
    </div>
<?php
}
?>


<script>
    function checkLayout(){
        var i;
        var layoutlist = ["Banquet","Boardroom","Cabaret","Classroom","Cocktail","Theatre","U-Shape"];

        for(i = 0; i < 7; i++){
            if(document.getElementsByName("layout[]")[i].checked){
                if(document.getElementById(layoutlist[i]).value === ""){
                    alert("You should enter the number for selected layout")
                    return false;
                    break;
                }
            }
            else if(document.getElementsByName("layout[]")[i].checked == false){
                if(document.getElementById(layoutlist[i]).value !== ""){
                    alert("You should NOT enter the number for non-selected layout")
                    return false;
                    break;
                }
            }
        }
        return true;
    }
    
</script>
