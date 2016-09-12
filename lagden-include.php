<?php
/*
Plugin Name: Lagden Include
Plugin URI:  http://lagden.in
Description: Short code to inject content into page
Version:     2.0.0
Author:      Thiago Lagden
Author URI:  http://lagden.in
License:     MIT
License URI: https://opensource.org/licenses/MIT
*/

function lagden_in_shortcode($atts) {
	$_atts = shortcode_atts(['src' => false], $atts);
	if ($_atts['src']) {
		$content = @file_get_contents(ABSPATH . "{$_atts['src']}");
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
