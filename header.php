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
								
								<div id="alert-message" class="alert-half cell shrink">
									
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
									<i class="fas fa-times"></i>
								</div>
								
							</div>
						</div>
					</div>	
					
					<?php endwhile;?>
				<?php endif;?>		
				
			<?php endif; ?>
			
			
			<?php if (is_page(3663)):?>
	 
				<div id="clinicans-top-bar">
					<div class="grid-container">
						<p><?php the_field('top_bar_download_heading');?></p>
	
						<button><i class="fas fa-file-download"></i> Download Now</button>
					</div>
				</div>
	
			<?php endif;?>
				
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
									<button class="takover-trigger"><span></span><span></span><span></span></button>
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
								
									<a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>" class="ps-link cell shrink">
										<?php echo esc_html($link_title); ?>
									</a>
									
								<?php endif;?>							
															
							</div>
							
						</div>
						
						<div class="right cell shrink">
							
							<div class="show-for-xmedium top-bar">
								<?php wp_nav_menu( array( 'theme_location' => 'mainmenu', 'menu_class' => 'main-menu', 'menu_id' => '', 'container' => 'nav', 'depth' => 0 ) ); ?>
							</div>
							
							<button class="menu-trigger hide-for-xmedium" data-toggle="offCanvas"><span></span><span></span><span></span></button>
							
						</div>
						
					</div>
				</div>
			</header>
		
			<div class="show-sticky-header-trigger"></div>
		
		<?php endif;?>
		
