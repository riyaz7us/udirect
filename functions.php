<?php 
//Bootstrap navwalker
require_once('bs4navwalker.php');
register_nav_menu('primaryMenu', 'Primary Menu');
//Wp theme Support
function theme_support() {
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'theme_support');
//Enqueue Bootstrap and stylesheet
function udirect_enqueue_styles() {

  wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css' );
  wp_enqueue_style( 'core', get_stylesheet_uri() );
  //fontawesome
  wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/fontawesome/css/fontawesome-all.min.css' );
  wp_enqueue_style( 'fontawesomepro', get_template_directory_uri() . '/fontawesome/css/all.min.css' );
  wp_enqueue_script( 'fontawesomejs', get_template_directory_uri() . '/fontawesome/js/all.min.js', array( 'jquery' ) );
  wp_enqueue_style( 'animations', get_template_directory_uri() . '/assets/animate.min.css' );
}
add_action( 'wp_enqueue_scripts', 'udirect_enqueue_styles');

function udirect_enqueue_scripts() {
  wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/bootstrap/js/bootstrap.bundle.min.js', array( 'jquery' ) );
}
add_action( 'wp_enqueue_scripts', 'udirect_enqueue_scripts');

function udirect_custom_logo_setup() {
 $defaults = array(
 'height'      => 100,
 'width'       => 400,
 'flex-height' => true,
 'flex-width'  => true,
 );
 add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'udirect_custom_logo_setup' );
wp_enqueue_script("jquery");


