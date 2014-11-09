<?php
defined('ABSPATH') or die("No script kiddies please!");
get_header(); ?>

<div class="container">
    
    
    
	<div class="row clearfix">
    
    <div class="col-md-9 column">
    
    
    <?php if ( have_posts() ) : ?>
    		
            
             <div class="row clearfix">
 		<div class="col-md-12 column">
        <div class="alert alert-warning">
		<h1 class="text-capitalize"><?php printf( __( '%s', 'twentythirteen' ), single_cat_title( '', false ) ); ?></h1>
        <?php if ( category_description() ) : // Show an optional category description ?>
				<p class="text-capitalize"><?php echo category_description(); ?></p>
		<?php endif; ?>
        </div>
 		</div>   
	</div>
    		
			
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', get_post_format() ); ?>
			<?php endwhile; ?>
    
    
    <?php else : ?>
	<?php get_template_part( 'content', 'none' ); ?>
	<?php endif; ?>
    
    </div>
    <?php get_sidebar(); ?>    
    </div>
</div>

<?php
get_footer();
?>   