<?php
/*
Template Name: Blog
Template Post Type: page
*/
?>
<?php get_header(); ?>

<div class="body">
	
	<div class="banner blog-head" style="background-image: url(<?php the_field('banner_image', 'option');?>)">
		<div class="mask"></div>
		<div class="grid-container">
			<div class="grid-x grid-padding-x align-middle align-center">
			<div class="text cell small-12">
				<h1><?php the_field('banner_title', 'option');?></h1>
				<p><?php the_field('banner_text', 'option');?></p>
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

	<div class="post-blog-row post-row">
		<div class="grid-container">
						
			<?php echo do_shortcode('[ajax_load_more id="5429107025" loading_style="infinite fading-circles" container_type="ul" css_classes="post-lists featured grid-x grid-padding-x" post_type="post" scroll_container="post-lists transition_container="false" featured grid-x grid-padding-x"]');?>
			
			
			
<!-- 			<?php get_template_part( 'parts/nav', 'blog-pagination' ); ?> -->
			
			<?php wp_reset_query(); ?>
		</div>
	</div>
		
</div>

<?php get_footer(); ?>