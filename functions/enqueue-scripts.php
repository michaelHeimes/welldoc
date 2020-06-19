<?php
function site_scripts() {
  global $wp_styles; // Call global $wp_styles variable to add conditional wrapper around ie stylesheet the WordPress way
  
  
  	wp_enqueue_script( 'jquery-ui-accordion' );
	
	wp_enqueue_script( 'jquery-ui-tabs' );
		
	wp_enqueue_script('jquery-modal-js', get_template_directory_uri() . '/includes/extensions/jquery-modal/jquery.modal.min.js', array('jquery3.2.1'), '20151215', true);
	
// 	wp_enqueue_script('slick-js', get_template_directory_uri() . '/includes/extensions/slick/slick.min.js', array('jquery'), true);
  
//   	wp_enqueue_script('greensock-tweenMax', get_template_directory_uri() . '/includes/extensions/greensock/TweenMax.min.js', array(), '20151215', true);

// 	wp_enqueue_script('greensock-draggable', get_template_directory_uri() . '/includes/extensions/greensock/Draggable.min.js', array(), '20151215', true);
	
// 	wp_enqueue_script('throw-props', get_template_directory_uri() . '/includes/extensions/greensock/ThrowPropsPlugin.min.js', array(), '20151215', true);
		
	wp_enqueue_script('scroll-magic', get_template_directory_uri() . '/includes/extensions/scrollmagic/ScrollMagic.min.js', array(), '20151215', true);
	
	wp_enqueue_script('scroll-magic-gsap', get_template_directory_uri() . '/includes/extensions/scrollmagic/animation.gsap.min.js', array(), '20151215', true);
        
    // Adding scripts file in the footer
    wp_enqueue_script( 'site-js', get_template_directory_uri() . '/assets/scripts/scripts.js', array( 'jquery' ), filemtime(get_template_directory() . '/assets/scripts/js'), true );
    
    wp_enqueue_style( 'museo-font', 'https://use.typekit.net/jxa1fge.css', true);
   
    // Register main stylesheet
    wp_enqueue_style( 'site-css', get_template_directory_uri() . '/assets/styles/style.css', array(), filemtime(get_template_directory() . '/assets/styles/scss'), 'all' );

    // Comment reply script for threaded comments
    if ( is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
      wp_enqueue_script( 'comment-reply' );
    }
}
add_action('wp_enqueue_scripts', 'site_scripts', 999);