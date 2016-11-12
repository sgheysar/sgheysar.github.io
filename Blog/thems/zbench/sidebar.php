<div id="sidebar-border">
	<?php $options = get_option('zBench_options'); ?>
	<div id="rss"><a href="<?php if($options['rss_url'] <> '') { echo($options['rss_url']); } else { bloginfo('rss2_url'); } ?>" rel="nofollow" title="<?php _e('خوراک وبلاگ'); ?>"><?php _e('خوراک وبلاگ'); ?></a></div>
	<?php if($options['twitter_url'] <> '') : ?>
	<div id="twitter"><a href="<?php echo($options['twitter_url']); ?>" rel="nofollow" title="<?php _e('مرا در توییتر دنبال کنید'); ?>"><?php _e('مرا در توییتر دنبال کنید'); ?></a></div>
	<?php endif; ?>
	<?php if($options['facebook_url'] <> '') : ?>
	<div id="facebook"><a href="<?php echo($options['facebook_url']); ?>" rel="nofollow" title="<?php _e('فیس‌بوک'); ?>"><?php _e('فیس‌بوک'); ?></a></div>
	<?php endif; ?>
	<div id="sidebar">

<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('primary-widget-area') ) : ?>

<?php if ( is_singular() ) { ?>
	<div class="widget">
		<h3><?php _e('مطالب اخیر'); ?></h3>
		<ul>
			<?php
			$myposts = get_posts('numberposts=5&offset=0&category=0');
			foreach($myposts as $post) : setup_postdata($post);
			?>
			<li><span><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span></li>
			<?php endforeach; ?>
		</ul>
	</div>
<?php } else { ?>
	<div class="widget">
		<h3><?php _e('مطالب اتفاقی'); ?></h3>
		<ul>
			<?php
			$rand_posts = get_posts('numberposts=5&orderby=rand');
			foreach( $rand_posts as $post ) :
			?>
			<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
			<?php endforeach; ?>
		</ul>
	</div>
<?php } ?>
	<div class="widget">
		<h3><?php _e('جستجو بر اساس برچسب‌ها'); ?></h3>
		<div><?php wp_tag_cloud('smallest=9&largest=18'); ?></div>
	</div>	
	<div class="widget">
		<h3><?php _e('بایگانی'); ?></h3>
		<ul>
			<?php wp_get_archives( 'type=monthly' ); ?>
		</ul>
	</div>
	<div class="widget">
		<h3><?php _e('پیوندها'); ?></h3>
		<ul>
			<?php wp_list_bookmarks('title_li=&categorize=0&orderby=id'); ?>
		</ul>
	</div>
	<div class="widget">
		<h3><?php _e('اطلاعات کاربری'); ?></h3>
		<ul>
			<?php wp_register(); ?>
			<li><?php wp_loginout(); ?></li>
			<?php wp_meta(); ?>
		</ul>
	</div>

<?php endif; ?>

<?php if ( is_singular() ) { if ( is_active_sidebar('singular-widget-area') ) dynamic_sidebar('singular-widget-area'); } ?>
<?php if (!is_singular()) { if ( is_active_sidebar('not-singular-widget-area') ) dynamic_sidebar('not-singular-widget-area'); } ?>
<?php if ( is_active_sidebar('footer-widget-area') ) dynamic_sidebar('footer-widget-area'); ?>

	</div><!-- end: #sidebar -->
</div><!-- end: #sidebar-border -->