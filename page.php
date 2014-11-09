<?php
defined('ABSPATH') or die("No script kiddies please!");
get_header();
?>
<div class="container">
	<div class="row clearfix">
    
    <div class="col-md-9 column">
    <?php while ( have_posts() ) : the_post(); ?>
    <?php get_template_part( 'content', get_post_format() ); ?>
    
    <?php //comments_template(); ?>
    
    
    
    
    <?php endwhile; ?>
    </div>
    <?php get_sidebar(); ?>
    
    
    </div>
</div>
<?php
get_footer();
?>    