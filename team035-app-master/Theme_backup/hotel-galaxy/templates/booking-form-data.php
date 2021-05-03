<?php

/*
Template Name: booking form data
*/

?>
<?php get_header(); ?>

<?php
$hotel_galaxy_default_setting=hotel_galaxy_default_setting();
$option = wp_parse_args(get_option( 'hotel_galaxy_option', array() ), $hotel_galaxy_default_setting );
?>
<h2>淦！</h2>
<?php
echo "this is booking form data\n";
$attendess=$_POST['Cus_attendess'];
$startTime=$_POST['Cus_start_time'];
$duration=$_POST['Cus_duration'];
$name=$_POST['Cus_name'];
$company=$_POST['Cus_company'];
$email=$_POST['Cus_email'];
$mobile=$_POST['Cus_mobile'];
$workNo=$_POST['Cus_workNO'];
echo "attendess->\n".$attendess;
echo "startTime->\n".$startTime;
echo "duration->\n".$duration;
echo "name->\n".$name;
echo "company->\n".$company;
echo "email->\n".$email;
echo "mobile->\n".$mobile;
echo "wordNO->\n".$workNo;
$array=array();

?>




<?php get_footer(); ?>