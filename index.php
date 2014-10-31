<?php
defined('ABSPATH') or die("No script kiddies please!");
get_header();
?>
<div class="container">
	<div class="row clearfix">
	<!--content side-->
	<div class="col-md-10 column">
	Content
	</div>
	<!--end content side-->
	<?php get_sidebar(); ?>
	</div>
</div>
<?php
get_footer();
?>