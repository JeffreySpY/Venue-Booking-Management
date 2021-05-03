
    <?php
    session_start();
$hotel_galaxy_default_setting=hotel_galaxy_default_setting();
$option = wp_parse_args(get_option( 'hotel_galaxy_option', array() ), $hotel_galaxy_default_setting );
?>


<?php

/* Get selector from the search form and store at $selector*/
    $selector=array(
        'suburb' => $_GET['suburb'],
        'type' => $_GET['venue_category'],
        'size' => $_GET['size'],
        'date' => $_GET['date'],
  );
 ?>

<section class="feature-section animate" data-anim-type="fadeInLeft" data-anim-delay="800" >
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title animate fadeInLeft">
                    <h1 class="heading head-m feature-title" style="color:<?php echo esc_attr($hotel_galaxy_settings['room_sec_titleColor']) ?>">
                        <?php echo _e('EXPLORE THE BEST VENUES FOR YOUR EVENT','hotel-galaxy');?>
                        </h1>
                        </div>
                        <div class="pagetitle-separator">
                        </div>
            </div>
        </div>
    </div>

<?php get_search_form(); ?>

</section>

	<?php
	    if(isset($_GET['reset']) && $_GET['reset']=='Reset'){$args = array(
			        'post_type' => 'venue',
			        'posts_per_page' => 50
			        );
	        
	    }
	    else{
	        if($selector[suburb]!=NULL && $selector[type]==NULL){
	            $_SESSION["size"] = $selector[size];
			    $_SESSION["date"] = $selector[date];
			    $args = array(
                    'post_type' =>'venue',
                    'posts_per_page' => 100,
                    'tax_query' =>array(
                     
                    array(
                        'taxonomy' => 'address',
                        'field'    => 'slug',
                        'terms' => $selector[suburb],
                        ),
                    ),
                );
	        }
	        elseif($selector[suburb]==NULL && $selector[type]!=NULL){
	            $_SESSION["size"] = $selector[size];
			    $_SESSION["date"] = $selector[date];
			    $args = array(
                    'post_type' =>'venue',
                    'posts_per_page' => 100,
                    'tax_query' =>array(
                     
                    array(
                        'taxonomy' => 'category',
                        'field'    => 'slug',
                        'terms' => $selector[type],
                        ),
                    ),
                );
	        }
	        elseif($selector[suburb]!=NULL && $selector[type]!=NULL){
	            $_SESSION["size"] = $selector[size];
			    $_SESSION["date"] = $selector[date];
	            $args = array(
                    'post_type' =>'venue',
                    'posts_per_page' => 100,
                    'tax_query' =>array(
                    'relation' => 'AND',
                    array(
                        'taxonomy' => 'address',
                        'field'    => 'slug',
                        'terms' => $selector[suburb],
                        ),
                    array(
                        'taxonomy' => 'category',
                        'field'    => 'slug',
                        'terms' => $selector[type],
                        ),
                    ),
                );
	        }
	        else{
	            $_SESSION["size"] = $selector[size];
			    $_SESSION["date"] = $selector[date];
			    $args = array(
			        'post_type' => 'venue',
			        'posts_per_page' => 100
			        );
	        }
// 			if($selector[suburb]!=NULL && $selector[size]==NULL && $selector[type]==NULL ){
// 				$_SESSION["size"] = $selector[size];
// 			    $_SESSION["date"] = $selector[date];
// 				$args = array(
//                     'post_type' =>'venue',
//                     'posts_per_page' => 100,
//                     'tax_query' =>array(
                     
//                     array(
//                         'taxonomy' => 'address',
//                         'field'    => 'slug',
//                         'terms' => $selector[suburb],
//                         ),
//                     ),
//                 );
// 			}
// 			elseif($selector[suburb]==NULL && $selector[size]==NULL && $selector[type]!=NULL){
// 				$_SESSION["size"] = $selector[size];
// 			    $_SESSION["date"] = $selector[date];
// 				$args = array(
//                     'post_type' =>'venue',
//                     'posts_per_page' => 100,
//                     'tax_query' =>array(
                     
//                     array(
//                         'taxonomy' => 'category',
//                         'field'    => 'slug',
//                         'terms' => $selector[type],
//                         ),
//                     ),
//                 );
// 			}
// 			elseif($selector[suburb]==NULL && $selector[size]!=NULL && $selector[type]==NULL ){
// 			    $_SESSION["size"] = $selector[size];
// 			    $_SESSION["date"] = $selector[date];
// 			    $maxSize=getMaxSize();
// 			    $capacity=array();
// 			    for($i=$selector[size];$i<=$maxSize;$i+=10){
// 			        array_push($capacity,$i);
// 			    }
// 			    $args = array(
//                     'post_type' =>'venue',
//                     'posts_per_page' => 100,
//                     'tax_query' =>array(
                     
//                     array(
//                         'taxonomy' => 'capacity',
//                         'field'    => 'slug',
//                         'terms' => $capacity,
//                         ),
//                     ),
//                 );
// 			}
// 			elseif($selector[suburb]!=NULL && $selector[size]!=NULL && $selector[type]==NULL ){
// 			    $_SESSION["size"] = $selector[size];
// 			    $_SESSION["date"] = $selector[date];
// 			    $maxSize=getMaxSize();
// 			    $capacity=array();
// 			    for($i=$selector[size];$i<=$maxSize;$i+=10){
// 			        array_push($capacity,$i);
// 			    }
// 			    $args = array(
//                     'post_type' =>'venue',
//                     'posts_per_page' => 100,
//                     'tax_query' =>array(
//                     'relation' => 'AND',
//                     array(
//                         'taxonomy' => 'address',
//                         'field'    => 'slug',
//                         'terms' => $selector[suburb],
//                         ),
//                     array(
//                         'taxonomy' => 'capacity',
//                         'field'    => 'slug',
//                         'terms' => $capacity,
//                         ),
//                     ),
//                 );
// 			}
// 			elseif($selector[suburb]!=NULL && $selector[size]==NULL && $selector[type]!=NULL ){
// 			    $_SESSION["size"] = $selector[size];
// 			    $_SESSION["date"] = $selector[date];
// 			    $args = array(
//                     'post_type' =>'venue',
//                     'posts_per_page' => 100,
//                     'tax_query' =>array(
//                     'relation' => 'AND',
//                     array(
//                         'taxonomy' => 'address',
//                         'field'    => 'slug',
//                         'terms' => $selector[suburb],
//                         ),
//                     array(
//                         'taxonomy' => 'category',
//                         'field'    => 'slug',
//                         'terms' => $selector[type],
//                         ),
//                     ),
//                 );
// 			}
// 			elseif($selector[suburb]==NULL && $selector[size]!=NULL && $selector[type]!=NULL ){
// 			    $_SESSION["size"] = $selector[size];
// 			    $_SESSION["date"] = $selector[date];
// 			    $maxSize=getMaxSize();
// 			    $capacity=array();
// 			    for($i=$selector[size];$i<=$maxSize;$i+=10){
// 			        array_push($capacity,$i);
// 			    }
// 			    $args = array(
//                     'post_type' =>'venue',
//                     'posts_per_page' => 100,
//                     'tax_query' =>array(
//                     'relation' => 'AND',
//                     array(
//                         'taxonomy' => 'category',
//                         'field'    => 'slug',
//                         'terms' => $selector[type],
//                         ),
//                     array(
//                         'taxonomy' => 'capacity',
//                         'field'    => 'slug',
//                         'terms' => $capacity,
//                         ),
//                     ),
//                 );
// 			}
// 			elseif($selector[suburb]!=NULL && $selector[size]!=NULL && $selector[type]!=NULL ){
// 			    $_SESSION["size"] = $selector[size];
// 			    $_SESSION["date"] = $selector[date];
// 			    $maxSize=getMaxSize();
// 			    $capacity=array();
// 			    for($i=$selector[size];$i<=$maxSize;$i+=10){
// 			        array_push($capacity,$i);
// 			    }
			    
// 			    $args = array(
//                     'post_type' =>'venue',
//                     'posts_per_page' => 100,
//                     'tax_query' =>array(
//                     'relation' => 'AND',
//                     array(
//                         'taxonomy' => 'address',
//                         'field'    => 'slug',
//                         'terms' => $selector[suburb],
//                         ),
//                     array(
//                         'taxonomy' => 'category',
//                         'field'    => 'slug',
//                         'terms' => $selector[type],
//                         ),
//                     array(
//                         'taxonomy' => 'capacity',
//                         'field'    => 'slug',
//                         'terms' => $capacity,
//                         ),
//                     ),
//                 );
// 			}
// 			else{
// 			    $_SESSION["size"] = $selector[size];
// 			    $_SESSION["date"] = $selector[date];
// 			    $args = array(
// 			        'post_type' => 'venue',
// 			        'posts_per_page' => 100
// 			        );
// 			}
	    }		
				?>
				
        
