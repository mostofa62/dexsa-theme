<?php
defined('ABSPATH') or die("No script kiddies please!");
get_header(); ?>

<div class="container">
    
    
    
	<div class="row clearfix">
    
    <div class="col-md-9 column">
    
    <?php if ( have_posts() ) : ?>
    
    <div class="row clearfix">
 		<div class="col-md-12 column page-header">
		<h1 class="page-title alert alert-warning">
        <?php if ( is_day() ) :
			printf( __( 'Daily Archives: %s', 'desxa' ), get_the_date() );
		elseif ( is_month() ) :
			printf( __( 'Monthly Archives: %s', 'desxa' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'desxa' ) ) );
		elseif ( is_year() ) :
			printf( __( 'Yearly Archives: %s', 'desxa' ), get_the_date( _x( 'Y', 'yearly archives date format', 'desxa' ) ) );
		else :
			_e( 'Archives', 'desxa' );
		endif;
        ?>
        </h1>
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