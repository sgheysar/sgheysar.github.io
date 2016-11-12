<form id="searchform" method="get" action="<?php echo home_url(); ?>/">
<input type="text" value="<?php _e('جستجو'); ?>" onfocus="if (this.value == '<?php _e('جستجو'); ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php _e('جستجو'); ?>';}" size="35" maxlength="50" name="s" id="s" />
<input type="submit" id="searchsubmit" value="<?php _e('SEARCH','zbench'); ?>" />
</form>