<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
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

	<?php
	$hide_nav = get_field('hide_navigation');
		
	if(!is_page_template('page-templates/landing.php')):
	
	if(!in_array('yes', $hide_nav)):?>
	
		<?php
		$alert = get_field('do_you_want_a_pre-header_alert');
		if( $alert && in_array('yes', $alert) ): ?>
	
		<?php if( have_rows('alert') ):?>
				<?php while ( have_rows('alert') ) : the_row();?>
				<div id="alert">
					<div class="container">
						<div id="alert-message" class="alert-half">
							
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
									<img src="/wp-content/themes/welldoc/images/arrow-right.svg"/>
								</a>
							
							<?php else:?>
							
								<p><?php the_sub_field('message');?></p>
	
							<?php endif; ?>
	
						</div>
						<div id="alert-close-wrap" class="alert-half">
							<img id="alert-close" src="/wp-content/themes/welldoc/images/white-close.svg"/>
						</div>
					</div>
				</div>	
			
				<?php endwhile;?>
			<?php endif;?>		
			
		<?php endif; ?>
		
		
		<?php if (is_page(3663)):?>
 
			<div id="clinicans-top-bar">
				<div class="container">
					<p><?php the_field('top_bar_download_heading');?></p>

					<button><i class="fas fa-file-download"></i> Download Now</button>
				</div>
			</div>

		<?php endif;?>
	
		
		<header class="header sticky-header">
			<div class="container">
				<a href="<?php echo home_url() ?>" class="logo">
					<img class="white-logo" src="<?php echo get_template_directory_uri() ?>/images/logo.svg" alt="<?php bloginfo('name'); ?>" />
				</a>
				
				<?php wp_nav_menu( array( 'theme_location' => 'mainmenu', 'menu_class' => 'main-menu', 'menu_id' => '', 'container' => 'nav', 'depth' => 0 ) ); ?>
				
				<div class="menu-trigger"><span></span><span></span><span></span></div>
				
			</div>
		</header>
		
		<header class="header static-header">
			<div class="container">
				<a href="<?php echo home_url() ?>" class="logo">
					<img class="white-logo" src="<?php echo get_template_directory_uri() ?>/images/logo.svg" alt="<?php bloginfo('name'); ?>" />
				</a>
				
				<?php wp_nav_menu( array( 'theme_location' => 'mainmenu', 'menu_class' => 'main-menu', 'menu_id' => '', 'container' => 'nav', 'depth' => 0 ) ); ?>
				
				<div class="menu-trigger"><span></span><span></span><span></span></div>

			</div>
		</header>
	
		<div class="show-sticky-header-trigger"></div>
	
	<?php endif;?>
	
	<?php endif;?>