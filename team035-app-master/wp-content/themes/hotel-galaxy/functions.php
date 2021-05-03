<?php 

define('Hotel_galaxy_Template_Dir_Uri', get_template_directory_uri());
define('Hotel_galaxy_Dir_Uri', get_template_directory());
define('Hotel_galaxy_Dir_Uri_include',Hotel_galaxy_Dir_Uri.'/include');

/*** slider ***/
add_image_size('home_slider_img',1650,650,true);
add_image_size('home_blog_img',360,270,true);

require( Hotel_galaxy_Dir_Uri_include .'/script-bank/scripts-style.php');
require( Hotel_galaxy_Dir_Uri_include . '/admin/admin.php' );
require( Hotel_galaxy_Dir_Uri_include . '/menu/default_menu_walker.php' );
require( Hotel_galaxy_Dir_Uri_include . '/menu/nav_walker.php' );
require( Hotel_galaxy_Dir_Uri_include . '/theme-functions/theme-setup-function.php' );
require( Hotel_galaxy_Dir_Uri_include . '/theme-functions/breadcrumbs.php' );
require( Hotel_galaxy_Dir_Uri_include . '/theme-functions/sidebar-manage.php' );
require( Hotel_galaxy_Dir_Uri_include . '/theme-functions/pagination.php' );
require( Hotel_galaxy_Dir_Uri_include . '/theme-functions/read-more-btn.php' );
require( Hotel_galaxy_Dir_Uri_include . '/theme-functions/comment-function.php' );
require( Hotel_galaxy_Dir_Uri_include . '/theme-functions/full_leftside_template.php');
require( Hotel_galaxy_Dir_Uri_include . '/theme-functions/notice-bord.php');
require( Hotel_galaxy_Dir_Uri_include . '/customizer/theme-customizer.php');

require( Hotel_galaxy_Dir_Uri_include . '/widget/service-widget.php');


new hotel_galaxy_notice_bord();	


if ( ! function_exists( 'hotel_galaxy_posts_nav' ) ) :
	function hotel_galaxy_posts_nav(  ) {
		global $hotel_galaxy_post; 

		?>
		<div class="post-navigation clearfix animate" data-anim-type="zoomIn" data-anim-delay="800">
			<?php 

			the_post_navigation( array(
				'next_text' => '<div class="col-md-6"><div class="next-post">'.__('Next Post','hotel-galaxy').'<i class="fas fa-long-arrow-alt-right"></i><h5>%title</h5></div>',
				'prev_text' => '<div class="col-md-6"><div class="prev-post">'.__('Previous Post','hotel-galaxy').'<i class="fas fa-long-arrow-alt-left"></i><h5>%title</h5></div>',
				) );
				?>
			</div>
			<?php	
		}
		endif;


		if(! function_exists('hotel_galaxy_gravatar_class')) :
			add_filter('get_avatar','hotel_galaxy_gravatar_class');
		function hotel_galaxy_gravatar_class($class) {
			$class = str_replace("class='avatar", "class='", $class);
			return $class;
		}
		add_filter('get_avatar','hotel_galaxy_gravatar_class');
		endif;



		if ( ! function_exists( 'hotel_galaxy_fonts_url' ) ) :

	/**
	 * Register Google fonts.
	 *
	 * @since 1.0.0
	 *
	 * @return string Google fonts URL for the theme.
	 */
function hotel_galaxy_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/* translators: If there are characters in your language that are not supported by Open Sans, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Open Sans font: on or off', 'hotel-galaxy' ) ) {
		$fonts[] = 'Open Sans:400,700,900,400italic,700italic,900italic';
	}
	/* translators: If there are characters in your language that are not supported by Open Sans, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Roboto font: on or off', 'hotel-galaxy' ) ) {
		$fonts[] = 'Roboto:400,500,700,900,400italic,700italic,900italic';
	}
	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
			), 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;
}

endif;	

/**
Retrieve all suburb to show on dropdown list
 */
