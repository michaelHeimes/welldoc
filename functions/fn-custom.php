<?php

add_image_size( 'content_image', 0, 600, true );
add_image_size( 'content_image_2x', 0, 1200, true );

add_image_size( 'image_request', 340, 0, true );
add_image_size( 'image_request_2x', 680, 0, true );

add_image_size( 'questions_thumb', 400, 0, true);
add_image_size( 'questions_thumb_2x', 800, 0, true);

add_image_size( 'landing_thumb', 370, 0, true);
add_image_size( 'landing_thumb_2x', 740, 0, true);

add_image_size( 'store', 162, 49, true);
add_image_size( 'store_2x', 324, 98, true);

add_image_size( 'testimonial', 102, 102, true);

add_image_size( 'content', 1024, 305, true);
add_image_size( 'content_2x', 2048, 610 , true);

add_image_size( 's5', 427, 297, true);
add_image_size( 's5_2x', 974, 632 , true);

add_image_size( 's6', 384, 320, true);
add_image_size( 's6_2x', 768, 640 , true);

add_image_size( 'news_thumb', 130, 130, true);
add_image_size( 'news_thumb_2x', 260, 260, true);

add_image_size( 'event_thumb', 160, 0, true);
add_image_size( 'event_thumb_2x', 320, 0, true);

add_image_size( 'team_thumb', 115, 115, true);
add_image_size( 'team_thumb_2x', 230, 230, true);

add_image_size( 'team_single_thumb', 140, 140, true);
add_image_size( 'team_single_thumb_2x', 280, 280, true);

add_image_size( 'banner_image', 1024, 0, true);
add_image_size( 'banner_image_2x', 2048, 0, true);

add_image_size( 'step_image', 269, 0, true);
add_image_size( 'step_image_2x', 538, 0, true);

add_image_size( 'publication_thumb', 125, 0, true);

add_image_size( 'review_image', 195, 88, true);
add_image_size( 'review_image_2x', 390, 176, true);

add_image_size( 'more_image_one', 451, 188, true);

add_image_size( 'more_image_two', 266, 95, true);
add_image_size( 'more_image_two_2x', 532, 190, true);

add_image_size( 'solutions_image', 288, 0, true);
add_image_size( 'solutions_image_2x', 576, 0, true);

add_image_size( 'testimonial_image', 144, 144, true);
add_image_size( 'testimonial_image_2x', 288, 288, true);

add_image_size( 'investors_image', 150, 0, true);
add_image_size( 'investors_image_2x', 300, 0, true);

add_image_size( 'partners_image', 0, 50, true);
add_image_size( 'partners_image_2x', 0, 100, true);

add_image_size( 'featured_banner_image', 1920, 550, true);
add_image_size( 'featured_banner_image_2x', 3840, 1100, true);

add_image_size( 'insights_image', 290, 225, true);
add_image_size( 'insights_image_2x', 580, 450, true);

add_image_size( 'quote_author', 240, 240, true);
add_image_size( 'quote_author_2x', 480, 480, true);

add_image_size( 'video_card', 376, 404, true);
add_image_size( 'video_card_2x', 752, 808, true);

add_image_size( 'blog_thumb', 394, 280, true);
add_image_size( 'blog_thumb_2x', 788, 560, true);

add_image_size( 'resource_card',646, 462, true);

add_image_size( 'three_col_polaroids_card',400, 298, true);

add_action('init', 'custom_post_type_news', 0);



add_filter( 'be_media_from_production_url', function() {
	return 'https://www.welldoc.com/';
});



