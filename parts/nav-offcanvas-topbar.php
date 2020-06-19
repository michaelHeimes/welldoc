<?php
/**
 * The off-canvas menu uses the Off-Canvas Component
 *
 * For more info: http://jointswp.com/docs/off-canvas-menu/
 */
?>

	<div class="grid-container">
		<div class="grid-x grid-padding-x">
			<div class="cell small-12 text-center">

				<?php 
				$link = get_field('link_next_to_logo', 'option');
					$link_url = $link['url'];
					$link_title = $link['title'];
					$link_target = $link['target'] ? $link['target'] : '_self';
				if( $link ):?> 	
				
					<a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>" class="ps-link cell shrink">
						<?php echo esc_html($link_title); ?>
					</a>
					
				<?php endif;?>

				<!-- Your menu or Off-canvas content goes here -->
				<?php wp_nav_menu( array( 'theme_location' => 'mainmenu', 'menu_class' => 'main-menu', 'menu_id' => '', 'container' => 'nav', 'depth' => 0 ) ); ?>
			
			</div>
		</div>
	</div>