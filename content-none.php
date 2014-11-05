<div class="row clearfix">
 <div class="col-md-12 column page-header">
	<h1 class="page-title alert alert-warning"><?php _e( 'Nothing Found', 'dexsa' ); ?></h1>
 </div>   
</div>

<div class="row clearfix">
	<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

	<div class="col-md-12 column"><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'dexsa' ), admin_url( 'post-new.php' ) ); ?></div>

	<?php elseif ( is_search() ) : ?>

	<div class="col-md-6 column"><p class="lead"><?php _e( 'Sorry, but nothing matched your search terms. Please try again with different keywords.', 'dexsa' ); ?></p></div>
	<div class="col-md-6 column"><?php get_search_form(); ?></div>

	<?php else : ?>

	<div class="col-md-6 column"><p class="lead"><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'dexsa' ); ?></p></div>
	<div class="col-md-6 column"><?php get_search_form(); ?></div>

	<?php endif; ?>
</div>
