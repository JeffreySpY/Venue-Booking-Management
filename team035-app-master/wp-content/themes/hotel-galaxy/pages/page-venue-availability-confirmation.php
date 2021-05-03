

<?php
if(isset($_POST['start_day']) && isset($_POST['end_day'])){
    global $wpdb;
    $availability='{"status":"available","available":"1","info_users":"","info_admin":"","price":"","marked_price":""}';
    $table='wp_wpdevart_dates';
    $start_date=$_POST['start_day'];
    $end_date=$_POST['end_day'];

    while(strtotime($start_date) <= strtotime($end_date)){
        
        $data = array(
            "unique_id" => $_POST['venueID'].'_'.$start_date,
            "calendar_id" => $_POST['venueID'],
            "day" => $start_date,
            "data" =>$availability
        );
        $wpdb->insert($table, $data, array(
            '%s',
            '%d',
            '%s',
            '%s',
        ));
        $start_date= date ("Y-m-d", strtotime("+1 days", strtotime($start_date)));
    }
    
}


?>