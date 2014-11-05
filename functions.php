<?php
defined('ABSPATH') or die("No script kiddies please!");


function dexsa_setup()
{

register_nav_menus( array(
		'primary'   => __( 'Top primary menu', 'dexsa' ),
		'secondary' => __( 'Secondary menu in left sidebar', 'dexsa' ),
	) );
	
add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );


$args = array(
	'width'         => 1000,
	'height'        => 150,
	'default-image' => get_template_directory_uri() . '/img/header.jpg',
);
add_theme_support( 'custom-header', $args );

add_theme_support( 'custom-background', apply_filters( 'twentyfourteen_custom_background_args', array(
		'default-color' => 'f5f5f5',
	) ) );

	


}
add_action( 'after_setup_theme', 'dexsa_setup' );

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

/* dexa custom search form */
function dexsa_search_form()
{

$form = '<form role="search" method="get" id="searchform" class="navbar-form navbar-right" action="' . home_url( '/' ) . '" >
	<div class="form-group">
	<input type="text" class="form-control" placeholder="'. __( 'Search For' ) .'" value="' . get_search_query() . '" name="s" id="s" />
	</div>
	<button class="btn btn-default" type="submit">
    <i class="glyphicon glyphicon-search"></i></button>
	</form>';

	return $form;


}
add_filter( 'get_search_form', 'dexsa_search_form' );

/* dexa custom search form */
/* dexsa widget */

function dexsa_widget()
{

register_sidebar( array(
		'name'          => __( 'Primary Sidebar', 'dexsa' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Main sidebar that appears on the right.', 'dexsa' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );



}
add_action( 'widgets_init', 'dexsa_widget' );
/* end dexsa widget */
