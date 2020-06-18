<?php get_header(); ?>

<div class="body">
	
	<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );?>
	
	<div class="page-head blog-head single-blog-head" style="background-image: url(<?php echo $url;?>)">
		<div class="container">
			<div class="text">
				<div><a href="<?php echo home_url();?>/resource-library">Back to Welldoc Resource Library</a></div>
				<h1><?php echo the_title();?></h1>
				
				<p><small><?php the_author_meta('display_name');?><span> | </span><?php the_field('read_time');?></small></p>

			</div>
		</div>
	</div>


	<div class="post-row blog-post-row">
		<div class="container">
			<?php while ( have_posts() ) : the_post(); ?>

			<div class="entry">
				<div class="post-pipe"></div>
				<?php the_content(); ?>
				
				<div class="cat-wrap">
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
				</div>
				
				<div class="disclaimer">
					<?php the_field('disclaimer', 'option');?>
				</div>
				
			</div>

			<?php endwhile; ?>
			
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
				
	<div class="post-blog-row post-row related-posts">
		<div class="container">
			<h2>Related Articles</h2>
			<section class="post-lists featured">
			
			<?php
			$cat = get_the_category();
			$args = array( 
			'post_type' => 'insights',
			'category_name' => $cat,
			'posts_per_page' => 3 ,
			'order' => 'DESC'
			
			);
			
			$loop = new WP_Query( $args );
			
			while ( $loop->have_posts() ) : $loop->the_post();?>
	
				<article class="col col-1-3 featured">
					<div class="box">
						<div class="top">
						<div class="image">
							<a href="<?php the_permalink(); ?>">
								<?php if ( has_post_thumbnail() ) : ?>
								<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id(), 'blog_thumb', true ); ?>
								<?php $src_2x = wp_get_attachment_image_src( get_post_thumbnail_id(), 'blog_thumb_2x', true ); ?>
								<?php $img = $src[0]; ?>
								<?php $img_2x = $src_2x[0]; ?>
								<img height="216" width="304" src="<?php echo $img; ?>" srcset="<?php echo $img; ?>, <?php echo $img_2x; ?> 2x" alt="<?php the_title(); ?>" />
								<?php else : ?>
								<?php $output = preg_match_all( '/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $content, $matches ); ?>
								<?php $first_img = $matches[1][0]; ?>
								<?php if ( !empty($first_img) ) : ?>
								<img height="216" width="304" src="<?php echo $first_img; ?>" alt="<?php the_title(); ?>" />
								<?php endif; ?>
								<?php endif; ?>
							</a>
						</div>
							<h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<p><small><?php the_field('read_time');?></small></p>
						</div>
						
						<div class="bottom">
							
							<div class="cat-wrap">
								
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
				
							</div>
							
						</div>
						
					</div>
				</article>
			
			<?php endwhile; wp_reset_query();?> 
			
			</section>
			
		</div>
	</div>
	

</div>


<?php get_footer(); ?>