<?php
if ( function_exists('register_sidebar') )
	register_sidebar(array(
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h3 class="widgettitle">',
        'after_title' => '</h3>',
    ));

function getAvatarComments($no_comments = 8, $before = '<li> ', $after = '</li>', $show_pass_post = false) {

	global $wpdb, $tablecomments, $tableposts;
	$request = "SELECT ID, comment_ID, comment_author, comment_author_email FROM $tableposts, $tablecomments WHERE $tableposts.ID=$tablecomments.comment_post_ID AND (post_status = 'publish' OR post_status = 'static') AND comment_type = ''";

if(!$show_pass_post) { $request .= "AND post_password ='' "; }

    $request .= "AND comment_approved = '1' ORDER BY $tablecomments.comment_date DESC LIMIT 

$no_comments";
    $comments = $wpdb->get_results($request);
    $output = '';
    foreach ($comments as $comment) {
       $comment_author = stripslashes($comment->comment_author);
       $comment_author_email = stripslashes($comment->comment_author_email);
       $permalink = get_permalink($comment->ID)."#comment-".$comment->comment_ID;
       $output .= $before . '<a href="' . $permalink . '" title="' . $comment_author . '">' . get_avatar( $comment, 32, get_bloginfo('template_directory') . '/images/avatar.png' ) . '</a>' . $after;
       }
       return $output;
}

function widget_avatarComments($args) {
	extract($args);

	$title = 'Latest Comments';
		
	echo $before_widget . $before_title . $title . $after_title . '<ul>' . getAvatarComments() . '</ul>' . $after_widget;
}

function getPopularPosts() {
	global $wpdb;
	//$now = gmdate("Y-m-d H:i:s",time());
	//$lastmonth = gmdate("Y-m-d H:i:s",gmmktime(date("H"), date("i"), date("s"), date("m")-1,date("d"),date("Y")));
	//$popularposts = "SELECT ID, post_title, COUNT($wpdb->comments.comment_post_ID) AS 'stammy' FROM $wpdb->posts, $wpdb->comments WHERE comment_approved = '1' AND $wpdb->posts.ID=$wpdb->comments.comment_post_ID AND post_status = 'publish' AND post_date < '$now' AND post_date > '$lastmonth' AND comment_status = 'open' GROUP BY $wpdb->comments.comment_post_ID ORDER BY stammy DESC LIMIT 10";
	$popularposts = "SELECT ID, post_title, COUNT($wpdb->comments.comment_post_ID) AS 'stammy' FROM $wpdb->posts, $wpdb->comments WHERE comment_approved = '1' AND $wpdb->posts.ID=$wpdb->comments.comment_post_ID AND post_status = 'publish' AND comment_status = 'open' GROUP BY $wpdb->comments.comment_post_ID ORDER BY stammy DESC LIMIT 10";
	$posts = $wpdb->get_results($popularposts);
	$popular = '';
	if($posts){
		foreach($posts as $post){
			$post_title = stripslashes($post->post_title);
			$guid = get_permalink($post->ID);
			$popular .= '<li><a href="'.$guid.'" title="'.$post_title.'">'.$post_title.'</a></li>';
		}
	}
	return $popular;
}

function widget_popularPosts($args) {
	extract($args);

	$title = 'Popular Posts';
		
	echo $before_widget . $before_title . $title . $after_title . '<ul>' . getPopularPosts() . '</ul>' . $after_widget;
}

register_sidebar_widget('Latest Comments', 'widget_avatarComments');
register_sidebar_widget('Popular Posts', 'widget_popularPosts');

?>
