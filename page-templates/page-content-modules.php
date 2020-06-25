<?php
/*
Template Name: Content Modules
*/
?>
<?php get_header(); ?>

<div class="body <?php if ( $white_content_background = get_sub_field('new_landing_style') ):?>new_landing_style<?php endif;?>">
	
	<?php if ( have_rows('content_modules') ) : ?>
	<?php while ( have_rows('content_modules') ) : ?> 
		<?php the_row(); ?>
		
		<?php if ( get_row_layout() == 'hero_banner' ) : 
		
			get_template_part('modules/hero-banner');
		
		endif;?>

		<?php if ( get_row_layout() == 'platform_cards' ) : 
		
			get_template_part('modules/platform-cards');
		
		endif;?>

		<?php if ( get_row_layout() == 'resources' ) : ?>
			<div class="<?php the_sub_field('custom_class');?>">
				<div class="accordion container">
				
				
				<?php
				/*
				* Loop through Categories and Display Posts within
				*/
				$post_type = 'resource';
				
				// Get all the taxonomies for this post type
				$taxonomies = get_object_taxonomies( array( 'post_type' => $post_type ) );
				
				foreach( $taxonomies as $taxonomy ) :
				
				// Gets every "category" (term) in this taxonomy to get the respective posts
				$terms = get_terms( $taxonomy );
				
				foreach( $terms as $term ) : ?>
				
				<?php
				$args = array(
					'post_type' => $post_type,
					'posts_per_page' => -1,  //show all posts
					'tax_query' => array(
						array(
						'taxonomy' => $taxonomy,
						'field' => 'slug',
						'terms' => $term->slug,
						)
					)
				);
				$posts = new WP_Query($args);
				
				if( $posts->have_posts() ): ?> 
				
					<h3><?php echo $term->name; ?></h3>
					
					<div>

					<?php while( $posts->have_posts() ) : $posts->the_post(); ?>
						
						<div class="single_file_wrap">
							
							<p><span><?php echo $term->name; ?></span>  <?php the_field('title');?></p>
							
							<?php 
							$link = get_field('link');
							$link_url = $link['url'];
							$link_title = $link['title'];
							$link_target = $link['target'] ? $link['target'] : '_self';
							?>
							
							<h4><a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?><?php echo the_title(); ?></a></h4>
							
							<a class="arrow-right" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><img src="/wp-content/uploads/2019/01/Right-Arrow.png" alt="arrow-right"/></a>
						
						</div>
							
					<?php endwhile;?>
					</div>
				<?php endif; ?>
				
				<?php endforeach;
				
				endforeach; ?>
				
				<?php wp_reset_postdata(); ?>
				
				</div>
			
			</div>
			
		<?php endif;?>
		
		

		<?php if ( get_row_layout() == 'accordion' ) : ?>
			<div class="<?php the_sub_field('custom_class');?>">
			<?php if( have_rows('accordion') ):?>
			
				<div class="accordion container">
					
				<?php while ( have_rows('accordion') ) : the_row();?>	
				
				<?php if( have_rows('single_accordion') ):?>
					<?php while ( have_rows('single_accordion') ) : the_row();?>
					
					<h3><?php the_sub_field('title');?></h3>
					<div>
						<?php if( have_rows('files') ):?>
							<?php while ( have_rows('files') ) : the_row();?>	
								<?php if( have_rows('single_file') ):?>
								
									<div class="single_file_wrap">
										
									<?php while ( have_rows('single_file') ) : the_row();?>	
										<p><span>Category:</span> <?php the_sub_field('category');?></p>
										
										<?php 
										$link = get_sub_field('link');
										if( $link ): 
										$link_url = $link['url'];
										$link_title = $link['title'];
										$link_target = $link['target'] ? $link['target'] : '_self';
										?>
										
										<h4><a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?><?php the_sub_field('title');?></a></h4>
									<?php endif; ?>
									
									
									<?php endwhile;?>
									
									<a class="arrow-right" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><img src="/wp-content/uploads/2019/01/Right-Arrow.png" alt="arrow-right"/></a>
									
									</div>
								<?php endif;?>
							<?php endwhile;?>
						<?php endif;?>		
					</div>		
					<?php endwhile;?>
				<?php endif;?>				
				<?php endwhile;?>
				</div>
			<?php endif;?>				
			</div>
		<?php endif;?>
		
		<?php if ( get_row_layout() == 'accordion_13_width' ) : ?>
		
			<div class="<?php the_sub_field('custom_class');?>">
				<div class="accordion-third-width container">
					<?php if( have_rows('accordion') ):?>
					<div class="accordion">
						<?php while ( have_rows('accordion') ) : the_row();?>	
					
						<?php if( have_rows('single_accordion') ):?>
							<?php while ( have_rows('single_accordion') ) : the_row();?>
							
							<h3><?php the_sub_field('title');?></h3>
							<div><p><?php the_sub_field('copy');?></p></div>
		
							<?php endwhile;?>		
						<?php endif;?>
	
						<?php endwhile;?>
					</div>	
			<?php endif;?>
			
			
			<?php if( have_rows('accordion') ):?>
				<div class="animation-wrap">
					<?php while ( have_rows('accordion') ) : the_row();?>	
						<?php if( have_rows('single_accordion') ):?>
							<?php while ( have_rows('single_accordion') ) : the_row();?>
							
							<div class="toggle-img" style="background-image: url(<?php the_sub_field('image');?>);"></div>
								
							<?php endwhile;?>		
						<?php endif;?>
					<?php endwhile;?>	
				</div>	
			<?php endif;?>					
					
				</div>
			</div>
		
		<?php endif;?>	


		<?php if ( get_row_layout() == 'accordion_just_copy' ) : ?>
		
			<div class="<?php the_sub_field('custom_class');?>">
			<?php if( have_rows('accordion') ):?>
			
				<div class="closed-accordion container">
					
				<?php while ( have_rows('accordion') ) : the_row();?>	
				
				<?php if( have_rows('single_accordion') ):?>
					<?php while ( have_rows('single_accordion') ) : the_row();?>
					
					<h3><?php the_sub_field('title');?></h3>
					<div><p><?php the_sub_field('copy');?></p></div>

					<?php endwhile;?>		
				<?php endif;?>

				<?php endwhile;?>
				</div>		
			<?php endif;?>
			</div>
		
		<?php endif;?>		
		

		<?php if ( get_row_layout() == 'three_col_polaroids_cards' ) : ?>
			
			<div class="three-col-polaroid-cards <?php the_sub_field('custom_class');?>">
				<div class="container">
					<div class="wrap">
					<?php if( have_rows('polaroid_cards') ):?>
						<?php while ( have_rows('polaroid_cards') ) : the_row();?>	
						
							<div class="single-card single-pol-card card-<?php echo get_row_index(); ?>">

							<?php if( have_rows('single_card') ):?>
								<?php while ( have_rows('single_card') ) : the_row();?>	
								
									<div class="inner">
										
										<div class="side front">
										
											<div class="img-wrap">
											<?php 
											$image = get_sub_field('image');
											$size = 'three_col_polaroids_card'; // (thumbnail, medium, large, full or custom size)
											if( $image ) {
											    echo wp_get_attachment_image( $image, $size );
											}?>
											</div>
											<h3><?php the_sub_field('heading');?></h3>
											
											<div class="mask">
												<button type="button">
													Learn More
												</button>	
											</div>
										
										</div>
										
										<div class="side back">
											<h3><?php the_sub_field('heading');?></h3>
											<p><?php the_sub_field('copy_on_back');?></p>
										</div>
										
									</div>
							
								<?php endwhile;?>
							<?php endif;?>
							
								</div>
					
						<?php endwhile;?>
					<?php endif;?>
					</div>
				</div>
			</div>
		
		<?php endif;?>		


		<?php if ( get_row_layout() == 'awards' ) : ?>
			
			<div class="awards-cards <?php the_sub_field('custom_class');?>">
				<div class="container">
				<?php if( have_rows('award_cards') ):?>
					<?php while ( have_rows('award_cards') ) : the_row();?>	
					
						<?php if( have_rows('single_card') ):?>
							<?php while ( have_rows('single_card') ) : the_row();?>	
							
							<div class="single-card card">
								<div class="inner">
									<div class="icon-wrap">
										<img src="<?php the_sub_field('image');?>"/>
									</div>
									<p class="year"><?php the_sub_field('year');?></p>
									<p class="name"><?php the_sub_field('award_name');?></p>
									
									<?php 
									$link = get_sub_field('link');
									if( $link ): 
									    $link_url = $link['url'];
									    $link_title = $link['title'];
									    $link_target = $link['target'] ? $link['target'] : '_self';
									    ?>
									    <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
									<?php endif; ?>

								</div>
							</div>
						
							<?php endwhile;?>
						<?php endif;?>
				
					<?php endwhile;?>
				<?php endif;?>
				</div>
			</div>
		
		<?php endif;?>	

		
		<?php if ( get_row_layout() == 'media_section' ) : ?>
		<div class="media-section">
			<div class="container">
				
				<div class="media-section-wrap">
				
					<?php if( have_rows('media_links') ):?>
						<?php while ( have_rows('media_links') ) : the_row();?>	
	
							<?php
							$post_object = get_sub_field('single_link');
							if( $post_object ): 
								$post = $post_object;
								setup_postdata( $post ); 
								?>					
							<div class="single-media-link">
								
								<div class="inner">
								
									<?php 
									$image = get_field('background_image');
									$size = 'full'; // (thumbnail, medium, large, full or custom size)
									if( $image ) {
										echo wp_get_attachment_image( $image, $size );
									}
									?>		
																
									<div class="mask"></div>
									
									<div class="text-wrap">
									
										<p><?php 
											if ( 'news' == get_post_type() ){
												$terms = get_the_terms( $post->ID , 'type-news' ); foreach ( $terms as $term ) { 
													if ($term->slug == 'press-release') {
														echo $term->name;
													}
												}	
												$terms = get_the_terms( $post->ID , 'type-news' ); foreach ( $terms as $term ) { 
													if ($term->slug == 'media-coverage') {
														echo 'Press';
													}
												}
											}
											
											
											if ( 'events' == get_post_type() ){ echo 'Events';}
										?></p>
										
										<h3><?php the_title(); ?></h3>
										
										<div class="read-now-wrap">
											<a href="<?php the_permalink(); ?>">Read Now <img src="/wp-content/uploads/2019/09/white.svg"></a>
										</div>
										
									</div>
									
								</div>
	
							</div>
							    <?php wp_reset_postdata();?>
							<?php endif; ?>
					
						<?php endwhile;?>
					<?php endif;?>
					
				</div>
				
			</div>
		</div>
		<?php endif;?>		


		<?php if ( get_row_layout() == 'study_results' ) : ?>
			<div class="study-results <?php the_sub_field('custom_class');?>">
				<div class="container">
					<div class="left">
						<label><?php the_sub_field('label');?></label>
						<div><?php the_sub_field('copy');?></div>
					</div>
					<div class="right">
						<h3><?php the_sub_field('graphic_heading');?></h3>
						<?php 
						$image = get_sub_field('graphic');
						$size = 'full';
						if( $image ) {
							echo wp_get_attachment_image( $image, $size );
						}
						?>
					</div>
				</div>
			</div>
		<?php endif;?>
		
		
		<?php if ( get_row_layout() == 'hover_accordion' ) : ?>
		
			<div class="hover-accordion-row <?php the_sub_field('custom_class');?>">
				<div class="container">
				<?php if( have_rows('accordion_cards') ):?>
					<?php while ( have_rows('accordion_cards') ) : the_row();?>	
					
					<?php if( have_rows('single_card') ):?>
						<div class="single-card">
							<div class="hover-accordion">
							<?php while ( have_rows('single_card') ) : the_row();?>
								
								<h4>
									<span class="label"><?php the_sub_field('label');?></span>
		
									<span class="title"><?php the_sub_field('title');?></span>
								</h4>
								<div><p><?php the_sub_field('copy');?></p></div>
								
		
							<?php endwhile;?>	
							</div>
						</div>	
					<?php endif;?>
	
					<?php endwhile;?>
				<?php endif;?>
				</div>
			</div>
		
		<?php endif;?>	
		
		
		<?php if ( get_row_layout() == 'banner' ) : ?>
		<?php $row = get_row_index();?>
		<?php $hide_border = get_sub_field('hide_border'); ?>
		<?php $color = get_sub_field('color'); ?>
		<?php $headingColor = get_sub_field('heading_color'); ?>
		<?php $topHeadingWeight = get_sub_field('heading_top_line_weight');?>
		<?php $bottomHeadingWeight = get_sub_field('heading_bottom_line_weight');?>
		
		<div class="page-head big landing <?php echo $hide_border ? '' : 'border'; ?> <?php echo ( $color == 'Blue' ) ? 'blue' : 'white'; ?> <?php if ( $white_content_background = get_sub_field('white_content_background') ):?>white-bg-hero-text<?php endif;?> <?php if ( $white_content_background = get_sub_field('new_landing_style') ):?>new_landing_style-hero-text <?php endif;?> <?php if ( $no_bottom_margin = get_sub_field('no_bottom_margin') ):?>no-bottom-margin<?php endif;?>">
			<?php if ( $background_image = get_sub_field('background_image') ) : ?>
			<div class="bg" style="background-image: url(<?php echo $background_image['url']; ?>);">
				
				<div class="home-animated-lines">
					<div class="left">
						<span id="l1"></span>
						<span id="l2"></span>
						<span id="l3"></span>
						<span id="l4"></span>
						<span id="l5"></span>
						<span id="l6"></span>
					</div>
					<div class="right">
						<span id="r1"></span>
						<span id="r2"></span>
						<span id="r3"></span>
						<span id="r4"></span>
						<span id="r5"></span>
						<span id="r6"></span>
						<span id="r7"></span>
						<span id="r8"></span>
						<span id="r9"></span>
						<span id="r10"></span>
						<span id="r11"></span>
						<span id="r12"></span>
					</div>
				</div>
				
			</div>
			<?php endif; ?>
			
			<?php if( have_rows('banner_navigation') ):?>
				<div id="banner-nav-wrap">
				<?php while ( have_rows('banner_navigation') ) : the_row();?>	
					<?php if( have_rows('nav_button') ):?>
						<?php while ( have_rows('nav_button') ) : the_row();?>	
						<a class="banner-nav-button" style="background-color: <?php the_sub_field('background_color');?>" href="<?php the_sub_field('link');?>" alt="outcomes-icon">
							<img src="<?php the_sub_field('icon');?>"/>
						</a>
						<?php endwhile;?>
					<?php endif;?>				
				<?php endwhile;?>
				</div>
			<?php endif;?>
			
			
		
			<div class="container">				
			
			<?php if(is_front_page() || is_page(2491)):?>
				
				<?php if ( $banner_image_for_home_page_mobile = get_sub_field('banner_image_for_home_page_mobile') ) : ?>
				
				<div id="banner_image_for_home_page_mobile">
				<?php

				$size = 'full'; // (thumbnail, medium, large, full or custom size)
				
				if( $banner_image_for_home_page_mobile ) {
				
					echo wp_get_attachment_image( $banner_image_for_home_page_mobile, $size );
				
				}?>
				</div>
				<?php endif;?>
			
			
				<div class="text">
					<?php if ( $show_breadcrumbs = get_sub_field('show_breadcrumbs') ) : ?>
					<?php
						if ( function_exists('yoast_breadcrumb') ) {
							yoast_breadcrumb('<div class="breadcrumbs">', '</div>');
						}
					?>
					<?php endif; ?>
