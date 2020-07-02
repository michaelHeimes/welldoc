<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	
		<meta charset="utf-8">
		
		<!-- Force IE to use the latest rendering engine available -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<!-- Mobile Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta class="foundation-mq">	
		<link rel='dns-prefetch' href='//pro.fontawesome.com' />
		
<!-- 		<script src="https://kit.fontawesome.com/a86dc06817.js" crossorigin="anonymous"></script> -->

		<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.13.1/css/all.css" integrity="sha384-B9BoFFAuBaCfqw6lxWBZrhg/z4NkwqdBci+E+Sc2XlK/Rz25RYn8Fetb+Aw5irxa" crossorigin="anonymous">
		
		<!-- If Site Icon isn't set in customizer -->
		<?php if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) { ?>
			<!-- Icons & Favicons -->
			<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
			<link href="<?php echo get_template_directory_uri(); ?>/assets/images/apple-icon-touch.png" rel="apple-touch-icon" />	
	    <?php } ?>
	
	
	
	<meta name="format-detection" content="telephone=no">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<!-- 	<script>'https://www.google.com/recaptcha/api.js'</script> -->

<?php endif; ?>
<?php /*<link rel="shortcut icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/images/favicon.png">*/ ?>
<?php wp_head(); ?>
</head>

<?php $body_class = ''; ?>
<?php $body_class = get_field('body_class'); ?>

<body <?php body_class($body_class, $theme_color); ?>><!-- <body class="home"> -->
	
	<div class="off-canvas-wrapper">
		
		<div class="off-canvas-absolute position-right" id="offCanvas" data-off-canvas>
			<!-- Your menu or Off-canvas content goes here -->
			<?php get_template_part( 'parts/nav', 'offcanvas-topbar' ); ?>
		</div>
			
		<div class="off-canvas-content" data-off-canvas-content>
	
		<?php
		$hide_nav = get_field('hide_navigation');
				
		if(!is_page_template('page-templates/landing.php') || !in_array('yes', $hide_nav)):?>
		
			<?php
			$alert = get_field('do_you_want_a_pre-header_alert');
			if( $alert && in_array('yes', $alert) ): ?>
		
				<?php if( have_rows('alert') ):?>
					<?php while ( have_rows('alert') ) : the_row();?>
					<div id="alert">
						<div class="grid-container">
							<div class="grid-x grid-padding-x align-justify">
								
								<div id="alert-message" class="alert-half cell auto">
									
									<?php 
									$link = get_sub_field('link');
										$link_url = $link['url'];
										$link_title = $link['title'];
										$link_target = $link['target'] ? $link['target'] : '_self';
									?>
									
									<?php if( $link ):?> 
									
										<a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
											<?php the_sub_field('message');?>
											<span> <?php echo esc_html($link_title); ?></span>
											<i class="fas fa-arrow-right"></i>
										</a>
									
									<?php else:?>
									
										<p><?php the_sub_field('message');?></p>
			
									<?php endif; ?>
			
								</div>
								
								<div id="alert-close-wrap" class="alert-half cell shrink">
									<button id="alert-close"><i class="fas fa-times"></i></button>
								</div>
								
							</div>
						</div>
					</div>	
					
					<?php endwhile;?>
				<?php endif;?>		
				
			<?php endif; ?>
			
			
<!--
			<?php if (is_page(3663)):?>
	 
				<div id="clinicans-top-bar">
					<div class="grid-container">
						<p><?php the_field('top_bar_download_heading');?></p>
	
						<button><i class="fas fa-file-download"></i> Download Now</button>
					</div>
				</div>
	
			<?php endif;?>
