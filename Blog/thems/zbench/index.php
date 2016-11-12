<?php get_header(); $options = get_option('zBench_options'); ?>
<div id="content">
	<?php if (have_posts()) : while (have_posts()) : the_post();?>
	<div <?php post_class(); ?> id="post-<?php the_ID(); ?>"><!-- post div -->
		<h2 class="title<?php if(is_sticky()) {echo " sticky-h2";} ?>"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
		<div class="post-info-top">
			<span class="post-info-date"><?php _e('توسط'); ?> <?php the_author(); ?> <?php _e('در'); ?> <?php the_time(get_option( 'date_format' )); ?> <?php edit_post_link(__('ویرایش'), '[', ']'); ?></span>
			<span id="gotocomments"><?php comments_popup_link(__('بدون نظر'), __('1 نظر'), '% '.__('نظر')); ?><?php if(function_exists('the_views')) { echo " | ";the_views(); } ?></span>
		</div>
		<div class="clear"></div>
		<div class="entry">
			<?php if ( $options['excerpt_check']=='true' ) { the_excerpt(__('ادامه')); } else { the_content(__('ادامه')); } ?>
		</div><!-- END entry -->
		<?php if(is_sticky()) { ?>
			<div class="entry"><p><?php _e('مطلب مهم'); ?> <a href="<?php the_permalink() ?>" class="more-links"><?php _e('ادامه'); ?></a></p></div>
		<?php } ?>
	</div><!-- END post -->
	<?php endwhile; else: ?>
	<div class="post post-single">
		<h2 class="title title-single"><a href="#" title="<?php _e('پیدا نشد.'); ?>"><?php _e('پیدا نشد.'); ?></a></h2>
		<div class="post-info-top" style="height:1px;"></div>
		<div class="entry">
			<p><?php _e('متاسفیم، مطلبی که به دنبال آن هستید پیدا نشد.'); ?></p>
			<h3><?php _e('مطالب اتفاقی'); ?></h3>
			<ul>
				<?php
					$rand_posts = get_posts('numberposts=5&orderby=rand');
					foreach( $rand_posts as $post ) :
				?>
				<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
				<?php endforeach; ?>
			</ul>
			<h3><?php _e('ابرچسب'); ?></h3>
			<?php wp_tag_cloud('smallest=9&largest=22&unit=pt&number=200&format=flat&orderby=name&order=ASC');?>
		</div><!--entry-->
	</div><!--post-->
	<?php endif; ?>
<?php
if(function_exists('wp_page_numbers')) {
	wp_page_numbers();
}
elseif(function_exists('wp_pagenavi')) {
	wp_pagenavi();
} else {
	global $wp_query;
	$total_pages = $wp_query->max_num_pages;
	if ( $total_pages > 1 ) {
		echo '<div id="pagination">';
			posts_nav_link(' | ', __('مطالب قبلی'), __('مطالب بعدی'));
		echo '</div>';
	}
}
?>
</div><!--content-->
<?php get_sidebar() ?>
<?php get_footer() ?>