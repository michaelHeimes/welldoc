<?php
/*
Template Name: Demo
*/
?>
<?php get_header(); ?>

<div class="body">
	<?php $banner = get_field('banner'); ?>
	<div class="page-head">
		<div class="container">
			<?php
				if ( function_exists('yoast_breadcrumb') ) {
					yoast_breadcrumb('<div class="breadcrumbs">','</div>');
				}
			?>
			<?php if ( $heading = $banner['heading'] ) : ?>
			<h1 class="fw"><?php echo $heading; ?></h1>
			<?php endif; ?>
		</div>
	</div>
	<?php $form_section = get_field('form_section'); ?>
	<?php $background_image = $form_section['background_image']; ?>
	<?php if ( $background_image ) : ?>
	<style>
		.demo-request:before {
			background: url(<?php echo $background_image['url']; ?>) no-repeat 50% 0;
			background-size: 100% auto, cover;
		}
		@media (min-width: 1100px) {
			.demo-request:before {
				background-position: 50% 5%;
			}
		}
	</style>
	<?php endif; ?>
	
	<div class="demo-request">
		<div class="container">
			<?php if ( $heading = $form_section['heading'] ) : ?>
			<h2 class="title"><?php echo $heading; ?></h2>
			<?php endif; ?>
			<?php if ( $subheading = $form_section['subheading'] ) : ?>
			<h3><?php echo $subheading; ?></h3>
			<?php endif; ?>
			<div class="cols">
				<div class="form">
					<?php if ( $form_embed = $form_section['form_embed'] ) : ?>
					<?php echo do_shortcode($form_embed); ?>
					<?php endif; ?>
				</div>
				<div class="logo">
					<img alt="" src="<?php bloginfo('template_directory'); ?>/images/demo-logo.png" srcset="<?php bloginfo('template_directory'); ?>/images/demo-logo@2x.png 2x">
				</div>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>