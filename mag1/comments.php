<?php


// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<p class="nocomments"><?php _e('This Is Private Content Please Enter This Password.','Magazin1'); ?></p>
	<?php
		return;
	}
?>

<!-- You can start editing here. -->
<div class="comments" id="comment comments">
<?php if ( have_comments() ) : ?>
	<h3 id="comments"><?php comments_number('No Comment', 'One Comment', '% Comment Found' );?> <?php _e('Type Your Comment','Magazin1'); ?></h3>

	<div class="navigation">
		<div class="alignleft"><?php previous_comments_link() ?></div>
		<div class="alignright"><?php next_comments_link() ?></div>
	</div>

	<ul class="commentlist">
		<?php $args = array(
            'style'             => 'ul',
            'avatar_size'       => 128,
        ); 
        
        wp_list_comments($args); ?>
	</ul>

	<div class="navigation">
		<div class="alignleft"><?php previous_comments_link() ?></div>
		<div class="alignright"><?php next_comments_link() ?></div>
	</div>
 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ('open' == $post->comment_status) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments"><?php _e('Comments Are Closed','Magazin1'); ?></p>

	<?php endif; ?>
<?php endif; ?>


<?php if ('open' == $post->comment_status) : ?>

<div id="respond commentform" >

<h3><?php comment_form_title( __('Submit Your Comment','Magazin1'), 'Type Your Comment %s' ); ?></h3>


<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p> Please <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>"><?php _e('Log In','Magazin1'); ?></a> <?php _e('To Add Comment','Magazin1'); ?></p>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<?php if ( $user_ID ) : ?>

<p> <?php _e('Loged In By','Magazin1'); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account"> <?php _e('Exit','Magazin1'); ?></a></p>

<?php else : ?>

<p><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
<label for="author"><small><?php _e('Name','Magazin1'); ?> <?php if ($req) echo "(*)"; ?></small></label></p>

<p><input type="text" style="text-align:left" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
<label for="email"><small><?php _e('Mail','Magazin1'); ?> <?php if ($req) echo "(*)"; ?></small></label></p>

<p><input type="text" style="text-align:left" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
<label for="url"><small><?php _e('Site','Magazin1'); ?></small></label></p>

<?php endif; ?>

<!--<p><small><strong>XHTML:</strong> You can use these tags: <code><?php echo allowed_tags(); ?></code></small></p>-->

<p><textarea name="comment" id="comment" cols="100%" rows="10" tabindex="4"></textarea></p>

<p class="last_comment_submit"><input name="submit" type="submit" id="submit" tabindex="5" value="<?php _e('Send','Magazin1'); ?>" />
<?php comment_id_fields(); ?>
</p>
<?php do_action('comment_form', $post->ID); ?>

</form>

<?php endif; // If registration required and not logged in ?>
</div>

<?php endif; // if you delete this the sky will fall on your head ?>
</div>