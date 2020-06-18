<?php
/*
Template Name: Home
Template Post Type: page
*/
?>
<?php get_header(); ?>

<div class="body">
	<?php $banner = get_field('banner'); ?>
	<div class="page-head big">
		<?php if ( $background_image = $banner['background_image'] ) : ?>
		<div class="bg non-retina" style="background-image: url(<?php echo $background_image['url']; ?>);"></div>
		<div class="bg retina" style="background-image: url(<?php echo $background_image['url']; ?>);"></div>
		<?php endif; ?>
		
		<?php if ( $video_file = $banner['video_file'] ) : ?>
		<div class="bg">
			<video autoplay="" loop="" muted="" playsinline=""><source src="<?php echo $video_file['url']; ?>" type="video/mp4"></video>
		</div>
		<?php endif; ?>
		<div class="container">
			<div class="text">
				<?php if ( $heading = $banner['heading'] ) : ?>
				<h1><?php echo $heading; ?></h1>
				<?php endif; ?>
				<?php if ( $subheading = $banner['subheading'] ) : ?>
				<p><?php echo $subheading; ?></p>
				<?php endif; ?>
				<?php $button_text = $banner['button_text']; ?>
				<?php $button_url = $banner['button_url']; ?>
				<?php if ( $button_text && $button_url ) : ?>
				<a class="btn btn-blue" href="<?php echo $button_url; ?>"><?php echo $button_text; ?></a>
				<?php endif; ?>
			</div>
		</div>
		<?php $flyout_text = $banner['flyout_text']; ?>
		<?php $flyout_icon = $banner['flyout_icon']; ?>
		<?php $flyout_img = $banner['flyout_img']; ?>
		<?php if ( $flyout_text ) : ?>
		<div class="head-flyout">
			<div class="box-flyout">
				<?php if ( $flyout_img ) : ?>
				<div class="flayout-img">
					<img src="<?php echo $flyout_img['url'] ?>" alt="<?php echo $flyout_img['alt']; ?>" />
				</div>
				<?php endif; ?>
				<?php if ( $flyout_icon ) : ?>
				<div class="flayout-icon">
					<img src="<?php echo $flyout_icon['url'] ?>" alt="<?php echo $flyout_icon['alt']; ?>" />
				</div>
				<?php endif; ?>
				<p><?php echo $flyout_text; ?></p>
			</div>
		</div>
		<?php endif; ?>
	</div>
	
	<?php $partners = get_field('partners'); ?>
	<div class="truster-row">
		<div class="container">
			<?php if ( $heading = $partners['heading'] ) : ?>
			<h3><?php echo $heading; ?></h3>
			<?php endif; ?>
			<?php $items = $partners['items']; ?>
			<ul>
				<?php foreach ( $items as $item ) : ?>
				<?php if ( $image = $item['image'] ) : ?>
				<li><img src="<?php echo $image['sizes']['partners_image']; ?>" srcset="<?php echo $image['sizes']['partners_image_2x']; ?> 2x" alt="<?php echo $image['alt']; ?>"></li>
				<?php endif; ?>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>
	
	<?php $solutions = get_field('solutions'); ?>
	<div class="solutions-row">
		<div class="container">
			<?php if ( $heading = $solutions['heading'] ) : ?>
			<h2 class="title"><?php echo $heading; ?></h2>
			<?php endif; ?>
			<?php if ( $subheading = $solutions['subheading'] ) : ?>
			<p><?php echo $subheading; ?></p>
			<?php endif; ?>
			<?php $button_text = $solutions['button_text']; ?>
			<?php $button_url = $solutions['button_url']; ?>
			<?php if ( $button_text && $button_url ) : ?>
			<a class="btn btn-outline" href="<?php echo $button_url; ?>"><?php echo $button_text; ?></a>
			<?php endif; ?>
			
			<?php $items = $solutions['items']; ?>
			<section class="active-1">
				<?php $pi = array( 2, 1, 3 ); ?>
				<?php $i = 0; ?>
				<?php foreach ( $items as $item ) : ?>
				<article class="<?php echo ( $i == 1 ) ? 'slick-center middle' : ''; ?>">
					<a class="all" href="#<?php echo $pi[$i]; ?>"></a>
					<div class="inside">
						<?php if ( $title = $item['title'] ) : ?>
						<h4><?php echo $title; ?></h4>
						<?php endif; ?>
						<?php if ( $subtitle = $item['subtitle'] ) : ?>
						<h3><?php echo $subtitle; ?></h3>
						<?php endif; ?>
						<?php if ( $small_text = $item['small_text'] ) : ?>
						<?php echo $small_text; ?>
						<?php endif; ?>
						<?php if ( $image = $item['image'] ) : ?>
						<div class="image">
							<img alt="<?php echo $image['sizes']['alt']; ?>" src="<?php echo $image['sizes']['solutions_image']; ?>" srcset="<?php echo $image['sizes']['solutions_image_2x']; ?> 2x">
						</div>
						<?php endif; ?>
					</div>
				</article>
				<?php $i++; ?>
				<?php endforeach; ?>
			</section>
		</div>
	</div>
	
	<?php $data = get_field('data'); ?>
	<div class="scores-row">
		<div class="container">
			<?php if ( $heading = $data['heading'] ) : ?>
			<h2 class="title"><?php echo $heading; ?></h2>
			<?php endif; ?>
			<?php if ( $subheading = $data['subheading'] ) : ?>
			<p><?php echo $subheading; ?></p>
			<?php endif; ?>
			<?php $button_text = $data['button_text']; ?>
			<?php $button_url = $data['button_url']; ?>
			<?php if ( $button_text && $button_url ) : ?>
			<a class="btn btn-outline white" href="<?php echo $button_url; ?>"><?php echo $button_text; ?></a>
			<?php endif; ?>
			
			<?php $items = $data['items']; ?>
			<div class="scores-numbers">
				<?php foreach ( $items as $item ) : ?>
				<div class="score-n-item">
					<?php if ( $image = $item['image'] ) : ?>
					<div class="ico">
						<img alt="<?php echo $image['alt']; ?>" src="<?php echo $image['url']; ?>">
					</div>
					<?php endif; ?>
					<?php if ( $value = $item['value'] ) : ?>
					<div class="digit">
						<?php echo $value; ?>
					</div>
					<?php endif; ?>
					<?php if ( $label = $item['label'] ) : ?>
					<div class="label">
						<?php echo $label; ?>
					</div>
					<?php endif; ?>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
	
	
	<div class="video-section">
		<div class="container">
			<h2>“With BlueStar, I got My Life Back”</h2>
			<div class="video">
				<img src="<?php bloginfo('template_directory'); ?>/images/video-placeholder.png" alt=""/>
				<a class="playbtn" data-fancybox href="https://vimeo.com/245960134"></a>
			</div>
		</div>
	</div>
	
	
	<?php $more = get_field('more'); ?>
	<div class="more-about-row">
		<div class="container">
			<?php if ( $heading = $more['heading'] ) : ?>
			<h2 class="title"><?php echo $heading; ?></h2>
			<?php endif; ?>
			<?php $items = $more['items']; ?>
			<div class="feats-list">
				<section>
					<?php for ( $i = 0; $i < 2; $i++ ) : ?>
					<?php $item = $items[$i]; ?>
					<?php if ( !empty($item) ) : ?>
					<?php $image = $item['image']; ?>
					<?php $term = $item['term']; ?>
					<?php $title = $item['title']; ?>
					<?php $link_text = $item['link_text']; ?>
					<?php $link_url = $item['link_url']; ?>
					<article>
						<a href="<?php echo $link_url; ?>">
							<?php if ( $image ) : ?>
							<div class="image">
								<img alt="<?php echo $image['alt']; ?>" src="<?php echo $image['sizes']['more_image_one']; ?>">
							</div>
							<?php endif; ?>
							<div class="text">
								<?php if ( $term ) : ?>
								<h4><?php echo $term; ?></h4>
								<?php endif; ?>
								<?php if ( $title ) : ?>
								<h3><?php echo $title; ?></h3>
								<?php endif; ?>
								<?php if ( $link_text ) : ?>
								<span class="more"><?php echo $link_text; ?> <i aria-hidden="true" class="fa fa-arrow-right"></i></span>
								<?php endif; ?>
							</div>
						</a>
					</article>
					<?php endif; ?>
					<?php endfor; ?>
				</section>
			</div>
			<div class="press-list">
				<section>
					<?php for ( $i = 2; $i < 6; $i++ ) : ?>
					<?php $item = $items[$i]; ?>
					<?php if ( !empty($item) ) : ?>
					<?php $image = $item['image']; ?>
					<?php $term = $item['term']; ?>
					<?php $title = $item['title']; ?>
					<?php $link_text = $item['link_text']; ?>
					<?php $link_url = $item['link_url']; ?>
					<article>
						<a href="<?php echo $link_url; ?>">
							<?php if ( $image ) : ?>
							<div class="image">
								<img alt="<?php echo $image['alt']; ?>" src="<?php echo $image['sizes']['more_image_two']; ?>" srcset="<?php echo $image['sizes']['more_image_two_2x']; ?> 2x">
							</div>
							<?php endif; ?>
							<?php if ( $term ) : ?>
							<h4><?php echo $term; ?></h4>
							<?php endif; ?>
							<?php if ( $title ) : ?>
							<h3><?php echo $title; ?></h3>
							<?php endif; ?>
							<?php if ( $link_text ) : ?>
							<span class="more"><?php echo $link_text; ?> <i aria-hidden="true" class="fa fa-arrow-right"></i></span>
							<?php endif; ?>
						</a>
					</article>
					<?php endif; ?>
					<?php endfor; ?>
				</section>
			</div>
		</div>
	</div>

	
	<?php if ( $footnote_content = get_field('footnote_content') ) : ?>
	<div class="grey-text">
		<div class="container">
			<div class="entry">
				<?php echo $footnote_content; ?>
			</div>
		</div>
	</div>
	<?php endif; ?>
</div>

<?php get_footer(); ?>