<!--
					<?php if ( $heading = get_sub_field('heading') ) : ?>
					<h1 class="<?php echo $headingColor; ?>"><?php echo $heading; ?></h1>
					<?php endif; ?>
-->
					
					
					<?php if ( $headingTop = get_sub_field('heading_top_line') ) : ?>
					<h1><span class="<?php echo $headingColor; ?> <?php echo $topHeadingWeight;?>"><?php echo $headingTop; ?></span><br>
					<?php endif; ?>
					
					<?php if ( $headingBottom = get_sub_field('heading_bottom_line') ) : ?>
					<span class="<?php echo $headingColor; ?> <?php $bottomHeadingWeight;?>"><?php echo $headingBottom; ?></span></h1>
					<?php endif; ?>					
					
					<?php if ( $content = get_sub_field('content') ) : ?>
					<div class="<?php echo ( $color == 'Blue' ) ? 'black' : ''; ?>">
						<p><?php echo $content; ?></p>
					</div>
					<?php endif; ?>
					
					<div id="button-anchor-wrap" class="<?php if ($video_modal = get_sub_field('is_the_button_going_to_open_a_popup_with_a_video')): ?>j-modal-wrap<?php endif;?>">

						<?php if ( $video_modal = get_sub_field('is_the_button_going_to_open_a_popup_with_a_video') ) : ?>
						
						<a href="#modal-<?php echo $row;?>" class="open-modal btn login-btn btn btn-blue"><?php the_sub_field('video_popup_button_text');?></a>
						
						<div id="modal-<?php echo $row;?>" class="modal j-modal">
							<div style="padding:56.25% 0 0 0;position:relative;"><?php the_sub_field('video_link');?></div>
						</div>
						
						<?php else:?>
					
							<?php $button_text = get_sub_field('button_text'); ?>
							<?php $button_url = get_sub_field('button_url'); ?>
							<?php if ( $button_text && $button_url ) : ?>
							<a class="btn btn-blue" href="<?php echo $button_url; ?>"><?php echo $button_text; ?></a>
							<?php endif; ?>
						
						<?php endif;?>
							
					<?php if(is_page(2491)):?>
						<div class="home-anchor-link-wrap">
							<a class="home-anchor-link" href="/new-home/#contact">Contact Us</a>
						</div>
					<?php endif;?>
					</div>
					
					<?php if ( $links = get_sub_field('links') ) : ?>
					<ul class="fast-links">
						<?php foreach ( $links as $item ) : ?>
						<?php $item_text = $item['text']; ?>
						<?php $item_url = $item['url']; ?>
						<?php if ( $item_text && $item_url ) : ?>
						<li>
							<a href="<?php echo $item_url; ?>"><?php echo $item_text; ?> <i aria-hidden="true" class="fa fa-chevron-right"></i></a>
						</li>
						<?php endif; ?>
						<?php endforeach; ?>
					</ul>
					<?php endif; ?>
					

					<?php if ( $download_links = get_sub_field('download_links') ) : ?>
					<span class="download-links">
						<?php if ( $as_link_url = get_sub_field('as_link_url') ) : ?>
						<a href="<?php echo $as_link_url; ?>">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/APPSTOREBadge.png" alt="" srcset="<?php echo get_stylesheet_directory_uri(); ?>/images/APPSTOREBadge@2x.png 2x" />
						</a>
						<?php endif; ?>
						<?php if ( $gp_link_url = get_sub_field('gp_link_url') ) : ?>
						<a href="<?php echo $gp_link_url; ?>">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/google-play-badge.png" alt="" srcset="<?php echo get_stylesheet_directory_uri(); ?>/images/google-play-badge@2x.png 2x" />
						</a>
						<?php endif; ?>
					</span>
					<?php endif; ?>

					
				</div>
				<?php if ( $logo_image = get_sub_field('logo_image') ) : ?>
				<div class="logo-text">
					<img src="<?php echo $logo_image['url']; ?>" alt="<?php echo $logo_image['alt']; ?>" />
				</div>
				<?php endif; ?>
					
			<?php else:?>

				
				<?php if ( $white_content_background = get_sub_field('white_content_background') ) : ?>
				
				<div class="text white_content_background <?php if ($video_modal = get_sub_field('is_the_button_going_to_open_a_popup_with_a_video')): ?>j-modal-wrap<?php endif;?>">
					
					
				<div class="back-page-animated-lines">
					<span id="b1"></span>
					<span id="b2"></span>
					<span id="b3"></span>
					<span id="b4"></span>
					<span id="b5"></span>
					<span id="b6"></span>
					<span id="b7"></span>
					<span id="b8"></span>
					<span id="b9"></span>
					<span id="b10"></span>
					<span id="b11"></span>
					<span id="b12"></span>					
					<span id="b13"></span>					
					<span id="b14"></span>					
					<span id="b15"></span>					
					<span id="b16"></span>					
				</div>
					
				<?php else:?>
				
				<div class="text">
					
				<?php endif;?>
					
					<?php if ( $show_breadcrumbs = get_sub_field('show_breadcrumbs') ) : ?>
					<?php
						if ( function_exists('yoast_breadcrumb') ) {
							yoast_breadcrumb('<div class="breadcrumbs">', '</div>');
						}
					?>
					<?php endif; ?>
<!--
					<?php if ( $heading = get_sub_field('heading') ) : ?>
					<h1 class="<?php echo ( $color == 'Blue' ) ? 'blue' : ''; ?>"><?php echo $heading; ?></h1>
					<?php endif; ?>
