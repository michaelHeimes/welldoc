<section class="module three-col-copy benefits background-<?php the_sub_field('background_color');?> <?php if(get_sub_field('remove_top_padding') == 'true'):?>no-tp<?php endif;?> <?php if(get_sub_field('remove_bottom_padding') == 'true'):?>no-bp<?php endif;?>">
	
	<div class="grid-container">
		<div class="grid-x grid-padding-x">

			<div class="cell small-12 xmedium-8 xmedium-offset-2">
				
				<div class="grid-x grid-padding-x">
			
					<?php if($heading = get_sub_field('heading')):?>
					<h2 class="large-heading cell small-12 text-center"><?php echo $heading;?></h2>
					<?php endif;?>
					
				</div>
				
			</div>			
			
		</div>
		
		<div class="grid-x grid-padding-x">
			
			<div class="top cell small-12 text-center">
								
				<h3 class="large-heading"><?php the_field('ben_heading');?></h3>
				
			</div>
				
			<div class="small-12">
				<?php if( have_rows('cards') ):?>
				<div class="cards-wrap grid-x grid-padding-x small-up-1 medium-up-2 xmedium-up-3 align-center">
					<?php while ( have_rows('cards') ) : the_row();?>	
					
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
