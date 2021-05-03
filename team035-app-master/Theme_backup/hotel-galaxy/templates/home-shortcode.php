<?php 
$hotel_galaxy_default_setting=hotel_galaxy_default_setting(); 
$hotel_galaxy_settings = wp_parse_args(get_option( 'hotel_galaxy_option', array() ), $hotel_galaxy_default_setting ); 

?>
<section class="home-shortcode animate" data-anim-type="fadeInUp" data-anim-delay="800">
	<div class="container">
		<div class="row" style="margin-bottom: 35px;">
			<div class="col-md-12">
				<div class="section-title" style="margin: 0;">
					<h1 class="heading head-m feature-title">
						<?php 
						if($hotel_galaxy_settings['shortcode_title']){
							echo wp_kses_post($hotel_galaxy_settings['shortcode_title']);
						}else{
							echo _e('Contact Us','hotel-galaxy');
						} 
						?>
					</h1>
					<div class="pagetitle-separator"></div>
				</div>
			</div>
		</div>		
		<div class="row">
			<div class="col-md-6 col-md-offset-3 hotel-g-contact-form">
				<?php 
				if($hotel_galaxy_settings['shortcode_echo']!=''){
					echo do_shortcode($hotel_galaxy_settings['shortcode_echo']);
				}else{
					?>
					<div class="caption">						
						<p class="description text-center"><?php echo _e('1.  Go to Customizer ->Hotel Galaxy Setting -> Shortcode Section','hotel-galaxy'); ?></p>	
					</div>
					<?php
				}
				
				?>
			</div>
			
		</div>
	</div>
</section>