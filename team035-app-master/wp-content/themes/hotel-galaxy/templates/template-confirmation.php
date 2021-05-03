<?php
session_start();
include 'calendar_theme.php';
/*
	Template Name:Page Form-Confirmation
*/
	get_header();
	if(!is_front_page()){
		//get_template_part('breadcrums');
	}

// 	hotel_galaxy_template_left_full_width('full-width');
	
	?>
	<section class="blog-section page-section">
        <div class="container">
            <div class="row">
                <!--Blog Content Area-->
                <div class="col-md-12">

                    <?php

                    get_template_part('pages/page','confirmation');

                    // If comments are open or we have at least one comment, load up the comment template.
                    if ( comments_open() || get_comments_number() ) :
                        comments_template();
                    endif;


                    ?>


                </div>
                <!---Blog Right Sidebar-->
                <?php //get_sidebar(); ?>
            </div>
        </div>
    </section>
    
<?php


if ( 'POST' == $_SERVER['REQUEST_METHOD'] && $_POST['action'] == "Venue") {
    //upload featured image and attach to venue	
    if(wp_verify_nonce( $_POST['my_image_upload_nonce'], 'fileToUpload' )){
        
        require_once( ABSPATH . 'wp-admin/includes/image.php' );
        require_once( ABSPATH . 'wp-admin/includes/file.php' );
        require_once( ABSPATH . 'wp-admin/includes/media.php' );
  
    	$uploaddir = wp_upload_dir();
        $file = $_FILES["fileToUpload"]["name"];
        // $fileinfo=@getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        // $width = $fileinfo[0];
        // $height = $fileinfo[1];
        // if ($width < 1000 || $height < 500) {
        //     $response = array(
        //         "type" => "error",
        //         "message" => "Image dimension should be over 1000 x 500"
        //     );
        // }
        // else{
            //gather post data to create new venue
        	$title = strip_tags($_POST['title']);
        	$post_type = 'venue';
        	
            //create new venue
        	$front_post = array(
        		'post_title' => $title,
        		'post_status' => 'pending',
        		'post_type' => $post_type,
        		'tax_input'    => array(
                'address'     => strip_tags($_POST['venue_address']), 
                'category'      =>$_POST['venue_type'])
        	);
        	$post_id = wp_insert_post($front_post);
        
        	//set post content and terms
        	$post_content = array(
        		'ID' => $post_id,
        		'post_content' => strip_tags($_POST['short_description'])
        	);
        	wp_update_post($post_content);
        	
        	//add event type
        	$venueType=$_POST['venueType'];
            foreach($venueType as $type){
                $catID=get_cat_ID($type);
        	    wp_set_post_categories($post_id, $catID, true);
            }
            
            //add service
            $venueService=$_POST['venueService'];
            foreach($venueService as $service){
                wp_set_post_terms($post_id, $service, "service", true);
            }
        
            // //add capacity
            // $capacity=strval($_POST['venue_capacity']);
            // wp_set_post_terms($post_id, $_POST['venue_capacity'], "capacity", true);
            
            //add video
            $venueVideo=strip_tags($_POST['video']);
            $arguement=array(
        	    'post_title' => $venueVideo,
        	    'post_content' => 'video',
        	    'post_mime_type' => 'video');
        	wp_insert_attachment($arguement,'',$post_id);    
            
            $uploadfile = $uploaddir['path'] . '/' . basename( $file );
            
            $attachment_id = media_handle_upload( 'fileToUpload', $post_id );
            if ( is_wp_error( $attachment_id ) ) {
                // There was an error uploading the image.
                
            } else {
                // The image was uploaded successfully!
            }
        
            set_post_thumbnail( $post_id, $attachment_id ); 
            
            //handle pdf submission
            // $pdf = $_FILES["pdfToUpload"]["name"];
            // $pdf_attachment = media_handle_upload( 'pdfToUpload', $post_id );
            // if ( is_wp_error( $pdf_attachment ) ) {
            //     // There was an error uploading the image.
                
            // } else {
            //     // The image was uploaded successfully!
            // }
            
            if (!empty($_FILES['pdfToUpload']['name'][0])) {
                require_once( ABSPATH . 'wp-admin/includes/image.php' );
                require_once( ABSPATH . 'wp-admin/includes/file.php' );
                require_once( ABSPATH . 'wp-admin/includes/media.php' );
                $count = count($_FILES['pdfToUpload']['name']);
                for ($i=0; $i < $count; $i++) { 
                    $newFiles[$i]["name"] = $_FILES['pdfToUpload']['name'][$i];
                    $newFiles[$i]["type"] = $_FILES['pdfToUpload']['type'][$i];
                    $newFiles[$i]["tmp_name"] = $_FILES['pdfToUpload']['tmp_name'][$i];
                    $newFiles[$i]["error"] = $_FILES['pdfToUpload']['error'][$i];
                    $newFiles[$i]["size"] = $_FILES['pdfToUpload']['size'][$i];
                }
                for ($i=0; $i < $count; $i++) { 
                     $_FILES = array();
                     $_FILES['pdfToUpload']['name'] = $newFiles[$i]["name"];
                     $_FILES['pdfToUpload']['type'] = $newFiles[$i]["type"];
                     $_FILES['pdfToUpload']['tmp_name'] = $newFiles[$i]["tmp_name"];
                     $_FILES['pdfToUpload']['error'] = $newFiles[$i]["error"];
                     $_FILES['pdfToUpload']['size'] = $newFiles[$i]["size"];
                     $pdf_attachmen = media_handle_upload( 'pdfToUpload', $post_id );
                }
            }
            
            if (!empty($_FILES['filesToUpload']['name'][0])) {
                require_once( ABSPATH . 'wp-admin/includes/image.php' );
                require_once( ABSPATH . 'wp-admin/includes/file.php' );
                require_once( ABSPATH . 'wp-admin/includes/media.php' );
                $count = count($_FILES['filesToUpload']['name']);
                for ($i=0; $i < $count; $i++) { 
                    $newFiles[$i]["name"] = $_FILES['filesToUpload']['name'][$i];
                    $newFiles[$i]["type"] = $_FILES['filesToUpload']['type'][$i];
                    $newFiles[$i]["tmp_name"] = $_FILES['filesToUpload']['tmp_name'][$i];
                    $newFiles[$i]["error"] = $_FILES['filesToUpload']['error'][$i];
                    $newFiles[$i]["size"] = $_FILES['filesToUpload']['size'][$i];
                }
                for ($i=0; $i < $count; $i++) { 
                     $_FILES = array();
                     $_FILES['filesToUpload']['name'] = $newFiles[$i]["name"];
                     $_FILES['filesToUpload']['type'] = $newFiles[$i]["type"];
                     $_FILES['filesToUpload']['tmp_name'] = $newFiles[$i]["tmp_name"];
                     $_FILES['filesToUpload']['error'] = $newFiles[$i]["error"];
                     $_FILES['filesToUpload']['size'] = $newFiles[$i]["size"];
                     $attachment_id = media_handle_upload( 'filesToUpload', $post_id );
                }
            }
        // }
        
    }
    
    
    
    
    
    //create theme for booking calendar
    
//     $current_user = wp_get_current_user();
//     $user_email = $current_user->user_email;
//     $theme_string = $part1.$title.$part2.$user_email.$part3.$user_email.$part4;

// 	$table = 'wp_wpdevart_themes';
//     $data = array("id" => $post_id, "title" => $title, "value" => $theme_string, "user_id" => 0);
//     $wpdb->insert($table, $data);

    //create booking calendar
    // $table = 'wp_wpdevart_calendars';
    // $data = array("id" => $post_id,"user_id" => 0,"title" => $title,"theme_id" => $post_id,"form_id" => 1,"extra_id" =>0);
    // $wpdb->insert($table, $data);




}


