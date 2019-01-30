<?php
/**
 * Plugin Name: WEPL's Custom Post Types and Taxomies
 * Description: A simple plugin
 * Version: 0.1
 * Author: Melanie Wilson
 * License: GPL2
 */
 
 function wepl_custom_posttypes() {
 
 // Database post type
  $labels = array(
        'name'               => 'Databases',
        'singular_name'      => 'Database',
        'menu_name'          => 'Databases',
        'name_admin_bar'     => 'Database',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Database',
        'new_item'           => 'New Database',
        'edit_item'          => 'Edit Database',
        'view_item'          => 'View Database',
        'all_items'          => 'All Databases',
        'search_items'       => 'Search Databases',
        'parent_item_colon'  => 'Parent Databases:',
        'not_found'          => 'No databases found.',
        'not_found_in_trash' => 'No databases found in Trash.',
    );
    
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'menu_icon'          => 'dashicons-feedback',
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'databases' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'supports'           => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'author', 'excerpt', 'comments' ),
	

    );
    
 	register_post_type( 'databases', $args );

	// Toy post type

  $labels = array(
        'name'               => 'Toys',
        'singular_name'      => 'Toy',
        'menu_name'          => 'Toys',
        'name_admin_bar'     => 'Toy',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Toy',
        'new_item'           => 'New Toy',
        'edit_item'          => 'Edit Toy',
        'view_item'          => 'View Toy',
        'all_items'          => 'All Toys',
        'search_items'       => 'Search Toys',
        'parent_item_colon'  => 'Parent Toys:',
        'not_found'          => 'No toys found.',
        'not_found_in_trash' => 'No toys found in Trash.',
    );
    
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'menu_icon'          => 'dashicons-universal-access-alt',
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'toys' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'supports'           => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'author', 'excerpt' ),
	    'taxonomies'		 => array( 'category', 'post_tag')

    );
    
 	register_post_type( 'toys', $args );

// Reviews post type
  $labels = array(
        'name'               => 'Reviews',
        'singular_name'      => 'Review',
        'menu_name'          => 'Reviews',
        'name_admin_bar'     => 'Review',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Review',
        'new_item'           => 'New Review',
        'edit_item'          => 'Edit Review',
        'view_item'          => 'View Review',
        'all_items'          => 'All Reviews',
        'search_items'       => 'Search Reviews',
        'parent_item_colon'  => 'Parent Reviews:',
        'not_found'          => 'No reviews found.',
        'not_found_in_trash' => 'No reviews found in Trash.',
    );
    
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'menu_icon'          => 'dashicons-star-filled',
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'reviews' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'custom-fields' ),
        'taxonomies'		 => array( 'category', 'post_tag')
    );
    
 	register_post_type( 'reviews', $args );
 }
 add_action( 'init', 'wepl_custom_posttypes' );
 
 // Flush rewrite rules to add "review" as a permalink slug
function my_rewrite_flush() {
    wepl_custom_posttypes();
    flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'my_rewrite_flush' );

/* Custom Taxonomies */

