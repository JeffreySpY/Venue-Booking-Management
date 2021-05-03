<?php
session_start();
?>
<div class="blog-area animate" data-anim-type="fadeInUp" data-anim-delay="400">
    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="<?php echo esc_attr((is_single())?'':'home-room-col') ?>">

            <div class="home-room-img">
                <div>

                    <?php

                    $hotel_galaxy_default_setting=hotel_galaxy_default_setting();
                    $hotel_option = wp_parse_args(get_option( 'hotel_galaxy_option', array() ), $hotel_galaxy_default_setting );
                    global $post;
                    $jpegImage = get_posts( array(
                        'post_type'   => 'attachment',
                        'post_parent' => $post->ID,
                        'post_mime_type' => 'image',

                    ) );

                    ?>
                    <style>
                        .center {
                            text-align: center;
                            margin-left:50%;
                            vertical-align: middle;
                        }
                    </style>
                    <section class="main-carousel" role="slider" style="padding:0;" style="background-color:a0a0a0">

                        <div id="main-slider" class="carousel slide " data-ride="carousel" style="background-color:a0a0a0">
                            <div class="carousel-inner " role="listbox" style="background-color:a0a0a0">
                                <?php
                                $cont=1;
                                foreach ( $jpegImage as $attachment ) {
                                    $image_attributes = wp_get_attachment_image_src($attachment->ID,'large');
                                    ?>
                                    <div class="  item <?php echo ($cont==1)? __('active','hotel-galaxy') :''; ?> " style="background-color:a0a0a0;height:500px;"   >

                                        <img src="<?php  echo $image_attributes[0]; ?>" class="center"  >

                                    </div>
                                    <?php
                                    $cont++;
                                }
                                ?>
                            </div>
                            <!-- Pagination -->
                            <?php if($cont > 2){
                                ?>
                                <ul class="carousel-navigation">
                                    <li><a class="carousel-prev" href="#main-slider" data-slide="prev"></a></li>
                                    <li><a class="carousel-next" href="#main-slider" data-slide="next"></a></li>
                                </ul>
                                <?php
                            }?>

                            <!-- /Pagination -->
                        </div>
                    </section>
                </div>
            </div>

        </div>
    </div>

    <h2>
        <?php
        if(is_single()){
            the_title();
        }else{
            ?>
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            <?php
        }
        ?>

    </h2>


    <br/>
    <div class="blog-inner-left">
        <ul>
            <li> <i class="fa fa-user"></i> Venue Provider: <?php the_author(); ?></li>
            <!--<li> <i class="fa fa-clock-o"></i> Last Updated: <?php echo esc_attr(get_the_date('Y-m-d')); ?></li>-->
            <!--<?php //if(get_the_tag_list() != '') { ?>-->
            <!--<li> <i class="fa fa-tags"></i><?php //the_tags('', ', ', '<br />'); ?></li>-->
            <?php //} ?>
        </ul>
        <br>

        <div>
            
            <h4>Venue Type</h4> 
             <table>
               <?php

        foreach ( ( get_the_category() ) as $category ) {
             ?>
             <tr>
            <h5>   
            <i class="fas fa-circle" style="padding-right:10px"></i> 
          <?php
           echo $category->cat_name;
        }

        ?>
        </h5>
    
         </tr>
         <hr style="border: 1px solid grey;opacity:0.5;">
          </table>

        </div>

         <div>
            <h4>Venue Location</h4> 
             <table>
               <?php

        foreach ( get_the_terms($_POST['venueEditID'],"address")  as $value  ) {
             ?>
             <tr>
            <h5>   
            <i class="fas fa-map-marker" style="padding-right:10px"></i> 
          <?php
           echo $value->name;
        }

        ?>
        </h5>
         </tr>
                <hr style="border: 1px solid grey;opacity:0.5;">
          </table>
           
        </div>
        
        <?php
        $services=getMatchedService($post->ID); ?>

       
            <h4> Available Service and Facility </h4>
             <table>
            <?php
            foreach($services as $values){ ?>
                <tr>
                    <th>

                        <h5>
                            <?php

                            if($values==Bar){?> <i class="fas fa-glass-martini-alt" style="padding-right:13px"></i><?php echo esc_attr("Bar Tab");}
                            elseif($values==BYO){?> <i class="fas fa-wine-bottle" style="padding-right:10px"></i><?php echo esc_attr("BYO");}
                            elseif($values==Dance){?> <img src="https://img.icons8.com/material/15/000000/dancing.png" style="padding-right:10px"/><?php echo esc_attr("Dance Floor");}
                            elseif($values==Disability){?> <i class="fas fa-blind" style="padding-right:10px"></i><?php echo esc_attr("Disability Access");}
                            elseif($values==Music){?> <i class="fas fa-music" style="padding-right:10px"></i><?php echo esc_attr("External Music");}
                            elseif($values==Projector){?> <img src="https://img.icons8.com/material-rounded/15/000000/video-projector.png"/ style="padding-right:10px"><?php echo esc_attr("Projector");}
                            elseif($values==Smoking){?> <i class="fas fa-smoking" style="padding-right:10px"></i><?php echo esc_attr("Smoking Area");}
                            elseif($values==Wifi){?> <i class="fas fa-wifi" style="padding-right:10px"></i><?php echo esc_attr("Wifi");}
                            elseif($values==Parking){?> <i class="fas fa-parking" style="padding-right:15px"></i><?php echo esc_attr("Parking");}
                            elseif($values==Microphone){?> <i class="fas fa-microphone" style="padding-right:17px"></i><?php echo esc_attr("Microphone		");}
                            elseif($values==Stage){?> <img src="https://img.icons8.com/android/15/000000/park-concert-shell.png" style="padding-right:13px" /> <?php echo esc_attr("Stage");}  ?>

                        </h5>
                    </th>
                    <th>
                        <i class="fas fa-check-circle" style="padding-left:20px"></i>
                    </th>
                </tr>
                <?php
            }
            ?>

        </table>
    </div>
      <hr style="border: 1px solid grey;opacity:0.5;">

    <div class="single-post-content">
        <?php
        if(!is_single() ){
            the_excerpt(__('more','hotel-galaxy'));
        }else{
            the_content();
        }
        ?>
            <hr style="border: 1px solid grey;opacity:0.5;">
    </div>
 
    <div>


        <!--videos -->
        <?php
        $videos = get_posts(array(
            'post_type' => 'attachment',
            'post_parent' => $post->ID,
        ));

        if($videos){
            foreach($videos as $video){
                if($video->post_content=='video'){
                    $url=$video->post_title;
                    break;
                }
            }
            $embed_code = wp_oembed_get($url);
            echo $embed_code;
        }
        ?>
        </br>
    </div>

    <!-- list all image attachment-->
    <div>
        <?php

        $layoutImage = get_posts( array(
            'posts_per_page' => 50,
            'post_type'   => 'attachment',
            'post_mime_type' => 'image/png',
        ) );
        if ( $layoutImage ) {
            foreach ( $layoutImage as $attachment ) {
                // 	$kayValue=array(post_name=>$attachment->ID);
                // 	array_push($layoutArray,$kayValue);
                if($attachment->post_content=="layout"){
                    $layoutArray[$attachment->post_name]=$attachment->ID;
                }
            }
        }
        ?>
    </div>
    <?php
    // 		global $post;
    // 			$post_ID = $post -> ID;
    //             $args = array('post_type' => 'package',
    //                 'tax_query' => array(
    //                     array(
    //                         'taxonomy' => 'parent_venue',
    //                         'field' => 'slug',
    //                         'terms' => $post_ID,
    //                     )
    //                 ),
    //             );

    //             $loop = new WP_query($args);
    //             if( $loop->have_posts() ){
    //                 while( $loop->have_posts() ) : $loop->the_post();
    //                     
    //                 ?>
    <!--<button  onClick="showPDF(this.value)" value="<?php echo $pdfImage[0]->guid?>"><?php the_post_thumbnail('home_blog_img',$arg);  ?></button>-->
    <?php
    //                 endwhile;
    //             }
    //             wp_reset_postdata();
    ?>
    
    <h3>Reviews</h3>
    <?php // User review plugin shortcode - Lingli
    $post_id = $post->ID;
    echo do_shortcode('[WPCR_SHOW POSTID="'.$post_id.'" NUM="2" PAGINATE="1" PERPAGE="2" SHOWFORM="0"]');
    ?>
              <hr style="border: 1px solid grey;opacity:0.5;">
    <style>
        .packageButton{
            border: none;
            background: rgba(255, 250, 205, 0.5);
            font-family: inherit;
            border-radius: 8px;
            box-shadow: 0 3px 5px rgba(0, 0, 0, 0.18);
            min-width: 10ch;
            min-height: 44px;
            padding-right:15px;
        }
        .packageButton:hover {background-color: #FFDEAD}
        }
    </style>
    
      </br>
    <?php
    $pdfImage = get_posts(array(
        'post_type' => 'attachment',
        'post_parent'=> get_the_ID(),
        'post_mime_type' => 'application/pdf'
    ));
    if(!empty($pdfImage)){
        ?>
        <h3>Packages details:</h3>
        <?php
        foreach($pdfImage as $pdf){
    ?>
    <button  onClick="showPDF(this.value)" class="packageButton"  value="<?php echo $pdf->guid?>"><?php echo $pdf->post_title;  ?></button>
    
    <?php 
        }
    }?>
    <div id="showPDF">
        
        <!--<embed src="<?php echo $pdfImage[0]->guid?>" type="application/pdf" width="774" height="774"></embed>-->
        
    </div>
    <?php
    if (is_user_logged_in()){
    ?>
    <h3>Love <?php echo the_title()?>? Reserve a room now</h3>
        
    
    <h4>Step 1: Select Room and Layout from the Venue</h4>
<?php }
else{?>
    <p>Please <a href="<?php echo get_site_url(null,"/login","https")?>">login</a> or <a href="<?php echo get_site_url(null,"/login/registration-type-page/#","https");?>">register</a> for an account to make a booking</p>
<?php
    
}
		?>
    <section class="feature-section home-room-sec animate" data-anim-type="fadeInLeft" data-anim-delay="800" style="background: white;padding-bottom:0px">
        <div class="row">

            <?php
            global $post;
            $post_ID = $post -> ID;
            $args = array('post_type' => 'room',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'parent_venue',
                        'field' => 'slug',
                        'terms' => $post_ID,
                    )
                ),
            );

            $loop = new WP_query($args);
            if( $loop->have_posts() ){
                while( $loop->have_posts() ) : $loop->the_post();
                    if(has_post_thumbnail()){
                        $arg =array('class' =>"img-responsive");
                        global $wpdb;
                        $table_name = $wpdb->prefix . "wpdevart_dates";
                        $roomID=get_the_ID();
                        $date=$_SESSION["date"];
                        $arrays=array(
                            'ID' => $roomID,
                            'Date' => $date
                        );

                        $availablility=matchBookingDateVersion2($arrays);
                        if(!empty($date)){
                            if($availablility == "available"){
                                ?>
                                <div class="col-small room-item col-xs-12 col-sm-6 col-md-6 col-lg-4" >

                                    <div class="room-thumbnail "style="max-width:345px;height:510px">
                                        <!--<a href="<?php the_permalink(); ?>">-->
                                        <?php the_post_thumbnail('home_blog_img',$arg);  ?>
                                        <!--</a>-->
                                        <?php



                                        unset($layout_list);
                                        unset($package_list);
                                        $layout_list = wp_get_post_terms($roomID, 'layout_list');
                                        $package_list = wp_get_post_terms($roomID, 'child_package');
                                        unset($linkedPackage);
                                        $linkedPackage=array();
                                        $test="";
                                        foreach($package_list as $value){
                                            array_push($linkedPackage,$value->name);
                                            $test.=";" . $value->name;
                                        }

                                        //set linked package list to corrsponding room


                                        $All_Layout[$roomID] = $linkedPackage;

                                        unset($layout_String);
                                        foreach($layout_list as $value) {
                                            $layout_String = $value -> name;
                                        }
                                        $layout = explode(';', $layout_String);
                                        ?>
                                        <div class="caption">

                                            <h4 class="rent"><?php _e(the_title(),'hotel-galaxy'); ?></h4>

                                            <h5 >Layout Options</h5>

                                            <style>
                                                .custom-btn.layout:before{
                                                    background: lightgrey !important;
                                                    opacity: 0.5;
                                                }
                                            </style>

                                            <input type="hidden" id="<?php echo get_the_ID()?>" value="<?php print_r($test)?>">
                                            <?php
                                            if (!($layout[0]=='')){ ?>
                                                <div style="display:inline-block;margin-bottom:5px"><button class="custom-btn book-lg layout animate fadeInUp" id="<?php echo "Banquet".get_the_ID()?>" onClick="GFG_click(this.value)" value="<?php echo "Banquet".get_the_ID()?>"  style="background: url(<?php echo get_the_guid($layoutArray['banquet'])?>);background-size: 100% 100%; height:50px;width:50px;border: 1px ridge lightgrey !important"></button><div style="text-align: center"><?php echo $layout[0]?></div></div>
                                            <?php }
                                            if (!($layout[1]=='')){ ?>
                                                <div style="display:inline-block;margin-bottom:5px"><button class="custom-btn book-lg layout animate fadeInUp"  id="<?php echo "Boardroom".get_the_ID()?>" onClick="GFG_click(this.value)" value="<?php echo "Boardroom".get_the_ID()?>" style="background: url(<?php echo get_the_guid($layoutArray['boardroom'])?>);background-size: 100% 100%; height:50px;width:50px;border: 1px ridge lightgrey !important"><input type="hidden" name="button"></button><div style="text-align: center"><?php echo $layout[1]?></div></div>
                                            <?php }
                                            if (!($layout[2]=='')){ ?>
                                                <div style="display:inline-block;margin-bottom:5px"><button class="custom-btn book-lg layout animate fadeInUp" id="<?php echo "Cabaret".get_the_ID()?>" onClick="GFG_click(this.value)" value="<?php echo "Cabaret".get_the_ID()?>" style="background: url(<?php echo get_the_guid($layoutArray['cabaret'])?>);background-size: 100% 100%; height:50px;width:50px;border: 1px ridge lightgrey !important;"><input type="hidden" name="button"></button><div style="text-align: center"><?php echo $layout[2]?></div></div>
                                            <?php }
                                            if (!($layout[3]=='')){ ?>
                                                <div style="display:inline-block;margin-bottom:5px"><button class="custom-btn book-lg layout animate fadeInUp"  id="<?php echo "Classroom".get_the_ID()?>" onClick="GFG_click(this.value)" value="<?php echo "Classroom".get_the_ID()?>" style="background: url(<?php echo get_the_guid($layoutArray['classroom'])?>);background-size: 100% 100%; height:50px;width:50px;border: 1px ridge lightgrey !important"><input type="hidden" name="button"></button><div style="text-align: center"><?php echo $layout[3]?></div></div>
                                            <?php }
                                            if (!($layout[4]=='')){ ?>
                                                <div style="display:inline-block;margin-bottom:5px"><button class="custom-btn book-lg layout animate fadeInUp"  id="<?php echo "Cocktail".get_the_ID()?>" onClick="GFG_click(this.value)" value="<?php echo "Cocktail".get_the_ID()?>" style="background: url(<?php echo get_the_guid($layoutArray['cocktail'])?>);background-size: 100% 100%; height:50px;width:50px;border: 1px ridge lightgrey !important"><input type="hidden" name="button"></button><div style="text-align: center"><?php echo $layout[4]?></div></div>
                                            <?php }
                                            if (!($layout[5]=='')){ ?>
                                                <div style="display:inline-block;margin-bottom:5px"><button class="custom-btn book-lg layout animate fadeInUp" id="<?php echo "Theatre".get_the_ID()?>" onClick="GFG_click(this.value)" value="<?php echo "Theatre".get_the_ID()?>" style="background: url(<?php echo get_the_guid($layoutArray['theatre'])?>);background-size: 100% 100%; height:50px;width:50px;border: 1px ridge lightgrey !important"><input type="hidden" name="button"></button><div style="text-align: center"><?php echo $layout[5]?></div></div>
                                            <?php }
                                            if (!($layout[6]=='')){ ?>
                                                <div style="display:inline-block;margin-bottom:5px"> <button class="custom-btn book-lg layout animate fadeInUp"  id="<?php echo "UShape".get_the_ID()?>" onClick="GFG_click(this.value)" value="<?php echo "UShape".get_the_ID()?>"style="background: url(<?php echo get_the_guid($layoutArray['ushape'])?>);background-size: 100% 100%; height:50px;width:50px;border: 1px ridge lightgrey !important"><input type="hidden" name="button"></button><div style="text-align: center"><?php echo $layout[6]?></div></div>

                                            <?php } ?>

                                        </div>

                                    </div>
                                </div>
                                <?php
                            }
                            else{
                                ?>
                                <div class="col-small room-item col-xs-12 col-sm-6 col-md-6 col-lg-4"  >

                                    <div class="room-thumbnail "style="max-width:345px;height:510px;opacity: 0.25;">
                                        <!--<a href="<?php the_permalink(); ?>">-->
                                        <?php the_post_thumbnail('home_blog_img',$arg);  ?>
                                        <!--</a>-->
                                        <?php



                                        unset($layout_list);
                                        unset($package_list);
                                        $layout_list = wp_get_post_terms($roomID, 'layout_list');
                                        $package_list = wp_get_post_terms($roomID, 'child_package');
                                        unset($linkedPackage);
                                        $linkedPackage=array();
                                        $test="";
                                        foreach($package_list as $value){
                                            array_push($linkedPackage,$value->name);
                                            $test.=";" . $value->name;
                                        }

                                        //set linked package list to corrsponding room


                                        $All_Layout[$roomID] = $linkedPackage;

                                        unset($layout_String);
                                        foreach($layout_list as $value) {
                                            $layout_String = $value -> name;
                                        }
                                        $layout = explode(';', $layout_String);
                                        ?>
                                        <div class="caption">

                                            <h4 class="rent"><?php _e(the_title(),'hotel-galaxy'); ?></h4>

                                            <h5 >Layout Options</h5>


                                            <input type="hidden" id="<?php echo get_the_ID()?>" value="<?php print_r($test)?>">
                                            <?php
                                            if (!($layout[0]=='')){ ?>
                                                <div style="display:inline-block;margin-bottom:5px"><button class="custom-btn book-lg layout animate fadeInUp"    style="background: url(<?php echo get_the_guid($layoutArray['banquet'])?>);background-size: 100% 100%; height:50px;width:50px;border: 1px ridge lightgrey !important; pointer-events: none;"></button><div style="text-align: center"><?php echo $layout[0]?></div></div>
                                            <?php }
                                            if (!($layout[1]=='')){ ?>
                                                <div style="display:inline-block;margin-bottom:5px"><button class="custom-btn book-lg layout animate fadeInUp"    style="background: url(<?php echo get_the_guid($layoutArray['boardroom'])?>);background-size: 100% 100%; height:50px;width:50px;border: 1px ridge lightgrey !important; pointer-events: none;"><input type="hidden" name="button"></button><div style="text-align: center"><?php echo $layout[1]?></div></div>
                                            <?php }
                                            if (!($layout[2]=='')){ ?>
                                                <div style="display:inline-block;margin-bottom:5px"><button class="custom-btn book-lg layout animate fadeInUp"   style="background: url(<?php echo get_the_guid($layoutArray['cabaret'])?>);background-size: 100% 100%; height:50px;width:50px;border: 1px ridge lightgrey !important; pointer-events: none;"><input type="hidden" name="button"></button><div style="text-align: center"><?php echo $layout[2]?></div></div>
                                            <?php }
                                            if (!($layout[3]=='')){ ?>
                                                <div style="display:inline-block;margin-bottom:5px"><button class="custom-btn book-lg layout animate fadeInUp"    style="background: url(<?php echo get_the_guid($layoutArray['classroom'])?>);background-size: 100% 100%; height:50px;width:50px;border: 1px ridge lightgrey !important; pointer-events: none;"><input type="hidden" name="button"></button><div style="text-align: center"><?php echo $layout[3]?></div></div>
                                            <?php }
                                            if (!($layout[4]=='')){ ?>
                                                <div style="display:inline-block;margin-bottom:5px"><button class="custom-btn book-lg layout animate fadeInUp"    style="background: url(<?php echo get_the_guid($layoutArray['cocktail'])?>);background-size: 100% 100%; height:50px;width:50px;border: 1px ridge lightgrey !important; pointer-events: none;"><input type="hidden" name="button"></button><div style="text-align: center"><?php echo $layout[4]?></div></div>
                                            <?php }
                                            if (!($layout[5]=='')){ ?>
                                                <div style="display:inline-block;margin-bottom:5px"><button class="custom-btn book-lg layout animate fadeInUp"   style="background: url(<?php echo get_the_guid($layoutArray['theatre'])?>);background-size: 100% 100%; height:50px;width:50px;border: 1px ridge lightgrey !important; pointer-events: none;"><input type="hidden" name="button"></button><div style="text-align: center"><?php echo $layout[5]?></div></div>
                                            <?php }
                                            if (!($layout[6]=='')){ ?>
                                                <div style="display:inline-block;margin-bottom:5px"> <button class="custom-btn book-lg layout animate fadeInUp"   style="background: url(<?php echo get_the_guid($layoutArray['ushape'])?>);background-size: 100% 100%; height:50px;width:50px;border: 1px ridge lightgrey !important; pointer-events: none;"><input type="hidden" name="button"></button><div style="text-align: center"><?php echo $layout[6]?></div></div>

                                            <?php } ?>

                                        </div>

                                    </div>
                                </div>
                                <?php
                            }
                        }
                        elseif(empty($date)){

                            ?>
                            <div class="col-small room-item col-xs-12 col-sm-6 col-md-6 col-lg-4" >

                                <div class="room-thumbnail "style="max-width:345px;height:510px">
                                    <!--<a href="<?php the_permalink(); ?>">-->
                                    <?php the_post_thumbnail('home_blog_img',$arg);  ?>
                                    <!--</a>-->
                                    <?php



                                    unset($layout_list);
                                    unset($package_list);
                                    $layout_list = wp_get_post_terms($roomID, 'layout_list');
                                    $package_list = wp_get_post_terms($roomID, 'child_package');
                                    unset($linkedPackage);
                                    $linkedPackage=array();
                                    $test="";
                                    foreach($package_list as $value){
                                        array_push($linkedPackage,$value->name);
                                        $test.=";" . $value->name;
                                    }

                                    //set linked package list to corrsponding room


                                    $All_Layout[$roomID] = $linkedPackage;

                                    unset($layout_String);
                                    foreach($layout_list as $value) {
                                        $layout_String = $value -> name;
                                    }
                                    $layout = explode(';', $layout_String);
                                    ?>
                                    <div class="caption">

                                        <h4 class="rent"><?php _e(the_title(),'hotel-galaxy'); ?></h4>

                                        <h5 >Layout Options</h5>


                                        <input type="hidden" id="<?php echo get_the_ID()?>" value="<?php print_r($test)?>">
                                        <?php
                                        if (!($layout[0]=='')){ ?>
                                            <div style="display:inline-block;margin-bottom:5px"><button class="custom-btn book-lg layout animate fadeInUp" id="<?php echo "Banquet".get_the_ID()?>" onClick="GFG_click(this.value, 0)" value="<?php echo "Banquet".get_the_ID()?>"  style="background: url(<?php echo get_the_guid($layoutArray['banquet'])?>);background-size: 100% 100%; height:60px;width:60px;border: 1px ridge lightgrey !important"></button><div style="text-align: center"><?php echo $layout[0]?></div></div>
                                        <?php }
                                        if (!($layout[1]=='')){ ?>
                                            <div style="display:inline-block;margin-bottom:5px"><button class="custom-btn book-lg layout animate fadeInUp"  id="<?php echo "Boardroom".get_the_ID()?>" onClick="GFG_click(this.value, 1)" value="<?php echo "Boardroom".get_the_ID()?>" style="background: url(<?php echo get_the_guid($layoutArray['boardroom'])?>);background-size: 100% 100%; height:60px;width:60px;border: 1px ridge lightgrey !important"><input type="hidden" name="button"></button><div style="text-align: center"><?php echo $layout[1]?></div></div>
                                        <?php }
                                        if (!($layout[2]=='')){ ?>
                                            <div style="display:inline-block;margin-bottom:5px"><button class="custom-btn book-lg layout animate fadeInUp" id="<?php echo "Cabaret".get_the_ID()?>" onClick="GFG_click(this.value, 2)" value="<?php echo "Cabaret".get_the_ID()?>" style="background: url(<?php echo get_the_guid($layoutArray['cabaret'])?>);background-size: 100% 100%; height:60px;width:60px;border: 1px ridge lightgrey !important;"><input type="hidden" name="button"></button><div style="text-align: center"><?php echo $layout[2]?></div></div>
                                        <?php }
                                        if (!($layout[3]=='')){ ?>
                                            <div style="display:inline-block;margin-bottom:5px"><button class="custom-btn book-lg layout animate fadeInUp"  id="<?php echo "Classroom".get_the_ID()?>" onClick="GFG_click(this.value, 3)" value="<?php echo "Classroom".get_the_ID()?>" style="background: url(<?php echo get_the_guid($layoutArray['classroom'])?>);background-size: 100% 100%; height:60px;width:60px;border: 1px ridge lightgrey !important"><input type="hidden" name="button"></button><div style="text-align: center"><?php echo $layout[3]?></div></div>
                                        <?php }
                                        if (!($layout[4]=='')){ ?>
                                            <div style="display:inline-block;margin-bottom:5px"><button class="custom-btn book-lg layout animate fadeInUp"  id="<?php echo "Cocktail".get_the_ID()?>" onClick="GFG_click(this.value, 4)" value="<?php echo "Cocktail".get_the_ID()?>" style="background: url(<?php echo get_the_guid($layoutArray['cocktail'])?>);background-size: 100% 100%; height:60px;width:60px;border: 1px ridge lightgrey !important"><input type="hidden" name="button"></button><div style="text-align: center"><?php echo $layout[4]?></div></div>
                                        <?php }
                                        if (!($layout[5]=='')){ ?>
                                            <div style="display:inline-block;margin-bottom:5px"><button class="custom-btn book-lg layout animate fadeInUp" id="<?php echo "Theatre".get_the_ID()?>" onClick="GFG_click(this.value, 5)" value="<?php echo "Theatre".get_the_ID()?>" style="background: url(<?php echo get_the_guid($layoutArray['theatre'])?>);background-size: 100% 100%; height:60px;width:60px;border: 1px ridge lightgrey !important"><input type="hidden" name="button"></button><div style="text-align: center"><?php echo $layout[5]?></div></div>
                                        <?php }
                                        if (!($layout[6]=='')){ ?>
                                            <div style="display:inline-block;margin-bottom:5px"> <button class="custom-btn book-lg layout animate fadeInUp"  id="<?php echo "UShape".get_the_ID()?>" onClick="GFG_click(this.value, 6)" value="<?php echo "UShape".get_the_ID()?>"style="background: url(<?php echo get_the_guid($layoutArray['ushape'])?>);background-size: 100% 100%; height:60px;width:60px;border: 1px ridge lightgrey !important"><input type="hidden" name="button"></button><div style="text-align: center"><?php echo $layout[6]?></div></div>

                                        <?php } ?>

                                    </div>

                                </div>
                            </div>
                            <?php

                        }
                    }
                endwhile;
                wp_reset_postdata();

            }

            ?>


        </div>
    </section>
    <br />





    <?php
    if (is_user_logged_in()){
    ?>
    <h4>Step 2: Select Available Food/Drink Package from the Room</h4>
    <form method="POST" action="<?php echo get_site_url(null,"/book-now","https");?>" >

        <?php
        // $loop = new WP_query($args);
        // if( $loop->have_posts() ){
        //     while( $loop->have_posts() ) : $loop->the_post();

        ?>
        <!--<button type="submit"  class="custom-btn book-lg animate fadeInUp" onClick="Booking_click(this.value)" id="<?php echo get_the_ID()?>" value="<?php echo get_the_ID()?>"><?php _e(the_title(),'hotel-galaxy');?><input type="hidden" id="<?php echo "package" . $i;?>" value="<?php echo get_the_ID()?>" ></button>-->

        <?php
        //     $i += 1;
        //     endwhile;
        // }
        ?>
        <div id="packages">
            <h5 for="food">Select a Food Package:</h5>
            <?php
            for($i=0;$i<sizeof($All_Layout);$i++){
                $roomID=array_keys($All_Layout);
                ?>
            <div class="food_package" id="<?php echo "food".$roomID[$i]?>" style="display:none">
                <select name="food<?php echo $roomID[$i]?>" id="<?php echo "package_food".$roomID[$i]?>" >
                    <?php
                    foreach($All_Layout[$roomID[$i]] as $packageID){
                        if(wp_get_post_terms($packageID,'package_type')[0]->name=='food'){
                            ?>
                            <option value="<?php echo $packageID?>"><?php echo get_the_title($packageID)?></option>
                            <?php
                        }
                    }
                    ?>
                </select>
                </div><?php
            }
            ?>
            <h5 for="drink">Select a Drink Package:</h5>
            <?php

            for($i=0;$i<sizeof($All_Layout);$i++){
                $roomID=array_keys($All_Layout);
                // print_r($roomID);
                ?>
            <div class="drink_package" id="<?php echo "drink".$roomID[$i]?>" style="display:none">

                <select name="drink<?php echo $roomID[$i]?>" id="<?php echo "package_drink".$roomID[$i]?>">
                    <?php
                    foreach($All_Layout[$roomID[$i]] as $packageID){
                        if(get_the_terms($packageID,'package_type')[0]->name=='drink'){
                            if(!empty(get_the_title($packageID))){
                                // $totalPrice=get_the_terms($packageID,'price_rate');
                                // foreach($totalPrice as $price){
                                //     $rate=explode(";",$price->name);
                                //     print_r("This is duration".$rate[0]);
                                //     print_r("This is price".$rate[1]);
                                // }
                                ?>
                                <option value="<?php echo $packageID?>"><?php echo get_the_title($packageID)?></option>
                                <?php
                            }
                        }
                    }
                    ?>
                </select>
                </div><?php
            }
            ?>
        </div>
        <br />
        <input type="hidden" name="venue_id" value="<?php echo $post->ID; ?>">
        <input type="hidden" name="room_id" id="room_id_box" value="">
        <input type="hidden" name="layout_selected" id="layout_number_box" value="">
        <input type="hidden" name="layout_name_selected" id="layout_name_box" value="">
        <button type="submit" class="custom-btn book-lg animate fadeInUp">Book Now</button>
    </form>
   <hr style="border: 1px solid grey;opacity:0.5;">
    <br>

    <h4>Leave a Review</h4>
    <?php // User review plugin shortcode - Lingli
    $post_id = $post->ID;
    echo do_shortcode('[WPCR_SHOW POSTID="'.$post_id.'" NUM="3" PAGINATE="1" PERPAGE="3" SHOWFORM="1" HIDEREVIEWS="1" HIDERESPONSE="1" SNIPPET="" MORE="" HIDECUSTOM="0" ]');
    ?>



<?php }
else{?>
    <p>Please <a href="<?php echo get_site_url(null,"/login","https")?>">login</a> or <a href="<?php echo get_site_url(null,"/login/registration-type-page/#","https");?>">register</a> for an account to make a booking</p>
<?php
    
}
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

