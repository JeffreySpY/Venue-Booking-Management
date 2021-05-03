<?php 
if(have_posts()):
	while(have_posts()):the_post();
?>
<div class="blog-area animate" data-anim-type="fadeInUp" data-anim-delay="900">
	<div>			
		<?php if(has_post_thumbnail()): 
		?>
		<div class="home-room-img">
			<?php $img_class= array('class' =>'img-responsive hotel-featured-img'); 
			the_post_thumbnail('', $img_class); ?>
		</div>
		<?php
		endif;
		?>
	</div>	
	<div class="page-content">							
		<?php the_content(); ?>			
	</div>	
</div>
<?php
endwhile;
endif;
?>