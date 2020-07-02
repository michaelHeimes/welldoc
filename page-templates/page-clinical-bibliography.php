<?php
/*
Template Name: Clinical Bibliography Page
*/
?>
<?php get_header(); ?>

	<div class="body">
						
		<section>
			<div class="grid-container">
				<div class="grid-x grid-padding-x">
	
					<div class="cell small-12 xmedium-8 large-7">
										
						<h1><?php the_field('heading');?></h1>
						
						<ul class="accordion" data-allow-all-closed="true" data-accordion>
						
							
							<?php
							/*
							* Loop through Categories and Display Posts within
							*/
							$post_type = 'resource';
							
							// Get all the taxonomies for this post type
							$taxonomies = get_object_taxonomies( array( 'post_type' => $post_type ) );
							
							$i=0;
							
							foreach( $taxonomies as $taxonomy ) :
							
							// Gets every "category" (term) in this taxonomy to get the respective posts
							$terms = get_terms( $taxonomy );
							
							foreach( $terms as $term ) : 
							
							$i++ ?>
							
							<li class="accordion-item <?php
            if($i == 1) { echo ' is-active'; } ?>" data-accordion-item>
							
								<a href="#" class="accordion-title"><?php echo $term->name; ?></a>
								
								<div class="single_file_wrap accordion-content" data-tab-content>
						
									<?php
									$args = array(
										'post_type' => $post_type,
										'post_status' => 'publish',
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
									
										
									<?php while( $posts->have_posts() ) : $posts->the_post(); ?>
										
										<div class="single_file_wrap">
											
											<p><span><?php echo $term->name; ?></span>  <?php the_field('title');?></p>
											
											<?php 
											$link = get_field('link');
											if( $link ):
											$link_url = $link['url'];
											$link_title = $link['title'];
											$link_target = $link['target'] ? $link['target'] : '_self';
											?>
											
											<h4><a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?><?php echo the_title(); ?></a></h4>
											
											<a class="arrow-right" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><img src="/wp-content/uploads/2019/01/Right-Arrow.png" alt="arrow-right"/></a>
										
											<?php endif;?>
										
										</div>
											
									<?php endwhile;?>
											
								</div>

									
							<?php endif; ?>
							
							<?php endforeach;
							
							endforeach; ?>
							
							<?php wp_reset_postdata(); ?>
							
							</li>
							
						</ul>
						
					
					</div>
					
					<aside class="sidebar blog-form-sidebar cell small-12 xmedium-4 large-offset-1">
						<div class="inner">
							<?php dynamic_sidebar( 'sidebar-news-events' ) ?>
						</div>
					</aside>
					
										
				</div>
			</div>
		</section>
				
	</div><!-- body -->

<?php get_footer(); ?>