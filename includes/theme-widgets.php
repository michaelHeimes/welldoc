<?php

/**
 * Custom Text widget class
 *
 */
register_widget('am_WP_Widget_Text');
class am_WP_Widget_Text extends WP_Widget {

	function __construct() {
		$widget_ops = array('classname' => 'widget_text', 'description' => __('Arbitrary text or HTML','am'));
		$control_ops = array('width' => 400, 'height' => 350);
		parent::__construct('am_text', __('Text','am'), $widget_ops, $control_ops);
	}

	function widget( $args, $instance ) {
		extract($args);
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
		$text = apply_filters( 'widget_text', empty( $instance['text'] ) ? '' : $instance['text'], $instance );
		echo $before_widget;
		if ( !empty( $title ) ) { echo $before_title . $title . $after_title; } ?>
			<div class="textwidget"><?php echo !empty( $instance['filter'] ) ? wpautop( $text ) : $text; ?></div>
		<?php
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		if ( current_user_can('unfiltered_html') )
			$instance['text'] =  $new_instance['text'];
		else
			$instance['text'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['text']) ) ); // wp_filter_post_kses() expects slashed
		$instance['filter'] = isset($new_instance['filter']);
		return $instance;
	}

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'text' => '' ) );
		$title = strip_tags($instance['title']);
		$text = esc_textarea($instance['text']);
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','am'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>

		<textarea class="widefat" rows="16" cols="20" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>"><?php echo $text; ?></textarea>

		<p><input id="<?php echo $this->get_field_id('filter'); ?>" name="<?php echo $this->get_field_name('filter'); ?>" type="checkbox" <?php checked(isset($instance['filter']) ? $instance['filter'] : 0); ?> />&nbsp;<label for="<?php echo $this->get_field_id('filter'); ?>"><?php _e('Automatically add paragraphs','am'); ?></label></p>
<?php
	}
}

register_widget('am_WP_Widget_Socials');
class am_WP_Widget_Socials extends WP_Widget {

	function __construct() {
		$widget_ops = array( 'classname' => 'widget-share', 'description' => __( 'Socials Widget', 'am' ) );
		$control_ops = array( 'width' => 400, 'height' => 350 );
		parent::__construct( 'am_socials', __( 'Socials Widget', 'am' ), $widget_ops, $control_ops );
	}

	function widget( $args, $instance ) {
		extract($args);
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
		$text = apply_filters( 'widget_text', empty( $instance['text'] ) ? '' : $instance['text'], $instance );
		echo $before_widget;
		?>
			<div class="label">
				<?php echo $title ?>
			</div>
			<ul>
				<?php if( $social_linkedin_url = get_field( 'social_linkedin_url', 'option' )): ?> 
					<li><a href="<?php echo $social_linkedin_url; ?>" target="_blank"><i class="fab fa-linkedin-square" aria-hidden="true"></i></a></li>
				<?php endif; ?>
				<?php if( $social_twitter_url = get_field( 'social_twitter_url', 'option' )): ?> 
					<li><a href="<?php echo $social_twitter_url; ?>" target="_blank"><i class="fab fa-twitter-square" aria-hidden="true"></i></a></li>
				<?php endif; ?>
				<?php if( $social_facebook_url = get_field( 'social_facebook_url', 'option' )): ?> 
					<li><a href="<?php echo $social_facebook_url; ?>" target="_blank"><i class="fab fa-facebook-square" aria-hidden="true"></i></a></li>
				<?php endif; ?>
				    	
			</ul>
		<?php
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		if ( current_user_can('unfiltered_html') )
			$instance['text'] =  $new_instance['text'];
		else
			$instance['text'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['text']) ) ); // wp_filter_post_kses() expects slashed
		$instance['filter'] = isset($new_instance['filter']);
		return $instance;
	}

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'text' => '' ) );
		$title = strip_tags($instance['title']);
		$text = esc_textarea($instance['text']);
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','am'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>

<?php
	}
}


register_widget('am_WP_Widget_Contact');
class am_WP_Widget_Contact extends WP_Widget {

	function __construct() {
		$widget_ops = array( 'classname' => 'widget-media', 'description' => __( 'Contact Widget', 'am' ) );
		$control_ops = array( 'width' => 400, 'height' => 350 );
		parent::__construct( 'am_contact', __( 'Contact Widget', 'am' ), $widget_ops, $control_ops );
	}

	function widget( $args, $instance ) {
		extract($args);
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
		echo $before_widget;
		?>
			
			<h3><?php echo $title ?></h3>
			<?php if( $contact_name = get_field( 'contact_name', 'option' )): ?> 
				<h4><?php echo $contact_name; ?></h4>
			<?php endif; ?>
			<?php if( $contact_company = get_field( 'contact_company', 'option' )): ?> 
				<p><?php echo $contact_company; ?></p>
	    	<?php endif; ?>
			<?php if( $contact_phone = get_field( 'contact_phone', 'option' )): ?> 
				<div class="cc">
					<i class="fa fa-phone" aria-hidden="true"></i><a href="tel:<?php echo str_replace( array( '+', '.' ), '', $contact_phone ); ?>"><?php echo $contact_phone; ?></a>
				</div>
	    	<?php endif; ?>
			<?php if( $contact_email = get_field( 'contact_email', 'option' )): ?> 
				<div class="cc">
					<i class="fa fa-envelope-open" aria-hidden="true"></i><a href="mailto:<?php echo $contact_email; ?>"><?php echo $contact_email; ?></a>
				</div>
	    	<?php endif; ?>
			
		<?php
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		if ( current_user_can('unfiltered_html') )
			$instance['text'] =  $new_instance['text'];
		else
			$instance['text'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['text']) ) ); // wp_filter_post_kses() expects slashed
		$instance['filter'] = isset($new_instance['filter']);
		return $instance;
	}

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'text' => '' ) );
		$title = strip_tags($instance['title']);
		$text = esc_textarea($instance['text']);
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','am'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>

