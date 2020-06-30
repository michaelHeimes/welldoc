<?php get_header(); ?>

<div class="body">
	
	<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );?>
	
	<div class="banner blog-head single-blog-head" style="background-image: url(<?php echo $url;?>)">
		<div class="grid-container">
			<div class="grid-x grid-padding-x align-bottom">
				<div class="cell small-12">
					
					<div class="text">
						<div><a href="<?php echo home_url();?>/resource-library">Back to Welldoc Resource Library</a></div>
						
						<h1><?php echo the_title();?></h1>
						
						<div class="read-time"><small><?php the_author_meta('display_name');?><span> | </span><?php the_field('read_time');?></small></div>
					</div>
					
				</div>
			</div>
		</div>
	</div>


	<div class="blog-posts">
		<div class="grid-container">
			<div class="grid-x grid-padding-x">
				
				<?php while ( have_posts() ) : the_post(); ?>
	
				<div class="entry cell small-12">
					<div class="post-pipe"></div>
					<?php the_content(); ?>
					
					<?php if( get_post_type(get_the_ID()) != 'events'):?>
					
						<div class="cat-wrap">
							
							<?php if( get_post_type(get_the_ID()) == 'post'):?>
	
								<?php
									$categories = get_the_category();
									$separator = ' ';
									$output = '';
									if ( ! empty( $categories ) ) {
									    foreach( $categories as $category ) {
									        $output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>' . $separator;
									    }
									    echo trim( $output, $separator );
									}
									?>						
							
							<?php else:?>
							
								<?php   // Get terms for post
								$term_list = get_the_terms($post->ID, 'type-insights');
								$types ='';
								$separator = ' ';
								$output = '';
									foreach($term_list as $term_single) {
								    	$types .= '<a href="' . esc_url( get_category_link( $term_single->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $term_single->name ) ) . '">' . esc_html( $term_single->name ) . '</a>' . $separator;
									}
									$typesz = rtrim($types, $separator);
									echo $typesz;
								?>
							
							<?php endif;?>
							
							
						</div>
						
						<div class="disclaimer">
							<?php the_field('disclaimer', 'option');?>
						</div>
						
					<?php endif;?>
					
				</div>
	
				<?php endwhile; ?>
				
			</div>
			
		</div>
		
		<div class="share">
			<ul>
				
				<li>
					<a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php the_permalink(); ?>" target="_blank"><i class="fab fa-linkedin"></i></a>
				</li>
				
				<li>
					<a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank"><i class="fab fa-facebook-square"></i></a>
				</li>
				
				
				<li>
					<a href="https://twitter.com/home?status=<?php the_title(); ?> - <?php the_permalink(); ?>" target="_blank"><i class="fab fa-twitter-square"></i></a>
				</li>
							
				<li>
					<a href="mailto:?&body=<?php the_title(); ?> - <?php the_permalink(); ?>"><i class="fas fa-envelope-square"></i></a>
				</li>
				
			</ul>
		</div>
		
	</div>	
	
	<?php if( get_post_type(get_the_ID()) != 'events'):?>
				
		<div class="related-posts">
			
			<div class="grid-container">
				<div class="grid-x grid-padding-x">
					
					<h2 class="cell small-12">Related Articles</h2>
					
					<section class="post-lists featured cell small-12">
						
						<div class="grid-x grid-padding-x">
							
							
							<?php if( get_post_type(get_the_ID()) == 'post'):
									
								$post_terms = wp_get_object_terms($post->ID, 'category', array('fields'=>'ids'));
								
								$categories = get_categories( array(
								    'orderby' => 'name',
								    'parent'  => 0
								) );
							
								$category_list = array();
								foreach ( $categories as $category ) {
									$category_list[] = esc_html( $category->term_id ) ;
								}
							
								$more_terms =  implode( ', ', $category_list );
								
								$combo = implode( ', ', array( '1st' => $post_terms, $more_terms));
		
								$args3 = array( 
								'post_type' => 'post',
								'order' => 'DESC',
								'posts_per_page' => 3,
								'post_status' => 'publish',
								'post__not_in' => array( get_the_ID()),
								    'tax_query' => array(
							        array(
							            'taxonomy' => 'category',
							            'field' => 'id',
							            'terms' => $post_terms
							        )
							    )
								
								);
								
								$args2 = array( 
								'post_type' => 'post',
								'order' => 'DESC',
								'posts_per_page' => 3,
								'post_status' => 'publish',
								'post__not_in' => array( get_the_ID()),
								    'tax_query' => array(
							        array(
							            'taxonomy' => 'category',
							            'field' => 'id',
							            'terms' => array($combo)
							        )
							    )
								
								);
	
								$loop3 = new WP_Query( $args3 );
	
								$loop2 = new WP_Query( $args2 );
								
								$count = $loop3->found_posts;
								
								if(($count) >= 3):							
															
									while ( $loop3->have_posts() ) : $loop3->the_post();?>
							
										<?php get_template_part( 'templates/loop', 'post' ); ?>
									
									<?php endwhile; wp_reset_query();?> 	
								
								<?php endif;?>					
	
								<?php
								if(($count) <= 2):							
															
									while ( $loop2->have_posts() ) : $loop2->the_post();?>
							
										<?php get_template_part( 'templates/loop', 'post' ); ?>
									
									<?php endwhile; wp_reset_query();?> 	
								
								<?php endif;?>	
								
							
							<?php else:?>
	
							
							<?php
								//get the taxonomy terms of custom post type
								$customTaxonomyTerms = wp_get_object_terms( $post->ID, 'type-insights', array('fields' => 'ids') );
								
								$categories = get_categories( array(
								    'orderby'  => 'name',
								    'taxonomy' => 'type-insights',
								    'parent'   => 0
								) );
							
								$category_list = array();
								foreach ( $categories as $category ) {
									$category_list[] = esc_html( $category->term_id ) ;
								}
							
								$more_terms =  (implode( ', ', $category_list ));
															
								$combo = implode( ', ', array( '1st' => $customTaxonomyTerms, $more_terms));
								
								var_dump($combo);
															
								//query arguments
								$args3 = array(
								    'post_type' => 'insights',
								    'post_status' => 'publish',
								    'posts_per_page' => 3,
								    'orderby' => 'DESC',
								    'tax_query' => array(
								        array(
								            'taxonomy' => 'type-insights',
								            'field' => 'id',
								            'terms' => $customTaxonomyTerms
								        )
								    ),
								    'post__not_in' => array ($post->ID),
								);
								
								$args2 = array(
								    'post_type' => 'insights',
								    'post_status' => 'publish',
								    'posts_per_page' => 3,
								    'tax_query' => array(
								        array(
								            'taxonomy' => 'type-insights',
								            'field' => 'id',
								            'terms' => array($combo)
								        )
								    ),
								    'post__not_in' => array ($post->ID),
								);
								
								//the query
								$loop3 = new WP_Query( $args3 );
								$loop2 = new WP_Query( $args2 );
								
								$count = $loop3->found_posts;
								
								if(($count) >= 3):	
								
									while ( $loop3->have_posts() ) : $loop3->the_post();?>
								
										<?php get_template_part( 'templates/loop', 'insight' ); ?>
										
									<?php endwhile; wp_reset_query();?> 
									
								<?php endif;?>
								
								<?php
								if(($count) <= 2):	
								
									while ( $loop2->have_posts() ) : $loop2->the_post();?>
								
										<?php get_template_part( 'templates/loop', 'insight' ); ?>
										
									<?php endwhile; wp_reset_query();?> 
									
								<?php endif;?>
								
							<?php endif;?>
					
					</section>
				
			</div>
		</div>
		
	<?php endif;?>
	

</div>


<?php get_footer(); ?>