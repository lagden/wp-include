<?php
/*
Plugin Name: Lagden Include
Plugin URI:  http://lagden.in
Description: Short code to inject content into page
Version:     1.0
Author:      Thiago Lagden
Author URI:  http://lagden.in
License:     MIT
License URI: https://opensource.org/licenses/MIT
*/

function lagden_in_shortcode($atts) {
	$regex_url = '/http(s)?:\/\/[(www\.)?a-zA-Z0-9\@\:\%\.\_\+\~\#\=]{2,256}\.[a-z]{2,6}\b([\-a-zA-Z0-9\@\:\%\_\+\.\~\#\?\&\/\/\=]*)/i';
	$_atts = shortcode_atts(['src' => false], $atts);
	if ($_atts['src']) {
		$abs_path = preg_match($regex_url, $_atts['src']) ? '' : ABSPATH;
		$content = @file_get_contents("{$abs_path}{$_atts['src']}");
		if ($content === false) {
			return "File not found: {$_atts['src']}";
		}
		return $content;
	}
	return "";
}

function lagden_in_register_shortcode() {
	add_shortcode('lagden-in', 'lagden_in_shortcode');
}

add_action('init', 'lagden_in_register_shortcode');
