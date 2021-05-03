<?php 
if(have_posts()):
	while(have_posts()):the_post();
?>

<?php
    $user_ID=get_current_user_id();
    $args=array(
        'post_type' => 'venue',
        'post_author'=> $user_ID
    );
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
	<div class="page-content" style="margin-left:100px;padding:30px">
	    <h2>Edit your venue Information</h2>
	    <form>
	        <h3>Venue Name</h3>
	        
	    </form>
	</div>
</div>

<?php
endwhile;
endif;
?>