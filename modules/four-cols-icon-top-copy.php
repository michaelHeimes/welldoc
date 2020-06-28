<section class="module three-col-icon-top-copy background-<?php the_sub_field('background_color');?> <?php if(get_sub_field('remove_top_padding') == 'true'):?>no-tp<?php endif;?> <?php if(get_sub_field('remove_bottom_padding') == 'true'):?>no-bp<?php endif;?>">
	<div class="grid-container">
		<div class="grid-x grid-padding-x">

			<div class="cell small-12 xmedium-8 xmedium-offset-2">
				
				<div class="grid-x grid-padding-x">
			
					<?php if($heading = get_sub_field('heading')):?>
					<h2 class="large-heading cell small-12 text-center"><?php echo $heading;?></h2>
					<?php endif;?>
					
				</div>
				
			</div>			
			
		</div>
		
		<div class="grid-x grid-padding-x">
			
			<div class="cell small-12">
				
				<div class="grid-x grid-padding-x">
					
					<?php if( have_rows('cards') ):?>
						<?php while ( have_rows('cards') ) : the_row();?>	
						
						<?php if( have_rows('single_card') ):?>
							<?php while ( have_rows('single_card') ) : the_row();?>	
							
							<div class="single-card cell small-12 medium-6 xmedium-3">	
									
								<div class="icon-wrap text-center">
									<?php 
									$image = get_sub_field('icon');
									if( !empty( $image ) ): ?>
									    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
									<?php endif; ?>								
								</div>
								
								<div class="text-wrap text-center">
									
									<?php if($heading = get_sub_field('heading')):?>
									<h3><?php echo $heading;?></h3>
									<?php endif;?>
																	
									<p><?php the_sub_field('copy');?></p>
									
								</div>
															
							</div>
						
							<?php endwhile;?>
						<?php endif;?>
					
						<?php endwhile;?>
					<?php endif;?>
				
				</div>
				
			</div>
	
		</div>
	</div>
</section>