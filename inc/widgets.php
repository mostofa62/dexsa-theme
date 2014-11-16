<?php


class Dexsa_Recent_Post_widget extends WP_Widget_Recent_Posts {
	

public function __construct() {
		parent::__construct( 'dexsa_recent_post_widget', __( 'Dexsa Recent Posts', 'dexsa' ), array(
			'classname'   => 'dexsa_recent_post_widget',
			'description' => __( 'Use Dexsa Recent Post .', 'dexsa' ),
		) );
}



	
function widget($args, $instance) {
	
extract( $args );

$title = apply_filters('widget_title', empty($instance['title']) ? __('Recent Posts') : $instance['title'], $instance, $this->id_base);


if( empty( $instance['number'] ) || ! $number = absint( $instance['number'] ) )
$number = 10;

$r = new WP_Query( apply_filters( 'widget_posts_args', array( 'posts_per_page' => $number, 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true ) ) );


if( $r->have_posts() ) :
echo $before_widget;
if( $title ) echo $before_title . $title . $after_title; ?>
<div class="list-group">
<?php while( $r->have_posts() ) : $r->the_post(); ?>
<a href="<?php the_permalink(); ?>" class="list-group-item">
<div style="width:23%; background-color:#639; color:#FFC; text-align:center; padding:5px 5px;">
<p class="list-group-item-text" style="font-size:16px; font-weight:900;"><?php the_time( 'd'); ?></p>
<p class="list-group-item-text" style="font-size:12px; font-weight:700;"><?php the_time( 'M'); ?></p>
<p class="list-group-item-text" style="font-size:10px; font-weight:600;"><?php the_time( 'Y'); ?></p>
</div>
<div style="position:relative; top:-43px; left:28%;width:73%;">
<h4 class="list-group-item-heading"><?php the_title(); ?></h4>
</div>
</a>
<?php endwhile; ?>
</div>
<?php
echo $after_widget;
wp_reset_postdata();
endif;


}


}
