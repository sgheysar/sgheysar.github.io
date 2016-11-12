<?php get_header(); ?>

	<div id="content">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<div class="post" id="post-<?php the_ID(); ?>">
			<h2><?php the_title(); ?></h2>

			<div class="entry">
				<?php the_content('<p class="serif">ادامه مطلب &raquo;</p>'); ?>

				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
	

			<p class="postmetadata"><?php if (function_exists('the_tags')) { the_tags('برچسب ها : ', ', ', '<br/>'); } ?>دسته بندی : <?php the_category(', ') ?> | نویسنده : <?php the_author() ?> |     <?php if (function_exists(�the_grs_likes�)) the_grs_likes(); ?>
</p>							</div>
		</div>

	<?php comments_template(); ?>

	<?php endwhile; else: ?>

		<p>متاسفانه, پستی مطابق درخواست شما وجود ندارد.</p>

<?php endif; ?>

	</div>
	
<?php get_sidebar(); ?>

<?php get_footer(); ?>
