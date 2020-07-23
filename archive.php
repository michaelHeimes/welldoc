<?php get_header(); ?>


	<?php if(is_tax('type-news')):?>
	
		<div class="page-head">
			<div class="container">		
<!-- 				<div class="breadcrumbs"><span><span><a href="<?php echo home_url();?>">Home</a> // <a href="<?php echo home_url();?>/latest-news">Latest News</a> // <span class="breadcrumb_last" aria-current="page"><?php echo the_archive_title();?></span></span></span></div> -->
				
				<h1><?php echo the_archive_title();?></h1>
			</div>
		</div>
	
		<div class="sub-cat">
			<div class="container">

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
					
					<?php get_template_part( 'parts/nav', 'blog-pagination' ); ?>

				</div>
				
				<aside class="sidebar">
					<?php dynamic_sidebar( 'sidebar-news-events' ) ?>
				</aside>
			</div>
		</div>	
		
	<?php else:?>


		<?php if(is_post_type_archive('insights') || is_tax('resource-audience') || is_tax('type-insights')):?>
	
			<div class="banner blog-head" style="background-image: url(<?php the_field('resource_library_banner_image', 'option');?>)">
				<div class="mask"></div>
				<div class="grid-container">
					<div class="grid-x grid-padding-x align-middle align-center">
						<div class="text cell small-12">
							
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
			</div>
			
			<div class="cat-search-wrap">
				
				<div class="grid-container">
					
					<div class="grid-x grid-padding-x align-middle">
			
						<div id="categories" class="cell small-6 medium-8 large-7">
											
							<ul id="cat-links" class="grid-x grid-padding-x align-justify">
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
							
							
						<div class="cell shrink">
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
					
			</div>
		
	
		<?php else:?>
		
			
			<div class="banner blog-head" style="background-image: url(<?php the_field('banner_image', 'option');?>)">
				<div class="mask"></div>
				<div class="grid-container">
					<div class="grid-x grid-padding-x align-middle align-center">
						<div class="text cell small-12">
							
							<h1><?php the_field('banner_title', 'option');?></h1>
	
											
							<?php if (is_category()):?>
							
							<h2>Tagged In: <?php echo the_archive_title();?></h2>
							
							<?php else:?>		
									
								<p><?php the_field('resource_library_banner_text', 'option');?></p>
							
							<?php endif;?>

						</div>
					</div>
				</div>
			</div>
			
			<div class="cat-search-wrap">
			
				<div class="grid-container">
					
					<div class="grid-x grid-padding-x align-middle">
						
						<div id="categories" class="cell shrink xmedium-10">
							
							<div class="grid-x grid-padding-x align-middle">
							
								<label class="left cell shrink">I'm Interested In</label>
								
								<div class="right cell shrink">
								
									<form id="category-select" class="category-select grid-x grid-padding-x" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
										
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
												'class'              => 'postform cell shrink',
												'depth'              => 0,
												'tab_index'          => 0,
												'taxonomy'           => 'category',
												'hide_if_empty'      => false,
												'value_field'	     => 'term_id',
											);
											
											wp_dropdown_categories($args); ?>
											
										<input type="submit" name="submit" value="find" class="cell shrink" />
										
									</form>
									
								</div>
								
							</div>
								
						</div>
						
						
						<div class="cell shrink">
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
					
			</div>
			
		
		<?php endif;?>
		
		
		
		
	
		<div class="post-blog-row post-row">

					<?php if(is_post_type_archive('insights') || is_tax('resource-audience') || is_tax('type-insights')):?>
					
						<?php
							$term = get_queried_object();
							$term_slug = $term->slug;
							$tax_slug = get_query_var('taxonomy');;
						?>
												
						<?php echo do_shortcode('[ajax_load_more id="9851027870" taxonomy="' . $tax_slug . '" taxonomy_terms="' . $term_slug . '" taxonomy_operator="IN" container_type="ul" css_classes="post-lists featured grid-x grid-padding-x" post_type="insights" scroll_container="post-lists transition_container="false" featured grid-x grid-padding-x"]');?>
												
					<?php else:?>
					
						
						<?php
							$cat = get_category( get_query_var( 'cat' ) );
							$cat_slug = $cat->slug;							
						?>
					
						<?php echo do_shortcode('[ajax_load_more id="5429107025" category="' . $cat_slug . '" container_type="ul" css_classes="post-lists featured grid-x grid-padding-x" post_type="post" scroll_container="post-lists transition_container="false" grid-container"]');?>
					
					
					<?php endif;?>

	
<!-- 				<?php get_template_part( 'parts/nav', 'blog-pagination' ); ?> -->
	
		</div>
	
	<?php endif;?>
	
	

	<?php get_sidebar(); ?>

<?php get_footer(); ?>