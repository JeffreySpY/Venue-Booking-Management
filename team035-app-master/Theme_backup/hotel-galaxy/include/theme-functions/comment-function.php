<?php 
// code for comment
if ( ! function_exists( 'hotel_galaxy_comment' ) ) :
	function hotel_galaxy_comment( $comment, $args, $depth ) 
{
	
	//get theme data
	global $hotel_galaxy_comment_data;
	//translations
	$leave_reply = $hotel_galaxy_comment_data['translation_reply_to_coment'] ? $hotel_galaxy_comment_data['translation_reply_to_coment'] : 
	__('<i class="fa fa-comment-o"></i>Reply','hotel-galaxy'); ?>
	<!--Comment1-->
	<div class="media comment_box">
		<div class="media-body">
			<div class="media comment_box">
				<a class="pull_left_comment" href="#"><?php echo get_avatar($comment,$size = '75'); ?></a>
				<div class="media-body">
					<div class="comment_details">
						<h4 class="comment_detail_title"><?php comment_author();?></h4>
						<ul class="comment_date-reply">
							<li><span class="comment_date"><?php comment_date('F j, Y');?>&nbsp;<?php comment_time('g:i a'); ?></span></li>
							<li class="pull-right"> <?php comment_reply_link(array_merge( $args, array('reply_text' => $leave_reply,'depth' => $depth, 'max_depth' => $args['max_depth']))) ?></li>
						</ul>	
						<?php comment_text(); ?>
					</div>					
				</div>
			</div>
		</div>					
	</div>	
	<?php 
}
endif;
?>