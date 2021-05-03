<?php 

function hotel_galaxy_template_left_full_width($template){
	if($template=='full-width'){
		$divclass=esc_html('col-md-12');
	}elseif($template=='left-sidebar'){
		$divclass=esc_html('col-md-8');
	}
	?>
	<section class="blog-section">
		<div class="container">
			<div class="row">	
				<!---Blog left Sidebar-->
				<?php if($template=='left-sidebar'){get_sidebar();} ?>							
				<!--Blog Content Area-->
				<div class="<?php echo esc_attr($divclass); ?>">
					<?php get_template_part('pages/page','content'); ?>						 	
				</div>									
			</div>
		</div>
	</section>
	<div class="clearfix"></div>
	<?php
}
?>