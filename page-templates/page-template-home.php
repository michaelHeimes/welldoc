<?php
/*
Template Name: Home Page
*/
?>
<?php get_header(); ?>

	<div class="body">
				
		<div class="hero-banner height-full">
						
			<img class="globe" src="<?php echo home_url() ?>/wp-content/themes/welldoc/assets/images/globe.svg"/>
			
			<div class="grid-container">
				
				<div class="circle yellow"></div>
				<div class="circle red"></div>
				
				<div class="pies-wrap">
					<img class="pie-l" src="<?php echo home_url() ?>/wp-content/themes/welldoc/assets/images/home-pie-left.svg"/>
					<img class="pir-r" src="<?php echo home_url() ?>/wp-content/themes/welldoc/assets/images/home-pie-right.svg"/>
				</div>
				
				<div class="grid-x grid-padding-x align-middle">
				
					<div class="left cell small-12 medium-12 xmedium-7">
						
						<h1><?php the_field('hero_heading');?></h1>
						
						<?php if( $copy = get_field('hero_copy')):?>
						
							<div class="copy-wrap">
								<?php echo $copy;?>
							</div>
						
						<?php endif;?>	
						
						<?php if( have_rows('hero_buttons') ):?>
						<div class="buttons-wrap grid-x grid-padding-x align-middle">
							<?php while ( have_rows('hero_buttons') ) : the_row();?>	
							
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
			
					<div class="right cell small-12 medium-12 xmedium-5">
					<?php if( have_rows('hero_multiple_conditions') ):?>
						<?php while ( have_rows('hero_multiple_conditions') ) : the_row();?>	
						
						<div class="multiple-conditions-section">
							<div class="grid-container">
								<div class="cell small-12">
					
									<div class="multiple-conditions-wrap">
										
										<div id="conditions-phone-wrap">
														
											<?php if( have_rows('conditions_labels') ):?>
												<div id="condition-fade-copy-wrap">
												<?php while ( have_rows('conditions_labels') ) : the_row();?>											
													<?php if( have_rows('label_1') ):?>
													<div id="label_1" class="single-condition-label">
														<?php while ( have_rows('label_1') ) : the_row();?>
															<p class="label-title"><?php the_sub_field('title');?></p>
														<?php endwhile;?>
													</div>
													<?php endif;?>	
													
													<?php if( have_rows('label_2') ):?>
													<div id="label_2" class="single-condition-label">
														<?php while ( have_rows('label_2') ) : the_row();?>
															<p class="label-title"><?php the_sub_field('title');?></p>
														<?php endwhile;?>
													</div>
													<?php endif;?>	
													
													<?php if( have_rows('label_3') ):?>
													<div id="label_3" class="single-condition-label">
														<?php while ( have_rows('label_3') ) : the_row();?>
															<p class="label-title"><?php the_sub_field('title');?></p>
														<?php endwhile;?>
													</div>
													<?php endif;?>	
													
													<?php if( have_rows('label_4') ):?>
													<div id="label_4" class="single-condition-label">
														<?php while ( have_rows('label_4') ) : the_row();?>
															<p class="label-title"><?php the_sub_field('title');?></p>
														<?php endwhile;?>
													</div>
													<?php endif;?>												
													
												<?php endwhile;?>
												</div>
											<?php endif;?>	
												
												
											<?php if( have_rows('conditions_screens') ):?>
												<div id="conditions-screen-wrap">
												<?php while ( have_rows('conditions_screens') ) : the_row();?>
							
													<?php 
													$image4 = get_sub_field('screen_4');
													if( !empty($image4) ): ?>
														<img id="screen_4" class="conditions-panel" src="<?php echo $image4['url']; ?>" alt="<?php echo $image2['alt']; ?>" />
													<?php endif; ?>
													
													<?php 
													$image3 = get_sub_field('screen_3');
													if( !empty($image3) ): ?>
														<img id="screen_3" class="conditions-panel" src="<?php echo $image3['url']; ?>" alt="<?php echo $image3['alt']; ?>" />
													<?php endif; ?>
													
													<?php 
													$image2 = get_sub_field('screen_2');
													if( !empty($image2) ): ?>
														<img id="screen_2" class="conditions-panel" src="<?php echo $image2['url']; ?>" alt="<?php echo $image2['alt']; ?>" />
													<?php endif; ?>												
													
													<?php 
													$image1 = get_sub_field('screen_1');
													if( !empty($image1) ): ?>
														<img id="screen_1" class="conditions-panel" src="<?php echo $image1['url']; ?>" alt="<?php echo $image1['alt']; ?>" />
													<?php endif; ?>
													
												<?php endwhile;?>
												</div>
											<?php endif;?>		
														
																										
										</div>
										
									</div>
														
								</div>
						
							</div>
						</div>						
											
						<?php endwhile;?>
					<?php endif;?>
					</div>
					
				</div>
			
			</div>
			
			<a class="scroll-down-anchor" href="#next">Scroll</a>
			
		</div><!-- hero-banner -->
		
		<section class="platform-cards" id="next">
			<div class="grid-container">
				<div class="grid-x grid-padding-x">
				
					<h2 class="small-heading w-icon cell small-12"><?php the_field('pc_heading')?></h2>
					
				</div>
					
					<?php if( have_rows('pc_cards') ):?>
					<div class="grid-x grid-padding-x align-center">
						<?php while ( have_rows('pc_cards') ) : the_row();?>	
						
						<?php if( have_rows('single_card') ):?>
							<?php while ( have_rows('single_card') ) : the_row();?>	
							
							<div class="single-card cell small-12 medium-6 xmedium-4">
								<div class="inner">
									<div class="grid-x grid-padding-x">
										
										<div class="cell small-3">
											
											<?php $image = get_sub_field('icon');
											if( !empty( $image ) ): ?>
											    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
											<?php endif; ?>
											
										</div>
										
										<div class="heading-wrap cell small-9">
											<h3><?php the_sub_field('heading');?></h3>
										</div>
										
										<div class="cell small-12">
											<div class="list-label"><?php the_sub_field('list_heading');?></div>
										</div>
		
										<div class="cell small-12">
											<div class="list"><?php the_sub_field('benefits_list');?></div>
										</div>
									
									</div>
								</div>
							</div>
						
							<?php endwhile;?>
						<?php endif;?>
					
						<?php endwhile;?>
					</div>
					<?php endif;?>
			
				</div>
			</div>
		</section>
		
		
		<section class="platform-solutions">
			<div class="grid-container">
				<div class="grid-x grid-padding-x">
				
					<div class="top cell small-12 text-center">
				
						<h2 class="small-heading w-icon"><?php the_field('ps_small_heading')?></h2>
						
						<h3 class="large-heading"><?php the_field('ps_heading');?></h3>
						
						<p><?php the_field('ps_sub-heading_copy');?></p>
					
					</div>
					
					<?php if( have_rows('ps_image_and_copy_rows') ):?>
					<div class="block-rows-wrap small-12">
						<div class="block-rows grid-x grid-padding-x">
						<?php while ( have_rows('ps_image_and_copy_rows') ) : the_row();?>
						
						<?php if( have_rows('single_row') ):?>
							<?php while ( have_rows('single_row') ) : the_row();?>	
						
							<div class="single-row cell small-12">
								
								<div class="block-row grid-x grid-padding-x">
									
									<?php
										$imgID = get_sub_field('image');
										$imgSize = "full";
										$imgArr = wp_get_attachment_image_src( $imgID, $imgSize );
									
									?>
									
									
									<div class="img-wrap cell small-12 medium-6">
										<div class="inner" style="background-image: url(<?php echo $imgArr[0]; ?>)";>
										</div>
									</div>

									<div class="text-wrap cell small-12 medium-6">
										
										<div class="inner text-left">
										
											<h2><?php the_sub_field('heading');?></h2>
											
											<p><?php the_sub_field('copy');?></p>
											
											<?php 
											$link = get_sub_field('link');
											if( $link ): 
											    $link_url = $link['url'];
											    $link_title = $link['title'];
											    $link_target = $link['target'] ? $link['target'] : '_self';
											    ?>
											    <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><span><?php echo esc_html( $link_title ); ?></span><i class="fas fa-arrow-right"></i></a>
											<?php endif; ?>		
											
										</div>								
											
									</div>
									
								</div>
								
							</div>
						
							<?php endwhile;?>
						<?php endif;?>	
					
						<?php endwhile;?>
						</div>
					</div>
					<?php endif;?>
					
				</div>
			</div>
		</section>
		
		
		<section class="benefits">
			<div class="grid-container">
				<div class="grid-x grid-padding-x">
					
					<div class="top cell small-12 text-center">
						
						<h2 class="small-heading w-icon"><?php the_field('ben_small_heading')?></h2>
						
						<h3 class="large-heading"><?php the_field('ben_heading');?></h3>
						
					</div>
						
					<div class="small-12">
						<?php if( have_rows('ben_cards') ):?>
						<div class="cards-wrap grid-x grid-padding-x small-up-1 medium-up-2 xmedium-up-3 align-center">
							<?php while ( have_rows('ben_cards') ) : the_row();?>	
							
							<?php if( have_rows('single_card') ):?>
								<?php while ( have_rows('single_card') ) : the_row();?>	
								
								<div class="single-card cell text-center">
								
									<h4><?php the_sub_field('heading');?></h4>
								
									<p><?php the_sub_field('copy');?></p>
									
								</div>
							
								<?php endwhile;?>
							<?php endif;?>
							
							<?php endwhile;?>
						</div>
						<?php endif;?>
					</div>
					
				</div>
			</div>
		</section>
		
		
		<section class="approach">
			<div class="grid-container">
				<div class="grid-x grid-padding-x">
					
					<div class="left cell small-12 medium-12 xmedium-6">
						
						<img class="pir-r" src="<?php echo home_url() ?>/wp-content/themes/welldoc/assets/images/approach-globe.svg"/>
						
						<h2 class="small-heading w-icon"><?php the_field('ap_small_heading')?></h2>
						
						<h3 class="large-heading text-left"><?php the_field('ap_heading');?></h3>	
						
						<div class="copy-wrap">
							<?php the_field('ap_copy');?>
						</div>					
						
					</div>

					<div class="right cell small-12 medium-12 xmedium-6 text-center">

						<div class="circle yellow"></div>
						<div class="circle red"></div>

						<?php 
						$image = get_field('ap_image');
						if( !empty( $image ) ): ?>
						    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
						<?php endif; ?>						
						
					</div>
					
				</div>
			</div>
		</section>
		
		
		<section class="blue-squares">
			<div class="grid-container">
				<div class="block-rows grid-x grid-padding-x small-up-1 medium-up-1 xmedium-up-2">
					
					<div class="block-row square top-left cell">
						<div class="inner text-center">
						<?php if( have_rows('top_left') ):?>
							<?php while ( have_rows('top_left') ) : the_row();?>	
							
							<?php if( have_rows('logos') ):?>
							<div class="logos grid-x grid-padding-x">
							<?php while ( have_rows('logos') ) : the_row();?>	
							
							<div class="single-logo cell small-4">
								<?php 
								$image = get_sub_field('single_logo');
								if( !empty( $image ) ): ?>
								    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
								<?php endif; ?>						
							</div>
						
							<?php endwhile;?>
							</div>
							<?php endif;?>
							
							<h2 class="large-heading"><?php the_sub_field('heading');?></h2>
							
							<p><?php the_field('copy');?></p>
						
							<?php endwhile;?>
						<?php endif;?>
						</div>
					</div>

					<div class="block-row square top-right cell">
						<div class="inner">
						<?php if( have_rows('top_right') ):?>
							<?php while ( have_rows('top_right') ) : the_row();?>	
							
							<?php if( have_rows('logos') ):?>
							<div class="logos grid-x grid-padding-x">
							<?php while ( have_rows('logos') ) : the_row();?>	
							
							<div class="single-logo cell small-4">
								<?php 
								$image = get_sub_field('single_logo');
								if( !empty( $image ) ): ?>
								    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
								<?php endif; ?>						
							</div>
						
							<?php endwhile;?>
							</div>
							<?php endif;?>
							
							<h2 class="large-heading"><?php the_sub_field('heading');?></h2>
							
							<p><?php the_field('copy');?></p>
						
							<?php endwhile;?>
						<?php endif;?>
						</div>
					</div>

					<div class="block-row square bottom-left cell">
						<div class="inner">
							
							<img src="<?php echo home_url() ?>/wp-content/themes/welldoc/assets/images/lightbulb.svg"/>
							
							<?php if( have_rows('bottom_left') ):?>
								<?php while ( have_rows('bottom_left') ) : the_row();?>	
								
								<div class="copy-wrap">
								
									<h2 class="large-heading"><?php the_sub_field('heading');?></h2>
									
									<p><?php the_field('copy');?></p>
								
								</div>
							
								<?php endwhile;?>
							<?php endif;?>
						
						</div>
					</div>

					<div class="block-row square bottom-right cell">
						<div class="inner text-center">
						<?php if( have_rows('bottom_right') ):?>
							<?php while ( have_rows('bottom_right') ) : the_row();?>	
							
							<div class="copy-wrap">
							
								<h2 class="large-heading"><?php the_sub_field('heading');?></h2>
								
								<?php								
								$link = get_sub_field('link');
								if( $link ): 
								    $link_url = $link['url'];
								    $link_title = $link['title'];
								    $link_target = $link['target'] ? $link['target'] : '_self';
								    ?>
								    <a class="btn white" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
								<?php endif; ?>
							
							</div>
						
							<?php endwhile;?>
						<?php endif;?>
						</div>
					</div>
					
				</div>
			</div>
		</section>
		
		
	</div><!-- body -->

<?php get_footer(); ?>