//create package
if ('POST' == $_SERVER['REQUEST_METHOD'] && $_POST['action'] == "Package") {
    $parentRoom = $_POST['parentRoom'];
    $venueID = $_POST['venue_id'];
//add food packages
    $foodNames = $_POST['foodName'];
    $i = 0;
    $type = "food";
    foreach($foodNames as $value){
        if(!empty($value)){
            $rate=array($value => $_POST['foodRate'][$i]);
            //gather post data to create new package
        	$title = strip_tags($value);
        	$post_type = 'package';
            //create new package
        	$front_post = array(
        		'post_title' => $title,
                'post_status' => 'publish',
                'post_type' => $post_type
            );
            $post_id = wp_insert_post($front_post);
            wp_set_post_terms($post_id,$type,"package_type");
            wp_set_post_terms($post_id,$rate,"price_rate");
            wp_set_post_terms($parentRoom,$post_id,"child_package",true);
            $i ++;
        }
    }

    
//add drink packages
    $drinkTypes = $_POST['numOfTypes'];

    $num = 0;
    $lastNumber=0;
    $sum=0;
    $type = "drink";
    for($i=0;$i<$drinkTypes-1;$i++){
        $drinkName = $_POST['drinkName'][$i];
        if(!empty($drinkName)){
            $value = "drinkRate".$i;
            $count = $_POST[$value];  //the number of prices for one type of drink package
            $sum += $count;

            $rate=array();
            for(;$num<$sum;$num++){
                $rate[$_POST['drinkDuration'][$num]]=$_POST['drinkDuration'][$num]."_".$_POST['drinkRate'][$num];
            }

            //gather post data to create new package
        	$title = strip_tags($drinkName);
        	$post_type = 'package';
            //create new package
        	$front_post = array(
        		'post_title' => $title,
                'post_status' => 'publish',
                'post_type' => $post_type
            );
            $post_id = wp_insert_post($front_post);
            wp_set_post_terms($post_id,$type,"package_type");
            wp_set_post_terms($post_id,$rate,"price_rate");
            wp_set_post_terms($parentRoom,$post_id,"child_package",true);
                
            $lastNumber = $i+1;
        }

    }
    
    //get last drink package

    $rate=array();
    for(;$sum < count($_POST['drinkRate']);$sum++){

        $rate[$_POST['drinkDuration'][$sum]]=$_POST['drinkDuration'][$sum]."_".$_POST['drinkRate'][$sum];
    }
    
    $title = strip_tags($_POST['drinkName'][$lastNumber]);
    if(!empty($title)){
    	$post_type = 'package';
        //create new package
    	$front_post = array(
    		'post_title' => $title,
            'post_status' => 'publish',
            'post_type' => $post_type
        );
        $post_id = wp_insert_post($front_post);
        wp_set_post_terms($post_id,$type,"package_type");
        wp_set_post_terms($post_id,$rate,"price_rate");
        wp_set_post_terms($parentRoom,$post_id,"child_package",true);
    }

    //handle pdf upload
     if (!empty($_FILES['pdfToUpload']['name'][0])) {
        require_once( ABSPATH . 'wp-admin/includes/image.php' );
        require_once( ABSPATH . 'wp-admin/includes/file.php' );
        require_once( ABSPATH . 'wp-admin/includes/media.php' );
        $count = count($_FILES['pdfToUpload']['name']);
        for ($i=0; $i < $count; $i++) { 
            $newFiles[$i]["name"] = $_FILES['pdfToUpload']['name'][$i];
            $newFiles[$i]["type"] = $_FILES['pdfToUpload']['type'][$i];
            $newFiles[$i]["tmp_name"] = $_FILES['pdfToUpload']['tmp_name'][$i];
            $newFiles[$i]["error"] = $_FILES['pdfToUpload']['error'][$i];
            $newFiles[$i]["size"] = $_FILES['pdfToUpload']['size'][$i];
        }
        for ($i=0; $i < $count; $i++) { 
            $_FILES = array();
            $_FILES['pdfToUpload']['name'] = $newFiles[$i]["name"];
            $_FILES['pdfToUpload']['type'] = $newFiles[$i]["type"];
            $_FILES['pdfToUpload']['tmp_name'] = $newFiles[$i]["tmp_name"];
            $_FILES['pdfToUpload']['error'] = $newFiles[$i]["error"];
            $_FILES['pdfToUpload']['size'] = $newFiles[$i]["size"];
            $pdf_attachmen = media_handle_upload( 'pdfToUpload', $venueID );
        }
    }
            
//     //set post content and terms
//     $post_content = array(
//         'ID' => $post_id,
//         'post_content' => strip_tags($_POST['short_description'])
//     );
//     wp_update_post($post_content);
    
    
    
//     //set timeslots
// 	$start_time = $_POST['package_start_time'];
// 	$end_time = $_POST['package_end_time'];
// 	wp_set_post_terms($post_id, $start_time, "start_time");
// 	wp_set_post_terms($post_id, $end_time, "end_time");
	



}

