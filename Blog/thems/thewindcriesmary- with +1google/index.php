<?php get_header(); ?>

<body class="layout-two-column-right">
<div id="container">
	<div id="container-inner" class="pkg">
<?php include (TEMPLATEPATH . '/header_bar.php'); ?>
		<div id="pagebody">
			<div id="pagebody-inner" class="pkg">
				<div id="alpha">
					<div id="alpha-inner" class="pkg">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

						<h2 class="date-header"><?php the_date(); ?></h2>
							<div class="entry" id="post-<?php the_ID(); ?>">
								<h2 class="entry-header"><?php the_title(); ?></h2>
 									<div class="entry-content">
										<div class="entry-body">
											<?php the_content(__('&raquo; Read the rest of this entry ...','twcm')); ?>
<?php if ( function_exists('the_tags')) the_tags(__('<div class="tags">Tags: ','twcm'), ', ', '</div>');?>
											<div class="entry-footer">
												<?php edit_post_link(__('Edit','twcm'),'','<span class="separator"> &nbsp;  </span>'); ?> <?php _e('Posted by','twcm'); ?> <?php the_author() ?> <?php _e('at','twcm'); ?> <?php the_time() ?><span class="separator"> &nbsp;  </span><?php the_category(__(', ','twcm')); ?><span class="separator"> &nbsp;  </span><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent Link to','twcm'); ?> <?php the_title(); ?>"><?php _e('Permalink','twcm'); ?></a><span class="separator"> &nbsp;  </span><?php comments_popup_link(__('Comments (0)','twcm'), __('Comments (1)','twcm'), __('Comments (%)','twcm')); ?>
											</div>
<!--
<?php trackback_rdf(); ?>
-->
										</div>
									</div>
							</div>

<?php endwhile; ?>

							<div class="content-nav">
								<?php posts_nav_link('','',__('&laquo; Previous Entries','twcm')) ?> &nbsp;  <?php posts_nav_link('',__('Next Entries &raquo;','twcm'),'') ?>
							</div>

<?php else : ?>

						<h2 class="center"><?php _e('Not found.','twcm'); ?></h2>
						<p class="center"><?php _e("Sorry, but you are looking for something that isn't here.",'twcm'); ?></p>

<?php endif; ?>

					</div>
				</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>