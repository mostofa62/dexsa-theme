<?php
defined('ABSPATH') or die("No script kiddies please!");


/* all css and java-script */
function dexsa_script()
{
wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css' );
wp_enqueue_style( 'styles', get_template_directory_uri() . '/css/style.css' );

//wp_register_script( 'jquery-min', get_template_directory_uri() . '/js/jquery.min.js' );
wp_register_script( 'bootstrap-min', get_template_directory_uri() . '/js/bootstrap.min.js',array('jquery'),false,true );
wp_register_script( 'scripts', get_template_directory_uri() . '/js/scripts.js',array(),false,true );

wp_enqueue_script( 'bootstrap-min' );
wp_enqueue_script( 'scripts' );

}

add_action( 'wp_enqueue_scripts', 'dexsa_script' );
/* end all css and java-script */

function register_dexsa_menu() {
  register_nav_menu('header-menu',__( 'Header Menu' ));
}
add_action( 'init', 'register_dexsa_menu' );