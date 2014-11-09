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
	
add_theme_support( 'post-formats', array(
		'aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video'
	) );
	
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 604, 270, true );		


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
	
require get_template_directory() . '/inc/widgets.php';
unregister_widget('WP_Widget_Recent_Posts');
register_widget('Dexsa_Recent_Post_widget');	

register_sidebar( array(
		'name'          => __( 'Primary Sidebar', 'dexsa' ),
		'id'            => 'sidebar-1',		
		'description'   => __( 'Main sidebar that appears on the right.', 'dexsa' ),
		'before_widget' => '<div id="%1$s" class="panel panel-primary">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="panel-heading">',
		'after_title'   => '</div>',
	) );
register_sidebar( array(
		'name'          => __( 'Slider Section', 'dexsa' ),
		'id'            => 'slider-2',
		'description'   => __( 'Slider Under Main Menu.', 'dexsa' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );


}
add_action( 'widgets_init', 'dexsa_widget' );
/* end dexsa widget */
/* register Reuired Plugin */
require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'dexsa_theme_register_required_plugins' );
function dexsa_theme_register_required_plugins() {

    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(

        // This is an example of how to include a plugin pre-packaged with a theme.
        array(
            'name'               => 'twitter-bootstrap-slider', // The plugin name.
            'slug'               => 'twitter-bootstrap-slider', // The plugin slug (typically the folder name).
            'source'             => get_template_directory() . '/vendor/twitter-bootstrap-slider.zip', // The plugin source.
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
            'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher.
            'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            'external_url'       => '', // If set, overrides default API URL and points to an external URL.
        ),

       

    );

    /**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */
    $config = array(
        'default_path' => '',                      // Default absolute path to pre-packaged plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
        'strings'      => array(
            'page_title'                      => __( 'Install Required Plugins', 'tgmpa' ),
            'menu_title'                      => __( 'Install Plugins', 'tgmpa' ),
            'installing'                      => __( 'Installing Plugin: %s', 'tgmpa' ), // %s = plugin name.
            'oops'                            => __( 'Something went wrong with the plugin API.', 'tgmpa' ),
            'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s).
            'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s).
            'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s).
            'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s).
            'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s).
            'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s).
            'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s).
            'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s).
            'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
            'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins' ),
            'return'                          => __( 'Return to Required Plugins Installer', 'tgmpa' ),
            'plugin_activated'                => __( 'Plugin activated successfully.', 'tgmpa' ),
            'complete'                        => __( 'All plugins installed and activated successfully. %s', 'tgmpa' ), // %s = dashboard link.
            'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        )
    );

    tgmpa( $plugins, $config );

}


/* end register required plugin */

