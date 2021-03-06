<?php get_header(); ?>

	
<div class="body">
	<div class="page-head">
		<div class="container">
<!--
			<?php
				if ( function_exists('yoast_breadcrumb') ) {
					yoast_breadcrumb('<div class="breadcrumbs">','</div>');
				}
			?>
-->
			<?php
				$author = get_user_by( 'slug', get_query_var('author_name') );
				$author_id = $author->ID;
				
				$author_name = get_the_author_meta( 'first_name', $author_id ) . ' ' . get_the_author_meta( 'last_name', $author_id );
				$author_name = ( ( get_the_author_meta( 'first_name', $author_id ) == '' ) && ( get_the_author_meta( 'last_name', $author_id ) == '' ) ) ? get_the_author_meta( 'display_name', $author_id ) : $author_name;
			?>
			<h1><?php echo $author_name; ?></h1>
		</div>
	</div>

	<div class="sub-cat">
		<div class="container">
			<div class="search-r">
				<div class="trigger"><i class="fa fa-search" aria-hidden="true"></i></div>
				<div class="form">
					<form method="get" action="<?php bloginfo('url'); ?>/">
						<input type="text" name="s" placeholder="search">
						<button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<?php $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1; ?>
	
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
						$url = get_pagenum_link(1);
						if( strpos( $url, '?' ) ){
							$t = explode( '?', $url ); 
							$url = $t[0];
						}
						?>
						<!-- 
						<?php echo get_pagenum_link(1) ?>
						<?php echo $url ?>
						 -->
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
				<?php dynamic_sidebar( 'sidebar-news-events' ) ?>
			</aside>
		</div>
	</div>

</div>

<?php get_footer(); ?>