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

<g:plusone href="<?php  the_permalink(); ?>"></g:plusone>

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
											<div class="trackbacks">
												<h3 class="trackbacks-header"><?php _e('TrackBack','twcm'); ?></h3>
													<div id="trackbacks-info">
														<p><?php _e('TrackBack URL for this entry','twcm'); ?>:<br /><?php trackback_url(display); ?></p>
													</div>
											</div>

											<?php comments_template(); ?>

										</div>
									</div>
						<div class="content-nav">
							<?php previous_post('&laquo; %','','yes') ?> | <?php next_post(' % &raquo;','','yes') ?>
						</div>
							</div>
<?php endwhile; endif; ?>

					</div>
				</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>