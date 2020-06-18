<footer class="footer">
	<div class="container">
		<div class="top">
			<ul id="footer-links">
				<li>
					<ul>
					<?php wp_nav_menu( array( 'menu' => 'Footer Left', 'menu_class' => 'cols-inner', 'menu_id' => 'menu-cols-l', 'container' => '', 'items_wrap' => '%3$s' ) ); ?>
					</ul>
				</li>
				<li>
					<ul>
					<?php wp_nav_menu( array( 'menu' => 'Footer Center', 'menu_class' => 'cols-inner', 'menu_id' => 'menu-cols-c', 'container' => '', 'items_wrap' => '%3$s' ) ); ?>
					</ul>
				</li>
				<li>
					<ul class="cols-inner">
					<?php wp_nav_menu( array( 'menu' => 'Footer Right', 'menu_class' => 'cols-inner', 'menu_id' => 'menu-cols-r', 'container' => '', 'items_wrap' => '%3$s' ) ); ?>
					</ul>
				</li>
			</ul>
				
			<ul id="social-links">
				<?php if ( $social_linkedin_url = get_field( 'social_linkedin_url', 'option' ) ) : ?>
				<li><a href="<?php echo $social_linkedin_url; ?>" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
				<?php endif; ?>
				<?php if ( $social_twitter_url = get_field( 'social_twitter_url', 'option' ) ) : ?>
				<li><a href="<?php echo $social_twitter_url; ?>" target="_blank"><i class="fab fa-twitter"></i></a></li>
				<?php endif; ?>
				<?php if ( $social_facebook_url = get_field( 'social_facebook_url', 'option' ) ) : ?>
				<li><a href="<?php echo $social_facebook_url; ?>" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
				<?php endif; ?>
				<?php if ( $social_instagram_url = get_field( 'social_instagram_url', 'option' ) ) : ?>
				<li><a href="<?php echo $social_instagram_url; ?>" target="_blank"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
				<?php endif; ?>		
				
<!--
									<li class="download-links">
					<a href="https://itunes.apple.com/us/app/bluestar-diabetes/id700329056?mt=8" target="_blank">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/APPSTOREBadge.png" alt="" srcset="<?php echo get_stylesheet_directory_uri(); ?>/images/APPSTOREBadge@2x.png 2x" />
					</a>
					<a href="https://play.google.com/store/apps/details?id=com.welldoc.platform.android&hl=en_US" target="_blank">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/google-play-badge.png" alt="" srcset="<?php echo get_stylesheet_directory_uri(); ?>/images/google-play-badge@2x.png 2x" />
					</a>
				</li>			
-->
			</ul>
					
							
		</div>
			
		<?php /*
		<div class="cols">
			<div class="col">
				<h4><a href="#">Product</a></h4>
			</div>
			<div class="col">
				<h4><a href="#">Outcomes</a></h4>
			</div>
			<div class="col">
				<h4><a href="#">Getting Started</a></h4>
			</div>
			<div class="col">
				<h4><a href="#">News</a></h4>
				<ul>
					<li><a href="#">Events</a></li>
				</ul>
			</div>
			<div class="col">
				<h4>About Us</h4>
				<ul>
					<li><a href="#">Our Team</a></li>
					<li><a href="#">Job Openings</a></li>
				</ul>
			</div>
			<div class="col last">
				<h4><a href="#">Insights</a></h4>
			</div>
			<div class="connect">
				<div class="label">Connect with Us</div>
				<ul>
					<?php if ( $social_linkedin_url = get_field( 'social_linkedin_url', 'option' ) ) : ?>
					<li><a href="<?php echo $social_linkedin_url; ?>" target="_blank"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
					<?php endif; ?>
					<?php if ( $social_twitter_url = get_field( 'social_twitter_url', 'option' ) ) : ?>
					<li><a href="<?php echo $social_twitter_url; ?>" target="_blank"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
					<?php endif; ?>
					<?php if ( $social_facebook_url = get_field( 'social_facebook_url', 'option' ) ) : ?>
					<li><a href="<?php echo $social_facebook_url; ?>" target="_blank"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
					<?php endif; ?>
				</ul>
			</div>
		</div>
		*/ ?>

		<div class="bottom">
			<div class="left">
				<?php if ( $footer_bottom_text = get_field( 'footer_bottom_text', 'option' ) ) : ?>
				<?php echo $footer_bottom_text; ?>
				<?php endif; ?>
<!-- 				<p>&copy; <?php echo date('Y'); ?> WellDoc, Inc | <a href="/privacy-policy/">Privacy Policy</a></p> -->
			</div>

			
			<div class="right">
				<?php 
				$link = get_field('footer_link', 'option');
				if( $link ): 
					$link_url = $link['url'];
					$link_title = $link['title'];
					$link_target = $link['target'] ? $link['target'] : '_self';
					?>
					<a class="btn btn-blue" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
				<?php endif; ?>
			</div>
			
		</div>


	</div>
</footer>

	<?php if (is_page(3663)):?>

		<div id="clinicians-form-modal">
			
			<a id="guide-dl" href="<?php the_field('top_bar_download_file') ?>" target="_blank"></a>

			<div class="mask"></div>
			
			<div class="inner">
				<h2><?php the_field('modal_heading');?></h2>
				<p><?php the_field('modal_copy');?></p>
				<?php gravity_form( 11, false, false, false, '', true, 1 );?>
			</div>
						
		</div>
	
	<?php endif;?>

<?php wp_footer(); ?>

		

		

</body>

</html>