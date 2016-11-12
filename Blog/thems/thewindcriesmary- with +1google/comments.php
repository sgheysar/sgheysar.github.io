<?php // Do not delete these lines
	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die (__('Please do not load this page directly. Thanks!','twcm'));

			if (!empty($post->post_password)) { // if there's a password
				if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
				?>
				
				<p class="nocomments"><?php _e("This post is password protected. Enter the password to view comments.",'twcm'); ?><p>
				
				<?php
				return;
            }
        }

		/* This variable is for alternating comment background */
		$oddcomment = 'alt';
		
		/* Start editing after this next line */
?>

<?php if ($comments) : ?>
											<div id="comments" class="comments">
												<div class="comments-content">
													<h3 class="comments-header"><?php _e('Comments','twcm'); ?></h3>

	<?php $relax_comment_count=1; ?>

	<?php foreach ($comments as $comment) : ?>

													<div class="comment" id="comment-<?php comment_ID() ?>">
														<div class="comment-content">
															<?php comment_text() ?>
      											</div>
      											<p class="comment-footer">
         										<?php _e('Posted by','twcm'); ?>: <?php comment_author_link() ?> | <a href="#comment-<?php comment_ID() ?>"><?php comment_date(__('F jS, Y','twcm')) ?> <?php comment_time('H:i') ?></a>
														</p>
													</div>

		<?php $relax_comment_count++; ?>

	<?php endforeach; /* end for each comment */ ?>

												</div>
											</div>

<?php else : // this is displayed if there are no comments so far ?>

	<?php if ('open' == $post-> comment_status) : ?> 
		<!-- If comments are open, but there are no comments. -->
		
	<?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments"><?php _e('Comments are closed.','twcm'); ?></p>
	<?php endif; ?>
<?php endif; ?>


<?php if ('open' == $post-> comment_status) : ?>

											<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
												<div class="comments-open" id="comments-open">
													<h2 class="comments-open-header"><?php _e('Post a comment','twcm'); ?></h2>
														<div class="comments-open-content">

	<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
															<p><?php _e('You must be','twcm'); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>"><?php _e('logged in','twcm'); ?></a> <?php _e('to post a comment.','twcm'); ?></p>
	<?php else : ?>

		<?php if ( $user_ID ) : ?>

															<p><?php _e('Logged in as','twcm'); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="<?php _e('Log out of this account','twcm') ?>"><?php _e('Logout','twcm'); ?> &raquo;</a></p>

		<?php else : ?>
															<div id="comments-open-data">
																<div id="name-email">
																	<p>
																		<label for="author"><?php _e('Name','twcm'); ?>: <?php if ($req) _e('(required)','twcm'); ?></label>
																		<input type="text" id="author" name="author" value="<?php echo $comment_author; ?>" size="28" tabindex="1" />
																	</p>
																	<p>
																		<label for="email"><?php _e('Email Address: (will not be published)','twcm'); ?> <?php if ($req) _e('(required)','twcm'); ?></label>
																		<input type="text" name="email" id="email" dir="ltr" value="<?php echo $comment_author_email; ?>" size="28" tabindex="2" />
																	</p>
																</div>
																<p>
																	<label for="url">URL:</label>
																	<input type="text" name="url" id="url" dir="ltr" value="<?php echo $comment_author_url; ?>" size="28" tabindex="3" />
																</p>
															</div>

		<?php endif; ?>
															<p id="comments-open-text">
																<label for="comment"><?php _e('Comments','twcm'); ?>:</label>
																<textarea class="txtare" name="comment" id="comment" cols="60" rows="13" tabindex="4"></textarea>
															</p>
															<div id="comments-open-footer" class="comments-open-footer">
																<input name="submit" type="submit" id="submit" tabindex="5" value="<?php _e('Submit','twcm'); ?>" />
																<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
																<?php do_action('comment_form', $post->ID); ?>
															</div>
														</div>
												</div>
											</form>    





	<?php endif; // If registration required and not logged in ?>

<?php endif; // if you delete this the sky will fall on your head ?>