<?php get_header(); ?>

<div class="body">
	<div class="page-head">
		<div class="container">
			<?php
				if ( function_exists('yoast_breadcrumb') ) {
					yoast_breadcrumb('<div class="breadcrumbs">','</div>');
				}
			?>
			<h1>Search: <span><?php  echo get_search_query(); ?></span></h1>
		</div>
	</div>

	<div class="sub-cat">
		<div class="container">
			<?php if ( $_GET['post_type'] == 'insights' ) : ?>
			<?php wp_nav_menu( array( 'menu' => 'Insights Menu', 'menu_class' => '', 'menu_id' => '', 'container' => '' ) ); ?>
			<?php endif; ?>
<!--
			<div class="search-r">
				<div class="trigger"><i class="fa fa-search" aria-hidden="true"></i></div>
				<div class="form">
					<form method="get" action="<?php bloginfo('url'); ?>/">
						<input type="text" name="s" placeholder="search">
						<button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
					</form>
				</div>
			</div>
-->
		</div>
	</div>
	<?php $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1; ?>
	<?php $post_type = get_query_var('post_type'); ?>
	<?php //query_posts( array( 'post_type' => 'news', 'paged' => $paged, 'posts_per_page' => 10 ) ); ?>
	
	<div class="post-<?php echo $_GET['post_type']; ?>-row post-row">
		<div class="container">
			
			<?php if ( $post_type == 'insights' ) : ?>
			
			<section class="post-lists featured">
				<?php $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1; ?>
				<?php query_posts( array(
							'post_type' => 'insights',
							'post__not_in' => $featured_post_ids,
							'paged' => $paged,
							'post_status' => array('publish'),
							'posts_per_page' => 10,
						) ); ?>
				<?php $i = 0; ?>
				<?php while ( have_posts() ) : the_post(); ?>
				<?php $i++; ?>
				<?php $post_id = get_the_ID(); ?>
				<?php $content = get_field('insight_teaser_text', $post_id); ?>
				<?php $content = $content ? $content : get_the_content(); ?>
				<article class="col col-1-3 featured">
					<div class="image">
						<?php if ( has_post_thumbnail() ) : ?>
						<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id(), 'insights_image', true ); ?>
						<?php $src_2x = wp_get_attachment_image_src( get_post_thumbnail_id(), 'insights_image_2x', true ); ?>
						<?php $img = $src[0]; ?>
						<?php $img_2x = $src_2x[0]; ?>
						<img height="225" width="290" src="<?php echo $img; ?>" srcset="<?php echo $img; ?>, <?php echo $img_2x; ?> 2x" alt="<?php the_title(); ?>" />
						<?php else : ?>
						<?php $output = preg_match_all( '/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $content, $matches ); ?>
						<?php $first_img = $matches[1][0]; ?>
						<?php if ( !empty($first_img) ) : ?>
						<img height="225" width="290" src="<?php echo $first_img; ?>" alt="<?php the_title(); ?>" />
						<?php endif; ?>
						<?php endif; ?>
					</div>
					<div class="text">
						<h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<a href="<?php the_permalink(); ?>" class="more">Read More</a>
					</div>
				</article>
				<?php if ( $i == 2 ) : ?>
				<article class="col col-1-3 bg-dark">
					<div class="widget widget-share">
						<div class="widget_inner">
							<div class="label">Follow Us on Social</div>
							<ul>
								<?php if ( $social_linkedin_url = get_field( 'social_linkedin_url', 'option' ) ) : ?>
								<li><a href="<?php echo $social_linkedin_url; ?>" target="_blank"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
								<?php endif; ?>
								<?php if ( $social_twitter_url = get_field( 'social_twitter_url', 'option' ) ) : ?>
								<li><a href="<?php echo $social_twitter_url; ?>" target="_blank"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
								<?php endif; ?>
								<?php if ( $social_facebook_url = get_field( 'social_facebook_url', 'option' ) ) : ?>
								<li><a href="<?php echo $social_facebook_url; ?>" target="_blank"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
								<?php endif; ?>
							</ul>
						</div>
					</div>
					<?php dynamic_sidebar('sidebar-insights'); ?>
					<?php /*
					<div class="widget widget-q-link">
						<p>Learn More</p>
						<?php wp_nav_menu( array( 'menu' => 'Insights Menu', 'menu_class' => '', 'menu_id' => '', 'container' => '' ) ); ?>
					</div>
					*/ ?>
				</article>
				<?php endif; ?>
				<?php endwhile; ?>
			</section>
			<?php global $wp_query; ?>
				<div class="pagination pagination-full <?php echo $wp_query->max_num_pages; ?>">
					<?php
						$url = get_pagenum_link(1);
						if ( strpos( $url, '?' ) ) {
							$t = explode( '?', $url ); 
							$url = $t[0];
						}
						?>
						<?php /*
						<?php echo get_pagenum_link(1) ?>
						<?php echo $url ?>
						*/ ?>
						<?php
						$args = array(
							'base'               => $url . '%_%',
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
			<?php wp_reset_query(); ?>
			
			<?php else : ?>
			
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
						$url = get_pagenum_link(1);
						if ( strpos( $url, '?' ) ) {
							$t = explode( '?', $url ); 
							$url = $t[0];
						}
						?>
						<?php /*
						<?php echo get_pagenum_link(1) ?>
						<?php echo $url ?>
						*/ ?>
						<?php
						$args = array(
							'base'               => $url . '%_%',
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
				<?php dynamic_sidebar('sidebar-news-events'); ?>
			</aside>
			
			<?php endif; ?>
		</div>
	</div>

</div>

<?php get_footer(); ?>