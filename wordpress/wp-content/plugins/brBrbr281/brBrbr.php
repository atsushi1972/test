<?php
/*
Plugin Name:brBrbr
Plugin URI:http://camcam.info/wordpress/101/
Description:Line feed is converted to &lt;br /&gt;.
Version:2.0
Author:CamCam
Author URI:http://camcam.info/
*/

remove_filter('the_content','wpautop');
add_filter('the_content','brBrbr');


remove_filter('comment_text', 'wpautop', 30);
add_filter('comment_text','brBrbr',30);

function brBrbr($brbr) {
	$brbr = str_replace(array("\r\n", "\r"), "\n", $brbr); // cross-platform newlines 
	$brbr = str_replace("\n", "<br />\n", $brbr); // cross-platform newlines 
	$brbr = preg_replace('!(</?(?:table|img|thead|tfoot|caption|tbody|tr|td|th|div|dl|dd|dt|ul|ol|li|pre|select|form|textarea|input|blockquote|address|p|math|script|h[1-6])[^>]*>)\s*<br />!', "$1", $brbr);
	$brbr = preg_replace('|<blockquote([^>]*)>|i', "</p>\n<blockquote$1><p>", $brbr);
	$brbr = str_replace('</blockquote>', "</p></blockquote>\n<p>", $brbr);
	$brbr = preg_replace('/(<pre.*?>)(.*?)<\/pre>/ise', "clr_br('$0')", $brbr);
	$brbr = preg_replace('/(<script.*?>)(.*?)<\/script>/ise', "clr_br('$0')", $brbr);
	$brbr = preg_replace('/(<form.*?>)(.*?)<\/form>/ise', "clr_br('$0')", $brbr);
	$brbr="<p>\n".$brbr."</p>\n";
	return $brbr; 
}


function clr_br($str){
	$str  = str_replace("<br />","",$str);
	$str  = str_replace('\"','"',$str);
	return $str;
}

?>