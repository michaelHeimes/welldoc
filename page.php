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
			<h1><?php the_title(); ?></h1>
		</div>
	</div>

	<?php if ( is_page('about')) : ?>
	<div class="sub-cat">
		<div class="container">
			<?php wp_nav_menu( array( 'menu' => 'Insights Menu', 'menu_class' => '', 'menu_id' => '', 'container' => '' ) ); ?>
			<div class="search-r">
				<div class="trigger"><i class="fa fa-search" aria-hidden="true"></i></div>
				<div class="form">
					<form method="get" action="<?php bloginfo('url'); ?>/">
						<input type="text" name="s" placeholder="search">
						<input type="hidden" name="post_type" value="insights">
						<button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>
	
	<div class="post-row">
		<div class="container">
			<?php while ( have_posts() ) : the_post(); ?>
			<div class="entry">
				<?php the_content(); ?>
			</div>
			<?php endwhile; ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>