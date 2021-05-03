<div class="blog-area animate" data-anim-type="fadeInUp" data-anim-delay="900">
    <?php

    
    $current_user = wp_get_current_user();
    $user_email=$current_user->user_email;
    echo $user_email;
    $args=array(
        'post_type' => 'venue',
        'author'=> $user_ID
    );
    ?>
    <h2>Customer Dashboard</h2>
    <h4>Yo!  This is your booking history</h4>
    <?php
    $table = 'wp_wpdevart_reservations';
    $reservations = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table WHERE email LIKE '$user_email' OR form LIKE '%$user_email%'"));

    foreach($reservations as $booking){
        $form_words = explode('","',$booking->form);
        ?>
        	<!-- event date -->
                <td>
                <?php echo $booking->single_day; ?>
                </td>
            <!-- package selected -->
                <td>
                <?php echo $package_field[1]; ?>
                </td>
			<!--client name-->
                <td>
                <?php
                $client_name = explode('":"',$form_words[4]);
                echo $client_name[1];
                ?>
                </td>
            <!-- current status-->
                <td>
                <?php echo $booking->status; ?>
                </td>
                <?php
    }
    
    ?>
    <table>
  
</table>
    
</div>