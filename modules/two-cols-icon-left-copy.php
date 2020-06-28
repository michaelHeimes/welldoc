<section class="module two-col-icon-text background-<?php the_sub_field('background_color');?> <?php if(get_sub_field('remove_top_padding') == 'true'):?>no-tp<?php endif;?> <?php if(get_sub_field('remove_bottom_padding') == 'true'):?>no-bp<?php endif;?>">
	<div class="grid-container">
		<div class="grid-x grid-padding-x">
			
			<?php if( have_rows('cards') ):?>
				<?php while ( have_rows('cards') ) : the_row();?>	
				
				<?php if( have_rows('single_card') ):?>
					<?php while ( have_rows('single_card') ) : the_row();?>	
					
					<div class="single-cards cell small-12 medium-6 offset-1">
						
						<div class="grid-x grid-padding-x align-middle">
							
							<div class="icon-wrap cell small-3">
								<?php 
								$image = get_sub_field('icon');
								if( !empty( $image ) ): ?>
								    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
								<?php endif; ?>								
							</div>
							
							<div class="text-wrap cell small-6">
								
								<h3 class="small-heading"><?php the_sub_field('heading');?></h3>
								
								<p><?php the_sub_field('copy');?></p>
								
							</div>
							
						</div>
						
					</div>
				
					<?php endwhile;?>
				<?php endif;?>
			
				<?php endwhile;?>
			<?php endif;?>
	
		</div>
	</div>
</section>