-->
					
					<?php if ( $headingTop = get_sub_field('heading_top_line') ) : ?>
					<h1><span class="<?php echo $headingColor; ?> <?php echo $topHeadingWeight;?>"><?php echo $headingTop; ?></span><br>
					<?php endif; ?>
					
					<?php if ( $headingBottom = get_sub_field('heading_bottom_line') ) : ?>
					<span class="<?php echo $headingColor; ?> <?php $bottomHeadingWeight;?>"><?php echo $headingBottom; ?></span></h1>
					<?php endif; ?>	
					
					
					<?php if ( $content = get_sub_field('content') ) : ?>
					<?php $row = get_row_index();?>
					<div class="<?php echo ( $color == 'Blue' ) ? 'black' : ''; ?>">
						<p><?php echo $content; ?></p>
						
						<?php if ( $add_button_to_white_content_background = get_sub_field('add_button_to_white_content_background') ) : ?>
						
							<?php if ( $video_modal = get_sub_field('is_the_button_going_to_open_a_popup_with_a_video') ) : ?>
							
							<a href="#modal-<?php echo $row;?>" class="open-modal btn login-btn btn btn-blue"><?php the_sub_field('video_popup_button_text');?></a>
							
							<div id="modal-<?php echo $row;?>" class="modal j-modal">
								<div style="padding:56.25% 0 0 0;position:relative;"><?php the_sub_field('video_link');?></div>
							</div>
							
							<?php else:?>
						
								<?php 
								$link = get_sub_field('button_for_white_content_background');
								if( $link ): ?>
									<?php
										$link_url = $link['url'];
										$link_title = $link['title'];
										$link_target = $link['target'] ? $link['target'] : '_self';
										?>
										<a class="btn login-btn btn btn-blue" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
								<?php endif; ?>
							
							<?php endif;?>
							
						<?php endif; ?>
						
					</div>
					<?php endif; ?>
					
					<?php $button_text = get_sub_field('button_text'); ?>
					<?php $button_url = get_sub_field('button_url'); ?>
					<?php if ( $button_text && $button_url ) : ?>
					<a class="btn btn-blue" href="<?php echo $button_url; ?>"><?php echo $button_text; ?></a>
					<?php endif; ?>
					
					<?php if ( $links = get_sub_field('links') ) : ?>
					<ul class="fast-links">
						<?php foreach ( $links as $item ) : ?>
						<?php $item_text = $item['text']; ?>
						<?php $item_url = $item['url']; ?>
						<?php if ( $item_text && $item_url ) : ?>
						<li>
							<a href="<?php echo $item_url; ?>"><?php echo $item_text; ?> <i aria-hidden="true" class="fa fa-chevron-right"></i></a>
						</li>
						<?php endif; ?>
						<?php endforeach; ?>
					</ul>
					<?php endif; ?>
					

					<?php if ( $download_links = get_sub_field('download_links') ) : ?>
					<span class="download-links">
						<?php if ( $as_link_url = get_sub_field('as_link_url') ) : ?>
						<a href="<?php echo $as_link_url; ?>">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/APPSTOREBadge.png" alt="" srcset="<?php echo get_stylesheet_directory_uri(); ?>/images/APPSTOREBadge@2x.png 2x" />
						</a>
						<?php endif; ?>
						<?php if ( $gp_link_url = get_sub_field('gp_link_url') ) : ?>
						<a href="<?php echo $gp_link_url; ?>">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/google-play-badge.png" alt="" srcset="<?php echo get_stylesheet_directory_uri(); ?>/images/google-play-badge@2x.png 2x" />
						</a>
						<?php endif; ?>
					</span>
					<?php endif; ?>

					
				</div>
				<?php if ( $logo_image = get_sub_field('logo_image') ) : ?>
				<div class="logo-text">
					<img src="<?php echo $logo_image['url']; ?>" alt="<?php echo $logo_image['alt']; ?>" />
				</div>
				<?php endif; ?>
			<?php endif; ?>
			</div>
			
			<?php $flyout_text = get_sub_field('flyout_text'); ?>
			<?php $flyout_icon = get_sub_field('flyout_icon'); ?>
			<?php $flyout_img = get_sub_field('flyout_img'); ?>
			<?php if ( $flyout_text ) : ?>
			<div class="head-flyout">
				<div class="box-flyout">
					<?php if ( $flyout_img ) : ?>
					<div class="flayout-img">
						<img src="<?php echo $flyout_img['url'] ?>" alt="<?php echo $flyout_img['alt']; ?>" />
					</div>
					<?php endif; ?>
					<?php if ( $flyout_icon ) : ?>
					<div class="flayout-icon">
						<img src="<?php echo $flyout_icon['url'] ?>" alt="<?php echo $flyout_icon['alt']; ?>" />
					</div>
					<?php endif; ?>
					<p><?php echo $flyout_text; ?></p>
				</div>
			</div>
			<?php endif; ?>
				
		</div>
		<?php endif; ?>
		

		<?php if ( get_row_layout() == 'three_charts' ) : ?>
		
			<div class="three-charts">
				<div class="container">
					<div class="top">
						<?php 
						$image = get_sub_field('full_width_chart');
						$size = 'full'; // (thumbnail, medium, large, full or custom size)
						if( $image ) {
							echo wp_get_attachment_image( $image, $size );
						}
						?>	
					</div>
					
					<div class="bottom">
						<?php 
						$image = get_sub_field('left_half_width_chart');
						$size = 'full'; // (thumbnail, medium, large, full or custom size)
						if( $image ) {
							echo wp_get_attachment_image( $image, $size );
						}
						?>	
						
						<?php 
						$image = get_sub_field('right_half_width_chart');
						$size = 'full'; // (thumbnail, medium, large, full or custom size)
						if( $image ) {
							echo wp_get_attachment_image( $image, $size );
						}
						?>						
					</div>
				</div>
			</div>
		
		<?php endif; ?>



		<?php if ( get_row_layout() == 'split_slider' ) : ?>
		
			<div class="split-slider-wrap <?php the_sub_field('custom_class');?>">
				
				<div class="container">
					
					<div class="split-slider-inner">
				
						<div class="split-slider split-slider-left" style="visibility: hidden;">
		
						<?php if( have_rows('slides') ):?>
							<?php while ( have_rows('slides') ) : the_row();?>	
		
							<div class="single-split-slide">
								<div class="split-slider-flex">
								<?php if( have_rows('single_slide') ):?>
									<?php while ( have_rows('single_slide') ) : the_row();?>						
								<h3><?php the_sub_field('heading');?></h3>
								<p class="text"><?php the_sub_field('copy');?></p>
									<?php endwhile;?>
								<?php endif;?>		
								</div>				
							</div>
							
		
							<?php endwhile;?>
						<?php endif;?>
						</div>
		
						<div class="split-slider split-slider-right" style="visibility: hidden;">
		
						<?php if( have_rows('slides') ):?>
							<?php while ( have_rows('slides') ) : the_row();?>	
		
							<div class="single-split-slide">
<!-- 								<div class="split-slider-flex"> -->
								<?php if( have_rows('single_slide') ):?>
									<?php while ( have_rows('single_slide') ) : the_row();?>
									
									<?php 
									$image = get_sub_field('phone_image');
									$size = 'full'; // (thumbnail, medium, large, full or custom size)
									if( $image ) {
										echo wp_get_attachment_image( $image, $size );
									}
									?>							
									
									<?php endwhile;?>
								<?php endif;?>
