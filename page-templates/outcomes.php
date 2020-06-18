<?php
/*
Template Name: Outcomes
*/
?>
<?php get_header(); ?>

<div class="body">
	<?php $banner = get_field('banner'); ?>
	<div class="page-head big mh">
		<?php if ( $background_image = $banner['background_image'] ) : ?>
		<div class="bg non-retina" style="background-image: url(<?php echo $background_image['sizes']['banner_image']; ?>);"></div>
		<div class="bg retina" style="background-image: url(<?php echo $background_image['sizes']['banner_image_2x']; ?>);"></div>
		<?php endif; ?>
		<div class="container">
			<div class="text">
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
	</div>
	<?php $smart = get_field('smart_section'); ?>
	<div class="smart-row">
		<div class="container">
			<?php if ( $icon = $smart['icon'] ) : ?>
			<div class="ico">
				<img alt="<?php echo $icon['alt']; ?>" src="<?php echo $icon['url']; ?>">
			</div>
			<?php endif; ?>
			<?php if ( $heading = $smart['heading'] ) : ?>
			<h2 class="title"><?php echo $heading; ?></h2>
			<?php endif; ?>
			<?php if ( $subheading = $smart['subheading'] ) : ?>
			<p><?php echo $subheading; ?></p>
			<?php endif; ?>
		</div>
	</div>
	<?php $graph = get_field('graph_section'); ?>
	<div class="graph-row">
		<div class="container">
			<?php if ( $heading = $graph['heading'] ) : ?>
			<h2 class="title"><?php echo $heading; ?></h2>
			<?php endif; ?>
			<?php if ( $subheading = $graph['subheading'] ) : ?>
			<p><?php echo $subheading; ?></p>
			<?php endif; ?>
		</div>
		<div class="graph-h">
			<div class="container">
				<h4>Average A1C on BlueStar</h4>
				<div class="legend"><img alt="" src="<?php bloginfo('template_directory'); ?>/images/legend.svg"></div>
				<div class="graph">
				<div class="results-over">
					<div class="head-r">
						<div class="image"><a href="https://eorder.sheridan.com/3_0/app/orders/6700/files/assets/basic-html/toc.html" target="_blank"><img alt="" src="<?php bloginfo('template_directory'); ?>/images/mean.png" srcset="<?php bloginfo('template_directory'); ?>/images/mean@2x.png 2x"></a></div>
						<div class="improve">
							<div class="digits">
								1.9<span class="down"></span><span class="per">%</span>
							</div>
							<div class="tt">
								<h5>A1C Improvement <sup>1</sup></h5>
								<p>With BlueStar</p>
							</div>
						</div>
						<div class="improve">
							<div class="digits grey">
								0.7<span class="down"></span><span class="per">%</span>
							</div>
							<div class="tt">
								<h5>A1C Improvement</h5>
								<p>Usual Care</p>
							</div>
						</div>
					</div>
				</div><img alt="" src="<?php bloginfo('template_directory'); ?>/images/graph.svg"></div>
			</div>
		</div>
	</div>
	<?php $testimonial = get_field('testimonial'); ?>
	<div class="quote-row">
		<div class="container">
			<?php $video_image = $testimonial['video_image']; ?>
			<?php $video_url = $testimonial['video_url']; ?>
			<?php if ( $video_image && $video_url ) : ?>
			<div class="video">
				<a class="play" data-fancybox="" href="<?php echo $video_url; ?>">
					<img alt="<?php echo $video_image['alt']; ?>" src="<?php echo $video_image['url']; ?>">
				</a>
			</div>
			<?php endif; ?>
			<div class="text">
				<blockquote>
					<?php if ( $testimonial_content = $testimonial['testimonial_content'] ) : ?>
					<?php echo $testimonial_content; ?>
					<?php endif; ?>
					<cite>
						<?php if ( $author_name = $testimonial['testimonial_author_name'] ) : ?>
						<strong><?php echo $author_name; ?></strong><br>
						<?php endif; ?>
						<?php if ( $author_position = $testimonial['testimonial_author_position'] ) : ?>
						<span><?php echo $author_position; ?></span>
						<?php endif; ?>
					</cite>
				</blockquote>
			</div>
		</div>
	</div>
	
	<?php $recommended = get_field('recommended'); ?>
	<div id="recommended" class="section-recommended">
		<div class="container">
			<div class="box">
				<?php if ( $image = $recommended['image'] ) : ?>
				<div class="box-image">
					<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
				</div>
				<?php endif; ?>
				<div class="box-text">
					<?php if ( $heading = $recommended['heading'] ) : ?>
					<h3><?php echo $heading; ?></h3>
					<?php endif; ?>
					<?php if ( $subheading = $recommended['subheading'] ) : ?>
					<?php echo $subheading; ?>
					<?php endif; ?>
				</div>
				<?php if ( $form_embed = $recommended['form_embed'] ) : ?>
				<div class="box-form">
					<?php echo do_shortcode($form_embed); ?>
				</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
	
	<?php $publications = get_field('publications'); ?>
	<div class="reviews-row">
		<div class="head-reviews">
			<div class="container">
				<?php if ( $heading = $publications['heading'] ) : ?>
				<h2 class="title"><?php echo $heading; ?></h2>
				<?php endif; ?>
				<?php if ( $subheading = $publications['subheading'] ) : ?>
				<h4><?php echo $subheading; ?></h4>
				<?php endif; ?>
				<section class="featured-reviews">
					<?php $items = $publications['items']; ?>
					<?php foreach ( $items as $item ) : ?>
					<article>
						<?php $url = $item['url']; ?>
						<?php $new_window = $item['open_link_in_new_window']; ?>
						<a href="<?php echo $url; ?>" <?php if( $new_window): ?>target="_blank"<?php endif; ?>>
							<?php if ( $image = $item['image'] ) : ?>
							<div class="image">
								<img alt="<?php echo $image['alt']; ?>" src="<?php echo $image['url']; ?>">
							</div>
							<?php endif; ?>
							<div class="text">
								<?php if ( $title = $item['title'] ) : ?>
								<h3><?php echo $title; ?></h3>
								<?php endif; ?>
								<?php if ( $subtitle = $item['subtitle'] ) : ?>
								<p><?php echo $subtitle; ?></p>
								<?php endif; ?>
							</div>
						</a>
					</article>
					<?php endforeach; ?>
				</section>
			</div>
		</div>
		<div class="reviews-slider">
			<div class="slides">
			
				<?php $publications = get_field('publications'); ?>

				<div class="container">
					<?php $journals = $publications['journals']; ?>
					<?php foreach ( $journals as $journal ) : ?>
					<?php $image = $journal['image']; ?>
					<?php $label = $journal['label']; ?>
					<?php $title = $journal['title']; ?>
					<?php $link_url = $journal['url']; ?>
					<?php $new_window = $journal['open_link_in_new_window']; ?>
					
					<div class="item">
						<a href="<?php echo $link_url; ?>" <?php if( $new_window): ?>target="_blank"<?php endif; ?>>
							
							<div class="image">
								<?php if ( $image ) : ?>
								<img alt="<?php echo $image['alt']; ?>" src="<?php echo $image['sizes']['review_image']; ?>" srcset="<?php echo $image['sizes']['review_image_2x']; ?> 2x">
								<?php else : ?>
								<img alt="" src="<?php bloginfo('template_url'); ?>/images/thumb-review.png">
								<?php endif; ?>
							</div>
							<div class="text">
								<?php if ( $label)  : ?>
								<h5><?php echo $label; ?></h5>
								<?php endif; ?>
								<?php if ( $title)  : ?>
								<h3><?php echo $title; ?></h3>
								<?php endif; ?>
							</div>
						</a>
					</div>
					<?php endforeach; ?>
				</div>
			</div>
			<div class="container">
				<div class="count">
					<span class="current">1</span>/<?php echo count($journals); ?>
				</div>
			</div>
		</div>
	</div>
	<?php $savings = get_field('savings'); ?>
	<div class="savings-row">
		<div class="container">
			<?php if ( $heading = $savings['heading'] ) : ?>
			<h2 class="title"><?php echo $heading; ?></h2>
			<?php endif; ?>
			<div class="text">
				<div class="entry">
					<?php if ( $subheading = $savings['subheading'] ) : ?>
					<p><?php echo $subheading; ?></p>
					<?php endif; ?>
					
					<?php $link_text = $savings['link_text']; ?>
					<?php $link_url = $savings['link_url']; ?>
					<?php if ( $link_text && $link_url ) : ?>
					<a class="more" href="<?php echo $link_url; ?>"><?php echo $link_text; ?> <i aria-hidden="true" class="fa fa-arrow-right"></i></a>
					<?php endif; ?>
				</div>
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





