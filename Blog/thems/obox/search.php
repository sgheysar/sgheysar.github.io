<?php get_header(); ?>

	<div id="content" class="narrowcolumn">

	<?php if (have_posts()) : ?>

		<h2 class="pagetitle">نتایج جست و جو</h2>

		
		<?php while (have_posts()) : the_post(); ?>

			<div class="post">
				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="پیوند ثابت برای <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				<small><?php the_time('F jS, Y') ?> | نويسنده : <?php the_author() ?> </small>
				<?php the_excerpt(); ?>
				<p class="postmetadata"><?php if (function_exists('the_tags')) { the_tags('برچسب ها : ', ', ', '<br/>'); } ?>دسته بندي : <?php the_category(', ') ?> | <?php edit_post_link('ويرايش', '', ' | '); ?>  <?php comments_popup_link('بدون ديدگاه', '1 ديدگاه', '% ديدگاه'); ?></p>
			</div>

		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; مطالب قدیمی تر') ?></div>
			<div class="alignright"><?php previous_posts_link('مطالب جدیدتر &raquo;') ?></div>
		</div>

	<?php else : ?>

		<h2 class="center">پیدا نشد ، بهتر نیست کلمه دیگری را جست و جو کنید ؟</h2>
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>

	<?php endif; ?>

	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>