function custom_post_type_news() {

    $labels = array(
        'name'						=> _x('News', 'Post Type General Name', 'welldoc'),
        'singular_name'				=> _x('News', 'Post Type Singular Name', 'welldoc'),
        'menu_name'					=> __('News', 'welldoc'),
        'name_admin_bar'			=> __('News', 'welldoc'),
        'archives'					=> __('Archives', 'welldoc'),
        'parent_item_colon'			=> __('Parent News:', 'welldoc'),
        'all_items'					=> __('All News', 'welldoc'),
        'add_new_item'				=> __('Add New News', 'welldoc'),
        'add_new'					=> __('Add New', 'welldoc'),
        'new_item'					=> __('New News', 'welldoc'),
        'edit_item'					=> __('Edit News', 'welldoc'),
        'update_item'				=> __('Update News', 'welldoc'),
        'view_item'					=> __('View News', 'welldoc'),
        'search_items'				=> __('Search News', 'welldoc'),
        'not_found'					=> __('Not Found', 'welldoc'),
        'not_found_in_trash'		=> __('Not Found in Trash', 'welldoc'),
        'featured_image'			=> __('Featured Image', 'welldoc'),
        'set_featured_image'		=> __('Set Featured Image', 'welldoc'),
        'remove_featured_image'		=> __('Remove Featured Image', 'welldoc'),
        'use_featured_image'		=> __('Use as Featured Image', 'welldoc'),
        'insert_into_item'			=> __('Insert into News', 'welldoc'),
        'uploaded_to_this_item'		=> __('Uploaded to This News', 'welldoc'),
        'items_list'				=> __('Items list', 'welldoc'),
        'items_list_navigation'		=> __('News List Navigation', 'welldoc'),
        'filter_items_list'			=> __('Filter News List', 'welldoc'),
    );
    $args = array(
        'label'						=> __('News', 'welldoc'),
        'description'				=> __('Post Type News', 'welldoc'),
        'labels'					=> $labels,
        'supports'					=> array('title', 'editor', 'thumbnail', 'author'),
        'hierarchical'				=> false,
        'public'					=> true,
        'show_ui'					=> true,
        'show_in_menu'				=> true,
        'menu_position'				=> 5,
        'show_in_admin_bar'			=> true,
        'show_in_nav_menus'			=> true,
        'can_export'				=> true,
        'has_archive'				=> false,
        'exclude_from_search'		=> false,
        'publicly_queryable'		=> true,
        'capability_type'			=> 'post',
        'taxonomies'				=> array('type'),
        'rewrite'					=> array('slug' => 'news'),
    );
    register_post_type('news', $args);
	
	// post type Insights
	 $labels = array(
        'name'						=> _x('Resource Library', 'Post Type General Name', 'welldoc'),
        'singular_name'				=> _x('Resource Library', 'Post Type Singular Name', 'welldoc'),
        'menu_name'					=> __('Resource Library', 'welldoc'),
        'name_admin_bar'			=> __('Resource Library', 'welldoc'),
        'archives'					=> __('Archives', 'welldoc'),
        'parent_item_colon'			=> __('Parent Insights:', 'welldoc'),
        'all_items'					=> __('All Resource Libraries', 'welldoc'),
        'add_new_item'				=> __('Add New Resource Library', 'welldoc'),
        'add_new'					=> __('Add New', 'welldoc'),
        'new_item'					=> __('New Resource Libraries', 'welldoc'),
        'edit_item'					=> __('Edit Resource Libraries', 'welldoc'),
        'update_item'				=> __('Update Resource Libraries', 'welldoc'),
        'view_item'					=> __('View Resource Libraries', 'welldoc'),
        'search_items'				=> __('Search Resource Libraries', 'welldoc'),
        'not_found'					=> __('Not Found', 'welldoc'),
        'not_found_in_trash'		=> __('Not Found in Trash', 'welldoc'),
        'featured_image'			=> __('Featured Image', 'welldoc'),
        'set_featured_image'		=> __('Set Featured Image', 'welldoc'),
        'remove_featured_image'		=> __('Remove Featured Image', 'welldoc'),
        'use_featured_image'		=> __('Use as Featured Image', 'welldoc'),
        'insert_into_item'			=> __('Insert into Resource Libraries', 'welldoc'),
        'uploaded_to_this_item'		=> __('Uploaded to This Resource Libraries', 'welldoc'),
        'items_list'				=> __('Items list', 'welldoc'),
        'items_list_navigation'		=> __('Resource Library List Navigation', 'welldoc'),
        'filter_items_list'			=> __('Filter Resource Library List', 'welldoc'),
    );
    $args = array(
        'label'						=> __('Insights', 'welldoc'),
        'description'				=> __('Post Type Insights', 'welldoc'),
        'labels'					=> $labels,
        'supports'					=> array('title', 'editor', 'thumbnail', 'author'),
        'hierarchical'				=> false,
        'public'					=> true,
        'show_ui'					=> true,
        'show_in_menu'				=> true,
        'menu_position'				=> 5.2,
        'show_in_admin_bar'			=> true,
        'show_in_nav_menus'			=> true,
        'can_export'				=> true,
        'has_archive'				=> true,
        'exclude_from_search'		=> false,
        'publicly_queryable'		=> true,
        'capability_type'			=> 'post',
        'rewrite'					=> array('slug' => 'resource-library'),
    );
    register_post_type('insights', $args);
	
	$labels = array(
		'name'                       => _x( 'Types', 'taxonomy general name', 'textdomain' ),
		'singular_name'              => _x( 'Type', 'taxonomy singular name', 'textdomain' ),
		'search_items'               => __( 'Search Types', 'textdomain' ),
		'all_items'                  => __( 'All Types', 'textdomain' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit Type', 'textdomain' ),
		'update_item'                => __( 'Update Type', 'textdomain' ),
		'add_new_item'               => __( 'Add New Type', 'textdomain' ),
		'new_item_name'              => __( 'New Type', 'textdomain' ),
		'add_or_remove_items'        => __( 'Add or remove types', 'textdomain' ),
		'choose_from_most_used'      => __( 'Choose from the most used type', 'textdomain' ),
		'not_found'                  => __( 'No type found.', 'textdomain' ),
		'menu_name'                  => __( 'Type', 'textdomain' ),
	);

	$args = array(
		'hierarchical'          => true,
		'labels'                => $labels,
		'show_ui'               => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var'             => true,
		'rewrite'               => array( 'slug' => '' ),
	);

	register_taxonomy( 'type-insights', 'insights', $args );
}

function taxonommy_resource_audience() {
    $labels = array(
        'name'							=> _x('Audience', 'Taxonomy General Name', 'welldone'),
        'singular_name'					=> _x('Audience', 'Taxonomy Singular Name', 'welldone'),
        'menu_name'						=> __('Audiences', 'welldone'),
        'all_items'						=> __('All Audiences', 'welldone'),
        'parent_item'					=> __('Parent Audience', 'welldone'),
        'parent_item_colon'				=> __('Parent Audience:', 'welldone'),
        'new_item_name'					=> __('New Audience Name', 'welldone'),
        'add_new_item'					=> __('Add New Audience', 'welldone'),
        'edit_item'						=> __('Edit Audience', 'welldone'),
        'update_item'					=> __('Update Audience', 'welldone'),
        'view_item'						=> __('View Audience', 'welldone'),
        'separate_items_with_commas'	=> __('Separate items with commas', 'welldone'),
        'add_or_remove_items'			=> __('Add or remove Audience', 'welldone'),
        'choose_from_most_used'			=> __('Choose from the most used', 'welldone'),
        'popular_items'					=> __('Popular Audience', 'welldone'),
        'search_items'					=> __('Search Audience', 'welldone'),
        'not_found'						=> __('Not Found', 'welldone'),
        'no_terms'						=> __('No Audiences', 'welldone'),
        'items_list'					=> __('Audience list', 'welldone'),
        'items_list_navigation'			=> __('Audience list navigation', 'welldone'),
    );
    $args = array(
        'labels'				=> $labels,
        'hierarchical'			=> true,
        'public'				=> true,
        'publicly_queryable'    => true,
        'show_ui'				=> true,
        'show_admin_column'		=> true,
        'show_in_nav_menus'		=> true,
        'show_tagcloud'			=> true,

    );
    register_taxonomy('resource-audience', array('insights'), $args);
}

add_action('init', 'taxonommy_resource_audience', 0);



add_action('init', 'custom_post_type_events', 0);

function custom_post_type_events() {

    $labels = array(
        'name'						=> _x('Events', 'Post Type General Name', 'welldoc'),
        'singular_name'				=> _x('Event', 'Post Type Singular Name', 'welldoc'),
        'menu_name'					=> __('Event', 'welldoc'),
        'name_admin_bar'			=> __('Event', 'welldoc'),
        'archives'					=> __('Archives', 'welldoc'),
        'parent_item_colon'			=> __('Parent Event:', 'welldoc'),
        'all_items'					=> __('All Events', 'welldoc'),
        'add_new_item'				=> __('Add New Event', 'welldoc'),
        'add_new'					=> __('Add New', 'welldoc'),
        'new_item'					=> __('New Event', 'welldoc'),
        'edit_item'					=> __('Edit Event', 'welldoc'),
        'update_item'				=> __('Update Event', 'welldoc'),
        'view_item'					=> __('View Event', 'welldoc'),
        'search_items'				=> __('Search Events', 'welldoc'),
        'not_found'					=> __('Not Found', 'welldoc'),
        'not_found_in_trash'		=> __('Not Found in Trash', 'welldoc'),
        'featured_image'			=> __('Featured Image', 'welldoc'),
        'set_featured_image'		=> __('Set Featured Image', 'welldoc'),
        'remove_featured_image'		=> __('Remove Featured Image', 'welldoc'),
        'use_featured_image'		=> __('Use as Featured Image', 'welldoc'),
        'insert_into_item'			=> __('Insert into Event', 'welldoc'),
        'uploaded_to_this_item'		=> __('Uploaded to This Event', 'welldoc'),
        'items_list'				=> __('Items list', 'welldoc'),
        'items_list_navigation'		=> __('Events List Navigation', 'welldoc'),
        'filter_items_list'			=> __('Filter Events List', 'welldoc'),
    );
    $args = array(
        'label'						=> __('Events', 'welldoc'),
        'description'				=> __('Post Type Events', 'welldoc'),
        'labels'					=> $labels,
        'supports'					=> array('title', 'editor', 'thumbnail', 'author'),
        'hierarchical'				=> false,
        'public'					=> true,
        'show_ui'					=> true,
        'show_in_menu'				=> true,
        'menu_position'				=> 5,
        'show_in_admin_bar'			=> true,
        'show_in_nav_menus'			=> true,
        'can_export'				=> true,
        'has_archive'				=> false,
        'exclude_from_search'		=> false,
        'publicly_queryable'		=> true,
        'capability_type'			=> 'post',
        'taxonomies'				=> array('type'),
        'rewrite'					=> array('slug' => 'events'),
    );
    register_post_type('events', $args);
}

function taxonommy_news_type() {

    $labels = array(
        'name'							=> _x('Types', 'Taxonomy General Name', 'welldone'),
        'singular_name'					=> _x('Type', 'Taxonomy Singular Name', 'welldone'),
        'menu_name'						=> __('Types', 'welldone'),
        'all_items'						=> __('All Types', 'welldone'),
        'parent_item'					=> __('Parent Type', 'welldone'),
        'parent_item_colon'				=> __('Parent Type:', 'welldone'),
        'new_item_name'					=> __('New Type Name', 'welldone'),
        'add_new_item'					=> __('Add New Type', 'welldone'),
        'edit_item'						=> __('Edit Type', 'welldone'),
        'update_item'					=> __('Update Type', 'welldone'),
        'view_item'						=> __('View Type', 'welldone'),
        'separate_items_with_commas'	=> __('Separate items with commas', 'welldone'),
        'add_or_remove_items'			=> __('Add or remove Types', 'welldone'),
        'choose_from_most_used'			=> __('Choose from the most used', 'welldone'),
        'popular_items'					=> __('Popular Types', 'welldone'),
        'search_items'					=> __('Search Types', 'welldone'),
        'not_found'						=> __('Not Found', 'welldone'),
        'no_terms'						=> __('No Types', 'welldone'),
        'items_list'					=> __('Types list', 'welldone'),
        'items_list_navigation'			=> __('Types list navigation', 'welldone'),
    );
    $args = array(
        'labels'				=> $labels,
        'hierarchical'			=> true,
        'public'				=> true,
        'show_ui'				=> true,
        'show_admin_column'		=> true,
        'show_in_nav_menus'		=> true,
        'show_tagcloud'			=> true,
    );
    register_taxonomy('type-news', array('news'), $args);
}

add_action('init', 'taxonommy_news_type', 0);

function taxonommy_events_type() {

    $labels = array(
        'name'							=> _x('Types', 'Taxonomy General Name', 'welldone'),
        'singular_name'					=> _x('Type', 'Taxonomy Singular Name', 'welldone'),
        'menu_name'						=> __('Types', 'welldone'),
        'all_items'						=> __('All Types', 'welldone'),
        'parent_item'					=> __('Parent Type', 'welldone'),
        'parent_item_colon'				=> __('Parent Type:', 'welldone'),
        'new_item_name'					=> __('New Type Name', 'welldone'),
        'add_new_item'					=> __('Add New Type', 'welldone'),
        'edit_item'						=> __('Edit Type', 'welldone'),
        'update_item'					=> __('Update Type', 'welldone'),
        'view_item'						=> __('View Type', 'welldone'),
        'separate_items_with_commas'	=> __('Separate items with commas', 'welldone'),
        'add_or_remove_items'			=> __('Add or remove Types', 'welldone'),
        'choose_from_most_used'			=> __('Choose from the most used', 'welldone'),
        'popular_items'					=> __('Popular Types', 'welldone'),
        'search_items'					=> __('Search Types', 'welldone'),
        'not_found'						=> __('Not Found', 'welldone'),
        'no_terms'						=> __('No Types', 'welldone'),
        'items_list'					=> __('Types list', 'welldone'),
        'items_list_navigation'			=> __('Types list navigation', 'welldone'),
    );
    $args = array(
        'labels'				=> $labels,
        'hierarchical'			=> true,
        'public'				=> true,
        'show_ui'				=> true,
        'show_admin_column'		=> true,
        'show_in_nav_menus'		=> true,
        'show_tagcloud'			=> true,
    );
    register_taxonomy('type-events', array('events'), $args);
}

add_action('init', 'taxonommy_events_type', 0);

function custom_post_type_team() {
    $labels = array(
        'name'						=> _x('Team', 'Post Type General Name', 'welldoc'),
        'singular_name'				=> _x('Team', 'Post Type Singular Name', 'welldoc'),
        'menu_name'					=> __('Team', 'welldoc'),
        'name_admin_bar'			=> __('Team', 'welldoc'),
        'archives'					=> __('Archives', 'welldoc'),
        'parent_item_colon'			=> __('Parent Team:', 'welldoc'),
        'all_items'					=> __('All Team', 'welldoc'),
        'add_new_item'				=> __('Add New Team', 'welldoc'),
        'add_new'					=> __('Add New', 'welldoc'),
        'new_item'					=> __('New Team', 'welldoc'),
        'edit_item'					=> __('Edit Team', 'welldoc'),
        'update_item'				=> __('Update Team', 'welldoc'),
        'view_item'					=> __('View Team', 'welldoc'),
        'search_items'				=> __('Search Team', 'welldoc'),
        'not_found'					=> __('Not Found', 'welldoc'),
        'not_found_in_trash'		=> __('Not Found in Trash', 'welldoc'),
        'featured_image'			=> __('Featured Image', 'welldoc'),
        'set_featured_image'		=> __('Set Featured Image', 'welldoc'),
        'remove_featured_image'		=> __('Remove Featured Image', 'welldoc'),
        'use_featured_image'		=> __('Use as Featured Image', 'welldoc'),
        'insert_into_item'			=> __('Insert into Team', 'welldoc'),
        'uploaded_to_this_item'		=> __('Uploaded to This Team', 'welldoc'),
        'items_list'				=> __('Items list', 'welldoc'),
        'items_list_navigation'		=> __('Team List Navigation', 'welldoc'),
        'filter_items_list'			=> __('Filter Team List', 'welldoc'),
    );
    $args = array(
        'label'						=> __('Team', 'welldoc'),
        'description'				=> __('Post Type Team', 'welldoc'),
        'labels'					=> $labels,
        'supports'					=> array('title', 'editor', 'thumbnail', 'author'),
        'hierarchical'				=> false,
        'public'					=> true,
        'show_ui'					=> true,
        'show_in_menu'				=> true,
        'menu_position'				=> 5,
        'show_in_admin_bar'			=> true,
        'show_in_nav_menus'			=> true,
        'can_export'				=> true,
        'has_archive'				=> false,
        'exclude_from_search'		=> false,
        'publicly_queryable'		=> true,
        'capability_type'			=> 'post',
        'taxonomies'				=> array('type'),
        'rewrite'					=> array('slug' => 'team'),
    );
    register_post_type('team', $args);
}

add_action('init', 'custom_post_type_team', 0);

function taxonommy_team_type() {
    $labels = array(
        'name'							=> _x('Types', 'Taxonomy General Name', 'welldone'),
        'singular_name'					=> _x('Type', 'Taxonomy Singular Name', 'welldone'),
        'menu_name'						=> __('Types', 'welldone'),
        'all_items'						=> __('All Types', 'welldone'),
        'parent_item'					=> __('Parent Type', 'welldone'),
        'parent_item_colon'				=> __('Parent Type:', 'welldone'),
        'new_item_name'					=> __('New Type Name', 'welldone'),
        'add_new_item'					=> __('Add New Type', 'welldone'),
        'edit_item'						=> __('Edit Type', 'welldone'),
        'update_item'					=> __('Update Type', 'welldone'),
        'view_item'						=> __('View Type', 'welldone'),
        'separate_items_with_commas'	=> __('Separate items with commas', 'welldone'),
        'add_or_remove_items'			=> __('Add or remove Types', 'welldone'),
        'choose_from_most_used'			=> __('Choose from the most used', 'welldone'),
        'popular_items'					=> __('Popular Types', 'welldone'),
        'search_items'					=> __('Search Types', 'welldone'),
        'not_found'						=> __('Not Found', 'welldone'),
        'no_terms'						=> __('No Types', 'welldone'),
        'items_list'					=> __('Types list', 'welldone'),
        'items_list_navigation'			=> __('Types list navigation', 'welldone'),
    );
    $args = array(
        'labels'				=> $labels,
        'hierarchical'			=> true,
        'public'				=> true,
        'show_ui'				=> true,
        'show_admin_column'		=> true,
        'show_in_nav_menus'		=> true,
        'show_tagcloud'			=> true,
    );
    register_taxonomy('type-team', array('team'), $args);
}

add_action('init', 'taxonommy_team_type', 0);


function custom_post_type_resources() {
    $labels = array(
        'name'						=> _x('Resources', 'Post Type General Name', 'welldoc'),
        'singular_name'				=> _x('Resource', 'Post Type Singular Name', 'welldoc'),
        'menu_name'					=> __('Resources', 'welldoc'),
        'name_admin_bar'			=> __('Resources', 'welldoc'),
        'archives'					=> __('Archives', 'welldoc'),
//         'parent_item_colon'			=> __('Parent Team:', 'welldoc'),
        'all_items'					=> __('All Resources', 'welldoc'),
        'add_new_item'				=> __('Add New Resource', 'welldoc'),
        'add_new'					=> __('Add New', 'welldoc'),
        'new_item'					=> __('New Resource', 'welldoc'),
        'edit_item'					=> __('Edit Resource', 'welldoc'),
        'update_item'				=> __('Update Resource', 'welldoc'),
        'view_item'					=> __('View Resource', 'welldoc'),
        'search_items'				=> __('Search Resources', 'welldoc'),
        'not_found'					=> __('Not Found', 'welldoc'),
        'not_found_in_trash'		=> __('Not Found in Trash', 'welldoc'),
        'featured_image'			=> __('Featured Image', 'welldoc'),
        'set_featured_image'		=> __('Set Featured Image', 'welldoc'),
        'remove_featured_image'		=> __('Remove Featured Image', 'welldoc'),
        'use_featured_image'		=> __('Use as Featured Image', 'welldoc'),
/*
        'insert_into_item'			=> __('Insert into Resource', 'welldoc'),
        'uploaded_to_this_item'		=> __('Uploaded to This Resource', 'welldoc'),
        'items_list'				=> __('Items list', 'welldoc'),
        'items_list_navigation'		=> __('Team List Navigation', 'welldoc'),
        'filter_items_list'			=> __('Filter Resource List', 'welldoc'),
*/
    );
    $args = array(
        'label'						=> __('Resource', 'welldoc'),
        'description'				=> __('Post Type Resource', 'welldoc'),
        'labels'					=> $labels,
        'supports'					=> array('title'),
        'hierarchical'				=> false,
        'public'					=> false,
        'show_ui'					=> true,
        'show_in_menu'				=> true,
        'menu_position'				=> 6,
        'show_in_admin_bar'			=> true,
        'show_in_nav_menus'			=> true,
        'can_export'				=> true,
        'has_archive'				=> false,
        'exclude_from_search'		=> false,
        'publicly_queryable'		=> true,
        'capability_type'			=> 'post',
        'taxonomies'				=> array('type'),
        'rewrite'					=> array('slug' => 'resource'),
    );
    register_post_type('resource', $args);
}

add_action('init', 'custom_post_type_resources', 0);

function taxonommy_resource_type() {
    $labels = array(
        'name'							=> _x('Types', 'Taxonomy General Name', 'welldone'),
        'singular_name'					=> _x('Type', 'Taxonomy Singular Name', 'welldone'),
        'menu_name'						=> __('Types', 'welldone'),
        'all_items'						=> __('All Types', 'welldone'),
        'parent_item'					=> __('Parent Type', 'welldone'),
        'parent_item_colon'				=> __('Parent Type:', 'welldone'),
        'new_item_name'					=> __('New Type Name', 'welldone'),
        'add_new_item'					=> __('Add New Type', 'welldone'),
        'edit_item'						=> __('Edit Type', 'welldone'),
        'update_item'					=> __('Update Type', 'welldone'),
        'view_item'						=> __('View Type', 'welldone'),
        'separate_items_with_commas'	=> __('Separate items with commas', 'welldone'),
        'add_or_remove_items'			=> __('Add or remove Types', 'welldone'),
        'choose_from_most_used'			=> __('Choose from the most used', 'welldone'),
        'popular_items'					=> __('Popular Types', 'welldone'),
        'search_items'					=> __('Search Types', 'welldone'),
        'not_found'						=> __('Not Found', 'welldone'),
        'no_terms'						=> __('No Types', 'welldone'),
        'items_list'					=> __('Types list', 'welldone'),
        'items_list_navigation'			=> __('Types list navigation', 'welldone'),
    );
    $args = array(
        'labels'				=> $labels,
        'hierarchical'			=> true,
        'public'				=> false,
        'show_ui'				=> true,
        'show_admin_column'		=> true,
        'show_in_nav_menus'		=> true,
        'show_tagcloud'			=> true,
    );
    register_taxonomy('type-resource', array('resource'), $args);
}

add_action('init', 'taxonommy_resource_type', 0);


add_filter('pre_get_posts','searchfilter');

function searchfilter($query) {

    if( $query->is_search && !is_admin() ) {
        if( $_GET['post_type'] == 'news' ){
            $query->set( 'post_type', array( 'news' ) );
        }
        elseif( $_GET['post_type'] == 'events' ){
            $query->set( 'post_type', array( 'events' ) );
        }
    }

    return $query;
}

function wpbrigade_author_custom_post_types( $query ) {
	if( is_author() && empty( $query->query_vars['suppress_filters'] ) ) {
		$query->set( 'post_type', array( 'post', 'news', 'events', 'team', 'page', 'insights' ) );
		return $query;
	}
}
add_filter( 'pre_get_posts', 'wpbrigade_author_custom_post_types' );

function shorten_yoast_breadcrumb_title($link_info)
{
    $limit = 55;
    if (strlen($link_info['text']) > ($limit)) {
        $link_info['text'] = substr($link_info['text'], 0, $limit) . '&hellip;';
    }

    return $link_info;
}

add_filter('wpseo_breadcrumb_single_link_info', 'shorten_yoast_breadcrumb_title', 10);


// Remove custom tax name from archive banners
add_filter('get_the_archive_title', 'my_get_the_archive_title' );
function my_get_the_archive_title( $title ) {
    if ('insights') {
        $title = single_cat_title( '', false );
    }

    return $title;
}


/*
	wp_enqueue_style( 'slick-style', get_template_directory_uri() . '/includes/extensions/slick/slick.css', array(), '1.0');

	wp_enqueue_style( 'jquery-modal', get_template_directory_uri() . '/includes/extensions/jquery-modal/jquery.modal.min.css', array(), '1.0');
	
	
	wp_register_script( 'jquery3.2.1', get_template_directory_uri() . '/includes/js/vendor.js' );
	wp_add_inline_script( 'jquery3.2.1', 'var jQuery3_2_1 = $.noConflict(true);' );

	wp_enqueue_script( 'jquery-ui-accordion' );
	
	wp_enqueue_script( 'jquery-ui-tabs' );
		
	wp_enqueue_script('jquery-modal-js', get_template_directory_uri() . '/includes/extensions/jquery-modal/jquery.modal.min.js', array('jquery3.2.1'), '20151215', true);
	
	wp_enqueue_script('slick-js', get_template_directory_uri() . '/includes/extensions/slick/slick.min.js', array('jquery3.2.1'), true);
	
	
	

	wp_enqueue_script('greensock-tweenMax', get_template_directory_uri() . '/includes/extensions/greensock/TweenMax.min.js', array(), '20151215', true);

	wp_enqueue_script('greensock-draggable', get_template_directory_uri() . '/includes/extensions/greensock/Draggable.min.js', array(), '20151215', true);
	
	wp_enqueue_script('throw-props', get_template_directory_uri() . '/includes/extensions/greensock/ThrowPropsPlugin.min.js', array(), '20151215', true);
		
	wp_enqueue_script('scroll-magic', get_template_directory_uri() . '/includes/extensions/scrollmagic/ScrollMagic.min.js', array(), '20151215', true);
	
	wp_enqueue_script('scroll-magic-gsap', get_template_directory_uri() . '/includes/extensions/scrollmagic/animation.gsap.min.js', array(), '20151215', true);
	
	wp_enqueue_script('general-js', get_template_directory_uri() . '/includes/js/general.js', array('jquery3.2.1'), '20151215', true);
*/
	
	
add_filter( 'gform_confirmation_anchor_11', '__return_false' );
	
	
/**
 * Gravity Wiz // Gravity Forms // Email Domain Validator
 *
 * This snippets allows you to exclude a list of invalid domains or include a list of valid domains for your Gravity Form Email fields.
 *
 * @version 1.4
 * @author David Smith <david@gravitywiz.com>
 * @license GPL-2.0+
 * @link http://gravitywiz.com/banlimit-email-domains-for-gravity-form-email-fields/
 */
class GW_Email_Domain_Validator {
 private $_args;
 function __construct($args) {
 $this->_args = wp_parse_args( $args, array(
 'form_id' => false,
 'field_id' => false,
 'domains' => false,
 'validation_message' => __( 'Sorry, <strong>%s</strong> email accounts are not eligible for this form.' ),
 'mode' => 'ban' // also accepts "limit"
 ) );
 // convert field ID to an array for consistency, it can be passed as an array or a single ID
 if($this->_args['field_id'] && !is_array($this->_args['field_id']))
 $this->_args['field_id'] = array($this->_args['field_id']);
 $form_filter = $this->_args['form_id'] ? "_{$this->_args['form_id']}" : '';
 add_filter("gform_validation{$form_filter}", array($this, 'validate'));
 }
 function validate($validation_result) {
 $form = $validation_result['form'];
 foreach($form['fields'] as &$field) {
 // if this is not an email field, skip
 if(RGFormsModel::get_input_type($field) != 'email')
 continue;
 // if field ID was passed and current field is not in that array, skip
 if($this->_args['field_id'] && !in_array($field['id'], $this->_args['field_id']))
 continue;
 $page_number = GFFormDisplay::get_source_page( $form['id'] );
 if( $page_number > 0 && $field->pageNumber != $page_number ) {
 continue;
 }
 if( GFFormsModel::is_field_hidden( $form, $field, array() ) ) {
 continue;
 }
 $domain = $this->get_email_domain($field);
 // if domain is valid OR if the email field is empty, skip
 if($this->is_domain_valid($domain) || empty($domain))
 continue;
 $validation_result['is_valid'] = false;
 $field['failed_validation'] = true;
 $field['validation_message'] = sprintf($this->_args['validation_message'], $domain);
 }
 $validation_result['form'] = $form;
 return $validation_result;
 }
 function get_email_domain( $field ) {
 $email = explode( '@', rgpost( "input_{$field['id']}" ) );
 return trim( rgar( $email, 1 ) );
 }
 function is_domain_valid( $domain ) {
 $mode = $this->_args['mode'];
 $domain = strtolower( $domain );
 foreach( $this->_args['domains'] as $_domain ) {
 $_domain = strtolower( $_domain );
 $full_match = $domain == $_domain;
 $suffix_match = strpos( $_domain, '.' ) === 0 && $this->str_ends_with( $domain, $_domain );
 $has_match = $full_match || $suffix_match;
 if( $mode == 'ban' && $has_match ) {
 return false;
 } else if( $mode == 'limit' && $has_match ) {
 return true;
 }
 }
 return $mode == 'limit' ? false : true;
 }
 function str_ends_with( $string, $text ) {
 $length = strlen( $string );
 $text_length = strlen( $text );
 if( $text_length > $length ) {
 return false;
 }
 return substr_compare( $string, $text, $length - $text_length, $text_length ) === 0;
 }
}
class GWEmailDomainControl extends GW_Email_Domain_Validator { }


# Configuration

	new GWEmailDomainControl(array(
	 'form_id' => 13,
	 'field_id' => 5, // multiple field IDs can be passed as an array: array(8,9)
	 'domains' => array('gmail.com', 'hotmail.com', 'yahoo.com'),
	 'validation_message' => __('Please enter your business or company email address. We cannot accept personal email addresses.'),
	 'mode' => 'ban' // also accepts "limit"
	 ));
	
	

