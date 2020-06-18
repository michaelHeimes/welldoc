<?php
/*
Template Name: Product
Template Post Type: page
*/
?>
<?php get_header(); ?>

<div class="body">
	<!-- section 1: header -->
	<div class="page-head big product">
		<?php $image = get_field( 's1_header_image' ) ?>
		<?php if( !empty( $image ) ): ?>
		<?php $featured_image = $image['sizes']['featured_banner_image']; ?>
		<?php $featured_image_2x = $image['sizes']['featured_banner_image_2x']; ?>
		<?php endif; ?>
		<div class="bg non-retina" style="background-image: url(<?php echo $featured_image; ?>);"></div>
		<div class="bg retina" style="background-image: url(<?php echo $featured_image_2x; ?>);"></div>
		<div class="container">
			<?php if ( $s1_heading = get_field('s1_heading') ) : ?> 
			<h1><?php echo $s1_heading; ?></h1>
			<?php endif; ?>
			<?php if ( $s1_subheading = get_field('s1_subheading') ) : ?> 
			<p><?php echo $s1_subheading; ?></p>
			<?php endif; ?>
			<?php if ( get_field( 'buttons' ) ) : ?>
			<?php while ( has_sub_field('buttons') ) : ?>
			<?php endwhile; ?>
			<?php endif ?>
			
			<div class="apps">
				<a href="https://itunes.apple.com/us/app/bluestar-diabetes/id700329056?mt=8" target="_blank">
					<img alt="" src="<?php bloginfo('template_directory'); ?>/images/ico_appstore.png" srcset="<?php bloginfo('template_directory'); ?>/images/ico_appstore@2x.png 2x">
				</a> 
				<a href="https://play.google.com/store/apps/details?id=com.welldoc.platform.android&hl=en_US" target="_blank">
					<img alt="" src="<?php bloginfo('template_directory'); ?>/images/ico_gp.png" srcset="<?php bloginfo('template_directory'); ?>/images/ico_gp@2x.png 2x">
				</a>
			</div>
		</div>
	</div>
	<!-- section 2: Login bar -->
	<div class="star-line">
		<div class="container">
			<?php $s2_text = get_field('s2_text'); ?>
			<?php $s2_telephone = get_field('s2_telephone'); ?>
			<?php if ( $s2_text && $s2_telephone ) : ?>
			<h3><?php echo $s2_text; ?> <a href="tel:<?php echo $s2_telephone; ?>"><?php echo $s2_telephone; ?></a></h3>
			<?php endif; ?>
			<?php /*
			<?php $s2_cta_button_text = get_field('s2_cta_button_text'); ?>
			<?php $s2_cta_button_url = get_field('s2_cta_button_url'); ?>
			<?php if ( $s2_cta_button_text && $s2_cta_button_url ) : ?>
				<a class="btn btn-outline blue" href="<?php echo $s2_cta_button_url; ?>"><?php echo $s2_cta_button_text; ?></a>
			<?php endif; ?>
			*/ ?>
			<?php if( get_field( 's2_buttons' ) ): ?>
				<?php while( has_sub_field( 's2_buttons' ) ): ?>
					<?php $cta_button_text = get_sub_field('cta_button_text'); ?>
					<?php $cta_button_url = get_sub_field('cta_button_url'); ?>
					<?php if ( $cta_button_text && $cta_button_url ) : ?>
						<a class="btn btn-outline blue" href="<?php echo $cta_button_url; ?>"><?php echo $cta_button_text; ?></a>
					<?php endif; ?>
				<?php endwhile; ?>
			<?php endif ?>
		</div>
	</div>
	<!-- section 3: boxes -->
	<div class="grey-title bg-bg black-bg">
		<div class="container">
			<?php if( $s3_heading = get_field( 's3_heading' )): ?> 
				<h2 class="title"><?php echo $s3_heading; ?></h2>
			<?php endif; ?>
			<?php if( get_field( 's3_boxes' ) ): ?>
				<section>
			 		<?php while( has_sub_field( 's3_boxes' ) ): ?>
						<article>
							<?php if( $heading = get_sub_field( 'heading' )): ?> 
								<h3><?php echo $heading; ?></h3>
							<?php endif; ?>
							<?php if( $subheading = get_sub_field( 'subheading' )): ?> 
								<h4><?php echo $subheading; ?></h4>
							<?php endif; ?>
							<?php if( $text = get_sub_field( 'text' )): ?> 
								<p>
									<?php echo $text; ?>
								</p>
							<?php endif; ?>
						</article>
			 		<?php endwhile; ?>
				</section>
		 	<?php endif ?> 	
			<?php if( $s3_subheading = get_field( 's3_subheading' )): ?> 
				<h2 class="title"><?php echo $s3_subheading; ?></h2>
			<?php endif; ?>
		</div>
	</div>
	<!-- section 4: content boxes -->
	<?php if( get_field( 'content_box' ) ): ?>
	
		<?php while( has_sub_field( 'content_box' ) ): ?>
			<div class="feature-p-row <?php echo get_sub_field( 'image_align' ); ?>">
				<?php $image = get_sub_field( 'image' ) ?>
				<?php if( !empty( $image ) ): ?>
					<div class="bg non-retina" style="background-image: url(<?php echo $image['sizes']['content']; ?>);"></div>
					<div class="bg retina" style="background-image: url(<?php echo $image['sizes']['content_2x']; ?>);"></div>
				<?php endif; ?>
				<div class="container">
					<div class="text mw- mw2-">
						<?php if( $heading = get_sub_field( 'heading' )): ?> 
							<h3>
								<?php echo $heading; ?>
							</h3>
						<?php endif; ?>
						<?php if( $content = get_sub_field( 'content' )): ?> 
							<?php echo $content; ?>
						<?php endif; ?>
						<!-- logo -->
						<?php if( 'Image' == get_sub_field( 'animation_image_type' )): ?>
							<div class="powered">
								<?php if( $logo_text = get_sub_field( 'logo_text' )): ?> 
									<span><?php echo $logo_text; ?></span> 
									<?php $image = get_sub_field( 'logo' ) ?>
									<?php if( !empty( $image ) ): ?>
										<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" title="<?php echo $image['title']; ?>" />
									<?php endif; ?>
								<?php endif; ?>
							</div>
						<?php endif; ?>
					</div>
					<?php if( 'Animation' == get_sub_field( 'animation_image_type' )): ?> 
						<?php if( 'weight' == get_sub_field( 'animation' )): ?>
							<!-- weight -->
							<div class="image">
								<div class="over-text">
									<?php if( $animation_heading = get_sub_field( 'animation_heading' )): ?> 
										<h4><img alt="" src="<?php bloginfo('template_directory'); ?>/images/ico_phil.svg"><?php echo $animation_heading; ?></h4>
									<?php endif; ?>
									<?php if( $animation_text = get_sub_field( 'animation_text' )): ?> 
						    			<p>
						    				<?php echo $animation_text; ?>
						    			</p>
							    	<?php endif; ?>
								</div>
							</div>
							<?php elseif( 'carb' == get_sub_field( 'animation' )): ?> 
								<div class="image">
									<div class="carb"><img alt="" src="<?php bloginfo('template_directory'); ?>/images/ico_carb.svg"></div>
								</div>
							<?php elseif( 'coffee' == get_sub_field( 'animation' )): ?> 
								<!-- coffee -->
								<div class="image">
									<div class="over-icon">
										<div class="ico">
											<img alt="" src="<?php bloginfo('template_directory'); ?>/images/ico_coff.svg"> 
											<img alt="" class="anim-1" src="<?php bloginfo('template_directory'); ?>/images/ico_coff_2.svg"> 
											<img alt="" class="anim-2" src="<?php bloginfo('template_directory'); ?>/images/ico_coff3.svg">
										</div>
										<?php if( $animation_text = get_sub_field( 'animation_text' )): ?> 
											<p>
												<?php echo $animation_text; ?>
											</p>
										<?php endif; ?>
									</div>
								</div>
							<?php else: ?>
						<?php endif; ?>
					<?php endif; ?>
				</div>
			</div>
		<?php endwhile; ?>
	<?php endif ?>

	<!-- section 5: -->
	<div class="support-row">
		<div class="container">
			<?php if( $s5_heading = get_field( 's5_heading' )): ?> 
				<h2 class="title"><?php echo $s5_heading; ?></h2>
			<?php endif; ?>
			<div class="support-item">
				<div class="text">
					<?php if( $s5_content = get_field( 's5_content' )): ?> 
						<?php echo $s5_content; ?>
					<?php endif; ?>
				</div>
				<?php $image = get_field( 's5_image' ) ?>
				<?php if( !empty( $image ) ): ?>
					<?php $bg_url = $image['sizes']['s5']; ?>
					<?php $bg_url_2x = $image['sizes']['s5_2x']; ?>
					<div class="image">
						<img src="<?php echo $bg_url; ?>" srcset="<?php echo $bg_url_2x; ?> 2x" alt="<?php echo $image['alt']; ?>" title="<?php echo $image['title'] ?>">
					</div>
				<?php endif; ?>
			</div>
			<div class="support-item quotes">
				<?php if( $s5_testimonial_text = get_field( 's5_testimonial_text' )): ?> 
					<div class="text">
						<?php echo $s5_testimonial_text; ?>
					</div>
				<?php endif; ?>
				<?php if( get_field( 's5_testimonials' ) ): ?>
					<div class="image">
						<?php while( has_sub_field( 's5_testimonials' ) ): ?>
							<blockquote>
								<div class="avatar">
									<?php $image = get_sub_field( 'image' ) ?>
									<?php if( !empty( $image ) ): ?>
										<?php $bg_url = $image['sizes']['testimonial']; ?>
										<img src="<?php echo $bg_url; ?>" alt="<?php echo $image['alt']; ?>" title="<?php echo $image['title'] ?>">
									<?php endif; ?>
								</div>
								<cite>
									<?php if( $date = get_sub_field( 'date' )): ?> 
											<?php echo $date; ?>
										<br>
									<?php endif; ?>
									<?php if( $name = get_sub_field( 'name' )): ?> 
										<strong><?php echo $name; ?></strong>
							    	<?php endif; ?>
								</cite>
								<?php if( $text = get_sub_field( 'text' )): ?> 
									<p>
										<?php echo $text; ?>
									</p>
								<?php endif; ?>
							</blockquote>
						<?php endwhile; ?>
					</div>
				<?php endif ?>
			</div>
		</div>
	</div>
	<!-- section 6: -->
	<div class="features-list v2">
		<div class="container">
			<?php $image = get_field( 's6_image' ) ?>
			<?php if( !empty( $image ) ): ?>
				<?php $bg_url = $image['sizes']['s6']; ?>
				<?php $bg_url_2x = $image['sizes']['s6_2x']; ?>
				<div class="image">
					<img src="<?php echo $bg_url; ?>" srcset="<?php echo $bg_url_2x; ?> 2x" alt="<?php echo $image['alt']; ?>" title="<?php echo $image['title'] ?>">
				</div>
			<?php endif; ?>
			<div class="list">
				<?php if( $s6_heading = get_field( 's6_heading' )): ?> 
					<h2 class="title"><?php echo $s6_heading; ?></h2>
				<?php endif; ?>
			   	<?php if( get_field( 's6_features' ) ): ?>
			   		<?php while( has_sub_field( 's6_features' ) ): ?>
						<ul>
							<li>
								<?php if( $heading = get_sub_field( 'heading' )): ?> 
									<h3><?php echo $heading; ?></h3>
								<?php endif; ?>
								<?php if( $subheading = get_sub_field( 'subheading' )): ?> 
					    			<p>
					    				<?php echo $subheading; ?>
					    			</p>
						    	<?php endif; ?>
							</li>
			   			</ul>
			   		<?php endwhile; ?>
			   	<?php endif ?>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>