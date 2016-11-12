<?php get_header(); ?>


<body class="layout-two-column-right">
<div id="container">
	<div id="container-inner" class="pkg">
<?php include (TEMPLATEPATH . '/header_bar.php'); ?>
		<div id="pagebody">
			<div id="pagebody-inner" class="pkg">
				<div id="alpha">
					<div id="alpha-inner" class="pkg">

<?php is_tag(); ?>
		<?php if (have_posts()) : ?>
	  <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
 	  <?php /* If this is a category archive */ if (is_category()) { ?>
		<h2 class="pagetitle"><?php _e('Posts filed under','twcm'); ?> <?php single_cat_title(); ?></h2>
 	  <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
		<h2 class="pagetitle"><?php _e('Posts tagged','twcm'); ?> <?php single_tag_title(); ?></h2>
 	  <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		<h2 class="pagetitle"><?php _e('Posts on','twcm'); ?> <?php the_time(__('F jS, Y','twcm')); ?></h2>
 	  <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<h2 class="pagetitle"><?php _e('Posts for','twcm'); ?> <?php the_time(__('F, Y','twcm')); ?></h2>
 	  <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<h2 class="pagetitle"><?php _e('Posts for','twcm'); ?> <?php the_time('Y'); ?></h2>
	  <?php /* If this is an author archive */ } elseif (is_author()) { ?>
		<h2 class="pagetitle"><?php _e('Author Archive','twcm'); ?></h2>
 	  <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h2 class="pagetitle"><?php _e('Archives','twcm'); ?></h2>
 	  <?php } ?>

<?php while (have_posts()) : the_post(); ?>


						<h2 class="date-header"><?php the_date(); ?></h2>
							<div class="entry" id="post-<?php the_ID(); ?>">
								<h2 class="entry-header"><?php the_title(); ?></h2>
 									<div class="entry-content">
										<div class="entry-body">
											<?php the_excerpt(); ?>
											<span class="archive-permalink"><a href="<?php the_permalink();?>">&raquo; <?php _e('Read the rest of this entry','twcm'); ?> ...</a></span>

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

						<h2 class="center"><?php _e('Not found.','twcm'); ?></h2>
						<p class="center"><?php _e("Sorry, but you are looking for something that isn't here.",'twcm'); ?></p>

<?php endif; ?>

					</div>
				</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>