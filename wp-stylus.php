<?php
/*
  Plugin Name: WP Stylus by Se7enSky
  Plugin URI: http://github.com/Se7enSky/wp-stylus
  Description: Wordpress plugin adding Stylus support. Rendering is done using free Se7enSky SAAS Render service using standart fresh Node.js Stylus.
  Tags: stylus, css, stylesheet
  Author: Se7enSky studio
  Author URI: http://github.com/Se7enSky
  Version: 1.2
  License: The MIT License
  License file: LICENSE
 */

namespace se7ensky\stylus;

function pipeRender($url, $source) {
	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $source);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	$output = curl_exec($ch);

	curl_close($ch);
	return $output;
}

function handleImports($source, $originalFile) {
	return preg_replace_callback('/@import\s+\'(?<import>.*)\'/', function($a) use ($originalFile) {
		return file_get_contents(dirname($originalFile) . '/' . $a['import'] . '.styl');
	}, $source);
}

function stylus2css($source) {
	return pipeRender('http://render.se7ensky.com/stylus', $source);
}

function host() {
	$uri = $_SERVER['REQUEST_URI'];
	if (preg_match('/^(.*)\.css$/', $uri, $matches)) {
		$name = $matches[1];
		$srcFile = __DIR__ . '/../../..' . $name . '.styl';
		$cachedFile = __DIR__ . '/cache' . $uri;
		if (file_exists($srcFile)) {
			if (!file_exists($cachedFile) || filemtime($cachedFile) < filemtime($srcFile)) {
				@mkdir(dirname($cachedFile), 0770, true);
				$source = file_get_contents($srcFile);
				$source = handleImports($source, $srcFile);
				$compiled = stylus2css($source);
				file_put_contents($cachedFile, $compiled);
			}
			header("Content-Type: text/css");
			readfile($cachedFile);
			die; // stop further request handling
		}
	}
}

add_filter('init', 'se7ensky\\stylus\\host');