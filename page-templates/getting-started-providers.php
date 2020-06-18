<?php
/*
Template Name: Getting Started - Providers
Template Post Type: page
*/
?>
<?php get_header(); ?>

<div class="body">

	<?php if ( have_rows('content_modules') ) : ?>
	<?php $cid = 0 ?>
	<?php while ( have_rows('content_modules') ) : ?> 
	<?php the_row(); ?>
	
	<?php if ( get_row_layout() == 'banner' ) : ?>
	<?php $hide_border = get_sub_field('hide_border'); ?>
	<div class="page-head big landing <?php echo $hide_border ? '' : 'border'; ?>">
		<?php if ( $background_image = get_sub_field('background_image') ) : ?>
		<div class="bg" style="background-image: url(<?php echo $background_image['url']; ?>);"></div>
		<?php endif; ?>
		<div class="container">
			<div class="text">
				<?php $color = get_sub_field('color'); ?>
				<?php if ( $heading = get_sub_field('heading') ) : ?>
				<h1 class="<?php echo ( $color == 'Blue' ) ? 'blue' : ''; ?>"><?php echo $heading; ?></h1>
				<?php endif; ?>
				<?php if ( $content = get_sub_field('content') ) : ?>
				<div class="<?php echo ( $color == 'Blue' ) ? 'black' : ''; ?>">
					<?php echo $content; ?>
				</div>
				<?php endif; ?>
				<?php $button_text = get_sub_field('button_text'); ?>
				<?php $button_url = get_sub_field('button_url'); ?>
				<?php if ( $button_text && $button_url ) : ?>
				<a class="btn btn-white" href="<?php echo $button_url; ?>"><?php echo $button_text; ?></a>
				<?php endif; ?>
			</div>
			<?php if ( $logo_image = get_sub_field('logo_image') ) : ?>
			<div class="logo-text">
				<img src="<?php echo $logo_image['url']; ?>" alt="<?php echo $logo_image['alt']; ?>" />
			</div>
			<?php endif; ?>
		</div>
	</div>
	<?php endif; ?>
	
	<?php if ( get_row_layout() == 'assitance_bar' ) : ?>
	<div class="assistant-bar">
		<div class="container">
			<?php if ( $text = get_sub_field('text') ) : ?>
			<p><?php echo $text; ?></p>
			<?php endif; ?>
			<?php $button_text = get_sub_field('button_text'); ?>
			<?php $button_url = get_sub_field('button_url'); ?>
			<?php if ( $button_text && $button_url ) : ?>
			<a href="<?php echo $button_url; ?>" class="btn btn-blue"><?php echo $button_text; ?></a>
			<?php endif; ?>
		</div>
	</div>
	<?php endif; ?>
	
	<?php if ( get_row_layout() == 'content_image' ) : ?>
	<?php $image_alignment = get_sub_field('image_alignment'); ?>
	<div class="landing-text">
		<div class="container <?php echo ( $image_alignment == 'Right' ) ? 'reverse' : ''; ?>">
			<div class="text">
				<?php if ( $heading = get_sub_field('heading') ) : ?>
				<h2><?php echo $heading; ?></h2>
				<?php endif; ?>
				<?php if ( $content = get_sub_field('content') ) : ?>
				<?php echo $content; ?>
				<?php endif; ?>
				<?php $button_text = get_sub_field('button_text'); ?>
				<?php $button_url = get_sub_field('button_url'); ?>
				<?php if ( $button_text && $button_url ) : ?>
				<a href="<?php echo $button_url; ?>" class="btn btn-blue"><?php echo $button_text; ?></a>
				<?php endif; ?>
			</div>
			<?php if ( $image = get_sub_field('image') ) : ?>
			<div class="image">
				<img src="<?php echo $image['sizes']['landing_thumb']; ?>" srcset="<?php echo $image['sizes']['landing_thumb_2x']; ?> 2x" alt="<?php echo $image['alt']; ?>" />
			</div>
			<?php endif; ?>
		</div>
	</div>
	<?php endif; ?>

	<?php if ( get_row_layout() == 'content_grid' ) : ?>
	<div class="landing-connected">
		<div class="container">
			<?php if ( $heading = get_sub_field('heading') ) : ?>
			<h2><?php echo $heading; ?></h2>
			<?php endif; ?>
			<section>
				<?php while ( has_sub_field('items') ) : ?>
				<article>
					<?php if ( $title = get_sub_field('title') ) : ?>
					<h3><?php echo $title; ?></h3>
					<?php endif; ?>
					<?php if ( $content = get_sub_field('content') ) : ?>
					<?php echo $content; ?>
					<?php endif; ?>
				</article>
				<?php endwhile; ?>
			</section>
		</div>
	</div>
	<?php endif; ?>
	
	<?php if ( get_row_layout() == 'quote_info' ) : ?>
	<div class="landing-quote">
		<div class="container">
			<?php $quote_text = get_sub_field('quote_text'); ?>
			<?php $quote_author = get_sub_field('quote_author'); ?>
			<div class="quote">
				<blockquote>
					<p><?php echo $quote_text; ?></p>
					<cite>-<?php echo $quote_author; ?></cite>
				</blockquote>
			</div>
			
			<div class="text">
				<?php if ( $heading = get_sub_field('heading') ) : ?>
				<h2><?php echo $heading; ?></h2>
				<?php endif; ?>
				<?php if ( $content = get_sub_field('content') ) : ?>
				<?php echo $content; ?>
				<?php endif; ?>
				<div class="cols">
					<ul>
						<?php while ( has_sub_field('list') ) : ?>
						<?php if ( $item = get_sub_field('item') ) : ?>
						<li>
							<?php if ( $icon = get_sub_field('icon') ) : ?>
							<img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>" />
							<?php endif; ?>
							<?php echo $item; ?>
						</li>
						<?php endif; ?>
						<?php endwhile; ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>
	
	<?php if ( get_row_layout() == 'video' ) : ?>
	<div class="video-bar">
		<?php if ( $video_background = get_sub_field('video_background') ) : ?>
		<div class="bg" style="background-image: url(<?php echo $video_background['url']; ?>);"></div>
		<?php endif; ?>
		<div class="text">
			<blockquote>
				<?php if ( $quote_text = get_sub_field('quote_text') ) : ?>
				<p><?php echo $quote_text; ?></p>
				<?php endif; ?>
				<?php if ( $quote_author = get_sub_field('quote_author') ) : ?>
				<cite><?php echo $quote_author; ?></cite>
				<?php endif; ?>
				<?php if ( $video_embed = get_sub_field('video_embed') ) : ?>
				<a href="<?php echo $video_embed; ?>" data-fancybox class="playico"><i class="fa fa-play-circle" aria-hidden="true"></i></a>
				<?php endif; ?>
			</blockquote>
		</div>
	</div>
	<?php endif; ?>
	
	<?php if ( get_row_layout() == 'instructions' ) : ?>
	<div class="begin-journey">
		<div class="container">
			<div class="text">
				<?php if ( $heading = get_sub_field('heading') ) : ?>
				<h2><?php echo $heading; ?></h2>
				<?php endif; ?>
				<?php if ( $content = get_sub_field('content') ) : ?>
				<?php echo $content; ?>
				<?php endif; ?>
			</div>
			<div class="boxes">
				<div class="box">
					<?php if ( $left_box = get_sub_field('left_box') ) : ?>
					<?php echo $left_box; ?>
					<?php endif; ?>
					<?php if ( $app_store_url = get_sub_field('app_store_url') ) : ?>
					<a href="<?php echo $app_store_url; ?>"><img src="<?php echo get_template_directory_uri( ); ?>/images/apps.png" srcset="<?php echo get_template_directory_uri( ); ?>/images/apps@2x.png 2x" alt="App Store" /></a>
					<?php endif; ?>
					<?php if ( $google_play_url = get_sub_field('google_play_url') ) : ?>
					<a href="<?php echo $google_play_url; ?>"><img src="<?php echo get_template_directory_uri( ); ?>/images/gp.png" srcset="<?php echo get_template_directory_uri( ); ?>/images/gp@2x.png 2x" alt="Google Play" /></a>
					<?php endif; ?>
				</div>
				<div class="box">
					<?php if ( $right_box = get_sub_field('right_box') ) : ?>
					<?php echo $right_box; ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>
	
	<?php if ( get_row_layout() == 'contact_info' ) : ?>
	<div class="bottom-cta">
		<div class="container">
			<div class="text">
				<?php if ( $heading = get_sub_field('heading') ) : ?>
				<h2><?php echo $heading; ?></h2>
				<?php endif; ?>
				<?php if ( $content = get_sub_field('content') ) : ?>
				<?php echo $content; ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<?php endif; ?>
	
	<?php endwhile; ?>
	<?php endif; ?>
	
	
	<div class="sub-cat full">
		<div class="container">
			<ul>
				<li><a href="#">For Employers</a></li>
				<li><a href="#">Health Plans</a></li>
				<li><a href="#">Providers</a></li>
			</ul>
		</div>
	</div>
	
	
	
	
	<div class="image-text-section image-on-right no-padding">
		<div class="image-half" style="background-color: #016ecd;">
			<div><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/provider-img-1.png" alt=""  srcset="<?php echo get_stylesheet_directory_uri(); ?>/images/provider-img-1@2x.png 2x"  /></div>
		</div>
		<div class="text-half" style="background-color: #016ecd;">
			<div>
				<h2 style="color:#fff;">Clinically proven to support patients and drive real outcomes.</h2>
				<span class="download-links">
					<a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/APPSTOREBadge.png" alt="" srcset="<?php echo get_stylesheet_directory_uri(); ?>/images/APPSTOREBadge@2x.png 2x"/></a>
					<a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/google-play-badge.png" alt="" srcset="<?php echo get_stylesheet_directory_uri(); ?>/images/google-play-badge@2x.png 2x"/></a>
				</span>
			</div>
		</div>
	</div>
	
	
	
	<div class="image-text-section">
		<div class="image-half top-bottom-padding" style="background-color: #23242a;">
			<div><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/provider-img-2.jpg" alt="" srcset="<?php echo get_stylesheet_directory_uri(); ?>/images/provider-img-2@2x.jpg 2x" /></div>
		</div>
		<div class="text-half">
			<div>
				<h2>35+ peer-reviewed publications & posters prove BlueStar works.</h2>
				<a class="btn btn-blue" href="#">Read our Posters and Publications</a>
			</div>
		</div>
	</div>
	
	
	<div class="image-text-section image-on-right">
		<div class="image-half" style="background-color: #92e0fa;">
			<div><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/provider-img-3.png" alt="" srcset="<?php echo get_stylesheet_directory_uri(); ?>/images/provider-img-3@2x.png 2x" /></div>
		</div>
		<div class="text-half">
			<div>
				<h2>Clinical decision support when it counts.</h2>
				<p>BlueStar's tailored insights foster long-term, healthy behaviors. Easily connects members with their existing care team to create meaningful discussions and pathways to treatment optimization.</p>
			</div>
		</div>
	</div>
	
	
	<div class="watch-video" style="background-image:url('<?php echo get_stylesheet_directory_uri(); ?>/images/watch-video-thumb.png')">
		<div class="container">
			<h3>“With BlueStar, I got my life back.”</h3>
			<p>Candy Barnes started using BlueStar in April, 2017. With the help of BlueStar, she lost over 70 pounds and experienced a 5.8 point A1C Reduction. </p>
			<a href="#" class="btn blue-btn">Watch the Video</a>
		</div>
	</div>
	
	
	<div class="image-text-section image-on-right">
		<div class="image-half top-bottom-padding" style="background-color: #f7f7f7;">
			<div><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/image-1.png" alt="" srcset="<?php echo get_stylesheet_directory_uri(); ?>/images/image-1@2x.png 2x" /></div>
		</div>
		<div class="text-half" style="background-color:#f7f7f7;">
			<div>
				<h2>BlueStar helps shift your care model. </h2>
				<p>With BlueStar, we're shifting the care model. Expanding from traditional care to a digital therapeutic with advanced coaching, clinically-validated outcomes, that supports a member's care team. </p>
			</div>
		</div>
	</div>
	

	
	<div class="our-team">
		<div class="our-team-img">
			<div style="background-image:url(<?php echo get_stylesheet_directory_uri(); ?>/images/team-left-img.jpg);">

			</div>
		</div>
		<div class="our-team-text">
			<div>
				<h2>Our Team is Ready to Assist Implementation.</h2>
				<p>Our unique, consultative approach ensures you’re supported and consulted with best practices for implementation. </p>
				
				<ul>
					<li>
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/our-team-icon1.png" alt="" />
						<p>Our implementation leads help you choose a plan we are confident will succeed.</p>
					</li>
					<li>
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/our-team-icon2.png" alt="" />
						<p>Our clinical experts ensure you have science to back up your decision.</p>
					</li>
					<li>
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/our-team-icon3.png" alt="" />
						<p>Our marketing team develops a plan to engage your unique employees at the right time.</p>
					</li>
					<li>
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/our-team-icon4.png" alt="" />
						<p>Our data scientists build models to forecast  ROI and engagement.</p>
					</li>
				</ul>
			</div>
		</div>
	</div>	
	
	
	<div class="request-a-demo">
		<div class="container">
			<div class="demo-left">
				<h4>Request a Demo</h4>
				<div class="demo-form">
					<?php echo do_shortcode('[gravityform id="5" title="false" description="false" ajax="true"]'); ?>
				</div>
			</div>
			<div class="demo-right">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/bluestar-center_iphone.png" alt="" srcset="<?php echo get_stylesheet_directory_uri(); ?>/images/bluestar-center_iphone@2x.png 2x" />
			</div>
		</div>
	</div>
	
	
	
	
	
</div>

<?php get_footer(); ?>