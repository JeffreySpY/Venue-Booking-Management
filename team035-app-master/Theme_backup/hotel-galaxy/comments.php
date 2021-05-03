<?php if ( post_password_required() ) : ?>
	<p><?php _e( 'This post is password protected. Enter the password to view any comments.', 'hotel-galaxy' ); ?></p>
	<?php 
	return;
	endif; 
	?>
	<!-----Comment section------------------>	   
	
	<?php if(have_comments()):	?>
	<div class="comment-section">
		<h2><?php echo comments_number(__('No Comments','hotel-galaxy'), __('1 Comment','hotel-galaxy'), '% Comments'); ?></h2>
		<?php wp_list_comments( array( 'callback' => 'hotel_galaxy_comment' ) ); ?>
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
		<nav id="comment-nav-below">
			<h1 class="assistive-text">
				<?php _e( 'Comment navigation', 'hotel-galaxy' ); ?>
			</h1>
			<div class="nav-previous">
				<?php previous_comments_link( __( '&larr; Older Comments', 'hotel-galaxy' ) ); ?>
			</div>
			<div class="nav-next">
				<?php next_comments_link( __( 'Newer Comments &rarr;', 'hotel-galaxy' ) ); ?>
			</div>
		</nav>
	</div>
<?php endif;  ?>
</div>

<?php endif;  ?>
<!-------Comment Form Section---------->

<?php if ( comments_open() ) : ?>
	<div class="comment-form animate" data-anim-type="fadeInUp" data-anim-delay="800">
		<?php  
		$fields=array(
			'author' => '<div class="row"><div class="col-md-6"><input type="text" name="author" class="form-control" id="author" placeholder="Complete Name *">
			</div>',
			'email' => '<div class="col-md-6"><input type="text" name="email" class="form-control" id="email"  placeholder="Email Address *">
			</div></div>',			
			
			);

		//plugin check
		$pluginList = get_option( 'active_plugins' );
		$pluginName = 'wp-comment-policy-checkbox/wp-comment-policy-checkbox.php';

		if ( in_array( $pluginName , $pluginList ) ) {

			$fields = array_merge($fields,array('save_cache' => '<div class="row"><div class="col-md-12 save_cache checkbox"><label><input type="checkbox" name="wp-comment-cookies-consent" class="" id="wp-comment-cookies-consent"  value="yes">Save my name, email, and website in this browser for the next time I comment.</label></div></div>',

				'privacy_policy' => '<div class="row"><div class="col-md-12 policy-check checkbox"><label><input type="checkbox" name="policy" class="" id="policy"  value="policy-key">I have read and accepted the <a href="' . esc_url( $url ) . '" target="_blank" class="comment-form-policy__see-more-link">	Privacy Policy</a><span class="comment-form-policy__required required">*</span></label></div></div>',				
				));
		} 


		function hotel_galaxy_my_fields($fields) { 
			return $fields;
		}
		add_filter('wl_comment_form_default_fields','hotel_galaxy_my_fields');

		$defaults = array(
			'fields'=> apply_filters( 'hotel_galaxy_comment_form', $fields ),
			'comment_field'=> '<textarea id="comment" name="comment" placeholder="Enter Your Message" rows="6"></textarea>',
			'class_form'      => 'form-inline',		
			'logged_in_as' => '<p class="logged-in-as">' . __( "Logged in as ",'hotel-galaxy' ).'<a href="'. admin_url( 'profile.php' ).'">'.$user_identity.'</a>'. '<a href="'.esc_url(wp_logout_url( get_permalink() )) .'" title="'.esc_attr('Log out of this account').'">'.__(" Log out?",'hotel-galaxy').'</a>' . '</p>',
			'title_reply_to' => __( 'Leave a Reply to %s','hotel-galaxy'),
			'class_submit' => 'custom-btn book-lg',
			'label_submit'=>__( 'Submit Now','hotel-galaxy'),
			'comment_notes_before'=> '',
			'comment_notes_after'=>'',
			'title_reply'=> '<h2>'.__('Leave a Reply','hotel-galaxy').'</h2><p>Your email address will not be published. Required fields are marked *</p>',		
			'role_form'=> 'form',		
			);


		comment_form($defaults);

		?>		
	</div>
<?php endif;  ?>
