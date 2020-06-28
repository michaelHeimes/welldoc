<section class="full-width-img module background-<?php the_sub_field('background_color');?> <?php if(get_sub_field('remove_top_padding') == 'true'):?>no-tp<?php endif;?> <?php if(get_sub_field('remove_bottom_padding') == 'true'):?>no-bp<?php endif;?>">
	<div class="grid-container">
		
		<div class="grid-x grid-padding-x align-middle align-justify">	

			<div class="img-wrap half cell small-12">
				
			<?php 
			$image = get_sub_field('image');
			if( !empty( $image ) ): ?>
			    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
			<?php endif; ?>					
				
			</div>
		
		</div>
	</div>
</section>