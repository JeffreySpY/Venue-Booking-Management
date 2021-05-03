<?php hotel_galaxy_breadcrums_style(); ?>
<?php 
$hotel_galaxy_default_setting=hotel_galaxy_default_setting(); 
$hotel_galaxy_settings = wp_parse_args(get_option( 'hotel_galaxy_option', array() ), $hotel_galaxy_default_setting ); 
?>
<!-- Page Heading Collout -->

<div class="page-title-section" style="background: url(<?php if($hotel_galaxy_settings['page_title_bg']){ echo esc_url($hotel_galaxy_settings['page_title_bg']);} ?>) no-repeat fixed 0 0 / cover rgba(0, 0, 0, 0);">		
	<div class="overlay">
		<div class="container">
			<div class="row" id="trapezoid">
				<div class="col-md-12 text-center pageinfo page-title-align-center">
					<h1 class="pagetitle white animate" data-anim-type="fadeInLeft"><?php if(is_home()){ wp_title('');}else{the_title();} ?></h1>
					<ul class="top-breadcrumb animate" data-anim-type="fadeInRight">
						<?php if (function_exists('hotel_galaxy_breadcrums') && !is_home()) hotel_galaxy_breadcrums(); ?>
					</ul>                    
				</div>
			</div>
		</div>	
	</div>
</div>
<!-- /Page Heading Collout -->
<div class="clearfix"></div>