<?php session_start(); ?>
<div class="blog-area animate" data-anim-type="fadeInUp" data-anim-delay="400">
    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="<?php echo esc_attr((is_single())?'':'home-room-col') ?>">
            <div class="home-room-img">
                <?php if(has_post_thumbnail()){
                    $arg =array('class' =>"img-responsive");
                    the_post_thumbnail('',$arg);
                } ?>
                <div class="showcase-inner">
                    <div class="showcase-icons">
                        <a href="<?php the_permalink(); ?>" class="gallery-icon">hello<i class="fa fa-plus"></i></a>
                    </div>
                </div>
            </div>
        </div>
        
        <?php
        $current_id = get_the_id();
        $venues =  wp_get_post_terms(get_the_ID(), 'parent_venue');
        foreach($venues as $things) {
            $venue = $things->name;
        }

        $venue_post = get_post($venue);

        $args = array('post_type' => 'package',
            'tax_query' => array(
                array(
                    'taxonomy' => 'parent_venue',
                    'field' => 'slug',
                    'terms' => $venue,
                )
            ),
        );
        
        ?>
        
        <div style="width:100%;height:auto;margin-bottom:50px;float:left">
            <a href="<?php the_permalink($venue_post); ?>"  class="custom-btn book-lg animate fadeInUp">
                <?php _e("Return to Venue",'hotel-galaxy'); ?>
            </a>
            <?php
        $loop = new WP_query($args);
        if( $loop->have_posts() ){
            while( $loop->have_posts() ) : $loop->the_post();

                if (get_the_id() != $current_id) { ?>
                    <a href="<?php the_permalink(); ?>" class="custom-btn book-lg animate fadeInUp">Other Package: <?php _e(the_title(),'hotel-galaxy'); ?></a>

                    <?php
                }
          
            
            endwhile;
        }
        wp_reset_postdata();
        ?>
        </div>
        
         <h2>
            <?php
            if(is_single()){
                the_title();
            }else {
                ?>
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                <?php
            }

            ?>
        </h2>

        <div class="single-post-content">
            <?php
            $jpegImage = get_posts( array(
                'post_type'   => 'attachment',
                'post_parent' => $post->ID,
                'post_mime_type' => 'image',
				'exclude' => get_post_thumbnail_id(),
            ) );
            
            if(!is_single() ){
                the_excerpt(__('more','hotel-galaxy'));
            }else{
                the_content();
            }
            
            
            $array=array("");
            if ( $jpegImage ) {
                foreach ( $jpegImage as $attachment ) {
                    if(!in_array(get_the_title($attachment->ID),$array)){
						$array[]=get_the_title($attachment->ID);
						echo wp_get_attachment_image( $attachment->ID, 'medium' );
                    }
                }
            }
             ?>
         
         <br/>
            
            <!--List package price-->
          <br/>
             <?php echo $post->ID;?>
         <h4>The price for this package:</h4>
			
             <?php
            $prices_list = wp_get_post_terms(get_the_ID(), 'price_list');
			foreach($prices_list as $price_list) {
				$price_string = $price_list -> name;
			}
			$prices = explode(';', $price_string);
			$days = array("Sunday:", 'Monday:', 'Tuesday:', 'Wednesday:', 'Thursday:', 'Friday:', 'Saturday:'); ?>
			<table>
				<?php for($i = 0; $i<=6; $i++) { ?>
				<tr >
					<td style="width:100px"> <p style="display:inline"> <?php echo $days[$i]; ?> </p> </td>
 					<td> <p style="display:inline"> $<?php echo $prices[$i]; ?> </p> </td> 
				</tr> 
				<?php } ?>
			</table>
             
              <?php
            //list timeslots
            $package_start_times =get_the_terms($packageID, "start_time");
			$package_end_times = get_the_terms($packageID, "end_time");
			foreach($package_start_times as $start_time){
				$package_start_time = $start_time -> name;
			}
			foreach($package_end_times as $end_time){
				$package_end_time = $end_time -> name;
			}
			?>
            
             <br/>
			<h4>Available times:</h4>
			<table>
				<tr>
					<td> <p style="display:inline">Start Time &nbsp;</p></td>
					<td> <p style="display:inline"><?php echo $package_start_time; ?></p></td>
				</tr>
				<tr>
					<td><p style="display:inline">End Time &nbsp;&nbsp;</p></td>
					<td><p style="display:inline"><?php echo $package_end_time; ?> </p></td>
				</tr>
			</table>
           
            <?php

             $shortcode = '[wpdevart_booking_calendar id="'.$venue.'"]';
            	?>
            	
            <center>
                
                <?php
             echo do_shortcode($shortcode);
            	?>
            	
            	      <?php
//          get dates from database
			$table="wp_wpdevart_dates";
			$valid_date = array();
			$dates=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table WHERE calendar_id=$venue"));
			foreach($dates as $date) {
			    if($date->data == '{"status":"available","available":"1","info_users":"","info_admin":"","price":"","marked_price":""}') {
			        $valid_date[] = $date->day;
            }
            }
			?>
			
			

			 </center>
        </div>
        <?php
        $defaults = array(
            'before'           => '<p class="abc">' . __( 'Pages:','hotel-galaxy' ),
            'after'            => '</p>',
            'link_before'      => '',
            'link_after'       => '',
            'next_or_number'   => 'number',
            'separator'        => ' ',
            'nextpagelink'     => __( 'Next page','hotel-galaxy' ),
            'previouspagelink' => __( 'Previous page','hotel-galaxy' ),
            'pagelink'         => '%',
            'echo'             => 1
        );

        wp_link_pages( $defaults );

        ?>
        <div class ="clearfix"></div>
    </div>
</div>

<script>
function setDay() {
    var passedArray = <?php echo json_encode($valid_date); ?>;
	var priceList = <?php echo json_encode($prices); ?>;
	var datebox = document.getElementById("select_date");
	var d =new Date(datebox.value);
	var fdate = formatDate(d);
	var n = d.getDay();
    //validate date
    if (passedArray.includes(fdate)) {
        let days = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
        document.getElementById("daybox").value = days[n];
		document.getElementById("pricebox").value = "$" + priceList[n];
		document.getElementById("price_post").value = "$" + priceList[n];
    }
    else{
        window.alert("Please enter an available date, see the calendar above the form to find available dates");
		document.getElementById("select_date").value = "";
    }
	}
	function formatDate(date) {
    var d = new Date(date),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();

    if (month.length < 2) 
        month = '0' + month;
    if (day.length < 2) 
        day = '0' + day;

    return [year, month, day].join('-');
}
</script>