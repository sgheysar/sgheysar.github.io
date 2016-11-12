<?php get_header(); ?>

<body class="layout-two-column-right">
<div id="container">
	<div id="container-inner" class="pkg">
<?php include (TEMPLATEPATH . '/header_bar.php'); ?>
		<div id="pagebody">
			<div id="pagebody-inner" class="pkg">
				<div id="alpha">
					<div id="alpha-inner" class="pkg">

<?php if (have_posts()) : ?>

						<h2><?php _e('Search results','twcm'); ?></h2>
		
		<?php while (have_posts()) : the_post(); ?>

						<h2 class="date-header"><?php the_date(); ?></h2>
							<div class="entry" id="post-<?php the_ID(); ?>">
								<h2 class="entry-header"><?php the_title(); ?></h2>
 									<div class="entry-content">
										<div class="entry-body">
											<?php the_excerpt() ?>
											<div class="entry-footer">
												<?php edit_post_link(__('Edit','twcm')); ?>'','<strong> |</strong>'); ?> <?php _e('Posted by','twcm'); ?> <?php the_author() ?> <?php _e('at','twcm'); ?> <?php the_time() ?> | <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent Link to','twcm'); ?> <?php the_title(); ?>"><?php _e('Permalink','twcm'); ?></a> | <?php comments_popup_link(__('Comments (0)','twcm'), __('Comments (1)','twcm'), __('Comments (%)','twcm')); ?>
											</div>
<!--
<?php trackback_rdf(); ?>
-->
										</div>
									</div>
							</div>

<?php endwhile; ?>

							<div class="content-nav">
								<?php posts_nav_link('','',__('&laquo; Previous Entries','twcm')) ?> | <?php posts_nav_link('',__('Next Entries &raquo;','twcm'),'') ?>
							</div>
	
<?php else : ?>

						<h2 class="pagetitle"><?php _e('Not Found.','twcm'); ?></h2>
						<p><?php _e('Sorry, we cannot find what you are looking for. Would you like to search again?','twcm'); ?></p>
											<p><?php include (TEMPLATEPATH . '/searchform.php'); ?></p>


<?php endif; ?>

					</div>
				</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>