<style>
    button[disabled],
    html input[disabled] {
        background:lightgrey;
        cursor: default;
    }
</style>

<script>
    var roomID;
    function GFG_click(value, layoutoption) {
        var roomID=value.replace(/\D/g,'');
        var layout=value.substr(0,value.length-roomID.length);
        createCookie("roomID",roomID, "0.1");
        createCookie("layout",layout, "0.1");

        document.getElementById("layout_number_box").value = layoutoption;
        document.getElementById("layout_name_box").value = layout;

        var x = document.getElementById(roomID).value;
        var i;


        var hideDrinkPackage = document.querySelectorAll('[id^="drink"]');
        var hideFoodPackage = document.querySelectorAll('[id^="food"]');
        hideDrinkPackage.forEach((elem)=>{
            elem.style.setProperty('display','none');
        })
        hideFoodPackage.forEach((elem)=>{
            elem.style.setProperty('display','none');
        })

        var drinkName = "drink"+roomID;
        var foodName = "food"+roomID;
        var showDrinkPackage = document.querySelector('#'+drinkName);
        var showFoodPackage = document.querySelector('#'+foodName);
        showDrinkPackage.style.setProperty('display','inline');
        showFoodPackage.style.setProperty('display','inline');
        document.getElementById("room_id_box").value = roomID;

        for (i = 0; i < 10; i++) {
            var package = document.getElementById("package" + i.toString()).value;
            if(!x.includes(package)){
                document.getElementById(package).disabled=true;
                // var lnk = document.getElementById(package);
                // lnk.setAttribute('class','disabled');
                // lnk.style.background = "black";
                // lnk.setAttribute('style','background:black');
            }
            else{
                var lnk = document.getElementById(package);
                document.getElementById(package).disabled=false;
                // lnk.setAttribute('class','abled');
                // lnk.setAttribute('style','background:#e7ad44');
            }
        }
        return roomID;
    }



    function Booking_click(value){
        var packageID=value;

        createCookie("packageID",value, "0.1");
    }

    function createCookie(name, value, days) {
        var expires;

        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            expires = "; expires=" + date.toGMTString();
        }
        else {
            expires = "";
        }

        document.cookie = escape(name) + "=" +
            escape(value) + expires + "; path=/";
    }

    // function check(){
    //     var count=0;
    //     if(document.getElementByName("button")[0].clicked == true){
    //         alert("button was clicked");
    //         count +=1;
    //     }
    //     if(count == 0){
    //         return false;
    //     }
    //     else{
    //         return true;
    //     }
    // }

    function showPDF(value){
        var guid = '<embed src="' + value + '" type="application/pdf" width="774" height="774"></embed>'
        document.getElementById('showPDF').innerHTML=guid;

    }
</script>