<!-- 								</div>						 -->
							</div>
		
							<?php endwhile;?>
						<?php endif;?>
						
						</div>
						
					</div>
					
				</div>

			</div>
					
		<?php endif;?>
		
		
		<?php if ( get_row_layout() == 'logo_slider' ) : ?>
		
			<div class="logo-slider-wrap">
				<h2 class="container"><?php the_sub_field('heading');?></h2>
				<div class="logo-slider container" style="display: none;">
					<?php 
						$images = get_sub_field('logos');
						$size = 'full'; // (thumbnail, medium, large, full or custom size)
						
						if( $images ): ?>
				        <?php foreach( $images as $image ): ?>
						    <div class="single-slider-logo">
					            <?php echo wp_get_attachment_image( $image['ID'], $size ); ?>
				            </div>
				        <?php endforeach; ?>
					<?php endif; ?>
				</div>
			</div>
					
		<?php endif;?>
		
	
		<?php if ( get_row_layout() == 'menu_bar' ) : ?>
		<?php $menu = get_sub_field('menu'); ?>
		<div class="sub-cat full">
			<div class="container">
				<?php wp_nav_menu( array( 'menu' => $menu->name, 'menu_class' => 'main-', 'menu_id' => '', 'container' => 'nav', 'depth' => 0 ) ); ?>
			</div>
		</div>
		<?php endif; ?>
		
		<?php if ( get_row_layout() == 'text' ) : ?>
		<div class="text-section module background-color-<?php the_sub_field('background_color'); ?> text-color-<?php the_sub_field('text_color'); ?> <?php the_sub_field('text_block_class');?> <?php if ( $centeredHeading = get_sub_field('centered_heading') ) : ?>centered-heading<?php endif;?>">
			<div class="container">
				<?php if ( $heading = get_sub_field('heading') ) : ?>
				<h2><?php echo $heading; ?></h2>
				<div class="text-section-h2-pipe"></div>
				<?php endif; ?>
				<?php if ( $content = get_sub_field('content') ) : ?>
				<div class="copy"><?php echo $content; ?></div>
				<?php endif; ?>
				<?php if ( $footnote = get_sub_field('footnote') ) : ?>
				<p><small><?php echo $footnote; ?></small><p>
				<?php endif; ?>
			</div>
		</div>
		<?php endif; ?>
	
		
		<?php if ( get_row_layout() == 'content_image' ) : ?>
		<?php $row = get_row_index();?>
			<?php $image_alignment = get_sub_field('image_alignment'); ?>
			<?php $image_type = get_sub_field('image_type'); ?>
			<?php $background_color = get_sub_field('background_color'); ?>
			<?php $background_image = get_sub_field('background_image'); ?>
			<?php $content_bg_color = get_sub_field('content_bg_color'); ?>
			<?php $text_color = get_sub_field('text_color'); ?>
			
			<?php $style_bg_color = 'background-color: ' . $background_color . ';'; ?>
			<?php $style_cbg_color = 'background-color: ' . $content_bg_color . ';'; ?>
			<?php $text_color = 'color: ' . $text_color . ';'; ?>
			
			<?php if ( $main_title = get_sub_field('main_title') ) : ?>
			<div class="main-title">
				<div class="container">
					<h2><?php echo $main_title; ?></h2>
				</div>
			</div>
			<?php endif; ?>
			
			<div id="<?php the_sub_field('custom_id');?>" class="image-text-section <?php if ($video_modal = get_sub_field('is_the_button_going_to_open_a_popup_with_a_video')): ?>j-modal-wrap<?php endif;?> <?php echo ( $image_type == 'background' ) ? 'no-bg-img' : ''; ?> <?php echo ( $image_alignment == 'Right' ) ? 'image-on-right' : ''; ?> <?php if ($background_image):?>has-bg-img<?php endif;?> <?php the_sub_field('custom_class');?>" style="background-color:<?php the_sub_field('full_width_background_color');?>; <?php if ($background_image):?>background-image: url(<?php echo $background_image;?>);background-position: center center; background-repeat: no-repeat; background-size: cover;<?php endif;?>">
				
				<?php if ($background_image):?><div class="ti-bg-mask"></div><?php endif;?>
				
				<div class="container">
					
						<div class="text-above-img-wrap">
							<?php if(get_sub_field('bold_text_above_image')):?> 
								<p class="bold_text_above_image"><?php the_sub_field('bold_text_above_image');?></p>
							<?php endif;?>
							
							<?php if(get_sub_field('thin_text_above_image')):?> 
								<p class="thin_text_above_image"><?php the_sub_field('thin_text_above_image');?></p>
							<?php endif;?>
						</div>
							
					<?php if ( $image = get_sub_field('image') ) : ?>
					
					<?php if ( $image_type == 'background' ) : ?>
					<div class="image-half" style="background-image:url(<?php echo $image['url']; ?>);">
	
						<?php if ( $show_quote = get_sub_field('show_quote') ) : ?>
						<div class="quote">
							<?php if ( $quote_text = get_sub_field('quote_text') ) : ?>
							<?php echo $quote_text; ?>
							<?php endif; ?>
							<?php if ( $quote_author = get_sub_field('quote_author') ) : ?>
							<span><?php echo $quote_author; ?></span>
							<?php endif; ?>
						</div>
						<?php endif; ?>
					</div>
					<?php else : ?>
					<div class="image-half <?php echo ( $image_type == 'image_padding' ) ? 'top-bottom-padding' : ''; ?> <?php echo ( $image_type == 'responsive' ) ? 'responsive' : ''; ?> <?php echo ( $image_type == 'left_aligned_padded' ) ? 'left_aligned' : ''; ?> <?php echo ( $image_type == 'right_aligned_padded' ) ? 'right_aligned' : ''; ?>" style="<?php echo $style_bg_color; ?>">
						
	
						
						
						<?php if ( $show_quote = get_sub_field('show_quote') ) : ?>
						<div class="quote">
							<?php if ( $quote_text = get_sub_field('quote_text') ) : ?>
							<?php echo $quote_text; ?>
							<?php endif; ?>
							<?php if ( $quote_author = get_sub_field('quote_author') ) : ?>
							<span><?php echo $quote_author; ?></span>
							<?php endif; ?>
						</div>
						<?php endif; ?>
						<div class="home-image-grid"><img src="<?php echo $image['sizes']['content_image']; ?>" alt="<?php echo $image['alt']; ?>" srcset="<?php echo $image['sizes']['content_image_2x']; ?> 2x" /></div>
					</div>
					<?php endif; ?>
					
					<?php endif; ?>
					<div class="text-half" style="<?php echo $style_cbg_color; ?>">
						<div class="<?php if ( $wide_copy = get_sub_field('wide_copy')):?>wide-copy<?php endif;?>">
							
							<?php if(get_sub_field('bold_text_above_form')):?> 
								<p class="bold_text_above_form"><?php the_sub_field('bold_text_above_form');?></p>
							<?php endif;?>
							
							<?php if(get_sub_field('thin_text_above_form')):?> 
								<p class="thin_text_above_form"><?php the_sub_field('thin_text_above_form');?></p>
							<?php endif;?>
							
							<?php if ( $heading = get_sub_field('heading') ) : ?>
							<h2 style="<?php echo $text_color; ?>"><?php echo $heading; ?></h2>
							<div class="image-text-section-h2-pipe"></div>
							<?php endif; ?>
							
							<?php if ( $content = get_sub_field('content') ) : ?>
							<section style="<?php echo $text_color; ?>">
								<?php if ( $subheading = get_sub_field('sub-heading') ) : ?>
								<h3><?php echo $subheading ?></h3>
								<?php endif;?>
								<p><?php echo $content; ?></p>
								
								
								
								
								<?php if(get_sub_field('form_embed')):?> 
									<?php echo do_shortcode(get_sub_field('form_embed', false, false));?>
								<?php endif;?>
							</section>
							<?php endif; ?>
							
							<?php if ( $text_editor = get_sub_field('text_editor') ) : ?>
							<section class="text-editor-copy">
							<?php echo $text_editor; ?>
							</section>
							<?php endif; ?>
							
							<?php if ( $download_links = get_sub_field('download_links') ) : ?>
							<span class="download-links">
								<?php if ( $as_link_url = get_sub_field('as_link_url') ) : ?>
								<a href="<?php echo $as_link_url; ?>">
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/APPSTOREBadge.png" alt="" srcset="<?php echo get_stylesheet_directory_uri(); ?>/images/APPSTOREBadge@2x.png 2x" />
								</a>
								<?php endif; ?>
								<?php if ( $gp_link_url = get_sub_field('gp_link_url') ) : ?>
								<a href="<?php echo $gp_link_url; ?>">
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/google-play-badge.png" alt="" srcset="<?php echo get_stylesheet_directory_uri(); ?>/images/google-play-badge@2x.png 2x" />
								</a>
								<?php endif; ?>
							</span>
							<?php endif; ?>
							<?php if ( $show_list = get_sub_field('show_list') ) : ?>
							<ul class="list-with-icons" style="<?php echo $text_color; ?>">
								<?php while ( has_sub_field('items') ) : ?>
								<li>
									<?php if ( $image = get_sub_field('image') ) : ?>
									<span><img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" /></span>
									<?php endif; ?>
									<?php if ( $text = get_sub_field('text') ) : ?>
									<p><?php echo $text; ?></p>
									<?php endif; ?>
								</li>
								<?php endwhile; ?>
							</ul>
							<?php endif; ?>


							<?php $button_text = get_sub_field('button_text'); ?>
							<?php $button_url = get_sub_field('button_url'); ?>
							
							<?php if ( $video_modal = get_sub_field('is_the_button_going_to_open_a_popup_with_a_video') ) : ?>
								<a href="#modal-<?php echo $row;?>" class="open-modal btn login-btn btn btn-blue"><?php echo $button_text;?></a>
								<div id="modal-<?php echo $row;?>" class="modal j-modal">
									<div style="padding:56.25% 0 0 0;position:relative;"><?php the_sub_field('popup_video_link');?></div>
								</div>
							<?php else:?>
							
								<?php if ( $button_text && $button_url ) : ?>
								<a class="btn btn-blue" href="<?php echo $button_url; ?>"><?php echo $button_text; ?></a>
								<?php endif; ?>
							
							<?php endif;?>
							
							<?php if(get_sub_field('pardot_form_embed')):?> 
								<?php the_sub_field('pardot_form_embed');?>
							<?php endif;?>
														
						</div>
					</div>
				</div>
			</div>
		<?php endif; ?>
		

		<?php if ( get_row_layout() == 'justified_images_w_text' ) : ?>
		<div class="image-text-section justified_images_w_text <?php the_sub_field('custom_class');?>">
			<div class="container">		
				<div class="image-half">
					<?php 
					$image = get_sub_field('image_1');
					if( !empty( $image ) ): ?>
					    <div class="img-wrap"><img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" /><div class="mask"></div></div>
					<?php endif; ?>
					
					<?php 
					$image = get_sub_field('image_2');
					if( !empty( $image ) ): ?>
					    <div class="img-wrap"><img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" /><div class="mask"></div></div>
					<?php endif; ?>
					
					<?php 
					$image = get_sub_field('image_3');
					if( !empty( $image ) ): ?>
					    <div class="img-wrap"><img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" /><div class="mask"></div></div>
					<?php endif; ?>
					
					<?php 
					$image = get_sub_field('image_4');
					if( !empty( $image ) ): ?>
					    <div class="img-wrap"><img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" /><div class="mask"></div></div>
					<?php endif; ?>
				
				</div>
				
				<div class="text-half">
					<div>
						<h2><?php the_sub_field('heading');?></h2>
						<div class="image-text-section-h2-pipe"></div>
						<section>
							<p><?php the_sub_field('text');?></p>
							<?php 
							$link = get_sub_field('link');
							if( $link ): 
							    $link_url = $link['url'];
							    $link_title = $link['title'];
							    $link_target = $link['target'] ? $link['target'] : '_self';
							    ?>
							    <a class="btn btn-blue" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
							<?php endif; ?>
						</section>
					</div>
				</div>
				
			</div>
		</div>
		<?php endif; ?>

		
		<?php if ( get_row_layout() == 'get_the_app' ) : ?>
		<div id="get-the-app" class="get_the_app <?php the_sub_field('custom_class');?>">
			<div class="container">
			
				<h2><?php the_sub_field('title');?></h2>
				
				<h3><?php the_sub_field('sub-title');?></h3>
				
				<div class="three-phones-wrap">
					<?php if( have_rows('phone_steps') ):?>
						<?php while ( have_rows('phone_steps') ) : the_row();?>	

						<?php if( have_rows('step_one') ):?>
							<?php while ( have_rows('step_one') ) : the_row();?>	
							<div class="app-single-phone as-phone-1">
								<p class="as-step-digit">1</p>
								<div class="get-app-text"><?php the_sub_field('copy');?></div>
								<?php 
								$image = get_sub_field('phone_image');
								if( !empty($image) ): ?>
									<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
								<?php endif; ?>
							</div>
							<?php endwhile;?>
						<?php endif;?>

						<?php if( have_rows('step_two') ):?>
							<?php while ( have_rows('step_two') ) : the_row();?>	
							<div class="app-single-phone as-phone-2">
								<p class="as-step-digit">2</p>
								<div class="get-app-text"><?php the_sub_field('copy');?></div>
								<?php 
								$image = get_sub_field('phone_image');
								if( !empty($image) ): ?>
									<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
								<?php endif; ?>
							</div>
							<?php endwhile;?>
						<?php endif;?>
						
						<?php if( have_rows('step_three') ):?>
							<?php while ( have_rows('step_three') ) : the_row();?>	
							<div class="app-single-phone as-phone-3">
								<p class="as-step-digit">3</p>
								<div class="get-app-text"><?php the_sub_field('copy');?></div>
								<?php 
								$image = get_sub_field('phone_image');
								if( !empty($image) ): ?>
									<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
								<?php endif; ?>
							</div>
							<?php endwhile;?>
						<?php endif;?>
																
						<?php endwhile;?>
					<?php endif;?>
				</div>
				
				<div class="computer-steps-wrap">
					<?php if( have_rows('computer_steps') ):?>
						<?php while ( have_rows('computer_steps') ) : the_row();?>
						
						<h3><?php the_sub_field('sub-title');?></h3>
						
						<?php 
						$image = get_sub_field('image');
						if( !empty($image) ): ?>
							<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
						<?php endif; ?>						
						
						<div class="get-app-text"><span class="as-step-digit">1</span><?php the_sub_field('step_one');?></div>
				
						<div class="get-app-text"><span class="as-step-digit">2</span><?php the_sub_field('step_two');?></div>
													
						<?php endwhile;?>
					<?php endif;?>
					
			</div>
			
			<div class="get-app-disclaimer"><?php the_sub_field('disclaimer');?></div>
			
		</div>
		<?php endif;?>		
		
		
		<?php if ( get_row_layout() == 'sticky_cta' ) : ?>
		
			<div id="sticky-cta-wrap" class="container">
				
			<?php 
			
			$link = get_sub_field('link');
			
			if( $link ): 
				$link_url = $link['url'];
				$link_title = $link['title'];
				$link_target = $link['target'] ? $link['target'] : '_self';
				?>	
							
				<a id="sticky-cta" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
					
					<span><?php the_sub_field('text');?></span>
					
					<?php 
	
					$image = get_sub_field('icon');
					
					if( !empty($image) ): ?>
					
						<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
					
					<?php endif; ?>
					
				</a>
			
			<?php endif; ?>

			</div>

		<?php endif;?>
		
		
		<?php if ( get_row_layout() == 'spotlight_employee' ) : ?>
<!--
		<?php $image_alignment = get_sub_field('image_alignment'); ?>
		<?php $image_type = get_sub_field('image_type'); ?>
		<?php $background_color = get_sub_field('background_color'); ?>
		<?php $content_bg_color = get_sub_field('content_bg_color'); ?>
		<?php $text_color = get_sub_field('text_color'); ?>
		
		<?php $style_bg_color = 'background-color: ' . $background_color . ';'; ?>
		<?php $style_cbg_color = 'background-color: ' . $content_bg_color . ';'; ?>
		<?php $text_color = 'color: ' . $text_color . ';'; ?>
