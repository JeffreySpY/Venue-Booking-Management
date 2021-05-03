<?php 
$slider_details = hotel_galaxy_get_slider_details();
$hotel_galaxy_default_setting=hotel_galaxy_default_setting(); 
$hotel_option = wp_parse_args(get_option( 'hotel_galaxy_option', array() ), $hotel_galaxy_default_setting ); 

?>
<!--Main slider-->
<section class="main-carousel" role="slider" style="padding:0;" style="background-color:a0a0a0">
	
	<?php
	if(count($slider_details)>0){
		?>
		<div id="main-slider" class="carousel slide" data-ride="carousel" style="background-color:a0a0a0">
			<div class="carousel-inner" role="listbox" style="background-color:a0a0a0">
				<?php				
				$cont=1;
				foreach( $slider_details as $slide){
					?> 
					<div class="item <?php echo ($cont==1)? __('active','hotel-galaxy') :''; ?>" style="background-color:a0a0a0"   >					
						<img src="<?php echo esc_url( $slide['image_url'] ); ?>" style="height:650px" alt="<?php echo esc_attr( $slide['title'] ); ?>">
						<div class="<?php echo ($hotel_option['slider_smartphone_res']) ? __('hidden-xs','hotel-galaxy') :'' ?> carousel-caption intro-caption" style="background-color:a0a0a0">
						
						<!--Temporary solution-->
							<div class="slide-info" style="	border-left:#FFFFFF;border-right:#FFFFFF;height:180px">
								    <h1> <?php echo wp_kses_post( $slide['title'] ); ?> </h1>
								    
								    	<?php if(!empty($slide['excerpt'])){
									?>
									<p><?php echo esc_attr( $slide['excerpt'] ); ?></p>
									<?php
								} ?>
								
								<!--Oriniginal solution  with animation(not working)-->
								<h1 class="slider-title animate zoomIn" data-anim-type="zoomIn" data-anim-delay="200" style="background-color:a0a0a0"><?php //echo wp_kses_post( $slide['title'] ); ?></h1>
								<?php //if(!empty($slide['excerpt'])){?>
									<p class="animate zoomIn" data-anim-type="zoomIn" data-anim-delay="400" style="background-color:a0a0a0"><?php //echo esc_attr( $slide['excerpt'] ); ?></p>
									<?php?>
								
								
								<?php 
								//if(!empty($hotel_option['slider_sec_btn']))
								{
									?>
									<!--	<a target="_blank" href="<?php //echo esc_url( $slide['url'] ); ?>" class="custom-btn book-lg animate fadeInUp" style="background-color:a0a0a0"><?php //echo esc_attr($hotel_option['slider_sec_btn']) ?></a> 
							-->		<?php
								}

								?>
						
							</div>
                    
					</div>
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
		
		<?php

	}
	?>

</section> 
<!--/Main slider-->
<div class="clearfix"></div>
