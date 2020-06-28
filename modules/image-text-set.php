<section class="text-image-set module background-<?php the_sub_field('background_color');?> <?php the_sub_field('layout');?> <?php if(get_sub_field('remove_top_padding') == 'true'):?>no-tp<?php endif;?> <?php if(get_sub_field('remove_bottom_padding') == 'true'):?>no-bp<?php endif;?> <?php the_sub_field('custom_class');?>">
	<div class="grid-container">
		
		<div class="grid-x grid-padding-x align-middle justify-center">	
			
			<?php if($top_heading = get_sub_field('centered_top_heading')):?>
			<h2 class="top-heading cell small-12 mobile-10 mobile-offset-1 xmedium-8 xmedium-offset-2 text-center"><?php echo $top_heading;?></h2>
			<?php endif;?>
		
		</div>
		
		<div class="rev-wrap grid-x grid-padding-x align-middle align-justify">	

			<div class="img-wrap half cell small-12 mobile-6 xlarge-5">
				
			<?php 
			$image = get_sub_field('image');
			if( !empty( $image ) ): ?>
			    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
			<?php endif; ?>					
				
			</div>
			
			<div class="text-wrap half cell small-12 mobile-6">
				
				<h3 class="large-heading <?php if(get_sub_field('reduced_heading_font_size') == 'true'):?>reduced<?php endif;?>"><?php the_sub_field('heading');?></h3>
				
				<div class="copy-wrap">
					<?php the_sub_field('copy');?>
				</div>
				
				<?php if( have_rows('buttons') ):?>
				<div class="buttons-wrap grid-x grid-padding-x align-middle">
					<?php while ( have_rows('buttons') ) : the_row();?>	
					
					<?php $num = get_row_index();?>
					
					<?php if( have_rows('single_button') ):?>
						<?php while ( have_rows('single_button') ) : the_row();?>	
						
						<?php if(get_sub_field('type') == 'link'):?>
						
							<?php 
							$link = get_sub_field('link');
							if( $link ): 
							    $link_url = $link['url'];
							    $link_title = $link['title'];
							    $link_target = $link['target'] ? $link['target'] : '_self';
							    ?>
							<div class="btn-wrap cell shrink">
								<a class="btn blue link" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
							</div>
							<?php endif; ?>
						
						<?php endif;?>
	
						<?php if(get_sub_field('type') == 'video'):?>
						
							<div class="btn-wrap cell shrink">					
								<button class="btn no-shadow video-play" data-open="modal-<?php echo $num;?>">
									<i class="far fa-play-circle"></i>
									<span>Watch Video</span>
								</button>
							</div>
						
							<div class="reveal large" id="modal-<?php echo $num;?>" data-animation-in="fade-in slow" data-animation-out="fade-out fast" data-reset-on-close="true" data-reveal>
								
								<?php
								$iframe = get_sub_field('video_url');
								
								preg_match('/src="(.+?)"/', $iframe, $matches);
								$src = $matches[1];
								
								$params = array(
								    'controls'  => 1,
								    'hd'        => 1,
								    'autohide'  => 1,
									'autohide'    => 1,
								    'modestbranding' => 1,
								    'rel' => 0
								);
								$new_src = add_query_arg($params, $src);
								$iframe = str_replace($src, $new_src, $iframe);
								
								$attributes = 'frameborder="0"';
								$iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);
								
								echo $iframe;
								?>
								
							  <button class="close-button" data-close aria-label="Close modal" type="button"></button>
							  
							</div>
						
						<?php endif;?>
							
					
						<?php endwhile;?>
					<?php endif;?>
				
					<?php endwhile;?>
				</div>
				<?php endif;?>
				
			</div>
	
		</div>
	</div>
</section>