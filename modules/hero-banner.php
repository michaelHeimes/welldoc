<?php
	$imgID = get_sub_field('background_image');
	$imgSize = "full";
	$imgArr = wp_get_attachment_image_src( $imgID, $imgSize );
	
	$height = get_sub_field('height');

?>

<div class="hero-banner height-<?php echo $height; ?>">
	
	<div class="bg" style="background-image: url(<?php echo $imgArr[0]; ?> );"></div>
	
	<div class="grid-container">
		
		<div class="grid-x grid-padding-x align-middle">
		
			<div class="cell small-12 medium-12 xmedium-7">
				
				<h1><?php the_sub_field('title');?></h1>
				
				<?php if( $copy = get_sub_field('copy')):?>
				
					<div class="copy-wrap">
						<?php echo $copy;?>
					</div>
				
				<?php endif;?>	
				
				<?php if( have_rows('buttons') ):?>
				<div class="buttons-wrap">
					<?php while ( have_rows('buttons') ) : the_row();?>	
					
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
								<a class="btn white link" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
							<?php endif; ?>
						
						<?php endif;?>
							
					
						<?php endwhile;?>
					<?php endif;?>
				
					<?php endwhile;?>
				</div>
				<?php endif;?>
				
			</div>
	
			<div class="cell small-12 medium-12 xmedium-5">
				
			</div>
			
		</div>
	
	</div>
</div>