<?php
/*
Template Name: Getting Started Landing
*/
?>
<?php get_header(); ?>

<div class="body">
		<?php 
		$imgID = get_field('page_background_image');
		$imgSize = "full";
		$imgArr = wp_get_attachment_image_src( $imgID, $imgSize ); ?>
	<div id="outcomes-landing-wrap" style="background-image: url(<?php echo $imgArr[0]; ?> );background-repeat: no-repeat; background-position: center right;">
		<div id="outcomes-landing-intro-wrap">
			<h2 id="outcomes-landing-intro" class="container"><?php the_field('page_intro');?></h2>
		</div>
		

		
		<nav id="getting-started-landing-body-wrap" class="container">
			
			
			<?php if( have_rows('systems_link') ):
				while ( have_rows('systems_link') ) : the_row();	
					$imgID1 = get_sub_field('background_image');
					$imgSize1 = "full";
					$imgArr1 = wp_get_attachment_image_src( $imgID1, $imgSize1 );
					
					$link = get_sub_field('page_link');
					if( $link ): 
						$link_url = $link['url'];
						$link_title = $link['title'];
						$link_target = $link['target'] ? $link['target'] : '_self';
					
				?>

				<a class="getting-started-link-wrap landing-link" style="background: #fff url(<?php echo $imgArr1[0]; ?> );background-repeat: no-repeat;background-position: center center; background-size:cover;" href="<?php echo esc_url($link_url); ?>">
					
					<div class="outcome-landing-link-mask show-hovered"></div>
					
					<div class="outcome-landing-content-wrap show-hovered">

						<h2><?php the_sub_field('title');?></h2>
						<p class="outcome-landing-copy"><?php the_sub_field('copy');?></p>
						<p class="outcome-landing-link-title"><?php echo esc_html($link_title); ?></p>
						
					</div>
					
				</a>
				
					<?php endif;?>
				<?php endwhile;
			endif; ?>
			
			
			<?php if( have_rows('plans_link') ):
				while ( have_rows('plans_link') ) : the_row();	
					$imgID1 = get_sub_field('background_image');
					$imgSize1 = "full";
					$imgArr1 = wp_get_attachment_image_src( $imgID1, $imgSize1 );
					
					$link = get_sub_field('page_link');
					if( $link ): 
						$link_url = $link['url'];
						$link_title = $link['title'];
						$link_target = $link['target'] ? $link['target'] : '_self';
					
				?>
				
				<a class="getting-started-link-wrap landing-link" style="background-image: url(<?php echo $imgArr1[0]; ?> );background-repeat: no-repeat;background-position: center center; background-size:cover;" href="<?php echo esc_url($link_url); ?>">
					
					<div class="outcome-landing-link-mask show-hovered"></div>					

					<div class="outcome-landing-content-wrap show-hovered">
					
						<h2><?php the_sub_field('title');?></h2>
						<p class="outcome-landing-copy"><?php the_sub_field('copy');?></p>
						<p class="outcome-landing-link-title"><?php echo esc_html($link_title); ?></p>
						
					</div>
					
				</a>

					<?php endif;?>
				<?php endwhile;
			endif; ?>
			
			
			<?php if( have_rows('employers_link') ):
				while ( have_rows('employers_link') ) : the_row();	
					$imgID1 = get_sub_field('background_image');
					$imgSize1 = "full";
					$imgArr1 = wp_get_attachment_image_src( $imgID1, $imgSize1 );
					
					$link = get_sub_field('page_link');
					if( $link ): 
						$link_url = $link['url'];
						$link_title = $link['title'];
						$link_target = $link['target'] ? $link['target'] : '_self';
					
				?>
				
				<a class="getting-started-link-wrap landing-link" style="background-image: url(<?php echo $imgArr1[0]; ?> );background-repeat: no-repeat;background-position: center center; background-size:cover;" href="<?php echo esc_url($link_url); ?>">
					
					<div class="outcome-landing-link-mask show-hovered"></div>					

					<div class="outcome-landing-content-wrap show-hovered">
					
						<h2><?php the_sub_field('title');?></h2>
						<p class="outcome-landing-copy"><?php the_sub_field('copy');?></p>
						<p class="outcome-landing-link-title"><?php echo esc_html($link_title); ?></p>
						
					</div>
					
				</a>

					<?php endif;?>
				<?php endwhile;
			endif; ?>
			
			
		</nav>
		
		
		
	</div>


<?php get_footer(); ?>









