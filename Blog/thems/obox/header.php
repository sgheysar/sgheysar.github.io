<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?>   <?php } ?> <?php wp_title(); ?></title>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<style type="text/css" media="screen">

</style>

<?php wp_head(); ?>
</head>
<body>

<?php if ( !is_404() ) {?>
<div id="wrapper">
<div id="header">
	<div class="wrapper">
	<h1><?php bloginfo('name'); ?></h1>
		<ul class="menu">
			<li class="<?php if (((is_home()) && !(is_paged())) or (is_archive()) or (is_single()) or (is_paged()) or (is_search())) { ?>current_page_item<?php } else { ?>page_item<?php } ?>"><a href="<?php echo get_settings('home'); ?>/" title="صفحه نخست سایت"><span>صفحه نخست</span></a></li>
			<?php
			$pages = get_pages(); 
			foreach ($pages as $mypage) {				
			?>
			<li<?php if ( is_page($mypage->ID) ){ echo ' class="current_page_item"'; } ?>><a href="<?php echo get_page_link($mypage->ID); ?>"><span><?php echo $mypage->post_title; ?></span></a></li>
			<?php		
			}
			 ?>
		</ul>
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>
	</div>
</div>
<div class="hr"></div>
<div class="wrapper">
<?php }?>

