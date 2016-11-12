									<form method="get" id="searchform" action="<?php echo $_SERVER['PHP_SELF']; ?>">
										<label for="s"><?php _e('Search this blog','twcm'); ?>:</label><br />
										<input type="text" name="s" id="s" value="<?php echo wp_specialchars($s, 1); ?>" size="20" />
										<input type="submit" id="searchsubmit" value="<?php _e('Search','twcm'); ?>" />
									</form>