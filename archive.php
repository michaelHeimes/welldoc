<?php get_header(); ?>

	<?php if(is_tax('type-news')):?>
	
		<div class="page-head">
			<div class="container">
<!--
				<?php
					if ( function_exists('yoast_breadcrumb') ) {
						yoast_breadcrumb('<div class="breadcrumbs">','</div>');
					}
				?>
-->
				
				<div class="breadcrumbs"><span><span><a href="<?php echo home_url();?>">Home</a> // <a href="<?php echo home_url();?>/latest-news">Latest News</a> // <span class="breadcrumb_last" aria-current="page"><?php echo the_archive_title();?></span></span></span></div>

				<h1><?php echo the_archive_title();?></h1>

			</div>
		</div>
	
		<div class="sub-cat">
			<div class="container">
<!--
				<ul>
					<li class="current"><a href="<?php bloginfo('url'); ?>/latest-news/">News</a></li>
					<li><a href="<?php bloginfo('url'); ?>/upcoming-events/">Events</a></li>
				</ul>
-->
	<!--
				<div class="search-r">
					<div class="trigger"><i class="fa fa-search" aria-hidden="true"></i></div>
					<div class="form">
						<form method="get" action="<?php bloginfo('url'); ?>/">
							<input type="text" name="s" placeholder="search">
							<input type="hidden" name="post_type" value="news">
							<button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
						</form>
					</div>
				</div>
	-->
			</div>
		</div>
		<?php $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1; ?>
		<?php query_posts( array( 'post_type' => 'news', 'paged' => $paged, 'posts_per_page' => 10 ) ); ?>
		
		<div class="post-row">
			<div class="container">
				<div class="left-col">
					<section class="post-lists">
						<?php while ( have_posts() ) : the_post(); ?>
						<?php $post_id = get_the_ID(); ?>
						<?php $external_url = get_field('external_url'); ?>
						<?php $url = get_field('url'); ?>
						<?php $term = wp_get_post_terms( $post_id, 'type-news', array( 'fields' => 'all' ) )[0]; ?>
						<article>
							<?php if ( has_post_thumbnail() ) : ?>
							<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id(), 'news_thumb', true ); ?>
							<?php $src_2x = wp_get_attachment_image_src( get_post_thumbnail_id(), 'news_thumb_2x', true ); ?>
							<?php $img = $src[0]; ?>
							<?php $img_2x = $src_2x[0]; ?>
							<div class="image">
								<a <?php echo ( $external_url && $url ) ? 'target="_blank"' : ''; ?> href="<?php echo ( $external_url && $url ) ? $url : get_permalink(); ?>">
									<img src="<?php echo $img; ?>" srcset="<?php echo $img_2x; ?> 2x" alt="<?php the_title(); ?>" />
								</a>
							</div>
							<?php else : ?>
							<?php $output = preg_match_all( '/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches ); ?>
							<?php $first_img = $matches[1][0]; ?>
							<?php if ( !empty($first_img) ) : ?>
							<div class="image">
								<a <?php echo ( $external_url && $url ) ? 'target="_blank"' : ''; ?> href="<?php echo ( $external_url && $url ) ? $url : get_permalink(); ?>">
									<img src="<?php echo $first_img; ?>" alt="<?php the_title(); ?>" />
								</a>
							</div>
							<?php endif; ?>
							<?php endif; ?>
							
							<div class="text">
								<?php if ( !empty($term) ) : ?>
								<?php $extra = ''; ?>
								<?php if ( $term->slug == 'media-coverage' ) : ?>
								<?php $media_coverage_outlet = get_field('media_coverage_outlet'); ?>
								<?php $extra = ': ' . $media_coverage_outlet; ?>
								<?php else : ?>
								<?php $extra = ''; ?>
								<?php endif; ?>
								<h4><a href="<?php echo get_term_link($term->term_id); ?>"><?php echo $term->name; ?><?php echo $extra; ?></a></h4>
								<?php endif; ?>
								
								<h2 class="title">
									<a <?php echo ( $external_url && $url ) ? 'target="_blank"' : ''; ?> href="<?php echo ( $external_url && $url ) ? $url : get_permalink(); ?>"><?php the_title(); ?> <?php echo ( $external_url && $url ) ? ' <i class="fa fa-external-link" aria-hidden="true"></i>' : ''; ?></a>
								</h2>
								<?php $content = get_the_content(); ?>
								<?php $content = wp_trim_words( $content, 30, '...' ); ?>
								<?php $content = apply_filters( 'the_content', $content ); ?>
								<?php echo $content; ?>
								<div class="meta">
									<?php the_time('F j, Y'); ?>
								</div>
								<a <?php echo ( $external_url && $url ) ? 'target="_blank"' : ''; ?> href="<?php echo ( $external_url && $url ) ? $url : get_permalink(); ?>" class="more">Read <?php echo ( $term->name == 'Press Release' ) ? 'Press Release' : 'Article'; ?> <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
							</div>
						</article>
						<?php endwhile; ?>
					</section>
					
					<?php global $wp_query; ?>
					<div class="pagination pagination-full <?php echo $wp_query->max_num_pages; ?>">
						<?php
							$args = array(
								'base'               => get_pagenum_link(1) . '%_%',
								'format'             => 'page/%#%',
								'total'              => $wp_query->max_num_pages,
								'current'            => $paged,
								'show_all'           => false,
								'end_size'           => 2,
								'mid_size'           => 2,
								'prev_next'          => true,
								'prev_text'          => '<i class="fa fa-chevron-left" aria-hidden="true"></i>',
								'next_text'          => '<i class="fa fa-chevron-right" aria-hidden="true"></i>',
								'type'               => 'plain',
								'add_args'           => false,
								'add_fragment'       => '',
								'before_page_number' => '',
								'after_page_number'  => ''
							); 
							echo paginate_links( $args );	
						?>
					</div>
				</div>
				
				<aside class="sidebar">
					<?php dynamic_sidebar( 'sidebar-news-events' ) ?>
				</aside>
			</div>
		</div>	
		
	<?php else:?>

		<?php if(is_post_type_archive('insights') || is_tax('resource-audience') || is_tax('type-insights')):?>
	
			<div class="page-head blog-head" style="background-image: url(<?php the_field('resource_library_banner_image', 'option');?>)">
				<div class="mask"></div>
				<div class="container">
					<div class="text">
						<h1><?php the_field('resource_library_banner_title', 'option');?></h1>
						
						<?php if (is_tax('resource-audience')):?>
						
						<h2><?php echo the_archive_title();?></h2>
										
						<?php elseif (is_tax('type-insights')):?>
						
						<h2>Tagged In: <?php echo the_archive_title();?></h2>
						
						<?php else:?>		
								
							<p><?php the_field('resource_library_banner_text', 'option');?></p>
						
						<?php endif;?>
						
					</div>
				</div>
			</div>
			
			<div class="cat-search-wrap">
				
				<div class="container">
			
					<div id="categories">
										
						<ul id="cat-links">
							<?php
						  $categories = get_categories(array(
						    'show_option_all'    => '',
						    'orderby'            => 'name',
						    'order'              => 'ASC',
						    'style'              => 'list',
						    'show_count'         => 0,
						    'hide_empty'         => 1,
						    'use_desc_for_title' => 1,
						    'child_of'           => 0,
						    'feed'               => '',
						    'feed_type'          => '',
						    'feed_image'         => '',
						    'exclude_tree'       => '',
						    'include'            => '',
						    'hierarchical'       => true,
						    'title_li'           => __( 'Categories' ),
						    'show_option_none'   => __('No categories'),
						    'number'             => NULL,
						    'echo'               => 1,
						    'depth'              => 0,
						    'current_category'   => 0,
						    'pad_counts'         => 0,
						    'taxonomy'           => 'resource-audience',
						    'walker'             => 'Walker_Category' 
						    ));
							foreach ( $categories as $category ) :?>
						  
								<?php  $category_link = sprintf( 
						        '<a href="%1$s" alt="%2$s">%3$s</a>',
						        esc_url( get_category_link( $category->term_id ) ),
						        esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ),
						        esc_html( $category->name )
								);?>
						
								<li<?php if(get_the_archive_title() == ($category->name)):?> class="active"<?php endif;?>><?php echo $category_link;?></li>
						  
							<?php endforeach;?>
						
						</ul>
						
					</div>
						
						
					<div class="search-r resource">
						<div class="trigger"><i class="fa fa-search" aria-hidden="true"></i></div>
						
						<div class="form">
							<form method="get" action="<?php bloginfo('url'); ?>/">
								<input type="text" name="s" placeholder="search">
								<input type="hidden" name="post_type" value="resources">
								<button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
							</form>
						</div>
						
					</div>
					
				</div>
					
			</div>
		
	
		<?php else:?>
		
			
			<div class="page-head blog-head" style="background-image: url(<?php the_field('banner_image', 'option');?>)">
				<div class="mask"></div>
				<div class="container">
					<div class="text">
						<h1><?php the_field('banner_title', 'option');?></h1>

										
						<?php if (is_category()):?>
						
						<h2>Tagged In: <?php echo the_archive_title();?></h2>
						
						<?php else:?>		
								
							<p><?php the_field('resource_library_banner_text', 'option');?></p>
						
						<?php endif;?>


					</div>
				</div>
			</div>
			
			<div class="cat-search-wrap">
			
				<div class="container">
						
					<div id="categories">
						<label>I'm Interested In</label>
						<form id="category-select" class="category-select" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
							<?php 
								$args = array(
									'show_option_all'    => 'All Articles',
									'show_option_none'   => '',
									'option_none_value'  => '-1',
									'orderby'            => 'ID',
									'order'              => 'ASC',
									'show_count'         => 0,
									'hide_empty'         => 1,
									'child_of'           => 0,
									'exclude'            => '',
									'include'            => '',
									'echo'               => 1,
									'selected'           => 0,
									'hierarchical'       => 0,
									'name'               => 'cat',
									'id'                 => '',
									'class'              => 'postform',
									'depth'              => 0,
									'tab_index'          => 0,
									'taxonomy'           => 'category',
									'hide_if_empty'      => false,
									'value_field'	     => 'term_id',
								);
								
								wp_dropdown_categories($args); ?>
								
							<input type="submit" name="submit" value="find" />
						</form>
					</div>
						
						
						<div class="search-r">
							<div class="trigger"><i class="fa fa-search" aria-hidden="true"></i></div>
							<div class="form">
								<form method="get" action="<?php bloginfo('url'); ?>/">
									<input type="text" name="s" placeholder="search">
									<input type="hidden" name="post_type" value="post">
									<button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
								</form>
							</div>
						</div>
					</div>
					
				</div>
					
			</div>
		
		<?php endif;?>
		
		
		
		
	
		<div class="post-blog-row post-row">
			<div class="container">
				<section class="post-lists featured">
	
	
	<!-- 		<?php breadcrumb_trail('echo=1&separator=/'); ?> -->
	
			<?php if (have_posts()) : ?>
	
			<?php while (have_posts()) : the_post(); ?>
			
				<?php if(is_post_type_archive('insights') || is_tax('resource-audience') || is_tax('type-insights')):?>
				
					<?php get_template_part( 'templates/content', 'insight' ); ?>
				
				<?php else:?>
		
					<?php get_template_part( 'templates/content', 'post' ); ?>
					
				<?php endif;?>
							
				
			<?php endwhile; ?>
			
	
	
			<div class="blog-pag pagination pagination-full">
				<?php
					global $wp_query;
					$args = array(
						'base'               => get_pagenum_link(1) . '%_%',
						'format'             => 'page/%#%',
						'total'              => $wp_query->max_num_pages,
						'current'            => $paged,
						'show_all'           => false,
						'end_size'           => 2,
						'mid_size'           => 2,
						'prev_next'          => true,
						'prev_text'          => '<i class="fa fa-chevron-left" aria-hidden="true"></i>',
						'next_text'          => '<i class="fa fa-chevron-right" aria-hidden="true"></i>',
						'type'               => 'plain',
						'add_args'           => false,
						'add_fragment'       => '',
						'before_page_number' => '',
						'after_page_number'  => ''
					); 
					echo paginate_links( $args );	
				?>
			</div>
	
	
		<?php else : ?>
			<?php get_template_part( 'templates/content', 'none' ); ?>
		<?php endif; ?>
	
				</section>
			</div>
		</div>
	
	<?php endif;?>
	
	

	<?php get_sidebar(); ?>

<?php get_footer(); ?>