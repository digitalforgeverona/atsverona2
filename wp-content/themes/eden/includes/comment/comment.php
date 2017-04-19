<?php

if (!function_exists('qode_comment')) {
function qode_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>

<li>                        
	<div class="comment">
		<div class="image"> <?php echo get_avatar($comment, 69); ?> </div>
		<div class="text">
			<h5 class="name"><?php echo get_comment_author_link(); ?><span class="comment_date"><?php comment_date('d F Y'); ?></span></h5>
			<span class="reply_holder"><i class="fa fa-reply"></i><?php comment_reply_link( array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']) ) ); ?></span>
			<div class="text_holder" id="comment-<?php echo comment_ID(); ?>">
				<?php comment_text(); ?>
			</div>
		</div>
	</div>
                
<?php if ($comment->comment_approved == '0') : ?>
<p><em><?php _e('Your comment is awaiting moderation.', 'qode'); ?></em></p>
<?php endif; ?>
<?php 
}
}
?>