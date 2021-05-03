<?php 
$hotel_galaxy_default_setting=hotel_galaxy_default_setting(); 
$hotel_galaxy_settings = wp_parse_args(get_option( 'hotel_galaxy_option', array() ), $hotel_galaxy_default_setting ); 
?>

<section class="feature-section home-room-sec animate" data-anim-type="fadeInLeft" data-anim-delay="800" style="background: <?php echo esc_attr($hotel_galaxy_settings['room_sec_bgColor']) ?>">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="section-title animate zoomIn" style="margin-bottom: 30px;">
					<h1 class="heading head-m feature-title" style="color:<?php echo esc_attr($hotel_galaxy_settings['room_sec_titleColor']) ?>">
						<?php 
						if($hotel_galaxy_settings['room_sec_title']){
							echo wp_kses_post($hotel_galaxy_settings['room_sec_title']);
						}else{
							echo _e('Rooms','hotel-galaxy');
						} 
						?>
					</h1>
					<div class="pagetitle-separator"></div>
				</div>
			</div>
		</div>		
		<div class="row">		
			<?php 
			if($hotel_galaxy_settings['room_cat']!=''){
				$args = array( 'post_type' => 'entertainment','posts_per_page'=>6,'cat'=> absint( $hotel_galaxy_settings['entertainment_type'] ) );
				$loop = new WP_Query($args);
				if( $loop->have_posts() ){
					while( $loop->have_posts() ) : $loop->the_post();

					?>
				<div class="col-small room-item col-xs-12 col-sm-6 col-md-6 col-lg-4">
						<div class="room-thumbnail">
							<?php 
							if(has_post_thumbnail()){
								$arg =array('class' =>"img-responsive"); 
								?>
								<a href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail('home_blog_img',$arg);  ?>
								</a>
								<?php
							}else{
								?>
								<a href="<?php the_permalink(); ?>">
									<img src="<?php echo esc_url(Hotel_galaxy_Template_Dir_Uri.'/images/no-image.png'); ?>" alt="<?php the_title_attribute(); ?>" class="img-responsive">
								</a>
								<?php
							} 
							?>
							<div class="caption">						
								<a href="<?php the_permalink(); ?>">
									<h4 class="rent"><?php the_title(); ?></h4>
								</a>
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

				}else{
					?>
					<div class="col-small room-item col-xs-12 col-sm-6 col-md-6 col-lg-4">
						<div class="room-thumbnail">						
							<a href="#">
								<img src="<?php echo esc_url(Hotel_galaxy_Template_Dir_Uri.'/images/no-image.png'); ?>" alt="No Image" class="img-responsive">
							</a>
							<div class="caption">						
								<a href="#">
									<h4 class="rent"><?php echo _e('$100/Day','hotel-galaxy')?></h4>
								</a>						
								<a href="#" class="custom-btn book-sm pull-right room-book-btn"><?php echo _e('Book Now','hotel-galaxy'); ?></a>
							</div>
						</div>
					</div>
					<?php
				}
			}else
			{
				?>
				<div class="col-small room-item col-xs-12 col-sm-6 col-md-6 col-lg-4">
					<div class="room-thumbnail">						
						<a href="#">
							<img src="<?php echo esc_url(Hotel_galaxy_Template_Dir_Uri.'/images/no-image.png'); ?>" alt="<?php echo _e('No Image','hotel-galaxy')?>" class="img-responsive">
						</a>
						<div class="caption">						
							<a href="#">
								<h4 class="rent">$100/Day</h4>
							</a>						
							<a href="#" class="custom-btn book-sm pull-right room-book-btn"><?php echo _e('Book Now','hotel-galaxy'); ?></a>
						</div>
					</div>
				</div>
				<?php
			}

			?>
		</div>
	</div>
</section>