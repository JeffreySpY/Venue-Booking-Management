<?php get_header(); get_template_part('breadcrums');?>
<section class="single-post-section">
	<div class="container">
		<div class="row">
			<!----Single Post Content-------->
			<div class="col-md-12">
				<div class="blog-detail">
					<?php
                    global $post;
                    $post_slug = $post->post_name;
					if(have_posts()):while(have_posts()):the_post();
					get_template_part('pages/post','venue');
					endwhile;
					endif;
                    ?>
				</div>
			</div>
            <!-------Blog Right Sidebar-------------------->
            <?php //get_sidebar(); ?>
            <!-------End Blog Right Sidebar------>
		</div>
	</div>	
</section>
<div class="clearfix"></div>
<?php get_footer(); ?>