-->
				
	<!--
			<header class="header sticky-header">
				<div class="grid-container">
					<div class="grid-x grid-padding-x align-justify">
						
						<div class="left cell shrink">
						
							<div class="takover-trigger cell shrink"><span></span><span></span><span></span></div>
						
							<a href="<?php echo home_url() ?>" class="logo cell shrink">
								<img class="white-logo" src="<?php echo get_template_directory_uri() ?>/images/logo.svg" alt="<?php bloginfo('name'); ?>" />
							</a>
							
						</div>
						
						<div class="right cell shrink">
							
							<div class="show-for-xmedium">
								<?php wp_nav_menu( array( 'theme_location' => 'mainmenu', 'menu_class' => 'main-menu', 'menu_id' => '', 'container' => 'nav', 'depth' => 0 ) ); ?>
							</div>
							
							<div class="menu-trigger hide-for-xmedium"><span></span><span></span><span></span></div>
							
						</div>
						
					</div>
				</div>
			</header>
	-->
			
			<header class="header static-header">
				<div class="grid-container fluid">
					<div class="grid-x grid-padding-x align-justify align-middle">
						
						<div class="left cell shrink">
							
							<div class="grid-x grid-padding-x align-middle">
						
								<div class="cell shrink">
									<button id="takover-trigger"><span></span><span></span><span></span></button>
								</div>
							
								<a href="<?php echo home_url() ?>" class="logo cell shrink">
									<img class="white-logo" src="<?php echo get_template_directory_uri() ?>/assets/images/logo-blue.svg" alt="<?php bloginfo('name'); ?>" />
								</a>
								
								<?php 
								$link = get_field('link_next_to_logo', 'option');
									$link_url = $link['url'];
									$link_title = $link['title'];
									$link_target = $link['target'] ? $link['target'] : '_self';
								if( $link ):?> 	
								
									<a class="platform-link" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>" class="ps-link cell shrink">
										<?php echo esc_html($link_title); ?>
									</a>
									
								<?php endif;?>							
															
							</div>
							
						</div>
						
						<div class="right cell shrink">
							
							<div class="show-for-large top-bar">
								<?php wp_nav_menu( array( 'theme_location' => 'mainmenu', 'menu_class' => 'main-menu', 'menu_id' => '', 'container' => 'nav', 'depth' => 0 ) ); ?>
							</div>
														
						</div>
						
					</div>
				</div>
				

				<div id="takeover">
					<div class="grid-container">
						
						<div class="grid-x top grid-padding-x align-justify align-middle">
							
								<a href="<?php echo home_url() ?>" class="logo cell shrink">
									<img class="white-logo" src="<?php echo get_template_directory_uri() ?>/assets/images/logo.svg" alt="<?php bloginfo('name'); ?>" />
								</a>
								
								<button id="takeover-close" class="cell shrink">
									<i class="fas fa-times"></i>
								</button>
						
						</div>
						
						<div class="menu-wrap grid-x grid-padding-x align-center align-middle">
							
							<?php wp_nav_menu( array( 'theme_location' => 'takeovermenu', 'menu_class' => 'takeover-menu', 'menu_id' => '', 'container' => 'nav', 'depth' => 0 ) ); ?>
							
						</div>
					</div>
				</div>
				
				
			</header>
		
			<div class="show-sticky-header-trigger"></div>
		
		<?php endif;?>
		
		
		<?php if (is_page('Platform Solutions')):?>
		
			<div class="product-panels-wrap">
				
				<div class="left-wrap">
					
					<?php if( have_rows('panel_1') ):?>
					<div class="label-wrap p-1">				
						<?php while ( have_rows('panel_1') ) : the_row();?>	
						
							<div class="label-heading show-for-xmedium">
								<?php the_sub_field('heading');?>
							</div>
					
						<?php endwhile;?>
					</div>
					<?php endif;?>

					<?php if( have_rows('panel_2') ):?>
					<div class="label-wrap p-2">				
						<?php while ( have_rows('panel_2') ) : the_row();?>	
						
							<div class="label-heading show-for-xmedium">
								<?php the_sub_field('heading');?>
							</div>
					
						<?php endwhile;?>
					</div>
					<?php endif;?>
					
					<?php if( have_rows('panel_3') ):?>
					<div class="label-wrap p-3">				
						<?php while ( have_rows('panel_3') ) : the_row();?>	
						
							<div class="label-heading show-for-xmedium">
								<?php the_sub_field('heading');?>
							</div>
					
						<?php endwhile;?>
					</div>
					<?php endif;?>
					
					<?php if( have_rows('panel_4') ):?>
					<div class="label-wrap p-4">				
						<?php while ( have_rows('panel_4') ) : the_row();?>	
						
							<div class="label-heading show-for-xmedium">
								<?php the_sub_field('heading');?>
							</div>
					
						<?php endwhile;?>
					</div>
					<?php endif;?>
					
					<?php if( have_rows('panel_5') ):?>
					<div class="label-wrap p-5">				
						<?php while ( have_rows('panel_5') ) : the_row();?>	
						
							<div class="label-heading show-for-xmedium">
								<?php the_sub_field('heading');?>
							</div>
					
						<?php endwhile;?>
					</div>
					<?php endif;?>		
					
				</div>		

				
				<div class="grid-container">
					<div class="panels-wrap grid-x grid-padding-x">
						
						<div class="panel opening cell small-12 text-center">
						
							<h1><?php the_field('plat-op_headline');?></h1>
							
							<p><?php the_field('plat-op_copy');?></p>
						
						</div>

						<?php if( have_rows('panel_1') ):?>
						<?php while ( have_rows('panel_1') ) : the_row();?>
						<div class="panel p-1 cell small-12">
							
							<div class="grid-x grid-padding-x align-center align-middle">
								
								<div class="cell small-11 small-offset-1 xmedium-3 xmedium-offset-2">
						
									<h1><?php the_sub_field('heading');?></h1>
									
									<p><?php the_sub_field('copy');?></p>
								
								</div>
								
								<div class="img-wrap cell small-5 show-for-xmedium">
									
									<?php 
									$image = get_sub_field('image');
									if( !empty( $image ) ): ?>
									    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
									<?php endif; ?>									
									
								</div>
							
							</div>
						
						</div>
						<?php endwhile;?>
						<?php endif;?>

						<?php if( have_rows('panel_2') ):?>
						<?php while ( have_rows('panel_2') ) : the_row();?>
						<div class="panel p-2 cell small-12">
							
							<div class="grid-x grid-padding-x align-center align-middle">
								
								<div class="cell small-11 small-offset-1 xmedium-3 xmedium-offset-2">
						
									<h1><?php the_sub_field('heading');?></h1>
									
									<p><?php the_sub_field('copy');?></p>
								
								</div>
								
								<div class="img-wrap cell small-5 show-for-xmedium">
									
									<?php 
									$image = get_sub_field('image');
									if( !empty( $image ) ): ?>
									    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
									<?php endif; ?>									
									
								</div>
							
							</div>
						
						</div>
						<?php endwhile;?>
						<?php endif;?>
						
						<?php if( have_rows('panel_3') ):?>
						<?php while ( have_rows('panel_3') ) : the_row();?>
						<div class="panel p-3 cell small-12">
							
							<div class="grid-x grid-padding-x align-center align-middle">
								
								<div class="cell small-11 small-offset-1 xmedium-3 sxmedium-offset-2">
						
									<h1><?php the_sub_field('heading');?></h1>
									
									<p><?php the_sub_field('copy');?></p>
								
								</div>
								
								<div class="img-wrap cell small-5 show-for-xmedium">
									
									<?php 
									$image = get_sub_field('image');
									if( !empty( $image ) ): ?>
									    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
									<?php endif; ?>									
									
								</div>
							
							</div>
						
						</div>
						<?php endwhile;?>
						<?php endif;?>
						
						<?php if( have_rows('panel_4') ):?>
						<?php while ( have_rows('panel_4') ) : the_row();?>
						<div class="panel p-4 cell small-12">
							
							<div class="grid-x grid-padding-x align-center align-middle">
								
								<div class="cell small-11 small-offset-1 xmedium-3 xmedium-offset-2">
						
									<h1><?php the_sub_field('heading');?></h1>
									
									<p><?php the_sub_field('copy');?></p>
								
								</div>
								
								<div class="img-wrap cell small-5 show-for-xmedium">
									
									<?php 
									$image = get_sub_field('image');
									if( !empty( $image ) ): ?>
									    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
									<?php endif; ?>									
									
								</div>
							
							</div>
						
						</div>
						<?php endwhile;?>
						<?php endif;?>
						
						<?php if( have_rows('panel_5') ):?>
						<?php while ( have_rows('panel_5') ) : the_row();?>
						<div class="panel p-5 cell small-12">
							
							<div class="grid-x grid-padding-x align-center align-middle">
								
								<div class="cell small-11 small-offset-1 xmedium-3 xmedium-offset-2">
						
									<h1><?php the_sub_field('heading');?></h1>
									
									<p><?php the_sub_field('copy');?></p>
								
								</div>
								
								<div class="img-wrap cell small-5">
									
									<?php 
									$image = get_sub_field('image');
									if( !empty( $image ) ): ?>
									    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
									<?php endif; ?>									
									
								</div>
							
							</div>
						
						</div>
						<?php endwhile;?>
						<?php endif;?>
						
								
	
					
					</div>
				</div>
				
			</div>
		
		<?php endif;?>
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
