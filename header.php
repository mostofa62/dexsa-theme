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
		Logo
		</div>
		<div class="col-md-10 column">
		Banner
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
		<a class="navbar-brand" href="#">Brand</a>
		</div>

		<!--end collapse button-->	
		<?php 
		  
		 $defaults = array(
			'theme_location'  => '',
			'menu'            => '',
			'container'       => 'div',
			'container_class' => 'collapse navbar-collapse',
			'container_id'    => '',
			'menu_class'      => 'nav navbar-nav',
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
		
		 ?>		
		</nav>
		</div>		
	</div>	
	
	<!--end Nav Bar -->
</div>


