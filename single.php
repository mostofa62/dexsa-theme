<?php
defined('ABSPATH') or die("No script kiddies please!");
get_header();
?>


<div class="container">
	<div class="row clearfix">
	<!--content side-->
	<div class="col-md-9 column">
    
    <?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', get_post_format() ); ?>
				<?php //twentythirteen_post_nav(); ?>
				<?php comments_template(); ?>

			<?php endwhile; ?>
    
    
    </div>
    <?php get_sidebar(); ?>
    </div>

</div>
<?php
get_footer();
?>