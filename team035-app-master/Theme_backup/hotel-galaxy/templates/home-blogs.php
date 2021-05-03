<?php 
$hotel_galaxy_default_setting=hotel_galaxy_default_setting(); 
$hotel_galaxy_settings = wp_parse_args(get_option( 'hotel_galaxy_option', array() ), $hotel_galaxy_default_setting ); 

?>
<section class="home-blogs-section animate" data-anim-type="zoomIn" data-anim-delay="800" style="background:url('<?php echo ($hotel_galaxy_settings['blog_section_bg'])? $hotel_galaxy_settings['blog_section_bg'] :''; ?>') no-repeat fixed 0 0 / cover  #000000;">
	
	<div class="overlay colut-news-overlay" style="padding-top: 40px;padding-bottom: 85px;background: rgba(0,0,0,0.8);">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="section-title" style="margin:30px 0px;">
						<h1 class="heading head-m feature-title" style="color:#fff;">
							<?php 
							if($hotel_galaxy_settings['blog_title']){
								echo wp_kses_post($hotel_galaxy_settings['blog_title']);
							}else{
								echo _e('Letest Blogs','hotel-galaxy');
							} 
							?>
						</h1>
						<div class="pagetitle-separator"></div>
					</div>
				</div>
			</div>		
			<div class="row">
				<?php 

				if(have_posts()):					
					$args = array( 'post_type' => 'post','category__not_in'=>$hotel_galaxy_settings['room_cat'],'posts_per_page'=>$hotel_galaxy_settings['blog_latest']);		
				$post_type_data = new WP_Query( $args );
				while ( $post_type_data->have_posts()): $post_type_data->the_post();
				?>
				<div class="col-small col-xs-12 col-sm-6 col-md-6 col-lg-4 blog-item">
					<aside>
						<?php 
						if(has_post_thumbnail()){
							$arg =array('class' =>"img-responsive"); 
							?>
							<a href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail('home_blog_img',$arg);  ?>
							</a>
							<?php
						}else{
							?>
							<a href="<?php the_permalink(); ?>">
								<img src="<?php echo esc_url(Hotel_galaxy_Template_Dir_Uri.'/images/no-image.png'); ?>" alt="<?php the_title_attribute(); ?>" class="img-responsive">
							</a>
							<?php
						} 
						?>
						<div class="content-title">
							<div class="">
								<h3 class="home-blog-single-title"><a href="<?php the_permalink(); ?>"><?php echo esc_attr(substr(get_the_title(), 0,40)); ?></a></h3>
							</div>
						</div>
						<div class="content-footer">						
							<img class="user-small-img" src="<?php echo esc_url(get_avatar_url(get_the_author_meta('ID'), array('size' => 450))) ?>" alt="<?php echo _e('Author image','hotel-galaxy') ?>">
							<span style="font-size: 16px;color: #fff;"><a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) ));?>" class="home-blog-author"><?php the_author(); ?>	</a></span>
							<span class="pull-right comment-counter">
								<a href="<?php the_permalink(); ?>" data-toggle="tooltip" data-placement="left" title="" data-original-title="Comments"><i class="fa fa-comments"></i>
									<?php	echo get_comments_number();	?>
								</a>							
							</span>						
						</div>
					</aside>
				</div>
				<?php 
				endwhile;

				wp_reset_postdata(); 
				
				endif; 
				?>
			</div>
		</div>
	</div>
</section>