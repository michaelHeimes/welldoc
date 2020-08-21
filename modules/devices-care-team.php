<section class="devices-care-team module show-for-xmedium background-<?php the_sub_field('background_color');?> <?php if(get_sub_field('remove_top_padding') == 'true'):?>no-tp<?php endif;?> <?php if(get_sub_field('remove_bottom_padding') == 'true'):?>no-bp<?php endif;?>">
	<div class="grid-container">
		
		<div class="grid-x grid-padding-x align-middle align-justify">	
			
			<div class="top cell small-12 text-center">
						
				<h2 class="large-heading"><?php the_sub_field('heading');?></h2>
				
				<p><?php the_sub_field('copy');?></p>
			
			</div>
			
			<div class="cell small-12">

				<div class="animation-wrap grid-x grid-padding-x align-middle align-justify">
					
					<div class="top-arrows cell small-12">
						
						<img class="arrow-1" src="<?php echo get_template_directory_uri() ?>/assets/images/arrow-1.svg"/>

						<img class="arrow-2" src="<?php echo get_template_directory_uri() ?>/assets/images/arrow-2.svg"/>
						
						<img class="arrow-3" src="<?php echo get_template_directory_uri() ?>/assets/images/arrow-3.svg"/>
						
					</div>
					
					<div class="globe-wrap text-center">
						<img src="<?php echo get_template_directory_uri() ?>/assets/images/dc-globe.svg"/>
					</div>
					
					<div class="left panel cell small-12 xmedium-4">
						
						<div class="grid-x grid-padding-x align-middle align-justify">
						
							<div class="cell small-12">
								<h3 class="text-center"><?php the_sub_field('lc_heading');?></h3>
							</div>
														
							<?php 
							$images = get_sub_field('lc_three_columns_images');
							if( $images ): ?>
							<div class="cell small-12">
								<div class="grid-x grid-padding-x align-middle align-justify">
							        <?php foreach( $images as $image ): ?>
							        
										<div class="img-wrap cell small-4">
							                <img src="<?php echo esc_url($image['sizes']['thumbnail']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
										</div>
	
							        <?php endforeach; ?>
								</div>
							</div>
							<?php endif; ?>
							
						</div>
						
					</div>
					
					
					<div class="center cell small-12 xmedium-4">
						
						<?php 
						$image = get_sub_field('cc_image');
						if( !empty( $image ) ): ?>
						    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
						<?php endif; ?>
						
						<h3 class="text-center"><?php the_sub_field('cc_heading');?></h3>
						
					</div>


					<div class="right panel cell small-12 xmedium-4 text-center">
						
						<h3 class="text-center"><?php the_sub_field('rc_heading');?></h3>
						
						<?php 
						$image = get_sub_field('rc_image');
						if( !empty( $image ) ): ?>
						    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
						<?php endif; ?>						
						
					</div>
					
					
					<div class="bottom-arrows cell small-12">
						
						<img src="<?php echo get_template_directory_uri() ?>/assets/images/arrow-4.svg"/>						

					</div>
						
					<div class="text-center">
						<a href="#" id="skip-device-animation" class="btn blue">Skip Animation</a>
					</div>
					
				</div>				
						
			</div>
		
		</div>
	</div>
</section>