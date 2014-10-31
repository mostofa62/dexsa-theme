<?php
defined('ABSPATH') or die("No script kiddies please!");
?>
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->

<head>

<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php wp_title( '|', true, 'right' ); ?></title>		
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5shiv.js"></script>
<![endif]-->
<?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>

<div class="container">
	<!--Logo and Banner Part -->
	<div class="row clearfix">
		<div class="col-md-2 column">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" style="margin:0;">
		<img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/114.png" width="135" height="135" alt="">
		</a>
		</div>
		<div class="col-md-10 column">
		<img class="img-responsive" src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="">
		</div>
	</div>	
	<!--End Logo and Banner Part-->
	<!--Nav Bar-->
	
	<div class="row clearfix">
		<div class="col-md-12 column">
		<nav class="navbar navbar-default" role="navigation">
		<!--collapse button-->
		<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> 
		<span class="sr-only">Toggle navigation</span>
		<span class="icon-bar"></span><span class="icon-bar">
		</span><span class="icon-bar"></span>
		</button> 
		<a class="navbar-brand" href=" <?php echo esc_url( home_url( '/' ) ); ?> "><?php bloginfo( 'name' ); ?></a>
		</div>

		<!--end collapse button-->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">		
		<?php 
		
		 $defaults = array(
			'theme_location'  => 'primary',
			'menu'            => '',
			'container'       => '',
			'container_class' => '',
			'container_id'    => '',
			'menu_class'      => 'nav navbar-nav navbar-left',
			'menu_id'         => 'bs-example-navbar-collapse-1',
			'echo'            => true,
			'fallback_cb'     => 'wp_page_menu',
			'before'          => '',
			'after'           => '',
			'link_before'     => '',
			'link_after'      => '',
			'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
			'depth'           => 0,
			'walker'          => ''
		);
		wp_nav_menu( $defaults );
		
		get_search_form();
				
		 ?>
        </div>
         		 
		</nav>
		</div>		
	</div>	
	
	<!--end Nav Bar -->
</div>


