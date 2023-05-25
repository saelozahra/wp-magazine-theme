<?php // Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if (!empty($post->post_password)) { // if there's a password
		if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
			?>

			<p class="nocomments"><?php  _e('This post is password protected. Enter the password to view comments','mandegarweb'); ?></p>

			<?php
			return;
		}
	}
?>

<?php if ($comments) : ?>

	<h4 class="comments-title"><?php comments_number( __('Zero', 'mandegarweb') , __('One', 'mandegarweb'), % ); ?> <?php  _e('Comments','mandegarweb'); ?></h4>

	<div id="comments">

		<?php // foreach ($comments as $comment) : ?>
<?php /*?>			<div class="comment" id="comment-<?php comment_ID() ?>">
			
                    <div class="comment-avatar">
                        <?php echo get_avatar( $comment, 72 ); ?>
                    </div>
                     <span class="comment_author_name"><?php comment_author_link() ?></span>
					<div class="comment-info">
                       
                        <?php comment_date('F jS, Y') ?> <?php comment_time() ?> <?php edit_comment_link(__('Edit','mandegarweb','&nbsp;&nbsp;','')); ?>
                    </div>            	
				 
				<div class="comment-content">

					
					<?php if ($comment->comment_approved == '0') : ?>
						<em><?php _e('Your comment is awaiting moderation','mandegarweb'); ?></em>
					<?php endif; ?>

					<?php comment_text() ?>
				</div>
			</div><?php */?>
            
            
            <ul class="commentlist">
            
				<?php $args = array(
                    'style'             => 'ul',
                    'avatar_size'       => 128,
                ); 
				
				wp_list_comments($args); ?>
                
            </ul>
		<?php //endforeach; ?>

	</div>

<?php else : // this is displayed if there are no comments so far ?>
 
	<?php if ('open' == $post->comment_status) : ?>
		<!-- If comments are open, but there are no comments. -->
	<?php else : // comments are closed ?>
		<!-- If comments are closed. -->
        <p class="nocomments"><?php  _e('Comments are closed','mandegarweb'); ?></p>

	<?php endif; ?>
	
<?php endif; ?>



<?php if ('open' == $post->comment_status) : ?>

	

	<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
		<p><?php _e('You must be','mandegarweb'); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>"><?php  _e('logged in','mandegarweb'); ?></a> <?php  _e('to post a comment','mandegarweb'); ?></p>
	<?php else : ?>
		<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
			<!--<hr class="clearfix">--><h1 class="comments-title"><?php  _e('Write Comment','mandegarweb'); ?></h1>
			
			<?php if ( $user_ID ) : ?>
				<p><?php  _e('Loged In By :','mandegarweb'); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>&nbsp;&nbsp;&nbsp;<a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="<?php  _e('Log Out From','mandegarweb'); ?>"><?php  _e('Exit','mandegarweb'); ?> </a></p>
			<?php else : ?>			
				<p><input type="text" name="author" placeholder="Name" id="author" class="text" value="<?php echo $comment_author; ?>" />
				
                <input type="text" name="email" id="email" class="text" placeholder="Email" value="<?php echo $comment_author_email; ?>" />
				</p>

			<?php endif; ?>
			<p><textarea name="comment" id="comment" placeholder="Text" ></textarea></p>
			
			<?php do_action('comment_form', $post->ID); ?>
			
			<p><input name="submit" type="submit" id="submit" value="<?php  _e('Send','mandegarweb'); ?>" /><input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" /></p>
			
			

		</form>

<?php endif; // If registration required and not logged in ?>

<?php endif; // if you delete this the sky will fall on your head ?>
