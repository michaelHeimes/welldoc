<?php get_header(); ?>

<div class="body">
	<div class="page-head">
		<?php if ( $header_image = get_field( 'header_image', 'option' ) ) : ?>
		<div class="bg non-retina" style="background-image: url(<?php echo $header_image['sizes']['banner_image']; ?>);"></div>
		<div class="bg retina" style="background-image: url(<?php echo $header_image['sizes']['banner_image_2x']; ?>);"></div>
		<?php endif; ?>
		<div class="container">
			<?php
				if ( function_exists('yoast_breadcrumb') ) {
					yoast_breadcrumb('<div class="breadcrumbs">','</div>');
				}
			?>
			<?php if ( $header_heading = get_field( 'header_heading', 'option' ) ) : ?>
			<h1><?php echo $header_heading; ?></h1>
			<?php endif; ?>
		</div>
	</div>
	<?php while ( have_posts() ) : the_post(); ?>
	<div class="post-row">
		<div class="container">
			<div class="team-head">
				<?php if ( has_post_thumbnail() ) : ?>
				<?php $title = get_post(get_post_thumbnail_id())->post_title; ?>
				<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id(), 'team_single_thumb', true ); ?>
				<?php $img = $src[0]; ?>
				<?php $src_2x = wp_get_attachment_image_src( get_post_thumbnail_id(), 'team_single_thumb_2x', true ); ?>
				<?php $img_2x = $src_2x[0]; ?>
				<div class="image">
					<img src="<?php echo $img; ?>" srcset="<?php echo $img_2x; ?> 2x" alt="<?php echo $title; ?>" />
				</div>
				<?php endif; ?>
				
				<h2 class="title"><?php the_title(); ?></h2>
				<div class="role">
					<?php if ( $title_position = get_field('title_position') ) : ?>
					<span><?php echo $title_position; ?></span>
					<?php endif; ?>
					<?php if ( $linkedin_url = get_field('linkedin_url') ) : ?>
					<a href="<?php echo $linkedin_url; ?>" target="_blank"><i aria-hidden="true" class="fa fa-linkedin-square"></i></a>
					<?php endif; ?>
				</div>
			</div>
			<div class="entry">
				<?php the_content(); ?>
			</div>
		</div>
	</div>
	<?php endwhile; ?>
</div>

<?php get_footer(); ?>