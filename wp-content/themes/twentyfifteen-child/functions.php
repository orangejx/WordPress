<?php

function replace_source_gravatar($avatar) {
    $gravatar_url   =   rand(1,32).".cdn.kidding.pub/gravatar";
	//~ 替换为 https 的域名
	$avatar = str_replace(array("www.gravatar.com/avatar", "0.gravatar.com/avatar", "1.gravatar.com/avatar", "2.gravatar.com/avatar", "secure.gravatar.com/avatar"), $gravatar_url, $avatar);
	//~ 替换为 https 协议
	$avatar = str_replace("http://", "https://", $avatar);
	return $avatar;
}
add_filter('get_avatar', 'replace_source_gravatar');

function videojs_add_enqueue(){
	$jsdelivr	=	'https://cdn.jsdelivr.net/npm/';
	//引入CSS
	wp_enqueue_style ( 'videojs', $jsdelivr."video.js@7.11.4/dist/video-js.min.css", array(), '7.11.4', 'all');

	// 引入JS
	wp_enqueue_script('videojs', $jsdelivr.'video.js@7.11.4/dist/video.min.js', array(),'7.11.4', false);
}
add_action('wp_enqueue_scripts', 'videojs_add_enqueue');

function httpStreaming_add_enqueue(){
	$jsdelivr	=	'https://cdn.jsdelivr.net/npm/';
	// 引入JS
	wp_enqueue_script('httpStreaming', $jsdelivr.'@videojs/http-streaming@2.8.0/dist/videojs-http-streaming.min.js', array('videojs'),'2.8.0', false);
}
add_action('wp_enqueue_scripts', 'httpStreaming_add_enqueue');

?>