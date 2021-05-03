<?php 
class hotel_galaxy_post_pagination
{
	function hotel_galaxy_pagination($pages = '', $range = 2)
	{  				
		?>		
		<div class="blog-content pagination-content" data-anim-type="fadeInLeft">
			<div class="row">
				<div class="wow zoomIn col-xs-12 col-sm-10 pagination  pagination-lg animate">					
					<div class="pagination  pagination-lg animate" data-anim-type="fadeInLeft">
						<?php 
						the_posts_pagination( array(
							'type' => 'list',							
							'prev_text' => __( 'Previous', 'hotel-galaxy' ),
							'next_text' => __( 'Next', 'hotel-galaxy' ),
							'screen_reader_text'=>__(' ', 'hotel-galaxy'),							
							
							) ); 
						
							?>

						</div>
						
					</div>
				</div>
			</div>
			<?php
		}	
	}
	?>