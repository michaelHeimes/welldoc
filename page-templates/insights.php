<?php
/*
Template Name: Insights
Template Post Type: page
*/
?>
<?php get_header(); ?>

<div class="body">
	<!-- <div class="page-head">
		<div class="container">
		</div>
	</div> -->
	<?php
	$featured_post_ids = array();
	$featured_posts = get_field('featured_posts');
	?>
	<?php if ( $featured_posts ) : ?>
	<?php foreach ( $featured_posts as $item ) : ?>
	<?php
	$featured_post_ids[] = $item->ID;
	$content_post = get_post($item->ID);
	$feature_content = get_field('insight_teaser_text', $item->ID);
	$feature_content = $feature_content ? $feature_content : $content_post->post_content;
	$feature_content =  wp_trim_words( $feature_content, 30, '...' );
	$feature_content = apply_filters( 'the_content', $feature_content );
	?>
	<div class="page-head">
		<?php if ( has_post_thumbnail($item->ID) ) : ?>
		<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id($item->ID), 'banner_image', true ); ?>
		<?php $src_2x = wp_get_attachment_image_src( get_post_thumbnail_id($item->ID), 'banner_image_2x', true ); ?>
		<?php $img = $src[0]; ?>
		<?php $img_2x = $src_2x[0]; ?>
		<div class="bg non-retina" style="background-image: url(<?php echo $img; ?>);"></div>
		<div class="bg retina" style="background-image: url(<?php echo $img_2x; ?>);"></div>
		<?php else : ?>
		<?php $output = preg_match_all( '/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $content_post, $matches ); ?>
		<?php $first_img = $matches[1][0]; ?>
		<?php if ( !empty($first_img) ) : ?>
		<div class="bg non-retina" style="background-image: url(<?php echo $first_img; ?>);"></div>
		<div class="bg retina" style="background-image: url(<?php echo $first_img; ?>);"></div>
		<?php endif; ?>
		<?php endif; ?>
		
		<div class="container">
<!--
			<?php
				if ( function_exists('yoast_breadcrumb') ) {
					yoast_breadcrumb('<div class="breadcrumbs">','</div>');
				}
			?>
-->
			<div class="text">
				<h1><?php echo $item->post_title; ?></h1>
				<?php echo $feature_content; ?>
				<a class="btn btn-white" href="<?php echo get_the_permalink($item->ID); ?>">Learn More</a>
			</div>
		</div>
	</div>
	<?php endforeach; ?>
	<?php endif; ?>
	
	<div class="sub-cat">
		<div class="container">
			<?php wp_nav_menu( array( 'menu' => 'Insights Menu', 'menu_class' => '', 'menu_id' => '', 'container' => '' ) ); ?>
<!--
			<div class="search-r">
				<div class="trigger"><i class="fa fa-search" aria-hidden="true"></i></div>
				<div class="form">
					<form method="get" action="<?php bloginfo('url'); ?>/">
						<input type="text" name="s" placeholder="search">
						<input type="hidden" name="post_type" value="insights">
						<button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
					</form>
				</div>
			</div>
-->
		</div>
	</div>

	<div class="post-insights-row post-row">
		<div class="container">
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
					<div class="box">
						<div class="image">
							<a href="<?php the_permalink(); ?>">
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
							</a>
						</div>
						<div class="text">
							<h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<a href="<?php the_permalink(); ?>" class="more">Read More</a>
						</div>
					</div>
				</article>
				<?php if ( $i == 2 ) : ?>
				<article class="col col-1-3 bg-dark">
					<div class="widget widget-share">
						<div class="widget_inner">
							<div class="label">Follow Us on Social</div>
							<ul>
								<?php if ( $social_linkedin_url = get_field( 'social_linkedin_url', 'option' ) ) : ?>
								<li><a href="<?php echo $social_linkedin_url; ?>" target="_blank"><i class="fab fa-linkedin" aria-hidden="true"></i></a></li>
								<?php endif; ?>
								<?php if ( $social_twitter_url = get_field( 'social_twitter_url', 'option' ) ) : ?>
								<li><a href="<?php echo $social_twitter_url; ?>" target="_blank"><i class="fab fa-twitter-square" aria-hidden="true"></i></a></li>
								<?php endif; ?>
								<?php if ( $social_facebook_url = get_field( 'social_facebook_url', 'option' ) ) : ?>
								<li><a href="<?php echo $social_facebook_url; ?>" target="_blank"><i class="fab fa-facebook-square" aria-hidden="true"></i></a></li>
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
			<div class="pagination pagination-full">
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
			<?php wp_reset_query(); ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>