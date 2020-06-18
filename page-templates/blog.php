<?php
/*
Template Name: Blog
Template Post Type: page
*/
?>
<?php get_header(); ?>

<div class="body">
	
	<div class="page-head blog-head" style="background-image: url(<?php the_field('banner_image', 'option');?>)">
		<div class="mask"></div>
		<div class="container">
			<div class="text">
				<h1><?php the_field('banner_title', 'option');?></h1>
				<p><?php the_field('banner_text', 'option');?></p>
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

	<div class="post-blog-row post-row">
		<div class="container">
			<section class="post-lists featured">
				<?php $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1; ?>
				<?php query_posts( array(
					'post_type' => 'post',
// 					'post__not_in' => $featured_post_ids,
					'paged' => $paged,
					'post_status' => array('publish'),
					'posts_per_page' => 5,
				) ); ?>
				<?php while ( have_posts() ) : the_post(); ?>
				
					<?php get_template_part( 'templates/content', 'post' ); ?>
			
				<?php endwhile; ?>
			</section>
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
			<?php wp_reset_query(); ?>
		</div>
	</div>
		
</div>

<?php get_footer(); ?>