<?php
	}
}


register_widget('am_WP_Widget_Events');
class am_WP_Widget_Events extends WP_Widget {

	function __construct() {
		$widget_ops = array( 'classname' => 'widget-events', 'description' => __( 'Events Widget', 'am' ) );
		$control_ops = array( 'width' => 400, 'height' => 350 );
		parent::__construct( 'am_events', __( 'Events Widget', 'am' ), $widget_ops, $control_ops );
	}

	function widget( $args, $instance ) {
		extract($args);
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
		$text = apply_filters( 'widget_text', empty( $instance['text'] ) ? '' : $instance['text'], $instance );
		echo $before_widget;
		?>
			<h3><?php echo $title ?></h3>
			<?php $today = date('Ymd'); ?>
			<?php query_posts(	
					array(
						'post_type'			=> 'events',
						'posts_per_page'	=> 3,
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
			<?php while ( have_posts() ) : the_post(); ?>
			<?php $post_id = get_the_ID(); ?>
			<?php $term = wp_get_post_terms( $post_id, 'type-events', array( 'fields' => 'all' ) )[0]; ?>
			<?php $event_url = get_field('event_url'); ?>
			<ul>
				<li>
					<h4>
						<?php if ( $event_url ) : ?>
							<a href="<?php echo $event_url; ?>"><?php the_title(); ?></a>
						<?php else : ?>
							<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						<?php endif; ?>
					</h4>
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
					<p><?php echo $date ?>, <?php echo $location ?></p>
				</li>
			</ul>
		<?php endwhile ?>
		<?php
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		if ( current_user_can('unfiltered_html') )
			$instance['text'] =  $new_instance['text'];
		else
			$instance['text'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['text']) ) ); // wp_filter_post_kses() expects slashed
		$instance['filter'] = isset($new_instance['filter']);
		return $instance;
	}

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'text' => '' ) );
		$title = strip_tags($instance['title']);
		$text = esc_textarea($instance['text']);
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','am'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>

<?php
	}
}



register_widget('am_WP_Widget_Presskit');
class am_WP_Widget_Presskit extends WP_Widget {

	function __construct() {
		$widget_ops = array( 'classname' => 'widget-events', 'description' => __( 'Press Kit Widget', 'am' ) );
		$control_ops = array( 'width' => 400, 'height' => 350 );
		parent::__construct( 'am_press_kit', __( 'Press Kit Widget', 'am' ), $widget_ops, $control_ops );
	}

	function widget( $args, $instance ) {
		extract($args);
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
		$text = apply_filters( 'widget_text', empty( $instance['text'] ) ? '' : $instance['text'], $instance );
		echo $before_widget;
		?>
			<?php if( $pp_heading = get_field( 'pp_heading', 'option' )): ?> 
				<h3><?php echo $pp_heading; ?></h3>
			<?php endif; ?>
		    <?php if( $pp_text = get_field( 'pp_text', 'option' )): ?> 
	    		<p>
	    			<?php echo $pp_text; ?>
	    		</p>
	    	<?php endif; ?>
	    	<?php if( $pp_download_button_text = get_field( 'pp_download_button_text', 'option' )): ?>
		    	<?php if( $pp_file = get_field( 'pp_file', 'option' )): ?> 
					<a href="<?php echo $pp_file['url']; ?>" class="btn btn-outline blue" target="_blank"><?php echo $pp_download_button_text; ?></a>
		    	<?php endif; ?>
	    	<?php endif; ?>
	    	    	
		<?php
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		if ( current_user_can('unfiltered_html') )
			$instance['text'] =  $new_instance['text'];
		else
			$instance['text'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['text']) ) ); // wp_filter_post_kses() expects slashed
		$instance['filter'] = isset($new_instance['filter']);
		return $instance;
	}

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'text' => '' ) );
		$title = strip_tags($instance['title']);
		$text = esc_textarea($instance['text']);
?>

<?php
	}
}


register_widget('am_WP_Widget_Form');
class am_WP_Widget_Form extends WP_Widget {

	function __construct() {
		$widget_ops = array( 'classname' => 'widget-news', 'description' => __( 'Newsletter Widget', 'am' ) );
		$control_ops = array( 'width' => 400, 'height' => 350 );
		parent::__construct( 'am_newsletter', __( 'Newsletter Widget', 'am' ), $widget_ops, $control_ops );
	}

	function widget( $args, $instance ) {
		extract($args);
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
		$shortcode = $instance['shortcode'];
		echo $before_widget;
		?>
			<?php if ( $title ): ?>
			   	<h3><?php echo $title ?></h3>
			<?php endif ?>
			<?php echo do_shortcode( $shortcode ) ?>
		<?php
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['shortcode'] = strip_tags($new_instance['shortcode']);
		return $instance;
	}

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'text' => '' ) );
		$title = strip_tags($instance['title']);
		$shortcode = strip_tags($instance['shortcode']);

?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','am'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('shortcode'); ?>"><?php _e('Shortcode:','am'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('shortcode'); ?>" name="<?php echo $this->get_field_name('shortcode'); ?>" type="text" value="<?php echo esc_attr($shortcode); ?>" />
		</p>
<?php
	}
}
