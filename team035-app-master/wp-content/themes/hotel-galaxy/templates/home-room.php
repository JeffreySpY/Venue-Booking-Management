<?php 
$hotel_galaxy_default_setting=hotel_galaxy_default_setting(); 
$hotel_galaxy_settings = wp_parse_args(get_option( 'hotel_galaxy_option', array() ), $hotel_galaxy_default_setting ); 


$types = get_terms( array(
    'taxonomy' => 'category',
    'hide_empty' => false,
) );
   
foreach($types as $type) {
 
    $image = get_field('featured_image', 'category_' . $type->term_id . '' );

    if( in_category($type->term_id )) {
        echo $type;
        echo $image;
        echo '<img src="' . $image['url'] . '" /> ';
    }
}
?>
<style>
.home-room-sec {
    padding-bottom: 0px;
}
.feature-section {
        padding-bottom: 0px;
}
</style>
<!--Featured Venue-->
<section class="feature-section home-room-sec animate" data-anim-type="fadeInLeft" data-anim-delay="800" style="background: <?php echo esc_attr($hotel_galaxy_settings['room_sec_bgColor']) ?>；padding-bottom: 0px">
	<div class="container">
		<div class="row" style="margin-bottom: 30px;">
			<div class="col-md-12">
				<div class="section-title animate fadeInLeft" >
					<h1 class="heading head-m feature-title" style="opacity:1;color:black">
				
						<?php 
							echo _e('Featured Venues','hotel-galaxy');
						?>
					</h1>
					<div class="pagetitle-separator">
					</div>
				</div>
			</div>
		</div>		
		<div class="row">	
			<?php 
			if($hotel_galaxy_settings['room_cat']!=''){
				$args = array( 'post_type' => 'venue','posts_per_page'=>4,	'orderby' => 'date',	'category_name'=>'featured-venue'  );
				$loop = new WP_Query($args);
				if( $loop->have_posts() ){
					while( $loop->have_posts() ) : $loop->the_post();

					?>
				
				<div class="col-small room-item col-xs-12 col-sm-6 col-md-6 col-lg-3">
						<div class="room-thumbnail">
							<?php 
							if(has_post_thumbnail()){
								$arg =array('class' =>"img-responsive"); 
								?>
							
									<?php the_post_thumbnail('home_blog_img',$arg);  ?>
						
								<?php
							} 
							?>
							<div class="caption">						
						
									<h4 class="rent"><?php the_title(); ?></h4>
							
								<?php if($hotel_galaxy_settings['room_sec_btn']!=''){
									?>
									<a href="<?php the_permalink(); ?>" class="custom-btn book-sm pull-right room-book-btn"><?php echo esc_attr($hotel_galaxy_settings['room_sec_btn']) ?></a>
									<?php
									} ?>						
								
							</div>
						</div>

					</div>
					
					<?php

					endwhile;

					wp_reset_postdata();

				}
			}

			?>
		</div>
	</div>
</section>

<!--Popular Event-->
<section class="feature-section home-room-sec animate" data-anim-type="fadeInLeft" data-anim-delay="800" style="background: <?php echo esc_attr($hotel_galaxy_settings['room_sec_bgColor']) ?>；padding-bottom: 0px">
	<div class="container">
		<div class="row" style="margin-bottom: 30px;">
			<div class="col-md-12">
				<div class="section-title" >
					<h1 class="heading head-m feature-title" style="color <?php echo esc_attr($hotel_galaxy_settings['room_sec_titleColor']) ?>">
						<?php 
							echo _e('Popular Events','hotel-galaxy');
						?>
					</h1>
				
					<div class="pagetitle-separator"></div>
				</div>
			</div>
		</div>		
		<form method="GET" action="<?php echo get_site_url(null,"/venue/","https");?>">
		<div class="row">	
			<?php
    			$types = get_terms( array(
                    'taxonomy' => 'category',
                    'hide_empty' => false,
                ) );
                $st="Popular Event";
                foreach($types as $type) {
                    $image = get_field('featured_image', 'category_' . $type->term_id . '' );
                    $parentCat=get_category_parents($type->term_id);
                    if(strpos($parentCat,$st)!==false){
                        $thumbnail=$image['sizes'];
                      	  if($thumbnail['thumbnail']){
					?>
						

				<div class="col-small room-item col-xs-12 col-sm-6 col-md-6 col-lg-2">
						
                        <button type="submit" name="venue_category" value="<?php echo $type->slug; ?>" class="room-thumbnail popularVenueType" style="background:url(<?php echo $thumbnail['thumbnail']; ?>); "><?php echo $type->name; ?></button>


					</div>
					
					<?php
}
                    }
 }
			?>
		</div>
		</form>
	</div>
</section>


<style>
    .popularVenueType{
        width:170px; 
        height:150px; 
        border: none;
        color: white;
        font-size: 20px;
        font-weight: bold;
    }
</style>
<!--Popular Event Type-->
<section class="feature-section home-room-sec animate" data-anim-type="fadeInLeft" data-anim-delay="800" style="background: <?php echo esc_attr($hotel_galaxy_settings['room_sec_bgColor']) ?>；padding-bottom: 0px;">
	<div class="container">
		<div class="row" style="margin-bottom: 30px;">
			<div class="col-md-12">
				<div class="section-title" >
					<h1 class="heading head-m feature-title" style="opacity:1;color <?php echo esc_attr($hotel_galaxy_settings['room_sec_titleColor']) ?>">
						<?php 
							echo _e('Popular Venue Types','hotel-galaxy');
						?>
					</h1>
				
					<div class="pagetitle-separator"></div>
				</div>
			</div>
		</div>
		<form method="GET" action="<?php echo get_site_url(null,"/venue/","https");?>">
		<div class="row">	
			<?php
    			$types = get_terms( array(
                    'taxonomy' => 'category',
                    'hide_empty' => false,
                ) );
                $st="Popular Venue Type";
                foreach($types as $type) {
                    $image = get_field('featured_image', 'category_' . $type->term_id . '' );
                    $parentCat=get_category_parents($type->term_id);
                    if(strpos($parentCat,$st)!==false){
                        $thumbnail=$image['sizes'];
                      	  if($thumbnail['thumbnail']){
					?>
						

				<div class="col-small room-item col-xs-12 col-sm-6 col-md-6 col-lg-2">
		
						
                        <button type="submit" name="venue_category" value="<?php echo $type->slug; ?>" class="room-thumbnail popularVenueType" style="background:url(<?php echo $thumbnail['thumbnail']; ?>); "><?php echo $type->name; ?></button>
                 	</div>
					
					<?php
}
                    }
 }
			?>
		</div>
		</form>
	</div>
</section>