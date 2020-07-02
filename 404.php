<?php get_header(); ?>

<div class="body">
	<div class="page-head">
		<div class="container">
<!--
			<?php
				if ( function_exists('yoast_breadcrumb') ) {
					yoast_breadcrumb('<div class="breadcrumbs">','</div>');
				}
			?>
-->
			<h1><?php _e('Error 404 - Page not found!', 'am') ?></h1>
		</div>
	</div>
	<div class="post-row">
		<div class="container">
			<div class="entry">
				<p><?php _e('The page you trying to reach does not exist, or has been moved. Please use the menus or the search box to find what you are looking for.', 'am') ?></p>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>