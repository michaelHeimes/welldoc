<?php
	$imgID = get_sub_field('background_image');
	$imgSize = "full";
	$imgArr = wp_get_attachment_image_src( $imgID, $imgSize );
	
	$height = get_sub_field('height');

?>

<div class="hero-banner height-<?php echo $height; ?>">
	
	<div class="bg" style="background-image: url(<?php echo $imgArr[0]; ?> );"></div>
	
			<div class="grid-container">
				
				<div class="circle yellow"></div>
				<div class="circle red"></div>
				
				<div class="pies-wrap">
					<img class="pie-l" src="<?php echo home_url() ?>/wp-content/themes/welldoc/assets/images/home-pie-left.svg"/>
					<img class="pir-r" src="<?php echo home_url() ?>/wp-content/themes/welldoc/assets/images/home-pie-right.svg"/>
				</div>
				
				<div class="grid-x grid-padding-x align-middle">
				
					<div class="left half cell small-12 medium-12 xmedium-7">
						
						<h1><?php the_sub_field('heading');?></h1>
						
						<?php if( $copy = get_sub_field('copy')):?>
						
							<div class="copy-wrap">
								<?php echo $copy;?>
							</div>
						
						<?php endif;?>	
						
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
										<a class="btn white link" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
									</div>
									<?php endif; ?>
								
								<?php endif;?>

								<?php if(get_sub_field('type') == 'video'):?>
								
									<div class="btn-wrap cell shrink">					
										<button class="btn no-shadow video-play" data-open="hero-modal-<?php echo $num;?>">
											<i class="far fa-play-circle"></i>
											<span>Watch Video</span>
										</button>
									</div>
								
									<div class="reveal large" id="hero-modal-<?php echo $num;?>" data-animation-in="fade-in slow" data-animation-out="fade-out fast" data-reset-on-close="true" data-reveal>
										
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
			
					<div class="right half cell small-12 medium-12 xmedium-5">
						<?php 
						$image = get_sub_field('image');
						if( !empty( $image ) ): ?>
						    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
						<?php endif; ?>
					</div>
					
				</div>
			
			</div>
	
</div>