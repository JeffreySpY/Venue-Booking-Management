<?php

/*
Template Name: Page - Venue Update Confirmation
*/

?>
<?php get_header(); 
get_header();

	hotel_galaxy_template_left_full_width('full-width');
	
	?>
	
<?php
print_r($$venueName);
if(isset($_POST['start_day']) && isset($_POST['end_day'])){
    global $wpdb;
    $availability='{"status":"available","available":"1","info_users":"","info_admin":"","price":"","marked_price":""}';
    $booked='{"status":"booked","available":"1","info_users":"","info_admin":"","price":"","marked_price":""}';
    $unavailable='{"status":"unavailable","available":"1","info_users":"","info_admin":"","price":"","marked_price":""}';
    $table='wp_wpdevart_dates';
    $start_date=$_POST['start_day'];
    $end_date=$_POST['end_day'];

    
        if($_POST['action']=='available'){
            while(strtotime($start_date) <= strtotime($end_date)){
                $data = array(
                    "unique_id" => $_POST['venueID'].'_'.$start_date,
                    "calendar_id" => $_POST['venueID'],
                    "day" => $start_date,
                    "data" =>$availability
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
                        "calendar_id" => $_POST['venueID'],
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
        elseif($_POST['action']=='booked'){
            while(strtotime($start_date) <= strtotime($end_date)){
            $data = array(
                "unique_id" => $_POST['venueID'].'_'.$start_date,
                "calendar_id" => $_POST['venueID'],
                "day" => $start_date,
                "data" =>$booked
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
                    "calendar_id" => $_POST['venueID'],
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
        elseif($_POST['action']=='unavailable'){
            while(strtotime($start_date) <= strtotime($end_date)){
            $data = array(
            "unique_id" => $_POST['venueID'].'_'.$start_date,
            "calendar_id" => $_POST['venueID'],
            "day" => $start_date,
            "data" =>$unavailable
        );
            $wpdb->insert($table, $data, array(
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
                    "calendar_id" => $_POST['venueID'],
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
}
elseif(isset($_POST['venueEditID'])){
    global $wpdb;
    $desc=$_POST['venueDesc'];
    $fullStop=".";
    $venueDesc=$desc.$fullStop;
    $venueID=$_POST['venueEditID'];
    $venueName=$_POST['venueName'];
    $venueType=$_POST['venueType'];
    $ALLterms=get_the_terms($venueID,'category');
    foreach($ALLterms as $object){
        $terms=get_term($object,'category');
        wp_remove_object_terms($venueID,$terms->term_id,'category');
    }
    foreach($venueType as $type){
        $catID=get_cat_ID($type);
	    wp_set_post_categories($venueID, $catID, true);
    }
    $data=array(
        'ID'=>$venueID,
        'post_content'=>$venueDesc,
        'post_title'=>$venueName,
        'post_status' => 'draft');    
    
    wp_update_post($data);
    
    
}
?>

<?php get_footer(); ?>