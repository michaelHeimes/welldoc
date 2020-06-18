<?php
/*
Template Name: Getting Started
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
			<?php
				if ( function_exists('yoast_breadcrumb') ) {
					yoast_breadcrumb('<div class="breadcrumbs">','</div>');
				}
			?>
			<?php if ( $heading = $banner['heading'] ) : ?>
			<h1><?php echo $heading; ?></h1>
			<?php endif; ?>
			<?php if ( $subheading = $banner['subheading'] ) : ?>
			<p><?php echo $subheading; ?></p>
			<?php endif; ?>
		</div>
	</div>
	<div class="sub-cat full">
		<div class="container">
			<?php wp_nav_menu( array( 'menu' => 'Getting Started', 'menu_class' => '', 'menu_id' => '', 'container' => '' ) ); ?>
		</div>
	</div>
	<?php $outcomes = get_field('outcomes'); ?>
	<?php $background_image = $outcomes['background_image']; ?>
	<?php $style = $background_image ? 'background-image: url(' . $background_image['url'] . ');' : ''; ?>
	<div class="healt-cost" style="<?php echo $style; ?>">
		<div class="container">
			<div class="text">
				<?php if ( $heading = $outcomes['heading'] ) : ?>
				<h2><?php echo $heading; ?></h2>
				<?php endif; ?>
				<section>
					<?php $items = $outcomes['items']; ?>
					<?php foreach ( $items as $item ) : ?>
					<article>
						<?php if ( $image = $item['image'] ) : ?>
						<div class="ico">
							<img alt="<?php echo $image['alt']; ?>" src="<?php echo $image['url']; ?>">
						</div>
						<?php endif; ?>
						<?php if ( $text = $item['text'] ) : ?>
						<p><?php echo $text; ?></p>
						<?php endif; ?>
					</article>
					<?php endforeach; ?>
				</section>
				<?php $button_text = $outcomes['button_text']; ?>
				<?php $button_url = $outcomes['button_url']; ?>
				<?php if ( $button_text && $button_url ) : ?>
				<a class="btn btn-outline blue" href="<?php echo $button_url; ?>"><?php echo $button_text; ?></a>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<?php $steps = get_field('steps'); ?>
	<div class="steps-row">
		<div class="container">
			<?php if ( $heading = $steps['heading'] ) : ?>
			<h2><?php echo $heading; ?></h2>
			<?php endif; ?>
			<ul>
				<?php $images = $steps['images']; ?>
				<?php foreach ( $images as $item ) : ?>
				<?php if ( $image = $item['image'] ) : ?>
				<li>
					<img alt="<?php echo $image['alt']; ?>" src="<?php echo $image['sizes']['step_image']; ?>" srcset="<?php echo $image['sizes']['step_image_2x']; ?> 2x">
				</li>
				<?php endif; ?>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>
	
	<?php $request = get_field('request'); ?>
	<?php $video_embed = $request['video_embed']; ?>
	<?php $video_image = $request['video_image']; ?>
	<div class="demo-request <?php echo ( $video_embed && $video_image ) ? 'right' : ''; ?> custom">
		<div class="container">
			<div class="text">
				<?php if ( $heading = $request['heading'] ) : ?>
				<h2><?php echo $heading; ?></h2>
				<?php endif; ?>
				<?php if ( $content = $request['content'] ) : ?>
				<?php echo $content; ?>
				<?php endif; ?>
			</div>
			<div class="cols">
				<div class="form">
					<?php if ( $form_heading = $request['form_heading'] ) : ?>
					<h2 class="title"><?php echo $form_heading; ?></h2>
					<?php endif; ?>
					<?php if ( $form_embed = $request['form_embed'] ) : ?>
					<?php echo do_shortcode($form_embed); ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<?php if ( $video_embed && $video_image ) : ?>
		<div class="video">
			<a class="play" data-fancybox="" href="<?php echo $video_embed; ?>">
				<img alt="<?php echo $video_image['alt']; ?>" src="<?php echo $video_image['url']; ?>">
			</a>
		</div>
		<?php endif; ?>
	</div>
</div>

<?php get_footer(); ?>