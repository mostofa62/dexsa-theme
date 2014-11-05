<?php
defined('ABSPATH') or die("No script kiddies please!");
?>

<div class="col-md-3 column">
<div class="sidebar">
<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
<?php dynamic_sidebar( 'sidebar-1' ); ?>
<?php endif; ?>
</div>
</div>