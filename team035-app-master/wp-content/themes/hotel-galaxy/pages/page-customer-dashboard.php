<div class="blog-area animate" data-anim-type="fadeInUp" data-anim-delay="900">
    <?php

    
    $current_user = wp_get_current_user();
    $user_email=$current_user->user_email;
    $user_login=$current_user->user_login;
    $user_info = get_userdata(get_current_user_id());
    $first_name = $user_info->first_name;
    $last_name = $user_info->last_name;

    ?>
    <div class="page-content">

    <!--<div class="container">-->
    <!--  <div class="row" style="margin-top:20px; margin-down:20px">-->
    <!--  <div class=" col-lg-4 col-xs-12 col-sm-6 col-md-6"></div>-->
    <!--  <div class=" col-lg-4 col-xs-12 col-sm-6 col-md-6" style="font-size:200%; font-weight: bold"><?php echo $user_login;?></div>-->
    <!--  <div class=" col-lg-4 col-xs-12 col-sm-6 col-md-6"></div>-->
    <!--  </div>-->
    <!--  <div class="row" style="margin-top:20px; margin-down:20px">-->
    <!--  <div class=" col-lg-4 col-xs-12 col-sm-6 col-md-6"></div>-->
    <!--  <div class=" col-lg-4 col-xs-12 col-sm-6 col-md-6" style="font-size:200%; font-weight: bold"><?php echo $user_email;?></div>-->
    <!--  <div class=" col-lg-4 col-xs-12 col-sm-6 col-md-6"></div>-->
    <!--  </div>-->
    <!--  <div class="row" style="margin-top:25px; margin-down:25px"></div>-->
    <!--  <div class="row" style="margin-top:10px; margin-down:10px;font-size:150%">-->
    <!--  <div class=" col-lg-4 col-sm-6 col-md-6"><?php echo "First Name:";?></div>-->
    <!--  <div class=" col-lg-4 col-sm-6 col-md-6"><?php echo $first_name;?></div>-->
    <!--  </div>-->
    <!--  <div class="row" style="margin-top:10px; margin-down:10px;font-size:150%">-->
    <!--  <div class=" col-lg-4 col-sm-6 col-md-6"><?php echo "Last Name:";?></div>-->
    <!--  <div class=" col-lg-4 col-sm-6 col-md-6"><?php echo $last_name;?></div>-->
    <!--  </div>-->
    <!--</div>-->
    <center>
     <div class="container">
  
   <table>
       <tr> 
           <td><p>Username: </p></td>
       <td> <p>
      <?php echo $user_login;?> </p></td>
  </tr>
   <tr>
        <td><p>User Email: </p></td>
     <td> <p>
     <?php echo $user_email;?></p>
      </td>
       </tr>
      <tr> 
        <td><p>First Name: </p></td>
     
    <td> <p><?php echo $first_name;?></p></td>
      </tr>
       <tr> 
       <td><p>Last Name: </p></td>
    <td> <p><?php echo $last_name;?></p></td>
 </tr>
</table>

    </div>
    
    <form method="POST" action="<?php echo get_site_url(null,"/customer-dashboard/booking-history/","https");?>"> 
    <button name="booking" class="custom-btn book-lg animate fadeInUp" value="<?php echo $user_email;?>">View My Booking History</button>
    </form>
    </center>
    </div>
</div>