function wepl_custom_taxonomies() {
	// Database Topic taxonomy
    $labels = array(
        'name'              => 'Topic',
        'singular_name'     => 'Topic',
        'search_items'      => 'Search Topic',
        'all_items'         => 'All Topics',
        'parent_item'       => 'Parent Topic',
        'parent_item_colon' => 'Parent Topic:',
        'edit_item'         => 'Edit Topic',
        'update_item'       => 'Update Topic',
        'add_new_item'      => 'Add New Topic',
        'new_item_name'     => 'New Topic',
        'menu_name'         => 'Topic',
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'topic' ),
    );

    register_taxonomy( 'topic', array( 'databases' ), $args );

	// Database Organization taxonomy
    $labels = array(
        'name'              => 'Organization',
        'singular_name'     => 'Organization',
        'search_items'      => 'Search Organization',
        'all_items'         => 'All Organizations',
        'parent_item'       => 'Parent Organization',
        'parent_item_colon' => 'Parent Organization:',
        'edit_item'         => 'Edit Organization',
        'update_item'       => 'Update Organization',
        'add_new_item'      => 'Add Organization',
        'new_item_name'     => 'New Organization',
        'menu_name'         => 'Organization',
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'organization' ),
    );

    register_taxonomy( 'organization', array( 'databases' ), $args );

	// Database Restriction taxonomy
    $labels = array(
        'name'              => 'Restrictions',
        'singular_name'     => 'Restriction',
        'search_items'      => 'Search Restrictions',
        'all_items'         => 'All Restrictions',
        'parent_item'       => 'Parent Restriction',
        'parent_item_colon' => 'Parent Restriction:',
        'edit_item'         => 'Edit Restriction',
        'update_item'       => 'Update Restriction',
        'add_new_item'      => 'Add Restriction',
        'new_item_name'     => 'New Restriction',
        'menu_name'         => 'Restriction',
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'restriction' ),
    );

    register_taxonomy( 'restriction', array( 'databases' ), $args );

	// Toy Category Taxonomy
    $labels = array(
        'name'              => 'Toy Categories',
        'singular_name'     => 'Toy Category',
        'search_items'      => 'Search Toy Categories',
        'all_items'         => 'All Toy Categories',
        'parent_item'       => 'Parent Toy Category',
        'parent_item_colon' => 'Parent Toy Category:',
        'edit_item'         => 'Edit Toy Category',
        'update_item'       => 'Update Toy Category',
        'add_new_item'      => 'Add Toy Category',
        'new_item_name'     => 'New Toy Category',
        'menu_name'         => 'Toy Category',
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'toy-category' ),
    );

    register_taxonomy( 'toy-category', array( 'toys' ), $args );

	// Toy Age Taxonomy
    $labels = array(
        'name'              => 'Minimum Age',
        'singular_name'     => 'Minimum Age',
        'search_items'      => 'Search Ages',
        'all_items'         => 'All Ages',
        'parent_item'       => 'Parent Age',
        'parent_item_colon' => 'Parent Age:',
        'edit_item'         => 'Edit Ages',
        'update_item'       => 'Update Age',
        'add_new_item'      => 'Add Age',
        'new_item_name'     => 'New Age',
        'menu_name'         => 'Minimum Age',
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'ages' ),
    );

    register_taxonomy( 'age', array( 'toys' ), $args );
        
        // Toy Brand Taxonomy
    $labels = array(
        'name'              => 'Brands',
        'singular_name'     => 'Brand',
        'search_items'      => 'Search Brands',
        'all_items'         => 'All Brands',
        'parent_item'       => 'Parent Brand',
        'parent_item_colon' => 'Parent Brand:',
        'edit_item'         => 'Edit Brand',
        'update_item'       => 'Update Brand',
        'add_new_item'      => 'Add Brand',
        'new_item_name'     => 'New Brand',
        'menu_name'         => 'Brand',
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'brand' ),
    );

    register_taxonomy( 'brand', array( 'toys' ), $args );

	 // Toy Library Location Taxonomy
    $labels = array(
        'name'              => 'Library Locations',
        'singular_name'     => 'Library Location',
        'search_items'      => 'Search Library Locations',
        'all_items'         => 'All Library Locations',
        'parent_item'       => 'Parent Library Location',
        'parent_item_colon' => 'Parent Library Location:',
        'edit_item'         => 'Edit Library Location',
        'update_item'       => 'Update Library Location',
        'add_new_item'      => 'Add Library Location',
        'new_item_name'     => 'New Library Location',
        'menu_name'         => 'Library Location',
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'library-location' ),
    );

    register_taxonomy( 'library-location', array( 'toys' ), $args );

	// Toy Tag Taxonomy
	
	$labels = array(
        'name'                       => 'Toy Tags',
        'singular_name'              => 'Toy Tag',
        'search_items'               => 'Search Toy Tags',
        'popular_items'              => 'Popular Toy Tags',
        'all_items'                  => 'All Toy Tags',
        'parent_item'                => null,
        'parent_item_colon'          => null,
        'edit_item'                  => 'Edit Toy Tag',
        'update_item'                => 'Update Toy Tag',
        'add_new_item'               => 'Add New Toy Tag',
        'new_item_name'              => 'New Toy Tag Name',
        'separate_items_with_commas' => 'Separate toy tags with commas',
        'add_or_remove_items'        => 'Add or remove toy tags',
        'choose_from_most_used'      => 'Choose from the most used toy tags',
        'not_found'                  => 'No toy tags found.',
        'menu_name'                  => 'Toy Tags',
    );

    $args = array(
        'hierarchical'          => false,
        'labels'                => $labels,
        'show_ui'               => true,
        'show_admin_column'     => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var'             => true,
        'rewrite'               => array( 'slug' => 'toy-tag' ),
    );

    register_taxonomy( 'toy-tag', array( 'toys' ), $args );

        
  // Genre taxonomy (non-hierarchical)

    
   
    // Genre taxonomy
    $labels = array(
        'name'              => 'Genres',
        'singular_name'     => 'Genre',
        'search_items'      => 'Search by Genre',
        'all_items'         => 'All Genres',
        'parent_item'       => 'Parent Genre',
        'parent_item_colon' => 'Parent Genre:',
        'edit_item'         => 'Edit Genre',
        'update_item'       => 'Update Genre',
        'add_new_item'      => 'Add Genre',
        'new_item_name'     => 'New Genre',
        'menu_name'         => 'Genre',
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'prices' ),
    );

    register_taxonomy( 'genre', array( 'reviews' ), $args );

	// Rating taxonomy
    $labels = array(
        'name'              => 'Ratings',
        'singular_name'     => 'Rating',
        'search_items'      => 'Search by Rating',
        'all_items'         => 'All Ratings',
        'parent_item'       => 'Parent Rating',
        'parent_item_colon' => 'Parent PRating:',
        'edit_item'         => 'Edit Rating',
        'update_item'       => 'Update Rating',
        'add_new_item'      => 'Add Rating',
        'new_item_name'     => 'New Rating',
        'menu_name'         => 'Rating',
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'prices' ),
    );

    register_taxonomy( 'rating', array( 'reviews' ), $args );
	
}

add_action ('init', 'wepl_custom_taxonomies' );