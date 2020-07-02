<?php
/*
Template Name: Contributors
*/
?>
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
	<div class="team-row">
		<div class="container">
		
			<section class="team-list">
				<?php $users = get_users(array('exclude' => array(1,2))); ?>
				<?php if ( count($users) ) : ?>
				<?php foreach ( $users as $user ) : ?>
				<?php $args = array( 'post_type' => 'any', 'author' => $user->ID ); ?>
				<?php $my_query = new WP_Query( $args ); ?>
				<?php $my_count = $my_query->post_count; ?>
				<?php if ( $my_count ) : ?>
				<article>
					<div class="image">
						<a href="<?php echo get_author_posts_url($user->ID); ?>"><?php echo get_avatar( $user->ID, 115 ); ?></a>
					</div>
					<div class="text">
						<h3><a href="<?php echo get_author_posts_url($user->ID); ?>"><?php echo $user->display_name; ?></a></h3>
					</div>
				</article>
				<?php endif; ?>
				<?php endforeach; ?>
				<?php endif; ?>
			</section>
			
		</div>
	</div>
</div>

<?php get_footer(); ?>