//edit package
if ('POST' == $_SERVER['REQUEST_METHOD'] && $_POST['action'] == "package_update") {
    global $wpdb;
	$packageID=$_POST['packageEditID'];
	$packageName=strip_tags($_POST['packageName']);
	$packageType=$_POST['packageType'];

    if($packageType=="food"){
        $data=array(
    		'ID'=>$packageID,
    		'post_title'=>$packageName,
    		'post_status' => 'publish');
    
    	wp_update_post($data);
        $packagePrice=$_POST['packagePrice'];
        print_r($packagePrice);
        wp_set_post_terms($packageID,$packagePrice,"price_rate");
        wp_set_post_terms($packageID,$packageType,"package_type");
    }
    elseif($packageType=="drink"){
        $data=array(
    		'ID'=>$packageID,
    		'post_title'=>$packageName,
    		'post_status' => 'publish');
    
    	wp_update_post($data);
    	
    	$ALLterms=get_the_terms($packageID,'price_rate');
    	foreach($ALLterms as $object){
    		$terms=get_term($object,'price_rate');
    		$success=wp_remove_object_terms($packageID,$terms->term_id,'price_rate');
    	}
    	$packageDuration=$_POST['packageDuration'];
    	$packagePrice=$_POST['packagePrice'];
        for($i=0;$i<sizeof($packagePrice);$i++){
        	$rate=$packageDuration[$i]."_".$packagePrice[$i];
        	wp_set_post_terms($packageID,$rate,'price_rate',true);
        // 	wp_set_post_terms($packageID,"1;1",'price_rate',true);
    	}
    	wp_set_post_terms($packageID,$packageType,"package_type");
    }
}

