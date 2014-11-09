<?php
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
	
    <?php if( have_posts() ): ?>
    
    <?php while ( have_posts() ) : the_post(); ?>
	
	<?php get_template_part( 'content', get_post_format() ); ?>
    				
	<?php endwhile; ?>
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