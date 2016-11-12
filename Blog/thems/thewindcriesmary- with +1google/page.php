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

							<div class="entry" id="post-<?php the_ID(); ?>">
								<h2 class="entry-header"><?php the_title(); ?></h2>
 									<div class="entry-content">
										<div class="entry-body">
											<?php the_content(__('&raquo; Read the rest of this entry ...','twcm')); ?>


												<?php edit_post_link(__('Edit','twcm'),'','<span class="separator"> &nbsp;  </span>'); ?><?php comments_popup_link(__('Comments (0)','twcm'), __('Comments (1)','twcm'), __('Comments (%)','twcm')); ?>

<!--
<?php trackback_rdf(); ?>
-->
										</div>
									</div>
							</div>

<?php endwhile; ?>


<?php else : ?>

						<h2 class="center"><?php _e('Not found.','twcm'); ?></h2>
						<p class="center"><?php _e("Sorry, but you are looking for something that isn't here.",'twcm'); ?></p>

<?php endif; ?>

					</div>
				</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>