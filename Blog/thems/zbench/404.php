<?php get_header(); ?>
<?php get_sidebar(); ?>
<div id="content">
	<div class="post">
		<h2 class="title title_page"><?php _e('پیدا نشد.'); ?></h2>
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
</div><!--content-->
<?php get_footer(); ?>