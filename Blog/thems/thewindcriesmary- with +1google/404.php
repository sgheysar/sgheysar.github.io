<?php get_header(); ?>

<body class="layout-two-column-right">
<div id="container">
	<div id="container-inner" class="pkg">
<?php include (TEMPLATEPATH . '/header_bar.php'); ?>
		<div id="pagebody">
			<div id="pagebody-inner" class="pkg">
				<div id="alpha">
					<div id="alpha-inner" class="pkg">
						<h2 class="date-header"><?php the_date(); ?></h2>
							<div class="entry" id="post-<?php the_ID(); ?>">
								<h2 class="pagetitle"><?php _e('Not Found','twcm'); ?></h2>
 									<div class="entry-content">
										<div class="entry-body">
											<p><?php _e('Sorry, we cannot find what you are looking for. Would you like to search again?','twcm'); ?></p>
											<p><?php include (TEMPLATEPATH . '/searchform.php'); ?></p>
										</div>
									</div>
							</div>
					</div>
				</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>