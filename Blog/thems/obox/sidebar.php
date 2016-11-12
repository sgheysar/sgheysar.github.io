<div id="sidebar">


<?php

$today = current_time('mysql', 1);

if ( $recentposts = $wpdb->get_results("SELECT ID, post_title FROM $wpdb->posts WHERE post_status = 'publish' AND post_date_gmt < '$today' ORDER BY post_date DESC LIMIT 10")):

?>




<div id="box">

<?php if ( !function_exists('dynamic_sidebar')
        || !dynamic_sidebar() ) : ?>

				



<?php endif; ?>

<h2>دسته بندی</h2>

<ul>

<?php wp_list_cats('sort_column=name&hierarchical=0'); ?>

</ul>
<h2>پیوندها</h2>

<ul>

<?php get_links(-1, '<li>', '</li>', '', FALSE, 'name', FALSE, FALSE, -1, FALSE); ?>

</ul> 


 <h2>بایگانی ماهانه</h2>

<ul>

<?php if (function_exists('wp_get_jarchives')) { ?>
<?php wp_get_jarchives('type=monthly'); ?>
<?php } else { ?>
<?php wp_get_archives('type=monthly'); ?>
<?php } ?>
</ul>

<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(1) ) : else : ?>
<?php endif; ?>


 

<h2>متا</h2>

<ul>

<li><a href="<?php bloginfo('rss2_url'); ?>" title="<?php _e('Syndicate this site using RSS'); ?>"><?php _e('<abbr title="Really Simple Syndication">RSS</abbr>'); ?></a></li>

<li><a href="<?php bloginfo('comments_rss2_url'); ?>" title="<?php _e('The latest comments to all posts in RSS'); ?>"><?php _e('Comments <abbr title="Really Simple Syndication">RSS</abbr>','bird'); ?></a></li>

<li><a href="http://validator.w3.org/check/referer" title="<?php _e('This page validates as XHTML 1.0 Transitional'); ?>"><?php _e('Valid <abbr title="eXtensible HyperText Markup Language">XHTML</abbr>','bird'); ?></a></li>

<li><a href="http://gmpg.org/xfn/"><abbr title="XHTML Friends Network">XFN</abbr></a></li>

<?php wp_meta(); ?>

</ul>

<?php endif; ?>

</div>

<div id="sidebar-foot"></div>

</div>