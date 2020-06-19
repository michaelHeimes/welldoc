<footer class="footer">
	<div class="grid-container">
		
		<div class="top grid-x grid-padding-x">
		
			<div class="footer-links cell small-12 medium-6 xmedium-7 large-6 large-offset-1">
				
				<div class="top grid-x grid-padding-x  small-up-3 medium-up-3 xmedium-up-3">
					
					<div class="cell">
						<ul class="grid-y grid-padding-y">
						<?php wp_nav_menu( array( 'menu' => 'Footer Left', 'menu_class' => 'cols-inner', 'menu_id' => 'menu-cols-l', 'container' => 'cell', 'items_wrap' => '%3$s' ) ); ?>
						</ul>
					</div>
					
					<div class="cell">
						<ul class="grid-y grid-padding-y">
						<?php wp_nav_menu( array( 'menu' => 'Footer Center', 'menu_class' => 'cols-inner', 'menu_id' => 'menu-cols-c', 'container' => 'cell', 'items_wrap' => '%3$s' ) ); ?>
						</ul>
					</div>
					
					<div class="cell">
						<ul class="cols-inner grid-y grid-padding-y">
						<?php wp_nav_menu( array( 'menu' => 'Footer Right', 'menu_class' => 'cols-inner', 'menu_id' => 'menu-cols-r', 'container' => 'cell', 'items_wrap' => '%3$s' ) ); ?>
						</ul>
					</div>
						
				</div>
				
			</div>
				
			<div class="social-links cell small-12 medium-12 xmedium-5 large-4">
				
				<ul class="grid-x grid-padding-x align-center">
					<?php if ( $social_linkedin_url = get_field( 'social_linkedin_url', 'option' ) ) : ?>
					<li class="cell shrink"><a href="<?php echo $social_linkedin_url; ?>" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
					<?php endif; ?>
					<?php if ( $social_twitter_url = get_field( 'social_twitter_url', 'option' ) ) : ?>
					<li class="cell shrink"><a href="<?php echo $social_twitter_url; ?>" target="_blank"><i class="fab fa-twitter"></i></a></li>
					<?php endif; ?>
					<?php if ( $social_facebook_url = get_field( 'social_facebook_url', 'option' ) ) : ?>
					<li class="cell shrink"><a href="<?php echo $social_facebook_url; ?>" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
					<?php endif; ?>
					<?php if ( $social_instagram_url = get_field( 'social_instagram_url', 'option' ) ) : ?>
					<li class="cell shrink"><a href="<?php echo $social_instagram_url; ?>" target="_blank"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
					<?php endif; ?>		
				</ul>
				
			</div>
					
							
		</div>
		
		
		

		<div class="bottom grid-x grid-padding-x">
			
			<div class="left cell small-12 medium-12 xmedium-7 large-6 large-offset-1">
				<?php if ( $footer_bottom_text = get_field( 'footer_bottom_text', 'option' ) ) : ?>
				<?php echo $footer_bottom_text; ?>
				<?php endif; ?>
			</div>

			
			<div class="right cell small-12 medium-12 xmedium-5 large-4">
				<?php 
				$link = get_field('footer_link', 'option');
				if( $link ): 
					$link_url = $link['url'];
					$link_title = $link['title'];
					$link_target = $link['target'] ? $link['target'] : '_self';
					?>
					<a class="btn blue" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
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

	</div>  <!-- end .off-canvas-content -->
					
	</div> <!-- end .off-canvas-wrapper -->	

		

</body>

</html>