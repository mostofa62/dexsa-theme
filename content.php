<!--single post-->
<?php if ( is_single() ) : ?>

<div class="panel panel-warning">
  
  <div class="panel-heading">
    <h2 class="panel-title"><?php the_title(); ?></h2>
  </div>
  
  <div class="panel-body">
   <?php the_content(); ?>
  </div>
  
  
  
 </div>
<?php else: ?>

<!--search -->
<?php if ( is_search() ) :  ?>
<h1>
<a class="btn btn-success" href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>  
</h1>
<p class="alert-warning">
<?php the_excerpt(); ?>
</p>
<?php elseif(is_page()): ?>

<div class="panel panel-warning">
  
  <div class="panel-heading">
    <h2 class="panel-title"><?php the_title(); ?></h2>
  </div>
  
  <div class="panel-body">
   <?php the_content(); ?>
  </div>
  
  
  
 </div>



<?php else: ?>
<div class="jumbotron">
<div class="row">

<div class="col-md-7 column">
<h2><?php the_title(); ?></h2>
<blockquote>
<p class="text-muted"><?php the_excerpt(); ?></p>
</blockquote>
<p><a class="btn btn-success btn-lg" href="<?php the_permalink(); ?>" role="button">More...</a></p>
</div>

<div class="col-md-5 column">
<?php if ( has_post_thumbnail() && ! post_password_required() && ! is_attachment() ) : ?>
<?php the_post_thumbnail('medium', array( 'class' => 'img-responsive','style'=>'border:5px solid #fff;' ) ); ?>
<?php endif; ?>
</div>

</div>
</div>
<?php  endif; ?>
<!--end search-->

<? endif; ?>
<!--end single post-->

