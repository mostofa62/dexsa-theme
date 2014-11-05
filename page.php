<?php
defined('ABSPATH') or die("No script kiddies please!");
get_header();
?>
<div class="container">
	<div class="row clearfix">
    
    <div class="col-md-10 column">
    <?php while ( have_posts() ) : the_post(); ?>
    
    
	<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
	<?php the_post_thumbnail(); ?>
    <?php endif; ?>
    
	<?php the_content(); ?>
    
    <?php comments_template(); ?>
    
    
    
    
    <?php endwhile; ?>
    </div>
    <?php get_sidebar(); ?>
    
    
    </div>
</div>
<?php
get_footer();
?>    