<?php
/**
 * Template Name: Dexsa Home Page
 *
 * @package WordPress
 * @subpackage Dexsa
 * @since Dexsa 1.0
 */
defined('ABSPATH') or die("No script kiddies please!");
get_header();
?>
<div class="container">
    <!--slide-->
    <div class="row clearfix" style="margin-top:-20px; padding-bottom:10px;">
    <div class="col-md-12 column">
    <?php do_action('insert_bootstrapslider'); ?>
    
    </div>
    </div>
    <!--end slider-->
	<div class="row clearfix">
	<!--content side-->
	<div class="col-md-9 column">    
    
    <?php $the_query = new WP_Query( 'category_name=home&posts_per_page=3' ); ?>
	
    <?php if($the_query->have_posts() ): ?>
    
    <div class="row">
    
    <?php while ( $the_query->have_posts() ) :  $the_query->the_post(); ?>
	
	<div class="col-md-4">
    <div class="thumbnail">
	<?php if ( has_post_thumbnail() && ! post_password_required() && ! is_attachment() ) : ?>
    <?php the_post_thumbnail('medium', array( 'class' => 'img-responsive','style'=>'border:5px solid #fff;' ) ); ?>
    <?php else: ?>
    <img alt="300x200" src="http://lorempixel.com/600/200/people" />
	<?php endif; ?>
    
    <div class="caption">
    <h3>
	<?php the_title(); ?>
	</h3>
    <p>
	<?php the_excerpt(); ?>
	</p>
    <p>
	<a class="btn btn-success btn-lg" href="<?php the_permalink(); ?>" role="button">More...</a>
	</p>            
    </div>
    
    </div>
    </div>
    				
	<?php endwhile; ?>
    </div>
    <?php else: ?>
    
    <?php get_template_part( 'content', 'none' ); ?>
    
    <?php endif; ?>
    
	</div>
	<!--end content side-->
	<?php get_sidebar(); ?>
	</div>
</div>
<?php
get_footer();
?>