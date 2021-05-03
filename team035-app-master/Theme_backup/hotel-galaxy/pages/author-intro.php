<!-----Author Section-------------->	
<?php if(get_the_author_meta('description')) :?>
	<div class="author-section">
		<h2><?php _e('About the Author','hotel-galaxy'); ?></h2>
		<div class="about-author">
			<figure>
				<?php echo get_avatar( get_the_author_meta('email') , 90 ); ?>
			</figure>
			<div class="text">
				<a href="<?php echo esc_attr(get_author_posts_url( get_the_author_meta( 'ID' ) ));?>"><?php the_author(); ?></a>
				<p><?php echo esc_attr(get_the_author_meta('description')); ?></p>
				
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
<?php endif; ?>