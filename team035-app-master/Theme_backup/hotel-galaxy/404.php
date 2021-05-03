<?php get_header(); 
hotel_galaxy_custom_breadcrums('404');
?>
<section class="blog-section">
	<div class="container blog-section">
		<div class="row">
			<!----Single Post Content-------->
			<div class="col-md-12">				
				<?php get_template_part('pages/page','nocontent'); ?>	
			</div>		
		</div>
	</div>	
</section>
<div class="clearfix"></div>
<?php get_footer(); ?>