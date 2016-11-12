<?php get_header(); ?>

	<div id="content">

		<?php if (have_posts()) : ?>

 	  <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
 	  <?php /* If this is a category archive */ if (is_category()) { ?>
		
 	  <?php } ?>


		<div class="navigation">
			
		</div>

		<?php while (have_posts()) : the_post(); ?>
		<div class="post">
				<h2 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Ù¾ÛŒÙˆÙ†Ø¯ Ø«Ø§Ø¨Øª Ø¨Ø±Ø§ÛŒ <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
				<small><?php the_time('l, F jS, Y') ?> | نویسنده : <?php the_author() ?> |     <?php if (function_exists(�the_grs_likes�)) the_grs_likes(); ?>
</small>

				<div class="entry">
					<?php the_content() ?>
				</div>

				<p class="postmetadata"><?php the_tags('برچسب ها : ', ', ', '<br />'); ?> دسته بندی : <?php the_category(', ') ?> | <?php edit_post_link('ویرایش', '', ' | '); ?>  <?php comments_popup_link('بدون دیدگاه', 'یک دیدگاه', '% دیدگاه'); ?></p>

			</div>

		<?php endwhile; ?>

		<div class="navigation">
			<?php edit_post_link('ویرایش این نوشته.', '<p>', '</p>'); ?>
		</div>

	<?php else : ?>

		<h2 class="center">یافت نشد</h2>
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>

	<?php endif; ?>

	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
