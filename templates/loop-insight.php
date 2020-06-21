<article class="cell small-12 medium-6 xmedium-4">
	
	<div class="top">
		<div class="image">
			<a href="<?php the_permalink(); ?>">
				<?php if ( has_post_thumbnail() ) : ?>
				<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id(), 'blog_thumb', true ); ?>
				<?php $src_2x = wp_get_attachment_image_src( get_post_thumbnail_id(), 'blog_thumb_2x', true ); ?>
				<?php $img = $src[0]; ?>
				<?php $img_2x = $src_2x[0]; ?>
				<img class="post-thumb" height="274" width="386" src="<?php echo $img; ?>" srcset="<?php echo $img; ?>, <?php echo $img_2x; ?> 2x" alt="<?php the_title(); ?>" />
				<?php else : ?>
				<?php $output = preg_match_all( '/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $content, $matches ); ?>
				<?php $first_img = $matches[1][0]; ?>
				<?php if ( !empty($first_img) ) : ?>
				<img class="post-thumb" height="274" width="386" src="<?php echo $img; ?>" alt="<?php the_title(); ?>" />
				<?php endif; ?>
				<?php endif; ?>
			</a>
		</div>
		
		<h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	
	</div>
		
	<div class="bottom">
		<p><small><?php the_field('read_time');?></small></p>
		
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
	
</article>

<?php if( $wp_query->current_post == 1 ):?>
	<article class="resource-newsletter-box archive-cta-box cell small-12 medium-6 xmedium-4">
		
		<div class="inner">
		
			<h2>Subscribe to Welldoc’s Resource Library</h2>
			
			<p><?php the_field('newsletteroptin_copy', 'option');?></p>
		
			<?php gravity_form( 12, false, false, false, '', false );?>
					
		</div>
		
	</article>
<?php endif;?>
