﻿<?php // Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if (!empty($post->post_password)) { // if there's a password
		if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
			?>

			<p class="nocomments">This post is password protected. Enter the password to view comments.</p>

			<?php
			return;
		}
	}

	/* This variable is for alternating comment background */
	$oddcomment = 'class="alt" ';
?>

<!-- You can start editing here. -->

<?php if ($comments) : ?>
	<h3 id="comments"><?php comments_number('0 دیدگاه', 'یک دیدگاه', '% دیدگاه' );?> برای پست : <?php the_title(); ?></h3>
	<ul class="cmt-info">
		<?php if ('open' == $post-> comment_status){ ?><li class="comment_edit"><a href="#respond">ارسال دیدگاه</a></li><?php } ?>
		<li class="comment_feed"><?php comments_rss_link('آر اس اس برای این مطلب'); ?></li>
		<?php if ('open' == $post->ping_status){ ?><li class="comment_trackback"><a href="<?php trackback_url(); ?> " rel="trackback">بازتاب</a></li><?php } ?>
	</ul>

	<ol class="commentlist">

	<?php foreach ($comments as $comment) :?>
	<?php if (get_comment_type() == "comment") : //if is ordianry comment ?>

		<li <?php echo $oddcomment; ?>id="comment-<?php comment_ID() ?>">
			<?php echo get_avatar( $comment, 32, get_bloginfo('template_directory') . '/images/avatar.png' ); ?>
			<cite><?php comment_author_link() ?></cite> می گوید :
			<?php if ($comment->comment_approved == '0') : ?>
			<em>دیدگاه شما با موفقیت شبت شد و بعد از تایید نمایش داده می شود.</em>
			<?php endif; ?>
			<br />

			<small class="commentmetadata"><a href="#comment-<?php comment_ID() ?>" title=""><?php comment_date('F jS, Y') ?> at <?php comment_time() ?></a> <?php edit_comment_link('edit','&nbsp;&nbsp;',''); ?></small>
			<div class="entry">
			<?php comment_text() ?>
			</div>

		</li>

	<?php
		/* Changes every other comment to a different class */
		$oddcomment = ( empty( $oddcomment ) ) ? 'class="alt" ' : '';
	?>
	<?php endif; ?>
	<?php endforeach; /* end for each comment */ ?>
</ol>
<?php if (function_exists('trackpings') && $trackbacks = trackpings()) : ?>
	<h3 id="trackpings"><?php echo trackpings('count'); ?> Trackbacks/<span>Pingbacks</span></h3>
	<ul class="trackpings"><?php listtrackpings('trackback', '<li id="trackback-%id"><span><a href="%url" rel="nofollow" title="%origin">%origin</a> (Trackback, %date)</span><br />%content</li>'); ?><?php listtrackpings('pingback', '<li id="trackback-%id"><span><a href="%url" rel="nofollow" title="%origin">%origin</a> (Pingback, %date)</span><br />%content</li>'); ?></ul>
	<?php endif; ?>
	
 <?php else : // this is displayed if there are no comments so far ?>
	
	<?php if ('open' == $post->comment_status) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments">امکان ثبت دیدگاه وجود ندارد.</p>

	<?php endif; ?>

<?php endif; ?>


<?php if ('open' == $post->comment_status) : ?>

<h3 id="respond">ارسال دیدگاه</h3>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p>شما باید <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">وارد شوید</a> تا  بتوانید دیدگاهتان را ارسال کنید.</p>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<?php if ( $user_ID ) : ?>

<p>وارد شده با نام : <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">خارج شوید &raquo;</a></p>

<?php else : ?>

<p><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" />
<label for="author"><small>نام <?php if ($req) echo ""; ?></small></label></p>

<p><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" />
<label for="email"><small>ایمیل <?php if ($req) echo ""; ?></small></label></p>

<p><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
<label for="url"><small>وبلاگ</small></label></p>

<?php endif; ?>

<!--<p><small><strong>XHTML:</strong> You can use these tags: <code><?php echo allowed_tags(); ?></code></small></p>-->

<p><textarea name="comment" id="comment" cols="100%" rows="10" tabindex="4"></textarea></p>

<p><input name="submit" type="submit" id="submit" tabindex="5" value="ارسال دیدگاه" />
<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
</p>
<?php do_action('comment_form', $post->ID); ?>

</form>

<?php endif; // If registration required and not logged in ?>

<?php endif; // if you delete this the sky will fall on your head ?>
