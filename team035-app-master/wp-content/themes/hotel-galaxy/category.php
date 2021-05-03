<?php get_header();
hotel_galaxy_custom_breadcrums('category'); 
?>
<section class="blog-section">
	<div class="container blog-section">
		<div class="row">
			<!----Single Post Content-------->
			<div class="col-md-8">				
				<?php 
				if ( have_posts()): 
					while ( have_posts() ): the_post();
				get_template_part('pages/post','content'); ?>	
				<?php endwhile; 
				endif; ?>
				<!--pagination-conten--> 
				<?php   $pagination = new hotel_galaxy_post_pagination();
				$pagination->hotel_galaxy_pagination(); ?>
				
			</div>			
			<!-------Blog Right Sidebar-------------------->
			<?php get_sidebar(); ?>	
			<!-------End Blog Right Sidebar------>	
		</div>
	</div>	
</section>
<div class="clearfix"></div>
<?php get_footer(); ?>