//delete package
if(!empty($_POST['deletePackage'])){
    wp_delete_post($_POST['deletePackage']);
}

//edit venue
if ('POST' == $_SERVER['REQUEST_METHOD'] && $_POST['action'] == "venue_update") {
	global $wpdb;
	$venueDesc=strip_tags($_POST['venueDesc']);
	$venueID=$_POST['venueEditID'];
	$venueName=strip_tags($_POST['venueName']);
	$venueType=$_POST['venueType'];
	$venueService=$_POST['venueService'];
	$venueCapacity=$_POST['venueCapacity'];
	$venueAddress=strip_tags($_POST['venueAddress']);
	$venueVideo=strip_tags($_POST['video']);
	$venueImages=$_POST['images'];
	$venuePDFs=$_POST['pdfs'];
	$ALLterms=get_the_terms($venueID,'category');
	$ALLservice=get_the_terms($venueID,'service');
	foreach($ALLterms as $object){
		$terms=get_term($object,'category');
		wp_remove_object_terms($venueID,$terms->term_id,'category');
	}
	foreach($venueType as $type){
		$catID=get_cat_ID($type);
		wp_set_post_categories($venueID, $catID, true);
	}
	foreach($ALLservice as $object){
		$terms=get_term($object,'service');
		wp_remove_object_terms($venueID,$terms->term_id,'service');
	}
	foreach($venueService as $service){
	    wp_set_post_terms($venueID, $service, "service", true);
	}
    wp_set_post_terms($venueID, $venueCapacity, "capacity");
    wp_set_post_terms($venueID, $venueAddress, "address");
	//update video
	if(isset($venueVideo)){
	$videos = get_posts(array(
		        'post_type' => 'attachment',
		        'post_parent' => $venueID,
		        ));
		        $count=0;
		    if($videos){
		        foreach($videos as $video){
		            if($video->post_content=='video'){
		                $count+=1;
		                $post_content = array(
                    		'ID' => $video->ID,
                    		'post_title' => $venueVideo
                    	);
                    	wp_update_post($post_content);
		                break;
		            }
		        }
            }
            if($count==0){
                    $arguement=array(
                	    'post_title' => $venueVideo,
                	    'post_content' => 'video',
                	    'post_mime_type' => 'video');
                	wp_insert_attachment($arguement,'',$venueID);
		    }
	}
    
    //update feature image
    if(!empty($_FILES["featureImageUpload"]["name"])){
        wp_delete_attachment($_POST['featureImage']);
         
        require_once( ABSPATH . 'wp-admin/includes/image.php' );
        require_once( ABSPATH . 'wp-admin/includes/file.php' );
        require_once( ABSPATH . 'wp-admin/includes/media.php' );
        
    	$uploaddir = wp_upload_dir();
        $file = $_FILES["featureImageUpload"]["name"];
        $uploadfile = $uploaddir['path'] . '/' . basename( $file );
        
        $attachment_id = media_handle_upload( 'featureImageUpload', $venueID );
        if ( is_wp_error( $attachment_id ) ) {
            // There was an error uploading the image.
        } else {
            // The image was uploaded successfully!
        }
        
        set_post_thumbnail( $venueID, $attachment_id ); 
        
    }
            
    //delete image
    foreach($venueImages as $image){
        wp_delete_attachment($image);
    }
	
	
	//re-upload images
	if (!empty($_FILES['filesToUpload']['name'][0])) {
        require_once( ABSPATH . 'wp-admin/includes/image.php' );
        require_once( ABSPATH . 'wp-admin/includes/file.php' );
        require_once( ABSPATH . 'wp-admin/includes/media.php' );
        $count = count($_FILES['filesToUpload']['name']);
        for ($i=0; $i < $count; $i++) { 
            $newFiles[$i]["name"] = $_FILES['filesToUpload']['name'][$i];
            $newFiles[$i]["type"] = $_FILES['filesToUpload']['type'][$i];
            $newFiles[$i]["tmp_name"] = $_FILES['filesToUpload']['tmp_name'][$i];
            $newFiles[$i]["error"] = $_FILES['filesToUpload']['error'][$i];
            $newFiles[$i]["size"] = $_FILES['filesToUpload']['size'][$i];
        }
        for ($i=0; $i < $count; $i++) { 
             $_FILES = array();
             $_FILES['filesToUpload']['name'] = $newFiles[$i]["name"];
             $_FILES['filesToUpload']['type'] = $newFiles[$i]["type"];
             $_FILES['filesToUpload']['tmp_name'] = $newFiles[$i]["tmp_name"];
             $_FILES['filesToUpload']['error'] = $newFiles[$i]["error"];
             $_FILES['filesToUpload']['size'] = $newFiles[$i]["size"];
             $attachment_id = media_handle_upload( 'filesToUpload', $venueID );
        }
    }
    
    // //delete pdf
    // foreach($venuePDFs as $pdf){
    //     wp_delete_attachment($pdf);
    // }
    // //re-upload pdfs
    // if (!empty($_FILES['pdfToUpload']['name'][0])) {
    //     require_once( ABSPATH . 'wp-admin/includes/image.php' );
    //     require_once( ABSPATH . 'wp-admin/includes/file.php' );
    //     require_once( ABSPATH . 'wp-admin/includes/media.php' );
    //     $count = count($_FILES['pdfToUpload']['name']);
    //     for ($i=0; $i < $count; $i++) { 
    //         $newFiles[$i]["name"] = $_FILES['pdfToUpload']['name'][$i];
    //         $newFiles[$i]["type"] = $_FILES['pdfToUpload']['type'][$i];
    //         $newFiles[$i]["tmp_name"] = $_FILES['pdfToUpload']['tmp_name'][$i];
    //         $newFiles[$i]["error"] = $_FILES['pdfToUpload']['error'][$i];
    //         $newFiles[$i]["size"] = $_FILES['pdfToUpload']['size'][$i];
    //     }
    //     for ($i=0; $i < $count; $i++) { 
    //          $_FILES = array();
    //          $_FILES['pdfToUpload']['name'] = $newFiles[$i]["name"];
    //          $_FILES['pdfToUpload']['type'] = $newFiles[$i]["type"];
    //          $_FILES['pdfToUpload']['tmp_name'] = $newFiles[$i]["tmp_name"];
    //          $_FILES['pdfToUpload']['error'] = $newFiles[$i]["error"];
    //          $_FILES['pdfToUpload']['size'] = $newFiles[$i]["size"];
    //          $attachment_id = media_handle_upload( 'pdfToUpload', $venueID );
    //     }
    // }
	
	$data=array(
		'ID'=>$venueID,
		'post_content'=>$venueDesc,
		'post_title'=>$venueName,
		'post_status' => 'pending');

	wp_update_post($data);
	
	
}
if ('POST' == $_SERVER['REQUEST_METHOD'] && $_POST['action'] == "pdf_update") {
    $venuePDFs=$_POST['pdfs'];
    //delete pdf
    foreach($venuePDFs as $pdf){
        wp_delete_attachment($pdf);
    }
}


