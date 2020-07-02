<?php
/*
Template Name: About
Template Post Type: page
*/
?>
<?php get_header(); ?>

<div class="body">
	<?php $banner = get_field('banner'); ?>
	<div class="page-head big">
		<?php if ( $background_image = $banner['background_image'] ) : ?>
		<div class="bg non-retina" style="background-image: url(<?php echo $background_image['sizes']['banner_image']; ?>);"></div>
		<div class="bg retina" style="background-image: url(<?php echo $background_image['sizes']['banner_image_2x']; ?>);"></div>
		<?php endif; ?>
		<div class="container">
<!--
			<?php
				if ( function_exists('yoast_breadcrumb') ) {
					yoast_breadcrumb('<div class="breadcrumbs">','</div>');
				}
			?>
-->
			<?php if ( $heading = $banner['heading'] ) : ?>
			<h1><?php echo $heading; ?></h1>
			<?php endif; ?>
			<?php if ( $subheading = $banner['subheading'] ) : ?>
			<p><?php echo $subheading; ?></p>
			<?php endif; ?>
			<?php $menu_items = $banner['menu_items']; ?>
			<ul class="fast-links">
				<?php foreach ( $menu_items as $item ) : ?>
				<?php $item_text = $item['item_text']; ?>
				<?php $item_url = $item['item_url']; ?>
				<?php if ( $item_text && $item_url ) : ?>
				<li>
					<a href="<?php echo $item_url; ?>"><?php echo $item_text; ?> <i aria-hidden="true" class="fa fa-chevron-right"></i></a>
				</li>
				<?php endif; ?>
				<?php endforeach; ?>
			</ul>
			<div class="mobile-only">
				<a class="btn btn-white" href="<?php bloginfo('url'); ?>/our-team/">Meet the team</a>
			</div>
		</div>
	</div>
	<?php $about = get_field('about'); ?>
	<div class="about-row">
		<div class="container">
			<?php if ( $left_text = $about['left_text'] ) : ?>
			<div class="text-l">
				<div class="text-circle">
					<div class="text">
						<?php echo $left_text; ?>
					</div>
				</div>
			</div>
			<?php endif; ?>
			<div class="text-r">
				<div class="entry">
					<?php if ( $right_heading = $about['right_heading'] ) : ?>
					<h2 class="title"><?php echo $right_heading; ?></h2>
					<?php endif; ?>
					<?php if ( $first_right_text = $about['first_right_text'] ) : ?>
					<?php echo $first_right_text; ?>
					<?php endif; ?>
					<?php if ( $icon = $about['icon'] ) : ?>
					<img class="alignleft" src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>">
					<?php endif; ?>
					<?php if ( $second_right_text = $about['second_right_text'] ) : ?>
					<?php echo $second_right_text; ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
	
	<?php if ( $full_width_text = get_field('full_width_text') ) : ?>
	<div class="blue-line">
		<div class="container">
			<?php if ( $heading = $full_width_text['heading'] ) : ?>
			<h2 class="title"><?php echo $heading; ?></h2>
			<?php endif; ?>
			
			<div class="how-line">
				<div class="container">
					<?php if ( $how_heading = $full_width_text['how_heading'] ) : ?>
					<h2 class="title">How?</h2>
					<?php endif; ?>
					<?php if ( $how_content = $full_width_text['how_content'] ) : ?>
					<div class="text">
						<?php echo $how_content; ?>
					</div>
					<?php endif; ?>
				</div>
			</div>
			
		</div>
	</div>
	<?php endif; ?>
	
	<?php if ( $video = get_field('video') ) : ?>
	<div class="full-image">
		<div class="container">
			<?php if ( $heading = $video['heading'] ) : ?>
			<h2 class="title"><?php echo $heading; ?></h2>
			<?php endif; ?>
			<?php $video_url = $video['video_url']; ?>
			<?php $video_image = $video['video_image']; ?>
			<?php if ( $video_url && $video_image ) : ?>
			<a class="play" data-fancybox="" href="<?php echo $video_url; ?>">
				<img alt="<?php echo $video_image['alt']; ?>" src="<?php echo $video_image['url']; ?>">
			</a>
			<?php endif; ?>
		</div>
	</div>
	<?php endif; ?>
	
	<?php /*
	<?php $full_width_text = get_field('full_width_text'); ?>
	<?php if ( $heading = $full_width_text['heading'] ) : ?>
	<div class="blue-line">
		<div class="container">
			<h2 class="title">We have mastered<br>diabetes management</h2>
		</div>
	</div>
	<?php endif; ?>
	<?php $how = get_field('how'); ?>
	<div class="how-line">
		<div class="container">
			<?php if ( $heading = $how['heading'] ) : ?>
			<h2 class="title"><?php echo $heading; ?></h2>
			<?php endif; ?>
			<?php if ( $content = $how['content'] ) : ?>
			<div class="text">
				<?php echo $content; ?>
			</div>
			<?php endif; ?>
		</div>
	</div>
	
	
	<?php $full_width_image = get_field('full_width_image'); ?>
	<div class="full-image">
		<div class="container">
			<?php if ( $heading = $full_width_image['heading'] ) : ?>
			<h2 class="title"><?php echo $heading; ?></h2>
			<?php endif; ?>
			<?php if ( $image = $full_width_image['image'] ) : ?>
			<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
			<?php endif; ?>
		</div>
	</div>
	*/ ?>
	<?php $values = get_field('values'); ?>
	<div class="values-row">
		<div class="container">
			<?php $images = $values['images']; ?>
			<div class="image">
				<ul>
					<?php foreach ( $images as $img ) : ?>
					<?php $image = $img['image']; ?>
					<?php $url = $img['url']; ?>
					<?php if ( $image && $url ) : ?>
					<li>
						<a href="<?php echo $url; ?>"><img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>"></a>
					</li>
					<?php endif; ?>
					<?php endforeach; ?>
				</ul>
			</div>
			<div class="text">
				<?php if ( $values_heading = $values['values_heading'] ) : ?>
				<h2 class="title"><?php echo $values_heading; ?></h2>
				<?php endif; ?>
				<div class="entry">
					<?php $values_items = $values['values']; ?>
					<dl>
						<?php foreach ( $values_items as $item ) : ?>
						<?php if ( $value_title = $item['value_title'] ) : ?>
						<dt><?php echo $value_title; ?></dt>
						<?php endif; ?>
						<?php if ( $value_text = $item['value_text'] ) : ?>
						<dd><?php echo $value_text; ?></dd>
						<?php endif; ?>
						<?php endforeach; ?>
					</dl>
					<?php if ( $job_heading = $values['job_heading'] ) : ?>
					<h2 class="title"><?php echo $job_heading; ?></h2>
					<?php endif; ?>
					<?php if ( $job_text = $values['job_text'] ) : ?>
					<?php echo $job_text; ?>
					<?php endif; ?>
					<?php $job_link_text = $values['job_link_text']; ?>
					<?php $job_link_url = $values['job_link_url']; ?>
					<?php if ( $job_link_text && $job_link_url ) : ?>
					<p><a class="more" href="<?php echo $job_link_url; ?>"><?php echo $job_link_text; ?> <i aria-hidden="true" class="fa fa-arrow-right"></i></a></p>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>