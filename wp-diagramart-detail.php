<?php
/*
Plugin Name: DiagramArt Detail
Plugin URI: https://github.com/
Description: DiagramArt Detail widget
Author: DiagramArt
Author URI: https://diagramart.com/
Text Domain: diagramart-detail
Version: 1.0.0
*/

define( 'WPDAD_PLUGIN', __FILE__ );

function htmlCode($id) {
  return "<div id=\"diagramart-detail\"></div><script>document.addEventListener(\"DOMContentLoaded\", function() {DiagramArtDetail({selector:'diagramart-detail', id:$id});});</script>";
}

function dad_shortcode($atts) {
  $params = shortcode_atts(
    array(
      'id' => 0,
    ), $atts );

  $id = (int) $params['id'];
	return htmlCode($id);
}

function register_shortcodes(){
   add_shortcode( 'diagramart-detail', 'dad_shortcode' );
}

add_action( 'init', 'register_shortcodes');

function wpdal_plugin_url( $path = '' ) {
	$url = plugins_url( $path, WPDAD_PLUGIN );

	if ( is_ssl() && 'http:' == substr( $url, 0, 5 ) ) {
		$url = 'https:' . substr( $url, 5 );
	}

	return $url;
}

function wpdal_do_enqueue_scripts() {
	wpdal_enqueue_scripts();
	wpdal_enqueue_styles();
}

function wpdal_enqueue_scripts() {
	wp_enqueue_script( 'diagramart-detail', wpdal_plugin_url( 'includes/js/diagramart.js' ));
	do_action( 'wpdal_enqueue_scripts' );
}

function wpdal_enqueue_styles() {
	wp_enqueue_style( 'diagramart-detail', wpdal_plugin_url( 'includes/css/diagramart.css' ));
	do_action( 'wpdal_enqueue_styles' );
}

add_action( 'wp_enqueue_scripts', 'wpdal_do_enqueue_scripts' );
