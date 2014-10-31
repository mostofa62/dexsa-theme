<?php
defined('ABSPATH') or die("No script kiddies please!");
?>

<div class="col-md-2 column">
<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
<?php dynamic_sidebar( 'sidebar-1' ); ?>
<?php endif; ?>
</div>