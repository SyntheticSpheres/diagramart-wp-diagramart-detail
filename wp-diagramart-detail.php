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

function wpdad_html_code($id) {
  return "<div id=\"diagramart-detail\"></div><script>document.addEventListener(\"DOMContentLoaded\", function() {DiagramArtDetail({selector:'diagramart-detail', id:$id});});</script>";
}

function wpdad_shortcode($atts) {
  $params = shortcode_atts(
    array(
      'id' => 0,
    ), $atts );

  $id = (int) $params['id'];
	return wpdad_html_code($id);
}

function register_shortcodes(){
   add_shortcode( 'diagramart-detail', 'wpdad_shortcode' );
}

add_action( 'init', 'register_shortcodes');

function wpdad_do_enqueue_scripts() {
	wpdad_enqueue_scripts();
	wpdad_enqueue_styles();
}

function wpdad_enqueue_scripts() {
  wp_enqueue_script( 'diagramart-detail', plugins_url( 'includes/js/diagramart.js', __FILE__ ) );
	do_action( 'wpdad_enqueue_scripts' );
}

function wpdad_enqueue_styles() {
  wp_enqueue_style( 'diagramart-detail', plugins_url( 'includes/css/diagramart.css', __FILE__ ) );
	do_action( 'wpdad_enqueue_styles' );
}

add_action( 'wp_enqueue_scripts', 'wpdad_do_enqueue_scripts' );