-->
		
		<div id="<?php the_sub_field('custom_id');?>" class="image-text-section spotlight-employee">
			<div class="container">
				<?php if ( $image = get_sub_field('image') ) : ?>
				
				<div class="image-half">
					
					<div class="sp-img-wrap">
						<img src="<?php echo $image['sizes']['content_image']; ?>" alt="<?php echo $image['alt']; ?>" srcset="<?php echo $image['sizes']['content_image_2x']; ?> 2x" />
				
						<div class="employee-info">
							<p class="employee_name"><?php the_sub_field('employee_name');?></p>
							<p class="employee_title"><?php the_sub_field('employee_title');?></p>
						</div>		
					</div>		
				</div>
				<?php endif; ?>
				<div class="text-half">
					<div>
						<?php if ( $heading = get_sub_field('heading') ) : ?>
						<h2 style="<?php echo $text_color; ?>"><?php echo $heading; ?></h2>
						<div class="image-text-section-h2-pipe"></div>
						<?php endif; ?>
						
						<?php if ( $content = get_sub_field('content') ) : ?>
						<section class="spotlight-quote-wrap">

							<p><?php echo $content; ?></p>
						</section>
						<?php endif; ?>
						
						<?php $button_text = get_sub_field('button_text'); ?>
						<?php $button_url = get_sub_field('button_url'); ?>
						<?php if ( $button_text && $button_url ) : ?>
						<a class="btn btn-blue" href="<?php echo $button_url; ?>"><?php echo $button_text; ?></a>
						<?php endif; ?>						
						
					</div>
				</div>
			</div>
		</div>
		<?php endif; ?>
		
		<?php if ( get_row_layout() == 'footer_cta' ) : ?>
		
			<div class="footer-cta">
				
				<div class="container">
					
					<h2><?php the_sub_field('heading');?></h2>
					
					<div class="link-wrap">
						<?php 
						$link = get_sub_field('left_link');
						if( $link ): 
							$link_url = $link['url'];
							$link_title = $link['title'];
							$link_target = $link['target'] ? $link['target'] : '_self';
							?>
							<a class="btn btn-blue" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
						<?php endif; ?>
						
						<?php 
						$link = get_sub_field('right_link');
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
		
		<?php endif; ?>
		
		<?php if ( get_row_layout() == 'study_module_with_icons' ) : ?>
		
			<div class="study-module">
				<div class="container">
					<div class="left">
					<?php 
					$image = get_sub_field('abstract_image');
					$size = 'full'; // (thumbnail, medium, large, full or custom size)
					if( $image ) {
						echo wp_get_attachment_image( $image, $size );
					}
					?>
					
					<?php 
					$link = get_sub_field('abstract_link');
					if( $link ): 
						$link_url = $link['url'];
						$link_title = $link['title'];
						$link_target = $link['target'] ? $link['target'] : '_self';
						?>
						<a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
					<?php endif; ?>
					
					</div>

					<div class="right">
						
						<?php if( have_rows('study_detail_rows') ):?>
							<?php while ( have_rows('study_detail_rows') ) : the_row();?>	
							<?php if( have_rows('single_row') ):?>
								<?php while ( have_rows('single_row') ) : the_row();?>	
								<div class="row">
									<div class="left">
									<?php 
									$image = get_sub_field('icon');
									$size = 'full'; // (thumbnail, medium, large, full or custom size)
									if( $image ) {
										echo wp_get_attachment_image( $image, $size );
									}
									?>
									</div>
									
									<div class="right">
										<h4><?php the_sub_field('heading');?></h4>
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
		
		<?php endif; ?>


		<?php if ( get_row_layout() == 'study_module' ) : ?>
		
			<div class="study-module">
				<div class="container">
					<div class="left">
					<?php 
					$image = get_sub_field('abstract_image');
					$size = 'full'; // (thumbnail, medium, large, full or custom size)
					if( $image ) {
						echo wp_get_attachment_image( $image, $size );
					}
					?>
					
					<?php 
					$link = get_sub_field('abstract_link');
					if( $link ): 
						$link_url = $link['url'];
						$link_title = $link['title'];
						$link_target = $link['target'] ? $link['target'] : '_self';
						?>
						<a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
					<?php endif; ?>
					
					</div>

					<div class="right">
						
						<?php the_sub_field('methodology');?>
						
							<?php if( have_rows('accordion') ):?>
								<div class="closed-accordion">
								<?php while ( have_rows('accordion') ) : the_row();?>	
								<?php if( have_rows('single_row') ):?>
									<?php while ( have_rows('single_row') ) : the_row();?>	
									<h3><?php the_sub_field('label');?></h3>
									<div><div class="single_file_wrap"><?php the_sub_field('content');?></div></div>
								<?php endwhile;?>
							<?php endif;?>
							<?php endwhile;?>
							</div>
						<?php endif;?>

					</div>				
				</div>
			</div>
		
		<?php endif; ?>

		
		<?php if ( get_row_layout() == 'cost_saving' ) : ?>
		<?php $background_image = get_sub_field('background_image'); ?>
		<?php $style = 'background-image: url(' . $background_image['url'] . ');'; ?>
		<div class="cost-saving" style="<?php echo $style; ?>">
			<div class="container">
				<div class="text-sec">
					<?php if ( $heading = get_sub_field('heading') ) : ?>
					<h3><?php echo $heading; ?></h3>
					<?php endif; ?>
					<ul>
						<?php while ( has_sub_field('list') ) : ?>
						<?php if ( $item = get_sub_field('item') ) : ?>
						<li><?php echo $item; ?></li>
						<?php endif; ?>
						<?php endwhile; ?>
					</ul>
					<?php $button_text = get_sub_field('button_text'); ?>
					<?php $button_url = get_sub_field('button_url'); ?>
					<?php if ( $button_text && $button_url ) : ?>
					<a class="btn btn-blue" href="<?php echo $button_url; ?>"><?php echo $button_text; ?></a>
					<?php endif; ?>
					<?php if ( $footnote = get_sub_field('footnote') ) : ?>
					<p><small><?php echo $footnote; ?></small><p>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<?php endif; ?>
		
		<?php if ( get_row_layout() == 'our_team' ) : ?>
		<div class="our-team container">
			<?php if ( $background_image = get_sub_field('background_image') ) : ?>
			<div class="our-team-img">
				<div style="background-image:url(<?php echo $background_image['url']; ?>);"></div>
			</div>
			<?php endif; ?>
			<div class="our-team-text">
					<?php if ( $heading = get_sub_field('heading') ) : ?>
					<h2><?php echo $heading; ?></h2>
					<div class="image-text-section-h2-pipe"></div>
					<?php endif; ?>
					<?php if ( $content = get_sub_field('content') ) : ?>
					<p><?php echo $content; ?></p>
					<?php endif; ?>
					<ul>
						<?php while ( has_sub_field('items') ) : ?>
						<li>
							<div class="shadow"></div>
							<div class="inner">
						
								<?php if ( $image = get_sub_field('image') ) : ?>
								<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
								<?php endif; ?>
								<?php if ( $text = get_sub_field('text') ) : ?>
								<div><?php echo $text; ?></div>
								<?php endif; ?>
								
							</div>
						</li>
						<?php endwhile; ?>
					</ul>
			</div>
		</div>	
		<?php endif; ?>
		
		<?php if ( get_row_layout() == 'watch_video' ) : ?>
		<?php $background_image = get_sub_field('background_image'); ?>
		<?php $style = $background_image ? 'background-image:url(' . $background_image['url'] . ');' : ''; ?>
		<div class="watch-video container" style="<?php echo $style; ?>">
			<div class="container">
				<?php if ( $heading = get_sub_field('heading') ) : ?>
				<h3><?php echo $heading; ?></h3>
				<?php endif; ?>
				<?php if ( $content = get_sub_field('content') ) : ?>
				<p><?php echo $content; ?></p>
				<?php endif; ?>
				<?php $button_type = get_sub_field('button_type'); ?>
				
				<?php $button_text = get_sub_field('button_text'); ?>
				<?php $button_url = get_sub_field('button_url'); ?>
				<?php if ( $button_text && $button_url ) : ?>
				<a <?php echo ( $button_type == 'Modal' ) ? 'data-fancybox' : ''; ?> href="<?php echo $button_url; ?>" class="btn blue-btn"><?php echo $button_text; ?></a>
				<?php endif; ?>
			</div>
		</div>
		<?php endif; ?>
		
		<?php if ( get_row_layout() == 'testimonials' ) : ?>
		<div class="testimonials">
			<div class="container">
				<?php if ( $image = get_sub_field('image') ) : ?>
				<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
				<?php endif; ?>
				<?php if ( $text = get_sub_field('text') ) : ?>
				<?php echo $text; ?>
				<?php endif; ?>
			</div>
		</div>
		<?php endif; ?>
		
		<?php if ( get_row_layout() == 'request_demo' ) : ?>
		<div id="request-a-demo" class="request-a-demo">
			<div class="container">
				<div class="demo-left">
					<?php if ( $heading = get_sub_field('heading') ) : ?>
					<h4><?php echo $heading; ?></h4>
					<?php endif; ?>
					<?php if ( $form_embed = get_sub_field('form_embed') ) : ?>
					<div class="demo-form">
						<?php echo do_shortcode($form_embed); ?>
					</div>
					<?php endif; ?>
					
					
					<?php if(get_sub_field('pardot_form_embed')):?> 
						<?php the_sub_field('pardot_form_embed');?>
					<?php endif;?>
					
				</div>
				
				<div class="demo-right">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/bluestar-center_iphone.png" alt="" srcset="<?php echo get_stylesheet_directory_uri(); ?>/images/bluestar-center_iphone@2x.png 2x" />
				</div>
				
			</div>
		</div>
		<?php endif; ?>
		
		<?php if ( get_row_layout() == 'partners' ) : ?>
		<div class="truster-row">
			<div class="container">
				<?php if ( $heading = get_sub_field('heading') ) : ?>
				<h3><?php echo $heading; ?></h3>
				<?php endif; ?>
				<?php $items = get_sub_field('partners'); ?>
				<ul>
					<?php foreach ( $items as $item ) : ?>
					<?php if ( $image = $item['image'] ) : ?>
					<li><img src="<?php echo $image['sizes']['partners_image']; ?>" srcset="<?php echo $image['sizes']['partners_image_2x']; ?> 2x" alt="<?php echo $image['alt']; ?>"></li>
					<?php endif; ?>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
		<?php endif; ?>
		
		<?php if ( get_row_layout() == 'spotlight_content' ) : ?>
		<div class="more-about-row">
			<div class="container">
				<?php if ( $heading = get_sub_field('heading') ) : ?>
				<h2 class="title"><?php echo $heading; ?></h2>
				<?php endif; ?>
				<?php $items = get_sub_field('items'); ?>
				<div class="feats-list">
					<section>
						<?php for ( $i = 0; $i < 2; $i++ ) : ?>
						<?php $item = $items[$i]; ?>
						<?php if ( !empty($item) ) : ?>
						<?php $image = $item['image']; ?>
						<?php $term = $item['term']; ?>
						<?php $title = $item['title']; ?>
						<?php $link_text = $item['link_text']; ?>
						<?php $link_url = $item['link_url']; ?>
						<article>
							<a href="<?php echo $link_url; ?>">
								<?php if ( $image ) : ?>
								<div class="image">
									<img alt="<?php echo $image['alt']; ?>" src="<?php echo $image['sizes']['more_image_one']; ?>">
								</div>
								<?php endif; ?>
								<div class="text">
									<?php if ( $term ) : ?>
									<h4><?php echo $term; ?></h4>
									<?php endif; ?>
									<?php if ( $title ) : ?>
									<h3><?php echo $title; ?></h3>
									<?php endif; ?>
									<?php if ( $link_text ) : ?>
									<span class="more"><?php echo $link_text; ?> <i aria-hidden="true" class="fa fa-arrow-right"></i></span>
									<?php endif; ?>
								</div>
							</a>
						</article>
						<?php endif; ?>
						<?php endfor; ?>
					</section>
				</div>
				<div class="press-list">
					<section>
						<?php for ( $i = 2; $i < 6; $i++ ) : ?>
						<?php $item = $items[$i]; ?>
						<?php if ( !empty($item) ) : ?>
						<?php $image = $item['image']; ?>
						<?php $term = $item['term']; ?>
						<?php $title = $item['title']; ?>
						<?php $link_text = $item['link_text']; ?>
						<?php $link_url = $item['link_url']; ?>
						<article>
							<a href="<?php echo $link_url; ?>">
								<?php if ( $image ) : ?>
								<div class="image">
									<img alt="<?php echo $image['alt']; ?>" src="<?php echo $image['sizes']['more_image_two']; ?>" srcset="<?php echo $image['sizes']['more_image_two_2x']; ?> 2x">
								</div>
								<?php endif; ?>
								<?php if ( $term ) : ?>
								<h4><?php echo $term; ?></h4>
								<?php endif; ?>
								<?php if ( $title ) : ?>
								<h3><?php echo $title; ?></h3>
								<?php endif; ?>
								<?php if ( $link_text ) : ?>
								<span class="more"><?php echo $link_text; ?> <i aria-hidden="true" class="fa fa-arrow-right"></i></span>
								<?php endif; ?>
							</a>
						</article>
						<?php endif; ?>
						<?php endfor; ?>
					</section>
				</div>
			</div>
		</div>
		<?php endif; ?>
		
		<?php if ( get_row_layout() == 'quote' ) : ?>
		<div class="quote-section <?php the_sub_field('custom_class');?>">
			<div class="container">
				<?php if ( $text = get_sub_field('text') ) : ?>
				<?php echo $text; ?>
				<?php endif; ?>
				<div class="image-text-section-h2-pipe"></div>
				<?php if ( $author = get_sub_field('author') ) : ?>
				<span><?php echo $author; ?></span>
				<?php endif; ?>
			</div>
		</div>
		<?php endif; ?>
		
		
		
		<? if ( get_row_layout() == 'team_element') : ?>
			<?php if( have_rows('image_cards') ):?>
				<?php while ( have_rows('image_cards') ) : the_row();?>	
				
				<section id="img-card-section">
					
					<div id="img-card-section-left" class="img-card-column">
					<?php if( have_rows('left') ):?>
						<?php while ( have_rows('left') ) : the_row();?>
						
							<div class="card-img-wrap">
							<?php 
							$image = get_sub_field('single_image');
							$size = 'full'; 
							if( $image ) {
								echo wp_get_attachment_image( $image, $size );
							}
							?>			
							</div>
			
						<?php endwhile;?>
					<?php endif;?>
						
					</div>
					
					<div class="center-col-text <?php if(get_sub_field('add_button') == 'true'):?>has-button<?php endif;?>">
						<h2 id="team-copy"><?php the_sub_field('copy');?></h2>
						
							<?php if(get_sub_field('add_button') == 'true'):?>
								<?php 
								$link = get_sub_field('button');
								if( $link ): 
								    $link_url = $link['url'];
								    $link_title = $link['title'];
								    $link_target = $link['target'] ? $link['target'] : '_self';
								    ?>
								    <a class="btn-blue btn" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
								<?php endif; ?>
							
							
							<?php endif;?>
						
						
							<?php if( have_rows('featured_in') ):?>
								<?php while ( have_rows('featured_in') ) : the_row();?>	
								<h2 id="featured-in-label"><?php the_sub_field('label');?></h2>
								<?php if( have_rows('logos') ):?>
									<?php while ( have_rows('logos') ) : the_row();?>							
									<div class="single_logo-wrap">
										<?php 
										$image = get_sub_field('single_logo');
										$size = 'full';
										if( $image ) {
											echo wp_get_attachment_image( $image, $size );
										}
										?>
									</div>
									<?php endwhile;?>
								<?php endif;?>
								<?php endwhile;?>
							<?php endif;?>
												
					</div>
					
					<div id="img-card-section-right" class="img-card-column">
					<?php if( have_rows('right') ):?>
						<?php while ( have_rows('right') ) : the_row();?>	
							<div class="card-img-wrap">
							<?php 
							$image = get_sub_field('single_image');
							$size = 'full'; 
							if( $image ) {
								echo wp_get_attachment_image( $image, $size );
							}
							?>
							</div>
			
						<?php endwhile;?>
					<?php endif;?>			
					</div>
			
				</section>
				
				<?php endwhile;?>
			<?php endif;?>	
		<?php endif;?>
		
		<? if ( get_row_layout() == 'three_card_set') : ?>
			<div class="three_card_group-wrap text-section text-color-<?php the_sub_field('text_color');?> <?php the_sub_field('custom_class');?>">
				<div class="container" style="background-image: url(<?php the_sub_field('background_image');?>)">
				<?php if(get_sub_field('heading')):?>
					<h2><?php the_sub_field('heading');?></h2>
					<div class="image-text-section-h2-pipe"></div>
				<?php endif;?>
				<?php if(get_sub_field('content')):?>
					<p><?php the_sub_field('content');?></p>
				<?php endif;?>
				<?php if( have_rows('three_card_group') ):?>
					<?php while ( have_rows('three_card_group') ) : the_row();?>	
							<div class="three-card-group <?php the_sub_field('custom_class');?>">
						<?php if( have_rows('three_cards') ):?>
							<div class="three-col-wrap">
							<?php while ( have_rows('three_cards') ) : the_row();?>	
							
								<?php if( have_rows('single_card') ):?>
									<?php while ( have_rows('single_card') ) : the_row();?>	
										<div class="three-col <?php $has_link = get_sub_field('link'); if( $has_link ):?>card-with-link<?php endif;?>">
											<div class="shadow"></div>
											
											<div class="inner">
											
												<?php 
												$image = get_sub_field('icon');
												$size = 'full'; // (thumbnail, medium, large, full or custom size)
												if( $image ) {
													echo wp_get_attachment_image( $image, $size );
												}
												?>		
												<p><?php the_sub_field('text')?></p>
												<? $link = get_sub_field('link');
													if( $link ): 
														$link_url = $link['url'];
														$link_title = $link['title'];
														$link_target = $link['target'] ? $link['target'] : '_self';
														?>
													<a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?> <img class="col-right-arrow" src="http://www.welldoc.com/wp-content/uploads/2019/02/right-arrow.svg" width="14px"/></a>
												<?php endif; ?>
												
											</div>
												
										</div>
									<?php endwhile;?>
								<?php endif;?>
							<?php endwhile;?>
							</div>
						<?php endif;?>	
							</div>
					<?php endwhile;?>
				<?php endif;?>
				
				<?php
				$showTwo = get_sub_field('add_two_cards');
				if( $showTwo && in_array('yes', $showTwo) ): ?>
				
				<div class="trans-two-col">
				<?php if( have_rows('transparent_cards') ):?>
					<?php while ( have_rows('transparent_cards') ) : the_row();?>

					<?php if( have_rows('single_card') ):?>
						<?php while ( have_rows('single_card') ) : the_row();?>
						
						<div class="single-trans-card">
							<h4><?php the_sub_field('heading');?></h4>
							<div class="lr-wrap">
								<div class="left">
									<?php 
									$image = get_sub_field('icon');
									$size = 'full';
									if( $image ) {
										echo wp_get_attachment_image( $image, $size );
									}
									?>
								</div>
	
								<div class="right">
									<p><?php the_sub_field('copy');?></p>
								</div>
							</div>
						</div>
						
						<?php endwhile;?>
					<?php endif;?>	
					
					<?php endwhile;?>
				<?php endif;?>									
				</div>
				
				<?php endif; ?>
				
				
				

				</div>
			</div>
		<?php endif;?>
		
		
		<? if ( get_row_layout() == 'video_quote') : ?>
		<?php $row = get_row_index();?>
			<div class="video-quote image-text-section image-on-right <?php the_sub_field('custom_class');?>">
				
				<div class="container inner">
				
						<div class="image-half responsive">
							
							<div class="home-image-grid">
							<?php 
							$image = get_sub_field('image');
							$size = 'full';
							if( $image ) {
								echo wp_get_attachment_image( $image, $size );
							}
							?>
							</div>
							
						</div>
						
						<div class="text-half <?php if ($video_modal = get_sub_field('is_the_button_going_to_open_a_popup_with_a_video')): ?>j-modal-wrap<?php endif;?>">
							<div class="small-pipe"></div>
							<p class="quote"><?php the_sub_field('quote');?></p>
							<p class="author"><?php the_sub_field('author');?></p>
							
							<?php if ( $video_modal = get_sub_field('is_the_button_going_to_open_a_popup_with_a_video') ) : ?>
							
								<a href="#modal-<?php echo $row;?>" class="open-modal btn login-btn btn btn-blue"><?php the_sub_field('video_popup_button_text');?></a>
									
								<div id="modal-<?php echo $row;?>" class="modal j-modal">
									<div style="padding:56.25% 0 0 0;position:relative;"><?php the_sub_field('popup_video_link');?></div>
								</div>	
							
							<?php else:?>
							
								<?php 
								$link = get_sub_field('video_link');
								if( $link ): 
									$link_url = $link['url'];
									$link_title = $link['title'];
									$link_target = $link['target'] ? $link['target'] : '_self';
									?>
									<a class="btn btn-blue" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
								<?php endif; ?>
							
							<?php endif;?>
							
						</div>

				</div>
				
			</div>
		
		<?php endif;?>
		
		
		<? if ( get_row_layout() == 'cost_savings_calculator') : ?>
			
			<div class="cost-savings-calculator <?php the_sub_field('custom_class');?>">
				<div class="container">
					<div class="inner">
						<div class="left">
							<div class="small-pipe"></div>
							<p class="calculator-directions"><?php the_sub_field('directions');?></p>
						</div>
		
						<div class="right">
							
							<div class="top">
								<input id='numberofemployees' type="text" maxlength="12" class="form-control formBlock" name="employee-number"  placeholder="16,000" required/>
								<label><?php the_sub_field('input_label');?></label>
							</div>
							
							<div class="bottom">
								<div class="left">
									<div id="savings-answer"><?php if ( $dolla = get_sub_field('is_the_results_a_dollar_amount') ) : ?>$<?php endif;?><span></span></div>
									<label><?php the_sub_field('result_label');?></label>
								</div>
								<div class="right">
									<?php the_sub_field('disclaimer');?>
								</div>
							</div>
							
						</div>
					</div>
				</div>
				
			</div>
			
			<div class="economic-impact-paper">
				<div class="container">
					<div class="inner">
						<div class="left">
							<?php 
							$image = get_sub_field('learn_how_image');
							if( !empty($image) ): ?>
								<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
							<?php endif; ?>
						</div>
						<div class="right">
							<div class="small-pipe"></div>
							<h3><?php the_sub_field('learn_how_title');?></h3>
							<p class="copy"><?php the_sub_field('learn_how_copy');?></p>
							<?php the_sub_field('learn_how_signup_code');?>
						</div>
					</div>
				</div>
			</div>
		
		<?php endif;?>
		
		<? if ( get_row_layout() == 'three_card_set_no_shadow') : ?>
			<div class="three_card_group-wrap three_card_group_wrap_no_shadow <?php the_sub_field('custom_class');?>" style="background-image: url(<?php the_sub_field('background_image');?>)">
				<div class="container">
				<?php if(get_sub_field('heading')):?>
					<h2><?php the_sub_field('heading');?></h2>
				<?php endif;?>
				<?php if(get_sub_field('content')):?>
					<p><?php the_sub_field('content');?></p>
				<?php endif;?>
				<?php if( have_rows('three_card_group') ):?>
					<?php while ( have_rows('three_card_group') ) : the_row();?>	
							<div class="three-card-group <?php the_sub_field('custom_class');?>">
						<?php if( have_rows('three_cards') ):?>
							<div class="three-col-wrap">
							<?php while ( have_rows('three_cards') ) : the_row();?>	
							
								<?php if( have_rows('single_card') ):?>
									<?php while ( have_rows('single_card') ) : the_row();?>	
										<div class="three-col <?php $has_link = get_sub_field('link'); if( $has_link ):?>card-with-link<?php endif;?>">
											<div class="icon-wrap">
											<?php 
											$image = get_sub_field('icon');
											$size = 'full'; // (thumbnail, medium, large, full or custom size)
											if( $image ) {
												echo wp_get_attachment_image( $image, $size );
											}
											?>
											</div>
											<h4><?php the_sub_field('label');?></h4>
											<p><?php the_sub_field('text')?></p>
											<? $link = get_sub_field('link');
												if( $link ): 
													$link_url = $link['url'];
													$link_title = $link['title'];
													$link_target = $link['target'] ? $link['target'] : '_self';
													?>
												<a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?> <img class="col-right-arrow" src="http://www.welldoc.com/wp-content/uploads/2019/02/right-arrow.svg" width="14px"/></a>
											<?php endif; ?>
											
										</div>
									<?php endwhile;?>
								<?php endif;?>
							<?php endwhile;?>
							</div>
						<?php endif;?>	
							</div>
					<?php endwhile;?>
				<?php endif;?>

				</div>				
				
			</div>
						
		<?php endif;?>
		
		
		<? if ( get_row_layout() == 'three_video_card_set') : ?>
			<div class="three_card_group-wrap three_video_card_set <?php the_sub_field('custom_class');?>" >
				<div class="container" style="background-image: url(<?php the_sub_field('background_image');?>)">
				<?php if( have_rows('three_card_group') ):?>
					<?php while ( have_rows('three_card_group') ) : the_row();?>	
							<div class="three-card-group <?php the_sub_field('custom_class');?>">
						<?php if( have_rows('three_cards') ):?>
							<div class="three-col-wrap">
							<?php while ( have_rows('three_cards') ) : the_row();?>	
							
								<?php $row = get_row_index();?>
							
								<?php if( have_rows('single_card') ):?>
									<?php while ( have_rows('single_card') ) : the_row();?>	
									
										<?php
											$imgID = get_sub_field('image');
											$imgSize = "video_card_2x";
											$imgArr = wp_get_attachment_image_src( $imgID, $imgSize );
	
										?>
									
										<div class="three-col <?php if ($video_modal = get_sub_field('is_the_button_going_to_open_a_popup_with_a_video')): ?>j-modal-wrap<?php endif;?>" style="background-image: url(<?php echo $imgArr[0]; ?> );">	
											<div class="three-card-vid-mask"></div>
											
											
											
											
										<?php if ( $video_modal = get_sub_field('is_the_button_going_to_open_a_popup_with_a_video') ) : ?>
										
											<a href="#modal-three-card-<?php echo $row;?>" class="open-modal container demo-video-link">
										
												<?php 
												$image = get_sub_field('video_still_image');
												$size = 'full'; // (thumbnail, medium, large, full or custom size)
												if( $image ) {
													echo wp_get_attachment_image( $image, $size );
												}
												?>	
												
												<div class="name-play-wrap">
														<p><?php the_sub_field('text')?></p>
														<div class="play-button">
															<img class="play-white" src="http://www.welldoc.com/wp-content/uploads/2019/04/Home-Card-Play-White.svg"/>
															<img class="play-blue" src="http://www.welldoc.com/wp-content/uploads/2019/04/Home-Card-Play.svg"/>
														</div>
												</div>		
												
												<div id="modal-three-card-<?php echo $row;?>" class="modal j-modal">
													<div style="padding:56.25% 0 0 0;position:relative;"><?php the_sub_field('video_link');?></div>
												</div>	
										
											</a>
											
										<?php else:?>

											<? $link = get_sub_field('link');
												if( $link ): 
													$link_url = $link['url'];
													$link_title = $link['title'];
													$link_target = $link['target'] ? $link['target'] : '_self';
													?>
											<a href="<?php echo esc_url($link_url); ?>" target="_blank">
											<div class="name-play-wrap">
													<p><?php the_sub_field('text')?></p>
													<div class="play-button">
														<img class="play-white" src="http://www.welldoc.com/wp-content/uploads/2019/04/Home-Card-Play-White.svg"/>
														<img class="play-blue" src="http://www.welldoc.com/wp-content/uploads/2019/04/Home-Card-Play.svg"/>
													</div>
											</div>
											</a>
											<?php endif; ?>
											
										<?php endif;?>
											
										</div>
									<?php endwhile;?>
								<?php endif;?>
							<?php endwhile;?>
							</div>
						<?php endif;?>	
							</div>
					<?php endwhile;?>
				<?php endif;?>

				</div>
			</div>
		<?php endif;?>
		
		<? if ( get_row_layout() == 'stand_alone_footnote') : ?>
			<div class="container stand_alone_footnote">
				
				<?php if( have_rows('footnotes') ):?>
					<?php while ( have_rows('footnotes') ) : the_row();?>
						<?php
					    $footnote = get_sub_field( 'footnote' );
					    if( ! empty( $footnote ) ) {
					        $footnote = preg_replace( '~(?<=^<p>)(\W*)(\w)(?=[\s\S]*</p>$)~i',
					                       '$1<span class="first-letter">$2</span>',
					                       $footnote );
					        printf( '<small>%s</small>', $footnote );
					    }
					    ?>
					<?php endwhile;?>
				<?php endif;?>
			</div>
		<?php endif;?>
		
		<? if ( get_row_layout() == 'pinned_phone_element') : ?>
			<div id="pinned_phone_element">
			<div class="container">
				
				<?php if( have_rows('phone_screens') ):?>
					<div id="phone-wrap" class="pinned-phone-half">
						<div id="phone-panel-wrap">
						<?php while ( have_rows('phone_screens') ) : the_row();?>
							<?php 
							$image = get_sub_field('single_phone_screen');
							$size = 'full'; // (thumbnail, medium, large, full or custom size)
							if( $image ) {
								echo wp_get_attachment_image( $image, $size );
							}
							?>
					<?php endwhile;?>
						</div>
						<img id="phone-img" src="http://www.welldoc.com/wp-content/uploads/2019/02/Phone-Section.png"/>
					</div>
				<?php endif;?>
				
				<?php if( have_rows('text_modules') ):?>
					<div id="text-module-wrap" class="pinned-phone-half">
					<?php while ( have_rows('text_modules') ) : the_row();?>
						<div class="single_text_module">
						<?php if( have_rows('single_text_module') ):?>
							<?php while ( have_rows('single_text_module') ) : the_row();?>
								<?php if ( $heading = get_sub_field('heading') ) : ?>
									<h2><?php echo $heading;?></h2>
								<?php endif;?>
								<?php if ( $content = get_sub_field('content') ) : ?>
									<p><?php echo $content;?></p>
								<?php endif;?>
							<?php endwhile;?>
						<?php endif;?>	
						</div>		
					<?php endwhile;?>
					</div>
				<?php endif;?>	
			</div>		
			</div>
		<?php endif;?>
		
		<? if ( get_row_layout() == 'demo_video') : ?>
		<?php $row = get_row_index();?>
		<div class="demo_video container-2 <?php if ($video_modal = get_sub_field('is_the_button_going_to_open_a_popup_with_a_video')): ?>j-modal-wrap<?php endif;?>">
			<div class="image-text-section module centered-heading container">
				<?php if ( $heading = get_sub_field('heading') ) : ?>
					<h2><?php echo $heading;?></h2>
					<div class="image-text-section-h2-pipe"></div>
				<?php endif;?>				
			</div>
				
			<?php if ( $video_modal = get_sub_field('is_the_button_going_to_open_a_popup_with_a_video') ) : ?>
			
				<a href="#modal-<?php echo $row;?>" class="open-modal container demo-video-link">
			
					<?php 
					$image = get_sub_field('video_still_image');
					$size = 'full'; // (thumbnail, medium, large, full or custom size)
					if( $image ) {
						echo wp_get_attachment_image( $image, $size );
					}
					?>	
					
					<div class="demo-video-play-button">
						<img class="demo-video-play-white" src="http://www.welldoc.com/wp-content/uploads/2019/04/Demo-Play-White.svg"/>	
						<img class="demo-video-play" src="http://www.welldoc.com/wp-content/uploads/2019/04/Demo-Play.svg"/>	
					</div>		
					
					<div id="modal-<?php echo $row;?>" class="modal j-modal">
						<div style="padding:56.25% 0 0 0;position:relative;"><?php the_sub_field('popup_video_link');?></div>
					</div>	
			
				</a>
				
			<?php else:?>
								
				<?php 
				$link = get_sub_field('video_link');
				if( $link ): 
					$link_url = $link['url'];
					$link_title = $link['title'];
					$link_target = $link['target'] ? $link['target'] : '_self';
					?>
									
					<a class="container demo-video-link" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
						
						<?php 
						$image = get_sub_field('video_still_image');
						$size = 'full';
						if( $image ) {
							echo wp_get_attachment_image( $image, $size );
						}
						?>	
						
						<div class="demo-video-play-button">
							<img class="demo-video-play-white" src="http://www.welldoc.com/wp-content/uploads/2019/04/Demo-Play-White.svg"/>	
							<img class="demo-video-play" src="http://www.welldoc.com/wp-content/uploads/2019/04/Demo-Play.svg"/>	
						</div>			
						
					</a>

				<?php endif;?>
				
			<?php endif;?>
					
		</div>
		<?php endif;?>
		

		<? if ( get_row_layout() == 'video_with_form') : ?>
		<div class="demo_video video_with_form container-2">
			<div class="image-text-section container">
				<?php if ( $heading = get_sub_field('heading') ) : ?>
					<h2><?php echo $heading;?></h2>
				<?php endif;?>				
			</div>
						
			<div class="video-form-wrap">		
			<?php 
			$link = get_sub_field('video_link');
			if( $link ): 
				$link_url = $link['url'];
				$link_title = $link['title'];
				$link_target = $link['target'] ? $link['target'] : '_self';
				?>
				<a class="container demo-video-link" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
					
					<?php 
					$image = get_sub_field('video_still_image');
					$size = 'full'; // (thumbnail, medium, large, full or custom size)
					if( $image ) {
						echo wp_get_attachment_image( $image, $size );
					}
					?>	
					
					<div class="demo-video-play-button">
						<img class="demo-video-play-white" src="http://www.welldoc.com/wp-content/uploads/2019/04/Demo-Play-White.svg"/>	
						<img class="demo-video-play" src="http://www.welldoc.com/wp-content/uploads/2019/04/Demo-Play.svg"/>	
					</div>			
					
				</a>
			<?php endif; ?>	
			
				<div class="video-form-code">
					<?php the_sub_field('form_code');?>
				</div>
			
			</div>
					
		</div>
		<?php endif;?>

		
		<? if ( get_row_layout() == 'four_column_image_grid') : ?>
		<div class="four_column_image_grid <?php the_sub_field('custom_class');?>">
			<div class="container-2">
			<?php if( have_rows('four_column_grid') ):?>
				<?php while ( have_rows('four_column_grid') ) : the_row();?>				
			
				<?php if( have_rows('single_cell') ):?>
					<?php while ( have_rows('single_cell') ) : the_row();?>	
					<div class="single_cell">
						<div class="img-wrap">
							<?php 
							$image = get_sub_field('image');
							$size = 'full'; // (thumbnail, medium, large, full or custom size)
							if( $image ) {
								echo wp_get_attachment_image( $image, $size );
							}
							?>
						</div>
						<p><?php the_sub_field('label');?></p>
					</div>
					<?php endwhile;?>
				<?php endif;?>
				<?php endwhile;?>
			<?php endif;?>
			</div>
		</div>
		<?php endif;?>
		

		<? if ( get_row_layout() == 'log_in') : ?>
			<?php if( have_rows('log_in_group') ):?>
				<?php while ( have_rows('log_in_group') ) : the_row();?>	
				
				<div class="login-bg background-color-<?php the_sub_field('background_color'); ?>">
				
					<div class="container login-wrap">			
					
						<?php 
						$link = get_sub_field('link');
						if( $link ): ?>
						<div class="text-half">
							<?php
								$link_url = $link['url'];
								$link_title = $link['title'];
								$link_target = $link['target'] ? $link['target'] : '_self';
								?>
								<a class="btn btn-blue login-btn" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
						</div>
							<?php endif; ?>
						
						<?php if ( $login_copy = get_sub_field('copy') ) : ?>
							<div class="text-half login-copy">
								<?php echo $login_copy;?>
							</div>
						<?php endif; ?>
						
					</div>
					
				</div>
				
				<?php endwhile;?>
			<?php endif;?>
		<?php endif;?>	



		<? if ( get_row_layout() == 'resource_library') : ?>
		<?php
		$imgID = get_sub_field('background_image');
		$imgSize = "full"; // (thumbnail, medium, large, full or custom size)
		$imgArr = wp_get_attachment_image_src( $imgID, $imgSize );
		?>
		<div class="resource-wrap" style="background-image: url(<?php echo $imgArr[0]; ?> );">
			<div class="container image-text-section">
				<h2><?php the_sub_field('title');?></h2>
				
				<?php if( have_rows('resource_links') ):?>
				<div class="resource-slider">
					<?php while ( have_rows('resource_links') ) : the_row();?>	
						
						<?php if( have_rows('single_resource_link') ):?>
							<?php while ( have_rows('single_resource_link') ) : the_row();?>
							
							<?php
							$imgID = get_sub_field('image');
							$imgSize = "resource_card"; // (thumbnail, medium, large, full or custom size)
							$imgArr = wp_get_attachment_image_src( $imgID, $imgSize );
							?>
							
							<div class="single-resource-link" style="background-image: url(<?php echo $imgArr[0]; ?> );">
								<div class="resource-card-mask"></div>
								
									<div class="resource-card-text">
										<p class="rc-label"><?php the_sub_field('label');?></p>
										<h3 class="rc-title"><?php the_sub_field('title');?></h3>
										
										<?php 

											$link = get_sub_field('link');
											
											if( $link ): 
												$link_url = $link['url'];
												$link_title = $link['title'];
												$link_target = $link['target'] ? $link['target'] : '_self';
												?>
												<a class="rc-link" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><span><?php echo esc_html($link_title); ?></span><img src="http://www.welldoc.com/wp-content/uploads/2019/05/resource-read-more-arrow.svg"/></a>
											<?php endif; ?>
									</div>
							</div>
							<?php endwhile;?>
						<?php endif;?>	
													
					<?php endwhile;?>
				</div>
				<?php endif;?>
			</div>
		</div>
		<?php endif;?>	


		<? if ( get_row_layout() == 'full_width_quote') : ?>
		<?php $row = get_row_index();?>
			<?php if ($quote_background_image = get_sub_field('quote_background_image') ) : ?>
			<div class="quote-wrap <?php if ( $video_modal = get_sub_field('is_the_button_going_to_open_a_popup_with_a_video') ) : ?>j-modal-wrap<?php endif;?>" style="background-image: url(<?php echo $quote_background_image; ?>);">
				<div class="quote-bg-mask"></div>

				<div class="container">
					
					<div class="quote-author-wrap">
						<?php 
						$image = get_sub_field('authors_image');
						$size = 'quote_author_2x'; // (thumbnail, medium, large, full or custom size)
						if( $image ) {
							echo wp_get_attachment_image( $image, $size );
						}
						?>
						<?php if(get_sub_field('authors_name')):?>
							<p class="blue"><?php the_sub_field('authors_name');?></p>
						<?php endif;?>
						<?php if(get_sub_field('authors_title')):?>
							<p><?php the_sub_field('authors_title');?></p>
						<?php endif;?>
						<?php if(get_sub_field('authors_company')):?>
							<p><?php the_sub_field('authors_company');?></p>
						<?php endif;?>
					
						
					</div>
					
					<div class="quote-copy-wrap">
						<div class="top-quote-wrap">
							<img class="quote-blue" src="http://www.welldoc.com/wp-content/uploads/2019/04/top-quote.svg"/>
							<img class="quote-green" src="http://www.welldoc.com/wp-content/uploads/2019/05/opening-quote-green.svg"/>

						</div>
						<p><?php the_sub_field('quote');?></p>
						
						<div class="bottom-quote-wrap">
							<?php if ( $video_modal = get_sub_field('is_the_button_going_to_open_a_popup_with_a_video') ) : ?>
							
								<a href="#modal-<?php echo $row;?>" class="open-modal btn btn-blue"><?php the_sub_field('video_popup_button_text');?></a>
								
								<div id="modal-<?php echo $row;?>" class="modal j-modal">
									<div style="padding:56.25% 0 0 0;position:relative;"><?php the_sub_field('video_link');?></div>
								</div>	
								
							<?php else:?>
												
								<?php 
								$link = get_sub_field('button_link');
								if( $link ): 
									$link_url = $link['url'];
									$link_title = $link['title'];
									$link_target = $link['target'] ? $link['target'] : '_self';
									?>
									<a class="btn btn-blue" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
								<?php endif; ?>	
												
							<?php endif;?>

							<img class="quote-blue" src="http://www.welldoc.com/wp-content/uploads/2019/04/bottom-quote.svg"/>
							<img class="quote-green" src="http://www.welldoc.com/wp-content/uploads/2019/05/closing-quote-green.svg"/>
						</div>
						
					</div>
				
				</div>
				
			</div>
				
				
			<?php else:?>
			
			<div class="quote-wrap <?php the_sub_field('custom_class');?> <?php if ( $video_modal = get_sub_field('is_the_button_going_to_open_a_popup_with_a_video') ) : ?>j-modal-wrap<?php endif;?>">
				
				<div class="container">
					
					<div class="quote-author-wrap">
						<?php 
						$image = get_sub_field('authors_image');
						$size = 'quote_author_2x'; // (thumbnail, medium, large, full or custom size)
						if( $image ) {
							echo wp_get_attachment_image( $image, $size );
						}
						?>
						<?php if(get_sub_field('authors_name')):?>
							<p class="blue"><?php the_sub_field('authors_name');?></p>
						<?php endif;?>
						<?php if(get_sub_field('authors_title')):?>
							<p><?php the_sub_field('authors_title');?></p>
						<?php endif;?>
						<?php if(get_sub_field('authors_company')):?>
							<p><?php the_sub_field('authors_company');?></p>
						<?php endif;?>
					
						
					</div>
					
					<div class="quote-copy-wrap">
						<div class="top-quote-wrap">						
							
							<img class="quote-blue" src="http://www.welldoc.com/wp-content/uploads/2019/04/top-quote.svg"/>
							<img class="quote-green" src="http://www.welldoc.com/wp-content/uploads/2019/05/opening-quote-green.svg"/>

						</div>
						<p><?php the_sub_field('quote');?></p>
						
						<div class="bottom-quote-wrap">
							<?php if ( $video_modal = get_sub_field('is_the_button_going_to_open_a_popup_with_a_video') ) : ?>
							
								<a href="#modal-<?php echo $row;?>" class="open-modal btn btn-blue"><?php the_sub_field('video_popup_button_text');?></a>
								
								<div id="modal-<?php echo $row;?>" class="modal j-modal">
									<div style="padding:56.25% 0 0 0;position:relative;"><?php the_sub_field('video_link');?></div>
								</div>	
								
							<?php else:?>
												
								<?php 
								$link = get_sub_field('button_link');
								if( $link ): 
									$link_url = $link['url'];
									$link_title = $link['title'];
									$link_target = $link['target'] ? $link['target'] : '_self';
									?>
									<a class="btn btn-blue" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
								<?php endif; ?>	
												
							<?php endif;?>

							<img class="quote-blue" src="http://www.welldoc.com/wp-content/uploads/2019/04/bottom-quote.svg"/>
							<img class="quote-green" src="http://www.welldoc.com/wp-content/uploads/2019/05/closing-quote-green.svg"/>
						</div>
						
					</div>
				
				</div>
				
			</div>

				
			<?php endif; ?>
			
		<?php endif;?>	


		
		<? if ( get_row_layout() == 'phone_and_accordion') : ?>	
		
		<div class="phone-accordion-wrap <?php the_sub_field('custom_class');?>">
			<div class="container">
				
		<?php if( have_rows('accordion') ):?>
				<div class="accordion-phone-wrap">
			<?php while ( have_rows('accordion') ) : the_row();?>	
			
				<?php if( have_rows('single_accordion') ):?>
					<?php while ( have_rows('single_accordion') ) : the_row();?>
					
					<div class="single-accordion-phone">
						<?php 
						$image = get_sub_field('phone_image');
						$size = 'full'; // (thumbnail, medium, large, full or custom size)
						if( $image ) {
							echo wp_get_attachment_image( $image, $size );
						}
						?>						
					</div>
					
					<?php endwhile;?>		
				<?php endif;?>					
					
			<?php endwhile;?>
				</div>		
		<?php endif;?>					
				
		

		<?php if( have_rows('accordion') ):?>
		
			<div class="phone-accordion">
							
			<?php while ( have_rows('accordion') ) : the_row();?>	
			
			<?php if( have_rows('single_accordion') ):?>
				<?php while ( have_rows('single_accordion') ) : the_row();?>
				
				<h3>
					<span class="img-wrap">
					<?php 
					$image = get_sub_field('icon');
					$size = 'full'; // (thumbnail, medium, large, full or custom size)
					if( $image ) {
						echo wp_get_attachment_image( $image, $size );
					}
					?>
					</span>
					<?php the_sub_field('title');?>
				</h3>

				<div>
					<p><?php the_sub_field('copy');?></p>
				</div>

				<?php endwhile;?>		
			<?php endif;?>

			<?php endwhile;?>
			</div>		
		<?php endif;?>
		
			</div>			
		</div>
		
		<?php endif;?>
		
		
		<? if ( get_row_layout() == 'testimonial_slider') : ?>	
		<div class="testimonial-slider-wrap <?php the_sub_field('custom_class');?>">
			<div class="container">
				
				<?php if( have_rows('rating') ):?>
					<?php while ( have_rows('rating') ) : the_row();?>	
				<div class="rating-wrap">
					<?php 
					$image = get_sub_field('image');
					$size = 'full'; // (thumbnail, medium, large, full or custom size)
					if( $image ) {
						echo wp_get_attachment_image( $image, $size );
					}
					?>	
					<label><?php the_sub_field('label');?></label>				
				</div>
					<?php endwhile;?>
				<?php endif;?>
			
				<?php if( have_rows('testimonials') ):?>
					<div class="testimonial-slider">
					<?php while ( have_rows('testimonials') ) : the_row();?>	
						<div class="single-slide">
						<?php if( have_rows('single_testimonial') ):?>
							<?php while ( have_rows('single_testimonial') ) : the_row();?>	
							<p class="quote"><?php the_sub_field('quote');?>
							
							<span class="author"><?php the_sub_field('author');?></span>

							</p>
							<?php endwhile;?>
						<?php endif;?>
						</div>
					<?php endwhile;?>
					</div>
				<?php endif;?>			
				
			</div>
		</div>
		<?php endif;?>

		
		<? if ( get_row_layout() == 'multiple_conditions') : ?>
		
		<div class="image-text-section image-on-left multiple-conditions-section">
			<div class="container-2">
				

				<?php if( have_rows('conditions_text') ):?>
					<div class="text">
					<?php while ( have_rows('conditions_text') ) : the_row();?>
						
						<?php if ( $heading = get_sub_field('heading') ) : ?>
						<h2><span><?php echo $heading; ?></span></h2>
						<div class="image-text-section-h2-pipe"></div>
						<?php endif; ?>
						
						<?php if ( $sub_heading = get_sub_field('sub-heading') ) : ?>
						<span><?php echo $sub_heading; ?></span></h1>
						<?php endif; ?>					
						
						<?php if ( $content = get_sub_field('content') ) : ?>
						<div>
							<p><?php echo $content; ?></p>
						</div>
						<?php endif; ?>
						
					<?php endwhile;?>
					</div>
				<?php endif;?>
				
				
				<div class="image-half left_aligned">

					<div class="multiple-conditions-wrap">
						
						<div id="conditions-phone-wrap">
										
						<?php if( have_rows('conditions_labels') ):?>
							<div id="condition-fade-copy-wrap">
							<?php while ( have_rows('conditions_labels') ) : the_row();?>											
								<?php if( have_rows('label_1') ):?>
								<div id="label_1" class="single-condition-label">
									<?php while ( have_rows('label_1') ) : the_row();?>
										<p class="label-title"><?php the_sub_field('title');?></p>
										<p><?php the_sub_field('description');?></p>
									<?php endwhile;?>
								</div>
								<?php endif;?>	
								
								<?php if( have_rows('label_2') ):?>
								<div id="label_2" class="single-condition-label">
									<?php while ( have_rows('label_2') ) : the_row();?>
										<p class="label-title"><?php the_sub_field('title');?></p>
										<p><?php the_sub_field('description');?></p>
									<?php endwhile;?>
								</div>
								<?php endif;?>	
								
								<?php if( have_rows('label_3') ):?>
								<div id="label_3" class="single-condition-label">
									<?php while ( have_rows('label_3') ) : the_row();?>
										<p class="label-title"><?php the_sub_field('title');?></p>
										<p><?php the_sub_field('description');?></p>
									<?php endwhile;?>
								</div>
								<?php endif;?>	
								
								<?php if( have_rows('label_4') ):?>
								<div id="label_4" class="single-condition-label">
									<?php while ( have_rows('label_4') ) : the_row();?>
										<p class="label-title"><?php the_sub_field('title');?></p>
										<p><?php the_sub_field('description');?></p>
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
								
								<?php if( have_rows('conditions_icons') ):?>
									<div id="conditions-logos-wrap">
									<?php while ( have_rows('conditions_icons') ) : the_row();?>			
										
										<div class="conditions-logo conditions-logo-4">
											<?php 
											$image4 = get_sub_field('icon_4');
											if( !empty($image4) ): ?>
												<img id="icon_4" src="<?php echo $image4['url']; ?>" alt="<?php echo $image4['alt']; ?>" />
											<?php endif; ?>
										</div>
										
										<div class="conditions-logo conditions-logo-3">
											<?php 
											$image3 = get_sub_field('icon_3');
											if( !empty($image3) ): ?>
												<img id="icon_3" src="<?php echo $image3['url']; ?>" alt="<?php echo $image3['alt']; ?>" />
											<?php endif; ?>
										</div>
										
										<div class="conditions-logo conditions-logo-2">
											<?php 
											$image2 = get_sub_field('icon_2');
											if( !empty($image2) ): ?>
												<img id="icon_2" src="<?php echo $image2['url']; ?>" alt="<?php echo $image2['alt']; ?>" />
											<?php endif; ?>
										</div>
										
										<div class="conditions-logo conditions-logo-1">
											<?php 
											$image1 = get_sub_field('icon_1');
											if( !empty($image) ): ?>
												<img id="icon_1" src="<?php echo $image1['url']; ?>" alt="<?php echo $image1['alt']; ?>" />
											<?php endif; ?>
										</div>
									
									<?php endwhile;?>
									</div>
								<?php endif;?>
									
						</div>

				</div>
				
		
			</div>
		</div>
		

		
		<?php endif;?>						
		
		
		<? if ( get_row_layout() == 'text_editor') : ?>	
			<div class="<?php the_sub_field('custom_class');?>">
				<div class="container">	
					
				<?php the_sub_field('wysiwyg');?>
				
				</div>
			</div>
				
		<?php endif;?>		
		
		
		<? if ( get_row_layout() == 'text_editor_no_container') : ?>	
				
			<?php the_sub_field('wysiwyg');?>
							
		<?php endif;?>			

		
	<?php endwhile;?>
	<?php endif; ?>
	
</div>

<?php get_footer(); ?>