<?php
/*
Template Name: Events
Template Post Type: page
*/
?>
<?php get_header(); ?>

<div class="body">
	<div class="page-head">
		<div class="grid-container container">
			<div class="grid-x grid-padding-x">
				
<!--
				<?php
					if ( function_exists('yoast_breadcrumb') ) {
						yoast_breadcrumb('<div class="breadcrumbs cell small-12">','</div>');
					}
				?>
-->
				<h1 class="cell small-12"><?php the_title(); ?></h1>
			
			</div>
		</div>
	</div>

	<div class="sub-cat">
		<div class="grid-container container">
			<div class="grid-x grid-padding-x align-middle">
				
				<ul>
					<li><a href="<?php bloginfo('url'); ?>/latest-news/">News</a></li>
					<li class="current"><a href="<?php bloginfo('url'); ?>/upcoming-events/">Events</a></li>
				</ul>
	<!--
				<div class="search-r">
					<div class="trigger"><i class="fa fa-search" aria-hidden="true"></i></div>
					<div class="form">
						<form method="get" action="<?php bloginfo('url'); ?>/">
							<input type="text" name="s" placeholder="search">
							<input type="hidden" name="post_type" value="events">
							<button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
						</form>
					</div>
				</div>
	-->
	
			</div>
		</div>
	</div>
	<?php $today = date('Ymd'); ?>
	<?php $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1; ?>
	<?php query_posts(	
			array(
				'post_type'			=> 'events',
				'paged'				=> $paged,
				'posts_per_page'	=> 10,
				'orderby'			=> 'meta_value_num',
				'order'				=> 'ASC',
				'meta_query' => array(
					array(
						'key'		=> 'start_date',
						'value'		=> $today,
						'compare'	=> '>=',
					)
				)
			)
		);
	?>

	<div class="post-row">
		<div class="grid-container container">
			<div class="grid-x grid-padding-x">
				<div class="cell small-12 xmedium-8 align-top">
					
					<section class="post-lists">
						<?php while ( have_posts() ) : the_post(); ?>
						<?php $post_id = get_the_ID(); ?>
						<?php $term = wp_get_post_terms( $post_id, 'type-events', array( 'fields' => 'all' ) )[0]; ?>
						<?php $event_url = get_field('event_url'); ?>
						<article>
							<?php if ( has_post_thumbnail() ) : ?>
							<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id(), 'news_thumb', true ); ?>
							<?php $src_2x = wp_get_attachment_image_src( get_post_thumbnail_id(), 'news_thumb_2x', true ); ?>
							<?php $img = $src[0]; ?>
							<?php $img_2x = $src_2x[0]; ?>
							<div class="image">
								<a href="<?php echo $event_url ? $event_url : get_permalink(); ?>">
									<img src="<?php echo $img; ?>" srcset="<?php echo $img_2x; ?> 2x" alt="<?php the_title(); ?>" />
								</a>
							</div>
							<?php else : ?>
							<?php $output = preg_match_all( '/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches ); ?>
							<?php $first_img = $matches[1][0]; ?>
							<?php if ( !empty($first_img) ) : ?>
							<div class="image">
								<a href="<?php the_permalink(); ?>">
									<img src="<?php echo $first_img; ?>" alt="<?php the_title(); ?>" />
								</a>
							</div>
							<?php endif; ?>
							<?php endif; ?>
							<div class="text">
								
								<h4><a target="_blank" href="<?php echo get_term_link($term->term_id); ?>"><?php echo $term->name; ?></a></h4>
								<?php if ( $event_url ) : ?>
								<h2 class="title"><a href="<?php echo $event_url; ?>"><?php the_title(); ?> <i class="fa fa-external-link" aria-hidden="true"></i></a></h2>
								<?php else : ?>
								<h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
								<?php endif; ?>
								
								<?php $content = get_the_content(); ?>
								<?php $content = wp_trim_words( $content, 30, '...' ); ?>
								<?php $content = apply_filters( 'the_content', $content ); ?>
								<?php echo $content; ?>
								
								<?php $location = get_field('location'); ?>
								<?php $start_date = get_field('start_date'); ?>
								<?php $end_date = get_field('end_date'); ?>
								
								<?php $start_date_format = strtotime($start_date); ?>
								<?php $end_date_format = strtotime($end_date); ?>
								
								<?php
									if ( date( 'Y', $start_date_format ) == date( 'Y', $end_date_format ) ) {
										if ( date( 'F', $start_date_format ) == date( 'F', $end_date_format ) ) {
											if ( date( 'j', $start_date_format ) == date( 'j', $end_date_format ) ) {
												$date = date( 'F j, Y', $start_date_format );
											} else {
												$date = date( 'F', $start_date_format ) . ' ' . date( 'j', $start_date_format ) . ' - ' . date( 'j', $end_date_format ) . ', ' . date( 'Y', $start_date_format );
											}
										} else {
											$date = date( 'F j', $start_date_format ) . ' - ' . date( 'F j', $end_date_format ) . ', ' . date( 'Y', $start_date_format );
										}
									} else {
										$date = $start_date . ', ' . $end_date;
									}
								?>
								
								<div class="meta <?php echo $start_date; ?> <?php echo $end_date; ?>">
									<?php echo $date; ?>, <?php echo $location; ?>
								</div>
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
				

							
				<aside class="sidebar blog-form-sidebar cell small-12 xmedium-4">
					<?php dynamic_sidebar( 'sidebar-news-events' ) ?>
				</aside>
			
			</div>
			
		</div>
	</div>

</div>

<?php get_footer(); ?>