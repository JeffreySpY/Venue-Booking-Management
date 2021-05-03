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
    <?php
    $packageID=$_POST['packageID'];
    $venues = wp_get_post_terms($packageID, 'parent_venue');
    foreach($venues as $things) {
            $venueID = $things->name;
        }
    ?>
    

    
    <div class="page-content" >
	
	    <div> 
	    <form method="POST" action="<?php echo get_site_url(null,"/confirmation-page","https");?>" enctype="multipart/form-data"> <p /> 
	         
	        <label>Package Name (Required)</label><br />
	        <input type="text" name="packageName" value="<?php echo get_the_title($packageID)?>" style="width:90%;padding-left:5px" required> <p /> <br /> 
	        
	       <!-- <label>Package Description (Required)</label> <br/>-->
	       <!-- <textarea name="packageDesc" rows="10" class="input-xlarge" style="width:90%;max-width:90%;padding-left:5px" required><?php $post_content=get_post($packageID); echo do_shortcode($post_content->post_content);?></textarea>-->
	       <!--<br />-->
	       
	       <label>Package Type:  <?php if(wp_get_post_terms($packageID, 'package_type')[0]->name=="drink")
	        {echo "Drink";}
	        else {echo "Food";}
	        ?></label>
	        <p>* To edit package type, please delete this package and create a new one.</p>
            <p /> <br />
	       
	       <label>Package Price (Required)</label><br />
	       <table id="Table">
	       <?php 
	       if(wp_get_post_terms($packageID, 'package_type')[0]->name=="food"){
	       ?>
	            <input type="number" min="1" name="packagePrice" value="<?php echo wp_get_post_terms($packageID, 'price_rate')[0]->name?>" style="width:90%;padding-left:5px" required>pp <p /> <br /> 
	       <?php 
	       }
	       elseif(wp_get_post_terms($packageID, 'package_type')[0]->name=="drink"){
	           ?>
	           <input class="custom-btn book-lg animate fadeInUp" style="height:50px;margin-bottom:30px;" type="button" value="Add New Drink Item" onclick="addDrinkRow('Table')" />
                <input class="custom-btn book-lg animate fadeInUp" style="height:50px;margin-left:30px;margin-bottom:30px;" type="button" value="Delete Last Drink Item" onclick="deleteDrinkRow('Table')" />
                <tr>
                    <th><h5>Duration(hours)</h5></th>
                    <th><h5>Price Rate(pp)</h5></th>
                </tr>
	           <?php
	           $drinkRates=wp_get_post_terms($packageID, 'price_rate');
	           foreach($drinkRates as $value){
	               $combination = explode("_",$value->name);
	               $duration = $combination[0];
	               $price = $combination[1];
	               ?>
	               <tr>
	               <td><input type="number" min="1" name="packageDuration[]" value="<?php echo $combination[0]?>"  required></td>
	               <td><input type="number" min="1" name="packagePrice[]" value="<?php echo $combination[1]?>"  required></td>
	               </tr>
	               <?php
	           }
	       }
	       ?>
	       </table>
      <p/>
  <br/>
    
	        <input type="hidden" name="packageType" value="<?php echo wp_get_post_terms($packageID, 'package_type')[0]->name ?>">
		    <input type="hidden" name="packageEditID" value="<?php echo $packageID ?>" />
		    <input type="hidden" name="venueID" value="<?php echo $venueID ?>" />
            <input type="hidden" name="action" value="package_update"> <br />
	        <button style="margin-bottom:10px" href="#" class="custom-btn book-lg animate fadeInUp" type="submit" ><?php _e('Update Package ','hotel-galaxy'); ?></button>
	        <button style="margin-bottom:10px" name="deletePackage" type="submit" formaction="<?php echo get_site_url(null,"/dashboard","https");?>" class="custom-btn book-lg animate fadeInUp" value="<?php echo $packageID?>" ><?php _e('Delete Package ','hotel-galaxy'); ?></button>
		
	     </form>  
	    </div>
	</div>
</div>
<?php
endwhile;
endif;
?>
<script>
    var i=1;
    var count=1;
    function addDrinkRow(tableID) {

			var table = document.getElementById(tableID);

			var rowCount = table.rows.length;
			var row = table.insertRow(rowCount);

			var cell1 = row.insertCell(0);
			var element1 = document.createElement("input");
			element1.type = "number";
			element1.name = "packageDuration[]";
			cell1.appendChild(element1);
			
			var cell2 = row.insertCell(1);
			var element2 = document.createElement("input");
			element2.type = "number";
			element2.name = "packagePrice[]";
			cell2.appendChild(element2);
			
            count++;
		}
		
	function deleteDrinkRow(tableID) {

			var table = document.getElementById(tableID);

			var rowCount = table.rows.length;
			if(rowCount > 1){
                table.deleteRow(rowCount -1);
			}
	}
</script>