<section class="contained-block module <?php if(get_sub_field('remove_top_padding') == 'true'):?>no-tp<?php endif;?> <?php if(get_sub_field('remove_bottom_padding') == 'true'):?>no-bp<?php endif;?>">
	<div class="grid-container">
		<div class="grid-x grid-padding-x align-middle">	
			
			<div class="cell small-12">
			
				<div class="inner background-<?php the_sub_field('background_color');?>">	
				
					<div class="grid-x grid-padding-x align-middle">
		
						<div class="cell small-12 medium-8 medium-offset-2 large-6 large-offset-3">
							
								<h2 class="large-heading text-center"><?php the_sub_field('heading');?></h2>
							
							<div class="copy-wrap text-center">
								<?php the_sub_field('copy');?>
							</div>
							
							<?php 
							$link = get_sub_field('link');
							if( $link ): 
							    $link_url = $link['url'];
							    $link_title = $link['title'];
							    $link_target = $link['target'] ? $link['target'] : '_self';
							    ?>
							    <div class="text-center">
							    	<a class="arrow-link" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><span><?php echo esc_html( $link_title ); ?></span><i class="fas fa-arrow-right"></i></a>
							    </div>
							<?php endif; ?>
											
						</div>
						
					</div>
					
				</div>
				
			</div>
	
		</div>
	</div>
</section>