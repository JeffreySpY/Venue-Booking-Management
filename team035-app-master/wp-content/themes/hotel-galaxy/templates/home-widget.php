<?php 
$hotel_galaxy_default_setting=hotel_galaxy_default_setting(); 
$hotel_galaxy_settings = wp_parse_args(get_option( 'hotel_galaxy_option', array() ), $hotel_galaxy_default_setting ); 
?>

<section class="feature-section animate" data-anim-type="fadeInLeft" data-anim-delay="800" >
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="section-title animate fadeInLeft">
					<h1 class="heading head-m feature-title">
						<?php 
						if($hotel_galaxy_settings['service_title']){
							echo wp_kses_post($hotel_galaxy_settings['service_title']);
						}else{
							echo _e('Our Services','hotel-galaxy');
						} 
						?>
					</h1>
					<div class="pagetitle-separator"></div>
				</div>
			</div>
		</div>		
		<div class="row">
			<?php 
			if ( is_active_sidebar( 'home-services' ) ) {
				dynamic_sidebar( 'home-services' );
			} else{
				?>
				<div class="col-md-4 col-sm-6 animate zoomIn" data-anim-type="zoomIn" data-anim-delay="200">
					<div class="feature-col service-item">
						<a class="sr-icon" href="#"><i class="fa fa-desktop" style="color:#2ecc71"></i></a>
						<h3>							
							<a href="#">
								<?php echo _e('No Title','hotel-galaxy'); ?>
							</a>
						</h3>					
						<p><?php echo _e('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,','hotel-galaxy');?></p>						

					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</section>