<section class="feature-section home-room-sec animate" data-anim-type="fadeInLeft" style="background-color:#f6f6f6"  data-anim-delay="800" >
	<div class="container">
		<div class="row" >
			<div class="col-md-12" style="margin-bottom: 30px;">
			    <style>
					#test{
					    opacity: 0.7;
					}
					</style>
				<div  id="test" class="section-title animate zoomIn" >
					<h1 class="heading head-m feature-title" style="text-transform: capitalize;color:<?php echo esc_attr($hotel_galaxy_settings['room_sec_titleColor']) ?>">
					
						<?php 
							$loop = new WP_Query($args);
						if ($selector[suburb]==NULL && $selector[size]==NULL && $selector[type]==NULL && $selector[date]==NULL || $_GET['reset']=='Reset') {
						       echo _e('Our Available Venues','hotel-galaxy');
						}
						elseif ($loop->have_posts()) {
						    $Message = "Result for";
						  	if ($selector[suburb]!=NULL && $selector[size]!=NULL && $selector[type]!=NULL && $selector[date]!=NULL) {
						    	    $Message.= ' Suburb: '.$selector[suburb].", Type: ".$selector[type].", Size: ".$selector[size].", Date: ".$selector[date];
						         }
						        elseif ($selector[suburb]!=NULL && $selector[size]!=NULL && $selector[date]!=NULL) {
						    	    $Message.= ' Suburb: '.$selector[suburb].", Size: ".$selector[size].", Date: ".$selector[date];
						         }
						         elseif ($selector[type]!=NULL && $selector[size]!=NULL && $selector[date]!=NULL) {
						    	    $Message.= ' Type: '.$selector[type].", Size: ".$selector[size].", Date: ".$selector[date];
						         }
						         elseif ($selector[suburb]!=NULL && $selector[type]!=NULL && $selector[date]!=NULL) {
						    	    $Message.= ' Suburb: '.$selector[suburb].", Type: ".$selector[type].", Date: ".$selector[date];
						         }
						         elseif ($selector[suburb]!=NULL && $selector[type]!=NULL && $selector[size]!=NULL ) {
						    	    $Message.= ' Suburb: '.$selector[suburb].", Type: ".$selector[type].", Size: ".$selector[size];
						         }
						          elseif ($selector[suburb]!=NULL && $selector[type]!=NULL) {
						    	    $Message.= ' Suburb: '.$selector[suburb].", Type: ".$selector[type];
						         }
						          elseif ($selector[suburb]!=NULL && $selector[size]!=NULL) {
						    	    $Message.= ' Suburb: '.$selector[suburb].", Size: ".$selector[size];
						         }
						         elseif ($selector[suburb]!=NULL && $selector[date]!=NULL) {
						    	    $Message.= ' Suburb: '.$selector[suburb].", Date: ".$selector[date];
						         }
						         elseif ($selector[type]!=NULL && $selector[size]!=NULL) {
						    	    $Message.= ' Type: '.$selector[type].", Size: ".$selector[size];
						         }
						         elseif ($selector[type]!=NULL && $selector[date]!=NULL) {
						    	    $Message.= ' Type: '.$selector[type].", Date: ".$selector[date];
						         }
						         elseif ($selector[size]!=NULL && $selector[date]!=NULL) {
						    	    $Message.= ' Size: '.$selector[size].", Date: ".$selector[date];
						         }
						         elseif ($selector[suburb]!=NULL ) {
						    	    $Message.= ' Suburb: '.$selector[suburb];
						         }
						         elseif ($selector[size]!=NULL ) {
						    	    $Message.= ' Size: '.$selector[size];
						         }
						          elseif ($selector[type]!=NULL ) {
						    	    $Message.= ' Type: '.$selector[type];
						         }
						         elseif ($selector[date]!=NULL ) {
						    	    $Message.= ' Date: '.$selector[date];
						         }
						
						    echo _e("$Message \n",'hotel-galaxy');
						}
						else {
					      echo _e('Sorry, no matched venue found, please try again','hotel-galaxy');
						}
						?>
						
					</h1>
					<div class="pagetitle-separator"></div>
				</div>
			</div>
		</div>
		<div class="row" style="" >		
               <?php
               $unavailableRoom=array();
				$loop = new WP_Query($args);
				if( $loop->have_posts() ){
					while( $loop->have_posts() ) : $loop->the_post();
					$venueID=$post->ID;
					if(!empty($selector[date]) || !empty($selector[size])){
    					$args = array('post_type' => 'room',
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'parent_venue',
                                    'field' => 'slug',
                                    'terms' => get_the_ID(),
                                )
                            ),
                        );
                        global $post;
                        $venueBackup = $post;
                        $roomloop = new WP_query($args);
                        if( $roomloop->have_posts() ){
                            $countRoom=0;
                            while( $roomloop->have_posts() ) : $roomloop->the_post();
                                $roomID=$post->ID;
                                if(!empty($selector[date]) && $countRoom==0){
            					    $arrays=array(
            					            'ID' => $roomID,
            					            'Date' => $selector[date]
            					            );
            					    $availablility=matchBookingDateVersion2($arrays);
            					    if($availablility=='available'){
                                        if(!empty($selector[size])){
                                            $layout_list = wp_get_post_terms($roomID, 'layout_list');
                                            foreach($layout_list as $value) {
                                				$layout_String = $value -> name;
                                			}
                                			$layout = explode(';', $layout_String);
                                			$max=0;
                                			foreach($layout as $value){
                                			    if($value > $max){
                                			        $max = $value;
                                			    }
                                			}
                                			if($max >= $selector[size] && $countRoom==0){?>
                                			    <div class="col-small room-item col-xs-12 col-sm-6 col-md-6 col-lg-4" style="overflow:hidden;height:33em">
                        				            <div class="ml-3" style="">
                        						        <div class="room-thumbnail">
                            						<?php
                                    			    $arg =array('class' =>"img-responsive");
                    								?>
                    								<a href="<?php the_permalink($venueID); ?>">
                    									<?php echo get_the_post_thumbnail($venueID,'home_blog_img',$arg);  ?>
                    								</a>
                    								<div class="caption" style="height:4.5em;overflow:hidden">
                    								<a href="<?php the_permalink($venueID); ?>">
                    								  
                    								 	<h4 class="rent"><?php echo get_the_title($venueID); ?></h4>
                    							
                    								</a>
                    								<?php if($hotel_galaxy_settings['room_sec_btn']!=''){
                    									?>
                    									<a href="<?php the_permalink($venueID); ?>" class="custom-btn book-sm pull-right room-book-btn"><?php echo esc_attr($hotel_galaxy_settings['room_sec_btn']) ?></a>
                    									<?php
                    									} ?>
                    							            </div>
                        							<div>
                        							    <p style="padding:15px;height:4.5em;overflow:hidden">
                        							        <?php $venue=searchVenueDetail($venueID); 
                        						            $string = strip_tags($venue[Description]);
                                                            echo $string; 
                        							        ?>
                        							    </p>
                        							</div>
                        							
                						                </div>
                						            </div>
                						        </div>
                								<?php
                								$count+=1;
                                			}
                                        }
                                        else{
                                            ?>
                                            <div class="col-small room-item col-xs-12 col-sm-6 col-md-6 col-lg-4" style="overflow:hidden;height:33em">
                        				            <div class="ml-3" style="">
                        						        <div class="room-thumbnail">
                            						<?php
                                    			    $arg =array('class' =>"img-responsive");
                    								?>
                    								<a href="<?php the_permalink($venueID); ?>">
                    									<?php echo get_the_post_thumbnail($venueID,'home_blog_img',$arg);  ?>
                    								</a>
                    								<div class="caption" style="height:4.5em;overflow:hidden">
                    								<a href="<?php the_permalink($venueID); ?>">
                    								  
                    								 	<h4 class="rent"><?php echo get_the_title($venueID); ?></h4>
                    							
                    								</a>
                    								<?php if($hotel_galaxy_settings['room_sec_btn']!=''){
                    									?>
                    									<a href="<?php the_permalink($venueID); ?>" class="custom-btn book-sm pull-right room-book-btn"><?php echo esc_attr($hotel_galaxy_settings['room_sec_btn']) ?></a>
                    									<?php
                    									} ?>
                    							            </div>
                        							<div>
                        							    <p style="padding:15px;height:4.5em;overflow:hidden">
                        							        <?php $venue=searchVenueDetail($venueID); 
                        						            $string = strip_tags($venue[Description]);
                                                            echo $string; 
                        							        ?>
                        							    </p>
                        							</div>
                        							
                						                </div>
                						            </div>
                						        </div>
                						        <?php
                						        $countRoom+=1;
                                        }
            					    }
                                }
                                elseif(!empty($selector[size]) && empty($selector[date])){
                                    $layout_list = wp_get_post_terms($roomID, 'layout_list');
                                    foreach($layout_list as $value) {
                                		$layout_String = $value -> name;
                            		}
                            		$layout = explode(';', $layout_String);
                            		$max=0;
                            		foreach($layout as $value){
                            	        if($value > $max){
                            			    $max = $value;
                            			    }
                            		}                                			
                            		if($max >= $selector[size] && $countRoom==0){?>
                                	    <div class="col-small room-item col-xs-12 col-sm-6 col-md-6 col-lg-4" style="overflow:hidden;height:33em">
                        			        <div class="ml-3" style="">
                        					    <div class="room-thumbnail">
                        						    <?php
                                			        $arg =array('class' =>"img-responsive");
                								    ?>
                								    <a href="<?php the_permalink($venueID); ?>">
                									<?php echo get_the_post_thumbnail($venueID,'home_blog_img',$arg);  ?>
                								    </a>
                								    <div class="caption" style="height:4.5em;overflow:hidden">
                    								    <a href="<?php the_permalink($venueID); ?>">
                    								 	    <h4 class="rent"><?php echo get_the_title($venueID); ?></h4>
                    								    </a>
                    								    <?php if($hotel_galaxy_settings['room_sec_btn']!=''){
                    									    ?>
                    								    <a href="<?php the_permalink($venueID); ?>" class="custom-btn book-sm pull-right room-book-btn"><?php echo esc_attr($hotel_galaxy_settings['room_sec_btn']) ?></a>
                    								    <?php
                    								    } ?>
                    						        </div>
                        						    <div>
                        						        <p style="padding:15px;height:4.5em;overflow:hidden">
                        						        <?php $venue=searchVenueDetail($venueID); 
                        					            $string = strip_tags($venue[Description]);
                                                        echo $string; 
                    							        ?>
                    							        </p>
                    							    </div>
                    							
            						            </div>
            						        </div>
            						    </div>
                								<?php
                								$countRoom+=1;
                                			}
                                        }
                                 
                            endwhile;
                        }
                        
                        
					}
					else{
                        ?>
                        <div class="col-small room-item col-xs-12 col-sm-6 col-md-6 col-lg-4" style="overflow:hidden;height:33em">
                        	<div class="ml-3" style="">
                        		<div class="room-thumbnail">
                        			<?php
                                	$arg =array('class' =>"img-responsive");
                					?>
                					<a href="<?php the_permalink(); ?>">
                					    <?php the_post_thumbnail('home_blog_img',$arg);  ?>
                					</a>
                					<div class="caption" style="height:4.5em;overflow:hidden">
                    					<a href="<?php the_permalink(); ?>">
                    						<h4 class="rent"><?php the_title(); ?></h4>
                    					</a>
                    					<?php if($hotel_galaxy_settings['room_sec_btn']!=''){
                    					?>
                    					<a href="<?php the_permalink(); ?>" class="custom-btn book-sm pull-right room-book-btn"><?php echo esc_attr($hotel_galaxy_settings['room_sec_btn']) ?></a>
                    						<?php
                    						} ?>
                    				</div>
                        			<div>
                        				<p style="padding:15px;height:4.5em;overflow:hidden">
                        					<?php $venue=searchVenueDetail($venueID); 
                        					$string = strip_tags($venue[Description]);
                                            echo $string; 
                    						?>
                    					</p>
                    				</div>
                    							
            					</div>
            				</div>
            			</div>
            		<?php
                    }
                    endwhile;
				}

?>
		</div>
</section>
</div>