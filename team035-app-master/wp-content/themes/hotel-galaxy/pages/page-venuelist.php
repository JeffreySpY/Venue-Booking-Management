	
<?php 
if(have_posts()):
	while(have_posts()):the_post();
?>

<?php

    $user_ID=get_current_user_id();
    $user_meta=get_userdata($user_ID);
    $user_roles=$user_meta->roles;
    if($user_roles[0]=="business_admin" || $user_roles[0]=="administrator"){
        $args=array('post_type' => 'venue');
    }
    else{
    $args=array(
        'post_type' => 'venue',
    );}
    ?>
    
<div class="blog-area animate" data-anim-type="fadeInUp" data-anim-delay="900">
	<div class="page-content">	
	<div style="overflow-x:auto;">
          <table>
                <tr>
            <th><h3 >Venue Title&nbsp;</h3></th>
            <th><h3 >Address&nbsp;</h3></th>
           <th><h3 >Type&nbsp;</h3></th>
             <th><h3></h3></th>
          </tr>
       
       <form method="post" action="<?php echo get_site_url(null,"/dashboard/","https");?>"> 
             
<?php

    $loop = new WP_Query($args);
    if($loop->have_posts()){
        while($loop->have_posts()) : $loop->the_post();
        $venue_id=$post->ID;

			// Remove links from the_category() and output it
			$i = 0;
            $sep = ', ';
            $cats = '';
            foreach ( ( get_the_category() ) as $category ) {
                if (0 < $i)
                $cats .= $sep;
                $cats .= $category->cat_name;
                $i++;
                }
                
                 	
            //Fetch venue address
      
            	$i = 0;
            	$adds = '';
            foreach ( get_the_terms($_POST[$venue_id],"address")  as $value ) {
                if (0 < $i)
                $adds .= $sep;
                $adds .= $value->name;
                $i++;
                }
                
             ?> 
         
         <tr >
            <td ><h4 style="margin-right:30px"><a href="<?php echo get_permalink($venue_id);?>"> <?php the_title($post->name)?> </a></h4></td>
            <td ><h5 style="margin-right:30px"><?php echo $adds ;?></h5> </td>
            <td ><h5 style="margin-right:30px"><?php echo $cats; //$category=get_the_terms($post->ID,'category'); print_r($category[0]->name) ;?></h5> </td>
            <td ><button style="margin-bottom:10px;margin-right:10px" href="#" class="custom-btn book-lg animate fadeInUp" type="submit" name="editVenue" value="<?php echo $venue_id; ?>" ><?php _e('Manage Venue','hotel-galaxy'); ?></button> </td>
          </tr>
    
            <?php
        
        endwhile;
        wp_reset_postdata();
    }
 
?>
    </form>
        </table>
        <div>
        <?php
         if (!($loop->have_posts())){
             ?>
         <p>*No venue found on your account, please list the venue by accessing the website menu.</p>
         <?php
         }
         ?>
</div>
</div>
<?php
endwhile;
endif;
?>