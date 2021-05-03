<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>	
	<meta <meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php 
	$hotel_galaxy_default_setting=hotel_galaxy_default_setting(); 
	$option = wp_parse_args(get_option( 'hotel_galaxy_option', array() ), $hotel_galaxy_default_setting ); 
	?>	
	<style>	
	body {   
		font-family: <?php echo esc_attr(($option['font_family']!='') ? str_replace("'", '', $option['font_family']) : 'Jura, sans-serif'); ?>!important;			
	}            
</style>

<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

	<div class="wrapper"> 
		<!------Header Section-------->
		<section class="header-section" role="header">
			<nav class="navbar navbar-default header_bg <?php echo ($option['header_hide']) ? __('top_fixed','hotel-galaxy') :'' ?>">
				<div class="container">
					<div class="row">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="col-sm-3 navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" style="z-index: 999999;">
								<span class="sr-only"><?php _e('Toggle navigation','hotel-galaxy'); ?></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<div class="site-logo">		
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
									<?php 
									if(has_custom_logo()){ 

										$custom_logo_id = get_theme_mod( 'custom_logo' );
										$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
										?>
										<img src="<?php echo esc_url($logo[0]); ?>">
										<?php
									}else{	?> <h4 class="htlg-site-title"><?php echo esc_attr(get_bloginfo('name')); ?></h4>
									<p class="site-description"><?php echo esc_attr(get_bloginfo( 'description', 'hotel-galaxy' )); ?></p>
								<?php } ?>
							</a>
						</div>
					</div>
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<?php 
						
						wp_nav_menu( array(
							'theme_location' => 'primary',
							'menu_class' => 'nav navbar-nav',
							'fallback_cb' => 'hotel_galaxy_fallback_page_menu',	
							'walker' => new hotel_galaxy_nav_walker(),						
						));			
						
						?> 	

					</div>
				</div>
			</div>
		</nav>

		<!--<div class="header-bottom">-->
		<!--	<div class="container">-->
		<!--		<div class="row" style="height:35px;">-->
		<!--			<div class="col-md-8 hidden-xs">-->
		<!--				<ul class="contact-top animate fadeInLeft" style="padding:0;">-->
		<!--					<?php if($option['address']!=''){?><li><strong><?php  _e('Address :  ','hotel-galaxy'); ?></strong><?php echo esc_attr($option['address']); ?></li><?php } ?>-->
		<!--					<?php if($option['reservation_line']!=''){?><li><strong><?php _e('Reservation Line :  ','hotel-galaxy'); ?></strong><?php echo esc_attr($option['reservation_line']); ?></li><?php } ?>-->
		<!--				</ul>-->
		<!--			</div>-->
		<!--			<div class="col-md-4">			-->
		<!--				<ul class="header-social-icon pull-right animate zoomIn">-->

		<!--					<?php if($option['facebook_link']!=''){?><li><a href="<?php echo esc_url($option['facebook_link']); ?>" target="<?php if($option['social_open_new_tab']=='1'){echo '_blank';} ?>" class="facebook" data-toggle="tooltip" title="<?php esc_attr_e('Facebook','hotel-galaxy'); ?>"><i class="fab fa-facebook-f"></i></a></li><?php } ?>-->

		<!--					<?php if($option['twitter_link']!=''){?><li><a href="<?php echo esc_url($option['twitter_link']); ?>" target="<?php if($option['social_open_new_tab']=='1'){echo '_blank';} ?>" class="twitter" data-toggle="tooltip" title="<?php esc_attr_e('Twitter','hotel-galaxy'); ?>"><i class="fab fa-twitter"></i></a></li><?php } ?>-->
		<!--					<?php if($option['skyup_link']!=''){?><li><a href="<?php echo esc_url($option['skyup_link']); ?>" target="<?php if($option['social_open_new_tab']=='1'){echo '_blank';} ?>" class="skype" data-toggle="tooltip" title="<?php esc_attr_e('Skype','hotel-galaxy'); ?>"><i class="fab fa-skype"></i></a></li><?php } ?>-->
		<!--					<?php if($option['googleplus_link']!=''){?><li><a href="<?php echo esc_url($option['googleplus_link']); ?>" target="<?php if($option['social_open_new_tab']=='1'){echo '_blank';} ?>" class="google-plus" data-toggle="tooltip" title="<?php esc_attr_e('Google-Plus','hotel-galaxy'); ?>"><i class="fab fa-google-plus"></i></a></li><?php } ?>-->

		<!--				</ul>-->
		<!--			</div>	-->
		<!--		</div>	-->
		<!--	</div>	-->
		<!--</div>	 -->
	</section>
	<!-----/Header Section-------->
	<div class="clearfix"></div>				
