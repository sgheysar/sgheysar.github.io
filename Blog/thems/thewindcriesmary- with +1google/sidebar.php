				<div id="beta">
					<div id="beta-inner" class="pkg">

						<div id="navigation">
								<div class="module-content">
									<ul><?php wp_list_pages('title_li='); ?></ul>
								</div>
						</div>

<ul>

<?php if ( !function_exists('dynamic_sidebar')
        || !dynamic_sidebar() ) : ?>


	<li id="search" class="widget widget_search">
							<h2 class="widgettitle"><?php _e('Search','twcm'); ?></h2>

<?php include (TEMPLATEPATH . '/searchform.php'); ?>

	</li>

	<li id="links" class="widget widget_links">
							<?php wp_list_bookmarks('')?>
	</li>
						

	<li id="categories" class="widget widget_categories">
							<h2 class="widgettitle"><?php _e('Categories','twcm'); ?></h2>
									<ul class="module-list">
										<?php wp_list_cats(); ?>
									</ul>
	</li>


	<li id="archives" class="widget widget_archives">
							<h2 class="widgettitle"><?php _e('Archives','twcm'); ?></h2>
								<div class="module-content">
									<ul class="module-list">
										<?php wp_get_archives('type=monthly'); ?>
									</ul>
								</div>

	</li>

	<li id="categories" class="widget widget_categories">
							<h2 class="widgettitle"><?php _e('Meta','twcm'); ?></h2>
								<div class="module-content">
									<ul class="module-list">
										<?php wp_register(); ?>
										<li><?php wp_loginout(); ?></li>
										<?php wp_meta(); ?>
									</ul>
								</div>
						</li>



<?php endif; ?>


</ul>

	<div id="powered" class="widget widget_powered">
								<div class="module-content">
									<ul class="module-list">
										<li><?php _e('Layout by','twcm'); ?> <br/><a href="http://community.livejournal.com/thefulcrum">grrliz</a></li>
										<li><?php _e('Converted by','twcm'); ?> <br/><a href="http://grabatheme.com/">Grab A Theme</a></li>
										<li><?php _e('Powered by','twcm'); ?> <br/><a href="http://wordspress.org/"><?php _e('WordPress','twcm'); ?></a> <a href="http://wp-persian.com/"><?php _e('wp-persian','twcm'); ?></a></li>
										<li><?php _e('Translated to Farsi by','twcm'); ?> <br/><a href="http://digitalhank.com/"><?php _e('DigitalHank','twcm'); ?></a></li>
									</ul>
								</div>
						</div>
					</div>
				</div>