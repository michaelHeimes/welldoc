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
				<img class="post-thumb" height="216" width="304" src="<?php echo $img; ?>" srcset="<?php echo $img; ?>, <?php echo $img_2x; ?> 2x" alt="<?php the_title(); ?>" />
				<?php else : ?>
				<?php $output = preg_match_all( '/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $content, $matches ); ?>
				<?php $first_img = $matches[1][0]; ?>
				<?php if ( !empty($first_img) ) : ?>
				<img class="post-thumb" height="216" width="304" src="<?php echo $img; ?>" alt="<?php the_title(); ?>" />
				<?php endif; ?>
				<?php endif; ?>
			</a>
		</div>
			<h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		</div>
		
		<div class="bottom">
			<p><small><?php the_field('read_time');?></small></p>
			
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
			
		</div>
		
	</div>
</article>
<?php if( $wp_query->current_post == 1 ):?>
<article class="col col-1-3 blue-bg facebook-box">
	
	<div class="box">
	
		<label>Follow Us On Facebook</label>
		
		<p><?php the_field('facebook_follow_copy', 'option');?></p>
	
		<?php if ( $social_facebook_url = get_field( 'social_facebook_url', 'option' ) ) : ?>		
		<a class="btn-blue btn" href="<?php echo $social_facebook_url; ?>" target="_blank"><i class="fab fa-facebook-square"></i> Like us on Facebook</i></a>
		<?php endif; ?>
		
		<div class="resources-link-wrap">
			<p><small><?php the_field('resources_link_copy', 'option');?></small></p>
			
			<?php if ( $resources_link = get_field( 'resources_link', 'option' ) ) : ?>		
			<a href="<?php echo $resources_link; ?>" target="_blank">Visit Here <img src="/wp-content/uploads/2019/09/white.svg"/></a>
			<?php endif; ?>		
		</div>
				
	</div>
	
</article>
<?php endif;?>
