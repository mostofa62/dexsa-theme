<?php
defined('ABSPATH') or die("No script kiddies please!");
get_header();
?>

<div class="container">
    
    
    
	<div class="row clearfix">
    
    <div class="col-md-9 column">
    
	 <?php if ( have_posts() ) : ?>
     
     <div class="row clearfix">
 		<div class="col-md-12 column">
		<h1 class="page-title alert alert-warning"><?php printf( __( 'Search Results for: %s', 'dexsa' ), get_search_query() ); ?></h1>
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