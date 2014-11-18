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

if( empty( $instance['category'] ) || ! $category = absint( $instance['category'] ) )
$category='';

$r = new WP_Query( apply_filters( 'widget_posts_args', array( 'posts_per_page' => $number, 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true ,'category__in' => $category) ) );


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


function form($instance) {
	
	
	if( $instance) {
		$title = esc_attr($instance['title']);
		$number = esc_attr($instance['number']);
		$category=esc_attr($instance['category']);
		
	} else {
		$title = '';
		$number = '';
		$category='';
	}
	?>
		<p>
		<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'dexsa'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
		</p>
		<p>
		<label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of Posts:', 'dexsa'); ?></label>		
		<select id="<?php echo $this->get_field_id('number'); ?>"  name="<?php echo $this->get_field_name('number'); ?>">
			<?php for($x=1;$x<=10;$x++): ?>
			<option <?php echo $x == $number ? 'selected="selected"' : '';?> value="<?php echo $x;?>"><?php echo $x; ?></option>
			<?php endfor;?>
		</select>
		</p>
        <p>
		<label for="<?php echo $this->get_field_id('category'); ?>"><?php _e('Select Post Category:', 'dexsa'); ?></label>
        <?php //wp_dropdown_categories( 'show_count=1&hierarchical=1' );
		wp_dropdown_categories(
		array(
		//'show_option_all'=>' ',
		'show_option_none'=>'None',
		'show_count'=>1,
		'hierarchical'=>1,
		'id'=>$this->get_field_id('category'),
		'name'=>$this->get_field_name('category'),
		'class'=>'widefat',
		'selected'=>$category		
		));
		 ?>
        </p>
        		 
	<?php
	}


function update($new_instance, $old_instance) {
      $instance = $old_instance;
	      
	      $instance['title'] = strip_tags($new_instance['title']);
	      $instance['number'] = strip_tags($new_instance['number']);
	      $instance['category'] = strip_tags($new_instance['category']);
	     return $instance;
}





}