function getSuburbListForSearch(){
    global $wpdb;
    $values = $wpdb->get_results("SELECT DISTINCT name FROM (wp_posts AS posts 
                            JOIN wp_term_relationships AS relationship ON posts.ID=relationship.object_id 
                            JOIN wp_term_taxonomy AS taxonomy ON relationship.term_taxonomy_id=taxonomy.term_taxonomy_id 
                            JOIN wp_terms AS terms ON taxonomy.term_id = terms.term_id)
                            WHERE taxonomy.taxonomy= 'address' ");
    foreach ($values as $address){
        $array[] = $address->name;
    }
    return array_combine( $array, $array );

}

function getCategoryListForSearch(){
    global $wpdb;
    $values = $wpdb->get_results("SELECT DISTINCT name FROM (wp_terms AS terms 
                            JOIN wp_term_taxonomy AS taxonomy ON taxonomy.term_id = terms.term_id)
                            WHERE taxonomy.taxonomy= 'category' ");
    foreach ($values as $categories){
        $array[] = $categories->name;
    }
    return array_combine( $array, $array );
}

function getServiceListForSearch(){
    global $wpdb;
    $values = $wpdb->get_results("SELECT DISTINCT name FROM (wp_terms AS terms JOIN wp_term_taxonomy ON terms.term_id=wp_term_taxonomy.term_id )
                            WHERE wp_term_taxonomy.taxonomy= 'service' ");
    foreach ($values as $services){
        $array[] = $services->name;
    }
    return array_combine( $array, $array );
}

function getMatchedService($post_ID){
    global $wpdb;
    $values = $wpdb->get_results("SELECT DISTINCT name FROM (wp_posts AS posts 
                            JOIN wp_term_relationships AS relationship ON posts.ID=relationship.object_id 
                            JOIN wp_term_taxonomy AS taxonomy ON relationship.term_taxonomy_id=taxonomy.term_taxonomy_id 
                            JOIN wp_terms AS terms ON taxonomy.term_id = terms.term_id)
                            WHERE taxonomy.taxonomy= 'service' AND posts.ID={$post_ID} ");
    foreach ($values as $categories){
        $array[] = $categories->name;
    }
    return array_combine( $array, $array );
}

/**
Retrieve max number of people venue can hold show on dropdown list
 */
function getMaxEventSize(){
     global $wpdb;
    $select = $wpdb->get_results("SELECT DISTINCT name FROM (wp_posts AS posts
                            JOIN wp_term_relationships AS relationship ON posts.ID=relationship.object_id
                            JOIN wp_term_taxonomy AS taxonomy ON relationship.term_taxonomy_id=taxonomy.term_taxonomy_id
                            JOIN wp_terms AS terms ON taxonomy.term_id = terms.term_id)
                            WHERE taxonomy.taxonomy= 'capacity'");
    $max=0;
    foreach($select as $value){
        if($value->name >$max){
            $max=$value->name;
        }
    }
    $values = array_map( 'strval', range( 10, $max,10 ) );
    return array_combine( $values, $values );
}

function getMaxSize(){
     global $wpdb;
    $select = $wpdb->get_results("SELECT DISTINCT name FROM (wp_posts AS posts
                            JOIN wp_term_relationships AS relationship ON posts.ID=relationship.object_id
                            JOIN wp_term_taxonomy AS taxonomy ON relationship.term_taxonomy_id=taxonomy.term_taxonomy_id
                            JOIN wp_terms AS terms ON taxonomy.term_id = terms.term_id)
                            WHERE taxonomy.taxonomy= 'capacity'");
    $max=0;
    foreach($select as $value){
        if($value->name >$max){
            $max=$value->name;
        }
    }
    
    return $max;
}





/* 
    Retrieve venue name, short description and pictures from matched venue and show on search result page
*/
function searchVenueDetail($venueID){
    global $wpdb;
    $select="SELECT * FROM wp_posts WHERE ID={$venueID}";
    $selectPic="SELECT meta_value FROM wp_postmeta WHERE post_id={$venueID} AND meta_key='_thumbnail_id' ";
    $Details=$wpdb->get_results($select);
    $PicID=$wpdb->get_col($selectPic);
    $PicName=$wpdb->get_col("SELECT post_name FROM wp_posts WHERE ID={$PicID[0]}");
    foreach ($Details as $detail){
        $stopPosition=stripos($detail->post_content,".");
        $shortDes=substr($detail->post_content,0,$stopPosition);
    $value=array(
            'Name' => $detail->post_title,
            'Description' => $shortDes,
            'Picture' => $PicName[0],
    );}
    return $value;

}
/*
function matchBookingDate($arrays){
    global $wpdb;
    $Slug=$arrays[Slug];
    $Date=$arrays[Date];
    $select="SELECT post_content FROM wp_posts WHERE post_name LIKE '{$Slug}%' AND post_type='package'";
    $content=$wpdb->get_col($select);
    $position=strpos($content[0],"wpdevart_booking_calendar id");
    $endPosition=strpos($content[0],"]</p>")-$position-31;
    $id=substr($content[0],$position+30,$endPosition);
    
    $selectData="SELECT data FROM wp_wpdevart_dates WHERE calendar_id={$id} AND day='{$Date}'";
    $data=$wpdb->get_col($selectData);
    $status=json_decode($data[0],true);
    return $status['status'];
}
*/
function matchBookingDateVersion2($arrays){
    global $wpdb;
    $VenueID=$arrays[ID];
    $Date=$arrays[Date];
    $selectData="SELECT data FROM wp_wpdevart_dates WHERE calendar_id={$VenueID} AND day='{$Date}'";
    $data=$wpdb->get_col($selectData);
    $status=json_decode($data[0],true);
    return $status['status'];
}

/*
function searchTest($atts = array()){
    global $wpdb;
    $address=$atts['suburb'];
    $size=$atts['size'];
    $venueList=array();
    $VenueSelect="SELECT DISTINCT ID FROM (wp_posts AS posts 
                            JOIN wp_term_relationships AS relationship ON posts.ID=relationship.object_id 
                            JOIN wp_term_taxonomy AS taxonomy ON relationship.term_taxonomy_id=taxonomy.term_taxonomy_id 
                            JOIN wp_terms AS terms ON taxonomy.term_id = terms.term_id)
                            WHERE taxonomy.taxonomy= 'capacity' AND terms.name>={$size}";
        $allVenues=$wpdb->get_col($VenueSelect);
        foreach($allVenues as $venues){
            array_push($venueList,$venues);
        }
    return $allVenues;
}
*/


// to implement custom login for website
function my_custom_login()
{
echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('stylesheet_directory') . '/login/custom-login-style.css" />';
}
add_action('login_head', 'my_custom_login');

// added footer code 
function wpb_custom_new_menu() {
  register_nav_menu('my-custom-menu',__( 'My Custom Menu' ));
}
add_action( 'init', 'wpb_custom_new_menu' );

/* Main redirection of the default login page */
function redirect_login_page() {
	$login_page  = home_url('/login/');
	$page_viewed = basename($_SERVER['REQUEST_URI']);

	if($page_viewed == "wp-login.php" && $_SERVER['REQUEST_METHOD'] == 'GET') {
		wp_redirect($login_page);
		exit;
	}
}
add_action('init','redirect_login_page');

/* Where to go if a login failed */
function custom_login_failed() {
	$login_page  = home_url('/login/');
	wp_redirect($login_page . '?login=failed');
	exit;
}
add_action('wp_login_failed', 'custom_login_failed');

/* Where to go if any of the fields were empty */
function verify_user_pass($user, $username, $password) {
	$login_page  = home_url('/login/');
	if($username == "" || $password == "") {
		wp_redirect($login_page . "?login=empty");
		exit;
	}
}
add_filter('authenticate', 'verify_user_pass', 1, 3);

/* What to do on logout */
function logout_redirect() {
	$login_page  = home_url('/login/');
	wp_redirect($login_page . "?login=false");
	exit;
}
add_action('wp_logout','logout_redirect');

add_theme_support( 'post-thumbnails' );

function update_status() {
			    $table = 'venue_bookings';
    $yesterday = date("Y-m-d", mktime(0, 0, 0, date("m") , date("d")-1,date("Y")));
	$query = $wpdb->prepare("SELECT * FROM $table");
    $booking_list = $wpdb->get_results($query);
	$yesterday_time = strtotime($yesterday);
    foreach ($booking_list as $booking) {
		$booking_day = strtotime($booking->date_of_event);
        if ($booking_day == $yesterday_time) {
            $booking_id = $booking->booking_id;
            $data = [status => "done"];
            $where = [booking_id => $booking_id];
            $wpdb->update($table, $data, $where, $format=null, $where_format=null);
        }
    }
}

add_action("update_bookings","update_status");

function two_week_reminder() {
			    $table = 'venue_bookings';
    $due_date = date("Y-m-d", mktime(0, 0, 0, date("m") , date("d")+14,date("Y")));
	$reminder_date = date("Y-m-d", mktime(0,0,0, date("m"), date('d')+21, date('Y')));
	$query = $wpdb->prepare("SELECT * FROM $table");
    $booking_list = $wpdb->get_results($query);
	$reminder_time = strtotime($reminder_date);
    foreach ($booking_list as $booking) {
		$booking_day = strtotime($booking->date_of_event);
		$payment = $booking->paid;
        if ($booking_day == $reminder_time && !$payment) {
			$booking_date = $booking->date_of_event;
			
			$venue_id = $booking->venue_id;
			$venue_name = get_the_title($venue_id);
			
			$food_package_id = $booking->food_package_id;
			$drink_package_id = $booking->drink_package_id;
			$food_package_name = get_the_title($food_package_id);
			$drink_package_name = get_the_title($drink_package_id);			
			
			$customer_name = $booking->customer_name;
			$customer_email = $booking->customer_email;
				
            $food_package = get_the_terms($food_package_id, "price_rate");
            foreach ($food_package as $food) {
             	$food_price = $food->name;
            }
			
			$drinks_duration_pair = $booking->drink_duration;
			$drink_price = explode('_', $drinks_duration_pair)[1];
			$price_rate = $food_price + $drink_price;
			$attendees = $booking->attendees;
			$price_total = ($price_rate * $attendees)/2;
				
			$subject = "Secondary Payment Reminder";
			$headers = array('Content-Type: text/html; charset=UTF-8');
			
			ob_start(); 
			echo "<div>";
			echo "Dear".$customer_name.", <br /> <br />";
			echo "Your secondary payment for your booking request with".$venue_name."is due".$due_date." Below we have included some more information on this request: <br /> <br />";
			echo "<table>";
			echo 	"<tr>";
			echo 	"<th>Venue Name:</th>";
			echo 		"<td>".$venue_name."</td>";
			echo 	"</tr>";
			echo 	"<tr>";
			echo 	"<th>Event Date:</th>";
			echo 	"<td>".$booking_date."</td>";
			echo 	"</tr>";
			echo 	"<tr>";
			echo 		"<th>Food Package Booked:</th>";
			echo 		"<td>".$food_package_name."</td>";
			echo 	"</tr>";
			echo 	"<tr>";
			echo 		"<th>Drink Package Booked:</th>";
			echo 		"<td>".$drink_package_name."</td>";
			echo 	"</tr>";
			echo 	"<tr>";
			echo 		"<th>Amount Due:</th>";
			echo 		"<td>$".$price_total."</td>";
			echo 	"</tr>";
echo" </table> <br /> <br />";
echo 		"A payment link can be found on the dashboard once you have logged into the system. <br /> <br />";
echo                           " If you require any assistance, please contact paul@paullaver.com <br /> <br />";
echo                         "  Regards, <br />";
echo                       "   Laver Promotions & Events <br /> <br />";
echo                      "</div>";

			$custMessage = ob_get_clean();
			                        
			wp_mail($customer_email, $subject, $custMessage, $headers);
			     
		}
    }
}

add_action("reminder_email","two_week_reminder");
?>