//create room
if ('POST' == $_SERVER['REQUEST_METHOD'] && $_POST['action'] == "room_creation") {
    
    //gather post data to create new room
	$title = strip_tags($_POST['title']);
	$post_type = 'room';
    //create new package
	$front_post = array(
		'post_title' => $title,
        'post_status' => 'publish',
        'post_type' => $post_type
    );
    $post_id = wp_insert_post($front_post);
    //set post content and terms
    // $post_content = array(
    //     'ID' => $post_id,
    //     'post_content' => strip_tags($_POST['short_description'])
    // );
    // wp_update_post($post_content);
    
    //set layout and link to room
    $layout = $_POST["Banquet"] . ";" . $_POST["Boardroom"] . ';' . $_POST["Cabaret"] . ';' . $_POST["Classroom"] . ';' . $_POST["Cocktail"] . ';' . $_POST["Theatre"] . ';' . $_POST["U-Shape"];
    wp_set_post_terms($post_id, $layout, "layout_list");
    
    //link to parent venue
    wp_set_post_terms($post_id, $_POST["venue_id"], "parent_venue",true);
    
    //upload featured image and attach to room	
    if(wp_verify_nonce( $_POST['my_image_upload_nonce'], 'fileToUpload' )){
        
        require_once( ABSPATH . 'wp-admin/includes/image.php' );
        require_once( ABSPATH . 'wp-admin/includes/file.php' );
        require_once( ABSPATH . 'wp-admin/includes/media.php' );
        
    	$uploaddir = wp_upload_dir();
        $file = $_FILES["fileToUpload"]["name"];
        $uploadfile = $uploaddir['path'] . '/' . basename( $file );
        
        $attachment_id = media_handle_upload( 'fileToUpload', $post_id );
        if ( is_wp_error( $attachment_id ) ) {
            // There was an error uploading the image.
            
        } else {
            // The image was uploaded successfully!
        }
        
    set_post_thumbnail( $post_id, $attachment_id ); 
    }
    
    //link package to room
    $packageID=$_POST['packages'];
    foreach($packageID as $value){
        wp_set_post_terms($post_id, $value, "child_package",true);
    }
    
    
    //create theme for booking calendar
    
    $current_user = wp_get_current_user();
    $user_email = $current_user->user_email;
    $theme_string = $part1.$title.$part2.$user_email.$part3.$user_email.$part4;

	$table = 'wp_wpdevart_themes';
    $data = array("id" => $post_id, "title" => $title, "value" => $theme_string, "user_id" => 0);
    $wpdb->insert($table, $data);

    //create booking calendar
    $table = 'wp_wpdevart_calendars';
    $data = array("id" => $post_id,"user_id" => 0,"title" => $title,"theme_id" => $post_id,"form_id" => 1,"extra_id" =>0);
    $wpdb->insert($table, $data);
    
}



