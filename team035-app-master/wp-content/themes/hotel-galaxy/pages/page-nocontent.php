<?php 
if(is_404()){
	$head_title= __('Whoops... Page Not Found !!!','hotel-galaxy');
	
}elseif(is_search()){
	$head_title= __('Whoops... Post Not Found !!!','hotel-galaxy');;
	
	/* <img src="<?php echo esc_url(Hotel_galaxy_Template_Dir_Uri.'/images/banner404.png'); ?>" alt="" />
	*/
}
?>
<div class="col-md-12">
	<div class="hotel_galaxy_404">
		<div class="banner">
		</div>
		<h2><?php echo esc_attr($head_title); ?></h2>
		<p><?php _e('We`re sorry, but the page you are looking for doesn`t exist.','hotel-galaxy'); ?></p>
		You can return to our Homepage, <p><a href="<?php echo esc_url(home_url( '/' )); ?>"><button class="custom-btn book-lg" type="submit"><?php _e('Go To Homepage','hotel-galaxy'); ?></button></a></p>
        or let us know if you can't find what you're looking for <p><a href="<?php echo esc_url(home_url( '/contact-us-technical/' )); ?>"><button class="custom-btn book-lg" type="submit"><?php _e('Contact Us','hotel-galaxy'); ?></button></a></p>
	
	</div>
</div>