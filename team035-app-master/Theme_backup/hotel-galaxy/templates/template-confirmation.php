<?php 
include 'calendar_theme.php';
/*
	Template Name:Page Form-Confirmation
*/
	get_header();
	if(!is_front_page()){
		//get_template_part('breadcrums');
	}

	hotel_galaxy_template_left_full_width('full-width');
	
	?>
	
<?php
if ( 'POST' == $_SERVER['REQUEST_METHOD'] && $_POST['action'] == "Venue") {
    //gather post data to create new venue
	$title = strip_tags($_POST['title']);
	$post_type = 'venue';
	
    //create new venue
	$front_post = array(
		'post_title' => $title,
		'post_status' => 'draft',
		'post_type' => $post_type,
		'tax_input'    => array(
        'address'     => strip_tags($_POST['venue_address']), 
        'category'      =>$_POST['venue_type'])
	);
	$post_id = wp_insert_post($front_post);

	//set post content and terms
	$post_content = array(
		'ID' => $post_id,
		'post_content' => strip_tags($_POST['short_description'])."."
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

    //add capacity
    $capacity=strval($_POST['venue_capacity']);
    wp_set_post_terms($post_id, $_POST['venue_capacity'], "capacity", true);
    
    //add video
    $arguement=array(
	    'post_title' => $venueVideo,
	    'post_name' => 'video',
	    'post_mime_type' => 'video');
	wp_insert_attachment($arguement,'',$venueID);
    
    
    
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

//upload featured image and attach to venue	
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
}


//create package
if ('POST' == $_SERVER['REQUEST_METHOD'] && $_POST['action'] == "Package") {
//gather post data to create new package
    $title = strip_tags($_POST['title']);
    $post_type = 'package';
    //create new package
    $front_post = array(
        'post_title' => $title,
        'post_status' => 'draft',
        'post_type' => $post_type
    );
    $post_id = wp_insert_post($front_post);

    //set post content and terms
    $post_content = array(
        'ID' => $post_id,
        'post_content' => strip_tags($_POST['short_description'])
    );
    wp_update_post($post_content);

	//set prices and link to venue
	wp_set_post_terms($post_id, $_POST["venue_id"], "parent_venue");
	wp_set_post_terms($post_id, $_POST["monday"], "monday_price");
	wp_set_post_terms($post_id, $_POST["tuesday"], "tuesday_price");
	wp_set_post_terms($post_id, $_POST["wednesday"], "wednesday_price");
	wp_set_post_terms($post_id, $_POST["thursday"], "thursday_price");
	wp_set_post_terms($post_id, $_POST["friday"], "friday_price");
	wp_set_post_terms($post_id, $_POST["saturday"], "saturday_price");
	wp_set_post_terms($post_id, $_POST["sunday"], "sunday_price");
	
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

}

//edit package
if ('POST' == $_SERVER['REQUEST_METHOD'] && $_POST['action'] == "package_update") {
    global $wpdb;
    $packageDesc=strip_tags($_POST['packageDesc']);
	$packageID=$_POST['packageEditID'];
	$packageName=strip_tags($_POST['packageName']);

// 	$monday = $_POST['monday'];
//     $tuesday = $_POST['tuesday'];
//     $wednesday = $_POST['wednesday'];
//     $thursday = $_POST['thursday'];
//     $friday = $_POST['friday'];
//     $saturday = $_POST['saturday'];
//     $sunday = $_POST['sunday'];
    
    //set prices and link to venue

	wp_set_post_terms($packageID, $_POST["Monday"], "monday_price");
	wp_set_post_terms($packageID, $_POST["Tuesday"], "tuesday_price");
	wp_set_post_terms($packageID, $_POST["Wednesday"], "wednesday_price");
	wp_set_post_terms($packageID, $_POST["Thursday"], "thursday_price");
	wp_set_post_terms($packageID, $_POST["Friday"], "friday_price");
	wp_set_post_terms($packageID, $_POST["Saturday"], "saturday_price");
	wp_set_post_terms($packageID, $_POST["Sunday"], "sunday_price");
    
    $packageImages=$_POST['images'];
    foreach($packageImages as $image){
        wp_delete_attachment($image);
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
             $attachment_id = media_handle_upload( 'filesToUpload', $packageID );
        }
    }
    
    $data=array(
		'ID'=>$packageID,
		'post_content'=>$packageDesc,
		'post_title'=>$packageName,
		'post_status' => 'draft');

	wp_update_post($data);
}

//edit venue
if ('POST' == $_SERVER['REQUEST_METHOD'] && $_POST['action'] == "venue_update") {
	global $wpdb;
	$desc=strip_tags($_POST['venueDesc']);
	$fullStop=".";
	$venueDesc=$desc.$fullStop;
	$venueID=$_POST['venueEditID'];
	$venueName=strip_tags($_POST['venueName']);
	$venueType=$_POST['venueType'];
	$venueService=$_POST['venueService'];
	$venueVideo=$_POST['video'];
	$venueImages=$_POST['images'];
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
	//update video
	$videos = get_posts(array(
		        'post_type' => 'attachment',
		        'post_parent' => $venueID,
		        ));
		    if($videos){
		        foreach($videos as $video){
		            if($video->post_name=='video'){
		                $post_content = array(
                    		'ID' => $video->ID,
                    		'post_title' => $venueVideo
                    	);
                    	wp_update_post($post_content);
		                break;
		            }
		        }
            }
            
    //delete image
    foreach($venueImages as $image){
        wp_delete_attachment($image);
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
             $attachment_id = media_handle_upload( 'filesToUpload', $venueID );
        }
    }
	
	$data=array(
		'ID'=>$venueID,
		'post_content'=>$venueDesc,
		'post_title'=>$venueName,
		'post_status' => 'draft');

	wp_update_post($data);
	
	
}

//email Paul when venue is created
// if ('POST' == $_SERVER['REQUEST_METHOD']) {
//     $to = 'tcsha2@student.monash.edu';
//     $subject = "New ".$_POST['action']." request";
//     $message = 'Hi, admin. A new '.$_POST['action'].' with title "'.$_POST['title'].'" has been submitted. Please log in to the system dashboard to confirm or delete the submission';

//     mail ($to, $subject, $message);
// }
?>
	<?php get_footer(); ?>