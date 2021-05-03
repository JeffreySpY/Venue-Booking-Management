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
	
	
	<head>
	    
	</head>
	<div class="page-content">		
        
		<?php the_content(); ?>	
		
		<?php 
		        $login  = (isset($_GET['login']) ) ? $_GET['login'] : 0;
				if ( $login === "failed" ) {
                  echo '<p class="login-msg"><strong>ERROR:</strong> Invalid username and/or password. Please try again.</p>';
                } elseif ( $login === "empty" ) {
                  echo '<p class="login-msg"><strong>ERROR:</strong> Username and/or Password is empty.Please try again.</p>';
                } elseif ( $login === "false" ) {
                  echo '<p class="login-msg"><strong>ERROR:</strong> You are logged out.</p>';
                }
                
		?>
		
		
		<div class= "login-custom">
		     <?php 
		    
		     $args = array(
                            'redirect' => home_url(), 
                            'form_id' => 'loginform-custom',
                            'label_username' => __( 'Username:' ),
                            'label_password' => __( 'Password:' ),
                            'label_log_in' => __( 'Log In' ),
                            'remember' => true
                        );
                        
                        wp_login_form( $args );
		    //wp_login_form( array('redirect' => home_url()) ); ?>
		</div>
		   
	
		
		
		<a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php _e( 'Lost your password?' ); ?></a>
		
	</div>	
</div>
<?php
endwhile;
endif;
?>