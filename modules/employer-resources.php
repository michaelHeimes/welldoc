<section class="employer-resources module <?php if(get_sub_field('remove_top_padding') == 'true'):?>no-tp<?php endif;?> <?php if(get_sub_field('remove_bottom_padding') == 'true'):?>no-bp<?php endif;?>">
	<div class="grid-container">
		<div class="grid-x grid-padding-x align-center">	
		
			<div class="cell small-12 xmedium-10">
				
				
				<h2 class="large-heading text-center"><?php the_sub_field('heading');?></h2>
				
				<div class="grid-x grid-padding-x">
				
					<?php
					$featured_posts = get_sub_field('resources');
					if( $featured_posts ): ?>
					    <?php foreach( $featured_posts as $post ): 
					
					        // Setup this post for WP functions (variable must be named $post).
					        setup_postdata($post); 
					        								        
					?>
					        
						<div class="single-card cell small-12 medium-6 xmedium-4">
							
							<div class="thumb-wrap">
								
								<?php the_post_thumbnail('resource_card');?>
								
							</div>
							
							<div class="text-wrap">
								<h3><?php the_title(); ?></h3>
								<div class="read-time"><?php the_field('read_time');?></div>
							</div>
								
							</a>
						</div>
					    
					    <?php endforeach; ?>
					    <?php 
					    // Reset the global post object so that the rest of the page works correctly.
					    wp_reset_postdata(); ?>
					<?php endif; ?>
					
				</div>
																					
			</div>
							
		</div>
	</div>
</section>







