
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
	<div class="page-content" style="text-align:center">							
		<?php the_content(); ?>
        <form method="POST" action="https://dev.u20s1035.monash-ie.me/confirmation-page/"  > <p />
            <label>Package Name (Required)</label> <br />
            <input type="text" value="" name='title' style="padding-left:5px;width:90%;" Required> <p />
            <label>Package Description (Required)</label> <br />
            <textarea value="" rows="10" name='short_description' style="max-width:90%;width:90%;padding-left:5px" Required></textarea> <p />
            
            <h3>Prices</h3> <p />
             <table style="width:90%">
                   <tr>
    
                   <th><label>Monday</label> </th>
                   <th>  $<input type="number" value="" name="monday" style="width:10%;margin-left:10px;text-align: right;padding-right:5px" Required><p /></th> 
                   </tr>
                   
                     <tr>
                  <th><label >Tuesday</label> </th>
                  <th>$<input type="number" value="" name="tuesday" style="width:10%;margin-left:10px;text-align: right;padding-right:5px" Required><p /></th> 
                   </tr>
        
                     <tr>
                   <th><label>Wednesday</label> </th>
                   <th>   $<input type="number" value="" name="wednesday" style="width:10%;margin-left:10px;text-align: right;padding-right:5px" Required><p /></th> 
                   </tr>
                    <tr>
    
                   <th><label>Thursday</label> </th>
                   <th>   $<input type="number" value="" name="thursday" style="width:10%;margin-left:10px;text-align: right;padding-right:5px" Required><p /></th> 
                   </tr>
                    <tr>
                   <th><label>Friday</label> </th>
                   <th>   $<input type="number" value="" name="friday" style="width:10%;margin-left:10px;text-align: right;padding-right:5px" Required><p /></th> 
                   </tr>
                    <tr>
                   <th><label>Saturday</label> </th>
                   <th>   $<input type="number" value="" name="saturday" style="width:10%;margin-left:10px;text-align: right;padding-right:5px" Required><p /></th> 
                   </tr>
                    <tr>
                   <th><label>Sunday</label> </th>
                   <th>   $<input type="number" value="" name="sunday" style="width:10%;margin-left:10px;text-align: right;padding-right:5px" Required><p /></th> 
                   </tr>
            
                    </table>
                    
                    
                    
            <input type="hidden" name="action" value="Package" /><p />
            <input type="hidden" name="venue_id" value="<?php echo $_POST['venue_id']; ?>" /> <br />
            <!--<button type="submit" style="width:30%;height:50px">Create Package</button> -->
            <button type="submit" href="#" class="custom-btn book-lg animate fadeInUp"><?php _e('Create Package ','hotel-galaxy'); ?></button> 
        </form>
</div>
</div>
<?php
endwhile;
endif;
?>