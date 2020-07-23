<article class="post-card cell small-12 medium-6 xmedium-4">
	
	<div class="top">
		<div class="image">
			<a href="<?php the_permalink(); ?>">
				<?php if ( has_post_thumbnail() ) : ?>
				<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id(), 'blog_thumb', true ); ?>
				<?php $src_2x = wp_get_attachment_image_src( get_post_thumbnail_id(), 'blog_thumb_2x', true ); ?>
				<?php $img = $src[0]; ?>
				<?php $img_2x = $src_2x[0]; ?>
				<img class="post-thumb" height="280" width="394" src="<?php echo $img; ?>" srcset="<?php echo $img; ?>, <?php echo $img_2x; ?> 2x" alt="<?php the_title(); ?>" />
				<?php else : ?>
				<?php $output = preg_match_all( '/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $content, $matches ); ?>
				<?php $first_img = $matches[1][0]; ?>
				<?php if ( !empty($first_img) ) : ?>
				<img class="post-thumb" height="280" width="394" src="<?php echo $img; ?>" alt="<?php the_title(); ?>" />
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
		
</article>

<?php if( $wp_query->current_post == 1 ):?>
	<article class="facebook-box archive-cta-box cell small-12 medium-6 xmedium-4">
		
		<div class="inner">
		
			<h2>Follow Us On Facebook</h2>
			
			<p><?php the_field('facebook_follow_copy', 'option');?></p>
		
			<?php if ( $social_facebook_url = get_field( 'social_facebook_url', 'option' ) ) : ?>
			<div class="text-center">		
				<a class="btn blue" href="<?php echo $social_facebook_url; ?>" target="_blank">
					<i class="fab fa-facebook"></i> Like us on Facebook
				</a>
			</div>
			<?php endif; ?>
			
			<div class="resources-link-wrap">
				
				<div class="copy"><span><?php the_field('resources_link_copy', 'option');?></span></div>
	
				<?php 
				$link = get_field('resources_link', 'option' );
				if( $link ): 
				    $link_url = $link['url'];
				    $link_title = $link['title'];
				    $link_target = $link['target'] ? $link['target'] : '_self';
				    ?>
				    <div class="text-right">
				    	<a class="link" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?> <img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow-right-white.svg"/></a>
				    </div>
				<?php endif; ?>
								
			</div>
					
		</div>
		
	</article>
<?php endif;?>
