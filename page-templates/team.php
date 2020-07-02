<?php
/*
Template Name: Team
Template Post Type: page
*/
?>
<?php get_header(); ?>

<div class="body">
	<div class="page-head">
		<div class="bg non-retina" style="background-color: #016ECD;"></div>
		<div class="bg retina" style="background-color: #016ECD;"></div>
		<div class="grid-container container">
			<div class="grid-x grid-padding-x">
				
<!--
			<?php
				if ( function_exists('yoast_breadcrumb') ) {
					yoast_breadcrumb('<div class="breadcrumbs cell small-12">','</div>');
				}
			?>
-->
			<h1 class="cell small-12"><?php the_title(); ?></h1>
			
			</div>
		</div>
		
	</div>
	
	<div class="sub-cat">
		<div class="grid-container container">
			<div class="grid-x grid-padding-x align-middle">
			
			<?php wp_nav_menu( array( 'menu' => 'Team Menu', 'menu_class' => 'cell auto', 'menu_id' => '', 'container' => '', 'depth' => 0 ) ); ?>
			

			<div class="cell shrink">
				<div class="search-r">
					<div class="trigger"><i class="fa fa-search" aria-hidden="true"></i></div>
					<div class="form">
						<form method="get" action="<?php bloginfo('url'); ?>/">
							<input placeholder="search" name="s" type="text">
							<button type="submit"><i aria-hidden="true" class="fa fa-search"></i></button>
						</form>
					</div>
				</div>
			</div>
			
			</div>
		</div>
	</div>
	
	<div class="team-row">
		<div class="grid-container container">
			
			<?php if ( have_rows('content_modules') ) : ?>
			<?php while ( have_rows('content_modules') ) : ?>
			<?php the_row(); ?>
			<?php if ( get_row_layout() == 'columns_2' ) : ?>
			<?php if ( $heading = get_sub_field('heading') ) : ?>
			<h2 class="title"><?php echo $heading; ?></h2>
			<?php endif; ?>
			
			<div class="content">
				<?php while ( have_posts() ) : the_post(); ?>
				<?php the_content(); ?>
				<?php endwhile; ?>
			</div>
			
			<section class="team-list">
				<?php $team = get_sub_field('team'); ?>
				<?php foreach ( $team as $item ) : ?>
				<article>
					<?php if ( has_post_thumbnail($item->ID) ) : ?>
					<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id($item->ID), 'team_thumb', true ); ?>
					<?php $img = $src[0]; ?>
					<?php $src_2x = wp_get_attachment_image_src( get_post_thumbnail_id($item->ID), 'team_thumb_2x', true ); ?>
					<?php $img_2x = $src_2x[0]; ?>
					<div class="image">
						<a href="<?php echo get_permalink($item->ID); ?>">
							<img alt="<?php echo $item->post_title; ?>" src="<?php echo $img; ?>" srcset="<?php echo $img_2x; ?> 2x">
						</a>
					</div>
					<?php endif; ?>
					<div class="text">
						<h3><a href="<?php echo get_permalink($item->ID); ?>"><?php echo $item->post_title; ?></a></h3>
						<?php if ( $title_position = get_field( 'title_position', $item->ID ) ) : ?>
						<h4><?php echo $title_position; ?></h4>
						<?php endif; ?>
						<?php if ( $linkedin_url = get_field( 'linkedin_url', $item->ID ) ) : ?>
						<a href="<?php echo $linkedin_url; ?>" target="_blank"><i aria-hidden="true" class="fa fa-linkedin-square"></i></a>
						<?php endif; ?>
						<a class="more" href="<?php echo get_permalink($item->ID); ?>">Read Bio <i aria-hidden="true" class="fa fa-arrow-right"></i></a>
					</div>
				</article>
				<?php endforeach; ?>
			</section>
			<?php endif; ?>
			<?php if ( get_row_layout() == 'columns_4' ) : ?>
			<?php if ( $heading = get_sub_field('heading') ) : ?>
			<h2 class="title"><?php echo $heading; ?></h2>
			<?php endif; ?>
			<section class="staff-list">
				<?php $team = get_sub_field('team'); ?>
				<?php foreach ( $team as $item ) : ?>
				<article>
					<?php if ( has_post_thumbnail($item->ID) ) : ?>
					<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id($item->ID), 'team_thumb', true ); ?>
					<?php $img = $src[0]; ?>
					<?php $src_2x = wp_get_attachment_image_src( get_post_thumbnail_id($item->ID), 'team_thumb_2x', true ); ?>
					<?php $img_2x = $src_2x[0]; ?>
					<div class="image">
						<img alt="<?php echo $item->post_title; ?>" src="<?php echo $img; ?>" srcset="<?php echo $img_2x; ?> 2x">
					</div>
					<?php endif; ?>
					<div class="text">
						<h3><?php echo $item->post_title; ?></h3>
						<?php if ( $title_position = get_field( 'title_position', $item->ID ) ) : ?>
						<p><?php echo $title_position; ?></p>
						<?php endif; ?>
					</div>
				</article>
				<?php endforeach; ?>
			</section>
			<?php endif; ?>
			<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>