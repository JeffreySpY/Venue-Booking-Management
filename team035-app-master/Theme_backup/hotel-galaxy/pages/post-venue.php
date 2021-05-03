
<div class="blog-area animate" data-anim-type="fadeInUp" data-anim-delay="400">
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="<?php echo esc_attr((is_single())?'':'home-room-col') ?>">
	
			<div class="home-room-img">
			    <center>
			        	<div>
				    <?php if(has_post_thumbnail()){
					$arg =array('class' =>"img-responsive"); 
					the_post_thumbnail('',$arg); 
			       	} ?>
				</div>
				</center>
				<div class="showcase-inner">
					<div class="showcase-icons">
						<a href="<?php the_permalink(); ?>" class="gallery-icon"><i class="fa fa-plus"></i></a>
					</div>
				</div>
			</div>
			
		</div>
	</div>
			<h2>
			<?php 		
			if(is_single()){
				the_title();
			}else{
				?>
				<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				<?php
			} 
			?>

		</h2>
		<br>
		<div class="blog-inner-left">
		    <ul>
				<li> <i class="fa fa-user"></i> Venue Provider: <?php the_author(); ?></li>
				<li> <i class="fa fa-clock-o"></i> <?php echo esc_attr(get_the_date('Y-m-d')); ?></li>
				<?php if(get_the_tag_list() != '') { ?>
				<li> <i class="fa fa-tags"></i><?php the_tags('', ', ', '<br />'); ?></li>
				<?php } ?>				
			</ul>
			
		<br>
			<?php 
			// Remove links from the_category() and output
			$i = 0;
            $sep = ', ';
            $cats = '';
            foreach ( ( get_the_category() ) as $category ) {
                if (0 < $i)
                $cats .= $sep;
                $cats .= $category->cat_name;
                $i++;
                }
            // echo esc_attr($cats);
             //echo $cats;
          
             ?> 
             <div>
                 <h4 style="display: inline;">Type&nbsp;</h4> <h5 style="display: inline;"> <?php echo $cats; ?> </h5>  
                 </div>
             <br>
            
             <?php
			$services=getMatchedService($post->ID); ?>
		
			<table>
			     <h4> Available Service and Facility </h4>
			 <?php
			foreach($services as $service){ ?>
				<tr>
			    <th>
			    
			        <h5>
			<?php
				if($service==smoking){?> <i class="fas fa-smoking" style="padding-right:10px"></i><?php echo esc_attr("Smoking Area");} 
                elseif($service==wifi){?> <i class="fas fa-wifi" style="padding-right:10px"></i><?php echo esc_attr("Wifi		");}
                elseif($service==food){?> <i class="fas fa-utensils" style="padding-right:16px"></i><?php echo esc_attr("External Catering		");}
                elseif($service==parking){?> <i class="fas fa-parking" style="padding-right:15px"></i><?php echo esc_attr("Parking		");}
                elseif($service==microphone){?> <i class="fas fa-microphone" style="padding-right:17px"></i><?php echo esc_attr("Microphone		");}
                elseif($service==bar){?> <i class="fas fa-glass-martini-alt" style="padding-right:13px"></i><?php echo esc_attr("Bar Tab		");}}?>
                </h5>
				</th>
				<tr>
				</table>
		</div>
	
		<div>   
       <!--videos -->
		    <?php
		    $videos = get_posts(array(
		        'post_type' => 'attachment',
		        'post_parent' => $post->ID,
		        ));
		        
		    if($videos){
		        foreach($videos as $video){
		            if($video->post_name=='video'){
		                $url=$video->post_title;
		                break;
		            }
		        }
		    $embed_code = wp_oembed_get($url);
		    echo $embed_code;
		    }
		    ?>
		</div>
		
		<div class="single-post-content">
            <?php
			 if(!is_single() ){
				the_excerpt(__('more','hotel-galaxy'));
			}else{ 
				the_content();
            }
			?>
			
		
        <!-- list all image attachment-->		
		<div>
		    <?php
            $jpegImage = get_posts( array(
                'post_type'   => 'attachment',
                'post_parent' => $post->ID,
                'post_mime_type' => 'image',
				'exclude' => get_post_thumbnail_id(),
            ) );
            $array=array("");
            if ( $jpegImage ) {
                foreach ( $jpegImage as $attachment ) {
                    if(!in_array(get_the_title($attachment->ID),$array)){
						$array[]=get_the_title($attachment->ID);
						echo wp_get_attachment_image( $attachment->ID, 'full');
                    }
                }
            }
            ?>

	<br />
	<br />
            <h3>Packages For This Venue</h3>
            <br />
            <?php
			global $post;
			$post_ID = $post -> ID;
            $args = array('post_type' => 'package',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'parent_venue',
                        'field' => 'slug',
                        'terms' => $post_ID,
                    )
                ),
            );
            $loop = new WP_query($args);
            if( $loop->have_posts() ){
                while( $loop->have_posts() ) : $loop->the_post();

                    ?>
                    <!--<a href="<?php the_permalink(); ?>" style="float:left;margin:10px;display:block;background:#dfdfdf;width:30%;text-align:center;border-top-left-radius:5px;border-top-right-radius:5px">-->
                        <a href="<?php the_permalink(); ?>" class="custom-btn book-lg animate fadeInUp"><?php _e(the_title(),'hotel-galaxy'); ?></a>
                        <!--<h3> <?php the_title(); ?> </h3>-->
                        <!--<div>-->
                        <!--    <h4>View Details</h4>-->
                        <!--</div>-->

                    <!--</a>-->

                <?php
                endwhile;
            }
            ?>
		</div>
		<?php
		$defaults = array(
			'before'           => '<p class="abc">' . __( 'Pages:','hotel-galaxy' ),
			'after'            => '</p>',
			'link_before'      => '',
			'link_after'       => '',
			'next_or_number'   => 'number',
			'separator'        => ' ',
			'nextpagelink'     => __( 'Next page','hotel-galaxy' ),
			'previouspagelink' => __( 'Previous page','hotel-galaxy' ),
			'pagelink'         => '%',
			'echo'             => 1
			);

		wp_link_pages( $defaults );

		?>			
		<div class ="clearfix"></div>
	</div>	
</div>