//edit room
if ('POST' == $_SERVER['REQUEST_METHOD'] && $_POST['action'] == "room_update") {
    $roomID=$_POST['roomID'];
    $roomName=strip_tags($_POST['roomName']);
    $roomDesc=strip_tags($_POST['roomDesc']);
    $roomLayout=$_POST['layout'];
    // $roomPackage=$_POST['packages'];
    
    // $packages=get_the_terms($roomID,"child_package");
    
    // //remove all linked packages
    // foreach($packages as $value){
    //     wp_delete_term($value->name,"child_package");
    // }
    
    // //link package to room
    // foreach($roomPackage as $package){
    //     wp_set_post_terms($roomID, $package, "child_package");
    // }
    //set layout and link to room
    $layout = $_POST["Banquet"] . ";" . $_POST["Boardroom"] . ';' . $_POST["Cabaret"] . ';' . $_POST["Classroom"] . ';' . $_POST["Cocktail"] . ';' . $_POST["Theatre"] . ';' . $_POST["U-Shape"];
    wp_set_post_terms($roomID, $layout, "layout_list");
    
    if(!empty($_FILES["featureImageUpload"]["name"])){
        wp_delete_attachment($_POST['featureImage']);
         
        require_once( ABSPATH . 'wp-admin/includes/image.php' );
        require_once( ABSPATH . 'wp-admin/includes/file.php' );
        require_once( ABSPATH . 'wp-admin/includes/media.php' );
        
    	$uploaddir = wp_upload_dir();
        $file = $_FILES["featureImageUpload"]["name"];
        $uploadfile = $uploaddir['path'] . '/' . basename( $file );
        
        $attachment_id = media_handle_upload( 'featureImageUpload', $roomID );
        if ( is_wp_error( $attachment_id ) ) {
            // There was an error uploading the image.
        } else {
            // The image was uploaded successfully!
        }
        
        set_post_thumbnail( $roomID, $attachment_id ); 
        
    }
    
    $data=array(
		'ID'=>$roomID,
		'post_title'=>$roomName,
		'post_status' => 'publish');

	wp_update_post($data);
    
}


//email Admin when venue is created (optional)

?>
	<?php get_footer(); ?>