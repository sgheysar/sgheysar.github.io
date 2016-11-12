<?php get_header(); ?>

	<div id="content">

	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>

			<div class="post" id="post-<?php the_ID(); ?>">
				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="پیوند ثابت برای <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				<small><?php the_time('F jS, Y') ?> | نویسنده : <?php the_author() ?> </small>

				<div class="entry">
					<?php the_content('ادامه مطلب &raquo;'); ?>
				</div>

				<p class="postmetadata"><?php if (function_exists('the_tags')) { the_tags('برچسب ها : ', ', ', '<br/>'); } ?>دسته بندی : <?php the_category(', ') ?> | <?php edit_post_link('ویرایش', '', ' | '); ?>  <?php comments_popup_link('بدون دیدگاه', '1 دیدگاه', '% دیدگاه'); ?></p>
			</div>

		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; مطالب قدیمی تر') ?></div>
			<div class="alignright"><?php previous_posts_link('مطالب جدیدتر &raquo;') ?></div>
		</div>

	<?php else : ?>

		<h2 class="center">یافت نشد</h2>
		<p class="center">متاسفانه, شما دنبال چیزی می گردید که اینجا نیست.</p>
		<?php include (TEMPLATEPATH . "/searchform.php"); ?>

	<?php endif; ?>

	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
