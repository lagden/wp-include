<?php
/*
Plugin Name: Lagden Include
Plugin URI:  http://lagden.in
Description: Short code to inject html or text content into page
Version:     1.0.0
Author:      Thiago Lagden
Author URI:  http://lagden.in
License:     MIT
License URI: https://opensource.org/licenses/MIT
*/

function lagden_in_shortcode($atts) {
	$_atts = shortcode_atts(['src' => false], $atts);
	if ($_atts['src']) {
		$file = ABSPATH . "{$_atts['src']}";
		if (file_exists($file)) {
			$mime = mime_content_type($file);
			if ($mime === 'text/plain' || $mime === 'text/html') {
				return file_get_contents($file);
			}
			return "lagden-in - Invalid MIME Type: {$_atts['src']}";
		}
		return "lagden-in - File not found: {$_atts['src']}";
	}
	return "lagden-in - Missing src";
}

function lagden_in_register_shortcode() {
	add_shortcode('lagden-in', 'lagden_in_shortcode');
}

add_action('init', 'lagden_in_register_shortcode');
