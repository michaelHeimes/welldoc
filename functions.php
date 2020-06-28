<?php
/** 
 * For more info: https://developer.wordpress.org/themes/basics/theme-functions/
 *
 */	
 
 
//  From old theme
// global $am_option;

// $am_option['shortname'] = "am";
// $am_option['textdomain'] = "am";

// Functions
// require get_parent_theme_file_path( '/includes/fn-core.php' );
// require get_parent_theme_file_path( '/includes/fn-custom.php' );

// Extensions
// require get_parent_theme_file_path( '/includes/extensions/breadcrumb-trail.php' );

/* Theme Init */
// require get_parent_theme_file_path( '/includes/theme-widgets.php' );
// require get_parent_theme_file_path( '/includes/theme-init.php' ); 
 
 
// Old Theme
require_once(get_template_directory().'/functions/fn-core.php'); 
// Old Theme
require_once(get_template_directory().'/functions/fn-custom.php');
// Old Theme
require_once(get_template_directory().'/functions/theme-init.php'); 
// Old Theme
require_once(get_template_directory().'/functions/theme-widgets.php'); 
		
	
// Theme support options
require_once(get_template_directory().'/functions/theme-support.php'); 

// WP Head and other cleanup functions
require_once(get_template_directory().'/functions/cleanup.php'); 

// Register scripts and stylesheets
require_once(get_template_directory().'/functions/enqueue-scripts.php'); 

// Register custom menus and menu walkers
require_once(get_template_directory().'/functions/menu.php'); 

// Register sidebars/widget areas
require_once(get_template_directory().'/functions/sidebar.php'); 

// Makes WordPress comments suck less
require_once(get_template_directory().'/functions/comments.php'); 

// Replace 'older/newer' post links with numbered navigation
require_once(get_template_directory().'/functions/page-navi.php'); 

// Adds support for multiple languages
require_once(get_template_directory().'/functions/translation/translation.php'); 

// Add Text Editor Formats
require_once(get_template_directory().'/functions/formats.php'); 



// Adds site styles to the WordPress editor
// require_once(get_template_directory().'/functions/editor-styles.php'); 

// Remove Emoji Support
// require_once(get_template_directory().'/functions/disable-emoji.php'); 

// Related post function - no need to rely on plugins
// require_once(get_template_directory().'/functions/related-posts.php'); 

// Use this as a template for custom post types
// require_once(get_template_directory().'/functions/custom-post-type.php');

// Customize the WordPress login menu
// require_once(get_template_directory().'/functions/login.php'); 

// Customize the WordPress admin
// require_once(get_template_directory().'/functions/admin.php');
