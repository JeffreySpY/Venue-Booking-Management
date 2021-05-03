<?php get_header(); 
get_template_part('breadcrums');
?>
<section class="blog-section">
	<div class="container">
		<div class="row">
			<!--Blog Content Are-->
			<div class="col-md-8">
				<?php if(have_posts()):				

				while ( have_posts()): the_post();

				get_template_part('pages/post','content');

				endwhile;
				
				endif;?>				

				<!---Blog Pagination-->	 	
				<?php   
				$pagination = new hotel_galaxy_post_pagination();

				$pagination->hotel_galaxy_pagination(); 
				?>
				<!------End Blog Pagination-------->	 	
			</div>
			<!----End Blog Content Area-------->
			<!---Blog Right Sidebar-->	
			<?php get_sidebar(); ?>
		</div>
		<!--End Blog Right Sidebar-->		
	</div>
</div>
</section>
<div class="clearfix"></div>
<?php get_footer(); ?>